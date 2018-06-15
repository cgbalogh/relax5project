<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['actions']['config']['appearance']['collapseAll'] = 1;


$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['allow_group']['config']['foreign_table_where'] = 'ORDER BY fe_groups.title';


/**
 * allow empty value for nextstate
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['nextstate']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for prevstate
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['prevstate']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for allow_with_appointment
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['allow_with_appointment']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.allow_with_appointment.1', 1),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.allow_with_appointment.2', 2),
);

/**
 * allow empty value for enable_on_result
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['enable_on_result']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.6', 6),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.7', 7),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.8', 8),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.9', 9),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.result.10', 10),
);

/**
 * adjust settings for allowIfForwarded
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['allow_if_forwarded']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.allow_if_forwarded.1', 1),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.allow_if_forwarded.2', 2),
);

/**
 * allow empty value for enable_on_next_action
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['enable_on_next_action']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.next_action.6', 6),
);

/**
 * adjust settings for conditionMode
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['condition_mode']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.condition_mode.1', 1),
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_domain_model_transitionpool.condition_mode.2', 2),
);


$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['actions']['config']['foreign_table_where'] = 'ORDER BY name';
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['allow_user']['config']['foreign_table_where'] = 'ORDER BY username';
$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['columns']['allow_group']['config']['foreign_table_where'] = 'ORDER BY title';


$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['types']['1']['showitem'] = 
        'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime';


// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
  'tx_relax5project_domain_model_transitionpool', 
  ''.
  '--palette--;Basic settings;basicData,'.
  '--palette--;Previous and Next state;proceedState,'.
  '--palette--;Display restrictions;restrictions,'.
  '--palette--;Appointment behaviour;appointment,'.
  '--palette--;Conditional display;condition,'.
  '--palette--;Miscellanious Settings;misc,'.
  '--palette--;Action and Image Display Settings;action,'.  
  '--palette--;User and Group permissions;userPalette,', 
  '1', // List of specific types to add the field list to. (If empty, all type entries are affected)
  'after:hidden' // Insert fields before (default) or after one, or replace a field
);

//$GLOBALS['TCA']['tx_relax5project_domain_model_statepool']['types'] = [
//    '1' => [
//        'showitem' => '--palette--;;aPalette,subgroup'
//    ]
//];

$GLOBALS['TCA']['tx_relax5project_domain_model_transitionpool']['palettes'] = [
    'basicData' => [
        'showitem' => 'name,description',
    ],
    'proceedState' => [
        'showitem' => 'nextstate, prevstate',
    ],
    'restrictions' => [
        'showitem' => 'allow_project_owner, allow_state_owner, allow_parent_owner, allow_once, allow_current_state_only, deny_if_done, global, meta',
    ],
    'appointment' => [
        'showitem' => 'allow_with_appointment, enable_on_result, enable_on_next_action',
    ],
    'condition' => [
        'showitem' => 'condition_expression, condition_mode, condition_message',
    ],
    'misc' => [
        'showitem' => 'allow_if_forwarded, debug',
    ],
    'action' => [
        'showitem' => 'actions,button',
    ],
    'userPalette' => [
        'showitem' => 'allow_user, allow_group',
    ]
    
];

// sys_language_uid, l10n_parent, l10n_diffsource, hidden, 
// name, description, 
// allow_if_forwarded, allow_with_appointment, deny_if_done, condition_expression, condition_mode, condition_message, debug, enable_on_result, enable_on_next_action, button, global, meta, actions, nextstate, prevstate, allow_user, allow_group, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],