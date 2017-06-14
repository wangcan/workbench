<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use common\components\Pagination;
use baseapp\behaviors\BehaviorHelper;
use baseapp\statistic\models\TraitStatistic;

class BaseModel extends ActiveRecord
{
    use TraitAttachment;
    use TraitLevel;
    use TraitPHPExcel;
    use TraitStatistic;

    public function behaviors()
    {
        $behaviorCodes = array_merge(['validator'], $this->behaviorCodes);

        $return = BehaviorHelper::behaviors($this->className(), $behaviorCodes);
        return $return;
    }

    public function getBehaviorCodes()
    {
        return ['validator'];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $this->writeManagerLog();
        return true;
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $this->writeManagerLog();
        return true;
    }

    protected function writeManagerLog()
    {
        if (Yii::$app->id != 'app-backend' || in_array(Yii::$app->controller->id, ['entrance', 'site', 'backend-upload'])) {
            return true;
        }

        $attributes = $this->attributes;
        $infos = get_object_vars($this);

        $infos = array_merge($attributes, $infos);
        $data = [];
        foreach ($infos as $key => $value) {
            if (is_array($value)) {
                $value = implode(',', $value);
            }

            $data[$key] = $value;
        }
        $managerInfo = Yii::$app->params['managerInfo'];
        $menuInfo = Yii::$app->params['currentMenu'];

        $infos = [
            'manager_id' => $managerInfo['id'],
            'manager_name' => $managerInfo['name'],
            'roles' => $managerInfo['rolesStr'],
            'menu_code' => $menuInfo['code'],
            'menu_name' => $menuInfo['name'],
            'data' => serialize($data),
            'ip' => Yii::$app->request->userIP,
            'created_at' => time(),
        ];

        $managerlogModel = new \backend\models\Managerlog($infos);
        Yii::$app->params['managerlogModel'] = $managerlogModel;
        $managerlogModel->insert();

        return true;
    }

    public function searchTimeElem(& $query, $field = 'created_at')
    {
        $startAttr = $field . '_start';
        $endAttr = $field . '_end';
        $startTime = strtotime($this->$startAttr);
        $endTime = $this->$endAttr > 0 ? strtotime($this->$endAttr) : time();
        $query->andFilterWhere(['>=', $field, $startTime]);
        $query->andFilterWhere(['<', $field, $endTime]);
    }

    protected function getCompanyInfos()
    {
        $infos = ArrayHelper::map(Company::find()->select('code, name')->where(['status' => [1, 2]])->all(), 'code', 'name');
        return $infos;
    }

    public function updateNum($field, $type)
    {
        $num = $type == 'add' ? 1 : -1;
        $this->updateCounters(['num_' . $field => $num]);
    }

    public function _newModel($code, $returnNew = false, $data = [])
    {
        static $models = [];
        $code = ucfirst($code);
        if (!isset($models[$code]) || $returnNew) {
            $classPrefix = $this->_getClassPrefix();
            $class = "{$classPrefix}{$code}";
            //echo $class;exit();
            $models[$code] = new $class($data);
        }
        return $models[$code];
    }

    public function getSearchDatas()
    {
        return [];
    }

	public function getInfosByPage($params = [])
	{
		$pageSize = isset($params['pageSize']) ? $params['pageSize'] : 20;
		$where = isset($params['where']) ? $params['where'] : [];
		$orderBy = isset($params['orderBy']) ? $params['orderBy'] : ['id' => SORT_DESC];
		$groupBy = isset($params['groupBy']) && !empty($params['groupBy']) ? $params['groupBy'] : null;

        $data = $this->find()->select($this->_getSelect())->where($where);
        if (isset($params['andWhere'])) {
            $data = $data->andWhere($params['andWhere']);
        }

        $selectStr = isset($params['select']) ? $params['select'] : $this->_getSelect();
        $data = $this->find()->select($selectStr)->where($where);
        if (isset($params['andWhere'])) {
            $data = $data->andWhere($params['andWhere']);
        }
		$data = !empty($orderBy) ? $data->orderBy($orderBy) : $data;
		$data = !empty($groupBy) ? $data->groupBy($groupBy) : $data;
        $pagePreStr = isset($params['pagePreStr']) ? $params['pagePreStr'] : '';
        $noHost = isset($params['noHost']) ? $params['noHost'] : '';
		$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize, 'defaultPageSize' => $pageSize, 'pagePreStr' => $pagePreStr, 'noHost' => $noHost]);
		$infos = $data->offset($pages->offset)->limit($pages->limit)->all();
		$infos = $this->_formatInfos($infos);

		$return = ['infos' => $infos, 'pages' => $pages];
		return $return;
	}

    protected function _getSelect()
    {
        return '*';
    }

	protected function _formatInfos($infos)
	{
		return $infos;
	}

	public function resizePic($field, $width, $height)
	{
		$str = $this->$field;
		if (empty($str)) {
			return '';
		}

		$str .= "?x-oss-process=image/resize,m_fill,w_{$width},h_{$height},limit_0/auto-orient,0/quality,q_90";
		return $str;
	}

    protected function _getCacheDatas($key)
    {
        $cache = Yii::$app->cache;
        $datas = $cache->get($key);
        return $datas;
    }

    protected function _setCacheDatas($key, $datas)
    {
        $cache = Yii::$app->cache;
        $cache->set($key, $datas);
        return $datas;
    }

    protected function _formatImgForShow($datas)
    {
        $infos = [];
        $fields = [
            'xgtid' => ['f' => 'info_id'],
            'coid' => 0,
            'zid' => '',
            'sid' => 0,
            'pid' => 0,
            's' => ['f' => 'url'],
            'w' => '1120',
            'h' => '2124',
            't' => '',
            'aid' => ['f' => 'id'],
            'id' => 0,
            'n' => '',
        ];
        foreach ($datas as $data) {
            $info = [];
            foreach ($fields as $key => $k) {
                $info[$key] = isset($k['f']) ? $data[$k['f']] : $k;
            }

            $infos[]['l'] = $info;
        }
        return $infos;
    }

    protected function _formatData($data)
    {
        $fields = $this->_getDatasForFormat();
        $infos = [];
        foreach ($fields as $field => $fInfo) {
            $infos[$field] = isset($data[$field]) ? $data[$field] : $fInfo['default'];
        }
        return $infos;
    }

    protected function _getDatasForFormat()
    {
        return [];
    }    

    public function search($params)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $dataProvider;
    }

    protected function _formatFailResult($defaultMessage, $info = null)
    {
        $errors = $this->getErrors();
        $errorFirst = $this->getFirstErrors();
        $message = !empty($errorFirst) ? current($errorFirst) : $defaultMessage;
        $eInfo = [];
        $info = is_null($info) ? $this->toArray() : $info;
        print_r($info);
        foreach ($info as $field => $value) {
            $eInfo[$field]['value'] = $value;
            $error = isset($errors[$field]) ? current($errors[$field]) : '';
            $eInfo[$field]['error'] = $error;
        }

        $data = [
            'status' => '400',
            'message' => $message,
            'info' => $eInfo,
        ];
        print_r($data);exit();
        return $data;
    }

    public function getIpInfo()
    {
        //$ip = '123.57.148.73';
        $ip = Yii::$app->getRequest()->getIP();
        $city = \common\components\IP::find($ip);
        $city = is_array($city) ? implode('-', $city) : $city;
        return ['ip' => $ip, 'ipCity' => $city];
        //var_dump($return);exit();
    }
}
