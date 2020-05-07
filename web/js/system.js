$('document').ready(function () {
 $(document.body).delegate("input", "change", function () {
       $(this).val($(this).val().replace(",", "."));
    });

})
