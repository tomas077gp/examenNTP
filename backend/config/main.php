<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        /* 'user' => [
          'identityClass' => 'common\models\User',
          'enableAutoLogin' => true,
          ], */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
    // 'enableStrictParsing' => true,
      'rules' => [
           ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],
      ],
      ],

        
        
        
     
    ],
    'params' => $params,
    'modules' => [
        'user' => [
            // following line will restrict access to admin controller from frontend application
            'as backend' => 'dektrium\user\filters\BackendFilter',
            'controllers' => [!'profile', !'recovery', !'settings', !'admin'],
            'admins' => ['superadmin', 'marc'],
            'enableRegistration' => false,
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'adminPermission' => ['superadmin'],
        ],
    ],
];
