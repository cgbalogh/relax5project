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
 * PhasePool
 */
class PhasePool extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * style
     *
     * @var string
     * @validate NotEmpty
     */
    protected $style = '';

    /**
     * States
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\StatePool>
     * @cascade remove
     * @lazy
     */
    protected $states = null;

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
        $this->states = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a StatePool
     *
     * @param \CGB\Relax5project\Domain\Model\StatePool $state
     * @return void
     */
    public function addState(\CGB\Relax5project\Domain\Model\StatePool $state)
    {
        $this->states->attach($state);
    }

    /**
     * Removes a StatePool
     *
     * @param \CGB\Relax5project\Domain\Model\StatePool $stateToRemove The StatePool to be removed
     * @return void
     */
    public function removeState(\CGB\Relax5project\Domain\Model\StatePool $stateToRemove)
    {
        $this->states->detach($stateToRemove);
    }

    /**
     * Returns the states
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\StatePool> $states
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Sets the states
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\StatePool> $states
     * @return void
     */
    public function setStates(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $states)
    {
        $this->states = $states;
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
     * Returns the style
     *
     * @return string $style
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Sets the style
     *
     * @param string $style
     * @return void
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }
}
