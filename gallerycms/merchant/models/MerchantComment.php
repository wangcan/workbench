<?php

namespace gallerycms\merchant\models;

use Yii;
use common\models\MerchantModel;
use yii\helpers\ArrayHelper;

class MerchantComment extends MerchantModel
{
	public $totalScore;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%merchant_comment}}';
    }

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
            [['content', 'owner_id', 'merchant_id', 'city_code', 'status_decoration'], 'required'],
            [['design_star', 'execution_star', 'service_star', 'status'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'owner_id' => '业主ID',
			'city_code' => '城市代码',
			'merchant_id' => '商家',
			'design_star' => '设计评分',
			'execution_star' => '施工评分',
			'service_star' => '服务评分',
            'content' => '内容',
            'status_decoration' => '装修阶段',
            'status' => '状态',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

	public function getStatusDecorationInfos()
	{
		return $this->_decorationStatusInfos();
	}	

	public function getStatusInfos()
	{
		$datas = [
			'0' => '隐藏',
			'1' => '正常',
		];	
		return $datas;
	}	

	public function beforeSave($insert)
	{
		if ($insert) {
			if ($this->ownerInfo->num_comment >= 6) {
                $this->addError('status_decoration', '一个业主评论数不能超过6条');
				return false;
			}
		}

		return true;
	}

	public function afterSave($insert, $changedAttributes)
	{
        parent::afterSave($insert, $changedAttributes);
		if ($insert) {
			$this->merchantInfo->updateNum('num_comment', 'add');
			$this->ownerInfo->updateNum('num_comment', 'add');
		}

		return true;
	}	

	public function afterDelete()
	{
		$this->merchantInfo->updateNum('num_comment', 'minus');
		$this->ownerInfo->updateNum('num_comment', 'minus');
	}

	public function getInfos($where, $limit = 10)
	{
		$infos = $this->find()->where($where)->indexBy('id')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
		$ownerModel = new Owner();
		foreach ($infos as $key => & $info) {
			$info['totalScore'] = max($info['design_star'], $info['execution_star'], $info['service_star']);
		}

        //$cache->set($keyCache, $infos);
		//print_r($infos);
		return $infos;
	}		

	public function getMerchantInfos()
	{
		$infos = $this->_getMerchantInfos([]);
		return $infos;
	}

    public function formatContent()
    {
        $oInfo = Merchant::findOne($this->merchant_id_old);
        $nInfo = Merchant::findOne($this->merchant_id);
        $oName = isset($oInfo['name']) ? $oInfo['name'] : '';
        $nName = isset($nInfo['name']) ? $nInfo['name'] : '';
        $datas = ['土巴兔', $oName];
        $rDatas = [Yii::$app->params['siteNameBase'], $nName];
        $content = str_replace($datas, $rDatas, $this->content);

        return $content;
    }
}
