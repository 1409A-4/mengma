<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>城市玩乐- 猛犸旅途</title>

    <base href="{{URL::asset('/')}}"/>
@include('index.public.style')

    <link rel="stylesheet" type="text/css" href="index/css/frame.css">
    <link rel="stylesheet" type="text/css" href="index/css/list.3b37c88be53a388564c74ec23cb3ac9e.css">
    <script src="index/Scripts/frame.7b5234669cb5c059cbf32d35ed7ea565.js"></script>
    {{--<script src="index/Scripts/list.bc4aafc9427659efb1b3a12d76631e48.js"></script>--}}
@include('index.public.style')
    <!--[if lte IE 8]>
    <script src="index/Scripts/respond.min.js"></script>
    <![endif]-->
</head>

<body class="">

@include('index.public.header')


<script>window.QYER={uid:[0][0]||0};</script>





<link href="index/css/headerfoot_black.min.css"  rel="stylesheet" />
{{--
<script src="index/Scripts/headerfoot_black.min.js" async="async"></script>
--}}


        <!-- 面包屑 start -->
<div class="zw-module-crumb clearfix">
    <ul class="crumb-ul">
        <li class="crumb-cell">全部结果</li>
        <li class="crumb-cell crumb-arrow">></li>
        <li class="crumb-cell condition">
            <span class="condition-key">目的地</span>
            <span class="condition-selected">中国内地</span>
            <a class="cancel-link" href="play">
                <i class="zwui-iconfont icon-x"></i>
            </a>
        </li>
        <li class="crumb-cell condition">
            <span class="condition-key">玩乐类目</span>
            <span class="condition-selected">一日游/多日游</span>
            <a class="cancel-link" href="http://z.qyer.com/all_0_0_11_0_159_0_0/?_channel=cityfun&_type=channel">
                <i class="zwui-iconfont icon-x"></i>
            </a>
        </li>
        <li class="crumb-cell condition-clear"><a href="play">清空条件</a></li>
    </ul>
</div>

