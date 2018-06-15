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
 * StatePool
 */
class StatePool extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * Subgroup
     *
     * @var string
     */
    protected $subgroup = '';

    /**
     * Style
     *
     * @var string
     */
    protected $style = '';

    /**
     * Don't show on dashboard
     *
     * @var bool
     */
    protected $noshowDashboard = false;

    /**
     * Primary Color
     *
     * @var string
     */
    protected $colorPrimary = '';

    /**
     * Transition Ins
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool>
     * @cascade remove
     * @lazy
     */
    protected $transitionIns = null;

    /**
     * Transition Outs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool>
     * @cascade remove
     * @lazy
     */
    protected $transitionOuts = null;

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
        $this->transitionIns = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->transitionOuts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a TransitionPool
     *
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionIn
     * @return void
     */
    public function addTransitionIn(\CGB\Relax5project\Domain\Model\TransitionPool $transitionIn)
    {
        $this->transitionIns->attach($transitionIn);
    }

    /**
     * Removes a TransitionPool
     *
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionInToRemove The TransitionPool to be removed
     * @return void
     */
    public function removeTransitionIn(\CGB\Relax5project\Domain\Model\TransitionPool $transitionInToRemove)
    {
        $this->transitionIns->detach($transitionInToRemove);
    }

    /**
     * Returns the transitionIns
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool> $transitionIns
     */
    public function getTransitionIns()
    {
        return $this->transitionIns;
    }

    /**
     * Sets the transitionIns
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool> $transitionIns
     * @return void
     */
    public function setTransitionIns(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $transitionIns)
    {
        $this->transitionIns = $transitionIns;
    }

    /**
     * Adds a TransitionPool
     *
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionOut
     * @return void
     */
    public function addTransitionOut(\CGB\Relax5project\Domain\Model\TransitionPool $transitionOut)
    {
        $this->transitionOuts->attach($transitionOut);
    }

    /**
     * Removes a TransitionPool
     *
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionOutToRemove The TransitionPool to be removed
     * @return void
     */
    public function removeTransitionOut(\CGB\Relax5project\Domain\Model\TransitionPool $transitionOutToRemove)
    {
        $this->transitionOuts->detach($transitionOutToRemove);
    }

    /**
     * Returns the transitionOuts
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool> $transitionOuts
     */
    public function getTransitionOuts()
    {
        return $this->transitionOuts;
    }

    /**
     * Sets the transitionOuts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5project\Domain\Model\TransitionPool> $transitionOuts
     * @return void
     */
    public function setTransitionOuts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $transitionOuts)
    {
        $this->transitionOuts = $transitionOuts;
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
     * Returns the subgroup
     *
     * @return string $subgroup
     */
    public function getSubgroup()
    {
        return $this->subgroup;
    }

    /**
     * Sets the subgroup
     *
     * @param string $subgroup
     * @return void
     */
    public function setSubgroup($subgroup)
    {
        $this->subgroup = $subgroup;
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

    /**
     * Returns the colorPrimary
     *
     * @return string $colorPrimary
     */
    public function getColorPrimary()
    {
        return $this->colorPrimary;
    }

    /**
     * Sets the colorPrimary
     *
     * @param string $colorPrimary
     * @return void
     */
    public function setColorPrimary($colorPrimary)
    {
        $this->colorPrimary = $colorPrimary;
    }

    /**
     * Returns the noshowDashboard
     *
     * @return bool $noshowDashboard
     */
    public function getNoshowDashboard()
    {
        return $this->noshowDashboard;
    }

    /**
     * Sets the noshowDashboard
     *
     * @param bool $noshowDashboard
     * @return void
     */
    public function setNoshowDashboard($noshowDashboard)
    {
        $this->noshowDashboard = $noshowDashboard;
    }

    /**
     * Returns the boolean state of noshowDashboard
     *
     * @return bool
     */
    public function isNoshowDashboard()
    {
        return $this->noshowDashboard;
    }
}
