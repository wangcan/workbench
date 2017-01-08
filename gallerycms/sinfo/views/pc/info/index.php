<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->params['cssFiles'] = [
    'common', 'public', 'style'
];
$this->params['jsFiles'] = [
    'jquery-1.8.3.min',
];
$this->params['formPosition'] = 'index';
$this->params['formPositionName'] = '';
//$this->context->mobileMappingUrl = Url::to(['/house/mobile-site/index', 'city_code' => Yii::$app->params['currentCompany']['code_short']]);
?>
<div class="lxwm_main">
    <?= $this->render('_banner'); ?>
    <div class="container">
        <div class="top_links">
            <a href="/" class="index_link">首页</a><em>></em>
            <a href="<?= Url::to(['/sinfo/info/index', 'tag' => '_', 'page'=> '_1']); ?>">获取访客信息攻略</a>
            <?php if (!empty($currentSort)) { ?><em>></em>
            <a href="<?= Url::to(['/sinfo/info/index', 'tag' => '_' . $currentSort, 'page'=> '_1']); ?>"><?= $currentSortName; ?></a>
            <?php } ?>
        </div>
        <div class="aboutzq">
            <?= $this->render('_left', ['model' => $model, 'currentSort' => $currentSort]); ?>
            <div class="zq-content floatL">
                <ul class="media-list-con">
                    <?php foreach ($infos as $info) { ?>
                    <li>
                        <a href="<?= Url::to(['/sinfo/info/show', 'id' => $info['id']]); ?>">
                            <div class="t"><?= $info['name']; ?>
                                <span class="time"><?= date('Y-m-d H:i:s', $info['created_at']); ?></span>
                            </div>
                            <div class="des"><?= $info['description']; ?></div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="page">
                    <div class="all-page">共<span><?= $pages->totalCount; ?></span>条</div>
                    <div class="flip-page">
                        <ul ><?= LinkPager::widget(['pagination' => $pages]); ?></ul>
                    </div>
                    <div class="now-page">当前第<span><?= $page; ?>/<?= ceil($pages->totalCount / $pages->defaultPageSize); ?></span>页</div>
                    <div class="clear"></div>
                </div>
            </div>
            <?= $this->render('_right'); ?>
            <div class="clear"></div>
        </div>
    </div>
    <!-- 免费咨询 begin-->
    <?= $this->render('../common/_ask'); ?>
</div>
<script type="text/javascript">$(function() {
        $('.flexslider').flexslider({
            directionNav: false,
            pauseOnAction: true,
            animation: "slide"
        });
    });
    $(function() {
        var butwidth = parseInt($('.flex-control-nav').css('width'));
        var bannerwidth = parseInt($('.flexslider').css('width'));
        $('.flex-control-nav').css('margin-right', (bannerwidth - butwidth) / 2);
    });</script>
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/cmsad/pc/js/jquery.flexslider-min.js"></script>
<!-- 轮播图 -->