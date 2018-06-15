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
 * StateController
 */
class StateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * projectRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = null;

    /**
     * stateRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\StateRepository
     * @inject
     */
    protected $stateRepository = null;

    /**
     * appointmentRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

    /**
     * actionPoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\ActionPoolRepository
     * @inject
     */
    protected $actionPoolRepository = null;

    /**
     * statePoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\StatePoolRepository
     * @inject
     */
    protected $statePoolRepository = null;
    
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
     * addInfoServiceService
     *
     * @var \CGB\Relax5addinfo\Service\AddInfoService
     * @inject
     */
    protected $addInfoService = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Owner
     */
    protected $frontendUser = null;

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
     * Initializes the current action
     *
     * @return void
     */
    protected function initializeAction()
    {
        $this->frontendUser = $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid());
    }

    /**
     * action nextstate
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project The project
     * @param \CGB\Relax5project\Domain\Model\State $thisstate The current state where we are coming from
     * @param \CGB\Relax5project\Domain\Model\StatePool $nextstate The nest state where we are going to
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionOut The transition to be used seen from thisstate
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment The selected appointment (if any)
     * @param \CGB\Relax5project\Domain\Model\Responsibility $responsibility The selected responsibility (if any)
     * @param bool $execute
     * @param array $data
     * @ignorevalidation $project
     * @ignorevalidation $thisstate
     * @ignorevalidation $nextstate
     * @ignorevalidation $transitionOut
     * @ignorevalidation $appointment
     * @ignorevalidation $responsibility
     * @validate $data \CGB\Relax5validator\Domain\Validator\DataValidator(context=State_Plan fertig)
     * @return void
     */
    public function nextstateAction(
        \CGB\Relax5project\Domain\Model\Project $project,
        \CGB\Relax5project\Domain\Model\State $thisstate = null,
        \CGB\Relax5project\Domain\Model\StatePool $nextstate = null,
        \CGB\Relax5project\Domain\Model\TransitionPool $transitionOut = null,
        \CGB\Relax5project\Domain\Model\Appointment $appointment = null,
        \CGB\Relax5project\Domain\Model\Responsibility $responsibility = null,
        $execute = false,
        $data = [])
    {
        /*
         *
        $refObj = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($$object, 'parent.contacts.0' );
        \TYPO3\CMS\Extbase\Reflection\ObjectAccess::setProperty($refObj, 'contact', '#####');
        echo \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($$object, 'parent.contacts.0.contact' );
        */

        $this->accessControlService->getFrontendUserUid();
        if (!$execute) {
            $this->view->assignMultiple([
                'project' => $project,
                'thisstate' => $thisstate,
                'nextstate' => $nextstate,
                'transitionOut' => $transitionOut,
                'appointment' => $appointment,
                'responsibility' => $responsibility,
                'feUserUid' => $this->accessControlService->getFrontendUserUid(),
                'durationSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'duration', 'relax5core'),
                'appointmentTypeSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'appointment_type', 'relax5core'),
                'appointmentStatusSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'appointment_status', 'relax5core'),
                'appointmentPrioritySelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'priority', 'relax5core'),
                'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
                'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray())
            ]);
        } elseif ($execute && !is_null($responsibility)) {
            foreach ($thisstate->getResponsibilities() as $r) {
                if ($r->getUid() == $responsibility->getUid()) {
                    $r->setDone(new \DateTime());
                }
            }
            $this->stateRepository->update($thisstate);
            $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
            $persistenceManager->persistAll();
            return json_encode(['success' => 'ok']);
        } else {
            if ($data['__mapdata']) {
                $statedata = $this->request->getArgument('state');
                $mapdata = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $data['__mapdata']);
                for ($i = 1; $i < count($mapdata); $i++) {
                    $data[$mapdata[$i]] = $statedata[$mapdata[$i]];
                }
            }
            $newstate = $this->createNewState($project, $thisstate, $nextstate, $transitionOut, $data);
            $storage = [
                'project' => $project,
                'thisstate' => $thisstate,
                'nextstate' => $nextstate,
                'newstate' => $newstate,
                'appointment' => $appointment,
                'frontendUser' => $this->frontendUser,
                'data' => $data,
                '_control' => [
                    'keepState' => false,
                    'keepStateDistinct' => false,
                    'debug' => false
                ]
            ];
            // actions from each individual entry, we suppose that the entry has an unique id
            // TODO: check if this can be removed, because now we take
            // the actions from transitionOut
            /**
            foreach ($data as $actionId => $value) {
                $actions = $this->actionPoolRepository->findById($actionId);
                if ($action = $actions->getFirst()) {
                    $storage['_control']['keepState'] |= $action->getKeepState();
                    $storage['_control']['debug'] |= $action->getDebug();
                    if ($action->getDebug()) {
                        $storage['_control']['debugEnabled'][] = (string) $action;
                        $storage['_control']['keepStateEnabled'][] = (string) $action;
                    }
                    $result = \CGB\Relax5project\Service\ExecuteService::execute($storage, $action);
                }
            }
            */
            // actions from defined transitionIns with specified sourceState
            // only if $transitionOut is set
            if ($transitionOut) {
                foreach ($transitionOut->getActions() as $action) {
                    $storage['_control']['keepState'] |= $action->getKeepState();
                    $storage['_control']['keepStateDistinct'] |= $action->getKeepStateDistinct();
                    $storage['_control']['debug'] |= $action->getDebug();
                    if ($action->getDebug()) {
                        $storage['_control']['debugEnabled'][] = (string) $action;
                        $storage['_control']['keepStateEnabled'][] = (string) $action;
                    }
                    $result = \CGB\Relax5project\Service\ExecuteService::execute($storage, $action);
                }
            }
            // actions from defined transitionIns with specified sourceState
            if ($nextstate) {
                foreach ($nextstate->getTransitionIns() as $key => $transitionIn) {
                    if (!$transitionIn->getPrevstate() && is_null($thisstate) || $thisstate && $thisstate->getState() && $transitionIn->getPrevstate() && $thisstate->getState()->getUid() == $transitionIn->getPrevstate()->getUid()) {
                        $actions = $transitionIn->getActions();
                        foreach ($actions as $action) {
                            $storage['_control']['keepState'] |= $action->getKeepState();
                            $storage['_control']['keepStateDistinct'] |= $action->getKeepStateDistinct();
                            $storage['_control']['debug'] |= $action->getDebug();
                            if ($action->getDebug()) {
                                $storage['_control']['debugEnabled'][] = (string) $action;
                                $storage['_control']['keepStateEnabled'][] = (string) $action;
                            }
                            $result = \CGB\Relax5project\Service\ExecuteService::execute($storage, $action);
                        }
                    }
                }
            }
            // check if same states are already done to proceed to next step
            if ($storage['_control']['keepStateDistinct']) {
                $thisstateStatePoolUid = $thisstate->getState()->getUid();
                $done = true;
                foreach ($thisstate->getProject()->getStates() as $state) {
                    if ($state->getState()->getUid() == $thisstateStatePoolUid) {
                        if ($thisstate->getUid() !== $state->getUid() && !$state->getRejected()) {
                            $done &= !is_null($state->getDone());
                        }
                    }
                }
                $storage['_control']['keepState'] = !$done;
            }
            // $thisstate->setDone(new \DateTime);
            if ($nextstate && !$storage['_control']['keepState'] && !$storage['_control']['debug']) { 
                $this->moveAppointments($storage['project'], $newstate);
                $storage['project']->addState($newstate);
                $storage['project']->setCurrentState($newstate);
            }
            if (!$storage['_control']['debug']) {
                $this->projectRepository->update($storage['project']);
                // necessary to have a reference of newstate for addinfo
                $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
                $persistenceManager->persistAll();
                // store $storage['addinfo'] instead of direct variables
                // store addinfo to extra states that cannot not be referred to by thisstate or nextstate
                if (is_array($storage['addinfo'])) {
                    foreach ($storage['addinfo'] as $key => $state) {
                        if (is_array($storage['addinfo'][$key]) && $key !== 'thisstate' && $key !== 'nextstate') {
                            $this->addInfoService->storeAddInfo($storage[$key], $this->request, 'data', $storage['addinfo'][$key], $this->frontendUser);
                        }
                    }
                }
                // store addinfo data to thisstate
                if (is_array($storage['addinfo']['thisstate'])) {
                    $this->addInfoService->storeAddInfo($thisstate, $this->request, 'data', $storage['addinfo']['thisstate'], $this->frontendUser);
                }
                if ($storage['thisstate']) {
                    $this->stateRepository->update($storage['thisstate']);
                }
                if ($nextstate && !$storage['_control']['keepState'] && is_array($storage['addinfo']['nextstate'])) {
                    // can store addinfo to newstate only if there is a newstate
                    $this->addInfoService->storeAddInfo($newstate, $this->request, 'data', $storage['addinfo']['nextstate'], $this->frontendUser);
                    $this->stateRepository->update($storage['newstate']);
                }
                if ($storage['appointment'] instanceof \CGB\Relax5project\Domain\Model\Appointment) {
                    // echo get_class($storage['appointment']);
                    $this->appointmentRepository->update($storage['appointment']);
                }
            }
            //            echo 'C';
            // $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
            // $persistenceManager->persistAll();
            if ($storage['_control']['debug']) {
                echo 'DEBUG INFO:';
                print_r($data);
                print_r($storage['addinfo']);
                print_r($storage['_control']);
            }
            //echo $appointment;
            return json_encode(['success' => 'ok']);
        }
    }

    /**
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param \CGB\Relax5project\Domain\Model\State $thisstate
     * @param \CGB\Relax5project\Domain\Model\StatePool $nextstate
     * @param \CGB\Relax5project\Domain\Model\TransitionPool $transitionOut
     * @param array $data
     */
    private function createNewState($project, $thisstate, $nextstate, $transitionOut, $data)
    {
        $newState = $this->objectManager->get(\CGB\Relax5project\Domain\Model\State::class);
        $newState->setState($nextstate);
        if ($project->getCurrentState()) {
            $newState->setSorting($project->getCurrentState()->getSorting() + 1);
        } else {
            $newState->setSorting(1);
        }
        // set owner to project owner if none given TODO: check for usergroup as well, then owner maybe empty
        if (is_null($newState->getOwner())) {
            $newState->setOwner($project->getOwner());
        }
        return $newState;
    }

    /**
     * moveAppointments
     *
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param \CGB\Relax5project\Domain\Model\State $newstate
     */
    private function moveAppointments(\CGB\Relax5project\Domain\Model\Project $project, \CGB\Relax5project\Domain\Model\State $newstate)
    {
        foreach ($project->getAppointments() as $appointment) {
            if (!$appointment->isLocked() && $appointment->getPastOrFuture() && $appointment->getAppointmentStatus() <= 2) {
                $appointment->setState($newstate);
            }
        }
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
     * @param \CGB\Relax5project\Domain\Model\State $newState
     * @return void
     */
    public function createAction(\CGB\Relax5project\Domain\Model\State $newState)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stateRepository->add($newState);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5project\Domain\Model\State $state
     * @ignorevalidation $state
     * @return void
     */
    public function editAction(\CGB\Relax5project\Domain\Model\State $state)
    {
        $this->view->assignMultiple([
            'state' => $state,
            'stateSelect' => $this->statePoolRepository->findAll(),
            'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
            'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray())
        ]);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['state']->getPropertyMappingConfiguration()->forProperty('due')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['state']->getPropertyMappingConfiguration()->forProperty('dueOrig')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.date_format', 'relax5core'));
        $this->arguments['state']->getPropertyMappingConfiguration()->forProperty('forwardDate')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.datetime_format', 'relax5core'));
        $this->arguments['state']->getPropertyMappingConfiguration()->forProperty('done')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:relax5core/Resources/Private/Language/locallang.xml:tx_relax5core_general.datetime_format', 'relax5core'));
    }
    
    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\State $state
     * @return void
     */
    public function updateAction(\CGB\Relax5project\Domain\Model\State $state)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stateRepository->update($state);
        $result = ['success' => 'ok'];
        return json_encode($result);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5project\Domain\Model\State $state
     * @return void
     */
    public function showAction(\CGB\Relax5project\Domain\Model\State $state)
    {
        $this->forward('show', 'Project', 'Relax5project', ['project' => $state->getProject()]);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5project\Domain\Model\State $state
     * @return void
     */
    public function deleteAction(\CGB\Relax5project\Domain\Model\State $state)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stateRepository->remove($state);
        $this->redirect('list');
    }
}
