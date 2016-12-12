<?php


$EM_CONF[$_EXTKEY] = array(
	'title' => 'Simulate Static URLs',
	'description' => 'Adds the possibility to have Speaking URLs in the TYPO3 Frontend pages.',
	'category' => 'fe',
	'version' => '2.0.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 1,
	'author' => 'Rene Fritz',
	'author_email' => 'r.fritz@colorcube.de',
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

