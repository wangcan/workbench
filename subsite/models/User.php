<?php

namespace subsite\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\components\sms\Smser;
use common\models\SubsiteModel;
use common\models\Company;
use common\models\statistic\Conversion;

class User extends SubsiteModel
{
    public $serviceInfo;
    public $notice_merchant;
    public $notice_user;
    public $region;
    public $area;
    public $note;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        $behaviors = [
            $this->timestampBehaviorComponent,
        ];
        return $behaviors;
    }

    public function attributeLabels()
    {
        $cModel = new Conversion();
        $conversionAttributes = $cModel->attributeLabels();
        return array_merge($conversionAttributes, [
            'id' => 'ID',
            'conversion_id' => '转化ID',
            'channel' => '报名渠道',
            'city_code' => '城市代码',
            'merchant_id' => '商家',
            'mobile' => '手机号',
            'name' => '名字',
            'message' => '留言',
            'service_id' => '客服',
            'service_num' => '客服数',
            'status' => '状态',
            'status_input' => '状态',
            'status_invalid' => '无效原因',
            'callback_again' => '再次回访时间',
            'view_at' => '查看时间',
            'signup_at' => '报名时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',

            'notice_merchant' => '是否短信通知商家',
            'notice_user' => '是否短信通知业主',
        ]);
    }

    public function addUser($data, $serviceId = null)
    {
        $serviceInfo = !is_null($serviceId) ? $this->getServiceModel()->findOne($serviceId) : null;
        $serviceInfo = empty($serviceInfo) ? $this->getServiceModel()->getDispatchService(['merchant_id' => $data['merchant_id']]) : $serviceInfo;

        $time = Yii::$app->params['currentTime'];
        $data['service_id'] = empty($serviceInfo) ? 1 : $serviceInfo->id;
        $data = $this->_formatData($data);

        $newModel = $this->_newModel('user', true, $data);
        $newModel->save();
        $newModel->serviceInfo = $serviceInfo;

        return $newModel;
    }

    public function _getDatasForFormat()
    {
        $datas = [
            'conversion_id' => ['default' => 0],
            'channel' => ['default' => ''],
            'city_code' => ['default' => ''],
            'merchant_id' => ['default' => 0],
            'mobile' => ['default' => ''],
            'name' => ['default' => ''],
            'message' => ['default' => ''],
            'service_id' => ['default' => 0],
            'service_num' => ['default' => 0],
            'status' => ['default' => ''],
            'status_invalid' => ['default' => ''],
            'status_input' => ['default' => ''],
            'callback_again' => ['default' => 0],
            'view_at' => ['default' => 0],
            'view_at' => ['default' => Yii::$app->params['currentTime']],
        ];

        return $datas;
    }

    /*public function insert($runValidation = true, $attributes = null)
    {
        if (($primaryKeys = $this->getDb()->schema->insert($this->tableName(), $attributes)) === false) {
            return false;
        }
        foreach ($primaryKeys as $name => $value) {
            $id = $this->getTableSchema()->columns[$name]->phpTypecast($value);
            $this->setAttribute($name, $id);
            $values[$name] = $id;
        }

        $changedAttributes = array_fill_keys(array_keys($values), null);
        $this->setOldAttributes($values);
        return true;
    }*/        

    public function updateAfterInsert($cInfo)
    {
        //if (!empty($cInfo['channel']) || !empty($cInfo['keyword'] || !empty($cInfo['keywork_search']))) {
        if (empty($this->merchant_id)) {
            $this->merchant_id = isset($cInfo['merchant_id']) ? $cInfo['merchant_id'] : 0;
        }
            $this->channel = isset($cInfo['channel']) ? $cInfo['channel'] : '';
            //$this->keyword = isset($cInfo['keyword']) ? $cInfo['keyword'] : '';
            //$this->keyword_search = isset($cInfo['keyword_search']) ? $cInfo['keyword_search'] : '';
            //$this->sem_account = isset($cInfo['sem_account']) ? $cInfo['sem_account'] : '';
            //$this->plan_id = isset($cInfo['plan_id']) ? $cInfo['plan_id'] : 0;
            //$this->unit_id = isset($cInfo['unit_id']) ? $cInfo['unit_id'] : 0;
            
            $this->city_code = isset($cInfo['city_code']) ? $cInfo['city_code'] : strval($this->city_code);
        //}
        //print_r($this->toArray());exit();
        $this->statisticRecord($this->toArray(), 'signup');
        $this->update(false);
        return ;
    }

    public function addHandle($statusInput = 'admin')
    {
        $validator = new \common\validators\MobileValidator();
        $valid =  $validator->validate($this->mobile);
        if (empty($valid)) {
            $this->addError('mobile', '手机号有误');
            return false;
        }
        $this->merchant_id = empty($this->merchant_id) ? 2 : $this->merchant_id;

        $exist = self::findOne(['merchant_id' => $this->merchant_id, 'mobile' => $this->mobile]);
        if ($exist) {
            $this->addError('mobile', '手机号已存在');
            return false;
        }

        $data = [
            'city_code' => $this->city_code,
            'client_type' => 'pc',
            'merchant_id' => $this->merchant_id,
            'channel' => $this->channel,
            'mobile' => $this->mobile,
            'name' => $this->name,
            'note' => $this->note,
            'message' => $this->message,
			'status_input' => $statusInput,
            'area' => $this->area,
            'region' => $this->region,
        ];

        $conversion = $this->conversionSuccessLog($data);
        //$serviceId = $this->service_id ? $this->service_id : null;
        $decorationOwner = $this->addUser($data);

        if (!empty($this->merchant_id)) {
            $this->_sendSms($data, $decorationOwner->serviceInfo);
        }
		$sDatas = $decorationOwner->toArray();
		$sDatas['plan_id'] = 0;
		$sDatas['unit_id'] = 0;
        $this->statisticRecord($sDatas, 'signup');

        return $decorationOwner;
    }

    public function dealService()
    {
        $service = isset($this->serviceInfo) ? $this->serviceInfo : $this->getServiceInfo();

        $service->distributed_at = Yii::$app->params['currentTime'];
        $service->update(false);
        $service->updateCounters(['serviced_times' => 1]);
        
        $service->updateServiceInfo();
        return $service;
    }

    public function viewInfo($merchantId, $ids)
    {
        $ids = explode(',', $ids);
        if (count($ids) > 50) {
            return ['status' => 400, 'message' => '请求有误'];
        }
        $infos = $this->find()->where(['id' => $ids])->indexBy('id')->all();
        foreach ($infos as $id => $info) {
            if ($info['merchant_id'] != $merchantId) {
                return ['status' => 400, 'message' => '你没有查看这些信息的权限'];
            }
        }
        $datas = [];
        foreach ($infos as $id => $info) {
            if (!$info->view_at) {
            $info->view_at = Yii::$app->params['currentTime'];
            $info->update(false);
            }
            $datas[$id]['mobile'] = $info['mobile'];
            $datas[$id]['viewAt'] = date('Y-m-d H:i:s', $info->view_at);
        }

        return ['status' => 200, 'message' => 'OK', 'datas' => $datas];
    }

    protected function _sendSms($data, $serviceInfo)
    {
        $merchantInfo = $this->getMerchantInfo();
        if (empty($merchantInfo)) {
            return ;
        }

        if ($this->notice_merchant) {
            $this->sendSmsService($merchantInfo, $data, $serviceInfo);
        }
        if ($this->notice_user) {
            $this->sendSms($merchantInfo, $data);
        }
    }

    public function sendSmsValid($data, $userInfo)
    {
        $merchantId = $data->merchant_id;
        if (empty($merchantId)) {
            return ;
        }
        $noticeMobiles = [
            '667' => '17316278360',
            '671' => '15110125766',
			'682' => '18600063835',
			'669' => '13717716106',//'13581522034',
			'684' => '18614242810',
			'686' => '15801558634',
        ];
        $mobile = isset($noticeMobiles[$merchantId]) ? $noticeMobiles[$merchantId] : false;
        if (empty($mobile)) {
            return ;
        }

        $houseInfo = $this->_newModel('house', true)->findOne($data->house_id);
        if (empty($houseInfo)) {
            return ;
        }
        $houseType = isset($houseInfo->houseTypeInfos[$houseInfo->house_type]) ? $houseInfo->houseTypeInfos[$houseInfo->house_type] : '';
        $houseSort = isset($houseInfo->houseSortInfos[$houseInfo->house_sort]) ? $houseInfo->houseSortInfos[$houseInfo->house_sort] : '';
		$content = "业主信息，姓名：{$userInfo['name']};电话：{$userInfo['mobile']};地址：{$houseInfo['region']} {$houseInfo['address']};面积：{$houseInfo->house_area};户型：{$houseType};房屋类别：{$houseSort}。请及时查看数据详情，并做好回访【兔班长装修网】";

        $smser = new Smser();
        $smser->send($mobile, $content, 'decoration_valid');
        return ;
    }

    protected function sendSmsService($merchantInfo, $data, $employee)
    {
		if (empty($merchantInfo) || $employee['status_sendmsg'] == 0) {
			return ;
		}

        $mobile = $employee['mobile'];
		$signStr = !isset($merchantInfo->name) ? '' : "【{$merchantInfo->name}】";
		$content = "有业主：{$data['name']}，电话：{$data['mobile']}，咨询您公司的家装业务，请立即回访{$signStr}";

        $smser = new Smser();
        $smser->send($mobile, $content, 'decoration_service');
		if ($employee['status_sendmsg'] == 2 && !empty($employee['mobile_ext'])) {
            $smser->send($employee['mobile_ext'], $content, 'decoration_service');
		}
        
        return true;
    }

    protected function sendSms($merchantInfo, $data)
    {
        $mobile = $data['mobile'];

		$message = isset($merchantInfo['msg']) ? $merchantInfo['msg'] : '';
		if (empty($message)) {
            $siteName = Yii::$app->params['siteNameBase'];
            $hotline = Yii::$app->params['siteHotline'];
            $message = "您已成功预约，装修顾问会在15分钟内回访了解您的具体装修需求，请保持您的电话畅通，详情咨询{$hotline}【{$siteName}】";
		}

        $smser = new Smser();
        $smser->send($mobile, $message, 'decoration_signup');
        
        return true;
    }

	protected function _formatInfos($infos)
	{
		foreach ($infos as $key => & $info) {
			if (!$info['view_at']) {
				$info['mobile'] = substr_replace($info['mobile'], '******', 3, 6);
			}
		}

		return $infos;
	}

    public function getOutStatusInfos()
    {
        $datas = [
            '' => '未知',
            'out' => '外地',
			'part' => '局部装修',
			'small' => '50平米以下整装',
			'shop' => '商铺',
			'we_part' => '水电改造',
			'soft' => '软装',
        ];

        return $datas;
    }

    public function getInvalidStatusInfos()
    {
        $datas = [
            '' => '未知',
            'no_call' => '空号',
            'noneed' => '无需求',
            'booked' => '已定好',
            'no_test' => '测试',
        ];

        return $datas;
    }

    public function getStatusInfos()
    {
        $datas = [
            '' => '未回访',
            'follow' => '跟进',
            'follow-plan' => '期房跟进',
			'valid' => '有效',
			'valid-part' => '有效-局装',
			'valid-out' => '承接范围外-无效',
            //'valid-dispatch' => '已派单',
            'bad' => '废单',
        ];
        return $datas;
    }

    public function getCallbackAgainInfos()
    {
        $datas = [
            0 => '',
            1 => '再次回访',
        ];

        return $datas;
    }

    protected function getCompanyInfos()
    {
        $infos = ArrayHelper::map(Company::find()->select('code, name')->where(['status' => 2])->all(), 'code', 'name');
        return $infos;
    }

    public function getNoticeMerchantInfos()
    {
        $datas = [
            '0' => '不通知',
            '1' => '通知',
        ];
        return $datas;
    }

    public function getNoticeUserInfos()
    {
        $datas = [
            '0' => '不通知',
            '1' => '通知',
        ];
        return $datas;
    }

    public function getConversionInfo()
    {
        $info = [];
        if (empty($this->conversion_id)) {
            return $info;
        }
        $info = Conversion::findOne($this->conversion_id);
        return $info;
    }
}