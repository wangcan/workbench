<?php
$cssFiles = ['common/css/webcommon', 'rabbithouse/webrabbit/web/mycss/index'];
$this->params['cssStr'] = $this->render('@gallerycms/views/mself/_css', ['cssFiles' => $cssFiles]);
//$jsFiles = ['jquery', 'common'];
//$this->params['jsStr'] = $this->render('../_js-aboutus', ['jsFiles' => $jsFiles]);
?>

<header class="header clearfloat">
<div class="header_top">
    <div class="toptext containerSmall">
        <!--<em>|</em>-->
        <a class="active" href="#">北京</a>
        <span class="top_phone fontcolor"> 7*24小时免费直拨 400-8032-163
            <span class="top_time">（服务时间：8：00~21：00）</span>
        </span>
        <i></i>
    </div>
</div>
<div class="containerSmall">
    <div class="logo clearfloat">
        <div class="logo_left lf"></div>
        <div class="logo_img"></div>
        <div class="logo_center lf">
            <div class="logo_select  lf">
                <span id="logo_text" class="logo_text">
                    <i>装修公司</i>
                    <em class="icon_arrows"></em>
                </span>
                <ul class="logo_list">
                    <li><a>装修公司</a></li>
                    <li><a>装修问答</a></li>
                </ul>
            </div>
            <input class="logo_input lf " type="text" placeholder="挑选您心仪的装修公司"/>
            <input type="button" value="搜索" class="logo_search  lf">

        </div>
        <ul class="logo_right rt f12">
            <li class="lf">
                <a class="" href="#">
                    <i class="right_icon" style="background-position: -240px 0"></i>
                </a>
                <a href="#">装修公司</a>
            </li>
            <li class="lf">
                <a class="" href="#">
                    <i class="right_icon" style="background-position: -290px 0"></i>
                </a>
                <a href="#">装修问答</a>
            </li>
            <li class="lf">
                <a class="" href="#">
                    <i class="right_icon" style="background-position: -340px 0"></i>
                </a>
                <a href="#">装修报价</a>
            </li>

        </ul>
    </div>
</div>
<!--导航条-->
<div class="nav clearfloat">
    <ul class="containerSmall clearfloat">
        <li class="enter_key"><a class="cur" href="#">点击进入北京站>></a></li>
        <!--<li><a href="#">北京装修公司</a></li>-->
        <li><a href="#">效果图</a></li>
        <li><a href="#">装修问答</a></li>
        <li><a href="#">北京装修报价</a></li>
        <li><a href="#">北京工地直播</a></li>
    </ul>
</div>
</header>
<!--选择城市-->
<section class="containerSmall choose_city">
<!--热门城市-->
<div class="hot_city">
    <div class="title_city">热门城市</div>
    <div class="hot_citylist">
        <span><a href="" title="">北京</a></span>
        <span><a href="" title="">上海</a></span>
        <span><a href="" title="">广州</a></span>
        <span><a href="" title="">深圳</a></span>
        <span><a href="" title="">南京</a></span>
        <span><a href="" title="">苏州</a></span>
        <span><a href="" title="">杭州</a></span>

        <div>共开通了 <i>250</i>个城市站</div>
    </div>
</div>
<!--快速查找-->
<div class="fast_search">
    <div class="title_city">快速查找</div>
    <select id="pro" onchange="selectc(this);"></select>
    <select id="city"></select>
    <a href="javascript:;">进入</a>
    <!--<a type="text" value=""/>-->
