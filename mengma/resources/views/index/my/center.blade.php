<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>流年呐伤的旅行足迹-穷游网</title>
    <base href="{{URL::asset('/')}}">
    @include('index.public.style')
    <script>
        window.QYER = {
            uid:[0][0]|0
        };
        window.__qRequire__ = {
            version: '1473155922',
            combineCSS: []
        };
    </script>

    <link rel="stylesheet" href="index/css/base_css.aa34ca3be0292dcb3c11fca7f3fc3fdf.css" />
    <link rel="stylesheet" href="index/css/footprint_css.878afd772e5ce9a92acd643e8fd8690f.css" />

    <script src="index/Scripts/base_js.0ad9dd885d23fc7dc5c97d4710989559.js"></script>
    <script src="index/Scripts/footprint_js.9a2f5209c65cc32fae9041c74b26d654.js"></script>
</head>
<body>

<script>window.QYER={uid:[0][0]||0};</script>
<link href="index/css/headerfoot_black.min-b9b248b9e55e7c6d0d4563ef311d9f73.css"  rel="stylesheet" />
<script src="index/Scripts/headerfoot_black.min-e0b0f90a51b948628c849d2fa239d0e5.js" async="async"></script>


@include('index.public.header')
<!--token:d41d8cd98f00b204e9800998ecf8427e--><!--头部 -->
<div class="u_headbar">
    <div class="infos">
        <!--用户图像 -->
        <div class="face"><a href="http://www.qyer.com/u/8384004"><img src="{{$uimg}}" /></a></div>
        <!--用户名字 -->
        <h3 class="name">
            <strong data-bn-ipg="usercenter-username" class="fontYaHei">{{$uname}}</strong>
        </h3>
        <!--用户信息 -->
        <div class="text fontSong">
            等级：<a data-bn-ipg="usercenter-grade" href="http://www.qyer.com/u/8384004/level" class="fb cBlue pr20">新进弟子</a>
        </div>

    </div>
    <!--个人中心导航 -->
    <div class="menu clearfix">
        <ul class="fontSong">
            <li data-bn-ipg="usercenter-tab-home" ><a href="http://www.qyer.com/u/8384004" class="a_list">首页</a></li>
            <li data-bn-ipg="usercenter-tab-footprint"  class="current">
                <a href="http://www.qyer.com/u/8384004/footprint" class="a_list">足迹与点评</a>
            </li>
            <li data-bn-ipg="usercenter-tab-thread"  ><a href="{{URL('index/resetpass')}}" class="a_list">邀请注册</a></li>
            <li data-bn-ipg="usercenter-tab-thread"  ><a href="http://www.qyer.com/u/8384004/travel" class="a_list">帖子</a></li>
            <li data-bn-ipg="usercenter-tab-album" ><a href="http://www.qyer.com/pictrip/8384004/" class="a_list">照片</a></li>
            <li data-bn-ipg="usercenter-tab-ask" ><a href="http://www.qyer.com/u/8384004/ask" class="a_list">问答</a></li>
            <li data-bn-ipg="usercenter-tab-plan" ><a href="http://www.qyer.com/u/8384004/plan" class="a_list">行程计划</a></li>
            <li data-bn-ipg="usercenter-tab-order" ><a href="http://www.qyer.com/u/lm-order/" class="a_list">最世界订单</a></li>
            <li class="more_select">
                <a href="javascript:void(0);" class="a_list"><span>更多</span></a>
                <div class="more_item">
                    <a data-bn-ipg="usercenter-tab-footprint" href="http://www.qyer.com/u/8384004/mguide">微锦囊</a>
                    <!-- <a data-bn-ipg="usercenter-tab-medal"  href="http://www.qyer.com/u/8384004/badgegalary">勋章</a> -->
                </div>
            </li>
        </ul>
        <a data-bn-ipg="usercenter-profile" href="http://www.qyer.com/u/8384004/profile" class="data">个人资料</a>
    </div>
</div>
<!--头部 -->

<script>
    /**
     * 认证头像图标tip
     */
    $(function (){
        if (typeof requirejs !== 'undefined'){
            requirejs(['web_old_tooltips'], function (){
                $('[data-toggle="tooltip"]').tooltip({
                    container: 'body'
                });
            });
        }
    });
