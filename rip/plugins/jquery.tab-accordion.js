
/*
* Pixor - Copyright (c) Federico Schiocchet - Pixor (www.pixor.it) - Framework Y (www.framework-y.com)
*/

(function ($) {

    $(document).ready(function () {

        $("body").on("click", ".tab-box .nav li", function (e) {
            var target = $(this).find("a").attr("href");
            if (target == "#") target = null;
            var p = $(this).closest(".tab-box");
            var anima = $(p).attr("data-tab-anima");
            $(p).find("> .panel, > .panel-box .panel").removeClass("active");
            $(p).find("> .nav li").removeClass("active");
            $(this).addClass("active");

            var t = $(p).find("> .panel:eq(" + $(this).index() + "), > .panel-box .panel:eq(" + $(this).index() + ")");
            if (!isEmpty(target)) t = $(p).find(target);

            $(t).addClass("active");
            if (!isEmpty(anima)) {
                $(t).css("opacity", 0);
                $(t).showAnima(anima);
            }
            if ($(this).closest(".mega-menu").length) return false;
            e.preventDefault();

        });


        $("header .mega-tabs").click(function () {
            $(this).find(".nav-tabs li:first-child").addClass("active");
        });



        $(".tab-box.left,.tab-box.right").each(function () {
            var t = $(this).find(".nav");
            var p = $(this).find(".panel-box");

            if ($(p).outerHeight() < $(t).outerHeight()) $(p).find(".panel").css("height", $(t).outerHeight() + "px");
            else $(t).css("height", $(p).find(".panel").outerHeight() + "px");
        });
        $(".nav.nav-justified-v").each(function () {
            var count_m = $(this).find("li").length;
            var a = $(this).find("li a");
            $(a).css("height", $(this).outerHeight() / count_m + "px");
            $(a).css("line-height", $(a).height() + "px")
        });

        $("*[data-height].collapse-box").each(function () {
            var t = $(this).find(".panel");
            $(t).css("height", $(this).attr("data-height") + "px");
            $(t).show();
        });

    });

    $('.collapse-box .collapse-button').toggleClick(function () {
        openCollapse(this);
    }, function() {
        closeCollapse(this);
    });
    function closeCollapse(obj) {
        var t = $(obj).closest(".collapse-box");
        var tp = $(t).find(".panel");
        var h = $(t).attr("data-height");
        if (!isEmpty(h)) $(tp).removeClass("no-gradient");
        var time = $(this).attr("data-time");
        if (isEmpty(time)) time = 500;

        $(tp).animate({
            height: (isEmpty(h)) ? 0 : h
        }, parseInt(time,10), function () {
            if (isEmpty(h)) {
                $(tp).css("display", "none");
                $(tp).css("height", "");
            }
        });
    }
    function openCollapse(obj) {
        var t = $(obj).closest(".collapse-box");
        var tp = $(t).find(".panel");
        var h = $(t).attr("data-height");
        var ah = $(obj).attr("data-height");

        $(tp).css("display", "block").css("height", "");
        var final_h = $(tp).height();
        $(tp).css("height", 0);

        if (!isEmpty(ah)) final_h = ah;

        var time = $(obj).attr("data-time");
        if (isEmpty(time)) time = 500;
        if (!isEmpty(h)) {
            $(tp).css("height", h + "px");
            $(tp).addClass("no-gradient");
        }
        $(tp).animate({
            height: final_h
        }, parseInt(time, 10));
    }

    $('.accordion-list .list-group-item > a').click(function () {
        var t = $(this).closest(".accordion-list");
        var it = $(this).closest(".list-group-item");
        var dt = $(t).attr("data-type");
        var time = $(t).attr("data-time");
        var he = $(t).attr("data-height");
        var act = $(t).find(".active-panel .panel");
        $(t).find(".list-group-item").removeClass("active-panel");

        if (isEmpty(dt)) dt = "";
        $($(t).find(".panel")).each(function () {
            $(this).clearQueue();
        });
        if ($(this).hasClass("active") || $(it).find(".panel").css("display") == "block") {
            $(this).removeClass("active");

            var tb = $(it).find(".panel");
            if (isEmpty(time)) time = 500;
            $(tb).animate({
                height: 0
            }, time, function () { $(tb).css("display", "none").css("height", ""); });
        } else {
            var d = 0;
            var a = $(t).find(".list-group-item > a");
            $(a).each(function () {
                if ($(this).hasClass("active")) d = 300;
            });
            $(a).removeClass("active");
            $(this).addClass("active");
            $(it).addClass("active-panel");

            if (dt == "visible") $($(it).find(".panel")).collapse({ milliseconds: time, height: he });
            else {
                $(act).animate({
                    height: 0
                }, d, function () {
                    $(act).css("display", "none").css("height", "");
                });
                if (dt == "accordion") {
                    $(it).find(".panel").collapse({ milliseconds: time, height: he });
                } else {
                    $(act).promise().done(function () {
                        $(it).find(".panel").collapse({ milliseconds: time, height: he });
                    });
                }
            }
        }
    });
    $.fn.collapse = function (attr) {
        var time = "";
        var height = "";
        if (!isEmpty(attr)) {
            time = attr["milliseconds"];
            height = attr["height"];
        }
        if (isEmpty(time)) time = 500;
        var t = this;
        $(t).css("display", "block");
        var h = $(t).height();
        $(t).css("height", "0px");
        if (!isEmpty(height)) h = height;

        $(t).animate({
            height: h
        }, parseInt(time, 10));
    };
}(jQuery));


