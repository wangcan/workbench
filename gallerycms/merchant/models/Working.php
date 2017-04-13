<?php

namespace gallerycms\merchant\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\MerchantModel;
use spread\models\CustomService;

/**
 * This is the model class for table "merchant".
 */
class Working extends MerchantModel
{
    use MerchantTrait;
	public $statusDatas;
	//public $merchantInfo;
	public $avatar;
	public $start;
	public $electric;
	public $cement;
	public $paint;
	public $finish;
    public $picture;

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%working}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
		$behaviors = [
		    $this->timestampBehaviorComponent,
		];
		return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_code', 'merchant_id', 'owner_id'], 'required'],
			[['thumb', 'orderlist'], 'integer'],
			[['thumb', 'orderlist'], 'default', 'value' => '0'],
			[['status'], 'default', 'value' => ''],
			[['start', 'electric', 'cement', 'paint', 'finish', 'start_at', 'start_desc', 'electric_at', 'electric_desc', 'cement_at', 'cement_desc', 'paint_at', 'paint_desc', 'finish_at', 'finish_desc', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
			'merchant_id' => '所属公司',
            'thumb' => '缩略图',
			'start' => '开工图片',
			'electric' => '水电图片',
			'cement' => '泥木图片',
			'paint' => '油漆图片',
			'finish' => '竣工图片',
			'start_at' => '开工日期',
			'electric_at' => '水电日期',
			'cement_at' => '泥木日期',
			'paint_at' => '油漆日期',
			'finish_at' => '竣工日期',
			'start_desc' => '开工描述',
			'electric_desc' => '水电描述',
			'cement_desc' => '泥木描述',
			'paint_desc' => '油漆描述',
			'finish_desc' => '竣工描述',
			'orderlist' => '排序',
            'description' => '描述',
            'status' => '是否显示',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

	public function getStatusInfos()
	{
		return $this->_decorationStatusInfos();
	}	

	public function afterSave($insert, $changedAttributes)
	{
        parent::afterSave($insert, $changedAttributes);

		$fields = ['thumb'];
		$this->_updateSingleAttachment('working', $fields);
		$statusInfos = array_filter(array_keys($this->statusInfos));
		foreach ($statusInfos as $status) {
		    $this->_updateMulAttachment('working', $status);
		}
		if ($insert) {
			$this->merchantInfo->updateNum('num_working', 'add');
			$ownerInfo = $this->ownerInfo;
			$ownerInfo->working_id = $this->id;
			$r = $ownerInfo->update(false, ['working_id']);
		}

		return true;
	}	

	public function afterDelete()
	{
		$this->merchantInfo->updateNum('num_working', 'minus');
		$this->ownerInfo->working_id = 0;
		$this->ownerInfo->update(false, ['working_id']);
	}

	public function getInfo($id)
	{
		$info = static::find()->where(['id' => $id])->one();//->toArray();
		if (empty($info)) {
			return $info;
		}

		$info = $this->_formatInfo($info);
        //\Yii::$app->cacheRedis->set($key, $info);
		return $info;
	}

	protected function _formatInfo($info)
	{
		$info['thumb'] = $info->getAttachmentUrl($info['thumb']);
		$info['status'] = isset($info->statusInfos[$info->status]) ? $info->statusInfos[$info->status] : $info->status;
		//echo $info->owner_id;exit();

        $condition = [ 
            'info_table' => 'working',
            //'info_field' => 'design_sketch',
            //'info_field' => 'picture',
            'info_id' => $info->id,
            'in_use' => 1,
        ];  
        $infos = $this->getAttachmentModel()->find()->where($condition)->orderBy(['orderlist' => SORT_DESC])->all();
        $pictureInfos = []; 
        foreach ($infos as $attachment) {
            $url = $attachment->getUrl();
            $pictureInfos[] = [ 
                'url' => $url,
                'name' => $attachment['filename'],
                'info_id' => $attachment['info_id'],
                'id' => $attachment['id'],
                'description' => $attachment['description'],
            ];  
        }    
        $info->picture = $this->_formatImgForShow($pictureInfos);

		return $info;
	}

	public function getInfos($where, $limit = 30)
	{
		$infos = $this->find()->where($where)->indexBy('id')->orderBy(['orderlist' => SORT_DESC])->limit($limit)->all();
		foreach ($infos as $key => & $info) {
			$info['thumb'] = $info->getAttachmentUrl($info['thumb']);
			$info['status'] = isset($info->statusInfos[$info->status]) ? $info->statusInfos[$info->status] : $info->status;
		}

        //$cache->set($keyCache, $infos);
		return $infos;
	}		

	public function getMerchantInfos()
	{
		$infos = $this->getMerchantInfos([]);
		return $infos;
	}

	public function getInfoUrl()
	{
		$domain = Yii::$app->params['baseDomain'];
		$url = "http://{$this->city_code}.{$domain}/gd-{$this->id}.html";

		return $url;
	}

	protected function _formatInfos($infos)
	{
		$ownerModel = new Owner();
		foreach ($infos as $key => & $info) {
			$info['thumb'] = $info->getAttachmentUrl($info['thumb']);
		}
		return $infos;
	}

    public function getName()
    {
		$ownerModel = new Owner();
		$ownerInfo = $ownerModel->getInfo($this->owner_id);
        if (empty($ownerInfo)) {
            return '';
        }
        return $ownerInfo->nameFull;
    }
}
