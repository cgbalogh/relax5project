<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Project
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Project();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTimeHorizonReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTimeHorizon()
        );
    }

    /**
     * @test
     */
    public function setTimeHorizonForStringSetsTimeHorizon()
    {
        $this->subject->setTimeHorizon('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'timeHorizon',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOperativeStartReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getOperativeStart()
        );
    }

    /**
     * @test
     */
    public function setOperativeStartForDateTimeSetsOperativeStart()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setOperativeStart($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'operativeStart',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOperativeStartLatestReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getOperativeStartLatest()
        );
    }

    /**
     * @test
     */
    public function setOperativeStartLatestForDateTimeSetsOperativeStartLatest()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setOperativeStartLatest($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'operativeStartLatest',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOperativeEndReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getOperativeEnd()
        );
    }

    /**
     * @test
     */
    public function setOperativeEndForDateTimeSetsOperativeEnd()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setOperativeEnd($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'operativeEnd',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTargetReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getTarget()
        );
    }

    /**
     * @test
     */
    public function setTargetForFloatSetsTarget()
    {
        $this->subject->setTarget(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'target',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getActualReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getActual()
        );
    }

    /**
     * @test
     */
    public function setActualForFloatSetsActual()
    {
        $this->subject->setActual(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'actual',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getPermissionsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPermissions()
        );
    }

    /**
     * @test
     */
    public function setPermissionsForIntSetsPermissions()
    {
        $this->subject->setPermissions(12);

        self::assertAttributeEquals(
            12,
            'permissions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAutoNameReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAutoName()
        );
    }

    /**
     * @test
     */
    public function setAutoNameForBoolSetsAutoName()
    {
        $this->subject->setAutoName(true);

        self::assertAttributeEquals(
            true,
            'autoName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCloneReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getClone()
        );
    }

    /**
     * @test
     */
    public function setCloneForBoolSetsClone()
    {
        $this->subject->setClone(true);

        self::assertAttributeEquals(
            true,
            'clone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMockupReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMockup()
        );
    }

    /**
     * @test
     */
    public function setMockupForBoolSetsMockup()
    {
        $this->subject->setMockup(true);

        self::assertAttributeEquals(
            true,
            'mockup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAppointmentsReturnsInitialValueForAppointment()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAppointments()
        );
    }

    /**
     * @test
     */
    public function setAppointmentsForObjectStorageContainingAppointmentSetsAppointments()
    {
        $appointment = new \CGB\Relax5project\Domain\Model\Appointment();
        $objectStorageHoldingExactlyOneAppointments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAppointments->attach($appointment);
        $this->subject->setAppointments($objectStorageHoldingExactlyOneAppointments);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAppointments,
            'appointments',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAppointmentToObjectStorageHoldingAppointments()
    {
        $appointment = new \CGB\Relax5project\Domain\Model\Appointment();
        $appointmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($appointment));
        $this->inject($this->subject, 'appointments', $appointmentsObjectStorageMock);

        $this->subject->addAppointment($appointment);
    }

    /**
     * @test
     */
    public function removeAppointmentFromObjectStorageHoldingAppointments()
    {
        $appointment = new \CGB\Relax5project\Domain\Model\Appointment();
        $appointmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($appointment));
        $this->inject($this->subject, 'appointments', $appointmentsObjectStorageMock);

        $this->subject->removeAppointment($appointment);
    }

    /**
     * @test
     */
    public function getStatesReturnsInitialValueForState()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getStates()
        );
    }

    /**
     * @test
     */
    public function setStatesForObjectStorageContainingStateSetsStates()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();
        $objectStorageHoldingExactlyOneStates = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneStates->attach($state);
        $this->subject->setStates($objectStorageHoldingExactlyOneStates);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneStates,
            'states',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addStateToObjectStorageHoldingStates()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();
        $statesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $statesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($state));
        $this->inject($this->subject, 'states', $statesObjectStorageMock);

        $this->subject->addState($state);
    }

    /**
     * @test
     */
    public function removeStateFromObjectStorageHoldingStates()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();
        $statesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $statesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($state));
        $this->inject($this->subject, 'states', $statesObjectStorageMock);

        $this->subject->removeState($state);
    }

    /**
     * @test
     */
    public function getPersonReturnsInitialValueForPerson()
    {
    }

    /**
     * @test
     */
    public function setPersonForPersonSetsPerson()
    {
    }

    /**
     * @test
     */
    public function getCompanyReturnsInitialValueForPerson()
    {
    }

    /**
     * @test
     */
    public function setCompanyForPersonSetsCompany()
    {
    }

    /**
     * @test
     */
    public function getOwnerReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setOwnerForOwnerSetsOwner()
    {
    }

    /**
     * @test
     */
    public function getUsergroupReturnsInitialValueForFrontendUserGroup()
    {
    }

    /**
     * @test
     */
    public function setUsergroupForFrontendUserGroupSetsUsergroup()
    {
    }

    /**
     * @test
     */
    public function getProductgroupReturnsInitialValueForProductgroup()
    {
        self::assertEquals(
            null,
            $this->subject->getProductgroup()
        );
    }

    /**
     * @test
     */
    public function setProductgroupForProductgroupSetsProductgroup()
    {
        $productgroupFixture = new \CGB\Relax5project\Domain\Model\Productgroup();
        $this->subject->setProductgroup($productgroupFixture);

        self::assertAttributeEquals(
            $productgroupFixture,
            'productgroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductReturnsInitialValueForProduct()
    {
        self::assertEquals(
            null,
            $this->subject->getProduct()
        );
    }

    /**
     * @test
     */
    public function setProductForProductSetsProduct()
    {
        $productFixture = new \CGB\Relax5project\Domain\Model\Product();
        $this->subject->setProduct($productFixture);

        self::assertAttributeEquals(
            $productFixture,
            'product',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMappingsReturnsInitialValueForMapping()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMappings()
        );
    }

    /**
     * @test
     */
    public function setMappingsForObjectStorageContainingMappingSetsMappings()
    {
        $mapping = new \CGB\Relax5project\Domain\Model\Mapping();
        $objectStorageHoldingExactlyOneMappings = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMappings->attach($mapping);
        $this->subject->setMappings($objectStorageHoldingExactlyOneMappings);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMappings,
            'mappings',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addMappingToObjectStorageHoldingMappings()
    {
        $mapping = new \CGB\Relax5project\Domain\Model\Mapping();
        $mappingsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $mappingsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($mapping));
        $this->inject($this->subject, 'mappings', $mappingsObjectStorageMock);

        $this->subject->addMapping($mapping);
    }

    /**
     * @test
     */
    public function removeMappingFromObjectStorageHoldingMappings()
    {
        $mapping = new \CGB\Relax5project\Domain\Model\Mapping();
        $mappingsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $mappingsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($mapping));
        $this->inject($this->subject, 'mappings', $mappingsObjectStorageMock);

        $this->subject->removeMapping($mapping);
    }

    /**
     * @test
     */
    public function getAddressReturnsInitialValueForAddress()
    {
    }

    /**
     * @test
     */
    public function setAddressForAddressSetsAddress()
    {
    }

    /**
     * @test
     */
    public function getCostsReturnsInitialValueForCost()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCosts()
        );
    }

    /**
     * @test
     */
    public function setCostsForObjectStorageContainingCostSetsCosts()
    {
        $cost = new \CGB\Relax5project\Domain\Model\Cost();
        $objectStorageHoldingExactlyOneCosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCosts->attach($cost);
        $this->subject->setCosts($objectStorageHoldingExactlyOneCosts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCosts,
            'costs',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCostToObjectStorageHoldingCosts()
    {
        $cost = new \CGB\Relax5project\Domain\Model\Cost();
        $costsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $costsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($cost));
        $this->inject($this->subject, 'costs', $costsObjectStorageMock);

        $this->subject->addCost($cost);
    }

    /**
     * @test
     */
    public function removeCostFromObjectStorageHoldingCosts()
    {
        $cost = new \CGB\Relax5project\Domain\Model\Cost();
        $costsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $costsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($cost));
        $this->inject($this->subject, 'costs', $costsObjectStorageMock);

        $this->subject->removeCost($cost);
    }

    /**
     * @test
     */
    public function getChildProjectsReturnsInitialValueForProject()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getChildProjects()
        );
    }

    /**
     * @test
     */
    public function setChildProjectsForObjectStorageContainingProjectSetsChildProjects()
    {
        $childProject = new \CGB\Relax5project\Domain\Model\Project();
        $objectStorageHoldingExactlyOneChildProjects = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneChildProjects->attach($childProject);
        $this->subject->setChildProjects($objectStorageHoldingExactlyOneChildProjects);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneChildProjects,
            'childProjects',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addChildProjectToObjectStorageHoldingChildProjects()
    {
        $childProject = new \CGB\Relax5project\Domain\Model\Project();
        $childProjectsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $childProjectsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($childProject));
        $this->inject($this->subject, 'childProjects', $childProjectsObjectStorageMock);

        $this->subject->addChildProject($childProject);
    }

    /**
     * @test
     */
    public function removeChildProjectFromObjectStorageHoldingChildProjects()
    {
        $childProject = new \CGB\Relax5project\Domain\Model\Project();
        $childProjectsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $childProjectsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($childProject));
        $this->inject($this->subject, 'childProjects', $childProjectsObjectStorageMock);

        $this->subject->removeChildProject($childProject);
    }

    /**
     * @test
     */
    public function getCurrentStateReturnsInitialValueForState()
    {
    }

    /**
     * @test
     */
    public function setCurrentStateForStateSetsCurrentState()
    {
    }

    /**
     * @test
     */
    public function getRolesReturnsInitialValueForRole()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRoles()
        );
    }

    /**
     * @test
     */
    public function setRolesForObjectStorageContainingRoleSetsRoles()
    {
        $role = new \CGB\Relax5project\Domain\Model\Role();
        $objectStorageHoldingExactlyOneRoles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRoles->attach($role);
        $this->subject->setRoles($objectStorageHoldingExactlyOneRoles);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneRoles,
            'roles',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addRoleToObjectStorageHoldingRoles()
    {
        $role = new \CGB\Relax5project\Domain\Model\Role();
        $rolesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $rolesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($role));
        $this->inject($this->subject, 'roles', $rolesObjectStorageMock);

        $this->subject->addRole($role);
    }

    /**
     * @test
     */
    public function removeRoleFromObjectStorageHoldingRoles()
    {
        $role = new \CGB\Relax5project\Domain\Model\Role();
        $rolesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $rolesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($role));
        $this->inject($this->subject, 'roles', $rolesObjectStorageMock);

        $this->subject->removeRole($role);
    }
}
