define(function () {
    "use strict";
    function t(t) {
    }

    return t.prototype = {
        _option: {}, init: function (t) {
            throw new Error("You must override the init method")
        }, destroy: function () {
            throw new Error("You must override the destructor method")
        }, setConfig: function (t) {
            throw new Error("You must override the config method")
        }
    }, t
});