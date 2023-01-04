$( function() {
    $( "#btnLogin" ).on( "click", function( event ) {
        let email, password;

        email       = $( "input#inputEmail" ).val();
        password  = $( "input#inputPassword" ).val();

        // console.log( email, password );
        is_login_correct = valDataLogin( email, password );

        if ( is_login_correct ) {
            chkUserLogin( email, password );
        }
    });

    function valDataLogin( email, password ) {
        retorno = true;

        return retorno;
    }

    function chkUserLogin( email, password ) {

        const data = {
                            action      : "login",
                            email       : email,
                            password    : password
        };

        console.log( data );

        $.ajax ( {
            type: "POST",
            url: "ajax/controladorAjax.php",
            data: data
        })
        .done( function ( dataJSON ) {
            // console.log( dataJSON );
            let dataObject = JSON.parse( dataJSON );
            // console.log( dataObject );

            switch ( dataObject[ "status" ][ "codError" ] ) {
                case "000":
                    if ( dataObject[ "status" ][ "numRows" ] === 1 ) {
                        $( "#offCanvasLogin" ).hide();
                        $( "#btnLogin01" ).hide();
                        $( "#btnSignUp" ).hide();
                        $( "#btnLogout" ).removeClass("d-none");
                        $( "#welcomeuser" ).removeClass("d-none");
                        $( ".nameuser" ).append( dataObject[ "data" ][ 0 ][ "username" ]);
                    }
                    break;
                case "002":
                    alert('The user is not registered');
                    break;
                default:
            }
        })
        .fail(function() {
            alert ("An error has occurred.");
        });
    }
});

$( function() {
    $( "#btnLogout" ).on( "click", function( event ) {
        const data = {
                        action: "logout",
                    };

        console.log( data );

        $.ajax ( {
            type: "POST",
            url: "ajax/controladorAjax.php",
            data: data
        })
        .done( function ( dataJSON ) {
            $( "#btnLogin01" ).removeClass("d-none");
            $( "#btnSignUp" ).removeClass("d-none");
            $( "#btnLogout" ).addClass("d-none");
            $( "#welcomeuser" ).addClass("d-none");
            $( ".nameuser" ).append('');
            location.reload();
        })
        .fail(function() {
        alert ("An error has occurred.");
        });
    });
});