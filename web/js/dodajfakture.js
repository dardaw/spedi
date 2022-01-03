$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#kh_id').change(function () {

        $.ajax({
            type: "POST",
            url:base_url + "/index.php?r=ajax/pobierzdanekontrahenta&" + "kh_id=" + $('#kh_id').val(),
            success: function (data) {
                $('#fak_nabywca_nazwa').val(data['kh_nazwa_pelna']);
                $('#fak_nabywca_ulica').val(data['kh_ulica']);
                $('#fak_nabywca_kod_pocztowy').val(data['kh_kod_pocztowy']);
                $('#fak_nabywca_miasto').val(data['kh_miasto']);
                $('#fak_nabywca_nip').val(data['kh_nip']);
                alert('Pobrano dane kontrahenta do faktury');
            },
            dataType: "json"
        });
    });

})

