<?php
namespace CGB\Relax5project\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Parser\BooleanParser;
use TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\BooleanNode;
use TYPO3Fluid\Fluid\Core\Parser\TemplateParser;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

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
class ActionDisplayViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * addAttributeRepository
     *
     * @var \CGB\Relax5addinfo\Domain\Repository\AddAttributeRepository
     * @inject
     */
    protected $addAttributeRepository = null;

    /**
     *
     * @var array $context 
     */
    var $context = [];
    
    /**
     *
     * @var array $transitionlist 
     */
    static $transitionlist = [];

    /**
     *
     * @var array $transitionlistNames 
     */
    static $transitionlistNames = [];
    
	/**
	* @param \CGB\Relax5project\Domain\Model\Project $project
	* @param \CGB\Relax5project\Domain\Model\State $projectstate
	* @param \CGB\Relax5project\Domain\Model\TranisitionPool $transition
    * @param int $feUserUid 
    * @param array $feUsergroupUids 
    * @param string mode
	* @return mixed
	*/
	public function render (
            \CGB\Relax5project\Domain\Model\Project $project, 
            \CGB\Relax5project\Domain\Model\State $projectstate = null,
            \CGB\Relax5project\Domain\Model\TransitionPool $transition,
            int $feUserUid = 0,
            array $feUsergroupUids = [],
            $mode = ''
        ) {
        
        // TODO:
        /*
         * intended functions: 
         * DEBUG mode for certain users to show all possible actions
         * SUDEBUG mode to show all actions for a certain user
         * SULIVE mode to show all available actions for a certain user
         * LIVE standard mode to show available actions for user, usergroup, first usergroup
         */

        
        $additionalDefinitions = (string) $projectstate;
        $addinfos = $this->addAttributeRepository->findByParentObject($additionalDefinitions);
        foreach ($addinfos as $singleAddinfo) { 
            $key = explode('.', $singleAddinfo->getReference());
            $additionalInfos[$key[1]] = $singleAddinfo->getValue();
        }
        
        $this->context = [
            'project' => $project,
            'projectstate' => $projectstate,
            'transition' => $transition,
            'addinfos' => $additionalInfos,
        ];
        
        // disable button if denyIfDOne is set and done is not empty
        if ($transition->getDenyIfDone() && $projectstate->getDone()) {
            return false;
        }
        // disable button if allowCurrentStateOnly is set, but this is not the currentstate
        if ($transition->getAllowCurrentStateOnly() && $projectstate && ! $projectstate->isCurrentState()) {
            return false;
        }
        
        // disallow if forwarder == 1 and forwardDate already set
        if ( ($transition->getAllowIfForwarded() == 1) && (!empty($projectstate->getForwardDate()))) {
            return false;
        }

        // disallow if forwarder == 2 and forwardDate not set
        if ( ($transition->getAllowIfForwarded() == 2) && (empty($projectstate->getForwardDate()))) {
            return false;
        }

        $allow = false;
        // enable button if allowStateOwner and matches feUserUid
        if ($transition->getAllowStateOwner() && $projectstate && ($projectstate->getOwner() && ($projectstate->getOwner()->getUid()) == $feUserUid) ) {
            $allow = true;
        }
        
        // enable button if allowProjectOwner and matches feUserUid
        if ($transition->getAllowProjectOwner() && ($project->getOwner() && ($project->getOwner()->getUid()) == $feUserUid) ) {
            $allow |= true;
        }
   
        // enable button if allowProjectOwner and matches feUserUid
        if ($transition->getAllowParentOwner() && ($project->getParent() && ($project->getParent()->getOwner()) && ($project->getParent()->getOwner()->getUid()) == $feUserUid) ) {
            $allow |= true;
        }

        // enable button if group permissions are set and at least one group matches
        if ($transition->getAllowGroup()->count() > 0) {
            $allowedGroupUids = [];
            foreach ($transition->getAllowGroup() as $group) {
                $allowedGroupUids[] = $group->getUid();
            }
            if (count(array_intersect($allowedGroupUids, $feUsergroupUids)) > 0) {
                $allow |= true;
            } 
        }

        // enable button if user permissions are set and user matches
        if ($transition->getAllowUser()->count() > 0) {
            $allowedUserUids = [];
            foreach ($transition->getAllowUser() as $user) {
                $allowedUserUids[] = $user->getUid();
            }
            if (count(array_intersect($allowedUserUids, [$feUserUid])) > 0) {
                $allow |= true;
            } 
        }

        // disable button, if allowOnce is set and 
        if ($transition->getAllowOnce() && ($mode == '')) {
            self::$transitionlist[$transition->getUid()]++;
            self::$transitionlistNames[$transition->getName()]++;
            if (self::$transitionlist[$transition->getUid()] > 1)  {
                $allow = false;
            }
            if (self::$transitionlistNames[$transition->getName()] > 1)  {
                $allow = false;
            }
        }

        if ($condition = $transition->getConditionExpression()) {
            $returnValue = preg_replace_callback(
                \CGB\Relax5core\Service\ObjectAccessService::PATTERN_OBJECT_ACCESSOR,
                [$this, 
                'replaceObjectIdentifier'], 
                $condition, 
                -1, 
                $count
            );
            
            $booleanParser = new BooleanParser;
            $result = $booleanParser->evaluate($returnValue, $this->context);

            if ($transition->getConditionMode() == \CGB\Relax5project\Domain\Model\TransitionPool::CONDITION_MODE_ALLOW) {
                $allow |= $result;
                if (($mode == 'message') && !$result) {
                    return $transition->getConditionMessage();
                }
            }

            if ($transition->getConditionMode() == \CGB\Relax5project\Domain\Model\TransitionPool::CONDITION_MODE_DENY) {
                $allow &= !$result;
                if (($mode == 'message') && $result) {
                    return $transition->getConditionMessage();
                }
            }
        }

        if (
            $transition->getGlobal() && 
            ! $transition->getAllowStateOwner() && 
            ! $transition->getAllowProjectOwner() && 
            ! $transition->getAllowParentOwner() &&
            ($transition->getAllowGroup()->count() == 0)
            ) {
            $allow |= true;
        }
        return ($mode == 'message') ? '' : $allow;
        
	}
    
    
    private function replaceObjectIdentifier($matches) {
        $result = \CGB\Relax5core\Service\ObjectAccessService::getObjectProperty($this->context, $matches[1]);
        if (is_null($result)) {
            $result = "''";
        } elseif (is_string($result)) {
            $result = "'" . (string) $result . "'";
        } elseif (is_int($result)) {
            $result = (string) $result;
        }
        return $result;
    }
    
}
?>