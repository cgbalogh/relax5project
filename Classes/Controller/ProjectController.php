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
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * projectRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = null;

    /**
     * statePoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\StatePoolRepository
     * @inject
     */
    protected $statePoolRepository = null;

    /**
     * transitionPoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\TransitionPoolRepository
     * @inject
     */
    protected $transitionPoolRepository = null;

    /**
     * appointmentRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

    /**
     * productgroupRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProductgroupRepository
     * @inject
     */
    protected $productgroupRepository = null;

    /**
     * productoptionRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProductoptionRepository
     * @inject
     */
    protected $productoptionRepository = null;

    /**
     * subproductRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\SubproductRepository
     * @inject
     */
    protected $subproductRepository = null;

    /**
     * availableItemRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\AvailableItemRepository
     * @inject
     */
    protected $availableItemRepository = null;

    /**
     * ownerRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\OwnerRepository
     * @inject
     */
    protected $ownerRepository = null;

    /**
     * usergroupRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $usergroupRepository = null;

    /**
     * accessControlService
     *
     * @var \CGB\Accessmanager\Service\AccessControlService
     * @inject
     */
    protected $accessControlService = null;

    /**
     * stateController
     *
     * @var \CGB\Relax5project\Controller\StateController
     * @inject
     */
    protected $stateController = null;

    /**
     * @api
     * @return string
     */
    protected function getErrorFlashMessage()
    {
        $key = 'controllererror_' . strtolower($this->extensionName) . '_' . (new \ReflectionClass($this))->getShortName() . '_' . $this->actionMethodName;
        if ($error = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key, strtolower($this->extensionName))) {
            return $error;
        } else {
            return 'Error in Action: ' . $key;
        }
    }

    /**
     * action list
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @param bool $newpage
     * @param bool $load
     * @ignorevalidation $person
     * @ignorevalidation $company
     */
    public function listAction(
        \CGB\Relax5core\Domain\Model\Person $person = null,
        \CGB\Relax5core\Domain\Model\Company $company = null,
        $newpage = false,
        $load = false)
    {
        if ($person) {
            $projects = $this->projectRepository->findByPerson($person);
        } elseif ($company) {
            $projects = $this->projectRepository->findByCompany($company);
        }
        $this->view->assignMultiple([
            'projects' => $projects,
            'newpage' => $newpage,
            'person' => $person,
            'company' => $company,
            'load' => $load
        ]);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @ignorevalidation $project
     * @ignorevalidation $appointment
     * @return void
     */
    public function showAction(
        \CGB\Relax5project\Domain\Model\Project $project,
        \CGB\Relax5project\Domain\Model\Appointment $appointment = null)
    {
        if (class_exists('\\CGB\\Ews\\Service\\ExchangeConnectService')) {
            $exchangeConnector = \CGB\Ews\Service\ExchangeConnectService::getConnector();
        }
        $this->view->assignMultiple([
            'project' => $project,
            'appointment' => $appointment,
            'globalTransitions' => $this->transitionPoolRepository->findByGlobal(true),
            'feUser' => $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid()),
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'feUsergroupUids' => $this->accessControlService->getFrontendUserGroupsOrdered()
        ]);
    }

    /**
     * action new
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @ignorevalidation $person
     * @ignorevalidation $company
     * @return void
     */
    public function newAction(
        \CGB\Relax5core\Domain\Model\Person $person = null,
        \CGB\Relax5core\Domain\Model\Company $company = null)
    {
        $this->view->assignMultiple([
            'productgroups' => array_merge([0 => ''], $this->productgroupRepository->findAll()->toArray()),
            'products' => $products,
            'productoptions' => $productoptions,
            'globaloptions' => $this->productoptionRepository->findByGlobalOption(true),
            'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
            'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray()),
            'timeHorizons' => $this->getHorizons($project),
            'validatorContext' => 'CreateProject',
            'person' => $person,
            'company' => $company,
            'new' => true
        ]);
    }

    /**
     * action initializeCreate
     * reset default date format
     */
    public function initializeCreateAction()
    {
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeStart')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeStartLatest')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeEnd')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
    }

    /**
     * action create
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param array $data
     * @validate $project \CGB\Relax5validator\Domain\Validator\GenericValidator(context=CreateProject)
     * @return void
     */
    public function createAction(\CGB\Relax5project\Domain\Model\Project $project, $data = [])
    {
        $this->projectRepository->add($project);
        $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        $persistenceManager->persistAll();
        $startStateUid = $this->accessControlService->getTsSetting('tx_relax5project', 'startStateUid');
        $startStateUid = $startStateUid ? $startStateUid : 1;
        $startState = $this->statePoolRepository->findByUid($startStateUid);
        $this->stateController->initializeAction();
        $this->stateController->nextstateAction($project, null, $startState, null, null, null, true, $data);
        return json_encode(['success' => 'ok']);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @ignorevalidation $project
     * @return void
     */
    public function editAction(\CGB\Relax5project\Domain\Model\Project $project)
    {
        if ($project->getProductgroup()) {
            $products = $project->getProductgroup()->getProducts();
            $productoptions = $project->getProductgroup()->getProductoptionsFull();
        }
        $this->view->assignMultiple([
            'project' => $project,
            'productgroups' => array_merge([0 => ''], $this->productgroupRepository->findAll()->toArray()),
            'products' => $products,
            'productoptions' => $productoptions,
            'globaloptions' => $this->productoptionRepository->findByGlobalOption(true),
            'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
            'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray()),
            'timeHorizons' => $this->getHorizons($project),
            'validatorContext' => 'UpdateProject',
            'edit' => true
        ]);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeStart')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeStartLatest')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['project']->getPropertyMappingConfiguration()->forProperty('operativeEnd')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param array $productoptions
     * @param array $subproducts
     * @validate $project \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdateProject)
     * @return void
     */
    public function updateAction(
        \CGB\Relax5project\Domain\Model\Project $project,
        $productoptions = [],
        $subproducts = [])
    {
        $mappedProductoptionUidList = [];
        $mappedSubproductUidList = [];
        $sorting = 1;
        if (is_array($productoptions)) {
            foreach ($productoptions as $optionUid => $value) {
                $mapping = $project->getMappingToProductoption($optionUid);
                if ($value) {
                    $mappedProductoptionUidList[] = $optionUid;
                    if ($mapping) {
                        $mapping->setValue($value);
                        $mapping->setSorting($sorting);
                    } else {
                        $option = $this->productoptionRepository->findByUid($optionUid);
                        $newMapping = $this->objectManager->get(\CGB\Relax5project\Domain\Model\Mapping::class);
                        $newMapping->setProductoption($option);
                        $newMapping->setSorting($sorting);
                        $newMapping->setValue($value);
                        $project->addMapping($newMapping);
                    }
                    $sorting++;
                }
            }
        }
        if (is_array($subproducts['subproducts'])) {
            foreach ($subproducts['subproducts'] as $subproductUid => $value) {
                $mapping = $project->getMappingToSubproduct($subproductUid);
                if ($value) {
                    $mappedSubproductUidList[] = $subproductUid;
                    $availableItem = $this->availableItemRepository->findByUid((int) $value);
                    if ($mapping) {
                        $mapping->setValue($value);
                        $mapping->setAvailableItem($availableItem);
                        $mapping->setStatus($subproducts['statusvalues'][$subproductUid]);
                        $mapping->setSorting($sorting);
                    } else {
                        $subproduct = $this->subproductRepository->findByUid($subproductUid);
                        $newMapping = $this->objectManager->get(\CGB\Relax5project\Domain\Model\Mapping::class);
                        $newMapping->setSubproduct($subproduct);
                        $newMapping->setSorting($sorting);
                        $newMapping->setValue($value);
                        $newMapping->setAvailableItem($availableItem);
                        $newMapping->setStatus($subproducts['statusvalues'][$subproductUid]);
                        $project->addMapping($newMapping);
                    }
                    $sorting++;
                }
            }
        }
        $removeMappingList = [];
        foreach ($project->getMappings() as $mapping) {
            if ($mapping->getProductoption() && array_search($mapping->getProductoption()->getUid(), $mappedProductoptionUidList) === false) {
                $removeMappingList[] = $mapping;
            }
            if ($mapping->getSubproduct() && array_search($mapping->getSubproduct()->getUid(), $mappedSubproductUidList) === false) {
                $removeMappingList[] = $mapping;
            }
        }
        foreach ($removeMappingList as $mappingToRemove) {
            $project->removeMapping($mappingToRemove);
        }
        if (($totalTarget = $project->getTotalTarget()) != 0) {
            $project->setTarget($totalTarget);
        }
        if (($totalActual = $project->getTotalActual()) != 0) {
            $project->setActual($totalActual);
        }
        $this->projectRepository->update($project);
        return json_encode(['success' => 'ok']);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @return void
     */
    public function deleteAction(\CGB\Relax5project\Domain\Model\Project $project)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->projectRepository->remove($project);
        $this->redirect('list');
    }

    /**
     * getHorizons
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @ignorevalidation $project
     * @return array
     */
    function getHorizons(\CGB\Relax5project\Domain\Model\Project $project = null)
    {
        // generate select list for time horizon settings
        $timeHorizonIntervalList = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->settings['timeHorizonIntervalList']);
        $timeHorizonFormatList = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->settings['timeHorizonFormat']);
        $timeHorizonQuarterList = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->settings['timeHorizonQuarters']);
        $now = new \DateTime();
        $timeHorizons = [];
        if ($project && $project->getTimeHorizon()) {
            $timeHorizons[$project->getTimeHorizon()] = $project->getTimeHorizon();
        }
        foreach ($timeHorizonIntervalList as $index => $timeHorizonInterval) {
            if (count($timeHorizonFormatList) < count($timeHorizonIntervalList)) {
                $formattedTimeHorizon = $now->format($timeHorizonFormatList[0]);
            } else {
                $formattedTimeHorizon = $now->format($timeHorizonFormatList[$index]);
            }
            if (strpos($formattedTimeHorizon, 'Q') !== false) {
                $i = floor(($now->format('n') - 1) / 3);
                $formattedTimeHorizon = str_replace('Q', $timeHorizonQuarterList[$i], $formattedTimeHorizon);
            }
            $timeHorizons[$formattedTimeHorizon] = $formattedTimeHorizon;
            $now->add(new \DateInterval($timeHorizonInterval));
        }
        return array_merge(['' => ''], $timeHorizons);
    }

    /**
     * action ajaxShow
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @ignorevalidation $project
     * @ignorevalidation $appointment
     * @return void
     */
    public function ajaxShowAction(
        \CGB\Relax5project\Domain\Model\Project $project,
        \CGB\Relax5project\Domain\Model\Appointment $appointment = null)
    {
        $this->view->assignMultiple([
            'project' => $project,
            'appointment' => $appointment,
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'feUsergroupUids' => $this->accessControlService->getFrontendUserGroupsOrdered()
        ]);
    }

    /**
     * action moveProject
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @return void
     */
    public function moveProjectAction(\CGB\Relax5project\Domain\Model\Project $project, \CGB\Relax5core\Domain\Model\Person $person)
    {
        $project->setPerson($person);
        $this->projectRepository->update($project);
        return json_encode(['success' => 'ok']);
    }

    /**
     * action xmlExport
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @ignorevalidation $project
     * @return void
     */
    public function xmlExportAction(\CGB\Relax5project\Domain\Model\Project $project = null)
    {
        $validIp = false;
        if ($this->settings['validIP'] != '') {
            $validIPList = array_map('trim', explode(',', $this->settings['validIP']));
            $validIp = array_search($_SERVER['REMOTE_ADDR'], $validIPList) !== false;
        } else {
            $validIp = true;
        }
        if ($validIp) {
            $this->view->assign('project', $project);
        }
    }

    /**
     * action print
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param string $mode
     * @return void
     */
    public function printAction(\CGB\Relax5project\Domain\Model\Project $project = null, $mode = '')
    {
        $this->view->assignMultiple([
            'project' => $project,
            'mode' => $mode
        ]);
    }
}
