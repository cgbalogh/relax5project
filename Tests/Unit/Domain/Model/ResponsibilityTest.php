<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ResponsibilityTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Responsibility
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Responsibility();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDueReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDue()
        );
    }

    /**
     * @test
     */
    public function setDueForDateTimeSetsDue()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDue($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'due',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDoneReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDone()
        );
    }

    /**
     * @test
     */
    public function setDoneForDateTimeSetsDone()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDone($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'done',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getComments()
        );
    }

    /**
     * @test
     */
    public function setCommentsForStringSetsComments()
    {
        $this->subject->setComments('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'comments',
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
    public function getOwnerReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setOwnerForOwnerSetsOwner()
    {
    }
}
