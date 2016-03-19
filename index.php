<?php

@session_start();

header("Location: orders_list.php");
die();

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <!-- Main content start here -->

                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>


</html>