<?php
use yii\helpers\Url;

$this->params['cssFiles'] = [
    'common', 'public', 'style'
];
$this->params['jsFiles'] = [
    'jquery-1.8.3.min',
];
$this->params['formPosition'] = $controllerId;
$this->params['formPositionName'] = $view;
//$this->context->mobileMappingUrl = Url::to(['/house/mobile-site/index', 'city_code' => Yii::$app->params['currentCompany']['code_short']]);
?>
<div class="lxwm_main">
    <div class="topimg-240">
        <!-- <img src="http://s.300.cn/current/home/images/gsjj.jpg" />-->
        <style type="text/css">*{margin:0; padding:0;} ul,li{list-style: none;} .flexslider{width:100%; height:240px; margin:0 auto; position: relative; overflow: hidden;} .flex-viewport{height:100%;} .flexslider .slides{width:800%; height:100%; position:absolute; top:0; left: 0;} .slides li{float: left; height:240px; text-align: center;} .flex-control-nav{position: absolute; bottom: 20px; z-index: 2; text-align: center; z-index: 9999;} .flex-control-nav li{display: inline-block; width: 68px; height: 8px; margin: 0 5px; *display: inline; zoom: 1;} .slides li a{width: 100%; height: 240px; display: inline-block;} .flex-control-nav a {display: inline-block; width: 68px; height: 8px; line-height: 40px; overflow: hidden; background-color:#FFF; cursor: pointer; opacity:0.3; filter:alpha(opacity=30);} .flex-control-nav .flex-active{opacity:1; filter:alpha(opacity=100);}</style>
        <div class="flexslider">
            <ul class="slides">
                <li style="display: none; background: url(http://www.300.cn/attach/banner/20160126/56a725e723c20.jpg) 50% 0% no-repeat;">
                    <a href="http://www.300.cn/free.html" class="qplj" target="_blank"></a>
                </li>
                <li style="display: none; background: url(http://a.300.cn/banner/20151202/565eeebc9b20d.jpg) 50% 0% no-repeat;">
                    <a href="http://www.300.cn/guanwang.html" class="qplj" target="_blank"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="top_links">
            <a href="/" class="index_link">首页</a>>
            <a href="/aboutus/index.html">关于中企</a>> 企业概况</div>
        <div class="aboutzq">
            <div class="zq-left floatL">
                <div class="zq-menu floatL">
                    <ul>
                        <li class="t">关于中企</li>
                        <script>$(document).ready(function() {
                                var str = window.location.pathname;
                                var str_sp = str.split("/");
                                if (str_sp[2] == '' || str_sp[2] == 'company') {
                                    $('#left_id_91').addClass("active");
                                } else if (str_sp[2] == 'culture') {
                                    $('#left_id_92').addClass("active");
                                } else if (str_sp[2] == 'events') {
                                    $('#left_id_99').addClass("active");
                                } else if (str_sp[2] == 'gethonor') {
                                    $('#left_id_133').addClass("active");
                                } else if (str_sp[2] == 'qualification') {
                                    $('#left_id_95').addClass("active");
                                } else if (str_sp[2] == 'partner') {
                                    $('#left_id_96').addClass("active");
                                } else if (str_sp[2] == 'news') {
                                    $('#left_id_97').addClass("active");
                                } else if (str_sp[2] == 'report') {
                                    $('#left_id_98').addClass("active");
                                } else if (str_sp[2] == 'projectevents') {
                                    $('#left_id_201').addClass("active");
                                } else if (str_sp[2] == 'advert') {
                                    $('#left_id_204').addClass("active");
                                } else if (str_sp[2] == 'dlnews') {
                                    $("#left_id_198").addClass("active");
                                } else if (str_sp[2] == 'smzy') {
                                    $('#left_id_200').addClass("active");
                                }
                                $('#left_id_124').hide();
                            });</script>
                        <li>
                            <a href="/aboutus/company/" id="left_id_91">企业概况</a></li>
                        <li>
                            <a href="/aboutus/culture/" id="left_id_92">企业文化</a></li>
                        <li>
                            <a href="/aboutus/events/" id="left_id_99">发展历程</a></li>
                        <li>
                            <a href="/aboutus/qualification/" id="left_id_95">企业资质</a></li>
                        <li>
                            <a href="/aboutus/gethonor/" id="left_id_133">所获荣誉</a></li>
                        <li>
                            <a href="/aboutus/org/" id="left_id_124">服务网络</a></li>
                        <li>
                            <a href="/aboutus/smzy/" id="left_id_200">数码庄园</a></li>
                    </ul>
                </div>
                <div class="ad-con ad-con1 about-ad-con">
                    <a href="/shangcheng.html" target="_blank">
                        <div class="about-ad-img">
                            <img src="http://s.300.cn/current/home/images/about-ad-img4.jpg" alt="企业网上商城建设" /></div>
                    </a>
                </div>
                <div class="ad-con ad-con2 about-ad-con">
                    <a href="/appzhuanti.html" target="_blank">
                        <div class="about-ad-img">
                            <img src="http://s.300.cn/current/home/images/about-ad-img5.jpg" alt="企业APP" /></div>
                    </a>
                </div>
                <div class="ad-con ad-con3 about-ad-con">
                    <a href="/shoujijianzhan.html" target="_blank">
                        <div class="about-ad-img">
                            <img src="http://s.300.cn/current/home/images/about-ad-img6.jpg" alt="手机网站建设方案" /></div>
                    </a>
                </div>
            </div>
            <div class="about-content floatR">
                <div class="zq-profile">
                    <div class="img">
                        <img src="http://s.300.cn/current/home/images/gsjj-pic1.jpg" alt="中企动力科技股份有限公司" /></div>
                    <div class="profile">
                        <div class="t">中企动力科技股份有限公司</div>
                        <div class="con">
                            <p>中企动力科技股份有限公司成立于1999年9月16日，是中国领先的企业电子商务服务运营商，是南海控股集团旗下中国数码集团的全资子公司，与新网、大地文化等互为兄弟公司。公司成立17年来，已在全国开设近80家分公司，现有员工8000多人，为120多万家中小企业提供过互联网电子商务服务。</p>
                            <p>中企动力科技股份有限公司为中小企业提供网站建设、全网营销、域名注册和电子邮箱等服务。“New Z+ 企业网站云平台”是为中小企业提供一对一定制企业官网建设解决方案的平台；“Ztouch S 全网营销型网站”是为企业提供可自动适配各终端的网站建设的服务；“VONE企业移动营销平台”是帮助企业实现“互联网+传统企业”的企业移动营销平台；“Zshop S 企业级全网零售平台”，可以帮企业实现多平台多渠道营销；“大把推企业互联网整合营销平台” 是2014年年底发布的针对中小企业的全网络整合营销服务。中企动力在服装、汽车、化工等行业的官网建设、全网营销领域快速发展，服务已经覆盖40大行业1000多个细分行业。</p>
                            <p>中企动力科技股份有限公司是首批CNNIC认证域名注册服务机构，也是google在华首家合作伙伴，是百度云加速战略合作伙伴。中企动力科技股份有限公司的产品连续多年被评为“中小企业网站建设推荐示范平台”；在服务中小企业的十六年间，多次获评“企业信用评价AAA级信用企业”、“诚信经营企业”；2015年，被评为“中国年度最佳雇主“。</p>
                            <p>中企动力科技股份有限公司的使命是通过信息化运营，打造智慧型的中国企业，成就智慧企业家。公司将本着责任、勤奋、专业、创新精神，实现任何企业无论大小，无论何时、何地，都能轻易地开展电子商务、实现信息化管理的企业愿景。</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?= $this->render('../common/_ask'); ?>
</div>
<script type="text/javascript" src="http://s.300.cn/current/home/js/jquery.flexslider-min.js"></script>
<!-- 轮播图 -->
<script type="text/javascript" src="http://s.300.cn/current/home/js/jquery.sly.js"></script>
<!-- 美化滚动条 -->
<script type="text/javascript" src="http://s.300.cn/current/home/js/jquery.easing-1.3.min.js"></script>
<!-- 美化滚动条 -->
<script type="text/javascript" src="http://s.300.cn/current/home/js/jquery-scrollbar.js"></script>
<!-- 美化滚动条 -->
<script>$(document).ready(function() {
        var str = window.location.pathname;
        var str_sp = str.split("/");
        if (str_sp[2] == 'about') {
            $('#home_ab').addClass("active");
        }
    });
    $(function() {
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
