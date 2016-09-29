<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <base href="{{URL::asset('/')}}">
    <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM" />
    <link href="index/css/b780e.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="http://www.qyer.com/favicon.ico" />
    <script type="text/javascript" src="index/Scripts/f1753d9d1e4645ca9ce2ffdcb679920f.js"></script>
    @include('index.public.style')
</head>
<body>
@include('index.public.header')
<div class="qyWrap user-accounts">
    <div class="accounts-head">
        <h2>找回密码</h2>
    </div>
    <div class="accounts-body">
        <div class="qui-login-section">
            <div class="qui-login-form">
                <form id="findPasswordForm" action="login/pass_Check" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="qui-login-input input-control input-control-register-mail">
                        <a href="javascript:;" class="icon-clear"></a>
                        <input type="text" class="ui3_input field_valid" name="mail_input" id="email" title="邮箱" tabindex="1" placeholder="输入用于登录的邮箱地址" value="">

                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input input-control-validcode">
                        <input type="text" class="ui3_input field_valid input_check_code fl" name="valid_code" maxlength="5" tabindex="2" title="验证码" placeholder="验证码">
                    <span class="check_code fr" style="width: 125px;">
                        <a href="javascript:;" title="换一换"><img src="{{URL('login/verify/1')}}" onclick="this.src='{{URL('login/verify')}}/'+Math.random()"></a>
                    </span>
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input input-control input-control-register-mail">
                        <input type="text" class="ui3_input field_valid input_check_code fl" maxlength="6" name="mail_valid_code" title="邮箱验证码" tabindex="3" placeholder="输入邮件中的验证码">
                        <a href="javascript:;" class="ui_button button_code fr" id="code" data-type="mail"><span>发送验证码</span></a>
                        <div class="message-box"></div>
                    </div>
                    <div class="qui-login-input qui-login-btn">
                        <input type="submit" class="ui_button btn_submit" value="完成验证">
                        <div class="message-box">
                        <span>
                            没有邮箱账号？ <a class="change-login-type" href="/?action=getmobilepass">手机号找回</a>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="phpreferer" style="display: none;"></div>
<div class="qyer_footer">
    @include('index.public.foot')
</div>


<script type="text/javascript">

    $('#code').click(function () {
        email=$('#email').val();

        $.get('login/send',{email:email},function (msg) {

        })
    })

</script>
</body>
</html>