/* global $ */
$(document).ready(function () {
    $("#package_head").select2({
        placeholder: "Search for a user...",
        minimumInputLength: 1,
        ajax: {
            url: function(params) {
                console.log(params.term);
                return "people/search_result/" + params.term;
            },
            type: "GET",
            dataType: "json",
            processResults: function (data) {
            console.log(data);
            var myResults = [];
            $.each(data, function (index, item) {
                myResults.push({
                    'id': item.id,
                    'text': item.name
                });
            });
            return {
                results: myResults
            };
        }
        },
    });
    
    $(".select2").select2();
});