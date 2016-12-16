<?php
$page = "employee";
$sub = "e_add";
include("./file_parts/header.php")
?>
<!--/ CONTROLS Content -->
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
</style>
<!-- ====================================================
          ================= CONTENT ===============================
          ===================================================== -->
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Add Employee <span>Add New Employee</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="#"><i class="fa fa-home"></i> SME</a> </li>
                    <li> <a href="#">Employee</a> </li>
                    <li> <a href="#">Add Employee</a> </li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                    <li><a href="#tab2" data-toggle="tab">Address<span class="badge badge-default pull-right wizard-step">2</span></a></li>
                    <li><a href="#tab3" data-toggle="tab">Documents<span class="badge badge-default pull-right wizard-step">3</span></a></li>
                    <li><a href="#tab5" data-toggle="tab">Uploads<span class="badge badge-default pull-right wizard-step">4</span></a></li>
                    <li><a href="#tab6" data-toggle="tab">EULA<span class="badge badge-default pull-right wizard-step">5</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">First Name: </label>
                                    <input type="text"  name="first_name" id="fname" class="form-control"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Middle Name: </label>
                                    <input type="text"  name="middle_name" id="middle_name" class="form-control"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Last Name: </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                           >
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="phone">Company: </label>
                                    <!--<input type="text"    name="company" id="company" class="form-control"   />-->
                                    <select class="form-control" name="company" id="company">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $cmps = $db->selectQuery("SELECT `company_name`,`company_id` FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");
                                        if (count($cmps) > 0) {
                                            for ($ei = 0; $ei < count($cmps); $ei++) {
                                                ?>
                                                <option value="<?php echo $cmps[$ei]['company_id']; ?>"><?php echo $cmps[$ei]['company_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Nationality: </label>
                                    <input type="text" name="nationality" id="" class="form-control"   />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fax">Gender: </label>
                                    <select class="form-control" name="gender">
                                        <option selected="" value=""> Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart">Date of Birth: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="dob" class="form-control"    />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Remarks: </label>
                                <textarea class="form-control" rows="5" name="remarks" id="remarks" placeholder="Remarks"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="step2" role="form" id="step2">
                            <h4 class="custom-font"><strong>Permanent Address</strong></h4>
                            <div class="form-group mt-10">
                                <label for="address1">Address Line 1: </label>
                                <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter primary address"   />
                            </div>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 2: </label>
                                <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter secondary address">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="dnumber">Door no: </label>
                                    <input type="text" name="dnumber" id="dnumber" class="form-control" placeholder="Enter door number"
                                           />
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="city">City </label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter street address"
                                           />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="state">Region/State: </label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter state"
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Enter zip"    />
                                </div>
                            </div>
                            <h4 class="custom-font"><strong>Residential Address</strong></h4>
                            <label class="checkbox checkbox-custom checkbox-custom-sm" id="same_lbl">
                                <input type="checkbox" id="same_chk"><i></i> Same as above
                            </label>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 1: </label>
                                <input type="text" name="address21" id="address12" class="form-control" placeholder="Enter primary address"   />
                            </div>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 2: </label>
                                <input type="text" name="address22" id="address22" class="form-control" placeholder="Enter secondary address">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="dnumber">Door no: </label>
                                    <input type="text" name="dnumber2" id="dnumber2" class="form-control" placeholder="Enter door number"
                                           />
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="city2">City </label>
                                    <input type="text" name="city2" id="city2" class="form-control" placeholder="Enter street address"
                                           />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="state">Region/State: </label>
                                    <input type="text" name="state2" id="state2" class="form-control" placeholder="Enter state"
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="zip2" id="zip2" class="form-control" placeholder="Enter zip"    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email">E-mail: </label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip">Phone: </label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip">Emergency Contact: </label>
                                    <input type="text" name="em_contact" id="em_contact" class="form-control" placeholder="Emergency Contact Number"    />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form name="step3" role="form" id="step3" novalidate>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[5][document_title]" value="Qatar ID"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                                    <input type="text" name="emp_docs[5][document_data]" id="qatar_id" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Start Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="emp_docs[5][document_start_date]" class="form-control"    />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">End Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="emp_docs[5][document_end_date]" class="form-control"    />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mb-0">
                                    <label for="visa_type">Visa Type</label>
                                    <select class="form-control"    id="visa_type" name="visa_type">
                                        <option selected="" value="">Select</option>
                                        <option value="Work Visa">Work Visa</option>
                                        <option value="Residential Visa">Residential Visa</option>
                                    </select>
                                </div>
                                <div id="depnd">

                                </div>
                            </div>
                            <div id="visa_data"></div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <!--<label for="health">: </label>-->
                                    <input type="text" name="emp_docs[0][document_title]" value="Health Card"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                                    <input type="text" name="emp_docs[0][document_data]" id="health" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="health_start">Start date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[0][document_start_date]" id="health_start" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="health_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[0][document_end_date]" id="health_end" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[1][document_title]" value="Insurance"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                                    <input type="text" name="emp_docs[1][document_data]" id="insurance" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="insurance_start">Start date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[1][document_start_date]" id="insurance_start" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="insurance_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[1][document_end_date]" id="insurance_end" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[2][document_title]" value="Driving Licence"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                                    <input type="text" name="emp_docs[2][document_data]" id="licence" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="licence_start">Start date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[2][document_start_date]" id="licence_start" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="licence_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[2][document_end_date]" id="licence_end" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="tab5">
                        <!-- The file upload form used as target for the file upload widget -->
                        <form name="file_form" id="step5" role="form" enctype="multipart/form-data" id="upload_form"  action="multipleimage.php">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <input type="hidden" name="form_submit" value="1"/>
                            <noscript>
                            <input type="hidden" name="redirect" value="">
                            </noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <div>
                                        <label class="col-sm-6 control-label">Passport</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                            <input type="file" name="files[]" class="step5" id="passport_add_files" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" value="Passport" name="pass" class="dfile">
                                        </span>
                                        <p id="file" name="File name here"></p>
                                        <br>
                                    </div>
                                    <label class="col-sm-6 control-label">Visa</label>
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                        <input type="file" name="files[]" class="step5" id="visa_add_files" onchange="upload_files(this)" multiple>
                                        <input type="hidden" value="Visa" name="viza" class="dfile">
                                    </span>
                                    <p id="file" name="File name here"></p>
                                    <br>
                                    <label class="col-sm-6 control-label">Qatar ID</label>
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                        <input type="file" name="files[]" class="step5" id="quatar_add_files" onchange="upload_files(this)"  multiple>
                                        <input type="hidden" value="Qatar" name="qatar" class="dfile">
                                    </span>
                                    <p id="file" name="File name here"></p>
                                    <br>
                                    <label class="col-sm-6 control-label">Health Card</label>
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                        <input type="file" name="files[]" class="step5" id="health_card_add_files" onchange="upload_files(this)" multiple>
                                        <input type="hidden" value="Health" name="health" class="dfile">
                                    </span>
                                    <p id="file" name="File name here"></p>
                                    <br>
                                    <label class="col-sm-6 control-label">Insurance</label>
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                        <input type="file" name="files[]" class="step5" id="insurance_add_files" onchange="upload_files(this)" multiple>
                                        <input type="hidden" value="Insurance" name="insurance" class="dfile">
                                    </span>
                                    <p id="file" name="File name here"></p>
                                    <br>
                                    <label class="col-sm-6 control-label">Resume</label>
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                        <input type="file" name="files[]" class="step5" id="resume_add_files" onchange="upload_files_without_doc(this)" multiple>
                                        <input type="hidden" value="Resume" name="resume" class="dfile">
                                    </span>
                                    <p id="file" name="File name here"></p>
                                    <br>

                                    <div id="depnd_data"></div>
                                    <div class="row">
                                        &nbsp;
                                    </div>
<!--                                    <button type="submit" name="sub" id="upload"  class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Start upload</span> </button>
                                    <button type="reset" class="btn btn-warning cancel"> <i class="glyphicon glyphicon-ban-circle"></i> <span>Cancel upload</span> </button>-->
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            <table role="presentation" class="table table-striped">
                                <tbody class="files">
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <p class="well">Please check and make sure the details given are correct!</p>
                        <form name="step6" role="form" novalidate>
                            <div class="checkbox">
                                <label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="agree" id="agree" checked="">
                                    <i></i> All agreements signed by <a href class="text-info">Employee</a> </label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="newsletter" id="newsletter" checked="">
                                    <i></i> Receive newsletter </label>
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

                                                     }
                                                     */
                                                });
                                            });
