<div id="snowspawner"></div>
<div class="header" >
    <div class="wrap">
        <div class="logo">
            <a href="{{url('/')}}"><img src="index/images/mengma.jpg" title="logo" height="45"/></a>
        </div>
        <div class="top-nav">
            <ul>
                <li ><a href="{{url('/')}}">首页</a></li>
                <li ><a href="hotelCar">自由行</a></li>
                <li ><a href="hotel">酒店</a></li>
             <span class="loginin">
                @if(session('name'))
                    <li><a href="index/center" class="nav2" style="text-decoration:none" >用户中心</a></li>
                    <li><a class="nav3" style="text-decoration:none">退出</a></li>
                @else
                    <li><a  data-toggle="modal"  id="one">注册</a></li>
                    <li><a  data-toggle="modal"  id="two">登录</a></li>
                @endif
</span>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>


{{--登录注册--}}
<div class="modal fade "  id="forlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="myModalLabel">猛犸登录</h2>
            </div>
            <div class="modal-body bg-success ">
                <form class="form-horizontal" role="form" id="loginForm" >
                    <div class="form-group ">
                        <label class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required,custom[email]]" name="username" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control validate[required,minSize[4],maxSize[15]]" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button type="button" class="btn btn-default"id="regis">注册</button>
                            <button type="button" class="btn btn-default login_button">登录</button>
                             <span class="forget input-control input-control-login-mail">
                                <a  href="login/forget" target="_blank">忘记密码</a>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <div class="otherlogin">
                                <script type="text/javascript" src="http://open.51094.com/user/myscript/157a481067e6d3.html "></script>
                                {{--<script src="js/jquery.min.js"></script>--}}
                                <span id="hzy_fast_login"></span>
                                <a href="http://123.56.88.15/yanan/demo/index.php"><img src="./images/weixin.png" style="width: 32px;height: 32px" alt=""></a>

                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<div class="modal fade "  id="forregister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="myModalLabel">猛犸注册</h2>
            </div>
            <div class="modal-body bg-success ">
                <form class="form-horizontal" role="form" id="registerForm">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group ">
                        <label for="inputEmail3" class="col-sm-2 control-label">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control validate[required,custom[email],]" name="u_email"  placeholder="Email" id="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">邮箱验证</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control validate[required,maxSize[6]]" name="mail_valid_code"  placeholder="输入邮件中的验证码">
                        </div>
                        <div class="col-sm-5">
                            <input type="button" class="btn btn-default" id="code" value="获取验证码">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="inputEmail3" class="col-sm-2 control-label">用&nbsp;&nbsp;户&nbsp;&nbsp;名</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required,minSize[6]]" name="u_name"  placeholder="请填写用户名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control validate[required,minSize[4],custom[onlyLetterNumber]]" name="u_pwd" id="u_pwd" placeholder="请填写密码">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control validate[required,equals[u_pwd]]" name="r_pwd"  placeholder="请确认密码">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button type="button" class="btn btn-default" id="loginn">登录</button>
                            <button type="button" class="btn btn-default regis_button">注册</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
