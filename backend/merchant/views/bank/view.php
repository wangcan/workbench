<?php

$detailViewParams = [
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'merchant_id',
            'value' => $model->getPointName('merchant', $model->merchant_id),
        ],
        'name',
        [
            'attribute' => 'bank_name',
            'value' => $model->bankNameInfos[$model->bank_name],
        ],
        'bank_account',
        'bank_opening',
        'orderlist',
        [
            'attribute' => 'type',
            'value' => empty($model->type) ? '' : $model->typeInfos[$model->type],
        ],
        [
            'attribute' => 'status',
            'value' => $model->statusInfos[$model->status],
        ],
        [
            'attribute' => 'created_at',
            'value'=> date('Y-m-d H:i:s',$model->created_at),
        ],
        [
            'attribute' => 'updated_at',
            'value'=> date('Y-m-d H:i:s',$model->updated_at),
        ],
        'description',
    ],
];

echo $this->render('@backend/views/common/view', ['detailViewParams' => $detailViewParams]);

