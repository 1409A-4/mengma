<!DOCTYPE html>
<html lang="en">

<head>
    <title>分类添加</title>
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
        <div id="page-user-profile" class="row">
            <div class="col-md-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">分类添加</div>
                    <div class="panel-body pan">
                        <form action="admin/classifyAdd" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-3 control-label">分类名称 <span class='require'>*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-icon"><i class="fa fa-indent"></i>
                                            <input id="inputUsername" type="text" placeholder="分类名称" name="nname" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-md-3 control-label">选择父类 <span class='require'>*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select  class="selectpicker bg-green form-control" name="pid">
                                            <option value="0">选择父类</option>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option style="padding-left: <?php echo e($v['count']); ?>cm" value="<?php echo e($v['nid']); ?>"><?php echo e($v['nname']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-3 control-label">分类排序 <span class='require'>*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-icon"><i class="fa fa-indent"></i>
                                            <input id="inputUsername" type="text" placeholder="分类排序" name="nsort" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">添加</button>&nbsp;
                                    <button type="reset" class="btn btn-green">取消</button>
                                </div>
                            </div>
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
</script>