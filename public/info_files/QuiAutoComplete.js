define(["web_qui_controlbase", "css!web_qui_quiautocomplete"], function (t) {
    "use strict";
    function e(t) {
        this._option = {
            target: "",
            width: "",
            zindex: 999,
            exClassName: "",
            defalutHTML: "",
            dataSource: "",
            loadHTML: "",
            noresultHTML: "",
            template: '<li class="qui-autoComplete-item" data-value="{{$value.title}}">{{$value.title}}</li>',
            contentHTML: null,
            delay: 200,
            submitOnEnter: !0,
            onItemSelected: null,
            onIndexChanged: null,
            onLoaded: null,
            onKeyEnter: null,
            selectFirst: !1
        }, i.extend(!0, this._option, t), this.$input = null, this.$parent = null, this.$overlay = null, this.$defaultContent = null, this.$content = null, this.$list = null, this.$loading = null, this.$noresult = null, this._timer = void 0, this._index = -1, this._cacheData = {}, this.init(), this._render(), this._bindEvent()
    }

    var i = jQuery;
    return e.prototype = new t, e.prototype.constructor = e, i.extend(e.prototype, {
        init: function () {
            this.$input = i(this._option.target), this.$parent = i(this._option.parent)
        }, _render: function () {
            var t = "" === this._option.loadHTML ? "" : '<p class="qui-autoComplete-loading" style="display:none;">' + this._option.loadHTML + "</p>", e = "" === this._option.noresultHTML ? "" : '<p class="qui-autoComplete-noresult" style="display:none;">' + this._option.noresultHTML + "</p>", n = ['<div class="qui-autoComplete ' + this._option.exClassName + '" style="display:none; z-index:' + this._option.zindex + ';">', '	<div class="qui-autoComplete-defaultContent" style="display:none;"></div>', '	<div class="qui-autoComplete-content" style="display:none;">', '		<ul class="qui-autoComplete-list" style="display:none;">', "		</ul>", t, e, "	</div>", "</div>"].join(""), o = this.$parent.size() ? this.$parent : "body";
            this.$overlay = i(n).appendTo(o), this.$defaultContent = this.$overlay.find(".qui-autoComplete-defaultContent"), this.$content = this.$overlay.find(".qui-autoComplete-content"), this.$list = this.$overlay.find(".qui-autoComplete-list"), this.$loading = this.$overlay.find(".qui-autoComplete-loading"), this.$noresult = this.$overlay.find(".qui-autoComplete-noresult")
        }, _bindEvent: function () {
            var t = this;
            this.$input.on("focus", function (e) {
                t.show(), t.onInput()
            }).on("input paste propertychange", function (e) {
                window.clearTimeout(t._timer), t._timer = window.setTimeout(function () {
                    t.onInput()
                }, t._option.delay)
            }).on("keyup", function (e) {
                t.keyupChar(e)
            }).on("keydown", function (e) {
                ("38" == e.keyCode || "40" == e.keyCode) && e.preventDefault(), !t._option.submitOnEnter && "13" == e.keyCode && t._index >= 0 && e.preventDefault()
            }), this.$list.on("click", ".qui-autoComplete-item", function (e) {
                e.preventDefault(), t._onItemSelected(e)
            }), i(document).on("click.qui_autocomplete_click", function (e) {
                e.target !== t.$input[0] && t.hide()
            })
        }, _onItemSelected: function (t) {
            var e = t.currentTarget, n = i(e).data("value");
            "function" == typeof this._option.onItemSelected && this._option.onItemSelected(e), this.$input.val(n), this.hide(), this._index = -1
        }, setConfig: function () {
        }, show: function () {
            var t = this.$input.offset().left, e = this.$input.offset().top + this.$input.outerHeight(), i = this._option.width || this.$input.outerWidth();
            this.$overlay.show(), this.$parent.size() ? this.$overlay.css({width: i}) : this.$overlay.css({
                left: t,
                top: e,
                width: i
            })
        }, hide: function () {
            var t = this;
            t.$overlay.hide()
        }, onInput: function () {
            this._index = -1;
            var t = this._option.defalutHTML, e = jQuery.trim(this.$input.val());
            0 === e.length ? ("" !== t ? this.$defaultContent.html(t).show() : this.$defaultContent.hide(), this.$content.hide()) : (this.$defaultContent.hide(), this.$content.show(), this.doLoad())
        }, keyupChar: function (t) {
            var e = t.keyCode;
            38 == e ? this.changeIndex("-1") : 40 == e ? this.changeIndex("+1") : 13 == e && ("function" == typeof this._option.onKeyEnter && this._option.onKeyEnter(), -1 !== this._index && this.$list.find(".qui-autoComplete-item").eq(this._index).trigger("click"))
        }, doLoad: function () {
            this.$list.hide().empty(), this.$noresult.hide(), this.$loading.show(), this.doAjax()
        }, doAjax: function (t) {
            var e = this, n = this._option.dataSource, o = this.$input.attr("name"), s = jQuery.trim(this.$input.val()), l = {}, a = e._cacheData[s];
            return "undefined" != typeof e._cacheData[s] ? void e.loaded(a) : (l[o] = s, void i.getJSON(n, l, function (t) {
                e._cacheData[s] = t.data, e.loaded(t.data)
            }))
        }, loaded: function (t) {
            var e = "";
            this.$loading.hide(), t.keywords.length ? (e = "function" == typeof this._option.contentHTML ? this._option.contentHTML(t) : this.renderItem(t.keywords), this.$list.html(e).show()) : this.$noresult.show(), "function" == typeof this._option.onLoaded && this._option.onLoaded(t)
        }, renderItem: function (t) {
            for (var e, i = "", n = 0, o = t.length; o > n; n++)e = t[n], i += this._option.template.replace(/{{\$value.title}}/g, e.title).replace(/{{\$value.value}}/g, e.value);
            return i
        }, changeIndex: function (t) {
            var e = this.$list.find(".qui-autoComplete-item"), i = e.size() - 1, n = -1;
            if (!this.$overlay.is(":hidden")) {
                if ("-1" === t) {
                    if (this._index <= n)return;
                    this._index--
                } else if ("+1" === t) {
                    if (this._index >= i)return;
                    this._index++
                } else {
                    if (num = parseInt(t, 10), num === this._index)return;
                    this._index = t
                }
                "function" == typeof this._option.onIndexChanged && this._option.onIndexChanged(this._index, e[this._index]), this._index === n ? e.removeClass("qui-autoComplete-item-active") : e.eq(this._index).addClass("qui-autoComplete-item-active").siblings(".qui-autoComplete-item-active").removeClass("qui-autoComplete-item-active")
            }
        }, destroy: function () {
        }
    }), e
});