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
 * The repository for Projects
 */
class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'currentState.state' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];

    /**
     * @param type $subproduct
     * @return type
     */
    public function findBySubproduct($subproduct)
    {
        $query = $this->createQuery();
        $query->matching($query->equals('mappings.subproduct.availableItems.uid', $subproduct));
        return $query->execute();
    }
    
    /**
     * 
     * @param type $owner
     * @param string $showStateList
     * @param int $pid
     * @return type
     */
    public function findByOwnerGroupByCurrentState ($owner, $showStateList = '', $pid = 0)
    {
        $projectStateListQuery = '';
        if ($showStateList) {
            $projectStateListQuery = "AND sp.`uid` IN($showStateList)";
        }
        /**
        if ($projectStateListDeny) {
            $projectStateListQuery = "AND sp.`name` NOT IN($projectStateListDeny)";
        }
        **/
        $sql = "
   SELECT sp.`uid`,
          sp.`name`,
          sp.`style`,
          sp.`sorting`,
          sp.`color_primary` AS colorPrimary,
           COUNT(*) AS cnt

     FROM `tx_relax5project_domain_model_project` p 
LEFT JOIN `tx_relax5project_domain_model_state` s1 ON p.`current_state` = s1.`uid` 
LEFT JOIN `tx_relax5project_domain_model_statepool` sp ON s1.`state` = sp.`uid` 
    WHERE (p.`owner` = $owner) 
      AND (s1.`done` = 0)
      AND (s1.`rejected` = 0)
      AND (p.`pid` = $pid) 
      AND (p.`deleted` = 0) 
      AND (p.`pid` <> -1) 
      AND (p.`hidden` = 0) 
      AND (p.`mockup` = 0) 
      AND (s1.`pid` = $pid) 
      AND (s1.`deleted` = 0) 
      AND (s1.`pid` <> -1) 
      AND (s1.`hidden` = 0) 
      AND (sp.`noshow_dashboard` = 0) 
      AND (sp.`pid` = $pid) 
      AND (sp.`deleted` = 0) 
      AND (sp.`pid` <> -1) 
      AND (sp.`hidden` = 0) 
    GROUP BY 1
    HAVING sp.`name` != '' $projectStateListQuery
    ORDER BY sp.`sorting` ASC
        ";
        
        // echo $sql;
        
        $query = $this->createQuery();
        $query->statement($sql);
        return $query->execute(true);
    }
    
    /**
     * 
     * @param type $owner
     * @param string $showStateList
     * @param int $pid
     * @return type
     */
    public function findByOwnerGroupByCurrentSubgroup ($owner, $showStateList = '', $pid = 0)
    {
        $projectStateListQuery = '';
        if ($showStateList) {
            $projectStateListQuery = "AND sp.`uid` IN($showStateList)";
        }
        /**
        if ($projectStateListDeny) {
            $projectStateListQuery = "AND sp.`name` NOT IN($projectStateListDeny)";
        }
        **/
        $sql = "
   SELECT sp.`uid`,
          sp.`subgroup`,
          sp.`style`,
          sp.`sorting`,
          sp.`color_primary` AS colorPrimary,
           COUNT(*) AS cnt

     FROM `tx_relax5project_domain_model_project` p 
LEFT JOIN `tx_relax5project_domain_model_state` s1 ON p.`current_state` = s1.`uid` 
LEFT JOIN `tx_relax5project_domain_model_statepool` sp ON s1.`state` = sp.`uid` 
    WHERE (p.`owner` = $owner) 
      AND (s1.`done` = 0)
      AND (s1.`rejected` = 0)
      AND (p.`pid` = $pid) 
      AND (p.`deleted` = 0) 
      AND (p.`pid` <> -1) 
      AND (p.`hidden` = 0) 
      AND (p.`mockup` = 0) 
      AND (s1.`pid` = $pid) 
      AND (s1.`deleted` = 0) 
      AND (s1.`pid` <> -1) 
      AND (s1.`hidden` = 0) 
      AND (sp.`noshow_dashboard` = 0) 
      AND (sp.`pid` = $pid) 
      AND (sp.`deleted` = 0) 
      AND (sp.`pid` <> -1) 
      AND (sp.`hidden` = 0) 
    GROUP BY 2
    HAVING sp.`subgroup` != '' $projectStateListQuery
    ORDER BY sp.`subgroup` ASC
        ";
        
        // echo $sql;
        
        $query = $this->createQuery();
        $query->statement($sql);
        return $query->execute(true);
    }
    
}


