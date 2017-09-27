<?php
use yii\bootstrap\ActiveForm;

$this->params['bodyClass'] = 'class="page-register"';
Yii::$app->params['seoTitle'] = '注册-' . Yii::$app->params['seoTitle'];

$fields = ['mobile', 'password'];
$data = [];
foreach ($fields as $field) {
    $data[$field]['value'] = !isset($info[$field]) || $field == 'password' ? '' : $info[$field]['value'];
    $data[$field]['error'] = isset($info[$field]['error']) ? $info[$field]['error'] : '';
}

?>
<?= $this->render('_signup-jstop'); ?>
<link rel="stylesheet" href="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/css/32ceb-5815.css"></head>

<div class="container">
    <div class="iphone-header hidden" id="iphoneHead"></div>
    <header class="top-nav">
        <a class="nav-back" id="navBack" data-step="1" href="#backToApp"></a>
		<span class="nav-title" id="navTitle"><开通<?= $this->appDatas('siteName'); ?></span>
    </header>
    <!-- 第一步 手机验证开通 -->
    <section class="register-step1" id="step1">
        <p class="step1-tip" id="step1Tip">我们将发送验证码到你的手机</p>
        <form class="step1-field">
            <input id="mobile" type="tel" autocomplete="off" maxlength="11" placeholder="请填写手机号">
            <div class="field-imgcode">
                <input id="verifyCode" type="text" autocomplete="off" maxlength="4" placeholder="识别码">
                <div class="imgcode-img" id="codeChange">
                    <img id="imgCode" src="/captcha.html" height="110" width="200" />
                    <p class="img-tip">看不清，换一张</p></div>
            </div>
            <div class="field-smscode">
                <input type="tel" id="smsCode" autocomplete="off" maxlength="6" placeholder="短信验证码">
                <div class="smscode-get">
                    <button class="btn-get getMobileCode" id="getCode">获取验证码</button>
                    <p class="time-count hidden" id="timeCount">
                        <span id="second">60</span>
                        <span>秒</span>后重新获取</p></div>
            </div>
        </form>
        <button class="btn-signup" id="nextStep" type="button">下一步</button>
        <a class="h5-login" href="/signin.html">已有账号，点此登录</a></section>
    <!-- 第二步 公司基本信息 -->
    <section class="register-step2 hidden" id="step2">
        <form class="step2-field">
            <input id="companyName" type="text" autocomplete="off" maxlength="30" placeholder="请输入完整的公司名称">
            <input id="linkMan" type="text" autocomplete="off" maxlength="10" placeholder="姓名">
            <div class="field-password">
                <input id="password" type="password" autocomplete="off" maxlength="20" placeholder="请输入密码(6-20位英文或数字)">
                <div class="password-show" id="isShowPassword">
                    <span class="show-eye"></span>
                </div>
            </div>
            <!--<div class="field-industry" id="choseIndustry">
                <label class="industry-name" id="businessType" title="">请选择行业</label>
                <div class="industry-select">
                    <span class="select-arrow"></span>
                </div>
            </div>-->
        </form>
        <button class="btn-signup" id="signup" type="button">注 册</button>
        <!-- 第二步中选择行业列表 -->
        <!--<div class="wrap-industry hidden" id="step21">
            <p class="select-tip">选择行业</p>
            <ul class="industry-list" id="industryList">
				<li data-value="16">其他行业</li>
            </ul>
        </div>-->
    </section>
    <!-- 第三步 注册成功体验 -->
    <!--<section class="register-step3 hidden" id="step3">
        <div class="top-nav"></div>
        <h2>注册成功！</h2>
        <p class="step3-tip1">已为您开通5用户终身免费服务</p>
        <p class="step3-tip2">您的专属客服电话
			<br /><?= $this->appDatas('siteHotline'); ?><br />如有疑问请致电
        </p>
        <div class="wrap-experience">
            <a id="joinProduct" href="#goToTrial">进入产品</a>
            <a id="manage-experi" href="/enter.html?accountType=1" onclick="_hmt.push(['_trackEvent', 'mobile', 'click', 'mCorpTrial','bottom'])">体验管理后台</a>
            <a id="order-experi" href="/enter.html?accountType=2" onclick="_hmt.push(['_trackEvent', 'mobile', 'click', 'mAgentTrial','bottom'])">体验订货系统</a></div>
    </section>-->
</div>
<input type="hidden" id="appUrl" value="/" />
<input type="hidden" id="recommendCode" value="" />
<input type="hidden" id="wid" value="" />
<!-- 万达蓝海wid,用于绑定 -->
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/js/zepto.min.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/js/zepto.cookie.min.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/js/common.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/js/register2.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/js/statistics.js"></script>
<script type="text/javascript">if (location.search.indexOf('Android') != -1 || location.search.indexOf('iOS') != -1) {
    $(".h5-login").hide();
}</script>