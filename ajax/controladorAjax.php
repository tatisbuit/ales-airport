<?php
    session_start();

    require ( "../lib/mod04_presentacion.php" );

    $action = $_POST[ "action" ];

    switch ( $action ) {
        case "getDataInfant":
            $idInfant = $_POST[ "idInfant" ];
            $arDetailInfant = mod04_getDetailInfant( $idInfant );
            echo json_encode( $arDetailInfant );
            break;
        case "insertNewFlight":
            if ( isset( $_POST[ "datetimeDeparture" ], $_POST[ "datetimeArrival" ], $_POST[ "codIATAAirline" ], $_POST[ "idAircraft" ], $_POST[ "idDestinationAirport" ], $_POST[ "idOriginAirport" ]  )) {
                $datetimeDeparture = $_POST[ "datetimeDeparture" ];
                $datetimeArrival = $_POST[ "datetimeArrival" ];
                $codIATAAirline = $_POST[ "codIATAAirline" ];
                $idAircraft = $_POST[ "idAircraft" ];
                $idDestinationAirport = $_POST[ "idDestinationAirport" ];
                $idOriginAirport = $_POST[ "idOriginAirport" ];
                $msgInsert = mod04_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport );
            } else {
                die("Missing some data to enter");
            }
            echo json_encode( $msgInsert );
            break;
        case "updateFlight":
            if ( isset( $_POST[ "flightId" ], $_POST[ "flightCode" ], $_POST[ "datetimeDeparture" ], $_POST[ "datetimeArrival" ], $_POST[ "codIATAAirline" ], $_POST[ "idAircraft" ], $_POST[ "idDestinationAirport" ], $_POST[ "idOriginAirport" ]  )) {
                $flightID = $_POST[ "flightId" ];
                $flightCode = $_POST[ "flightCode" ];
                $datetimeDeparture = $_POST[ "datetimeDeparture" ];
                $datetimeArrival = $_POST[ "datetimeArrival" ];
                $codIATAAirline = $_POST[ "codIATAAirline" ];
                $idAircraft = $_POST[ "idAircraft" ];
                $idDestinationAirport = $_POST[ "idDestinationAirport" ];
                $idOriginAirport = $_POST[ "idOriginAirport" ];
                $msgInsert = mod04_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $flightCode, $flightID );
            } else {
                die("Missing some data to enter");
            }
            echo json_encode( $msgInsert );
            break;
        case "searchDataBase":
            if ( isset( $_POST['term'] ) ) {
                $term = $_POST['term'];
                $term = trim($term, ' ');
                if ( $term !== '') {
                    $resultSearch = mod04_getDataDBbySearch($term);
                } else {
                    $resultSearch = "";
                }
            } else {
                die("Missing some data to enter");
            }
            echo json_encode( $resultSearch );
            break;
        case "login":
            $email = $_POST[ "email" ];
            $password = $_POST[ "password" ];

            $arDataLogin = mod03_chkLoginUser( $email, $password );

            echo json_encode( $arDataLogin );
            break;
        case "logout":
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            break;
        default:
    }
?>