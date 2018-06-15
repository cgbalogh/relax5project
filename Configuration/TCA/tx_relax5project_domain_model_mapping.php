<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping',
        'label' => 'value',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'value,status,productoption,subproduct,available_item',
        'iconfile' => 'EXT:relax5project/Resources/Public/Icons/tx_relax5project_domain_model_mapping.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, value, status, productoption, subproduct, available_item',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, value, status, productoption, subproduct, available_item'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_relax5project_domain_model_mapping',
                'foreign_table_where' => 'AND tx_relax5project_domain_model_mapping.pid=###CURRENT_PID### AND tx_relax5project_domain_model_mapping.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],

        'value' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping.value',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'productoption' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping.productoption',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5project_domain_model_productoption',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'subproduct' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping.subproduct',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5project_domain_model_subproduct',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'available_item' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mapping.available_item',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5project_domain_model_availableitem',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
        'project' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
