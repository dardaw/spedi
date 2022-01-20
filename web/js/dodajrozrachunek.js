$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#roz_data_kursu').blur(function () {

        var waluta = $("#roz_waluta").val();

        $.ajax({
            type: "POST",
            url: base_url + "/index.php?r=ajax/pobierzkursdata&" + "poz_kurs_data=" + $('#roz_data_kursu').val() + '&poz_waluta=' + waluta,
            success: function (data) {
                if (waluta == 'PLN') {
                    alert("Nie można wybrać kursu dla PLN");
                    $("#roz_wartosc_kursu").val("");
                    return false;
                }
                if (data !== false) {
                    $("#roz_wartosc_kursu").val(data['kurs_wartosc']);
                } else {
                    $("#roz_wartosc_kursu").val("");
                    return false;
                }


            },
            dataType: "json"
        });
    });


})

