<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ProductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Product
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Product();
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
    public function getCategoryReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForStringSetsCategory()
    {
        $this->subject->setCategory('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProductoptionsReturnsInitialValueForProductoption()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getProductoptions()
        );
    }

    /**
     * @test
     */
    public function setProductoptionsForObjectStorageContainingProductoptionSetsProductoptions()
    {
        $productoption = new \CGB\Relax5project\Domain\Model\Productoption();
        $objectStorageHoldingExactlyOneProductoptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneProductoptions->attach($productoption);
        $this->subject->setProductoptions($objectStorageHoldingExactlyOneProductoptions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneProductoptions,
            'productoptions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addProductoptionToObjectStorageHoldingProductoptions()
    {
        $productoption = new \CGB\Relax5project\Domain\Model\Productoption();
        $productoptionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productoptionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($productoption));
        $this->inject($this->subject, 'productoptions', $productoptionsObjectStorageMock);

        $this->subject->addProductoption($productoption);
    }

    /**
     * @test
     */
    public function removeProductoptionFromObjectStorageHoldingProductoptions()
    {
        $productoption = new \CGB\Relax5project\Domain\Model\Productoption();
        $productoptionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productoptionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($productoption));
        $this->inject($this->subject, 'productoptions', $productoptionsObjectStorageMock);

        $this->subject->removeProductoption($productoption);
    }

    /**
     * @test
     */
    public function getSubproductsReturnsInitialValueForSubproduct()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSubproducts()
        );
    }

    /**
     * @test
     */
    public function setSubproductsForObjectStorageContainingSubproductSetsSubproducts()
    {
        $subproduct = new \CGB\Relax5project\Domain\Model\Subproduct();
        $objectStorageHoldingExactlyOneSubproducts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSubproducts->attach($subproduct);
        $this->subject->setSubproducts($objectStorageHoldingExactlyOneSubproducts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneSubproducts,
            'subproducts',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addSubproductToObjectStorageHoldingSubproducts()
    {
        $subproduct = new \CGB\Relax5project\Domain\Model\Subproduct();
        $subproductsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $subproductsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($subproduct));
        $this->inject($this->subject, 'subproducts', $subproductsObjectStorageMock);

        $this->subject->addSubproduct($subproduct);
    }

    /**
     * @test
     */
    public function removeSubproductFromObjectStorageHoldingSubproducts()
    {
        $subproduct = new \CGB\Relax5project\Domain\Model\Subproduct();
        $subproductsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $subproductsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($subproduct));
        $this->inject($this->subject, 'subproducts', $subproductsObjectStorageMock);

        $this->subject->removeSubproduct($subproduct);
    }
}
