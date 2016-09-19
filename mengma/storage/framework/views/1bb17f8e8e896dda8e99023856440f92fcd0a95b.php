<!DOCTYPE HTML>
<head>
    <title>酒店</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>
    <?php echo $__env->make('index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<!---start-header---->
<?php echo $__env->make('.index.public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>

