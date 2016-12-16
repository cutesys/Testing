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

    }
}
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_vehicle_documents` WHERE `vehicle_document_id`='$id'");

if (count($resLogo)) {
    $dpImg1 = $resLogo[0]['vehicle_document_images'];
    $cats = explode(",", $resLogo[0]['vehicle_document_images']);
    $dpImg = $cats[0];
} else {
    $dpImg = "assets/images/profile-default.png";
}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
    .addt_text:focus{
        outline: none;
    }
    .addt_text {
        background-color:transparent;
        border: 0px solid;
        height:30px;
        width:260px;
    }
    .file_status{
        color:#428bca;
    }
</style>
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
                        <a href="employee_list.php">Vehicle</a>
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
                                <img class="img-circle" src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0">
                                <strong><?php //echo $employee_firstname;   ?></strong> <?php //echo $employee_lastname;   ?>
                            </h4>
                            <span class="text-muted"><?php // echo $employee_designation;   ?></span>
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
                                    <li role="presentation"><a href="vehicle_read.php?vid=<?php echo $id ?>">Profile</a></li>
                                    <li role="presentation"><a style=""
                                                               href="vehicle_edit.php?vid=<?php echo $id ?>">Edit
                                            Profile</a></li>
                                    <li role="presentation"><a style="color:#16a085;"
                                                               href="vehicle_document_edit.php?vid=<?php echo $_GET['vid'] ?>">Advanced</a>
                                    </li>
                                    <li role="presentation"><a href="vehicle_document.php?vid=<?php echo $_GET['vid'] ?>">Documents</a></li>
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" id="editForm">
                                        <div class="wrap-reset">
                                            <!--Docs-->
                                            <div class="sam">
                                                <label class="col-sm-6 control-label">Vehicle Pictures</label>
                                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                                    <span class="">Add files...</span>
                                                    <input type="file" name="files[]" class="" id="vehicle_pictures" onchange="upload_files(this)"  multiple>
                                                    <input type="hidden" value="Vehicle Pictures" name="Vehicle_Pictures" class="dfile">
                                                </span>
                                                <span class="file_status" name=""></span>
                                                <p  ></p>
                                            </div>
                                            <div class="sam">
                                                <label class="col-sm-6 control-label">Owner's Qatar ID</label>
                                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                                    <span class="">Add files...</span>
                                                    <input type="file" name="files[]" class="" id="vehicle_owner_qatar_id" onchange="upload_files(this)" multiple>
                                                    <input type="hidden" value="Owner Qatar" name="Owner_Qatar" class="dfile">
                                                </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>
                                            <!---<div class="sam">
                                                <label class="col-sm-6 control-label">Plate Number</label>
                                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="vehicle_plate_number" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" value="Plate Number" name="Plate_Nuumber" class="dfile">
                                        </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>--->
                                            <div class="sam">
                                                <label class="col-sm-6 control-label">Registration/Istamara Documents</label>
                                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                                    <span class="">Add files...</span>
                                                    <input type="file" name="files[]" class="" id="registration_document" onchange="upload_files(this)" multiple>
                                                    <input type="hidden" value="Registration Document" name="Registration_Document" class="dfile">
                                                </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>
                                            <div class="sam">
                                                <label class="col-sm-6 control-label">Insurance Documents</label>
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span class="">Add files...</span>
                                                    <input type="file" name="files[]" class="" id="insurance_documents" onchange="upload_files(this)" multiple>
                                                    <input type="hidden" value="Insurance" name="insurance_documents" class="dfile">
                                                </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>
                                            <!---<div class="sam">
                                                <label class="col-sm-6 control-label">Pollution Certificate</label>
                                                <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="pollution_documents" onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Pollution" name="pollution_documents" class="dfile">
                                        </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>
                                            <div class="sam">
                                                <label class="col-sm-6 control-label">NOC</label>
                                                <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="noc_documents" onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="NOC" name="noc_documents" class="dfile">
                                        </span>
                                                <span class="file_status" name=""></span>
                                                <p></p>
                                            </div>---->
                                            <?php
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
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
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
                                                        $(window).load(function () {

                                                        });
                                                        function upload_files(element)
                                                        {
                                                            var file_names = $(element).parent('span').siblings('label').html();
                                                            $(element).parent('span').siblings('.file_status').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
                                                            var section = $(element).siblings('.dfile').val();
                                                            var vehicle_id = $('#vehicle_id').val();
                                                            if (vehicle_id == '')
                                                            {
                                                                window.alert('Vehicle ID cannot be empty');
                                                                return;
                                                            }
                                                            var numf = 0;
                                                            var formData = new FormData();

                                                            jQuery.each(jQuery(element)[0].files, function (i, file) {
                                                                formData.append('file-' + i, file);
                                                                numf = numf + 1;
                                                            });
                                                            $.ajax({
                                                                url: "vehicle_fileup.php?numf=" + numf + '&vehicle_id=' + vehicle_id + '&section=' + section,
                                                                type: "POST",
                                                                cache: false,
                                                                contentType: false,
                                                                processData: false,
                                                                data: formData,
                                                                success: function (data) {
                                                                    $(element).parent('span').siblings('.file_status').html(data);
                                                                }
                                                            });
                                                        }
                                                        $('#save_btn').click(function () {
                                                            $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
                                                            var vehicle_id =<?php echo $id; ?>;
                                                            var f_data = $('#editForm').serialize();
                                                            $.ajax({
                                                                url: "vehicle_document_ajax.php?vehicle_id=" + vehicle_id,
                                                                type: "post",
                                                                data: f_data,
                                                                success: function (data) {
                                                                    $('#SucM').html(data);
                                                                    // setTimeout('Redirect()', 2000);
                                                                }
                                                            });
                                                        });
</script>

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>


