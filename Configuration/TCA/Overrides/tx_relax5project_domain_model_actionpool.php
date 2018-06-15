<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_actionpool']['columns']['type']['config'] =
    [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['-- Label --', 0],
        ],
        'size' => 1,
        'maxitems' => 1,
        'eval' => 'required'
    ];


/**
 * adjust select values for type
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_actionpool']['columns']['type']['config']['items'] = array(
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_general.select_from_list', 0),
    array('__Actions:__', '--div--'),
    array('execute', 'execute'),
    array('email', 'email'),
    array('curl', 'curl'),
);

$GLOBALS['TCA']['tx_relax5project_domain_model_actionpool']['columns']['inputs']['config']['appearance']['collapseAll'] = 1;