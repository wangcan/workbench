<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'viewPath' => '@backend/views/charisma',
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'backend\models\Manager',
            'enableAutoLogin' => true,
			'loginUrl' => '/signin.html',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
		'urlManager' => [
			'rules' => [
				'/<action:(signin|logout)>' => 'entrance/<action>',
			],
		],
    ],

    'as access' => [
        'class' => 'backend\components\AccessControl',
        'allowActions' => [
            'entrance/*',
            'site/error',
            'backend-upload/*',
            'debug/*',
        ]
    ],

    'modules' => [
        'spread' => [
            'class' => 'backend\spread\Module',
        ],
        'statistic' => [
            'class' => 'backend\statistic\Module',
        ],
        'merchant' => [
            'class' => 'backend\merchant\Module',
        ],
    ],

    'params' => $params,
];
