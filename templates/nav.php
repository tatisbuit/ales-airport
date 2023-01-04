<nav class='navbar navbar-expand-md navbar-light bg-keppel'>
    <div class='container-fluid'>
        <img src='images/logoAirport.png' alt='' width='40' height='40'>
        <a class='navbar-brand ps-4' aria-current='page' href='index.php'>Ale's Airport</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>

                <li class='nav-item'>
                    <a class='nav-link active' href='airlines.php?codIATA=all'>Airlines</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link active dropdown-toggle' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Employees
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li>
                            <a class='dropdown-item' href='employees.php?type=ge'>Ground Employees</a>
                        </li>
                        <li>
                            <a class='dropdown-item' href='employees.php?type=ce'>Crew Employees</a>
                        </li>
                        <li>
                            <a class='dropdown-item' href='employees.php'>All Employees</a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='flights.php'>Flights</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link active' href='aircrafts.php'>Aircrafts</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='passengers.php'>Passengers</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active' href='rotatingImages.php'>Images</a>
                </li>
            </ul>

            <div class="container w-auto mx-2 p-2 bg-warning rounded d-none d-lg-block border border-dark">
                <div class="row">
                    <div class="col-5 box">
                        <div class="inner-box d-flex flex-column justify-content-center align-items-center">
                            <input id="current_date" type="date" class="date" value="2022-09-05"/>
                            <button class="btn btn-info btn-sm calculate ">Calculate</button>
                        </div>
                    </div>
                    
                    <div class="col-6 box">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-4 d-flex flex-row text-dark inner-boxs">
                                <p class="number year">0</p>
                                <p class="label">Year</p>
                            </div>
                            <div class="col-4 d-flex flex-row text-dark inner-boxs">
                                <p class="number month">0</p>
                                <p class="label"> Month</p>
                            </div>
                            <div class="col-4 d-flex flex-row text-dark inner-boxs">
                                <p class="number day">0</p>
                                <p class="label">Days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-primary text-white p-2 me-3 rounded" id="clock"></div>

            <form class='d-flex' method="post" name="search-form" id="search_form" action="">
                <div class="row col-12 col-sm">
                    <div class="col-sm">
                        <div class="col-sm">
                            <input id="searchbox" name="term" class='form-control ' type='search' placeholder='Search' aria-label='Search' />
                        </div>
                        <div id="resultsearch" style="z-index:2;" class="col position-absolute"></div>
                    </div>
                    <div class="col-sm">
                        <button class='btn btn-warning btn-outline-dark' type='submit'>
                            Search
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <?php if (isset($_SESSION['idUser'])) { ?>
                    <div id="welcomeuser" class="">
                        <span class="">Welcome: </span>
                        <span class="nameuser text-capitalize fw-bold"><?php echo $_SESSION['username'] ?></span>
                    </div>
                    <button id="btnLogin01" class="btn btn-primary d-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasLogin" aria-controls="offcanvasScrolling">Login</button>
                    <button id="btnSignUp" class="btn btn-primary  d-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasSignUp" aria-controls="offcanvasScrolling">Sign Up</button>
                    <button id="btnLogout" class="btn btn-primary" type="button">Logout</button>
                <?php } else { ?>
                    <div id="welcomeuser" class="d-none">
                        <span class="">Welcome: </span>
                        <span class="nameuser text-capitalize fw-bold"></span>
                    </div>
                    <button id="btnLogin01" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasLogin" aria-controls="offcanvasScrolling">Login</button>
                    <button id="btnSignUp" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasSignUp" aria-controls="offcanvasScrolling">Sign Up</button>
                    <button id="btnLogout" class="btn btn-primary d-none" type="button">Logout</button>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>


<div class="offcanvas offcanvas-end bg-keppel " data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offCanvasLogin" aria-labelledby="offcanvasWithBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Login</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control border border-dark" id="inputEmail" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <input type="password" class="form-control border border-dark" id="inputPassword">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success btn-outline-dark" id="btnLogin" type="button">Enter</button>
            <button class="btn btn-primary" type="button">Sign Up</button>
        </div>
    </div>
</div>