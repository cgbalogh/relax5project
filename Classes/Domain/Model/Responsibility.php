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
 * Responsibility
 */
class Responsibility extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Due
     *
     * @var \DateTime
     */
    protected $due = null;

    /**
     * Done
     *
     * @var \DateTime
     */
    protected $done = null;

    /**
     * Comments
     *
     * @var string
     */
    protected $comments = '';

    /**
     * Id
     *
     * @var string
     */
    protected $id = '';

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * Returns the due
     *
     * @return \DateTime $due
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * Sets the due
     *
     * @param \DateTime $due
     * @return void
     */
    public function setDue(\DateTime $due)
    {
        $this->due = $due;
    }

    /**
     * Returns the done
     *
     * @return \DateTime $done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Sets the done
     *
     * @param \DateTime $done
     * @return void
     */
    public function setDone(\DateTime $done)
    {
        $this->done = $done;
    }

    /**
     * Returns the comments
     *
     * @return string $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets the comments
     *
     * @param string $comments
     * @return void
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
}
