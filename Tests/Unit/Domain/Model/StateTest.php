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
}
