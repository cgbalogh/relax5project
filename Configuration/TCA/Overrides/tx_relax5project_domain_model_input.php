<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_input']['columns']['type'] =  [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_actionpool.type',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['-- Label --', 0],
        ],
        'size' => 1,
        'maxitems' => 1,
        'eval' => 'required'
    ],
];

/**
 * adjust select values for type
 */
$GLOBALS['TCA']['tx_relax5project_domain_model_input']['columns']['type']['config']['items'] = array(
    array('LLL:EXT:relax5project/Resources/Private/Language/locallang.xlf:tx_relax5project_general.select_from_list', 0),
    array('__Input:__', '--div--'),
    array('textfield', 'textfield'),
    array('integer', 'integer'),
    array('currency', 'currency'),
    array('textarea', 'textarea'),
    array('checkbox', 'checkbox'),
    array('optiongroup', 'optiongroup'),
    array('dropdown', 'dropdown'),
    array('dropdownFromRepository', 'dropdownFromRepository'),
    array('datepicker', 'datepicker'),
    array('datetimepicker', 'datetimepicker'),
    array('text', 'text'),
    array('hidden', 'hidden'),
    array('__Special:__', '--div--'),
    array('address', 'address'),
    array('appointment', 'appointment'),
    array('products', 'products'),
    array('productoptions', 'productoptions'),
    array('__Actions:__', '--div--'),
    array('execute', 'execute'),
    array('email', 'email'),
);
