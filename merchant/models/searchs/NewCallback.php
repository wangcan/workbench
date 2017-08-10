<?php

namespace merchant\models\searchs;

use yii\data\ActiveDataProvider;
use merchant\models\NewCallback as NewCallbackModel;

class NewCallback extends NewCallbackModel
{
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $dataProvider;
    }
}