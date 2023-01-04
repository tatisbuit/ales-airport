<?php require("templates/header.php");?>

</head>
    <body class="d-flex flex-column min-vh-100">

        <!-- navbar -->
        <?php require("templates/nav.php");?>

        <div class="container text-center mt-5">
            <p class="display-1">Result Search</p>
            <div class="row align-items-start">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mb-3 bg-info p-5" ">
                        <div class="row g-0">
                            <div class="col-md-6">
                            <img src="<?php echo $photo ?>" class="img-fluid w-100 rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="fs-3 card-title text-white">Details Element</h5>
                                <p class="fs-3 card-text"><strong>Name: </strong> <?php echo $name ?></p>
                                <p class="fs-3 card-text"><strong>Other Data: </strong><?php echo $otherdata ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php require("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php require("templates/scripts_links.php"); ?>

        <script src="js/general.js"></script>

    </body>
</html>