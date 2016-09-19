<div class="header" >
    <div class="wrap">
        <div class="logo">
            <a href="{{url('/')}}"><img src="index/images/logo.jpg" title="logo" width="48"/></a>
        </div>
        <div class="top-nav">
            <ul>
                {{--<li ><a href="{{url('/')}}"><div class="animated lightSpeedIn infinite">动画</div></a></li>--}}
                <li ><a href="/">首页</a></li>
                <li ><a href="hotelCar">自由行</a></li>
                <li ><a href="hotel">酒店</a></li>
                @if(session('name'))
                    <li><a href="index/center" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a href="login/loginout" class="nav3" style="text-decoration:none">退出</a></li>
                @else
                    <li><a href="login/register">注册</a></li>
                    <li><a href="login/login">登录</a></li>
                @endif

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>