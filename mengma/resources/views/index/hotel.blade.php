<!DOCTYPE HTML>
<head>
    <title>酒店</title>
    <base href="{{URL::asset('index\/')}}"/>
    @include('index.public.style')
</head>
<body>
<!---start-header---->
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                <li><a href="{{url('/')}}">首页</a></li>
                <li><a href="about.html">机票</a></li>
                <li  class="active"><a href="{{url('hotel')}}">酒店</a></li>
                <li><a href="plans.html">景区</a></li>
                <li><a href="plans.html">注册</a></li>
                <li><a href="plans.html">登录</a></li>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>

@include('index.public.foot')
</body>
</html>

