<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators - byaviators.com">
    <base href="{{URL::asset('front\hotelstyle\/')}}"/>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/realia-blue.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="#" type="text/css" id="color-variant">

    <title>酒店详情</title>
</head>
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li><a href="{{URL('/')}}">Home</a></li>
                            </ul><!-- /.breadcrumb -->

                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="#">登陆</a></li>
                                    <li><a href="#">注册</a></li>
                                </ul>
                            </div>
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">切换导航</a>

                                            <div class="logo">
                                                <a href="index.html" title="Home">
                                                    <img src="assets/img/logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="{{URL('hotel')}}" title="Home" class="brand">酒店</a>
                                            </div><!-- /.site-name -->

                                            <div class="site-slogan">
                                                <span>房地产 &amp; 租金<br>made easy</span>
                                            </div><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:973787614@qq.com">973787614@qq.com</a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <span>666-666-6666</span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                        <a class="btn btn-primary btn-large list-your-property arrow-right" href="list-your-property.html">个人财产</a>
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->
            <div class="copyrights">Collect from <a href="http://www.973787614@qq.com/"  title="猛犸技术">猛犸技术</a></div>

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li class="menuparent">
                                    <span class="menuparent nolink">主页</span>
                                    <ul>
                                        <li><a href="index-slider.html">主页的滑块</a></li>
                                        <li><a href="index.html">主页的地图</a></li>
                                        <li><a href="index-simple.html">简单的主页</a></li>
                                        <li><a href="index-carousel.html">网站首页轮播</a></li>
                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">上市</span>
                                    <ul>
                                        <li><a href="listing-grid.html">上市的网格</a></li>
                                        <li><a href="listing-grid-filter.html">带过滤器的列表网格</a></li>
                                        <li><a href="listing-rows.html">上市行</a></li>
                                        <li><a href="listing-rows-filter.html" >带筛选器的列表行</a></li>
                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">页面</span>
                                    <ul>
                                        <li><a href="about-us.html">关于我们</a></li>
                                        <li><a href="our-agents.html">我们的代理</a></li>
                                        <li><a href="faq.html">常见问题解答</a></li>
                                        <li><a href="shortcodes.html">简码</a></li>
                                        <li class="menuparent">
                                            <span class="menuparent nolink">另一个层面</span>
                                            <ul>
                                                <li><a href="contact-us.html">联系我们</a></li><li><a href="http://www.cssmoban.com">更多主题</a></li>
                                                <li><a href="grid-system.html">电子网</a></li>
                                                <li><a href="typography.html">排版</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="404.html">404 page</a></li>
                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">定价</span>
                                    <ul>
                                        <li><a href="pricing-boxed.html">盒装定价</a></li>
                                        <li><a href="pricing-multiple.html">多重定价</a></li>
                                        <li><a href="pricing-simple.html">简单的定价</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">联系我们</a></li><li><a href="http://www.cssmoban.com">更多主题</a></li>
                            </ul><!-- /.nav -->

                            <div class="language-switcher">
                                <div class="current en"><a href="/" lang="en">英语</a></div><!-- /.current -->
                                <div class="options">
                                    <ul>
                                        <li class="fr"><a href="#">法语</a></li>
                                        <li class="de"><a href="#">德语</a></li>
                                    </ul>
                                </div><!-- /.options -->
                            </div><!-- /.language-switcher -->

                            <form method="get" class="site-search" action="?">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Search" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

            <!-- CONTENT -->
            <div id="content"><div class="map-wrapper">
    <div class="map">
        <div id="map" class="map-inner"></div><!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="property-filter pull-right">
                        <div class="content">
                            <form method="get" action="?">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        位置
                                    </label>
                                    <div class="controls">
                                        <select id="inputLocation">
                                            <option id="malibu">马里布，CA</option>
                                            <option id="palo-alto">帕罗奥图</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="inputType">
                                        类型
                                    </label>
                                    <div class="controls">
                                        <select id="inputType">
                                            <option id="apartment">公寓</option>
                                            <option id="condo">大型公寓</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="beds control-group">
                                    <label class="control-label" for="inputBeds">
                                        床
                                    </label>
                                    <div class="controls">
                                        <select id="inputBeds">
                                            <option id="11">1</option>
                                            <option id="21">2</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="baths control-group">
                                    <label class="control-label" for="inputBaths">
                                        浴
                                    </label>
                                    <div class="controls">
                                        <select id="inputBaths">
                                            <option id="1">1</option>
                                            <option id="2">2</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->


                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputRent">
                                            <input type="checkbox" id="inputRent"> 租金
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputSale">
                                            <input type="checkbox" id="inputSale"> 特价
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        价格从
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                        价格到
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceTo" name="inputPriceTo">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Filter now!" class="btn btn-primary btn-large">
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
                <h1 class="page-header">特征特性</h1>
                <div class="properties-grid">
    <div class="row">
        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.content -->

                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.content -->
                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.content -->

                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.content -->
                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-5.png" alt="">
                </div><!-- /.content -->

                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-6.png" alt="">
                </div><!-- /.content -->

                <div class="price">1 250 000€</div><!-- /.price -->
                <div class="reduced">Reduced </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="detail.html">27523 Pacific Coast</a></h2>
            </div><!-- /.title -->

            <div class="location">Palo Alto CA</div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value">120</span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content">4</div></div><!-- /.bedrooms -->
            <div class="bathrooms"><div class="content">3</div></div><!-- /.bathrooms -->
        </div><!-- /.property -->
    </div><!-- /.row -->
