<?php
use yii\helpers\StringHelper;

$baseUrl = Yii::getAlias('@gallerycmsurl');
?>
<div class="Phot_find wrapper clearfix" style="margin-top:10px;">
    <ul class="fl">
        <p class="p_title">热门装修公司排行榜</p>
        <?php $i = 1; foreach ($merchantInfos as $info) { $elemClass = $i <= 3 ? 'red' : 'gray'; ?>
        <li class="clearfix">
            <span class="span_left span_<?= $elemClass; ?>"><?= $i; ?></span>
            <a href="<?= "{$info['infoUrl']}"; ?>" title="<?= $info['name_full']; ?>"><?= $info['name_full']; ?></a>
            <!--<span class="fr span2" onclick="check_box('152544','21-1','<?= $info['name']; ?>')">免费设计</span>-->
        </li>
        <?php $i++; } ?>
    </ul>
    <ul class="fl" style="margin-left:45px;">
        <p class="p_title">热门装修问答</p>
        <?php $i = 1; foreach ($askInfos as $info) { $elemClass = $i <= 3 ? 'red' : 'gray'; ?>
        <li class="clearfix">
            <span class="span_left span_<?= $elemClass; ?>"><?= $i; ?></span>
            <a href="<?= "{$baseUrl}/askshow_{$info['id']}.html"; ?>" title="<?= $info['name']; ?>"><?= StringHelper::truncate($info['name'], 18, '...'); ?></a>
            <!--<span class="fr span2" onclick="check_box('152544','21-1','<?= $info['name']; ?>')">免费咨询</span>-->
        </li>
        <?php $i++; } ?>
    </ul>
    <ul class="fr">
        <p class="p_title">热门装修报价</p>
        <?php $i = 1; foreach ($quoteInfos as $info) { $elemClass = $i <= 3 ? 'red' : 'gray'; ?>
        <li class="clearfix">
            <span class="span_left span_<?= $elemClass; ?>"><?= $i; ?></span>
            <a href="<?= "{$baseUrl}/{$info['city_code']}/quoteshow_{$info['id']}.html"; ?>" title="<?= $info['name']; ?>"><?= $info['name']; ?></a>
            <!--<span class="fr span2" onclick="check_box('152544','21-1','<?= $info['name']; ?>')">免费报价</span></li>-->
        </li>
        <?php $i++; } ?>
    </ul>
</div>