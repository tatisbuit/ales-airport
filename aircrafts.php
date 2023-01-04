<?php
    session_start();

    require ("lib/mod04_presentacion.php");

    $strDataAirplanes = mod04_getDataAircrafts( );

    require ("view/view_aircrafts.php");
?>