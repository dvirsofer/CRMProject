<?php

@session_start();

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
                    <div class="col-xs-6">
                        <h1>
                            <a href="#">
                                <img width="100px" height="100px" src="https://lh5.ggpht.com/iUifCV93j6Rntv9giTdahkX0ZHXjndRDpqemxBabX2BXNq_oxKT6g7JMZE3jIiRul0eJ=w300">
                            </a>
                        </h1>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h1>INVOICE</h1>
                        <h1><small>Invoice #001</small></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>From: <a href="#">Your Name</a></h4>
                            </div>
                            <div class="panel-body">
                                <p>
                                    Address <br>
                                    details <br>
                                    more <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-5 col-xs-offset-2 text-right">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>To : <a href="#">Client Name</a></h4>
                            </div>
                            <div class="panel-body">
                                <p>
                                    Address <br>
                                    details <br>
                                    more <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / end client details section -->
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <h4>Service</h4>
                        </th>
                        <th>
                            <h4>Description</h4>
                        </th>
                        <th>
                            <h4>Hrs/Qty</h4>
                        </th>
                        <th>
                            <h4>Rate/Price</h4>
                        </th>
                        <th>
                            <h4>Sub Total</h4>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Article</td>
                        <td><a href="#">Title of your article here</a></td>
                        <td class="text-right">-</td>
                        <td class="text-right">$200.00</td>
                        <td class="text-right">$200.00</td>
                    </tr>
                    <tr>
                        <td>Template Design</td>
                        <td><a href="#">Details of project here</a></td>
                        <td class="text-right">10</td>
                        <td class="text-right">75.00</td>
                        <td class="text-right">$750.00</td>
                    </tr>
                    <tr>
                        <td>Development</td>
                        <td><a href="#">WordPress Blogging theme</a></td>
                        <td class="text-right">5</td>
                        <td class="text-right">50.00</td>
                        <td class="text-right">$250.00</td>
                    </tr>
                    </tbody>
                </table>
                <div class="row text-right">
                    <div class="col-xs-2 col-xs-offset-8">
                        <p>
                            <strong>
                                Sub Total : <br>
                                TAX : <br>
                                Total : <br>
                            </strong>
                        </p>
                    </div>
                    <div class="col-xs-2">
                        <strong>
                            $1200.00 <br>
                            N/A <br>
                            $1200.00 <br>
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4>Bank details</h4>
                            </div>
                            <div class="panel-body">
                                <p>Your Name</p>
                                <p>Bank Name</p>
                                <p>SWIFT : --------</p>
                                <p>Account Number : --------</p>
                                <p>IBAN : --------</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="span7">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4>Contact Details</h4>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Email : you@example.com <br><br>
                                        Mobile : -------- <br> <br>
                                        Twitter : <a href="https://twitter.com/tahirtaous">@TahirTaous</a>
                                    </p>
                                    <h4>Payment should be made by Bank Transfer</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


</body>


<?php include_once('parts/bottom.php'); ?>


</html>