</div>
<!--拼音查找城市-->
<div class="letter_search">
    <div class="title_city">按拼音首字母选择</div>
    <div class="letter_list">
        <a data_letter="a" href="javascript:;">A</a>
        <a data_letter="b" href="javascript:;">B</a>
        <a data_letter="c" href="javascript:;">C</a>
        <a data_letter="d" href="javascript:;">D</a>
        <a data_letter="e" href="javascript:;">E</a>
        <a data_letter="f" href="javascript:;">F</a>
        <a data_letter="g" href="javascript:;">G</a>
        <a data_letter="h" href="javascript:;">H</a>
        <a data_letter="i" href="javascript:;">I</a>
        <a data_letter="j" href="javascript:;">J</a>
        <a data_letter="k" href="javascript:;">K</a>
        <a data_letter="l" href="javascript:;">L</a>
        <a data_letter="m" href="javascript:;">M</a>
        <a data_letter="n" href="javascript:;">N</a>
        <a data_letter="o" href="javascript:;">O</a>
        <a data_letter="p" href="javascript:;">P</a>
        <a data_letter="q" href="javascript:;">Q</a>
        <a data_letter="r" href="javascript:;">R</a>
        <a data_letter="s" href="javascript:;">S</a>
        <a data_letter="t" href="javascript:;">T</a>
        <a data_letter="u" href="javascript:;">U</a>
        <a data_letter="v" href="javascript:;">V</a>
        <a data_letter="w" href="javascript:;">W</a>
        <a data_letter="x" href="javascript:;">X</a>
        <a data_letter="y" href="javascript:;">Y</a>
        <a data_letter="z" href="javascript:;">Z</a>
    </div>
