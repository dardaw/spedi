$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#trasa_transport_wlasny').click(function () {
        $('#przew_id option[kh_glowny=1]').prop('selected', 'selected');
    });
});

