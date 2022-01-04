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
        var poz_wartosc_brutto = $("#poz_wartosc_brutto_waluta").val() * $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val() * vat;

        var cena_netto_waluta = $("#poz_cena_netto").val() / $("#poz_kurs_wartosc").val();
        var poz_wartosc_netto_waluta = $("#poz_wartosc_netto").val() / $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val();
        var poz_wartosc_brutto_waluta = $("#poz_wartosc_brutto").val() / $("#poz_kurs_wartosc").val() * $("#poz_ilosc").val() * vat;

        if ($("#poz_waluta").val() == 'PLN' && $("#poz_waluta_zrodlowa").val() != 'PLN') {
            $('#poz_cena_netto').val(parseFloat(cena_netto_pln).toFixed(2));
            $('#poz_wartosc_netto').val(parseFloat(poz_wartosc_netto).toFixed(2));
            $("#poz_wartosc_brutto").val(parseFloat(poz_wartosc_brutto).toFixed(2));
        } else if ($("#poz_waluta").val() != 'PLN' && $("#poz_waluta_zrodlowa").val() == 'PLN') {
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
                if ($("#poz_waluta").val() != 'PLN' && $("#poz_waluta_zrodlowa").val() != 'PLN') {
                    alert("Nie można wybrać kursu gdy waluta i waluta źródłowa jest różna od PLN");
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
    
    $("#poz_ilosc").change(function(){
        var wartosc_netto = $('#poz_cena_netto').val() * $(this).val();
        var wartosc_netto_waluta = $('#poz_cena_netto_waluta').val() * $(this).val();
        if(!isNaN(wartosc_netto)){
            $('#poz_wartosc_netto').val(wartosc_netto.toFixed(2));
        }
        if(!isNaN(wartosc_netto_waluta)){
            $('#poz_wartosc_netto_waluta').val(wartosc_netto_waluta.toFixed(2));
        }
    });

    $("#poz_vat").change(function () {

        przelicz_vat();

        $("#poz_wartosc_brutto").val(parseFloat($('#poz_wartosc_netto').val() * vat).toFixed(2));
        $('#poz_wartosc_brutto_waluta').val(parseFloat($('#poz_wartosc_netto_waluta').val() * vat).toFixed(2));
    });

    $('#wybierz_zlecenie').click(function () {
        alert(1);
    });

})

