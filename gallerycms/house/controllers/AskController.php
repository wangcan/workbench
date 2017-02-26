<?php

namespace gallerycms\house\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\StringHelper;
use gallerycms\components\HouseController;
use gallerycms\house\models\Ask;
use gallerycms\house\models\AskQuestion;
use gallerycms\house\models\AskSort;

class AskController extends HouseController
{
    public function init()
    {
        parent::init();

        if ($this->isMobile) {
            $this->layout = '@gallerycms/views/main-mobile';
        } else {
            $this->layout = 'main-ask';
        }
    }

    public function actionTag()
    {
        return $this->render('tag');
    }

    public function actionTaglist()
    {
    }

	public function actionIndex()
	{
        $datas = [];

		$dataTdk = [];//['{{TAGSTR}}' => $tagStr, '{{PAGESTR}}' => $pageStr];
		$this->getTdkInfos('sample-index', $dataTdk);
		return $this->render('index', $datas);
	}

    public function actionList()
    {
		$page = ltrim(Yii::$app->request->get('page'));
        $sort = ltrim(Yii::$app->request->get('sort'));
        $sortInfos = $this->_checkSort($sort);

        $where = ['status' => 1, 'sort' => $sortInfos['codes']];
        $where = ['sort' => $sortInfos['codes']];
		$model = new AskQuestion();
        $orderBy = ['created_at' => SORT_DESC];
		$infos = $model->getInfosByPage(['where' => $where, 'orderBy' => $orderBy, 'pageSize' => 20, 'pagePreStr' => '_']);
		$datas = [
			'page' => $page,
			'model' => $model,
            'sortInfos' => $sortInfos,
			'infos' => $infos['infos'],
            'pages' => $infos['pages'],
		];
		$pageStr = $page > 1 ? "第{$page}页-" : '';

        $sortStr = isset($sortInfos['cInfo']['name']) ? $sortInfos['cInfo']['name'] : '兔班长问答列表';
		$dataTdk = ['{{sortSTR}}' => $sortStr, '{{PAGESTR}}' => $pageStr];
		$this->getTdkInfos('info-index', $dataTdk);
		return $this->render('list', $datas);
	}

	public function actionShow()
	{
        $id = Yii::$app->getRequest()->get('id');
        $model = new AskQuestion();
		$info = $model->getInfo($id);
		if (empty($info)) {
            throw new NotFoundHttpException('NO found');
		}

        $tagInfos = $this->_checkSort($info['sort']);

        //$description = str_replace(' ', '', $info['description']);
        $description = StringHelper::truncate(strip_tags($info['description']), 200, '');
        $tagStr = !empty($tagInfos['pInfo']) ? $tagInfos['pInfo']['name'] . ',' : '';
        $tagStr .= !empty($tagInfos['cInfo']) ? $tagInfos['cInfo']['name'] . ',' : '';
        $tagStr = rtrim($tagStr, ',');
		$dataTdk = ['{{INFONAME}}' => $info['name'], '{{TAGSTR}}' => $tagStr, '{{DESCRIPTION}}' => $description];
		$this->getTdkInfos('info-show', $dataTdk);

        $infos = $model->getInfos(['sort' => $tagInfos['code']], 6);
		$datas = [
			'info' => $info,
            'tagInfos' => $tagInfos,
            'infos' => $infos,
		];
		return $this->render('show', $datas);
        $id = Yii::$app->getRequest()->get('id');
        $model = new AskQuestion();
        $this->getTdkInfos('sample-show', $dataTdk);
		$datas = [
			'info' => $info,
            'answerInfos' => $answerInfos,
		];
		return $this->render('show', $datas);
	}

    protected function _checkSort($code)
    {
        $sortInfos = AskSort::find()->indexBy('code')->asArray()->all();
        $cInfo = isset($sortInfos[$code]) ? $sortInfos[$code] : [];
        if (empty($cInfo)) {
            //throw new NotFoundHttpException('NO found');
        }
        
        $parentCode = $cInfo['parent_code'];
        $pInfo = $parentCode == '' ? [] : $sortInfos[$parentCode];
        $levelInfos = [];
        foreach ($sortInfos as $sCode => $sortInfo) {
            if ($sortInfo['parent_code'] == '') {
                $levelInfos[$sCode] = isset($levelInfos[$sCode]) ? $levelInfos[$sCode] : $sortInfo;
            } else {
                $pCode = $sortInfo['parent_code'];
                if (!isset($levelInfos[$pCode])) {
                    $levelInfos[$pCode] = $sortInfos[$pCode];
                }
                $levelInfos[$sortInfo['parent_code']]['subInfos'][$sCode] = $sortInfo;
            }
        }
        //print_r($levelInfos);exit();

        $codes = $code == '' ? array_keys($levelInfos) : ($parentCode == '' ? array_keys($levelInfos[$code]['subInfos']) : [$code]);
        $return = [
            'code' => $code, 
            'cInfo' => $cInfo,
            'parentCode' => $parentCode,
            'pInfo' => $pInfo,
            'levelInfos' => $levelInfos,
            'codes' => $codes,
            'sortInfos' => $sortInfos,
        ];
        return $return;
    }
}
