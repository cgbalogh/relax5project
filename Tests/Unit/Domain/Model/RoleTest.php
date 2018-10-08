<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class RoleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Role
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Role();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getRoleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRole()
        );
    }

    /**
     * @test
     */
    public function setRoleForStringSetsRole()
    {
        $this->subject->setRole('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'role',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getExternalReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getExternal()
        );
    }

    /**
     * @test
     */
    public function setExternalForStringSetsExternal()
    {
        $this->subject->setExternal('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'external',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInternalReturnsInitialValueForOwner()
    {
    }

    /**
     * @test
     */
    public function setInternalForOwnerSetsInternal()
    {
    }
}
