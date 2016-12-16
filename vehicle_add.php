<?php
$page = "vehicle";
$sub = "vehicle_add";
include("./file_parts/header.php")
?>
<!--/ CONTROLS Content -->
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

    .file_status {
        color: #428bca;
    }
</style>
<!-- ====================================================
          ================= CONTENT ===============================
          ===================================================== -->
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Add Vehicle <span>Add New Vehicle</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Vehicle</a></li>
                    <li><a href="#">Add Vehicle</a></li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span
                                class="badge badge-default pull-right wizard-step">1</span></a></li>
                    <li><a href="#tab2" data-toggle="tab">Registration/Istamara<span
                                class="badge badge-default pull-right wizard-step">2</span></a></li>
                    <li><a href="#tab3" data-toggle="tab">Insurance<span
                                class="badge badge-default pull-right wizard-step">3</span></a></li>
                    <li><a href="#tab4" data-toggle="tab">Uploads<span
                                class="badge badge-default pull-right wizard-step">4</span></a></li>
                    <li><a href="#tab5" data-toggle="tab">Save &  Finish<span
                                class="badge badge-default pull-right wizard-step">5</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_id">Vehicle ID: </label>
                                    <input type="text" name="vehicle_id" id="vehicle_id" class="form-control"
                                           data-parsley-trigger="change" pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_number">Vehicle Number: </label>
                                    <input type="text" name="vehicle_number" id="vehicle_number" class="form-control"
                                           data-parsley-trigger="change" pattern="^[a-zA-Z\d\-\/\s]*$" required=""
                                           >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><p id="vehicle_id_status"></p></div>
                                <div class="col-md-6"><p id="vehicle_number_status"></p></div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="vehicle_manufacturer">Manufacturer: </label>
                                    <!--<input type="text"    name="company" id="company" class="form-control"   />-->
                                    <select class="form-control" name="vehicle_manufacturer" id="vehicle_manufacturer"
                                            required="">
                                        <option selected="" value="">Select</option>
                                        <?php
                                        $manufacture = $db->selectQuery("SELECT * FROM `sm_vehicle_manufacturer` WHERE `manufacturer_status`='1'");
                                        if (count($manufacture)) {
                                            for ($mn = 0; $mn < count($manufacture); $mn++) {
                                                ?>
                                                <option
                                                    value="<?php echo $manufacture[$mn]['manufacturer_id'] ?>"><?php echo $manufacture[$mn]['manufacturer_name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_model">Model: </label>
                                    <select class="form-control mb-10" name="vehicle_model" id="vehicle_model"
                                            required="">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label for="vehicle_purchase_date">Purchase Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="vehicle_purchase_date" id="vehicle_purchase_date"
                                               class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vehicle_engine_number">Engine Number: </label>
                                    <input type="text" name="vehicle_engine_number" id="vehicle_engine_number"
                                           class="form-control" data-parsley-trigger="change"
                                           pattern="^[a-zA-Z\d\-\/\s]*$" required=""
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vehicle_chassis_number">Chassis Number: </label>
                                    <input type="text" required="" name="vehicle_chassis_number"
                                           id="vehicle_chassis_number" class="form-control"
                                           data-parsley-trigger="change" pattern="^[a-zA-Z\d\-\/\s]*$"
                                           >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><p ></p></div>
                                <div class="col-md-4"><p id="vehicle_engnumber_status"></p></div>
                                <div class="col-md-4"><p style="color:red;"></p></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="step2" role="form" id="step2">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_registration_number">Registration/Istamara Number: </label>
                                    <input type="text" name="vehicle_registration_number"
                                           id="vehicle_registration_number" class="form-control"
                                           data-parsley-trigger="change" data-parsley-type="digits"
                                           required=""
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_company">Company: </label>
                                    <select class="form-control mb-10" name="vehicle_company" id="vehicle_company"
                                            required="">
                                        <option value="" selected>Select</option>
                                        <?php
                                        $reg_company = $db->selectQuery("SELECT `company_id`,`company_name` FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");
                                        if (count($reg_company)) {
                                            for ($rc = 0; $rc < count($reg_company); $rc++) {
                                                ?>
                                                <option
                                                    value="<?php echo $reg_company[$rc]['company_id']; ?>"><?php echo $reg_company[$rc]['company_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><p id="vehicle_reg_status"></p></div>
                                <div class="col-md-6"><p style="color:red;"></p></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="vehicle_registration_date">Registration/Istamara Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="vehicle_registration_date"
                                               id="vehicle_registration_date" class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="vehicle_registration_expiry">Registration/Istamara Expiry Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="vehicle_registration_expiry"
                                               id="vehicle_registration_expiry" class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_registered_owner">Registered Owner: </label>
                                    <input type="text" required="" name="vehicle_registered_owner"
                                           id="vehicle_registered_owner" pattern="/^[a-zA-Z ]+$/" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_owner_qatar_id">Owner's Qatar ID: </label>
                                    <input type="text" required="" name="vehicle_owner_qatar_id"
                                           id="vehicle_owner_qatar_id" pattern="^[a-zA-Z\d\-\/\s]*$"
                                           class="form-control"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form name="step3" role="form" id="step3" novalidate>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_insurance_id">Insurance Number: </label>
                                    <input type="text" name="vehicle_insurance_id" id="vehicle_ins_id"
                                           class="form-control" data-parsley-trigger="change"
                                           pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_insurance_type">Insurance Type: </label>
                                    <select class="form-control mb-10" name="vehicle_insurance_type"
                                            id="vehicle_insurance_type" required="">
                                        <option selected="" value="">Select</option>
                                        <?php
                                        $res_insu = $db->selectQuery("SELECT * FROM `sm_insurance` WHERE `insurance_status`='1'");
                                        if (count($res_insu)) {
                                            for ($in = 0; $in < count($res_insu); $in++) {
                                                ?>
                                                <option
                                                    value="<?php echo $res_insu[$in]['insurance_type']; ?>"><?php echo $res_insu[$in]['insurance_type']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><p id="vehicle_insid_status"></p></div>
                                <div class="col-md-6"><p></p></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="vehicle_insurance_date">Insurance Start Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="vehicle_insurance_date" id="vehicle_insurance_date"
                                               class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="vehicle_insurance_expiry">Insurance Expiry Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="vehicle_insurance_expiry" id="vehicle_insurance_expiry"
                                               class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_insurance_company">Insurance Company: </label>
                                    <select class="form-control mb-10" name="vehicle_insurance_company"
                                            id="vehicle_insurance_company" required="">
                                        <option selected="" value="">Select</option>
                                        <?php
                                        $res_insu_com = $db->selectQuery("SELECT * FROM `sm_insurance_company` WHERE  insurance_company_status='1'");
                                        if (count($res_insu_com)) {
                                            for ($inc = 0; $inc < count($res_insu_com); $inc++) {
                                                ?>
                                                <option
                                                    value="<?php echo $res_insu_com[$inc]['insurance_company_name']; ?>"><?php echo $res_insu_com[$inc]['insurance_company_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_insurance_amount">Insurance Amount: </label>
                                    <input type="text" name="vehicle_insurance_amount" id="vehicle_insurance_amount"
                                           class="form-control" data-parsley-trigger="change" data-parsley-type="digits"
                                           required="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <form name="step4" id="step4" role="form" novalidate>
                            <noscript>
                            <input type="hidden" name="redirect" value="">
                            </noscript>
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Vehicle Pictures</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="vehicle_pictures"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Vehicle Pictures" name="Vehicle_Pictures"
                                                   class="dfile">
                                        </span>
                                        <span class="file_status" name=""></span>
                                        <p></p>
                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Owner's Qatar ID</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="vehicle_owner_qatar_id"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Owner Qatar" name="Owner_Qatar" class="dfile">
                                        </span>
                                        <span class="file_status" name=""></span>
                                        <p></p>
                                    </div>
                                    <!-- <div class="sam">
                                         <label class="col-sm-6 control-label">Plate Number</label>
                                         <span class="btn btn-success fileinput-button"> <i
                                                 class="glyphicon glyphicon-plus"></i>
                                             <span class="">Add files...</span>
                                             <input type="file" name="files[]" class="" id="vehicle_plate_number"
                                                    onchange="upload_files(this)" multiple>
                                             <input type="hidden" value="Plate Number" name="Plate_Nuumber"
                                                    class="dfile">
                                         </span>
                                         <span class="file_status" name=""></span>
                                         <p></p>
                                     </div>--->
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Registration/Istamara Documents</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="registration_document"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Registration Document"
                                                   name="Registration_Document" class="dfile">
                                        </span>
                                        <span class="file_status" name=""></span>
                                        <p></p>
                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Insurance Documents</label>
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="insurance_documents"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Insurance" name="insurance_documents"
                                                   class="dfile">
                                        </span>
                                        <span class="file_status" name=""></span>
                                        <p></p>
                                    </div>

                                    <div class="row">
                                    </div>
                                    <div id="depnd_data"></div>
                                    <div class="row">                                        &nbsp;
                                    </div>
                                    <span class="fileupload-process"></span>
                                </div>
                                <div class="col-lg-5 fileupload-progress fade">
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                                         aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                        </form>
                        <table role="presentation" class="table table-striped">
                            <tbody class="files">
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <!--    <p class="well">Please check and make sure the details given are correct!</p>-->
                        <form name="step5" id="step5" role="form" novalidate>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="vehicle_assigned_company">Assign Vehicle To: </label>
                                    <select class="form-control" name="vehicle_assigned_company"
                                            id="vehicle_assigned_company" required="">
                                        <option value="" selected="">Select Company</option>
                                        <?php
                                        $res_company = $db->selectQuery("SELECT `company_id`,`company_name` FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' and company_status='1'");
                                        if (count($res_company)) {
                                            for ($cmp = 0; $cmp < count($res_company); $cmp++) {
                                                ?>
                                                <option
                                                    value="<?php echo $res_company[$cmp]['company_id']; ?>"><?php echo $res_company[$cmp]['company_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle_assigned_employee">Employee: </label>
                                    <select class="form-control mb-10" name="vehicle_assigned_employee" id="vehicle_assigned_employee" >
                                        <option value="" selected>Select</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <ul class="pager wizard">
                        <li class="previous">
                            <button class="btn btn-default">Previous</button>
                        </li>
                        <li class="next">
                            <button id="next_btn" class="btn btn-default">Next</button>
                        </li>
                        <li class="next finish" style="display:none;">
                            <button id="finish_btn" class="btn btn-success">Finish</button>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <span class="text-success mt-0 mb-20" id="SucM"></span>
                    </div>
                </div>
            </div>
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


<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->
<!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
<script>
                                                       $(window).load(function () {


                                                           $('#rootwizard').bootstrapWizard({
                                                               onTabShow: function (tab, navigation, index) {

                                                                   var $total = navigation.find('li').length;

                                                                   var $current = index + 1;


                                                                   // If it's the last tab then hide the last button and show the finish instead

                                                                   if ($current >= $total) {

                                                                       $('#rootwizard').find('.pager .next').hide();

                                                                       $('#rootwizard').find('.pager .finish').show();

                                                                       $('#rootwizard').find('.pager .finish').removeClass('disabled');

                                                                   } else {

                                                                       $('#rootwizard').find('.pager .next').show();

                                                                       $('#rootwizard').find('.pager .finish').hide();
                                                                   }
                                                               }/*,
                                                                onNext: function (tab, navigation, index) {
                                                                var form = $('form[name="step' + index + '"]');
                                                                form.parsley().validate();
                                                                if (!form.parsley().isValid()) {
                                                                return false;
                                                                }
                                                                },
                                                                onTabClick: function (tab, navigation, index) {
                                                                var form = $('form[name="step' + (index + 1) + '"]');
                                                                form.parsley().validate();
                                                                if (!form.parsley().isValid()) {
                                                                return false;
                                                                }
                                                                }*/
                                                           });
                                                       });</script>
<script>
    $('#vehicle_id').on('blur', function (e) {
        var vid = jQuery('#vehicle_id').val();
        if (vid != "") {
            $('#vehicle_id_status').html('');
            $.ajax({
                url: 'check_vehicleid.php', type: 'POST', dataType: 'json', data: {vid: vid}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_id').val('');
                        $('#vehicle_id_status').html('Please wait...');
                        $('#vehicle_id_status').css("color", data.color);
                        $('#vehicle_id_status').html(data.Status);
                    }
                    /*if (ch == 1) {
                     $('#vehicle_id_status').css("color", data.color);
                     $('#vehicle_id_status').html(data.Status);
                     }*/
                }
            });
        }
    });
    $('#vehicle_number').on('blur', function (e) {
        var vno = jQuery('#vehicle_number').val();
        if (vno != "") {
            $('#vehicle_number_status').html('');
            $.ajax({
                url: 'check_vehiclename.php',
                type: 'POST',
                dataType: 'json',
                data: {vno: vno},
                success: function (data) {
                    var ch1 = data.data_val;
                    if (ch1 == 0) {
                        $('#vehicle_number').val('');
                        $('#vehicle_number_status').css("color", data.color);
                        $('#vehicle_number_status').html(data.Status);
                    }
                    /*if (ch1 == 1) {
                     $('#vehicle_number_status').css("color", data.color);
                     $('#vehicle_number_status').html(data.Status);
                     }*/
                }
            });
        }
    });
    $('#vehicle_engine_number').on('blur', function (e) {
        var v_engno = jQuery('#vehicle_engine_number').val();
        if (v_engno != "") {
            $('#vehicle_engnumber_status').html('');
            $.ajax({
                url: 'check_vehicleng_check.php',
                type: 'POST',
                dataType: 'json',
                data: {v_engno: v_engno},
                success: function (data) {
                    var ch1 = data.data_val;
                    if (ch1 == 0) {
                        $('#vehicle_engine_number').val('');
                        $('#vehicle_engnumber_status').css("color", data.color);
                        $('#vehicle_engnumber_status').html(data.Status);
                    }
                    /*if (ch1 == 1) {
                     $('#vehicle_engnumber_status').css("color", data.color);
                     $('#vehicle_engnumber_status').html(data.Status);
                     }*/
                }
            });
        }
    });
    $('#vehicle_registration_number').on('blur', function (e) {
        var vreg = jQuery('#vehicle_registration_number').val();
        if (vreg != "") {
            $('#vehicle_reg_status').html('');
            $.ajax({
                url: 'check_vehiclereg.php',
                type: 'POST',
                dataType: 'json',
                data: {vreg: vreg},
                success: function (data) {
                    var ch1 = data.data_val;
                    if (ch1 == 0) {
                        $('#vehicle_registration_number').val('');
                        $('#vehicle_reg_status').css("color", data.color);
                        $('#vehicle_reg_status').html(data.Status);
                    }
                    /*if (ch1 == 1) {
                     $('#vehicle_reg_status').css("color", data.color);
                     $('#vehicle_reg_status').html(data.Status);
                     }*/
                }
            });
        }
    });
    $('#vehicle_ins_id').on('blur', function (e) {
        var ins_id = jQuery('#vehicle_ins_id').val();
        if (ins_id != "") {
            $('#vehicle_insid_status').html('');
            $.ajax({
                url: 'check_vehicle_ins_id.php',
                type: 'POST',
                dataType: 'json',
                data: {ins_id: ins_id},
                success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#vehicle_ins_id').val('');
                        $('#vehicle_id_status').html('Please wait...');
                        $('#vehicle_insid_status').css("color", data.color);
                        $('#vehicle_insid_status').html(data.Status);
                    }
                    /*if (ch == 1) {
                     $('#vehicle_insid_status').css("color", data.color);
                     $('#vehicle_insid_status').html(data.Status);
                     }*/
                }
            });
        }
    });
    $('#finish_btn').click(function () {
        var fdata = $('#step1,#step2,#step3,#step4,#step5').serialize();
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        $.ajax({
            url: "vehicle_ajax.php",
            type: "post",
            data: fdata,
            success: function (data) {
                $('#SucM').html(data);
                setTimeout('Redirect()', 2000);
            }
        });
    });
</script>
<script>
    function Redirect() {
        window.location = "vehicle_list.php";
    }
</script>
<script>
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
    function upload_files(element) {
        var file_names = $(element).parent('span').siblings('label').html();
        $(element).parent('span').siblings('.file_status').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        var section = $(element).siblings('.dfile').val();
        var vehicle_id = $('#vehicle_id').val();
        var file_ok = 0;
        if (vehicle_id == '') {
            window.alert('Vehicle ID cannot be empty');
            return;
        }
        var numf = 0;
        var formData = new FormData();

        jQuery.each(jQuery(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
            } else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
            }
        });
        if (file_ok == 1) {
            $.ajax({
                url: "vehicle_fileup.php?numf=" + numf + '&vehicle_id=' + vehicle_id + '&section=' + section,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').html(data);
                }
            });
        }
    }
</script>
</body>
</html>