<!-- 面包屑 end -->
<div style="margin-top:20px;">


    <!-- 筛选nav start -->
    <ul id="anchor-filtrate-nav" name="anchor-filtrate-nav" class="zw-module-filtrate-nav clearfix">

        <li class="filtrate-nav-cell ">
            <i class="filtrate-nav-inner-border"></i>
            <div class="filtrate-nav-inner-wrap">
                <a class="filtrate-nav-cell-inner" href="http://z.qyer.com/all_0_0_11_0_158_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-tab1-package">
                    <i class="filtrate-nav-inner-ico zwui-iconfont icon-flight"></i>
                    <span class="filtrate-nav-inner-text">机酒自由行</span>
                </a>
            </div>
        </li>

        <li class="filtrate-nav-cell active">
            <i class="filtrate-nav-inner-border"></i>
            <div class="filtrate-nav-inner-wrap">
                <a class="filtrate-nav-cell-inner" href="play" data-bn-ipg="zsj-tab2-local">
                    <i class="filtrate-nav-inner-ico zwui-iconfont icon-local"></i>
                    <span class="filtrate-nav-inner-text">城市玩乐</span>
                </a>
            </div>
        </li>

        <li class="filtrate-nav-cell ">
            <i class="filtrate-nav-inner-border"></i>
            <div class="filtrate-nav-inner-wrap">
                <a class="filtrate-nav-cell-inner" href="http://z.qyer.com/all_0_0_11_0_172_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-tab2-localgroup">
                    <i class="filtrate-nav-inner-ico zwui-iconfont icon-localgroup"></i>
                    <span class="filtrate-nav-inner-text">当地参团</span>
                </a>
            </div>
        </li>

        <li class="filtrate-nav-cell ">
            <i class="filtrate-nav-inner-border"></i>
            <div class="filtrate-nav-inner-wrap">
                <a class="filtrate-nav-cell-inner" href="http://z.qyer.com/all_0_0_11_0_149_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-tab3-visa">
                    <i class="filtrate-nav-inner-ico zwui-iconfont icon-visa"></i>
                    <span class="filtrate-nav-inner-text">签证</span>
                </a>
            </div>
        </li>

        <li class="filtrate-nav-cell ">
            <i class="filtrate-nav-inner-border"></i>
            <div class="filtrate-nav-inner-wrap">
                <a class="filtrate-nav-cell-inner" href="http://z.qyer.com/all_0_0_11_0_163_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-tab4-wifi">
                    <i class="filtrate-nav-inner-ico zwui-iconfont icon-wifi-reverse"></i>
                    <span class="filtrate-nav-inner-text">WiFi/电话卡</span>
                </a>
            </div>
        </li>


    </ul>
    <!-- 筛选nav end -->


    <!-- 筛选条件开始 -->
    <div id="anchor_filtrate" name="anchor_filtrate" class="zw-module-filtrate-condition">

        <div class="condition-line  clearfix" data-lmtype="目的地">
            <div class="condition-title">目的地</div>
            <div class="condition-wrap clearfix">
                <div class="condition-all">
                    <a class="condition-btn-link" href="play?reg_id=null" data-bn-ipg="zsj-filter-目的地全部">全部</a>
                </div>
                <div class="condition-list-wrap fade-transition">
                    <ul class="condition-list clearfix">
                       @foreach($data['country'] as $c)
                        <li class="condition-list-cell">
                            <a class="@if(session('reg')==$c['reg_id'])condition-btn-link  active @else condition-btn-link @endif" href="play?reg_id={{$c['reg_id']}}" data-bn-ipg="zsj-filter-中国">{{$c['reg_name']}}</a>
                        </li>
                        @endforeach
                        <li class="condition-list-cell">
                            <a class="condition-btn-link" href="http://z.qyer.com/all_0_0_215_0_159,162_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-filter-泰国">泰国</a>
                        </li>




                    </ul>

                </div>
                <div class="slide-btn"><span class="slide-btn-text">更多</span><i class="slide-btn-ico zwui-iconfont icon-more2"></i></div>
            </div>
        </div>

        <div class="condition-line auto-more clearfix" data-lmtype="玩乐类目">
            <div class="condition-title">玩乐类目</div>
            <div class="condition-wrap clearfix">
                <div class="condition-all">
                    <a class="condition-btn-link " href="play?g_id=null" data-bn-ipg="zsj-filter-玩乐类目全部">全部</a>
                </div>
                <div class="condition-list-wrap fade-transition">
                    <ul class="condition-list clearfix">
                        @foreach($type as $t)
                        <li class="condition-list-cell">
                            <a class="@if(session('g')==$t['g_id']) condition-btn-link active @else condition-btn-link @endif " href="play?reg_id={{Session('reg')}}&g_id={{$t['g_id']}}" data-bn-ipg="zsj-filter-一日游/多日游">{{$t['g_name']}}</a>
                        </li>
                        @endforeach


                    </ul>
                </div>
                <div class="slide-btn"><span class="slide-btn-text">更多</span><i class="slide-btn-ico zwui-iconfont icon-more2"></i></div>
            </div>
        </div>


    </div>
    <!-- 筛选条件end -->

</div>

