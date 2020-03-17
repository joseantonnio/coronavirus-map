require('./bootstrap');

feather.replace();
moment.locale('pt-br');

$(document).ajaxStart(function() {
    $.LoadingOverlay("show", {
        image: "",
        fontawesome: "fas fa-circle-notch fa-spin",
        size: 5
    });
});

$(document).ajaxStop(function() {
    $.LoadingOverlay("hide");
});

$('[data-toggle="tooltip"]').tooltip();

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    if ($("#sidebar-wrapper").is(":hidden")) {
        $("#sidebar-wrapper").show();
        $("main").addClass('col-md-9');
        $("main").addClass('col-lg-10');
        $("main").removeClass('col-12');
    } else {
        $("#sidebar-wrapper").hide();
        $("main").removeClass('col-md-9');
        $("main").removeClass('col-lg-10');
        $("main").addClass('col-12');
    }
});

$("#search").autocomplete({
    delay: 500,
    source: function(request, response) {
        $.ajax({
            url: "/cities",
            type: 'get',
            dataType: "json",
            data: {
                q: request.term
            },
            success: function(data) {
                response(data);
            }
        });
    },
    select: function(event, ui) {
        // Set selection
        $('#search').val(ui.item.label); // display the selected text

        var location = ui.item.value.split(","),
            url = window.location.protocol + '//' + window.location.hostname + '?lat=' + location[0] + '&lng=' + location[1];

        window.location.href = url;

        return false;
    }
});