<?php

namespace gallerycms\models;

use common\models\GallerycmsModel;
use common\models\Attachment as AttachmentBase;

class Attachment extends AttachmentBase
{
    protected function _fieldInfos()
    {
        return [
            'brand' => [
                'logo' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 30,
                    'type' => 'image/*',
                ],
            ],
            'goods' => [
                'main_photo' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 30,
                    'type' => 'image/*',
                ],
                'picture' => [
                    'isSingle' => false,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 500,
                    'type' => 'image/*',
                ],
            ],
        ];
    }
}
