<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'default_sortby' => 'publication_date DESC',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,subtitle,teaser,link',
        'iconfile' => 'EXT:hda_communiteach/Resources/Public/Icons/tx_hdacommuniteach_domain_model_activity.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, subtitle, teaser, link, publication_date, image, didactic_concepts, event_formats, event_mode, specialist_clusters, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_hdacommuniteach_domain_model_activity',
                'foreign_table_where' => 'AND {#tx_hdacommuniteach_domain_model_activity}.{#pid}=###CURRENT_PID### AND {#tx_hdacommuniteach_domain_model_activity}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'teaser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.teaser',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 3,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'image' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_hdacommuniteach_domain_model_activity',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                ),
        ],
        'publication_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.publication_date',
            'l10n_mode' => 'exclude',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date,required',
                'default' => null,
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'eval' => 'required',
            ]
        ],
        'didactic_concepts' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.didactic_concepts',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hdacommuniteach_domain_model_didacticconcept',
                'foreign_table_where' => ' AND tx_hdacommuniteach_domain_model_didacticconcept.sys_language_uid IN (0,-1)',
                'MM' => 'tx_hdacommuniteach_activity_didacticconcept_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'event_formats' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.event_formats',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hdacommuniteach_domain_model_eventformat',
                'foreign_table_where' => ' AND tx_hdacommuniteach_domain_model_eventformat.sys_language_uid IN (0,-1)',
                'MM' => 'tx_hdacommuniteach_activity_eventformat_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'event_mode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.event_mode',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_hdacommuniteach_domain_model_eventmode',
                'foreign_table_where' => ' AND tx_hdacommuniteach_domain_model_eventmode.sys_language_uid IN (0,-1)',
                'default' => 0,
                'size' => 1,
                'maxitems' => 1,
                'multiple' => 0,
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
            ],
        ],
        'specialist_clusters' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hda_communiteach/Resources/Private/Language/locallang_db.xlf:tx_hdacommuniteach_domain_model_activity.specialist_clusters',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hdacommuniteach_domain_model_specialistcluster',
                'foreign_table_where' => ' AND tx_hdacommuniteach_domain_model_specialistcluster.sys_language_uid IN (0,-1)',
                'MM' => 'tx_hdacommuniteach_activity_specialistcluster_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
    ],
];
