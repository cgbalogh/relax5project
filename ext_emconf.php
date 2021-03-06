<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "relax5project"
 *
 * Auto generated by Extension Builder 2018-06-06
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'relax5project',
    'description' => 'relax5project for typo3 7x and PHP7.x',
    'category' => 'plugin',
    'author' => '',
    'author_email' => '',
    'state' => 'beta',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '8.7.2-rc181004',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

/**
 * 8.7.2-rc80531
 * corrected (finally) actionDisplayViewHelper line 129
 * 
 * 8.7.2-rc80529
 * added creator to domain model object state
 * 
 * 8.7.2-rc80515
 * setInternal in role accepts also null
 * 
 * 8.7.2-rc80507
 * added addional parameter for search in dropdownFromRepository 
 * added findByAnyUsergroupAndTeam to support team selection
*/