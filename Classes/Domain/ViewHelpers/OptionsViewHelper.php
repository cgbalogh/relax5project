<?php
namespace CGB\Relax5project\ViewHelpers;

/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christoph Balogh <cb@lustige-informatik.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Viewhelper
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class OptionsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
	/**
	* @param string $options
 	* @param string $result
	* @param string $key
    * @param mixed $data
	* @return string
	*/
	public function render ($options, $result='', $key = '', $data = null) {
        $singleOption = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, $key);
        
        switch($result) {
            case 'array':
                $compoundList = $optionsArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $singleOption);
                $finalList = [];
                foreach ($compoundList as $element) {
                    $splitElements = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(':', $element);
                    $finalList[$splitElements[0]] = $splitElements[1] ? $splitElements[1] : $splitElements[0];
                }
                return $finalList;
                break;
                
            case 'list':
                $compoundList = $optionsArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $singleOption);
                $finalList = [];
                foreach ($compoundList as $key => $element) {
                    if ( count($keyValuePairs = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(':', $element)) > 1 ) {
                        $object = new \stdClass;
                        $object->value = $keyValuePairs[0];
                        $object->label = $keyValuePairs[1];
                        $finalList[] = $object;
                    } else {
                        $finalList[$element] = $element;
                    }
                }
                return $finalList;
                break;

            case 'selectFromRepository':
                $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
                $repositoryName = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, 'repository');
                $repository = $objectManager->get($repositoryName);

                if ($findByMethod = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, 'findByMethod')) {
                    $findByIntValue = (int) \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, 'findByIntValue');
                    $findByAdditionalArgument = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, 'findByAdditionalArgument');
                    
                    $additionalSearchValue = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $findByAdditionalArgument);
                    
                    if ($findByIntValue) {
                        $selectValues = $repository->{$findByMethod}($findByIntValue, $additionalSearchValue);
                    }
                } else {
                    $selectValues = $repository->findAll();
                }
                return $selectValues;
                
            case 'css':
                $styleList = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(';', $options);
                foreach ($styleList as $style) {
                    $splitStyle = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(':', $style);
                    if ($splitStyle[0] === $key ) {
                        return $splitStyle[1];
                    }
                }
                break;
                
            case 'appointment':
                $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
                $appointment = $objectManager->get(\CGB\Relax5core\Domain\Model\Appointment::class);
                
                $appointment->setSubject(self::render ($options, 'singleoptionvalue', 'defaultSubject', $data));
                $appointment->setAppointmentType(self::render ($options, 'singleoptionvalue', 'defaultAppointmentType', $data));
                $appointment->setAppointmentStatus(self::render ($options, 'singleoptionvalue', 'defaultAppointmentStatus', $data));
                $appointment->setAddress(self::render ($options, 'objectAccess', 'defaultAddress', $data));
                $appointment->setContact(self::render ($options, 'objectAccess', 'defaultContact', $data));
                $appointment->setName(self::render ($options, 'objectAccess', 'defaultName', $data));
                return $appointment;
                break;
            
            case 'objectAccess':
                $objectAccessor = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, $key);
                if (preg_match("/^\{([^\}]*)\}/", $objectAccessor, $matches)) {
                    return \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[1]);                
                }
                break;
            
            case 'value':
                
                // get the value entry from the action.options entries
                $value = \CGB\Relax5project\Service\ExecuteService::getSingleOption($options, 'value');

                // if element is in curly braces get the property path
                if (preg_match("/^\{([^\}]*)\}/", $value, $matches)) {
                    return \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[1]);
                    
                } elseif (preg_match("/^cost:(.*):(.*)/", $value, $matches)) {
                    $matchValue = self::matchValue($matches[1], $data);
                    foreach($data['project']->getCosts() as $obj) {
                        if ( ($obj->getKeycode() == $matchValue) && ! $obj->getVoid()) {
                            return \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty(['cost' => $obj], 'cost.' . $matches[2]);
                        }
                    }
                    return '';
                    
                } elseif (preg_match("/^find:([0-9]*):([a-zA-Z0-9\.]*)\s*\{([^\}]*)\}/", $value, $matches)) {
                    $obj = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[3]);

                    // get all project states
                    if ($obj instanceof \CGB\Relax5project\Domain\Model\Project) {
                        $allStates = $obj->getStates();
                        $currentState  = $obj->getCurrentState();
                    }
                    
                    // cycle all projectstates
                    foreach ($allStates as $state) {
                        if (($state !== $currentState) && ((int) $matches[1] == $state->getState()->getUid())) {
                            $returnValue =  \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty(['state' => $state], $matches[2]);
                        }
                    }
                    return $returnValue;
                    
                } elseif (preg_match("/^findByStateProperty:([0-9]*):([a-zA-Z0-9\.]*):([a-zA-Z0-9\.]*):([a-zA-Z0-9\.]*)\s*\{([^\}]*)\}/", $value, $matches)) {
                    /**
                     * syntax: findByStateProperty:<stateId>:<returnProperty>:<searchProperty>:<searchValue>
                     * returnProperty contains state ref, searchProperty NOT
                     * 
                     */
                    $stateId = $matches[1];
                    $returnProperty = $matches[2];
                    $searchProperty = $matches[3];
                    $searchValue = $matches[4];
                    $objName = $matches[5];

                    $obj = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $objName);

                    // get all project states
                    if ($obj instanceof \CGB\Relax5project\Domain\Model\Project) {
                        $allStates = $obj->getStates();
                        $currentState  = $obj->getCurrentState();
                    }

                    // cycle all projectstates
                    foreach ($allStates as $state) {
                        if (($state !== $currentState) && ($state->getState()) && ((int) $stateId == $state->getState()->getUid())) {
                            $searchPropertyValue = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty(['state' => $state], 'state.' . $searchProperty);
                            if ($searchPropertyValue == $searchValue) {
                                $returnValue =  \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty(['state' => $state], $returnProperty);
                            }
                        }
                    }
                    return $returnValue;
                    
                } elseif (preg_match("/^addinfo:([a-zA-Z0-9]*)\s*\{([^\}]*)\}/", $value, $matches)) {
                    $defaultValue = null;
                    $obj = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($data, $matches[2]);
                    $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
                    $addInfoViewHelper = $objectManager->get(\CGB\Relax5addinfo\ViewHelpers\AddInfoViewHelper::class);

                    // get all project states
                    if ($obj instanceof \CGB\Relax5project\Domain\Model\Project) {
                        $allStates = $obj->getStates();
                    }
                    
                    // get only current state
                    if ($obj instanceof \CGB\Relax5project\Domain\Model\State) {
                        $allStates = [0 => $obj];
                    }
                    
                    // cycle all projectstates
                    if (! is_null($allStates)) {
                        foreach ($allStates as $state) {
                            $addInfos = $addInfoViewHelper->render($state, $identifier = $matches[1]);
                            foreach ($addInfos as $addInfo) {
                                $defaultValue =  $addInfo->getValue();
                            }
                        }
                    } else {
                        $addInfos = $addInfoViewHelper->render($obj, $identifier = $matches[1]);
                        if (!is_null($addInfos[0])) {
                            $defaultValue =  $addInfos[0]->getValue();
                        }
                    }
                    
                    
                    return $defaultValue;
                }
                
                return $singleOption;
                
            case 'singleoptionvalue':
                return $singleOption;
                
            case 'intval':
                return (int) $singleOption;
                
            case 'bool':
                return (bool) $singleOption;
                
            default:
                return (string) $singleOption;
        }
	}

    
    /**
     * matchValue 
     * 
     * @param type $value
     * @param type $context
     * @param bool $quotes
     */
    static function matchValue ($value, $context, $quotes = false) {
        return preg_replace_callback(
            \CGB\Relax5core\Service\ObjectAccessService::PATTERN_OBJECT_ACCESSOR,
            function ($matches) use ($context){
                $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($context, $matches[1]);
                if (is_string($result) && $quotes) {
                    $result = "'" . (string) $result . "'";
                } elseif (is_string($result)) {
                    $result = (string) $result;
                } elseif (is_int($result)) {
                    $result = (string) $result;
                }
                return $result;
            },    
            $value, 
            -1, 
            $count
        );
    }
    
}
?>