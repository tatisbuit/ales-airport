<?php
    require ("mod02_accesodatos.php");

    function mod03_getDataAircrafts() {
        $arDataAllAircraft = mod02_getDataAircrafts();

        switch ( $arDataAllAircraft[ "status"][ "codError" ] ) {
            case "000":
                $addModels = [];

            foreach ( $arDataAllAircraft[ "data" ] as $aircraft ) {
                if ( !(in_array($aircraft[ "model" ], $addModels)) ) {
                    $arDataAllAircraft_TMP[] = [
                                                "idAirplane"            => $aircraft[ "idAirplane" ],
                                                "namefactory"           => $aircraft[ "namefactory" ],
                                                "registrationNumber"    => $aircraft[ "registrationNumber" ],
                                                "seat"                  => $aircraft[ "seat" ],
                                                "dateOfPurchase"        => $aircraft[ "dateOfPurchase" ],
                                                "photo"                 => $aircraft[ "photo" ],
                                                "model"                 => $aircraft[ "model" ],
                                            ];
                    array_push($addModels, $aircraft[ "model" ]);
                }
            }

            foreach ( $arDataAllAircraft_TMP as $key => $item ) {
                $addAirlines = array();
                foreach ( $arDataAllAircraft[ "data" ] as $aircraft ) {
                    if ( $item[ "model" ] == $aircraft[ "model" ] && !(in_array($aircraft[ "nameAirline" ], $addAirlines, TRUE)) ) {
                        $arDataAllAircraft_TMP[ $key ][ "airlines" ][] = [
                                                                        "codIATA"        => $aircraft[ "codIATA" ],
                                                                        "nameAirline"    => $aircraft[ "nameAirline" ],
                                                                        "country"        => $aircraft[ "country" ]
                                                                    ];
                        array_push($addAirlines, $aircraft[ "nameAirline" ]);
                    }
                }
            }

            $arDataAllAircraft[ "data" ] = $arDataAllAircraft_TMP;
            return $arDataAllAircraft;
        }
    }

    function mod03_getDataAirlines( $codIATA ) {
        $arDataDataAirline = mod02_getDataAirlines( $codIATA );

        return $arDataDataAirline;
    }

    function mod03_getDataEmployees( $type ) {
        $arDataEmployees = mod02_getDataEmployees( $type );

        return $arDataEmployees;
    }

    function mod03_getDataFlights( $numPage, $numRowsPerPage ) {
        $numRowIni = ( $numPage - 1 ) * $numRowsPerPage;
        $arDataFlights = mod02_getDataFlights( $numRowIni, $numRowsPerPage );

        switch ( $arDataFlights[ "status" ][ "codError" ] ) {
            case "000":
                $arDataFlights[ "numPages" ] = ceil( $arDataFlights["status"][ "numRows" ] / $numRowsPerPage );
                $arDataFlights[ "numPageActual" ] = $numPage;

                foreach($arDataFlights['data'] as $key01 => $flight) {
                    foreach ($flight as $key02 => $value) {
                        if($key02 === 'departureHour' || $key02 === 'arrivalHour') {
                            $arDataFlights['data'][$key01][$key02]= mod03_formatHour($value);
                        }
                    }
                }
                break;
            case "001":
                break;
            case "001":
                break;
            default:
        }

        return $arDataFlights;
    }

    function mod03_formatHour($hour){
        $newHour = explode(':', $hour)[0].'h '.explode(':', $hour)[1].'m';

        return $newHour;
    }

    function mod03_getDatapassengers( ) {
        $arDataPassengers = mod02_getDatapassengers( );

        return $arDataPassengers;
    }

    function mod03_getDetailInfant( $idInfant ) {
        $arDetailInfant = mod02_getDetailInfant( $idInfant );

        switch ( $arDetailInfant[ "status"][ "codError" ] ) {
            case "000":
                $infant = $arDetailInfant["data"][0];
                if ($infant[ 'sex' ] === 1) {
                    $arDetailInfant["data"][0]["sex"] = "Female";
                } else {
                    $arDetailInfant["data"][0]["sex"] = "Male";
                }

                $today = date("Y-m-d");
                $diff = date_diff(date_create($infant["dateOfBirth"]), date_create($today));

                if ($diff->format('%y') === '0') {
                    $arDetailInfant["data"][0]["dateOfBirth"] = $diff->format('%m months');
                } else {
                    $arDetailInfant["data"][0]["dateOfBirth"] = $diff->format('%y years');
                }
                break;
            case "001":
                break;
            case "002":
                break;
            default:
        }

        return $arDetailInfant;
    }

    function mod03_getDataAirports( ) {
        $arDataAirports= mod02_getDataAirports( );

        return $arDataAirports;
    }

    function mod03_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport ) {
        $initFlightCode = substr( $codIATAAirline, 0, 2 );
        $lastFlightCode = mod02_getLastCodeFlight( $initFlightCode )[ "data" ][ 0 ][ "codeFlight" ];
        $flightCode = substr( $lastFlightCode, 0, 2 ) . strval( intval( substr( $lastFlightCode, 2, 4 )) + 1 );
        $datetimeDeparture = str_replace('T', ' ', $datetimeDeparture).':00';
        $datetimeArrival = str_replace('T', ' ', $datetimeArrival).':00';

        $arInsDataFlight = mod02_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $flightCode );

        return $arInsDataFlight;
    }

    function mod03_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $flightCode, $flightID ) {
        $initFlightCode = substr($codIATAAirline, 0, 2);
        $lastFlightCode = mod02_getLastCodeFlight($initFlightCode)["data"][0]["codeFlight"];

        if ( $initFlightCode !== substr( $flightCode, 0, 2 ) ) {
            $newFlightCode = substr( $lastFlightCode, 0, 2 ) . strval( intval( substr( $lastFlightCode, 2, 4 )) + 1 );
        } else {
            $newFlightCode = $flightCode;
        }
        $datetimeDeparture = str_replace( 'T', ' ', $datetimeDeparture ).':00';
        $datetimeArrival = str_replace( 'T', ' ', $datetimeArrival ).':00';

        $arUpdtDataFlight = mod02_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $newFlightCode, $flightID );

        return $arUpdtDataFlight;
    }

    function mod03_getDataDBbySearch( $term ) {
        $arResultDataDB = mod02_getDataDBbySearch( $term );

        return $arResultDataDB;
    }

    function mod03_chkLoginUser( $email, $password ) {

        $arDataLogin = mod02_chkLoginUser( $email, $password );

        switch ( $arDataLogin[ "status" ][ "codError" ] ) {
            case "000":
                    if ( $arDataLogin[ "status" ][ "numRows" ] === 1 ) {
                        $_SESSION[ "idUser" ]   = $arDataLogin[ "data" ][ 0 ][ "idUser" ];
                        $_SESSION[ "username" ] = $arDataLogin[ "data" ][ 0 ][ "username" ];
                    }
                break;
        }

        return $arDataLogin;

    }
?>