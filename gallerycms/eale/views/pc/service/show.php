<?php
use yii\helpers\Url;

$this->params['cssFiles'] = [
    'bootstrap', 'yq_docs',
];
$this->params['jsFiles'] = [
    'jquery', 'bootstrap', 'unveil', 'yq_doc',
];
$this->params['formPosition'] = 'index';
$this->params['formPositionName'] = '首页';
//$this->context->mobileMappingUrl = Url::to(['/house/mobile-site/index', 'city_code' => Yii::$app->params['currentCompany']['code_short']]);
?>
<div class="wrap">
    <div class="container news newsny">
        <?= $this->render('../common/_breadnav', ['datas' => ['/service/' => '服务']]); ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 article_yq">
                <div class="list-group yq-list-group1">
                    <div class="list-group">
                        <div id="modeplace">
                            <div class="row list-group-item">
                                <div class="col-sm-3 col-md-4 item-img pull-left">
                                <img alt="" src="<?= $info->resizePic('thumb', 383, 234); ?>" class="img-responsive" /></div>
                                <div class="col-sm-4 col-md-5 item-heading">
                                    <h3><?= $info['name']; ?></h3>
                                    <p><?= date('Y/m/d', $info['created_at']); ?></p><h4></h4>
                                    <div class="cont_qq">
                                        <span>我也要拍</span>
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=295496616&site=qq&menu=yes" target="_blank" class="qq1" title="QQ咨询"></a>
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=2393606242&site=qq&menu=yes" target="_blank" class="qq2" title="QQ咨询"></a>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-3 fenxiang">
                                    <?= $this->render('../../_share'); ?>
                                    <?= $this->render('../_showrelated', ['relatedInfos' => $relatedInfos]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="item-con"><?= $info['content']; ?></div>
                    </div>
                    <?= $this->render('../_showrelated', ['position' => 'bottom', 'relatedInfos' => $relatedInfos]); ?>
                    <?= $this->render('../../_share2'); ?>
                    <?= $this->render('../../_related', ['infoType' => 'sample', 'infos' => $relatedInfos['rInfos']]); ?>
                </div>
                <div class="clearfix"></div>
                <div class="pre_next1 pre_next2" align="center">
                    <a class="r_top" href="#top">回顶部</a>
                    <a class="return" href="javascript:void()" onclick="returnbk();">返回</a></div>
            </div>
        </div>
    </div>
</div>
</div>
<input id="shareTitle" type="hidden" value="服装画册拍摄" />
<input id="shareContent" type="hidden" value="右视觉成立六年多来，本着灵魂透视的原则， 用商业的眼光发现商品的价值，用艺术的手法赋予商品的独特个性，用灵魂的去挖掘和突出产品的内在和文化，已为众多客户当来巨大的商业价格和企业品牌价值。商业和艺术是一对矛盾结合体，天马行空的创意和精益求精更..." />
<input id="shareLink" type="hidden" value="http://www.eale.cc/service/447bb2c6ba804ce1be17d8f8e6c643c8.html" />
<input id="shareImg" type="hidden" value="http://www.eale.cc/service/Images/@79f6623e-77fb-42f5-b1a9-9f3b75274b2a.jpg" />