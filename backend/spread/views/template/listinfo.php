<?php
$gridViewParams = [
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'code',
        [
            'attribute' => 'merchant_id',
            'value' => function($model) {
                $merchantInfo = $model->merchantInfo;
                return empty($merchantInfo) ? '' : $merchantInfo['name'];
            }
        ],
        [
            'attribute' => 'have_pc',
            'value' => function($model) {
                return !empty($model->have_pc) ? $model->havePcInfos[$model->have_pc] : '';
            }
        ],
        [
            'attribute' => 'have_mobile',
            'value' => function($model) {
                return !empty($model->have_mobile) ? $model->haveMobileInfos[$model->have_mobile] : '';
            }
        ],
        [
            'attribute' => 'status',
            'value' => function($model) {
                return !empty($model->status) ? $model->statusInfos[$model->status] : '';
            }
        ],
    ],
];

echo $this->render('@backend/views/common/listinfo', ['gridViewParams'  => $gridViewParams]);
