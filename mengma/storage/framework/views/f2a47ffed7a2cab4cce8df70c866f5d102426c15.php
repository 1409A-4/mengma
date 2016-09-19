<!DOCTYPE html>
<html lang="en">

<head>
    <title>后台管理</title>
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
            <div class="page-title">欢迎<font face="Algerian"></font>登录</div>
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="text-center mbl"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" class="img-circle" />
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td width="50%">账户</td>
                                <td><span class="label label-info"><?php echo e(session('uname')); ?></span></td>
                            </tr>
                            <tr>
                                <td width="50%">邮箱</td>
                                <td><span class="label label-pink"><?php echo e($data->uemail); ?></span></td>
                            </tr>
                            <tr>
                                <td width="50%">注册时间</td>
                                <td><span class="label label-primary"><?php echo e($data->ubtime); ?></span></td>
                            </tr>
                            <tr>
                                <td width="50%">上次登录</td>
                                <td><span class="label label-success"><?php echo e($data->uetime); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">登录IP</td>
                                <td><span class="label label-dark"><?php echo e($data->uip); ?></span></td>
                            </tr>
                            <tr>
                                <td width="50%">状态</td>
                                <td>
                                    <?php if($data->ustatus==1): ?>
                                        <span class="label label-success">正常</span>
                                        <?php else: ?>
                                        <span class="label label-danger">正常</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">修改密码</div>
                            <div class="panel-body pan">
                                <form action="admin/setPwd" class="form-horizontal" method="post">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="form-body pal">
                                        <div class="form-group">
                                                <div class="input-icon right"><i class="fa fa-lock"></i>
                                                    <input id="inputPassword" type="password" placeholder="原密码"id="u_pwd" name="upwd" class="form-control" />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-body pal">
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                <input id="inputPassword" type="password" placeholder="新密码"name="urepwd" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body pal">
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                <input id="inputPassword" type="password" placeholder="确认新密码"name="urerepwd" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
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