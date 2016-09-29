var util = {
    getwordlen: function () {
        var n = function (n) {
            if ("undefined" == typeof n)return 0;
            var r = n.match(/[^\x00-\x80]/g);
            return n.length + (r ? r.length : 0)
        }, r = function (n) {
            return n.replace(/[^\x00-\xff]/g, "*")
        };
        return function (t, e) {
            return e && (t = r(t)), n(jQuery.trim(t))
        }
    }()
};
!function (t) {
    function i(t, i, e) {
        var s = parseInt(t.css("top"), 10);
        if ("left" == i) {
            var a = "-" + this.image_wrapper_height + "px";
            t.css("top", this.image_wrapper_height + "px")
        } else {
            var a = this.image_wrapper_height + "px";
            t.css("top", "-" + this.image_wrapper_height + "px")
        }
        return e && (e.css("bottom", "-" + e[0].offsetHeight + "px"), e.animate({bottom: 0}, 2 * this.settings.animation_speed)), this.current_description && this.current_description.animate({bottom: "-" + this.current_description[0].offsetHeight + "px"}, 2 * this.settings.animation_speed), {
            old_image: {top: a},
            new_image: {top: s}
        }
    }

    function e(t, i, e) {
        var s = parseInt(t.css("left"), 10);
        if ("left" == i) {
            var a = "-" + this.image_wrapper_width + "px";
            t.css("left", this.image_wrapper_width + "px")
        } else {
            var a = this.image_wrapper_width + "px";
            t.css("left", "-" + this.image_wrapper_width + "px")
        }
        return e && (e.css("bottom", "-" + e[0].offsetHeight + "px"), e.animate({bottom: 0}, 2 * this.settings.animation_speed)), this.current_description && this.current_description.animate({bottom: "-" + this.current_description[0].offsetHeight + "px"}, 2 * this.settings.animation_speed), {
            old_image: {left: a},
            new_image: {left: s}
        }
    }

    function s(t, i, e) {
        var s = t.width(), a = t.height(), n = parseInt(t.css("left"), 10), r = parseInt(t.css("top"), 10);
        return t.css({
            width: 0,
            height: 0,
            top: this.image_wrapper_height / 2,
            left: this.image_wrapper_width / 2
        }), {
            old_image: {width: 0, height: 0, top: this.image_wrapper_height / 2, left: this.image_wrapper_width / 2},
            new_image: {width: s, height: a, top: r, left: n}
        }
    }

    function a(t, i, e) {
        return t.css("opacity", 0), {old_image: {opacity: 0}, new_image: {opacity: 1}}
    }

    function n(t, i, e) {
        return t.css("opacity", 0), {old_image: {opacity: 0}, new_image: {opacity: 1}, speed: 0}
    }

    function r(t, i) {
        this.init(t, i)
    }

    function h(t, i) {
        this.init(t, i)
    }

    t.fn.adGallery = function (i) {
        var e = {
            loader_image: "loader.gif",
            start_at_index: 0,
            description_wrapper: !1,
            thumb_opacity: .7,
            animate_first_image: !1,
            animation_speed: 400,
            width: !1,
            height: !1,
            display_next_and_prev: !0,
            display_back_and_forward: !0,
            scroll_jump: 0,
            slideshow: {
                enable: !0,
                autostart: !1,
                speed: 5e3,
                start_label: "Start",
                stop_label: "Stop",
                stop_on_scroll: !0,
                countdown_prefix: "(",
                countdown_sufix: ")",
                onStart: !1,
                onStop: !1
            },
            effect: "slide-hori",
            enable_keyboard_move: !0,
            cycle: !0,
            callbacks: {init: !1, afterImageVisible: !1, beforeImageVisible: !1}
        }, s = t.extend(!1, e, i);
        i && i.slideshow && (s.slideshow = t.extend(!1, e.slideshow, i.slideshow)), s.slideshow.enable || (s.slideshow.autostart = !1);
        var a = [];
        return t(this).each(function () {
            var t = new r(this, s);
            a[a.length] = t
        }), a
    }, r.prototype = {
        wrapper: !1,
        image_wrapper: !1,
        gallery_info: !1,
        nav: !1,
        loader: !1,
        preloads: !1,
        thumbs_wrapper: !1,
        scroll_back: !1,
        scroll_forward: !1,
        next_link: !1,
        prev_link: !1,
        slideshow: !1,
        image_wrapper_width: 0,
        image_wrapper_height: 0,
        current_index: 0,
        current_image: !1,
        current_description: !1,
        nav_display_width: 0,
        settings: !1,
        images: !1,
        in_transition: !1,
        animations: !1,
        init: function (i, e) {
            var s = this;
            this.wrapper = t(i), this.settings = e, this.setupElements(), this.setupAnimations(), this.settings.width ? (this.image_wrapper_width = this.settings.width, this.image_wrapper.width(this.settings.width), this.wrapper.width(this.settings.width)) : this.image_wrapper_width = this.image_wrapper.width(), this.settings.height ? (this.image_wrapper_height = this.settings.height, this.image_wrapper.height(this.settings.height)) : this.image_wrapper_height = this.image_wrapper.height(), this.nav_display_width = this.nav.width(), this.current_index = 0, this.current_image = !1, this.current_description = !1, this.in_transition = !1, this.findImages(), this.settings.display_next_and_prev && this.initNextAndPrev();
            var a = function (t) {
                return s.nextImage(t)
            };
            this.slideshow = new h(a, this.settings.slideshow), this.controls.append(this.slideshow.create()), this.settings.slideshow.enable ? this.slideshow.enable() : this.slideshow.disable(), this.settings.display_back_and_forward && this.initBackAndForward(), this.settings.enable_keyboard_move && this.initKeyEvents();
            var n = parseInt(this.settings.start_at_index, 10);
            window.location.hash && 0 === window.location.hash.indexOf("#ad-image") && (n = window.location.hash.replace(/[^0-9]+/g, ""), 1 * n != n && (n = this.settings.start_at_index)), this.loading(!0), this.showImage(n, function () {
                s.settings.slideshow.autostart && (s.preloadImage(n + 1), s.slideshow.start())
            }), this.fireCallback(this.settings.callbacks.init)
        },
        setupAnimations: function () {
            this.animations = {"slide-vert": i, "slide-hori": e, resize: s, fade: a, none: n}
        },
        setupElements: function () {
            this.controls = this.wrapper.find(".ad-controls"), this.gallery_info = t('<p class="ad-info"></p>'), this.controls.append(this.gallery_info), this.image_wrapper = this.wrapper.find(".ad-image-wrapper"), this.image_wrapper.empty(), this.nav = this.wrapper.find(".ad-nav"), this.thumbs_wrapper = this.nav.find(".ad-thumbs"), this.preloads = t('<div class="ad-preloads"></div>'), this.loader = t('<img class="ad-loader" src="' + this.settings.loader_image + '">'), this.image_wrapper.append(this.loader), this.loader.hide(), t(document.body).append(this.preloads)
        },
        loading: function (t) {
            t ? this.loader.show() : this.loader.hide()
        },
        addAnimation: function (i, e) {
            t.isFunction(e) && (this.animations[i] = e)
        },
        findImages: function () {
            var i = this;
            this.images = [];
            var e = 0, s = 0, a = this.thumbs_wrapper.find("a"), n = a.length;
            this.settings.thumb_opacity < 1 && a.find("img").css("opacity", this.settings.thumb_opacity), a.each(function (a) {
                var n = t(this), r = n.attr("href"), h = n.find("img");
                i.isImageLoaded(h[0]) ? (e += h[0].parentNode.parentNode.offsetWidth, s++) : h.load(function () {
                    e += this.parentNode.parentNode.offsetWidth, s++
                }), n.addClass("ad-thumb" + a), n.click(function () {
                    return i.showImage(a), i.slideshow.stop(), !1
                }).hover(function () {
                    !t(this).is(".ad-active") && i.settings.thumb_opacity < 1 && t(this).find("img").fadeTo(300, 1), i.preloadImage(a)
                }, function () {
                    !t(this).is(".ad-active") && i.settings.thumb_opacity < 1 && t(this).find("img").fadeTo(300, i.settings.thumb_opacity)
                });
                var n = !1;
                h.data("ad-link") ? n = h.data("ad-link") : h.attr("longdesc") && h.attr("longdesc").length && (n = h.attr("longdesc"));
                var o = !1;
                h.data("ad-desc") ? o = h.data("ad-desc") : h.attr("alt") && h.attr("alt").length && (o = h.attr("alt"));
                var d = !1;
                h.data("ad-title") ? d = h.data("ad-title") : h.attr("title") && h.attr("title").length && (d = h.attr("title")), i.images[a] = {
                    thumb: h.attr("src"),
                    image: r,
                    error: !1,
                    preloaded: !1,
                    desc: o,
                    title: d,
                    size: !1,
                    link: n
                }
            });
            var r = setInterval(function () {
                if (n == s) {
                    e -= 60;
                    var t = i.nav.find(".ad-thumb-list");
                    t.css("width", e + "px");
                    for (var a = 1, h = t.height(); 201 > a && (t.css("width", e + a + "px"), h == t.height());)h = t.height(), a++;
                    clearInterval(r)
                }
            }, 100)
        },
        initKeyEvents: function () {
            var i = this;
            t(document).keydown(function (t) {
                39 == t.keyCode ? (i.nextImage(), i.slideshow.stop()) : 37 == t.keyCode && (i.prevImage(), i.slideshow.stop())
            })
        },
        initNextAndPrev: function () {
            this.next_link = t('<div class="ad-next"><div class="ad-next-image"></div></div>'), this.prev_link = t('<div class="ad-prev"><div class="ad-prev-image"></div></div>'), this.image_wrapper.append(this.next_link), this.image_wrapper.append(this.prev_link);
            var i = this;
            this.prev_link.add(this.next_link).mouseover(function (e) {
                t(this).css("height", i.image_wrapper_height), t(this).find("div").show()
            }).mouseout(function (i) {
                t(this).find("div").hide()
            }).click(function () {
                t(this).is(".ad-next") ? (i.nextImage(), i.slideshow.stop()) : (i.prevImage(), i.slideshow.stop())
            }).find("div").css("opacity", .7)
        },
        initBackAndForward: function () {
            var i = this;
            this.scroll_forward = t('<div class="ad-forward"></div>'), this.scroll_back = t('<div class="ad-back"></div>'), this.nav.append(this.scroll_forward), this.nav.prepend(this.scroll_back);
            var e = 0, s = !1;
            t(this.scroll_back).add(this.scroll_forward).click(function () {
                var e = i.nav_display_width - 50;
                if (i.settings.scroll_jump > 0)var e = i.settings.scroll_jump;
                if (t(this).is(".ad-forward"))var s = i.thumbs_wrapper.scrollLeft() + e; else var s = i.thumbs_wrapper.scrollLeft() - e;
                return i.settings.slideshow.stop_on_scroll && i.slideshow.stop(), i.thumbs_wrapper.animate({scrollLeft: s + "px"}), !1
            }).css("opacity", .6).hover(function () {
                var a = "left";
                t(this).is(".ad-forward") && (a = "right"), s = setInterval(function () {
                    e++, e > 30 && i.settings.slideshow.stop_on_scroll && i.slideshow.stop();
                    var t = i.thumbs_wrapper.scrollLeft() + 1;
                    "left" == a && (t = i.thumbs_wrapper.scrollLeft() - 1), i.thumbs_wrapper.scrollLeft(t)
                }, 10), t(this).css("opacity", 1)
            }, function () {
                e = 0, clearInterval(s), t(this).css("opacity", .6)
            })
        },
        _afterShow: function () {
            this.gallery_info.html(this.current_index + 1 + " / " + this.images.length), this.settings.cycle || (this.prev_link.show().css("height", this.image_wrapper_height), this.next_link.show().css("height", this.image_wrapper_height), this.current_index == this.images.length - 1 && this.next_link.hide(), 0 == this.current_index && this.prev_link.hide()), this.fireCallback(this.settings.callbacks.afterImageVisible)
        },
        _getContainedImageSize: function (t, i) {
            if (i > this.image_wrapper_height) {
                var e = t / i;
                i = this.image_wrapper_height, t = this.image_wrapper_height * e
            }
            if (t > this.image_wrapper_width) {
                var e = i / t;
                t = this.image_wrapper_width, i = this.image_wrapper_width * e
            }
            return {width: t, height: i}
        },
        _centerImage: function (t, i, e) {
            if (t.css("top", "0px"), e < this.image_wrapper_height) {
                var s = this.image_wrapper_height - e;
                t.css("top", s / 2 + "px")
            }
            if (t.css("left", "0px"), i < this.image_wrapper_width) {
                var s = this.image_wrapper_width - i;
                t.css("left", s / 2 + "px")
            }
        },
        _getDescription: function (i) {
            var e = !1;
            if (i.desc.length || i.title.length) {
                var s = "";
                i.title.length && (s = '<strong class="ad-description-title">' + i.title + "</strong>");
                var e = "";
                i.desc.length && (e = "<span>" + i.desc + "</span>"), e = t('<p class="ad-image-description">' + s + e + "</p>")
            }
            return e
        },
        showImage: function (t, i) {
            if (this.images[t] && !this.in_transition) {
                var e = this, s = this.images[t];
                this.in_transition = !0, s.preloaded ? this._showWhenLoaded(t, i) : (this.loading(!0), this.preloadImage(t, function () {
                    e.loading(!1), e._showWhenLoaded(t, i)
                }))
            }
        },
        _showWhenLoaded: function (i, e) {
            if (this.images[i]) {
                var s = this, a = this.images[i], n = t(document.createElement("div")).addClass("ad-image"), r = t(new Image).attr("src", a.image);
                if (a.link) {
                    var h = t('<a href="' + a.link + '" target="_blank"></a>');
                    h.append(r), n.append(h)
                } else n.append(r);
                this.image_wrapper.prepend(n);
                var o = this._getContainedImageSize(a.size.width, a.size.height);
                r.attr("width", o.width), r.attr("height", o.height), n.css({
                    width: o.width + "px",
                    height: o.height + "px"
                }), this._centerImage(n, o.width, o.height);
                var d = this._getDescription(a, n);
                if (d)if (this.settings.description_wrapper)this.settings.description_wrapper.append(d); else {
                    n.append(d);
                    var l = o.width - parseInt(d.css("padding-left"), 10) - parseInt(d.css("padding-right"), 10);
                    d.css("width", l + "px")
                }
                this.highLightThumb(this.nav.find(".ad-thumb" + i));
                var p = "right";
                if (this.current_index < i && (p = "left"), this.fireCallback(this.settings.callbacks.beforeImageVisible), this.current_image || this.settings.animate_first_image) {
                    var c = this.settings.animation_speed, g = "swing", _ = this.animations[this.settings.effect].call(this, n, p, d);
                    if ("undefined" != typeof _.speed && (c = _.speed), "undefined" != typeof _.easing && (g = _.easing), this.current_image) {
                        var f = this.current_image, m = this.current_description;
                        f.animate(_.old_image, c, g, function () {
                            f.remove(), m && m.remove()
                        })
                    }
                    n.animate(_.new_image, c, g, function () {
                        s.current_index = i, s.current_image = n, s.current_description = d, s.in_transition = !1, s._afterShow(), s.fireCallback(e)
                    })
                } else this.current_index = i, this.current_image = n, s.current_description = d, this.in_transition = !1, s._afterShow(), this.fireCallback(e)
            }
        },
        nextIndex: function () {
            if (this.current_index == this.images.length - 1) {
                if (!this.settings.cycle)return !1;
                var t = 0
            } else var t = this.current_index + 1;
            return t
        },
        nextImage: function (t) {
            var i = this.nextIndex();
            return i === !1 ? !1 : (this.preloadImage(i + 1), this.showImage(i, t), !0)
        },
        prevIndex: function () {
            if (0 == this.current_index) {
                if (!this.settings.cycle)return !1;
                var t = this.images.length - 1
            } else var t = this.current_index - 1;
            return t
        },
        prevImage: function (t) {
            var i = this.prevIndex();
            return i === !1 ? !1 : (this.preloadImage(i - 1), this.showImage(i, t), !0)
        },
        preloadAll: function () {
            function t() {
                e < i.images.length && (e++, i.preloadImage(e, t))
            }

            var i = this, e = 0;
            i.preloadImage(e, t)
        },
        preloadImage: function (i, e) {
            if (this.images[i]) {
                var s = this.images[i];
                if (this.images[i].preloaded)this.fireCallback(e); else {
                    var a = t(new Image);
                    if (a.attr("src", s.image), this.isImageLoaded(a[0]))s.preloaded = !0, s.size = {
                        width: a[0].width,
                        height: a[0].height
                    }, this.fireCallback(e); else {
                        this.preloads.append(a);
                        var n = this;
                        a.load(function () {
                            s.preloaded = !0, s.size = {width: this.width, height: this.height}, n.fireCallback(e)
                        }).error(function () {
                            s.error = !0, s.preloaded = !1, s.size = !1
                        })
                    }
                }
            }
        },
        isImageLoaded: function (t) {
            return "undefined" == typeof t.complete || t.complete ? "undefined" == typeof t.naturalWidth || 0 != t.naturalWidth : !1
        },
        highLightThumb: function (t) {
            this.thumbs_wrapper.find(".ad-active").removeClass("ad-active"), t.addClass("ad-active"), this.settings.thumb_opacity < 1 && (this.thumbs_wrapper.find("a:not(.ad-active) img").fadeTo(300, this.settings.thumb_opacity), t.find("img").fadeTo(300, 1));
            var i = t[0].parentNode.offsetLeft;
            i -= this.nav_display_width / 2 - t[0].offsetWidth / 2, this.thumbs_wrapper.animate({scrollLeft: i + "px"})
        },
        fireCallback: function (i) {
            t.isFunction(i) && i.call(this)
        }
    }, h.prototype = {
        start_link: !1,
        stop_link: !1,
        countdown: !1,
        controls: !1,
        settings: !1,
        nextimage_callback: !1,
        enabled: !1,
        running: !1,
        countdown_interval: !1,
        init: function (t, i) {
            this.nextimage_callback = t, this.settings = i
        },
        create: function () {
            this.start_link = t('<span class="ad-slideshow-start">' + this.settings.start_label + "</span>"), this.stop_link = t('<span class="ad-slideshow-stop">' + this.settings.stop_label + "</span>"), this.countdown = t('<span class="ad-slideshow-countdown"></span>'), this.controls = t('<div class="ad-slideshow-controls"></div>'), this.controls.append(this.start_link).append(this.stop_link).append(this.countdown), this.countdown.hide();
            var i = this;
            return this.start_link.click(function () {
                i.start()
            }), this.stop_link.click(function () {
                i.stop()
            }), t(document).keydown(function (t) {
                83 == t.keyCode && (i.running ? i.stop() : i.start())
            }), this.controls
        },
        disable: function () {
            this.enabled = !1, this.stop(), this.controls.hide()
        },
        enable: function () {
            this.enabled = !0, this.controls.show()
        },
        toggle: function () {
            this.enabled ? this.disable() : this.enable()
        },
        start: function () {
            if (this.running || !this.enabled)return !1;
            return this.running = !0, this.controls.addClass("ad-slideshow-running"), this._next(), this.fireCallback(this.settings.onStart), !0
        },
        stop: function () {
            return this.running ? (this.running = !1, this.countdown.hide(), this.controls.removeClass("ad-slideshow-running"), clearInterval(this.countdown_interval), this.fireCallback(this.settings.onStop), !0) : !1
        },
        _next: function () {
            var t = this, i = this.settings.countdown_prefix, e = this.settings.countdown_sufix;
            clearInterval(t.countdown_interval), this.countdown.show().html(i + this.settings.speed / 1e3 + e);
            var s = 0;
            this.countdown_interval = setInterval(function () {
                if (s += 1e3, s >= t.settings.speed) {
                    var a = function () {
                        t.running && t._next(), s = 0
                    };
                    t.nextimage_callback(a) || t.stop(), s = 0
                }
                var n = parseInt(t.countdown.text().replace(/[^0-9]/g, ""), 10);
                n--, n > 0 && t.countdown.html(i + n + e)
            }, 1e3)
        },
        fireCallback: function (i) {
            t.isFunction(i) && i.call(this)
        }
    }
}(jQuery);
!function (t, e) {
    var n = !1, i = /xyz/.test(function () {
    }) ? /\b_super\b/ : /.*/, r = function () {
    }, s = function (e) {
        return t.each([].slice.call(arguments, 1), function (t, n) {
            if (n)for (var i in n)e[i] = n[i]
        }), e
    }, a = r.Events = {
        on: function (t, e, n) {
            if (!u(this, "on", t, [e, n]) || !e)return this;
            this._events || (this._events = {});
            var i = this._events[t] || (this._events[t] = []);
            return i.push({callback: e, context: n, ctx: n || this}), this
        }, trigger: function (t) {
            if (!this._events)return this;
            var e = [].slice.call(arguments, 1);
            if (!u(this, "trigger", t, e))return this;
            var n = this._events[t];
            return n && o(n, e), this
        }
    }, c = /\s+/, u = function (t, e, n, i) {
        if (n) {
            if ("object" == typeof n) {
                for (var r in n)t[e].apply(t, [r, n[r]].concat(i));
                return !1
            }
            if (c.test(n)) {
                for (var s = n.split(c), a = 0, u = s.length; u > a; a++)t[e].apply(t, [s[a]].concat(i));
                return !1
            }
            return !0
        }
    }, o = function (t, e) {
        var n, i = -1, r = t.length, s = e[0], a = e[1], c = e[2];
        switch (e.length) {
            case 0:
                for (; ++i < r;)(n = t[i]).callback.call(n.ctx);
                return;
            case 1:
                for (; ++i < r;)(n = t[i]).callback.call(n.ctx, s);
                return;
            case 2:
                for (; ++i < r;)(n = t[i]).callback.call(n.ctx, s, a);
                return;
            case 3:
                for (; ++i < r;)(n = t[i]).callback.call(n.ctx, s, a, c);
                return;
            default:
                for (; ++i < r;)(n = t[i]).callback.apply(n.ctx, e)
        }
    }, l = {on: "listenTo"};
    t.each(l, function (t, e) {
        a[e] = function (e, n, i) {
            var r = this._listeners || (this._listeners = {}), s = e._listenerId || (e._listenerId = j("l"));
            return r[s] = e, "object" == typeof n && (i = this), e[t](n, i, this), this
        }
    });
    var h = r.Handler = function () {
        this.initialize && this.initialize.apply(this, arguments), this.delegateEvents()
    }, f = /^(\S+)\s*(.*)$/;
    s(h.prototype, a, {
        bind: function (t, e) {
            return function () {
                return t.apply(e, arguments)
            }
        }, delegateEvents: function (e) {
            if (!e && !(e = this.events))return this;
            for (var n in e) {
                var i = e[n];
                if (i = this[e[n]]) {
                    var r = n.match(f), s = r[1], a = r[2], c = this.el || document;
                    i = this.bind(i, this), "" === a ? t(c).on(s, i) : t(c).on(s, a, i)
                }
            }
            return this
        }
    });
    var p = r.Model = function (e) {
        var n, i = e || {};
        this.cid = j("c"), this.attributes = {}, (n = this.defaults) && (i = t.extend({}, n, i)), this.attributes = i, this.initialize && this.initialize()
    }, v = /(\(\?)?:\w+/g;
    s(p.prototype, a, {
        set: function (t, e, n) {
            var i, r, s, a;
            if (null == t)return this;
            "object" == typeof t ? (r = t, n = e) : (r = {})[t] = e, n || (n = {}), a = n.unset, s = this.attributes;
            for (i in r)e = r[i], a ? delete s[i] : s[i] = e;
            return this
        }, get: function (t) {
            return this.attributes[t]
        }, unset: function (t, e) {
            return this.set(t, void 0, s({}, e, {unset: !0}))
        }, toJSON: function () {
            return t.extend({}, this.attributes)
        }, buildRequestUrl: function (t) {
            var n, i, t, r = this;
            return t = t.replace(v, function (t, e) {
                return n = t.replace(":", ""), i = r.get(n), e ? t : i || t
            }), /^(\/\/|http:|https:).*/.test(t) ? t : this.url ? this.url + t : e.location.href + "/" + t
        }, sync: function () {
            return r.sync.apply(this, arguments)
        }
    });
    var d = [["Get", "read"], ["Post", "create"], ["Put", "update"], ["Delete", "delete"], ["Patch", "patch"]], y = {};
    t.each(d, function (t, e) {
        y[e[0]] = function (t, n, i) {
            i = i ? i : {};
            var r, s = this, a = i.success;
            return i.success = function (t) {
                a && a(s, t, i), s.trigger(n, s, t, i)
            }, i.url = this.buildRequestUrl(t), r = this.sync(e[1], this, i)
        }
    }), s(p.prototype, y);
    var b = r.View = function () {
        this.initialize && this.initialize()
    };
    s(b.prototype, a), r.sync = function (e, n, i) {
        var s = g[e], a = {type: s, dataType: "json"};
        i.url || (a.url = n.url), null != i.data || !n || "create" !== e && "update" !== e && "patch" !== e || (a.contentType = "application/json", a.data = JSON.stringify(i.attrs || n.toJSON())), "GET" !== a.type && (a.processData = !1), "PATCH" === a.type && x && (a.xhr = function () {
            return new ActiveXObject("Microsoft.XMLHTTP")
        });
        var c = i.xhr = r.ajax(t.extend(a, i));
        return n.trigger("request", n, c, i), c
    };
    var x = !("undefined" == typeof e || !e.ActiveXObject || e.XMLHttpRequest && (new XMLHttpRequest).dispatchEvent), g = {
        create: "POST",
        update: "PUT",
        patch: "PATCH",
        "delete": "DELETE",
        read: "GET"
    };
    r.ajax = function () {
        return t.ajax.apply(t, arguments)
    };
    var _ = function (t) {
        function e() {
            n || s.apply(this, arguments)
        }

        var r = this.prototype, s = this;
        n = !0;
        var a = new this;
        n = !1;
        for (var c in t)a[c] = "function" == typeof t[c] && "function" == typeof r[c] && i.test(t[c]) ? function (t, e) {
            return function () {
                var n = this._super;
                this._super = r[t];
                var i = e.apply(this, arguments);
                return this._super = n, i
            }
        }(c, t[c]) : t[c];
        return e.prototype = a, e.prototype.constructor = e, e.extend = arguments.callee, e
    }, T = 0, j = function (t) {
        var e = ++T + "";
        return t ? t + e : e
    };
    r.Handler.extend = r.Model.extend = r.View.extend = _, e.Gillie = r
}(jQuery, this);
var requirejs, require, define;
!function (global) {
    function isFunction(e) {
        return "[object Function]" === ostring.call(e)
    }

    function isArray(e) {
        return "[object Array]" === ostring.call(e)
    }

    function each(e, t) {
        if (e) {
            var i;
            for (i = 0; i < e.length && (!e[i] || !t(e[i], i, e)); i += 1);
        }
    }

    function eachReverse(e, t) {
        if (e) {
            var i;
            for (i = e.length - 1; i > -1 && (!e[i] || !t(e[i], i, e)); i -= 1);
        }
    }

    function hasProp(e, t) {
        return hasOwn.call(e, t)
    }

    function getOwn(e, t) {
        return hasProp(e, t) && e[t]
    }

    function eachProp(e, t) {
        var i;
        for (i in e)if (hasProp(e, i) && t(e[i], i))break
    }

    function mixin(e, t, i, r) {
        return t && eachProp(t, function (t, n) {
            !i && hasProp(e, n) || (!r || "object" != typeof t || !t || isArray(t) || isFunction(t) || t instanceof RegExp ? e[n] = t : (e[n] || (e[n] = {}), mixin(e[n], t, i, r)))
        }), e
    }

    function bind(e, t) {
        return function () {
            return t.apply(e, arguments)
        }
    }

    function scripts() {
        return document.getElementsByTagName("script")
    }

    function defaultOnError(e) {
        throw e
    }

    function getGlobal(e) {
        if (!e)return e;
        var t = global;
        return each(e.split("."), function (e) {
            t = t[e]
        }), t
    }

    function makeError(e, t, i, r) {
        var n = new Error(t + "\nhttp://requirejs.org/docs/errors.html#" + e);
        return n.requireType = e, n.requireModules = r, i && (n.originalError = i), n
    }

    function newContext(e) {
        function t(e) {
            var t, i, r = e.length;
            for (t = 0; r > t; t++)if (i = e[t], "." === i)e.splice(t, 1), t -= 1; else if (".." === i) {
                if (1 === t && (".." === e[2] || ".." === e[0]))break;
                t > 0 && (e.splice(t - 1, 2), t -= 2)
            }
        }

        function i(e, i, r) {
            var n, o, a, s, c, u, d, p, f, l, h, m = i && i.split("/"), g = m, v = y.map, x = v && v["*"];
            if (e && "." === e.charAt(0) && (i ? (g = m.slice(0, m.length - 1), e = e.split("/"), d = e.length - 1, y.nodeIdCompat && jsSuffixRegExp.test(e[d]) && (e[d] = e[d].replace(jsSuffixRegExp, "")), e = g.concat(e), t(e), e = e.join("/")) : 0 === e.indexOf("./") && (e = e.substring(2))), r && v && (m || x)) {
                a = e.split("/");
                e:for (s = a.length; s > 0; s -= 1) {
                    if (u = a.slice(0, s).join("/"), m)for (c = m.length; c > 0; c -= 1)if (o = getOwn(v, m.slice(0, c).join("/")), o && (o = getOwn(o, u))) {
                        p = o, f = s;
                        break e
                    }
                    !l && x && getOwn(x, u) && (l = getOwn(x, u), h = s)
                }
                !p && l && (p = l, f = h), p && (a.splice(0, f, p), e = a.join("/"))
            }
            return n = getOwn(y.pkgs, e), n ? n : e
        }

        function r(e) {
            isBrowser && each(scripts(), function (t) {
                return t.getAttribute("data-requiremodule") === e && t.getAttribute("data-requirecontext") === q.contextName ? (t.parentNode.removeChild(t), !0) : void 0
            })
        }

        function n(e) {
            var t = getOwn(y.paths, e);
            return t && isArray(t) && t.length > 1 ? (t.shift(), q.require.undef(e), q.require([e]), !0) : void 0
        }

        function o(e) {
            var t, i = e ? e.indexOf("!") : -1;
            return i > -1 && (t = e.substring(0, i), e = e.substring(i + 1, e.length)), [t, e]
        }

        function a(e, t, r, n) {
            var a, s, c, u, d = null, p = t ? t.name : null, f = e, l = !0, h = "";
            return e || (l = !1, e = "_@r" + (P += 1)), u = o(e), d = u[0], e = u[1], d && (d = i(d, p, n), s = getOwn(_, d)), e && (d ? h = s && s.normalize ? s.normalize(e, function (e) {
                return i(e, p, n)
            }) : i(e, p, n) : (h = i(e, p, n), u = o(h), d = u[0], h = u[1], r = !0, a = q.nameToUrl(h))), c = !d || s || r ? "" : "_unnormalized" + (A += 1), {
                prefix: d,
                name: h,
                parentMap: t,
                unnormalized: !!c,
                url: a,
                originalName: f,
                isDefine: l,
                id: (d ? d + "!" + h : h) + c
            }
        }

        function s(e) {
            var t = e.id, i = getOwn(S, t);
            return i || (i = S[t] = new q.Module(e)), i
        }

        function c(e, t, i) {
            var r = e.id, n = getOwn(S, r);
            !hasProp(_, r) || n && !n.defineEmitComplete ? (n = s(e), n.error && "error" === t ? i(n.error) : n.on(t, i)) : "defined" === t && i(_[r])
        }

        function u(e, t) {
            var i = e.requireModules, r = !1;
            t ? t(e) : (each(i, function (t) {
                var i = getOwn(S, t);
                i && (i.error = e, i.events.error && (r = !0, i.emit("error", e)))
            }), r || req.onError(e))
        }

        function d() {
            globalDefQueue.length && (apsp.apply(M, [M.length, 0].concat(globalDefQueue)), globalDefQueue = [])
        }

        function p(e) {
            delete S[e], delete k[e]
        }

        function f(e, t, i) {
            var r = e.map.id;
            e.error ? e.emit("error", e.error) : (t[r] = !0, each(e.depMaps, function (r, n) {
                var o = r.id, a = getOwn(S, o);
                !a || e.depMatched[n] || i[o] || (getOwn(t, o) ? (e.defineDep(n, _[o]), e.check()) : f(a, t, i))
            }), i[r] = !0)
        }

        function l() {
            var e, t, i = 1e3 * y.waitSeconds, o = i && q.startTime + i < (new Date).getTime(), a = [], s = [], c = !1, d = !0;
            if (!x) {
                if (x = !0, eachProp(k, function (e) {
                        var i = e.map, u = i.id;
                        if (e.enabled && (i.isDefine || s.push(e), !e.error))if (!e.inited && o)n(u) ? (t = !0, c = !0) : (a.push(u), r(u)); else if (!e.inited && e.fetched && i.isDefine && (c = !0, !i.prefix))return d = !1
                    }), o && a.length)return e = makeError("timeout", "Load timeout for modules: " + a, null, a), e.contextName = q.contextName, u(e);
                d && each(s, function (e) {
                    f(e, {}, {})
                }), o && !t || !c || !isBrowser && !isWebWorker || w || (w = setTimeout(function () {
                    w = 0, l()
                }, 50)), x = !1
            }
        }

        function h(e) {
            hasProp(_, e[0]) || s(a(e[0], null, !0)).init(e[1], e[2])
        }

        function m(e, t, i, r) {
            e.detachEvent && !isOpera ? r && e.detachEvent(r, t) : e.removeEventListener(i, t, !1)
        }

        function g(e) {
            var t = e.currentTarget || e.srcElement;
            return m(t, q.onScriptLoad, "load", "onreadystatechange"), m(t, q.onScriptError, "error"), {
                node: t,
                id: t && t.getAttribute("data-requiremodule")
            }
        }

        function v() {
            var e;
            for (d(); M.length;) {
                if (e = M.shift(), null === e[0])return u(makeError("mismatch", "Mismatched anonymous define() module: " + e[e.length - 1]));
                h(e)
            }
        }

        var x, b, q, E, w, y = {
            waitSeconds: 7,
            baseUrl: "./",
            paths: {},
            bundles: {},
            pkgs: {},
            shim: {},
            config: {}
        }, S = {}, k = {}, O = {}, M = [], _ = {}, j = {}, R = {}, P = 1, A = 1;
        return E = {
            require: function (e) {
                return e.require ? e.require : e.require = q.makeRequire(e.map)
            }, exports: function (e) {
                return e.usingExports = !0, e.map.isDefine ? e.exports ? _[e.map.id] = e.exports : e.exports = _[e.map.id] = {} : void 0
            }, module: function (e) {
                return e.module ? e.module : e.module = {
                    id: e.map.id, uri: e.map.url, config: function () {
                        return getOwn(y.config, e.map.id) || {}
                    }, exports: e.exports || (e.exports = {})
                }
            }
        }, b = function (e) {
            this.events = getOwn(O, e.id) || {}, this.map = e, this.shim = getOwn(y.shim, e.id), this.depExports = [], this.depMaps = [], this.depMatched = [], this.pluginMaps = {}, this.depCount = 0
        }, b.prototype = {
            init: function (e, t, i, r) {
                r = r || {}, this.inited || (this.factory = t, i ? this.on("error", i) : this.events.error && (i = bind(this, function (e) {
                    this.emit("error", e)
                })), this.depMaps = e && e.slice(0), this.errback = i, this.inited = !0, this.ignore = r.ignore, r.enabled || this.enabled ? this.enable() : this.check())
            }, defineDep: function (e, t) {
                this.depMatched[e] || (this.depMatched[e] = !0, this.depCount -= 1, this.depExports[e] = t)
            }, fetch: function () {
                if (!this.fetched) {
                    this.fetched = !0, q.startTime = (new Date).getTime();
                    var e = this.map;
                    return this.shim ? void q.makeRequire(this.map, {enableBuildCallback: !0})(this.shim.deps || [], bind(this, function () {
                        return e.prefix ? this.callPlugin() : this.load()
                    })) : e.prefix ? this.callPlugin() : this.load()
                }
            }, load: function () {
                var e = this.map.url;
                j[e] || (j[e] = !0, q.load(this.map.id, e))
            }, check: function () {
                if (this.enabled && !this.enabling) {
                    var e, t, i = this.map.id, r = this.depExports, n = this.exports, o = this.factory;
                    if (this.inited) {
                        if (this.error)this.emit("error", this.error); else if (!this.defining) {
                            if (this.defining = !0, this.depCount < 1 && !this.defined) {
                                if (isFunction(o)) {
                                    if (this.events.error && this.map.isDefine || req.onError !== defaultOnError)try {
                                        n = q.execCb(i, o, r, n)
                                    } catch (a) {
                                        e = a
                                    } else n = q.execCb(i, o, r, n);
                                    if (this.map.isDefine && void 0 === n && (t = this.module, t ? n = t.exports : this.usingExports && (n = this.exports)), e)return e.requireMap = this.map, e.requireModules = this.map.isDefine ? [this.map.id] : null, e.requireType = this.map.isDefine ? "define" : "require", u(this.error = e)
                                } else n = o;
                                this.exports = n, this.map.isDefine && !this.ignore && (_[i] = n, req.onResourceLoad && req.onResourceLoad(q, this.map, this.depMaps)), p(i), this.defined = !0
                            }
                            this.defining = !1, this.defined && !this.defineEmitted && (this.defineEmitted = !0, this.emit("defined", this.exports), this.defineEmitComplete = !0)
                        }
                    } else this.fetch()
                }
            }, callPlugin: function () {
                var e = this.map, t = e.id, r = a(e.prefix);
                this.depMaps.push(r), c(r, "defined", bind(this, function (r) {
                    var n, o, d, f = getOwn(R, this.map.id), l = this.map.name, h = this.map.parentMap ? this.map.parentMap.name : null, m = q.makeRequire(e.parentMap, {enableBuildCallback: !0});
                    return this.map.unnormalized ? (r.normalize && (l = r.normalize(l, function (e) {
                            return i(e, h, !0)
                        }) || ""), o = a(e.prefix + "!" + l, this.map.parentMap), c(o, "defined", bind(this, function (e) {
                        this.init([], function () {
                            return e
                        }, null, {enabled: !0, ignore: !0})
                    })), d = getOwn(S, o.id), void(d && (this.depMaps.push(o), this.events.error && d.on("error", bind(this, function (e) {
                        this.emit("error", e)
                    })), d.enable()))) : f ? (this.map.url = q.nameToUrl(f), void this.load()) : (n = bind(this, function (e) {
                        this.init([], function () {
                            return e
                        }, null, {enabled: !0})
                    }), n.error = bind(this, function (e) {
                        this.inited = !0, this.error = e, e.requireModules = [t], eachProp(S, function (e) {
                            0 === e.map.id.indexOf(t + "_unnormalized") && p(e.map.id)
                        }), u(e)
                    }), n.fromText = bind(this, function (i, r) {
                        var o = e.name, c = a(o), d = useInteractive;
                        r && (i = r), d && (useInteractive = !1), s(c), hasProp(y.config, t) && (y.config[o] = y.config[t]);
                        try {
                            req.exec(i)
                        } catch (p) {
                            return u(makeError("fromtexteval", "fromText eval for " + t + " failed: " + p, p, [t]))
                        }
                        d && (useInteractive = !0), this.depMaps.push(c), q.completeLoad(o), m([o], n)
                    }), void r.load(e.name, m, n, y))
                })), q.enable(r, this), this.pluginMaps[r.id] = r
            }, enable: function () {
                k[this.map.id] = this, this.enabled = !0, this.enabling = !0, each(this.depMaps, bind(this, function (e, t) {
                    var i, r, n;
                    if ("string" == typeof e) {
                        if (e = a(e, this.map.isDefine ? this.map : this.map.parentMap, !1, !this.skipMap), this.depMaps[t] = e, n = getOwn(E, e.id))return void(this.depExports[t] = n(this));
                        this.depCount += 1, c(e, "defined", bind(this, function (e) {
                            this.defineDep(t, e), this.check()
                        })), this.errback && c(e, "error", bind(this, this.errback))
                    }
                    i = e.id, r = S[i], hasProp(E, i) || !r || r.enabled || q.enable(e, this)
                })), eachProp(this.pluginMaps, bind(this, function (e) {
                    var t = getOwn(S, e.id);
                    t && !t.enabled && q.enable(e, this)
                })), this.enabling = !1, this.check()
            }, on: function (e, t) {
                var i = this.events[e];
                i || (i = this.events[e] = []), i.push(t)
            }, emit: function (e, t) {
                each(this.events[e], function (e) {
                    e(t)
                }), "error" === e && delete this.events[e]
            }
        }, q = {
            config: y,
            contextName: e,
            registry: S,
            defined: _,
            urlFetched: j,
            defQueue: M,
            Module: b,
            makeModuleMap: a,
            nextTick: req.nextTick,
            onError: u,
            configure: function (e) {
                e.baseUrl && "/" !== e.baseUrl.charAt(e.baseUrl.length - 1) && (e.baseUrl += "/");
                var t = y.shim, i = {paths: !0, bundles: !0, config: !0, map: !0};
                eachProp(e, function (e, t) {
                    i[t] ? (y[t] || (y[t] = {}), mixin(y[t], e, !0, !0)) : y[t] = e
                }), e.bundles && eachProp(e.bundles, function (e, t) {
                    each(e, function (e) {
                        e !== t && (R[e] = t)
                    })
                }), e.shim && (eachProp(e.shim, function (e, i) {
                    isArray(e) && (e = {deps: e}), !e.exports && !e.init || e.exportsFn || (e.exportsFn = q.makeShimExports(e)), t[i] = e
                }), y.shim = t), e.packages && each(e.packages, function (e) {
                    var t, i;
                    e = "string" == typeof e ? {name: e} : e, i = e.name, t = e.location, t && (y.paths[i] = e.location), y.pkgs[i] = e.name + "/" + (e.main || "main").replace(currDirRegExp, "").replace(jsSuffixRegExp, "")
                }), eachProp(S, function (e, t) {
                    e.inited || e.map.unnormalized || (e.map = a(t))
                }), (e.deps || e.callback) && q.require(e.deps || [], e.callback)
            },
            makeShimExports: function (e) {
                function t() {
                    var t;
                    return e.init && (t = e.init.apply(global, arguments)), t || e.exports && getGlobal(e.exports)
                }

                return t
            },
            makeRequire: function (t, n) {
                function o(i, r, c) {
                    var d, p, f;
                    return n.enableBuildCallback && r && isFunction(r) && (r.__requireJsBuild = !0), "string" == typeof i ? isFunction(r) ? u(makeError("requireargs", "Invalid require call"), c) : t && hasProp(E, i) ? E[i](S[t.id]) : req.get ? req.get(q, i, t, o) : (p = a(i, t, !1, !0), d = p.id, hasProp(_, d) ? _[d] : u(makeError("notloaded", 'Module name "' + d + '" has not been loaded yet for context: ' + e + (t ? "" : ". Use require([])")))) : (v(), q.nextTick(function () {
                        v(), f = s(a(null, t)), f.skipMap = n.skipMap, f.init(i, r, c, {enabled: !0}), l()
                    }), o)
                }

                return n = n || {}, mixin(o, {
                    isBrowser: isBrowser, toUrl: function (e) {
                        var r, n = e.lastIndexOf("."), o = e.split("/")[0], a = "." === o || ".." === o;
                        return -1 !== n && (!a || n > 1) && (r = e.substring(n, e.length), e = e.substring(0, n)), q.nameToUrl(i(e, t && t.id, !0), r, !0)
                    }, defined: function (e) {
                        return hasProp(_, a(e, t, !1, !0).id)
                    }, specified: function (e) {
                        return e = a(e, t, !1, !0).id, hasProp(_, e) || hasProp(S, e)
                    }
                }), t || (o.undef = function (e) {
                    d();
                    var i = a(e, t, !0), n = getOwn(S, e);
                    r(e), delete _[e], delete j[i.url], delete O[e], eachReverse(M, function (t, i) {
                        t[0] === e && M.splice(i, 1)
                    }), n && (n.events.defined && (O[e] = n.events), p(e))
                }), o
            },
            enable: function (e) {
                var t = getOwn(S, e.id);
                t && s(e).enable()
            },
            completeLoad: function (e) {
                var t, i, r, o = getOwn(y.shim, e) || {}, a = o.exports;
                for (d(); M.length;) {
                    if (i = M.shift(), null === i[0]) {
                        if (i[0] = e, t)break;
                        t = !0
                    } else i[0] === e && (t = !0);
                    h(i)
                }
                if (r = getOwn(S, e), !t && !hasProp(_, e) && r && !r.inited) {
                    if (!(!y.enforceDefine || a && getGlobal(a)))return n(e) ? void 0 : u(makeError("nodefine", "No define call for " + e, null, [e]));
                    h([e, o.deps || [], o.exportsFn])
                }
                l()
            },
            nameToUrl: function (e, t, i) {
                var r, n, o, a, s, c, u, d = getOwn(y.pkgs, e);
                if (d && (e = d), u = getOwn(R, e))return q.nameToUrl(u, t, i);
                if (req.jsExtRegExp.test(e))s = e + (t || ""); else {
                    for (r = y.paths, n = e.split("/"), o = n.length; o > 0; o -= 1)if (a = n.slice(0, o).join("/"), c = getOwn(r, a)) {
                        isArray(c) && (c = c[0]), n.splice(0, o, c);
                        break
                    }
                    s = n.join("/"), s += t || (/^data\:|\?/.test(s) || i ? "" : ".js"), s = ("/" === s.charAt(0) || s.match(/^[\w\+\.\-]+:/) ? "" : y.baseUrl) + s
                }
                return y.urlArgs ? s + ((-1 === s.indexOf("?") ? "?" : "&") + y.urlArgs) : s
            },
            load: function (e, t) {
                req.load(q, e, t)
            },
            execCb: function (e, t, i, r) {
                return t.apply(r, i)
            },
            onScriptLoad: function (e) {
                if ("load" === e.type || readyRegExp.test((e.currentTarget || e.srcElement).readyState)) {
                    interactiveScript = null;
                    var t = g(e);
                    q.completeLoad(t.id)
                }
            },
            onScriptError: function (e) {
                var t = g(e);
                return n(t.id) ? void 0 : u(makeError("scripterror", "Script error for: " + t.id, e, [t.id]))
            }
        }, q.require = q.makeRequire(), q
    }

    function getInteractiveScript() {
        return interactiveScript && "interactive" === interactiveScript.readyState ? interactiveScript : (eachReverse(scripts(), function (e) {
            return "interactive" === e.readyState ? interactiveScript = e : void 0
        }), interactiveScript)
    }

    var req, s, head, baseElement, dataMain, src, interactiveScript, currentlyAddingScript, mainScript, subPath, version = "2.1.11", commentRegExp = /(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/gm, cjsRequireRegExp = /[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g, jsSuffixRegExp = /\.js$/, currDirRegExp = /^\.\//, op = Object.prototype, ostring = op.toString, hasOwn = op.hasOwnProperty, ap = Array.prototype, apsp = ap.splice, isBrowser = !("undefined" == typeof window || "undefined" == typeof navigator || !window.document), isWebWorker = !isBrowser && "undefined" != typeof importScripts, readyRegExp = isBrowser && "PLAYSTATION 3" === navigator.platform ? /^complete$/ : /^(complete|loaded)$/, defContextName = "_", isOpera = "undefined" != typeof opera && "[object Opera]" === opera.toString(), contexts = {}, cfg = {}, globalDefQueue = [], useInteractive = !1;
    if ("undefined" == typeof define) {
        if ("undefined" != typeof requirejs) {
            if (isFunction(requirejs))return;
            cfg = requirejs, requirejs = void 0
        }
        "undefined" == typeof require || isFunction(require) || (cfg = require, require = void 0), req = requirejs = function (e, t, i, r) {
            var n, o, a = defContextName;
            return isArray(e) || "string" == typeof e || (o = e, isArray(t) ? (e = t, t = i, i = r) : e = []), o && o.context && (a = o.context), n = getOwn(contexts, a), n || (n = contexts[a] = req.s.newContext(a)), o && n.configure(o), n.require(e, t, i)
        }, req.config = function (e) {
            return req(e)
        }, req.nextTick = "undefined" != typeof setTimeout ? function (e) {
            setTimeout(e, 4)
        } : function (e) {
            e()
        }, require || (require = req), req.version = version, req.jsExtRegExp = /^\/|:|\?|\.js$/, req.isBrowser = isBrowser, s = req.s = {
            contexts: contexts,
            newContext: newContext
        }, req({}), each(["toUrl", "undef", "defined", "specified"], function (e) {
            req[e] = function () {
                var t = contexts[defContextName];
                return t.require[e].apply(t, arguments)
            }
        }), isBrowser && (head = s.head = document.getElementsByTagName("head")[0], baseElement = document.getElementsByTagName("base")[0], baseElement && (head = s.head = baseElement.parentNode)), req.onError = defaultOnError, req.createNode = function (e, t, i) {
            var r = e.xhtml ? document.createElementNS("http://www.w3.org/1999/xhtml", "html:script") : document.createElement("script");
            return r.type = e.scriptType || "text/javascript", r.charset = "utf-8", r.async = !0, r
        };
        var __loadSrc__ = !0;
        window.__qRequire__ && window.__qRequire__.version && (__loadSrc__ = !1), __loadSrc__ || -1 == window.location.href.indexOf("__qJSDebug__=true") || (__loadSrc__ = !0), req.load = function (e, t, i) {
            if (__loadSrc__) {
                if (0 == t.indexOf("common") || 0 == t.indexOf("project")) {
                    var r = i.lastIndexOf("/") + 1;
                    i = i.substr(0, r) + i.substr(r), r = null
                }
            } else i += "?v=" + window.__qRequire__.version;
            var n, o = e && e.config || {};
            if (isBrowser)return n = req.createNode(o, t, i), n.setAttribute("data-requirecontext", e.contextName), n.setAttribute("data-requiremodule", t), !n.attachEvent || n.attachEvent.toString && n.attachEvent.toString().indexOf("[native code") < 0 || isOpera ? (n.addEventListener("load", e.onScriptLoad, !1), n.addEventListener("error", e.onScriptError, !1)) : (useInteractive = !0, n.attachEvent("onreadystatechange", e.onScriptLoad)), n.src = i, currentlyAddingScript = n, baseElement ? head.insertBefore(n, baseElement) : head.appendChild(n), currentlyAddingScript = null, n;
            if (isWebWorker)try {
                importScripts(i), e.completeLoad(t)
            } catch (a) {
                e.onError(makeError("importscripts", "importScripts failed for " + t + " at " + i, a, [t]))
            }
        }, isBrowser && !cfg.skipDataMain && eachReverse(scripts(), function (e) {
            return head || (head = e.parentNode), dataMain = e.getAttribute("data-main"), dataMain ? (mainScript = dataMain, cfg.baseUrl || (src = mainScript.split("/"), mainScript = src.pop(), subPath = src.length ? src.join("/") + "/" : "./", cfg.baseUrl = subPath), mainScript = mainScript.replace(jsSuffixRegExp, ""), req.jsExtRegExp.test(mainScript) && (mainScript = dataMain), cfg.deps = cfg.deps ? cfg.deps.concat(mainScript) : [mainScript], !0) : void 0
        }), define = function (e, t, i) {
            var r, n;
            "string" != typeof e && (i = t, t = e, e = null), isArray(t) || (i = t, t = null), !t && isFunction(i) && (t = [], i.length && (i.toString().replace(commentRegExp, "").replace(cjsRequireRegExp, function (e, i) {
                t.push(i)
            }), t = (1 === i.length ? ["require"] : ["require", "exports", "module"]).concat(t))), useInteractive && (r = currentlyAddingScript || getInteractiveScript(), r && (e || (e = r.getAttribute("data-requiremodule")), n = contexts[r.getAttribute("data-requirecontext")])), (n ? n.defQueue : globalDefQueue).push([e, t, i])
        }, req.exec = function (text) {
            return eval(text)
        }, req(cfg)
    }
}(this);
define("common/models/common/component/antiSpam/antiSpam", ["require"], function (e) {
    function t(e) {
        return ['<div class="qui-antiSpam">', "<div>", '<div class="qui-antiSpam-dt">', '<div class="qui-antiSpam-content">', '<img src="http://static.qyer.com/models/common/component/antiSpam/icon.png" />', '<p class="antiSpamP1">' + (e || "由于敏感词限制，你刚刚发布的内容需要编辑审核后才能被他人访问") + "</p>", '<p class="antiSpamP2 js_antiSpam_close">我知道了 > </p>', "</div>", "</div>", "</div>", "</div>"].join("")
    }

    var a = jQuery;
    qyerUtil.insertStyle([".qui-antiSpam{position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background-image:url(http://static.qyer.com/models/common/images/bg_255_255_255_0.7.png); z-index: 110000; overflow-y: auto; }", ".qui-antiSpam >div{display: table; height: 100%; margin: 0 auto; }", ".qui-antiSpam-dt{display: table-cell; vertical-align:middle; text-align: center; }", ".qui-antiSpam-content{border: 1px solid #ccc; width: 575px; background-color: #f5f5f5; box-shadow: 0px 0px 15px #999; }", ".qui-antiSpam-content > img{margin:50px 0px 30px 0px; }", ".qui-antiSpam-content .antiSpamP1{font-size:20px; width:337px; margin:0 auto; }", ".qui-antiSpam-content .antiSpamP2{font-size:14px; margin:20px 0px 35px 0px; color:#0074b1; cursor:pointer; }"].join(""));
    var i = {
        show: function (e) {
            a(t(e)).appendTo(document.body).find(".js_antiSpam_close").one("click", function (e) {
                a(e.currentTarget).parent().parent().parent().parent().remove()
            })
        }
    };
    return i
}), define("common/models/basic/js/require-css", [], function () {
    function e(e, t) {
        if (o) {
            if (0 == t.indexOf("common") || 0 == t.indexOf("project")) {
                var a = e.lastIndexOf("/") + 1;
                e = e.substr(0, a) + e.substr(a), a = null
            }
        } else e += "?v=" + window.__qRequire__.version;
        return e
    }

    if ("undefined" == typeof window)return {
        load: function (e, t, a) {
            a()
        }
    };
    var t = document.getElementsByTagName("head")[0], a = window.navigator.userAgent.match(/Trident\/([^ ;]*)|AppleWebKit\/([^ ;]*)|Opera\/([^ ;]*)|rv\:([^ ;]*)(.*?)Gecko\/([^ ;]*)|MSIE\s([^ ;]*)/) || 0, i = !1, n = !0;
    a[1] || a[7] ? i = parseInt(a[1]) < 6 || parseInt(a[7]) <= 9 : a[2] ? n = !1 : a[4] && (i = parseInt(a[4]) < 18);
    var s, c = {}, o = !0;
    window.__qRequire__ && window.__qRequire__.version && (o = !1), o || -1 == window.location.href.indexOf("__qJSDebug__=true") || (o = !0);
    var l = function () {
        s = document.createElement("style"), t.appendChild(s)
    }, r = function (t, a, i) {
        if (window.__qRequire__ && window.__qRequire__.combineCSS && window.__qRequire__.combineCSS.length)for (var n = 0, c = window.__qRequire__.combineCSS.length; c > n; n++)if (window.__qRequire__.combineCSS[n] == i)return a();
        t = e(t, i), l();
        var o = s.styleSheet || s.sheet;
        if (o && o.addImport)o.addImport(t), s.onload = a; else {
            s.textContent = '@import "' + t + '";';
            var r = setInterval(function () {
                try {
                    s.sheet.cssRules, clearInterval(r), a()
                } catch (e) {
                }
            }, 10)
        }
    }, d = function (a, i, s) {
        if (window.__qRequire__ && window.__qRequire__.combineCSS && window.__qRequire__.combineCSS.length)for (var c = 0, o = window.__qRequire__.combineCSS.length; o > c; c++)if (window.__qRequire__.combineCSS[c] == s)return i();
        a = e(a, s);
        var l = document.createElement("link");
        if (l.type = "text/css", l.rel = "stylesheet", n)l.onload = function () {
            l.onload = function () {
            }, setTimeout(i, 7)
        }; else var r = setInterval(function () {
            for (var e = 0; e < document.styleSheets.length; e++) {
                var t = document.styleSheets[e];
                if (t.href == l.href)return clearInterval(r), i()
            }
        }, 10);
        l.href = a, t.appendChild(l)
    };
    return c.normalize = function (e, t) {
        return ".css" == e.substr(e.length - 4, 4) && (e = e.substr(0, e.length - 4)), t(e)
    }, c.load = function (e, t, a, n) {
        (i ? r : d)(t.toUrl(e + ".css"), a, e)
    }, c
}), define("web_old_popup", ["css!web_old_popup"], function () {
    var e = jQuery, t = {
        $ui: null,
        $content: null,
        $box: null,
        $title: null,
        $okBtn: null,
        $cancelBtn: null,
        $loadBtn: null,
        $closeIcon: null,
        _uiState: "normal",
        defaultWidth: 400,
        init: function () {
            var t = ['<div class="qui-popup" style="display:none">', "<div>", '<div class="qui-popup-dt">', '<div class="qui-popup-box">', '<div class="qui-popup-closeIcon">&nbsp;</div>', '<div class="qui-popup-box-title fontYaHei">title</div>', '<div class="qui-popup-box-content">', "</div>", '<div class="qui-popup-box-bottom">', "&nbsp;", '<input class="qui-popup-cancelBtn ui_button_cancel" type="button" value="取消" />  ', '<input class="qui-popup-okBtn ui_button" type="button" value="确定" />  ', '<input class="qui-popup-loadingBtn  ui_button_load" type="button" value="" />  ', "</div>", "</div>", "</div>", "</div>", "</div>"].join("");
            this.$ui = e(t), this.$content = this.$ui.find(".qui-popup-box-content"), this.$box = this.$ui.find(".qui-popup-box"), this.$title = this.$ui.find(".qui-popup-box-title"), this.$okBtn = this.$ui.find(".qui-popup-okBtn"), this.$cancelBtn = this.$ui.find(".qui-popup-cancelBtn"), this.$loadBtn = this.$ui.find(".qui-popup-loadingBtn"), this.$closeIcon = this.$ui.find(".qui-popup-closeIcon"), this.$ui.appendTo(document.body)
        },
        setWidth: function (e) {
            this.$box.animate({width: e}, 300)
        },
        setUIDefault: function (e) {
            this.$ui[0].className = "qui-popup", e.exClassName && this.$ui.addClass(e.exClassName), e.iframeSrc ? this.$content.html('<iframe src="' + e.iframeSrc + '"  scrolling="auto" style="height:' + (e.iframeHeight || 300) + 'px;"  />') : this.$content.html(e.contentHTML || "&nbsp;"), this.$title.html(e.title || "Title"), this.$box.css("width", e.width || this.defaultWidth), this.$title[e.showTitle === !1 ? "hide" : "show"](), this.$okBtn.val(e.okText || "确定"), this.$cancelBtn.val(e.cancelText || "取消"), this.$okBtn[e.showOKBtn === !1 ? "hide" : "show"](), this.$okBtn.removeAttr("data-bn-ipg"), this.$cancelBtn[e.showCancelBtn === !1 ? "hide" : "show"](), this.$cancelBtn.removeAttr("data-bn-ipg"), this.$loadBtn[e.showLoadBtn === !0 ? "show" : "hide"](), this.$loadBtn.removeAttr("data-bn-ipg"), this.$ui.find(".qui-popup-closeIcon").removeAttr("data-bn-ipg"), this.$closeIcon[e.showCloseIcon === !1 ? "hide" : "show"]()
        },
        show: function (a) {
            if ("hideing" == t._uiState)t.$box.stop(), t.$ui.stop(), this.$ui.css({
                display: "block",
                opacity: 1
            }), this.$box.css({top: 0, opacity: 1}), t._uiState = "normal", a.onShow && a.onShow(); else {
                t._uiState = "showing";
                var i = {}, n = {top: 0};
                e.support.leadingWhitespace && (i.opacity = 1, n.opacity = 1), this.$ui.css("display", "block").animate(i, 200, function () {
                    t.$box.css("top", -30).animate(n, 200, function () {
                        t._uiState = "normal", a.onShow && a.onShow()
                    })
                })
            }
        },
        hide: function (a) {
            if (!a || !a.onBeforeHide || a.onBeforeHide() !== !1) {
                t._uiState = "hideing";
                var i = {top: -30}, n = {};
                e.support.leadingWhitespace && (i.opacity = 0, n.opacity = 0), this.$box.animate(i, 200, function () {
                    t.$ui.animate(n, 200, function () {
                        t._uiState = "normal", t.$ui.css("display", "none"), t.$content.html(""), a && a.onAfterHide && a.onAfterHide()
                    })
                })
            }
        }
    };
    t.init();
    var a = null, i = {
        show: function (e) {
            return a = e, t.setUIDefault(e), t.$ui.undelegate("click").delegate(".qui-popup-okBtn,.qui-popup-cancelBtn,.qui-popup-closeIcon", "click", function (a) {
                if (-1 != this.className.indexOf("qui-popup-closeIcon") || -1 != this.className.indexOf("qui-popup-cancelBtn")) {
                    if (e.onBeforeCancel && !e.onBeforeCancel(a))return;
                    e.onCancel && e.onCancel()
                } else if (-1 != this.className.indexOf("qui-popup-okBtn") && e.onOK && e.onOK() === !1)return;
                t.hide(e)
            }), t.show(e), this
        }, hide: function () {
            return t.hide(), this
        }, setContent: function (e) {
            return t.$content.html(e), this
        }, getContent: function () {
            return t.$content[0]
        }, getButtons: function () {
            return {
                okBtn: t.$okBtn[0],
                cancelBtn: t.$cancelBtn[0],
                loadBtn: t.$loadBtn[0],
                closeIcon: t.$ui.find(".qui-popup-closeIcon")[0]
            }
        }, setOption: function (i) {
            var n = {
                width: function () {
                    t.setWidth(i.width)
                }, showTitle: function () {
                    i.showTitle === !1 ? t.$title.hide() : t.$title.show()
                }, okText: function () {
                    t.$okBtn.val(i.okText)
                }, cancelText: function () {
                    t.$cancelBtn.val(i.cancelText)
                }, showOKBtn: function () {
                    i.showOKBtn === !1 ? t.$okBtn.hide() : t.$okBtn.show()
                }, showCancelBtn: function () {
                    i.showCancelBtn === !1 ? t.$cancelBtn.hide() : t.$cancelBtn.show()
                }, showLoadBtn: function () {
                    i.showLoadBtn === !1 ? t.$loadBtn.hide() : t.$loadBtn.show()
                }, showCloseIcon: function () {
                    i.showCloseIcon === !1 ? t.$closeIcon.hide() : t.$closeIcon.show()
                }, title: function () {
                    t.$title.html(i.title)
                }, exClassName: function () {
                    t.$ui[0].className = "qui-popup " + i.exClassName
                }, contentHTML: function () {
                    i.iframeSrc || t.$content.html(i.contentHTML)
                }, iframeSrc: function () {
                    t.$content.html('<iframe src="' + i.iframeSrc + '"  scrolling="auto" style="height:' + (i.iframeHeight || 300) + 'px;" />')
                }, iframeHeight: function () {
                    t.$content.children("iframe").css("height", i.iframeHeight)
                }
            };
            for (var s in i)a[s] = i[s], "function" == e.type(n[s]) && n[s]()
        }
    };
    return i
}), define("web_old_tip", ["css!web_old_tip"], function () {
    function e(e) {
        i.html(e.text || "&nbsp;"), a[0].className = "qui-tip-box", "error" == e.type ? a.addClass("qui-tip-box-error") : "warning" == e.type && a.addClass("qui-tip-box-warning")
    }

    var t, a, i, n = jQuery;
    !function () {
        var e = ['<div class="qui-tip" style="display:none;" >', '<div class="qui-tip-box">', '<span class="qui-tip-text fontYaHei">这里是提示文本</span>', "</div>", "</div>"].join("");
        t = n(e), i = t.find(".qui-tip-text"), a = t.find(".qui-tip-box"), t.appendTo(document.body)
    }();
    var s = {
        _timer: null, tip: function (a) {
            return e(a), t.slideDown(200), window.clearTimeout(this._timer), this._timer = setTimeout(function () {
                t.slideUp(200)
            }, a.time || 3e3), this
        }
    };
    return s
}), define("web_ct_logindialog_loginFormValid", ["web_old_tip", "web_old_popup"], function (e, t) {
    function a(e) {
        this.opt = e, this.form = this.opt.form, this.type = this.opt.type, this.fields = $(".field_valid", this.form), this.submit = !1, this.init()
    }

    var i = {
        regcheck: "/qcross/login/auth.php?action=regcheck",
        logincheck: "/qcross/login/auth.php?action=logincheck",
        sendvalid: "/qcross/login/auth.php?action=sendvalid",
        sendsms: "/qcross/login/auth.php?action=sendsms",
        register: "/qcross/login/auth.php?action=register",
        login: "/qcross/login/auth.php?action=login",
        smslogin: "/qcross/login/auth.php?action=smslogin",
        captchacheck: "/qcross/login/auth.php?action=captchacheck",
        bind: "/qcross/login/auth.php?action=bind",
        createfrom3d: "/qcross/login/auth.php?action=createfrom3d"
    };
    a.prototype = {
        init: function () {
            switch (this.fields.each(function () {
                $(this).data("__check__", {check: !1, valid: !1, ajax: !1})
            }), this.type) {
                case"login":
                    this.loginValid(this.form, this.type);
                    break;
                case"register":
                    this.registerValid(this.form, this.type);
                    break;
                case"findPassword":
                    this.findPasswordValid(this.form, this.type);
                    break;
                case"resetPassword":
                    this.resetPasswordValid(this.form, this.type);
                    break;
                case"bindAccount":
                    this.bindAccountValid(this.form, this.type);
                    break;
                case"createAccount":
                    this.createAccountValid(this.form, this.type)
            }
        }, loginValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a[t + "_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), this.bindEventValidCode("login"), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.ajaxSubmit(t)
                }
            })
        }, registerValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a[t + "_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), this.fields.filter("[name=password]").bind("input propertychange", function () {
                var e = a.pwdStrong(this.value), t = "";
                if (-1 != e) {
                    switch (t += '<div class="pwd-strong">', e) {
                        case 0:
                            t += '<div class="bar"><span class="level-1"></span></div><span class="text">安全</span>';
                            break;
                        case 1:
                            t += '<div class="bar"><span class="level-1"></span><span class="level-2"></span></div><span class="text">强</span>';
                            break;
                        default:
                            t += '<div class="bar"><span class="level-1"></span><span class="level-2"></span><span class="level-3"></span></div><span class="text">超强</span>'
                    }
                    t += "</div>"
                }
                $(this).siblings(".message-box").html(t)
            }), this.bindEventValidCode("reg"), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.ajaxSubmit(t)
                }
            })
        }, findPasswordValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a[t + "_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.form.submit()
                }
            }), this.bindEventValidCode("forget")
        }, resetPasswordValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a["register_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), this.fields.filter("[name=password]").bind("input propertychange", function () {
                var t = a.pwdStrong(this.value), i = "";
                if ($("[name=re_password]", e).data("__check__").check = !1, $("[name=re_password]", e).data("__check__").valid = !1, -1 != t) {
                    switch (i += '<div class="pwd-strong">', t) {
                        case 0:
                            i += '<div class="bar"><span class="level-1"></span></div><span class="text">安全</span>';
                            break;
                        case 1:
                            i += '<div class="bar"><span class="level-1"></span><span class="level-2"></span></div><span class="text">强</span>';
                            break;
                        default:
                            i += '<div class="bar"><span class="level-1"></span><span class="level-2"></span><span class="level-3"></span></div><span class="text">超强</span>'
                    }
                    i += "</div>"
                }
                $(this).siblings(".message-box").html(i)
            }), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.form.submit()
                }
            })
        }, bindAccountValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a["account_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), this.bindEventValidCode("bind"), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.ajaxSubmit(t)
                }
            })
        }, createAccountValid: function (e, t) {
            var a = this;
            this.fields.bind("blur", function () {
                $(this).data("__check__").check === !1 && a["account_" + this.name]($(this), $(this).siblings(".message-box"))
            }).bind("input propertychange", function () {
                $(this).data("__check__").check = !1
            }).on("keydown", function (t) {
                13 == t.keyCode && (a.fields.filter(":visible").blur(), e.find(".btn_submit").click())
            }), this.fields.filter("[name=password]").bind("input propertychange", function () {
                var e = a.pwdStrong(this.value), t = "";
                if (-1 != e) {
                    switch (t += '<div class="pwd-strong">', e) {
                        case 0:
                            t += '<div class="bar"><span class="level-1"></span></div><span class="text">安全</span>';
                            break;
                        case 1:
                            t += '<div class="bar"><span class="level-1"></span><span class="level-2"></span></div><span class="text">强</span>';
                            break;
                        default:
                            t += '<div class="bar"><span class="level-1"></span><span class="level-2"></span><span class="level-3"></span></div><span class="text">超强</span>'
                    }
                    t += "</div>"
                }
                $(this).siblings(".message-box").html(t)
            }), this.bindEventValidCode("reg"), e.find(".btn_submit").bind("click", function () {
                if (!$(this).is(".ui_button_load")) {
                    e.closest(".qui-login-section").find(".section-message-box").html("");
                    var t = $(this), i = !0, n = !1;
                    a.fields.filter(":visible").each(function () {
                        var e = $(this).data("__check__").valid;
                        e || ($(this).trigger("blur"), i = !1), $(this).data("__check__").ajax === !0 && (n = !0)
                    }), n ? setTimeout(function () {
                        t.click()
                    }, 10) : i && a.ajaxSubmit(t)
                }
            })
        }, bindEventValidCode: function (e) {
            var t = this;
            this.form.on("click", ".button_code", function (e, i) {
                if ($(this).hasClass("ui_button_disabled") || $(this).hasClass("ui_button_load"))return !1;
                var n = this.getAttribute("data-type"), s = t.form.find(":input[name=" + n + "_input]"), c = t.form.find(":input[name=valid_code]"), o = (s.siblings(".message-box"), $(this));
                if ("undefined" == typeof i && (s.blur(), c.blur()), s.data("__check__").ajax || c.data("__check__").ajax) {
                    if ("undefined" != typeof i && i > 300)return !1;
                    setTimeout(function () {
                        o.trigger("click", ["undefined" != typeof i ? ++i : 0])
                    }, 10)
                }
                s.data("__check__").valid && c.data("__check__").valid && a(s, o, n)
            }), this.form.on("click", ".check_code img", function () {
                var e = $(this).closest(".check_code").siblings(".input_check_code");
                e.data("__check__").check = !1, e.removeClass("input_error input_success"), e.val("")
            });
            var a = function (a, n, s) {
                n.removeClass("ui_button").addClass("ui_button_load").text("");
                var c = "login" === e ? i.sendsms : i.sendvalid, o = {
                    input: ("phone" == s ? t.form.find("[name=area_code]").val() + "-" : "") + a.val(),
                    type: s,
                    valid_code: t.form.find(":input[name=valid_code]").val(),
                    timer: +new Date,
                    "for": e
                }, l = n.siblings(".message-box");
                $.getJSON(c, o, function (e) {
                    0 == e.error_code ? (t.btnDisabled(n, 60), e.data && e.data.mailurl ? l.html('<span class="fr">已发送<a target="_blank" href="' + e.data.mailurl + '">到邮箱查看</a></span>') : l.html('<span class="fr">已发送</span>')) : (n.removeClass("ui_button_load").addClass("ui_button").text("发送验证码"), l.html('<span class="checkerror">' + e.data.msg + "</span>"))
                })
            }
        }, ajaxSubmit: function (e) {
            e.is(".ui_button_load") || (e.removeClass("ui_button").addClass("ui_button_load").val(""), this[this.type + "Submit"] && this[this.type + "Submit"](e))
        }, loginSubmit: function (e) {
            var t = this, a = function () {
                var a = t.fields.filter("[name=account]"), n = {
                    type: "account",
                    input: $.trim(a.val()),
                    password: $.trim(t.fields.filter("[name=password]").val())
                };
                t.fields.filter("[name=valid_code]").is(":visible") && (n.valid_code = $.trim(t.fields.filter("[name=valid_code]").val())), t.form.find("[name=remember]")[0].checked && (n.remember = 1), $.post(i.login, n, function (i) {
                    switch (e.removeClass("ui_button_load").addClass("ui_button").val("登录"), i.error_code) {
                        case 0:
                            if (i.data && i.data.arr_synlogin)for (var s = 0, c = i.data.arr_synlogin.length; c > s; s++)try {
                                -1 != i.data.arr_synlogin[s].indexOf("login.qyer.com") ? $.getScript(i.data.arr_synlogin[s]).done(function () {
                                    t.loginForward(i)
                                }) : t.form.append('<img src="' + i.data.arr_synlogin[s] + '" style="width:0;height:0;border:0;visibility:hidden;">')
                            } catch (o) {
                            }
                            var l = "page";
                            t.form.closest(".qui-popup-logindialog").length > 0 && (l = "layer"), qyerUtil.doTrackCode(t.successtrack("login", l, n.type));
                            break;
                        case 400015:
                            var r = t.fields.filter("[name=password]"), d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">' + i.data.msg + "</span>"), r.data("__check__").check = !1, r.data("__check__").valid = !1, r.focus();
                            break;
                        case 400016:
                            t.form.find(".input-control-validcode").removeClass("input-control input-control-login-phone"), t.form.find(".input-control-validcode").is(":hidden") && t.form.find(".input-control-validcode").show(), t.form.find(".input-control-validcode .check_code img").click();
                            var r = t.fields.filter("[name=password]"), d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">' + i.data.msg + "</span>"), r.data("__check__").check = !1, r.data("__check__").valid = !1, r.focus();
                            break;
                        case 400010:
                            var r = t.fields.filter("[name=valid_code]"), d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">' + i.data.msg + "</span>"), r.data("__check__").check = !1, r.data("__check__").valid = !1, r.focus();
                            break;
                        case 400017:
                            var _ = "http://login.qyer.com/?action=" + ("mail" == n.type ? "getemailpass" : "getmobilepass");
                            d = t.form.closest(".qui-login-section").find(".section-message-box"), d.html('<span class="checkerror">密码错误次数已达上限，请等待30分钟再尝试 或 <a href="' + _ + '" target="_blank">找回密码</a></span>');
                            break;
                        case 400018:
                            var r = a, d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">该账号已被封禁 <a href="http://login.qyer.com/?action=appeal" target="_blank">查看理由并申诉</a></span>'), r.data("__check__").check = !1, r.data("__check__").valid = !1;
                            break;
                        case 400028:
                            var h = i.data.input, p = "";
                            switch (i.data.bind) {
                                case"":
                                    p = "getriskuserpass";
                                    break;
                                case"mail":
                                    p = "getriskemailpass";
                                    break;
                                case"phone":
                                    p = "getriskmobilepass"
                            }
                            window.location = "http://login.qyer.com/?action=" + p + "&input_val=" + h;
                            break;
                        default:
                            var d = t.form.closest(".qui-login-section").find(".section-message-box");
                            d.html('<span class="checkerror">' + i.data.msg + "</span>")
                    }
                }, "json")
            }, n = function () {
                var a = t.fields.filter("[name=phone_input]"), n = {
                    phone: [$.trim(a.siblings("[name=area_code]").val()), $.trim(a.val())].join("-"),
                    valid_code: $.trim(t.fields.filter("[name=phone_valid_code]").val()),
                    "for": "login"
                };
                $.post(i.smslogin, n, function (i) {
                    switch (e.removeClass("ui_button_load").addClass("ui_button").val("登录"), i.error_code) {
                        case 0:
                            if (i.data && i.data.arr_synlogin)for (var s = 0, c = i.data.arr_synlogin.length; c > s; s++)try {
                                -1 != i.data.arr_synlogin[s].indexOf("login.qyer.com") ? $.getScript(i.data.arr_synlogin[s]).done(function () {
                                    t.loginForward(i)
                                }) : t.form.append('<img src="' + i.data.arr_synlogin[s] + '" style="width:0;height:0;border:0;visibility:hidden;">')
                            } catch (o) {
                            }
                            var l = "page";
                            t.form.closest(".qui-popup-logindialog").length > 0 && (l = "layer"), qyerUtil.doTrackCode(t.successtrack("login", l, n.type));
                            break;
                        case 400005:
                            t.smsCreatePopup(n);
                            break;
                        case 400018:
                            var r = a, d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">该账号已被封禁 <a href="http://login.qyer.com/?action=appeal" target="_blank">查看理由并申诉</a></span>'), r.data("__check__").check = !1, r.data("__check__").valid = !1;
                            break;
                        case 400029:
                            var r = t.fields.filter("[name=phone_valid_code]"), d = r.siblings(".message-box");
                            r.removeClass("input_success").addClass("input_error"), d.html('<span class="checkerror">' + i.data.msg + "</span>"), r.data("__check__").check = !1, r.data("__check__").valid = !1, r.focus();
                            break;
                        default:
                            var d = t.form.closest(".qui-login-section").find(".section-message-box");
                            d.html('<span class="checkerror">' + i.data.msg + "</span>")
                    }
                }, "json")
            };
            this.form.find(".input-control-login-mail").is(":visible") ? a() : n()
        }, loginForward: function (t) {
            var a = this;
            if ("function" == typeof a.opt.callback && a.opt.callback(), a.form.closest(".qui-login-section").addClass("section-bg"), t.data.needBind === !0) {
                var i = "";
                i = a.form.closest(".qui-popup-logindialog").length > 0 ? window.location : a.getQueryParam("refer") ? decodeURIComponent(a.getQueryParam("refer")) : "http://www.qyer.com/", a.bindAccountPopup(t.data.username, i)
            } else e.tip({
                text: "登录成功",
                time: 2e3
            }), a.opt.onAfterLogin && a.opt.onAfterLogin(), a.opt.skip_login_reload !== !0 && setTimeout(function () {
                a.form.closest(".qui-popup-logindialog").length > 0 ? window.location.reload() : a.getQueryParam("refer") ? window.location = decodeURIComponent(a.getQueryParam("refer")) : window.location = "http://www.qyer.com/"
            }, 1500)
        }, registerSubmit: function (t) {
            var a = {
                username: $.trim(this.fields.filter("[name=username]").val()),
                password: $.trim(this.fields.filter("[name=password]").val())
            }, n = null, s = this;
            this.form.find(".input-control-register-mail").is(":visible") ? (n = this.fields.filter("[name=mail_input]"), a.input = $.trim(this.fields.filter("[name=mail_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=mail_valid_code]").val()), a.type = "mail") : (n = this.fields.filter("[name=phone_input]"), a.input = $.trim(n.siblings("[name=area_code]").val()) + "-" + $.trim(this.fields.filter("[name=phone_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=phone_valid_code]").val()), a.type = "phone"), $.post(i.register, a, function (i) {
                switch (t.removeClass("ui_button_load").addClass("ui_button").val("注册"), i.error_code) {
                    case 0:
                        var n = 1500, c = {}, o = "page";
                        if (s.form.closest(".qui-popup-logindialog").length > 0 && (o = "layer"), qyerUtil.doTrackCode(s.successtrack("register", o, a.type)), s.form.closest(".qui-login-section").addClass("section-bg"), i.data && 2 == i.data.bad_word) {
                            var l = "";
                            l = s.form.closest(".qui-popup-logindialog").length > 0 ? window.location.href : s.getQueryParam("refer") ? decodeURIComponent(s.getQueryParam("refer")) : "http://www.qyer.com/", c.text = '注册成功！你发布的内容正在接受穷游为你独家定制的X关检查。不要担心，正常内容马上就会通过。请不要重复发布哟～<br><a href="' + l + '">我知道了。</a>', c.type = "warning", n = 5e3
                        } else c.text = "注册成功";
                        if (c.time = n, e.tip(c), i.data && i.data.arr_synlogin)for (var r = 0, d = i.data.arr_synlogin.length; d > r; r++)try {
                            s.form.append('<img src="' + i.data.arr_synlogin[r] + '" style="width:0;height:0;border:0;visibility:hidden;">')
                        } catch (_) {
                        }
                        s.opt.onAfterRegister && s.opt.onAfterRegister(), s.opt.skip_register_reload !== !0 && setTimeout(function () {
                            s.form.closest(".qui-popup-logindialog").length > 0 ? window.location.reload() : s.getQueryParam("refer") ? window.location = decodeURIComponent(s.getQueryParam("refer")) : window.location = "http://www.qyer.com/"
                        }, n);
                        break;
                    case 400003:
                    case 400001:
                    case 400002:
                        var h = s.fields.filter("[name=" + a.type + "_input]"), p = h.siblings(".message-box");
                        h.removeClass("input_success").addClass("input_error"), p.html('<span class="checkerror">' + i.data.msg + "</span>"), h.data("__check__").check = !1, h.data("__check__").valid = !1, h.focus();
                        break;
                    case 400010:
                    case 400011:
                        var h = s.fields.filter("[name=" + a.type + "_valid_code]"), p = h.siblings(".message-box");
                        h.removeClass("input_success").addClass("input_error"), p.html('<span class="checkerror">' + i.data.msg + "</span>"), h.data("__check__").check = !1, h.data("__check__").valid = !1, h.focus();
                        break;
                    case 400012:
                        var h = s.fields.filter("[name=username]"), p = h.siblings(".message-box");
                        h.removeClass("input_success").addClass("input_error"), p.html('<span class="checkerror">' + i.data.msg + "</span>"), h.data("__check__").check = !1, h.data("__check__").valid = !1, h.focus();
                        break;
                    case 400013:
                    case 400014:
                        var h = s.fields.filter("[name=password]"), p = h.siblings(".message-box");
                        h.removeClass("input_success").addClass("input_error"), p.html('<span class="checkerror">' + i.data.msg + "</span>"), h.data("__check__").check = !1, h.data("__check__").valid = !1, h.focus();
                        break;
                    default:
                        var p = s.form.closest(".qui-login-section").find(".section-message-box");
                        p.html('<span class="checkerror">' + i.data.msg + "</span>")
                }
            }, "json")
        }, bindAccountSubmit: function (t) {
            var a = {}, n = null, s = this;
            this.form.find(".input-control-register-mail").is(":visible") ? (n = this.fields.filter("[name=mail_input]"), a.input = $.trim(this.fields.filter("[name=mail_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=mail_valid_code]").val()), a.type = "mail") : (n = this.fields.filter("[name=phone_input]"), a.input = $.trim(n.siblings("[name=area_code]").val()) + "-" + $.trim(this.fields.filter("[name=phone_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=phone_valid_code]").val()), a.type = "phone"), $.post(i.bind, a, function (i) {
                switch (t.removeClass("ui_button_load").addClass("ui_button").val("绑定" + ("mail" == a.type ? "邮箱" : "手机号")), i.error_code) {
                    case 0:
                        if (i.data && i.data.arr_synlogin)for (var n = 0, c = i.data.arr_synlogin.length; c > n; n++)try {
                            -1 != i.data.arr_synlogin[n].indexOf("login.qyer.com") ? $.getScript(i.data.arr_synlogin[n]).done(function () {
                                e.tip({text: "绑定成功", time: 2e3}), setTimeout(function () {
                                    s.getQueryParam("refer") ? window.location = decodeURIComponent(s.getQueryParam("refer")) : window.location = "http://www.qyer.com/"
                                }, 1500)
                            }) : s.form.append('<img src="' + i.data.arr_synlogin[n] + '" style="width:0;height:0;border:0;visibility:hidden;">')
                        } catch (o) {
                        }
                        break;
                    case 400003:
                    case 400001:
                    case 400002:
                        var l = s.fields.filter("[name=" + a.type + "_input]"), r = l.siblings(".message-box");
                        l.removeClass("input_success").addClass("input_error"), r.html('<span class="checkerror">' + i.data.msg + "</span>"), l.data("__check__").check = !1, l.data("__check__").valid = !1, l.focus();
                        break;
                    case 400010:
                    case 400011:
                        var l = s.fields.filter("[name=" + a.type + "_valid_code]"), r = l.siblings(".message-box");
                        l.removeClass("input_success").addClass("input_error"), r.html('<span class="checkerror">' + i.data.msg + "</span>"), l.data("__check__").check = !1, l.data("__check__").valid = !1, l.focus();
                        break;
                    default:
                        var r = s.form.closest(".qui-login-section").find(".section-message-box");
                        r.html('<span class="checkerror">' + i.data.msg + "</span>")
                }
            }, "json")
        }, createAccountSubmit: function (t) {
            var a = {password: $.trim(this.fields.filter("[name=password]").val())}, n = null, s = this;
            this.form.find(".input-control-register-mail").is(":visible") ? (n = this.fields.filter("[name=mail_input]"), a.input = $.trim(this.fields.filter("[name=mail_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=mail_valid_code]").val()), a.type = "mail") : (n = this.fields.filter("[name=phone_input]"), a.input = $.trim(n.siblings("[name=area_code]").val()) + "-" + $.trim(this.fields.filter("[name=phone_input]").val()), a.valid_code = $.trim(this.fields.filter("[name=phone_valid_code]").val()), a.type = "phone"), $.post(i.createfrom3d, a, function (i) {
                switch (t.removeClass("ui_button_load").addClass("ui_button").val("创建账号"), i.error_code) {
                    case 0:
                        e.tip({text: "创建成功", time: 2e3}), setTimeout(function () {
                            s.getQueryParam("refer") ? window.location = decodeURIComponent(s.getQueryParam("refer")) : window.location = "http://www.qyer.com/"
                        }, 1500);
                        break;
                    case 400003:
                    case 400001:
                    case 400002:
                        var n = s.fields.filter("[name=" + a.type + "_input]"), c = n.siblings(".message-box");
                        n.removeClass("input_success").addClass("input_error"), c.html('<span class="checkerror">' + i.data.msg + "</span>"), n.data("__check__").check = !1, n.data("__check__").valid = !1, n.focus();
                        break;
                    case 400010:
                    case 400011:
                        var n = s.fields.filter("[name=" + a.type + "_valid_code]"), c = n.siblings(".message-box");
                        n.removeClass("input_success").addClass("input_error"), c.html('<span class="checkerror">' + i.data.msg + "</span>"), n.data("__check__").check = !1, n.data("__check__").valid = !1, n.focus();
                        break;
                    case 400013:
                    case 400014:
                        var n = s.fields.filter("[name=password]"), c = n.siblings(".message-box");
                        n.removeClass("input_success").addClass("input_error"), c.html('<span class="checkerror">' + i.data.msg + "</span>"), n.data("__check__").check = !1, n.data("__check__").valid = !1, n.focus();
                        break;
                    default:
                        var c = s.form.closest(".qui-login-section").find(".section-message-box");
                        c.html('<span class="checkerror">' + i.data.msg + "</span>")
                }
            }, "json")
        }, bindAccountPopup: function (e, a) {
            var i = ['<div class="qui-account-container">', '<p class="title">Hi, ' + e + "</p>", "<p>为了你的账号安全，请绑定邮箱或手机号</p>", "<ul>", "<li>忘记密码随时找回</li>", "<li>账号异常及时提醒并验证解除异常</li>", "</ul>", '<div class="btns">', '<a class="btn" href="http://login.qyer.com/?action=bindmail">绑定邮箱</a>', '<a class="btn" href="http://login.qyer.com/?action=bindphone">绑定手机号</a>', "</div>", '<div class="links"><a href="' + a + '">下次再绑定</a></div>', "</div>"].join("");
            t.hide(), t.show({
                showCloseIcon: !1,
                showTitle: !1,
                width: 400,
                exClassName: "qui-popup-account",
                showOKBtn: !1,
                showCancelBtn: !1,
                contentHTML: i
            })
        }, smsCreatePopup: function (a) {
            var n = this, s = $(['<div class="qui-create-container">', '<p class="title">终于等到你~该手机号还未绑定穷游账号，</p>', "<p>3秒钟为你创建一个新穷游账号</p>", '<div class="btns">', '<a class="btn cancel" href="javascript:;">取消</a>', '<a class="btn smsCreate" href="javascript:;">立即创建</a>', "</div>", "</div>"].join(""));
            t.hide(), t.show({
                showCloseIcon: !1,
                showTitle: !1,
                width: 340,
                exClassName: "qui-popup-account",
                showOKBtn: !1,
                showCancelBtn: !1,
                contentHTML: s
            }), s.on("click", ".cancel", function () {
                t.hide(), n.form.find(".input-control-validcode .check_code img").click(), n.fields.filter("[name=valid_code]").val(""), n.fields.filter("[name=valid_code]").data("__check__").check = !1, n.fields.filter("[name=valid_code]").data("__check__").valid = !1,
                    n.fields.filter("[name=phone_valid_code]").val(""), n.fields.filter("[name=phone_valid_code]").data("__check__").check = !1, n.fields.filter("[name=phone_valid_code]").data("__check__").valid = !1
            }), s.on("click", ".smsCreate", function () {
                a["for"] = "reg", $.post(i.smslogin, a, function (t) {
                    if (0 === t.error_code) {
                        if (t.data && t.data.arr_synlogin)for (var i = 0, s = t.data.arr_synlogin.length; s > i; i++)try {
                            -1 != t.data.arr_synlogin[i].indexOf("login.qyer.com") ? $.getScript(t.data.arr_synlogin[i]).done(function () {
                                n.loginForward(t)
                            }) : n.form.append('<img src="' + t.data.arr_synlogin[i] + '" style="width:0;height:0;border:0;visibility:hidden;">')
                        } catch (c) {
                        }
                        var o = "page";
                        n.form.closest(".qui-popup-logindialog").length > 0 && (o = "layer"), qyerUtil.doTrackCode(n.successtrack("login", o, a.type))
                    } else {
                        var l = {type: "warning", text: "系统错误，登录失败", time: 2e3};
                        t.data && t.data.msg && (l.text = t.data.msg), e.tip(l)
                    }
                }, "json")
            })
        }, login_account: function (e, t) {
            if (e.removeClass("input_error"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {input: $.trim(e.val()), type: "account", timer: +new Date}, n = this;
                $.getJSON(i.logincheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? a.data && a.data.from ? (e.addClass("input_error"), t.html('<span class="checkerror">该用户名通过' + a.data.from + '登录创建 <a class="otherlogin-link" href="javascript:;" data-type="' + a.data.from + '">' + a.data.from + "登录</a></span>"), e.data("__check__").valid = !1) : (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            }
        }, login_phone_input: function (e, t) {
            e.removeClass("input_error"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_num(e.val()) ? e.data("__check__").valid = !0 : (e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的手机号码</span>'), e.data("__check__").valid = !1)
        }, login_password: function (e, t) {
            e.removeClass("input_error"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : (t.html(""), e.data("__check__").valid = !0)
        }, login_valid_code: function (e, t) {
            if (e.removeClass("input_error"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {valid_code: $.trim(e.val()), timer: +new Date}, n = this;
                $.getJSON(i.captchacheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.siblings(".check_code").find("img").click(), e.removeClass("input_success").addClass("input_error"), e.val(""), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            }
        }, login_phone_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, register_mail_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.parent().removeClass("input-clear-wrap"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用于登录的邮箱地址</span>'), e.data("__check__").valid = !1; else if (this.check_mail(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = {input: $.trim(e.val()), type: "mail", timer: +new Date}, s = this;
                $.getJSON(i.regcheck, n, function (i) {
                    if (e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), s.ajax_check = !1, 0 == i.error_code)e.parent().removeClass("input-clear-wrap"), e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a(); else if (400001 == i.error_code) {
                        if (e.addClass("input_error"), s.form.closest(".qui-popup-logindialog").length > 0)t.html('<span class="checkerror">该账号已存在，请<a class="change-login-type" data-action="login" data-type="mail" data-val="' + $.trim(e.val()) + '" href="javascript:;">直接登录</a></span>'); else {
                            var n = s.form.find(".link-login").attr("href");
                            n += (-1 == n.indexOf("?") ? "?" : "&") + "dataType=mail&dataInput=" + $.trim(e.val()), t.html('<span class="checkerror">该账号已存在，请<a href="' + n + '">直接登录</a></span>')
                        }
                        e.data("__check__").valid = !1
                    } else e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1
                })
            } else e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的邮箱地址</span>'), e.data("__check__").valid = !1
        }, register_mail_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, register_phone_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用户登录的手机号码</span>'), e.data("__check__").valid = !1; else if (this.check_num(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = e.siblings("[name=area_code]").val(), s = $.trim(n) + "-" + $.trim(e.val()), c = {
                    input: s,
                    type: "phone",
                    timer: +new Date
                }, o = this;
                $.getJSON(i.regcheck, c, function (i) {
                    if (e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), o.ajax_check = !1, 0 == i.error_code)e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a(); else if (400002 == i.error_code) {
                        if (e.addClass("input_error"), o.form.closest(".qui-popup-logindialog").length > 0)t.html('<span class="checkerror">该账号已存在，请<a class="change-login-type" data-action="login" data-type="phone" data-val="' + $.trim(e.val()) + '" href="javascript:;">直接登录</a></span>'); else {
                            var n = o.form.find(".link-login").attr("href");
                            n += (-1 == n.indexOf("?") ? "?" : "&") + "dataType=phone&dataInput=" + $.trim(e.val()), t.html('<span class="checkerror">该账号已存在，请<a href="' + n + '">直接登录</a></span>')
                        }
                        e.data("__check__").valid = !1
                    } else e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1
                })
            } else e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的手机号码</span>'), e.data("__check__").valid = !1
        }, register_phone_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, register_valid_code: function (e, t) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {valid_code: $.trim(e.val()), timer: +new Date}, n = this;
                $.getJSON(i.captchacheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            }
        }, register_username: function (e, t) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else if (this.check_username_len(e.val()))if (this.check_username(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {input: $.trim(e.val()), type: "username", timer: +new Date}, n = this;
                $.getJSON(i.regcheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            } else e.addClass("input_error"), t.html('<span class="checkerror">用户名只可由中英文，数字及‘-’‘_’符号组成</span>'), e.data("__check__").valid = !1; else e.addClass("input_error"), t.html('<span class="checkerror">用户名长度需为3-15个字符</span>'), e.data("__check__").valid = !1
        }, register_password: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_password(e.val()) ? (e.addClass("input_success"), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">密码需要8-16位，包含字母及数字</span>'), e.data("__check__").valid = !1)
        }, register_re_password: function (e, t) {
            var a = this.fields.filter("[name=password]");
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_equal(e.val(), a.val()) ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">两次输入不一致</span>'), e.data("__check__").valid = !1)
        }, account_mail_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.parent().removeClass("input-clear-wrap"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用于登录的邮箱地址</span>'), e.data("__check__").valid = !1; else if (this.check_mail(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = {input: $.trim(e.val()), type: "mail", timer: +new Date}, s = this;
                $.getJSON(i.regcheck, n, function (i) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), s.ajax_check = !1, 0 == i.error_code ? (e.parent().removeClass("input-clear-wrap"), e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a()) : 400001 == i.error_code ? (e.addClass("input_error"), t.html('<span class="checkerror">该邮箱已存在</span>'), e.data("__check__").valid = !1) : (e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            } else e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的邮箱地址</span>'), e.data("__check__").valid = !1
        }, account_mail_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, account_phone_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用户登录的手机号码</span>'), e.data("__check__").valid = !1; else if (this.check_num(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = e.siblings("[name=area_code]").val(), s = $.trim(n) + "-" + $.trim(e.val()), c = {
                    input: s,
                    type: "phone",
                    timer: +new Date
                }, o = this;
                $.getJSON(i.regcheck, c, function (i) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), o.ajax_check = !1, 0 == i.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a()) : 400002 == i.error_code ? (e.addClass("input_error"), t.html('<span class="checkerror">该手机号已存在</span>'), e.data("__check__").valid = !1) : (e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            } else e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的手机号码</span>'), e.data("__check__").valid = !1
        }, account_phone_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, account_valid_code: function (e, t) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {valid_code: $.trim(e.val()), timer: +new Date}, n = this;
                $.getJSON(i.captchacheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            }
        }, account_password: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_password(e.val()) ? (e.addClass("input_success"), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">密码需要8-16位，包含字母及数字</span>'), e.data("__check__").valid = !1)
        }, findPassword_mail_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.parent().removeClass("input-clear-wrap"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用于登录的邮箱地址</span>'), e.data("__check__").valid = !1; else if (this.check_mail(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = {input: $.trim(e.val()), type: "mail", timer: +new Date}, s = this;
                $.getJSON(i.logincheck, n, function (i) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), s.ajax_check = !1, 0 == i.error_code ? (e.parent().removeClass("input-clear-wrap"), e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a()) : (e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            } else e.parent().addClass("input-clear-wrap"), e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的邮箱地址</span>'), e.data("__check__").valid = !1
        }, findPassword_mail_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, findPassword_phone_input: function (e, t, a) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入用户登录的手机号码</span>'), e.data("__check__").valid = !1; else if (this.check_num(e.val())) {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var n = e.siblings("[name=area_code]").val(), s = $.trim(n) + "-" + $.trim(e.val()), c = {
                    input: s,
                    type: "phone",
                    timer: +new Date
                }, o = this;
                $.getJSON(i.logincheck, c, function (i) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), o.ajax_check = !1, 0 == i.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0, a && a()) : (e.addClass("input_error"), t.html('<span class="checkerror">' + i.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            } else e.addClass("input_error"), t.html('<span class="checkerror">请输入正确的手机号码</span>'), e.data("__check__").valid = !1
        }, findPassword_phone_valid_code: function (e, t) {
            e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()) ? (e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1) : this.check_valid_code(e.val()) ? (t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">验证码格式有误</span>'), e.data("__check__").valid = !1)
        }, findPassword_valid_code: function (e, t) {
            if (e.removeClass("input_error input_success"), e.data("__check__").check = !0, t.html(""), this.check_empty(e.val()))e.addClass("input_error"), t.html('<span class="checkerror">请输入' + e[0].title + "</span>"), e.data("__check__").valid = !1; else {
                if (e.data("__check__").ajax === !0)return;
                e.data("__check__").ajax = !0, e.addClass("ui3_input_icon_loading");
                var a = {valid_code: $.trim(e.val()), timer: +new Date}, n = this;
                $.getJSON(i.captchacheck, a, function (a) {
                    e.data("__check__").ajax = !1, e.removeClass("ui3_input_icon_loading"), n.ajax_check = !1, 0 == a.error_code ? (e.addClass("input_success"), t.html(""), e.data("__check__").valid = !0) : (e.addClass("input_error"), t.html('<span class="checkerror">' + a.data.msg + "</span>"), e.data("__check__").valid = !1)
                })
            }
        }, check_empty: function (e) {
            return "" == $.trim(e)
        }, check_mail: function (e) {
            return /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test($.trim(e))
        }, check_num: function (e) {
            return !isNaN($.trim(e))
        }, check_username: function (e) {
            return /^[\u4e00-\u9fa5\w-－]+$/.test($.trim(e))
        }, check_username_len: function (e) {
            var t = this.strlen($.trim(e));
            return t >= 3 && 15 >= t
        }, check_valid_code: function (e) {
            return /^[0-9]{6}$/.test($.trim(e))
        }, check_password: function (e) {
            return /^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[\w\W]{8,16}$/.test($.trim(e))
        }, check_equal: function (e, t) {
            return e == t
        }, check_ajax: function (e) {
            var t = $.extend({dataType: "json", type: "get"}, e);
            $.ajax(t)
        }, pwdStrong: function (e) {
            var t = 0, e = $.trim(e);
            return this.check_password(e) ? (e.length > 10 && t++, /^(?=.*[a-z]+)(?=.*[0-9]+)(?=.*[A-Z]+)[\w\W]{8,16}$/.test(e) && t++, /\W/.test(e) && t++, t) : -1
        }, parseURL: function (e) {
            var t = document.createElement("a");
            return t.href = e, {
                source: e,
                protocol: t.protocol.replace(":", ""),
                host: t.hostname,
                port: t.port,
                query: t.search,
                params: function () {
                    for (var e, a = {}, i = t.search.replace(/^\?/, "").split("&"), n = i.length, s = 0; n > s; s++)i[s] && (e = i[s].split("="), a[e[0]] = e[1]);
                    return a
                }(),
                file: (t.pathname.match(/\/([^\/?#]+)$/i) || [, ""])[1],
                hash: t.hash.replace("#", ""),
                path: t.pathname.replace(/^([^\/])/, "/$1"),
                relative: (t.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ""])[1],
                segments: t.pathname.replace(/^\//, "").split("/")
            }
        }, getQueryParam: function (e) {
            e = e.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var t = "[\\?&]" + e + "=([^&#]*)", a = new RegExp(t), i = a.exec(window.location.href);
            return null == i ? null : i[1]
        }, btnDisabled: function (e, t) {
            e[0].timer && clearInterval(e[0].timer), e.removeClass("ui_button_load").addClass("ui_button_disabled").text("重新发送(" + t + "s)"), e[0].timer = setInterval(function () {
                t--, e.text("重新发送(" + t + "s)"), 0 >= t && (clearInterval(e[0].timer), e.removeClass("ui_button_disabled").addClass("ui_button").text("发送验证码"))
            }, 1e3)
        }, strlen: function (e) {
            var t, a;
            for (t = 0, a = 0; a < e.length; a++)e.charCodeAt(a) > 255 ? t += 2 : t++;
            return t
        }, successtrack: function (e, t, a) {
            var i = "web-" + e + "-" + t + "success-" + a;
            return this.opt.databnipg && (i += "-" + this.opt.databnipg.split("-").join("")), i
        }
    }, $.fn.extend({
        loginFormValid: function (e, t) {
            var i = {form: this, type: "login"};
            "string" == typeof e ? i.type = e : "object" == typeof e && $.extend(i, e), t && (i.callback = t), new a(i)
        }
    })
}), define("web_old_select", ["css!web_old_select"], function () {
    function e(e, t) {
        for (var a = [], i = t; i < e.length; i++)a.push(e[i]);
        return a
    }

    function t(e) {
        this.$obj = e.$obj, this.$title = this.$obj.find(".titles > .title-text"), this.$content = this.$obj.find(".contents"), this.option = e.option, this.selectIndex = 0, this.setUI(), this.bindEvent(), this.setDefaultValue()
    }

    var a = jQuery;
    t.prototype = {
        $obj: null,
        $title: null,
        $content: null,
        option: null,
        selectIndex: null,
        _disable: !1,
        setUI: function () {
            var e = this.$obj.find(".titles"), t = this.$obj.attr("data-ui-width");
            t = t ? t : e.outerWidth(), t = parseInt(t, 10), 0 >= t && (t = 100), t -= 2, e.css("width", t), this.$obj.css("width", e.outerWidth());
            var a = this.$obj.attr("data-ui-height");
            a && (this.$obj.css("height", a), this.$obj.find(".titles").css("line-height", a), this.$content.css("top", a)), t = this.$obj.attr("data-ui-menuWidth"), t = t ? t : e.outerWidth(), t = parseInt(t, 10), t -= 2, this.$content.css("width", t), t = a = e = null
        },
        bindEvent: function () {
            var e = this, t = 200;
            this.$obj.delegate(".titles", "click", function (i) {
                e._disable || (window.__currentSelect__ && window.__currentSelect__ != e && window.__currentSelect__.$content.slideUp(t), window.__currentSelect__ = e, i.stopPropagation(), e.$content.is(":hidden") ? (e.$content.slideDown(t), a(document).one("click", function () {
                    e.$content.slideUp(t)
                })) : e.$content.slideUp(t))
            }), this.$obj.delegate(".contents > ul > li ", "click", function () {
                e.$content.slideUp(t);
                var i = a(this);
                if (e.option && e.option.onBeforeChange) {
                    var n = e.option.onBeforeChange.call(e.$obj[0], i[0]);
                    if (n === !1)return
                }
                e.selectIndex = i.index();
                var s = i.attr("data-value");
                e.$obj.attr("data-value", s), e.$title.html(i.find("a").html()), e.option && e.option.onChange && e.option.onChange.call(e.$obj[0], i[0]), i = s = null
            })
        },
        setDefaultValue: function () {
            var e = a.trim(this.$obj.attr("data-dafaultValue"));
            if (e) {
                var t = this.$content.find('ul > li[data-value="' + e + '"] ');
                t.length && (this.selectIndex = t.index(), this.$title.html(t.text())), t = null
            }
            e = null
        },
        getSelectItem: function () {
            return this.$content.find("ul > li:eq(" + this.selectIndex + ") ")[0]
        },
        setSelectIndex: function (e) {
            this.selectIndex = e;
            var t = this.$content.find("ul > li:eq(" + e + ") > a ").html();
            this.$title.html(t), t = null
        },
        getSelectIndex: function () {
            return this.selectIndex
        },
        setOption: function (e, t) {
            this.option[e] = t
        },
        setValue: function (e) {
            var t = this.$content.find('ul > li[data-value="' + e + '"]');
            this.selectIndex = t.index(), this.$title.html(t.children("a").html()), t = null
        },
        disable: function () {
            this._disable = !0, this.$obj.addClass("qui-select-disable")
        },
        enable: function () {
            this._disable = !1, this.$obj.removeClass("qui-select-disable")
        },
        setTitle: function (e) {
            this.$title.html(e)
        }
    }, a.fn.extend({
        qyerSelect: function (i) {
            var n = {
                getSelectItem: function (e) {
                    return e.data("_qyerSelect").getSelectItem()
                }, getValue: function (e) {
                    return e.data("_qyerSelect").getSelectItem().getAttribute("data-value")
                }, setValue: function (e, t) {
                    return e.data("_qyerSelect").setValue(t)
                }, setSelectIndex: function (e, t) {
                    return e.data("_qyerSelect").setSelectIndex(t), e
                }, setOption: function (e, t, a) {
                    return e.data("_qyerSelect").setOption(t, a), e
                }, getSelectIndex: function (e) {
                    return e.data("_qyerSelect").getSelectIndex()
                }, disable: function (e) {
                    return e.data("_qyerSelect").disable()
                }, enable: function (e) {
                    return e.data("_qyerSelect").enable()
                }, setTitle: function (e, t) {
                    return e.data("_qyerSelect").setTitle(t)
                }
            }, s = a.type(i);
            if ("object" == s || "undefined" == s) {
                var c;
                return a.each(this, function (e, n) {
                    c = a(n), c.data("_qyerSelect") || c.data("_qyerSelect", new t({$obj: c, option: i ? i : {}}))
                }), c = null, this
            }
            if ("string" == s) {
                var c, o = arguments, l = [];
                return a.each(this, function (t, s) {
                    if (c = a(s), n[i]) {
                        var r = e(o, 1);
                        r.unshift(c), l.push(n[i].apply(n, r)), r = null
                    }
                }), c = o = null, l.length ? 1 == l.length ? l[0] : l : this
            }
        }
    })
}), define("web_ct_logindialog", ["web_old_popup", "web_ct_logindialog_loginFormValid", "web_old_select", "css!web_ct_logindialog"], function (e) {
    function t(e) {
        this.popup = null, this.$model = null, this.$section = null, this.option = e, this.action = "", this.type = "mail", this.show(e)
    }

    var a, i = jQuery, n = {SearchCountryCode: "/ajax.php?action=SearchCountryCode"};
    t.prototype = {
        show: function (e) {
            this.option = e, this.createLoginContent(), this.bindEvent()
        }, hide: function (e) {
            this.popup.hide(e), this.action = ""
        }, createLoginContent: function () {
            var t = this, a = this.option.change_login_type || "mail", n = this.option.change_register_type || "mail", s = ['<div class="qui-login-container">', '<div class="qui-login-section section-login">', '<div class="qui-login-tabs">', '<a class="change-tab change-login-type change-login-mail current" href="javascript:;" data-action="login" data-type="mail" data-bn-ipg="web-login-layer-tab-mail">账号登录</a>', '<a class="change-tab change-login-type change-login-phone" href="javascript:;" data-action="login" data-type="phone" data-bn-ipg="web-login-layer-tab-phone">短信快捷登录</a>', "</div>", '<div class="qui-login-form">', '<form id="loginForm" action="/" autocomplete="off">', '<input type="text" name="input_fake" value="" style="display:none;">', '<input type="password" name="password_fake" value="" style="display:none;">', '<div class="qui-login-input input-control input-control-login-mail">', '<input type="text" class="ui3_input field_valid" name="account" title="邮箱/手机号" tabindex="1" placeholder="邮箱/手机号">', '<input type="hidden" name="type" value="mail">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-login-phone" style="display: none;">', '<div id="phoneCodeForLogin" class="qui-select qui-select-login fl" data-ui-width="62px" data-ui-menuwidth="330px" data-ui-height="38px" >', '<strong class="titles"><span class="title-text">86</span></strong>', '<div class="contents" style="display:none;">', "<ul></ul>", "</div>", "</div>", '<input type="text" class="ui3_input field_valid input_phone_code fr" name="phone_input" tabindex="1" title="手机号" placeholder="手机号">', '<input type="hidden" name="area_code" value="86">', '<input type="hidden" name="type" value="phone">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-login-mail">', '<input type="password" class="ui3_input field_valid" name="password" title="密码" tabindex="2" placeholder="密码">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control-validcode input-control input-control-login-phone" style="display: none;">', '<input type="text" class="ui3_input field_valid input_check_code fl" name="valid_code" tabindex="3" title="验证码" placeholder="验证码">', '<span class="check_code fr">', '<a href="javascript:;" title="换一换"><img src="/qcross/login/ajax.php?action=captcha" onclick="this.src=\'/qcross/login/ajax.php?action=captcha&timer=\'+(+(new Date))"></a>', "</span>", '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-login-phone" style="display: none;">', '<input type="text" class="ui3_input field_valid input_check_code fl"  maxlength="6" name="phone_valid_code" title="短信验证码" tabindex="3" placeholder="输入短信中的验证码">', '<a href="javascript:;" class="ui_button button_code fr" data-type="phone"><span>发送验证码</span></a>', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input qui-login-btn posr">', '<input type="button" class="ui_button btn_submit" tabindex="5" value="登录" data-value="登录">', '<div class="message-box">', '<span class="fl">', '<input id="remember" name="remember" type="checkbox" tabindex="4" class="vm" checked="checked"> <label for="remember" class="vm">记住我</label>', "</span>", '<span class="forget input-control input-control-login-mail">', '<a class="remember-link" href="http://login.qyer.com/?action=getemailpass" target="_blank" data-bn-ipg="web-login-page-getpassword">忘记密码</a>', "</span>", "</div>", "</div>", "</form>", "</div>", '<div class="qui-login-otherlogin">', '<div class="otherlogin">', '<a class="otherlogin-qq" href="javascript:;" data-bn-ipg="web-login-layer-qq" title="qq登录">qq登录</a>', '<a class="otherlogin-weibo" href="javascript:;" data-bn-ipg="web-login-layer-weibo" title="新浪微博登录">新浪微博登录</a>', '<a class="otherlogin-taobao" href="javascript:;" data-bn-ipg="web-login-layer-taobao" title="淘宝登录">淘宝登录</a>', '<a class="otherlogin-weixin" href="javascript:;" data-bn-ipg="web-login-layer-wechat" title="微信登录">微信登录</a>', "</div>", "</div>", '<div class="qui-login-link-register gray">', '<a class="fr change-login-type" href="javascript:;" data-action="register" data-type="' + n + '" data-bn-ipg="web-login-layer-register">立即注册</a>', '<a class="gray" href="http://login.qyer.com/?action=usernamelogin&refer=' + window.location.href + '">用户名登录</a> | ', '<a class="gray" href="http://login.qyer.com/?action=aboard&refer=' + window.location.href + '">境外手机号登录</a>', "</div>", '<div class="section-message-box">', "</div>", "</div>", '<div class="qui-login-section section-register">', '<div class="qui-login-tabs">', '<a class="change-tab change-login-type change-register-mail current" href="javascript:;" data-action="register" data-type="mail" data-bn-ipg="web-register-layer-tab-mail">邮箱注册</a>', '<a class="change-tab change-login-type change-register-phone" href="javascript:;" data-action="register" data-type="phone" data-bn-ipg="web-register-layer-tab-phone">手机注册</a>', "</div>", '<div class="qui-login-form">', '<form id="registerForm" action="/" autocomplete="off">', '<div class="qui-login-input input-control input-control-register-mail">', '<a href="javascript:;" class="icon-clear"></a>', '<input type="text" class="ui3_input field_valid" name="mail_input" title="邮箱" tabindex="1" placeholder="输入用于登录的邮箱地址">', '<input type="hidden" name="type" value="mail">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-register-phone" style="display: none;">', '<div id="phoneCodeForRegister" class="qui-select qui-select-register fl" data-ui-width="62px" data-ui-menuwidth="330px" data-ui-height="38px" >', '<strong class="titles"><span class="title-text">86</span></strong>', '<div class="contents" style="display:none;">', "<ul></ul>", "</div>", "</div>", '<input type="text" class="ui3_input field_valid input_phone_code fr" name="phone_input" title="手机号" tabindex="1" placeholder="输入用于登录的手机号码">', '<input type="hidden" name="area_code" value="86">', '<input type="hidden" name="type" value="phone">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control-validcode">', '<input type="text" class="ui3_input field_valid input_check_code fl" name="valid_code" tabindex="2" title="图片识别码" placeholder="图片识别码">', '<span class="check_code fr" style="width: 125px;">', '<a href="javascript:;" title="换一换"><img src="/qcross/login/ajax.php?action=captcha" onclick="this.src=\'/qcross/login/ajax.php?action=captcha&timer=\'+(+(new Date))"></a>', "</span>", '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-register-mail">', '<input type="text" class="ui3_input field_valid input_check_code fl" maxlength="6" name="mail_valid_code" title="邮箱验证码" tabindex="3" placeholder="输入邮件中的验证码">', '<a href="javascript:;" class="ui_button button_code fr" data-type="mail"><span>发送验证码</span></a>', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input input-control input-control-register-phone" style="display: none;">', '<input type="text" class="ui3_input field_valid input_check_code fl"  maxlength="6" name="phone_valid_code" title="短信验证码" tabindex="3" placeholder="输入短信中的验证码">', '<a href="javascript:;" class="ui_button button_code fr" data-type="phone"><span>发送验证码</span></a>', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input">', '<input type="text" class="ui3_input field_valid" name="username" maxlength="15" title="用户名" tabindex="3" placeholder="起一个具有辨识度的用户名">', '<div class="message-box">', '<span class="checktip">注：用户名暂不支持更改</span>', "</div>", "</div>", '<div class="qui-login-input">', '<input type="password" class="ui3_input field_valid" name="password" maxlength="16" title="密码" tabindex="4" placeholder="输入8-16位密码，需包含字母及数字">', '<div class="message-box"></div>', "</div>", '<div class="qui-login-input qui-login-btn">', '<input type="button" class="ui_button btn_submit" value="注册" data-value="注册">', '<div class="message-box">', '<span class="fl">', '已有穷游账号？ <a class="change-login-type" href="javascript:;" data-action="login" data-type="' + a + '" data-bn-ipg="web-register-layer-login">登录</a>', "</span>", '<span class="fr">', '同意<a href="http://www.qyer.com/htmlpages/member.html" target="_blank" data-bn-ipg="web-register-layer-clause">会员条款</a>和<a href="http://www.qyer.com/htmlpages/exemption.html" target="_blank" data-bn-ipg="web-register-layer-statement">免责声明</a>', "</span>", "</div>", "</div>", "</form>", "</div>", '<div class="section-message-box"></div>', "</div>", "</div>"].join(""), c = (this.option.extra_class || []).concat(["qui-popup-logindialog"]);
            this.popup = e.show({
                title: "登录",
                width: 370,
                exClassName: c.join(" "),
                showOKBtn: !1,
                showCancelBtn: !1,
                contentHTML: s,
                onAfterHide: function () {
                    t.action = "", t.option && t.option.onAfterHide && t.option.onAfterHide()
                }
            }), this.$model = i(this.popup.getContent()), this.$section = i(".qui-login-section", this.$model), this.option ? (this.showAction("register" == this.option.page || "regist" == this.option.page ? "register" : "login", this.option.pageType), ("register" == this.option.page || "regist" == this.option.page) && (this.action = "register")) : this.showAction()
        }, bindEvent: function () {
            function e(e, a, i) {
                var n = "web-" + t.action + "-layersuccess-" + a;
                return t.option.databnipg && (n += "-" + t.option.databnipg.split("-").join("")), e + (/\?/.test(e) ? "&" : "?") + "successtrack=" + n
            }

            var t = this;
            this.$model.off("click").off("change"), this.$model.on("click", ".change-login-type", function () {
                -1 == this.className.indexOf("current") && t.showAction(this.getAttribute("data-action"), this.getAttribute("data-type"), this.getAttribute("data-val"))
            }).on("click", ".icon-clear", function () {
                i(this).siblings(".ui3_input").focus().val(""), i(this).closest(".qui-login-input").removeClass("input-clear-wrap")
            }), this.$model.on("click", ".otherlogin-weibo", function () {
                return t.otherlogin("weibo", e(window.location.href, "weibo", this.getAttribute("data-bn-ipg"))), !1
            }).on("click", ".otherlogin-taobao", function () {
                return t.otherlogin("taobao", e(window.location.href, "taobao", this.getAttribute("data-bn-ipg"))), !1
            }).on("click", ".otherlogin-qq", function () {
                return t.otherlogin("qq", e(window.location.href, "qq", this.getAttribute("data-bn-ipg"))), !1
            }).on("click", ".otherlogin-weixin", function () {
                return t.otherlogin("weixin", e(window.location.href, "wechat", this.getAttribute("data-bn-ipg"))), !1
            }).on("click", ".otherlogin-link", function () {
                return t.otherlogin(this.getAttribute("data-type"), this.getAttribute("url")), !1
            });
            var a = {};
            if (this.option)for (var s = ["callback", "databnipg", "onAfterLogin", "onAfterRegister", "skip_login_reload", "skip_register_reload"], c = 0, o = s.length; o > c; c += 1)a[s[c]] = this.option[s[c]];
            this.$model.find("#loginForm").loginFormValid(i.extend(a, {type: "login"})), this.$model.find("#registerForm").loginFormValid(i.extend(a, {type: "register"})), i(".qui-select", this.$model).qyerSelect({
                onChange: function (e) {
                    var t = e.getAttribute("data-value");
                    i(this).qyerSelect("setTitle", t), i(this).siblings(":hidden[name=area_code]").val(e.getAttribute("data-value"))
                }
            });
            var l = {
                data: {action: "SearchCountryCode"},
                url: n.SearchCountryCode,
                __qFED__: {id: "c6d487a6-86bd-6bfc-b40e-4e5af7b6e785", dataIndex: 0},
                type: "post",
                onSuccess: function (e) {
                    var a, a, i, n, s, c, o = e.data.code, l = [];
                    for (s = 0, c = o.length; c > s; s++)a = o[s], i = a.code.replace(/\+?(00)?/, ""), n = a.name, l.push('<li data-value="' + i + '" ><a href="javascript:;">' + n + "(" + i + ")</a></li>");
                    t.$model.find(".qui-select").find(".contents > ul").html(l.join("")), o = l = a = i = s = c = null
                },
                onError: function (e) {
                }
            };
            qyerUtil.doAjax(l)
        }, otherlogin: function (e, t) {
            var t = "http://login.qyer.com/auth.php?action=" + e + "&popup=1&refer=" + (t || window.location.href);
            window.open(t, "newwindow", "height=530px,width=600px,top=100,left=300,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no"), t = null
        }, showAction: function (e, t, a) {
            var i = e || "login", n = t || "mail", s = this.option.title || {}, c = s.login || "登录", o = s.register || "注册";
            this.action != i && qyerUtil.doTrackCode(this.showDialogtrack(i)), this.action = i, this.type = n, this.popup.setOption({title: "login" == e ? c : o}), this.$model.find(".qui-login-section").hide().end().find(".section-" + i).show().find(".change-tab").removeClass("current").end().find(".change-" + i + "-" + n).addClass("current").end().find(".input-control").hide().end().find(".input-control-" + i + "-" + n).show(), "login" == i && (this.$model.find(".remember-link").attr("href", "mail" == n ? "http://login.qyer.com/?action=getemailpass" : "http://login.qyer.com/?action=getmobilepass"), a && this.$model.find(".input-control-" + i + "-" + n).find('[name="' + n + '_input"]').val(a))
        }, reset: function () {
            this.$model.find(".input_error").removeClass("input_error").end().find(".checkerror").remove()
        }, showDialogtrack: function (e) {
            var t = "web-" + e + "-layer";
            return this.option.databnipg && (t += "-" + this.option.databnipg.split("-").join("")), t
        }
    };
    var s = {
        show: function (e) {
            a ? a.show(e || {}) : a = new t(e || {})
        }, hide: function (e) {
            a.hide(e)
        }
    };
    return s
}), window.QYER || (window.QYER = {uid: 0}), !function () {
    var e = jQuery;
    requirejs.config({
        baseUrl: "http://static.qyer.com/static/lm/",
        map: {"*": {css: "common/models/basic/js/require-css", text: "common/models/basic/js/text"}},
        paths: {
            template: "common/models/basic/js/template-native",
            web_qui_controlbase: "bower_components/web_qui_controlbase/controlBase",
            web_qui_quiautocomplete: "bower_components/web_qui_quiautocomplete/QuiAutoComplete",
            web_ct_logindialog: "bower_components/web_ct_logindialog/loginDialog",
            web_ct_logindialog_loginFormValid: "bower_components/web_ct_logindialog/loginFormValid",
            web_lib_jquerycookie: "bower_components/web_lib_jquerycookie/jquerycookie",
            web_old_popup: "bower_components/web_old_popup/popup",
            web_old_select: "bower_components/web_old_select/select",
            web_old_tip: "bower_components/web_old_tip/tip",
            video: "old/models/project/lmDedail/js/video"
        }
    }), !function () {
        window.qyerUtil = {
            init: function () {
                window.QYER && window.QYER.frameVersion > 1 && (this._initHead(), this.spam_text_filter(), this.includeGA(), this.frameCompatibleh())
            }, frameCompatibleh: function () {
                window._qyer_userid = window.QYER.uid, window.setCookie = this.setCookie, window.getCookie = this.getCookie, window._gaq = window._gaq || []
            }, includeGA: function () {
                window._gaq = window._gaq || [], window._gaq.push(["_setAccount", "UA-185023-1"], ["_setDomainName", "qyer.com"], ["_setSiteSpeedSampleRate", 10], ["_addIgnoredRef", "qyer.com"], ["_addOrganic", "soso", "w"], ["_addOrganic", "sogou", "query"], ["_addOrganic", "baidu", "word"], ["_addOrganic", "baidu", "q1"], ["_addOrganic", "baidu", "q2"], ["_addOrganic", "m.baidu", "word"], ["_addOrganic", "so.360", "q"], ["_addOrganic", "so", "q"], ["_addOrganic", "baidu", "w"], ["_addOrganic", "cn.bing", "q"], ["_addOrganic", "sm", "q"], ["_trackPageview"]), "https:" == document.location.protocol ? requirejs(["https://ssl.google-analytics.com/ga.js"]) : requirejs(["http://qt.qyer.com/beacon.js", "http://www.google-analytics.com/ga.js"])
            }, setCookie: function (e, t, a) {
                var i = 365, n = new Date;
                arguments[2] || (a = 1), 1 == a ? (n.setTime(n.getTime() + 24 * i * 60 * 60 * 1e3), document.cookie = e + "=" + escape(t) + "; path=/;domain=.qyer.com;expires=" + n.toGMTString()) : document.cookie = e + "=" + escape(t) + "; path=/;domain=.qyer.com", i = n = null
            }, getCookie: function (e) {
                var t = document.cookie.match(new RegExp("(^| )" + e + "=([^;]*)(;|$)"));
                return null != t ? unescape(t[2]) : null
            }, _initHead: function () {
                "ask.qyer.com" == window.location.hostname && e(".qyer_header_bg").css("position", "fixed")
            }, _head: null, _getHead: function () {
                return this._head || (this._head = document.getElementsByTagName("head")[0]), this._head
            }, loadCss: function (t, a) {
                a === !1 ? this.insertStyle(e.ajax({
                    url: t,
                    async: !1
                }).responseText) : e('<link rel="stylesheet" type="text/css" />').attr("href", t).appendTo(this._getHead())
            }, insertStyle: function (e) {
                var t = document.createElement("style");
                t.type = "text/css", t.styleSheet ? t.styleSheet.cssText = e : t.innerHTML = e, this._getHead().appendChild(t), t = null
            }, sliceArguments: function (e, t) {
                for (var a = [], i = t; i < e.length; i++)a.push(e[i]);
                return a
            }, isMobile: function () {
                var e = navigator.userAgent;
                return e.match(/Android/i) || -1 != e.indexOf("iPhone") || -1 != e.indexOf("iPad")
            }, getWordLen: function (t, a) {
                function i(e) {
                    if ("undefined" == typeof e)return 0;
                    var t = e.match(/[^\x00-\x80]/g);
                    return e.length + (t ? t.length : 0)
                }

                function n(e) {
                    return e.replace(/[^\x00-\xff]/g, "*")
                }

                return a && (t = n(t)), i(e.trim(t))
            }, subStr: function (e, t) {
                for (var a, i, n = 0, s = 0; s < e.length; s++)if (a = e.charAt(s), n += encodeURI(a).length > 2 ? 1 : .5, n >= t)return i = n == t ? s + 1 : s, e.substr(0, i);
                return e
            }, doTrackCode: function (t) {
                var a = "__dotarckcodebutton__";
                document.getElementById(a) || e('<button id="' + a + '" style="display:none;">dotarckcodebutton</button>').appendTo(document.body), e("#" + a).attr("data-bn-ipg", t).trigger("click"), a = null
            }, ajaxFillter: function (e, t, a) {
                if (0 != window.location.href.indexOf("http://plan.qyer.com") && "object" == typeof e && e.extra && e.extra.code)switch (0 | e.extra.code) {
                    case 1:
                        window.qyerUtil.showAntiSpam(e.extra.msg)
                }
            }, showAntiSpam: function (e) {
                requirejs(["common/models/common/component/antiSpam/antiSpam"], function (t) {
                    t.show(e)
                })
            }, doAjax: function (t) {
                var a, i, n;
                if (a = t.minResponseTime ? new Date : null, n = function (e) {
                        if ("undefined" == typeof e.error_code)try {
                            e.error_code = e.error, e.result = e.result, 0 != e.error_code && (e.data = e.data || {}, e.data.msg = e.msg)
                        } catch (a) {
                        }
                        0 == e.error_code ? ("undefined" == typeof e.data && (e.data = t.__defaultData__), t.onCallSuccessBefore && t.onCallSuccessBefore(e), t.onSuccess && t.onSuccess(e), t.onCallSuccessAfter && t.onCallSuccessAfter(e)) : t.onError && t.onError(e)
                    }, t.testData)return "undefined" == typeof t.testData.data && (t.testData.data = t.__defaultData__), void setTimeout(function () {
                    n(t.testData)
                }, t.minResponseTime || 200);
                var s = window.location.host, c = t.url || t.posturl, o = t.data, l = "json";
                if (/static.qyer.com/.test(s) === !0) {
                    var r;
                    o = e.extend({}, o, {__qFED__: t.__qFED__}), t.__qFED__ && t.__qFED__.id && (r = t.__qFED__.id, t.type = "GET"), c = "http://fe.2b6.me:3000/service/api/" + r, l = "jsonp", api = null
                }
                var d = e.ajax({
                    type: t.type || "POST",
                    url: c,
                    dataType: l,
                    data: o,
                    cache: t.cache || !1,
                    success: function (e) {
                        a ? (i = new Date - a, setTimeout(function () {
                            n.call(null, e)
                        }, i > t.minResponseTime ? 0 : t.minResponseTime - i)) : n.call(null, e), a = i = null
                    },
                    error: function (e, a) {
                        t.onError && t.onError({
                            error_code: -1,
                            __server_error__: !0,
                            __server_status__: d.statusText,
                            result: "error",
                            data: {msg: a || {}}
                        })
                    }
                });
                return d
            }, runOneInPeriodOfTime: function (e, t) {
                var a;
                return function (i, n, s, c, o) {
                    window.clearTimeout(a), a = window.setTimeout(function () {
                        e(i, n, s, c, o)
                    }, t || 300)
                }
            }, isLogin: function () {
                return !(!window.QYER || !window.QYER.uid)
            }, doLogin: function (e) {
                window.qyerUtil.isLogin() || requirejs(["web_ct_logindialog"], function (t) {
                    t.show(e)
                })
            }, doSignin: function (t) {
                requirejs(["web_ct_logindialog"], function (a) {
                    a.show(e.extend({}, {page: "regist"}, t))
                })
            }, getUrlParam: function (e, t) {
                var a, i = new RegExp("(^|&)" + e + "=([^&]*)(&|$)");
                if (t) {
                    var n = t.indexOf("?");
                    -1 != n && (a = t.substr(t.indexOf("?") + 1))
                } else a = window.location.search.substr(1);
                if (!a)return null;
                var s = a.match(i);
                return null != s ? unescape(s[2]) : null
            }, spam_text_filter: function () {
                var t, a, i, n, s;
                t = /(http:\/\/)?[\w\.]*\.?(mafengwo\.cn|mafengwo\.com|mafengwo\.net)[a-zA-Z\/0-9&\?\.#\-_]*/gim, s = e(".qyer_spam_text_filter"), s.find("a").each(function () {
                    a = e(this), -1 == (a.html() + a.attr("href")).indexOf("mafengwo.cn") && -1 == (a.html() + a.attr("href")).indexOf("mafengwo.com") && -1 == (a.html() + a.attr("href")).indexOf("mafengwo.net") || a.replaceWith(e(this).html())
                }), s.each(function () {
                    if (a = e(this), i = a.html().replace(/\<script.*?\>document\.write\(AC_FL_RunContent.*?\<\/script\>/gim, ""), n = i.match(/\<img[\s\S]*?\>/gim), null != n)for (var s = 0; s < n.length; s++)i = i.replace(n[s], "[imgimg]" + s + "[/imgimg]");
                    if (i = i.replace(t, ""), null != n)for (var s = 0; s < n.length; s++)i = i.replace("[imgimg]" + s + "[/imgimg]", n[s]);
                    a.html(i)
                }), t = a = i = n = s = null
            }, openUrl: function (t) {
                var a = e('<form action="' + t + '" target="_blank" method="get"></form>');
                a.appendTo(document.body), a.submit(), setTimeout(function () {
                    a.remove(), a = null
                }, 8e3)
            }
        }
    }(), !function () {
        function e(e, t) {
            for (var a in t)e[a] = t[a]
        }

        e(Date.prototype, {
            qGetWeekStr: function () {
                return "星期" + ["日", "一", "二", "三", "四", "五", "六"][this.getDay()]
            }, qAddDate: function (e) {
                return this.setDate(this.getDate() + e), this
            }, qToString: function (e) {
                var t = [this.getFullYear(), this.getMonth() + 1, this.getDate()];
                return t.join(e || "-")
            }
        }), e(String.prototype, {
            qToDate: function (e) {
                var t = this.split(e || "-");
                t = [0 | t[0], (0 | t[1]) - 1, 0 | t[2]];
                var a = new Date(t[0], t[1], t[2]);
                return t.length = 0, t = null, a
            }, qToIntFixed: function () {
                var e = 0 | this;
                return 10 > e ? "0" + e : e.toString()
            }, qToHTML: function () {
                return this.replace(/</gi, "&lt;").replace(/>/gi, "&gt;").replace(/\n/gi, "<br />").replace(/\t/gi, "&nbsp;&nbsp;&nbsp;&nbsp;")
            }
        })
    }()
}(), $(function () {
    qyerUtil.init()
}), define("common/models/basic/js/qyerUtil", function () {
});
!function (t) {
    t.fn.extend({
        imgScrollBlock: function (n) {
            "use strict";
            function e(n, e, a, l, i, c) {
                var d = Math.abs(n);
                if (0 > n) {
                    if (r) {
                        var h = e.children(":lt(" + l * d + ")");
                        e.animate({top: "-" + i * d + "px"}, "slow", function () {
                            h.appendTo(e), e.css("top", 0), t.isFunction(c) && c()
                        })
                    } else if (o) {
                        var h = e.children(":lt(" + l * d + ")");
                        e.animate({left: "-" + i * d + "px"}, "slow", function () {
                            h.appendTo(e), e.css("left", 0), t.isFunction(c) && c()
                        })
                    }
                } else if (r) {
                    e.css("top", "-" + i * d + "px");
                    var s = a - l * d - 1;
                    e.children(":gt(" + s + ")").prependTo(e), e.animate({top: "0"}, "slow", function () {
                        t.isFunction(c) && c()
                    })
                } else if (o) {
                    e.css("left", "-" + i * d + "px");
                    var s = a - l * d - 1;
                    e.children(":gt(" + s + ")").prependTo(e), e.animate({left: "0"}, "slow", function () {
                        t.isFunction(c) && c()
                    })
                }
            }

            function a(t, n, a, l, i, c, r) {
                var o = parseInt(i) - parseInt(c);
                0 == t.is(":animated") && e(o, t, n, a, l, r)
            }

            function l(t) {
                if (t.next().length > 0) {
                    var n = t.find(":first").attr("data-page"), e = t.next().find("li a");
                    e.removeClass("active"), e.eq(parseInt(n) - 1).addClass("active")
                }
            }

            var i = {
                topScroll: !1,
                leftScroll: !0,
                prevBtn: null,
                nextBtn: null,
                childrenSel: 1,
                controldot: !0,
                dotText: !1,
                defaultStart: !0,
                scrollTime: 5e3,
                prevCallback: function () {
                },
                nextCallback: function () {
                },
                dotCallback: function () {
                }
            }, c = t.extend(i, n), r = c.topScroll, o = c.leftScroll, d = c.prevBtn, h = c.nextBtn, s = c.childrenSel, u = c.controldot, f = c.dotText, p = (c.defaultStart, c.scrollTime), v = c.prevCallback, m = c.nextCallback, S = c.dotCallback;
            return this.each(function () {
                var n = t(this), i = {}, g = d && d.length > 0 ? d : n.parent().prev(), x = h && h.length > 0 ? h : n.parent().next(), F = 1, I = n.children().outerWidth(!0), C = n.children().outerHeight(!0), P = n.parent().outerWidth(!0), T = n.parent().outerHeight(!0);
                if (i.child = n.children().length, i.childrenSel = s, i.controldot = u, i.dotText = f, n.attr("data-canSlide", c.defaultStart), r ? (i.numInFather = Math.round(T / C), i.singleMovePX = C) : o && (i.numInFather = Math.round(P / I), i.singleMovePX = I), i.child <= i.numInFather)return i.canScroll = !1, i.controldot = !1, i.childrenSel = 0, !1;
                if (i.numInFather < i.child && i.child < 2 * i.numInFather ? (i.canScroll = !0, i.controldot = !1, i.childrenSel <= i.numInFather ? i.childrenSel + i.numInFather > i.child && (i.childrenSel = i.child - i.numInFather) : i.childrenSel = i.child - i.numInFather) : i.child >= 2 * i.numInFather && (i.childrenSel <= i.numInFather ? i.canScroll = !0 : (i.canScroll = !0, i.childrenSel = i.numInFather)), i.movePX = i.singleMovePX * i.childrenSel, i.controldot && i.canScroll) {
                    var X = Math.ceil(i.child / i.childrenSel), k = t('<ul class="lunhuanBtn clearfix"></ul>');
                    n.children().each(function (n) {
                        var e = Math.ceil((n + 1) / i.childrenSel);
                        t(this).attr("data-page", e)
                    });
                    for (var M = 0; X > M; M++) {
                        var b = "";
                        b = 0 == M ? '<li><a class="active" data-page="' + (M + 1) + '" href="javascript:void(0);">' + (i.dotText ? M + 1 : "") + "</a></li>" : '<li><a data-page="' + (M + 1) + '" href="javascript:void(0);">' + (i.dotText ? M + 1 : "") + "</a></li>", k.append(b)
                    }
                    n.parent().append(k);
                    n.parent().width();
                    k.find("li a").on("click", function () {
                        var e = t(this);
                        if (0 == n.is(":animated") && !t(this).hasClass("active")) {
                            var l = t(this).attr("data-page");
                            a(n, i.child, i.childrenSel, i.movePX, F, l), k.find("li a").removeClass("active"), t(this).addClass("active"), F = l
                        }
                        t.isFunction(S) && S.call(this, e)
                    })
                }
                r && n.height(i.singleMovePX * i.child + 10), o && n.width(i.singleMovePX * i.child + 10), i.timer = setInterval(function () {
                    "true" == n.attr("data-canSlide") && 0 == n.is(":animated") && e(-1, n, i.child, i.childrenSel, i.movePX, function () {
                        i.controldot && l(n), F = n.find(":first").attr("data-page")
                    })
                }, p), n.parent().length > 0 && n.parent().hover(function () {
                    clearInterval(i.timer)
                }, function () {
                    i.timer = setInterval(function () {
                        "true" == n.attr("data-canSlide") && 0 == n.is(":animated") && e(-1, n, i.child, i.childrenSel, i.movePX, function () {
                            i.controldot && l(n), F = n.find(":first").attr("data-page")
                        })
                    }, p)
                }), g && g.click(function () {
                    var a = t(this);
                    i.canScroll && 0 == n.is(":animated") && e(1, n, i.child, i.childrenSel, i.movePX, function () {
                        i.controldot && l(n), F = n.find(":first").attr("data-page"), t.isFunction(v) && v.call(this, a)
                    })
                }), x && x.click(function () {
                    var a = t(this);
                    i.canScroll && 0 == n.is(":animated") && e(-1, n, i.child, i.childrenSel, i.movePX, function () {
                        i.controldot && l(n), F = n.find(":first").attr("data-page"), t.isFunction(m) && m.call(this, a)
                    })
                })
            })
        }
    })
}(jQuery);
!function (e, t, i, n) {
    "use strict";
    var o = i("html"), a = i(e), r = i(t), s = i.fancybox = function () {
        s.open.apply(this, arguments)
    }, l = navigator.userAgent.match(/msie/i), c = null, d = t.createTouch !== n, p = function (e) {
        return e && e.hasOwnProperty && e instanceof i
    }, h = function (e) {
        return e && "string" === i.type(e)
    }, f = function (e) {
        return h(e) && e.indexOf("%") > 0
    }, u = function (e) {
        return e && !(e.style.overflow && "hidden" === e.style.overflow) && (e.clientWidth && e.scrollWidth > e.clientWidth || e.clientHeight && e.scrollHeight > e.clientHeight)
    }, g = function (e, t) {
        var i = parseInt(e, 10) || 0;
        return t && f(e) && (i = s.getViewport()[t] / 100 * i), Math.ceil(i)
    }, m = function (e, t) {
        return g(e, t) + "px"
    };
    i.extend(s, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !d,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {dataType: "html", headers: {"X-fancyBox": !0}},
            iframe: {scrolling: "auto", preload: !0},
            swf: {wmode: "transparent", allowfullscreen: "true", allowscriptaccess: "always"},
            keys: {
                next: {13: "left", 34: "up", 39: "left", 40: "up"},
                prev: {8: "right", 33: "down", 37: "right", 38: "down"},
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {next: "left", prev: "right"},
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (l ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {overlay: !0, title: !0},
            onCancel: i.noop,
            beforeLoad: i.noop,
            afterLoad: i.noop,
            beforeShow: i.noop,
            afterShow: i.noop,
            beforeChange: i.noop,
            beforeClose: i.noop,
            afterClose: i.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {timer: null, isActive: !1},
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function (e, t) {
            return e && (i.isPlainObject(t) || (t = {}), !1 !== s.close(!0)) ? (i.isArray(e) || (e = p(e) ? i(e).get() : [e]), i.each(e, function (o, a) {
                var r, l, c, d, f, u, g, m = {};
                "object" === i.type(a) && (a.nodeType && (a = i(a)), p(a) ? (m = {
                    href: a.data("fancybox-href") || a.attr("href"),
                    title: a.data("fancybox-title") || a.attr("title"),
                    isDom: !0,
                    element: a
                }, i.metadata && i.extend(!0, m, a.metadata())) : m = a), r = t.href || m.href || (h(a) ? a : null), l = t.title !== n ? t.title : m.title || "", c = t.content || m.content, d = c ? "html" : t.type || m.type, !d && m.isDom && (d = a.data("fancybox-type"), d || (f = a.prop("class").match(/fancybox\.(\w+)/), d = f ? f[1] : null)), h(r) && (d || (s.isImage(r) ? d = "image" : s.isSWF(r) ? d = "swf" : "#" === r.charAt(0) ? d = "inline" : h(a) && (d = "html", c = a)), "ajax" === d && (u = r.split(/\s+/, 2), r = u.shift(), g = u.shift())), c || ("inline" === d ? r ? c = i(h(r) ? r.replace(/.*(?=#[^\s]+$)/, "") : r) : m.isDom && (c = a) : "html" === d ? c = r : d || r || !m.isDom || (d = "inline", c = a)), i.extend(m, {
                    href: r,
                    type: d,
                    content: c,
                    title: l,
                    selector: g
                }), e[o] = m
            }), s.opts = i.extend(!0, {}, s.defaults, t), t.keys !== n && (s.opts.keys = t.keys ? i.extend({}, s.defaults.keys, t.keys) : !1), s.group = e, s._start(s.opts.index)) : void 0
        },
        cancel: function () {
            var e = s.coming;
            e && !1 !== s.trigger("onCancel") && (s.hideLoading(), s.ajaxLoad && s.ajaxLoad.abort(), s.ajaxLoad = null, s.imgPreload && (s.imgPreload.onload = s.imgPreload.onerror = null), e.wrap && e.wrap.stop(!0, !0).trigger("onReset").remove(), s.coming = null, s.current || s._afterZoomOut(e))
        },
        close: function (e) {
            s.cancel(), !1 !== s.trigger("beforeClose") && (s.unbindEvents(), s.isActive && (s.isOpen && e !== !0 ? (s.isOpen = s.isOpened = !1, s.isClosing = !0, i(".fancybox-item, .fancybox-nav").remove(), s.wrap.stop(!0, !0).removeClass("fancybox-opened"), s.transitions[s.current.closeMethod]()) : (i(".fancybox-wrap").stop(!0).trigger("onReset").remove(), s._afterZoomOut())))
        },
        play: function (e) {
            var t = function () {
                clearTimeout(s.player.timer)
            }, i = function () {
                t(), s.current && s.player.isActive && (s.player.timer = setTimeout(s.next, s.current.playSpeed))
            }, n = function () {
                t(), r.unbind(".player"), s.player.isActive = !1, s.trigger("onPlayEnd")
            }, o = function () {
                s.current && (s.current.loop || s.current.index < s.group.length - 1) && (s.player.isActive = !0, r.bind({
                    "onCancel.player beforeClose.player": n,
                    "onUpdate.player": i,
                    "beforeLoad.player": t
                }), i(), s.trigger("onPlayStart"))
            };
            e === !0 || !s.player.isActive && e !== !1 ? o() : n()
        },
        next: function (e) {
            var t = s.current;
            t && (h(e) || (e = t.direction.next), s.jumpto(t.index + 1, e, "next"))
        },
        prev: function (e) {
            var t = s.current;
            t && (h(e) || (e = t.direction.prev), s.jumpto(t.index - 1, e, "prev"))
        },
        jumpto: function (e, t, i) {
            var o = s.current;
            o && (e = g(e), s.direction = t || o.direction[e >= o.index ? "next" : "prev"], s.router = i || "jumpto", o.loop && (0 > e && (e = o.group.length + e % o.group.length), e %= o.group.length), o.group[e] !== n && (s.cancel(), s._start(e)))
        },
        reposition: function (e, t) {
            var n, o = s.current, a = o ? o.wrap : null;
            a && (n = s._getPosition(t), e && "scroll" === e.type ? (delete n.position, a.stop(!0, !0).animate(n, 200)) : (a.css(n), o.pos = i.extend({}, o.dim, n)))
        },
        update: function (e) {
            var t = e && e.type, i = !t || "orientationchange" === t;
            i && (clearTimeout(c), c = null), s.isOpen && !c && (c = setTimeout(function () {
                var n = s.current;
                n && !s.isClosing && (s.wrap.removeClass("fancybox-tmp"), (i || "load" === t || "resize" === t && n.autoResize) && s._setDimension(), "scroll" === t && n.canShrink || s.reposition(e), s.trigger("onUpdate"), c = null)
            }, i && !d ? 0 : 300))
        },
        toggle: function (e) {
            s.isOpen && (s.current.fitToView = "boolean" === i.type(e) ? e : !s.current.fitToView, d && (s.wrap.removeAttr("style").addClass("fancybox-tmp"), s.trigger("onUpdate")), s.update())
        },
        hideLoading: function () {
            r.unbind(".loading"), i("#fancybox-loading").remove()
        },
        showLoading: function () {
            var e, t;
            s.hideLoading(), e = i('<div id="fancybox-loading"><div></div></div>').click(s.cancel).appendTo("body"), r.bind("keydown.loading", function (e) {
                27 === (e.which || e.keyCode) && (e.preventDefault(), s.cancel())
            }), s.defaults.fixed || (t = s.getViewport(), e.css({
                position: "absolute",
                top: .5 * t.h + t.y,
                left: .5 * t.w + t.x
            }))
        },
        getViewport: function () {
            var t = s.current && s.current.locked || !1, i = {x: a.scrollLeft(), y: a.scrollTop()};
            return t ? (i.w = t[0].clientWidth, i.h = t[0].clientHeight) : (i.w = d && e.innerWidth ? e.innerWidth : a.width(), i.h = d && e.innerHeight ? e.innerHeight : a.height()), i
        },
        unbindEvents: function () {
            s.wrap && p(s.wrap) && s.wrap.unbind(".fb"), r.unbind(".fb"), a.unbind(".fb")
        },
        bindEvents: function () {
            var e, t = s.current;
            t && (a.bind("orientationchange.fb" + (d ? "" : " resize.fb") + (t.autoCenter && !t.locked ? " scroll.fb" : ""), s.update), e = t.keys, e && r.bind("keydown.fb", function (o) {
                var a = o.which || o.keyCode, r = o.target || o.srcElement;
                return 27 === a && s.coming ? !1 : void(o.ctrlKey || o.altKey || o.shiftKey || o.metaKey || r && (r.type || i(r).is("[contenteditable]")) || i.each(e, function (e, r) {
                    return t.group.length > 1 && r[a] !== n ? (s[e](r[a]), o.preventDefault(), !1) : i.inArray(a, r) > -1 ? (s[e](), o.preventDefault(), !1) : void 0
                }))
            }), i.fn.mousewheel && t.mouseWheel && s.wrap.bind("mousewheel.fb", function (e, n, o, a) {
                for (var r = e.target || null, l = i(r), c = !1; l.length && !(c || l.is(".fancybox-skin") || l.is(".fancybox-wrap"));)c = u(l[0]), l = i(l).parent();
                0 === n || c || s.group.length > 1 && !t.canShrink && (a > 0 || o > 0 ? s.prev(a > 0 ? "down" : "left") : (0 > a || 0 > o) && s.next(0 > a ? "up" : "right"), e.preventDefault())
            }))
        },
        trigger: function (e, t) {
            var n, o = t || s.coming || s.current;
            if (o) {
                if (i.isFunction(o[e]) && (n = o[e].apply(o, Array.prototype.slice.call(arguments, 1))), n === !1)return !1;
                o.helpers && i.each(o.helpers, function (t, n) {
                    n && s.helpers[t] && i.isFunction(s.helpers[t][e]) && s.helpers[t][e](i.extend(!0, {}, s.helpers[t].defaults, n), o)
                }), r.trigger(e)
            }
        },
        isImage: function (e) {
            return h(e) && e.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)|(qiniudn\.com)|(pic\d?\.qyer\.com)/i)
        },
        isSWF: function (e) {
            return h(e) && e.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function (e) {
            var t, n, o, a, r, l = {};
            if (e = g(e), t = s.group[e] || null, !t)return !1;
            if (l = i.extend(!0, {}, s.opts, t), a = l.margin, r = l.padding, "number" === i.type(a) && (l.margin = [a, a, a, a]), "number" === i.type(r) && (l.padding = [r, r, r, r]), l.modal && i.extend(!0, l, {
                    closeBtn: !1,
                    closeClick: !1,
                    nextClick: !1,
                    arrows: !1,
                    mouseWheel: !1,
                    keys: null,
                    helpers: {overlay: {closeClick: !1}}
                }), l.autoSize && (l.autoWidth = l.autoHeight = !0), "auto" === l.width && (l.autoWidth = !0), "auto" === l.height && (l.autoHeight = !0), l.group = s.group, l.index = e, s.coming = l, !1 === s.trigger("beforeLoad"))return void(s.coming = null);
            if (o = l.type, n = l.href, !o)return s.coming = null, s.current && s.router && "jumpto" !== s.router ? (s.current.index = e, s[s.router](s.direction)) : !1;
            if (s.isActive = !0, "image" !== o && "swf" !== o || (l.autoHeight = l.autoWidth = !1, l.scrolling = "visible"), "image" === o && (l.aspectRatio = !0), "iframe" === o && d && (l.scrolling = "scroll"), l.wrap = i(l.tpl.wrap).addClass("fancybox-" + (d ? "mobile" : "desktop") + " fancybox-type-" + o + " fancybox-tmp " + l.wrapCSS).appendTo(l.parent || "body"), i.extend(l, {
                    skin: i(".fancybox-skin", l.wrap),
                    outer: i(".fancybox-outer", l.wrap),
                    inner: i(".fancybox-inner", l.wrap)
                }), i.each(["Top", "Right", "Bottom", "Left"], function (e, t) {
                    l.skin.css("padding" + t, m(l.padding[e]))
                }), s.trigger("onReady"), "inline" === o || "html" === o) {
                if (!l.content || !l.content.length)return s._error("content")
            } else if (!n)return s._error("href");
            "image" === o ? s._loadImage() : "ajax" === o ? s._loadAjax() : "iframe" === o ? s._loadIframe() : s._afterLoad()
        },
        _error: function (e) {
            i.extend(s.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: e,
                content: s.coming.tpl.error
            }), s._afterLoad()
        },
        _loadImage: function () {
            var e = s.imgPreload = new Image;
            e.onload = function () {
                this.onload = this.onerror = null, s.coming.width = this.width / s.opts.pixelRatio, s.coming.height = this.height / s.opts.pixelRatio, s._afterLoad()
            }, e.onerror = function () {
                this.onload = this.onerror = null, s._error("image")
            }, e.src = s.coming.href, e.complete !== !0 && s.showLoading()
        },
        _loadAjax: function () {
            var e = s.coming;
            s.showLoading(), s.ajaxLoad = i.ajax(i.extend({}, e.ajax, {
                url: e.href, error: function (e, t) {
                    s.coming && "abort" !== t ? s._error("ajax", e) : s.hideLoading()
                }, success: function (t, i) {
                    "success" === i && (e.content = t, s._afterLoad())
                }
            }))
        },
        _loadIframe: function () {
            var e = s.coming, t = i(e.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", d ? "auto" : e.iframe.scrolling).attr("src", e.href);
            i(e.wrap).bind("onReset", function () {
                try {
                    i(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (e) {
                }
            }), e.iframe.preload && (s.showLoading(), t.one("load", function () {
                i(this).data("ready", 1), d || i(this).bind("load.fb", s.update), i(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), s._afterLoad()
            })), e.content = t.appendTo(e.inner), e.iframe.preload || s._afterLoad()
        },
        _preloadImages: function () {
            var e, t, i = s.group, n = s.current, o = i.length, a = n.preload ? Math.min(n.preload, o - 1) : 0;
            for (t = 1; a >= t; t += 1)e = i[(n.index + t) % o], "image" === e.type && e.href && ((new Image).src = e.href)
        },
        _afterLoad: function () {
            var e, t, n, o, a, r, l = s.coming, c = s.current, d = "fancybox-placeholder";
            if (s.hideLoading(), l && s.isActive !== !1) {
                if (!1 === s.trigger("afterLoad", l, c))return l.wrap.stop(!0).trigger("onReset").remove(), void(s.coming = null);
                switch (c && (s.trigger("beforeChange", c), c.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), s.unbindEvents(), e = l, t = l.content, n = l.type, o = l.scrolling, i.extend(s, {
                    wrap: e.wrap,
                    skin: e.skin,
                    outer: e.outer,
                    inner: e.inner,
                    current: e,
                    previous: c
                }), a = e.href, n) {
                    case"inline":
                    case"ajax":
                    case"html":
                        e.selector ? t = i("<div>").html(t).find(e.selector) : p(t) && (t.data(d) || t.data(d, i('<div class="' + d + '"></div>').insertAfter(t).hide()), t = t.show().detach(), e.wrap.bind("onReset", function () {
                            i(this).find(t).length && t.hide().replaceAll(t.data(d)).data(d, !1)
                        }));
                        break;
                    case"image":
                        t = e.tpl.image.replace("{href}", a);
                        break;
                    case"swf":
                        t = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + a + '"></param>', r = "", i.each(e.swf, function (e, i) {
                            t += '<param name="' + e + '" value="' + i + '"></param>', r += " " + e + '="' + i + '"'
                        }), t += '<embed src="' + a + '" type="application/x-shockwave-flash" width="100%" height="100%"' + r + "></embed></object>"
                }
                p(t) && t.parent().is(e.inner) || e.inner.append(t), s.trigger("beforeShow"), e.inner.css("overflow", "yes" === o ? "scroll" : "no" === o ? "hidden" : o), s._setDimension(), s.reposition(), s.isOpen = !1, s.coming = null, s.bindEvents(), s.isOpened ? c.prevMethod && s.transitions[c.prevMethod]() : i(".fancybox-wrap").not(e.wrap).stop(!0).trigger("onReset").remove(), s.transitions[s.isOpened ? e.nextMethod : e.openMethod](), s._preloadImages()
            }
        },
        _setDimension: function () {
            var e, t, n, o, a, r, l, c, d, p, h, u, y, x, v, w = s.getViewport(), b = 0, k = !1, C = !1, O = s.wrap, W = s.skin, _ = s.inner, S = s.current, T = S.width, L = S.height, E = S.minWidth, R = S.minHeight, j = S.maxWidth, P = S.maxHeight, H = S.scrolling, M = S.scrollOutside ? S.scrollbarWidth : 0, A = S.margin, I = g(A[1] + A[3]), D = g(A[0] + A[2]);
            if (O.add(W).add(_).width("auto").height("auto").removeClass("fancybox-tmp"), e = g(W.outerWidth(!0) - W.width()), t = g(W.outerHeight(!0) - W.height()), n = I + e, o = D + t, a = f(T) ? (w.w - n) * g(T) / 100 : T, r = f(L) ? (w.h - o) * g(L) / 100 : L, "iframe" === S.type) {
                if (x = S.content, S.autoHeight && 1 === x.data("ready"))try {
                    x[0].contentWindow.document.location && (_.width(a).height(9999), v = x.contents().find("body"), M && v.css("overflow-x", "hidden"), r = v.outerHeight(!0))
                } catch (z) {
                }
            } else(S.autoWidth || S.autoHeight) && (_.addClass("fancybox-tmp"), S.autoWidth || _.width(a), S.autoHeight || _.height(r), S.autoWidth && (a = _.width()), S.autoHeight && (r = _.height()), _.removeClass("fancybox-tmp"));
            if (T = g(a), L = g(r), d = a / r, E = g(f(E) ? g(E, "w") - n : E), j = g(f(j) ? g(j, "w") - n : j), R = g(f(R) ? g(R, "h") - o : R), P = g(f(P) ? g(P, "h") - o : P), l = j, c = P, S.fitToView && (j = Math.min(w.w - n, j), P = Math.min(w.h - o, P)), u = w.w - I, y = w.h - D, S.aspectRatio ? (T > j && (T = j, L = g(T / d)), L > P && (L = P, T = g(L * d)), E > T && (T = E, L = g(T / d)), R > L && (L = R, T = g(L * d))) : (T = Math.max(E, Math.min(T, j)), S.autoHeight && "iframe" !== S.type && (_.width(T), L = _.height()), L = Math.max(R, Math.min(L, P))), S.fitToView)if (_.width(T).height(L), O.width(T + e), p = O.width(), h = O.height(), S.aspectRatio)for (; (p > u || h > y) && T > E && L > R && !(b++ > 19);)L = Math.max(R, Math.min(P, L - 10)), T = g(L * d), E > T && (T = E, L = g(T / d)), T > j && (T = j, L = g(T / d)), _.width(T).height(L), O.width(T + e), p = O.width(), h = O.height(); else T = Math.max(E, Math.min(T, T - (p - u))), L = Math.max(R, Math.min(L, L - (h - y)));
            M && "auto" === H && r > L && u > T + e + M && (T += M), _.width(T).height(L), O.width(T + e), p = O.width(), h = O.height(), k = (p > u || h > y) && T > E && L > R, C = S.aspectRatio ? l > T && c > L && a > T && r > L : (l > T || c > L) && (a > T || r > L), i.extend(S, {
                dim: {
                    width: m(p),
                    height: m(h)
                },
                origWidth: a,
                origHeight: r,
                canShrink: k,
                canExpand: C,
                wPadding: e,
                hPadding: t,
                wrapSpace: h - W.outerHeight(!0),
                skinSpace: W.height() - L
            }), !x && S.autoHeight && L > R && P > L && !C && _.height("auto")
        },
        _getPosition: function (e) {
            var t = s.current, i = s.getViewport(), n = t.margin, o = s.wrap.width() + n[1] + n[3], a = s.wrap.height() + n[0] + n[2], r = {
                position: "absolute",
                top: n[0],
                left: n[3]
            };
            return t.autoCenter && t.fixed && !e && a <= i.h && o <= i.w ? r.position = "fixed" : t.locked || (r.top += i.y, r.left += i.x), r.top = m(Math.max(r.top, r.top + (i.h - a) * t.topRatio)), r.left = m(Math.max(r.left, r.left + (i.w - o) * t.leftRatio)), r
        },
        _afterZoomIn: function () {
            var e = s.current;
            e && (s.isOpen = s.isOpened = !0, s.wrap.css("overflow", "visible").addClass("fancybox-opened"), s.update(), (e.closeClick || e.nextClick && s.group.length > 1) && s.inner.css("cursor", "pointer").bind("click.fb", function (t) {
                i(t.target).is("a") || i(t.target).parent().is("a") || (t.preventDefault(), s[e.closeClick ? "close" : "next"]())
            }), e.closeBtn && i(e.tpl.closeBtn).appendTo(s.skin).bind("click.fb", function (e) {
                e.preventDefault(), s.close()
            }), e.arrows && s.group.length > 1 && ((e.loop || e.index > 0) && i(e.tpl.prev).appendTo(s.outer).bind("click.fb", s.prev), (e.loop || e.index < s.group.length - 1) && i(e.tpl.next).appendTo(s.outer).bind("click.fb", s.next)), s.trigger("afterShow"), e.loop || e.index !== e.group.length - 1 ? s.opts.autoPlay && !s.player.isActive && (s.opts.autoPlay = !1, s.play()) : s.play(!1))
        },
        _afterZoomOut: function (e) {
            e = e || s.current, i(".fancybox-wrap").trigger("onReset").remove(), i.extend(s, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }), s.trigger("afterClose", e)
        }
    }), s.transitions = {
        getOrigPosition: function () {
            var e = s.current, t = e.element, i = e.orig, n = {}, o = 50, a = 50, r = e.hPadding, l = e.wPadding, c = s.getViewport();
            return !i && e.isDom && t.is(":visible") && (i = t.find("img:first"), i.length || (i = t)), p(i) ? (n = i.offset(), i.is("img") && (o = i.outerWidth(), a = i.outerHeight())) : (n.top = c.y + (c.h - a) * e.topRatio, n.left = c.x + (c.w - o) * e.leftRatio), ("fixed" === s.wrap.css("position") || e.locked) && (n.top -= c.y, n.left -= c.x), n = {
                top: m(n.top - r * e.topRatio),
                left: m(n.left - l * e.leftRatio),
                width: m(o + l),
                height: m(a + r)
            }
        }, step: function (e, t) {
            var i, n, o, a = t.prop, r = s.current, l = r.wrapSpace, c = r.skinSpace;
            "width" !== a && "height" !== a || (i = t.end === t.start ? 1 : (e - t.start) / (t.end - t.start), s.isClosing && (i = 1 - i), n = "width" === a ? r.wPadding : r.hPadding, o = e - n, s.skin[a](g("width" === a ? o : o - l * i)), s.inner[a](g("width" === a ? o : o - l * i - c * i)))
        }, zoomIn: function () {
            var e = s.current, t = e.pos, n = e.openEffect, o = "elastic" === n, a = i.extend({opacity: 1}, t);
            delete a.position, o ? (t = this.getOrigPosition(), e.openOpacity && (t.opacity = .1)) : "fade" === n && (t.opacity = .1), s.wrap.css(t).animate(a, {
                duration: "none" === n ? 0 : e.openSpeed,
                easing: e.openEasing,
                step: o ? this.step : null,
                complete: s._afterZoomIn
            })
        }, zoomOut: function () {
            var e = s.current, t = e.closeEffect, i = "elastic" === t, n = {opacity: .1};
            i && (n = this.getOrigPosition(), e.closeOpacity && (n.opacity = .1)), s.wrap.animate(n, {
                duration: "none" === t ? 0 : e.closeSpeed,
                easing: e.closeEasing,
                step: i ? this.step : null,
                complete: s._afterZoomOut
            })
        }, changeIn: function () {
            var e, t = s.current, i = t.nextEffect, n = t.pos, o = {opacity: 1}, a = s.direction, r = 200;
            n.opacity = .1, "elastic" === i && (e = "down" === a || "up" === a ? "top" : "left", "down" === a || "right" === a ? (n[e] = m(g(n[e]) - r), o[e] = "+=" + r + "px") : (n[e] = m(g(n[e]) + r), o[e] = "-=" + r + "px")), "none" === i ? s._afterZoomIn() : s.wrap.css(n).animate(o, {
                duration: t.nextSpeed,
                easing: t.nextEasing,
                complete: s._afterZoomIn
            })
        }, changeOut: function () {
            var e = s.previous, t = e.prevEffect, n = {opacity: .1}, o = s.direction, a = 200;
            "elastic" === t && (n["down" === o || "up" === o ? "top" : "left"] = ("up" === o || "left" === o ? "-" : "+") + "=" + a + "px"), e.wrap.animate(n, {
                duration: "none" === t ? 0 : e.prevSpeed,
                easing: e.prevEasing,
                complete: function () {
                    i(this).trigger("onReset").remove()
                }
            })
        }
    }, s.helpers.overlay = {
        defaults: {closeClick: !0, speedOut: 200, showEarly: !0, css: {}, locked: !d, fixed: !0},
        overlay: null,
        fixed: !1,
        el: i("html"),
        create: function (e) {
            e = i.extend({}, this.defaults, e), this.overlay && this.close(), this.overlay = i('<div class="fancybox-overlay"></div>').appendTo(s.coming ? s.coming.parent : e.parent), this.fixed = !1, e.fixed && s.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
        },
        open: function (e) {
            var t = this;
            e = i.extend({}, this.defaults, e), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(e), this.fixed || (a.bind("resize.overlay", i.proxy(this.update, this)), this.update()), e.closeClick && this.overlay.bind("click.overlay", function (e) {
                return i(e.target).hasClass("fancybox-overlay") ? (s.isActive ? s.close() : t.close(), !1) : void 0
            }), this.overlay.css(e.css).show()
        },
        close: function () {
            var e, t;
            a.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && (i(".fancybox-margin").removeClass("fancybox-margin"), e = a.scrollTop(), t = a.scrollLeft(), this.el.removeClass("fancybox-lock"), a.scrollTop(e).scrollLeft(t)), i(".fancybox-overlay").remove().hide(), i.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function () {
            var e, i = "100%";
            this.overlay.width(i).height("100%"), l ? (e = Math.max(t.documentElement.offsetWidth, t.body.offsetWidth), r.width() > e && (i = r.width())) : r.width() > a.width() && (i = r.width()), this.overlay.width(i).height(r.height())
        },
        onReady: function (e, t) {
            var n = this.overlay;
            i(".fancybox-overlay").stop(!0, !0), n || this.create(e), e.locked && this.fixed && t.fixed && (n || (this.margin = r.height() > a.height() ? i("html").css("margin-right").replace("px", "") : !1), t.locked = this.overlay.append(t.wrap), t.fixed = !1), e.showEarly === !0 && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function (e, t) {
            var n, o;
            t.locked && (this.margin !== !1 && (i("*").filter(function () {
                return "fixed" === i(this).css("position") && !i(this).hasClass("fancybox-overlay") && !i(this).hasClass("fancybox-wrap")
            }).addClass("fancybox-margin"), this.el.addClass("fancybox-margin")), n = a.scrollTop(), o = a.scrollLeft(), this.el.addClass("fancybox-lock"), a.scrollTop(n).scrollLeft(o)), this.open(e)
        },
        onUpdate: function () {
            this.fixed || this.update()
        },
        afterClose: function (e) {
            this.overlay && !s.coming && this.overlay.fadeOut(e.speedOut, i.proxy(this.close, this))
        }
    }, s.helpers.title = {
        defaults: {type: "float", position: "bottom"}, beforeShow: function (e) {
            var t, n, o = s.current, a = o.title, r = e.type;
            if (i.isFunction(a) && (a = a.call(o.element, o)), h(a) && "" !== i.trim(a)) {
                switch (t = i('<div class="fancybox-title fancybox-title-' + r + '-wrap">' + a + "</div>"), r) {
                    case"inside":
                        n = s.skin;
                        break;
                    case"outside":
                        n = s.wrap;
                        break;
                    case"over":
                        n = s.inner;
                        break;
                    default:
                        n = s.skin, t.appendTo("body"), l && t.width(t.width()), t.wrapInner('<span class="child"></span>'), s.current.margin[2] += Math.abs(g(t.css("margin-bottom")))
                }
                t["top" === e.position ? "prependTo" : "appendTo"](n)
            }
        }
    }, i.fn.fancybox = function (e) {
        var t, n = i(this), o = this.selector || "", a = function (a) {
            a.preventDefault();
            var r, l, c = i(this).blur(), d = t;
            a.ctrlKey || a.altKey || a.shiftKey || a.metaKey || c.is(".fancybox-wrap") || (r = e.groupAttr || "data-fancybox-group", l = c.attr(r), l || (r = "rel", l = c.get(0)[r]), l && "" !== l && "nofollow" !== l && (c = o.length ? i(o) : n, c = c.filter("[" + r + '="' + l + '"]'), d = c.index(this)), e.index = d, s.open(c, e) !== !1 && a.preventDefault())
        };
        return e = e || {}, t = e.index || 0, o && e.live !== !1 ? r.undelegate(o, "click.fb-start").delegate(o + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", a) : n.unbind("click.fb-start").bind("click.fb-start", a), this.filter("[data-fancybox-start=1]").trigger("click"), this
    }, r.ready(function () {
        var t, a;
        i.scrollbarWidth === n && (i.scrollbarWidth = function () {
            var e = i('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"), t = e.children(), n = t.innerWidth() - t.height(99).innerWidth();
            return e.remove(), n
        }), i.support.fixedPosition === n && (i.support.fixedPosition = function () {
            var e = i('<div style="position:fixed;top:20px;"></div>').appendTo("body"), t = 20 === e[0].offsetTop || 15 === e[0].offsetTop;
            return e.remove(), t
        }()), i.extend(s.defaults, {
            scrollbarWidth: i.scrollbarWidth(),
            fixed: i.support.fixedPosition,
            parent: i("body")
        }), t = i(e).width(), o.addClass("fancybox-lock-test"), a = i(e).width(), o.removeClass("fancybox-lock-test"), i("<style type='text/css'>.fancybox-margin{margin-right:" + (a - t) + "px;}</style>").appendTo("head")
    })
}(window, document, jQuery);
!function (t, e) {
    function n(e, n) {
        var r, s, o, a = e.nodeName.toLowerCase();
        return "area" === a ? (r = e.parentNode, s = r.name, e.href && s && "map" === r.nodeName.toLowerCase() ? (o = t("img[usemap=#" + s + "]")[0], !!o && i(o)) : !1) : (/input|select|textarea|button|object/.test(a) ? !e.disabled : "a" === a ? e.href || n : n) && i(e)
    }

    function i(e) {
        return t.expr.filters.visible(e) && !t(e).parents().addBack().filter(function () {
                return "hidden" === t.css(this, "visibility")
            }).length
    }

    var r = 0, s = /^ui-id-\d+$/;
    t.ui = t.ui || {}, t.extend(t.ui, {
        version: "1.10.3",
        keyCode: {
            BACKSPACE: 8,
            COMMA: 188,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            LEFT: 37,
            NUMPAD_ADD: 107,
            NUMPAD_DECIMAL: 110,
            NUMPAD_DIVIDE: 111,
            NUMPAD_ENTER: 108,
            NUMPAD_MULTIPLY: 106,
            NUMPAD_SUBTRACT: 109,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SPACE: 32,
            TAB: 9,
            UP: 38
        }
    }), t.fn.extend({
        focus: function (e) {
            return function (n, i) {
                return "number" == typeof n ? this.each(function () {
                    var e = this;
                    setTimeout(function () {
                        t(e).focus(), i && i.call(e)
                    }, n)
                }) : e.apply(this, arguments)
            }
        }(t.fn.focus), scrollParent: function () {
            var e;
            return e = t.ui.ie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function () {
                return /(relative|absolute|fixed)/.test(t.css(this, "position")) && /(auto|scroll)/.test(t.css(this, "overflow") + t.css(this, "overflow-y") + t.css(this, "overflow-x"))
            }).eq(0) : this.parents().filter(function () {
                return /(auto|scroll)/.test(t.css(this, "overflow") + t.css(this, "overflow-y") + t.css(this, "overflow-x"))
            }).eq(0), /fixed/.test(this.css("position")) || !e.length ? t(document) : e
        }, zIndex: function (n) {
            if (n !== e)return this.css("zIndex", n);
            if (this.length)for (var i, r, s = t(this[0]); s.length && s[0] !== document;) {
                if (i = s.css("position"), ("absolute" === i || "relative" === i || "fixed" === i) && (r = parseInt(s.css("zIndex"), 10), !isNaN(r) && 0 !== r))return r;
                s = s.parent()
            }
            return 0
        }, uniqueId: function () {
            return this.each(function () {
                this.id || (this.id = "ui-id-" + ++r)
            })
        }, removeUniqueId: function () {
            return this.each(function () {
                s.test(this.id) && t(this).removeAttr("id")
            })
        }
    }), t.extend(t.expr[":"], {
        data: t.expr.createPseudo ? t.expr.createPseudo(function (e) {
            return function (n) {
                return !!t.data(n, e)
            }
        }) : function (e, n, i) {
            return !!t.data(e, i[3])
        }, focusable: function (e) {
            return n(e, !isNaN(t.attr(e, "tabindex")))
        }, tabbable: function (e) {
            var i = t.attr(e, "tabindex"), r = isNaN(i);
            return (r || i >= 0) && n(e, !r)
        }
    }), t("<a>").outerWidth(1).jquery || t.each(["Width", "Height"], function (n, i) {
        function r(e, n, i, r) {
            return t.each(s, function () {
                n -= parseFloat(t.css(e, "padding" + this)) || 0, i && (n -= parseFloat(t.css(e, "border" + this + "Width")) || 0), r && (n -= parseFloat(t.css(e, "margin" + this)) || 0)
            }), n
        }

        var s = "Width" === i ? ["Left", "Right"] : ["Top", "Bottom"], o = i.toLowerCase(), a = {
            innerWidth: t.fn.innerWidth,
            innerHeight: t.fn.innerHeight,
            outerWidth: t.fn.outerWidth,
            outerHeight: t.fn.outerHeight
        };
        t.fn["inner" + i] = function (n) {
            return n === e ? a["inner" + i].call(this) : this.each(function () {
                t(this).css(o, r(this, n) + "px")
            })
        }, t.fn["outer" + i] = function (e, n) {
            return "number" != typeof e ? a["outer" + i].call(this, e) : this.each(function () {
                t(this).css(o, r(this, e, !0, n) + "px")
            })
        }
    }), t.fn.addBack || (t.fn.addBack = function (t) {
        return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
    }), t("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (t.fn.removeData = function (e) {
        return function (n) {
            return arguments.length ? e.call(this, t.camelCase(n)) : e.call(this)
        }
    }(t.fn.removeData)), t.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), t.support.selectstart = "onselectstart" in document.createElement("div"), t.fn.extend({
        disableSelection: function () {
            return this.bind((t.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (t) {
                t.preventDefault()
            })
        }, enableSelection: function () {
            return this.unbind(".ui-disableSelection")
        }
    }), t.extend(t.ui, {
        plugin: {
            add: function (e, n, i) {
                var r, s = t.ui[e].prototype;
                for (r in i)s.plugins[r] = s.plugins[r] || [], s.plugins[r].push([n, i[r]])
            }, call: function (t, e, n) {
                var i, r = t.plugins[e];
                if (r && t.element[0].parentNode && 11 !== t.element[0].parentNode.nodeType)for (i = 0; r.length > i; i++)t.options[r[i][0]] && r[i][1].apply(t.element, n)
            }
        }, hasScroll: function (e, n) {
            if ("hidden" === t(e).css("overflow"))return !1;
            var i = n && "left" === n ? "scrollLeft" : "scrollTop", r = !1;
            return e[i] > 0 ? !0 : (e[i] = 1, r = e[i] > 0, e[i] = 0, r)
        }
    })
}(jQuery);
!function ($, undefined) {
    function Datepicker() {
        this.debug = !1, this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = {
            closeText: "关闭",
            prevText: "&#x3c;上月",
            nextText: "下月&#x3e;",
            currentText: "今天",
            monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
            monthNamesShort: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],
            dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
            dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],
            weekHeader: "周",
            dateFormat: "yy-mm-dd",
            firstDay: 0,
            isRTL: !1,
            showMonthAfterYear: !0,
            yearSuffix: "年"
        }, this._defaults = {
            showOn: "focus",
            showAnim: "fadeIn",
            showOptions: {},
            defaultDate: null,
            appendText: "",
            buttonText: "...",
            buttonImage: "",
            buttonImageOnly: !1,
            hideIfNoPrevNext: !1,
            navigationAsDateFormat: !1,
            gotoCurrent: !1,
            changeMonth: !1,
            changeYear: !1,
            yearRange: "c-10:c+10",
            showOtherMonths: !1,
            selectOtherMonths: !1,
            showWeek: !1,
            calculateWeek: this.iso8601Week,
            shortYearCutoff: "+10",
            minDate: null,
            maxDate: null,
            duration: "fast",
            beforeShowDay: null,
            beforeShow: null,
            onSelect: null,
            onChangeMonthYear: null,
            onClose: null,
            numberOfMonths: 1,
            showCurrentAtPos: 0,
            stepMonths: 1,
            stepBigMonths: 12,
            altField: "",
            altFormat: "",
            constrainInput: !0,
            showButtonPanel: !1,
            autoSize: !1,
            disabled: !1,
            fromobject: !1,
            toobject: !1
        }, $.extend(this._defaults, this.regional[""]), this.dpDiv = bindHover($('<div id="' + this._mainDivId + '" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))
    }

    function bindHover(e) {
        var t = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
        return e.bind("mouseout", function (e) {
            var a = $(e.target).closest(t);
            a.length && a.removeClass("ui-state-hover ui-datepicker-prev-hover ui-datepicker-next-hover")
        }).bind("mouseover", function (a) {
            var i = $(a.target).closest(t);
            !$.datepicker._isDisabledDatepicker(instActive.inline ? e.parent()[0] : instActive.input[0]) && i.length && (i.parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), i.addClass("ui-state-hover"), i.hasClass("ui-datepicker-prev") && i.addClass("ui-datepicker-prev-hover"), i.hasClass("ui-datepicker-next") && i.addClass("ui-datepicker-next-hover"))
        })
    }

    function extendRemove(e, t) {
        $.extend(e, t);
        for (var a in t)null != t[a] && t[a] != undefined || (e[a] = t[a]);
        return e
    }

    function isArray(e) {
        return e && ($.browser.safari && "object" == typeof e && e.length || e.constructor && e.constructor.toString().match(/\Array\(\)/))
    }

    $.extend($.ui, {datepicker: {version: "1.8.18"}});
    var PROP_NAME = "datepicker", dpuuid = (new Date).getTime(), instActive;
    $.extend(Datepicker.prototype, {
        markerClassName: "hasDatepicker",
        maxRows: 4,
        log: function () {
            this.debug && console.log.apply("", arguments)
        },
        _widgetDatepicker: function () {
            return this.dpDiv
        },
        setDefaults: function (e) {
            return extendRemove(this._defaults, e || {}), this
        },
        _attachDatepicker: function (target, settings) {
            var inlineSettings = null;
            for (var attrName in this._defaults) {
                var attrValue = target.getAttribute("date:" + attrName);
                if (attrValue) {
                    inlineSettings = inlineSettings || {};
                    try {
                        inlineSettings[attrName] = eval(attrValue)
                    } catch (err) {
                        inlineSettings[attrName] = attrValue
                    }
                }
            }
            var nodeName = target.nodeName.toLowerCase(), inline = "div" == nodeName || "span" == nodeName;
            target.id || (this.uuid += 1, target.id = "dp" + this.uuid);
            var inst = this._newInst($(target), inline);
            inst.settings = $.extend({}, settings || {}, inlineSettings || {}), "input" == nodeName ? this._connectDatepicker(target, inst) : inline && this._inlineDatepicker(target, inst)
        },
        _newInst: function (e, t) {
            var a = e[0].id.replace(/([^A-Za-z0-9_-])/g, "\\\\$1");
            return {
                id: a,
                input: e,
                selectedDay: 0,
                selectedMonth: 0,
                selectedYear: 0,
                drawMonth: 0,
                drawYear: 0,
                inline: t,
                dpDiv: t ? bindHover($('<div class="' + this._inlineClass + ' ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>')) : this.dpDiv
            }
        },
        _connectDatepicker: function (e, t) {
            var a = $(e);
            t.append = $([]), t.trigger = $([]), a.hasClass(this.markerClassName) || (this._attachments(a, t), a.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp).bind("setData.datepicker", function (e, a, i) {
                t.settings[a] = i
            }).bind("getData.datepicker", function (e, a) {
                return this._get(t, a)
            }), this._autoSize(t), $.data(e, PROP_NAME, t), t.settings.disabled && this._disableDatepicker(e))
        },
        _attachments: function (e, t) {
            var a = this._get(t, "appendText"), i = this._get(t, "isRTL");
            t.append && t.append.remove(), a && (t.append = $('<span class="' + this._appendClass + '">' + a + "</span>"), e[i ? "before" : "after"](t.append)), e.unbind("focus", this._showDatepicker), t.trigger && t.trigger.remove();
            var r = this._get(t, "showOn");
            if ("focus" != r && "both" != r || e.focus(this._showDatepicker), "button" == r || "both" == r) {
                var s = this._get(t, "buttonText"), n = this._get(t, "buttonImage");
                t.trigger = $(this._get(t, "buttonImageOnly") ? $("<img/>").addClass(this._triggerClass).attr({
                    src: n,
                    alt: s,
                    title: s
                }) : $('<button type="button"></button>').addClass(this._triggerClass).html("" == n ? s : $("<img/>").attr({
                    src: n,
                    alt: s,
                    title: s
                }))), e[i ? "before" : "after"](t.trigger), t.trigger.click(function () {
                    return $.datepicker._datepickerShowing && $.datepicker._lastInput == e[0] ? $.datepicker._hideDatepicker() : $.datepicker._datepickerShowing && $.datepicker._lastInput != e[0] ? ($.datepicker._hideDatepicker(), $.datepicker._showDatepicker(e[0])) : $.datepicker._showDatepicker(e[0]), !1
                })
            }
        },
        _autoSize: function (e) {
            if (this._get(e, "autoSize") && !e.inline) {
                var t = new Date(2009, 11, 20), a = this._get(e, "dateFormat");
                if (a.match(/[DM]/)) {
                    var i = function (e) {
                        for (var t = 0, a = 0, i = 0; i < e.length; i++)e[i].length > t && (t = e[i].length, a = i);
                        return a
                    };
                    t.setMonth(i(this._get(e, a.match(/MM/) ? "monthNames" : "monthNamesShort"))), t.setDate(i(this._get(e, a.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - t.getDay())
                }
                e.input.attr("size", this._formatDate(e, t).length)
            }
        },
        _inlineDatepicker: function (e, t) {
            var a = $(e);
            a.hasClass(this.markerClassName) || (a.addClass(this.markerClassName).append(t.dpDiv).bind("setData.datepicker", function (e, a, i) {
                t.settings[a] = i
            }).bind("getData.datepicker", function (e, a) {
                return this._get(t, a)
            }), $.data(e, PROP_NAME, t), this._setDate(t, this._getDefaultDate(t), !0), this._updateDatepicker(t), this._updateAlternate(t), t.settings.disabled && this._disableDatepicker(e), t.dpDiv.css("display", "block"))
        },
        _dialogDatepicker: function (e, t, a, i, r) {
            var s = this._dialogInst;
            if (!s) {
                this.uuid += 1;
                var n = "dp" + this.uuid;
                this._dialogInput = $('<input type="text" id="' + n + '" style="position: absolute; top: -100px; width: 0px; z-index: -10;"/>'), this._dialogInput.keydown(this._doKeyDown), $("body").append(this._dialogInput), s = this._dialogInst = this._newInst(this._dialogInput, !1), s.settings = {}, $.data(this._dialogInput[0], PROP_NAME, s)
            }
            if (extendRemove(s.settings, i || {}), t = t && t.constructor == Date ? this._formatDate(s, t) : t, this._dialogInput.val(t), this._pos = r ? r.length ? r : [r.pageX, r.pageY] : null, !this._pos) {
                var d = document.documentElement.clientWidth, o = document.documentElement.clientHeight, c = document.documentElement.scrollLeft || document.body.scrollLeft, l = document.documentElement.scrollTop || document.body.scrollTop;
                this._pos = [d / 2 - 100 + c, o / 2 - 150 + l]
            }
            return this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), s.settings.onSelect = a, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), $.blockUI && $.blockUI(this.dpDiv), $.data(this._dialogInput[0], PROP_NAME, s), this
        },
        _destroyDatepicker: function (e) {
            var t = $(e), a = $.data(e, PROP_NAME);
            if (t.hasClass(this.markerClassName)) {
                var i = e.nodeName.toLowerCase();
                $.removeData(e, PROP_NAME), "input" == i ? (a.append.remove(), a.trigger.remove(), t.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)) : "div" != i && "span" != i || t.removeClass(this.markerClassName).empty()
            }
        },
        _enableDatepicker: function (e) {
            var t = $(e), a = $.data(e, PROP_NAME);
            if (t.hasClass(this.markerClassName)) {
                var i = e.nodeName.toLowerCase();
                if ("input" == i)e.disabled = !1, a.trigger.filter("button").each(function () {
                    this.disabled = !1
                }).end().filter("img").css({opacity: "1.0", cursor: ""}); else if ("div" == i || "span" == i) {
                    var r = t.children("." + this._inlineClass);
                    r.children().removeClass("ui-state-disabled"), r.find("select.ui-datepicker-month, select.ui-datepicker-year").removeAttr("disabled")
                }
                this._disabledInputs = $.map(this._disabledInputs, function (t) {
                    return t == e ? null : t
                })
            }
        },
        _disableDatepicker: function (e) {
            var t = $(e), a = $.data(e, PROP_NAME);
            if (t.hasClass(this.markerClassName)) {
                var i = e.nodeName.toLowerCase();
                if ("input" == i)e.disabled = !0, a.trigger.filter("button").each(function () {
                    this.disabled = !0
                }).end().filter("img").css({opacity: "0.5", cursor: "default"}); else if ("div" == i || "span" == i) {
                    var r = t.children("." + this._inlineClass);
                    r.children().addClass("ui-state-disabled"), r.find("select.ui-datepicker-month, select.ui-datepicker-year").attr("disabled", "disabled")
                }
                this._disabledInputs = $.map(this._disabledInputs, function (t) {
                    return t == e ? null : t
                }), this._disabledInputs[this._disabledInputs.length] = e
            }
        },
        _isDisabledDatepicker: function (e) {
            if (!e)return !1;
            for (var t = 0; t < this._disabledInputs.length; t++)if (this._disabledInputs[t] == e)return !0;
            return !1
        },
        _getInst: function (e) {
            try {
                return $.data(e, PROP_NAME)
            } catch (t) {
                throw"Missing instance data for this datepicker"
            }
        },
        _optionDatepicker: function (e, t, a) {
            var i = this._getInst(e);
            if (2 == arguments.length && "string" == typeof t)return "defaults" == t ? $.extend({}, $.datepicker._defaults) : i ? "all" == t ? $.extend({}, i.settings) : this._get(i, t) : null;
            var r = t || {};
            if ("string" == typeof t && (r = {}, r[t] = a), i) {
                this._curInst == i && this._hideDatepicker();
                var s = this._getDateDatepicker(e, !0), n = this._getMinMaxDate(i, "min"), d = this._getMinMaxDate(i, "max");
                extendRemove(i.settings, r), null !== n && r.dateFormat !== undefined && r.minDate === undefined && (i.settings.minDate = this._formatDate(i, n)), null !== d && r.dateFormat !== undefined && r.maxDate === undefined && (i.settings.maxDate = this._formatDate(i, d)), this._attachments($(e), i), this._autoSize(i), this._setDate(i, s), this._updateAlternate(i), this._updateDatepicker(i)
            }
        },
        _changeDatepicker: function (e, t, a) {
            this._optionDatepicker(e, t, a)
        },
        _refreshDatepicker: function (e) {
            var t = this._getInst(e);
            t && this._updateDatepicker(t)
        },
        _setDateDatepicker: function (e, t) {
            var a = this._getInst(e);
            a && (this._setDate(a, t), this._updateDatepicker(a), this._updateAlternate(a))
        },
        _getDateDatepicker: function (e, t) {
            var a = this._getInst(e);
            return a && !a.inline && this._setDateFromField(a, t), a ? this._getDate(a) : null
        },
        _doKeyDown: function (e) {
            var t = $.datepicker._getInst(e.target), a = !0, i = t.dpDiv.is(".ui-datepicker-rtl");
            if (t._keyEvent = !0, $.datepicker._datepickerShowing)switch (e.keyCode) {
                case 9:
                    $.datepicker._hideDatepicker(), a = !1;
                    break;
                case 13:
                    var r = $("td." + $.datepicker._dayOverClass + ":not(." + $.datepicker._currentClass + ")", t.dpDiv);
                    r[0] && $.datepicker._selectDay(e.target, t.selectedMonth, t.selectedYear, r[0]);
                    var s = $.datepicker._get(t, "onSelect");
                    if (s) {
                        var n = $.datepicker._formatDate(t);
                        s.apply(t.input ? t.input[0] : null, [n, t])
                    } else $.datepicker._hideDatepicker();
                    return !1;
                case 27:
                    $.datepicker._hideDatepicker();
                    break;
                case 33:
                    $.datepicker._adjustDate(e.target, e.ctrlKey ? -$.datepicker._get(t, "stepBigMonths") : -$.datepicker._get(t, "stepMonths"), "M");
                    break;
                case 34:
                    $.datepicker._adjustDate(e.target, e.ctrlKey ? +$.datepicker._get(t, "stepBigMonths") : +$.datepicker._get(t, "stepMonths"), "M");
                    break;
                case 35:
                    (e.ctrlKey || e.metaKey) && $.datepicker._clearDate(e.target), a = e.ctrlKey || e.metaKey;
                    break;
                case 36:
                    (e.ctrlKey || e.metaKey) && $.datepicker._gotoToday(e.target), a = e.ctrlKey || e.metaKey;
                    break;
                case 37:
                    (e.ctrlKey || e.metaKey) && $.datepicker._adjustDate(e.target, i ? 1 : -1, "D"), a = e.ctrlKey || e.metaKey, e.originalEvent.altKey && $.datepicker._adjustDate(e.target, e.ctrlKey ? -$.datepicker._get(t, "stepBigMonths") : -$.datepicker._get(t, "stepMonths"), "M");
                    break;
                case 38:
                    (e.ctrlKey || e.metaKey) && $.datepicker._adjustDate(e.target, -7, "D"), a = e.ctrlKey || e.metaKey;
                    break;
                case 39:
                    (e.ctrlKey || e.metaKey) && $.datepicker._adjustDate(e.target, i ? -1 : 1, "D"), a = e.ctrlKey || e.metaKey, e.originalEvent.altKey && $.datepicker._adjustDate(e.target, e.ctrlKey ? +$.datepicker._get(t, "stepBigMonths") : +$.datepicker._get(t, "stepMonths"), "M");
                    break;
                case 40:
                    (e.ctrlKey || e.metaKey) && $.datepicker._adjustDate(e.target, 7, "D"), a = e.ctrlKey || e.metaKey;
                    break;
                default:
                    a = !1
            } else 36 == e.keyCode && e.ctrlKey ? $.datepicker._showDatepicker(this) : a = !1;
            a && (e.preventDefault(), e.stopPropagation())
        },
        _doKeyPress: function (e) {
            var t = $.datepicker._getInst(e.target);
            if ($.datepicker._get(t, "constrainInput")) {
                var a = $.datepicker._possibleChars($.datepicker._get(t, "dateFormat")), i = String.fromCharCode(e.charCode == undefined ? e.keyCode : e.charCode);
                return e.ctrlKey || e.metaKey || " " > i || !a || a.indexOf(i) > -1
            }
        },
        _doKeyUp: function (e) {
            var t = $.datepicker._getInst(e.target);
            if (t.input.val() != t.lastVal)try {
                var a = $.datepicker.parseDate($.datepicker._get(t, "dateFormat"), t.input ? t.input.val() : null, $.datepicker._getFormatConfig(t));
                a && ($.datepicker._setDateFromField(t), $.datepicker._updateAlternate(t), $.datepicker._updateDatepicker(t))
            } catch (e) {
                $.datepicker.log(e)
            }
            return !0
        },
        _showDatepicker: function (e) {
            if (e = e.target || e, "input" != e.nodeName.toLowerCase() && (e = $("input", e.parentNode)[0]), !$.datepicker._isDisabledDatepicker(e) && $.datepicker._lastInput != e) {
                var t = $.datepicker._getInst(e);
                $.datepicker._curInst && $.datepicker._curInst != t && ($.datepicker._curInst.dpDiv.stop(!0, !0), t && $.datepicker._datepickerShowing && $.datepicker._hideDatepicker($.datepicker._curInst.input[0]));
                var a = $.datepicker._get(t, "beforeShow"), i = a ? a.apply(e, [e, t]) : {};
                if (i !== !1) {
                    extendRemove(t.settings, i), t.lastVal = null, $.datepicker._lastInput = e, $.datepicker._setDateFromField(t), $.datepicker._inDialog && (e.value = ""), $.datepicker._pos || ($.datepicker._pos = $.datepicker._findPos(e), $.datepicker._pos[1] += e.offsetHeight);
                    var r = !1;
                    $(e).parents().each(function () {
                        return r |= "fixed" == $(this).css("position"), !r
                    }), r && $.browser.opera && ($.datepicker._pos[0] -= document.documentElement.scrollLeft, $.datepicker._pos[1] -= document.documentElement.scrollTop);
                    var s = {left: $.datepicker._pos[0], top: $.datepicker._pos[1]};
                    if ($.datepicker._pos = null, t.dpDiv.empty(), t.dpDiv.css({
                            position: "absolute",
                            display: "block",
                            top: "-1000px"
                        }), $.datepicker._updateDatepicker(t), s = $.datepicker._checkOffset(t, s, r), t.dpDiv.css({
                            position: $.datepicker._inDialog && $.blockUI ? "static" : r ? "fixed" : "absolute",
                            display: "none",
                            left: s.left + "px",
                            top: s.top + "px"
                        }), !t.inline) {
                        var n = $.datepicker._get(t, "showAnim"), d = $.datepicker._get(t, "duration"), o = function () {
                            var e = t.dpDiv.find("iframe.ui-datepicker-cover");
                            if (e.length) {
                                var a = $.datepicker._getBorders(t.dpDiv);
                                e.css({
                                    left: -a[0],
                                    top: -a[1],
                                    width: t.dpDiv.outerWidth(),
                                    height: t.dpDiv.outerHeight()
                                })
                            }
                        };
                        t.dpDiv.zIndex($(e).zIndex() + 1), $.datepicker._datepickerShowing = !0, $.effects && $.effects[n] ? t.dpDiv.show(n, $.datepicker._get(t, "showOptions"), d, o) : t.dpDiv[n || "show"](n ? d : null, o), n && d || o(), t.input.is(":visible") && !t.input.is(":disabled") && t.input.focus(), $.datepicker._curInst = t
                    }
                }
            }
        },
        _updateDatepicker: function (e) {
            var t = this;
            t.maxRows = 4;
            var a = $.datepicker._getBorders(e.dpDiv);
            instActive = e, e.dpDiv.empty().append(this._generateHTML(e));
            var i = e.dpDiv.find("iframe.ui-datepicker-cover");
            i.length && i.css({
                left: -a[0],
                top: -a[1],
                width: e.dpDiv.outerWidth(),
                height: e.dpDiv.outerHeight()
            }), e.dpDiv.find("." + this._dayOverClass + " a").mouseover();
            var r = this._getNumberOfMonths(e), s = r[1], n = 218;
            if (e.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), s > 1 && e.dpDiv.addClass("ui-datepicker-multi-" + s).css("width", n * s + 10 * (s - 1) + "px"), e.dpDiv[(1 != r[0] || 1 != r[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), e.dpDiv[(this._get(e, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), e == $.datepicker._curInst && $.datepicker._datepickerShowing && e.input && e.input.is(":visible") && !e.input.is(":disabled") && e.input[0] != document.activeElement && e.input.focus(), e.yearshtml) {
                var d = e.yearshtml;
                setTimeout(function () {
                    d === e.yearshtml && e.yearshtml && e.dpDiv.find("select.ui-datepicker-year:first").replaceWith(e.yearshtml), d = e.yearshtml = null
                }, 0)
            }
        },
        _getBorders: function (e) {
            var t = function (e) {
                return {thin: 1, medium: 2, thick: 3}[e] || e
            };
            return [parseFloat(t(e.css("border-left-width"))), parseFloat(t(e.css("border-top-width")))]
        },
        _checkOffset: function (e, t, a) {
            var i = e.dpDiv.outerWidth(), r = e.dpDiv.outerHeight(), s = e.input ? e.input.outerWidth() : 0, n = e.input ? e.input.outerHeight() : 0, d = document.documentElement.clientWidth + $(document).scrollLeft(), o = document.documentElement.clientHeight + $(document).scrollTop();
            return t.left -= this._get(e, "isRTL") ? i - s : 0, t.left -= a && t.left == e.input.offset().left ? $(document).scrollLeft() : 0, t.top -= a && t.top == e.input.offset().top + n ? $(document).scrollTop() : 0, t.left -= Math.min(t.left, t.left + i > d && d > i ? Math.abs(t.left + i - d) : 0), t.top -= Math.min(t.top, t.top + r > o && o > r ? Math.abs(r + n) : 0), t
        },
        _findPos: function (e) {
            for (var t = this._getInst(e), a = this._get(t, "isRTL"); e && ("hidden" == e.type || 1 != e.nodeType || $.expr.filters.hidden(e));)e = e[a ? "previousSibling" : "nextSibling"];
            var i = $(e).offset();
            return [i.left, i.top]
        },
        _hideDatepicker: function (e) {
            var t = this._curInst;
            if (t && (!e || t == $.data(e, PROP_NAME)) && this._datepickerShowing) {
                var a = this._get(t, "showAnim"), i = this._get(t, "duration"), r = this, s = function () {
                    $.datepicker._tidyDialog(t), r._curInst = null
                };
                $.effects && $.effects[a] ? t.dpDiv.hide(a, $.datepicker._get(t, "showOptions"), i, s) : t.dpDiv["slideDown" == a ? "slideUp" : "fadeIn" == a ? "fadeOut" : "hide"](a ? i : null, s), a || s(), this._datepickerShowing = !1;
                var n = this._get(t, "onClose");
                n && n.apply(t.input ? t.input[0] : null, [t.input ? t.input.val() : "", t]), this._lastInput = null, this._inDialog && (this._dialogInput.css({
                    position: "absolute",
                    left: "0",
                    top: "-100px"
                }), $.blockUI && ($.unblockUI(), $("body").append(this.dpDiv))), this._inDialog = !1
            }
        },
        _tidyDialog: function (e) {
            e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")
        },
        _checkExternalClick: function (e) {
            if ($.datepicker._curInst) {
                var t = $(e.target), a = $.datepicker._getInst(t[0]);
                (t[0].id == $.datepicker._mainDivId || 0 != t.parents("#" + $.datepicker._mainDivId).length || t.hasClass($.datepicker.markerClassName) || t.closest("." + $.datepicker._triggerClass).length || !$.datepicker._datepickerShowing || $.datepicker._inDialog && $.blockUI) && (!t.hasClass($.datepicker.markerClassName) || $.datepicker._curInst == a) || $.datepicker._hideDatepicker()
            }
        },
        _adjustDate: function (e, t, a) {
            var i = $(e), r = this._getInst(i[0]);
            this._isDisabledDatepicker(i[0]) || (this._adjustInstDate(r, t + ("M" == a ? this._get(r, "showCurrentAtPos") : 0), a), this._updateDatepicker(r))
        },
        _gotoToday: function (e) {
            var t = $(e), a = this._getInst(t[0]);
            if (this._get(a, "gotoCurrent") && a.currentDay)a.selectedDay = a.currentDay, a.drawMonth = a.selectedMonth = a.currentMonth, a.drawYear = a.selectedYear = a.currentYear; else {
                var i = new Date;
                a.selectedDay = i.getDate(), a.drawMonth = a.selectedMonth = i.getMonth(), a.drawYear = a.selectedYear = i.getFullYear()
            }
            this._notifyChange(a), this._adjustDate(t)
        },
        _selectMonthYear: function (e, t, a) {
            var i = $(e), r = this._getInst(i[0]);
            r["selected" + ("M" == a ? "Month" : "Year")] = r["draw" + ("M" == a ? "Month" : "Year")] = parseInt(t.options[t.selectedIndex].value, 10), this._notifyChange(r), this._adjustDate(i)
        },
        _selectDay: function (e, t, a, i) {
            var r = $(e);
            if (!$(i).hasClass(this._unselectableClass) && !this._isDisabledDatepicker(r[0])) {
                var s = this._getInst(r[0]);
                s.selectedDay = s.currentDay = $("a", i).html(), s.selectedMonth = s.currentMonth = t, s.selectedYear = s.currentYear = a, this._selectDate(e, this._formatDate(s, s.currentDay, s.currentMonth, s.currentYear))
            }
        },
        _clearDate: function (e) {
            var t = $(e);
            this._getInst(t[0]);
            this._selectDate(t, "")
        },
        _selectDate: function (e, t) {
            var a = $(e), i = this._getInst(a[0]);
            t = null != t ? t : this._formatDate(i), i.input && i.input.val(t), this._updateAlternate(i);
            var r = this._get(i, "onSelect");
            r ? r.apply(i.input ? i.input[0] : null, [t, i]) : i.input && i.input.trigger("change"), i.inline ? this._updateDatepicker(i) : (this._hideDatepicker(), this._lastInput = i.input[0], "object" != typeof i.input[0] && i.input.focus(), this._lastInput = null)
        },
        _updateAlternate: function (e) {
            var t = this._get(e, "altField");
            if (t) {
                var a = this._get(e, "altFormat") || this._get(e, "dateFormat"), i = this._getDate(e), r = this.formatDate(a, i, this._getFormatConfig(e));
                $(t).each(function () {
                    $(this).val(r)
                })
            }
        },
        noWeekends: function (e) {
            var t = e.getDay();
            return [t > 0 && 6 > t, ""]
        },
        iso8601Week: function (e) {
            var t = new Date(e.getTime());
            t.setDate(t.getDate() + 4 - (t.getDay() || 7));
            var a = t.getTime();
            return t.setMonth(0), t.setDate(1), Math.floor(Math.round((a - t) / 864e5) / 7) + 1
        },
        parseDate: function (e, t, a) {
            if (null == e || null == t)throw"Invalid arguments";
            if (t = "object" == typeof t ? t.toString() : t + "", "" == t)return null;
            var i = (a ? a.shortYearCutoff : null) || this._defaults.shortYearCutoff;
            i = "string" != typeof i ? i : (new Date).getFullYear() % 100 + parseInt(i, 10);
            for (var r = (a ? a.dayNamesShort : null) || this._defaults.dayNamesShort, s = (a ? a.dayNames : null) || this._defaults.dayNames, n = (a ? a.monthNamesShort : null) || this._defaults.monthNamesShort, d = (a ? a.monthNames : null) || this._defaults.monthNames, o = -1, c = -1, l = -1, u = -1, h = !1, p = function (t) {
                var a = m + 1 < e.length && e.charAt(m + 1) == t;
                return a && m++, a
            }, g = function (e) {
                var a = p(e), i = "@" == e ? 14 : "!" == e ? 20 : "y" == e && a ? 4 : "o" == e ? 3 : 2, r = new RegExp("^\\d{1," + i + "}"), s = t.substring(k).match(r);
                if (!s)throw"Missing number at position " + k;
                return k += s[0].length, parseInt(s[0], 10)
            }, _ = function (e, a, i) {
                var r = $.map(p(e) ? i : a, function (e, t) {
                    return [[t, e]]
                }).sort(function (e, t) {
                    return -(e[1].length - t[1].length)
                }), s = -1;
                if ($.each(r, function (e, a) {
                        var i = a[1];
                        return t.substr(k, i.length).toLowerCase() == i.toLowerCase() ? (s = a[0], k += i.length, !1) : void 0
                    }), -1 != s)return s + 1;
                throw"Unknown name at position " + k
            }, f = function () {
                if (t.charAt(k) != e.charAt(m))throw"Unexpected literal at position " + k;
                k++
            }, k = 0, m = 0; m < e.length; m++)if (h)"'" != e.charAt(m) || p("'") ? f() : h = !1; else switch (e.charAt(m)) {
                case"d":
                    l = g("d");
                    break;
                case"D":
                    _("D", r, s);
                    break;
                case"o":
                    u = g("o");
                    break;
                case"m":
                    c = g("m");
                    break;
                case"M":
                    c = _("M", n, d);
                    break;
                case"y":
                    o = g("y");
                    break;
                case"@":
                    var D = new Date(g("@"));
                    o = D.getFullYear(), c = D.getMonth() + 1, l = D.getDate();
                    break;
                case"!":
                    var D = new Date((g("!") - this._ticksTo1970) / 1e4);
                    o = D.getFullYear(), c = D.getMonth() + 1, l = D.getDate();
                    break;
                case"'":
                    p("'") ? f() : h = !0;
                    break;
                default:
                    f()
            }
            if (k < t.length)throw"Extra/unparsed characters found in date: " + t.substring(k);
            if (-1 == o ? o = (new Date).getFullYear() : 100 > o && (o += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (i >= o ? 0 : -100)), u > -1)for (c = 1, l = u; ;) {
                var v = this._getDaysInMonth(o, c - 1);
                if (v >= l)break;
                c++, l -= v
            }
            var D = this._daylightSavingAdjust(new Date(o, c - 1, l));
            if (D.getFullYear() != o || D.getMonth() + 1 != c || D.getDate() != l)throw"Invalid date";
            return D
        },
        ATOM: "yy-mm-dd",
        COOKIE: "D, dd M yy",
        ISO_8601: "yy-mm-dd",
        RFC_822: "D, d M y",
        RFC_850: "DD, dd-M-y",
        RFC_1036: "D, d M y",
        RFC_1123: "D, d M yy",
        RFC_2822: "D, d M yy",
        RSS: "D, d M y",
        TICKS: "!",
        TIMESTAMP: "@",
        W3C: "yy-mm-dd",
        _ticksTo1970: 24 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)) * 60 * 60 * 1e7,
        formatDate: function (e, t, a) {
            if (!t)return "";
            var i = (a ? a.dayNamesShort : null) || this._defaults.dayNamesShort, r = (a ? a.dayNames : null) || this._defaults.dayNames, s = (a ? a.monthNamesShort : null) || this._defaults.monthNamesShort, n = (a ? a.monthNames : null) || this._defaults.monthNames, d = function (t) {
                var a = h + 1 < e.length && e.charAt(h + 1) == t;
                return a && h++, a
            }, o = function (e, t, a) {
                var i = "" + t;
                if (d(e))for (; i.length < a;)i = "0" + i;
                return i
            }, c = function (e, t, a, i) {
                return d(e) ? i[t] : a[t]
            }, l = "", u = !1;
            if (t)for (var h = 0; h < e.length; h++)if (u)"'" != e.charAt(h) || d("'") ? l += e.charAt(h) : u = !1; else switch (e.charAt(h)) {
                case"d":
                    l += o("d", t.getDate(), 2);
                    break;
                case"D":
                    l += c("D", t.getDay(), i, r);
                    break;
                case"o":
                    l += o("o", Math.round((new Date(t.getFullYear(), t.getMonth(), t.getDate()).getTime() - new Date(t.getFullYear(), 0, 0).getTime()) / 864e5), 3);
                    break;
                case"m":
                    l += o("m", t.getMonth() + 1, 2);
                    break;
                case"M":
                    l += c("M", t.getMonth(), s, n);
                    break;
                case"y":
                    l += d("y") ? t.getFullYear() : (t.getYear() % 100 < 10 ? "0" : "") + t.getYear() % 100;
                    break;
                case"@":
                    l += t.getTime();
                    break;
                case"!":
                    l += 1e4 * t.getTime() + this._ticksTo1970;
                    break;
                case"'":
                    d("'") ? l += "'" : u = !0;
                    break;
                default:
                    l += e.charAt(h)
            }
            return l
        },
        _possibleChars: function (e) {
            for (var t = "", a = !1, i = function (t) {
                var a = r + 1 < e.length && e.charAt(r + 1) == t;
                return a && r++, a
            }, r = 0; r < e.length; r++)if (a)"'" != e.charAt(r) || i("'") ? t += e.charAt(r) : a = !1; else switch (e.charAt(r)) {
                case"d":
                case"m":
                case"y":
                case"@":
                    t += "0123456789";
                    break;
                case"D":
                case"M":
                    return null;
                case"'":
                    i("'") ? t += "'" : a = !0;
                    break;
                default:
                    t += e.charAt(r)
            }
            return t
        },
        _get: function (e, t) {
            return e.settings[t] !== undefined ? e.settings[t] : this._defaults[t]
        },
        _setDateFromField: function (e, t) {
            if (e.input.val() != e.lastVal) {
                var a, i, r = this._get(e, "dateFormat"), s = e.lastVal = e.input ? e.input.val() : null;
                a = i = this._getDefaultDate(e);
                var n = this._getFormatConfig(e);
                try {
                    a = this.parseDate(r, s, n) || i
                } catch (d) {
                    this.log(d), s = t ? "" : s
                }
                e.selectedDay = a.getDate(), e.drawMonth = e.selectedMonth = a.getMonth(), e.drawYear = e.selectedYear = a.getFullYear(), e.currentDay = s ? a.getDate() : 0, e.currentMonth = s ? a.getMonth() : 0, e.currentYear = s ? a.getFullYear() : 0, this._adjustInstDate(e)
            }
        },
        _getDefaultDate: function (e) {
            return this._restrictMinMax(e, this._determineDate(e, this._get(e, "defaultDate"), new Date))
        },
        _determineDate: function (e, t, a) {
            var i = function (e) {
                var t = new Date;
                return t.setDate(t.getDate() + e), t
            }, r = function (t) {
                try {
                    return $.datepicker.parseDate($.datepicker._get(e, "dateFormat"), t, $.datepicker._getFormatConfig(e))
                } catch (a) {
                }
                for (var i = (t.toLowerCase().match(/^c/) ? $.datepicker._getDate(e) : null) || new Date, r = i.getFullYear(), s = i.getMonth(), n = i.getDate(), d = /([+-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, o = d.exec(t); o;) {
                    switch (o[2] || "d") {
                        case"d":
                        case"D":
                            n += parseInt(o[1], 10);
                            break;
                        case"w":
                        case"W":
                            n += 7 * parseInt(o[1], 10);
                            break;
                        case"m":
                        case"M":
                            s += parseInt(o[1], 10), n = Math.min(n, $.datepicker._getDaysInMonth(r, s));
                            break;
                        case"y":
                        case"Y":
                            r += parseInt(o[1], 10), n = Math.min(n, $.datepicker._getDaysInMonth(r, s))
                    }
                    o = d.exec(t)
                }
                return new Date(r, s, n)
            }, s = null == t || "" === t ? a : "string" == typeof t ? r(t) : "number" == typeof t ? isNaN(t) ? a : i(t) : new Date(t.getTime());
            return s = s && "Invalid Date" == s.toString() ? a : s, s && (s.setHours(0), s.setMinutes(0), s.setSeconds(0), s.setMilliseconds(0)), this._daylightSavingAdjust(s)
        },
        _daylightSavingAdjust: function (e) {
            return e ? (e.setHours(e.getHours() > 12 ? e.getHours() + 2 : 0), e) : null
        },
        _setDate: function (e, t, a) {
            var i = !t, r = e.selectedMonth, s = e.selectedYear, n = this._restrictMinMax(e, this._determineDate(e, t, new Date));
            e.selectedDay = e.currentDay = n.getDate(), e.drawMonth = e.selectedMonth = e.currentMonth = n.getMonth(), e.drawYear = e.selectedYear = e.currentYear = n.getFullYear(), r == e.selectedMonth && s == e.selectedYear || a || this._notifyChange(e), this._adjustInstDate(e), e.input && e.input.val(i ? "" : this._formatDate(e))
        },
        _getDate: function (e) {
            var t = !e.currentYear || e.input && "" == e.input.val() ? null : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
            return t
        },
        _generateHTML: function (e) {
            var t = new Date;
            t = this._daylightSavingAdjust(new Date(t.getFullYear(), t.getMonth(), t.getDate()));
            var a = this._get(e, "isRTL"), i = this._get(e, "showButtonPanel"), r = this._get(e, "hideIfNoPrevNext"), s = this._get(e, "navigationAsDateFormat"), n = this._getNumberOfMonths(e), d = this._get(e, "showCurrentAtPos"), o = this._get(e, "stepMonths"), c = 1 != n[0] || 1 != n[1], l = this._daylightSavingAdjust(e.currentDay ? new Date(e.currentYear, e.currentMonth, e.currentDay) : new Date(9999, 9, 9)), u = this._getMinMaxDate(e, "min"), h = this._getMinMaxDate(e, "max"), p = e.drawMonth - d, g = e.drawYear;
            if (0 > p && (p += 12, g--), h) {
                var _ = this._daylightSavingAdjust(new Date(h.getFullYear(), h.getMonth() - n[0] * n[1] + 1, h.getDate()));
                for (_ = u && u > _ ? u : _; this._daylightSavingAdjust(new Date(g, p, 1)) > _;)p--, 0 > p && (p = 11, g--)
            }
            e.drawMonth = p, e.drawYear = g;
            var f = this._get(e, "prevText");
            f = s ? this.formatDate(f, this._daylightSavingAdjust(new Date(g, p - o, 1)), this._getFormatConfig(e)) : f;
            var k = this._canAdjustMonth(e, -1, g, p) ? '<a class="ui-datepicker-prev ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._adjustDate('#" + e.id + "', -" + o + ", 'M');\" title=\"" + f + '"><span class="ui-icon ui-icon-circle-triangle-' + (a ? "e" : "w") + '">' + f + "</span></a>" : r ? "" : '<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="' + f + '"><span class="ui-icon ui-icon-circle-triangle-' + (a ? "e" : "w") + '">' + f + "</span></a>", m = this._get(e, "nextText");
            m = s ? this.formatDate(m, this._daylightSavingAdjust(new Date(g, p + o, 1)), this._getFormatConfig(e)) : m;
            var D = this._canAdjustMonth(e, 1, g, p) ? '<a class="ui-datepicker-next ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._adjustDate('#" + e.id + "', +" + o + ", 'M');\" title=\"" + m + '"><span class="ui-icon ui-icon-circle-triangle-' + (a ? "w" : "e") + '">' + m + "</span></a>" : r ? "" : '<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="' + m + '"><span class="ui-icon ui-icon-circle-triangle-' + (a ? "w" : "e") + '">' + m + "</span></a>", v = this._get(e, "currentText"), y = this._get(e, "gotoCurrent") && e.currentDay ? l : t;
            v = s ? this.formatDate(v, y, this._getFormatConfig(e)) : v;
            var M = e.inline ? "" : '<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" onclick="DP_jQuery_' + dpuuid + '.datepicker._hideDatepicker();">' + this._get(e, "closeText") + "</button>", b = i ? '<div class="ui-datepicker-buttonpane ui-widget-content">' + (a ? M : "") + (this._isInRange(e, y) ? '<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" onclick="DP_jQuery_' + dpuuid + ".datepicker._gotoToday('#" + e.id + "');\">" + v + "</button>" : "") + (a ? "" : M) + "</div>" : "", w = parseInt(this._get(e, "firstDay"), 10);
            w = isNaN(w) ? 0 : w;
            var C = this._get(e, "showWeek"), I = this._get(e, "dayNames"), x = (this._get(e, "dayNamesShort"), this._get(e, "dayNamesMin")), N = this._get(e, "monthNames"), Y = this._get(e, "monthNamesShort"), S = this._get(e, "beforeShowDay"), A = this._get(e, "showOtherMonths"), T = this._get(e, "selectOtherMonths"), F = (this._get(e, "calculateWeek") || this.iso8601Week, this._getDefaultDate(e)), j = "";
            if (0 != this._get(e, "fromobject") && 0 != this._get(e, "toobject"))var K = $("#" + this._get(e, "fromobject")).datepicker("getDate"), P = $("#" + this._get(e, "toobject")).datepicker("getDate");
            for (var O = 0; O < n[0]; O++) {
                var R = "";
                this.maxRows = 4;
                for (var E = 0; E < n[1]; E++) {
                    var L = this._daylightSavingAdjust(new Date(g, p, e.selectedDay)), H = " ui-corner-all", W = "";
                    if (c) {
                        if (W += '<div class="ui-datepicker-group', n[1] > 1)switch (E) {
                            case 0:
                                W += " ui-datepicker-group-first", H = " ui-corner-" + (a ? "right" : "left");
                                break;
                            case n[1] - 1:
                                W += " ui-datepicker-group-last", H = " ui-corner-" + (a ? "left" : "right");
                                break;
                            default:
                                W += " ui-datepicker-group-middle", H = ""
                        }
                        W += '">'
                    }
                    W += '<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix' + H + '">' + (/all|left/.test(H) && 0 == O ? a ? D : k : "") + (/all|right/.test(H) && 0 == O ? a ? k : D : "") + this._generateMonthYearHeader(e, p, g, u, h, O > 0 || E > 0, N, Y) + '</div><table class="ui-datepicker-calendar"><thead><tr>';
                    for (var z = C ? '<th class="ui-datepicker-week-col">' + this._get(e, "weekHeader") + "</th>" : "", U = 0; 7 > U; U++) {
                        var B = (U + w) % 7;
                        z += "<th" + ((U + w + 6) % 7 >= 5 ? ' class="ui-datepicker-week-end"' : "") + '><span title="' + I[B] + '">' + x[B] + "</span></th>"
                    }
                    W += z + "</tr></thead><tbody>";
                    var Q = this._getDaysInMonth(g, p);
                    g == e.selectedYear && p == e.selectedMonth && (e.selectedDay = Math.min(e.selectedDay, Q));
                    var V = (this._getFirstDayOfMonth(g, p) - w + 7) % 7, X = Math.ceil((V + Q) / 7), Z = c && this.maxRows > X ? this.maxRows : X;
                    this.maxRows = Z;
                    for (var q = this._daylightSavingAdjust(new Date(g, p, 1 - V)), G = 0; Z > G; G++) {
                        W += "<tr>";
                        for (var J = C ? '<td class="ui-datepicker-week-col">' + this._get(e, "calculateWeek")(q) + "</td>" : "", U = 0; 7 > U; U++) {
                            var ee = S ? S.apply(e.input ? e.input[0] : null, [q]) : [!0, ""], te = q.getMonth() != p, ae = te && !T || !ee[0] || u && u > q || h && q > h;
                            J += '<td class="' + ((U + w + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (te ? " ui-datepicker-other-month" : "") + (q.getTime() == L.getTime() && p == e.selectedMonth && e._keyEvent || F.getTime() == q.getTime() && F.getTime() == L.getTime() ? " " + this._dayOverClass : "") + (ae ? " " + this._unselectableClass + " ui-state-disabled" : "") + (te && !A ? "" : " " + ee[1] + (q.getTime() == l.getTime() ? " " + this._currentClass : "") + (q.getTime() == t.getTime() ? " ui-datepicker-today" : "")) + '"' + (te && !A || !ee[2] ? "" : ' title="' + ee[2] + '"') + (ae ? "" : ' onclick="DP_jQuery_' + dpuuid + ".datepicker._selectDay('#" + e.id + "'," + q.getMonth() + "," + q.getFullYear() + ', this);return false;"') + ">" + (te && !A ? "&#xa0;" : ae ? '<span class="ui-state-default' + (null != K && q.getTime() == K.getTime() && dtplus.type == this._get(e, "toobject") ? " ui-state-active" : "") + '">' + q.getDate() + "</span>" : '<a v="' + parseInt(q.getMonth() + 1) + "," + q.getDate() + "," + q.getFullYear() + '" class="ui-state-default' + (q.getTime() == t.getTime() ? " ui-state-highlight" : "") + (null != K && null != P && q.getTime() > K.getTime() && q.getTime() < P.getTime() && dtplus.type == this._get(e, "toobject") ? " ui-state-space" : "") + (q.getTime() == l.getTime() || null != K && q.getTime() == K.getTime() ? " ui-state-active" : "") + (te ? " ui-priority-secondary" : "") + '" href="#">' + q.getDate() + "</a>") + "</td>",
                                q.setDate(q.getDate() + 1), q = this._daylightSavingAdjust(q)
                        }
                        W += J + "</tr>"
                    }
                    p++, p > 11 && (p = 0, g++), W += "</tbody></table>" + (c ? "</div>" + (n[0] > 0 && E == n[1] - 1 ? '<div class="ui-datepicker-row-break"></div>' : "") : ""), R += W
                }
                j += R
            }
            return j += b, e._keyEvent = !1, j
        },
        _generateMonthYearHeader: function (e, t, a, i, r, s, n, d) {
            var o = this._get(e, "changeMonth"), c = this._get(e, "changeYear"), l = this._get(e, "showMonthAfterYear"), u = '<div class="ui-datepicker-title">', h = "";
            if (s || !o)h += '<span class="ui-datepicker-month">' + n[t] + "</span>"; else {
                var p = i && i.getFullYear() == a, g = r && r.getFullYear() == a;
                h += '<select class="ui-datepicker-month" onchange="DP_jQuery_' + dpuuid + ".datepicker._selectMonthYear('#" + e.id + "', this, 'M');\" >";
                for (var _ = 0; 12 > _; _++)(!p || _ >= i.getMonth()) && (!g || _ <= r.getMonth()) && (h += '<option value="' + _ + '"' + (_ == t ? ' selected="selected"' : "") + ">" + d[_] + "</option>");
                h += "</select>"
            }
            if (l || (u += h + (!s && o && c ? "" : "&#xa0;")), !e.yearshtml)if (e.yearshtml = "", s || !c)u += '<span class="ui-datepicker-year">' + a + "</span>"; else {
                var f = this._get(e, "yearRange").split(":"), k = (new Date).getFullYear(), m = function (e) {
                    var t = e.match(/c[+-].*/) ? a + parseInt(e.substring(1), 10) : e.match(/[+-].*/) ? k + parseInt(e, 10) : parseInt(e, 10);
                    return isNaN(t) ? k : t
                }, D = m(f[0]), v = Math.max(D, m(f[1] || ""));
                for (D = i ? Math.max(D, i.getFullYear()) : D, v = r ? Math.min(v, r.getFullYear()) : v, e.yearshtml += '<select class="ui-datepicker-year" onchange="DP_jQuery_' + dpuuid + ".datepicker._selectMonthYear('#" + e.id + "', this, 'Y');\" >"; v >= D; D++)e.yearshtml += '<option value="' + D + '"' + (D == a ? ' selected="selected"' : "") + ">" + D + "</option>";
                e.yearshtml += "</select>", u += e.yearshtml, e.yearshtml = null
            }
            return u += this._get(e, "yearSuffix"), l && (u += (!s && o && c ? "" : "&#xa0;") + h), u += "</div>"
        },
        _adjustInstDate: function (e, t, a) {
            var i = e.drawYear + ("Y" == a ? t : 0), r = e.drawMonth + ("M" == a ? t : 0), s = Math.min(e.selectedDay, this._getDaysInMonth(i, r)) + ("D" == a ? t : 0), n = this._restrictMinMax(e, this._daylightSavingAdjust(new Date(i, r, s)));
            e.selectedDay = n.getDate(), e.drawMonth = e.selectedMonth = n.getMonth(), e.drawYear = e.selectedYear = n.getFullYear(), "M" != a && "Y" != a || this._notifyChange(e)
        },
        _restrictMinMax: function (e, t) {
            var a = this._getMinMaxDate(e, "min"), i = this._getMinMaxDate(e, "max"), r = a && a > t ? a : t;
            return r = i && r > i ? i : r
        },
        _notifyChange: function (e) {
            var t = this._get(e, "onChangeMonthYear");
            t && t.apply(e.input ? e.input[0] : null, [e.selectedYear, e.selectedMonth + 1, e])
        },
        _getNumberOfMonths: function (e) {
            var t = this._get(e, "numberOfMonths");
            return null == t ? [1, 1] : "number" == typeof t ? [1, t] : t
        },
        _getMinMaxDate: function (e, t) {
            return this._determineDate(e, this._get(e, t + "Date"), null)
        },
        _getDaysInMonth: function (e, t) {
            return 32 - this._daylightSavingAdjust(new Date(e, t, 32)).getDate()
        },
        _getFirstDayOfMonth: function (e, t) {
            return new Date(e, t, 1).getDay()
        },
        _canAdjustMonth: function (e, t, a, i) {
            var r = this._getNumberOfMonths(e), s = this._daylightSavingAdjust(new Date(a, i + (0 > t ? t : r[0] * r[1]), 1));
            return 0 > t && s.setDate(this._getDaysInMonth(s.getFullYear(), s.getMonth())), this._isInRange(e, s)
        },
        _isInRange: function (e, t) {
            var a = this._getMinMaxDate(e, "min"), i = this._getMinMaxDate(e, "max");
            return (!a || t.getTime() >= a.getTime()) && (!i || t.getTime() <= i.getTime())
        },
        _getFormatConfig: function (e) {
            var t = this._get(e, "shortYearCutoff");
            return t = "string" != typeof t ? t : (new Date).getFullYear() % 100 + parseInt(t, 10), {
                shortYearCutoff: t,
                dayNamesShort: this._get(e, "dayNamesShort"),
                dayNames: this._get(e, "dayNames"),
                monthNamesShort: this._get(e, "monthNamesShort"),
                monthNames: this._get(e, "monthNames")
            }
        },
        _formatDate: function (e, t, a, i) {
            t || (e.currentDay = e.selectedDay, e.currentMonth = e.selectedMonth, e.currentYear = e.selectedYear);
            var r = t ? "object" == typeof t ? t : this._daylightSavingAdjust(new Date(i, a, t)) : this._daylightSavingAdjust(new Date(e.currentYear, e.currentMonth, e.currentDay));
            return this.formatDate(this._get(e, "dateFormat"), r, this._getFormatConfig(e))
        }
    }), $.fn.datepicker = function (e) {
        if (!this.length)return this;
        $.datepicker.initialized || ($(document).mousedown($.datepicker._checkExternalClick).find("body").append($.datepicker.dpDiv), $.datepicker.initialized = !0);
        var t = Array.prototype.slice.call(arguments, 1);
        return "string" != typeof e || "isDisabled" != e && "getDate" != e && "widget" != e ? "option" == e && 2 == arguments.length && "string" == typeof arguments[1] ? $.datepicker["_" + e + "Datepicker"].apply($.datepicker, [this[0]].concat(t)) : this.each(function () {
            "string" == typeof e ? $.datepicker["_" + e + "Datepicker"].apply($.datepicker, [this].concat(t)) : $.datepicker._attachDatepicker(this, e)
        }) : $.datepicker["_" + e + "Datepicker"].apply($.datepicker, [this[0]].concat(t))
    }, $.datepicker = new Datepicker, $.datepicker.initialized = !1, $.datepicker.uuid = (new Date).getTime(), $.datepicker.version = "1.8.18", window["DP_jQuery_" + dpuuid] = $
}(jQuery);
$(function () {
    var e = $(".detail-video-placeholder");
    if (e.length > 0) {
        e.each(function (e) {
            var o = $(this), i = o.data("url"), t = o.data("poster"), a = '<video style="display:none" id="detail-video-' + e + '" class="video-js" controls preload="auto" width="630" poster="' + t + '">';
            if (i) {
                var s = i.split(";");
                $.each(s, function (e, o) {
                    var i = o.match(/\.([\w|\d]+)$/)[1];
                    a += '<source src="' + o + '" type="video/' + i + '">'
                })
            }
            a += "</video>", o.replaceWith(a)
        });
        var o = window.navigator.userAgent.toLowerCase();
        require(["css!video/dist/video-js.min.css", "css!video/video-custom-style.css", "video/dist/video", -1 !== o.indexOf("msie 8") ? "video/dist/ie8/videojs-ie8.min" : ""], function () {
            videojs.options.flash.swf = "http://static.qyer.com/static/lm/old/models/project/lmDedail/js/video/dist/video-js.swf", videojs.addLanguage("zh-CN", {
                Play: "播放",
                Pause: "暂停",
                "Current Time": "当前时间",
                "Duration Time": "时长",
                "Remaining Time": "剩余时间",
                "Stream Type": "媒体流类型",
                LIVE: "直播",
                Loaded: "加载完毕",
                Progress: "进度",
                Fullscreen: "全屏",
                "Non-Fullscreen": "退出全屏",
                Mute: "静音",
                Unmute: "取消静音",
                "Playback Rate": "播放码率",
                Subtitles: "字幕",
                "subtitles off": "字幕关闭",
                Captions: "内嵌字幕",
                "captions off": "内嵌字幕关闭",
                Chapters: "节目段落",
                "You aborted the media playback": "视频播放被终止",
                "A network error caused the media download to fail part-way.": "网络错误导致视频下载中途失败。",
                "The media could not be loaded, either because the server or network failed or because the format is not supported.": "视频因格式不支持或者服务器或网络的问题无法加载。",
                "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.": "由于视频文件损坏或是该视频使用了你的浏览器不支持的功能，播放终止。",
                "No compatible source was found for this media.": "无法找到此视频兼容的源。",
                "The media is encrypted and we do not have the keys to decrypt it.": "视频已加密，无法解密。"
            }), $(".video-js").each(function () {
                var e = this.id;
                videojs(e, {language: "zh-CN"}).ready(function () {
                    $("#" + e).show(), $("#" + e + " > video").show()
                })
            })
        })
    }
});
var QRCode;
!function () {
    function t(t) {
        this.mode = u.MODE_8BIT_BYTE, this.data = t, this.parsedData = [];
        for (var e = [], r = 0, o = this.data.length; o > r; r++) {
            var i = this.data.charCodeAt(r);
            i > 65536 ? (e[0] = 240 | (1835008 & i) >>> 18, e[1] = 128 | (258048 & i) >>> 12, e[2] = 128 | (4032 & i) >>> 6, e[3] = 128 | 63 & i) : i > 2048 ? (e[0] = 224 | (61440 & i) >>> 12, e[1] = 128 | (4032 & i) >>> 6, e[2] = 128 | 63 & i) : i > 128 ? (e[0] = 192 | (1984 & i) >>> 6, e[1] = 128 | 63 & i) : e[0] = i, this.parsedData = this.parsedData.concat(e)
        }
        this.parsedData.length != this.data.length && (this.parsedData.unshift(191), this.parsedData.unshift(187), this.parsedData.unshift(239))
    }

    function e(t, e) {
        this.typeNumber = t, this.errorCorrectLevel = e, this.modules = null, this.moduleCount = 0, this.dataCache = null, this.dataList = []
    }

    function r(t, e) {
        if (void 0 == t.length)throw new Error(t.length + "/" + e);
        for (var r = 0; r < t.length && 0 == t[r];)r++;
        this.num = new Array(t.length - r + e);
        for (var o = 0; o < t.length - r; o++)this.num[o] = t[o + r]
    }

    function o(t, e) {
        this.totalCount = t, this.dataCount = e
    }

    function i() {
        this.buffer = [], this.length = 0
    }

    function n() {
        return "undefined" != typeof CanvasRenderingContext2D
    }

    function a() {
        var t = !1, e = navigator.userAgent;
        return /android/i.test(e) && (t = !0, aMat = e.toString().match(/android ([0-9]\.[0-9])/i), aMat && aMat[1] && (t = parseFloat(aMat[1]))), t
    }

    function s(t, e) {
        for (var r = 1, o = h(t), i = 0, n = p.length; n >= i; i++) {
            var a = 0;
            switch (e) {
                case l.L:
                    a = p[i][0];
                    break;
                case l.M:
                    a = p[i][1];
                    break;
                case l.Q:
                    a = p[i][2];
                    break;
                case l.H:
                    a = p[i][3]
            }
            if (a >= o)break;
            r++
        }
        if (r > p.length)throw new Error("Too long data");
        return r
    }

    function h(t) {
        var e = encodeURI(t).toString().replace(/\%[0-9a-fA-F]{2}/g, "a");
        return e.length + (e.length != t ? 3 : 0)
    }

    t.prototype = {
        getLength: function () {
            return this.parsedData.length
        }, write: function (t) {
            for (var e = 0, r = this.parsedData.length; r > e; e++)t.put(this.parsedData[e], 8)
        }
    }, e.prototype = {
        addData: function (e) {
            var r = new t(e);
            this.dataList.push(r), this.dataCache = null
        }, isDark: function (t, e) {
            if (0 > t || this.moduleCount <= t || 0 > e || this.moduleCount <= e)throw new Error(t + "," + e);
            return this.modules[t][e]
        }, getModuleCount: function () {
            return this.moduleCount
        }, make: function () {
            this.makeImpl(!1, this.getBestMaskPattern())
        }, makeImpl: function (t, r) {
            this.moduleCount = 4 * this.typeNumber + 17, this.modules = new Array(this.moduleCount);
            for (var o = 0; o < this.moduleCount; o++) {
                this.modules[o] = new Array(this.moduleCount);
                for (var i = 0; i < this.moduleCount; i++)this.modules[o][i] = null
            }
            this.setupPositionProbePattern(0, 0), this.setupPositionProbePattern(this.moduleCount - 7, 0), this.setupPositionProbePattern(0, this.moduleCount - 7), this.setupPositionAdjustPattern(), this.setupTimingPattern(), this.setupTypeInfo(t, r), this.typeNumber >= 7 && this.setupTypeNumber(t), null == this.dataCache && (this.dataCache = e.createData(this.typeNumber, this.errorCorrectLevel, this.dataList)), this.mapData(this.dataCache, r)
        }, setupPositionProbePattern: function (t, e) {
            for (var r = -1; 7 >= r; r++)if (!(-1 >= t + r || this.moduleCount <= t + r))for (var o = -1; 7 >= o; o++)-1 >= e + o || this.moduleCount <= e + o || (this.modules[t + r][e + o] = r >= 0 && 6 >= r && (0 == o || 6 == o) || o >= 0 && 6 >= o && (0 == r || 6 == r) || r >= 2 && 4 >= r && o >= 2 && 4 >= o)
        }, getBestMaskPattern: function () {
            for (var t = 0, e = 0, r = 0; 8 > r; r++) {
                this.makeImpl(!0, r);
                var o = g.getLostPoint(this);
                (0 == r || t > o) && (t = o, e = r)
            }
            return e
        }, createMovieClip: function (t, e, r) {
            var o = t.createEmptyMovieClip(e, r), i = 1;
            this.make();
            for (var n = 0; n < this.modules.length; n++)for (var a = n * i, s = 0; s < this.modules[n].length; s++) {
                var h = s * i, u = this.modules[n][s];
                u && (o.beginFill(0, 100), o.moveTo(h, a), o.lineTo(h + i, a), o.lineTo(h + i, a + i), o.lineTo(h, a + i), o.endFill())
            }
            return o
        }, setupTimingPattern: function () {
            for (var t = 8; t < this.moduleCount - 8; t++)null == this.modules[t][6] && (this.modules[t][6] = 0 == t % 2);
            for (var e = 8; e < this.moduleCount - 8; e++)null == this.modules[6][e] && (this.modules[6][e] = 0 == e % 2)
        }, setupPositionAdjustPattern: function () {
            for (var t = g.getPatternPosition(this.typeNumber), e = 0; e < t.length; e++)for (var r = 0; r < t.length; r++) {
                var o = t[e], i = t[r];
                if (null == this.modules[o][i])for (var n = -2; 2 >= n; n++)for (var a = -2; 2 >= a; a++)this.modules[o + n][i + a] = -2 == n || 2 == n || -2 == a || 2 == a || 0 == n && 0 == a
            }
        }, setupTypeNumber: function (t) {
            for (var e = g.getBCHTypeNumber(this.typeNumber), r = 0; 18 > r; r++) {
                var o = !t && 1 == (1 & e >> r);
                this.modules[Math.floor(r / 3)][r % 3 + this.moduleCount - 8 - 3] = o
            }
            for (var r = 0; 18 > r; r++) {
                var o = !t && 1 == (1 & e >> r);
                this.modules[r % 3 + this.moduleCount - 8 - 3][Math.floor(r / 3)] = o
            }
        }, setupTypeInfo: function (t, e) {
            for (var r = this.errorCorrectLevel << 3 | e, o = g.getBCHTypeInfo(r), i = 0; 15 > i; i++) {
                var n = !t && 1 == (1 & o >> i);
                6 > i ? this.modules[i][8] = n : 8 > i ? this.modules[i + 1][8] = n : this.modules[this.moduleCount - 15 + i][8] = n
            }
            for (var i = 0; 15 > i; i++) {
                var n = !t && 1 == (1 & o >> i);
                8 > i ? this.modules[8][this.moduleCount - i - 1] = n : 9 > i ? this.modules[8][15 - i - 1 + 1] = n : this.modules[8][15 - i - 1] = n
            }
            this.modules[this.moduleCount - 8][8] = !t
        }, mapData: function (t, e) {
            for (var r = -1, o = this.moduleCount - 1, i = 7, n = 0, a = this.moduleCount - 1; a > 0; a -= 2)for (6 == a && a--; ;) {
                for (var s = 0; 2 > s; s++)if (null == this.modules[o][a - s]) {
                    var h = !1;
                    n < t.length && (h = 1 == (1 & t[n] >>> i));
                    var u = g.getMask(e, o, a - s);
                    u && (h = !h), this.modules[o][a - s] = h, i--, -1 == i && (n++, i = 7)
                }
                if (o += r, 0 > o || this.moduleCount <= o) {
                    o -= r, r = -r;
                    break
                }
            }
        }
    }, e.PAD0 = 236, e.PAD1 = 17, e.createData = function (t, r, n) {
        for (var a = o.getRSBlocks(t, r), s = new i, h = 0; h < n.length; h++) {
            var u = n[h];
            s.put(u.mode, 4), s.put(u.getLength(), g.getLengthInBits(u.mode, t)), u.write(s)
        }
        for (var l = 0, h = 0; h < a.length; h++)l += a[h].dataCount;
        if (s.getLengthInBits() > 8 * l)throw new Error("code length overflow. (" + s.getLengthInBits() + ">" + 8 * l + ")");
        for (s.getLengthInBits() + 4 <= 8 * l && s.put(0, 4); 0 != s.getLengthInBits() % 8;)s.putBit(!1);
        for (; !(s.getLengthInBits() >= 8 * l) && (s.put(e.PAD0, 8), !(s.getLengthInBits() >= 8 * l));)s.put(e.PAD1, 8);
        return e.createBytes(s, a)
    }, e.createBytes = function (t, e) {
        for (var o = 0, i = 0, n = 0, a = new Array(e.length), s = new Array(e.length), h = 0; h < e.length; h++) {
            var u = e[h].dataCount, l = e[h].totalCount - u;
            i = Math.max(i, u), n = Math.max(n, l), a[h] = new Array(u);
            for (var f = 0; f < a[h].length; f++)a[h][f] = 255 & t.buffer[f + o];
            o += u;
            var d = g.getErrorCorrectPolynomial(l), c = new r(a[h], d.getLength() - 1), p = c.mod(d);
            s[h] = new Array(d.getLength() - 1);
            for (var f = 0; f < s[h].length; f++) {
                var m = f + p.getLength() - s[h].length;
                s[h][f] = m >= 0 ? p.get(m) : 0
            }
        }
        for (var v = 0, f = 0; f < e.length; f++)v += e[f].totalCount;
        for (var _ = new Array(v), C = 0, f = 0; i > f; f++)for (var h = 0; h < e.length; h++)f < a[h].length && (_[C++] = a[h][f]);
        for (var f = 0; n > f; f++)for (var h = 0; h < e.length; h++)f < s[h].length && (_[C++] = s[h][f]);
        return _
    };
    for (var u = {MODE_NUMBER: 1, MODE_ALPHA_NUM: 2, MODE_8BIT_BYTE: 4, MODE_KANJI: 8}, l = {
        L: 1,
        M: 0,
        Q: 3,
        H: 2
    }, f = {
        PATTERN000: 0,
        PATTERN001: 1,
        PATTERN010: 2,
        PATTERN011: 3,
        PATTERN100: 4,
        PATTERN101: 5,
        PATTERN110: 6,
        PATTERN111: 7
    }, g = {
        PATTERN_POSITION_TABLE: [[], [6, 18], [6, 22], [6, 26], [6, 30], [6, 34], [6, 22, 38], [6, 24, 42], [6, 26, 46], [6, 28, 50], [6, 30, 54], [6, 32, 58], [6, 34, 62], [6, 26, 46, 66], [6, 26, 48, 70], [6, 26, 50, 74], [6, 30, 54, 78], [6, 30, 56, 82], [6, 30, 58, 86], [6, 34, 62, 90], [6, 28, 50, 72, 94], [6, 26, 50, 74, 98], [6, 30, 54, 78, 102], [6, 28, 54, 80, 106], [6, 32, 58, 84, 110], [6, 30, 58, 86, 114], [6, 34, 62, 90, 118], [6, 26, 50, 74, 98, 122], [6, 30, 54, 78, 102, 126], [6, 26, 52, 78, 104, 130], [6, 30, 56, 82, 108, 134], [6, 34, 60, 86, 112, 138], [6, 30, 58, 86, 114, 142], [6, 34, 62, 90, 118, 146], [6, 30, 54, 78, 102, 126, 150], [6, 24, 50, 76, 102, 128, 154], [6, 28, 54, 80, 106, 132, 158], [6, 32, 58, 84, 110, 136, 162], [6, 26, 54, 82, 110, 138, 166], [6, 30, 58, 86, 114, 142, 170]],
        G15: 1335,
        G18: 7973,
        G15_MASK: 21522,
        getBCHTypeInfo: function (t) {
            for (var e = t << 10; g.getBCHDigit(e) - g.getBCHDigit(g.G15) >= 0;)e ^= g.G15 << g.getBCHDigit(e) - g.getBCHDigit(g.G15);
            return (t << 10 | e) ^ g.G15_MASK
        },
        getBCHTypeNumber: function (t) {
            for (var e = t << 12; g.getBCHDigit(e) - g.getBCHDigit(g.G18) >= 0;)e ^= g.G18 << g.getBCHDigit(e) - g.getBCHDigit(g.G18);
            return t << 12 | e
        },
        getBCHDigit: function (t) {
            for (var e = 0; 0 != t;)e++, t >>>= 1;
            return e
        },
        getPatternPosition: function (t) {
            return g.PATTERN_POSITION_TABLE[t - 1]
        },
        getMask: function (t, e, r) {
            switch (t) {
                case f.PATTERN000:
                    return 0 == (e + r) % 2;
                case f.PATTERN001:
                    return 0 == e % 2;
                case f.PATTERN010:
                    return 0 == r % 3;
                case f.PATTERN011:
                    return 0 == (e + r) % 3;
                case f.PATTERN100:
                    return 0 == (Math.floor(e / 2) + Math.floor(r / 3)) % 2;
                case f.PATTERN101:
                    return 0 == e * r % 2 + e * r % 3;
                case f.PATTERN110:
                    return 0 == (e * r % 2 + e * r % 3) % 2;
                case f.PATTERN111:
                    return 0 == (e * r % 3 + (e + r) % 2) % 2;
                default:
                    throw new Error("bad maskPattern:" + t)
            }
        },
        getErrorCorrectPolynomial: function (t) {
            for (var e = new r([1], 0), o = 0; t > o; o++)e = e.multiply(new r([1, d.gexp(o)], 0));
            return e
        },
        getLengthInBits: function (t, e) {
            if (e >= 1 && 10 > e)switch (t) {
                case u.MODE_NUMBER:
                    return 10;
                case u.MODE_ALPHA_NUM:
                    return 9;
                case u.MODE_8BIT_BYTE:
                    return 8;
                case u.MODE_KANJI:
                    return 8;
                default:
                    throw new Error("mode:" + t)
            } else if (27 > e)switch (t) {
                case u.MODE_NUMBER:
                    return 12;
                case u.MODE_ALPHA_NUM:
                    return 11;
                case u.MODE_8BIT_BYTE:
                    return 16;
                case u.MODE_KANJI:
                    return 10;
                default:
                    throw new Error("mode:" + t)
            } else {
                if (!(41 > e))throw new Error("type:" + e);
                switch (t) {
                    case u.MODE_NUMBER:
                        return 14;
                    case u.MODE_ALPHA_NUM:
                        return 13;
                    case u.MODE_8BIT_BYTE:
                        return 16;
                    case u.MODE_KANJI:
                        return 12;
                    default:
                        throw new Error("mode:" + t)
                }
            }
        },
        getLostPoint: function (t) {
            for (var e = t.getModuleCount(), r = 0, o = 0; e > o; o++)for (var i = 0; e > i; i++) {
                for (var n = 0, a = t.isDark(o, i), s = -1; 1 >= s; s++)if (!(0 > o + s || o + s >= e))for (var h = -1; 1 >= h; h++)0 > i + h || i + h >= e || (0 != s || 0 != h) && a == t.isDark(o + s, i + h) && n++;
                n > 5 && (r += 3 + n - 5)
            }
            for (var o = 0; e - 1 > o; o++)for (var i = 0; e - 1 > i; i++) {
                var u = 0;
                t.isDark(o, i) && u++, t.isDark(o + 1, i) && u++, t.isDark(o, i + 1) && u++, t.isDark(o + 1, i + 1) && u++, (0 == u || 4 == u) && (r += 3)
            }
            for (var o = 0; e > o; o++)for (var i = 0; e - 6 > i; i++)t.isDark(o, i) && !t.isDark(o, i + 1) && t.isDark(o, i + 2) && t.isDark(o, i + 3) && t.isDark(o, i + 4) && !t.isDark(o, i + 5) && t.isDark(o, i + 6) && (r += 40);
            for (var i = 0; e > i; i++)for (var o = 0; e - 6 > o; o++)t.isDark(o, i) && !t.isDark(o + 1, i) && t.isDark(o + 2, i) && t.isDark(o + 3, i) && t.isDark(o + 4, i) && !t.isDark(o + 5, i) && t.isDark(o + 6, i) && (r += 40);
            for (var l = 0, i = 0; e > i; i++)for (var o = 0; e > o; o++)t.isDark(o, i) && l++;
            var f = Math.abs(100 * l / e / e - 50) / 5;
            return r += 10 * f
        }
    }, d = {
        glog: function (t) {
            if (1 > t)throw new Error("glog(" + t + ")");
            return d.LOG_TABLE[t]
        }, gexp: function (t) {
            for (; 0 > t;)t += 255;
            for (; t >= 256;)t -= 255;
            return d.EXP_TABLE[t]
        }, EXP_TABLE: new Array(256), LOG_TABLE: new Array(256)
    }, c = 0; 8 > c; c++)d.EXP_TABLE[c] = 1 << c;
    for (var c = 8; 256 > c; c++)d.EXP_TABLE[c] = d.EXP_TABLE[c - 4] ^ d.EXP_TABLE[c - 5] ^ d.EXP_TABLE[c - 6] ^ d.EXP_TABLE[c - 8];
    for (var c = 0; 255 > c; c++)d.LOG_TABLE[d.EXP_TABLE[c]] = c;
    r.prototype = {
        get: function (t) {
            return this.num[t]
        }, getLength: function () {
            return this.num.length
        }, multiply: function (t) {
            for (var e = new Array(this.getLength() + t.getLength() - 1), o = 0; o < this.getLength(); o++)for (var i = 0; i < t.getLength(); i++)e[o + i] ^= d.gexp(d.glog(this.get(o)) + d.glog(t.get(i)));
            return new r(e, 0)
        }, mod: function (t) {
            if (this.getLength() - t.getLength() < 0)return this;
            for (var e = d.glog(this.get(0)) - d.glog(t.get(0)), o = new Array(this.getLength()), i = 0; i < this.getLength(); i++)o[i] = this.get(i);
            for (var i = 0; i < t.getLength(); i++)o[i] ^= d.gexp(d.glog(t.get(i)) + e);
            return new r(o, 0).mod(t)
        }
    }, o.RS_BLOCK_TABLE = [[1, 26, 19], [1, 26, 16], [1, 26, 13], [1, 26, 9], [1, 44, 34], [1, 44, 28], [1, 44, 22], [1, 44, 16], [1, 70, 55], [1, 70, 44], [2, 35, 17], [2, 35, 13], [1, 100, 80], [2, 50, 32], [2, 50, 24], [4, 25, 9], [1, 134, 108], [2, 67, 43], [2, 33, 15, 2, 34, 16], [2, 33, 11, 2, 34, 12], [2, 86, 68], [4, 43, 27], [4, 43, 19], [4, 43, 15], [2, 98, 78], [4, 49, 31], [2, 32, 14, 4, 33, 15], [4, 39, 13, 1, 40, 14], [2, 121, 97], [2, 60, 38, 2, 61, 39], [4, 40, 18, 2, 41, 19], [4, 40, 14, 2, 41, 15], [2, 146, 116], [3, 58, 36, 2, 59, 37], [4, 36, 16, 4, 37, 17], [4, 36, 12, 4, 37, 13], [2, 86, 68, 2, 87, 69], [4, 69, 43, 1, 70, 44], [6, 43, 19, 2, 44, 20], [6, 43, 15, 2, 44, 16], [4, 101, 81], [1, 80, 50, 4, 81, 51], [4, 50, 22, 4, 51, 23], [3, 36, 12, 8, 37, 13], [2, 116, 92, 2, 117, 93], [6, 58, 36, 2, 59, 37], [4, 46, 20, 6, 47, 21], [7, 42, 14, 4, 43, 15], [4, 133, 107], [8, 59, 37, 1, 60, 38], [8, 44, 20, 4, 45, 21], [12, 33, 11, 4, 34, 12], [3, 145, 115, 1, 146, 116], [4, 64, 40, 5, 65, 41], [11, 36, 16, 5, 37, 17], [11, 36, 12, 5, 37, 13], [5, 109, 87, 1, 110, 88], [5, 65, 41, 5, 66, 42], [5, 54, 24, 7, 55, 25], [11, 36, 12], [5, 122, 98, 1, 123, 99], [7, 73, 45, 3, 74, 46], [15, 43, 19, 2, 44, 20], [3, 45, 15, 13, 46, 16], [1, 135, 107, 5, 136, 108], [10, 74, 46, 1, 75, 47], [1, 50, 22, 15, 51, 23], [2, 42, 14, 17, 43, 15], [5, 150, 120, 1, 151, 121], [9, 69, 43, 4, 70, 44], [17, 50, 22, 1, 51, 23], [2, 42, 14, 19, 43, 15], [3, 141, 113, 4, 142, 114], [3, 70, 44, 11, 71, 45], [17, 47, 21, 4, 48, 22], [9, 39, 13, 16, 40, 14], [3, 135, 107, 5, 136, 108], [3, 67, 41, 13, 68, 42], [15, 54, 24, 5, 55, 25], [15, 43, 15, 10, 44, 16], [4, 144, 116, 4, 145, 117], [17, 68, 42], [17, 50, 22, 6, 51, 23], [19, 46, 16, 6, 47, 17], [2, 139, 111, 7, 140, 112], [17, 74, 46], [7, 54, 24, 16, 55, 25], [34, 37, 13], [4, 151, 121, 5, 152, 122], [4, 75, 47, 14, 76, 48], [11, 54, 24, 14, 55, 25], [16, 45, 15, 14, 46, 16], [6, 147, 117, 4, 148, 118], [6, 73, 45, 14, 74, 46], [11, 54, 24, 16, 55, 25], [30, 46, 16, 2, 47, 17], [8, 132, 106, 4, 133, 107], [8, 75, 47, 13, 76, 48], [7, 54, 24, 22, 55, 25], [22, 45, 15, 13, 46, 16], [10, 142, 114, 2, 143, 115], [19, 74, 46, 4, 75, 47], [28, 50, 22, 6, 51, 23], [33, 46, 16, 4, 47, 17], [8, 152, 122, 4, 153, 123], [22, 73, 45, 3, 74, 46], [8, 53, 23, 26, 54, 24], [12, 45, 15, 28, 46, 16], [3, 147, 117, 10, 148, 118], [3, 73, 45, 23, 74, 46], [4, 54, 24, 31, 55, 25], [11, 45, 15, 31, 46, 16], [7, 146, 116, 7, 147, 117], [21, 73, 45, 7, 74, 46], [1, 53, 23, 37, 54, 24], [19, 45, 15, 26, 46, 16], [5, 145, 115, 10, 146, 116], [19, 75, 47, 10, 76, 48], [15, 54, 24, 25, 55, 25], [23, 45, 15, 25, 46, 16], [13, 145, 115, 3, 146, 116], [2, 74, 46, 29, 75, 47], [42, 54, 24, 1, 55, 25], [23, 45, 15, 28, 46, 16], [17, 145, 115], [10, 74, 46, 23, 75, 47], [10, 54, 24, 35, 55, 25], [19, 45, 15, 35, 46, 16], [17, 145, 115, 1, 146, 116], [14, 74, 46, 21, 75, 47], [29, 54, 24, 19, 55, 25], [11, 45, 15, 46, 46, 16], [13, 145, 115, 6, 146, 116], [14, 74, 46, 23, 75, 47], [44, 54, 24, 7, 55, 25], [59, 46, 16, 1, 47, 17], [12, 151, 121, 7, 152, 122], [12, 75, 47, 26, 76, 48], [39, 54, 24, 14, 55, 25], [22, 45, 15, 41, 46, 16], [6, 151, 121, 14, 152, 122], [6, 75, 47, 34, 76, 48], [46, 54, 24, 10, 55, 25], [2, 45, 15, 64, 46, 16], [17, 152, 122, 4, 153, 123], [29, 74, 46, 14, 75, 47], [49, 54, 24, 10, 55, 25], [24, 45, 15, 46, 46, 16], [4, 152, 122, 18, 153, 123], [13, 74, 46, 32, 75, 47], [48, 54, 24, 14, 55, 25], [42, 45, 15, 32, 46, 16], [20, 147, 117, 4, 148, 118], [40, 75, 47, 7, 76, 48], [43, 54, 24, 22, 55, 25], [10, 45, 15, 67, 46, 16], [19, 148, 118, 6, 149, 119], [18, 75, 47, 31, 76, 48], [34, 54, 24, 34, 55, 25], [20, 45, 15, 61, 46, 16]], o.getRSBlocks = function (t, e) {
        var r = o.getRsBlockTable(t, e);
        if (void 0 == r)throw new Error("bad rs block @ typeNumber:" + t + "/errorCorrectLevel:" + e);
        for (var i = r.length / 3, n = [], a = 0; i > a; a++)for (var s = r[3 * a + 0], h = r[3 * a + 1], u = r[3 * a + 2], l = 0; s > l; l++)n.push(new o(h, u));
        return n
    }, o.getRsBlockTable = function (t, e) {
        switch (e) {
            case l.L:
                return o.RS_BLOCK_TABLE[4 * (t - 1) + 0];
            case l.M:
                return o.RS_BLOCK_TABLE[4 * (t - 1) + 1];
            case l.Q:
                return o.RS_BLOCK_TABLE[4 * (t - 1) + 2];
            case l.H:
                return o.RS_BLOCK_TABLE[4 * (t - 1) + 3];
            default:
                return
        }
    }, i.prototype = {
        get: function (t) {
            var e = Math.floor(t / 8);
            return 1 == (1 & this.buffer[e] >>> 7 - t % 8)
        }, put: function (t, e) {
            for (var r = 0; e > r; r++)this.putBit(1 == (1 & t >>> e - r - 1))
        }, getLengthInBits: function () {
            return this.length
        }, putBit: function (t) {
            var e = Math.floor(this.length / 8);
            this.buffer.length <= e && this.buffer.push(0), t && (this.buffer[e] |= 128 >>> this.length % 8), this.length++
        }
    };
    var p = [[17, 14, 11, 7], [32, 26, 20, 14], [53, 42, 32, 24], [78, 62, 46, 34], [106, 84, 60, 44], [134, 106, 74, 58], [154, 122, 86, 64], [192, 152, 108, 84], [230, 180, 130, 98], [271, 213, 151, 119], [321, 251, 177, 137], [367, 287, 203, 155], [425, 331, 241, 177], [458, 362, 258, 194], [520, 412, 292, 220], [586, 450, 322, 250], [644, 504, 364, 280], [718, 560, 394, 310], [792, 624, 442, 338], [858, 666, 482, 382], [929, 711, 509, 403], [1003, 779, 565, 439], [1091, 857, 611, 461], [1171, 911, 661, 511], [1273, 997, 715, 535], [1367, 1059, 751, 593], [1465, 1125, 805, 625], [1528, 1190, 868, 658], [1628, 1264, 908, 698], [1732, 1370, 982, 742], [1840, 1452, 1030, 790], [1952, 1538, 1112, 842], [2068, 1628, 1168, 898], [2188, 1722, 1228, 958], [2303, 1809, 1283, 983], [2431, 1911, 1351, 1051], [2563, 1989, 1423, 1093], [2699, 2099, 1499, 1139], [2809, 2213, 1579, 1219], [2953, 2331, 1663, 1273]], m = function () {
        var t = function (t, e) {
            this._el = t, this._htOption = e
        };
        return t.prototype.draw = function (t) {
            function e(t, e) {
                var r = document.createElementNS("http://www.w3.org/2000/svg", t);
                for (var o in e)e.hasOwnProperty(o) && r.setAttribute(o, e[o]);
                return r
            }

            var r = this._htOption, o = this._el, i = t.getModuleCount();
            Math.floor(r.width / i), Math.floor(r.height / i), this.clear();
            var n = e("svg", {
                viewBox: "0 0 " + String(i) + " " + String(i),
                width: "100%",
                height: "100%",
                fill: r.colorLight
            });
            n.setAttributeNS("http://www.w3.org/2000/xmlns/", "xmlns:xlink", "http://www.w3.org/1999/xlink"), o.appendChild(n), n.appendChild(e("rect", {
                fill: r.colorDark,
                width: "1",
                height: "1",
                id: "template"
            }));
            for (var a = 0; i > a; a++)for (var s = 0; i > s; s++)if (t.isDark(a, s)) {
                var h = e("use", {x: String(a), y: String(s)});
                h.setAttributeNS("http://www.w3.org/1999/xlink", "href", "#template"), n.appendChild(h)
            }
        }, t.prototype.clear = function () {
            for (; this._el.hasChildNodes();)this._el.removeChild(this._el.lastChild)
        }, t
    }(), v = "svg" === document.documentElement.tagName.toLowerCase(), _ = v ? m : n() ? function () {
        function t() {
            this._elImage.src = this._elCanvas.toDataURL("image/png"), this._elImage.style.display = "block", this._elCanvas.style.display = "none"
        }

        function e(t, e) {
            var r = this;
            if (r._fFail = e, r._fSuccess = t, null === r._bSupportDataURI) {
                var o = document.createElement("img"), i = function () {
                    r._bSupportDataURI = !1, r._fFail && _fFail.call(r)
                }, n = function () {
                    r._bSupportDataURI = !0, r._fSuccess && r._fSuccess.call(r)
                };
                return o.onabort = i, o.onerror = i, o.onload = n, void(o.src = "data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==")
            }
            r._bSupportDataURI === !0 && r._fSuccess ? r._fSuccess.call(r) : r._bSupportDataURI === !1 && r._fFail && r._fFail.call(r)
        }

        if (this._android && this._android <= 2.1) {
            var r = 1 / window.devicePixelRatio, o = CanvasRenderingContext2D.prototype.drawImage;
            CanvasRenderingContext2D.prototype.drawImage = function (t, e, i, n, a, s, h, u) {
                if ("nodeName" in t && /img/i.test(t.nodeName))for (var l = arguments.length - 1; l >= 1; l--)arguments[l] = arguments[l] * r; else"undefined" == typeof u && (arguments[1] *= r, arguments[2] *= r, arguments[3] *= r, arguments[4] *= r);
                o.apply(this, arguments)
            }
        }
        var i = function (t, e) {
            this._bIsPainted = !1, this._android = a(), this._htOption = e, this._elCanvas = document.createElement("canvas"), this._elCanvas.width = e.width, this._elCanvas.height = e.height, t.appendChild(this._elCanvas), this._el = t, this._oContext = this._elCanvas.getContext("2d"), this._bIsPainted = !1, this._elImage = document.createElement("img"), this._elImage.style.display = "none", this._el.appendChild(this._elImage), this._bSupportDataURI = null
        };
        return i.prototype.draw = function (t) {
            var e = this._elImage, r = this._oContext, o = this._htOption, i = t.getModuleCount(), n = o.width / i, a = o.height / i, s = Math.round(n), h = Math.round(a);
            e.style.display = "none", this.clear();
            for (var u = 0; i > u; u++)for (var l = 0; i > l; l++) {
                var f = t.isDark(u, l), g = l * n, d = u * a;
                r.strokeStyle = f ? o.colorDark : o.colorLight, r.lineWidth = 1, r.fillStyle = f ? o.colorDark : o.colorLight, r.fillRect(g, d, n, a), r.strokeRect(Math.floor(g) + .5, Math.floor(d) + .5, s, h), r.strokeRect(Math.ceil(g) - .5, Math.ceil(d) - .5, s, h)
            }
            this._bIsPainted = !0
        }, i.prototype.makeImage = function () {
            this._bIsPainted && e.call(this, t)
        }, i.prototype.isPainted = function () {
            return this._bIsPainted
        }, i.prototype.clear = function () {
            this._oContext.clearRect(0, 0, this._elCanvas.width, this._elCanvas.height), this._bIsPainted = !1
        }, i.prototype.round = function (t) {
            return t ? Math.floor(1e3 * t) / 1e3 : t
        }, i
    }() : function () {
        var t = function (t, e) {
            this._el = t, this._htOption = e
        };
        return t.prototype.draw = function (t) {
            for (var e = this._htOption, r = this._el, o = t.getModuleCount(), i = Math.floor(e.width / o), n = Math.floor(e.height / o), a = ['<table style="border:0;border-collapse:collapse;">'], s = 0; o > s; s++) {
                a.push("<tr>");
                for (var h = 0; o > h; h++)a.push('<td style="border:0;border-collapse:collapse;padding:0;margin:0;width:' + i + "px;height:" + n + "px;background-color:" + (t.isDark(s, h) ? e.colorDark : e.colorLight) + ';"></td>');
                a.push("</tr>")
            }
            a.push("</table>"), r.innerHTML = a.join("");
            var u = r.childNodes[0], l = (e.width - u.offsetWidth) / 2, f = (e.height - u.offsetHeight) / 2;
            l > 0 && f > 0 && (u.style.margin = f + "px " + l + "px")
        }, t.prototype.clear = function () {
            this._el.innerHTML = ""
        }, t
    }();
    QRCode = function (t, e) {
        if (this._htOption = {
                width: 256,
                height: 256,
                typeNumber: 4,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: l.H
            }, "string" == typeof e && (e = {text: e}), e)for (var r in e)this._htOption[r] = e[r];
        "string" == typeof t && (t = document.getElementById(t)), this._android = a(), this._el = t, this._oQRCode = null, this._oDrawing = new _(this._el, this._htOption), this._htOption.text && this.makeCode(this._htOption.text)
    }, QRCode.prototype.makeCode = function (t) {
        this._oQRCode = new e(s(t, this._htOption.correctLevel), this._htOption.correctLevel), this._oQRCode.addData(t), this._oQRCode.make(), this._el.title = t, this._oDrawing.draw(this._oQRCode), this.makeImage()
    }, QRCode.prototype.makeImage = function () {
        "function" == typeof this._oDrawing.makeImage && (!this._android || this._android >= 3) && this._oDrawing.makeImage()
    }, QRCode.prototype.clear = function () {
        this._oDrawing.clear()
    }, QRCode.CorrectLevel = l
}();