$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#kh_id').change(function () {

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/czykontrahentzablokowany&" + "kh_id=" + $('#kh_id').val(),
            success: function (data) {
                if (data['kh_blokada'] == 1) {
                    $("#kh_id").val("0");
                    alert('Kontrahent zablokowany');
                }
            },
            dataType: "json"
        });

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/kredytkupiecki&" + "kh_id=" + $('#kh_id').val(),
            success: function (data) {
                if (data['kredyt_kontrahenta'] == 1) {
                    if (data['przekroczono'] == true) {
                        $("#kh_id").val("0");
                        alert('Przekroczono kredyt kupiecki dla tego kontrahenta o kwotę ' + data['ile'] + ' PLN');
                    }
                }
            },
            dataType: "json"
        });
    });

    $('#zl_stawka, #zl_ilosc, #zl_wartosc').change(function () {
        var zl_stawka = $("#zl_stawka").val().replace(',', '.');
        var zl_ilosc = $("#zl_ilosc").val().replace(',', '.');
        var zl_wartosc = $("#zl_wartosc").val().replace(',', '.');
        if (isFinite(zl_stawka) && isFinite(zl_ilosc)) {
            var wartosc = zl_stawka * zl_ilosc;
            $("#zl_wartosc").val(parseFloat(wartosc).toFixed(2));
        }
    });


})