</div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3">
                <div class="widget our-agents">
    <div class="title">
        <h2>Our Agents</h2>
    </div><!-- /.title -->

    <div class="content">
        <div class="agent">
            <div class="image">
                <img src="assets/img/photos/emma-small.png" alt="">
            </div><!-- /.image -->
            <div class="name">Victoria Summer</div><!-- /.name -->
            <div class="phone">333-666-777</div><!-- /.phone -->
            <div class="email"><a href="mailto:victoria@example.com">victoria@example.com</a></div><!-- /.email -->
        </div><!-- /.agent -->

        <div class="agent">
            <div class="image">
                <img src="assets/img/photos/john-small.png" alt="">
            </div><!-- /.image -->
            <div class="name">John Doe</div><!-- /.name -->
            <div class="phone">111-222-333</div><!-- /.phone -->
            <div class="email"><a href="mailto:john.doe@example.com">victoria@example.com</a></div><!-- /.email -->
        </div><!-- /.agent -->
    </div><!-- /.content -->
</div><!-- /.our-agents -->
                <div class="hidden-tablet">
                    <div class="widget properties last">
    <div class="title">
        <h2>Latest Properties</h2>
    </div><!-- /.title -->

    <div class="content">
        <div class="property">
            <div class="image">
                <a href="detail.html"></a>
                <img src="assets/img/tmp/property-small-4.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="detail.html">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location -->
                <div class="price">€2 300 000</div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="detail.html"></a>
                <img src="assets/img/tmp/property-small-5.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="detail.html">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location -->
                <div class="price">€2 300 000</div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="detail.html"></a>
                <img src="assets/img/tmp/property-small-6.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="detail.html">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location -->
                <div class="price">€2 300 000</div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="detail.html"></a>
                <img src="assets/img/tmp/property-small-2.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="detail.html">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location -->
                <div class="price">€2 300 000</div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
    </div><!-- /.content -->
</div><!-- /.properties -->
                </div>
            </div>
        </div>
        <div class="carousel">
    <h2 class="page-header">All properties</h2>

    <div class="content">
        <a class="carousel-prev" href="detail.html">Previous</a>
        <a class="carousel-next" href="detail.html">Next</a>
        <ul>
            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>
            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-5.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-6.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="detail.html"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>
        </ul>
    </div><!-- /.content -->
</div><!-- /.carousel -->        <div class="features">
    <h2 class="page-header">Theme features</h2>

    <div class="row">
        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-seo.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>SEO Ready</h3>
                    <p>Realia is ready to put your website on higher ranks. Every line of code was developed with SEO principles in mind.</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->

        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-retina.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>Retina Ready</h3>
                    <p>Realia looks great even on Retina and high-resoultion displays. Every graphic element is sharp and clean. No blurry images anymore!</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->

        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-custom-widgets.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>Custom Widgets</h3>
                    <p>Realia provides custom developed widgets to fulfil requirements of good real estate application.</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->
    </div>
    <div class="row">
        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-bootstrap.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>Prepared for Bootstrap</h3>
                    <p>Developer friendly code based on Bootstrap and SASS makes your own customizations really easy.</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->

        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-pencil.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>Frontend Submission</h3>
                    <p>Make the portal solution from your real estate by providing property submission on homepage.</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->

        <div class="item span4">
            <div class="row">
                <div class="icon span1">
                    <img src="assets/img/icons/features-responsive.png" alt="">
                </div><!-- /.icon -->

                <div class="text span3">
                    <h3>Responsive</h3>
                    <p>Realia is ready to put your website on higher ranks. Every line of code was developed with SEO principles in mind.</p>
                </div><!-- /.logo -->
            </div><!-- /.row -->
        </div><!-- /.item -->
    </div><!-- /.row -->
