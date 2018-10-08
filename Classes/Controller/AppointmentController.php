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
 * AppointmentController
 */
class AppointmentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * appointmentRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

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
     * action processAppointment
     *
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @return string
     */
    public function processAppointmentAction(\CGB\Relax5project\Domain\Model\Appointment $appointment)
    {
        $this->view->assignMultiple([
            'appointment' => $appointment,
            'project' => $appointment->getProject(),
            'thisstate' => $appointment->getState()
        ]);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Appointment $appointment
     * @ignorevalidation $appointment
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Appointment $appointment)
    {
        echo 'editB';
        $this->view->assignMultiple([
            'durationSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'duration', 'relax5core'),
            'appointmentTypeSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'appointment_type', 'relax5core'),
            'appointmentStatusSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'appointment_status', 'relax5core'),
            'appointmentPrioritySelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_appointment', 'priority', 'relax5core'),
            'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
            'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray()),
            'appointment' => $appointment
        ]);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['appointment']->getPropertyMappingConfiguration()->forProperty('date')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.datetime_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5project\Domain\Model\Appointment $appointment
     * @validate $appointment \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdateAppointment)
     * @return void
     */
    public function updateAction(\CGB\Relax5project\Domain\Model\Appointment $appointment)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Appointment', 'write', $appointment->getPermissions(), $appointment->getOwner(), $appointment->getUsergroup())) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Appointment', 'relax5core', $this->request->getArguments());
        }
        $this->appointmentRepository->update($appointment);
        // $this->addInfoService->storeAddInfo($appointment, $this->request);
        \CGB\Relax5core\Service\DivService::syncWithExchange($appointment);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($appointment, 'date,subject', "appointment_{$appointment->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }
}
