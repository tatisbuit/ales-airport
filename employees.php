<?php
    session_start();

    require ("lib/mod04_presentacion.php");

    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        $strDetailEmployees = mod04_getDetailEmployees( $type );
    } else {
        $type = 'all';
        $strDetailEmployees = mod04_getDetailEmployees( $type );
    }

    require ("view/view_employees.php");
?>