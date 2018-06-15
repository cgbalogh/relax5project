<?php
namespace CGB\Relax5project\Controller;

/***
 *
 * This file is part of the "relax5project" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * AdditionalInfoController
 */
class AdditionalInfoController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $newAdditionalInfo
     * @return void
     */
    public function createAction(\CGB\Relax5project\Domain\Model\AdditionalInfo $newAdditionalInfo)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->additionalInfoRepository->add($newAdditionalInfo);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo
     * @ignorevalidation $additionalInfo
     * @return void
     */
    public function editAction(\CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo)
    {
        $this->view->assign('additionalInfo', $additionalInfo);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo
     * @return void
     */
    public function updateAction(\CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->additionalInfoRepository->update($additionalInfo);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo
     * @return void
     */
    public function deleteAction(\CGB\Relax5project\Domain\Model\AdditionalInfo $additionalInfo)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->additionalInfoRepository->remove($additionalInfo);
        $this->redirect('list');
    }
}
