<?php include("templates/header.php");?>

<!-- MAIN PAGE CSS -->
<link rel="stylesheet" href="css/main_styles.css">

</head>
    <body class="d-flex flex-column min-vh-100">

        <?php include("templates/nav.php");?>

        <!-- carousel -->
        <div id="carouselExampleIndicators" class="carousel slide mb-3 " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/carousel/carousel01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel/carousel02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel/carousel03.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel/carousel04.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- information -->
        <div class="container-fluid">
            <p class="text-center text-md-start fs-3 fw-bold ms-md-5">Information of interest</p>
            <div class='d-flex flex-wrap justify-content-around my-4'>
                <div class="col-10 col-sm-5 card mb-3 border-persian bg-aeroblue shadow">
                    <div class="row g-0 d-flex justify-content-center">
                        <div class="col-6 col-md-6">
                            <img src="images/covid19.jpg" class="img-fluid rounded-start" alt="covid19">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card-body">
                                <h5 class="card-title text-success fw-bold">Covid</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur corrupti voluptas nostrum commodi ex consequatur dolores suscipit quos aspernatur iusto?</p>
                                <a href="#" class="card-link text-decoration-none text-end fw-bold">Read more . . .</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-5 card mb-3 border-persian bg-aeroblue shadow">
                <div class="row g-0 d-flex justify-content-center">
                        <div class="col-6 col-md-6">
                            <img src="images/ucrania.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                            <h5 class="card-title text-success fw-bold">Ucrain People</h5>
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita voluptates dolorem eum reiciendis iusto nisi cupiditate ad, placeat numquam in.</p>
                                <a href="#" class="card-link text-decoration-none text-end fw-bold">Read more . . .</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- services -->
        <div class="d-flex flex-wrap justify-content-evenly my-4">
            <div class="col-6 col-md-2 card border-0">
                <img src="images/icons/travelluggage.png" class="card-img-top align-self-center w-50" alt="hand luggage">
                <div class="card-body">
                    <h6 class="card-title text-center">Hand luggage</h6>
                </div>
            </div>
            <div class="col-6 col-md-2 card border-0">
                <img src="images/icons/traveldocumentation.png" class="card-img-top align-self-center w-50" alt="traveldocumentation">
                <div class="card-body">
                    <h6 class="card-title text-center">Travel Documentation</h6>
                </div>
            </div>
            <div class="col-6 col-md-2 card border-0">
                <img src="images/icons/restaurant.png" class="card-img-top align-self-center w-50" alt="restaurant">
                <div class="card-body">
                    <h6 class="card-title text-center">Restaurant</h6>
                </div>
            </div>
            <div class="col-6 col-md-2 card border-0">
                <img src="images/icons/services.png" class="card-img-top align-self-center w-50" alt="services">
                <div class="card-body">
                    <h6 class="card-title text-center">Services</h6>
                </div>
            </div>
        </div>

        <!-- vip -->
        <div class="bgimgvip py-4">
            <div class="container">
                <div class="m-4">
                    <div class="bg-dark bg-opacity-50 rounded-3">
                            <p class="text-white fs-1 fst-italic">vip</p>
                            <p class="text-white fs-4">Relax and enjoy the rest area in our VIP lounges</p>
                            <p class="text-white fs-7 d-none d-md-block">CATERING, FREE WI-FI, CHILDREN’S AREA, MEETING ROOMS... AND MUCH MORE.</p>
                        </div>
                        <button class="btn btn-warning btn-outline-dark">VIEW VIP LOUNGES</button>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php include("templates/scripts_links.php"); ?>

    </body>
</html>