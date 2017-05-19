<?php

use yii\helpers\Html;

$menuInfos = $this->context->menuInfos;
$this->title = $menuInfos['menuTitle'];
$breadCrumbExt = isset($this->params['breadCrumbExt']) ? '-' . $this->params['breadCrumbExt'] : '';
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div data-original-title="" class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i><?= $menuInfos['menuBreadCrumb'] . $breadCrumbExt; ?></h2>
                <div class="box-icon"></div>
            </div>
            <div class="box-content">
                <?= $formContent; ?>
            </div>
        </div>
    </div>
</div>