</div>
<div class="city_box">
    <!--华北地区-->
    <div class="city_area">
        <div class="title_city">华北地区</div>
        <div class="city_dt">
            <span><a data_letter="b" href="#">北京</a></span>
            <span><a data_letter="t" href="#">天津</a></span>
            <a data_letter="s" href="#">沈阳</a>
            <a data_letter="d" href="#">大连</a>
            <a data_letter="s" href="#">石家庄</a>
            <a data_letter="t" href="#">唐山</a>
            <a data_letter="l" href="#">廊坊</a>
            <a data_letter="a" href="#">鞍山</a>
            <a data_letter="d" href="#">大庆</a>
            <a data_letter="h" href="#">哈尔滨</a>
            <a data_letter="c" href="#">长春</a>
            <a data_letter="q" href="#">秦皇岛</a>
            <a data_letter="w" href="#">乌兰察布</a>
            <a data_letter="t" href="#">铁岭</a>
            <a data_letter="b" href="#">保定</a>
            <a data_letter="z" href="#">张家口</a>
            <a data_letter="h" href="#">邯郸</a>
            <a data_letter="c" href="#">沧州</a>
            <a data_letter="j" href="#">吉林</a>
            <a data_letter="j" href="#">锦州</a>
            <a data_letter="x" href="#">邢台</a>
            <a data_letter="c" href="#">朝阳</a>
            <a data_letter="m" href="#">牡丹江</a>
            <a data_letter="x" href="#">锡林郭勒盟</a>
        </div>
    </div>
    <!--华东地区-->
    <div class="city_area">
        <div class="title_city">华东地区</div>
        <div class="city_dt">
            <span><a data_letter="s" href="#">上海</a></span>
            <span><a data_letter="n" href="#">南京</a></span>
            <span><a data_letter="h" href="#">杭州</a></span>
            <a data_letter="f" href="#">福州</a>
            <a data_letter="s" href="#">苏州</a>
            <a data_letter="c" href="#">常熟</a>
            <a data_letter="j" href="#">济南</a>
            <a data_letter="w" href="#">无锡</a>
            <a data_letter="q" href="#">青岛</a>
            <a data_letter="n" href="#">宁波</a>
            <a data_letter="w" href="#">温州</a>
            <a data_letter="y" href="#">义务</a>
            <a data_letter="w" href="#">潍坊</a>
            <a data_letter="j" href="#">济宁</a>
            <a data_letter="y" href="#">烟台</a>
            <a data_letter="n" href="#">南通</a>
            <a data_letter="c" href="#">常州</a>
            <a data_letter="t" href="#">台州</a>
            <a data_letter="j" href="#">嘉兴</a>
            <a data_letter="j" href="#">金华</a>
            <a data_letter="n" href="#">南昌</a>
            <a data_letter="g" href="#">赣州</a>
            <a data_letter="l" href="#">连云港</a>
            <a data_letter="k" href="#">昆山</a>
            <a data_letter="s" href="#">宿迁</a>
            <a data_letter="y" href="#">扬州</a>
            <a data_letter="z" href="#">镇江</a>
            <a data_letter="q" href="#">衢州</a>
            <a data_letter="h" href="#">湖州</a>
            <a data_letter="z" href="#">舟山</a>
            <a data_letter="s" href="#">绍兴</a>
            <a data_letter="w" href="#">芜湖</a>
            <a data_letter="j" href="#">九江</a>
            <a data_letter="y" href="#">盐城</a>
            <a data_letter="s" href="#">宿州</a>
            <a data_letter="h" href="#">黄山</a>
            <a data_letter="j" href="#">江阴</a>
            <a data_letter="z" href="#">漳州</a>
            <a data_letter="z" href="#">淄博</a>
            <a data_letter="l" href="#">临沂</a>
            <a data_letter="a" href="#">安庆</a>
            <a data_letter="t" href="#">泰州</a>
            <a data_letter="h" href="#">菏泽</a>
            <a data_letter="z" href="#">枣庄</a>
            <a data_letter="l" href="#">丽水</a>
            <a data_letter="y" href="#">鹰潭</a>
            <a data_letter="w" href="#">威海</a>
            <a data_letter="d" href="#">东营</a>
            <a data_letter="l" href="#">龙岩</a>
            <a data_letter="y" href="#">宜春</a>
            <a data_letter="b" href="#">滨州</a>
            <a data_letter="l" href="#">聊城</a>
            <a data_letter="t" href="#">泰安</a>
            <a data_letter="f" href="#">抚州</a>
            <a data_letter="j" href="#">吉安</a>
            <a data_letter="j" href="#">景德镇</a>
        </div>
    </div>
    <!--华南地区-->
    <div class="city_area">
        <div class="title_city">华南地区</div>
        <div class="city_dt">
            <span><a data_letter="h" href="#">广州</a></span>
            <span><a data_letter="s" href="#">深圳</a></span>
            <a data_letter="d" href="#">东莞</a>
            <a data_letter="f" href="#">佛山</a>
            <a data_letter="h" href="#">惠州</a>
            <a data_letter="s" href="#">三亚</a>
            <a data_letter="z" href="#">中山</a>
            <a data_letter="s" href="#">汕头</a>
            <a data_letter="q" href="#">清远</a>
            <a data_letter="j" href="#">江门</a>
            <a data_letter="z" href="#">肇庆</a>
            <a data_letter="n" href="#">南宁</a>
            <a data_letter="l" href="#">柳州</a>
            <a data_letter="x" href="#">厦门</a>
            <a data_letter="h" href="#">海口</a>
            <a data_letter="b" href="#">北海</a>
            <a data_letter="g" href="#">桂林</a>
            <a data_letter="y" href="#">阳江</a>
            <a data_letter="b" href="#">毕节</a>
            <a data_letter="n" href="#">宁德</a>
            <a data_letter="y" href="#">云浮</a>
            <a data_letter="z" href="#">湛江</a>
            <a data_letter="s" href="#">韶关</a>
            <a data_letter="b" href="#">百色</a>
            <a data_letter="m" href="#">茂名</a>
            <a data_letter="j" href="#">揭阳</a>
            <a data_letter="f" href="#">防城港</a>
            <a data_letter="w" href="#">梧州</a>
            <a data_letter="y" href="#">玉林</a>
            <a data_letter="h" href="#">河池</a>
            <a data_letter="q" href="#">琼海</a>
            <a data_letter="n" href="#">南平</a>
        </div>
    </div>
    <!--中西部地区-->
    <div class="city_area">
        <div class="title_city">中西部地区</div>
        <div class="city_dt">
            <span><a data_letter="c" href="#">重庆</a></span>
            <span><a data_letter="x" href="#">西安</a></span>
            <a data_letter="w" href="#">武汉</a>
            <span><a data_letter="c" href="#">成都</a></span>
            <a data_letter="k" href="#">昆明</a>
            <span><a data_letter="h" href="#">合肥</a></span>
            <a data_letter="l" href="#">兰州</a>
            <a data_letter="t" href="#">太原</a>
            <a data_letter="g" href="#">贵阳</a>
            <span><a data_letter="c" href="#">长沙</a></span>
            <a data_letter="h" href="#">呼和浩特</a>
            <a data_letter="w" href="#">乌鲁木齐</a>
            <a data_letter="z" href="#">郑州</a>
            <a data_letter="y" href="#">银川</a>
            <a data_letter="n" href="#">南阳</a>
            <a data_letter="l" href="#">洛阳</a>
            <a data_letter="j" href="#">焦作</a>
            <a data_letter="l" href="#">泸州</a>
            <a data_letter="z" href="#">自贡</a>
            <a data_letter="d" href="#">德阳</a>
            <a data_letter="m" href="#">绵阳</a>
            <a data_letter="y" href="#">榆林</a>
            <a data_letter="y" href="#">宜昌</a>
            <a data_letter="x" href="#">咸阳</a>
            <a data_letter="k" href="#">凯里</a>
            <a data_letter="z" href="#">株洲</a>
            <a data_letter="k" href="#">开封</a>
            <a data_letter="x" href="#">信阳</a>
            <a data_letter="z" href="#">遵义</a>
            <a data_letter="s" href="#">十堰</a>
            <a data_letter="x" href="#">襄阳</a>
            <a data_letter="x" href="#">湘潭</a>
            <a data_letter="y" href="#">岳阳</a>
            <a data_letter="h" href="#">衡阳</a>
            <a data_letter="c" href="#">滁州</a>
            <a data_letter="x" href="#">新乡</a>
            <a data_letter="h" href="#">淮南</a>
            <a data_letter="l" href="#">六盘水</a>
            <a data_letter="h" href="#">汉中</a>
            <a data_letter="q" href="#">曲靖</a>
            <a data_letter="f" href="#">阜阳</a>
            <a data_letter="l" href="#">六安</a>
            <a data_letter="b" href="#">蚌埠</a>
            <a data_letter="c" href="#">常德</a>
            <a data_letter="x" href="#">西宁</a>
            <a data_letter="m" href="#">眉山</a>
            <a data_letter="h" href="#">黄石</a>
            <a data_letter="b" href="#">宝鸡</a>
            <a data_letter="t" href="#">铜仁</a>
            <a data_letter="p" href="#">普洱</a>
            <a data_letter="b" href="#">保山</a>
            <a data_letter="x" href="#">孝感</a>
            <a data_letter="d" href="#">大同</a>
            <a data_letter="y" href="#">益阳</a>
            <a data_letter="c" href="#">郴州</a>
            <a data_letter="h" href="#">怀化</a>
            <a data_letter="l" href="#">娄底</a>
            <a data_letter="s" href="#">邵阳</a>
            <a data_letter="z" href="#">张家界</a>
            <a data_letter="x" href="#">咸宁</a>
            <a data_letter="s" href="#">三门峡</a>
            <a data_letter="h" href="#">黄冈</a>
            <a data_letter="z" href="#">周口</a>
            <a data_letter="s" href="#">商丘</a>
            <a data_letter="n" href="#">南充</a>
            <a data_letter="p" href="#">平顶山</a>
            <a data_letter="c" href="#">赤峰</a>
            <a data_letter="y" href="#">宜宾</a>
            <a data_letter="j" href="#">晋中</a>
            <a data_letter="s" href="#">遂宁</a>
            <a data_letter="p" href="#">濮阳</a>
            <a data_letter="m" href="#">马鞍山</a>
            <a data_letter="x" href="#">许昌</a>
            <a data_letter="h" href="#">毫州</a>
            <a data_letter="y" href="#">运城</a>
            <a data_letter="z" href="#">驻马店</a>
            <a data_letter="j" href="#">荆州</a>
            <a data_letter="y" href="#">玉溪</a>
            <a data_letter="l" href="#">乐山</a>
            <a data_letter="a" href="#">安顺</a>
            <a data_letter="n" href="#">内江</a>
            <a data_letter="l" href="#">陇南</a>
            <a data_letter="w" href="#">渭南</a>
            <a data_letter="a" href="#">安康</a>
            <a data_letter="e" href="#">鄂州</a>
            <a data_letter="l" href="#">漯河</a>
            <a data_letter="d" href="#">大理</a>
            <a data_letter="c" href="#">楚雄</a>
            <a data_letter="h" href="#">呼伦贝尔</a>
            <a data_letter="x" href="#">西双版纳</a>
        </div>
    </div>
