<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的订单</title>
    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')
    <link rel="stylesheet" type="text/css" href="order/css/order-list.497637213099b0153a369d397e627352.css">
</head>
<body class="">
@include('.index.public.header')
<div class="order-list">
    <div class="order-user-info">
        <div class="user-info-left">
            <a class="head-link" href="http://www.qyer.com/u/8501363"><img class="user-head-pic" src="{{$user['u_img']}}"></a>
            <div class="user-head-info">
                <p class="user-head-name">{{$user['u_name']}}</p>
            </div>
        </div>
    </div>            <ul class="order-nav">
        <li class="order-nav-cell active">酒店订单</li>
        {{--<li class="order-nav-cell"><a href="http://www.qyer.com/u/order/">自由行订单</a></li>--}}
    </ul>
    <div class="order-list-unit">
        <ul class="order-list-title">
            <li class="li-cell li-cell1">名称</li>
            <li class="li-cell li-cell2">房间类型</li>
            <li class="li-cell li-cell4">联系电话</li>
            <li class="li-cell li-cell5">数量</li>
            <li class="li-cell li-cell6">总额</li>
            <li class="li-cell li-cell7">状态</li>
            <li class="li-cell li-cell8">操作</li>
        </ul>
        @foreach($order as $key => $v)
        <div class="order-list-line">
            <ul class="order-list-line-head">
                <li class="order-list-line-head-cell order-num">订单编号：<a href="javascript:void(0);" class="number">{{$v['o_number']}}</a></li>
                <li class="order-list-line-head-cell">提交订单时间：{{$v['o_addtime']}}</li>
            </ul>
            <ul class="order-list-line-body">
                <li class="order-list-line-body-cell li-cell1"><a href="http://z.qyer.com/deal/69674/" target="_blank">{{$v['name']}}</a></li>
                <li class="order-list-line-body-cell li-cell3">{{$v['type']}}</li>
                <li class="order-list-line-body-cell li-cell4">
                    <p>客服电话：</p>
                    <p>123456</p>
                </li>
                <li class="order-list-line-body-cell li-cell5">{{$v['o_num']}}</li>
                <li class="order-list-line-body-cell li-cell6">
                    <p>￥{{$v['o_price']}}.00</p>
                </li>
                <li class="order-list-line-body-cell li-cell7">
                    <p class="state-common">
                        @if($v['o_status']=='1')
                            <font color="#ff0000">已付款</font>
                            @else
                            <font color="#ff0000">未付款</font>
                            @endif
                    </p>
                </li>
                <li class="order-list-line-body-cell li-cell8">
                    @if($v['o_status']=='1')
                        <a class="go-pay" href="index/lookorder?id={{$v['ho_id']}}">查看订单</a>
                        {{--<a href="" target="_blank">立即评价</a>--}}
                        <a href="index/delorder?number={{$v['o_number']}}" class="del" dingdan="{{$v['o_number']}}">删除订单</a>
                    @else
                        <a class="go-pay" href="hpayment?id={{$v['h_id']}}&&order_number={{$v['o_number']}}" target="_blank">立即支付</a>
                        <a href="index/delorder?number={{$v['o_number']}}" class="del" dingdan="{{$v['o_number']}}">删除订单</a>
                    @endif

                </li>
            </ul>
        </div>
        @endforeach
        <div class="pager-wrap clearfix"></div>
    </div>
</div>
</body>
@include('.index.public.foot')
</html>
{{--<script>--}}
    {{--$(function(){--}}
        {{--$('.del').click(function(){--}}
            {{--var a_str = $(this).attr('dingdan');--}}
            {{--$.get('index/delorder',{number:a_str},function(msg){--}}
                {{--if(msg=='1'){--}}
                   {{--$(this).parents('.order-list-line').remove();--}}
                {{--}else{--}}
                    {{--alert('删除失败')--}}
                {{--}--}}
            {{--})--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}
