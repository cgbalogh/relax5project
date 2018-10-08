<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AvailableItemTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\AvailableItem
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\AvailableItem();
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
    public function getIdentifierReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getIdentifier()
        );
    }

    /**
     * @test
     */
    public function setIdentifierForStringSetsIdentifier()
    {
        $this->subject->setIdentifier('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'identifier',
            $this->subject
        );
    }
}
