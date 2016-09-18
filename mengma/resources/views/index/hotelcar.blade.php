<!DOCTYPE HTML>
<head>
    <title>自由行</title>
    <base href="{{URL::asset('/')}}"/>
    <link rel="stylesheet" type="text/css" href="css/hotel_car1.css">
    <script src="js/frame.hotel_car1.js"></script>
    <script src="js/respond.min.js"></script>
    @include('index.public.style')
</head>
<!---start-header---->
@include('index.public.header')

<head>





















    <!--[if lte IE 8]>

    <![endif]-->
</head>

<body class="">











<!--token:d41d8cd98f00b204e9800998ecf8427e-->

<!-- 公共头部 -->

<!-- 公共头部 end -->




<!--gulp_combine_model_start-->
<!-- 头图 -->
<div class="zw-module-banner-wrap" style="background-image:url('images/be.png')">
    <ul class="zw-module-banner-imglist clearfix">
        <li class="banner-img-cell">
            <a class="banner-img-cell-link" href="http://z.qyer.com/zt/sbgg0601/?campaign=pdbanner&category=sbgg0601" target="_blank" data-bn-ipg="zsj-banner-pos1" style="background-image:url('images/be.png')"></a>
        </li>
    </ul>
</div>
<!-- 头图 end -->










<!-- 大卡片区域 -->
<div class="zw-module-productlist-unit freetour">
    <div class="zw-module-bigcard-wrap clearfix">
        @foreach($data as $da)
        <div class="zw-module-bigcard-item ">
            <a href="hotelCarin?p_id={{ $da['p_id'] }}"  data-bn-ipg="zsj-pos1-pic-lm79807">
                <img class="zw-module-bigcard-itemimg" src="{{ $da['p_img'] }}" data-original="images/420x280.jpg" width="356" height="240" title="" alt="">
            </a>
            <div class="zw-module-bigcard-iteminfo clearfix ">
                <div class="infotype-wrap">
                    <span class="zw-module-bigcard-infotype">自由行</span>
                    <i class="zwui-iconfont icon-local2"></i>
                    <span class="zw-module-bigcard-infoplace">{{ $da['p_name'] }}</span>
                    <div class="zw-module-bigcard-infonum"><span>67505</span>次浏览<span>199</span>件已售</div>
                </div>
                <div class="zw-module-bigcard-tag-wrap">
                    <div class="zw-module-bigcard-h2ul-wrap">
                        <h2>
                            <a href="hotelCarin?p_id={{ $da['p_id'] }}" title="{{ $da['p_abstract'] }}">{{ $da['p_abstract'] }}</a>
                        </h2>
                        <ul class="zw-module-bigcard-flightproperty clearfix">
                        </ul>
                    </div>
                    <ul class="zw-module-bigcard-servicetag clearfix">
                        <li>赠接送机</li>
                    </ul>
                    <div class="zw-module-bigcard-price"><span class="line">3299元</span><em>{{ $da['p_price'] }}</em>元起</div>
                </div>
                <div class="zw-module-bigcard-bottombar">
                    <div class="zw-module-bigcard-datebar">旅行时间：&nbsp;{{ $da['p_time'] }}</div>
                    <a class="zw-module-bigcard-btn" href="hotelCarin?p_id={{ $da['p_id'] }}">立即预订</a>
                </div>
            </div>
        </div>
       @endforeach
    </div>



</div>




<!-- 通用dock 开始 -->
<div class="zw-module-dock-wrap">
    <div class="zw-module-dock-comm clearfix">
        <ul class="dock-nav"></ul>
    </div>
</div>
<!-- 通用dock end -->

<!-- 右侧浮动 -->
<div class="zw-module-sidefloater-wrap">
    <!-- <a class="zw-module-sidefloater-cell personalcenter" title="" data-bn-ipg="zsj-ucenter">
        <i class="zwui-iconfont icon-PersonalCenter"></i>
    </a> -->
    <a class="zw-module-sidefloater-cell myorder" href="http://www.qyer.com/u/lm-order" title="" target="_blank" data-bn-ipg="zsj-myorder">
        <i class="zwui-iconfont icon-order"></i>
        <div class="sidefloater-cell-text">
            <p class="sidefloater-cell-text-inner">
                <span>我的</span>
                <span>订单</span>
            </p>
        </div>
    </a>
    <a class="zw-module-sidefloater-cell collect" href="http://www.qyer.com/u/lastmin" title="" target="_blank" data-bn-ipg="zsj-fav">
        <i class="zwui-iconfont icon-Collect"></i>
        <div class="sidefloater-cell-text">
            <p class="sidefloater-cell-text-inner">
                <span>我的</span>
                <span>收藏</span>
            </p>
        </div>
    </a>
    <div id="gototop" class="zw-module-sidefloater-cell totop" data-bn-ipg="zsj-top">
        <i class="zwui-iconfont icon-top"></i>
    </div>
</div>
<!-- 右侧浮动 end -->
<!--gulp_combine_model_end-->













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



@include('index.public.foot')
</body>
</html>