</div><!-- /.features -->    </div>
</div>

<div class="bottom-wrapper">
    <div class="bottom container">
        <div class="bottom-inner row">
            <div class="item span4">
                <div class="address decoration"></div>
                <h2><a>List your property</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="gps decoration"></div>
                <h2><a>Advertise rentals</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="key decoration"></div>
                <h2><a>Guidance</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div><!-- /.item -->
        </div><!-- /.bottom-inner -->
    </div><!-- /.bottom -->
</div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->

<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>Most Recent</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <div class="property">
                            <div class="image">
                                <a href="detail.html"></a>
                                <img src="assets/img/tmp/property-small-1.png" alt="">
                            </div><!-- /.image -->
                            <div class="wrapper">
                                <div class="title">
                                    <h3>
                                        <a href="detail.html">27523 Pacific Coast</a>
                                    </h3>
                                </div><!-- /.title -->
                                <div class="location">Palo Alto CA</div><!-- /.location -->
                                <div class="price">€2 300 000</div><!-- /.price -->
                            </div><!-- /.wrapper -->
                        </div><!-- /.property -->

                        <div class="property">
                            <div class="image">
                                <a href="detail.html"></a>
                                <img src="assets/img/tmp/property-small-2.png" alt="">
                            </div><!-- /.image -->
                            <div class="wrapper">
                                <div class="title">
                                    <h3>
                                        <a href="detail.html">27523 Pacific Coast</a>
                                    </h3>
                                </div><!-- /.title -->
                                <div class="location">Palo Alto CA</div><!-- /.location -->
                                <div class="price">€2 300 000</div><!-- /.price -->
                            </div><!-- /.wrapper -->
                        </div><!-- /.property -->

                        <div class="property">
                            <div class="image">
                                <a href="detail.html"></a>
                                <img src="assets/img/tmp/property-small-3.png" alt="">
                            </div><!-- /.image -->
                            <div class="wrapper">
                                <div class="title">
                                    <h3>
                                        <a href="detail.html">27523 Pacific Coast</a>
                                    </h3>
                                </div><!-- /.title -->
                                <div class="location">Palo Alto CA</div><!-- /.location -->
                                <div class="price">€2 300 000</div><!-- /.price -->
                            </div><!-- /.wrapper -->
                        </div><!-- /.property -->
                    </div><!-- /.content -->
                </div><!-- /.properties-small -->

                <div class="widget span3">
                    <div class="title">
                        <h2>联系我们</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Address:</th>
                                <td>1900 Pico Blvd<br>Santa Monica, CA 90405<br>United States<br></td>
                            </tr>
                            <tr>
                                <th class="phone">Phone:</th>
                                <td>+48 123 456 789</td>
                            </tr>
                            <tr>
                                <th class="email">E-mail:</th>
                                <td><a href="mailto:info@yourcompany.com">info@example.com</a></td>
                            </tr>
                            <tr>
                                <th class="skype">Skype:</th>
                                <td>your.company</td>
                            </tr>
                            <tr>
                                <th class="gps">GPS:</th>
                                <td>34.016811<br>-118.469009</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Useful links</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="404.html">404 page</a></li>
                            <li class="leaf"><a href="about-us.html">About us</a></li>
                            <li class="leaf"><a href="contact-us.html">Contact us</a></li>
                            <li class="leaf"><a href="faq.html">FAQ</a></li>
                            <li class="leaf"><a href="grid-system.html">Grid system</a></li>
                            <li class="leaf"><a href="our-agents.html">Our agents</a></li>
                            <li class="last leaf"><a href="typography.html">Typography</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Say hello!</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <form method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputName">
                                    Name
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">
                                    Email
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputMessage">
                                    Message
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>© Copyright 2013 by More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a> All rights reserved.</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        {{--<ul class="menu nav">--}}
                            {{--<li class="first leaf"><a href="http://www.facebook.com" class="facebook">Facebook</a></li>--}}
                            {{--<li class="leaf"><a href="http://flickr.net" class="flickr">Flickr</a></li>--}}
                            {{--<li class="leaf"><a href="http://plus.google.com" class="google">Google+</a></li>--}}
                            {{--<li class="leaf"><a href="http://www.linkedin.com" class="linkedin">LinkedIn</a></li>--}}
                            {{--<li class="leaf"><a href="http://www.twitter.com" class="twitter">Twitter</a></li>--}}
                            {{--<li class="last leaf"><a href="http://www.vimeo.com" class="vimeo">Vimeo</a></li>--}}
                        {{--</ul>--}}
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->

