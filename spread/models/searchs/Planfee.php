<?php

namespace spread\models\searchs;

use yii\data\ActiveDataProvider;
use spread\models\Planfee as PlanfeeModel;

class Planfee extends PlanfeeModel
{
    public function search($params)
    {
        $query = self::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 100]]);

        return $dataProvider;
    }
}