<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5project',
            'Project',
            [
                'Project' => 'list, show, edit, update, new, create, delete, ajaxShow, moveProject',
                'State' => 'nextstate, show, edit, update, delete',
                'StatePool' => 'show',
                'Productgroup' => 'loadProducts, loadProductoptions',
                'AdditionalInfo' => 'edit, update, new, create, delete',
                'Appointment' => 'processAppointment, edit',
                'Cost' => 'edit, update'
            ],
            // non-cacheable actions
            [
                'Project' => 'list, show, edit, update, new, create, delete, ajaxShow, moveProject',
                'State' => 'nextstate, show, edit, update, delete',
                'StatePool' => 'show',
                'Productgroup' => 'loadProducts, loadProductoptions',
                'AdditionalInfo' => 'edit, update, new, create, delete',
                'Appointment' => 'processAppointment, edit',
                'Cost' => 'edit, update'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5project',
            'Dashboard',
            [
                'Dashboard' => 'show'
            ],
            // non-cacheable actions
            [
                'Dashboard' => 'show'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5project',
            'Mockup',
            [
                'Mockup' => 'show'
            ],
            // non-cacheable actions
            [
                'Mockup' => 'show'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5project',
            'Xmlexport',
            [
                'Project' => 'xmlExport'
            ],
            // non-cacheable actions
            [
                'Project' => 'xmlExport'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5project',
            'Print',
            [
                'Project' => 'print'
            ],
            // non-cacheable actions
            [
                'Project' => 'print'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    project {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5project') . 'Resources/Public/Icons/user_plugin_project.svg
                        title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_project
                        description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_project.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5project_project
                        }
                    }
                    dashboard {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5project') . 'Resources/Public/Icons/user_plugin_dashboard.svg
                        title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_dashboard
                        description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_dashboard.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5project_dashboard
                        }
                    }
                    mockup {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5project') . 'Resources/Public/Icons/user_plugin_mockup.svg
                        title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mockup
                        description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mockup.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5project_mockup
                        }
                    }
                    xmlexport {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5project') . 'Resources/Public/Icons/user_plugin_xmlexport.svg
                        title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_xmlexport
                        description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_xmlexport.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5project_xmlexport
                        }
                    }
                    print {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5project') . 'Resources/Public/Icons/user_plugin_print.svg
                        title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_print
                        description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_print.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5project_print
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
  'relax5-icon-project',
  \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
  ['source' => 'EXT:relax5project/Resources/Public/Images/relax-icon-project.png']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                project >
                dashboard >
                mockup >
                xmlexport >
            }
        }
        wizards.newContentElement.wizardItems.relax5 {
            elements {
                project {
                    icon >
                    iconIdentifier = relax5-icon-project
                    title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_project.ce
                    description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_project.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = relax5project_project
                    }
                }
                dashboard {
                    icon >
                    iconIdentifier = relax5-icon-project
                    title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_dashboard.ce
                    description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_dashboard.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = relax5project_dashboard
                    }
                }
                mockup {
                    icon >
                    iconIdentifier = relax5-icon-project
                    title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mockup.ce
                    description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_mockup.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = relax5project_mockup
                    }
                }
                xmlexport {
                    icon >
                    iconIdentifier = relax5-icon-project
                    title = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_xmlexport.ce
                    description = LLL:EXT:relax5project/Resources/Private/Language/locallang_db.xlf:tx_relax5project_domain_model_xmlexport.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = relax5project_xmlexpoprt
                    }
                }
            }
            show = *
        }
   }'
);