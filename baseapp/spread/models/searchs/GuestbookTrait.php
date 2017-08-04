<?php

namespace baseapp\spread\models\searchs;

use yii\data\ActiveDataProvider;

Trait GuestbookTrait
{
    public $created_at_start;
    public $created_at_end;
    public function rules()
    {
        return [
            [['mobile', 'merchant_id', 'created_at_start', 'created_at_end'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = self::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider(['query' => $query]);
        if (!$this->load($params, '') || !$this->validate()) {
            return $dataProvider;
        }
		$query->andFilterWhere([
			'merchant_id' => $this->merchant_id,
            'mobile' => $this->mobile,
		]);

        $startTime = intval(strtotime($this->created_at_start));
        $endTime = $this->created_at_end > 0 ? intval(strtotime($this->created_at_end)) : time();
        $query->andFilterWhere(['>=', 'created_at', $startTime]);
        $query->andFilterWhere(['<', 'created_at', $endTime]);

        return $dataProvider;
    }

    public function getSearchDatas()
    {
        $list = [
            $this->_sPointParam(['field' => 'merchant_id', 'table' => 'merchant', 'where' => ['status_ext' => [1]]]),
            $this->_sPointParam(['field' => 'service_id', 'table' => 'service', 'where' => ['status_ext' => [1]]]),
        ];
        $form = [
        [
            $this->_sTextParam(['field' => 'mobile']),
        ],
        ];
        $datas = ['list' => $list, 'form' => $form];
        return $datas;
    }
}
