jQuery("<div class='ui_upward_wrapper' id='ui_gotop'><div class='ui_upward_icon'>回页顶</div></div>").prependTo("body"), jQuery(function (o) {
    var i = o("#ui_gotop"), t = i.innerHeight(), r = o(document), e = o(window), n = o(".qyer_footer"), a = n.height(), d = n.length;
    e.on("scroll", function () {
        var o = r.width(), n = r.height(), p = (e.width(), e.height()), l = p - t - 30, c = (o - 980) / 2 + 1010, s = 10;
        if (d) {
            var u = n - a - r.scrollTop();
            p > u && (l = u - t - 30)
        }
        0 == r.scrollTop() ? i.fadeOut(300) : o > 1200 ? i.css({
            left: c,
            right: "auto",
            top: l
        }).fadeIn(300) : i.css({left: "auto", right: s, top: l}).fadeIn(300)
    });
    var p = navigator.appName, l = navigator.appVersion, c = !1;
    "Microsoft Internet Explorer" != p || -1 == l.indexOf("MSIE 7.0") && -1 == l.indexOf("MSIE 8.0") || (c = !0), i.click(function () {
        c ? r.scrollTop(0) : o("body,html").animate({scrollTop: 0})
    })
});