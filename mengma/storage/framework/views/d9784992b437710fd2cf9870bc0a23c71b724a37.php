<!DOCTYPE html>
<html lang="en">

<head>
    <title>商品管理</title>
    <base href="<?php echo e(URL::asset('/')); ?>"/>
    <?php echo $__env->make('admin.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body class=" ">
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">欢迎<font face="Algerian"><?php echo e(session('u_name')); ?></font>登录</div>
        </div>
        <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i>
            <input type="hidden" name="datestart" />
            <input type="hidden" name="endstart" />
        </div>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="portlet box portlet-green">
                    <div class="portlet-header">
                        <div class="caption">商品图片添加</div>
                    </div>
                    <form method="post" class="form-horizontal"  action="admin/addGoodsImg" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="gid" value="<?php echo e($gid); ?>">
                        <input id="file-4" type="file"name="gimg[]" multiple class="file" data-upload-url="#">
                        
                        <input type="submit" class="btn btn-success btn-block" value="添加图片" >
                    </form>
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="portlet-header">
                        <div class="caption">商品图片管理</div>
                    </div>
                    <div class="portlet-body">
                        <div class="gallery-pages">
                            <div class="clearfix"></div>
                            <div class="row mix-grid">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="col-md-3 mix photography">
                                        <div class="hover-effect">
                                            <div class="img"><img src="<?php echo e(URL::asset($v->gimg)); ?>" alt="" class="img-responsive" />
                                            </div>
                                            <div class="info">
                                                <h3>Pellentesque vehicula</h3><a  class="mix-link del" iid="<?php echo e($v->iid); ?>"><i class="glyphicon glyphicon-link"></i></a><a href="<?php echo e(URL::asset($v->gimg)); ?>" data-lightbox="image-1" data-title="Image 1" class="mix-zoom"><i class="glyphicon glyphicon-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END CONTENT-->
    </div>
<input type="hidden" name="message" value="<?php echo e(session('message')); ?>" id="message">
<?php echo $__env->make('admin.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
<script>
    var message=$('#message').val();
    if(message!==""){
        layer.msg(message, {icon:6 });
    }
    $('.del').click(function(){
        var _this=$(this);
        var iid=$(this).attr('iid');
        $.getJSON('admin/delGoodsImg',{iid:iid},function(msg){
            if(msg==1){
                _this.parents('.photography').remove();
                layer.msg("删除成功！", {icon:6 });
            }else{
                layer.msg("删除失败！", {icon:5 });
            }
        });
    })
</script>