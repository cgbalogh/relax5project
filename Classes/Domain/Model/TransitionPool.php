<?php
namespace CGB\Relax5project\Domain\Model;

/***
 *
 * This file is part of the "relax5project" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * TransitionPool
 */
class TransitionPool extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    const CONDITION_MODE_ALLOW = 1;

    const CONDITION_MODE_DENY = 2;

    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Allow For Project Owner
     *
     * @var bool
     */
    protected $allowProjectOwner = false;

    /**
     * Allow For State Owner
     *
     * @var bool
     */
    protected $allowStateOwner = false;

    /**
     * Allow For Parent Owner
     *
     * @var bool
     */
    protected $allowParentOwner = false;

    /**
     * Allow Once
     *
     * @var bool
     */
    protected $allowOnce = false;

    /**
     * Allow on Current State Only
     *
     * @var bool
     */
    protected $allowCurrentStateOnly = false;

    /**
     * Allow If Forwarded
     *
     * @var int
     */
    protected $allowIfForwarded = 0;

    /**
     * Allow With Appointment
     *
     * @var int
     */
    protected $allowWithAppointment = false;

    /**
     * Deny If Done
     *
     * @var bool
     */
    protected $denyIfDone = false;

    /**
     * Condition
     *
     * @var string
     */
    protected $conditionExpression = '';

    /**
     * Condition Mode
     *
     * @var int
     */
    protected $conditionMode = 0;

    /**
     * Condition Message
     *
     * @var string
     */
    protected $conditionMessage = '';

    /**
     * Debug
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Enable on Result
     *
     * @var int
     */
    protected $enableOnResult = 0;

    /**
     * Enable On Next Action
     *
     * @var int
     */
    protected $enableOnNextAction = 0;

    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $button = null;

    /**
     * Global
     *
     * @var bool
     */
    protected $global = false;

    /**
     * Actions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\ActionPool>
     * @lazy
     */
    protected $actions = null;

    /**
     * Next (or previous) State
     *
     * @var \CGB\Relax5project\Domain\Model\StatePool
     * @lazy
     */
    protected $nextstate = null;

    /**
     * Previous State
     *
     * @var \CGB\Relax5project\Domain\Model\StatePool
     * @lazy
     */
    protected $prevstate = null;

    /**
     * Allow For Users
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner>
     * @lazy
     */
    protected $allowUser = null;

    /**
     * Allow For Groups
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup>
     * @lazy
     */
    protected $allowGroup = null;

    /**
     * Meta
     *
     * @var bool
     */
    protected $meta = false;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->actions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->allowUser = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->allowGroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the nextstate
     *
     * @return \CGB\Relax5project\Domain\Model\StatePool $nextstate
     */
    public function getNextstate()
    {
        return $this->nextstate;
    }

    /**
     * Sets the nextstate
     *
     * @param \CGB\Relax5project\Domain\Model\StatePool $nextstate
     * @return void
     */
    public function setNextstate(\CGB\Relax5project\Domain\Model\StatePool $nextstate)
    {
        $this->nextstate = $nextstate;
    }

    /**
     * Returns the allowProjectOwner
     *
     * @return bool $allowProjectOwner
     */
    public function getAllowProjectOwner()
    {
        return $this->allowProjectOwner;
    }

    /**
     * Sets the allowProjectOwner
     *
     * @param bool $allowProjectOwner
     * @return void
     */
    public function setAllowProjectOwner($allowProjectOwner)
    {
        $this->allowProjectOwner = $allowProjectOwner;
    }

    /**
     * Returns the boolean state of allowProjectOwner
     *
     * @return bool
     */
    public function isAllowProjectOwner()
    {
        return $this->allowProjectOwner;
    }

    /**
     * Returns the allowStateOwner
     *
     * @return bool $allowStateOwner
     */
    public function getAllowStateOwner()
    {
        return $this->allowStateOwner;
    }

    /**
     * Sets the allowStateOwner
     *
     * @param bool $allowStateOwner
     * @return void
     */
    public function setAllowStateOwner($allowStateOwner)
    {
        $this->allowStateOwner = $allowStateOwner;
    }

    /**
     * Returns the boolean state of allowStateOwner
     *
     * @return bool
     */
    public function isAllowStateOwner()
    {
        return $this->allowStateOwner;
    }

    /**
     * Adds a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $allowUser
     * @return void
     */
    public function addAllowUser(\CGB\Relax5core\Domain\Model\Owner $allowUser)
    {
        $this->allowUser->attach($allowUser);
    }

    /**
     * Removes a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $allowUserToRemove The Owner to be removed
     * @return void
     */
    public function removeAllowUser(\CGB\Relax5core\Domain\Model\Owner $allowUserToRemove)
    {
        $this->allowUser->detach($allowUserToRemove);
    }

    /**
     * Returns the allowUser
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $allowUser
     */
    public function getAllowUser()
    {
        return $this->allowUser;
    }

    /**
     * Sets the allowUser
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $allowUser
     * @return void
     */
    public function setAllowUser(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $allowUser)
    {
        $this->allowUser = $allowUser;
    }

    /**
     * Adds a FrontendUserGroup
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $allowGroup
     * @return void
     */
    public function addAllowGroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $allowGroup)
    {
        $this->allowGroup->attach($allowGroup);
    }

    /**
     * Removes a FrontendUserGroup
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $allowGroupToRemove The FrontendUserGroup to be removed
     * @return void
     */
    public function removeAllowGroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $allowGroupToRemove)
    {
        $this->allowGroup->detach($allowGroupToRemove);
    }

    /**
     * Returns the allowGroup
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $allowGroup
     */
    public function getAllowGroup()
    {
        return $this->allowGroup;
    }

    /**
     * Sets the allowGroup
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $allowGroup
     * @return void
     */
    public function setAllowGroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $allowGroup)
    {
        $this->allowGroup = $allowGroup;
    }

    /**
     * Returns the allowParentOwner
     *
     * @return bool $allowParentOwner
     */
    public function getAllowParentOwner()
    {
        return $this->allowParentOwner;
    }

    /**
     * Sets the allowParentOwner
     *
     * @param bool $allowParentOwner
     * @return void
     */
    public function setAllowParentOwner($allowParentOwner)
    {
        $this->allowParentOwner = $allowParentOwner;
    }

    /**
     * Returns the boolean state of allowParentOwner
     *
     * @return bool
     */
    public function isAllowParentOwner()
    {
        return $this->allowParentOwner;
    }

    /**
     * Returns the allowOnce
     *
     * @return bool $allowOnce
     */
    public function getAllowOnce()
    {
        return $this->allowOnce;
    }

    /**
     * Sets the allowOnce
     *
     * @param bool $allowOnce
     * @return void
     */
    public function setAllowOnce($allowOnce)
    {
        $this->allowOnce = $allowOnce;
    }

    /**
     * Returns the boolean state of allowOnce
     *
     * @return bool
     */
    public function isAllowOnce()
    {
        return $this->allowOnce;
    }

    /**
     * Returns the allowCurrentStateOnly
     *
     * @return bool $allowCurrentStateOnly
     */
    public function getAllowCurrentStateOnly()
    {
        return $this->allowCurrentStateOnly;
    }

    /**
     * Sets the allowCurrentStateOnly
     *
     * @param bool $allowCurrentStateOnly
     * @return void
     */
    public function setAllowCurrentStateOnly($allowCurrentStateOnly)
    {
        $this->allowCurrentStateOnly = $allowCurrentStateOnly;
    }

    /**
     * Returns the boolean state of allowCurrentStateOnly
     *
     * @return bool
     */
    public function isAllowCurrentStateOnly()
    {
        return $this->allowCurrentStateOnly;
    }

    /**
     * Adds a ActionPool
     *
     * @param \CGB\Relax5project\Domain\Model\ActionPool $action
     * @return void
     */
    public function addAction(\CGB\Relax5project\Domain\Model\ActionPool $action)
    {
        $this->actions->attach($action);
    }

    /**
     * Removes a ActionPool
     *
     * @param \CGB\Relax5project\Domain\Model\ActionPool $actionToRemove The ActionPool to be removed
     * @return void
     */
    public function removeAction(\CGB\Relax5project\Domain\Model\ActionPool $actionToRemove)
    {
        $this->actions->detach($actionToRemove);
    }

    /**
     * Returns the actions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\ActionPool> $actions
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Sets the actions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\ActionPool> $actions
     * @return void
     */
    public function setActions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $actions)
    {
        $this->actions = $actions;
    }

    /**
     * Returns the debug
     *
     * @return bool $debug
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug
     *
     * @param bool $debug
     * @return void
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * Returns the boolean state of debug
     *
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * Returns the boolean state of allowWithAppointment
     *
     * @return bool
     */
    public function isAllowWithAppointment()
    {
        return $this->allowWithAppointment;
    }

    /**
     * Returns the enableOnResult
     *
     * @return int $enableOnResult
     */
    public function getEnableOnResult()
    {
        return $this->enableOnResult;
    }

    /**
     * Sets the enableOnResult
     *
     * @param int $enableOnResult
     * @return void
     */
    public function setEnableOnResult($enableOnResult)
    {
        $this->enableOnResult = $enableOnResult;
    }

    /**
     * Returns the enableOnNextAction
     *
     * @return int $enableOnNextAction
     */
    public function getEnableOnNextAction()
    {
        return $this->enableOnNextAction;
    }

    /**
     * Sets the enableOnNextAction
     *
     * @param int $enableOnNextAction
     * @return void
     */
    public function setEnableOnNextAction($enableOnNextAction)
    {
        $this->enableOnNextAction = $enableOnNextAction;
    }

    /**
     * Returns the prevstate
     *
     * @return \CGB\Relax5project\Domain\Model\StatePool prevstate
     */
    public function getPrevstate()
    {
        return $this->prevstate;
    }

    /**
     * Sets the prevstate
     *
     * @param \CGB\Relax5project\Domain\Model\StatePool $prevstate
     * @return void
     */
    public function setPrevstate(\CGB\Relax5project\Domain\Model\StatePool $prevstate)
    {
        $this->prevstate = $prevstate;
    }

    /**
     * Returns the allowIfForwarded
     *
     * @return int $allowIfForwarded
     */
    public function getAllowIfForwarded()
    {
        return $this->allowIfForwarded;
    }

    /**
     * Sets the allowIfForwarded
     *
     * @param int $allowIfForwarded
     * @return void
     */
    public function setAllowIfForwarded($allowIfForwarded)
    {
        $this->allowIfForwarded = $allowIfForwarded;
    }

    /**
     * Returns the button
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $button
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * Sets the button
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $button
     * @return void
     */
    public function setButton(\TYPO3\CMS\Extbase\Domain\Model\FileReference $button)
    {
        $this->button = $button;
    }

    /**
     * Returns the global
     *
     * @return bool $global
     */
    public function getGlobal()
    {
        return $this->global;
    }

    /**
     * Sets the global
     *
     * @param bool $global
     * @return void
     */
    public function setGlobal($global)
    {
        $this->global = $global;
    }

    /**
     * Returns the boolean state of global
     *
     * @return bool
     */
    public function isGlobal()
    {
        return $this->global;
    }

    /**
     * Returns the denyIfDone
     *
     * @return bool $denyIfDone
     */
    public function getDenyIfDone()
    {
        return $this->denyIfDone;
    }

    /**
     * Sets the denyIfDone
     *
     * @param bool $denyIfDone
     * @return void
     */
    public function setDenyIfDone($denyIfDone)
    {
        $this->denyIfDone = $denyIfDone;
    }

    /**
     * Returns the boolean state of denyIfDone
     *
     * @return bool
     */
    public function isDenyIfDone()
    {
        return $this->denyIfDone;
    }

    /**
     * Returns the conditionExpression
     *
     * @return string $conditionExpression
     */
    public function getConditionExpression()
    {
        return $this->conditionExpression;
    }

    /**
     * Sets the conditionExpression
     *
     * @param string $conditionExpression
     * @return void
     */
    public function setConditionExpression($conditionExpression)
    {
        $this->conditionExpression = $conditionExpression;
    }

    /**
     * Returns the conditionMode
     *
     * @return int $conditionMode
     */
    public function getConditionMode()
    {
        return $this->conditionMode;
    }

    /**
     * Sets the conditionMode
     *
     * @param int $conditionMode
     * @return void
     */
    public function setConditionMode($conditionMode)
    {
        $this->conditionMode = $conditionMode;
    }

    /**
     * Returns the conditionMessage
     *
     * @return string $conditionMessage
     */
    public function getConditionMessage()
    {
        return $this->conditionMessage;
    }

    /**
     * Sets the conditionMessage
     *
     * @param string $conditionMessage
     * @return void
     */
    public function setConditionMessage($conditionMessage)
    {
        $this->conditionMessage = $conditionMessage;
    }

    /**
     * Returns the allowWithAppointment
     *
     * @return int allowWithAppointment
     */
    public function getAllowWithAppointment()
    {
        return $this->allowWithAppointment;
    }

    /**
     * Sets the allowWithAppointment
     *
     * @param int $allowWithAppointment
     * @return void
     */
    public function setAllowWithAppointment($allowWithAppointment)
    {
        $this->allowWithAppointment = $allowWithAppointment;
    }

    /**
     * Returns the meta
     *
     * @return bool $meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Sets the meta
     *
     * @param bool $meta
     * @return void
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * Returns the boolean state of meta
     *
     * @return bool
     */
    public function isMeta()
    {
        return $this->meta;
    }
}
