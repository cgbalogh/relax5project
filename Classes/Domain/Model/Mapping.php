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
 * Mapping
 */
class Mapping extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var int
     */
    protected $sorting = 0;

    /**
     * Value
     *
     * @var string
     */
    protected $value = '';

    /**
     * Status
     *
     * @var int
     */
    protected $status = 0;

    /**
     * Productoption
     *
     * @var \CGB\Relax5project\Domain\Model\Productoption
     */
    protected $productoption = null;

    /**
     * Subproduct
     *
     * @var \CGB\Relax5project\Domain\Model\Subproduct
     */
    protected $subproduct = null;

    /**
     * availableItem
     *
     * @var \CGB\Relax5project\Domain\Model\AvailableItem
     */
    protected $availableItem = null;

    /**
     * Returns the value
     *
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value
     *
     * @param string $value
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Returns the productoption
     *
     * @return \CGB\Relax5project\Domain\Model\Productoption $productoption
     */
    public function getProductoption()
    {
        return $this->productoption;
    }

    /**
     * Sets the productoption
     *
     * @param \CGB\Relax5project\Domain\Model\Productoption $productoption
     * @return void
     */
    public function setProductoption(\CGB\Relax5project\Domain\Model\Productoption $productoption)
    {
        $this->productoption = $productoption;
    }

    /**
     * @return int
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param int $sorting
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * Returns the subproduct
     *
     * @return \CGB\Relax5project\Domain\Model\Subproduct subproduct
     */
    public function getSubproduct()
    {
        return $this->subproduct;
    }

    /**
     * Sets the subproduct
     *
     * @param \CGB\Relax5project\Domain\Model\Subproduct $subproduct
     * @return void
     */
    public function setSubproduct(\CGB\Relax5project\Domain\Model\Subproduct $subproduct)
    {
        $this->subproduct = $subproduct;
    }

    /**
     * Returns the availableItem
     *
     * @return \CGB\Relax5project\Domain\Model\AvailableItem $availableItem
     */
    public function getAvailableItem()
    {
        return $this->availableItem;
    }

    /**
     * Sets the availableItem
     *
     * @param \CGB\Relax5project\Domain\Model\AvailableItem $availableItem
     * @return void
     */
    public function setAvailableItem(\CGB\Relax5project\Domain\Model\AvailableItem $availableItem)
    {
        $this->availableItem = $availableItem;
    }

    /**
     * Returns the status
     *
     * @return int $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the statusText
     *
     * @return string
     */
    public function getStatusText()
    {
        return \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5project_domain_model_mapping', 'status', 'relax5project')[$this->status];
    }
    
    /**
     * Sets the status
     *
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
