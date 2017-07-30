<?php

$columns = [];

foreach ($searchModel->fields as $field) {
    switch ($field) {
    case 'service_id':
        $columns[] = [
            'attribute' => $field,
            'value' => function ($model) {
                return $model->getPointName('service', $model->service_id);
            }
        ];
        break;
    default:
        $columns[] = $field;
    }
}
$columns = array_merge($columns, $searchModel->getServiceBaseColumns());

$gridViewParams = [
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => $columns,
];
echo $this->render('_nav', ['view' => 'service', 'fields' => $searchModel->fields]);
$searchContent = $this->render('@baseapp/common/views/searchs/_search', ['elems' => $searchDatas, 'model' => $searchModel]);
echo $this->render('@backend/views/common/listinfo', ['gridViewParams'  => $gridViewParams, 'searchContent' => $searchContent]);
