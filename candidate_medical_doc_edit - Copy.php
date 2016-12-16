<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');
$success_msg = "";
error_reporting(0);
$id = $_GET['uid'];
$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");
if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_dob = $resEmp[0]['employee_dob'];
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
$resDp = $db->selectQuery("SELECT `file_name` FROM `sm_employee_files` WHERE `employee_id`='$id' AND `file_title`='Profile_Picture'");
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
<style>

    .addt_text:focus {
        outline: none;
    }

    .addt_text {

        background-color: transparent;

        border: 0px solid;

        height: 30px;

        width: 260px;

    }

</style>
<section id="content">
    <div class="page page-profile">
        <div class="pageheader">
            <h2>Profile Page</h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="#">Candidate</a>
                    </li>
                    <li>
                        <a href="#">Candidate Profile </a>
                    </li>
                    <li>
                        <a href="#">Edit Profile </a>
                    </li>
                </ul>

            </div>

        </div>
        <h3 class="text-success mt-0 mb-20"><?php echo $success_msg; ?></h3>
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
                                <img class="img-circle" id="emdp" src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $employee_firstname; ?></strong> <?php echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>
                            <div class="sam">
                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Profile Picture</span>
                                    <input type="file" name="files" class="" id="profile_pic" onchange="upload_files_without_doc(this)">
                                    <input type="hidden" value="Profile_Picture" name="Profile_Picture" class="dfile">
                                </span>
                                <p id="sucs" style="color:greenyellow; font-size: 20px;"></p>
                                <br>

                            </div>
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
                                    <li role="presentation"><a href="employee_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a>
                                    </li>
                                    <li role="presentation"><a href="employee_edit.php?uid=<?php echo $_GET['uid'] ?>">Documents
                                           </a></li>
                                    <li role="presentation"><a href="#" style="color:#16a085;">Edit Documents</a></li>
                                   
                                </ul>

                                <div style="padding: 12px">
                                    <form method="post" id="editForm">
                                        <div class="wrap-reset">
                                            <!--Docs-->
                                            <?php
                                            $docc = $db->selectQuery("SELECT * FROM `sm_employee_documents` WHERE `employee_id`='$id' AND `status`='1'");
                                            if (count($docc)) {
                                                for ($i = 0; $i < count($docc); $i++) {
                                                    $document_start_date="";
                                                    $document_end_date="";
                                                    $document_title = $docc[$i]['document_title'];
                                                    $doc_data = $docc[$i]['document_data'];
                                                    //$document_start_date1=$docc[$i]['document_start_date'];
                                                        $document_start_date1 = explode("-",$docc[$i]['document_start_date']);
                                                        $document_start_date = $document_start_date1[2]."/".$document_start_date1[1]."/". $document_start_date1[0];
                                                        //$document_end_date1=$docc[$i]['document_end_date'];
                                                        $document_end_date1 = explode("-",$docc[$i]['document_end_date']);
                                                        $document_end_date = $document_end_date1[2]."/".$document_end_date1[1]."/".$document_end_date1[0];
                                                    if ($document_title == "Qatar ID") {
                                                        $editid = "qatar_id";
                                                        $statid = "qatar_status";
                                                        $document_title_disply="Qatar ID";
                                                    } elseif ($document_title == "Visa") {
                                                        $editid = "visa";
                                                        $statid = "visa_status";
                                                        $document_title_disply="Visa No";
                                                    } elseif ($document_title == "Passport") {
                                                        $editid = "passport";
                                                        $statid = "passport_status";
                                                        $document_title_disply="Passport No";
                                                    } elseif ($document_title == "Health Card") {
                                                        $editid = "health";
                                                        $statid = "health_status";
                                                        $document_title_disply="Health Card No";
                                                    } elseif ($document_title == "Insurance") {
                                                        $editid = "insurance";
                                                        $statid = "insurance_status";
                                                        $document_title_disply="Insurance No";
                                                    } elseif ($document_title == "Driving Licence") {
                                                        $editid = "licence";
                                                        $statid = "driving_status";
                                                        $document_title_disply="Driving Licence No";
                                                    }


                                                    ?>
                                                    <div class="row">
                                                        <div class="form-group col-sm-4">
                                                            <label><?php echo $document_title_disply; ?></label>
                                                            <input type="hidden"
                                                                   name="emp_docs[<?php echo $i; ?>][document_title]"
                                                                   value="<?php echo $document_title; ?>"
                                                                   class="form-control addt_text cmptitle_class"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <input type="text"
                                                                   name="emp_docs[<?php echo $i; ?>][document_data]"
                                                                   value="<?php echo $doc_data; ?>"
                                                                   id="<?php echo $editid; ?>" class="form-control dc_data">
                                                            <span class="doc_status"></span>
                                                            <input type="hidden"
                                                                   value="<?php echo $doc_data; ?>"
                                                                   id="<?php echo $editid; ?>" class="form-control cmpid_class">
                                                        </div>

                                                        <div class="form-group col-md-4 mb-0">
                                                            <label for="licence_end">Commencing date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type="text"
                                                                       name="emp_docs[<?php echo $i; ?>][document_start_date]"
                                                                       value="<?php echo $document_start_date; ?>"
                                                                       id="cr" class="form-control">
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 mb-0">
                                                            <label for="licence_end">End date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type="text"
                                                                       name="emp_docs[<?php echo $i; ?>][document_end_date]"
                                                                       value="<?php echo $document_end_date; ?>" id="cr"
                                                                       class="form-control">
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <p style="color:red;margin-left:20px;"
                                                           id="<?php echo $statid; ?>"></p>


                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <div class="sam">
                                                                <?php
                                                                $explod_value = explode(' ', trim($document_title));
                                                                $explod_document_title = $explod_value[0];

                                                                ?>
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i> <span><?php echo $document_title; ?></span>
                                                                    <input type="file" name="files[]" class=""
                                                                           id="passport_add_files"
                                                                           onchange="upload_files(this)" multiple>
                                                                    <input type="hidden"
                                                                           value="<?php echo $explod_document_title; ?>"
                                                                           class="dfile">
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                               
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <div class="sam">
                                                            <span class="btn btn-success fileinput-button"> <i
                                                                    class="glyphicon glyphicon-plus"></i> <span>Add Files</span>
                                                                <input type="file" name="files[]" class=""
                                                                       id="passport_add_files"
                                                                       onchange="upload_files(this)" multiple>
                                                                <input type="hidden" value="Qatar" class="dfile">
                                                            </span>
                                                            <span class="file_status" style="color:#428bca;"
                                                                  name="File name here"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                             

                                              

                                              
                                            
                                              

                                              
                                                </div>
                                            <?php }
                                            ?>
                                            <input type="hidden" name="idd" value="<?php echo $id; ?>">
                                            <input type="button" class="btn btn-info" id="save_btn" name="save"
                                                   value="Save">
                                            <div class="row">
                                                <div class="col-md-9"></div>
                                                <span class="text-success mt-0 mb-20" id="SucM"></span>
                                            </div>
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


<!-- ============================================
============== Vendor JavaScripts ===============
============================================= -->
<script src="assets/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')
</script>
<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
<script src="assets/js/vendor/parsley/parsley.min.js"></script>
<script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
<!-- The basic File Upload plugin -->
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

    $('.dc_data').on('blur', function (e) {
        var docu_title = $(this).siblings('.cmptitle_class').val();
        var cmp_id = $(this).siblings('.cmpid_class').val();
        var dc_data = jQuery('.dc_data').val();
        var span_field = $(this).siblings('span');
        $(span_field).html(" ");
        if (cmp_id != dc_data && dc_data !="") {
            $(this).siblings('span').html("");
            $.ajax({
                url: "employee_doc_check.php",
                type: "post",
                dataType: "json",
                data: {dc_data: dc_data, docu_title: docu_title},
                success: function (data) {
                    $(span_field).css("color",data.color);
                    $(span_field).html(data.status);
                }
            });
        }
    });

</script>
<script>
    $(window).load(function () {

    });
    function upload_files(element) {
        $(element).parent('span').siblings('.file_status').html("<img src='assets/images/buffering.gif' width='30' height='30'/>");
        var section = $(element).siblings('.dfile').val();
        var cp_id = <?php echo $employee_company; ?>;
        var fname = $('input[name="emp_docs[0][document_data]"]').val();
        if (cp_id == '' || fname == '') {
            window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
        }
        var numf = 0;
        var formData = new FormData();
        var file_ok = 0;
        jQuery.each(jQuery(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
            }
            else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
            }
        });
        if(file_ok==1){
        $.ajax({
            url: "emp_fileup.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                $(element).parent('span').siblings('.file_status').css("color","#428bca");
                $(element).parent('span').siblings('.file_status').html(data);
            }
        });
    }
    }
    function upload_files_without_doc(ele) {
        $('#sucs').html("<img src='assets/images/buffering.gif' width='30' height='30' />");
        var section = $(ele).siblings('.dfile').val();
        var cp_id = '<?php echo $employee_company; ?>';
        var fname = '<?php echo $qaid; ?>';
        var numf = 0;
        var formData = new FormData();

        jQuery.each(jQuery(ele)[0].files, function (i, file) {
            formData.append('file-' + i, file);
            numf = numf + 1;
        });
        $.ajax({
            url: "emp_no_doc_fileupEdit.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section + '&emp_id=' +<?php echo $id; ?>,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                $('#sucs').html(data);
            }
        });
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                jQuery('#emdp').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    jQuery('#profile_pic').change(function () {
        readURL(this);
    });
    $('#save_btn').click(function () {
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        var emp_id =<?php echo $id; ?>;
        var fdata = $('#editForm').serialize();
        $.ajax({
            url: "candidate_doc_edit_action.php?employee_id=" + emp_id,
            type: "post",
            data: fdata,
            success: function (data) {
                $('#SucM').html("Updated Successfully");
                // setTimeout('Redirect()', 2000);
            }
        });
    });
</script>
<!--/ Page Specific Scripts -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>


