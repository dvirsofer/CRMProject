<?php

@session_start();

@require_once('database/Customer.php');


$err = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get details from post
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    // validate the name
    $err = Customer::testNewCustomer($first_name, $last_name);

    // save if no errors were found
    if (empty($err)) {
        $isAdded = Customer::insertCustomer($first_name, $last_name);
        $success = ($isAdded) ? 'Customer Added!' : '';
    }
}

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

                    <?php if(!empty($err)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            <?php echo($err); ?>
                        </div>
                    <?php }?>

                    <?php if(!empty($success)) { ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-info-circle"></i>
                            <?php echo($success); ?>
                        </div>
                    <?php }?>

                    <form method="post" action="add_new_customer.php">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>

