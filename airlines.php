<?php
    session_start();

    require ("lib/mod04_presentacion.php");

    if ( isset( $_GET[ "codIATA" ] ) ) {
        $codIATA = $_GET[ "codIATA" ];
        $strDetailAirlines = mod04_getDataAirlines( $codIATA );
    } else if ( isset( $_GET[ "all" ] ) ) {
        $codIATA = $_GET[ "all" ];
        $strDetailAirlines = mod04_getDataAirlines( $codIATA );
    }

    require ("view/view_airlines.php");
?>

