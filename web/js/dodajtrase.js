$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $(document.body).delegate("#wydruk_zlecenia", "click", function () {
        $('#wydruk_zlecenia_okno').modal('show');
    });


});

