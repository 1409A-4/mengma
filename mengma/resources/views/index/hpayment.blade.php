
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>酒店预订 - 途牛旅游网</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <base href="{{URL::asset('\/')}}"/>
    <link rel="stylesheet" type="text/css" href="index/hpayment/Css/common_foot.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/thickbox.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/verification_mes.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/pop.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/youhuiquan.css" />
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/layer.css" />
    <link rel="stylesheet" type="text/css" href="front/time/css/jcDate.css" media="all" />
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
    <style type="text/css">
        input{
            width: 100px;
            height: 35px;
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

</head>
<body id="hotel_order_page">
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
<div class="orderBg">

    <!-- start content -->
    <div id="wrap" class="wrap">
        <div id="container" class="container">
            <form id="form" action="{{URL('imprest')}}" method="post">
                <div id="content" class="content clearfix">
                    <div class="title">
                        <h1>
                            <a href="/detail/645455">酒店订购</a>
                        </h1>
                    </div>
                    <div id="main" class="main">
                        <!-- 登录提醒-->
                        {{--<div class="title_warn">现在<a href="javascript:void(0);" class="login" onclick="online_order_login();">登录</a>可享受积分、预订返现、专属服务等优惠。</div>--}}
                        

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
                                                        <input id="begin_date" class="jcDate " type="text" value="2016-09-14" />
                                                    </label>
                                                    &nbsp;&nbsp;至&nbsp;&nbsp;
                                                    <label class="dateLabel">
                                                        <input id="end_date" class="jcDate " type="text" value="2016-09-15" />
                                                    </label>
                                                    <span class="hint">共<font color="#ff0000">1</font>晚</span>
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
                                    @foreach($arr as $key => $v)
                                      <input type="radio" name="contacts" value="{{$v['uid']}}"/>{{$v['uname']}}:{{$v['uemail']}},{{$v['uphone']}}<br/>
                                    @endforeach
                                </div>
                            </div>
                            <div class="order_box clearfix">
                                <div class="order_menu"><h2>酒店订金</h2></div>
                                <div class="order_con">
                                    <input type="hidden" value='{{$res['h_price']*0.05}}' id="price2"/>
                                    <input type="hidden" name="gprice" value='{{$res['h_price']*0.05}}' id="price1"/>
                                    ￥<input type="text" name="gprice" value='{{$res['h_price']*0.05}}' id="price" disabled="disabled" onmouseover="show();" onmouseout="hidd();"  />
                                    <span id="b"></span>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$data}}" />
                            <input type="button" class="btn" value="预付款"/>
                            </div></div>
                </div>
                </form>
            </div></div>
</body>
</html>
<script type="text/javascript" src="front/time/js/jQuery-jcDate.js" charset="utf-8"></script>
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
        $("input.jcDate").jcDate({
            IcoClass : "jcDateIco",
            Event : "click",
            Speed : 100,
            Left : 0,
            Top : 28,
            format : "-",
            Timeout : 100
        });
        $('#houseNum').change(function(){
            var hnums = $(this).val();
            var price = $('#price2').val();
            var num = (hnums*price);
            $('#price').val(num);
            $('#price1').val(num);
        })
        $('.btn').on('click',function(){
            var begin_date=$('#begin_date').val();
            var end_date=$('#end_date').val();
            var begin_time = Date.parse(begin_date);
            var end_time = Date.parse(end_date);
            var end=end_time-begin_time;
            var now=new Date();
            var now_time=Date.parse(now);
            var contacts=$("input[type='radio']:checked").val();
            if(now_time<begin_time){
                if(begin_time<=(end_time-86400000)){
                    if(contacts==null){
                        alert('请选择联系信息');
                    }else{
                        $('#form').submit();
                    }
                }else{
                    alert('时间最少为一天')
                }
            }else{
                alert('请选择正确的时间');
            }

        })
    });
</script>
