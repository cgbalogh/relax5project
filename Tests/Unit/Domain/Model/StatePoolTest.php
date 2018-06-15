<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class StatePoolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\StatePool
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\StatePool();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTransitionInsReturnsInitialValueForTransitionPool()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTransitionIns()
        );

    }

    /**
     * @test
     */
    public function setTransitionInsForObjectStorageContainingTransitionPoolSetsTransitionIns()
    {
        $transitionIn = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $objectStorageHoldingExactlyOneTransitionIns = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTransitionIns->attach($transitionIn);
        $this->subject->setTransitionIns($objectStorageHoldingExactlyOneTransitionIns);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTransitionIns,
            'transitionIns',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addTransitionInToObjectStorageHoldingTransitionIns()
    {
        $transitionIn = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $transitionInsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $transitionInsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($transitionIn));
        $this->inject($this->subject, 'transitionIns', $transitionInsObjectStorageMock);

        $this->subject->addTransitionIn($transitionIn);
    }

    /**
     * @test
     */
    public function removeTransitionInFromObjectStorageHoldingTransitionIns()
    {
        $transitionIn = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $transitionInsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $transitionInsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($transitionIn));
        $this->inject($this->subject, 'transitionIns', $transitionInsObjectStorageMock);

        $this->subject->removeTransitionIn($transitionIn);

    }

    /**
     * @test
     */
    public function getTransitionOutsReturnsInitialValueForTransitionPool()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTransitionOuts()
        );

    }

    /**
     * @test
     */
    public function setTransitionOutsForObjectStorageContainingTransitionPoolSetsTransitionOuts()
    {
        $transitionOut = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $objectStorageHoldingExactlyOneTransitionOuts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTransitionOuts->attach($transitionOut);
        $this->subject->setTransitionOuts($objectStorageHoldingExactlyOneTransitionOuts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTransitionOuts,
            'transitionOuts',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addTransitionOutToObjectStorageHoldingTransitionOuts()
    {
        $transitionOut = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $transitionOutsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $transitionOutsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($transitionOut));
        $this->inject($this->subject, 'transitionOuts', $transitionOutsObjectStorageMock);

        $this->subject->addTransitionOut($transitionOut);
    }

    /**
     * @test
     */
    public function removeTransitionOutFromObjectStorageHoldingTransitionOuts()
    {
        $transitionOut = new \CGB\Relax5project\Domain\Model\TransitionPool();
        $transitionOutsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $transitionOutsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($transitionOut));
        $this->inject($this->subject, 'transitionOuts', $transitionOutsObjectStorageMock);

        $this->subject->removeTransitionOut($transitionOut);

    }
}
