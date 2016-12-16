<?php
$page = "vehicle";
$sub = "vehicle_list";
$sub1 = "";
$success_msg = "";
include('file_parts/header.php');
$id = $_GET['vid'];
//$empArray = array();
$resFet = $db->selectQuery("SELECT * FROM `sm_vehicle` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `vehicle_auto_id`='$id' ");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $company_name = $resFet[$rC]['vehicle_company'];
        $vehicle_assigned_company = $resFet[$rC]['vehicle_assigned_company'];
        $vehicle_assigned_employee1 = $resFet[$rC]['vehicle_assigned_employee'];
        $company = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$company_name'");
        $ass_com = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
        $ass_emp = $db->selectQuery("SELECT CONCAT(employee_firstname, \"  \", employee_middlename, \"  \", employee_lastname) AS full_name FROM `sm_employee` WHERE `employee_id`='$vehicle_assigned_employee1'");
        $vehicle_auto_id = $resFet[$rC]['vehicle_auto_id'];
        $vehicle_id = $resFet[$rC]['vehicle_id'];
        $vehicle_number = $resFet[$rC]['vehicle_number'];
        $vehicle_manufacturer = $resFet[$rC]['vehicle_manufacturer'];
        $vehicle_model = $resFet[$rC]['vehicle_model'];
        //$vehicle_purchase_date = $resFet[$rC]['vehicle_purchase_date'];
        $vehicle_purchase_date1 = $resFet[$rC]['vehicle_purchase_date'];
        $explode_v_pur = explode('-', $vehicle_purchase_date1);
        $vehicle_purchase_date = $explode_v_pur[2] . "/" . $explode_v_pur[1] . "/" . $explode_v_pur[0];

        $vehicle_engine_number = $resFet[$rC]['vehicle_engine_number'];
        $vehicle_chassis_number = $resFet[$rC]['vehicle_chassis_number'];
        $vehicle_registration_number = $resFet[$rC]['vehicle_registration_number'];

        //$vehicle_registration_date = $resFet[$rC]['vehicle_registration_date'];
        $vehicle_registration_date1 = $resFet[$rC]['vehicle_registration_date'];
        $explode_v_reg = explode('-', $vehicle_registration_date1);
        $vehicle_registration_date = $explode_v_reg[2] . "/" . $explode_v_reg[1] . "/" . $explode_v_reg[0];

        //$vehicle_registration_expiry = $resFet[$rC]['vehicle_registration_expiry'];
        $vehicle_registration_expiry1 = $resFet[$rC]['vehicle_registration_expiry'];
        $explode_v_regex = explode('-', $vehicle_registration_expiry1);
        $vehicle_registration_expiry = $explode_v_regex[2] . "/" . $explode_v_regex[1] . "/" . $explode_v_regex[0];


        $vehicle_registered_owner = $resFet[$rC]['vehicle_registered_owner'];
        $vehicle_company = $resFet[$rC]['vehicle_company'];
        $vehicle_owner_qatar_id = $resFet[$rC]['vehicle_owner_qatar_id'];
        $vehicle_insurance_id = $resFet[$rC]['vehicle_insurance_id'];


        //$vehicle_insurance_date = $resFet[$rC]['vehicle_insurance_date'];
        $vehicle_insurance_date1 = $resFet[$rC]['vehicle_insurance_date'];
        $explode_v_ins = explode('-', $vehicle_insurance_date1);
        $vehicle_insurance_date = $explode_v_ins[2] . "/" . $explode_v_ins[1] . "/" . $explode_v_ins[0];


        //$vehicle_insurance_expiry = $resFet[$rC]['vehicle_insurance_expiry'];
        $vehicle_insurance_expiry1 = $resFet[$rC]['vehicle_insurance_expiry'];
        $explode_v_exp = explode('-', $vehicle_insurance_expiry1);
        $vehicle_insurance_expiry = $explode_v_exp[2] . "/" . $explode_v_exp[1] . "/" . $explode_v_exp[0];



        $vehicle_insurance_company = $resFet[$rC]['vehicle_insurance_company'];
        $vehicle_insurance_type = $resFet[$rC]['vehicle_insurance_type'];
        $vehicle_insurance_amount = $resFet[$rC]['vehicle_insurance_amount'];
        $vehicle_assigned_company = $resFet[$rC]['vehicle_assigned_company'];
        //$vehicle_assigned_employee = $resFet[$rC]['vehicle_assigned_employee'];
        //$values['company_name'] = $company[0]['company_name'];
        //$values['vehicle_assigned_company']=$ass_com[0]['company_name'];
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
    $dpImg = "assets/images/profile-default.png";
}
?>

