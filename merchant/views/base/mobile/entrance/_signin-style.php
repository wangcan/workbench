<style type="text/css">
* { -webkit-tap-highlight-color:rgba(0,0,0,0); -webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; box-sizing:border-box; }
html { font-size: 16px; font-family: "Helvetica Neue", Helvetica, Microsoft Yahei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }
@media all and (max-width:768px) {
html { font-size: 18px }
}
@media all and (max-width:414px) {
html { font-size: 16px }
}
@media all and (max-width:375px) {
html { font-size: 15px }
}
@media all and (max-width:320px) {
html { font-size: 13px }
}
html, body { height: 100%; width: 100%; }
body, h1, h2, h3, p{ margin:0; padding:0; }
a { color:#000; text-decoration: none; -webkit-tap-highlight-color: rgba(0,0,0,0); }
header{ padding:5rem 0; text-align:center; }
h1{ font-size:24px; font-weight:normal; color:#FFF; margin-bottom: 6px; text-shadow: 0px 0px 1px #efefef; }
h3{ font-size:18px; font-weight:normal; color:#FFF; text-shadow: 0px 0px 1px #efefef; }
input, textarea{ margin:0; line-height:1; font-size: inherit; font-size: 1rem; font-family:inherit; -webkit-appearance:none; -webkit-border-radius: 0; }
input:focus, textarea:focus{ outline:none; border:none; }
.ui-input{
	border: 0;
    line-height: 1em;
    box-sizing: content-box;
    background-color: transparent;
    color: #fff;
    width: 100%;
}
.ui-input::-webkit-input-placeholder { color:#fff; vertical-align:middle; padding-top:3px; }
.bb{ border-bottom:1px solid rgba(202,227,239,0.7); padding: 1.2rem 12px 1rem 40px;}
.ic{ position:absolute; width:20px; height:20px;margin: 0 0 0 -30px;background:url(<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/img/login-icon.png) 0 0 no-repeat; background-size:60px 20px; }
.ic_2{ background-position:-20px 0; }
.ic_3{ background-position:-40px 0 ; }
.ui-btn{ font-size:1.2rem; border:none; background:#fff; padding:1rem 0; color:#444; width:100%;border-radius: 2px;}

.verifyCode-box{position:relative}
.verifyCode-box .verifycode{padding-right:100px;}
.verifyCodeImg{
    position: absolute;
    right: 0;
    width: 4rem;
    height: 2rem;
}

body{
	background:#03b8d0;
}
.writeBox,footer{
	padding:0 30px;
	overflow: hidden;
}
footer{
	margin-top:2rem;
}
.ptips{
	color:#f9fdff;
	text-align:center;
	margin: 1rem;
}
.logo{
	width:10rem;
	height:3.6rem;
	background:url(<?= Yii::getAlias('@asseturl'); ?>/merchant/shop/m/img/logo.png) center center no-repeat;
	background-size:contain;
    margin: 0 auto;
}
/*公用提示*/
.ui-tips { position: absolute; left: 0; right: 0; bottom: 80px; z-index: 1000; text-align: center; }
.ui-tips span { background: rgba(0,0,0,0.7); color: #FFF; font-size: 16px; border-radius: 20px; padding: 10px 20px; line-height: 1; }
.forget-pwd {
	display: block;
	margin:    0 auto;
	margin-top: 5rem;
	width: 80px;
	font-size: 16px;
	text-align: center;
	color: #fff;
	text-decoration: none;
-webkit-tap-highlight-color: rgba(0,0,0,0);
}
</style> 