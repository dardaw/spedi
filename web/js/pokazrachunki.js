$('document').ready(function () {

     $("table").delegate("tr", "click", function () {
        var gdzie = $(this).attr("gdzie");
        if(gdzie !== undefined){
            $(location).attr('href', gdzie);
        }
    });

})

