<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_relax5project_tx_relax5core_domain_model_appointment = [];
    $tempColumnstx_relax5project_tx_relax5core_domain_model_appointment[$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['Appointment Core','Tx_Relax5core_Appointment'],
                ['Appointment Project','Tx_Relax5project_Appointment']
            ],
            'default' => 'Tx_Relax5core_Appointment',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_relax5core_domain_model_appointment', $tempColumnstx_relax5project_tx_relax5core_domain_model_appointment);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_relax5core_domain_model_appointment',
    $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['label']
);

$tmp_relax5project_columns = [

    'locked' => [
        'exclude' => true,
        'label' => 'LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_appointment.locked',
        'config' => [
            'type' => 'check',
            'items' => [
                '1' => [
                    '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                ]
            ],
            'default' => 0,
        ]
    ],

];

$tmp_relax5project_columns['project'] = [
    'config' => [
        'type' => 'passthrough',
    ]
];
$tmp_relax5project_columns['state'] = [
    'config' => [
        'type' => 'passthrough',
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_relax5core_domain_model_appointment',$tmp_relax5project_columns);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['1']['showitem'])) {
    $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['Tx_Relax5project_Appointment']['showitem'] = $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['1']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types'])) {
    // use first entry in types array
    $tx_relax5core_domain_model_appointment_type_definition = reset($GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']);
    $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['Tx_Relax5project_Appointment']['showitem'] = $tx_relax5core_domain_model_appointment_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['Tx_Relax5project_Appointment']['showitem'] = '';
}
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['Tx_Relax5project_Appointment']['showitem'] .= ',--div--;LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_appointment,';
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['types']['Tx_Relax5project_Appointment']['showitem'] .= 'locked';

// $GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns'][$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.tx_extbase_type.Tx_Relax5project_Appointment','Tx_Relax5project_Appointment'];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    '',
    'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);
