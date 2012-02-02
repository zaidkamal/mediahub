<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name' => 'MediaHub',
  
  'preload' => array('log'),
  
  'import' => array(
    'application.models.*',
    'application.components.*'
  ),
  
  'modules' => array(),
  
  'components' => array(
    'user'=>array(
      'allowAutoLogin' => true,
      'loginUrl' => array('session/create')
    ),
    
    'urlManager' => array(
      'urlFormat' => 'path',
      'rules' => array(
        'login' => 'session/create',
        'logout' => 'session/delete',
        
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
      )
    ),
    
    'db' => array(
      'connectionString' => 'pgsql:host=localhost;port=5432;dbname=mediahub',
      'emulatePrepare' => true,
      'username' => 'mediahub',
      'password' => '',
      'charset' => 'utf8'
    ),
    
    'errorHandler' => array(
      'errorAction'=>'site/error'
    ),
		
    'log' => array(
      'class' => 'CLogRouter',
      'routes' => array(
        array(
          'class' => 'CFileLogRoute',
          'levels' => 'error, warning'
        ),
        // uncomment the following to show log messages on web pages
        /*
        array(
          'class'=>'CWebLogRoute',
        ),
        */
      ),
    ),
  ),
  
  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params' => array(
    'adminEmail' => 'admin@stereomesh.com',
    'pepper' => '45fddba15d5ee53a3102eb0271472e55ccc9706815015084eb16dfc9f233f38039ccd85a9f0430aa3fb92222ae3948614ee843b9a413d05e7e63a007984e573a'
  )
);
