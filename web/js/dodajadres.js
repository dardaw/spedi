$('document').ready(function () {

    var base_url = $('#base_url').val();
    var controller_name = $('#controller_name').val();
    var action_name = $('#action_name').val();

    $('#adres_miasto').typeahead({
        source: function (query, process) {
            return $.ajax({
                url: base_url + "/index.php?r=ajax/pobierzadresy&" + "adresy_miasto_nazwa=" + $('#adres_miasto').val()+ "&" + "adresy_miasto_kraj=" + $('#adres_kraj').val(),
                type: 'POST',
                dataType: 'json',
                success: function (result) {
                    var resultList = result.map(function (item) {
                        var aItem = item.Name;
                        return aItem;
                    });
                   
                    return process(resultList);

                }
            });
            
        }
    });
    
    $('#adres_miasto').change( function(){
        if($(this).val().indexOf('(') != 0 && $(this).val().indexOf(')') != 0 ){
            var kod_pocztowy = $(this).val().substring($(this).val().indexOf('(') + 1, $(this).val().indexOf(')'));
            $('#adres_kod_pocztowy').val(kod_pocztowy);
            var miasto = $(this).val().substring(0, $(this).val().indexOf('(') - 1);
            $(this).val(miasto);
        }
    });



});

