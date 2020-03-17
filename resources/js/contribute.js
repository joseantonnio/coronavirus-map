$("#city").autocomplete({
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
            },
            error: function() {
                alert('Erro ao buscar cidades!');
            }
        });
    },
    select: function(event, ui) {
        // Set selection
        $('#city').val(ui.item.label);

        $.ajax({
            url: "/cities/" + ui.item.id,
            type: 'get',
            dataType: "json",
            success: function(data) {
                $('#cases').removeAttr('disabled');
                $('#serious').removeAttr('disabled');
                $('#deaths').removeAttr('disabled');
                $('#recovered').removeAttr('disabled');
                $('#first_case').removeAttr('disabled');
                $('#sources').removeAttr('disabled');
                $('#send').removeAttr('disabled');
                $('#city').attr('readonly', 'true');

                if (data.infections.length > 0) {
                    $('#infection_id').val(data.infections[0].id);
                    $('#cases').val(data.infections[0].cases);
                    $('#serious').val(data.infections[0].serious);
                    $('#deaths').val(data.infections[0].deaths);
                    $('#recovered').val(data.infections[0].recovered);
                    $('#first_case').val(moment(data.infections[0].first_case).format('YYYY-MM-DD'));
                    $('#sources').val('');
                } else {
                    $('#infection_id').val("N/A (nova infecção)");
                    $('#cases').val('0');
                    $('#serious').val('0');
                    $('#deaths').val('0');
                    $('#recovered').val('0');
                    $('#first_case').val('');
                    $('#sources').val('');
                }
            },
            error: function() {
                alert('Erro ao obter os dados da cidade!');
            }
        });

        return false;
    }
});