<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'o14q2LbP8v5kZKqs7uqADYjSNee1ugeN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

            // Comment this if you don't want to record user logins
            'on afterLogin' => function($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'usuario' => 'usuario/index',
                'usuario/mis-favoritos' => 'usuario/mis-favoritos',

                'administrador' => 'admin/software',

                'administrador/carousel' => 'admin/carousel',
                'administrador/carousel/create' => 'admin/carousel-create',
                'administrador/carousel/<id:\d+>/edit' => 'admin/carousel-edit',
                'administrador/carousel/<id:\d+>/delete' => 'admin/carousel-delete',

                'administrador/software/<id:\d+>/edit' => 'admin/software-edit',
                'administrador/software/<id:\d+>/delete' => 'admin/software-delete',
                'administrador/software/create' => 'admin/software-create',


                'software/eliminar-favorito/<id:\d+>' => 'software/eliminar-favorito',
                'software/agregar-favorito/<id:\d+>' => 'software/agregar-favorito',
                'software/<id:\d+>' => 'software/view', //Global Access
                'softwares/search' => 'software/search', //Global Access
                'softwares' => 'software/index', //Global Access


                'login' => 'site/login', //Global Access with isGuest
                'register' => 'site/register', //Global Access with isGuest
                'logout' => 'site/logout', //Global Acess with not isGuest
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'on beforeAction'=>function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
        'bootstrap' => [
            'class' => 'yii\bootstrap\BootstrapAsset',
        ],
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
