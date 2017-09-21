<?php
return [
    'timeZone'=>'Asia/Shanghai',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
	'bootstrap' => [
        'log',
        function () {
            if (!isset(Yii::$app->i18n->translations['rbac-admin'])) {
                Yii::$app->i18n->translations['rbac-admin'] = [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'zh-CN',
                    'basePath' => '@common/messages'
                ];
                Yii::$app->i18n->translations['admin-common'] = [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@common/messages'
                ];
                Yii::$app->i18n->translations['common'] = [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@common/messages'
                ];
            }
        }
    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
				['pattern' => '/captcha', 'route' => '/site/captcha'],
                ['pattern' => '/upload/<table>/<field>', 'route' => '/upload/index'],
				'debug/<controller>/<action>' => 'debug/<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'basePath' => '@assetcustom/assets',
            'baseUrl' => '@asseturl/assets',
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
        'request' => [
            'class' => 'common\components\Request',
        ],
        'view' => [
            'class' => 'common\components\View',
        ],
    ],
];
