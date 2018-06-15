<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_state']['interface']['showRecordFieldList'] = 
    'sys_language_uid, l10n_parent, l10n_diffsource, hidden, state_name, state_group, due, due_orig, done, forward, notify, state, owner, additional_infos,tag_data';
        
$GLOBALS['TCA']['tx_relax5project_domain_model_state']['types'][1]['showitem'] = 
    'sys_language_uid, l10n_parent, l10n_diffsource, hidden, state_name, state_group, due, due_orig, done, forward, notify, state, owner, additional_infos,tag_data, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime';

$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['sorting'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['project'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_state.project',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5project_domain_model_project',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];
    


$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['additional_infos']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['appointments']['config']['foreign_sortby'] = 'date';
// $GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['appointments']['config']['foreign_table_where'] = 'AND quark  ORDER BY date';

$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5project_domain_model_state']['columns']['tstamp'] = [
    'label' => 'Modification Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];
