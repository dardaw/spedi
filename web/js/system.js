$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $(document.body).delegate("input", "change", function () {
        $(this).val($(this).val().replace(",", "."));
    });


    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'pl'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm',
        });
    });


    $(document.body).delegate("#filtr_przycisk", "click", function () {
        $('#filtr_okno').modal('show');
    });

    $("#filtr_okno_formularz").submit(function (event) {
        $(this).find('input, select').each(function () {
            if ($(this).val() == '') {
                $(this).remove();
            }
        });
    });

});
