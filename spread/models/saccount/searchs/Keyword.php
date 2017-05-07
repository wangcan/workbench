<?php

namespace spread\models\saccount\searchs;

use yii\data\ActiveDataProvider;
use spread\models\saccount\Keyword as KeywordModel;

class Keyword extends KeywordModel
{
    public function search($params)
    {
        $query = self::find()->orderBy('id DESC');

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 100]]);

        return $dataProvider;
    }
}