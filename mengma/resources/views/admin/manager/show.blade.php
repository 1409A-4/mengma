<!DOCTYPE html>
<html lang="en">

<head>
    <title>管理员管理</title>
    <base href="{{URL::asset('/')}}"/>
    @include('admin.public.style')
</head>

<body class=" ">
@include('admin.public.head')
        <!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">欢迎<font face="Algerian">{{session('uname')}}</font>登录</div>
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
                    <div class="panel-heading">管理员管理</div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="bg-blue text-center">
                            <tr>
                                <th class="text-center">编号</th>
                                <th class="text-center">账户</th>
                                <th class="text-center">邮箱</th>
                                <th class="text-center">头像</th>
                                <th class="text-center">注册时间</th>
                                <th class="text-center">最后登录</th>
                                <th class="text-center">删除</th>
                                <th class="text-center">编辑</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)
                                <tr class="text-center">
                                    <td class="uid">{{$v['uid']}}</td>
                                    <td>{{$v['uname']}}</td>
                                    <td>{{$v['uemail']}}</td>
                                    <td><img src="{{URL::asset($v->uimg)}}" width="50px" height="30px"></td>
                                    <td>{{$v['ubtime']}}</td>
                                    <td>{{$v['uetime']}}</td>
                                    <td>
                                        <span class="label label-sm label-danger del">删除</span>
                                    </td>
                                    <td>
                                        <a href="admin/loadManagerEdit?uid={{$v['uid']}}" class="label label-sm label-success">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
</div>
<input type="hidden" name="message" value="{{session('message')}}" id="message">
@include('admin.public.foot')
</body>
</html>
<script>
    var message=$('#message').val();
    if(message!==""){
        layer.msg(message, {icon:6 });
    }
    $('.del').click(function(){
        var _this=$(this);
        var uid=$(this).parents('tr').find('.uid').html();
        $.getJSON('admin/managerDel',{uid:uid},function(msg){
            if(msg==1){
                _this.parents('tr').remove();
                layer.msg("删除成功！", {icon:6 });
            }else{
                layer.msg("系统异常，请联系管理员！", {icon:6 });
            }
        });
    })
</script>