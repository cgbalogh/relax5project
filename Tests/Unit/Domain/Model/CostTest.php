<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class CostTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Cost
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Cost();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
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
    public function getExcludeGroupReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getExcludeGroup()
        );
    }

    /**
     * @test
     */
    public function setExcludeGroupForIntSetsExcludeGroup()
    {
        $this->subject->setExcludeGroup(12);

        self::assertAttributeEquals(
            12,
            'excludeGroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTargetReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getTarget()
        );
    }

    /**
     * @test
     */
    public function setTargetForFloatSetsTarget()
    {
        $this->subject->setTarget(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'target',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getActualReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getActual()
        );
    }

    /**
     * @test
     */
    public function setActualForFloatSetsActual()
    {
        $this->subject->setActual(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'actual',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getConfirmedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getConfirmed()
        );
    }

    /**
     * @test
     */
    public function setConfirmedForBoolSetsConfirmed()
    {
        $this->subject->setConfirmed(true);

        self::assertAttributeEquals(
            true,
            'confirmed',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVoidReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getVoid()
        );
    }

    /**
     * @test
     */
    public function setVoidForBoolSetsVoid()
    {
        $this->subject->setVoid(true);

        self::assertAttributeEquals(
            true,
            'void',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getKeycodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getKeycode()
        );
    }

    /**
     * @test
     */
    public function setKeycodeForStringSetsKeycode()
    {
        $this->subject->setKeycode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'keycode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOwnerReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setOwnerForOwnerSetsOwner()
    {
    }

    /**
     * @test
     */
    public function getCanConfirmReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setCanConfirmForOwnerSetsCanConfirm()
    {
    }
}
