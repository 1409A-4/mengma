<!DOCTYPE HTML>
<head>
    <title>酒店</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>
    <?php echo $__env->make('index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <li ><a href="<?php echo e(url('/')); ?>">首页</a></li>
                <li><a href="">机票</a></li>
                <li class="active"><a href="hotel">酒店</a></li>
                <li ><a href="hotelCar">自由行</a></li>
                <?php if(session('name')): ?>
                    <li><a href="<?php echo e(URL('index/center')); ?>" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a href="<?php echo e(URL('login/loginout')); ?>" class="nav3" style="text-decoration:none">退出</a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('login/register')); ?>">注册</a></li>
                    <li><a href="<?php echo e(url('login/login')); ?>">登录</a></li>
                <?php endif; ?>

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>

<?php echo $__env->make('index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

