/* global $ */
$(document).ready(function(e)
{
    var months = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ], format = "%e-%b";
    
    $(".select2").select2({width:"100%"});
    var a=App.color.success;
    
    function format_time(a,b)
    {
        a = a.split("/");
        var y = parseInt(a[2]), m = parseInt(a[1]), d = parseInt(a[0]);
        var formated = new Date(y, m -1, d).getTime();
        format = (b == "D" || b == "W") ? "%e, %b" : (b == "M") ? "%b-%y" : (b == "Y") ? "%Y" : "%d-%b";
        return formated;
    }
    
    $.getJSON(base_url + "/stats/user-growth", function(json) {
       //succes - data loaded, now use plot:
           var plotarea = $("#line-chart3");
           var dataBar = json.dataBar.map(function(arr) {
               var _arr = arr[0].split(",")//, date_time = _arr[0].split("/");
               return [format_time(_arr[0], _arr[1]), arr[1]];
           });
            //console.log(dataBar);
            $.plot(plotarea , [
                    {
                        data: dataBar,
                        label: "New users"
                    },
                ],
                {
                    series: {
                        lines: {
                            show: !0,
                            lineWidth: 2,
                            fill: !0,
                            fillColor: {
                                colors: [
                                    {
                                        opacity: .1
                                    },
                                    {
                                        opacity: .1
                                    }
                                ]
                            }
                        },
                        points: {
                            show: !0
                        },
                        shadowSize: 0
                    },
                    legend: {
                        show: !1
                    },
                    grid: {
                        margin: {
                            left: 23,
                            right: 30,
                            botttom: 40
                        },
                        labelMargin: 15,
                        axisMargin: 500,
                        hoverable: !0,
                        clickable: !0,
                        tickColor: "rgba(0,0,0,0.15)",
                        borderWidth: 0
                    },
                    colors: [a],
                    xaxis: {
                        mode: "time",
                        // tickFormatter: function (val, axis) {
                        //     var d = new Date(val);
                        //     return d.getUTCDate() + "-" + months[(d.getUTCMonth())];
                        // },
                        timeformat: format
                    },
                    yaxis: {
                        ticks: 4,
                        tickSize: 15,
                        tickDecimals: 0
                    }
                }
        );
    });
    
    $("#table3").dataTable({
        buttons: ["copy", "excel", "pdf", "print"],
        lengthMenu: [
            [6, 10, 25, 50, -1],
            [6, 10, 25, 50, "All"]
        ],
        dom: "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6 text-right'B>><'row be-datatable-body'<'col-sm-12'tr>><'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    });
    
    $("#table4").dataTable({
        buttons: ["copy", "excel", "pdf", "print"],
        lengthMenu: [
            [6, 10, 25, 50, -1],
            [6, 10, 25, 50, "All"]
        ],
        dom: "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6 text-right'B>><'row be-datatable-body'<'col-sm-12'tr>><'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    });
    
    $('.delete').on('click',function(e){
        return confirm("Are you sure you want to delete this account?");
    });
    
});