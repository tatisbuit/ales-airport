<?php require("templates/header.php");?>

</head>
    <body class="d-flex flex-column min-vh-100">

        <!-- navbar -->
        <?php require("templates/nav.php");?>

            <?php
                echo $strDetailAirlines;
            ?>

        <!-- footer -->
        <?php require("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php require("templates/scripts_links.php"); ?>

        <script src="js/general.js"></script>

    </body>
</html>