<?php
namespace CGB\Relax5project\Controller;

/***
 *
 * This file is part of the "relax5project" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * CostController
 */
class CostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * costRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\CostRepository
     * @inject
     */
    protected $costRepository = null;

    /**
     * action edit
     *
     * @param \CGB\Relax5project\Domain\Model\Cost $cost
     * @ignorevalidation $cost
     * @return void
     */
    public function editAction(\CGB\Relax5project\Domain\Model\Cost $cost)
    {
        $this->view->assign('cost', $cost);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['cost']->getPropertyMappingConfiguration()->forProperty('date')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\Cost $cost
     * @return void
     */
    public function updateAction(\CGB\Relax5project\Domain\Model\Cost $cost)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->costRepository->update($cost);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($cost, '', "cost_{$cost->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }
}
