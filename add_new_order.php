<?php

@session_start();

@require_once('database/Customer.php');

$customers = Customer::getCustomersList();

?>

<?php include_once('parts/head.php'); ?>

<body>

<div class="wrapper">

    <?php include_once('parts/sidebar.php'); ?>

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main content start here -->
                    <div class="card card-wizard" id="wizardCard">
                        <form id="wizardForm" method="" action="" novalidate="novalidate">

                            <div class="header text-center">
                                <h3 class="title">Order Wizard</h3>
                                <p class="category">Add a new order step by step</p>
                            </div>

                            <div class="content">
                                <ul class="nav nav-pills">
                                    <li class="active" style="width: 33.3333%;"><a href="add_new_order.php#tab1" data-toggle="tab" aria-expanded="true">Choose Customer</a></li>
                                    <li style="width: 33.3333%;"><a href="add_new_order.php#tab2" data-toggle="tab">Choose Products</a></li>
                                    <li style="width: 33.3333%;"><a href="add_new_order.php#tab3" data-toggle="tab">Checkout</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h5 class="text-center">Please choose customer:</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Customer</label>
                                                    <select class="form-control required" name="customer" id="customer">
                                                        <option value="">Choose an option</option>
                                                        <?php foreach ($customers as $customer): ?>
                                                            <option value="<?php echo($customer->CUST_ID); ?>"><?php echo($customer->FIRST_NAME); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input class="form-control" type="text" id="first_name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input class="form-control" type="text" id="last_name" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <table class="table demo table-bordered footable-loaded footable default" data-filter="#filter" data-page-size="5">
                                            <thead>
                                            <tr>
                                                <th data-toggle="true" class="footable-sortable footable-first-column">
                                                    First Name
                                                    <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="phone" class="footable-sortable">
                                                    Last Name
                                                    <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="tablet,phone" class="footable-sortable">
                                                    Job Title
                                                    <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="tablet,phone" class="footable-sortable">
                                                    DOB
                                                    <span class="footable-sort-indicator"></span></th>
                                                <th data-hide="tablet,phone" class="footable-sortable">
                                                    Status
                                                    <span class="footable-sort-indicator"></span></th>
                                                <th data-sort-ignore="true" data-hide="tablet,phone" data-name="Delete" class="footable-last-column"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Isidra</td>
                                                <td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td>
                                                <td>Traffic Court Referee</td>
                                                <td data-value="78025368997">22 Jun 1972</td>
                                                <td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Shona</td>
                                                <td>Woldt</td>
                                                <td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Airline Transport Pilot</a></td>
                                                <td data-value="370961043292">3 Oct 1981</td>
                                                <td data-value="2"><span class="status-metro status-disabled" title="Disabled">Disabled</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Granville</td>
                                                <td>Leonardo</td>
                                                <td>Business Services Sales Representative</td>
                                                <td data-value="-22133780420">19 Apr 1969</td>
                                                <td data-value="3"><span class="status-metro status-suspended" title="Suspended">Suspended</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Easer</td>
                                                <td>Dragoo</td>
                                                <td>Drywall Stripper</td>
                                                <td data-value="250833505574">13 Dec 1977</td>
                                                <td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Maple</td>
                                                <td>Halladay</td>
                                                <td>Aviation Tactical Readiness Officer</td>
                                                <td data-value="694116650726">30 Dec 1991</td>
                                                <td data-value="3"><span class="status-metro status-suspended" title="Suspended">Suspended</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Maxine</td>
                                                <td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Woldt</a></td>
                                                <td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Business Services Sales Representative</a></td>
                                                <td data-value="561440464855">17 Oct 1987</td>
                                                <td data-value="2"><span class="status-metro status-disabled" title="Disabled">Disabled</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Lorraine</td>
                                                <td>Mcgaughy</td>
                                                <td>Hemodialysis Technician</td>
                                                <td data-value="437400551390">11 Nov 1983</td>
                                                <td data-value="2"><span class="status-metro status-disabled" title="Disabled">Disabled</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Lizzee</td>
                                                <td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Goodlow</a></td>
                                                <td>Technical Services Librarian</td>
                                                <td data-value="-257733999319">1 Nov 1961</td>
                                                <td data-value="3"><span class="status-metro status-suspended" title="Suspended">Suspended</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Judi</td>
                                                <td>Badgett</td>
                                                <td>Electrical Lineworker</td>
                                                <td data-value="362134712000">23 Jun 1981</td>
                                                <td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: none;">
                                                <td class=""><span class="footable-toggle"></span>Lauri</td>
                                                <td>Hyland</td>
                                                <td>Blackjack Supervisor</td>
                                                <td data-value="500874333932">15 Nov 1985</td>
                                                <td data-value="3"><span class="status-metro status-suspended" title="Suspended">Suspended</span></td>
                                                <td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <tr style="display: table-row;"><td class="footable-first-column"><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class="footable-last-column"><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr><tr style="display: table-row;"><td class="footable-first-column"><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class="footable-last-column"><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr><tr style="display: table-row;"><td class="footable-first-column"><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class="footable-last-column"><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr><tr style="display: table-row;"><td class="footable-first-column"><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class="footable-last-column"><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr><tr style="display: table-row;"><td class=""><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class=""><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr><tr style="display: none;"><td class="footable-first-column"><span class="footable-toggle"></span>Isidra</td><td><a href="http://fooplugins.com/footable/demos/add-delete-row.htm#">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td data-value="1"><span class="status-metro status-active" title="Active">Active</span></td><td class="footable-last-column"><a class="row-delete" href="http://fooplugins.com/footable/demos/add-delete-row.htm#"><i class="fa fa-times"></i></a></td></tr></tbody>
                                            <tfoot class="hide-if-no-paging">
                                            <tr>
                                                <td colspan="6">
                                                    <div class="pagination pagination-centered"><ul><li class="footable-page-arrow"><a data-page="first" href="http://fooplugins.com/footable/demos/add-delete-row.htm#first">«</a></li><li class="footable-page-arrow"><a data-page="prev" href="http://fooplugins.com/footable/demos/add-delete-row.htm#prev">‹</a></li><li class="footable-page"><a data-page="0" href="http://fooplugins.com/footable/demos/add-delete-row.htm#">1</a></li><li class="footable-page"><a data-page="1" href="http://fooplugins.com/footable/demos/add-delete-row.htm#">2</a></li><li class="footable-page active"><a data-page="2" href="http://fooplugins.com/footable/demos/add-delete-row.htm#">3</a></li><li class="footable-page"><a data-page="3" href="http://fooplugins.com/footable/demos/add-delete-row.htm#">4</a></li><li class="footable-page-arrow"><a data-page="next" href="http://fooplugins.com/footable/demos/add-delete-row.htm#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="http://fooplugins.com/footable/demos/add-delete-row.htm#last">»</a></li></ul></div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <h2 class="text-center text-space">Yuhuuu! <br><small> Click on "<b>Finish</b>" to join our community</small></h2>
                                    </div>

                                </div>
                            </div>

                            <div class="footer">
                                <button type="button" class="btn btn-default btn-fill btn-wd btn-back pull-left disabled" style="display: none;">Back</button>

                                <button type="button" class="btn btn-info btn-fill btn-wd btn-next pull-right">Next</button>
                                <button type="button" class="btn btn-info btn-fill btn-wd btn-finish pull-right" onclick="onFinishWizard()">Finish</button>

                                <div class="clearfix"></div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div><div class="sweet-overlay" tabindex="-1"></div><div class="sweet-alert" tabindex="-1"><div class="icon error"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info"></div> <div class="icon success"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom"></div> <h2>Title</h2><p>Text</p><hr><button class="confirm">OK</button><button class="cancel">Cancel</button></div></div>

