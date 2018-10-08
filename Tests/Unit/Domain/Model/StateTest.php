<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class StateTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\State
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\State();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStateNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStateName()
        );
    }

    /**
     * @test
     */
    public function setStateNameForStringSetsStateName()
    {
        $this->subject->setStateName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'stateName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStateGroupReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStateGroup()
        );
    }

    /**
     * @test
     */
    public function setStateGroupForStringSetsStateGroup()
    {
        $this->subject->setStateGroup('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'stateGroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDueReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDue()
        );
    }

    /**
     * @test
     */
    public function setDueForDateTimeSetsDue()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDue($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'due',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDueOrigReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDueOrig()
        );
    }

    /**
     * @test
     */
    public function setDueOrigForDateTimeSetsDueOrig()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDueOrig($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'dueOrig',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDoneReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDone()
        );
    }

    /**
     * @test
     */
    public function setDoneForDateTimeSetsDone()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDone($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'done',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getForwardReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getForward()
        );
    }

    /**
     * @test
     */
    public function setForwardForBoolSetsForward()
    {
        $this->subject->setForward(true);

        self::assertAttributeEquals(
            true,
            'forward',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRejectedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getRejected()
        );
    }

    /**
     * @test
     */
    public function setRejectedForBoolSetsRejected()
    {
        $this->subject->setRejected(true);

        self::assertAttributeEquals(
            true,
            'rejected',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getForwardDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getForwardDate()
        );
    }

    /**
     * @test
     */
    public function setForwardDateForDateTimeSetsForwardDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setForwardDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'forwardDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNotifyDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getNotifyDate()
        );
    }

    /**
     * @test
     */
    public function setNotifyDateForDateTimeSetsNotifyDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setNotifyDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'notifyDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNotifyTimesReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getNotifyTimes()
        );
    }

    /**
     * @test
     */
    public function setNotifyTimesForIntSetsNotifyTimes()
    {
        $this->subject->setNotifyTimes(12);

        self::assertAttributeEquals(
            12,
            'notifyTimes',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTagDataReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTagData()
        );
    }

    /**
     * @test
     */
    public function setTagDataForStringSetsTagData()
    {
        $this->subject->setTagData('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'tagData',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDataReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getData()
        );
    }

    /**
     * @test
     */
    public function setDataForStringSetsData()
    {
        $this->subject->setData('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'data',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNumberReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberForIntSetsNumber()
    {
        $this->subject->setNumber(12);

        self::assertAttributeEquals(
            12,
            'number',
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
    public function getStateReturnsInitialValueForStatePool()
    {
        self::assertEquals(
            null,
            $this->subject->getState()
        );
    }

    /**
     * @test
     */
    public function setStateForStatePoolSetsState()
    {
        $stateFixture = new \CGB\Relax5project\Domain\Model\StatePool();
        $this->subject->setState($stateFixture);

        self::assertAttributeEquals(
            $stateFixture,
            'state',
            $this->subject
        );
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
    public function getAdditionalInfosReturnsInitialValueForAdditionalInfo()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAdditionalInfos()
        );
    }

    /**
     * @test
     */
    public function setAdditionalInfosForObjectStorageContainingAdditionalInfoSetsAdditionalInfos()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();
        $objectStorageHoldingExactlyOneAdditionalInfos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAdditionalInfos->attach($additionalInfo);
        $this->subject->setAdditionalInfos($objectStorageHoldingExactlyOneAdditionalInfos);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAdditionalInfos,
            'additionalInfos',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAdditionalInfoToObjectStorageHoldingAdditionalInfos()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();
        $additionalInfosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $additionalInfosObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($additionalInfo));
        $this->inject($this->subject, 'additionalInfos', $additionalInfosObjectStorageMock);

        $this->subject->addAdditionalInfo($additionalInfo);
    }

    /**
     * @test
     */
    public function removeAdditionalInfoFromObjectStorageHoldingAdditionalInfos()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();
        $additionalInfosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $additionalInfosObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($additionalInfo));
        $this->inject($this->subject, 'additionalInfos', $additionalInfosObjectStorageMock);

        $this->subject->removeAdditionalInfo($additionalInfo);
    }

    /**
     * @test
     */
    public function getForwarderReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setForwarderForOwnerSetsForwarder()
    {
    }

    /**
     * @test
     */
    public function getResponsibilitiesReturnsInitialValueForResponsibility()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getResponsibilities()
        );
    }

    /**
     * @test
     */
    public function setResponsibilitiesForObjectStorageContainingResponsibilitySetsResponsibilities()
    {
        $responsibility = new \CGB\Relax5project\Domain\Model\Responsibility();
        $objectStorageHoldingExactlyOneResponsibilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneResponsibilities->attach($responsibility);
        $this->subject->setResponsibilities($objectStorageHoldingExactlyOneResponsibilities);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneResponsibilities,
            'responsibilities',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addResponsibilityToObjectStorageHoldingResponsibilities()
    {
        $responsibility = new \CGB\Relax5project\Domain\Model\Responsibility();
        $responsibilitiesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $responsibilitiesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($responsibility));
        $this->inject($this->subject, 'responsibilities', $responsibilitiesObjectStorageMock);

        $this->subject->addResponsibility($responsibility);
    }

    /**
     * @test
     */
    public function removeResponsibilityFromObjectStorageHoldingResponsibilities()
    {
        $responsibility = new \CGB\Relax5project\Domain\Model\Responsibility();
        $responsibilitiesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $responsibilitiesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($responsibility));
        $this->inject($this->subject, 'responsibilities', $responsibilitiesObjectStorageMock);

        $this->subject->removeResponsibility($responsibility);
    }

    /**
     * @test
     */
    public function getCreatorReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setCreatorForOwnerSetsCreator()
    {
    }
}
