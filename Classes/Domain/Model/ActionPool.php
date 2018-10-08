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
 * ActionPool
 */
class ActionPool extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * ID
     *
     * @var string
     */
    protected $id = '';

    /**
     * Type
     *
     * @var string
     * @validate NotEmpty
     */
    protected $type = 0;

    /**
     * Options
     *
     * @var string
     */
    protected $options = '';

    /**
     * Actions
     *
     * @var string
     */
    protected $actions = '';

    /**
     * Keep State
     *
     * @var bool
     */
    protected $keepState = false;

    /**
     * Keep State Distinct
     *
     * @var bool
     */
    protected $keepStateDistinct = false;

    /**
     * Debug
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Inputs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Input>
     * @cascade remove
     */
    protected $inputs = null;

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
     * Returns the type
     *
     * @return string type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param int $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id
     *
     * @param string $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the options
     *
     * @return string $options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the options
     *
     * @param string $options
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * Returns the actions
     *
     * @return string $actions
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Sets the actions
     *
     * @param string $actions
     * @return void
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    /**
     * Returns the keepState
     *
     * @return bool $keepState
     */
    public function getKeepState()
    {
        return $this->keepState;
    }

    /**
     * Sets the keepState
     *
     * @param bool $keepState
     * @return void
     */
    public function setKeepState($keepState)
    {
        $this->keepState = $keepState;
    }

    /**
     * Returns the boolean state of keepState
     *
     * @return bool
     */
    public function isKeepState()
    {
        return $this->keepState;
    }

    /**
     * Returns the debug
     *
     * @return bool $debug
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug
     *
     * @param bool $debug
     * @return void
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * Returns the boolean state of debug
     *
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
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
        $this->inputs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Input
     *
     * @param \CGB\Relax5project\Domain\Model\Input $input
     * @return void
     */
    public function addInput(\CGB\Relax5project\Domain\Model\Input $input)
    {
        $this->inputs->attach($input);
    }

    /**
     * Removes a Input
     *
     * @param \CGB\Relax5project\Domain\Model\Input $inputToRemove The Input to be removed
     * @return void
     */
    public function removeInput(\CGB\Relax5project\Domain\Model\Input $inputToRemove)
    {
        $this->inputs->detach($inputToRemove);
    }

    /**
     * Returns the inputs
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Input> $inputs
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * Sets the inputs
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\Input> $inputs
     * @return void
     */
    public function setInputs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Returns the keepStateDistinct
     *
     * @return bool $keepStateDistinct
     */
    public function getKeepStateDistinct()
    {
        return $this->keepStateDistinct;
    }

    /**
     * Sets the keepStateDistinct
     *
     * @param bool $keepStateDistinct
     * @return void
     */
    public function setKeepStateDistinct($keepStateDistinct)
    {
        $this->keepStateDistinct = $keepStateDistinct;
    }

    /**
     * Returns the boolean state of keepStateDistinct
     *
     * @return bool
     */
    public function isKeepStateDistinct()
    {
        return $this->keepStateDistinct;
    }
}
