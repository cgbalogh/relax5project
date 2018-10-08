<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class InputTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Input
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Input();
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
    public function getJscriptReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getJscript()
        );
    }

    /**
     * @test
     */
    public function setJscriptForStringSetsJscript()
    {
        $this->subject->setJscript('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'jscript',
            $this->subject
        );
    }
}