<!-- 排序列表 -->
<div class="zw-module-sortnav-wrap ">
    <ul class="zw-module-sortnav-btnList">
        <li id="sort_default" class="cur">
            <a href="http://z.qyer.com/all_0_0_11_0_159,162_0_0/?_channel=cityfun&_type=channel" data-bn-ipg="zsj-sort-综合排序">综合排序</a>
        </li>
        <li id="sort_sales" class="">
            <a href="http://z.qyer.com/all_0_0_11_0_159,162_0_0/?lsort=sales&_channel=cityfun&_type=channel" data-bn-ipg="zsj-sort-销量">销量<i class="zwui-iconfont icon-down"></i></a>
        </li>


        <li id="sort_price" class="">
            <a href="http://z.qyer.com/all_0_0_11_0_159,162_0_0/?lsort=price_asc&_channel=cityfun&_type=channel" data-bn-ipg="zsj-sort-价格">价格<i class="zwui-iconfont icon-up"></i></a>
        </li>



        <li>
            <a class="for_sort_today_new" href="http://z.qyer.com/all_0_0_11_0_159,162_0_0/?sort_today_new=1&_channel=cityfun&_type=channel" data-bn-ipg="zsj-sort-今日新品"></a>
            <input type="checkbox" name="sort_today_new" id="sort_today_new" class="today-new-checkbox"  value=""/>
            <label class="cus-checkbox" for="sort_today_new"></label>
            <span class="today-new-text">今日新品</span>
        </li>
        <li>
            <a class="for-sort-link" href="http://z.qyer.com/all_0_0_11_0_159,162_0_0/?sort_tomorrow=1&_channel=cityfun&_type=channel" data-bn-ipg="zsj-sort-可订明日"></a>
            <input type="checkbox" name="sort_tomorrow" id="sort_tomorrow" class="sort-link-checkbox"  value=""/>
            <label class="cus-checkbox" for="sort_tomorrow"></label>
            <span class="sort-link-text dacu">可订明日</span>
        </li>


        <!-- <li> -->
        <!-- <a class="for-sort-link" href="" data-bn-ipg="zsj-sort-818大促"></a> -->
        <!-- <a class="for-sort-link" href="" data-bn-ipg="zsj-sort-818大促"></a> -->
        <!-- <input type="checkbox" name="sort_dacu" id="sort_dacu" class="sort-link-checkbox" checked value=""/> -->
        <!-- <label class="cus-checkbox" for="sort_dacu"></label> -->
        <!-- <span class="sort-link-text dacu">818大促</span> -->
        <!-- </li> -->

    </ul>
    <!-- <form class="zw-module-sortnav-searchform" action="/zworld.php/index/list"> -->
    <!-- <div class="zw-module-sortnav-search"> -->

    <!-- <input type="hidden" name="_channel" value="cityfun"> -->

    <!-- <input type="hidden" name="_type" value="channel"> -->

    <!-- <input type="hidden" name="tag" value="159,162"> -->

    <!-- <input type="hidden" name="ptype" value=""> -->


    <!-- <input type="hidden" name="dpt" value="0" /> -->
    <!-- <input type="hidden" name="country" value="11" /> -->
    <!-- <input type="hidden" name="city" value="0" /> -->
    <!-- <input type="hidden" name="date" value="0" /> -->

    <!-- <input id="zwsearch" class="search-text" type="text" value="" data-kw="" name="kw" placeholder="输入关键词"> -->
    <!-- <button id="zwSearchBtn" type="submit" class="search-btn" value=""><i class="zwui-iconfont icon-search-small"></i></button> -->
    <!-- </div> -->
    <!-- </form> -->
</div>
<!-- 排序列表 end -->




