<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class TransitionPoolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\TransitionPool
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\TransitionPool();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getActionsReturnsInitialValueForActionPool()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getActions()
        );

    }

    /**
     * @test
     */
    public function setActionsForObjectStorageContainingActionPoolSetsActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $objectStorageHoldingExactlyOneActions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneActions->attach($action);
        $this->subject->setActions($objectStorageHoldingExactlyOneActions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneActions,
            'actions',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addActionToObjectStorageHoldingActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $actionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $actionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($action));
        $this->inject($this->subject, 'actions', $actionsObjectStorageMock);

        $this->subject->addAction($action);
    }

    /**
     * @test
     */
    public function removeActionFromObjectStorageHoldingActions()
    {
        $action = new \CGB\Relax5project\Domain\Model\ActionPool();
        $actionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $actionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($action));
        $this->inject($this->subject, 'actions', $actionsObjectStorageMock);

        $this->subject->removeAction($action);

    }
}
