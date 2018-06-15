<?php

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['columns']['transition_outs']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['columns']['transition_ins']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['columns']['color_primary'] = 
    [
        'exclude' => true,
        'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_statepool.color_primary',
        'config' => [
            'renderType' => 'colorpicker',
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim'
        ],
    ];

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['columns']['transition_outs']['config']['appearance']['expandSingle'] = 1;

// $GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['ctrl']['sortby'] = 'name';

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['palettes'] = [
    '2' => ['showitem' => 'name,description'],
];

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['types']['1']['showitem'] = 
        'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime';


// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'tx_relax5project_domain_model_statepool', 
  ''.
  '--palette--;Basic Settings;basic,'.
  '--palette--;Styles and Colors;styles,'.
  '--palette--;Transitions;transitions, ', 
  '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
  'after:hidden' // Insert fields before (default) or after one, or replace a field
);

//$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['types'] = [
//    '1' => [
//        'showitem' => '--palette--;;aPalette,subgroup'
//    ]
//];

$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['palettes'] = [
    'basic' => [
        'showitem' => 'name,subgroup,description',
    ],
    'styles' => [
        'showitem' => 'style,color_primary,noshow_dashboard',
    ],
    'transitions' => [
        'showitem' => 'transition_ins, --linebreak--, transition_outs',
    ],
];
