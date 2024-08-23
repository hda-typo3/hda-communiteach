<?php
declare(strict_types=1);

namespace Hda\HdaCommuniteach\Controller;


/**
 * This file is part of the "HDA CommuniTeach" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Matthias Krappitz <matthias@aemka.de>, aemka
 */

/**
 * ActivityController
 */
class ActivityController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * activityRepository
     *
     * @var \Hda\HdaCommuniteach\Domain\Repository\ActivityRepository
     */
    protected $activityRepository = null;
    
    /**
     * didacticConceptRepository
     *
     * @var \Hda\HdaCommuniteach\Domain\Repository\DidacticConceptRepository
     */
    protected $didacticConceptRepository = null;
    
    /**
     * eventFormatRepository
     *
     * @var \Hda\HdaCommuniteach\Domain\Repository\EventFormatRepository
     */
    protected $eventFormatRepository = null;
    
    /**
     * eventModeRepository
     *
     * @var \Hda\HdaCommuniteach\Domain\Repository\EventModeRepository
     */
    protected $eventModeRepository = null;
    
    /**
     * specialistClusterRepository
     *
     * @var \Hda\HdaCommuniteach\Domain\Repository\SpecialistClusterRepository
     */
    protected $specialistClusterRepository = null;

    /**
     * @param \Hda\HdaCommuniteach\Domain\Repository\ActivityRepository $activityRepository
     */
    public function injectActivityRepository(\Hda\HdaCommuniteach\Domain\Repository\ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }
    
    /**
     * @param \Hda\HdaCommuniteach\Domain\Repository\DidacticConceptRepository $didacticConceptRepository
     */
    public function injectDidacticConceptRepository(\Hda\HdaCommuniteach\Domain\Repository\DidacticConceptRepository $didacticConceptRepository)
    {
        $this->didacticConceptRepository = $didacticConceptRepository;
    }
    
    /**
     * @param \Hda\HdaCommuniteach\Domain\Repository\EventFormatRepository $eventFormatRepository
     */
    public function injectEventFormatRepository(\Hda\HdaCommuniteach\Domain\Repository\EventFormatRepository $eventFormatRepository)
    {
        $this->eventFormatRepository = $eventFormatRepository;
    }
    
    /**
     * @param \Hda\HdaCommuniteach\Domain\Repository\EventModeRepository $eventModeRepository
     */
    public function injectEventModeRepository(\Hda\HdaCommuniteach\Domain\Repository\EventModeRepository $eventModeRepository)
    {
        $this->eventModeRepository = $eventModeRepository;
    }
    
    /**
     * @param \Hda\HdaCommuniteach\Domain\Repository\SpecialistClusterRepository $specialistClusterRepository
     */
    public function injectSpecialistClusterRepository(\Hda\HdaCommuniteach\Domain\Repository\SpecialistClusterRepository $specialistClusterRepository)
    {
        $this->specialistClusterRepository = $specialistClusterRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $arguments = $this->request->getArguments();
        if (count($arguments) > 0) {
            $activities = $this->activityRepository->findByArguments($arguments);
        } else {
            $activities = $this->activityRepository->findAll();
        }
        $didacticConcepts = $this->didacticConceptRepository->findAll();
        $eventFormats = $this->eventFormatRepository->findAll();
        $eventModes = $this->eventModeRepository->findAll();
        $specialistClusters = $this->specialistClusterRepository->findAll();
        $this->view->assign('activities', $activities);
        $this->view->assign('didacticConcepts', $didacticConcepts);
        $this->view->assign('eventFormats', $eventFormats);
        $this->view->assign('eventModes', $eventModes);
        $this->view->assign('specialistClusters', $specialistClusters);
        $this->view->assign('arguments', $arguments);
        return $this->htmlResponse();
    }
}