</body>

<script>
    var customers = <?php echo(json_encode($customers)); ?>;
</script>


<?php include_once('parts/bottom.php'); ?>

<script type="text/javascript">
    $().ready(function(){

        var $validator = $("#wizardForm").validate({
            rules: {
                customer: {
                    required: true
                }
            }
        });



        $('#wizardCard').bootstrapWizard({
            tabClass: 'nav nav-pills',
            nextSelector: '.btn-next',
            previousSelector: '.btn-back',
            onNext: function(tab, navigation, index) {
                var $valid = $('#wizardForm').valid();

                if(!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
            },
            onInit : function(tab, navigation, index){

                //check number of tabs and fill the entire row
                var $total = navigation.find('li').length;
                $width = 100/$total;

                $display_width = $(document).width();

                if($display_width < 600 && $total > 3){
                    $width = 50;
                }

                navigation.find('li').css('width',$width + '%');
            },
            onTabClick : function(tab, navigation, index){
                // Disable the posibility to click on tabs
                return false;
            },
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;

                var wizard = navigation.closest('.card-wizard');

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $(wizard).find('.btn-next').hide();
                    $(wizard).find('.btn-finish').show();
                } else if($current == 1){
                    $(wizard).find('.btn-back').hide();
                } else {
                    $(wizard).find('.btn-back').show();
                    $(wizard).find('.btn-next').show();
                    $(wizard).find('.btn-finish').hide();
                }
            }

        });

    });

    function onFinishWizard(){
        //here you can do something, sent the form to server via ajax and show a success message with swal

        swal("Good job!", "You clicked the finish button!", "success");
    }
</script>


<script src="assets/js/orders_wizard.js"></script>

</html>