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
            <div class="page-title">欢迎<font face="Algerian"><?php echo e(session('uname')); ?></font>登录</div>
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
                <div class="panel panel-grey">
                    <div class="panel-heading">商品管理</div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="bg-blue text-center">
                            <tr>
                                <th class="text-center">商品编号</th>
                                <th class="text-center">商品名称</th>
                                <th class="text-center">商品分类</th>
                                <th class="text-center">商品图片</th>
                                <th class="text-center">商品价格</th>
                                <th class="text-center">商品浏览</th>
                                <th class="text-center">商品销售</th>
                                <th class="text-center">商品库存</th>
                                <th class="text-center">所在地区</th>
                                <th class="text-center">详细地址</th>
                                <th class="text-center">删除</th>
                                <th class="text-center">编辑</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="text-center">
                                    <td class="gid"><?php echo e($v->gid); ?></td>
                                    <td><?php echo e($v->gname); ?></td>
                                    <td><?php echo e($v->nname); ?></td>
                                    <td><a href="admin/loadGoodsImg?gid=<?php echo e($v->gid); ?>">商品图片</a></td>
                                    <td><?php echo e($v->gprice); ?></td>
                                    <td><?php echo e(isset($v->gvisit) ? $v->gvisit : "NULL"); ?></td>
                                    <td><?php echo e(isset($v->gsell) ? $v->gsell : "NULL"); ?></td>
                                    <td><?php echo e($v->gstock); ?></td>
                                    <td><?php echo e($v->gaddress); ?></td>
                                    <td><?php echo e($v->ghome); ?></td>
                                    <td>
                                        <span class="label label-sm label-danger del">删除</span>
                                    </td>
                                    <td>
                                        <a href="admin/loadGoodsEdit?gid=<?php echo e($v->gid); ?>" class="label label-sm label-success">修改</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
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
        var gid=$(this).parents('tr').find('.gid').html();
        $.getJSON('admin/goodsDel',{gid:gid},function(msg){
            if(msg==1){
                _this.parents('tr').remove();
                layer.msg("删除成功！", {icon:6 });
            }else{
                layer.msg("系统异常，请联系管理员！", {icon:6 });
            }
        });
    })
</script>