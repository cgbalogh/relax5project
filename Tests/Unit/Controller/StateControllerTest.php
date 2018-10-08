<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class StateControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\StateController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\StateController::class)
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
    public function showActionAssignsTheGivenStateToView()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('state', $state);

        $this->subject->showAction($state);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenStateToStateRepository()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();

        $stateRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\StateRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $stateRepository->expects(self::once())->method('add')->with($state);
        $this->inject($this->subject, 'stateRepository', $stateRepository);

        $this->subject->createAction($state);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenStateToView()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('state', $state);

        $this->subject->editAction($state);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenStateInStateRepository()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();

        $stateRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\StateRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $stateRepository->expects(self::once())->method('update')->with($state);
        $this->inject($this->subject, 'stateRepository', $stateRepository);

        $this->subject->updateAction($state);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenStateFromStateRepository()
    {
        $state = new \CGB\Relax5project\Domain\Model\State();

        $stateRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\StateRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $stateRepository->expects(self::once())->method('remove')->with($state);
        $this->inject($this->subject, 'stateRepository', $stateRepository);

        $this->subject->deleteAction($state);
    }
}
