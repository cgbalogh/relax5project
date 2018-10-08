<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class MappingTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Mapping
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Mapping();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getValueReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getValue()
        );
    }

    /**
     * @test
     */
    public function setValueForStringSetsValue()
    {
        $this->subject->setValue('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'value',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForIntSetsStatus()
    {
        $this->subject->setStatus(12);

        self::assertAttributeEquals(
            12,
            'status',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductoptionReturnsInitialValueForProductoption()
    {
        self::assertEquals(
            null,
            $this->subject->getProductoption()
        );
    }

    /**
     * @test
     */
    public function setProductoptionForProductoptionSetsProductoption()
    {
        $productoptionFixture = new \CGB\Relax5project\Domain\Model\Productoption();
        $this->subject->setProductoption($productoptionFixture);

        self::assertAttributeEquals(
            $productoptionFixture,
            'productoption',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubproductReturnsInitialValueForSubproduct()
    {
        self::assertEquals(
            null,
            $this->subject->getSubproduct()
        );
    }

    /**
     * @test
     */
    public function setSubproductForSubproductSetsSubproduct()
    {
        $subproductFixture = new \CGB\Relax5project\Domain\Model\Subproduct();
        $this->subject->setSubproduct($subproductFixture);

        self::assertAttributeEquals(
            $subproductFixture,
            'subproduct',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAvailableItemReturnsInitialValueForAvailableItem()
    {
        self::assertEquals(
            null,
            $this->subject->getAvailableItem()
        );
    }

    /**
     * @test
     */
    public function setAvailableItemForAvailableItemSetsAvailableItem()
    {
        $availableItemFixture = new \CGB\Relax5project\Domain\Model\AvailableItem();
        $this->subject->setAvailableItem($availableItemFixture);

        self::assertAttributeEquals(
            $availableItemFixture,
            'availableItem',
            $this->subject
        );
    }
}
