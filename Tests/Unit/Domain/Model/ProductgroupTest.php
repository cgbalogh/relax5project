<?php
namespace CGB\Relax5project\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ProductgroupTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5project\Domain\Model\Productgroup
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5project\Domain\Model\Productgroup();
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
    public function getProductsReturnsInitialValueForProduct()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getProducts()
        );
    }

    /**
     * @test
     */
    public function setProductsForObjectStorageContainingProductSetsProducts()
    {
        $product = new \CGB\Relax5project\Domain\Model\Product();
        $objectStorageHoldingExactlyOneProducts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneProducts->attach($product);
        $this->subject->setProducts($objectStorageHoldingExactlyOneProducts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneProducts,
            'products',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addProductToObjectStorageHoldingProducts()
    {
        $product = new \CGB\Relax5project\Domain\Model\Product();
        $productsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($product));
        $this->inject($this->subject, 'products', $productsObjectStorageMock);

        $this->subject->addProduct($product);
    }

    /**
     * @test
     */
    public function removeProductFromObjectStorageHoldingProducts()
    {
        $product = new \CGB\Relax5project\Domain\Model\Product();
        $productsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $productsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($product));
        $this->inject($this->subject, 'products', $productsObjectStorageMock);

        $this->subject->removeProduct($product);
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
}
