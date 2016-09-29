<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>订单详情</title>
    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')
    <link rel="stylesheet" type="text/css" href="order/css/frame.aad4182427d35c505e14853d4a9e1c32.css">
    <link rel="stylesheet" type="text/css" href="order/css/order-detail.74eff8f831e5bdb3a0ebeafb56d86e65.css">
</head>

<body class="">
@include('.index.public.header')
<div class="order-detail">

    <div class="zu-order-status">
        <div class="status-info">
            <h3 class="status-info-title">
                <span class="common">
                    @if($order['o_status']=='1')
                        已付款
                    @else
                        未付款
                    @endif
                </span>

                                    <span class="status-info-tip zu-text-important time-count-down">

                        <span class="left-time" data-left-time="3432"></span>
                    </span>
            </h3>
        </div>
        <div class="status-opt">
            <ul class="status-opt-list">
                {{--<li class="opt-list-cell"><a class="btn-pay" href="http://z.qyer.com/orderform.php?action=lastminuteorderformpay&amp;id=2062204164">再次购买</a></li>--}}
            </ul>
        </div>
    </div>
    <div class="zu-order-info">
        <ul class="order-info-navbar clearfix">
            <li class="active" data-click-trigger=".order-info">订单信息</li>
        </ul>
        <div class="order-info-wrapper">
            <div class="order-info active">
                <ul class="clearfix">
                    <li>订单号：{{$order['o_number']}}</li>
                    <li>下单时间：{{$order['o_addtime']}}</li>
                </ul>
            </div>
            <div class="pay-info clearfix">
                <ul class="pay-content">
                </ul>
            </div>
            <div class="common-info clearfix">
                <a href="http://zuser.qyer.com/orderdetail/2062204164/">
                    <img class="zu-product-pic" src="{{$order['img']}}" alt="">
                </a>
                <div class="product-info">
                    <h3 class="product-title"><a href="">{{$order['name']}}</a></h3>
                    <ul class="product-content">
                        <li><span class="info-title">房间类型</span>{{$order['type']}}</li>
                        <li><span class="info-travel-time">入离日期</span> {{$order['o_intime']}}-{{$order['o_outtime']}}</li>
                        <li><span class="info-buy-num">购买数量</span>   {{$order['o_num']}}</li>
                    </ul>
                </div>
                <ul class="merchant-info">
                    <li class="merchant-name"><span class="zwui-iconfont icon-shop-settled"></span> <a href="http://zuser.qyer.com/orderdetail/2062204164/#">猛犸旅游玩乐</a></li>
                    <li class="merchant-tel"><span class="zwui-iconfont icon-tel"></span> 123456</li>
                    <li class="merchant-work-time"><span class="work-time">
    <span class="service-workday">
        <span class="service-tit">工作日</span>
        08:30-22:30
    </span>
        <span class="service-weekendday">
        <span class="service-tit">公休日</span>
        09:30-18:30
    </span>
    </span></li>
                </ul>
            </div>
            <div class="product-pay-info">
                <p class="real-pay">
                    <span class="real-pay-title">预付金额</span>
                    <span class="real-pay-price"><span class="price-symbol">￥</span>{{$order['o_price']}}.00</span>
                </p>
            </div>
        </div>
    </div>        <div class="zu-order-other-info">
        <div class="group-name">
            联系人信息
        </div>
        <ul class="group-content clearfix">
            <li>
                <div class="var-name">姓名</div>
                <div class="var-value" title="zhangsan">
                    {{$user['u_name']}}
                </div>
            </li>
            <li>
                <div class="var-name">手机号</div>
                <div class="var-value" title="86-18524341546546">
                    {{$user['u_phone']}}
                </div>
            </li>
            <li>
                <div class="var-name">邮箱</div>
                <div class="var-value" title="123123@qq.com">
                    {{$user['u_email']}}
                </div>
            </li>
        </ul>
    </div>
</div>
</body>
@include('.index.public.foot')
</html>
