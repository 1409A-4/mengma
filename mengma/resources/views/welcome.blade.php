
<!DOCTYPE HTML>
<head>
    <title>首页</title>
    <base href="{{URL::asset('/')}}"/>

    @include('.index.public.style')
</head>
<body style="background-color: black">
<div id="snowspawner"></div>
<!---start-header---->
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="index.html"><img src="index/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                {{--<li ><a href="{{url('/')}}"><div class="animated lightSpeedIn infinite">动画</div></a></li>--}}
                <li ><a href="{{url('/')}}">首页</a></li>
                <li><a href="">机票</a></li>
                <li ><a href="hotel">酒店</a></li>
                <li ><a href="hotelCar">自由行</a></li>
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
<!---End-header---->
<!--start-image-slider---->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        @foreach($arr as $k=>$v)
            @if($k==0)
                <div class="item active">
                    <img src="{{URL::asset($v->gimg)}}" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$v->gname}}</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida          at  eget metus.                 Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                @else
                <div class="item ">
                    <img src="{{URL::asset($v->gimg)}}" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$v->gname}}   </h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida          at  eget metus.                 Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                @endif
        @endforeach
        {{--<div class="item">--}}
            {{--<img src="index/2.jpg" style="width:100%" data-src="" alt="Second slide">--}}
            {{--<div class="container">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<h1>Another example headline.</h1>--}}
                    {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta      gravida     at eget metus.                  Nullam id dolor id nibh ultricies vehicula ut   id elit.</p>--}}
                    {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="item">--}}
            {{--<img src="index/3.jpg" style="width:100%" data-src="" alt="Third slide">--}}
            {{--<div class="container">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<h1>One more for good measure.</h1>--}}
                    {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>--}}
                    {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <a class="carousel-control left" href="#myCarousel"
       data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel"
       data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->

<!---start-content---->

<div class="row">
    <div class="specials-heading">
        <h3><div class="txtwav flip">国内游 </div></h3>
    </div>
    @for ($i = 0; $i < 8; $i++)

@foreach($data as $k=>$v)
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="{{URL::asset($v->gimg)}}"
                 alt="通用的占位符缩略图">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$v->gname}}</h1>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">了解更多</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endfor
    <div class="specials-heading">
        <h3><div class="txtwav flip">国内游 </div></h3>
    </div>
    @for ($i = 0; $i < 8; $i++)

        @foreach($data as $k=>$v)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{URL::asset($v->gimg)}}"
                         alt="通用的占位符缩略图">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$v->gname}}</h1>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">了解更多</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endfor
</div>

<!---End-content---->
</body>
@include('.index.public.foot')
</html>



