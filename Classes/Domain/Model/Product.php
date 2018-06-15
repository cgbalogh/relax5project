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
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * Category
     *
     * @var string
     */
    protected $category = '';

    /**
     * Productoptions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Productoption>
     */
    protected $productoptions = null;

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
        $this->productoptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the category
     *
     * @return string $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param string $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
