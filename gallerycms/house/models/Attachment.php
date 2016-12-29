<?php

namespace gallerycms\house\models;

use gallerycms\models\Attachment as AttachmentBase;

class Attachment extends AttachmentBase
{
    public $urlPrefix = 'house';
    public $filePre = 'house/';

    use HouseTrait;
    protected function _fieldInfos()
    {
        $fieldInfos = [
            'star' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
            'customer' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
            'sample' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
            'adpicture' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
                'picture' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
            'info' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
            'service' => [
                'thumb' => [
                    'isSingle' => true,
                    'minSize' => 1, // unit: kb
                    'maxSize' => 2000,
                    'type' => 'image/*',
                ],
            ],
        ];
        return array_merge(parent::_fieldInfos(), $fieldInfos);
    }
}
