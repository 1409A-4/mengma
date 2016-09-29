<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>支付成功页</title>
    <base href="{{URL::asset('/')}}"/>
    <link rel="stylesheet" href="pay/css/m_reset.css">
    <link rel="stylesheet" href="pay/css/m_aa.css">
    @include('index.public.style')
</head>
@include('.index.public.header')
<div align="center">
    <div class="wrap">
        <div class="main">
            <h1><img src="pay/img/pic_1.png"/>您已经成功付款<span style="color: red;">{{$price}}</span>元！</h1>
            <ul>
                <li style="color:lightskyblue;">查看已订购的酒店|</li>
                {{--<li style="color:lightskyblue;">交易详情|</li>--}}
                {{--<li>联系卖家：<span style="color:lightskyblue;">暂无代理</span><img src="pay/img/pic_2.png" alt="" /></li>--}}
            </ul>
            {{--<h2 style="font-size:14px;">亲，您得到猛犸网最新推出的<img src="pay/img/pic_3.png" alt="" />如果在购物中遇到问题，您可以通过保障卡内容享受相应的售后服务哦。</h2>--}}
            {{--<h3 style="font-size:14px;">友情提示：为保证账户安全，推荐使用猛犸浏览器 点此下载 <span style="color:lightskyblue;">点此下载</span></h3>--}}
            <span id="myspan"></span>秒后跳转到订单页面
        </div>
    </div>
</div>
</body>
</html>
<script type="text/JavaScript" language="javascript">
    var i=3;
    //获取myspan
    var myspan=document.getElementById("myspan");
    function abc(){
        myspan.innerText=i;
        if(--i==0){
            window.clearInterval(mytime);
            window.location.href="{{URL('index/myself')}}"; //empManage.php为管理用户页面

        }

    }
    //启用一个定时器
    var mytime=window.setInterval("abc()",1000);
</script>