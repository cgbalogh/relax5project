<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class ProductgroupControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\ProductgroupController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\ProductgroupController::class)
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
    public function listActionFetchesAllProductgroupsFromRepositoryAndAssignsThemToView()
    {

        $allProductgroups = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $productgroupRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProductgroupRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $productgroupRepository->expects(self::once())->method('findAll')->will(self::returnValue($allProductgroups));
        $this->inject($this->subject, 'productgroupRepository', $productgroupRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('productgroups', $allProductgroups);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenProductgroupToView()
    {
        $productgroup = new \CGB\Relax5project\Domain\Model\Productgroup();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('productgroup', $productgroup);

        $this->subject->showAction($productgroup);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenProductgroupToProductgroupRepository()
    {
        $productgroup = new \CGB\Relax5project\Domain\Model\Productgroup();

        $productgroupRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProductgroupRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $productgroupRepository->expects(self::once())->method('add')->with($productgroup);
        $this->inject($this->subject, 'productgroupRepository', $productgroupRepository);

        $this->subject->createAction($productgroup);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenProductgroupToView()
    {
        $productgroup = new \CGB\Relax5project\Domain\Model\Productgroup();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('productgroup', $productgroup);

        $this->subject->editAction($productgroup);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenProductgroupInProductgroupRepository()
    {
        $productgroup = new \CGB\Relax5project\Domain\Model\Productgroup();

        $productgroupRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProductgroupRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $productgroupRepository->expects(self::once())->method('update')->with($productgroup);
        $this->inject($this->subject, 'productgroupRepository', $productgroupRepository);

        $this->subject->updateAction($productgroup);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenProductgroupFromProductgroupRepository()
    {
        $productgroup = new \CGB\Relax5project\Domain\Model\Productgroup();

        $productgroupRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProductgroupRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $productgroupRepository->expects(self::once())->method('remove')->with($productgroup);
        $this->inject($this->subject, 'productgroupRepository', $productgroupRepository);

        $this->subject->deleteAction($productgroup);
    }
}
