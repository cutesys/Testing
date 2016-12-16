<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');
$id = $_GET['uid'];
$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");
if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_employment_id = $resEmp[0]['employee_employment_id'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
    $employee_salary = $resEmp[0]['employee_salary'];
    $employee_fee = $resEmp[0]['employee_fee'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_blood_group = $resEmp[0]['employee_blood_group'];
    $employee_medical_category = $resEmp[0]['employee_medical_category'];
    $employee_telephone = $resEmp[0]['employee_telephone'];
    $employee_dob = $resEmp[0]['employee_dob'];
    $employee_doj1 = new DateTime($resEmp[0]['employee_joining_date']);
    $employee_doj = $employee_doj1->format("d/m/Y");
    $employee_remarks = $resEmp[0]['employee_remarks'];
    $employee_peraddress1 = $resEmp[0]['employee_peraddress1'];
    $employee_peraddress2 = $resEmp[0]['employee_peraddress2'];
    $employee_perdoor = $resEmp[0]['employee_perdoor'];
    $employee_percity = $resEmp[0]['employee_percity'];
    $employee_perstate = $resEmp[0]['employee_perstate'];
    $employee_perzip = $resEmp[0]['employee_perzip'];
    $employee_resiaddress1 = $resEmp[0]['employee_resiaddress1'];
    $employee_resiaddress2 = $resEmp[0]['employee_resiaddress2'];
    $employee_residoor = $resEmp[0]['employee_residoor'];
    $employee_resicity = $resEmp[0]['employee_resicity'];
    $employee_resistate = $resEmp[0]['employee_resistate'];
    $employee_zip = $resEmp[0]['employee_zip'];
    $employee_email = $resEmp[0]['employee_email'];
    $employee_phone = $resEmp[0]['employee_phone'];
    $employee_emcontact = $resEmp[0]['employee_emcontact'];
    $sponsor_id = $resEmp[0]['sponsor_id'];
}
$dpImg = "";
$resDp = $db->selectQuery("SELECT `file_name` FROM `sm_employee_files` WHERE `employee_id`='$id' AND `file_title`='Profile_Picture' AND `file_status`='1'");
if (count($resDp)) {
    $dpImg = $resDp[0]['file_name'];
} else {
    $dpImg = "assets/images/profile-default.png";
}
$qaid = "";
$resDoc = $db->selectQuery("SELECT `document_data` FROM `sm_employee_documents` WHERE `document_title`='Qatar ID' AND `employee_id`='$id' AND status='1'");
if (count($resDoc)) {
    $qaid = $resDoc[0]['document_data'];
}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Profile Page</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="#">Employee</a>
                    </li>
                    <li>
                        <a href="#">Employee Profile </a>
                    </li>
                    <li>
                        <a href="#">Edit Profile </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img class="img-circle" id="emdp" src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $employee_firstname; ?></strong> <?php echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>

                        </div>


                    </section>
                    <!-- /tile -->


                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile header -->
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> Me</h1>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">



                            <p class="text-default lt"><?php echo $employee_remarks; ?></p>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
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
                                    <li role="presentation"><a href="employee_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a></li>
                                    <li role="presentation"><a style="color:#16a085;" href="#">Edit Profile</a></li>
                                    <li role="presentation"><a href="employee_doc_edit.php?uid=<?php echo $_GET['uid'] ?>">Advanced</a></li>
                                    <li role="presentation"><a href="employee_gallery.php?uid=<?php echo $_GET['uid'] ?>">Documents</a></li>
                                </ul>

                                <div style="padding: 12px">

                                    <div class="tab-content">


                                        <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                            <div class="tile-body">
                                                <form class="form-horizontal"  name="" method="post" enctype="multipart/form-data" role="form" data-parsley-validate action="employee_edit_action.php">


                                                    <div class="wrap-reset">

                                                        <form class="profile-settings">

                                                            <div class="row">
                                                                <div class="form-group col-md-12 legend">
                                                                    <h4><strong>Personal</strong> Settings</h4>

                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-sm-3">
                                                                    <label for="first-name">First Name</label>
                                                                    <input type="text" class="form-control" name="f_name" id="f_name"  value="<?php echo $employee_firstname; ?>" data-parsley-trigger="change"
                                                                           pattern="/^[a-zA-Z ]+$/" required="">
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>

                                                                <div class="form-group col-sm-3">
                                                                    <label for="last-name">Middle Name</label>
                                                                    <input type="text" class="form-control" name="m_name" id="m_name" value="<?php echo $employee_middlename; ?>" data-parsley-trigger="change"
                                                                           pattern="/^[a-zA-Z ]+$/">
                                                                </div>

                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-3">
                                                                    <label for="last-name">Last Name</label>
                                                                    <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $employee_lastname; ?>" data-parsley-trigger="change"
                                                                           pattern="/^[a-zA-Z ]+$/" required="">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-5">
                                                                    <label for="zip">Employee ID</label>

                                                                    <input type="text" class="form-control" name="employee_employment_id"  id="employee_employment_id" value="<?php echo $employee_employment_id; ?>">
                                                                    <span id="employee_com_id_span"></span>
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-5">
                                                                    <label for="zip">Date of Joining</label>
                                                                    <div class='input-group datepicker' data-format="L">
                                                                        <input type="text" class="form-control" name="doj"  id="doj" value="<?php echo $employee_doj; ?>">
                                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <div class="legend">
                                                                        <h5><strong>Permanant Address</strong></h5>
                                                                    </div>
                                                                    <label for="address1">Addressline 1</label>
                                                                    <input type="text" class="form-control" name="employee_peraddress1"  id="p_address" value="<?php echo $employee_peraddress1; ?>" >
                                                                    <label for="address1">Addressline 2</label>
                                                                    <input type="text" class="form-control" name="employee_peraddress2"  id="p_address" value="<?php echo $employee_peraddress2; ?>">
                                                                    <label for="address1">Door</label>
                                                                    <input type="text" class="form-control" name="employee_perdoor"  id="p_address" value="<?php echo $employee_perdoor; ?>" >
                                                                    <label for="address1">City</label>
                                                                    <input type="text" class="form-control" name="employee_percity"  id="p_address" value="<?php echo $employee_percity; ?>" >
                                                                    <label for="address1">State</label>
                                                                    <input type="text" class="form-control" name="employee_perstate"  id="p_address" value="<?php echo $employee_perstate; ?>" >
                                                                    <label for="address1">Zip</label>
                                                                    <input type="text" class="form-control" name="employee_perzip"  id="p_address" value="<?php echo $employee_perzip; ?>" data-parsley-trigger="change" pattern="^[\d\+\s]*$" >
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <!--                                                                <div class="form-group col-sm-5">
                                                                                                                                    <div class="legend">
                                                                                                                                        <h5><strong>Temporary Address</strong></h5>
                                                                                                                                    </div>
                                                                                                                                    <label for="address2">Addressline 1</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_resiaddress1"  id="t_address" value="<?php echo $employee_resiaddress1; ?>" required="">
                                                                                                                                    <label for="address1">Addressline 2</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_resiaddress2"  id="p_address" value="<?php echo $employee_resiaddress2; ?>">
                                                                                                                                    <label for="address1">Door</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_residoor"  id="p_address" value="<?php echo $employee_residoor; ?>" required="">
                                                                                                                                    <label for="address1">City</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_resicity"  id="p_address" value="<?php echo $employee_resicity; ?>" required="">
                                                                                                                                    <label for="address1">State</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_resistate"  id="p_address" value="<?php echo $employee_resistate; ?>" required="">
                                                                                                                                    <label for="address1">Zip</label>
                                                                                                                                    <input type="text" class="form-control" name="employee_zip"  id="p_address" value="<?php echo $employee_zip; ?>" required="">
                                                                                                                                </div>-->
                                                            </div>

                                                            <div class="row">


                                                                <div class="form-group col-sm-5">
                                                                    <label for="state">Gender</label>
            <!--                                                            <input type="text" class="form-control" name="gender" id="gender" value="<?php //echo $val['employee_gender'];                                                               ?>">-->
                                                                    </br>
                                                                    <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php if ($employee_gender == 'Male') { ?>checked=""<?php } ?>/>Male</label>
                                                                    <label class="radio-inline"><input type="radio" name="gender" value="Female"<?php if ($employee_gender == 'Female') { ?>checked=""<?php } ?>/>Female</label>
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-5">
                                                                    <label for="zip">DOB</label>

                                                                    <div class='input-group datepicker' data-format="L">
                                                                        <input type="text" class="form-control" name="dob"  id="dob" value="<?php echo $employee_dob; ?>">
                                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                    </div>

                                                                </div>

                                                            </div>




                                                            <?php
                                                            //    $cid= $val['employee_company'];
                                                            //  echo $cid;exit;
                                                            // $company_name=  mysql_query("select * from sm_company where company_id=$cid");
                                                            // $name =  mysql_fetch_array($company_name);
                                                            ?>
                                                            <div class="row">

                                                                <div class="form-group col-sm-5">
                                                                    <label for="city">Company</label>
                                                                    <select name="company" id="company" class="form-control" required="">
                                                                        <option value="" selected="">Select</option>
                                                                        <?php
                                                                        $co_name = $db->selectQuery("SELECT * FROM `sm_company` WHERE `company_status`='1'");
                                                                        if (count($co_name)) {
                                                                            for ($ce = 0; $ce < count($co_name); $ce++) {
                                                                                $coId = $co_name[$ce]['company_id'];
                                                                                $coName = $co_name[$ce]['company_name'];
                                                                                ?>
                                                                                <option value="<?php echo $coId ?>" <?php if ($employee_company == $coId) { ?> selected=""<?php } ?> ><?php echo $coName; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-5">
                                                                    <label for="city">Designation</label>
                                                                    <select name="desig" class="form-control" >
                                                                        <option value="" selected="">Selected</option>

                                                                        <?php
                                                                        $desigEm = $db->selectQuery("SELECT * FROM `sm_designation` WHERE `designation_status`='1'");
                                                                        if (count($desigEm)) {
                                                                            for ($ds = 0; $ds < count($desigEm); $ds++) {
                                                                                ?>
                                                                                <option value="<?php echo $desigEm[$ds]['designation_name']; ?>" <?php if ($employee_designation == $desigEm[$ds]['designation_name']) { ?> selected=""<?php } ?>><?php echo $desigEm[$ds]['designation_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-5">
                                                                    <label for="city">Salary(QAR)</label>
                                                                    <input type="text" class="form-control" name="employee_salary"  id="city" value="<?php echo $employee_salary; ?>" data-parsley-trigger="change" pattern="^[\d\+\.\(\)\/\s]*$">
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-5">
                                                                    <label for="state">Sponsorship Fee(QAR)</label>
                                                                    <input type="text" class="form-control" name="employee_fee" id="state" value="<?php echo $employee_fee; ?>" data-parsley-trigger="change" pattern="^[\d\+\.\(\)\/\s]*$">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-5">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $employee_email; ?>" >
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>

                                                                <div class="form-group col-sm-5">
                                                                    <label for="Nationality">Nationality</label>
                                                                    <select name="country"class="form-control">
                                                                        <option value="" selected="">Selected</option>
                                                                        <?php
                                                                        $sql = $db->selectQuery("SELECT * FROM country");
                                                                        if (count($sql)) {
                                                                            for ($cun = 0; $cun < count($sql); $cun++) {
                                                                                ?>
                                                                                <option value="<?php echo $sql[$cun]['name']; ?>" <?php if ($employee_nationality == $sql[$cun]['name']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-5">
                                                                    <label for="blood_group">Blood Group</label>
                                                                    <select class="form-control"    id="blood_group" name="blood_group">
                                                                        <option selected="" value="">Select</option>
                                                                        <option value="A+" <?php
                                                                        if ($employee_blood_group == "A+") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>A+</option>
                                                                        <option value="A-" <?php
                                                                        if ($employee_blood_group == "A-") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>A-</option>
                                                                        <option value="B+" <?php
                                                                        if ($employee_blood_group == "B+") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>B+</option>
                                                                        <option value="B-" <?php
                                                                        if ($employee_blood_group == "B-") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>B-</option>
                                                                        <option value="O+" <?php
                                                                        if ($employee_blood_group == "O+") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>O+</option>
                                                                        <option value="O-" <?php
                                                                        if ($employee_blood_group == "O-") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>O-</option>
                                                                        <option value="AB+" <?php
                                                                        if ($employee_blood_group == "AB+") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>AB+</option>
                                                                        <option value="AB-" <?php
                                                                        if ($employee_blood_group == "AB-") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>AB-</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>

                                                                <div class="form-group col-sm-5">
                                                                    <label for="Nationality">Medical Category</label>
                                                                    <select class="form-control" id="medical_category" name="medical_category" >
                                                                        <option selected="" value="">Select</option>
                                                                        <option value="Fit" <?php
                                                                        if ($employee_medical_category == "Fit") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>Fit</option>
                                                                        <option value="Unfit" <?php
                                                                        if ($employee_medical_category == "Unfit") {
                                                                            echo 'selected=""';
                                                                        }
                                                                        ?>>Unfit</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-sm-5">
                                                                    <label for="email">Phone</label>
                                                                    <input type="text" name="employee_phone"  class="form-control" id="email" value="<?php echo $employee_phone; ?>" data-parsley-trigger="change" pattern="^[\d\+\s]*$" >
                                                                </div>
                                                                <div class="form-group col-sm-2"></div>
                                                                <div class="form-group col-sm-5">
                                                                    <label for="Nationality">Emergency Contact</label>
                                                                    <input type="text" name="employee_contact"  class="form-control" id="Nationality" value="<?php echo $employee_emcontact; ?>" data-parsley-trigger="change" pattern="^[\d\+\s]*$" >
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <!--                                                        </div>-->

                                                                <div class="form-group col-sm-6">
                                                                    <label for="email">Telephone</label>
                                                                    <input type="text" name="employee_telephone"  class="form-control" id="employee_telephone" value="<?php echo $employee_telephone; ?>" data-parsley-trigger="change" pattern="^[\d\+\s]*$">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label for="message">Remarks: </label>
                                                                    <textarea class="form-control" rows="6" name="employee_remarks" id="message"><?php echo $employee_remarks; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!--Docs-->
                                                            <input type="hidden" name="idd" value="<?php echo $id; ?>">
                                                            <input type="submit" class="btn btn-info" name="save" value="save">

                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>

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













                <script src="assets/jquery.min.js"></script><script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script><script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script><script src="assets/js/vendor/jRespond/jRespond.min.js"></script><script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script><script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script><script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script><script src="assets/js/vendor/screenfull/screenfull.min.js"></script><script src="assets/js/vendor/parsley/parsley.min.js"></script><script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script><script src="assets/js/vendor/daterangepicker/moment.min.js"></script><script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script><script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script><script src="assets/js/vendor/parsley/parsley.min.js"></script><!-- The basic File Upload plugin -->




                <!-- ============================================
                ============== Custom JavaScripts ===============
                ============================================= -->
                <script src="assets/js/main.js"></script>
                <!--/ custom javascripts -->






                <!-- ===============================================
                ============== Page Specific Scripts ===============
                ================================================ -->
                <script>
                    $(window).load(function () {
                        $('#employee_employment_id').on('blur', function (e) {
                            var employee_com_id = jQuery('#employee_employment_id').val();
                            $('#employee_com_id_span').html("");
                            if (employee_com_id == "") {
                                $('#employee_com_id_span').html("This value is required");
                            } else {
                                $.ajax({
                                    url: 'check_qatar.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {employee_employment_id: employee_com_id},
                                    success: function (data) {
                                        $('#employee_com_id_span').html(data.Status);
                                        $('#employee_com_id_span').css("color", data.color);
                                        var ch = data.data_val;
                                        if (ch == 0) {
                                            $('#employee_employment_id').val('');
                                        }
                                        if (ch == 1) {

                                        }
                                    }
                                });
                            }
                        });
                    });

                </script>
                <!--/ Page Specific Scripts -->





                <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                <script>
                    (function (b, o, i, l, e, r) {
                        b.GoogleAnalyticsObject = l;
                        b[l] || (b[l] =
                                function () {
                                    (b[l].q = b[l].q || []).push(arguments)
                                });
                        b[l].l = +new Date;
                        e = o.createElement(i);
                        r = o.getElementsByTagName(i)[0];
                        e.src = '../../www.google-analytics.com/analytics.js';
                        r.parentNode.insertBefore(e, r)
                    }(window, document, 'script', 'ga'));
                    ga('create', 'UA-XXXXX-X', 'auto');
                    ga('send', 'pageview');
                </script>

                </body>

                <!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
                </html>




