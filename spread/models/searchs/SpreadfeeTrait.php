<?php

namespace spread\models\searchs;

use yii\data\ActiveDataProvider;

Trait SpreadfeeTrait
{
    public function search($params)
    {
        $model = new self();
        $query = $model->find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $dataProvider;
    }
}
