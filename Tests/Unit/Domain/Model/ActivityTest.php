<?php

declare(strict_types=1);

namespace Hda\HdaCommuniteach\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Matthias Krappitz <matthias@aemka.de>
 */
class ActivityTest extends UnitTestCase
{
    /**
     * @var \Hda\HdaCommuniteach\Domain\Model\Activity|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Hda\HdaCommuniteach\Domain\Model\Activity::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser(): void
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('teaser'));
    }

    /**
     * @test
     */
    public function getPublicationDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPublicationDate()
        );
    }

    /**
     * @test
     */
    public function setPublicationDateForDateTimeSetsPublicationDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublicationDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('publicationDate'));
    }

    /**
     * @test
     */
    public function getLinkReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink(): void
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('link'));
    }

    /**
     * @test
     */
    public function getDidacticConceptsReturnsInitialValueForDidacticConcept(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDidacticConcepts()
        );
    }

    /**
     * @test
     */
    public function setDidacticConceptsForObjectStorageContainingDidacticConceptSetsDidacticConcepts(): void
    {
        $didacticConcept = new \Hda\HdaCommuniteach\Domain\Model\DidacticConcept();
        $objectStorageHoldingExactlyOneDidacticConcepts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDidacticConcepts->attach($didacticConcept);
        $this->subject->setDidacticConcepts($objectStorageHoldingExactlyOneDidacticConcepts);

        self::assertEquals($objectStorageHoldingExactlyOneDidacticConcepts, $this->subject->_get('didacticConcepts'));
    }

    /**
     * @test
     */
    public function addDidacticConceptToObjectStorageHoldingDidacticConcepts(): void
    {
        $didacticConcept = new \Hda\HdaCommuniteach\Domain\Model\DidacticConcept();
        $didacticConceptsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $didacticConceptsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($didacticConcept));
        $this->subject->_set('didacticConcepts', $didacticConceptsObjectStorageMock);

        $this->subject->addDidacticConcept($didacticConcept);
    }

    /**
     * @test
     */
    public function removeDidacticConceptFromObjectStorageHoldingDidacticConcepts(): void
    {
        $didacticConcept = new \Hda\HdaCommuniteach\Domain\Model\DidacticConcept();
        $didacticConceptsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $didacticConceptsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($didacticConcept));
        $this->subject->_set('didacticConcepts', $didacticConceptsObjectStorageMock);

        $this->subject->removeDidacticConcept($didacticConcept);
    }

    /**
     * @test
     */
    public function getEventFormatsReturnsInitialValueForEventFormat(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getEventFormats()
        );
    }

    /**
     * @test
     */
    public function setEventFormatsForObjectStorageContainingEventFormatSetsEventFormats(): void
    {
        $eventFormat = new \Hda\HdaCommuniteach\Domain\Model\EventFormat();
        $objectStorageHoldingExactlyOneEventFormats = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneEventFormats->attach($eventFormat);
        $this->subject->setEventFormats($objectStorageHoldingExactlyOneEventFormats);

        self::assertEquals($objectStorageHoldingExactlyOneEventFormats, $this->subject->_get('eventFormats'));
    }

    /**
     * @test
     */
    public function addEventFormatToObjectStorageHoldingEventFormats(): void
    {
        $eventFormat = new \Hda\HdaCommuniteach\Domain\Model\EventFormat();
        $eventFormatsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $eventFormatsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($eventFormat));
        $this->subject->_set('eventFormats', $eventFormatsObjectStorageMock);

        $this->subject->addEventFormat($eventFormat);
    }

    /**
     * @test
     */
    public function removeEventFormatFromObjectStorageHoldingEventFormats(): void
    {
        $eventFormat = new \Hda\HdaCommuniteach\Domain\Model\EventFormat();
        $eventFormatsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $eventFormatsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($eventFormat));
        $this->subject->_set('eventFormats', $eventFormatsObjectStorageMock);

        $this->subject->removeEventFormat($eventFormat);
    }

    /**
     * @test
     */
    public function getEventModeReturnsInitialValueForEventMode(): void
    {
        self::assertEquals(
            null,
            $this->subject->getEventMode()
        );
    }

    /**
     * @test
     */
    public function setEventModeForEventModeSetsEventMode(): void
    {
        $eventModeFixture = new \Hda\HdaCommuniteach\Domain\Model\EventMode();
        $this->subject->setEventMode($eventModeFixture);

        self::assertEquals($eventModeFixture, $this->subject->_get('eventMode'));
    }

    /**
     * @test
     */
    public function getSpecialistClusterReturnsInitialValueForSpecialistCluster(): void
    {
        self::assertEquals(
            null,
            $this->subject->getSpecialistCluster()
        );
    }

    /**
     * @test
     */
    public function setSpecialistClusterForSpecialistClusterSetsSpecialistCluster(): void
    {
        $specialistClusterFixture = new \Hda\HdaCommuniteach\Domain\Model\SpecialistCluster();
        $this->subject->setSpecialistCluster($specialistClusterFixture);

        self::assertEquals($specialistClusterFixture, $this->subject->_get('specialistCluster'));
    }
}
