
<html id="body">
<head>
    <title>首页</title>
    <base href="{{URL::asset('/')}}"/>

    @include('.index.public.style')
</head>
<body style="background-color: black" >
<div id="snowspawner"></div>
<!---start-header---->
@include('.index.public.header')
<!---End-header---->
<!--start-image-slider---->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @foreach($arr as $k=>$v)
        @if($k==0)
            <li data-target="#myCarousel" data-slide-to="{{$k}}" class="active"></li>
        @else
            <li data-target="#myCarousel" data-slide-to="{{$k}}"></li>
        @endif
    @endforeach
    </ol>


    <div class="carousel-inner">
        @foreach($arr as $k=>$v)
            @if($k==0)
                <div class="item active ">
                    <img src="{{URL::asset($v->p_img)}}" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$v->p_name}}</h1>
                            <p><a class="btn btn-primary" href="hotelCarin?p_id={{$v->p_id}}" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                        </div>
                    </div>
                </div>
                @else
                <div class="item ">
                    <img src="{{URL::asset($v->p_img)}}" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$v->p_name}}   </h1>
                            <p><a class="btn  btn-primary" href="hotelCarin?p_id={{$v->p_id}}" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
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
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-arrow-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-arrow-right"></span></a>
</div><!-- /.carousel -->

<!---start-content---->

<div class="row">
    <div class="specials-heading">
        <h3><div class="txtwav flip">国内游 </div></h3>
    </div>
    @foreach($data as $k=>$v)
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="{{URL::asset($v->p_img)}}"
                 alt="通用的占位符缩略图">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$v->p_abstract}}</h1>
                    <p><a class="btn btn-primary" href="hotelCarin?p_id={{$v->p_id}}" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="specials-heading">
        <h3><div class="txtwav flip">热门景点 </div></h3>
    </div>
    @foreach($data as $k=>$v)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{URL::asset($v->p_img)}}"
                     alt="通用的占位符缩略图">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>{{$v->p_abstract}}</h1>
                        <p><a class="btn btn-primary" href="hotelCarin?p_id={{$v->p_id}}" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!---End-content---->
</body>
@include('.index.public.foot')
</html>



