<?php

namespace baseapp\merchant\models;

use Yii;

class Merchant extends MerchantModel
{
    public static function tableName()
    {
        return '{{%merchant}}';
    }

    public function getBehaviorCodes()
    {
        return array_merge(parent::getBehaviorCodes(), ['timestamp']);
    }

    public function rules()
    {
        return [
            [['name', 'code', 'city_code'], 'required'],
            [['callback_next', 'orderlist'], 'default', 'value' => '0'],
            [['status', 'region', 'name_full', 'sort', 'status_ext', 'status_contract', 'address', 'description'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '代码',
            'name' => '名称',
            'name_full' => '全称',
            'city_code' => '分站代码',
            'region' => '所在区县',
            'sort' => '类别',
            'orderlist' => '排序',
            'address' => '地址',
            'description' => '描述',
            'status' => '状态',
            'status_ext' => '额外状态',
            'status_contract' => '合同状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'saleman_id' => '销售ID',
            'callback_next' => '下次回访时间',

            'op-contact' => '联系人',
            'op-callback' => '回访操作',
        ];
    }

    public function getStatusContractInfos()
    {
        return $this->getMerchantStatusParams();
        $datas = [
			'elec' => '发电子版合同',
            'selfsign' => '单方签章快递',
            'finish' => '已完成',
        ];
        return $datas;
    }

    public function getStatusInfos()
    {
        return $this->getMerchantStatusParams();
    }

    protected function getSortInfos()
    {
		return $this->getSortParams();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        return true;
    }

    protected function _getTemplateFields()
    {
        $operation = [
            'formatView' => 'raw',
            'type' => 'operation',
            'qParams' => [
                'merchant_id' => ['field' => 'id', 'value' => null],
            ],
            'menuCodes' => [
                ['code' => 'merchant_follow_contact_listinfo'],
                ['code' => 'merchant_contract_add', 'name' => '添加合同'],
                //['code' => 'merchant_datum_view', 'name' => '相关资料'],
            ]
        ];
        $follow = [
            'formatView' => 'raw',
            'type' => 'operation',
            'qParams' => [
                'merchant_id' => ['field' => 'id', 'value' => null],
            ],
            'menuCodes' => [
                ['code' => 'merchant_follow_merchant-pond_callback', 'name' => '回访'],
                ['code' => 'merchant_follow_callback_listinfo'],
                ['code' => 'merchant_follow_interview_listinfo'],
            ]
        ];
        return [
            'id' => ['type' => 'common'],
            'sort' => ['type' => 'key'],
            'code' => ['type' => 'common'],
            'name' => ['type' => 'common'],
            'saleman_id' => ['type' => 'point', 'table' => 'saleman'],
            'city_code' => ['type' => 'common'],
            'region' => ['type' => 'common', 'listNo' => true],
            'orderlist' => ['type' => 'change', 'menuCode' => 'merchant_follow_merchant-pond_update', 'formatView' => 'raw', 'width' => '50'],
            //'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
            'status' => ['type' => 'key'],
            //'code' => ['type' => 'inline', 'method' => 'getCode', 'listNo' => true],
            'operation' => $operation,
            'follow' => $follow,
        ];
    }
}
