<?php


$EM_CONF[$_EXTKEY] = array(
	'title' => 'Simulate Static URLs',
	'description' => 'Adds the possibility to have Speaking URLs in the TYPO3 Frontend pages.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '2.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Benjamin Mack',
	'author_email' => 'benni@typo3.org',
	'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'php' => '5.3.0-0.0.0',
            'typo3' => '6.0.0-0.0.0',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);

