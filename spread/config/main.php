<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$currentMain = require(__DIR__ . '/main-current.php');

return yii\helpers\ArrayHelper::merge([
    'id' => 'app-spread',
    'basePath' => dirname(__DIR__),
    //'viewPath' => '@spread/views',
    'controllerNamespace' => 'spread\controllers',
    'components' => [
    ],

    'params' => $params,
], $currentMain);
