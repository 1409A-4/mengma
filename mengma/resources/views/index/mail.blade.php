<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>支付成功页</title>
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
</head>
<body>
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
<div align="center">
    订购成功<br/>
    <span id="myspan"></span>秒后跳转到酒店首页
</div>
</body>
</html>
<script type="text/JavaScript" language="javascript">
    var i=5;
    //获取myspan
    var myspan=document.getElementById("myspan");
    function abc(){
        myspan.innerText=i;
        if(--i==0){
            window.clearInterval(mytime);
            window.location.href="{{URL('hotel')}}"; //empManage.php为管理用户页面

        }

    }
    //启用一个定时器
    var mytime=window.setInterval("abc()",1000);
</script>