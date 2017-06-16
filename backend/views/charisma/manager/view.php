<?php
$detailViewParams = [
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        [
            'attribute' => 'role',
            'value' => $model->roleStr,
        ],
        'login_num',
        'truename',
        'email',
        [
            'attribute' => 'status',
            'value' => $model->statusInfos[$model->status],
        ],
        [
            'attribute' => 'created_at',
            'value'=> date('Y-m-d H:i:s',$model->created_at),
        ],
        [
            'attribute' => 'last_at',
            'value'=> date('Y-m-d H:i:s',$model->updated_at),
        ],
        'last_ip',
    ],
];

echo $this->render('@app/views/common/view', ['detailViewParams' => $detailViewParams]);

