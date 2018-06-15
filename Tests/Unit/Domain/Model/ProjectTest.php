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
}
