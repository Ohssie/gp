/* global $ */
/* global tinycolor */
$(document).ready(function(e)
{
    //App.dashboard();
    
    function a() {
        $('[data-toggle="counter"]').each(function(a, b) {
            var c = $(this),
                d = "",
                e = "",
                f = 0,
                g = 0,
                h = 0,
                i = 2.5;
            c.data("prefix") && (d = c.data("prefix")), c.data("suffix") && (e = c.data("suffix")), c.data("start") && (f = c.data("start")), c.data("end") && (g = c.data("end")), c.data("decimals") && (h = c.data("decimals")), c.data("duration") && (i = c.data("duration"));
            var j = new CountUp(c.get(0), f, g, h, i, {
                suffix: e,
                prefix: d
            });
            j.start()
        })
    }

    function b() {
        $(".toggle-loading").on("click", function() {
            var a = $(this).parents(".widget, .panel");
            a.length && (a.addClass("be-loading-active"), setTimeout(function() {
                a.removeClass("be-loading-active")
            }, 3e3))
        })
    }

    function c() {
        var a = App.color.primary,
            b = App.color.warning,
            c = App.color.success,
            d = App.color.danger;
        $("#spark1").sparkline([0, 5, 3, 7, 5, 10, 3, 6, 5, 10], {
            width: "85",
            height: "35",
            lineColor: a,
            highlightSpotColor: a,
            highlightLineColor: a,
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.15
        }), $("#spark2").sparkline([5, 8, 7, 10, 9, 10, 8, 6, 4, 6, 8, 7, 6, 8], {
            type: "bar",
            width: "85",
            height: "35",
            barWidth: 3,
            barSpacing: 3,
            chartRangeMin: 0,
            barColor: b
        }), $("#spark3").sparkline([2, 3, 4, 5, 4, 3, 2, 3, 4, 5, 6, 5, 4, 3, 4, 5, 6, 5, 4, 4, 5], {
            type: "discrete",
            width: "85",
            height: "35",
            lineHeight: 20,
            lineColor: c,
            xwidth: 18
        }), $("#spark4").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
            width: "85",
            height: "35",
            lineColor: d,
            highlightSpotColor: d,
            highlightLineColor: d,
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.15
        })
    }

    function d() {
        var a = App.color.primary,
            b = tinycolor(App.color.primary).lighten(13).toString(),
            c = tinycolor(App.color.primary).lighten(20).toString(),
            d = [
                [1, 35],
                [2, 60],
                [3, 40],
                [4, 65],
                [5, 45],
                [6, 75],
                [7, 35],
                [8, 40],
                [9, 60]
            ],
            e = [
                [1, 20],
                [2, 40],
                [3, 25],
                [4, 45],
                [5, 25],
                [6, 50],
                [7, 35],
                [8, 60],
                [9, 30]
            ],
            f = [
                [1, 35],
                [2, 15],
                [3, 20],
                [4, 30],
                [5, 15],
                [6, 18],
                [7, 28],
                [8, 10],
                [9, 30]
            ];
    }

    function e() {
        var a = [{
                label: "Services",
                data: 33
            }, {
                label: "Standard Plans",
                data: 33
            }, {
                label: "Services",
                data: 33
            }],
            b = App.color.success,
            c = App.color.warning,
            d = App.color.primary;
        $.plot("#top-sales", a, {
            series: {
                pie: {
                    radius: .75,
                    innerRadius: .58,
                    show: !0,
                    highlight: {
                        opacity: .1
                    },
                    label: {
                        show: !1
                    }
                }
            },
            grid: {
                hoverable: !0
            },
            legend: {
                show: !1
            },
            colors: [b, c, d]
        }), $('[data-color="top-sales-color1"]').css({
            "background-color": b
        }), $('[data-color="top-sales-color2"]').css({
            "background-color": c
        }), $('[data-color="top-sales-color3"]').css({
            "background-color": d
        })
    }

    function f() {
        function a(a) {
            var b = a.dpDiv,
                c = $("tbody tr", b).length;
            6 == c ? b.addClass("ui-datepicker-6rows") : b.removeClass("ui-datepicker-6rows")
        }
        var b = $("#calendar-widget"),
            c = new Date,
            d = c.getFullYear(),
            e = c.getMonth(),
            f = [d + "-" + (e + 1) + "-16", d + "-" + (e + 1) + "-20"];
        $.extend($.datepicker, {
            _updateDatepicker_original: $.datepicker._updateDatepicker,
            _updateDatepicker: function(a) {
                this._updateDatepicker_original(a);
                var b = this._get(a, "afterShow");
                b && b.apply(a, [a])
            }
        }), "undefined" != typeof jQuery.ui && b.datepicker({
            showOtherMonths: !0,
            selectOtherMonths: !0,
            beforeShowDay: function(a) {
                var b = a.getMonth(),
                    c = a.getDate(),
                    d = a.getFullYear();
                return $.inArray(d + "-" + (b + 1) + "-" + c, f) != -1 ? [!0, "has-events", "This day has events!"] : [!0, "", ""]
            },
            afterShow: function(b) {
                a(b)
            }
        })
    }

    
    a(), b(), c()//, d(), e(), f()
            
    var  format = "%e-%b";
    
    $(".select2").select2({width:"100%"});
    function format_time(a,b)
    {
        a = a.split("/");
        var y = parseInt(a[2], 10), m = parseInt(a[1], 10), d = parseInt(a[0], 10);
        var formated = new Date(y, m -1, d).getTime();
        format = (b == "D" || b == "W") ? "%e, %b" : (b == "M") ? "%b-%y" : (b == "Y") ? "%Y" : "%d-%b";
        return formated;
    }
    var _colors = ["#4285f4", "#34a853", "#fbbc05", "#ea4335", "#262626"], colors = [], i = 1;
    $.getJSON("stats/plan_stats", function(json) {
        //succes - data loaded, now use plot:
        var data_arr = [];
        for(var key in json) {
            data_arr.push({
                data: json[key].map(function(arr) {
                    var _arr = arr[0].split(",");
                    return [format_time(_arr[0], _arr[1]), arr[1]];
                }),
                canvasRender: !0
            });
            var rand = (Math.floor(Math.random() * _colors.length) + 1) - 1, a = _colors[rand];
            a = (colors.indexOf(a) == -1) ? _colors[rand] : tinycolor(a).lighten(13).toString();
            colors.push(a);
            $("#sub-stats").append("<li><span data-color=\"main-chart-color" + i + "\"></span> " + key + "</li>");
            $('[data-color="main-chart-color' + i + '"]').css({"background-color": a });
            i++;
        }
        
        $("#main-chart").plot(data_arr
        , {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                shadowSize: 0,
                curvedLines: {
                    apply: !0,
                    active: !0,
                    monotonicFit: !0
                }
            },
            legend: {
                show: !1
            },
            grid: {
                show: !0,
                margin: {
                    top: 20,
                    bottom: 0,
                    left: 0,
                    right: 0
                },
                labelMargin: 0,
                minBorderMargin: 0,
                axisMargin: 0,
                tickColor: "rgba(0,0,0,0.05)",
                borderWidth: 0,
                hoverable: !0,
                clickable: !0
            },
            colors: colors,
            xaxis: {
                tickFormat: format,
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0,
                tickLength: 0,
                mode: "time"
            },
            yaxis: {
                tickFormatter: function() {
                    return "";
                },
                ticks: 4,
                tickDecimals: 0
            },
        });
    });
});