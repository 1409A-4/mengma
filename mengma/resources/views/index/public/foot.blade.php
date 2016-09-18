<div class="clear"> </div>
<!---start-footer---->
<div class="footer">
    <div class="wrap">
        <div class="footer-grids">
            <div class="footer-grid">
                <h3>EXTRAS</h3>
                <p>Ut rutrum neque a mollis laoreet diam enim feuiat dui nec ulacoper quam felis id diam. Nunc ut tortor ligula eu petiu risus. Pelleesque conquat dignissim lacus quis altrcies.</p>
            </div>
            <div class="footer-grid">
                <h3>RECENT POSTS</h3>
                <ul>
                    <li><a href="#">Vestibulum felis</a></li>
                    <li><a href="#">Mauris at tellus</a></li>
                    <li><a href="#">Donec ut lectus</a></li>
                    <li><a href="#">vitae interdum</a></li>
                </ul>
            </div>
            <div class="footer-grid">
                <h3>USEFUL INFO</h3>
                <ul>
                    <li><a href="#">Hendrerit quam</a></li>
                    <li><a href="#">Amet consectetur </a></li>
                    <li><a href="#">Iquam hendrerit</a></li>
                    <li><a href="#">Donec ut lectus </a></li>
                </ul>
            </div>
            <div class="footer-grid footer-lastgrid">
                <h3>CONTACT US</h3>
                <p>Pelleesque conquat dignissim lacus quis altrcies.</p>
                <div class="footer-grid-address">
                    <p>Tel.800-255-9999</p>
                    <p>Fax: 1234 568</p>
                    <p>Email:<a class="email-link" href="#">info(at)yourcompany.com</a></p>
                </div>
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

