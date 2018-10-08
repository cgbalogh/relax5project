<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ActionPoolTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\ActionPool
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\ActionPool();
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
    public function getIdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getId()
        );
    }

    /**
     * @test
     */
    public function setIdForStringSetsId()
    {
        $this->subject->setId('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'id',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForStringSetsType()
    {
        $this->subject->setType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOptionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOptions()
        );
    }

    /**
     * @test
     */
    public function setOptionsForStringSetsOptions()
    {
        $this->subject->setOptions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'options',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getActionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getActions()
        );
    }

    /**
     * @test
     */
    public function setActionsForStringSetsActions()
    {
        $this->subject->setActions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'actions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKeepStateReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getKeepState()
        );
    }

    /**
     * @test
     */
    public function setKeepStateForBoolSetsKeepState()
    {
        $this->subject->setKeepState(true);

        self::assertAttributeEquals(
            true,
            'keepState',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKeepStateDistinctReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getKeepStateDistinct()
        );
    }

    /**
     * @test
     */
    public function setKeepStateDistinctForBoolSetsKeepStateDistinct()
    {
        $this->subject->setKeepStateDistinct(true);

        self::assertAttributeEquals(
            true,
            'keepStateDistinct',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDebugReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDebug()
        );
    }

    /**
     * @test
     */
    public function setDebugForBoolSetsDebug()
    {
        $this->subject->setDebug(true);

        self::assertAttributeEquals(
            true,
            'debug',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInputsReturnsInitialValueForInput()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getInputs()
        );
    }

    /**
     * @test
     */
    public function setInputsForObjectStorageContainingInputSetsInputs()
    {
        $input = new \CGB\Relax5project\Domain\Model\Input();
        $objectStorageHoldingExactlyOneInputs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneInputs->attach($input);
        $this->subject->setInputs($objectStorageHoldingExactlyOneInputs);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneInputs,
            'inputs',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addInputToObjectStorageHoldingInputs()
    {
        $input = new \CGB\Relax5project\Domain\Model\Input();
        $inputsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $inputsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($input));
        $this->inject($this->subject, 'inputs', $inputsObjectStorageMock);

        $this->subject->addInput($input);
    }

    /**
     * @test
     */
    public function removeInputFromObjectStorageHoldingInputs()
    {
        $input = new \CGB\Relax5project\Domain\Model\Input();
        $inputsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $inputsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($input));
        $this->inject($this->subject, 'inputs', $inputsObjectStorageMock);

        $this->subject->removeInput($input);
    }
}
