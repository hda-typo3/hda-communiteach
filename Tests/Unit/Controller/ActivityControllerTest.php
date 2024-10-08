<?php

declare(strict_types=1);

namespace Hda\HdaCommuniteach\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Matthias Krappitz <matthias@aemka.de>
 */
class ActivityControllerTest extends UnitTestCase
{
    /**
     * @var \Hda\HdaCommuniteach\Controller\ActivityController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Hda\HdaCommuniteach\Controller\ActivityController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllActivitiesFromRepositoryAndAssignsThemToView(): void
    {
        $allActivities = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $activityRepository = $this->getMockBuilder(\Hda\HdaCommuniteach\Domain\Repository\ActivityRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $activityRepository->expects(self::once())->method('findAll')->will(self::returnValue($allActivities));
        $this->subject->_set('activityRepository', $activityRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('activities', $allActivities);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}
