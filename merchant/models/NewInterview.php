<?php

namespace merchant\models;

use baseapp\merchant\models\MerchantModel;
use baseapp\merchant\models\Merchant;

class NewInterview extends MerchantModel
{
    public static function tableName()
    {
        return '{{%new_interview}}';
    }

    public function getStatusInfos()
    {
        $datas = [
            '' => '新录入',
            'no-purpose' => '无意向',
            'latent' => '潜在',
            'purpose' => '有意向',
			'cooperation' => '合作',
        ];
        return $datas;
    }

    protected function getSortInfos()
    {
        $datas = [
            'decoration' => '家装公司',
        ];
        return $datas;
    }
}