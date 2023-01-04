<?php
    require ("../../lib/mod03_logica.php");

    $id = $_GET['id'];

    if(isset($id)) {
        $arDetailFlight = mod02_getDetailFlight($id);
    } 
    
    $flight = $arDetailFlight["data"][0];
    $flight['departureDatetime'] = substr(str_replace(' ','T',$flight['departureDatetime']),0,-3);
    $flight['arrivalDatetime'] = substr(str_replace(' ','T',$flight['arrivalDatetime']),0,-3);
?>

<div class='d-flex flex-column justify-content-center align-items-center mt-3'>
    <h1 class='updttitle text-center text-white'>Update Form</h1>
    <div class='updtformcontainer col-10 col-md-8 my-3 bg-aeroblue p-3 rounded border border-persian'>
        <form id='updateform' name='insertFlight' method='POST'>
            
            <!-- Id Flight -->
            <div class="row mb-4">
                <div class="col hidden ">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example01">Flight Id</label>
                        <input type="text" name="flightId" id="form6Example01" class="form-control" required="required" 
                            value="<?php echo $flight['flightId']?>" readonly/>
                    </div>
                </div>
            </div>
        
            <!-- Code Flight -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example02">Flight Code</label>
                        <input type="text" name="flightCode" id="form6Example02" class="form-control" required="required" 
                            value="<?php echo $flight['flightCode']?>" readonly/>
                    </div>
                </div>
            </div>
                
            <!-- 2 column grid layout with datetime-local inputs for the departure and arrival Datetime -->
                <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example03">Datetime departure</label>
                        <input type="datetime-local" name="datetimeDeparture" id="form6Example03" class="form-control" required="required" 
                            value="<?php echo $flight['departureDatetime']?>"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example04">Datetime arrival</label>
                        <input type="datetime-local" name="datetimeArrival" id="form6Example04" class="form-control" required="required" 
                            value="<?php echo $flight['arrivalDatetime']?>"/>
                    </div>
                </div>
            </div>

            <!-- 2 column grid layout with select for the aircraft and airline  -->
            <div class="column row-md mb-4">
                <!-- Airline select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example05">Airline</label>
                    <select class="form-select" name="codIATAAirline" aria-label="Default select example" required="required">

                        <?php foreach(mod03_getDataAirlines('all')['data'] as $airline){ ?>
                        <?php       if ($airline['codIATA'] === $flight['codIATA']) { ?>
                                    <option value="<?php echo $airline['codIATA'];?>" selected><?php echo $airline['nameAirline']?></option>
                        <?php   } else { ?>
                                    <option value="<?php echo $airline['codIATA'];?>"><?php echo $airline['nameAirline']?></option>
                        <?php   } ?>
                        <?php } ?>

                    </select>
                </div>

                <!-- Aircraft select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example06">Aircraft</label>
                    <select class="form-select" name="idAircraft" aria-label="Default select example" required="required">
                        <?php foreach(mod03_getDataAircrafts()['data'] as $aircraft){ ?>
                        <?php        if ($aircraft['namefactory'] === $flight['maker'] && $aircraft['model'] === $flight['model']) { ?>
                                    <option value="<?php echo $aircraft['idAirplane'];?>" selected><?php echo $aircraft['namefactory'],' ', $aircraft['model'];?></option>
                        <?php   } else { ?>
                                    <option value="<?php echo $aircraft['idAirplane'];?>"><?php echo $aircraft['namefactory'],' ', $aircraft['model'];?></option>
                        <?php   } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- 2 column grid layout with select inputs for the origin and destination cities -->
            <div class="column row-md mb-4">
                <!-- Origin select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example07">Origen</label>
                    <select class="form-select" name="idOriginAirport" aria-label="Default select example" required="required">
                        <?php foreach(mod03_getDataAirports()['data'] as $airport){ ?>
                        <?php   if ($airport['cityName'] === $flight['departure']) { ?>
                                    <option value="<?php echo $airport['idAirport'];?>" selected><?php echo $airport['cityName']?></option>
                        <?php   } else { ?>
                                    <option value="<?php echo $airport['idAirport'];?>"><?php echo $airport['cityName']?></option>
                        <?php   } ?>
                        <?php } ?>
                    </select>
                </div>

                <!-- Destination select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example08">Destino</label>
                    <select class="form-select" name="idDestinationAirport" aria-label="Default select example" required="required">
                        <?php foreach(mod03_getDataAirports()['data'] as $airport){ ?>
                        <?php   if ($airport['cityName'] === $flight['arrival']) { ?>
                                    <option value="<?php echo $airport['idAirport'];?>" selected><?php echo $airport['cityName']?></option>
                        <?php   } else { ?>
                                    <option value="<?php echo $airport['idAirport'];?>"><?php echo $airport['cityName']?></option>
                        <?php   } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btnupdtflight btn btn-primary btn-block mb-4" value="Save">Save</button>
            <button type="button" id="bu" class="btnupdtclose btn btn-warning btn-outline-dark btn-block mb-4" value="Close">Close</button>
        </form>
    </div>
</div>