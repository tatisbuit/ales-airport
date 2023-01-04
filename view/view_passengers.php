<?php include("templates/header.php");?>

<!-- PASSENGERS PAGE CSS -->
<link rel="stylesheet" href="css/passengers_styles.css">

</head>
    <body class="d-flex flex-column min-vh-100">

        <?php include("templates/nav.php");?>

            <!-- SHOW ALL PASSENGERS -->
            <?php echo $strDetailpassengers; ?>

            <div class="infant-container"></div>
            <div class='ovly-container hidden'>
                <div class='ovly-error hidden'>
                    <div class='content'></div>
                </div>
                <div class='ovly-data hidden'>
                    <div class='content'></div>
                </div>
            </div>

        <!-- footer -->
        <?php include("templates/footer.php"); ?>

        <!-- scripts links -->
        <?php include("templates/scripts_links.php"); ?>

        <script src="js/passengers.js"></script>

    </body>
</html>