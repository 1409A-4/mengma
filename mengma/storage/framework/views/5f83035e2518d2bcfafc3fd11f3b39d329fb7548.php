<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <base href="<?php echo e(URL::asset('/')); ?>">
    <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM" />
    <link href="index/css/b780e.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico" />
  
    <?php echo $__env->make('index.public.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<?php echo $__env->make('index.public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main">
    <div class="login-container">
        <div class="wrapper">
            <div class="login-logo">

                <span class="title">登录</span>
            </div>
            <div class="section">
                <?php if(count($errors) > 0): ?>
                    <div >
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="qui-login-section section-login">
                    <div class="qui-login-tabs">
                        <a class="change-tab change-login-type change-login-mail current" href="javascript:;" data-action="login" data-type="mail" data-bn-ipg="web-login-page-tab-mail">账号登录</a>

                    </div>

                    <div class="qui-login-form">
                        <form id="loginForm" action="login/loginin"  method="post" >
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="qui-login-input input-control input-control-login-mail">
                                <a href="javascript:;" class="icon-clear"></a>
                                <input type="text" class="ui3_input field_valid" name="username" tabindex="1" title="邮箱/手机号"  placeholder="邮箱/手机号" autocomplete="off" >

                                <div class="message-box"></div>
                            </div>

                            <div class="qui-login-input input-control input-control-login-mail">
                                <input type="password" class="ui3_input field_valid" name="password" title="密码" tabindex="2" placeholder="密码" autocomplete="off">
                                <div class="message-box"></div>
                            </div>


                            <div class="qui-login-input qui-login-btn posr">
                                <input type="submit" class="ui_button " tabindex="5" value="登录" data-value="登录">
                                <div class="message-box">
                            <span class="fl">
                                <input id="remember" name="remember" type="checkbox" tabindex="4" class="vm" checked="checked"> <label for="remember" class="vm">记住我</label>
                            </span>
                            <span class="forget input-control input-control-login-mail">
                                <a class="remember-link" href="login/forget" target="_blank" data-bn-ipg="web-login-page-getpassword">忘记密码</a>
                            </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="qui-login-otherlogin">
                        <div class="otherlogin">
                            <script type="text/javascript" src="http://open.51094.com/user/myscript/157a481067e6d3.html "></script>
                            <script src="js/jquery.min.js"></script>
                            <span id="hzy_fast_login"></span>
                            <a href="http://123.56.88.15/yanan/demo/index.php"><img src="./images/weixin.png" style="width: 32px;height: 32px" alt=""></a>

                        </div>
                    </div>
                    <div class="qui-login-link-register gray">
                        <a class="fr" href="login/register" data-bn-ipg="web-login-page-register">立即注册</a>
                        <a class="gray" href="/?action=usernamelogin&refer=http://z.qyer.com/?utm_source=baidusemp">用户名登录</a> |
                        <a class="gray" href="/?action=aboard&refer=http://z.qyer.com/?utm_source=baidusemp">境外手机号登录</a>
                    </div>
                    <div class="section-message-box"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="phpreferer" style="display: none;"></div>
<div class="qyer_footer">
    <?php echo $__env->make('.index.public.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


<script type="text/javascript">

</script>
</body>
</html>