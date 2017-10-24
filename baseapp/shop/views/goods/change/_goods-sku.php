<?php
$modelNew = $merchantModel->_newModel('goodsSku');

$baseInfos = [
    [
        'type' => 'add',
        'addFunc' => 'addGoodsSku()',
        'name' => '添加SKU',
        'modelNew' => $modelNew,
        'elems' => [
            [
                'status' => ['sort' => 'change', 'type' => 'dropdown', 'elemInfos' => $modelNew->statusInfos],
                'content' => ['sort' => 'change', 'type' => 'textarea'],
            ],
        ],
    ],
    [
        'type' => 'list',
        'name' => 'SKU列表',
        'modelNew' => $modelNew,
        'infos' => $callbackInfos,
        'fields' => $modelNew->gatherListElems,
    ]
];
echo $this->render('@baseapp/common/views/change-gather/gather', ['infos' => $baseInfos]);
?>
<script>
function addCallback()
{
    var table = '<?= $modelNew->formName(); ?>';
    var content = $('#' + table + '_content_0').val();
    if (!content) {
        alert('<?= $modelNew->getAttributeLabel('content'); ?>内容不能为空');
        return false;
    }
    var data = {
        'merchant_id': '<?= $merchantModel->id; ?>',
        'saleman_id': <?= $merchantModel->saleman_id; ?>,
        'operation': 'add',
        'table': table,
        'content': content,
        'status': $('#' + table + '_status_0').val()
    };

    addElemByAjax('', data, table + '_infos');
}
</script>