<div class="palette">
    <div class="toggle">
        <a href="#">Toggle</a>
    </div><!-- /.toggle -->

    <div class="inner">
        <div class="headers">
            <h2>Header styles</h2>
            <ul>
                <li><a class="header-light">Light</a></li>
                <li><a class="header-normal">Normal</a></li>
                <li><a class="header-dark">Dark</a></li>
            </ul>
        </div><!-- /.headers -->

        <div class="patterns">
            <h2>Background patterns</h2>
            <ul>
                <li><a class="pattern-cloth-alike">cloth-alike</a></li>
                <li><a class="pattern-corrugation">corrugation</a></li>
                <li><a class="pattern-diagonal-noise">diagonal-noise</a></li>
                <li><a class="pattern-dust">dust</a></li>
                <li><a class="pattern-fabric-plaid">fabric-plaid</a></li>
                <li><a class="pattern-farmer">farmer</a></li>
                <li><a class="pattern-grid-noise">grid-noise</a></li>
                <li><a class="pattern-lghtmesh">lghtmesh</a></li>
                <li><a class="pattern-pw-maze-white">pw-maze-white</a></li>
                <li><a class="pattern-none">none</a></li>
            </ul>
        </div>

        <div class="colors">
            <h2>Color variants</h2>
            <ul>
                <li><a href="assets/css/realia-red.css" class="red">Red</a></li>
                <li><a href="assets/css/realia-magenta.css" class="magenta">Magenta</a></li>
                <li><a href="assets/css/realia-brown.css" class="brown">Brown</a></li>
                <li><a href="assets/css/realia-orange.css" class="orange">Orange</a></li>
                <li><a href="assets/css/realia-brown-dark.css" class="brown-dark">Brown dark</a></li>

                <li><a href="assets/css/realia-gray-red.css" class="gray-red">Gray Red</a></li>
                <li><a href="assets/css/realia-gray-magenta.css" class="gray-magenta">Gray Magenta</a></li>
                <li><a href="assets/css/realia-gray-brown.css" class="gray-brown">Gray Brown</a></li>
                <li><a href="assets/css/realia-gray-orange.css" class="gray-orange">Gray Orange</a></li>
                <li><a href="assets/css/realia-gray-brown-dark.css" class="gray-brown-dark">Gray Brown dark</a></li>

                <li><a href="assets/css/realia-green-light.css" class="green-light">Green light</a></li>
                <li><a href="assets/css/realia-green.css" class="green">Green</a></li>
                <li><a href="assets/css/realia-turquiose.css" class="turquiose">Turquiose</a></li>
                <li><a href="assets/css/realia-blue.css" class="blue">Blue</a></li>
                <li><a href="assets/css/realia-violet.css" class="violet">Violet</a></li>

                <li><a href="assets/css/realia-gray-green-light.css" class="gray-green-light">Gray Green light</a></li>
                <li><a href="assets/css/realia-gray-green.css" class="gray-green">Gray Green</a></li>
                <li><a href="assets/css/realia-gray-turquiose.css" class="gray-turquiose">Gray Turquiose</a></li>
                <li><a href="assets/css/realia-gray-blue.css" class="gray-blue">Gray Blue</a></li>
                <li><a href="assets/css/realia-gray-violet.css" class="gray-violet">Gray Violet</a></li>
            </ul>
        </div><!-- /.colors -->

        <a href="#" class="btn btn-primary reset">Reset default</a>
    </div><!-- /.inner -->
</div><!-- /.palette -->


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/carousel.js"></script>
{{--<script type="text/javascript" src="assets/js/gmap3.min.js"></script>--}}
{{--<script type="text/javascript" src="assets/js/gmap3.infobox.min.js"></script>--}}
<script type="text/javascript" src="assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
{{--<script type="text/javascript" src="assets/js/realia.js"></script>--}}
</body>
</html>