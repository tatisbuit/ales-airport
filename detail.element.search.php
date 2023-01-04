<?php
    session_start();

    require ("lib/mod04_presentacion.php");


    if (isset( $_GET['name'], $_GET['photo'], $_GET['otherdata'], $_GET['type'] )) {
        $type = $_GET['type'];
        $name = $_GET['name'];
        $otherdata = $_GET['otherdata'];
        $photo = $_GET['photo'];

        if ( $type === 'employee' ) {
            $photo =  "images/imgemployees/{$photo}";
        } else if( $type === 'aircraft' ){
            $photo =  "images/aircrafts/{$photo}";
        } else if ( $type === 'airline' ){
            $photo =  "images/logos/{$photo}";
        }
    }

    require ("view/view_detail.element.php");
?>