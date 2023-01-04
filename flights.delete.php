<?php 
    session_start();

    require ("./lib/mod02_accesodatos.php");

    $flightID = $_GET['id'];

    if(isset($flightID)) {
        $arDeleteFlight = mod02_deleteFlight($flightID);
    }

    echo json_encode($arDeleteFlight);
?>