</script>
<!--头部 -->
<!--用户中心 点评模块 -->
<div class="u_spoor_cnt clearfix">
    <!--点评侧边栏 -->
    <div class="u_spoor_bar">
        <!--点评数量统计 -->
        <div class="u_spoor_number">
            <span class="tag none_line"><strong>2</strong>国家</span>
            <span class="tag"><strong>2</strong>城市</span>
            <span class="tag"><strong>0</strong>点评</span>
        </div>
    </div>
    <!--点评内容 -->
    <div class="u_spoor_main">
        <!--国家列表 -->
        <div class="u_spoor_country">
            <div class="title">
                <div class="tag fontYaHei">
                    <a href="javascript:void(0);" class="current">TA的足迹</a>
                    <a href="http://www.qyer.com/u/8384004/place-comment">TA的点评</a>
                    <a href="http://www.qyer.com/u/8384004/hotel-comment">TA的酒店点评</a>
                </div>
            </div>
            <div class="lists">
                <div class="items clearfix">
                    <strong class="text">TA去过的国家（0）：</strong>
                    <p>
                        <a href="http://www.qyer.com/u/8384004/footprint" class="current"><strong>全部</strong></a>
                    </p>
                </div>
            </div>
        </div>
        <!--分隔线 -->
        <div class="border1 mt15"></div>
        <!--国家分类列表 -->
        <div class="u_spoor_country_list u_spoor_country_list_ta">
            <div class="u_spoor_country_item">
                <div class="title clearfix">
                    <strong class="fontYaHei">阿富汗<span>Afghanistan</span></strong>
                </div>
                <div class="list clearfix">
                    <div class="item">
                        <div class="alink">
                            <div class="img">
                                <a href="http://www.qyer.com/u/8384004/city-bamiyan-6345">
                                    <img src="index/Picture/180ffee871184e8a9b450bf1e6eaae07.gif" width="213" height="185" alt="" />
                                    <span class="bg"></span>
                                </a>
                            </div>
                            <div class="name">
                                <a href="http://place.qyer.com/bamiyan/" target="_blank"><strong class="fontYaHei">巴米扬</strong><span>Bamiyan</span></a>
                            </div>
                            <div class="no_common fontYaHei">
                                Ta还没有在这里留下足迹
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border1 mt20"></div>
            <div class="u_spoor_country_item">
                <div class="title clearfix">
                    <strong class="fontYaHei">中国<span>China</span></strong>
                </div>
                <div class="list clearfix">
                    <div class="item">
                        <div class="alink">
                            <div class="img">
                                <a href="http://www.qyer.com/u/8384004/city-hong-kong-50">
                                    <img src="index/Picture/0963c89633f74247a6c6a10369a8bef3.gif" width="213" height="185" alt="" />
                                    <span class="bg"></span>
                                </a>
                            </div>
                            <div class="name">
                                <a href="http://place.qyer.com/hong-kong/" target="_blank"><strong class="fontYaHei">香港</strong><span>Hong Kong</span></a>
                            </div>
                            <div class="number fontYaHei">
                                去过<a href="http://www.qyer.com/u/8384004/city-hong-kong-50" class="cBlue">2</a>景点<span>|</span>发表<a href="http://www.qyer.com/u/8384004/place-comment" class="cGreen">0</a>点评
                            </div>
                            <div class="content">
                                <a href="http://www.qyer.com/u/8384004/city-hong-kong-50" class="fontSong">查看全部 &gt;&gt;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border1 mt20"></div>
        </div>
    </div>
</div>
<script>
    $(function (){
        function conHeight($obj){
            $obj.css('min-height', $(window).height() - 391);
        }
        conHeight($('.u_spoor_cnt'));
        $(window).resize(function (){
            conHeight($('.u_spoor_cnt'));
        });
    })
</script>
<!--用户中心 点评模块 -->
<div style="display: none;"></div>
<div class="qyer_footer">
    <div class="topline"></div>
    <div class="content">
        <p class="nav">
            <a href="http://www.qyer.com/htmlpages/about.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-1">穷游简介</a>
            <a href="http://www.qyer.com/partner/" target="_blank" rel="nofollow" data-bn-ipg="foot-about-3">合作伙伴</a>
            <a href="http://www.qyer.com/job/" target="_blank" rel="nofollow" data-bn-ipg="foot-join-1">加入我们</a>
            <a href="http://site.qyer.com/tyro/" target="_blank" rel="nofollow" data-bn-ipg="foot-help-1">新手上路</a>
            <a href="http://bbs.qyer.com/forum-10-1.html" target="_blank" rel="nofollow" data-bn-ipg="foot-help-2">使用帮助</a>
            <a href="http://www.qyer.com/sitemap.html" target="_blank" data-bn-ipg="foot-help-4">网站地图</a>
            <a href="http://www.qyer.com/htmlpages/member.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-1">会员条款</a>
            <a href="http://www.qyer.com/htmlpages/bbsguide.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-2">社区指南</a>
            <a href="http://www.qyer.com/htmlpages/copyright.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-3">版权声明</a>
            <a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" rel="nofollow" data-bn-ipg="foot-clause-4">免责声明</a>
            <a href="http://www.qyer.com/htmlpages/contact.html" target="_blank" rel="nofollow" data-bn-ipg="foot-about-2">联系我们</a>
        </p>
        <p class="info">2004-2016 &copy; 穷游网&reg;  qyer.com All rights reserved. Version v5.57  京ICP备12003524号  京公网安备11010102001935号  京ICP证140673号</p>

        <!--友情链接模块-->

    </div>
</div>


<script type="text/javascript">

    var _gaq = _gaq || [];

    _gaq.push(["_setAccount", "UA-185023-1"]);
    _gaq.push(["_setDomainName", "qyer.com"]);
    _gaq.push(["_setSiteSpeedSampleRate",10]);
    _gaq.push(["_addIgnoredRef", "qyer.com"]);
    _gaq.push(["_addOrganic","soso","w"]);
    _gaq.push(["_addOrganic","sogou","query"]);
    _gaq.push(["_addOrganic","baidu","word"]);
    _gaq.push(["_addOrganic","baidu","q1"]);
    _gaq.push(["_addOrganic","baidu","q2"]);
    _gaq.push(["_addOrganic","m.baidu","word"]);
    _gaq.push(["_addOrganic","so.360","q"]);
    _gaq.push(["_addOrganic","so","q"]);
    _gaq.push(["_addOrganic","baidu","w"]);
    _gaq.push(["_addOrganic","cn.bing","q"]);
    _gaq.push(["_addOrganic","sm","q"]);
    _gaq.push(["_trackPageview"]);

    var _qyer_userid = "0";

    (function() {

        var qt = document.createElement("script"); qt.type = "text/javascript"; qt.async = true;

        qt.src = "http://qt.qyer.com/beacon.js";

        var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;

//ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
        ga.src = "http://api.qyer.com/js/ga";


//if("https:" == document.location.protocol){
//    var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga, s);
//}else{
        var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(qt, s); s.parentNode.insertBefore(ga, s);
//}

    })();

</script>



</body>
</html>