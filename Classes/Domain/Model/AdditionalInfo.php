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
 * AdditionalInfo
 */
class AdditionalInfo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Key
     *
     * @var string
     */
    protected $infoKey = '';

    /**
     * Label
     *
     * @var string
     */
    protected $infoLabel = '';

    /**
     * Value
     *
     * @var string
     */
    protected $infoValue = '';

    /**
     * Returns the infoKey
     *
     * @return string $infoKey
     */
    public function getInfoKey()
    {
        return $this->infoKey;
    }

    /**
     * Sets the infoKey
     *
     * @param string $infoKey
     * @return void
     */
    public function setInfoKey($infoKey)
    {
        $this->infoKey = $infoKey;
    }

    /**
     * Returns the infoLabel
     *
     * @return string $infoLabel
     */
    public function getInfoLabel()
    {
        return $this->infoLabel;
    }

    /**
     * Sets the infoLabel
     *
     * @param string $infoLabel
     * @return void
     */
    public function setInfoLabel($infoLabel)
    {
        $this->infoLabel = $infoLabel;
    }

    /**
     * Returns the infoValue
     *
     * @return string $infoValue
     */
    public function getInfoValue()
    {
        return $this->infoValue;
    }

    /**
     * Sets the infoValue
     *
     * @param string $infoValue
     * @return void
     */
    public function setInfoValue($infoValue)
    {
        $this->infoValue = $infoValue;
    }
}
