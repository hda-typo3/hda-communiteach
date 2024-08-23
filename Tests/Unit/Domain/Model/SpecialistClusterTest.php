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
class SpecialistClusterTest extends UnitTestCase
{
    /**
     * @var \Hda\HdaCommuniteach\Domain\Model\SpecialistCluster|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Hda\HdaCommuniteach\Domain\Model\SpecialistCluster::class,
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
    public function getIconReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getIcon()
        );
    }

    /**
     * @test
     */
    public function setIconForStringSetsIcon(): void
    {
        $this->subject->setIcon('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('icon'));
    }
}
