<?php
    require ("mod01_conexion.php");

    function mod02_executeQuery( $strSQL, $arAttributes) {
        $link = mod01_conectoBD();

        $result = mysqli_query( $link, $strSQL );

        if ( $result ) {
            $numRows = mysqli_num_rows( $result );
            if ( $numRows !== 0 ) {
                $arRetorno[ "status" ][ "codError" ] = "000";
                $arRetorno[ "status" ][ "numRows" ] = $numRows;
                $i = 0;
                while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
                    foreach( $arAttributes as $value ) {
                        if ( isset( $value[ 2 ] ) ) {
                            if ( $value[ 2 ] === "bool" ) {
                                $arRetorno[ "data" ][ $i ][ $value[ 1 ] ] = (bool)$row[ $value[ 0 ] ];
                            }
                        } else {
                            $arRetorno[ "data" ][ $i ][ $value[ 1 ] ] = $row[ $value[ 0 ] ];
                        }
                    }
                    $i++;
                }
            } else {
                $arRetorno[ "status" ][ "codError" ] = "001";
                $arRetorno[ "status" ][ "strSQL" ] = $strSQL;
            }
        } else {
            $arRetorno[ "status" ][ "codError" ] = "002";
            $arRetorno[ "status" ][ "strSQL" ] = $strSQL;
            $arRetorno[ "status" ][ "codErrorSQL" ] = mysqli_errno( $link );
            $arRetorno[ "status" ][ "desErrorSQL" ] = mysqli_error( $link );
        }

        mod01_desconectoBD( $link );

        return $arRetorno;
    }

    function mod02_getDataAircrafts() {
        $arAttributes = [
                            [ "idaeronave",          "idAirplane"         ],
                            [ "codIATAaerolinea",    "codIATA"            ],
                            [ "nomaerolinea",        "nameAirline"        ],
                            [ "pais",                "country"            ],
                            [ "matricula",           "registrationNumber" ],
                            [ "numasientos",         "seat"               ],
                            [ "feccompra",           "dateOfPurchase"     ],
                            [ "foto",                "photo"              ],
                            [ "modelo",              "model"              ],
                            [ "nomfabricante",       "namefactory"        ],
                        ];

        $strSQL =   "   SELECT A.`idaeronave`,A.`codIATAaerolinea`,AL.`nomaerolinea`,`pais`,`matricula`,A.`numasientos`,`feccompra`,`foto`,M.`modelo`,F.`nomfabricante`
                            FROM `013_aeronaves` A
                            LEFT JOIN `003_modelos` M
                            ON A.`idmodelo` =M.`idmodelo`
                            INNER JOIN `002_fabricantes` F
                            ON M.`idfabricante` = F.`idfabricante`
                            INNER JOIN `007_aerolineas` AL
                            ON A.`codIATAaerolinea` = AL.`codIATAaerolinea`
                    ";

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );

        return $arRetorno;
    }

    function mod02_getDataAirlines( $codIATA ) {
        $arAttributes = [
                            [ "codIATAaerolinea",   "codIATA"     ],
                            [ "nomaerolinea",       "nameAirline" ],
                            [ "pais",               "country"     ],
                            [ "logo",               "logo"        ],
                            [ "descripcion",        "description" ]
                        ];

        if ( $codIATA === 'all' ) {
            $strSQL =   "   SELECT `codIATAaerolinea`,`nomaerolinea`, `pais`, `logo`,`descripcion`
                            FROM `007_aerolineas`
                        ";
        } else {
            $strSQL =   "   SELECT `codIATAaerolinea`,`nomaerolinea`, `pais`, `logo`,`descripcion`
                            FROM `007_aerolineas`
                            WHERE `codIATAaerolinea` = '$codIATA'
                        ";
        }

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );

        return $arRetorno;
    }

    function mod02_getDataEmployees( $type ) {
        $arAttributes = [
                            [ "docidentificativo",  "identificationDocument" ],
                            [ "nomempleados",       "nameEmployee"           ],
                            [ "fecnacimiento",      "dateOfBirth"            ],
                            [ "sexo",               "gender"                 ],
                            [ "codIATAaerolinea",   "codIATA"                ],
                            [ "idcargo",            "idJobTitle"             ],
                            [ "foto",               "photo"                  ],
                            [ "nomaerolinea",       "nameAirline"            ]
                        ];

        $strSQL =   "   SELECT E.`docidentificativo`,`nomempleados`,`fecnacimiento`,`sexo`,E.`codIATAaerolinea`,`idcargo`,`foto`,A.`nomaerolinea`
                        FROM `008_empleados` E
                        INNER JOIN `007_aerolineas` A
                        ON E.`codIATAaerolinea`= A.`codIATAaerolinea`
                    ";

        if ( $type === 'ge' ) {
            $strSQL.= " INNER JOIN `010_empaeropuertos` EA
                        ON E.`docidentificativo` = EA.`docidentificativo`
                        ";
        } else if ( $type === 'ce' ) {
            $strSQL.= " INNER JOIN `011_tripulaciones` T
                        ON E.`docidentificativo` = T.`docidentificativo`
                        ";
        }

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );

        return $arRetorno;
    }

    function mod02_getDataFlights( $numRowIni, $numRowsPerPage ) {
        $arAttributes = [
                            [ "idvuelo",            "flightId"      ],
                            [ "numeroVuelo",        "flightCode"    ],
                            [ "codIATAaerolinea",   "codIATA"       ],
                            [ "fechaSalida",        "departureDate" ],
                            [ "horaSalida",         "departureHour" ],
                            [ "fechaLlegada",       "arrivalDate"   ],
                            [ "horaLlegada",        "arrivalHour"   ],
                            [ "nomaerolinea",       "nameAirline"   ],
                            [ "nomfabricante",      "maker"         ],
                            [ "modelo",             "model"         ],
                            [ "origen",             "departure"     ],
                            [ "destino",            "arrival"       ]
                        ];

        $arAttributes02 = [ [ "idvuelo",    "flightId" ] ];

        $strSQL =   "  SELECT   `idvuelo`,
                                `codvuelo` AS 'numeroVuelo',
                                AE.`codIATAaerolinea`,
                                `nomaerolinea`,
                                DATE(`fechorasalida`) AS 'fechaSalida', TIME(`fechorasalida`) AS 'horaSalida',
                                DATE(`fechahorallegada`) AS 'fechaLlegada', TIME(`fechahorallegada`) AS 'horaLlegada',
                                `nomaerolinea` AS aerolinea,
                                C.`nomciudad`AS origen,
                                CI.`nomciudad` AS destino,
                                `nomfabricante`,
                                `modelo`
                            FROM `014_vuelos` V
                            INNER JOIN `007_aerolineas` AE
                            ON V.`codIATAaerolinea`= AE.`codIATAaerolinea`
                            INNER JOIN `012_aeropuertos` A1
                            ON V.`idaeropuerto` = A1.`idaeropuerto`
                            INNER JOIN `012_aeropuertos` A2
                            ON V.`idaeropuertodestino` = A2.`idaeropuerto`
                            INNER JOIN `004_ciudades` C
                            ON A1.`codIATAciudad`= C.`codIATAciudad`
                            INNER JOIN `004_ciudades` CI
                            ON A2.`codIATAciudad`= CI.`codIATAciudad`
                            INNER JOIN `013_aeronaves` A
                            ON V.`idaeronave`= A.`idaeronave`
                            INNER JOIN `003_modelos` M
                            ON A.`idmodelo`= M.`idmodelo`
                            INNER JOIN `002_fabricantes` F
                            ON M.`idfabricante`= F.`idfabricante`
                            ORDER BY `idvuelo`DESC
                            LIMIT $numRowIni, $numRowsPerPage
                    ";

        $strSQLCount = "SELECT `idvuelo` FROM `014_vuelos`";

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );
        $arRetorno["totalRows"] = mod02_executeQuery( $strSQLCount, $arAttributes02 )["status"]["numRows"];

        return $arRetorno;
    }

    function mod02_getDatapassengers() {
        $arAttributes = [
                            [ "idpasajero",         "idPassenger"       ],
                            [ "apellidopax",        "passengerSurname"  ],
                            [ "nompax",             "passengerName"     ],
                            [ "emailpax",           "emailPassenger"    ],
                            [ "telpax",             "phonePassenger"    ],
                            [ "numbilete",          "nameTicket"        ],
                            [ "serviespeciales",    "travelWithInfant"  ],
                            [ "idinfante",          "idInfant"          ]
                        ];

        $strSQL =   "  SELECT P.`idpasajero`, `apellidopax`, `nompax`, `emailpax`, `telpax`, `numbilete`, R.`serviespeciales`, PASI.`idinfante`
                        FROM `005_pasajeros` P
                        INNER JOIN `016_reservas` R
                        ON P.`idpasajero` = R.`idpasajero`
                        LEFT JOIN `017_reservas_con_infantes` RI
                        ON R.`idreserva` = RI.`idreserva`
                        LEFT JOIN `015_pasajeros_infantes` PASI
                        ON  RI.`idinfante` = PASI.`idinfante`
                    ";
        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );

        return $arRetorno;
    }

    function mod02_getDetailInfant( $idInfant ) {
        $arAttributes = [
                            [ "idinfante",       "idInfant"    ],
                            [ "nominfante",      "infantName"  ],
                            [ "sexo",            "sex"         ],
                            [ "fecnacimiento",   "dateOfBirth" ]
                        ];

        $strSQL =   "   SELECT `idinfante`, `nominfante`, `sexo`, `fecnacimiento`
                        FROM `015_pasajeros_infantes`
                        WHERE `idinfante` = $idInfant
                    ";

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );

        return $arRetorno;
    }

    function mod02_getDataAirports() {
        $arAttributes = [
                            [ "idaeropuerto",    "idAirport"   ],
                            [ "nomaeropuerto",   "airportName" ],
                            [ "codIATAciudad",   "codIATACity" ],
                            [ "nomciudad",       "cityName"    ]
                        ];

        $strSQL =   "   SELECT `idaeropuerto`, `nomaeropuerto`, C.`codIATAciudad`, C.`nomciudad`
                        FROM `012_aeropuertos` A
                        INNER JOIN `004_ciudades` C
                        ON A.`codIATAciudad` = C.`codIATAciudad`
                    ";

        $arRetorno = mod02_executeQuery($strSQL, $arAttributes);

        return $arRetorno;
    }

    function mod02_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $codeFlight) {
        $link = mod01_conectoBD();

        $strSQL = " INSERT INTO `014_vuelos`
                    ( `idvuelo`, `codvuelo`, `fechorasalida`, `fechahorallegada`, `codIATAaerolinea`, `idaeronave`, `idaeropuerto`, `idaeropuertodestino`)
                    VALUES
                    ( null, '$codeFlight', '$datetimeDeparture', '$datetimeArrival', '$codIATAAirline', $idAircraft, $idDestinationAirport, $idOriginAirport )";

        $result = mysqli_query( $link, $strSQL );

        if ( $result ) {
            $numRowsAffected = mysqli_affected_rows( $link );
            $arRetorno[ "status" ][ "codError" ]        = "000";
            $arRetorno[ "status" ][ "rowsAffected" ]    = $numRowsAffected;
        } else {
            $arRetorno[ "status" ][ "codError" ]        = "002";
            $arRetorno[ "status" ][ "strSQL" ]          = $strSQL;
            $arRetorno[ "status" ][ "codErrorSQL" ]     = mysqli_errno( $link );
            $arRetorno[ "status" ][ "desErrorSQL" ]     = mysqli_error( $link );
        }

        mod01_desconectoBD($link);

        return $arRetorno;
    }

    function mod02_getLastCodeFlight ( $initCodeFlight ){
        $arAttributes = [ [ "codvuelo", "codeFlight"  ] ];

        $strSQL =   "   SELECT `codvuelo` FROM `014_vuelos` WHERE `codvuelo` LIKE '$initCodeFlight%' ORDER BY `codvuelo` DESC LIMIT 1";

        $arRetorno = mod02_executeQuery($strSQL, $arAttributes);

        return $arRetorno;
    }

    function mod02_getDetailFlight ( $flight_code ) {
        $arAttributes = [   
                            [ "idvuelo",            "flightId"          ],
                            [ "numeroVuelo",        "flightCode"        ],
                            [ "codIATAaerolinea",   "codIATA"           ],
                            [ "fechorasalida",      "departureDatetime" ],
                            [ "fechahorallegada",   "arrivalDatetime"   ],
                            [ "nomaerolinea",       "nameAirline"       ],
                            [ "nomfabricante",      "maker"             ],
                            [ "modelo",             "model"             ],
                            [ "origen",             "departure"         ],
                            [ "destino",            "arrival"           ]
                        ];

        $strSQL =   "  SELECT   `idvuelo`, 
                                `codvuelo` AS 'numeroVuelo', 
                                AE.`codIATAaerolinea`, 
                                `nomaerolinea`,
                                `fechorasalida`, 
                                `fechahorallegada`,
                                `nomaerolinea` AS aerolinea, 
                                C.`nomciudad`AS origen,
                                CI.`nomciudad` AS destino,
                                `nomfabricante`,
                                `modelo`
                            FROM `014_vuelos` V
                            INNER JOIN `007_aerolineas` AE
                            ON V.`codIATAaerolinea`= AE.`codIATAaerolinea`
                            INNER JOIN `012_aeropuertos` A1
                            ON V.`idaeropuerto` = A1.`idaeropuerto`
                            INNER JOIN `012_aeropuertos` A2 
                            ON V.`idaeropuertodestino` = A2.`idaeropuerto`
                            INNER JOIN `004_ciudades` C
                            ON A1.`codIATAciudad`= C.`codIATAciudad`
                            INNER JOIN `004_ciudades` CI
                            ON A2.`codIATAciudad`= CI.`codIATAciudad`
                            INNER JOIN `013_aeronaves` A
                            ON V.`idaeronave`= A.`idaeronave`
                            INNER JOIN `003_modelos` M
                            ON A.`idmodelo`= M.`idmodelo`
                            INNER JOIN `002_fabricantes` F
                            ON M.`idfabricante`= F.`idfabricante`
                            WHERE `codvuelo` = '$flight_code'
                    ";

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );
        //echo '<pre>',var_export($arRetorno),'</pre>';
        return $arRetorno;
    }

    function mod02_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $newFlightCode, $flightID) {
        $link = mod01_conectoBD();

        $strSQL =   "   UPDATE `014_vuelos`
                        SET `idvuelo`               = '$flightID',
                            `codvuelo`              = '$newFlightCode',
                            `fechorasalida`         = '$datetimeDeparture',
                            `fechahorallegada`      = '$datetimeArrival',
                            `codIATAaerolinea`      = '$codIATAAirline',
                            `idaeronave`            = '$idAircraft',
                            `idaeropuerto`          = '$idOriginAirport',
                            `idaeropuertodestino`   = '$idDestinationAirport'
                        WHERE `idvuelo`             = '$flightID'
                    ";

        $result = mysqli_query( $link, $strSQL );

        if ( $result ) {
            $numRowsAffected = mysqli_affected_rows( $link );
            $arRetorno[ "status" ][ "codError" ]        = "000";
            $arRetorno[ "status" ][ "rowsAffected" ]    = $numRowsAffected;
            $arRetorno[ "flightCode" ]        = $newFlightCode;
        } else {
            $arRetorno[ "status" ][ "codError" ]        = "002";
            $arRetorno[ "status" ][ "strSQL" ]          = $strSQL;
            $arRetorno[ "status" ][ "codErrorSQL" ]     = mysqli_errno( $link );
            $arRetorno[ "status" ][ "desErrorSQL" ]     = mysqli_error( $link );
        }

        mod01_desconectoBD($link);

        return $arRetorno;
    }

    function mod02_deleteFlight( $flightID ){
        $link = mod01_conectoBD();

        $strSQL = " DELETE FROM `018_equipajes`
                    WHERE `idreserva` =
                    (SELECT `idreserva` FROM `016_reservas` WHERE `idvuelo` = '$flightID' );

                    DELETE FROM `017_reservas_con_infantes`
                    WHERE `idreserva` =
                    (SELECT `idreserva` FROM `016_reservas` WHERE `idvuelo` = '$flightID' );

                    DELETE FROM `016_reservas`
                    WHERE `idvuelo` = '$flightID' ;

                    DELETE FROM `014_vuelos`
                    WHERE `idvuelo` = '$flightID';
                    ";


        $result = mysqli_multi_query( $link, $strSQL );
        // echo '<pre>',var_export($result),'</pre>';
        if ( $result ) {
            $numRowsAffected = mysqli_affected_rows( $link );
            $arRetorno[ "status" ][ "codError" ]        = "000";
            $arRetorno[ "status" ][ "rowsAffected" ]    = $numRowsAffected;
            $arRetorno[ "flightID" ]                    = $flightID;
            $arRetorno[ "resultdelete" ]                =   <<<HTML
                                                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                                    <strong>Deleted!</strong> The flight <strong>$flightID</strong> was deleted successfully.
                                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                                </div>
                                                            HTML;
        } else {
            $arRetorno[ "status" ][ "codError" ]        = "002";
            $arRetorno[ "status" ][ "strSQL" ]          = $strSQL;
            $arRetorno[ "status" ][ "codErrorSQL" ]     = mysqli_errno( $link );
            $arRetorno[ "status" ][ "desErrorSQL" ]     = mysqli_error( $link );
        }

        mod01_desconectoBD($link);

        return $arRetorno;
    };

    function mod02_getDataDBbySearch( $term ) {

        $link = mod01_conectoBD();

        $arAttributes = [
                            ["name",        "name"      ],
                            ["photo",       "photo"     ],
                            ["otherdata",   "otherdata" ],
                            ["type",        "type"      ]
                        ];

        $strSQL = " SELECT `nomempleados` AS `name`, `foto` AS `photo`, `nomcargo` AS `otherdata`, 'employee' AS `type`
                    FROM `008_empleados` e
                    INNER JOIN `006_cargos` c
                    ON e.`idcargo` =  c.`idcargo`
                    WHERE `nomempleados` LIKE '%$term%' OR `nomcargo` LIKE '%$term%'
                    UNION ALL
                    SELECT CONCAT(`nomfabricante`,' ', `modelo`) AS `name`, `foto` AS `photo`, `matricula` AS `otherdata`, 'aircraft' AS `type`
                    FROM `013_aeronaves`a
                    INNER JOIN `003_modelos` m
                    ON a.`idmodelo` = m.`idmodelo`
                    INNER JOIN `002_fabricantes` f
                    ON m.`idfabricante` = f.`idfabricante`
                    WHERE `matricula` LIKE '%$term%' OR `nomfabricante` LIKE '%$term%' OR `modelo` LIKE '%$term%'
                    UNION ALL
                    SELECT `nomaerolinea` AS `name`, `logo` AS `photo`, `pais` AS `otherdata`, 'airline' AS `type`
                    FROM `007_aerolineas`
                    WHERE `nomaerolinea` LIKE '%$term%' OR `pais` LIKE '%$term%'
                    ORDER BY `name` ASC
                    LIMIT 10;
                    ";

        $arRetorno = mod02_executeQuery($strSQL, $arAttributes);

        return $arRetorno;
    }

    function mod02_chkLoginUser( $email, $password ) {

        $arAttributes = [
                            [ "idusuario", "idUser"   ],
                            [ "nombre",    "username" ]
                        ];

        $strSQL = "SELECT * FROM `019_usuarios`
                    WHERE `email` = '$email'
                    AND `contraseña` = '$password'";

        $arRetorno = mod02_executeQuery( $strSQL, $arAttributes );
        
        // echo '<pre>',var_export($arRetorno),'</pre>';
        return $arRetorno;
    }
?>