</div>
</section>
<!--家居装修装饰设计-->
<div class="decoration containerSmall">
<div class="most_title">
    <div class="title_share">
        <a href="">更多>></a>
        <!--<a href="">1</a>-->
        <!--<a href="">2</a>-->
        <!--<a href="">3</a>-->
        <!--<a href="">4</a>-->
        <!--<a href="">5</a>-->
        <!--<a href="">6</a>-->
    </div>
    <strong>家居装修装饰设计</strong>
    <!--<a class="update_num" href="">每日不断更新 <i>580</i> 张家居效果图</a>-->
</div>
<div class="deco_content">
    <div class="info_list mt20">
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a> |
        <a href="">吊顶装修效果图</a>
    </div>
    <div class="info_img">
        <!--图片展示-->
        <ul>
            <li></li>
        </ul>
    </div>
    <!--申请切换-->
    <div class="deco_tab containerSmall">
        <div class="tab_title">
            <ul>
                <li class="tab_cur">
                    <em></em>
                    免费户型设计1

                </li>
                <li>
                    <em></em>
                    免费户型设计2

                </li>
                <li>
                    <em></em>
                    免费户型设计3

                </li>
                <li>
                    <em></em>
                    免费户型设计4

                </li>
                <li>
                    <em></em>
                    免费户型设计5

                </li>
            </ul>
        </div>
        <div class="tab_main clearfloat">
            <div class="tab_center cur clearfloat">
                <p class="some_text">
                    <span>1份报价比较，选择最合理的装修报价</span>
                    <span>免费比报价，仔细对比更实惠！</span>
                </p>

                <form class="info_sub clearfloat">
                    <div class="form_ele">
                        <input class="input_type userName" type="text" placeholder="请输入您的姓名"/>

                        <p style="color:red;" class="error_name"></p>
                    </div>
                    <div class="form_ele">
                        <input class="input_type phoneNum" type="text" placeholder="请输入您的手机号码"/>

                        <p style="color:red;" class="error_phone"></p>
                    </div>
                    <div class="form_ele">
                        <a class="info_btn" onclick="mobileCheck($(this),1)">立即申请</a>
                    </div>
                    <div class="form_ele">
                        <p class="apply_num">
                            已申请人数 <br/>
                            <span>14491332</span>
                        </p>
                    </div>
                </form>
            </div>
            <div class="tab_center  clearfloat">
                <p class="some_text">
                    <span>2份报价比较，选择最合理的装修报价</span>
                    <span>免费比报价，仔细对比更实惠！</span>
                </p>

                <form class="info_sub clearfloat">
                    <div class="form_ele">
                        <input class="input_type userName" type="text" placeholder="请输入您的姓名"/>

                        <p style="color:red;" class="error_name"></p>
                    </div>
                    <div class="form_ele">
                        <input class="input_type phoneNum" type="text" placeholder="请输入您的手机号码"/>

                        <p style="color:red;" class="error_phone"></p>
                    </div>
                    <div class="form_ele">
                        <a class="info_btn" onclick="mobileCheck($(this),2)">立即申请</a>
                    </div>
                    <div class="form_ele">
                        <p class="apply_num">
                            已申请人数 <br/>
                            <span>14491332</span>
                        </p>
                    </div>
                </form>
            </div>
            <div class="tab_center clearfloat">
                <p class="some_text">
                    <span>3份报价比较，选择最合理的装修报价</span>
                    <span>免费比报价，仔细对比更实惠！</span>
                </p>

                <form class="info_sub clearfloat">
                    <div class="form_ele">
                        <input class="input_type userName" type="text" placeholder="请输入您的姓名"/>

                        <p style="color:red;" class="error_name"></p>
                    </div>
                    <div class="form_ele">
                        <input class="input_type phoneNum" type="text" placeholder="请输入您的手机号码"/>

                        <p style="color:red;" class="error_phone"></p>
                    </div>
                    <div class="form_ele">
                        <a class="info_btn" onclick="mobileCheck($(this),3)">立即申请</a>
                    </div>
                    <div class="form_ele">
                        <p class="apply_num">
                            已申请人数 <br/>
                            <span>14491332</span>
                        </p>
                    </div>
                </form>
            </div>
            <div class="tab_center  clearfloat">
                <p class="some_text">
                    <span>4份报价比较，选择最合理的装修报价</span>
                    <span>免费比报价，仔细对比更实惠！</span>
                </p>

                <form class="info_sub clearfloat">
                    <div class="form_ele">
                        <input class="input_type userName" type="text" placeholder="请输入您的姓名"/>

                        <p style="color:red;" class="error_name"></p>
                    </div>
                    <div class="form_ele">
                        <input class="input_type phoneNum" type="text" placeholder="请输入您的手机号码"/>

                        <p style="color:red;" class="error_phone"></p>
                    </div>
                    <div class="form_ele">
                        <a class="info_btn" onclick="mobileCheck($(this),4)">立即申请</a>
                    </div>
                    <div class="form_ele">
                        <p class="apply_num">
                            已申请人数 <br/>
                            <span>14491332</span>
                        </p>
                    </div>
                </form>
            </div>
            <div class="tab_center clearfloat">
                <p class="some_text">
                    <span>5份报价比较，选择最合理的装修报价</span>
                    <span>免费比报价，仔细对比更实惠！</span>
                </p>

                <form class="info_sub clearfloat">
                    <div class="form_ele">
                        <input class="input_type userName" type="text" placeholder="请输入您的姓名"/>

                        <p style="color:red;" class="error_name"></p>
                    </div>
                    <div class="form_ele">
                        <input class="input_type phoneNum" type="text" placeholder="请输入您的手机号码"/>

                        <p style="color:red;" class="error_phone"></p>
                    </div>
                    <div class="form_ele">
                        <a class="info_btn" onclick="mobileCheck($(this),5)">立即申请</a>
                    </div>
                    <div class="form_ele">
                        <p class="apply_num">
                            已申请人数 <br/>
                            <span>14491332</span>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
