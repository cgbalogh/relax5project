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
 * Role
 */
class Role extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Role
     *
     * @var string
     * @validate NotEmpty
     */
    protected $role = '';

    /**
     * External
     *
     * @var string
     */
    protected $external = '';

    /**
     * Internal
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     */
    protected $internal = null;

    /**
     * Returns the role
     *
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the role
     *
     * @param string $role
     * @return void
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Returns the external
     *
     * @return string $external
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * Sets the external
     *
     * @param string $external
     * @return void
     */
    public function setExternal($external)
    {
        $this->external = $external;
    }

    /**
     * Returns the internal
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $internal
     */
    public function getInternal()
    {
        return $this->internal;
    }

    /**
     * Sets the internal
     *
     * @param \CGB\Relax5core\Domain\Model\Owner|null $internal
     * @return void
     */
    public function setInternal(\CGB\Relax5core\Domain\Model\Owner $internal = null)
    {
        $this->internal = $internal;
    }
}
