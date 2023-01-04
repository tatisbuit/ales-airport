<?php
    session_start();

    require ("lib/mod04_presentacion.php");

    $strDetailpassengers = mod04_getDatapassengers(  );

    require ("view/view_passengers.php");
?>