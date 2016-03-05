<?php

@require_once('help_functions.php');
@require_once('database/Customer.php');

@session_start();

$customers = Customer::getCustomersList();

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <?php include_once('parts/nav_customer.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <h3>All Customers</h3>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        </thead>
                        <tbody>
                        <?php foreach($customers as $customer): ?>
                            <tr>
                                <td><?php echo($customer->CUST_ID); ?></td>
                                <td><?php echo($customer->FIRST_NAME); ?></td>
                                <td><?php echo($customer->LAST_NAME); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>