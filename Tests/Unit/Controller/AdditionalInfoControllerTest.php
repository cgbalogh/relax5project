<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class AdditionalInfoControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\AdditionalInfoController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\AdditionalInfoController::class)
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
    public function createActionAddsTheGivenAdditionalInfoToAdditionalInfoRepository()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();

        $additionalInfoRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $additionalInfoRepository->expects(self::once())->method('add')->with($additionalInfo);
        $this->inject($this->subject, 'additionalInfoRepository', $additionalInfoRepository);

        $this->subject->createAction($additionalInfo);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAdditionalInfoToView()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('additionalInfo', $additionalInfo);

        $this->subject->editAction($additionalInfo);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAdditionalInfoInAdditionalInfoRepository()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();

        $additionalInfoRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $additionalInfoRepository->expects(self::once())->method('update')->with($additionalInfo);
        $this->inject($this->subject, 'additionalInfoRepository', $additionalInfoRepository);

        $this->subject->updateAction($additionalInfo);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAdditionalInfoFromAdditionalInfoRepository()
    {
        $additionalInfo = new \CGB\Relax5project\Domain\Model\AdditionalInfo();

        $additionalInfoRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $additionalInfoRepository->expects(self::once())->method('remove')->with($additionalInfo);
        $this->inject($this->subject, 'additionalInfoRepository', $additionalInfoRepository);

        $this->subject->deleteAction($additionalInfo);
    }
}
