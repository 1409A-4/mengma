<!DOCTYPE HTML>
<head>
    <title>酒店</title>
    <base href="{{URL::asset('/')}}"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="assets/css/realia-blue.css" type="text/css" id="color-variant-default">
    <link type="text/css" rel="stylesheet" href="index/hpayment/Css/youhuiquan.css" />
    @include('index.public.style')
</head>
<!---start-header---->
<body>
@include('.index.public.header')

<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->

            <!-- HEADER -->
            <!-- /#header-wrapper -->
            <div class="copyrights">Collect from <a href="http://www.973787614@qq.com/"  title="猛犸技术">猛犸技术</a></div>

            <!-- NAVIGATION -->
            <!-- /.navigation -->

            <!-- CONTENT -->
            <div id="content"><div class="map-wrapper">
                    <div class="map">
                        <div id="map" class="map-inner"></div><!-- /.map-inner -->

                        <div class="container">
                            <div class="row">
                                <div class="span3">
                                    <div class="property-filter pull-right">
                                        <div class="content">
                                            <form method="post" action="">
                                                <div class="location control-group">
                                                    <label class="control-label" for="inputLocation">
                                                        位置
                                                    </label>
                                                    <div class="controls">
                                                        <select name="province" id="s_province" class=" validate[required] col-md-4" ></select>
                                                    </div><!-- /.controls -->
                                                </div><!-- /.control-group -->

                                                <div class="type control-group">
                                                    <label class="control-label" for="inputType">
                                                        类型
                                                    </label>
                                                    <div class="controls">
                                                        <select id="inputType" name="rooms_type">
                                                            <option value="0" selected="selected">请选择房屋类型</option>
                                                            @foreach($res as $key => $v)
                                                                <option value="{{$v['ht_id']}}">{{$v['ht_name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div><!-- /.controls -->
                                                </div><!-- /.control-group -->


                                                <div class="price-slider">
                                                </div><!-- /.price-slider -->

                                                <div class="form-actions">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="button" value="搜索" class="btn btn-primary btn-large" id="btn_hotel">
                                                </div><!-- /.form-actions -->
                                            </form>
                                        </div><!-- /.content -->
                                    </div><!-- /.property-filter -->
                                </div><!-- /.span3 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.map -->
                </div><!-- /.map-wrapper -->
                <div class="container">
                    <div id="main">
                        <div class="row">
                            <div class="span9">
                                <h1 class="page-header">酒店预定</h1>
                                <div class="properties-grid">
                                    <div class="row" id="part">
                                        @foreach($sql as $key =>$c)
                                            <div class="property span3">
                                                <div class="image">
                                                    <div class="content">
                                                        <a href="{{URL('details')}}?id={{$c['h_id']}}"></a>
                                                        <img src="{{$c['img']}}" alt="">
                                                    </div><!-- /.content -->

                                                    <div class="price">￥{{$c['h_price']}}</div><!-- /.price -->
                                                    <div class="reduced">价格 </div><!-- /.reduced -->
                                                </div><!-- /.image -->

                                                <div class="title">
                                                    <h2><a href="">酒店</a></h2>
                                                </div><!-- /.title -->

                                                <div class="location">{{$c['h_name']}}</div><!-- /.location -->
                                                <div class="area">
                                                    <span class="key">地区:</span><!-- /.key -->
                                                    <span class="value">{{$c['h_place']}}</span><!-- /.value -->
                                                </div><!-- /.area -->
                                                <div class="bedrooms"><div class="content"></div></div><!-- /.bedrooms -->
                                                <div class="bathrooms"><div class="content"></div></div><!-- /.bathrooms -->
                                            </div><!-- /.property -->
                                        @endforeach

                                    </div>
                                </div><!-- /.row -->
                                <!-- /.properties-grid -->
                            </div>
                        </div>
                </div>
        </div><!-- /#wrapper-inner -->

    </div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->
        <div class="container">
            @foreach ($sql as $user)
                {{ $user->name }}
            @endforeach
        </div>

        {!! $sql->links() !!}

{{--<script type="text/javascript" src="assets/js/realia.js"></script>--}}
</body>
        @include('.index.public.foot')
</html>
<script src="assets/js/area.ui.js"></script>

<script>
    $(document).area("s_province","s_city","s_county");//调用三级插件
    //hotel搜索提交
    $(function(){
        $('#btn_hotel').click(function(){
            var province = $("#s_province option:selected").val();
            var rooms_type = $('#inputType option:selected').val();
            $.get('{{URL('search_hotel')}}',{province:province,rooms_type:rooms_type},function(msg){
                if(msg==1){
                    alert('暂无酒店信息');
                }else{
                    var hh="";
                    for(var i in msg){
                        var obj = msg[i];
                        hh+="<div class='property span3'><div class='image'><div class='content'><a href='{{URL("details")}}?id="+obj.h_id+"'></a><img src='assets/img/hotels/690.png' alt=''></div><div class='price'>￥"+obj.h_price+"</div><div class='reduced'>价格</div></div><div class='title'><h2><a href='detail.html'>酒店</a></h2></div><div class='location'>"+obj.h_name+"</div><div class='area'><span class='key'>地区:</span><span class='value'>"+obj.h_place+"</span></div><div class='bedrooms'></div><div class='bathrooms'></div></div>";
                    };
                    $('#part').html(hh);
                }
            })
        })
    })
</script>