<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$routeRules = array_merge(
    require(__DIR__ . '/merchant/rule.php'),
    require(__DIR__ . '/house/rule.php')
);

return [
    'id' => 'app-gallerycms',
    'basePath' => dirname(__DIR__),
    'viewPath' => '@gallerycms/views/default',
    'layout' => null,
    'bootstrap' => ['log'],
    'controllerNamespace' => 'gallerycms\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'rules' => $routeRules,
        ],
    ],
    'modules' => [
        'house' => [
            'class' => 'gallerycms\house\Module',
        ],
        'merchant' => [
            'class' => 'gallerycms\merchant\Module',
        ],
    ],
    'params' => $params,
];
