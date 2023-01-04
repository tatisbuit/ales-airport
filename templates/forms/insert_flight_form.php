<div class='d-flex flex-column justify-content-center align-items-center mt-3'>
    <h1 class='institle text-center text-white'>Insert Form</h1>
    <div class='insformcontainer col-10 col-md-8 my-3 bg-aeroblue p-3 rounded border border-persian'>
        <form id='insertform' name='insertFlight' method='POST'>
            <!-- 2 column grid layout with datetime-local inputs for the departure and arrival Datetime -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Datetime departure</label>
                        <input type="datetime-local" name="datetimeDeparture" id="form6Example1" class="form-control" required="required"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form6Example1">Datetime arrival</label>
                        <input type="datetime-local" name="datetimeArrival" id="form6Example2" class="form-control" required="required"/>
                    </div>
                </div>
            </div>

            <!-- 2 column grid layout with select for the aircraft and airline  -->
            <div class="row mb-4">
                <!-- Airline select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example3">Airline</label>
                    <select class="form-select" name="codIATAAirline" aria-label="Default select example" required="required">
                        <option disabled hidden selected>Select an airline</option>
                        <?php foreach(mod03_getDataAirlines('all')['data'] as $airline){ ?>
                                    <option value="<?php echo $airline['codIATA'];?>"><?php echo $airline['nameAirline']?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Aircraft select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example4">Aircraft</label>
                    <select class="form-select" name="idAircraft" aria-label="Default select example" required="required">
                        <option disabled hidden selected>Select an aircraft</option>
                        <?php foreach(mod03_getDataAircrafts()['data'] as $aircraft){ ?>
                                    <option value="<?php echo $aircraft['idAirplane'];?>"><?php echo $aircraft['namefactory'],' ', $aircraft['model'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- 2 column grid layout with select inputs for the origin and destination cities -->
            <div class="row mb-4">
                <!-- Origin select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example4">Origen</label>
                    <select class="form-select" name="idOriginAirport" aria-label="Default select example" required="required">
                        <option disabled hidden selected>Select the destination city</option>
                        <?php foreach(mod03_getDataAirports()['data'] as $airport){ ?>
                                    <option value="<?php echo $airport['idAirport'];?>"><?php echo $airport['cityName']?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Destination select -->
                <div class="col form-outline ">
                    <label class="form-label" for="form6Example4">Destino</label>
                    <select class="form-select" name="idDestinationAirport" aria-label="Default select example" required="required">
                        <option disabled hidden selected>Select the city of origin</option>
                        <?php foreach(mod03_getDataAirports()['data'] as $airport){ ?>
                                    <option value="<?php echo $airport['idAirport'];?>"><?php echo $airport['cityName']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="insflightsave btn btn-primary btn-block mb-4" value="Save">Save</button>
            <button type="button" class="insflightclose btn btn-warning btn-outline-dark btn-block mb-4" value="Close">Close</button>
        </form>
    </div>
</div>