<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> 酒店详情页</title>
    <base href="{{URL::asset('/')}}"/>
    {{--<link rel="stylesheet" href="time/css/jquery.cxcalendar.css">--}}
    <link rel="stylesheet" href="My97DatePicker/skin/WdatePicker.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/youhuiquan.css" />
    @include('index.public.style')
    <style type="text/css">
        input{
            width: 100px;
            height: 45px;
            border: none;
            background: #fff;
            border: 2px solid red;
            text-align: center;
            line-height: 35px;
            font-size: 14px;
            color: #000;
            font-weight: bold;
            border-radius: 15px;
        }
    </style>
    {{--<script type="text/javascript" src="time/js/jQuery-jcDate.js" charset="utf-8"></script>--}}
    {{--<link rel="stylesheet" type="text/css" href="time/css/jcDate.css" media="all" />--}}

</head>
<body>
@include('.index.public.header')
<?php
$now = date("Y-m-d");
?>
<div class="orderBg">

    <!-- start content -->
    <div id="wrap" class="wrap">
        <div id="container" class="container">
            <form id="form" action="{{URL('imprest')}}" method="post">
                <div id="content" class="content clearfix">
                    <div class="title">
                        <h1>
                            <a>酒店订购</a>
                        </h1>
                    </div>
                    <div id="main" class="main">
                        <!-- 登录提醒-->
                        <input type="hidden" value="{{Session('name')}}" id="sess" s-id="{{Session('name')}}"/>
                        @if(empty(session('name')))


                        <div class="main_left">
                            <!--产品信息 -->
                            <div class="order_box clearfix">

                                <div class="order_menu"><h2>预订信息</h2></div>
                                <div class="order_con">
                                    <table width="100%" border="0" class="order_table" id="hotel_base_info">
                                        <tr>
                                            <td valign="top" class="table_left" align="right"><label class="tit">入离日期:</label></td>
                                            <td>
                                                <div id="dateRegion" class="alterDate">
                                                    <label class="dateLabel">
                                                        <input type="text" name="b_time" class="Wdate" id="d4322"  onFocus="WdatePicker({minDate:'%y-%M-%d'})"/>
                                                    </label>
                                                    &nbsp;&nbsp;至&nbsp;&nbsp;
                                                    <label class="dateLabel">
                                                        <input type="text" name="e_time" class="Wdate" id="d4321"  onFocus="WdatePicker({minDate:'#F{$dp.$D(\'d4322\',{d:1})}'})"/>
                                                    </label>
                                                    {{--<span class="hint">共<font color="#ff0000">1</font>晚</span>--}}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="price_limit_plan_mind_info_about_nights_tr" style="display: none">
                                            <td></td>
                                            <td><p id="price_limit_plan_mind_info_about_nights"></p></td>
                                        </tr>
                                        <tr>
                                            <td class="table_left" valign="top"  align="right"><label class="tit">预订间数:</label></td>
                                            <td><div class="select-room-count">
                                                    <select name="h_nums" class="txt num houseNum" id="houseNum" param="">
                                                        @for($i=1;$i<=$res['h_nums'];$i++)
                                                            <option value="{{$i}}" id="hnums">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!--联系信息 -->
                            <div class="order_box clearfix">
                                <div class="order_menu"><h2>联系信息</h2></div>
                                <div class="order_con">
                                    无法显示
                                </div>
                            </div>
                            <div class="order_box clearfix">
                                <div class="order_menu"><h2>酒店订金</h2></div>
                                <div class="order_con">
                                    <input type="hidden" value='{{$res['h_price']*0.05}}' id="price2"/>
                                    <input type="hidden" name="gprice" value='{{$res['h_price']*0.05}}' id="price1"/>
                                    ￥<input type="text" name="gprice" value='{{$res['h_price']*0.05}}' style="height:50px; width: 50" id="price" disabled="disabled" onmouseover="show();" onmouseout="hidd();"  />
                                    <span id="b"></span>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$data}}" />
                            <input type="button" class="butn" value="预付款" />
                            </div>
                            @else



                            <div class="main_left">
                                <!--产品信息 -->
                                <div class="order_box clearfix">

                                    <div class="order_menu"><h2>预订信息</h2></div>
                                    <div class="order_con">
                                        <table width="100%" border="0" class="order_table" id="hotel_base_info">
                                            <tr>
                                                <td valign="top" class="table_left" align="right"><label class="tit">入离日期:</label></td>
                                                <td>
                                                    <div id="dateRegion" class="alterDate">
                                                        <label class="dateLabel">
                                                            <input type="text" name="b_time" id="b_time" class="Wdate" id="d4322"  onFocus="WdatePicker({minDate:'%y-%M-%d'})"/>
                                                            {{--<input id="date_d" name="b_time" class="jcDate " type="text" value="{{$now}}" />--}}
                                                        </label>
                                                        &nbsp;&nbsp;至&nbsp;&nbsp;
                                                        <label class="dateLabel">
                                                            <input type="text" name="e_time" id="e_time" class="Wdate" id="d4321"  onFocus="WdatePicker({minDate:'#F{$dp.$D(\'d4322\',{d:1})}'})"/>
                                                            {{--<input id="date_e" name="e_time" class="jcDate " type="text" value="{{$now}}" />--}}
                                                        </label>
                                                        {{--<span class="hint">共<font color="#ff0000">1</font>晚</span>--}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="price_limit_plan_mind_info_about_nights_tr" style="display: none">
                                                <td></td>
                                                <td><p id="price_limit_plan_mind_info_about_nights"></p></td>
                                            </tr>
                                            <tr>
                                                <td class="table_left" valign="top"  align="right"><label class="tit">预订间数:</label></td>
                                                <td><div class="select-room-count">
                                                        <select name="h_nums" class="txt num houseNum" id="houseNum" param="">
                                                            @for($i=1;$i<=$res['h_nums'];$i++)
                                                                <option value="{{$i}}" id="hnums">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <!--联系信息 -->
                                <div class="order_box clearfix">
                                    <div class="order_menu"><h2>联系信息</h2></div>
                                    <div class="order_con">
                                        {{--@foreach($arr as $key => $v)--}}
                                            <input type="radio" name="contacts" value="{{$arr['u_id']}}"/>{{$arr['u_name']}}:{{$arr['u_email']}},{{$arr['u_phone']}}<br/>
                                        {{--@endforeach--}}
                                    </div>
                                </div>
                                <div class="order_box clearfix">
                                    <div class="order_menu"><h2>酒店订金</h2></div>
                                    <div class="order_con">
                                        <input type="hidden" value='{{$res['h_price']*0.05}}' id="price2"/>
                                        <input type="hidden" name="gprice" value='{{$res['h_price']*0.05}}' id="price1"/>
                                        ￥<input type="text" name="gprice" value='{{$res['h_price']*0.05}}' style="height:50px; width: 50" id="price" disabled="disabled" onmouseover="show();" onmouseout="hidd();"  />
                                        <span id="b"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{$data}}" />
                                <input type="hidden" name="ht_id" value="{{$res['ht_id']}}" />
                                <input type="button" class="butn" value="预付款"/>
                            </div>
                            @endif
                    </div>
                </div>
                </form>
            </div>
    </div>
