$(function () {
    $( "div.infant-container" ).on("click","button.cls-ovly-infant", function( event ) {
        event.preventDefault();

        $( "div.infantcard" ).hide();
        $( "div.infant-container" ).removeClass("w-100");
        $( "div.infant-container" ).addClass("w-0");
    });
});

$(function () {
    $("button.btn-info-infant").on("click",function() {
        console.log('dsfsd');
        const idInfant = $( this ).attr( "data-idinfant" );
        const nodo = $( this );
        const data = `action=getDataInfant&idInfant=${idInfant}`;
        $.ajax ({
            type: 'POST',
            url: 'ajax/controladorAjax.php',
            data: data,
        })
        .done( function (dataJSON) {
            // console.log(dataJSON);
            let dataInfant = JSON.parse(dataJSON);
            let detailInfant = dataInfant[ "data" ][ "detailInfant" ];

            switch ( dataInfant[ "status" ][ "codError" ] ) {
                case "000":
                        $( "div.infant-container" ).empty();
                        $( "div.infant-container" ).addClass('w-100');
                        $( "div.infant-container" ).append( detailInfant );
                    break;
                case "001":
                        $( "div.infant-container" ).empty();
                        $( "div.ovly-container" ).removeClass( "hidden" );
                        $( "div.ovly-container .content" ).empty();
                        $( "div.ovly-container .content" ).append( photoAircraft );
                        $( nodo ).addClass( "nophoto" );
                    break;
                case "002":
                        $( "div.ovly-container" ).removeClass( "hidden" );
                        $( "div.ovly-container .content" ).empty();
                        $( "div.ovly-container .content" ).append( dataObject[ "data" ][ "txtError" ] );
                    break;
                default:
            }
        })
        .fail( function () {
            alert ("An error has occurred.");
        });
    });
});