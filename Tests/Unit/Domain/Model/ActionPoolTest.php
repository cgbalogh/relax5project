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
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
