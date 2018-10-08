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
 * Cost
 */
class Cost extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Exclude Group
     *
     * @var int
     */
    protected $excludeGroup = 0;

    /**
     * Target
     *
     * @var float
     */
    protected $target = 0.0;

    /**
     * Actual
     *
     * @var float
     */
    protected $actual = 0.0;

    /**
     * Confirmed
     *
     * @var bool
     */
    protected $confirmed = false;

    /**
     * Void
     *
     * @var bool
     */
    protected $void = false;

    /**
     * Keycode
     *
     * @var string
     */
    protected $keycode = '';

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * Can Confirm
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $canConfirm = null;

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
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
     * Returns the excludeGroup
     *
     * @return int $excludeGroup
     */
    public function getExcludeGroup()
    {
        return $this->excludeGroup;
    }

    /**
     * Sets the excludeGroup
     *
     * @param int $excludeGroup
     * @return void
     */
    public function setExcludeGroup($excludeGroup)
    {
        $this->excludeGroup = $excludeGroup;
    }

    /**
     * Returns the target
     *
     * @return float $target
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Sets the target
     *
     * @param float $target
     * @return void
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * Returns the actual
     *
     * @return float $actual
     */
    public function getActual()
    {
        return $this->actual;
    }

    /**
     * Sets the actual
     *
     * @param float $actual
     * @return void
     */
    public function setActual($actual)
    {
        $this->actual = $actual;
    }

    /**
     * Returns the confirmed
     *
     * @return bool $confirmed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Sets the confirmed
     *
     * @param bool $confirmed
     * @return void
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * Returns the boolean state of confirmed
     *
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Returns the void
     *
     * @return bool $void
     */
    public function getVoid()
    {
        return $this->void;
    }

    /**
     * Sets the void
     *
     * @param bool $void
     * @return void
     */
    public function setVoid($void)
    {
        $this->void = $void;
    }

    /**
     * Returns the boolean state of void
     *
     * @return bool
     */
    public function isVoid()
    {
        return $this->void;
    }

    /**
     * Returns the owner
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $owner
     * @return void
     */
    public function setOwner(\CGB\Relax5core\Domain\Model\Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the canConfirm
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $canConfirm
     */
    public function getCanConfirm()
    {
        return $this->canConfirm;
    }

    /**
     * Sets the canConfirm
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $canConfirm
     * @return void
     */
    public function setCanConfirm(\CGB\Relax5core\Domain\Model\Owner $canConfirm)
    {
        $this->canConfirm = $canConfirm;
    }

    /**
     * Returns the keycode
     *
     * @return string $keycode
     */
    public function getKeycode()
    {
        return $this->keycode;
    }

    /**
     * Sets the keycode
     *
     * @param string $keycode
     * @return void
     */
    public function setKeycode($keycode)
    {
        $this->keycode = $keycode;
    }
}
