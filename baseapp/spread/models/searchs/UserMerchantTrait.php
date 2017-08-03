<?php

namespace baseapp\spread\models\searchs;

use yii\data\ActiveDataProvider;

Trait UserMerchantTrait
{
    public $created_at_start;
    public $created_at_end;

    public function rules()
    {
        return [
            [['created_at_start', 'created_at_end', 'status', 'mobile', 'merchant_id', 'service_id'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = self::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider(['query' => $query]);
        if ($this->load($params, '') && !$this->validate()) {
            return $dataProvider;
        }
        if (!empty($this->mobile)) {
            $query->andFilterWhere(['like', 'mobile', $this->mobile]);
        }

        $query->andFilterWhere([
            'merchant_id' => $this->merchant_id,
            'service_id' => $this->service_id,
        ]);
        $this->status = $this->status == 'all' ? null : $this->status;
        $this->status = $this->status == 'back' ? ['back_reply', 'back_confirm'] : $this->status;
		if ($this->status !== null) {
			$query->andWhere(['status' => $this->status]);
		}
        //$this->merchant_id = 0;

        $startTime = intval(strtotime($this->created_at_start));
        $endTime = $this->created_at_end > 0 ? intval(strtotime($this->created_at_end)) : time();
        $query->andFilterWhere(['>=', 'created_at', $startTime]);
        $query->andFilterWhere(['<', 'created_at', $endTime]);
        return $dataProvider;
    }

    public function _searchDatas()
    {
        $list = [
            $this->_sPointParam(['field' => 'merchant_id', 'table' => 'merchant', 'where' => ['status_ext' => [1]]]),
            $this->_sPointParam(['field' => 'service_id', 'table' => 'service', 'where' => ['status_ext' => [1]]]),
            $this->_sKeyParam(['field' => 'status']),
        ];
        $form = [
        [
            $this->_sTextParam(['field' => 'mobile']),
            $this->_sStartParam(),
        ]
        ];
        $datas = ['list' => $list, 'form' => $form];
        return $datas;
    }
}
