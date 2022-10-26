$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#trasa_transport_wlasny').click(function () {
        $('#przew_id option[kh_glowny=1]').prop('selected', 'selected');
    });
    
      $('#tr_stawka, #tr_ilosc, #tr_wartosc').change(function () {
        var tr_stawka = $("#tr_stawka").val().replace(',', '.');
        var tr_ilosc = $("#tr_ilosc").val().replace(',', '.');
        var tr_wartosc = $("#tr_wartosc").val().replace(',', '.');
        if (isFinite(tr_stawka) && isFinite(tr_ilosc)) {
            var wartosc = tr_stawka * tr_ilosc;
            $("#tr_wartosc").val(parseFloat(wartosc).toFixed(2));
        }
    });
});

