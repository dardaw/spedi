$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    var vat;
    function przelicz_vat() {
        vat = $('#poz_vat').val();
        if (isNaN(vat)) {
            vat = 1;
        } else {
            if (vat.length == 1) {
                vat = '0' + vat;
            }
            vat = "1." + vat;
        }
    }


    function przelicz_wartosc_kursu() {

        przelicz_vat();
        var cena_netto_pln = $("#poz_cena_netto_waluta").val() * $("#poz_kurs_wartosc").val();
        var poz_wartosc_netto = $("#poz_wartosc_netto_waluta").val() * $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val();
        var poz_wartosc_brutto = $("#poz_wartosc_brutto_waluta").val() * $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val();

        var cena_netto_waluta = $("#poz_cena_netto").val() / $("#poz_kurs_wartosc").val();
        var poz_wartosc_netto_waluta = $("#poz_wartosc_netto").val() / $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val();
        var poz_wartosc_brutto_waluta = $("#poz_wartosc_brutto").val() / $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val();

        if (($("#poz_waluta").val() == 'PLN' && $("#poz_waluta_zrodlowa").val() != 'PLN') || ($("#poz_waluta").val() != 'PLN' && $("#poz_waluta_zrodlowa").val() != 'PLN')) {
            $('#poz_cena_netto').val(parseFloat(cena_netto_pln).toFixed(2));
            $('#poz_wartosc_netto').val(parseFloat(poz_wartosc_netto).toFixed(2));
            $("#poz_wartosc_brutto").val(parseFloat(poz_wartosc_brutto).toFixed(2));
        } else if (($("#poz_waluta").val() != 'PLN' && $("#poz_waluta_zrodlowa").val() == 'PLN')) {
            $('#poz_cena_netto_waluta').val(parseFloat(cena_netto_waluta).toFixed(2));
            $('#poz_wartosc_netto_waluta').val(parseFloat(poz_wartosc_netto_waluta).toFixed(2));
            $('#poz_wartosc_brutto_waluta').val(parseFloat(poz_wartosc_brutto_waluta).toFixed(2));

        }
    }
    $('#poz_kurs_data').blur(function () {

        var waluta = $("#poz_waluta").val();
        if (waluta == 'PLN') {
            waluta = $("#poz_waluta_zrodlowa").val();
        }

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/pobierzkursdata&" + "poz_kurs_data=" + $('#poz_kurs_data').val() + '&poz_waluta=' + waluta,
            success: function (data) {
                if ($("#poz_waluta").val() == 'PLN' && $("#poz_waluta_zrodlowa").val() == 'PLN') {
                    alert("Nie można wybrać kursu dla PLN");
                    $("#poz_kurs_wartosc").val("");
                    return false;
                }
                if ($("#poz_waluta").val() != 'PLN' && $("#poz_waluta_zrodlowa").val() != 'PLN' && $("#poz_waluta").val() != $("#poz_waluta_zrodlowa").val()) {
                    alert("Nie można wybrać kursu");
                    $("#poz_kurs_wartosc").val("");
                    return false;
                }
                if (data !== false) {
                    $("#poz_kurs_wartosc").val(data['kurs_wartosc']);
                } else {
                    $("#poz_kurs_wartosc").val("");
                    return false;
                }

                przelicz_wartosc_kursu();

            },
            dataType: "json"
        });
    });

    $("#poz_ilosc").change(function () {
        var wartosc_netto = $('#poz_cena_netto').val() * $(this).val();
        var wartosc_netto_waluta = $('#poz_cena_netto_waluta').val() * $(this).val();
        if (!isNaN(wartosc_netto)) {
            $('#poz_wartosc_netto').val(wartosc_netto.toFixed(2));
        }
        if (!isNaN(wartosc_netto_waluta)) {
            $('#poz_wartosc_netto_waluta').val(wartosc_netto_waluta.toFixed(2));
        }
    });

    $("#poz_vat").change(function () {

        przelicz_vat();

        $("#poz_wartosc_brutto").val(parseFloat($('#poz_wartosc_netto').val() * vat).toFixed(2));
        $('#poz_wartosc_brutto_waluta').val(parseFloat($('#poz_wartosc_netto_waluta').val() * vat).toFixed(2));
    });

    function wybierz_zlecenie() {
        $('#tabela_zlecen tbody').html("");

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/wybierzzlecenianiezafakturowane&" + "fak_id=" + $('#fak_id').val() + '&zl_numer_pelny=' + $('#zl_numer_pelny').val(),
            success: function (data) {
                if (data !== false) {
                    $.each(data, function (i, item) {

                        $('#tabela_zlecen tbody').append("<tr><th scope='row'>" + item.zl_numer_pelny + "<input type='hidden' id='zl_id' value='" + item.zl_id + "'></th><td>" + item.kh_id + "</td><td>" + item.zl_order + "</td></tr>");
                    });
                }
            },
            dataType: "json"
        });
    }

    $(document.body).delegate("#wybierz_zlecenie", "click", function () {
        $('#wybor_zlecenia').modal('show');
        wybierz_zlecenie();
    });

    $('#zl_numer_pelny').keyup(function () {
        wybierz_zlecenie();
    });

    $(document.body).delegate("#tabela_zlecen tbody tr", "click", function () {
        var zl_id = $(this).find('#zl_id').val();

        var waluta = $("#poz_waluta").val();
        if (waluta == 'PLN') {
            waluta = $("#poz_waluta_zrodlowa").val();
        }
        if (waluta == '') {
            waluta = $("#poz_waluta").val();
        }
        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/danezleceniadofaktury&" + "zl_id=" + zl_id + "&waluta=" + waluta,
            success: function (data) {
                if (data !== false) {
                    if (data['usluga'] == "Brak trasy") {
                        alert("Brak trasy, nie można zafakturować");
                        return false;
                    }
                    przelicz_vat();

                    $('#formularz_dodawania_pozycji').find('#zl_id').val(data['zl_id']);
                    $('#formularz_dodawania_pozycji').find('#poz_jednostka').val(data['zl_jednostka']);
                    $('#formularz_dodawania_pozycji').find('#poz_nazwa').val(data['usluga'] + ' ' + data['nazwa']);
                    $('#formularz_dodawania_pozycji').find('#poz_ilosc').val(data['zl_ilosc']);
                    $('#formularz_dodawania_pozycji').find('#poz_waluta_zrodlowa').val(data['zl_waluta']);
                    if (data['zl_waluta'] == 'PLN') {
                        $('#formularz_dodawania_pozycji').find('#poz_cena_netto').val(data['zl_stawka']);
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_netto').val(data['zl_wartosc']);
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_brutto').val(data['zl_wartosc'] * vat);
                        $('#formularz_dodawania_pozycji').find('#poz_cena_netto_waluta').val('');
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_netto_waluta').val('');
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_brutto_waluta').val('');
                    } else {
                        $('#formularz_dodawania_pozycji').find('#poz_cena_netto').val('');
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_netto').val('');
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_brutto').val('');
                        $('#formularz_dodawania_pozycji').find('#poz_cena_netto_waluta').val(data['zl_stawka']);
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_netto_waluta').val(data['zl_wartosc']);
                        $('#formularz_dodawania_pozycji').find('#poz_wartosc_brutto_waluta').val(data['zl_wartosc'] * vat);

                    }
                    if (data['zl_data_rozladunku'] != null && data['poz_kurs_wartosc'] != null) {
                        $('#formularz_dodawania_pozycji').find('#poz_kurs_data').val(data['zl_data_rozladunku']);
                        $('#formularz_dodawania_pozycji').find('#poz_kurs_wartosc').val(data['poz_kurs_wartosc']);
                    }
                    if ($("#poz_waluta_zrodlowa").val() != 'PLN' || $("#poz_waluta").val() != 'PLN') {
                        przelicz_wartosc_kursu();
                    }

                    $('#wybor_zlecenia').modal('hide');
                }
            },
            dataType: "json"
        });
    });


})

