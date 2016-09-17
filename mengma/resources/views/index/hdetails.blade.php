<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> 酒店详情页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <base href="{{URL::asset('\/')}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="index/css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link rel="stylesheet" href="index/css/responsiveslides.css">
    <script src="index/js/jquery.min.js"></script>
    <script src="index/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 2500,
                speed: 600
            });
        });
    </script>
<body id="hotel_detail_page" class="w1200 index1200">
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="{{url('/')}}"><img src="index/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                <li class="active"><a href="{{url('/')}}" class="act">首页</a></li>
                <li><a href="{{URL('booking')}}" class="act">机票</a></li>
                <li><a href="{{url('hotel')}}" class="act">酒店</a></li>
                <li><a href="plans.html" class="act"> 景区</a></li>
                <li><a href="plans.html" class="act">注册</a></li>
                <li><a href="plans.html" class="act">登录</a></li>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!-- 捕获js错误 -->
<script type="text/javascript" src="index/hotel_info_files/error_catch.js" crossorigin=""></script>

<!-- start content -->
<link type="text/css" rel="stylesheet" href="index/hotel_info_files/hotel_scroll.css"><!-- 主体样式 -->
<div id="wrap" class="wrap clearfix">
    <div id="container" class="container">

        <div id="content" class="content clearfix">
            <div class="h1_info_head">
                <div class="hotel-hd clearfix">

                    <div class="hotel-info fl">

                        <div class="nameAndIcon J_nameAndIcon">
                            <h1><span title="上海东锦江希尔顿逸林酒店" class="name" id="hotelName">上海东锦江希尔顿逸林酒店</span>
                                 <span style="display:inline-block" class="hotel_stars" title="国家旅游局评定为五星级">
                                      <i class="five"></i>
                                    </span>
                            </h1>
                        </div>
                        <div class="addressInfo">
                            <span id="hotelAddress" title="浦东新区杨高南路889号，近浦建路">
                                <span class="address">
                                    浦东新区杨高南路889号，近浦建路</span>
                            </span>

                                                        <span id="hotelArround" class="surroundingLandmarks">
                                【<span>浦东新国际博览中心</span>】
                            </span>
                        </div>
                    </div>
                </div>

                <div class="hotel_none none J_hotelNone"></div>
                <div class="hotel_images J_hotelImages">
                    @foreach($res as $key =>$v)
                    <div class="a1 J_Width" style="margin-left: 5px;">
                        <div style="width: 21600px; left: 0px;" class="c1" id="hotelImagesSlide"><div class="slide"><img src="front/hotelstyle/{{$v['gimg']}}" alt="酒店" data-type="appearance"></div></div>
                    </div>
                    @endforeach
            </div>

            <!--酒店图片 点击“共X张图片”时的弹出层-->
            <div class="hotel-mask none" id="mainLayout"></div>
            <div class="hotel-gallery-wrap none" id="hotelPhotoDialog">
                <div class="close-btn" id="closeHotelPhotoDialog"></div>
                <div class="hotel-gallery-main">
                    <div class="hotel-gallery-content J_hgcWidth">
                        <div id="hotelPhotoSlide" class="gallery" style="left:0;">
                        </div>
                        <div class="prev-area">
                            <div class="prev-btn icon-prev" id="hotelPhotoPrev"></div>
                        </div>
                        <div class="next-area ">
                            <div class="next-btn icon-next" id="hotelPhotoNext"></div>
                        </div>
                    </div>
                    <div class="hotel-gallery-footer none">外观</div>
                </div>
            </div>

            <!-- 主体部分 -->
            <div id="main" class="main">
                <div class="h1_info_body">
                    <!--TAB-->
                    <div style="width: 938px; position: relative; top: 0px; z-index: 1000;" id="details" class="details tntab_tit clearfix">
                        <ul id="mainTab">
                            <li class="cur" id="0">
                                <a href="javascript:void(0);">
                                    <span style="font-weight: normal;">房型价格</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="clearfix">
                        <!-- 房型价格-->
                        <div class="hotel_price_loading none" id="hotelPriceLoading">
                            <div class="loading_img"></div>
                            <div class="loading_text">
                                请稍等，途牛正在为您实时查询。
                            </div>
                        </div>
                        <div class="hotel_price clearfix" id="hotelPrice">
                            <div class="hotel_price_loading none" id="hotelPriceBodyLoading">
                                <div class="loading_img"></div>
                                <div class="loading_text">
                                    请稍等，途牛正在为您实时查询。
                                </div>
                            </div>
                            <div class="hotel_price_body" id="hotelPriceBody">
                                <input name="from_filters" value="{&quot;instantConfirm&quot;:null,&quot;promoting&quot;:null,&quot;hourRoom&quot;:null,&quot;isCashBackPrice&quot;:true,&quot;prePay&quot;:null,&quot;bedType&quot;:false,&quot;breakfast&quot;:false,&quot;network&quot;:false,&quot;cancel&quot;:false}" type="hidden">
                                <input name="back_filters" value="{&quot;instantConfirm&quot;:true,&quot;promoting&quot;:true,&quot;hasCash&quot;:true,&quot;prePay&quot;:true,&quot;bedType&quot;:{&quot;0&quot;:&quot;\u53cc\u5e8a&quot;,&quot;2&quot;:&quot;\u5927\u5e8a&quot;,&quot;4&quot;:&quot;\u5355\u4eba\u5e8a&quot;},&quot;breakfast&quot;:{&quot;0&quot;:&quot;\u5355\u65e9&quot;,&quot;1&quot;:&quot;\u53cc\u65e9&quot;,&quot;21&quot;:&quot;\u65e0\u65e9&quot;},&quot;cancel&quot;:{&quot;1&quot;:&quot;\u9650\u65f6\u53d6\u6d88&quot;},&quot;network&quot;:[&quot;\u514d\u8d39\u6709\u7ebf\u5bbd\u5e26&quot;,&quot;\u514d\u8d39\u5bbd\u5e26&quot;]}" type="hidden">
                                <input name="startPrice" value="1076" type="hidden">

                                <!-- 早餐前台显示需要数据转换 -->
                                <!-- HotelRoom Price List Title -->
                                <!--- /*有搜索条件导致房间为空即$emptyFilter=1时推荐默认房型,否则显示筛选项及房型--->


                                <!--- /*房间为非空时且不是房满,才显示筛选项及房型--->
                                <div class="hotel_price_title">
                                    <span class="s1 fleft">房型</span>
                                    <div class="filterStyle bedStyle">
                                        <div class="Style_title J-btn">
                                            <span class="Style_name" id="bedType_name" data="">床型</span>
                                        </div>
                                    </div>

                                    <div class="filterStyle breakfastStyle">
                                        <div class="Style_title J-btn">
                                            <span class="Style_name" id="breakfast_name" data="">早餐</span>

                                        </div>
                                    </div>

                                    <div class="filterStyle networkStyle">
                                        <div class="Style_title J-btn">
                                            <span class="Style_name" id="network_name" data="">宽带</span>
                                        </div>
                                    </div>


                                    <div class="filterStyle cancelStyle">
                                        <div class="Style_title J-btn">
                                            <span class="Style_name" id="cancel_name" data="">取消政策</span>
                                        </div>

                                    </div>
                                    <span class="s6 fleft">日均价<span class="hint" style="color: #9a9c9b;">（含服务费）</span></span>
                                </div>
                                <!--房型列表 list-->
                                <div style="z-index: 6; position: relative;" class="hotel_price_list clearfix J_hotelPriceList" data-index="0">
                                    <form method="post" id="form_2" action="{{URL('hpayment')}}">
                                    <div class="fleft s1" id="openHotelInfo0">
                                        <div style="float:left;width:60px;">
                                            <a href="javascript:void(0);">
                                                <img class="hotelPic" src="hotel_info_files/Cii9EFZl7MeIWgv0AADHTpEDPSwAAA4YwGqcvMAAMdm973_w450_h300_c1_.jpg" data-bigpic="http://m.tuniucdn.com/fb2/t1/G1/M00/4B/77/Cii9EFZl7MeIWgv0AADHTpEDPSwAAA4YwGqcvMAAMdm973_w450_h300_c1_t0.jpg" alt="<?php echo $arr['ht_name'] ?>">
                                            </a>
                                        </div>
                                        <div class="nameDetail">
                                            <p class="name">{{$arr['ht_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="fleft s2">
                                        <div style="z-index: 97; position: relative;" class="item">
                                            <div class="m1 fleft">
                                                <span title="_当天16:00前预订 双早(自助餐)">_当天16:00前预订 双早(自助餐)</span>
                                                <!--促销、礼物 、及时确认-->
                                                <div class="instant-confirmation ibk"><i class="icon icon-instant-confirmation" title="下单后即时确认订单"></i></div>
                                                <div class="promotion ibk"><i class="icon icon-promotion" title=""></i></div>
                                            </div>
                                            <div class="m2 fleft">
                                                <span>大/双</span>
                                            </div>
                                            <div class="m3 fleft">
                                                <span>双早</span>
                                            </div>
                                            <div class="m4 fleft">
                                                <span><a class="" href="javascript:void(0)">无</a></span>
                                                <div class="tip">
                                                    <div class="big-up-arrow"></div>
                                                    <div class="small-up-arrow"></div>
                                                    无                        </div>
                                            </div>
                                            <div class="m5 fleft">
                                                <span><a href="javascript:void(0);">不可取消</a></span>
                                            </div>

                                            <!--日均价-->
                                            <div class="m6 fleft">
                                                <!--返现前-->
                                                <!--返现后-->
                            <span class="J_backAfterPrice">
                                <span class="after_price">
                                <span class="price">
                                    <span class="unit">¥</span>
                                    <span class="digit" data-vendorid="30826" data-hastaxorservicefee="">{{$arr['h_price']}}</span>
                                    <input class="hide" name="priceCalendar" type="text"></span>
                                </span>
                            </span>
                                            </div>

                                            <!--操作列-->
                                            <div class="m7 fleft">
                                                <input type="hidden" name="id" value="{{$arr['h_id']}}" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a class="book-btn" onClick="document.getElementById('form_2').submit()">开始预订</a>
                                            </div>
                                            <!--担保、预付-->
                                            <div class="m8 fleft">
                                                <div class="tip">
                                                    <div class="big-up-arrow"></div>
                                                    <div class="small-up-arrow"></div>
                                                    入住前需要预先支付房款
                                                </div>
                                            </div>

                                            <div class="m9 fleft"><span>少量</span></div>
                                        </div>

                                    </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                        <!-- 酒店温馨提示-->

                        <!-- 酒店介绍-->
                        <div class="hotel_introduction" id="hotelIntroduction">
                            <div class="hotel_introduction_title">
                                <h2 class="a1">
                                    <span class="hotel_bg">



                                    </span>
                                </h2>
                            </div>
                            <div class="hotel_introduction_body">
                                <!--酒店简介-->
                                <div class="d1" style=""><span class="ml20">酒店简介</span></div>
                                <!--酒店标签-->
                                <div class="e1 ml20">
                                    <span>休闲度假</span>
                                </div>
                                <div class="e2 clearfix">
                                    <p>{{$arr['h_details']}}</p>
                                </div>

                                <!--酒店政策-->
                                <div class="d4">
                                    <span class="ml20">酒店政策</span>
                                </div>
                                <div class="e10 ml20 clearfix">
                                    <span class="f1 fleft">入住和离店：</span>
                                                <span class="ml10 fleft cwidth">
                                            入住时间：14:00以后      离店时间：12:00以前                                            </span>
                                </div>


                                <div class="e10 ml20 clearfix">
                                    <span class="f1 fleft">取消政策：</span>
                                                <span class="ml10 fleft cwidth">
                                            不同类型的客房附带不同的取消预订和预先付费政策
选择上述客房时，请参阅“客房政策”                                            </span>
                                </div>


                                <div class="e10 ml20 clearfix">
                                    <span class="f1 fleft">入住手续：</span>
                                                <span class="ml10 fleft cwidth">

入住时需要出示政府核发的身份证件(带照片)。请携带信用卡和现金用以支付押金或额外费用。
               </span>
                                </div>


                                <div class="e10 ml20 clearfix">
                                    <span class="f1 fleft">携带宠物：</span>
                                                <span class="ml10 fleft cwidth">
                                            不可携带宠物。                                            </span>
                                </div>



                                <div class="e10 ml20 clearfix">
                                    <span class="f1 fleft">信用卡：</span>
                                                <span class="ml10 fleft cwidth">
                                            <a class="visa" title="境外发行信用卡--威士（VISA）"></a><a class="UnionPay" title="国内发行银联卡"></a><a class="MasterCard" title="境外发行信用卡--万事达（Master）"></a><a class="AmericanExpress" title="境外发行信用卡--运通（AMEX）"></a><a class="DinersClub" title="境外发行信用卡--大莱（Diners Club）"></a>                                            </span>
                                </div>

                                <!--酒店设施服务-->
                                <div class="d2"><span class="ml20">设施服务</span></div>
                                <div class="e3 ml20">
                                    <span class="f1">基本信息：</span>
                                    <span class="ml10">2001年开业　　房间数：850间房　　电话号码：021-50504888</span>
                                </div>

                                <div class="e4 ml20 clearfix">
                                    <span class="f1" style="float: left;">酒店特色：</span>
                                    <span class="ml10" style="float: left;width: 800px;font-size: 12px;line-height: 24px;">4组酒店位于北京教育区，北京著名的北大、清华附近，紧邻创业区;，距2010世博园区仅咫尺之遥，轻松即达磁悬浮列车。</span>
                                </div>

                                <!--网络设施 停车服务-->

                                <div class="e6 ml20 clearfix">
                                    <span class="f1">停车服务：</span>
                                    <span class="ml10">免费停车场</span>
                                </div>

                                <!--酒店设施-->
                                <div class="e7 clearfix" style="padding-left: 20px;">
                                    <div class="fleft f1">酒店设施：</div>
                                    <div class="fleft ml10 clearfix">
                                        <div class="clearfix">
                                            <div class="fleft g1">餐饮设施：</div>
                                            <div class="fleft spanave">
                                                <div><span>中餐厅</span><span>西餐厅</span><span>咖啡厅</span><span></span></div>                                                </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="fleft g1">会议设施：</div>
                                            <div class="fleft spanave">
                                                <div><span>会议厅</span><span>商务中心</span><span></span><span></span></div>                                                </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="fleft g1">服务项目：</div>
                                            <div class="fleft spanave">
                                                <div><span>外币兑换服务</span><span>票务服务</span><span>洗衣服务</span><span>限时送餐服务</span></div><div><span>残疾人客房</span><span>商场</span><span>出租车</span><span>邮政服务</span></div><div><span>雨伞</span><span>前台贵重物品保险柜</span><span>专职行李员</span><span>行李存放服务</span></div><div><span>叫醒服务</span><span>自动取款机</span><span>免费停车场</span><span>免费旅游交通图(可赠送)</span></div><div><span>接机服务</span><span>大堂吧</span><span>滚梯/电梯</span><span></span></div>                                                </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="fleft g1">房间设施：</div>
                                            <div class="fleft spanave">
                                                <div><span>国内长途电话</span><span>国际长途电话</span><span>拖鞋</span><span>独立写字台</span></div><div><span>浴室化妆放大镜</span><span>24小时热水</span><span>电热水壶</span><span>免费洗漱用品</span></div><div><span>免费瓶装水</span><span>迷你酒吧</span><span>熨斗/熨衣板</span><span>小冰箱</span></div><div><span>浴衣</span><span>多种规格电源插座</span><span>110V电压插座</span><span>浴缸</span></div><div><span>独立淋浴间</span><span>吹风机</span><span>保险箱</span><span>中央空调</span></div>                                                </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="fleft g1">娱乐与健身设施：</div>
                                            <div class="fleft spanave">
                                                <div><span>棋牌室</span><span>室内游泳池</span><span>网球场</span><span>健身室</span></div>                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!--酒店周边交通-->
                                <div class="d3">
                                    <span class="g1 ml20">酒店周边</span>
                                </div>
                                <div class="e8 ml20 clearfix">
                                    <span class="f1 fleft">餐饮：</span>
                                        <span class="fleft cwidth">
                                                                                    <label class="fl ml10 inb">晶水坊</label>
                                                                                    <label class="fl ml10 inb">上海东锦江希尔顿逸林酒店旋转餐厅</label>
                                                                                    <label class="fl ml10 inb">东锦江大酒店宴会厅</label>
                                                                                    <label class="fl ml10 inb">上海东锦江希尔顿逸林酒店(咖啡厅)</label>
                                                                                    <label class="fl ml10 inb">东锦江大酒店贵宾厅</label>
                                                                                    <label class="fl ml10 inb">Grand Cafe</label>
                                                                                    <label class="fl ml10 inb">Grand Cafe(杨高南路辅路)</label>
                                                                                    <label class="fl ml10 inb">东锦江法式旋转餐厅</label>
                                                                                </span>
                                </div>
                                <div class="e8 ml20 clearfix">
                                    <span class="f1 fleft">娱乐：</span>
                                        <span class="fleft cwidth">
                                                                                    <label class="fl ml10 inb">Grand Cafe</label>
                                                                                    <label class="fl ml10 inb">三重阁</label>
                                                                                    <label class="fl ml10 inb">东锦江酒店大堂吧</label>
                                                                                    <label class="fl ml10 inb">梦龙水宫</label>
                                                                                    <label class="fl ml10 inb">游乐园桌面游戏</label>
                                                                                    <label class="fl ml10 inb">New music bar</label>
                                                                                    <label class="fl ml10 inb">博艾馆</label>
                                                                                    <label class="fl ml10 inb">VENUS脱毛美甲美睫沙龙(塘桥店)</label>
                                                                                    <label class="fl ml10 inb">幽蓝足道</label>
                                                                                    <label class="fl ml10 inb">利亨</label>
                                                                                </span>
                                </div>
                                <div class="e8 ml20 clearfix">
                                    <span class="f1 fleft">购物：</span>
                                        <span class="fleft cwidth">
                                                                                    <label class="fl ml10 inb">上海雄风起重设备厂浦东销售部</label>
                                                                                    <label class="fl ml10 inb">上海大民篷帆厂办事处</label>
                                                                                    <label class="fl ml10 inb">上海大民蓬布有限公司办事处</label>
                                                                                    <label class="fl ml10 inb">新音符</label>
                                                                                    <label class="fl ml10 inb">小马水果</label>
                                                                                    <label class="fl ml10 inb">好德便利(东村店)</label>
                                                                                    <label class="fl ml10 inb">好德便利NO.696</label>
                                                                                    <label class="fl ml10 inb">esso</label>
                                                                                    <label class="fl ml10 inb">丹红烟酒商店</label>
                                                                                    <label class="fl ml10 inb">千岛湖五金</label>
                                                                                </span>
                                </div>
                                <div class="e8 ml20 clearfix">
                                    <span class="f1 fleft">地铁站：</span>
                                        <span class="fleft cwidth">
                                                                                    <label class="fl ml10 inb">蓝村路站</label>
                                                                                    <label class="fl ml10 inb">浦电路站</label>
                                                                                    <label class="fl ml10 inb">上海儿童医学中心站</label>
                                                                                    <label class="fl ml10 inb">塘桥站</label>
                                                                                    <label class="fl ml10 inb">世纪公园</label>
                                                                                </span>
                                </div>
                                <div class="e8 ml20 clearfix">
                                    <span class="f1 fleft">景点：</span>
                                        <span class="fleft cwidth">
                                                                                    <label class="fl ml10 inb">上海科技馆</label>
                                                                                    <label class="fl ml10 inb">世纪广场</label>
                                                                                </span>
                                </div>
                            </div>
                        </div>

                        <!-- 用户点评-->
                        <div class="hotel_user_comment clearfix" id="hotelUserComment">
                            <!-- img-->
                            <div class="u1" id="userCommentPic">
                                <!--<a href="javascript:void(0);"><img src="http://img.tuniucdn.com/img/201506011052/hotel_v4/user_comment.png" alt=""/></a>-->
                                <h2 class="a1">
                                    <span class="hotel_bg"></span>
                                </h2>
                            </div>

                            <!-- 住客点评 -->
                            <!--<link rel="stylesheet" href="http://img1.tuniucdn.com/s/201507082125/hotel_v4/remark.css" />-->
                            <div class="hotel_user_remark">
                                <div class="u2">
                                    <div class="k1">
                                        <div class="ml20 n1">综合评分：</div>
                                        <div><span class="ml20 n2">4.5</span><span class="n4">/5分</span></div>
                                        <div><span class="n3">294</span><span class="n5">条真实入住用户评价</span></div>
                                    </div>
                                    <div class="k3">
                                        <div class="label"><div class="name">服务评分</div><div class="score">4.5</div></div>
                                        <div class="label"><div class="name">位置评分</div><div class="score">4.4</div></div>
                                        <div class="label"><div class="name">设备设施</div><div class="score">4.4</div></div>
                                        <div class="label"><div class="name">卫生评分</div><div class="score">4.6</div></div>
                                    </div>
                                </div>

                                <div class="tradeoffConclude">
                                    <a href="##" class="concludeAll cur" data="0" data-count="294">全部&nbsp;(294)</a>
                                    <a href="##" class="concludeAll" data="1" data-count="165">满意&nbsp;(165)</a>            <a href="##" class="concludeAll" data="2" data-count="127">一般&nbsp;(127)</a>            <a href="##" class="concludeAll" data="3" data-count="2">不满意&nbsp;(2)</a>            <a href="##" class="concludeAll" data="4" data-count="4">有图&nbsp;(4)</a>            <a class="concludePoint" style="display:none;">
                                        <span class="pointName"></span>
                                        <span class="pointCount"></span>
                                    </a>
                                </div>
                                <input style="display: none;" name="remarkNum" value="294">
                                <input style="display: none;" name="hotelRemarkPages" value="15">
                                <input style="display: none;" name="satisfaction" value="4.5">
                                <div class="user_remark_datail">
                                    <div class="u5 clearfix">
                                        <div class="a1">
                                            <div class="b1">
                                                <a href="javascript:void(0);"><img class="avatar" src="hotel_info_files/user_pic_none.png" alt=""></a>
                                                <span class="member_level  member_level_5"></span>
                                            </div>
                                            <div class="b2">6823178600</div>
                                            <div class="b3">其他</div>
                                        </div>
                                        <div class="a2">
                                            <div class="b2">
                                                <p class="remark_words">
                                                    <span class="remark_overall_grade remark_overall_grade_2"></span>                                        <span class="remark_words_title">交通位置：满意</span><span class="remark_overall_grade"></span>                                        <span class="remark_words_title">环境卫生：满意</span><span class="remark_overall_grade"></span>                                        <span class="remark_words_title">设施设备：满意</span><span class="remark_overall_grade"></span>                                        <span class="remark_words_title">服务质量：满意</span>                                    </p>
                                                <p>泳池略小，其他服务很好</p>
                                            </div>
                                            <br>
                                            <div class="b3">
                                            </div>
                                            <div class="b4" style="margin-top: 15px;float: left;width: 100%;">
                                                <div style="float: left;color: #43b313;">来自4组App</div>
                                                <div style="float: right;">2016年09月12日 入住</div>
                                            </div>
                                        </div>
                                        <div class="a3">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="hotel_price_loading" id="hotelUserCommentBodyLoading" style="display:none">
                                <div class="loading_img"></div>
                                <div class="loading_text">
                                    请稍等，途牛正在为您实时查询。
                                </div>
                            </div>

                            <div class="pagination" style="margin-right: 0;">
                                <div class="page-bottom" id="remarksPage"><span class="page-start">上一页</span><span class="page-cur">1</span><a href="javascript:void(0)" onclick="remarkPagesObj.getRemarkData(2)">2</a><a href="javascript:void(0)" onclick="remarkPagesObj.getRemarkData(3)">3</a><span class="page-break">...</span><a href="javascript:void(0)" onclick="remarkPagesObj.getRemarkData(15)">15</a><a href="javascript:void(0)" onclick="remarkPagesObj.getRemarkData(2)" class="page-next">下一页</a></div>
                            </div>
                        </div>

                        <!--酒店图片-->
                        <div class="room_lists hotel_environment" id="hotelEnvironment">
                            <div class="u1">
                                <h2 class="a1">
                                    <span class="hotel_bg"></span>
                                </h2>
                            </div>
                            <ul class="room_type clearfix hotel-environment-tab" id="environmentTab">
                                <li><span class="sel_cur" id="all">所有(<em>48</em>)</span></li>
                                <li><span id="appearance">外观(<em>3</em>)</span></li>
                                <li><span id="indoorScene">内景(<em>6</em>)</span></li>
                                <li class="last"><span id="room">房间(<em>11</em>)</span></li>
                            </ul>
                            <div class="room_pic_list">
                                <ul class="room_pic clearfix" id="hotelPhotoPanel"><li><img src="hotel_info_files/Cii-TFeuRM6ILiErAACwO9XygVcAABKFQOGnPMAALBT539_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii-TFeuRM6IPzjtAADbdsO3ivAAABKFQOEAJ4AANuO303_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/2cc2bde92549b48862570e6986c9cb92_w450_h300_c1_t0.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii-T1euRM-IDqT1AAD7EQVFHqEAABKFQOIAEUAAPsp080_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii-T1euRM-IEmRjAADx7oTg6loAABKFQOKVJUAAPIG399_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii-T1euRM-IbsOdAACRrPwJGZMAABKFQOL4cQAAJHE957_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/29b75e527c8c7c6355cbe8168c25bdc1_w450_h300_c1_t0.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/64ba6206eaebaa861099c41feab6b1ba_w450_h300_c1_t0.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/ff07dab582dd15e1c78794996b0b99c8_w450_h300_c1_t0.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EFZKulqISVNBAADAhtZXE0oAAAOxAEQtcsAAMCe231_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EVZKulqIG57eAADltAhyr4IAAAOxAERdmkAAOXM447_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EFZl7MeIWgv0AADHTpEDPSwAAA4YwGqcvMAAMdm973_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EVZl7MeIEAm5AADC9E2sNIEAAA4YwHAiQYAAMMM610_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EVZl7MiIXR15AACmo9i4JfQAAA4YwHUW_EAAKa7487_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii9EVZl7MmIaObtAACbVgsqmu8AAA4YwJhZgwAAJtu128_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li><li><img src="hotel_info_files/Cii-T1fKtEuITf6-AADRyU9WhrcAACA_QMzTnsAANHh955_w450_h300_c1_.jpg" alt="上海东锦江希尔顿逸林酒店图片"></li></ul>
                            </div>
                            <div id="" class="pagination" style="margin-right: 0;">
                                <div class="page-bottom" id="imagesPage"><span class="page-start">上一页</span><span class="page-cur">1</span><a href="javascript:void(0)" onclick="PhotoPagesObj.imagePageData(2)">2</a><a href="javascript:void(0)" onclick="PhotoPagesObj.imagePageData(3)">3</a><a href="javascript:void(0)" onclick="PhotoPagesObj.imagePageData(2)" class="page-next">下一页</a></div>
                            </div>
                        </div>

                        <!--周边交通-->
                        <div class="box_test hotel_traffic" id="hotelTraffic">
                            <div class="u1">
                                <h2 class="a1">
                                    <span class="hotel_bg"></span>
                                </h2>
                            </div>
                            <div class="room_lists J_roomLists">
                                <ul id="trafficTab" class="room_type clearfix">
                                    <li><span id="hotelTraffic1" class="sel_cur">购物</span></li>
                                    <li><span id="hotelTraffic2" class="">餐饮</span></li>
                                    <li><span id="hotelTraffic3" class="">娱乐</span></li>
                                </ul>
                                <div class="room_pic_list spots_around " id="hotelTraffic1">
                                    <ul class="spot clearfix">
                                        <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">1、上海雄风起重设备厂浦东销售部</p>
                                                <p class="cl_2">距离酒店146米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">2、上海大民篷帆厂办事处</p>
                                                <p class="cl_2">距离酒店159米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">3、上海大民蓬布有限公司办事处</p>
                                                <p class="cl_2">距离酒店164米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">4、新音符</p>
                                                <p class="cl_2">距离酒店220米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">5、小马水果</p>
                                                <p class="cl_2">距离酒店222米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">6、好德便利(东村店)</p>
                                                <p class="cl_2">距离酒店247米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">7、好德便利NO.696</p>
                                                <p class="cl_2">距离酒店249米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">8、esso</p>
                                                <p class="cl_2">距离酒店271米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">9、丹红烟酒商店</p>
                                                <p class="cl_2">距离酒店275米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">10、千岛湖五金</p>
                                                <p class="cl_2">距离酒店286米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                        </ul>
                                </div>
                                <div class="room_pic_list spots_around none" id="hotelTraffic2">
                                    <ul class="spot clearfix">
                                        <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">1、晶水坊</p>
                                                <p class="cl_2">距离酒店0米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">2、上海东锦江希尔顿逸林酒店旋转餐厅</p>
                                                <p class="cl_2">距离酒店21米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">3、东锦江大酒店宴会厅</p>
                                                <p class="cl_2">距离酒店24米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">4、上海东锦江希尔顿逸林酒店(咖啡厅)</p>
                                                <p class="cl_2">距离酒店27米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">5、东锦江大酒店贵宾厅</p>
                                                <p class="cl_2">距离酒店27米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">6、Grand Cafe</p>
                                                <p class="cl_2">距离酒店34米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">7、Grand Cafe(杨高南路辅路)</p>
                                                <p class="cl_2">距离酒店34米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">8、东锦江法式旋转餐厅</p>
                                                <p class="cl_2">距离酒店34米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                        </ul>
                                </div>
                                <div class="room_pic_list spots_around none" id="hotelTraffic3">
                                    <ul class="spot clearfix">
                                        <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">1、Grand Cafe</p>
                                                <p class="cl_2">距离酒店32米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">2、三重阁</p>
                                                <p class="cl_2">距离酒店38米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">3、东锦江酒店大堂吧</p>
                                                <p class="cl_2">距离酒店38米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">4、梦龙水宫</p>
                                                <p class="cl_2">距离酒店68米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">5、游乐园桌面游戏</p>
                                                <p class="cl_2">距离酒店134米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">6、New music bar</p>
                                                <p class="cl_2">距离酒店163米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">7、博艾馆</p>
                                                <p class="cl_2">距离酒店166米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">8、VENUS脱毛美甲美睫沙龙(塘桥店)</p>
                                                <p class="cl_2">距离酒店170米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                            <li class="clearfix">                                            <dl class="clearfix spot_around  ">
                                                <dt>
                                                <p class="cl_1">9、幽蓝足道</p>
                                                <p class="cl_2">距离酒店170米</p>
                                                </dt>
                                            </dl>


                                            <dl class="clearfix spot_around spot_l ">
                                                <dt>
                                                <p class="cl_1">10、利亨</p>
                                                <p class="cl_2">距离酒店177米</p>
                                                </dt>
                                            </dl>
                                        </li>                                                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 主体部分 -->

        </div>
    </div>
</div>
<div id="city_keyword" class="city_keyword city_box" style="position: absolute; left: 467.5px; top: 477px; z-index: 1002; display: none;">
    <div class="close_btn" onclick="$.powerFloat.hide();">X</div>
    <div id="popCityLists"><ul class="popcitylist clearfix"><div class="dt">行政区</div><li data="2506" class="" title="长宁">长宁</li><li data="2503" class="" title="黄浦">黄浦</li><li data="2505" class="" title="徐汇">徐汇</li><li data="2507" class="" title="静安">静安</li><li data="2510" class="" title="虹口">虹口</li><li data="2508" class="" title="普陀">普陀</li><li data="2515" class="" title="浦东新">浦东新</li><li data="2511" class="" title="杨浦">杨浦</li><li data="2513" class="" title="宝山">宝山</li><li data="2512" class="" title="闵行">闵行</li><li data="2517" class="" title="松江">松江</li><li data="2514" class="" title="嘉定">嘉定</li><li data="2518" class="" title="青浦">青浦</li><li data="2502" class="" title="崇明">崇明</li><li data="2520" class="" title="奉贤">奉贤</li><li data="2516" class="" title="金山">金山</li></ul><ul class="popcitylist clearfix"><div class="dt">商圈</div><li data="2012973" class="" title="南京西路商业区">南京西路商业区</li><li data="1167495" class="" title="新天地地区">新天地地区</li><li data="46600" class="" title="浦东陆家嘴金融贸易区">浦东陆家嘴金融贸易区</li><li data="2012979" class="" title="七浦路商业区">七浦路商业区</li><li data="2017160" class="" title="虹口足球场地区">虹口足球场地区</li><li data="46599" class="" title="上海火车站地区">上海火车站地区</li><li data="2012981" class="" title="朱家角、东方绿舟">朱家角、东方绿舟</li><li data="46620" class="" title="佘山、松江大学城">佘山、松江大学城</li><li data="2012977" class="" title="南汇及野生动物园">南汇及野生动物园</li><li data="2013101" class="" title="八万人体育场地区">八万人体育场地区</li><li data="2013102" class="" title="长风公园地区">长风公园地区</li><li data="2013103" class="" title="大宁国际商业区">大宁国际商业区</li><li data="1167476" class="" title="崇明长兴岛">崇明长兴岛</li><li data="2013104" class="" title="横沙岛">横沙岛</li><li data="46740" class="" title="宝山地区">宝山地区</li><li data="2013105" class="" title="滴水湖临港地区">滴水湖临港地区</li><li data="2013106" class="" title="国家会展中心">国家会展中心</li><li data="2013107" class="" title="光大会展中心">光大会展中心</li><li data="2013108" class="" title="奉贤开发区">奉贤开发区</li><li data="2013109" class="" title="交大、闵行经济开发区">交大、闵行经济开发区</li></ul><ul class="popcitylist clearfix"><div class="dt">景点</div><li data="1994829" class="" title="上海迪士尼乐园">上海迪士尼乐园</li><li data="1920942" class="" title="外滩">外滩</li><li data="136" class="" title="东方明珠">东方明珠</li><li data="2854" class="" title="上海城隍庙">上海城隍庙</li><li data="2844" class="" title="南京路步行街">南京路步行街</li><li data="8087" class="" title="上海杜莎夫人蜡像馆">上海杜莎夫人蜡像馆</li><li data="18836" class="" title="上海科技馆">上海科技馆</li><li data="38041" class="" title="上海欢乐谷">上海欢乐谷</li><li data="2746" class="" title="上海朱家角古镇">上海朱家角古镇</li><li data="1170423" class="" title="田子坊">田子坊</li><li data="2853" class="" title="豫园">豫园</li><li data="38042" class="" title="崇明岛">崇明岛</li><li data="1740858" class="" title="上海野生动物园">上海野生动物园</li><li data="1818514" class="" title="复旦大学">复旦大学</li><li data="37884" class="" title="上海世博会">上海世博会</li><li data="2846" class="" title="人民广场">人民广场</li><li data="2708" class="" title="新天地">新天地</li></ul><ul class="popcitylist clearfix"><div class="dt">交通枢纽</div><li data="1841617" class="" title="虹桥国际机场">虹桥国际机场</li><li data="1841616" class="" title="浦东国际机场">浦东国际机场</li><li data="1175076" class="" title="上海虹桥火车站">上海虹桥火车站</li><li data="1175075" class="" title="上海火车站">上海火车站</li><li data="1175074" class="" title="上海南火车站">上海南火车站</li></ul></div>
</div>

</div>