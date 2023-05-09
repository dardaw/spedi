$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#adres_miasto').typeahead({
        source: function (query, process) {
            return $.ajax({
                url: base_url + "/index.php?r=ajax/pobierzadresy&" + "adresy_miasto_nazwa=" + $('#adres_miasto').val() + "&" + "adresy_miasto_kraj=" + $('#adres_kraj').val(),
                type: 'POST',
                dataType: 'json',
                success: function (result) {
                    var resultList = result.map(function (item) {
                        var aItem = item.Name;
                        return aItem;
                    });

                    return process(resultList);

                }
            });

        }
    });

    $('#adres_miasto').change(function () {
        if ($(this).val().indexOf('(') !== -1 && $(this).val().indexOf(')') !== -1) {
            var kod_pocztowy = $(this).val().substring($(this).val().indexOf('(') + 1, $(this).val().indexOf(')'));
            $('#adres_kod_pocztowy').val(kod_pocztowy);
            var miasto = $(this).val().substring(0, $(this).val().indexOf('(') - 1);
            $(this).val(miasto);

        }
    });

    $(document.body).delegate("#wybierz_adres_wielokrotnego_uzytku", "click", function () {
        $('#wybor_adresu').modal('show');
        wybierz_adres();
    });

    $('#adres_wiel_nazwa').keyup(function () {
        wybierz_adres();
    });

    function wybierz_adres() {
        $('#tabela_adresow tbody').html("");

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/wybierzadreswielokrotnegouzytku&" + "zl_id=" + $('#zl_id').val() + '&adres_wiel_nazwa=' + $('#adres_wiel_nazwa').val(),
            success: function (data) {
                if (data !== false) {
                    $.each(data, function (i, item) {

                        $('#tabela_adresow tbody').append("<tr class='adres_wiel_uzytku_lista'><th scope='row'>" + item.adres_wiel_nazwa + "</th><td>"
                                + item.adres_wiel_miasto + "</td><td>" + item.adres_wiel_kraj + "</td><td>"
                                + item.adres_wiel_kod_pocztowy + "</td><td>" + item.adres_wiel_ulica + "</td></tr>");
                    });
                }
            },
            dataType: "json"
        });
    }

    $(document.body).delegate(".adres_wiel_uzytku_lista", "click", function () {
        var nazwa = $(this).find('th').html();
        var miasto = $(this).find('td:first').html();
        var kraj = $(this).find('td:eq(1)').html();
        var kod_pocztowy = $(this).find('td:eq(2)').html();
        var ulica = $(this).find('td:eq(3)').html();
        $('#adres_nazwa').val($.trim(nazwa));
        $('#adres_miasto').val($.trim(miasto));
        $('#adres_kraj').val($.trim(kraj));
        $('#adres_kod_pocztowy').val($.trim(kod_pocztowy));
        $('#adres_ulica').val($.trim(ulica));
        $('#wybor_adresu').modal('hide');
    });


});

