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
 * Productoption
 */
class Productoption extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * Optiongroup
     *
     * @var string
     */
    protected $optiongroup = '';

    /**
     * Optionlist
     *
     * @var string
     */
    protected $optionlist = '';

    /**
     * Labeltext
     *
     * @var string
     */
    protected $labeltext = '';

    /**
     * Exclusive
     *
     * @var bool
     */
    protected $exclusive = false;

    /**
     * Dropdown
     *
     * @var bool
     */
    protected $dropdown = false;

    /**
     * Display Condition
     *
     * @var string
     */
    protected $displayCondition = '';

    /**
     * New Mapping
     *
     * @var bool
     */
    protected $newMapping = false;

    /**
     * Input Type
     *
     * @var string
     */
    protected $inputType = '';

    /**
     * Input Values
     *
     * @var string
     */
    protected $inputValues = '';

    /**
     * Global Option
     *
     * @var bool
     */
    protected $globalOption = false;

    /**
     * Enable
     *
     * @var string
     */
    protected $enable = '';

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
     * Returns the optiongroup
     *
     * @return string $optiongroup
     */
    public function getOptiongroup()
    {
        return $this->optiongroup;
    }

    /**
     * Sets the optiongroup
     *
     * @param string $optiongroup
     * @return void
     */
    public function setOptiongroup($optiongroup)
    {
        $this->optiongroup = $optiongroup;
    }

    /**
     * Returns the optionlist
     *
     * @return string $optionlist
     */
    public function getOptionlist()
    {
        return $this->optionlist;
    }

    /**
     * Sets the optionlist
     *
     * @param string $optionlist
     * @return void
     */
    public function setOptionlist($optionlist)
    {
        $this->optionlist = $optionlist;
    }

    /**
     * Returns the labeltext
     *
     * @return string $labeltext
     */
    public function getLabeltext()
    {
        return $this->labeltext;
    }

    /**
     * Sets the labeltext
     *
     * @param string $labeltext
     * @return void
     */
    public function setLabeltext($labeltext)
    {
        $this->labeltext = $labeltext;
    }

    /**
     * Returns the exclusive
     *
     * @return bool $exclusive
     */
    public function getExclusive()
    {
        return $this->exclusive;
    }

    /**
     * Sets the exclusive
     *
     * @param bool $exclusive
     * @return void
     */
    public function setExclusive($exclusive)
    {
        $this->exclusive = $exclusive;
    }

    /**
     * Returns the boolean state of exclusive
     *
     * @return bool
     */
    public function isExclusive()
    {
        return $this->exclusive;
    }

    /**
     * Returns the dropdown
     *
     * @return bool $dropdown
     */
    public function getDropdown()
    {
        return $this->dropdown;
    }

    /**
     * Sets the dropdown
     *
     * @param bool $dropdown
     * @return void
     */
    public function setDropdown($dropdown)
    {
        $this->dropdown = $dropdown;
    }

    /**
     * Returns the boolean state of dropdown
     *
     * @return bool
     */
    public function isDropdown()
    {
        return $this->dropdown;
    }

    /**
     * Returns the newMapping
     *
     * @return bool $newMapping
     */
    public function getNewMapping()
    {
        return $this->newMapping;
    }

    /**
     * Sets the newMapping
     *
     * @param bool $newMapping
     * @return void
     */
    public function setNewMapping($newMapping)
    {
        $this->newMapping = $newMapping;
    }

    /**
     * Returns the boolean state of newMapping
     *
     * @return bool
     */
    public function isNewMapping()
    {
        return $this->newMapping;
    }

    /**
     * Returns the inputType
     *
     * @return string $inputType
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * Sets the inputType
     *
     * @param string $inputType
     * @return void
     */
    public function setInputType($inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * Returns the inputValues
     *
     * @return string $inputValues
     */
    public function getInputValues()
    {
        return $this->inputValues;
    }

    /**
     * Sets the inputValues
     *
     * @param string $inputValues
     * @return void
     */
    public function setInputValues($inputValues)
    {
        $this->inputValues = $inputValues;
    }

    /**
     * Returns the globalOption
     *
     * @return bool $globalOption
     */
    public function getGlobalOption()
    {
        return $this->globalOption;
    }

    /**
     * Sets the globalOption
     *
     * @param bool $globalOption
     * @return void
     */
    public function setGlobalOption($globalOption)
    {
        $this->globalOption = $globalOption;
    }

    /**
     * Returns the boolean state of globalOption
     *
     * @return bool
     */
    public function isGlobalOption()
    {
        return $this->globalOption;
    }

    /**
     * Returns the enable
     *
     * @return string $enable
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Sets the enable
     *
     * @param string $enable
     * @return void
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    /**
     * Returns the displayCondition
     *
     * @return string displayCondition
     */
    public function getDisplayCondition()
    {
        return $this->displayCondition;
    }

    /**
     * Sets the displayCondition
     *
     * @param string $displayCondition
     * @return void
     */
    public function setDisplayCondition($displayCondition)
    {
        $this->displayCondition = $displayCondition;
    }
    
    /**
     * Gets the inputValues as array
     * @return array
     */
    function getInputValuesArray() {
        $values = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->inputValues);
        $selectArray = array();
        foreach ($values as $value) {
            $entry = new \stdClass;
            $entry->label = $value;
            $entry->value = $value;
            $selectArray[] = $entry;
        }
        return $selectArray;
    }
    
}
