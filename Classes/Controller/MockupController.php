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
 * MockupController
 */
class MockupController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        
        $feUser = $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid());

        $mockupProjects = $this->projectRepository->findByMockup(true);
        if ($mockupProjects->count() > 0) {
            $project = $mockupProjects->current();
        } else {
            $project = $objectManager->get(\CGB\Relax5project\Domain\Model\Project::class);
            $project->setMockup(true);
            $this->projectRepository->add($project);
            $persistenceManager->persistAll();
        }
        
        $state = $objectManager->get(\CGB\Relax5project\Domain\Model\State::class);
        $statePool = $this->statePoolRepository->findByName('Ersttermin');

        $state->setState($statePool->current());
        $state->setOwner($feUser);
        $state->setDue(new \DateTime);
        
        $project->setOwner($feUser);
        // $project->addState($state);
        // $project->setCurrentState($state);
        
        $project->setName('Testprojekt #1');

        $this->projectRepository->update($project);
        $persistenceManager->persistAll();
        
        $this->view->assignMultiple([
            'project' => $project,
            'appointment' => $appointment,
            'globalTransitions' => $this->transitionPoolRepository->findByGlobal(true),
            'feUser' => $feUser,
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'feUsergroupUids' => $this->accessControlService->getFrontendUserGroupsOrdered(),
            'mockup' => true,
        ]);
    }
}
