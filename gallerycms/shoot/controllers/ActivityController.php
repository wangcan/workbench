<?php

namespace gallerycms\shoot\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\StringHelper;
use gallerycms\components\ShootController;
use gallerycms\shoot\models\Activity;
use gallerycms\shoot\models\Category;

class ActivityController extends ShootController
{
	public function actionIndex()
	{
        $datas = [];
		return $this->render('index', $datas);
	}

	public function actionShow()
	{
        $datas = [];
		return $this->render('show', $datas);
    }
}