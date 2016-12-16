<?php
$page = "recruitment";
$tab = "interview";
$sub = "interview_list";
$head = "";
$head1 = "";
$sub1 = "";
$tab1 = "";
include("file_parts/header.php");
if (isset($_REQUEST['inter_id'])) {
    $inter_id = $_REQUEST['inter_id'];
}
$select_interview = $db->selectQuery("SELECT * FROM `sm_interview` WHERE `interview_id`='$inter_id'");
if (count($select_interview)) {
    $interview_auto_id = $select_interview[0]['interview_auto_id'];
    $interview_name = $select_interview[0]['interview_name'];
    $company_id = $select_interview[0]['company_id'];
    $interview_interviewer = $select_interview[0]['interview_interviewer'];
	$interview_date_from1 = explode("-", $select_interview[0]['interview_date_from']); 
   // print_r($interview_date_from1);die;
	$interview_date_from = $interview_date_from1[2] . "/" . $interview_date_from1[1] . "/" . $interview_date_from1[0];
    $interview_date_to1 = explode("-", $select_interview[0]['interview_date_to']);
	$interview_date_to = $interview_date_to1[2] . "/" . $interview_date_to1[1] . "/" . $interview_date_to1[0]; 
    $interview_country = $select_interview[0]['interview_country'];
    $interview_time_from = $select_interview[0]['interview_time_from'];
    $interview_time_to = $select_interview[0]['interview_time_to'];
    $interview_state = $select_interview[0]['interview_state'];
    $interview_place = $select_interview[0]['interview_place'];
    $interview_status = $select_interview[0]['interview_status'];
}
?>
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

            <h2>Interview</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Recruitment</a></li>
                    <li><a href="#">Schedule Interview</a></li>
                    <li>
                        <a href="#">Interviews</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="interview_view.php?inter_id=<?php echo $inter_id; ?>">Interview</a></li>
                                    <li role="presentation"><a style="color:#16a085;"  href="interview_edit.php?inter_id=<?php echo $inter_id; ?>">Edit Interview</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="tile-body">
                                            <form class="form-horizontal" name="" method="post" action="interview_edit_action.php"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Interview</strong> Details</h4>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label for="username">Interview ID: </label>
                                                        <input type="text"
                                                               class="form-control" pattern="^[a-zA-Z\d\-\/\s]*$"
                                                               value="<?php echo $interview_auto_id; ?>" readonly="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="username">Interview Name: </label>
                                                        <input type="text" name="interview_name" id="interview_name" class="form-control"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$" value="<?php echo $interview_name; ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-sm-6">
                                                        <label for="last-name">Company</label>

                                                        <select class="form-control" name="interview_company" id="interview_company">
                                                            <option selected="" value=""> Select</option>
                                                            <?php
                                                            $select_company = $db->secure_select("SELECT `company_id`,`company_name` FROM `sm_company` WHERE `company_status`='1'");
                                                            if (count($select_company) > 0) {
                                                                for ($ci = 0; $ci < count($select_company); $ci++) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo $select_company[$ci]['company_id']; ?>" <?php
                                                                        if ($company_id == $select_company[$ci]['company_id']) {
                                                                            echo "selected=''";
                                                                        }
                                                                        ?>><?php echo $select_company[$ci]['company_name']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="username">Interviewer: </label>
                                                        <input type="text" name="interview_interviewer" value="<?php echo $interview_interviewer; ?>" id="interview_interviewer"
                                                               class="form-control" pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-0">
                                                        <label for="scstart"> Date From: </label>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type="text" class="form-control" name="interview_date_from"
                                                                   id="interview_date_from" value="<?php echo $interview_date_from; ?>" required onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-0">
                                                        <label for="scstart">Date To: </label>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type="text" class="form-control" name="interview_date_to"
                                                                   id="interview_date_from" value="<?php echo $interview_date_to; ?>" required onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-md-6 mb-0">
                                                        <label for="scstart"> Time From: </label>
                                                        <div class='input-group datepicker' data-format="LT">
                                                            <input type='text' value="<?php echo $interview_time_from; ?>" class="form-control" name="interview_time_from"
                                                                   id="interview_date_from" required="" onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-6 mb-0">
                                                        <label for="scstart">Time To: </label>
                                                        <div class='input-group datepicker' data-format="LT">
                                                            <input type='text' class="form-control" value="<?php echo $interview_time_to; ?>" name="interview_time_to"
                                                                   id="interview_date_from" required="" onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="Nationality">Country</label>
                                                        <select class="form-control" name="interview_country" id="interview_country">
                                                            <option selected="" value=""> Select</option>
                                                            <?php
                                                            $select_country = $db->secure_select("SELECT `country_name` FROM `sm_recruit_country` WHERE `country_status`='1'");
                                                            if (count($select_country) > 0) {
                                                                for ($cni = 0; $cni < count($select_country); $cni++) {
                                                                    ?>
                                                                    <option
                                                                        value="<?php echo $select_country[$cni]['country_name']; ?>" <?php
                                                                        if ($interview_country == $select_country[$cni]['country_name']) {
                                                                            echo "selected=''";
                                                                        }
                                                                        ?>><?php echo $select_country[$cni]['country_name']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="companyname">State: </label>
                                                        <select class="form-control" name="interview_state" id="interview_state">
                                                            <option selected="" value="<?php echo $interview_state; ?>"> <?php echo $interview_state; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class=" col-md-4">
                                                        <label for="username">Place: </label>
                                                        <input type="text" name="interview_place"  value="<?php echo $interview_place; ?>" id="interview_place" class="form-control"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Hiring</strong> Requirements</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $requir = $db->selectQuery("SELECT * FROM `sm_interview_requirements` WHERE `interview_id`='$inter_id'");
                                                if (count($requir)) {
                                                    for ($qi = 0; $qi < count($requir); $qi++) {
                                                        ?>
                                                        <h4 class="custom-font"><strong>Requirement <?php echo $nq = $qi + 1; ?></strong></h4>
                                                        <input type="hidden" name="requirement[<?php echo $nq = $qi + 1; ?>][requirement_number]" value="<?php echo $nq = $qi + 1; ?>">
                                                        <div class="row">
                                                            <div class=" col-sm-6">
                                                                <label>Job Position</label>
                                                                <select class="form-control interview_job_position<?php echo $nq = $qi + 1; ?>"
                                                                        name="requirement[<?php echo $nq = $qi + 1; ?>][requirements_job]"
                                                                        id="interview_job_position">
                                                                    <option selected="" value=""> Select</option>
                                                                    <?php
                                                                    $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                                                    if (count($select_job) > 0) {
                                                                        for ($ji = 0; $ji < count($select_job); $ji++) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $select_job[$ji]['job_name']; ?>" <?php
                                                                                if ($requir[$qi]['requirements_job'] == $select_job[$ji]['job_name']) {
                                                                                    echo "selected=''";
                                                                                }
                                                                                ?>><?php echo $select_job[$ji]['job_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class=" col-sm-6">
                                                                <label>Category</label>
                                                                <select class="form-control interview_category<?php echo $nq = $qi + 1; ?>"
                                                                        name="requirement[<?php echo $nq = $qi + 1; ?>][requirements_category]" id="interview_category">
                                                                    <option selected="" value="<?php echo $requir[$qi]['requirements_category']; ?>"> <?php echo $requir[$qi]['requirements_category']; ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--<div class="row">
                                                            <div class=" col-sm-12">
                                                                <!--<label>Skills</label>-->
                                                                <!--<input type="text" class="form-control"  readonly="" value="<?php // echo $requir[$qi]['requirements_skills'];                                 ?>">-->
                                                            <!--</div>
                                                        </div>-->													
														<div class="form-group col-md-12">
														
														<div class="skill_set<?php echo $nq = $qi + 1; ?>">
													 <?php if (!empty($requir[$qi]['requirements_category']) && !empty($requir[$qi]['requirements_job'])) { 
															$select_skill = $db->selectQuery("SELECT `skill_name` FROM `sm_job_skill` WHERE `skill_category`='".$requir[$qi]['requirements_category']."' AND `skill_job`='".$requir[$qi]['requirements_job']."'");
															if (count($select_skill) > 0) {
															for ($ski = 0; $ski < count($select_skill); $ski++) {  ?>
																
															<?php /*name="requirements_skills[<?php echo $ski ?>]" */ ?>
															<?php $skils = explode(',',$requir[$qi]['requirements_skils']);?>
															<!--<div class="skill_setss">-->
																<label class="checkbox checkbox-custom-alt">
																	<input type="checkbox" name="requirement[<?php echo $nq = $qi + 1; ?>][requirements_skills][]" value="<?php echo $select_skill[$ski]['skill_name']; ?>" <?php //if($select_skill[$ski]['skill_name'] == $requir[$qi]['requirements_skils']) { echo "checked"; } ?>
																	<?php if(in_array($select_skill[$ski]['skill_name'],$skils)) { ?> checked="checked" <?php } ?>/><i></i> 
																<?php echo $select_skill[$ski]['skill_name']; ?></label>
															<!--</div>-->
														<?php } } } ?>
														</div>
														
														<input type="hidden" name="req_value<?php echo $nq = $qi + 1; ?>" value="<?php echo $nq = $qi + 1; ?>" class="req_value<?php echo $nq = $qi + 1; ?>"/>
														
														<?php /*<div class="skill_set<?php echo $nq = $qi + 1; ?>"></div> */ ?>
														
														</div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div class="row">&nbsp;</div>
													  <div class="requirement_div"></div>                            <input type="hidden" id="requirement_val_incr" value="4"/>														                            <div class="row">                                <div class="col-md-3">                                    <button class="btn btn-success" id="requirement_add" type="button">Add New <i                                            class="fa fa-plus"></i></button>                                </div>                            </div>

                                                <div class="row">
                                                    <div class=" form-group col-md-12 legend">
                                                        <h4><strong>Qualification</strong> Details</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $qualif = $db->selectQuery("SELECT * FROM `sm_interview_qualifications` WHERE `interview_id`='$inter_id'");
                                                if (count($qualif)) {
                                                    for ($qi = 0; $qi < count($qualif); $qi++) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="interview_qualification">Qualification: </label>
                                                                <select class="form-control" name="qualification[<?php echo $qi; ?>][qualifications_name]"
                                                                        id="interview_qualification">
                                                                    <option selected="" value=""> Select</option>
                                                                    <?php
                                                                    $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                                                    if (count($selectQual)) {
                                                                        for ($ql = 0; $ql < count($selectQual); $ql++) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $selectQual[$ql]['qualification_name']; ?>" <?php
                                                                                if ($selectQual[$ql]['qualification_name'] == $qualif[$qi]['qualifications_name']) {
                                                                                    echo "selected=''";
                                                                                }
                                                                                ?>><?php echo $selectQual[$ql]['qualification_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="interview_qualification_status">Status: </label>
                                                                <select class="form-control" name="qualification[<?php echo $qi; ?>][qualifications_status]" id="interview_qualification_status">
                                                                    <option selected="" value=""> Select</option>
                                                                    <option  value="Passed" <?php
                                                                    if ($qualif[$qi]['qualifications_status'] == "Passed") {
                                                                        echo "selected=''";
                                                                    }
                                                                    ?>> Passed</option>
                                                                    <option  value="Failed" <?php
                                                                    if ($qualif[$qi]['qualifications_status'] == "Failed") {
                                                                        echo "selected=''";
                                                                    }
                                                                    ?>> Failed</option>
                                                                </select>
                                                            </div>
                                                        </div>
													<?php } 
												} ?>												<div class="qualification_div"></div>                            <input type="hidden" value="2" id="qualification_increment" />                            <div class="row">                                <div class="col-md-3">                                    <button class="btn btn-success" type="button" id="qualification_add_btn">Other                                        Qualifications <i class="fa fa-plus"></i></button>                                </div>                            </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
																<h4 class="custom-font"><strong>Interview Status</strong></h4>
                                                                <select class="form-control" name="interview_status"
                                                                        id="interview_status">
                                                                    <option value="Active" <?php
                                                                    if ($interview_status == "Active") {
                                                                        echo "selected=''";
                                                                    }
                                                                    ?>> Active</option>
                                                                    <option value="Inactive" <?php
                                                                    if ($interview_status == "Inactive") {
                                                                        echo "selected=''";
                                                                    }
                                                                    ?>> Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                <div class="row">&nbsp;</div>
                                                <input type="hidden" name="interview_id" value="<?php echo $inter_id; ?>">
                                                <input type="submit" class="btn btn-info" name="save" value="Save">
                                            </form>
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


            </div>
            <!-- /row -->

        </div>
        <!-- /page content -->

    </div>

</section>
<!--/ CONTENT -->

</div>
<!--/ Application Content -->

</div>


<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
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
    $('#interview_country').change(function () {
        var interview_country = $(this).val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_country: interview_country},
            success: function (data) {
                $('#interview_state').html(data);
            }
        });
    });
    $('#selected_interview').change(function () {
        var selected_interview = $(this).val();
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {selected_interview: selected_interview},
            success: function (data) {
                $('#select_job').html(data);
            }
        });
    });
    $('#select_job').change(function () {
        var select_job = $(this).val();
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {select_job: select_job},
            success: function (data) {
                $('#select_candidate').html(data);
            }
        });
    });
    $('#select_candidate').change(function () {
        var select_candidate = $(this).val();
        location.href = "interview_form.php?can_id=" + select_candidate;

    });
    $('.interview_job_position1').change(function () {
        var interview_job_position = $(this).val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_job_position: interview_job_position},
            success: function (data) {
                $('.interview_job_position1').parent('div').siblings('div').find('.interview_category1').html(data);
            }
        });
    });
    $('.interview_category1').change(function () {
        var interview_category = $(this).val();
        var interview_job_position = $('.interview_job_position1').val();
		 var req_value1 = $('.req_value1').val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_cat: interview_category, interview_job: interview_job_position,req_value: req_value1},
            success: function (data) {
				//$('.skill_set_edit1').hide();
				//$('.skill_set_edit1').disable();
				//$(".skill_set_edit1").children().prop('disabled',true);
                $('.skill_set1').html(data);
            }
        });
    });
    $('.interview_job_position2').change(function () {
        var interview_job_position = $(this).val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_job_position: interview_job_position},
            success: function (data) {
                $('.interview_category2').html(data);
            }
        });
    });
    $('.interview_category2').change(function () {
		//alert("2cat");
        var interview_category = $(this).val();
        var interview_job_position = $('.interview_job_position2').val();
		var req_value2 = $('.req_value2').val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_cat: interview_category, interview_job: interview_job_position,req_value: req_value2},
            success: function (data) {
				//$('.skill_set_edit2').hide();
                $('.skill_set2').html(data);
            }
        });
    });
    $('.interview_job_position3').change(function () {
        var interview_job_position = $(this).val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_job_position: interview_job_position},
            success: function (data) {
                $('.interview_category3').html(data);
            }
        });
    });
    $('.interview_category3').change(function () {
		//alert("dgfdgfdg");
        var interview_category = $(this).val();
        var interview_job_position = $('.interview_job_position3').val();
		var req_value3 = $('.req_value3').val();
        $.ajax({
            url: "interview_process.php",
            type: "POST",
            data: {interview_cat: interview_category, interview_job: interview_job_position,req_value: req_value3},
            success: function (data) {
				//$('.skill_set_edit3').hide();
                $('.skill_set3').html(data);
            }
        });
    });				
	 $('#requirement_add').click(function () {            var requirement_add = "requirement_add";            requirement_val_incr = $('#requirement_val_incr').val();            added_val = +requirement_val_incr + 1;			requirement_val_incr= added_val;//            $.ajax({//                url: "interview_additions.php",//                type: "POST",//                data: {requirement_add: requirement_add, req_val: requirement_val_incr},//                success: function (data) {//                    $('.requirement_div').append(data);//                    $('#requirement_val_incr').val(added_val);//                }//            });            $('.requirement_div').append('<h4 class="custom-font">'                    + '<strong>Requirement' + requirement_val_incr + '</strong></h4>'                    + ' <div class="row">'                    + ' <div class="form-group col-md-6">'                    + ' <label for="interview_job_position">Job Position: </label>'                    + '  <select class="form-control interview_job_position_more' + requirement_val_incr + '" name="requirement[' + requirement_val_incr + '][requirements_job]" id="interview_job_position">'                    + ' <option selected="" value=""> Select</option>'                    + '<?php                                            $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");                                            if (count($select_job) > 0) {                                                for ($ji = 0; $ji < count($select_job); $ji++) {                                                    $select_value = $select_job[$ji]["job_name"];                                                    echo $option = '<option value="' . $select_value . '">' . $select_value . '</option>';                                                }                                            }                                            ?>'                    + '</select>'                    + ' </div>'										+ ' <input type="hidden" name="requirement[' + requirement_val_incr + '][requirement_number]" value="' + requirement_val_incr + '">'                    + '<div class="form-group col-md-6">'                    + ' <label for="interview_category">Category: </label>'                    + '  <select class="form-control interview_category_more' + requirement_val_incr + '" name="requirement[' + requirement_val_incr + '][requirements_category]" id="interview_category">'                    + '    <option selected="" value=""> Select</option>'                    + ' </select>'                    + '</div>'					+ '<input type="hidden" name="req_value' + requirement_val_incr + '" value="' + requirement_val_incr + '" class="req_value' + requirement_val_incr + '"/>'                   // + '   <div class="form-group col-md-12">'                 //   + '    <div class="skill_set_more' + requirement_val_incr + '"></div>'                  //  + ' </div>'                    + '  </div>');										$(document).on('blur', '.interview_job_position_more' + requirement_val_incr, function () {					var interview_job_position = $(this).val();						$.ajax({							url: "interview_process.php",							type: "POST",							data: {interview_job_position: interview_job_position},							success: function (data) {								$('.interview_category_more' + requirement_val_incr).html(data);							}						});					});															$(document).on('blur', '.interview_category_more' + requirement_val_incr, function () {					var interview_category = $(this).val();					var interview_job_position = $('.interview_job_position_more' + requirement_val_incr).val();					var req_value = $('.req_value' + requirement_val_incr).val();						$.ajax({							url: "interview_process.php",							type: "POST",							data: {interview_cat_add: interview_category, interview_job_add: interview_job_position,req_value:req_value},							success: function (data) {								$('.skill_set_more' + requirement_val_incr).html(data);							}						});				});								$('#requirement_val_incr').val(added_val);		 }); $('#qualification_add_btn').click(function () {            var qualification_add = "qualification_add";            qualification_val_incr = $('#qualification_increment').val();            added_qual = +qualification_val_incr + 1;            $.ajax({                url: "interview_process.php",                type: "POST",                data: {qualification_add: qualification_add, qual_val: added_qual},                success: function (data) {                    $('.qualification_div').append(data);                    $('#qualification_increment').val(added_qual);                }            });        });
	/*$('.interview_category').change(function () {
            var interview_category = $(this).val();
            var interview_job_position = $('.interview_job_position').val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_cat: interview_category, interview_job: interview_job_position},
                success: function (data) {
                    $('.skill_set').html(data);
					$('.skill_set_edit').hide;
					
                }
            });
        });*/
</script>
</body>
</html>

