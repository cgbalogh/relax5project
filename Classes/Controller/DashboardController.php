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
 * DashboardController
 */
class DashboardController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * personRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * companyRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\CompanyRepository
     * @inject
     */
    protected $companyRepository = null;

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
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $persons = $this->personRepository->findByOwner($this->accessControlService->getFrontendUserUid());
        $companies = $this->companyRepository->findByOwner($this->accessControlService->getFrontendUserUid());
        $projects = $this->projectRepository->findByOwner($this->accessControlService->getFrontendUserUid());
        $states = $this->stateRepository->findByOwner($this->accessControlService->getFrontendUserUid());
        $appointments = $this->appointmentRepository->findByOwner($this->accessControlService->getFrontendUserUid());
        
        $appointmentsPending = $this->appointmentRepository->findPendingByOwner($this->accessControlService->getFrontendUserUid());
        
        $appointmentsCount = $this->appointmentRepository->countByOwner($this->accessControlService->getFrontendUserUid());
        
        $user = $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid());
        
        /**
        if ($user->getSettingsArray()['projectStateList']) {
            $projectStateListArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $user->getSettingsArray()['projectStateList']);
            $projectStateList = '\'' . implode('\',\'', $projectStateListArray) . '\'';
        }

        if ($user->getSettingsArray()['projectStateListDeny']) {
            $projectStateListDenyArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $user->getSettingsArray()['projectStateListDeny']);
            $projectStateListDeny = '\'' . implode('\',\'', $projectStateListDenyArray) . '\'';
        }
        **/ 

        $showStateListArray = [];
        if ($user->getSettingsArray()['statelist']) {
            foreach($user->getSettingsArray()['statelist'] as $state => $show ) {
                if ($show) {
                    $showStateListArray[] = $state;
                }
            }
        }
        $showStateList = implode(',', $showStateListArray);
        $projectPieChartData = $this->projectRepository->findByOwnerGroupByCurrentState ($this->accessControlService->getFrontendUserUid(), $showStateList, $this->settings['storagePid']);
        // $appointmentColumnChartData = $this->appointmentRepository->findPendingAppointmentStats ($this->accessControlService->getFrontendUserUid());
        
        $groupedPieChartData = $this->projectRepository->findByOwnerGroupByCurrentSubgroup ($this->accessControlService->getFrontendUserUid(), $showStateList, $this->settings['storagePid']);
        
        
        $this->view->assignMultiple([
            'persons' => $persons,
            'companies' => $companies,
            'projects' => $projects,
            'states' => $states,
            'appointments' => $appointments,
            'appointmentsPending' => $appointmentsPending,
            'user' => $user,
            'feUser' => $user,
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'feUsergroupUids' => $this->accessControlService->getFrontendUserGroupsOrdered(),
            'projectPieChartData' => $projectPieChartData,
            'groupedPieChartData' => $groupedPieChartData,
            'appointmentColumnChartData' => $appointmentColumnChartData,
        ]);
    }
}
