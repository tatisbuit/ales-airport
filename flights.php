<?php
    session_start();

    require ("lib/mod04_presentacion.php");

    $msgInsFlight = isset( $_POST[ "data" ] ) ? $_POST[ "data" ]: '';

    if ( isset( $_GET[ "page" ] ) ) {
        $numPage = intval( $_GET[ "page" ] );
        if ( $numPage < 1 ) {
            $numPage = 1;
        }
    } else {
        $numPage = 1;
    }

    $numRowsPerPage = 3;

    $listFlights = mod04_pagination( $numPage, $numRowsPerPage, 'flights');

    require ("view/view_flights.php");
?>