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
 * StatePoolController
 */
class StatePoolController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * statePoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\StatePoolRepository
     * @inject
     */
    protected $statePoolRepository = null;

    /**
     * action show
     *
     * @param \CGB\Relax5project\Domain\Model\StatePool $statePool
     * @return void
     */
    public function showAction(\CGB\Relax5project\Domain\Model\StatePool $statePool)
    {
        $this->view->assign('statePool', $statePool);
    }
}
