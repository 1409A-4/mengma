<!DOCTYPE HTML>
<head>
    <title>酒店</title>

    <base href="{{URL::asset('/')}}"/>
    @include('index.public.style')
</head>
<body>
<!---start-header---->
@include('index.public.header')
<!---End-header---->
<!--start-image-slider---->
<div class="image-slider">
    <!-- Slideshow 1 -->
    <ul class="rslides" id="slider1">
        <li><img src="index/images/slider4.jpg" alt=""></li>
        <li><img src="index/images/slider2.jpg" alt=""></li>
        <li><img src="index/images/slider3.jpg" alt=""></li>
        <li><img src="index/images/slider1.jpg" alt=""></li>
    </ul>
    <!-- Slideshow 2 -->
</div>
<!--End-image-slider---->
<!---End-wrap---->
<div class="clear"> </div>
<!---start-content---->
<div class="content">
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
        </div>
    </div>
    <div class="specials">
        <div class="wrap">
            <div class="specials-heading">
                <h3>Latest-News</h3>
            </div>
            <div class="specials-grids">
                <div class="special-grid">
                    <img src="index/images/grids-img1.jpg" title="image-name" />
                    <a href="#">Latest Plans</a>
                    <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                </div>
                <div class="special-grid">
                    <img src="index/images/grids-img2.jpg" title="image-name" />
                    <a href="#">Pre Plans</a>
                    <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                </div>
                <div class="special-grid spe-grid">
                    <img src="index/images/grids-img3.jpg" title="image-name" />
                    <a href="#">Free Plans</a>
                    <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                </div>
        <div class="clear"> </div>
    </div>
</div>

@include('index.public.foot')
</body>
</html>

