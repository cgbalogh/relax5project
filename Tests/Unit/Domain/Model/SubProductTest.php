<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class SubproductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Subproduct
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Subproduct();
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
    public function getAvailableReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAvailable()
        );
    }

    /**
     * @test
     */
    public function setAvailableForIntSetsAvailable()
    {
        $this->subject->setAvailable(12);

        self::assertAttributeEquals(
            12,
            'available',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAvailableItemsReturnsInitialValueForAvailableItem()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAvailableItems()
        );
    }

    /**
     * @test
     */
    public function setAvailableItemsForObjectStorageContainingAvailableItemSetsAvailableItems()
    {
        $availableItem = new \CGB\Relax5project\Domain\Model\AvailableItem();
        $objectStorageHoldingExactlyOneAvailableItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAvailableItems->attach($availableItem);
        $this->subject->setAvailableItems($objectStorageHoldingExactlyOneAvailableItems);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAvailableItems,
            'availableItems',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAvailableItemToObjectStorageHoldingAvailableItems()
    {
        $availableItem = new \CGB\Relax5project\Domain\Model\AvailableItem();
        $availableItemsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $availableItemsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($availableItem));
        $this->inject($this->subject, 'availableItems', $availableItemsObjectStorageMock);

        $this->subject->addAvailableItem($availableItem);
    }

    /**
     * @test
     */
    public function removeAvailableItemFromObjectStorageHoldingAvailableItems()
    {
        $availableItem = new \CGB\Relax5project\Domain\Model\AvailableItem();
        $availableItemsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $availableItemsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($availableItem));
        $this->inject($this->subject, 'availableItems', $availableItemsObjectStorageMock);

        $this->subject->removeAvailableItem($availableItem);
    }
}
