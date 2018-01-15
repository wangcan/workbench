<?php

namespace gallerycms\shoot\models\searchs;

use yii\data\ActiveDataProvider;
use gallerycms\shoot\models\Site as SiteModel;

class Site extends SiteModel
{
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $dataProvider;
    }
}