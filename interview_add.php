<?php
$page = "recruitment";
$tab = "interview";
$sub = "interview_add";
$head = "";
$head1 = "";
$sub1 = "";
$tab1 = "";
$inter_id = "";
include("./file_parts/header.php");
$generate_auto_id = 0;
$auto_id_select = $db->secure_select("SELECT `interview_id` FROM `sm_interview` ORDER BY `interview_id` DESC LIMIT 1");
if (count($auto_id_select) > 0) {
    $selected_interview_id = $auto_id_select[0]['interview_id'];
    $incremented_id = $selected_interview_id + 1;
    $generate_auto_id = str_pad($incremented_id, 5, '0', STR_PAD_LEFT);
} else {
    $selected_interview_id = 0;
    $incremented_id = $selected_interview_id + 1;
    $generate_auto_id = str_pad($incremented_id, 5, '0', STR_PAD_LEFT);
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
    .file_status {
        color: #428bca;
    }
</style>
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Add Interview <span>Add New Interview</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Recruitment</a></li>
                    <li><a href="#">Schedule Interview</a></li>
                    <li><a href="#">Add Interview</a></li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span
                                class="badge badge-default pull-right wizard-step">1</span></a></li>

                    <li><a href="#tab2" data-toggle="tab">Location<span
                                class="badge badge-default pull-right wizard-step">2</span></a></li>

                    <li><a href="#tab3" data-toggle="tab">Hiring Requirements<span
                                class="badge badge-default pull-right wizard-step">3</span></a></li>

                    <li><a href="#tab4" data-toggle="tab">Qualification<span
                                class="badge badge-default pull-right wizard-step">4</span></a></li>

                    <li><a href="#tab5" data-toggle="tab">Save & Finish<span
                                class="badge badge-default pull-right wizard-step">5</span></a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" id="step1" role="form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Interview ID: </label>
                                    <input type="text" name="interview_auto_id" id="interview_auto_id"
                                           class="form-control" pattern="^[a-zA-Z\d\-\/\s]*$"
                                           value="<?php echo $generate_auto_id; ?>" readonly="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="companyname">Company Name: </label>
                                    <select class="form-control" name="interview_company" id="interview_company">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_company = $db->secure_select("SELECT `company_id`,`company_name` FROM `sm_company` WHERE `company_status`='1'");
                                        if (count($select_company) > 0) {
                                            for ($ci = 0; $ci < count($select_company); $ci++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_company[$ci]['company_id']; ?>"><?php echo $select_company[$ci]['company_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Interview Name: </label>
                                    <input type="text" name="interview_name" id="interview_name" class="form-control"
                                           pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Interviewer: </label>
                                    <input type="text" name="interview_interviewer" id="interview_interviewer"
                                           class="form-control" pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Date From: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="interview_date_from"
                                               id="interview_date_from" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart">Date To: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="interview_date_to"
                                               id="interview_date_from" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Time From: </label>
                                    <div class='input-group datepicker' data-format="LT">
                                        <input type='text' class="form-control" name="interview_time_from"
                                               id="interview_date_from" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart">Time To: </label>
                                    <div class='input-group datepicker' data-format="LT">
                                        <input type='text' class="form-control" name="interview_time_to"
                                               id="interview_date_from" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="step2" id="step2" role="form">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="companyname">Country: </label>
                                    <select class="form-control" name="interview_country" id="interview_country">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_country = $db->secure_select("SELECT `country_name` FROM `sm_recruit_country` WHERE `country_status`='1'");
                                        if (count($select_country) > 0) {
                                            for ($cni = 0; $cni < count($select_country); $cni++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_country[$cni]['country_name']; ?>"><?php echo $select_country[$cni]['country_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">State: </label>
                                    <select class="form-control" name="interview_state" id="interview_state">
                                        <option selected="" value=""> Select</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">Place: </label>
                                    <input type="text" name="interview_place" id="interview_place" class="form-control"
                                           pattern="^[a-zA-Z\d\-\/\s]*$" required="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form name="step3" id="step3" role="form" novalidate>
                            <h4 class="custom-font"><strong>Requirement 1</strong></h4>
                            <div class="row">
                                <input type="hidden" name="requirement[1][requirement_number]" value="1">
                                <div class="form-group col-md-6">
                                    <label for="interview_job_position">Job Position: </label>
                                    <select class="form-control interview_job_position"
                                            name="requirement[1][requirements_job]"
                                            id="interview_job_position">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                        if (count($select_job) > 0) {
                                            for ($ji = 0; $ji < count($select_job); $ji++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="interview_category">Category: </label>
                                    <select class="form-control interview_category"
                                            name="requirement[1][requirements_category]" id="interview_category">
                                        <option selected="" value=""> Select</option>
                                    </select>
                                </div>
								
								<input type="hidden" name="req_value1" value="1" class="req_value1"/>
								
                                <div class="form-group col-md-12">
                                    <div class="skill_set">

                                    </div>
                                </div>
                            </div>
                            <h4 class="custom-font"><strong>Requirement 2</strong></h4>
                            <div class="row">
                                <input type="hidden" name="requirement[2][requirement_number]" value="2">
                                <div class="form-group col-md-6">
                                    <label for="interview_job_position">Job Position: </label>
                                    <select class="form-control interview_job_position2"
                                            name="requirement[2][requirements_job]"
                                            id="interview_job_position">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                        if (count($select_job) > 0) {
                                            for ($ji = 0; $ji < count($select_job); $ji++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="interview_category">Category: </label>
                                    <select class="form-control interview_category2"
                                            name="requirement[2][requirements_category]" id="interview_category">
                                        <option selected="" value=""> Select</option>
                                    </select>
                                </div>
								
								<input type="hidden" name="req_value2" value="2" class="req_value2"/>
								
                                <div class="form-group col-md-12">
                                    <div class="skill_set2">

                                    </div>
                                </div>
                            </div>
                            <h4 class="custom-font"><strong>Requirement 3</strong></h4>
                            <div class="row">
                                <input type="hidden" name="requirement[3][requirement_number]" value="3">
                                <div class="form-group col-md-6">
                                    <label for="interview_job_position">Job Position: </label>
                                    <select class="form-control interview_job_position3"
                                            name="requirement[3][requirements_job]"
                                            id="interview_job_position">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                        if (count($select_job) > 0) {
                                            for ($ji = 0; $ji < count($select_job); $ji++) {
                                                ?>
                                                <option
                                                    value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="interview_category">Category: </label>
                                    <select class="form-control interview_category3"
                                            name="requirement[3][requirements_category]" id="interview_category">
                                        <option selected="" value=""> Select</option>
                                    </select>
                                </div>
								
								<input type="hidden" name="req_value3" value="3" class="req_value3"/>
								
                                <div class="form-group col-md-12">
                                    <div class="skill_set3">

                                    </div>
                                </div>
                            </div>
                            <div class="requirement_div"></div>
                            <input type="hidden" id="requirement_val_incr" value="4"/>
							
							
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" id="requirement_add" type="button">Add New <i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <form name="step4" id="step4" role="form" novalidate>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="interview_qualification">Qualification: </label>
                                    <select class="form-control" name="qualification[0][qualifications_name]"
                                            id="interview_qualification">
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
                                <div class="form-group col-md-6">
                                    <label for="interview_qualification_status">Status: </label>
                                    <select class="form-control" name="qualification[0][qualifications_status]" id="interview_qualification_status">
                                        <option selected="" value=""> Select</option>
                                        <option  value="Passed"> Passed</option>
                                        <option  value="Failed"> Failed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="interview_qualification">Qualification: </label>
                                    <select class="form-control" name="qualification[1][qualifications_name]"
                                            id="interview_qualification">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $selectQual1 = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                        if (count($selectQual)) {
                                            for ($qi = 0; $qi < count($selectQual1); $qi++) {
                                                ?>
                                                <option
                                                    value="<?php echo $selectQual1[$qi]['qualification_name']; ?>"><?php echo $selectQual1[$qi]['qualification_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="interview_qualification_status">Status: </label>
                                    <select class="form-control" name="qualification[1][qualifications_status]"
                                            id="interview_qualification_status">
                                        <option selected="" value=""> Select</option>
                                        <option value="Passed"> Passed</option>
                                        <option value="Failed"> Failed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="qualification_div"></div>
                            <input type="hidden" value="2" id="qualification_increment" />
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="qualification_add_btn">Other
                                        Qualifications <i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="tab-pane" id="tab5">

                        <p class="well">Please check and make sure the details given are correct!</p>

                        <form name="step6" id="step6" role="form" novalidate>

                            <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="agree" id="agree" checked="">

                                    <i></i> Verified </label>

                            </div>


                            <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="newsletter" value="Yes" id="newsletter" checked="">

                                    <i></i> Receive notifications </label>

                            </div>
                            <div class="row">
                                <input type="hidden" name="interview_id" value="<?php echo $inter_id; ?>" />
                                <div class="form-group col-md-6">
                                    <label for="interview_status">Status: </label>
                                    <select class="form-control" name="interview_status"
                                            id="interview_status">
                                        <option selected="" value="Active"> Active</option>
                                        <option value="Inactive"> Inactive</option>
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

                            <button class="btn btn-default">Next</button>

                        </li>

                        <li class="next finish" style="display:none;">

                            <button class="btn btn-success" type="button" id="finish_btn">Finish</button>

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

<!--/ vendor javascripts -->

<!-- ============================================

        ============== Custom JavaScripts ===============

        ============================================= -->

<script src="assets/js/main.js"></script>


<!--/ custom javascripts -->


<!-- ===============================================

        ============== Page Specific Scripts ===============

        ================================================ -->


<script type="text/javascript">


</script>

<script>
    function Redirect() {
        window.location = "interview.php";
    }
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
        $('.interview_job_position').change(function () {
            var interview_job_position = $(this).val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_job_position: interview_job_position},
                success: function (data) {
                    $('.interview_job_position').parent('div').siblings('div').find('.interview_category').html(data);
                }
            });
        });
        $('.interview_category').change(function () {
            var interview_category = $(this).val();
            var interview_job_position = $('.interview_job_position').val();
			 var req_value1 = $('.req_value1').val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_cat_add: interview_category, interview_job_add: interview_job_position, req_value: req_value1},
                success: function (data) {
                    $('.skill_set').html(data);
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
            var interview_category = $(this).val();
            var interview_job_position = $('.interview_job_position2').val();
			var req_value2 = $('.req_value2').val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_cat_add: interview_category, interview_job_add: interview_job_position,req_value:req_value2},
                success: function (data) {
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
            var interview_category = $(this).val();
            var interview_job_position = $('.interview_job_position3').val();
			 var req_value3 = $('.req_value3').val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_cat_add: interview_category, interview_job_add: interview_job_position,req_value:req_value3},
                success: function (data) {
                    $('.skill_set3').html(data);
                }
            });
        });
        $('#requirement_add').click(function () {
            var requirement_add = "requirement_add";
            requirement_val_incr = $('#requirement_val_incr').val();
            added_val = +requirement_val_incr + 1;
//            $.ajax({
//                url: "interview_additions.php",
//                type: "POST",
//                data: {requirement_add: requirement_add, req_val: requirement_val_incr},
//                success: function (data) {
//                    $('.requirement_div').append(data);
//                    $('#requirement_val_incr').val(added_val);
//                }
//            });
            $('.requirement_div').append('<h4 class="custom-font">'
                    + '<strong>Requirement' + requirement_val_incr + '</strong></h4>'
                    + ' <div class="row">'
                    + '    <div class="form-group col-md-6">'
                    + '    <label for="interview_job_position">Job Position: </label>'
                    + '  <select class="form-control interview_job_position_more' + requirement_val_incr + '" name="requirement[' + requirement_val_incr + '][requirements_job]" id="interview_job_position">'
                    + ' <option selected="" value=""> Select</option>'
                    + '<?php
                                            $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                            if (count($select_job) > 0) {
                                                for ($ji = 0; $ji < count($select_job); $ji++) {
                                                    $select_value = $select_job[$ji]["job_name"];
                                                    echo $option = '<option value="' . $select_value . '">' . $select_value . '</option>';
                                                }
                                            }
                                            ?>'
                    + '</select>'
                    + ' </div>'
                    + '<div class="form-group col-md-6">'
                    + ' <label for="interview_category">Category: </label>'
                    + '  <select class="form-control interview_category_more' + requirement_val_incr + '" name="requirement[' + requirement_val_incr + '][requirements_category]" id="interview_category">'
                    + '    <option selected="" value=""> Select</option>'
                    + ' </select>'
                    + '</div>'
					+ '<input type="hidden" name="req_value' + requirement_val_incr + '" value="' + requirement_val_incr + '" class="req_value' + requirement_val_incr + '"/>'
                    + '   <div class="form-group col-md-12">'
                    + '    <div class="skill_set_more' + requirement_val_incr + '"></div>'
                    + ' </div>'
                    + '  </div>');
					
					$(document).on('blur', '.interview_job_position_more' + requirement_val_incr, function () {
					var interview_job_position = $(this).val();
						$.ajax({
							url: "interview_process.php",
							type: "POST",
							data: {interview_job_position: interview_job_position},
							success: function (data) {
								$('.interview_category_more' + requirement_val_incr).html(data);
							}
						});
					});
					
					
					$(document).on('blur', '.interview_category_more' + requirement_val_incr, function () {
					var interview_category = $(this).val();
					var interview_job_position = $('.interview_job_position_more' + requirement_val_incr).val();
					var req_value = $('.req_value' + requirement_val_incr).val();
						$.ajax({
							url: "interview_process.php",
							type: "POST",
							data: {interview_cat_add: interview_category, interview_job_add: interview_job_position,req_value:req_value},
							success: function (data) {
								$('.skill_set_more' + requirement_val_incr).html(data);
							}
						});
				});
					
			$('#requirement_val_incr').val(added_val);
		 });
		 
		
        $('#qualification_add_btn').click(function () {
            var qualification_add = "qualification_add";
            qualification_val_incr = $('#qualification_increment').val();
            added_qual = +qualification_val_incr + 1;
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {qualification_add: qualification_add, qual_val: qualification_val_incr},
                success: function (data) {
                    $('.qualification_div').append(data);
                    $('#qualification_increment').val(added_qual);
                }
            });
        });
        $('#finish_btn').click(function () {
            var fdata = $('#step1,#step2,#step3,#step4,#step5,#step6').serialize();
            $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
            $.ajax({
                url: "interview_ajax.php",
                type: "post",
                data: fdata,
                success: function (data) {
					//alert(data);
                   $('#SucM').html(data);
                   setTimeout('Redirect()', 1000);
                }
            });
        });
		
		
		/*$(document).on('blur', '.interview_job_position_more', function () {
            var interview_job_position = $(this).val();
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_job_position: interview_job_position},
                success: function (data) {
                    $('.interview_category_more').html(data);
                }
            });
        }); */ 
		
		/*$(document).on('blur', '.interview_category_more', function () {
            var interview_category = $(this).val();
            var interview_job_position = $('.interview_job_position_more').val();
			alert(interview_category);
			alert(interview_job_position);
            $.ajax({
                url: "interview_process.php",
                type: "POST",
                data: {interview_cat: interview_category, interview_job: interview_job_position},
                success: function (data) {
                    $('.skill_set_more').html(data);
                }
            });
        }); */
    });
</script>
<script>
</script>
</body>
</html>