<!--最流行的装修风格-->
<div class="fashion_style containerSmall">
<div class="most_title">
    <div class="title_share">
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图</a>
        <a href=""> 更多>></a>
    </div>
    <strong>最流行的装饰风格</strong>
    <!--<a class="update_num" href="">每日不断更新 <i>580</i> 张家居效果图</a>-->
</div>
<ul class="style_list clearfloat">
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="javascript:;">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>

</ul>
</div>
<!--家庭装修注意事项-->
<div class="fashion_style containerSmall">
<div class="most_title">
    <div class="title_share">
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图 |</a>
        <a href="">现代简约装修效果图</a>
        <a href=""> 更多>></a>
    </div>
    <strong>家庭装修注意事项</strong>
    <!--<a class="update_num" href="">每日不断更新 <i>580</i> 张家居效果图</a>-->
</div>
<ul class="style_list clearfloat">
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
         <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
         <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
         <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
         <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
         <em class="bgc_mask"></em>
    </li>
    <li>
        <a href="">
            <img src="../images/de_list01.jpg" alt="现代简约风格"/>
        </a>
        <span>现代简约风格</span>
        <em class="bgc_mask"></em>
    </li>

</ul>
</div>
<!--底部新闻-->
<div class="news_list containerSmall">
<dl>
    <dt>
        <a href="">
            <i class="zb_icon"></i>
            最新招标
        </a>
    </dt>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
