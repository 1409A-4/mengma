<!DOCTYPE HTML>
<head>
    <title>酒店</title>
    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')
</head>
<body>
<!---start-header---->
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="index.html"><img src="index/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                <li ><a href="{{url('/')}}">首页</a></li>
                <li><a href="">机票</a></li>
                <li class="active"><a href="hotel">酒店</a></li>
                <li ><a href="hotelCar">自由行</a></li>
                @if(session('name'))
                    <li><a href="{{URL('index/center')}}" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a href="{{URL('login/loginout')}}" class="nav3" style="text-decoration:none">退出</a></li>
                @else
                    <li><a href="{{url('login/register')}}">注册</a></li>
                    <li><a href="{{url('login/login')}}">登录</a></li>
                @endif

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>

@include('index.public.foot')
</body>
</html>

