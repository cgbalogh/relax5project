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
 * The repository for Productgroups
 */
class ProductgroupRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];

    /**
     * 
     * @param type $productgroupUid
     * @return type
     */
    public function findProductoptions ( $productgroupUid ) {
       $selectFields = "productoptions"; 
       $fromTable = "tx_relax5project_domain_model_productgroup"; 
       $whereClause = "uid = " . (int) $productgroupUid;

       $result = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows( $selectFields, $fromTable, $whereClause, $groupBy, $orderBy, $limit);
       $uidList = explode(',', $result[0]['productoptions']);

       return $uidList;
    }
    
    
}