</script>
<script>
    jQuery("#same_lbl").click(function () {
        var val = jQuery(this).find('#same_chk').is(':checked');
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();
        var dnumber = $("#dnumber").val();
        var city = $('#city').val();
        var state = $("#state").val();
        var zip = $("#zip").val();
        if (val == true) {
            $("#address12").val(address1);
            $("#address22").val(address2);
            $("#dnumber2").val(dnumber);
            $("#city2").val(city);
            $("#state2").val(state);
            $("#zip2").val(zip);
        } else {
            $("#address12").val("");
            $("#address22").val("");
            $("#dnumber2").val("");
            $("#city2").val("");
            $("#state2").val("");
            $("#zip2").val("");
        }
    });
    var depend_num = 0;
    $('#visa_type').change(function () {
        var visa_type = $(this).val();
        if (visa_type == "Work Visa") {
            $.ajax({
                url: "work_visa.php",
                type: "post",
                data: {type: "work"},
                success: function (data) {
                    $('#visa_data').html(data);
                }
            });
        }
        if (visa_type == "Residential Visa") {
            $("#depnd").html('<div class="form-group col-md-3 mb-0"><label for="depend_num">Number of Dependance</label><input type="text" name="depend_num" id="depend_num" class="form-control"    placeholder=""/></div>')
            $("#depend_num").on('keyup', function () {
                depend_num = $(this).val();
                $.ajax({
                    url: "work_visa.php",
                    type: "post",
                    data: {type: "resid", depend_num: depend_num},
                    success: function (data) {
                        $('#visa_data').html(data);
                    }
                });
                $.ajax({
                    url: "upload_ajax.php",
                    type: "post",
                    data: {depend_num: depend_num},
                    success: function (data) {
                        $('#depnd_data').html(data);
                    }
                });
            });
        }
    });
    $('#finish_btn').click(function () {
        var fdata = $('#step1,#step2,#step3').serialize();
        $.ajax({
            url: "employee_ajax.php",
            type: "post",
            data: fdata,
            success: function (data) {
                //alert(data);
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
<script>

    function upload_files(element)
    {
        var section = $(element).siblings('.dfile').val();
        var cp_id = $('#company').val();
        var fname = $('#qatar_id').val();

        if (cp_id == '' || fname == '')
        {
            window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
        }
        var numf = 0;
        var formData = new FormData();

        jQuery.each(jQuery(element)[0].files, function (i, file) {
            formData.append('file-' + i, file);
            numf = numf + 1;
        });
        $.ajax({
            url: "emp_fileup.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                // alert(data);
            }
        });
    }
    function upload_files_without_doc(ele) {
        var section = $(ele).siblings('.dfile').val();
        var cp_id = $('#company').val();
        var fname = $('#qatar_id').val();
        if (cp_id == '' || fname == '')
        {
            window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
        }
        var numf = 0;
        var formData = new FormData();

        jQuery.each(jQuery(ele)[0].files, function (i, file) {
            formData.append('file-' + i, file);
            numf = numf + 1;
        });
        $.ajax({
            url: "emp_no_doc_fileup.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                // alert(data);
            }
        });
    }

</script>


</body>
</html>

