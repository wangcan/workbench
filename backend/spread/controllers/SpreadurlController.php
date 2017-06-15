<?php

namespace backend\spread\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use backend\components\AdminController;
use spread\models\Spreadurl;

class SpreadurlController extends AdminController
{

    public function actionListinfo()
    {
        $model = new Spreadurl();
        $cityCode = Yii::$app->request->get('city_code');
        $params = [
            'showFull' => Yii::$app->request->get('show_full', ''),
            'cityCode' => empty($cityCode) ? 'beijing' : $cityCode,
            'merchantId' => Yii::$app->request->get('merchant_id', 2),
            'siteCode' => Yii::$app->request->get('site_code'),
            'templateCode' => Yii::$app->request->get('template'),
            'channel' => Yii::$app->request->get('channel'),
            'attrs' => $this->dealParams($model->attributeParams),
        ];
        $params['channel'] = empty($params['channel']) ? 'bd' : $params['channel'];
        $model->inputParams = $params;
        $datas = $model->createDatas();
        $datas['attrs'] = $params['attrs'];
        $datas['model'] = $model;

        return $this->render('/spreadurl/listinfo', $datas);
    }

    public function dealParams($attrs)
    {
        $datas = [];
        foreach ($attrs as $attr => $aInfo) {
            $aInfo['default'] = Yii::$app->request->get($attr, $aInfo['default']);
            $datas[$attr] = $aInfo;
        }
        return $datas;
    }
}