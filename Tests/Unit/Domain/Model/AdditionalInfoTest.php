<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AdditionalInfoTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\AdditionalInfo
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\AdditionalInfo();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getInfoKeyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInfoKey()
        );
    }

    /**
     * @test
     */
    public function setInfoKeyForStringSetsInfoKey()
    {
        $this->subject->setInfoKey('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'infoKey',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInfoLabelReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInfoLabel()
        );
    }

    /**
     * @test
     */
    public function setInfoLabelForStringSetsInfoLabel()
    {
        $this->subject->setInfoLabel('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'infoLabel',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInfoValueReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInfoValue()
        );
    }

    /**
     * @test
     */
    public function setInfoValueForStringSetsInfoValue()
    {
        $this->subject->setInfoValue('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'infoValue',
            $this->subject
        );
    }
}