<!-- 小卡片区域 -->
<div class="zw-module-productlist-unit">
    <div class="zw-module-smallcard-wrap clearfix gai">

            <!-- 专题类小卡片区域 -->
            <!-- 产品类小卡片区域 -->
            @if($arr == null)
                <div class="zw-module-searchnull-wrap">
                    <span class="zw-module-searchnull-ico"></span>
                <p class="zw-module-searchnull-text ">Sorry !  没有找到相关结果，看看其他的推荐哟~</p>
            </div>
            @else
                <ul class="zw-module-smallcard-list clearfix">
            @foreach($arr as $v)
            <li>
                <a href="infor?pro_id={{$v['pro_id']}}" target="_blank" title="【奇妙新体验】台湾宜兰龟山岛登岛+出海赏鲸体验" data-bn-ipg="zsj-pos1-lm65749" data-ra_arg="88c6155d80756be7df69eaeaf8e149bdd3618aef44d63d41d305e32c6c866a75|65749">
                    <img class="zw-module-smallcard-itemimg" src="{{$v['pro_img']}}" data-original="http://pic4.qyer.com/public/supplier/jd/2016/01/28/14539682571406/275x185" width="275" height="185" title="" alt="">
                    <div class="zw-module-smallcard-mask">
                        <div class="zw-module-smallcard-mask-inner clearfix">
                            <div class="smallcard-mask-title">日游体验 | 台湾</div>

                            <div class="zw-module-smallcard-mask-inner-right">
                                <div class="zw-module-smallcard-sold">
                                    <p class="sold"><span>已售</span><span class="num">{{$v['pro_num']}}</span><span>件</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>{{$v['pro_name']}}</h2>
                    <div class="zw-module-smallcard-infobar smallcard clearfix ">
                        <p class="zw-module-smallcard-price"><em>{{$v['pro_price']}}</em>元起</p>
                    </div>
                </a>
            </li>
            @endforeach


                </ul>
        @endif


    </div>
    <div class="zw-page-wrap clearfix"><div class="ui_page"><a data-bn-ipg="pages-3" data-ra_arg="ra_null|1" data-page="1" href="/all_0_0_11_0_159_0_0/?_channel=cityfun&_type=channel" class='ui_page_item ui_page_item_current'>1</a>
            <a data-bn-ipg="pages-3" data-ra_arg="ra_null|2" data-page="2" href="/all_0_0_11_0_159_0_0/page2/?_channel=cityfun&_type=channel" class='ui_page_item'>2</a>
            <a data-bn-ipg="pages-3" data-ra_arg="ra_null|3" data-page="3" href="/all_0_0_11_0_159_0_0/page3/?_channel=cityfun&_type=channel" class='ui_page_item'>3</a>
            <a data-bn-ipg="pages-3" data-ra_arg="ra_null|4" data-page="4" href="/all_0_0_11_0_159_0_0/page4/?_channel=cityfun&_type=channel" class='ui_page_item'>4</a>
            <a data-bn-ipg="pages-3" data-ra_arg="ra_null|5" data-page="5" href="/all_0_0_11_0_159_0_0/page5/?_channel=cityfun&_type=channel" class='ui_page_item'>5</a>
            <a data-bn-ipg="pages-5" data-ra_arg="ra_null|2" data-page="2" href="/all_0_0_11_0_159_0_0/page2/?_channel=cityfun&_type=channel" class='ui_page_item ui_page_next' title="下一页">下一页</a>
        </div></div>
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
<style>

    .destinationCss{background: #12af7e;;font-color: #FFFFFF;color: #fff}
</style>
<script type="text/javascript">
    var _adwq = _adwq || [];
    _adwq.push(['_setAccount', 'ycsd9']);
    _adwq.push(['_setDomainName', '.qyer.com']);
    _adwq.push(['_trackPageview']);
    (function() {
        var adw = document.createElement('script');
        adw.type = 'text/javascript';
        adw.async = true;
        adw.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://s') + '.emarbox.com/js/adw.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(adw, s);
    })();

    /*
    *  点击目的地
    */

   function splic(rid) {
       if(rid !== 0)
           $('.condition-list-cell').click(function(){
               $(this).addClass('destinationCss').siblings().removeClass('destinationCss');
               var a = $(this).val();

           });
        var g_id = $('.group').val();
       alert(g_id);
     $.get('play',{reg_id:rid,g_id:g_id},function (msg) {

     });
       location.href="play?id="+rid;
   }

/*    function group(reg_id) {
       alert(reg_id);
        location.href="play?reg_id="+reg_id;
    }*/

</script>



<!-- 公共尾部 -->
@include('index.public.foot')
<!-- 公共尾部 end -->








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






