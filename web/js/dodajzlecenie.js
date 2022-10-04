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

})

