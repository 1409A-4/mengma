<div class="header" >
    <div class="wrap">
        <div class="logo">
            <a href="<?php echo e(url('/')); ?>"><img src="index/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                
                <li ><a href="<?php echo e(url('/')); ?>">首页</a></li>
                <li><a href="">机票</a></li>
                <li ><a href="hotel">酒店</a></li>
                <li ><a href="hotelCar">自由行</a></li>
                <?php if(session('name')): ?>
                    <li><a href="index/center" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a href="login/loginout" class="nav3" style="text-decoration:none">退出</a></li>
                <?php else: ?>
                    <li><a href="login/register">注册</a></li>
                    <li><a href="login/login">登录</a></li>
                <?php endif; ?>

            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>