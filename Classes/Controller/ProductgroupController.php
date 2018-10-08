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
 * ProductgroupController
 */
class ProductgroupController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * productgroupRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProductgroupRepository
     * @inject
     */
    protected $productgroupRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $productgroups = $this->productgroupRepository->findAll();
        $this->view->assign('productgroups', $productgroups);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @return void
     */
    public function showAction(\CGB\Relax5project\Domain\Model\Productgroup $productgroup)
    {
        $this->view->assign('productgroup', $productgroup);
    }

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
     * @param \CGB\Relax5project\Domain\Model\Productgroup $newProductgroup
     * @return void
     */
    public function createAction(\CGB\Relax5project\Domain\Model\Productgroup $newProductgroup)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productgroupRepository->add($newProductgroup);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @ignorevalidation $productgroup
     * @return void
     */
    public function editAction(\CGB\Relax5project\Domain\Model\Productgroup $productgroup)
    {
        $this->view->assign('productgroup', $productgroup);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @return void
     */
    public function updateAction(\CGB\Relax5project\Domain\Model\Productgroup $productgroup)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productgroupRepository->update($productgroup);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @return void
     */
    public function deleteAction(\CGB\Relax5project\Domain\Model\Productgroup $productgroup)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productgroupRepository->remove($productgroup);
        $this->redirect('list');
    }

    /**
     * action loadProducts
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @param string $prefix
     * @ignorevalidation $productgroup
     * @return void
     */
    public function loadProductsAction(\CGB\Relax5project\Domain\Model\Productgroup $productgroup = null, $prefix = '')
    {
        if (!is_null($productgroup)) {
            $products = $productgroup->getProducts();
        } else {
            $products = [0 => ''];
        }
        $this->view->assignMultiple([
            'prefix' => $prefix,
            'products' => $products,
            'statusOptions' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5project_domain_model_mapping', 'status', 'relax5project')
        ]);
    }

    /**
     * action loadProductoptions
     *
     * @param \CGB\Relax5project\Domain\Model\Productgroup $productgroup
     * @param \CGB\Relax5project\Domain\Model\Product $productgroup
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @ignorevalidation $productgroup
     * @ignorevalidation $product
     * @ignorevalidation $project
     * @return void
     */
    public function loadProductoptionsAction(
        \CGB\Relax5project\Domain\Model\Productgroup $productgroup = null,
        \CGB\Relax5project\Domain\Model\Product $product = null,
        \CGB\Relax5project\Domain\Model\Project $project = null)
    {
        $this->view->assignMultiple([
            'productgroup' => $productgroup,
            'product' => $product,
            'project' => $project,
            'statusOptions' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5project_domain_model_mapping', 'status', 'relax5project')
        ]);
    }
}
