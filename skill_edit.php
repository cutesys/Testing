<?php
$success_msg="";
$page = "settings";
$tab = "recruit";
$sub = "skill";
$sub1 = "skill_list";
include('file_parts/header.php');

?>
             <?php

                

                $res = $db->selectQuery("select * from sm_job_skill where skill_id='" . $_GET['skill_id'] . "' ");


                if (count($res)) {

                    $skill_id = $res[0]['skill_id'];
					$skill_name = $res[0]['skill_name'];
					$skill_job = $res[0]['skill_job'];
					$skill_category = $res[0]['skill_category'];

				}

                    ?>
					
					
					
					
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">
            <h2>Edit Skill<span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Settings </a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Recruitment</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Skill</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Edit Skill</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Edit Skill </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">
						 <div class="row">
						<div class="form-group col-sm-5">
                                                        <label for="Nationality">Job Position</label>
                                                        <select name="skill_job" id="skill_job" class="form-control">
                                                            <?php
                                                            $sql = $db->selectQuery("SELECT * FROM sm_job_positions");
                                                            if (count($sql)) {
                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>
                                                                    <option value="<?php echo $sql[$cun]['job_name']; ?>" <?php if ($skill_job == $sql[$cun]['job_name']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['job_name']; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
													</div>
													<div class="row">
								 <div class="form-group col-md-5">
                                    <label for="Category">Category: </label>
                                    <select class="form-control mb-10" name="skill_category" id="skill_category"
                                            required="">
                                        <option value="<?php echo $skill_category; ?>"><?php echo $skill_category; ?></option>
                                    </select>
                                </div>
								</div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="username">Skill Name: </label>
                                    <input type="text" name="skill_name" value="<?php echo $skill_name;?>" id="skill_name" class="form-control" required>
                                    <span id="com_status" class="validate_span"></span>

                                </div>
                          </div>
						  <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $skill_id; ?>" />
						   <div class="col-md-6">
                                    <p style="color:red;" id ="com_status"></p>
                            </div>
						  
						   

                            </form> 
							<ul class="pager wizard" style="margin-right:750px;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="">Update</button>
                    </li>
                </ul>
 </div>

                <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4  class="text-success mt-0 mb-20" id="success1"></h4>
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

            },
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
        });
    });
</script>
<script>
$('#skill_job').change(function () {
        var category = $(this).val();
        $.ajax({
            url: "skill_job.php",
            type: "POST",
            data: {category: category},
            success: function (data) {
                $('#skill_category').html(data);
            }
        });
    });
$('#submit_btn').click(function() {
         var skill_job = jQuery('#skill_job').val();
		 var skill_name = jQuery('#skill_name').val();
		 var skill_category = jQuery('#skill_category').val();
		 var edit_id = jQuery('#edit_id').val();
        $('#com_status').html('Please wait...');
        $.ajax({
            url: 'skill_check_edit.php',
            type: 'POST',
            dataType: 'json',
            data: {skill_name: skill_name,edit_id:edit_id,skill_job: skill_job,skill_category:skill_category},
            success: function (data) {
                $('#com_status').html('');
				$('#success1').html(data.Status1);
                var ch2 = data.data_val;
                if (ch2 == 0) {
                    $('#skill_name').val('');
					 $('#com_status').html(data.Status);
                }
                if (ch2 == 1) {
                   location.href='skill_list.php'
                }

            }
        });
    });
	
	</script>
<!--/ Page Specific Scripts -->

<script>
   /* $(document).ready(function () {
        var fdata = "";

        $('#next_btn').click(function () {
            fdata = $('#form1').serialize();
        });
        $('#submit_btn').click(function () {
            var formData = new FormData();
            jQuery.each(jQuery('#file')[0].files, function (i, file) {
                formData.append('file-' + i, file);
            });
            $.ajax({
                url: "ins_partner.php?" + fdata,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    //alert(data);
                    // alert("Partner Add Successfully");
                    $("#partner_succes").html(data);

                }
            });
        });
    });
    /**/
</script>
</body>
</html>
