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
 * State
 */
class State extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * CreateDate
     *
     * @var DateTime $crdate
     */
    protected $crdate = null;

    /**
     * TimeStamp
     *
     * @var DateTime $tstamp
     */
    protected $tstamp = null;

    /**
     * @var \CGB\Relax5project\Domain\Model\Project
     */
    protected $project = null;

    /**
     * @var int
     */
    protected $sorting = 0;

    /**
     * State Name
     *
     * @var string
     */
    protected $stateName = '';

    /**
     * State Group
     *
     * @var string
     */
    protected $stateGroup = '';

    /**
     * Due
     *
     * @var \DateTime
     */
    protected $due = null;

    /**
     * Due (orig.)
     *
     * @var \DateTime
     */
    protected $dueOrig = null;

    /**
     * Done
     *
     * @var \DateTime
     */
    protected $done = null;

    /**
     * Forward
     *
     * @var bool
     */
    protected $forward = false;

    /**
     * Rejected
     *
     * @var bool
     */
    protected $rejected = false;

    /**
     * Forward Date
     *
     * @var \DateTime
     */
    protected $forwardDate = null;

    /**
     * Notify Date
     *
     * @var \DateTime
     */
    protected $notifyDate = null;

    /**
     * Tag Data
     *
     * @var string
     */
    protected $tagData = '';

    /**
     * Data
     *
     * @var string
     */
    protected $data = '';

    /**
     * Number
     *
     * @var int
     */
    protected $number = 0;

    /**
     * Appointments
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Appointment>
     * @cascade remove
     * @lazy
     */
    protected $appointments = null;

    /**
     * State
     *
     * @var \CGB\Relax5project\Domain\Model\StatePool
     * @lazy
     */
    protected $state = null;

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * Usergroup
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
     * @lazy
     */
    protected $usergroup = null;

    /**
     * Additional Infos
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AdditionalInfo>
     * @cascade remove
     * @lazy
     */
    protected $additionalInfos = null;

    /**
     * Forwarder
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $forwarder = null;

    /**
     * Responsibilities
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Responsibility>
     * @cascade remove
     * @lazy
     */
    protected $responsibilities = null;

    /**
     * Notify Times
     *
     * @var int
     */
    protected $notifyTimes = 0;

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
        $this->appointments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->additionalInfos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->responsibilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Appointment
     *
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @return void
     */
    public function addAppointment(\CGB\Relax5project\Domain\Model\Appointment $appointment)
    {
        // set person or company as owner of appointment depending on project parent
        if (!$appointment->getPerson() && !$appointment->getCompany() && $this->project) {
            $parent = $this->project->getParent();
            if ($parent instanceof \CGB\Relax5core\Domain\Model\Person) {
                $appointment->setPerson($parent);
            }
            if ($parent instanceof \CGB\Relax5core\Domain\Model\Company) {
                $appointment->setCompany($parent);
            }
        }
        $this->appointments->attach($appointment);
    }

    /**
     * Removes a Appointment
     *
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointmentToRemove The Appointment to be removed
     * @return void
     */
    public function removeAppointment(\CGB\Relax5project\Domain\Model\Appointment $appointmentToRemove)
    {
        $this->appointments->detach($appointmentToRemove);
    }

    /**
     * Returns the appointments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Appointment> $appointments
     */
    public function getAppointments()
    {
        return $this->appointments;
    }

    /**
     * Sets the appointments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Appointment> $appointments
     * @return void
     */
    public function setAppointments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $appointments)
    {
        $this->appointments = $appointments;
    }

    /**
     * Returns the stateName
     *
     * @return string $stateName
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * Sets the stateName
     *
     * @param string $stateName
     * @return void
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;
    }

    /**
     * Returns the stateGroup
     *
     * @return string $stateGroup
     */
    public function getStateGroup()
    {
        return $this->stateGroup;
    }

    /**
     * Sets the stateGroup
     *
     * @param string $stateGroup
     * @return void
     */
    public function setStateGroup($stateGroup)
    {
        $this->stateGroup = $stateGroup;
    }

    /**
     * Returns the due
     *
     * @return \DateTime $due
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * Sets the due
     *
     * @param \DateTime $due
     * @return void
     */
    public function setDue($due = null)
    {
        $this->due = $due;
    }

    /**
     * Returns the dueOrig
     *
     * @return \DateTime $dueOrig
     */
    public function getDueOrig()
    {
        return $this->dueOrig;
    }

    /**
     * Sets the dueOrig
     *
     * @param \DateTime $dueOrig
     * @return void
     */
    public function setDueOrig($dueOrig = null)
    {
        $this->dueOrig = $dueOrig;
    }

    /**
     * Returns the done
     *
     * @return \DateTime $done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Sets the done
     *
     * @param \DateTime $done
     * @return void
     */
    public function setDone($done = null)
    {
        $this->done = $done;
    }

    /**
     * Returns the state
     *
     * @return \CGB\Relax5project\Domain\Model\StatePool state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the state
     *
     * @param string $state
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the owner
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $owner
     * @return void
     */
    public function setOwner($owner = null)
    {
        $this->owner = $owner;
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return bool
     */
    public function getIsCurrentState()
    {
        if ($this->project) {
            $currentState = $this->project->getCurrentState();
            return $this->getUid() == $currentState->getUid();
        } else {
            return null;
        }
    }

    /**
     * @return bool
     */
    public function isCurrentState()
    {
        return $this->getIsCurrentState();
    }

    /**
     * @return bool
     */
    public function getIsInitialState()
    {
        if ($this->project) {
            $initialState = $this->project->getInitialState();
            return $this->getUid() == $initialState->getUid();
        } else {
            return null;
        }
    }

    /**
     * Returns the usergroup
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Sets the usergroup
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     * @return void
     */
    public function setUsergroup($usergroup = null)
    {
        $this->usergroup = $usergroup;
    }

    /**
     * @return int
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param int $sorting
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AdditionalInfo>
     */
    function getAdditionalInfos()
    {
        return $this->additionalInfos;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AdditionalInfo> $additionalInfos
     */
    function setAdditionalInfos(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $additionalInfos)
    {
        $this->additionalInfos = $additionalInfos;
    }

    /**
     * Adds a AdditionalInfo
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo
     * @return void
     */
    public function addAdditionalInfo(\CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo)
    {
        $this->additionalInfos->attach($additionalInfo);
    }

    /**
     * Removes a AdditionalInfo
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfoToRemove The AdditionalInfo to be removed
     * @return void
     */
    public function removeAdditionalInfo(\CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfoToRemove)
    {
        $this->states->detach($additionalInfoToRemove);
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\DateTime
     */
    function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\DateTime
     */
    function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Returns the forwardDate
     *
     * @return \DateTime forwardDate
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * Sets the forwardDate
     *
     * @param \DateTime $forwardDate
     * @return void
     */
    public function setForwardDate($forwardDate = null)
    {
        $this->forwardDate = $forwardDate;
    }

    /**
     * Returns the notifyDate
     *
     * @return \DateTime notifyDate
     */
    public function getNotifyDate()
    {
        return $this->notifyDate;
    }

    /**
     * Sets the notifyDate
     *
     * @param \DateTime $notifyDate
     * @return void
     */
    public function setNotifyDate($notifyDate = null)
    {
        $this->notifyDate = $notifyDate;
    }

    /**
     * Returns the forward
     *
     * @return bool $forward
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * Sets the forward
     *
     * @param bool $forward
     * @return void
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
    }

    /**
     * Returns the boolean state of forward
     *
     * @return bool
     */
    public function isForward()
    {
        return $this->forward;
    }

    /**
     * Returns the forwarder
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $forwarder
     */
    public function getForwarder()
    {
        return $this->forwarder;
    }

    /**
     * Sets the forwarder
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $forwarder
     * @return void
     */
    public function setForwarder($forwarder = null)
    {
        $this->forwarder = $forwarder;
    }

    /**
     * Returns the rejected
     *
     * @return bool $rejected
     */
    public function getRejected()
    {
        return $this->rejected;
    }

    /**
     * Sets the rejected
     *
     * @param bool $rejected
     * @return void
     */
    public function setRejected($rejected)
    {
        $this->rejected = $rejected;
    }

    /**
     * Returns the boolean state of rejected
     *
     * @return bool
     */
    public function isRejected()
    {
        return $this->rejected;
    }

    /**
     * Returns the tagData
     *
     * @return string $tagData
     */
    public function getTagData()
    {
        return $this->tagData;
    }

    /**
     * Sets the tagData
     *
     * @param string $tagData
     * @return void
     */
    public function setTagData($tagData)
    {
        $this->tagData = $tagData;
    }

    /**
     * Adds a Responsibility
     *
     * @param \CGB\Relax5project\Domain\Model\Responsibility $responsibility
     * @return void
     */
    public function addResponsibility(\CGB\Relax5project\Domain\Model\Responsibility $responsibility)
    {
        $this->responsibilities->attach($responsibility);
    }

    /**
     * Removes a Responsibility
     *
     * @param \CGB\Relax5project\Domain\Model\Responsibility $responsibilityToRemove The Responsibility to be removed
     * @return void
     */
    public function removeResponsibility(\CGB\Relax5project\Domain\Model\Responsibility $responsibilityToRemove)
    {
        $this->responsibilities->detach($responsibilityToRemove);
    }

    /**
     * Returns the responsibilities
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Responsibility> $responsibilities
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    /**
     * Sets the responsibilities
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Responsibility> $responsibilities
     * @return void
     */
    public function setResponsibilities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $responsibilities)
    {
        $this->responsibilities = $responsibilities;
    }

    /**
     * Returns the data
     *
     * @return string $data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the data
     *
     * @param string $data
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Returns the data as array
     *
     * @return array
     */
    public function getDataArray()
    {
        if (is_array($dataArray = unserialize($this->data))) {
            return $dataArray;
        }
        return [];
    }

    /**
     * @param string $stateUid
     */
    public function hasResponsibility($id)
    {
        foreach ($this->responsibilities as $responsibility) {
            if ($responsibility->getId() == $id) {
                return true;
            }
        }
        return false;
    }

    /**
     * Returns the number
     *
     * @return int $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
