<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_mapping']['columns']['sorting'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

/**
 * adjust select values for gender
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_mapping']['columns']['status']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_mapping.status.1', 1),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_mapping.status.2', 2),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_mapping.status.3', 3),
);