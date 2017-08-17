<?php

namespace merchant\models\searchs;

use merchant\models\Contact as ContactModel;

class Contact extends ContactModel
{
    public function rules()
    {
        return [
            [['merchant_id', 'created_at_start', 'created_at_end', 'status'], 'safe'],
        ];
    }

    public function _searchElems()
    {
        return [
            ['field' => 'merchant_id', 'type' => 'common'],
            ['field' => 'status', 'type' => 'common'],
            ['field' => 'created_at', 'type' => 'rangeTime'],
        ];
    }

    public function _searchDatas()
    {
        $list = [
            //$this->_sKeyParam(['field' => 'status']),
        ];
        $form = [
        [
            $this->_sStartParam(),
        ]
        ];
        return ['list' => $list, 'form' => $form];
    }
}
