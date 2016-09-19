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
<script src="index/dist/js/txt.wav.min.js"></script>
<script src="index/js/jquery-ui.min.js"></script>
<script src="index/js/letItSnow.js"></script>
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
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 1
        $("#slider1").responsiveSlides({
            maxwidth: 2500,
            speed: 600
        });
        $('.aa').click(function () {
            $(this).parent().addClass('active');
        });
    });
    $(function launchSnowflakes() {
        $('#snowspawner').letItSnow({
            color: '#fff',
            size_min: 5,
            size_max: 15,
            zindex: 99999,
            maxcount: 100,
            wind: 250,
            easing_x: "easeInBack",
            easing_y: "easeInCubic",
            fall_time: 10000
        });
    })
</script>