<!--code for updation--->
<?php
if (isset($_POST['submit'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_manufacturer = $_POST['vehicle_manufacturer'];
    $vehicle_model = $_POST['vehicle_model'];

    $vehicle_purchase_date1 = $_POST['vehicle_purchase_date'];
    $vehicle_purchase_date = explode('/', $vehicle_purchase_date1);

    $vehicle_engine_number = $_POST['vehicle_engine_number'];
    $vehicle_chassis_number = $_POST['vehicle_chassis_number'];
    $vehicle_registration_number = $_POST['vehicle_registration_number'];

    $vehicle_registration_date1 = $_POST['vehicle_registration_date'];
    $vehicle_registration_date = explode('/', $vehicle_registration_date1);

    $vehicle_registration_expiry1 = $_POST['vehicle_registration_expiry'];
    $vehicle_registration_expiry = explode('/', $vehicle_registration_expiry1);

    $vehicle_registered_owner = $_POST['vehicle_registered_owner'];
    $vehicle_company = $_POST['vehicle_company'];
    $vehicle_owner_qatar_id = $_POST['vehicle_owner_qatar_id'];
    $vehicle_insurance_id = $_POST['vehicle_insurance_id'];

    $vehicle_insurance_date1 = $_POST['vehicle_insurance_date'];
    $vehicle_insurance_date = explode('/', $vehicle_insurance_date1);

    $vehicle_insurance_expiry1 = $_POST['vehicle_insurance_expiry'];
    $vehicle_insurance_expiry = explode('/', $vehicle_insurance_expiry1);

    $vehicle_insurance_company = $_POST['vehicle_insurance_company'];
    $vehicle_insurance_type = $_POST['vehicle_insurance_type'];
    $vehicle_insurance_amount = $_POST['vehicle_insurance_amount'];
    $vehicle_assigned_company = $_POST['vehicle_assigned_company'];
    $vehicle_assigned_employee = $_POST['vehicle_assigned_employee'];
    $values1 = array();
    $values1['vehicle_id'] = $vehicle_id;
    $values1['vehicle_number'] = $vehicle_number;
    $values1['vehicle_manufacturer'] = $vehicle_manufacturer;
    $values1['vehicle_model'] = $vehicle_model;
    $values1['vehicle_purchase_date'] = $vehicle_purchase_date[2] . "-" . $vehicle_purchase_date[1] . "-" . $vehicle_purchase_date[0];
    $values1['vehicle_engine_number'] = $vehicle_engine_number;
    $values1['vehicle_chassis_number'] = $vehicle_chassis_number;
    $values1['vehicle_registration_number'] = $vehicle_registration_number;
    $values1['vehicle_registration_date'] = $vehicle_registration_date[2] . "-" . $vehicle_registration_date[1] . "-" . $vehicle_registration_date[0];
    $values1['vehicle_registration_expiry'] = $vehicle_registration_expiry[2] . "-" . $vehicle_registration_expiry[1] . "-" . $vehicle_registration_expiry[0];
    $values1['vehicle_registered_owner'] = $vehicle_registered_owner;
    $values1['vehicle_registered_owner'] = $vehicle_registered_owner;
    $values1['vehicle_company'] = $vehicle_company;
    $values1['vehicle_owner_qatar_id'] = $vehicle_owner_qatar_id;
    $values1['vehicle_insurance_id'] = $vehicle_insurance_id;
    $values1['vehicle_insurance_date'] = $vehicle_insurance_date[2] . "-" . $vehicle_insurance_date[1] . "-" . $vehicle_insurance_date[0];
    $values1['vehicle_insurance_expiry'] = $vehicle_insurance_expiry[2] . "-" . $vehicle_insurance_expiry[1] . "-" . $vehicle_insurance_expiry[0];
    $values1['vehicle_insurance_company'] = $vehicle_insurance_company;
    $values1['vehicle_insurance_type'] = $vehicle_insurance_type;
    $values1['vehicle_insurance_amount'] = $vehicle_insurance_amount;
    $values1['vehicle_assigned_company'] = $vehicle_assigned_company;
    $values1['vehicle_assigned_employee'] = $vehicle_assigned_employee;
    $update = $db->secure_update($db->db_prefix . 'vehicle', $values1, " WHERE   vehicle_auto_id='" . $_GET['vid'] . "' ");
    //$update1 = $db->secure_update($db->db_prefix . 'company_contacts', $values2, " WHERE contact_id='".$contact_id."' AND company_id='" . $_GET['company_id'] . "' ");
    if (count($update)) {
        $success_msg = "Values Updated!";
        echo "<script>location.href='vehicle_read.php?vid=$id'</script>";
    } else {
        $success_msg = "Error in updation";
    }
}
?>
<!-- code for updation ends -->


<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">


        <div class="pageheader">

            <h2>Vehicle Edit<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="vehicle_list.php">Vehicle</a>
                    </li>
                    <li>
                        Vehicle Edit
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
                                <img class="img-circle" id="emdp" src="<?php echo $cat; ?>" alt="">
                            </div>
                            <h4 class="mb-0">
                                <strong><?php // echo htmlspecialchars_decode($ed_company_name);    ?></strong></h4>
                            <!--<div class="sam">
                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Profile Picture</span>
                                    <input type="file" name="files" class="" id="profile_pic" onchange="upload_files_without_doc(this)">
                                    <input type="hidden" value="companyLogo" name="companyLogo" class="dfile">
                                </span>
                                <p id="sucs" style="color:greenyellow; font-size: 20px;"></p>
                                <br>

                            </div>--->
                        </div>


                    </section>

                </div>
                <!-- /col -->


                <!-- col -->
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="vehicle_read.php?vid=<?php echo $_GET['vid'] ?>">Profile</a>
                                    </li>
                                    <li role="presentation"><a style="color:#16a085;" href="#">Edit Profile</a></li>
                                    <li role="presentation"><a href="vehicle_document_edit.php?vid=<?php echo $_GET['vid'] ?>">Advanced</a>
                                    <li role="presentation"><a href="vehicle_document.php?vid=<?php echo $_GET['vid'] ?>">Documents</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                        <div class="tile-body">

                                            <form class="form-horizontal" name="" method="post"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>
                                                <h3 class="text-success mt-0 mb-20"><?php //echo $success_msg;    ?></h3>
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>About</strong> Vehicle </h4>
                                                        <!--<p>Your personal account settings</p>-->

                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                        <label for="first-name">Vehicle ID:</label>
                                                        <input type="text" class="form-control" name="vehicle_id"
                                                               id="vehicle_id" value="<?php echo $vehicle_id; ?>"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                                        <input type="hidden" name="vehicle_checkid" id="vehicle_idcheck" value="<?php echo $vehicle_id; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-3">
                                                        <label for="last-name">Vehicle Number:</label>
                                                        <input type="text" class="form-control" name="vehicle_number"
                                                               id="vehicle_number" value="<?php echo $vehicle_number; ?>"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                                        <input type="hidden" name="" id="vehicle_numcheck" value="<?php echo $vehicle_number; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-3">
                                                        <label for="zip">Manufacturer:</label>


                                                        <select class="form-control" name="vehicle_manufacturer"
                                                                id="vehicle_manufacturer" required="">

                                                            <?php
                                                            $sql = $db->selectQuery("SELECT * FROM `sm_vehicle_manufacturer`");

                                                            if (count($sql)) {

                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>

                                                                    <option
                                                                        value="<?php echo $sql[$cun]['manufacturer_id']; ?>" <?php if ($vehicle_manufacturer == $sql[$cun]['manufacturer_id']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['manufacturer_name']; ?></option>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>


                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4"><p id="vehicle_id_status"></p></div>
                                                    <div class="col-md-4"><p id="vehicle_number_status"></p></div>
                                                    <div class="col-md-4"><p id=""></p></div>
                                                </div>


                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="city">Model:</label>
                                                        <?php
                                                        $modNameas = $db->selectQuery("SELECT `model_name` FROM `sm_vehicle_model` WHERE `model_id`='$vehicle_model'");
                                                        ?>
                                                        <select class="form-control mb-10" name="vehicle_model"
                                                                id="vehicle_model" required="">
                                                            <option
                                                                value="<?php echo $vehicle_model; ?>"><?php echo $modNameas[0]['model_name']; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="city">Purchase Date:</label>

                                                        <div class='input-group datepicker' data-format="L">
                                                            <?php
                                                            //$date_purcz = new Datetime($vehicle_purchase_date);
                                                            ?>
                                                            <input type='text' name="vehicle_purchase_date"
                                                                   id="vehicle_purchase_date" class="form-control"
                                                                   value="<?php echo $vehicle_purchase_date; ?>"
                                                                   required=""/>
                                                            <span class="input-group-addon"> <span
                                                                    class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Engine Number:</label>
                                                        <input type="text" name="vehicle_engine_number"
                                                               class="form-control" id="vehicle_engine_number"
                                                               value="<?php echo $vehicle_engine_number; ?>" data-parsley-trigger="change" pattern="^[a-zA-Z\d\-\/\s]*$">
                                                    </div>
                                                    <input type="hidden" name="" id="vehicle_engcheck" value="<?php echo $vehicle_engine_number; ?>">

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Chassis Number</label>

                                                        <input type="text" name="vehicle_chassis_number"
                                                               class="form-control" id="Nationality"
                                                               value="<?php echo $vehicle_chassis_number; ?>" data-parsley-trigger="change" pattern="^[a-zA-Z\d\-\/\s]*$">
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"><p id="vehicle_eng_status"></p></div>
                                                    <div class="col-md-6"><p ></p></div>

                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Registration/Istamara</strong> Details</h4>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Registration/Istamara Number:</label>
                                                        <input type="text" name="vehicle_registration_number"
                                                               class="form-control" id="vehicle_registration_number"
                                                               value="<?php echo $vehicle_registration_number; ?>"
                                                               data-parsley-trigger="change" data-parsley-type="digits" required="">
                                                        <input type="hidden" name="" id="vehicle_regcheck" value="<?php echo $vehicle_registration_number; ?>">

                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Company:</label>
                                                        <select class="form-control" name="vehicle_company"
                                                                id="vehicle_manufacturer" required="">
                                                                    <?php
                                                                    $sql = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");

                                                                    if (count($sql)) {

                                                                        for ($cun = 0; $cun < count($sql); $cun++) {
                                                                            ?>

                                                                    <option
                                                                        value="<?php echo $sql[$cun]['company_id']; ?>" <?php if ($vehicle_company == $sql[$cun]['company_id']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['company_name']; ?></option>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select></div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"><p id="vehicle_reg_status"></p></div>
                                                    <div class="col-md-6"><p ></p></div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Registration/Istamara Date</label>
                                                        <?php
                                                        //$date_purcz1 = new Datetime($vehicle_registration_date);
                                                        ?>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' name="vehicle_registration_date"
                                                                   class="form-control"
                                                                   value="<?php echo $vehicle_registration_date; ?>"
                                                                   required=""/>
                                                            <span class="input-group-addon"> <span
                                                                    class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>

                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Registration/Istamara Expiry Date:</label>

                                                        <?php
                                                        //$date_purcz2 = new Datetime($vehicle_registration_expiry);
                                                        ?>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' name="vehicle_registration_expiry"
                                                                   id="vehicle_registration_expiry" class="form-control"
                                                                   value="<?php echo $vehicle_registration_date; ?>"
                                                                   required=""/>

                                                            <span class="input-group-addon"> <span
                                                                    class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Registered Owner</label>
                                                        <input type="text" name="vehicle_registered_owner"
                                                               class="form-control" id="email"
                                                               value="<?php echo $vehicle_registered_owner; ?>"
                                                               data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/"
                                                               required="">
                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Owner's Qatar ID</label>

                                                        <input type="text" name="vehicle_owner_qatar_id"
                                                               class="form-control" id="Nationality"
                                                               value="<?php echo $vehicle_owner_qatar_id; ?>" pattern="^[a-zA-Z\d\-\/\s]*$">
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Insurance</strong> Details</h4>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Insurance Number</label>
                                                        <input type="text" name="vehicle_insurance_id"
                                                               class="form-control" id="vehicle_insurance_number"
                                                               value="<?php echo $vehicle_insurance_id; ?>"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$">
                                                        <input type="hidden" name="" id="vehicle_inscheck" value="<?php echo $vehicle_insurance_id; ?>">

                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Insurance Type</label>

                                                        <select class="form-control mb-10" name="vehicle_insurance_type"
                                                                id="vehicle_insurance_type" required="">


                                                            <?php
                                                            $sql = $db->selectQuery("SELECT * FROM `sm_insurance`");

                                                            if (count($sql)) {

                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>

                                                                    <option
                                                                        value="<?php echo $sql[$cun]['insurance_id']; ?>" <?php if ($vehicle_insurance_type == $sql[$cun]['insurance_id']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['insurance_type']; ?></option>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"><p id="vehicle_insurance_status"></p></div>
                                                    <div class="col-md-6"><p ></p></div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Insurance Start Date</label>
                                                        <?php
                                                        //$date_purcz3 = new Datetime($vehicle_insurance_date);
                                                        ?>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' name="vehicle_insurance_date"
                                                                   id="vehicle_insurance_date" class="form-control"
                                                                   value="<?php echo $vehicle_insurance_date; ?>"
                                                                   required=""/>
                                                            <span class="input-group-addon"> <span
                                                                    class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Insurance Expiry Date</label>
                                                        <?php
                                                        //$date_purcz4 = new Datetime($vehicle_insurance_expiry);
                                                        ?>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' name="vehicle_insurance_expiry"
                                                                   id="vehicle_insurance_expiry"
                                                                   value="<?php echo $vehicle_insurance_expiry; ?>"
                                                                   class="form-control" required=""/>
                                                            <span class="input-group-addon"> <span
                                                                    class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Insurance Company</label>
                                                        <select class="form-control mb-10"
                                                                name="vehicle_insurance_company"
                                                                id="vehicle_insurance_company" required="">

                                                            <?php
                                                            $sql = $db->selectQuery("SELECT * FROM `sm_insurance_company`");

                                                            if (count($sql)) {

                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>

                                                                    <option
                                                                        value="<?php echo $sql[$cun]['insurance_company_name']; ?>" <?php if ($vehicle_insurance_company == $sql[$cun]['insurance_company_name']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['insurance_company_name']; ?></option>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">Insurance Amount</label>

                                                        <input type="text" name="vehicle_insurance_amount"
                                                               class="form-control" id="Nationality"
                                                               value="<?php echo $vehicle_insurance_amount; ?>"
                                                               data-parsley-trigger="change"
                                                               data-parsley-type="digits" required="">
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Assigned</strong> To</h4>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-5">
                                                        <label for="email">Assign Vehicle To:</label>

                                                        <select class="form-control" name="vehicle_assigned_company"
                                                                id="vehicle_assigned_company" required="">

                                                            <?php
                                                            $sql = $db->selectQuery("SELECT * FROM `sm_company` where company_status='1'");

                                                            if (count($sql)) {

                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>

                                                                    <option value="<?php echo $sql[$cun]['company_id']; ?>" <?php if ($vehicle_assigned_company == $sql[$cun]['company_id']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['company_name']; ?></option>


                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>

                                                    <div class="form-group col-md-5">
                                                        <label for="vehicle_assigned_employee">Employee:</label>
                                                        <select class="form-control mb-10"
                                                                name="vehicle_assigned_employee"
                                                                id="vehicle_assigned_employee">
                                                                    <?php
                                                                    $sql1 = $db->selectQuery("SELECT CONCAT(employee_firstname,\"  \",employee_middlename, \"  \",employee_lastname) AS employee_name,employee_id FROM sm_employee WHERE  employee_company='$vehicle_assigned_company' and  employee_status='1'");

                                                                    if (count($sql1)) {

                                                                        for ($cun = 0; $cun < count($sql1); $cun++) {
                                                                            ?>

                                                                    <option value="<?php echo $sql1[$cun]['employee_id']; ?>" <?php if ($vehicle_assigned_employee == $sql1[$cun]['employee_name']) { ?> selected=""<?php } ?>><?php echo $sql1[$cun]['employee_name']; ?></option>


                                                                    <?php
                                                                }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>


                                                </div>
                                                <input type="submit" name="submit"
                                                       class="btn btn-rounded btn-success btn-sm" value="Update">
                                                       <?php ?>

                                            </form>
                                            <div class="row">

                                                <div class="col-md-9"></div>

                                                <span class="text-success mt-0 mb-20"
                                                      id="SucM"><?php echo $success_msg; ?></span>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->


                <?php //	}           ?>


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
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/vendor/parsley/parsley.min.js"></script>
<!--/ vendor javascripts -->
<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->
<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(document).ready(function () {
        // put Ajax here.
    });
    $(window).load(function () {

    });
</script>
<script>
    $('#vehicle_id').on('blur', function (e) {

        var vid = jQuery('#vehicle_id').val();
        var vcheck_id = jQuery('#vehicle_idcheck').val();
        if (vid == vcheck_id) {
            $('#vehicle_id_status').html();
        }

        if (vid != vcheck_id && vid != "") {
            $('#vehicle_id_status').html('');
            $.ajax({
                url: 'editcheck_vid.php', type: 'POST', dataType: 'json', data: {vid: vid, vcheck_id: vcheck_id}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_id').val('');
                        $('#vehicle_id_status').html('Please wait...');
                        $('#vehicle_id_status').css("color", data.color);
                        $('#vehicle_id_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#vehicle_id_status').css("color", data.color);
                        $('#vehicle_id_status').html(data.Status);
                    }
                }
            });
        }

    });
    $('#vehicle_number').on('blur', function (e) {

        var vnum = jQuery('#vehicle_number').val();
        var vcheck_num = jQuery('#vehicle_numcheck').val();
        if (vnum == vcheck_num) {
            $('#vehicle_number_status').html();
        }

        if (vnum != vcheck_num && vnum != "") {
            $('#vehicle_number_status').html('');
            $.ajax({
                url: 'editcheck_vnum.php', type: 'POST', dataType: 'json', data: {vnum: vnum, vcheck_num: vcheck_num}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_number').val('');
                        $('#vehicle_number_status').html('Please wait...');
                        $('#vehicle_number_status').css("color", data.color);
                        $('#vehicle_number_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#vehicle_number_status').css("color", data.color);
                        $('#vehicle_number_status').html(data.Status);
                    }
                }
            });
        }

    });
    $('#vehicle_engine_number').on('blur', function (e) {

        var veng = jQuery('#vehicle_engine_number').val();
        var vcheck_eng = jQuery('#vehicle_engcheck').val();
        if (veng == vcheck_eng) {
            $('#vehicle_eng_status').html();
        }

        if (veng != vcheck_eng && veng != "") {
            $('#vehicle_eng_status').html('');
            $.ajax({
                url: 'editcheck_eng.php', type: 'POST', dataType: 'json', data: {veng: veng, vcheck_eng: vcheck_eng}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_engine_number').val('');
                        $('#vehicle_eng_status').html('Please wait...');
                        $('#vehicle_eng_status').css("color", data.color);
                        $('#vehicle_eng_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#vehicle_eng_status').css("color", data.color);
                        $('#vehicle_eng_status').html(data.Status);
                    }
                }
            });
        }

    });

    $('#vehicle_registration_number').on('blur', function (e) {

        var vreg = jQuery('#vehicle_registration_number').val();
        var vcheck_reg = jQuery('#vehicle_regcheck').val();
        if (vreg == vcheck_reg) {
            $('#vehicle_reg_status').html();
        }

        if (vreg != vcheck_reg && vreg != "") {
            $('#vehicle_reg_status').html('');
            $.ajax({
                url: 'editcheck_reg.php', type: 'POST', dataType: 'json', data: {vreg: vreg, vcheck_reg: vcheck_reg}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_registration_number').val('');
                        $('#vehicle_reg_status').html('Please wait...');
                        $('#vehicle_reg_status').css("color", data.color);
                        $('#vehicle_reg_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#vehicle_reg_status').css("color", data.color);
                        $('#vehicle_reg_status').html(data.Status);
                    }
                }
            });
        }

    });

    $('#vehicle_insurance_number').on('blur', function (e) {

        var vins = jQuery('#vehicle_insurance_number').val();
        var vcheck_ins = jQuery('#vehicle_inscheck').val();
        if (vins == vcheck_ins) {
            $('#vehicle_insurance_status').html();
        }

        if (vins != vcheck_ins && vins != "") {
            $('#vehicle_insurance_status').html('');
            $.ajax({
                url: 'editcheck_ins.php', type: 'POST', dataType: 'json', data: {vins: vins, vcheck_ins: vcheck_ins}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_insurance_number').val('');
                        $('#vehicle_insurance_status').html('Please wait...');
                        $('#vehicle_insurance_status').css("color", data.color);
                        $('#vehicle_insurance_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#vehicle_insurance_status').css("color", data.color);
                        $('#vehicle_insurance_status').html(data.Status);
                    }
                }
            });
        }

    });
    $('#vehicle_manufacturer').change(function () {
        var manufacturer = $(this).val();
        $.ajax({
            url: "vehicle_model.php",
            type: "POST",
            data: {manufacturer: manufacturer},
            success: function (data) {
                $('#vehicle_model').html(data);
            }
        });
    });
    $('#vehicle_assigned_company').change(function () {
        var comp_name = $(this).val();
        $.ajax({
            url: "vehicle_model.php",
            type: "POST",
            data: {comp_name: comp_name},
            success: function (data) {
                $('#vehicle_assigned_employee').html(data);
            }
        });
    });

</script>
</body>
</html>
