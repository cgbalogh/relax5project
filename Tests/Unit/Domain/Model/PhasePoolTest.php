<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class PhasePoolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\PhasePool
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\PhasePool();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStatesReturnsInitialValueForStatePool()
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
    public function setStatesForObjectStorageContainingStatePoolSetsStates()
    {
        $state = new \CGB\Relax5project\Domain\Model\StatePool();
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
        $state = new \CGB\Relax5project\Domain\Model\StatePool();
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
        $state = new \CGB\Relax5project\Domain\Model\StatePool();
        $statesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $statesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($state));
        $this->inject($this->subject, 'states', $statesObjectStorageMock);

        $this->subject->removeState($state);

    }
}
