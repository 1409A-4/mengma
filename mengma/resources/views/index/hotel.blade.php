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


@include('index.public.foot')
</body>
</html>

