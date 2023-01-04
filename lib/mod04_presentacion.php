
<?php
	require( "mod03_logica.php" );

	function mod04_getDataAircrafts() {
        $arDataAllAircraft = mod03_getDataAircrafts();

        switch ( $arDataAllAircraft[ "status"][ "codError" ] ) {
            case "000":
                $strDataAircrafts = <<<HTML
                                            <div class='container-fluid'>
                                                <h1 class='text-center mt-3 f-green-blue'>Aircrafts</h1>
                                                <hr class='mx-3  border border-1 border-persian opacity-100'>
                                    HTML;

                foreach ( $arDataAllAircraft[ "data" ] as $aircraft ){
                    $strDataAircrafts.= <<<HTML
                                                <div class='column-xs row mx-2'>
                                                    <div class='col-12 col-md-4'>
                                                        <img src='images/aircrafts/{$aircraft[ 'photo' ]}' class='img-fluid rounded'/>
                                                    </div>
                                                    <div class='column col-12 col-md-4 text-center mt-2 mt-md-0'>
                                                        <div class='row'>
                                                            <div class='col-6 col-md-8'>
                                                                <h3 class=''>{$aircraft[ 'namefactory' ]} {$aircraft['model']} </h3>
                                                            </div>
                                                            <div class='col-6 col-md-4'>
                                                                <button class="btn btn-warning btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#acft{$aircraft['model']}" aria-expanded="false" aria-controls="collapseExample">
                                                                    Details Aircraft
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class='col-12 mt-2 mt-md-0'>
                                                            <h3 class='text-center f-green-blue'>Airlines</h3>
                                                            <form action='airlines.php' method='get' target=''>
                                                                <div class='btn-group' role='group' aria-label='Basic radio toggle button group'>
                                            HTML;

                    foreach ( $aircraft[ "airlines" ] as $airline ) {
                        $strDataAircrafts.= <<<HTML
                                                                    <input name='codIATA' type='radio' autocomplete='off' class='btn-check hidden' value="all" checked/>
                                                                    <input name='codIATA' type='radio' id="{$aircraft['model']}{$airline[ 'codIATA' ]}" autocomplete='off' class='btn-check' value="{$airline[ 'codIATA' ]}"/>
                                                                    <label class='btn btn-outline-primary text-capitalize rounded mx-1' for="{$aircraft['model']}{$airline[ 'codIATA' ]}">{$airline[ 'nameAirline' ]}</label>
                                            HTML;
                    }

                    $strDataAircrafts.= <<<HTML
                                                                </div>
                                                                <input class='btn bg-aeroblue btn-outline-dark' type='submit' value='See Airline'>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class='col-12 col-md-4 mt-2 mt-md-0'>
                                                                <div class="collapse" id="acft{$aircraft['model']}">
                                                                <div class="card card-body bg-keppel">
                                                                    <p><strong>Manufacturer: </strong>{$aircraft['namefactory']}</p>
                                                                    <p><strong>Registration Number: </strong>{$aircraft['registrationNumber']}</p>
                                                                    <p><strong>Seats: </strong>{$aircraft['seat']}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <hr class='mx-1 border border-1 border-greenblue opacity-100'>
                                            HTML;
                }
                break;
            case "001":
                break;
            case "002":
                $strDataAircrafts = "<p>There has been a problem.</p>";
                $strDataAircrafts.= "<p>codError: {$arDataAllAircraft[ "status" ][ "codErrorSQL" ]}</p>";
                $strDataAircrafts.= "<p>codError: {$arDataAllAircraft[ "status" ][ "desErrorSQL" ]}</p>";
                $arDataAllAircraft["data"]["textError"] = $strDataAircrafts;
                break;
            default:
        }

        $strDataAircrafts.= <<<HTML
                                    </div>
                                HTML;

        return $strDataAircrafts;
    }

    function mod04_getDataAirlines($codIATA) {
        $arDataAirlines = mod03_getDataAirlines( $codIATA );

        switch ( $arDataAirlines[ "status"][ "codError" ] ) {
            case "000":

                $strDataAirlines = <<<HTML
                                            <div class='container-fluid'>
                                    HTML;

                if ( count( $arDataAirlines[ 'data' ] ) == 1 ) {
                    $arAirline = $arDataAirlines[ "data" ][ 0 ];
                    $strDataAirlines.= <<<HTML
                                                <div class='container card mb-3 border border-0'>
                                                    <div class='card-body'>
                                                        <div class='col-4 mb-3'>
                                                            <img src='images/logos/{$arAirline[ 'logo' ]}' class='img-fluid' alt='logo'>
                                                        </div>
                                                        <div class="h-50">
                                                            <p><strong>IATA Code: </strong>  {$arAirline[ 'codIATA' ]}</p>
                                                            <p><strong>Country: </strong> {$arAirline[ 'country' ]}</p>
                                                            <p><strong>Description: </strong></p>
                                                            <p> {$arAirline[ 'description' ]}</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                        HTML;
                } else {

                    $strDataAirlines.= <<<HTML
                                                <h1 class='text-center mt-3 f-green-blue'>Airlines</h1>
                                                <hr class='mx-3  border border-1 border-persian opacity-100'>
                                                <div class='container'>
                                                    <div class="row row-cols-2 row-cols-md-3 g-5 my-3">
                                        HTML;

                    foreach ( $arDataAirlines[ "data" ] as $airline ) {
                        $strDataAirlines.= <<<HTML
                                                        <div class='col'>
                                                            <div class='card h-100 text-center shadow pb-3'>
                                                                <div class='col-12 p-2 h-75 d-flex flex-column justify-content-center align-items-center'>
                                                                    <img src="images/logos/{$airline[ 'logo' ]}" class="img-fluid px-2 w-75" alt="logo">
                                                                </div>
                                                                <div class='card-body h-25 d-flex flex-column justify-content-center align-items-center mb-3'>
                                                                    <h5 class='card-title text-capitalize'>{$airline[ "nameAirline" ]}</h5>
                                                                    <a class='btn btn-primary mx-3' href='airlines.php?codIATA={$airline[ 'codIATA' ]}'>See Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                            HTML;
                    }

                    $strDataAirlines.= <<<HTML
                                                    </div>
                                                </div>
                                        HTML;
                }

                $strDataAirlines.= <<<HTML
                                            </div>
                                        HTML;
                break;
            case "001":
                break;
            case "002":
                $strDataAirlines = "<p>There has been a problem.</p>";
                $strDataAirlines.= "<p>codError: {$arDataAirlines[ "status" ][ "codErrorSQL" ]}</p>";
                $strDataAirlines.= "<p>codError: {$arDataAirlines[ "status" ][ "desErrorSQL" ]}</p>";
                $arDataAirlines["data"]["textError"] = $strDataAirlines;
                break;
            default:
        }

        return $strDataAirlines;
    }

    function mod04_getDetailEmployees( $type ) {
        $arDataEmployees = mod03_getDataEmployees( $type );

        switch ( $arDataEmployees[ "status"][ "codError" ] ) {
            case "000":

                $strDetailEmployees = <<<HTML
                                            <div class='container-fluid'>
                                                <h1 class='text-center mt-3 f-green-blue'>Employees</h1>
                                                <hr class='mx-3 bg-primary'>
                                                <div class='m-5 px-5'>
                                                    <div class='d-flex flex-row justify-content-start align-items-center'>
                                                        <div class='col-2'>
                                                            <h3 class='d-none'>Photo</h3>
                                                        </div>
                                                        <h3 class='col'>Name Employee </h3>
                                                        <h3 class='col'>Document </h3>
                                                        <h3 class='col'>Date of birth  </h3>
                                                        <h3 class='col'>Airline at work </h3>
                                                    </div>
                                                    <hr class='mx-1 bg-primary'>
                                        HTML;
                $arEmployees = $arDataEmployees[ "data" ];
                foreach ($arEmployees as $employee) {

                    $strDetailEmployees.= <<<HTML
                                                    <div class='d-flex flex-row justify-content-start align-items-center'>
                                                        <div class='col-2'>
                                                            <img src='images/imgemployees/{$employee[ 'photo' ]}' class='w-25' />
                                                        </div>
                                                            <p class='col'>{$employee[ "nameEmployee" ]}</p>
                                                            <p class='col'>{$employee[ "identificationDocument" ]}</p>
                                                            <p class='col prueba'>{$employee[ "dateOfBirth" ]}</p>
                                                            <a class='col text-capitalize text-decoration-none' href='airlines.php?codIATA={$employee[ 'codIATA' ]}'>{$employee[ 'nameAirline' ]}</a>
                                                    </div>
                                                    <hr class='mx-3 bg-primary'>
                                            HTML;
                }

                $strDetailEmployees.= <<<HTML
                                                </div>
                                            </div>
                                        HTML;
                break;
            case "001":
                break;
            case "002":
                $strDetailEmployees = "<p>There has been a problem.</p>";
                $strDetailEmployees.= "<p>codError: {$arDataEmployees[ "status" ][ "codErrorSQL" ]}</p>";
                $strDetailEmployees.= "<p>codError: {$arDataEmployees[ "status" ][ "desErrorSQL" ]}</p>";
                $arDataEmployees["data"]["textError"] = $strDetailEmployees;
                break;
            default:
        }

        return $strDetailEmployees;
    }

    function mod04_getDatapassengers() {
        $arDataPassengers = mod03_getDatapassengers( );

        switch ( $arDataPassengers[ "status"][ "codError" ] ) {
            case "000":
                $arpassengers = $arDataPassengers[ "data" ];

                $strDetailpassengers = <<<HTML
                                                <div class='container-fluid'>
                                                    <h1 class='text-center mt-3 f-green-blue'> Passengers</h1>
                                                    <hr class='mx-3  border border-1 border-persian opacity-100'>
                                                    <div class='container-fluid d-none d-md-block'>
                                                        <div class='d-flex justify-content-start align-items-center'>
                                                            <h5 class='col-2 text-center'>Name</h5>
                                                            <h5 class='col-4 text-center'>Email</h5>
                                                            <h5 class='col-2 text-center'>Phone</h5>
                                                            <h5 class='col-2 text-center'>Ticket Number</h5>
                                                            <h5 class='col-2 text-center'>Travel with Infant</h5>
                                                        </div>
                                                        <hr class='mx-1 border border-primary opacity-100'>
                                            HTML;

                foreach ($arpassengers as $passenger){
                    $strDetailpassengers.=  <<<HTML
                                                        <div class='d-flex justify-content-start align-items-center h-100'>
                                                            <p class='col-2 m-0'>{$passenger[ 'passengerSurname' ]} {$passenger[ 'passengerName' ]}</p>
                                                            <p class='col-4 m-0'>{$passenger[ 'emailPassenger' ]}</p>
                                                            <p class='col-2 m-0'>{$passenger[ 'phonePassenger' ]}</p>
                                                            <p class='col-2 m-0'>{$passenger[ 'nameTicket' ]}</p>
                                                            <div class='col-2'>
                                            HTML;

                    if($passenger['travelWithInfant'] == 1){
                        $strDetailpassengers.=  <<<HTML
                                                                <p class='text-center'>
                                                                    <button data-idinfant='{$passenger['idPassenger']}' class='btn-info-infant infant btn btn-primary' type='button'>
                                                                        Infant Information
                                                                    </button>
                                                                </p>
                                                HTML;
                    }

                    $strDetailpassengers.=  <<<HTML
                                                            </div>
                                                        </div>
                                                        <hr class='mx-1 border border-1 border-greenblue opacity-100'>
                                            HTML;
                }

                $strDetailpassengers.= <<<HTML
                                                    </div>
                                                    <div class='row row-cols-1 row-cols-md-3 g-4 my-3 d-md-none'>
                                        HTML;

                foreach ($arpassengers as $passenger){
                    $strDataInfant = '';

                    if($passenger['travelWithInfant'] == 1){
                        $strDataInfant = <<<HTML
                                                        <div class='text-center'>
                                                            <button data-idinfant='{$passenger['idPassenger']}' class='btn-info-infant btn btn-primary btn-sm' type='button'>
                                                            Infant Information
                                                            </button>
                                                        </div>
                                            HTML;
                    }

                    $strDetailpassengers.=   <<<HTML
                                                        <div class='col-6'>
                                                            <div class='card h-100 border-persian bg-aeroblue shadow'>
                                                                <div class='card-body'>
                                                                    <h5 class='card-title'>{$passenger[ 'passengerSurname' ]} {$passenger[ 'passengerName' ]}</h5>
                                                                    <p class='card-text'>{$passenger[ 'emailPassenger' ]}</p>
                                                                    <p class='card-text'><strong>Phone: </strong>{$passenger[ 'phonePassenger' ]}</p>
                                                                    <p class='card-text'><strong>Ticket Number: </strong>{$passenger[ 'nameTicket' ]}</p>
                                                                    $strDataInfant
                                                                </div>
                                                            </div>
                                                        </div>
                                            HTML;
                }

                $strDetailpassengers.= <<<HTML
                                                    </div>
                                                </div>
                                        HTML;

                case "001":
                    break;
                case "002":
                    $strDetailpassengers = "<p>There has been a problem.</p>";
                    $strDetailpassengers.= "<p>codError: {$arDataPassengers[ "status" ][ "codErrorSQL" ]}</p>";
                    $strDetailpassengers.= "<p>codError: {$arDataPassengers[ "status" ][ "desErrorSQL" ]}</p>";
                    $arDataPassengers["data"]["textError"] = $strDetailpassengers;
                        break;
                default:
            }

        return $strDetailpassengers;
    }

    function mod04_getDetailInfant( $idInfant ){
        $arDetailInfant = mod03_getDetailInfant( $idInfant );
        $strDetailInfant = '';

        switch( $arDetailInfant[ "status" ][ "codError" ] ) {
            case "000":
                $infant = $arDetailInfant[ "data" ][0];

                $strDetailInfant = <<<HTML
                                        <div class='d-flex justify-content-center align-items-center h-100'>
                                            <div class='infantcard col-8 col-md-6 card'>
                                                <h5 class='card-header text-center bg-keppel'>Infant Data</h5>
                                                <div class='card-body'>
                                                    <p class='card-text'><strong>Name: </strong>{$infant['infantName']}</p>
                                                    <p class='card-text'><strong>Gender: </strong>{$infant['sex']}</p>
                                                    <p class='card-text'><strong>Age: </strong>{$infant['dateOfBirth']}</p>
                                                    <div class='d-flex justify-content-end'>
                                                        <button class='cls-ovly-infant btn btn-warning btn-outline-dark btn-sm text-end' type='button'>Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    HTML;
                $arDetailInfant["data"]["detailInfant"] = $strDetailInfant;
                break;
            case "002":
                $strDetailInfant = "<p>There has been a problem.</p>";
                $strDetailInfant.= "<p>codError: {$arDetailInfant[ "status" ][ "codErrorSQL" ]}</p>";
                $strDetailInfant.= "<p>codError: {$arDetailInfant[ "status" ][ "desErrorSQL" ]}</p>";
                $arDetailInfant["data"]["textError"] = $strDetailInfant;
                break;
        }

        return $arDetailInfant;
    }

    function mod04_pagination( $numPage, $numRowsPerPage, $category ){
        $arData = '';
        switch ($category) {
            case 'flights':
                $arData = mod03_getDataFlights($numPage, $numRowsPerPage);
                $previous = $arData[ "numPageActual" ] - 1;
                $current = $arData[ "numPageActual" ];
                $next = $arData[ "numPageActual" ] + 1 ;
                $pages  = ceil($arData[ "totalRows" ] / $numRowsPerPage);

                switch ( $arData[ "status"][ "codError"] ) {
                    case "000":
                        $strDataFlights = <<<HTML
                                                <div class='container-fluid'>
                                                    <h1 class='text-center mt-3 f-green-blue'>Flights</h1>
                                                    <a class='insert-flight btn btn-warning btn-outline-dark'  role='button'>Insert a new Flight</a>
                                                    <hr class='border border-1 border-persian opacity-100'>
                                                        <div class='d-flex justify-content-start align-items-center'>
                                                            <h5 class='col text-center'>Number Flight</h5>
                                                            <h5 class='col text-center d-none d-md-block'>Aeronave</h5>
                                                            <h5 class='col text-center d-none d-md-block'>Departure Date</h5>
                                                            <h5 class='col text-center d-none d-md-block'>Arrival Date</h5>
                                                            <h5 class='col text-center'>Airline</h5>
                                                            <h5 class='col text-center'>Origin </h5>
                                                            <h5 class='col text-center'>Destination</h5>
                                                            <h5 class='col text-center'>Actions</h5>
                                                        </div>
                                                        <hr class='border border-primary opacity-100'>
                                            HTML;

                        foreach ($arData['data']  as $flight) {
                            $strDataFlights.= <<<HTML
                                                    <div id='div{$flight[ "flightCode" ]}' class='d-flex justify-content-start align-items-center'>
                                                        <p name='flightId' class='hidden' value='{$flight[ "flightId" ]}' >{$flight[ "flightCode" ]}</p>
                                                        <p name='flightCode' class='col text-center fs-6' value='{$flight[ "flightCode" ]}' >{$flight[ "flightCode" ]}</p>
                                                        <p name='aircraft' class='col text-center fs-6 d-none d-md-block' value='{$flight[ "maker" ]} {$flight[ "model" ]}'>{$flight[ "maker" ]} {$flight[ "model" ]}</p>
                                                        <p name='departuredate' class='col text-center fs-6 d-none d-md-block'>{$flight[ "departureDate" ]} {$flight[ "departureHour" ]}</p>
                                                        <p name='arrivaldate' class='col text-center fs-6 d-none d-md-block'>{$flight[ "arrivalDate" ]} {$flight[ "arrivalHour" ]}</p>
                                                        <p name='airline' class='col text-center fs-6'><a class='text-capitalize text-decoration-none' href='airlines.php?codIATA={$flight[ 'codIATA' ]}'>{$flight[ 'nameAirline' ]}</a></p>
                                                        <p name='origin' class='col text-center fs-6'>{$flight[ "departure" ]}</p>
                                                        <p name='destination' class='col text-center fs-6'>{$flight[ "arrival" ]}</p>
                                                        <div class=' col btn-group'>
                                                                <a data-id='{$flight[ "flightCode" ]}' class='btnedit btn bg-secondary' href='#'> 
                                                                    <i class='fas fa-edit'></i>
                                                                </a>
                                                                <a data-id='{$flight[ "flightId" ]}' class='btndelete btn bg-danger' href='#'> 
                                                                    <i class='fas fa-trash-alt'></i>
                                                                </a>
                                                            </div>
                                                    </div>
                                                    <hr class='mx-1 border border-1 border-greenblue opacity-100'>
                                                HTML;
                        }

                        $strDataFlights.= <<<HTML
                                                </div>
                                                <nav class='' aria-label='Page navigation example'>
                                                    <ul class='pagination justify-content-center'>
                                            HTML;
                        if ($current == 1) {
                                $strDataFlights.= <<<HTML
                                                            <li class='page-item disabled'>
                                                    HTML;
                        } else {
                                $strDataFlights.= <<<HTML
                                                        <li class='page-item'>
                                                    HTML;
                        }

                        $strDataFlights.= <<<HTML
                                                    <a class='page-link border border-1 border-dark bg-turquoise shadow' href='flights.php?page=$previous'>Previous</a>
                                                </li>
                                                <li class='page-item'><a class='page-link border border-1 border-dark bg-turquoise shadow' href='#'>$current</a></li>
                                            HTML;

                        if ($current === intval($pages)) {
                            $strDataFlights.= <<<HTML
                                                    <li class='page-item disabled'>
                                                HTML;
                        } else {
                            $strDataFlights.= <<<HTML
                                                    <li class='page-item'>
                                                HTML;
                        }

                        $strDataFlights.= <<<HTML
                                                    <a class='page-link border border-1 border-dark bg-turquoise shadow' href='flights.php?page=$next'>Next</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            HTML;
                        break;
                    case "001":
                        break;
                    case "002":
                        $strDataFlights = "<p>There has been a problem.</p>";
                        $strDataFlights.= "<p>codError: {$arData[ "status" ][ "codErrorSQL" ]}</p>";
                        $strDataFlights.= "<p>codError: {$arData[ "status" ][ "desErrorSQL" ]}</p>";
                        $arData[ "data" ][ "textError" ] = $strDataFlights;
                        break;
                    default:
                }

                break;
                //TODO pendiente por realizar
            case 'employees':
                $arData = mod03_getDataEmployees($numPage, $numRowsPerPage);
                break;
        }
        return $strDataFlights;
    }

    function mod04_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport ) {
        $arInsDataFlight = mod03_insertDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport );

        switch( $arInsDataFlight[ "status" ][ "codError" ] ) {
            case "000":
                $msgInsert =    <<<HTML
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>Inserted!</strong> The flight was inserted successfully.
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    HTML;
                $arInsDataFlight[ "resultinsert" ] = $msgInsert;
                break;
            case "001":
                break;
            case "002":
                $msgInsert = "<p>There has been a problem.</p>";
                $msgInsert.= "<p>codError: {$arInsDataFlight[ "status" ][ "codErrorSQL" ]}</p>";
                $msgInsert.= "<p>codError: {$arInsDataFlight[ "status" ][ "desErrorSQL" ]}</p>";
                $arInsDataFlight[ "data" ][ "textError" ] = $msgInsert;
                break;
            default:
        }

        return $arInsDataFlight;
    }

    function mod04_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $flightCode, $flightID ) {
        $arUpdtDataFlight = mod03_updateDataFlight( $datetimeDeparture, $datetimeArrival, $codIATAAirline, $idAircraft, $idDestinationAirport, $idOriginAirport, $flightCode, $flightID );

        switch( $arUpdtDataFlight[ "status" ][ "codError" ] ) {
            case "000":
                $msgUpdate = <<<HTML
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>Inserted!</strong> The flight {$arUpdtDataFlight["flightCode"]} was updated successfully.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                HTML;
                $arUpdtDataFlight["resultupdate"] = $msgUpdate;
                break;
            case "001":
                    break;
            case "002":
                $msgUpdate = "<p>There has been a problem.</p>";
                $msgUpdate.= "<p>codError: {$arUpdtDataFlight[ "status" ][ "codErrorSQL" ]}</p>";
                $msgUpdate.= "<p>codError: {$arUpdtDataFlight[ "status" ][ "desErrorSQL" ]}</p>";
                $arUpdtDataFlight[ "data" ][ "textError" ] = $msgUpdate;
                break;
            default:
        }

        return $arUpdtDataFlight;
    }

    function mod04_getDataDBbySearch($term){
        $arResultDataDB = mod03_getDataDBbySearch($term);

        switch($arResultDataDB["status"]["codError"]){

            case "000":
                $resultSearch = "";
                foreach($arResultDataDB["data"] as $resultItem){
                    $resultSearch .= <<<HTML
                                            <div class='res-search-container bg-dark bg-opacity-100 border border-greenblue rounded'>
                                                <a class='text-decoration-none' href="detail.element.search.php?name={$resultItem['name']}&photo={$resultItem['photo']}&otherdata={$resultItem['otherdata']}&type={$resultItem['type']}">
                                                    <div class='d-flex justify-content-around'>
                                                        <div class='column col-8'>
                                                            <spam class='text-white'><strong>{$resultItem['name']}</strong></spam><br>
                                                            <spam class='text-white text-capitalize'>{$resultItem['otherdata']}</spam>
                                                        </div>
                                                        <div class='col-2'>
                                        HTML;
                    if ( $resultItem['type'] === 'employee' ) {
                        $resultSearch .= <<<HTML
                                                            <img class='img-fluid w-100' src='images/imgemployees/{$resultItem['photo']}' alt='photo'>
                                            HTML;
                    } else if( $resultItem['type'] === 'aircraft' ){
                        $resultSearch .= <<<HTML
                                                            <img class='img-fluid w-100' src='images/aircrafts/{$resultItem['photo']}' alt='photo'>
                                            HTML;
                    } else if ( $resultItem['type'] === 'airline' ){
                        $resultSearch .= <<<HTML
                                                            <img class='img-fluid w-100' src='images/logos/{$resultItem['photo']}' alt='photo'>
                                            HTML;
                    }

                    $resultSearch .=                    <<<HTML
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        HTML;
                }
                break;
            case "001":
                $resultSearch  = <<<HTML
                                        <div class='bg-dark bg-opacity-75 border border-greenblue rounded p-2'>
                                            <div class='col-12 d-flex'>
                                                <div class='w-100'>
                                                    <spam class='text-white'>There are no data with: </spam><br>
                                                    <span class='fw-bold text-warning'>"$term"</span>
                                                </div>
                                            </div>
                                        </div>
                                    HTML;
                break;
            case "002":
                $resultSearch = "<p>There has been a problem.</p>";
                $resultSearch.= "<p>codError: {$arResultDataDB[ "status" ][ "codErrorSQL" ]}</p>";
                $resultSearch.= "<p>codError: {$arResultDataDB[ "status" ][ "desErrorSQL" ]}</p>";
                $arResultDataDB[ "data" ][ "textError" ] = $resultSearch;
                break;
        }
        return $resultSearch;
    }
?>