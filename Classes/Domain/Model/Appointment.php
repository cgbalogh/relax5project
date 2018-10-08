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
 * Appointment
 */
class Appointment extends \CGB\Relax5core\Domain\Model\Appointment
{
    /**
     * @var \CGB\Relax5project\Domain\Model\State $state
     */
    protected $state = null;

    /**
     * @var \CGB\Relax5project\Domain\Model\Project $project
     */
    protected $project = null;

    /**
     * Locked
     *
     * @var bool
     */
    protected $locked = false;

    /**
     * Returns the locked
     *
     * @return bool $locked
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Sets the locked
     *
     * @param bool $locked
     * @return void
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * Returns the boolean state of locked
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\State
     */
    function getState()
    {
        return $this->state;
    }

    /**
     * @return \CGB\Relax5project\Domain\Model\Project
     */
    function getProject()
    {
        return $this->project;
    }

    /**
     * @param \CGB\Relax5project\Domain\Model\State $state
     */
    function setState(\CGB\Relax5project\Domain\Model\State $state)
    {
        $this->state = $state;
    }

    /**
     * @param \CGB\Relax5project\Domain\Model\Project $project
     */
    function setProject(\CGB\Relax5project\Domain\Model\Project $project)
    {
        $this->project = $project;
    }

    /**
     * @return bool
     */
    public function getHasProject()
    {
        return !is_null($this->project);
    }
}
