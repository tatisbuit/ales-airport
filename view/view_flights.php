<?php require("templates/header.php");?>

<!-- FLIGTHS PAGE CSS -->
<link rel="stylesheet" href="css/flights_styles.css">

</head>
    <body class="d-flex flex-column min-vh-100">

        <!-- navbar -->
        <?php require("templates/nav.php");?>

        <!-- alert after insert flight -->
        <div class="alertinsert"></div>

        <!-- show all flights -->
        <?php echo $listFlights; ?>

        <!-- overlay insert flight from -->
        <div class="ins-flight-form">
            <?php require("templates/forms/insert_flight_form.php"); ?>
        </div>

        <!-- overlay insert flight from -->
        <div class="updt-flight-form">
        </div>


        <!-- footer -->
        <?php require("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php require("templates/scripts_links.php"); ?>

        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <script src="js/flights.js"></script>

    </body>
</html>