</body>
@include('.index.public.foot')
</html>
{{--<script src="time/js/jquery.cxcalendar.min.js"></script>--}}
{{--<script src="time/js/jquery.cxcalendar.languages.js"></script>--}}
<script src="My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
    function show(){
        var b=document.getElementById("b");
        b.innerHTML="  预交的订金占总额的5%";

    }
    function hidd(){
        var b=document.getElementById("b");
        b.innerHTML="";

    }
    $(function (){
        $('#houseNum').change(function(){
            var hnums = $(this).val();
            var price = $('#price2').val();
            var num = (hnums*price);
            $('#price').val(num);
            $('#price1').val(num);
        })
        $('.butn').on('click',function(){
            var sess = $('#sess').val();
            if(sess==""){
                layer.msg('请先登录或注册！', {icon: 5});
            }else{
                var b_time = $('#b_time').val();
                var e_time = $('#e_time').val();
                var houseNum = $('#houseNum option:selected').val();
                var contacts=$("input[type='radio']:checked").val();
                if(b_time!='' && e_time!=''){
                    if(contacts==undefined){
                        layer.msg('请选择联系人！', {icon: 5});
                    }else{
                        $('#form').submit();
                    }
                }else{
                    layer.msg('请选择时间！', {icon: 5});
                }

            }
        })
    });
</script>
