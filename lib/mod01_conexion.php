<?php
    function mod01_conectoBD () {
        $direccion = "localhost";
        $usuario = "root";
        $contrasena = "";
        $database = "aerolinea_v1";
        try {
            $link = mysqli_connect( $direccion, $usuario, $contrasena, $database );
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "Connection Failed";
        }

        return $link;
    }

    function mod01_desconectoBD ( $link ) {
        // Realizar la query de desconexión.
        mysqli_close( $link );
    }
?>