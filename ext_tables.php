<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5project',
            'Project',
            'Project'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5project',
            'Dashboard',
            'Dashboard'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('relax5project', 'Configuration/TypoScript', 'relax5project');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_project', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_project.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_project');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_state', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_state.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_state');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_phasepool', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_phasepool.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_phasepool');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_statepool', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_statepool.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_statepool');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_transitionpool', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_transitionpool.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_transitionpool');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_actionpool', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_actionpool.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_actionpool');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_productgroup', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_productgroup.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_productgroup');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_product', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_product.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_product');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_productoption', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_productoption.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_productoption');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_mapping', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_mapping.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_mapping');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_cost', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_cost.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_cost');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_additionalinfo', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_additionalinfo.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_additionalinfo');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_subproduct', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_subproduct.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_subproduct');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_availableitem', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_availableitem.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_availableitem');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5project_domain_model_input', 'EXT:relax5project/Resources/Private/Language/locallang_csh_tx_relax5project_domain_model_input.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5project_domain_model_input');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder