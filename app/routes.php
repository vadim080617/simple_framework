<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.01.19
 * Time: 10:55
 */
return [
    'student/index' => [
    	'GET' => [
	        'controller' => 'student',
	        'action' => 'index'
    	],
    ],
    'student/[0-9]+' => [
    	'GET' => [
	        'controller' => 'student',
	        'action' => 'show',
    	]
    ],
];