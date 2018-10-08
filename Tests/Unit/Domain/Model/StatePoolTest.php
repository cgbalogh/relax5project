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
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubgroupReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSubgroup()
        );
    }

    /**
     * @test
     */
    public function setSubgroupForStringSetsSubgroup()
    {
        $this->subject->setSubgroup('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'subgroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStyleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStyle()
        );
    }

    /**
     * @test
     */
    public function setStyleForStringSetsStyle()
    {
        $this->subject->setStyle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'style',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNoshowDashboardReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getNoshowDashboard()
        );
    }

    /**
     * @test
     */
    public function setNoshowDashboardForBoolSetsNoshowDashboard()
    {
        $this->subject->setNoshowDashboard(true);

        self::assertAttributeEquals(
            true,
            'noshowDashboard',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getColorPrimaryReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getColorPrimary()
        );
    }

    /**
     * @test
     */
    public function setColorPrimaryForStringSetsColorPrimary()
    {
        $this->subject->setColorPrimary('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'colorPrimary',
            $this->subject
        );
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
