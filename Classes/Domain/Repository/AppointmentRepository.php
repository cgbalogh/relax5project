<?php
namespace CGB\Relax5project\Domain\Repository;

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
 * The repository for Appointments
 */
class AppointmentRepository extends \CGB\Fechangelog\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
    ];
    
    /**
     * 
     * @param type $owner
     */
    public function findPendingByOwner($owner) {
        $now = new \DateTime;
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('owner', $owner),
                $query->lessThan('appointment_status', 3),
                $query->lessThan('date', $now)
            )
        );
        return $query->execute();
    }
    
    
    public function findPendingAppointmentStats($owner) {
        $now = new \DateTime;
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('owner', $owner),
                $query->lessThan('appointment_status', 3),
                $query->lessThan('date', $now)
            )
        );
        return $query->execute();
    }
    
}
