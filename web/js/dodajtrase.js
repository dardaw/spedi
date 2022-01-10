$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $(document.body).delegate("#wydruk_zlecenia", "click", function () {
        $('#wydruk_zlecenia_okno').modal('show');
    });

    $('#przycisk_wydruk_zlecenia').click(function () {
        $('.przyciski_wydrukow').each(function () {
            var odnosnik = $(this).attr('link_staly');
            if (odnosnik.indexOf('fracht') === -1)
                odnosnik = odnosnik + '&fracht=' + $('#wydruk_fracht').val();
            $(this).prop('href', odnosnik);
        });
        $('.przyciski_wydrukow').toggle();
    });
});

