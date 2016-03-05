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
                    <!-- Main content start here -->
                    <div class="card card-wizard" id="wizardCard">
                        <form id="wizardForm" method="" action="" novalidate="novalidate">

                            <div class="header text-center">
                                <h3 class="title">Awesome Wizard</h3>
                                <p class="category">Split a complicated flow in multiple steps</p>
                            </div>

                            <div class="content">
                                <ul class="nav nav-pills">
                                    <li class="active" style="width: 33.3333%;"><a href="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/forms/wizard.html#tab1" data-toggle="tab" aria-expanded="true">First Tab</a></li>
                                    <li style="width: 33.3333%;"><a href="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/forms/wizard.html#tab2" data-toggle="tab">Second Tab</a></li>
                                    <li style="width: 33.3333%;"><a href="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/forms/wizard.html#tab3" data-toggle="tab">Third Tab</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h5 class="text-center">Please tell us more about yourself.</h5>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input class="form-control" type="text" name="first_name" placeholder="ex: Mike">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name" required="true" placeholder="ex: Andrew" aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Email<star>*</star></label>
                                                    <input class="form-control" type="text" name="email" email="true" placeholder="ex: hello@creative-tim.com">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <h5 class="text-center">Please give us more details about your platform.</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Your Website<star>*</star></label>
                                                    <input class="form-control" type="text" name="website" url="true" placeholder="ex: http://www.creative-tim.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Framework Type</label>
                                                    <input class="form-control" type="text" name="framework" placeholder="ex: http://www.creative-tim.com">
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Language<star>*</star></label>

                                                    <!--     IMPORTANT! - the "bootstrap select picker" is not compatible with jquery.validation.js, that's why we use the "default select" inside this wizard. We will try to contact the guys who are responsibble for the "bootstrap select picker" to find a solution. Thank you for your patience.
                                                     -->

                                                    <select name="cities" class="form-control">
                                                        <option selected="" disabled="">- language -</option>
                                                        <option value="ms">Bahasa Melayu</option>
                                                        <option value="ca">Català</option>
                                                        <option value="da">Dansk</option>
                                                        <option value="de">Deutsch</option>
                                                        <option value="en">English</option>
                                                        <option value="es">Español</option>
                                                        <option value="el">Eλληνικά</option>
                                                        <option value="fr">Français</option>
                                                        <option value="it">Italiano</option>
                                                        <option value="hu">Magyar</option>
                                                        <option value="nl">Nederlands</option>
                                                        <option value="no">Norsk</option>
                                                        <option value="pl">Polski</option>
                                                        <option value="pt">Português</option>
                                                        <option value="fi">Suomi</option>
                                                        <option value="sv">Svenska</option>
                                                        <option value="tr">Türkçe</option>
                                                        <option value="is">Íslenska</option>
                                                        <option value="cs">Čeština</option>
                                                        <option value="ru">Русский</option>
                                                        <option value="th">ภาษาไทย</option>
                                                        <option value="zh">中文 (简体)</option>
                                                        <option value="zh-TW">中文 (繁體)</option>
                                                        <option value="ja">日本語</option>
                                                        <option value="ko">한국어</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">Bootstrap Version</label>

                                                    <!--     IMPORTANT! - the "bootstrap select picker" is not compatible with jquery.validation.js, that's why we use the "default select" inside this wizard. We will try to contact the guys who are responsibble for the "bootstrap select picker" to find a solution. Thank you for your patience.
                                                     -->

                                                    <select name="cities" class="form-control">
                                                        <option selected="" disabled="">- version -</option>
                                                        <option value="1.1">Bootstrap 1.1</option>
                                                        <option value="2.0">Bootstrap 2.0</option>
                                                        <option value="3.0">Bootstrap 3.0</option>
                                                        <option value="4.0">Bootstrap 4.0(alpha)</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Price</label>
                                                    <input class="form-control" type="text" name="price" placeholder="ex: 19.00">
                                                </div>
                                            </div>

                                        </div>

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


</body>


<?php include_once('parts/bottom.php'); ?>