</dl>
<dl class="cWhite">
    <dt>
        <a href="">
            <i class="zb_icon"></i>
            最新招标
        </a>
    </dt>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
</dl>
<dl>
    <dt>
        <a href="">
            <i class="zb_icon"></i>
            最新招标
        </a>
    </dt>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
    <dd>
        <a href="">杭州市拱墅区大家运河之星住宅公寓装修</a>
        <span>2017-01-04</span>
    </dd>
</dl>
</div>
<!--底部链接-->
<div class="news_link containerSmall clearfloat">
<div class="link_left lf">
    <ul class="link_tab">
        <li class="on">
            <a href="javascript:;">友情链接</a>
        </li>
    </ul>
    <div class="link_content">
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
        <a href="">11111</a>
    </div>
    <a class="link_join" href="javascript:;">
        友链合作>
    </a>
</div>
<div class="link_center lf ">
    <p>关于我们</p>
    <img src="../images/about_01.png" alt=""/>
</div>
<div class="link_right rt">
    <p>关于我们</p>
    <img src="../images/about_01.png" alt=""/>
</div>
</div>
<!--footer-->
<footer class="footer">
<p>
    <a href="#">关于我们</a> |
    <a href="#">友情链接</a> |
    <a href="#">意见反馈</a> |
    <a href="#">联系我们</a> |
    <a href="#">法律声明</a> |
