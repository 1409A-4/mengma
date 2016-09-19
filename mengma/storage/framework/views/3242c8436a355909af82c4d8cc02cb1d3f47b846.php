<!DOCTYPE HTML>
<head>
    <title>自由行</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>
    <link rel="stylesheet" type="text/css" href="css/hotel_car1.css">
    <script src="js/frame.hotel_car1.js"></script>
    <script src="js/respond.min.js"></script>
    <?php echo $__env->make('index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<!---start-header---->
<?php echo $__env->make('.index.public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<body class="">

<div class="zw-module-banner-wrap" style="background-image:url('images/be.png')">
    <ul class="zw-module-banner-imglist clearfix">
        <li class="banner-img-cell">
            <a class="banner-img-cell-link" href="http://z.qyer.com/zt/sbgg0601/?campaign=pdbanner&category=sbgg0601" target="_blank" data-bn-ipg="zsj-banner-pos1" style="background-image:url('images/be.png')"></a>
        </li>
    </ul>
</div>
<!-- 头图 end -->

<!-- 大卡片区域 -->
<div class="zw-module-productlist-unit freetour">
    <div class="zw-module-bigcard-wrap clearfix">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="zw-module-bigcard-item ">
            <a href="hotelCarin?p_id=<?php echo e($da['p_id']); ?>"  data-bn-ipg="zsj-pos1-pic-lm79807">
                <img class="zw-module-bigcard-itemimg" src="<?php echo e($da['p_img']); ?>" data-original="images/420x280.jpg" width="356" height="240" title="" alt="">
            </a>
            <div class="zw-module-bigcard-iteminfo clearfix ">
                <div class="infotype-wrap">
                    <span class="zw-module-bigcard-infotype">自由行</span>
                    <i class="zwui-iconfont icon-local2"></i>
                    <span class="zw-module-bigcard-infoplace"><?php echo e($da['p_name']); ?></span>
                    <div class="zw-module-bigcard-infonum"><span>67505</span>次浏览<span>199</span>件已售</div>
                </div>
                <div class="zw-module-bigcard-tag-wrap">
                    <div class="zw-module-bigcard-h2ul-wrap">
                        <h2>
                            <a href="hotelCarin?p_id=<?php echo e($da['p_id']); ?>" title="<?php echo e($da['p_abstract']); ?>"><?php echo e($da['p_abstract']); ?></a>
                        </h2>
                        <ul class="zw-module-bigcard-flightproperty clearfix">
                        </ul>
                    </div>
                    <ul class="zw-module-bigcard-servicetag clearfix">
                        <li>赠接送机</li>
                    </ul>
                    <div class="zw-module-bigcard-price"><span class="line">3299元</span><em><?php echo e($da['p_price']); ?></em>元起</div>
                </div>
                <div class="zw-module-bigcard-bottombar">
                    <div class="zw-module-bigcard-datebar">旅行时间：&nbsp;<?php echo e($da['p_time']); ?></div>
                    <a class="zw-module-bigcard-btn" href="hotelCarin?p_id=<?php echo e($da['p_id']); ?>">立即预订</a>
                </div>
            </div>
        </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>

</div>

<!-- 通用dock 开始 -->
<div class="zw-module-dock-wrap">
    <div class="zw-module-dock-comm clearfix">
        <ul class="dock-nav"></ul>
    </div>
</div>
<!-- 通用dock end -->


<?php echo $__env->make('index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

