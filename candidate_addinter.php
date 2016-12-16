<?php

$page = "recruitment";
$tab = "candidate";
$sub = "candidate_add";
$sub1 = "";
include("file_parts/header.php");
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
            <h2>Add Candidate <span>Add New Candidate</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Candidate</a></li>
                    <li><a href="#">Add Candidate</a></li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span
                                class="badge badge-default pull-right wizard-step">1</span></a></li>
                    <li><a href="#tab2" data-toggle="tab">Qualification<span
                                class="badge badge-default pull-right wizard-step">2</span></a></li>
                    <li><a href="#tab3" data-toggle="tab">Applied for<span
                                class="badge badge-default pull-right wizard-step">3</span></a></li>
                    <li><a href="#tab4" data-toggle="tab">Experience<span
                                class="badge badge-default pull-right wizard-step">4</span></a></li>
                    <li><a href="#tab5" data-toggle="tab">Documents<span
                                class="badge badge-default pull-right wizard-step">5</span></a></li>
                    <li><a href="#tab6" data-toggle="tab">Uploads<span
                                class="badge badge-default pull-right wizard-step">6</span></a></li>
                    <li><a href="#tab7" data-toggle="tab">Finish<span
                                class="badge badge-default pull-right wizard-step">7</span></a></li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">First Name: </label>
                                    <input type="text" name="candidate_firstname" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Middle Name: </label>
                                    <input type="text" name="candidate_middlename" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Last Name: </label>
                                    <input type="text" name="candidate_lastname" class="form-control"
                                           >
                                </div>
								
                            </div>
                            <div class="row">
                               
                                <div class="form-group col-md-4">
                                    <label for="phone">Marital status: </label>
                                    <select class="form-control mb-10" name="candidate_marital_status">
                                        <option selected="" value=""> Select</option>
                                        <option value="Married">Married</option>
                                        <option value="Not Married">Not Married</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax">Gender: </label>
                                    <select class="form-control" name="candidate_gender">
                                        <option selected="" value=""> Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="scstart">Date of Birth: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="candidate_dob" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Nationality: </label>
                                    <select class="form-control mb-10" name="candidate_nationality">
                                        <option value="">Select</option>
                                        <?php
                                        $select = $db->selectQuery("select * from country ");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select[$rt]['name']; ?>"> <?php echo $select[$rt]['name']; ?> </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dnumber">Door no: </label>
                                    <input type="text" name="candidate_doorno" id="dnumber" class="form-control"
                                           />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">City </label>
                                    <input type="text" name="candidate_city" id="city" class="form-control"
                                           />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="state">Region/State: </label>
                                    <input type="text" name="candidate_state" id="state" class="form-control"
                                           >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="candidate_zipcode" id="zip" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">Email: </label>
                                    <input type="email" name="candidate_email" class="form-control"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Phone: </label>
                                    <input type="text" name="candidate_phone" class="form-control"
                                           >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="step2" role="form" id="step2">
                            <h4 class="custom-font"><strong>Qualification</strong></h4>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax">Qualification: </label>
                                    <select class="form-control" name="qualification[0][qualification_name]">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                        if (count($selectQual)) {
                                            for ($qi = 0; $qi < count($selectQual); $qi++) {
                                                ?>
                                                <option
                                                    value="<?php echo $selectQual[$qi]['qualification_name']; ?>"><?php echo $selectQual[$qi]['qualification_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Status: </label>
                                    <select class="form-control mb-10" name="qualification[0][qualification_status]">
                                        <option selected="" value=""> Select</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Passed">Passed</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax">Qualification: </label>
                                    <select class="form-control" name="qualification[1][qualification_name]">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                        if (count($selectQual)) {
                                            for ($qi = 0; $qi < count($selectQual); $qi++) {
                                                ?>
                                                <option
                                                    value="<?php echo $selectQual[$qi]['qualification_name']; ?>"><?php echo $selectQual[$qi]['qualification_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Status: </label>
                                    <select class="form-control mb-10" name="qualification[1][qualification_status]">
                                        <option selected="" value=""> Select</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Passed">Passed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="qualification_div"></div>
                            <input type="hidden" value="2" id="qualification_increment"/>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="qualification_add_btn">Other
                                        Qualifications <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form name="step3" role="form" id="step3" novalidate>
                            <h4 class="custom-font"><strong>Applied For</strong></h4>
                            <div class="row">
							<div class="col-md-4">
							<label for="selected_interview">Select Interview: </label>
							<select class="form-control" name="application[1][interview_id]" id="selected_interview">
								<option selected="" value=""> Select</option>

                                                            <?php

                                                            $select_interview = $db->selectQuery("SELECT `interview_id`,`interview_name` FROM `sm_interview` WHERE `interview_status`='Active'");

                                                            if (count($select_interview)) {

                                                                for ($intr = 0; $intr < count($select_interview); $intr++) {

                                                                    ?>

                                                                    <option value="<?php echo $select_interview[$intr]['interview_id']; ?>"><?php echo $select_interview[$intr]['interview_name']; ?></option>

                                                                    <?php

                                                                }

                                                            }

                                                            ?>
									</select>
									</div>
													
                                <div class="form-group col-md-6">
                                    <label for="interview_job_position">Job Position: </label>
                                    <select class="form-control job_position"
                                            name="application[1][application_job_position]"
                                            id="job_position">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        /*$select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                        if (count($select_job) > 0) {
                                            for ($ji = 0; $ji < count($select_job); $ji++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>
                                                    <?php
                                                }
                                            } */
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Category: </label>
                                    <select class="form-control category"
                                            name="application[1][application_job_category]" id="job_category">
                                        <option selected="" value="">Select</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="skill_set">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <form name="step4" role="form" id="step4">
                            <h4 class="custom-font"><strong>Experience Details</strong></h4>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax">Company: </label>
                                    <input type="text" name="experience[0][experience_company]" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Designation: </label>
                                    <select class="form-control mb-10" name="experience[0][experience_designation]">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_exp = $db->selectQuery("SELECT * FROM `sm_job_positions`");
                                        if (count($select_exp)) {
                                            for ($ei = 0; $ei < count($select_exp); $ei++) {
                                                ?>
                                                <option value="<?php echo $select_exp[$ei]['job_name']; ?>"><?php echo $select_exp[$ei]['job_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <option value="Other"> Other</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="scstart">From: </label>
                                    <input type='text' name="experience[0][experience_from]"
                                           class="form-control date_pick"/>
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="scstart">To: </label>
                                    <input type='text' name="experience[0][experience_to]"
                                           class="form-control date_pick"/>

                                </div>
                            </div>
                            <div class="experience_div"></div>
                            <input type="hidden" value="1" id="experience_increment">
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="experience_add_btn">Add Experience
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane" id="tab5">
                        <form name="step5" id="step5" role="form">
                            <h4 class="custom-font"><strong>Documents</strong></h4>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label>Passport No</label>
                                    <input type="hidden" name="documents[0][documents_title]" readonly=""
                                           value="Passport" class="form-control addt_text"
                                           style="background-color: #fff; color: black; cursor: default;">
                                    <input type="text" name="documents[0][documents_data]" id="qatar_id"
                                           class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Issue Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="documents[0][documents_start_date]"
                                               class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Renewal Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="documents[0][documents_end_date]" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label>Driving License ID</label>
                                    <input type="hidden" name="documents[1][documents_title]" readonly=""
                                           value="Driving Licence" class="form-control addt_text"
                                           style="background-color: #fff; color: black; cursor: default;">
                                    <input type="text" name="documents[1][documents_data]" id="qatar_id"
                                           class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Start Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="documents[1][documents_start_date]"
                                               class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">End Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="documents[1][documents_end_date]" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label>ID Card No</label>
                                    <input type="hidden" name="documents[2][documents_title]" readonly=""
                                           value="ID Card" class="form-control addt_text"
                                           style="background-color: #fff; color: black; cursor: default;">
                                    <input type="text" name="documents[2][documents_data]" id="qatar_id"
                                           class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <form name="step6" id="step6s" role="form" novalidate>
                            <noscript>
                            <input type="hidden" name="redirect" value="">
                            </noscript>
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Candidate Photo</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files" class="" id="profile_pic"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Candidate_Picture" name="profpic" class="dfile">
                                        </span>
                                        <span class="file_status_img" name="File name here"></span>
                                        <p></p>
                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Passport Documents</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files" class="" id="profile_pic"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Passport_Documents" name="profpic" class="dfile">
                                        </span>
                                        <span class="file_status_img" name="File name here"></span>
                                        <p></p>
                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Experience Certificates</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files" class="" id="profile_pic"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Experience_Certificates" name="profpic" class="dfile">
                                        </span>
                                        <span class="file_status_img" name="File name here"></span>
                                        <p></p>
                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Resume</label>
                                        <span class="btn btn-success fileinput-button"> <i
                                                class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files" class="" id="profile_pic"
                                                   onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Resume" name="Resume" class="dfile">
                                        </span>
                                        <span class="file_status_img" name="File name here"></span>
                                        <p></p>
                                    </div>
<!--                                    <span class="btn btn-success fileinput-button"> <i
                                            class="glyphicon glyphicon-plus"></i>
                                        <span class="">Add New</span>
                                        <input type="text" name="files" class="" id="profile_pic" />
                                        <input type="hidden" value="Profile_Picture" name="profpic" class="dfile">
                                    </span>-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab7">
                        <p class="well">Please check and make sure the details given are correct!</p>
                        <!--                        <form name="step7" role="form" novalidate>
                                                    <div class="checkbox">
                                                        <label class="checkbox checkbox-custom-alt">
                                                            <input type="checkbox" name="newsletter" id="newsletter" checked="">
                                                            <i></i> Receive notifications </label>
                                                    </div>
                                                </form>-->
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
<script>
                                                       $('body').on('click', '.date_pick', function () {
                                                           $(this).datepicker({
                                                               changeMonth: true,
                                                               changeYear: true,
                                                               dateFormat: "dd/mm/yy"
                                                           }).focus();
                                                           $(this).removeClass('datepicker');
                                                       });
</script>

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

    });
</script>
<script>
$('#selected_interview').change(function () {
	var selected_interview = $(this).val();
	$.ajax({
	url: "interview_form_process.php",
	type: "POST",
	data: {selected_interview: selected_interview},
	success: function (data) {
		//alert(data);
	$('.job_position').html(data);
}
});
});
    // $('.date_pick').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $('#qualification_add_btn').click(function () {
        var qualification_add = "qualification_add";
        qualification_val_incr = $('#qualification_increment').val();
        added_qual = +qualification_val_incr + 1;
        $.ajax({
            url: "candidate_additions.php",
            type: "POST",
            data: {qualification_add: qualification_add, qual_val: qualification_val_incr},
            success: function (data) {
                $('.qualification_div').append(data);
                $('#qualification_increment').val(added_qual);
            }
        });
    });
    $('.job_position').change(function () {
        var job_position = $(this).val();
        $.ajax({
            url: "candidate_process.php",
            type: "POST",
            data: {job_position: job_position},
            success: function (data) {
                $('#job_category').html(data);
            }
        });
    });
	
    $('#job_category').change(function () {
        var job_cat = $(this).val();
        var job_psn = $('.job_position').val();
        $.ajax({
            url: "candidate_process.php",
            type: "POST",
            data: {job_cat: job_cat, job_psn: job_psn},
            success: function (data) {
                $('.skill_set').html(data);
            }
        });
    });
    $('#experience_add_btn').click(function () {
        var experience_add = "experience_add";
        experience_increment = $('#experience_increment').val();
        added_exp = +experience_increment + 1;
        $('.experience_div').append(
                '<div class="row">'
                + '<div class="form-group col-md-4">'
                + '<label for="fax">Company: </label>'
                + '<input type="text"  name="experience[' + experience_increment + '][experience_company]"  class="form-control" > '
                + '</div>'
                + '<div class="form-group col-md-4">'
                + '<label for="phone">Designation: </label>'
                + '<select class="form-control mb-10" name="experience[' + experience_increment + '][experience_designation]"  >'
                + '<option selected="" value=""> Select</option>'
                + '<option value="Married">Sample</option>'
                + '<option value="Not Married">Sample</option>'
                + '</select>'
                + '</div>'
                + '</div>'
                + '<div class="row">'
                + '<div class="form-group col-md-4">'
                + '<label for="scstart">From: </label>'
                + '<input type="text" name="experience[' + experience_increment + '][experience_from]" class="form-control date_pick"/>'
                + '</div>'
                + '<div class="form-group col-md-4 ">'
                + '<label for="scstart">To: </label>'
                + '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick"/>'
                + '</div>'
                + '</div>'
                );
        $('#experience_increment').val(added_exp);
    });
    $('#agent_code').change(function () {
        var agent_code = $(this).val();
        $.ajax({
            url: "candidate_process.php",
            type: "POST",
            data: {agent_code: agent_code},
            success: function (data) {
                $('#candidate_code').val(data);
            }
        });
    });
    $('#finish_btn').click(function () {
        var fdata = $('#step1,#step2,#step3,#step4,#step5').serialize();
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
		var result="";
        $.ajax({
            url: "candi_ajax.php",
            type: "post",
            data: fdata,
            success: function (data) {
                $('#SucM').html(data);
				//alert(data);
				//setTimeout('Redirect()', 1000);
				//var myid = "<?php echo 'fgfdg'; ?>";
                window.location = "interview_form.php?can_id="<?php echo @$_SESSION['candidate_id']; ?>;
            }
        });
		return result;
    });
</script>
<script>
    function Redirect() {
		
    }
</script>
<script>
    function upload_files(element) {
        $(element).parent('span').siblings('.file_status_img').html("<img src='assets/images/buffering.gif' width='30' height='30' />");
        var section = $(element).siblings('.dfile').val();
        var cp_id = $('#candidate_code').val();
        var numf = 0;
        var file_ok = 0;
        var formData = new FormData();
        $.each($(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status_img').hide();
                $(element).parent('span').siblings('.file_status_warn').css("color", "red");
                $(element).parent('span').siblings('.file_status_warn').html("File size must be less than 2MB");
            } else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
                $(this).closest('input').val();
            }
        });
        if (file_ok == 1) {
            $.ajax({
                url: "candidate_fileup.php?numf=" + numf + '&cp_id=' + cp_id + '&section=' + section,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $(element).parent('span').siblings('.file_status_img').hide();
                    $(element).parent('span').siblings('.file_status_warn').hide();
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').append(data);
                }
            });
        }
    }
</script>
<?php //echo "XXXXXXXXXX".$_SESSION['candidate_id']; ?>
</body>
</html>

