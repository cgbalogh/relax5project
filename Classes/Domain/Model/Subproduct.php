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
 * Sub Product
 */
class Subproduct extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
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
     * Available
     *
     * @var int
     */
    protected $available = 0;

    /**
     * Available Items
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AvailableItem>
     * @cascade remove
     */
    protected $availableItems = null;

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
     * Returns the available
     *
     * @return int $available
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Sets the available
     *
     * @param int $available
     * @return void
     */
    public function setAvailable($available)
    {
        $this->available = $available;
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
        $this->availableItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a AvailableItem
     *
     * @param \CGB\Relax5project\Domain\Model\AvailableItem $availableItem
     * @return void
     */
    public function addAvailableItem(\CGB\Relax5project\Domain\Model\AvailableItem $availableItem)
    {
        $this->availableItems->attach($availableItem);
    }

    /**
     * Removes a AvailableItem
     *
     * @param \CGB\Relax5project\Domain\Model\AvailableItem $availableItemToRemove The AvailableItem to be removed
     * @return void
     */
    public function removeAvailableItem(\CGB\Relax5project\Domain\Model\AvailableItem $availableItemToRemove)
    {
        $this->availableItems->detach($availableItemToRemove);
    }

    /**
     * Returns the availableItems
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AvailableItem> $availableItems
     */
    public function getAvailableItems()
    {
        return $this->availableItems;
    }

    /**
     * Sets the availableItems
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\AvailableItem> $availableItems
     * @return void
     */
    public function setAvailableItems(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $availableItems)
    {
        $this->availableItems = $availableItems;
    }
}