</p>

<p>免责声明：本网站部分内容由用户自行上传，如权利人发现存在误传其作品情形，请及时与本站联系。</p>

<p>© copyright 2017 北京维纳亚科技有限公司</p>

<p>兔班长装修网 <a href="">京ICP备17003882号</a></p>

<p>联系电话： <a href="tel:400-8032-163">400-8032-163</a></p>
</footer>
<script src="../../../common/js/jquery-1.11.3.min.js"></script>
<script src="../web/myjs/mainFunction.js"></script>
<script src="../web/myjs/city.js"></script>
<script>
$(function(){
    main();  //头部选择类型切换
    submitPage();//手机信息tab 标签切换
    $('.tab_title li').mouseover(function () {
        var index = $(this).index();
        $(this).addClass("tab_cur").siblings("li").removeClass("tab_cur");
        $('.tab_main .tab_center').removeClass("cur").eq(index).addClass("cur");
    })
    $('.style_list li').mouseover(function () {
        $(this).children('em').removeClass("cur");
        $(this).siblings("li").children('em').addClass("cur");
    })
    $('.style_list li').mouseout(function () {
        $('.style_list li em').removeClass("cur");

    })

    function mobileCheck($obj, num) {
        var $form = $obj.closest("form");
        var uname = "", phone = "";
        var regPhone = /^1[3578]\d{9}$/;
        function errCheck() {
            uname = $.trim($form.find('.userName').val());
            phone = $.trim($form.find('.phoneNum').val());
            if (uname == '') {
                $form.find('.error_name').text('* 请输入您的姓名');
                return false;
            } else {
                $form.find('.error_name').text('');
            }
            if (phone == '') {
                $form.find('.error_phone').text('* 手机号不能为空');
                return false;
            }
            if (!regPhone.test(phone)) {
                console.log(1111);
                $form.find('.error_phone').text('* 请输入正确的手机号');
                return false;
            } else {
                $form.find('.error_phone').text('');
            }
            $.ajax({
                success: function () {
                    console.log('success');
                }
            })
        }

        switch (num) {
            case 1:
                errCheck();
                break;
            case 2:
                errCheck();
                break;
            case 3:
                errCheck();
                break;
            case 4:
                errCheck();
                break;
            case 5:
                errCheck();
                break;
        }
    }


})

</script>
