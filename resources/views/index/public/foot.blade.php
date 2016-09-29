<div class="clear"> </div>
<!---start-footer---->
<div class="footer" >
    <div class="wrap">
        <div class="footer-grids">
            <div class="footer-grid">
                <h3>猛犸</h3>
                <p>猛犸是一家及旅游，餐饮，传媒，猎头，金融等于一身的大型跨国集团。猛犸创立于18世纪末，创始人zhangdi。</p>
            </div>
            <div class="footer-grid">
                <h3>猛犸集团</h3>
                <ul>
                    <li><a>猛犸旅途</a></li>
                    <li><a>猛犸酒店</a></li>
                    <li><a>猛犸电影</a></li>
                    <li><a>猛犸证券</a></li>
                </ul>
            </div>
            <div class="footer-grid">
                <h3>猛犸旅途</h3>
                <ul>
                    <li><a>猛犸商城</a></li>
                    <li><a>猛犸招聘</a></li>
                    <li><a>猛犸文化</a></li>
                    <li><a>猛犸学院</a></li>
                </ul>
            </div>
            <div class="footer-grid">
                <h3>联系我们</h3>
                <ul>
                    <li><a>邮箱：123@qq.com</a></li>
                    <li><a>固话：010-8888888</a></li>
                    <li><a>手机：15966666666</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!---End-footer---->
<div class="clear"> </div>
<script src="index/js/responsiveslides.min.js"></script>
<script src="index/layer/layer.js"></script>
<script src="index/dist/js/txt.wav.min.js"></script>
<script src="index/js/jquery-ui.min.js"></script>
<script src="index/js/letItSnow.js"></script>
<script src="assets/js/jquery.validationEngine.js"></script>
<script src="assets/js/jquery.validationEngine-zh_CN.js"></script>
<script language="javascript" type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

<script>
    $('a').hover(function(){
        $('a').removeClass('animated rotateIn ');
        $(this).addClass('animated rotateIn ');
    })
    $('img').hover(function(){
        $('img').removeClass('animated flip ');
        $(this).addClass('animated flip ');

    })
    $('p').hover(function(){
        $('p').removeClass('animated bounceIn ');
        $(this).addClass('animated bounceIn ');
    })
    $('h1').hover(function(){
        $('h1').removeClass('animated fadeInLeftBig ');
        $(this).addClass('animated fadeInLeftBig ');
    })
    $('h3').hover(function(){
        $('h3').removeClass('animated lightSpeedIn ');
        $(this).addClass('animated lightSpeedIn ');
    })

    /*
    * 注册
    * */
    $(document).on('click','#one',function () {
        $('#forregister').modal('show');
    })
    /*
    * 登录
    * */
    $(document).on('click','#two',function () {
        $('#forlogin').modal('show');
    });
    //验证登录
    $('#loginForm').validationEngine();

    $(document).on('click','.login_button',function () {
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
            }
        });
        var params = $("#loginForm").serialize();

            // 发送登录的异步请求
        $.post("/login/loginin", params, function(msg){
            if(msg==1){
                $('#forlogin').modal('hide');
                $('.buttt').attr('type','submit');
                $('#sess').attr('value','222');
                $('.loginin').html(" <li><a href=\"index/center\" class=\"nav2\" style=\"text-decoration:none\" >用户中心</a></li> <li><a href=\"javascript:;\" class=\"nav3\" style=\"text-decoration:none\">退出</a></li>");
            }else if(msg==2){
                layer.msg('邮箱或密码错误！', {icon: 6});
            }
        });
    });


    //验证注册
    $('#registerForm').validationEngine();

    // 倒计时邮箱验证
    $(document).delegate('#code','click',function(){
        var  email=$('#email').val();
        if(email==""){
            layer.msg('亲，邮箱不合法！', {icon: 5});
            return false;
        }
        $.get('login/send',{email:email},function (msg) {

        })
        var wait=60;
        function time(o) {
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value="获取验证码";
                wait = 60;
            } else {
                o.setAttribute("disabled", true);
                o.value="("+wait+")秒后可重新发送";
                wait--;
                setTimeout(function() {
                            time(o)
                        },1000)
            }
        };time(this)
    });

    $(document).on('click','.regis_button',function () {
        var params = $("#registerForm").serialize();

        // 发送注册的异步请求gis
        $.post("/login/regis", params, function(msg){
           // alert(msg);
            switch (msg){
                case '1':$('#forregister').modal('hide');
                    layer.msg('注册成功！', {icon: 6});
                    $('.loginin').html(" <li><a href=\"index/center\" class=\"nav2\" style=\"text-decoration:none\" >用户中心</a></li> <li><a  class=\"nav3\" style=\"text-decoration:none\">退出</a></li>");

                    break;
                case '2':layer.msg('注册失败！', {icon: 5});
                    break;
                case '3':layer.msg('邮箱验证失败！', {icon: 5});
                    break;
                case '4':layer.msg('信息填写有误！', {icon: 5});
                    break;
                default:layer.msg('哦呦出错了！', {icon: 5});
                    break;
            }

        });
    });

    //退出登录
    $(document).on('click','.nav3',function () {
        var pack = $('#pack').val();

        $.get('login/loginout',function (msg) {
            if(msg==1){
                $('.buttt').attr('type','button');
                $('.loginin').html("<li><a  data-toggle=\"modal\" data-target=\"#forregister\">注册</a></li><li><a  data-toggle=\"modal\" data-target=\"#forlogin\">登录</a></li>");
                layer.msg ("退出成功！", {icon: 6});
                if(pack=='aaa'){
                    location.href='/';
                }
            }
        })
    });
    /*
    *判断登录
    **/
    $(document).on('click','#butt',function () {
      var but = $(this).attr('type');
     $.get('checkLogin',function (msg) {
         if(msg==0){
            $('#forlogin').modal('show');
         }
     });
      if(but!='submit'){
     $('#forlogin').modal('show');
     }

     });

    //注册
    $(document).on('click','#regis',function () {
        $('#forlogin').modal('hide');
        $('#forregister').modal('show');
    });
    //登录
    $(document).on('click','#loginn',function () {

        $('#forregister').modal('hide');
        $('#forlogin').modal('show');
    });
</script>

