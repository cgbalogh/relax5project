<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class CostControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\CostController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\CostController::class)
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
    public function editActionAssignsTheGivenCostToView()
    {
        $cost = new \CGB\Relax5project\Domain\Model\Cost();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('cost', $cost);

        $this->subject->editAction($cost);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCostInCostRepository()
    {
        $cost = new \CGB\Relax5project\Domain\Model\Cost();

        $costRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\CostRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $costRepository->expects(self::once())->method('update')->with($cost);
        $this->inject($this->subject, 'costRepository', $costRepository);

        $this->subject->updateAction($cost);
    }
}
