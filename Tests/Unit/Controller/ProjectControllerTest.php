<?php
namespace CGB\Relax5project\Tests\Unit\Controller;

/**
 * Test case.
 */
class ProjectControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Controller\ProjectController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CGB\Relax5project\Controller\ProjectController::class)
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
    public function listActionFetchesAllProjectsFromRepositoryAndAssignsThemToView()
    {

        $allProjects = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $projectRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProjectRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $projectRepository->expects(self::once())->method('findAll')->will(self::returnValue($allProjects));
        $this->inject($this->subject, 'projectRepository', $projectRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('projects', $allProjects);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenProjectToView()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('project', $project);

        $this->subject->showAction($project);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenProjectToProjectRepository()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $projectRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProjectRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $projectRepository->expects(self::once())->method('add')->with($project);
        $this->inject($this->subject, 'projectRepository', $projectRepository);

        $this->subject->createAction($project);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenProjectToView()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('project', $project);

        $this->subject->editAction($project);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenProjectInProjectRepository()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $projectRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProjectRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $projectRepository->expects(self::once())->method('update')->with($project);
        $this->inject($this->subject, 'projectRepository', $projectRepository);

        $this->subject->updateAction($project);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenProjectFromProjectRepository()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $projectRepository = $this->getMockBuilder(\CGB\Relax5project\Domain\Repository\ProjectRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $projectRepository->expects(self::once())->method('remove')->with($project);
        $this->inject($this->subject, 'projectRepository', $projectRepository);

        $this->subject->deleteAction($project);
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenProjectToView()
    {
        $project = new \CGB\Relax5project\Domain\Model\Project();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('project', $project);

        $this->subject->showAction($project);
    }
}
