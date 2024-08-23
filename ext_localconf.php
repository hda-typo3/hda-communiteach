<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'HdaCommuniteach',
        'Activitylist',
        [
            \Hda\HdaCommuniteach\Controller\ActivityController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Hda\HdaCommuniteach\Controller\ActivityController::class => 'list'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    activitylist {
                        iconIdentifier = hda_communiteach-plugin-activitylist
                        title = LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hda_communiteach_activitylist.name
                        description = LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hda_communiteach_activitylist.description
                        tt_content_defValues {
                            CType = list
                            list_type = hdacommuniteach_activitylist
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
