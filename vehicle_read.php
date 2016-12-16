<?php
$page = "vehicle";
$sub = "vehicle_list";
$sub1 = "";
include('file_parts/header.php');
$id = $_GET['vid'];
//$empArray = array();
$resFet = $db->selectQuery("SELECT * FROM `sm_vehicle` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `vehicle_auto_id`='$id' ");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $company_name = $resFet[$rC]['vehicle_company'];
        $vehicle_assigned_company = $resFet[$rC]['vehicle_assigned_company'];
        $vehicle_assigned_employee = $resFet[$rC]['vehicle_assigned_employee'];
        $company = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$company_name'");
        $ass_com = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
        $ass_emp = $db->selectQuery("SELECT CONCAT(employee_firstname, \" \", employee_middlename, \" \", employee_lastname) AS full_name FROM `sm_employee` WHERE `employee_id`='$vehicle_assigned_employee'");
        $vehicle_auto_id = $resFet[$rC]['vehicle_auto_id'];
        $vehicle_id = $resFet[$rC]['vehicle_id'];
        $vehicle_number = $resFet[$rC]['vehicle_number'];
        $vehicle_manufacturer = $resFet[$rC]['vehicle_manufacturer'];
        $vehicle_model = $resFet[$rC]['vehicle_model'];

        $vehicle_purchase_date1 = $resFet[$rC]['vehicle_purchase_date'];
        $explode_v_pur = explode('-', $vehicle_purchase_date1);
        $vehicle_purchase_date = $explode_v_pur[2] . "-" . $explode_v_pur[1] . "-" . $explode_v_pur[0];

        $vehicle_engine_number = $resFet[$rC]['vehicle_engine_number'];
        $vehicle_chassis_number = $resFet[$rC]['vehicle_chassis_number'];
        $vehicle_registration_number = $resFet[$rC]['vehicle_registration_number'];

        $vehicle_registration_date1 = $resFet[$rC]['vehicle_registration_date'];
        $explode_v_reg = explode('-', $vehicle_registration_date1);
        $vehicle_registration_date = $explode_v_reg[2] . "-" . $explode_v_reg[1] . "-" . $explode_v_reg[0];

        $vehicle_registration_expiry1 = $resFet[$rC]['vehicle_registration_expiry'];
        $explode_v_regex = explode('-', $vehicle_registration_expiry1);
        $vehicle_registration_expiry = $explode_v_regex[2] . "-" . $explode_v_regex[1] . "-" . $explode_v_regex[0];


        $vehicle_registered_owner = $resFet[$rC]['vehicle_registered_owner'];
        $vehicle_company = $resFet[$rC]['vehicle_company'];
        $vehicle_owner_qatar_id = $resFet[$rC]['vehicle_owner_qatar_id'];
        $vehicle_insurance_id = $resFet[$rC]['vehicle_insurance_id'];


        $vehicle_insurance_date1 = $resFet[$rC]['vehicle_insurance_date'];
        $explode_v_ins = explode('-', $vehicle_insurance_date1);
        $vehicle_insurance_date = $explode_v_ins[2] . "-" . $explode_v_ins[1] . "-" . $explode_v_ins[0];



        $vehicle_insurance_expiry1 = $resFet[$rC]['vehicle_insurance_expiry'];
        $explode_v_exp = explode('-', $vehicle_insurance_expiry1);
        $vehicle_insurance_expiry = $explode_v_exp[2] . "-" . $explode_v_exp[1] . "-" . $explode_v_exp[0];

        $vehicle_insurance_company = $resFet[$rC]['vehicle_insurance_company'];
        $vehicle_insurance_type = $resFet[$rC]['vehicle_insurance_type'];
        $vehicle_insurance_amount = $resFet[$rC]['vehicle_insurance_amount'];
        $vehicle_assigned_company = $resFet[$rC]['vehicle_assigned_company'];
        //$vehicle_assigned_employee = $resFet[$rC]['vehicle_assigned_employee'];
        $values['company_name'] = $company[0]['company_name'];
        $values['vehicle_assigned_company'] = $ass_com[0]['company_name'];
        $vehicle_assigned_employee = $ass_emp[0]['full_name'];
        //$empArray["data"][] = $values;
    }
}
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_vehicle_documents` WHERE `vehicle_document_id`='$id'");

if (count($resLogo)) {
    $dpImg = $resLogo[0]['vehicle_document_images'];
    $cats = explode(",", $resLogo[0]['vehicle_document_images']);
    $cat = $cats[0];
} else {
    $cat = "assets/images/profile-default.png";
}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Vehicle Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="vehicle_list.php">Vehicle</a>
                    </li>
                    <li>
                        Vehicle Profile
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img class="img-circle" src="<?php echo $cat; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php //echo $employee_firstname;   ?></strong> <?php //echo $employee_lastname;   ?></h4>
                            <span class="text-muted"><?php // echo $employee_designation;   ?></span>
                        </div>
                    </section>
                    <section class="tile tile-simple">
                        <div class="tile-header">
                            <?php
                            $manName = $db->selectQuery("SELECT `manufacturer_name` FROM `sm_vehicle_manufacturer` WHERE `manufacturer_id`='$vehicle_manufacturer'");
                            ?>
                            <?php
                            $modName = $db->selectQuery("SELECT `model_name` FROM `sm_vehicle_model` WHERE `model_id`='$vehicle_model'");
                            ?>
                            <h1 class="custom-font"><strong><?php echo $manName[0]['manufacturer_name']; ?></strong><span></span> <?php echo $modName[0]['model_name']; ?> </h1>
                        </div>

                    </section>
                    <section class="tile tile-simple">
                    </section>
                </div>

                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">
                        <!-- tile body -->
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a style="color:#16a085;" href="#">Profile</a></li>
                                    <li role="presentation"><a href="vehicle_edit.php?vid=<?php echo $_GET['vid'] ?>">Edit Profile</a></li>
                                    <li role="presentation"><a href="vehicle_document.php?vid=<?php echo $_GET['vid'] ?>">Documents</a></li>
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" action="employee_edit.php">
                                        <div class="wrap-reset">

                                            <form class="profile-settings">

                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>About</strong> Vehicle </h4>
                                                    </div>
                                                    <div class="col-sm-5"> </div>
                                                    <div class="form-group col-md-1 legend">

                                                        <a onclick="print();" target="_blank" style="cursor:pointer;text-decoration:none;"><h4><strong>Print</strong></h4></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="first-name">Vehicle ID:</label>
                                                        <input type="text" class="form-control" name="f_name" id="f_name" readonly value="<?php echo $vehicle_id; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="last-name">Vehicle Number:</label>
                                                        <input type="text" class="form-control" name="m_name" id="m_name" readonly value="<?php echo $vehicle_number; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="zip">Manufacturer:</label>


                                                        <input type="text" class="form-control"  name="desig" readonly value="<?php echo $manName[0]['manufacturer_name']; ?>">


                                                    </div>

                                                </div>




                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Model:</label>

                                                        <input type="text" class="form-control" readonly name="company" id="company" value="<?php echo $modName[0]['model_name']; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Purchase Date:</label>
                                                        <input type="text" class="form-control"  name="desig" readonly value="<?php echo $vehicle_purchase_date; ?>">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Engine Number:</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_engine_number; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Chassis Number</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_chassis_number; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Registration/Istamara</strong> Details</h4>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Registration/Istamara Number:</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_registration_number; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Company:</label>
                                                        <?php
                                                        $cmpName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_company'");
                                                        ?>
                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $cmpName[0]['company_name']; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Registration/Istamara Date</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_registration_date; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Registration/Istamara Expiry Date:</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_registration_expiry; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Registered Owner</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_registered_owner; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Owner's Qatar ID</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_owner_qatar_id; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Insurance</strong> Details</h4>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Insurance Number</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_insurance_id; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Insurance Type</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_insurance_type; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Insurance Start Date</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_insurance_date; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Insurance Expiry Date</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_insurance_expiry; ?>">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Insurance Company</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $vehicle_insurance_company; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Insurance Amount</label>

                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_insurance_amount; ?>">
                                                    </div>


                                                </div>

                                               	<div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Assigned</strong> To</h4>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Vehicle Assigned To:</label>
                                                        <?php
                                                        $cmpNameas = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
                                                        ?>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $cmpNameas[0]['company_name']; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Employee</label>
                                                        <?php
//$empName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
                                                        ?>
                                                        <input type="text" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $vehicle_assigned_employee; ?>">
                                                    </div>


                                                </div>


<!--                                                <input type="submit" class="btn btn-info" name="save" value="Save">-->

                                        </div>

                                    </form>
                                </div>
                                <!-- Nav tabs -->
                                <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                <!--                                </ul>-->

                                <!-- Tab panes -->
                            </div>
                            <!-- /tile body -->

                    </section>
                    <!-- /tile -->




                </div>
                <!-- /col -->











            </div>
            <!-- /row -->



        </div>
        <!-- /page content -->

    </div>

</section>
<!--/ CONTENT -->







</div>
<!--/ Application Content -->














<!-- ============================================
============== Vendor JavaScripts ===============
============================================= -->
<script src="assets/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

<script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
<!--/ vendor javascripts -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->






<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<!--/ Page Specific Scripts -->
<script>

                                                            function print()
                                                            {

                                                                window.open('printvehicle.php?pid=' +<?php echo $id; ?>, '_blank');


                                                            }

</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->


</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>