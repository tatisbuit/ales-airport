<?php include("templates/header.php");?>

<!-- PASSENGERS PAGE CSS -->
<link rel="stylesheet" href="css/passengers_styles.css">

</head>
    <body class="d-flex flex-column min-vh-100">

        <?php include("templates/nav.php");?>

        <div class="d-flex justify-content-center align-items-center bg-dark">
            <div class="slider">
                <span style="--i: 1;"><img src="images/aircrafts/airbus-220.jpg" alt=""></span>
                <span style="--i: 2;"><img src="images/aircrafts/airbus-310.jpg" alt=""></span>
                <span style="--i: 3;"><img src="images/aircrafts/airbus-318.jpg" alt=""></span>
                <span style="--i: 4;"><img src="images/aircrafts/boeing-757.jpg" alt=""></span>
                <span style="--i: 5;"><img src="images/aircrafts/airbus-320.jpg" alt=""></span>
                <span style="--i: 6;"><img src="images/aircrafts/airbus-340.jpg" alt=""></span>
                <span style="--i: 7;"><img src="images/aircrafts/boeing-747.jpg" alt=""></span>
                <span style="--i: 8;"><img src="images/aircrafts/embraer-170.jpg" alt=""></span>
            </div> 
        </div>

        <!-- footer -->
        <?php include("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php include("templates/scripts_links.php"); ?>

        <script src="js/passengers.js"></script>

    </body>
</html>