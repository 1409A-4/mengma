
<!DOCTYPE HTML>
<html id="body">
<head>
    <title>首页</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>

    <?php echo $__env->make('.index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body style="background-color: black" >
<div id="snowspawner"></div>
<!---start-header---->
<?php echo $__env->make('.index.public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!---End-header---->
<!--start-image-slider---->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($k==0): ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo e($k); ?>" class="active"></li>
        <?php else: ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo e($k); ?>"></li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ol>


    <div class="carousel-inner">
        <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php if($k==0): ?>
                <div class="item active ">
                    <img src="<?php echo e(URL::asset($v->gimg)); ?>" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><?php echo e($v->gname); ?></h1>
                            <p><a class="btn btn-primary" href="#" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="item ">
                    <img src="<?php echo e(URL::asset($v->gimg)); ?>" style="width:100%;height:500px" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><?php echo e($v->gname); ?>   </h1>
                            <p><a class="btn  btn-primary" href="#" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        
            
            
                
                    
                    
                    
                
            
        
        
            
            
                
                    
                    
                    
                
            
        
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-arrow-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-arrow-right"></span></a>
</div><!-- /.carousel -->

<!---start-content---->

<div class="row">
    <div class="specials-heading">
        <h3><div class="txtwav flip">国内游 </div></h3>
    </div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="<?php echo e(URL::asset($v->gimg)); ?>"
                 alt="通用的占位符缩略图">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo e($v->gname); ?></h1>
                    <p><a class="btn btn-primary" href="#" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<div class="row">
    <div class="specials-heading">
        <h3><div class="txtwav flip">热门景点 </div></h3>
    </div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="<?php echo e(URL::asset($v->gimg)); ?>"
                     alt="通用的占位符缩略图">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo e($v->gname); ?></h1>
                        <p><a class="btn btn-primary" href="#" role="button"><span class="glyphicon glyphicon-eye-open"></span>了解更多</a></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>

<!---End-content---->
</body>
<?php echo $__env->make('.index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>



