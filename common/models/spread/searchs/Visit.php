<?php

namespace common\models\spread\searchs;

use yii\data\ActiveDataProvider;
use common\models\spread\Visit as VisitModel;

class Visit extends VisitModel
{
    public $company_id;
    public $created_at_start;
    public $created_at_end;

    public function rules()
    {
        return [
            [['keyword', 'created_at_start', 'created_at_end', 'client_type', 'channel'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = self::find()->orderBy('id DESC');

        return $this->_search($params, $query);
    }    
}