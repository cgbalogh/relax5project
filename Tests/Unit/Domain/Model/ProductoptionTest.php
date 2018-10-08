<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ProductoptionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Productoption
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Productoption();
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
    public function getOptiongroupReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOptiongroup()
        );
    }

    /**
     * @test
     */
    public function setOptiongroupForStringSetsOptiongroup()
    {
        $this->subject->setOptiongroup('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'optiongroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOptionlistReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOptionlist()
        );
    }

    /**
     * @test
     */
    public function setOptionlistForStringSetsOptionlist()
    {
        $this->subject->setOptionlist('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'optionlist',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLabeltextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLabeltext()
        );
    }

    /**
     * @test
     */
    public function setLabeltextForStringSetsLabeltext()
    {
        $this->subject->setLabeltext('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'labeltext',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getExclusiveReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getExclusive()
        );
    }

    /**
     * @test
     */
    public function setExclusiveForBoolSetsExclusive()
    {
        $this->subject->setExclusive(true);

        self::assertAttributeEquals(
            true,
            'exclusive',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDropdownReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDropdown()
        );
    }

    /**
     * @test
     */
    public function setDropdownForBoolSetsDropdown()
    {
        $this->subject->setDropdown(true);

        self::assertAttributeEquals(
            true,
            'dropdown',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDisplayConditionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDisplayCondition()
        );
    }

    /**
     * @test
     */
    public function setDisplayConditionForStringSetsDisplayCondition()
    {
        $this->subject->setDisplayCondition('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'displayCondition',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNewMappingReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getNewMapping()
        );
    }

    /**
     * @test
     */
    public function setNewMappingForBoolSetsNewMapping()
    {
        $this->subject->setNewMapping(true);

        self::assertAttributeEquals(
            true,
            'newMapping',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInputTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInputType()
        );
    }

    /**
     * @test
     */
    public function setInputTypeForStringSetsInputType()
    {
        $this->subject->setInputType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'inputType',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInputValuesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInputValues()
        );
    }

    /**
     * @test
     */
    public function setInputValuesForStringSetsInputValues()
    {
        $this->subject->setInputValues('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'inputValues',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGlobalOptionReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getGlobalOption()
        );
    }

    /**
     * @test
     */
    public function setGlobalOptionForBoolSetsGlobalOption()
    {
        $this->subject->setGlobalOption(true);

        self::assertAttributeEquals(
            true,
            'globalOption',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEnableReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEnable()
        );
    }

    /**
     * @test
     */
    public function setEnableForStringSetsEnable()
    {
        $this->subject->setEnable('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'enable',
            $this->subject
        );
    }
}
