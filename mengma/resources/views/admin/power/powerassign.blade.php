<!DOCTYPE html>
<html lang="en">

<head>
    <title>权限分配</title>
    <base href="{{URL::asset('/')}}"/>
    @include('admin.public.style')
</head>

<body >
@include('admin.public.head')
        <!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">欢迎<font face="Algerian">{{session('u_name')}}</font>登录</div>
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
                    <div class="panel-heading">权限分配</div>
                    <form action="admin/powerAssign" method="post" class="form-horizontal">
                        <div class="panel-body pan">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-md-3 control-label">选择角色<span class='require'>*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select  class="selectpicker bg-green form-control" name="rid" id="rid">
                                            <option value="选择角色">选择角色</option>
                                            @foreach($role as $k=>$v)
                                                <option value="{{$v->rid}}">{{$v->rname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="roles">
                                    <label for="inputUsername" class="col-md-3 control-label">选择权限 <span class='require'>*</span>
                                    </label>
                                    <div class="col-md-9">
                                        @foreach($power as $k=>$v)
                                            <input type="checkbox"  name="pid[]" value="{{$v->pid}}" />&nbsp; {{$v->pname}}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-3 control-label"> <span class='require'></span>
                                    </label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">分配</button>&nbsp;
                                        <button type="reset" class="btn btn-green">取消</button>
                                    </div>

                                </div>

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END CONTENT-->
</div>
<input type="hidden" name="message" value="{{session('message')}}" id="message">
</div>
<!--END FOOTER-->
<!--END PAGE WRAPPER-->
</div>
</div>
<script src="j.js"></script>

<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<script src="vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="vendors/iCheck/icheck.min.js"></script>
<script src="vendors/iCheck/custom.min.js"></script>
<script src="vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="vendors/jquery-highcharts/highcharts.js"></script>
<script src="js/jquery.menu.js"></script>
<script src="vendors/jquery-pace/pace.min.js"></script>
<script src="vendors/holder/holder.js"></script>
<script src="vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="vendors/moment/moment.js"></script>
<script src="vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<!--LOADING SCRIPTS FOR PAGE-->
<script src="vendors/mixitup/src/jquery.mixitup.js"></script>
<script src="vendors/lightbox/js/lightbox.min.js"></script>
<script src="js/page-gallery.js"></script>
<script src="js/area.ui.js"></script>
<script src="jsupload/js/fileinput.js" type="text/javascript"></script>
<script src="jsupload/js/fileinput_locale_zh.js" type="text/javascript"></script>
<!--CORE JAVASCRIPT-->
<script src="layer/layer.js"></script>
<script src="js/main.js"></script>

</body>
</html>
<script >
    var message=$('#message').val();
    if(message!==""){
        layer.msg(message, {icon:6 });
    }
    /*
    * 查看当前角色所拥有权限
    * */
    $('#rid').change(function(){
        var pid=document.getElementsByName('pid[]');
        for(var xh=0;xh< pid.length;xh++){
            pid[xh].checked=false;
        }
        var rid=$(this).val()
        if(rid=="选择角色"){
            layer.msg('请选择角色！', {icon:6 });
        }else{
            $.getJSON('admin/rolePower',{rid:rid},function(msg){
                for(var xh=0;xh< pid.length;xh++){
                    for( i in msg){
                        if(pid[xh].value==msg[i]){
                            pid[xh].checked=true;
                        }
                    }
                }
            })
        }
    })

</script>