<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_project']['interface']['showRecordFieldList'] = 
    'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, time_horizon, operative_start, operative_end, target, actual, states, owner, usergroup, mappings, address, costs';
        
$GLOBALS['TCA']['tx_relax5project_domain_model_project']['types'][1]['showitem'] = 
    'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, time_horizon, operative_start, operative_end, target, actual, states, owner, usergroup, mappings, address, costs,  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime';


$GLOBALS['TCA']['tx_relax5project_domain_model_project']['columns']['states']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5project_domain_model_project']['columns']['mappings']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5project_domain_model_project']['columns']['address']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5project_domain_model_project']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5project_domain_model_project']['columns']['tstamp'] = [
    'label' => 'Modification Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];
