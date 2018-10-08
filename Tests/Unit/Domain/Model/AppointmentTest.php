<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AppointmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Appointment
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Appointment();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getLockedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getLocked()
        );
    }

    /**
     * @test
     */
    public function setLockedForBoolSetsLocked()
    {
        $this->subject->setLocked(true);

        self::assertAttributeEquals(
            true,
            'locked',
            $this->subject
        );
    }
}
