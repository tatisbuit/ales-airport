// search box
$(function(){
    $('search-form').submit(function(e) {
        e.preventDefault();
    })

    $("#searchbox").keyup(function() {
        let term = $('#searchbox').val();
        // $('#resultados').html('<h2><img src="images/loading.gif" /> Cargando</h2>');
        const data = `action=searchDataBase&term=${term}`;
        // console.log(data);
        $.ajax({
            method: 'POST',
            url: 'ajax/controladorAjax.php',
            data: data
        })
        .done(function (dataJSON) {
            // console.log(dataJSON);
            let dataObject = JSON.parse(dataJSON);
            if (dataObject !== '') {
                $('#resultsearch').html(dataObject);
            } else {
                $('#resultsearch').empty();
            }
        });
    });
});
