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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var DateTime
     */
    protected $crdate = null;

    /**
     * @var DateTime
     */
    protected $tstamp = null;

    /**
     * Parent Project
     *
     * @var \CGB\Relax5project\Domain\Model\Project
     */
    protected $project = null;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Time Horizon
     *
     * @var string
     */
    protected $timeHorizon = '';

    /**
     * Operative Start
     *
     * @var \DateTime
     */
    protected $operativeStart = null;

    /**
     * Operative Start Latest
     *
     * @var \DateTime
     */
    protected $operativeStartLatest = null;

    /**
     * Operative End
     *
     * @var \DateTime
     */
    protected $operativeEnd = null;

    /**
     * Target
     *
     * @var float
     */
    protected $target = 0.0;

    /**
     * Actual
     *
     * @var float
     */
    protected $actual = 0.0;

    /**
     * Permissions
     *
     * @var int
     */
    protected $permissions = 0;

    /**
     * AutoName
     *
     * @var bool
     */
    protected $autoName = false;

    /**
     * Clone
     *
     * @var bool
     */
    protected $clone = false;

    /**
     * Mockup
     *
     * @var bool
     */
    protected $mockup = false;

    /**
     * Appointments
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Appointment>
     * @cascade remove
     * @lazy
     */
    protected $appointments = null;

    /**
     * States
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\State>
     * @cascade remove
     * @lazy
     */
    protected $states = null;

    /**
     * Person
     *
     * @var \CGB\Relax5core\Domain\Model\Person
     * @lazy
     */
    protected $person = null;

    /**
     * Company
     *
     * @var \CGB\Relax5core\Domain\Model\Person
     * @lazy
     */
    protected $company = null;

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
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
     * Productgroup
     *
     * @var \CGB\Relax5project\Domain\Model\Productgroup
     * @lazy
     */
    protected $productgroup = null;

    /**
     * Product
     *
     * @var \CGB\Relax5project\Domain\Model\Product
     * @lazy
     */
    protected $product = null;

    /**
     * Mappings
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Mapping>
     * @cascade remove
     * @lazy
     */
    protected $mappings = null;

    /**
     * Project Address
     *
     * @var \CGB\Relax5core\Domain\Model\Address
     * @lazy
     */
    protected $address = null;

    /**
     * Costs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Cost>
     * @cascade remove
     * @lazy
     */
    protected $costs = null;

    /**
     * Child Projects
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Project>
     * @cascade remove
     * @lazy
     */
    protected $childProjects = null;

    /**
     * Current State
     *
     * @var \CGB\Relax5project\Domain\Model\State
     * @lazy
     */
    protected $currentState = null;

    /**
     * Roles
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Role>
     * @cascade remove
     * @lazy
     */
    protected $roles = null;

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
        $this->states = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->mappings = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->costs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->childProjects = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->roles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Appointment
     *
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @return void
     */
    public function addAppointment(\CGB\Relax5project\Domain\Model\Appointment $appointment)
    {
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
     * Adds a Role
     *
     * @param \CGB\Relax5project\Domain\Model\Role $role
     * @return void
     */
    public function addRole(\CGB\Relax5project\Domain\Model\Role $role)
    {
        $this->roles->attach($role);
    }

    /**
     * Removes a Role
     *
     * @param \CGB\Relax5project\Domain\Model\Role $roleToRemove The Role to be removed
     * @return void
     */
    public function removeRole(\CGB\Relax5project\Domain\Model\Role $roleToRemove)
    {
        $this->roles->detach($roleToRemove);
    }

    /**
     * Returns the roles
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Role> $roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Sets the roles
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Role> $roles
     * @return void
     */
    public function setRoles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Adds a State
     *
     * @param \CGB\Relax5project\Domain\Model\State $state
     * @return void
     */
    public function addState(\CGB\Relax5project\Domain\Model\State $state)
    {
        $lastState = $this->hasLastState($state->getState()->getUid());
        if ($lastState) {
            $state->setNumber($lastState->getNumber() + 1);
        } else {
            $state->setNumber(1);
        }
        $this->states->attach($state);
    }

    /**
     * Removes a State
     *
     * @param \CGB\Relax5project\Domain\Model\State $stateToRemove The State to be removed
     * @return void
     */
    public function removeState(\CGB\Relax5project\Domain\Model\State $stateToRemove)
    {
        $this->states->detach($stateToRemove);
    }

    /**
     * Returns the states
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\State> $states
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Sets the states
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\State> $states
     * @return void
     */
    public function setStates(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $states)
    {
        $this->states = $states;
    }

    /**
     * Adds a Cost
     *
     * @param \CGB\Relax5project\Domain\Model\Cost $cost
     * @return void
     */
    public function addCost(\CGB\Relax5project\Domain\Model\Cost $cost)
    {
        $this->costs->attach($cost);
    }

    /**
     * Removes a Cost
     *
     * @param \CGB\Relax5project\Domain\Model\Cost $costToRemove The Cost to be removed
     * @return void
     */
    public function removeCost(\CGB\Relax5project\Domain\Model\Cost $costToRemove)
    {
        $this->costs->detach($costToRemove);
    }

    /**
     * Returns the costs
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Cost> $costs
     */
    public function getCosts()
    {
        return $this->costs;
    }

    /**
     * Sets the costs
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Cost> $costs
     * @return void
     */
    public function setCosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $costs)
    {
        $this->costs = $costs;
    }

    /**
     * Returns the person
     *
     * @return \CGB\Relax5core\Domain\Model\Person $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the person
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @return void
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * Returns the company
     *
     * @return \CGB\Relax5core\Domain\Model\Company $company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the company
     *
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @return void
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getName() : null;
        }        
        if (!$this->name && $this->productgroup) {
            return $this->productgroup->getName() . ' ' . ($this->product ? $this->product->getName() : '');
        }
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
        if ($this->clone) {
            return $this->project ? $this->project->getDescription() : null;
        }        
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
     * Returns the timeHorizon
     *
     * @return string $timeHorizon
     */
    public function getTimeHorizon()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getTimeHorizon() : null;
        }        
        return $this->timeHorizon;
    }

    /**
     * Sets the timeHorizon
     *
     * @param string $timeHorizon
     * @return void
     */
    public function setTimeHorizon($timeHorizon)
    {
        $this->timeHorizon = $timeHorizon;
    }

    /**
     * Returns the operativeStart
     *
     * @return \DateTime|null $operativeStart
     */
    public function getOperativeStart()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getOperativeStart() : null;
        }
        return $this->operativeStart;
    }

    /**
     * Sets the operativeStart
     *
     * @param \DateTime|null $operativeStart
     * @return void
     */
    public function setOperativeStart($operativeStart)
    {
        $this->operativeStart = $operativeStart;
    }

    /**
     * Returns the operativeEnd
     *
     * @return \DateTime|null $operativeEnd
     */
    public function getOperativeEnd()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getOperativeEnd() : null;
        }        
        return $this->operativeEnd;
    }

    /**
     * Sets the operativeEnd
     *
     * @param \DateTime|null $operativeEnd
     * @return void
     */
    public function setOperativeEnd($operativeEnd)
    {
        $this->operativeEnd = $operativeEnd;
    }

    /**
     * Returns the target
     *
     * @return float $target
     */
    public function getTarget()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getTarget() : null;
        }        
        return $this->target;
    }

    /**
     * Sets the target
     *
     * @param float $target
     * @return void
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * Returns the actual
     *
     * @return float $actual
     */
    public function getActual()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getActual() : null;
        }        
        return $this->actual;
    }

    /**
     * Sets the actual
     *
     * @param float $actual
     * @return void
     */
    public function setActual($actual)
    {
        $this->actual = $actual;
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
     * @param \CGB\Relax5core\Domain\Model\Owner|null $owner
     * @return void
     */
    public function setOwner(\CGB\Relax5core\Domain\Model\Owner $owner = null)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the initialState
     * this is the first element in the statelist
     *
     * @return \CGB\Relax5project\Domain\Model\State $initialState
     */
    public function getInitialState()
    {
        $this->states->rewind();
        return $this->states->current();
    }

    /**
     * Returns the currentState
     * this is the last or current element in the statelist
     *
     * @return \CGB\Relax5project\Domain\Model\State
     */
    public function getCurrentState()
    {
        $states = $this->states->toArray();
        while ($lastState = array_pop($states)) {
            if (!$lastState->getRejected()) {
                return $lastState;
            }
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
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup|null $usergroup
     * @return void
     */
    public function setUsergroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup = null)
    {
        $this->usergroup = $usergroup;
    }

    /**
     * Returns the productgroup
     *
     * @return \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     */
    public function getProductgroup()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getProductgroup() : null;
        }        
        return $this->productgroup;
    }

    /**
     * Sets the productgroup
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @return void
     */
    public function setProductgroup($productgroup)
    {
        $this->productgroup = $productgroup;
    }

    /**
     * Returns the product
     *
     * @return \CGB\Relax5project\Domain\Model\Product $product
     */
    public function getProduct()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getProduct() : null;
        }
        return $this->product;
    }

    /**
     * Sets the product
     *
     * @param \CGB\Relax5project\Domain\Model\Product $product
     * @return void
     */
    public function setProduct(\CGB\Relax5project\Domain\Model\Product $product)
    {
        $this->product = $product;
    }

    /**
     * Adds a Mapping
     *
     * @param \CGB\Relax5project\Domain\Model\Mapping $mapping
     * @return void
     */
    public function addMapping(\CGB\Relax5project\Domain\Model\Mapping $mapping)
    {
        $this->mappings->attach($mapping);
    }

    /**
     * Removes a Mapping
     *
     * @param \CGB\Relax5project\Domain\Model\Mapping $mappingToRemove The Mapping to be removed
     * @return void
     */
    public function removeMapping(\CGB\Relax5project\Domain\Model\Mapping $mappingToRemove)
    {
        $this->mappings->detach($mappingToRemove);
    }

    /**
     * Returns the mappings
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Mapping> $mappings
     */
    public function getMappings()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getMappings() : null;
        }        
        return $this->mappings;
    }

    /**
     * Sets the mappings
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Mapping> $mappings
     * @return void
     */
    public function setMappings(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $mappings)
    {
        $this->mappings = $mappings;
    }

    /**
     * Get a certain mapping
     *
     * @param integer $productoptionUid
     * @return void
     */
    public function getMappingToProductoption($productoptionUid)
    {
        foreach ($this->mappings as $mapping) {
            if ($mapping->getProductoption() && $mapping->getProductoption()->getUid() == $productoptionUid) {
                return $mapping;
            }
        }
        return null;
    }

    /**
     * Get a certain mapping
     *
     * @param integer $productoptionUid
     * @return void
     */
    public function getMappingToSubproduct($subproductUid)
    {
        foreach ($this->mappings as $mapping) {
            if ($mapping->getSubproduct() && $mapping->getSubproduct()->getUid() == $subproductUid) {
                return $mapping;
            }
        }
        return null;
    }

    /**
     * Returns the permissions
     *
     * @return int $permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Sets the permissions
     *
     * @param int $permissions
     * @return void
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return DateTime
     */
    function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @return DateTime
     */
    function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Returns the address
     *
     * @return \CGB\Relax5core\Domain\Model\Address $address
     */
    public function getAddress()
    {
        if ($this->clone) {
            return $this->project ? $this->project->getAddress() : null;
        }        
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @return void
     */
    public function setAddress(\CGB\Relax5core\Domain\Model\Address $address)
    {
        $this->address = $address;
    }

    /**
     * Returns the operativeStartLatest
     *
     * @return \DateTime $operativeStartLatest
     */
    public function getOperativeStartLatest()
    {
        return $this->operativeStartLatest;
    }

    /**
     * Sets the operativeStartLatest
     *
     * @param \DateTime|null $operativeStartLatest
     * @return void
     */
    public function setOperativeStartLatest($operativeStartLatest)
    {
        $this->operativeStartLatest = $operativeStartLatest;
    }

    /**
     * Returns the autoName
     *
     * @return bool $autoName
     */
    public function getAutoName()
    {
        return $this->autoName;
    }

    /**
     * Sets the autoName
     *
     * @param bool $autoName
     * @return void
     */
    public function setAutoName($autoName)
    {
        $this->autoName = $autoName;
    }

    /**
     * Returns the boolean state of autoName
     *
     * @return bool
     */
    public function isAutoName()
    {
        return $this->autoName;
    }

    /**
     * @return type
     */
    public function getParent()
    {
        if ($this->person) {
            return $this->person;
        } elseif ($this->company) {
            return $this->company;
        } else {
            return null;
        }
    }

    /**
     * Returns the clone
     *
     * @return bool $clone
     */
    public function getClone()
    {
        return $this->clone;
    }

    /**
     * Sets the clone
     *
     * @param bool $clone
     * @return void
     */
    public function setClone($clone)
    {
        $this->clone = $clone;
    }

    /**
     * Returns the boolean state of clone
     *
     * @return bool
     */
    public function isClone()
    {
        return $this->clone;
    }

    /**
     * Adds a Project
     *
     * @param \CGB\Relax5project\Domain\Model\Project $childProject
     * @return void
     */
    public function addChildProject(\CGB\Relax5project\Domain\Model\Project $childProject)
    {
        $this->childProjects->attach($childProject);
    }

    /**
     * Removes a Project
     *
     * @param \CGB\Relax5project\Domain\Model\Project $childProjectToRemove The Project to be removed
     * @return void
     */
    public function removeChildProject(\CGB\Relax5project\Domain\Model\Project $childProjectToRemove)
    {
        $this->childProjects->detach($childProjectToRemove);
    }

    /**
     * Returns the childProjects
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Project> $childProjects
     */
    public function getChildProjects()
    {
        return $this->childProjects;
    }

    /**
     * Sets the childProjects
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Project> $childProjects
     * @return void
     */
    public function setChildProjects(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $childProjects)
    {
        $this->childProjects = $childProjects;
    }

    /**
     * Sets the currentState
     *
     * @param \CGB\Relax5project\Domain\Model\State $currentState
     * @return void
     */
    public function setCurrentState(\CGB\Relax5project\Domain\Model\State $currentState)
    {
        $this->currentState = $currentState;
    }

    /**
     * @return type
     */
    public function getTotalTarget()
    {
        $total = 0;
        foreach ($this->costs as $cost) {
            if (!$cost->getVoid()) {
                $total += $cost->getTarget();
            }
        }
        return $total;
    }

    /**
     * @return type
     */
    public function getTotalActual()
    {
        $total = 0;
        foreach ($this->costs as $cost) {
            if (!$cost->getVoid()) {
                $total += $cost->getActual();
            }
        }
        return $total;
    }

    /**
     * @param int $stateUid
     */
    public function hasState($stateUid)
    {
        foreach ($this->states as $projectstate) {
            if ($projectstate->getState() && $projectstate->getState()->getUid() == $stateUid) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param int $stateUid
     */
    public function hasUndoneState($stateUid = 0)
    {
        foreach ($this->states as $projectstate) {
            if ($projectstate->getState() && $projectstate->getState()->getUid() == $stateUid && !$projectstate->getDone()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param int $stateUid
     */
    public function hasLastState($stateUid = 0)
    {
        $lastState = null;
        foreach ($this->states as $projectstate) {
            if ($projectstate->getState() && $projectstate->getState()->getUid() == $stateUid) {
                $lastState = $projectstate;
            }
        }
        return $lastState;
    }

    /**
     * @param int $stateUid
     */
    public function hasAnyState($stateUid = 0)
    {
        foreach ($this->states as $projectstate) {
            if ($projectstate->getState() && $projectstate->getState()->getUid() == $stateUid) {
                return true;
            }
        }
        foreach ($this->childProjects as $project) {
            if ($project->hasAnyState($stateUid)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param int $productoptionUid
     */
    public function hasProductoption($productoptionUid)
    {
        foreach ($this->mappings as $mapping) {
            if ($mapping->getProductoption() && $mapping->getProductoption()->getUid() == $productoptionUid) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $id
     */
    public function hasResponsibility($id)
    {
        foreach ($this->states as $projectstate) {
            foreach ($projectstate->getResponsibilities() as $responsibility) {
                if ($responsibility->getId() == $id) {
                    return $responsibility;
                }
            }
        }
        return null;
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
