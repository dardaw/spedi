$('document').ready(function () {
    $(document.body).delegate("input", "change", function () {
        $(this).val($(this).val().replace(",", "."));
    });


    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            locale:'pl'
        });
        $('.timepicker').datetimepicker({
            format: 'HH:mm',
        });
    });

})
