<?php

$detailViewParams = [
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'code',
        [
            'attribute' => 'merchant_id',
            'value' => empty($model->merchantInfo) ? '' : $model->merchantInfo['name'],
        ],
        [
            'attribute' => 'have_pc',
            'value' => !empty($model->have_pc) ? $model->havePcInfos[$model->have_pc] : '',
        ],
        [
            'attribute' => 'have_mobile',
            'value' => !empty($model->have_mobile) ? $model->haveMobileInfos[$model->have_mobile] : '',
        ],
        [
            'attribute' => 'status',
            'value' => !empty($model->status) ? $model->statusInfos[$model->status] : '',
        ],
    ],
];

echo $this->render('@backend/views/common/view', ['detailViewParams' => $detailViewParams]);

