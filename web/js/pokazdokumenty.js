$('document').ready(function () {
    $("tr").delegate(".pobierz_plik", "click", function () {
        var gdzie = $(this).attr("link");
        if(gdzie !== undefined){
            window.open(gdzie, '_blank');
        }
    });

})

