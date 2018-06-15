<?php
namespace CGB\Relax5project\Service;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can resedistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Various helper routines
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class ExecuteService implements \TYPO3\CMS\Core\SingletonInterface {

    /**
     * execute
     * 
     * This service executes the nextstate actions
     *  
     * @param array $storage
     * @param \CGB\Relax5project\Domain\Model\ActionPool $action
     * @return type
     */
    static function execute (&$storage, $action) {
        if ($action->getType() === 'email') {
            // send emails
            $recipientList = 
                \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(
                    ",", 
                    self::getSingleOption($action->getOptions(), $key = 'recipients')
                );
            for ($i=0;$i < count($recipientList);$i++) {
                $recipientList[$i] = self::makeValue($storage, ['operand' => $recipientList[$i] ], $ignore);
                if ($recipientList[$i] == '') {
                    unset($recipientList[$i]);
                }
            }

            $sender = self::getSingleOption($action->getOptions(), $key = 'sender');
            $subject = self::getSingleOption($action->getOptions(), $key = 'subject');
            
            $subject = preg_replace_callback(
                \CGB\Relax5core\Service\ObjectAccessService::PATTERN_OBJECT_ACCESSOR,
                function ($matches) use ($storage){
                    $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($storage, $matches[1]);
                    if (is_string($result)) {
                        $result = "'" . (string) $result . "'";
                    } elseif (is_int($result)) {
                        $result = (string) $result;
                    }
                    return $result;
                },    
                $subject, 
                -1, 
                $count
            );
            
            $template = self::getSingleOption($action->getOptions(), $key = 'template');
            // print_r($recipientList);
            
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
            $emailService = $objectManager->get(\CGB\Relax5core\Service\EmailService::class);

            $storage['_executed'][] = [
                'recipientList' => $recipientList,
                'sender' => $sender,
                'subject' => $subject,
                'template' => $template,
            ];
            $emailService->sendTemplateEmail($recipientList, [$sender], $subject, $template, $storage);
        } elseif ($action->getType() === 'curl') {
            // call website with curl
            $url = self::getSingleOption($action->getOptions(), $key = 'url');
            
            $url = preg_replace_callback(
                \CGB\Relax5core\Service\ObjectAccessService::PATTERN_OBJECT_ACCESSOR,
                function ($matches) use ($storage){
                    $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($storage, $matches[1]);
                    if (is_string($result)) {
                        $result = "'" . (string) $result . "'";
                    } elseif (is_int($result)) {
                        $result = (string) $result;
                    }
                    return $result;
                },    
                $url, 
                -1, 
                $count
            );
            
            $result = \CGB\Relax5project\Service\CurlService::http($url);
            $storage['_executed'][] = [
                'url' => $url,
                'result' => $result,
            ];
        } else {
            // execute actions
            foreach (self::getActionsAsArray($action->getActions(), true) as $singleAction) {
                $break = self::processAction($storage, $singleAction);
                if ($break) {
                    break;
                }
            }
        }
    }

    /**
     * 
     * @param array $data
     * @param string $action
     */
    static function processAction( &$data, $action ) {
        $value = self::makeValue($data, $action, $ignore);
        $data['_executed'][] = [
            'value' => $value,
            'action' => $action,
            'ignore' => $ignore,
        ];

        if ($action['operator'] == 'SET') {
            $ignore = true;
            $storageObject = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $action['propertyPath']);
            foreach ($storageObject as $obj) {
                $data['obj'] = $obj;
                $splitLine = self::splitAction($action['operand']);
                self::processAction($data, [ 'propertyPath' => $splitLine[1], 'operator' => $splitLine[2], 'operand' => $splitLine[3] ]);
            }
        }

        if (! $ignore) {
            switch($action['operator']) {
                case 'BREAK':
                    return true;
                    
                case '=':
                    \CGB\Relax5core\Service\ObjectAccessService::setObjectProperty($data, $action['propertyPath'], $value);
                    break;
                case '~=':
                    $storedValue = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $action['propertyPath']);
                    \CGB\Relax5core\Service\ObjectAccessService::setObjectProperty($data, $action['propertyPath'], $storedValue . $value);
                    break;
                case '=~':
                    $storedValue = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $action['propertyPath']);
                    if ( substr($storedValue, 0, strlen($value) - 1) !== $value) {
                        \CGB\Relax5core\Service\ObjectAccessService::setObjectProperty($data, $action['propertyPath'], $value . $storedValue );
                    }
                    break;
                case '+=':
                    $storedValue = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $action['propertyPath']);
                    if (($storedValue instanceof \DateTime) && ($value instanceof \DateInterval)) {
                        $storedValue->add($value);
                        \CGB\Relax5core\Service\ObjectAccessService::setObjectProperty($data, $action['propertyPath'], $storedValue);
                    } else {
                        \CGB\Relax5core\Service\ObjectAccessService::setObjectProperty($data, $action['propertyPath'], $storedValue + $value);
                    }
                    break;
                case '<<':
                    if ($value) {
                        \CGB\Relax5core\Service\ObjectAccessService::addObject($data, $action['propertyPath'], $value);
                    }
                    break;
            }
        }
    }
    
    /**
     * getSingleOption
     * 
     * @param mixed $object
     */
    static function getSingleOption($options = '', $key = '') {
        return self::getAllOptions($options, $key)[0];
    }

    /**
     * getAllOptions
     * 
     * @param mixed $object
     */
    static function getAllOptions($options = '', $key = '') {
        return self::getOptionsAsArray($options)[$key];
    }

    /**
     * getOptionsAsArray
     * 
     * @param mixed $object
     */
    static function getOptionsAsArray($options = '') {
        $optionsArray = [];
        $rawOptionsArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode("\n", $options, 1);
        foreach ($rawOptionsArray as $singleLine) {
            if ($singleLine[0] == '#') {
                // this is a comment
                ;
            } else {
                $nPos = strpos($singleLine, '=');
                $splitLine[0] = trim(substr($singleLine, 0, $nPos));
                $splitLine[1] = trim(substr($singleLine, $nPos + 1));
                
                // $splitLine = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode("=", $singleLine);
                $optionsArray[$splitLine[0]][] = $splitLine[1];
            }
        }
        return $optionsArray;
    }

    /**
     * getActionsAsArray
     * 
     * @param mixed $object
     * @param bool $sorted
     */
    static function getActionsAsArray($options = '', $sorted = false) {
        $optionsArray = [];
        $rawOptionsArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode("\n", $options, 1);
        foreach ($rawOptionsArray as $singleLine) {
            if ($singleLine[0] == '#') {
                // this is a comment
                ;
            } else {
                $splitLine = self::splitAction($singleLine);
                if ($sorted) {
                    $optionsArray[] = [
                        'propertyPath' => $splitLine[1], 
                        'operator' => $splitLine[2], 
                        'operand' => $splitLine[3],
                    ];
                } else {
                    $optionsArray[$splitLine[1]][] = ['operator' => $splitLine[2], 'operand' => $splitLine[3]];
                }
            }
        }
        return $optionsArray;
    }
    
    /**
     * splitAction
     * 
     * @param string $line
     * @return array
     */
    static function splitAction($line) {
        if (preg_match('/^\s*([a-zA-Z0-9\.]*)\s*(~=|=~|\+=|<<|=|SET|BREAK)\s*(.*)\s*$/', $line, $matches)) {
            return $matches;
        }
    }
    
 
    /**
     * makeValue
     * 
     * @param array $data
     * @param array $action
     * @param bool $ignore
     * @return mixed
     */
    static function makeValue( $data, $action, &$ignore = false ) {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);

        if (preg_match('/^(.*)\s*\[\s*if\s*(.*)\s*(==|===|<=|>=|<|>|!=|!==|GIVEN|NOTEMPTY|\bEMPTY|DONE)\s*(.*)\s*\]$/', $action['operand'], $matches)) {
            // keyword if detected, check condition
            $matches = array_map('trim', $matches);

            self::parseString($data, $matches[1], $returnValue);
            self::parseString($data, $matches[2], $leftValue);
            self::parseString($data, $matches[4], $rightValue);

            switch ($matches[3]) {
                case '==':
                    $result = $leftValue == $rightValue;
                    break;
                case '===':
                    $result = $leftValue === $rightValue;
                    break;
                case '!=':
                    $result = $leftValue != $rightValue;
                    break;
                case '!==':
                    $result = $leftValue !== $rightValue;
                    break;
                case '<=':
                    $result = $leftValue <= $rightValue;
                    break;
                case '>=':
                    $result = $leftValue >= $rightValue;
                    break;
                case '<':
                    $result = $leftValue < $rightValue;
                    break;
                case '>':
                    $result = $leftValue > $rightValue;
                    break;
                case 'EMPTY':
                    $result = empty($rightValue);
                    break;
                case 'NOTEMPTY':
                case 'GIVEN':
                    $result = ! empty($rightValue);
                    break;
                case 'DONE':
                    $thisstate = $rightValue;
                    $thisstateStatePoolUid = $thisstate->getState()->getUid();

                    $done = true;
                    foreach ($thisstate->getProject()->getStates() as $state) {
                        if ($state->getState()->getUid() == $thisstateStatePoolUid) {
                            if ( ($thisstate->getUid() !== $state->getUid()) && ! $state->getRejected() ) {
                                $done &= ! is_null($state->getDone());
                            }
                        }
                    }
                    $result = $done;
                    break;
            }
            $ignore = ! $result; 
            return $returnValue;

        } elseif (preg_match('/^new\s*(.*)$/', $action['operand'], $matches)) {
            // keyword new detected, create a new object instance
            return $objectManager->get(trim($matches[1]));

        } elseif (preg_match('/^clone\s*(.*)$/', $action['operand'], $matches)) {
            // keyword clone detected
            if ( self::parseString($data, trim($matches[1]), $result) ) {
                $clone = clone $result;
                return $clone;
            }

        } elseif (self::parseString($data, $action['operand'], $result)) {
            return $result;

        } else {
            return $data['data'][$action['operand']];

        }
    }
    
    /**
     * parseString
     * 
     * @param arry $data
     * @param string $string
     * @param mixed $result
     */
    static function parseString( $data, $string, &$result ) {
        if ($data['data'][$string]) {
            // direct value exists i.e. there is an entry in the $data array that matches the string, thus
            // enetred by user
            $result = $data['data'][$string];
            return true;
            
        } elseif ($string == 'true') {
            // literal true 
            $result = true;
            return true;
            
        } elseif ($string == 'NULL') {
            // now
            $result = null;
            return true;
            
        } elseif ($string == 'NOW') {
            // now
            $result = new \DateTime('now', new \DateTimeZone('Europe/Vienna'));
            return true;
            
        } elseif ($string == 'TODAY') {
            // today
            $result = new \DateTime('now', new \DateTimeZone('Europe/Vienna'));
            $result->setTime(0,0);
            return true;
            
        } elseif ($string == 'false') {
            // literal false
            $result = false;
            return true;
            
        } elseif (preg_match('/^[\'](.*)[\']$/', $string, $matches)) {
            // string enclosed by single quotes
            $result = $matches[1];
            return true;
            
        } elseif (preg_match('/^([0-9]*)$/', $string, $matches)) {
            // integer value
            $result = (int) $matches[1];
            return true;
            
        } elseif (preg_match('/^([0-9]*\.[0-9]+)$/', $string, $matches)) {
            // double value
            $result = (double) $matches[1];
            return true;
            
        } elseif (preg_match("/^\{([^\}]*)\}$/", $string, $matches)) {
            // var property reference {...}
            $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[1]);
            return true;
            
        } elseif (preg_match("/^([a-zA-Z0._\-)]*)$/", $string, $matches)) {
            // var reference (same as above, but without curly brackets)
            $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[1]);
            return true;
            
        } elseif (preg_match("/^\s*(.*)[:](.*)$/", $string, $matches)) {
            // var reference with typecast
            if ($matches[1] == 'DateTime') {
                // convert to \DateTime
                $result = \Datetime::createFromFormat(
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.datetime_format', 'relax5core'), 
                    $data['data'][$matches[2]], 
                    new \DateTimeZone('Europe/Vienna')
                );
                return true;
            } elseif ($matches[1] == 'Date') {
                // convert to \DateTime without time
                $result = \Datetime::createFromFormat(
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.date_format', 'relax5core'), 
                    $data['data'][$matches[2]], 
                    new \DateTimeZone('Europe/Vienna')
                );
                if ($result) {
                    $result->setTime(0,0);
                }
                return true;
            } elseif ($matches[1] == 'DateInterval') {
                // convert to \DateInterval
                $newDateInterval = new \DateInterval($data['data'][$matches[2]]);
                $result = new \DateInterval($data['data'][$matches[2]]);
                return true;
            } else {
                // convert to domain model object
                $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
                $repository = $objectManager->get($matches[1]);
                self::parseString($data, $matches[2], $result);
                $result = $repository->findByUid( (int) $result);
                return true;
            }
        } elseif (preg_match('/^new\s*(.*)$/', $string, $matches)) {
            // keyword new detected, create a new object instance
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);            
            $result = $objectManager->get(trim($matches[1]));
            return true;
        
        } else {
            // no match
            return false;
            
        }
    }
}
