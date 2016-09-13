
<!DOCTYPE HTML>
<head>
    <title>��ҳ</title>
    <base href="{{URL::asset('/')}}"/>
    @include('.index.public.style')
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
                <li class="active"><a href="{{url('/')}}">��ҳ</a></li>
                <li><a href="">��Ʊ</a></li>
                <li ><a href="hotel">�Ƶ�</a></li>
                <li ><a href="hotelCar">������</a></li>
                @if(session('name'))
                    <li><a href="index/center" class="nav2" style="text-decoration:none" >�û�����</a></li>
                    <li><a href="login/loginout" class="nav3" style="text-decoration:none">�˳�</a></li>
                @else
                    <li><a href="login/register">ע��</a></li>
                    <li><a href="login/login">��¼</a></li>
                @endif

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>
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
    <div class="content_top">
        <div class="wrap">
            <h1><a href="#">WELCOME.</a></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, </p>
            <span><a class="learnmore" href="#">LEARN MORE</a></span>
        </div>
    </div>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="��վģ��">��վģ��</a></div>
    <div class="content-grids">
        <div class="wrap">
            <div class="grid">
                <a href="#"><img src="index/images/grids-img1.jpg" title="image-name" /></a>
                <h3>DESTINATIONS</h3>
                <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                <a class="button" href="{{url('scenicSpot')}}">More</a>
            </div>
            <div class="grid">
                <a href="#"><img src="index/images/grids-img2.jpg" title="image-name" /></a>
                <h3>NEWS & EVENTS</h3>
                <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                <a class="button" href="{{url('scenicSpot')}}">More</a>
            </div>
            <div class="grid last-grid">
                <a href="#"><img src="index/images/grids-img3.jpg" title="image-name" /></a>
                <h3>SUPPORT</h3>
                <p>Lorem ipsum dolor sit amet consectetur adiing elit. In volutpat luctus eros ac placerat. Quisque erat metus facilisis non feu,aliquam hendrerit quam. Donec ut lectus vel dolor adipiscing tincnt.</p>
                <a class="button" href="{{url('scenicSpot')}}">More</a>
            </div>

            <div class="clear"> </div>
        </div>
    </div>
    <div class="specials">
        <div class="wrap">
            <div class="specials-heading">
                <h3>Traveling Specials</h3>
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
    </div>
    <div class="testmonials">
        <div class="wrap">
            <div class="testmonial-grid">
                <h3>TESTIMONIALS :</h3>
                <p>&#34; Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat luctus eros ac placerat. Quisque erat metus, facilisis non felis eu, aliquam hendrrit quam. Donec ut lectus vel dolor adipiscing tincidunt. Ut auctor diam at est iaculis, vitae interdum magna sagittis.&#34;</p>
                <a href="#"> - Lorem ipsum</a>
            </div>
        </div>
    </div>
</div>
<!---End-content---->
</body>
@include('.index.public.foot')
</html>



