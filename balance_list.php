<?php

@require_once('help_functions.php');
include_once 'database/Balance.php';

@session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fromDate = $_POST['from_date'];
    $toDate = date('Y-m-d', strtotime($_POST['to_date'] . '+1 days'));

    $balances = Balance::getBalance($fromDate, $toDate);

}

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav_balance.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <form method="post" action="balance_list.php">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="from_date">From Date</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" placeholder="Date" value="<?php
                                    if(!empty($fromDate)) { echo $fromDate; } ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="to_date">To Date</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" placeholder="Date" value="<?php
                                    if(!empty($toDate)) { echo $_POST['to_date']; } ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {?>

                        <h3>All Balance</h3>
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Move Id</th>
                            <th>Move Date</th>
                            <th>Product Id</th>
                            <th>Product Description</th>
                            <th>Warehouse Name</th>
                            <th>Essence</th>
                            <th>Quantity</th>
                            </thead>
                            <tbody>
                            <?php foreach($balances as $balance): ?>
                                <tr>
                                    <td><?php echo($balance->MOVE_ID); ?></td>
                                    <td><?php echo($balance->MOVE_DATE); ?></td>
                                    <td><?php echo($balance->P_ID); ?></td>
                                    <td><?php echo($balance->DESCRIPTION); ?></td>
                                    <td><?php echo($balance->WAREHOUSE_NAME); ?></td>
                                    <td><?php echo($balance->ESSENCE); ?></td>
                                    <td><?php echo($balance->QUANTITY); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>


</html>
