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
 * Event Format
 */
class EventFormat extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{

    /**
     * Title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * Icon
     *
     * @var string
     */
    protected $icon = '';

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
     * Returns the icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the icon
     *
     * @param string $icon
     * @return void
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
    }
}
