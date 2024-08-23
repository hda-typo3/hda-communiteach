<?php

declare(strict_types=1);

namespace Hda\HdaCommuniteach\Domain\Model;


/**
 * This file is part of the "HDA CommuniTeach" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Matthias Krappitz <matthias@aemka.de>, aemka
 */

/**
 * Activity
 */
class Activity extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';
    
    /**
     * Subtitle
     *
     * @var string
     */
    protected $subtitle = '';

    /**
     * Teaser
     *
     * @var string
     */
    protected $teaser = '';
    
    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * Publication Date
     *
     * @var \DateTime
     */
    protected $publicationDate = null;

    /**
     * Link
     *
     * @var string
     */
    protected $link = '';

    /**
     * Didactic Concepts
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\DidacticConcept>
     */
    protected $didacticConcepts = null;

    /**
     * Event Formats
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\EventFormat>
     */
    protected $eventFormats = null;

    /**
     * Event Mode
     *
     * @var \Hda\HdaCommuniteach\Domain\Model\EventMode
     */
    protected $eventMode = null;

    /**
     * Specialist Clusters
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\SpecialistCluster>
     */
    protected $specialistClusters = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->didacticConcepts = $this->didacticConcepts ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->eventFormats = $this->eventFormats ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->specialistClusters = $this->specialistClusters ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }
    
    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser(string $teaser)
    {
        $this->teaser = $teaser;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Sets the publicationDate
     *
     * @param \DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(\DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Returns the link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

    /**
     * Adds a DidacticConcept
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\DidacticConcept $didacticConcept
     * @return void
     */
    public function addDidacticConcept(\Hda\HdaCommuniteach\Domain\Model\DidacticConcept $didacticConcept)
    {
        $this->didacticConcepts->attach($didacticConcept);
    }

    /**
     * Removes a DidacticConcept
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\DidacticConcept $didacticConceptToRemove The DidacticConcept to be removed
     * @return void
     */
    public function removeDidacticConcept(\Hda\HdaCommuniteach\Domain\Model\DidacticConcept $didacticConceptToRemove)
    {
        $this->didacticConcepts->detach($didacticConceptToRemove);
    }

    /**
     * Returns the didacticConcepts
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\DidacticConcept>
     */
    public function getDidacticConcepts()
    {
        return $this->didacticConcepts;
    }

    /**
     * Sets the didacticConcepts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\DidacticConcept> $didacticConcepts
     * @return void
     */
    public function setDidacticConcepts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $didacticConcepts)
    {
        $this->didacticConcepts = $didacticConcepts;
    }

    /**
     * Adds a EventFormat
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\EventFormat $eventFormat
     * @return void
     */
    public function addEventFormat(\Hda\HdaCommuniteach\Domain\Model\EventFormat $eventFormat)
    {
        $this->eventFormats->attach($eventFormat);
    }

    /**
     * Removes a EventFormat
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\EventFormat $eventFormatToRemove The EventFormat to be removed
     * @return void
     */
    public function removeEventFormat(\Hda\HdaCommuniteach\Domain\Model\EventFormat $eventFormatToRemove)
    {
        $this->eventFormats->detach($eventFormatToRemove);
    }

    /**
     * Returns the eventFormats
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\EventFormat>
     */
    public function getEventFormats()
    {
        return $this->eventFormats;
    }

    /**
     * Sets the eventFormats
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\EventFormat> $eventFormats
     * @return void
     */
    public function setEventFormats(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $eventFormats)
    {
        $this->eventFormats = $eventFormats;
    }

    /**
     * Returns the eventMode
     *
     * @return \Hda\HdaCommuniteach\Domain\Model\EventMode
     */
    public function getEventMode()
    {
        return $this->eventMode;
    }

    /**
     * Sets the eventMode
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\EventMode $eventMode
     * @return void
     */
    public function setEventMode(\Hda\HdaCommuniteach\Domain\Model\EventMode $eventMode)
    {
        $this->eventMode = $eventMode;
    }
    
    /**
     * Adds a specialistCluster
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\SpecialistCluster $specialistCluster
     * @return void
     */
    public function addSpecialistCluster(\Hda\HdaCommuniteach\Domain\Model\SpecialistCluster $specialistCluster)
    {
        $this->specialistClusters->attach($specialistCluster);
    }
    
    /**
     * Removes a specialistCluster
     *
     * @param \Hda\HdaCommuniteach\Domain\Model\SpecialistCluster $specialistClusterToRemove The specialistCluster to be removed
     * @return void
     */
    public function removeSpecialistCluster(\Hda\HdaCommuniteach\Domain\Model\SpecialistCluster $specialistClusterToRemove)
    {
        $this->specialistClusters->detach($specialistClusterToRemove);
    }
    
    /**
     * Returns the specialistClusters
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\SpecialistCluster>
     */
    public function getSpecialistClusters()
    {
        return $this->specialistClusters;
    }
    
    /**
     * Sets the specialistClusters
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Hda\HdaCommuniteach\Domain\Model\SpecialistCluster> $specialistClusters
     * @return void
     */
    public function setSpecialistClusters(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $specialistClusters)
    {
        $this->specialistClusters = $specialistClusters;
    }

}
