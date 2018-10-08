<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class AppointmentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\AppointmentController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\AppointmentController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAppointmentToView()
    {
        $appointment = new \CGB\Relax5project\Domain\Model\Appointment();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('appointment', $appointment);

        $this->subject->editAction($appointment);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAppointmentInAppointmentRepository()
    {
        $appointment = new \CGB\Relax5project\Domain\Model\Appointment();

        $appointmentRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\AppointmentRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $appointmentRepository->expects(self::once())->method('update')->with($appointment);
        $this->inject($this->subject, 'appointmentRepository', $appointmentRepository);

        $this->subject->updateAction($appointment);
    }
}
