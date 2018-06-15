<?php
namespace CGB\Relax5project\Domain\Model;

/***
 *
 * This file is part of the "relax5project" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * Poductgroup
 */
class Productgroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * productgroupRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProductgroupRepository
     * @inject
     */
    protected $productgroupRepository = null;
    
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Products
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Product>
     */
    protected $products = null;

    /**
     * Productoptions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Productoption>
     */
    protected $productoptions = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->productoptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Product
     *
     * @param \CGB\Relax5project\Domain\Model\Product $product
     * @return void
     */
    public function addProduct(\CGB\Relax5project\Domain\Model\Product $product)
    {
        $this->products->attach($product);
    }

    /**
     * Removes a Product
     *
     * @param \CGB\Relax5project\Domain\Model\Product $productToRemove The Product to be removed
     * @return void
     */
    public function removeProduct(\CGB\Relax5project\Domain\Model\Product $productToRemove)
    {
        $this->products->detach($productToRemove);
    }

    /**
     * Returns the products
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Product> $products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the products
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Product> $products
     * @return void
     */
    public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products)
    {
        $this->products = $products;
    }

    /**
     * Adds a Productoption
     *
     * @param \CGB\Relax5project\Domain\Model\Productoption $productoption
     * @return void
     */
    public function addProductoption(\CGB\Relax5project\Domain\Model\Productoption $productoption)
    {
        $this->productoptions->attach($productoption);
    }

    /**
     * Removes a Productoption
     *
     * @param \CGB\Relax5project\Domain\Model\Productoption $productoptionToRemove The Productoption to be removed
     * @return void
     */
    public function removeProductoption(\CGB\Relax5project\Domain\Model\Productoption $productoptionToRemove)
    {
        $this->productoptions->detach($productoptionToRemove);
    }

    /**
     * Returns the productoptions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Productoption> $productoptions
     */
    public function getProductoptions()
    {
        return $this->productoptions;
    }

    /**
     * Sets the productoptions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Productoption> $productoptions
     * @return void
     */
    public function setProductoptions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productoptions)
    {
        $this->productoptions = $productoptions;
    }
    
    /**
     * Returns the productoptionsFull
     * 
     * @return array
     */
    public function getProductoptionsFull () {
        $plainList = $this->productgroupRepository->findProductoptions($this->getUid());
        $productoptions = [];
        $productoptionsFull = [];
        foreach ($this->productoptions as $productoption) {
            $productoptions[$productoption->getUid()] = $productoption;
        }
        
        foreach ($plainList as $uid) {
            $productoptionsFull[] = $productoptions[$uid];
        }
        return $productoptionsFull;
    }
    
}
