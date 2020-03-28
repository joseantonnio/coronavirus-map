require('./bootstrap');

feather.replace();
moment.locale('pt-br');

$('.modal-warning').modal("show");

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
        $("main").addClass('col-md-8');
        $("main").addClass('col-lg-9');
        $("main").removeClass('col-12');
    } else {
        $("#sidebar-wrapper").hide();
        $("main").removeClass('col-md-8');
        $("main").removeClass('col-lg-9');
        $("main").addClass('col-12');
    }
});

$.ajax({
    url: "/blog/wp-json/wp/v2/posts?tags=4",
    type: 'get',
    dataType: 'json',
    success: function(data) {
        var first = true,
            $news = $("#news")[0],
            news_count = 0;

        data.forEach(function(element) {
            if (moment().diff(moment(element.date), 'days') == 0) {
                if (first) {
                    first = false;
                    $news.innerHTML = "";
                }
                $news.innerHTML += '<li class="list-group-item"><a class="h7" href="' + element.link + '">' + element.title.rendered + '</a></li>';
                news_count++;
            }
        });

        if (news_count > 0) {
            $('#news-count').text(news_count);
            $('#news-count').show();
        }
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