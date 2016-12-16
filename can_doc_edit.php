<?php
$page = "recruitment";
$tab = "candidate";
$sub = "final_candidate_list1";
$head = "";
$head1 = "";
$sub1 = "final_candidate_list";
$tab1 = "";
include("./file_parts/header.php");
$cmpArray = array();
$resFet = $db->selectQuery("SELECT sm_candidate.candidate_id, CONCAT(sm_candidate.candidate_firstname,' ',
sm_candidate.candidate_middlename,' ',sm_candidate.candidate_lastname) as fullname, sm_candidate.candidate_email,
sm_candidate.candidate_phone, sm_candidate.candidate_code, sm_candidate_application.application_job_position FROM
sm_candidate INNER JOIN sm_candidate_application ON sm_candidate.candidate_id=sm_candidate_application.candidate_id 
LEFT JOIN sm_candidate_medical_status ON sm_candidate.candidate_id=sm_candidate_medical_status.candidate_id WHERE 
sm_candidate.candidate_id NOT IN (SELECT candidate_id FROM sm_candidate_medical_status) AND 
sm_candidate.candidate_status='1' AND `candidate_interview_status`='Selected'");

if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
		$selected_candidate_id=$resFet[$rC]['candidate_id'];
		//$check=$db->selectQuery("SELECT * FROM sm_candidate_medical_status WHERE `candidate_id`='$selected_candidate_id'");
		//if(count($check)<=0){
        $values['candidate_id'] = $resFet[$rC]['candidate_id'];
        $values['candidate_code'] = $resFet[$rC]['candidate_code'];
        $values['fullname'] = $resFet[$rC]['fullname'];
        $values['candidate_email'] = $resFet[$rC]['candidate_email'];
        $values['candidate_phone'] = $resFet[$rC]['candidate_phone'];
        $values['candidate_job'] = $resFet[$rC]['application_job_position'];
        $cmpArray["data"][] = $values;
		}
   //}
}
$fp = fopen('assets/extras/company.json', 'w');
fwrite($fp, json_encode($cmpArray));
fclose($fp);
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
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
		            <div class="modal-header">

                <h3 class="modal-title custom-font">Update Medical Status </h3>

            </div>
			</br>
			        <div class="row"><div class="col-sm-1"></div>

                                                    <label class="col-sm-3 control-label" for="inputEmail3">Medical Status:</label>

                                                    <div class="col-sm-6" style="margin-left:10px;">

                                                        <select class="form-control" name="medical_result"

                                                                id="medical_result">

                                                            <option  value=""> Select </option>

                                                            <option value="Fit" > Fit </option>

                                                            <option  value="Unfit"  > Unfit </option>

                                                           
                                                        </select>

                                                    </div>

                                                </div>
			
							    <p>
							</p>					
						<div class="selected_result" style="display: none">				
 <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                         <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
						
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="row">
											       <div class="col-md-1"></div> 
                                    <div class="col-md-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label">Medical Certificates:</label>
                                    <span class="btn btn-success fileinput-button" >

                                        <i class="glyphicon glyphicon-plus"></i>
										   
                                        <span >Add files...</span>
                                        <input type="file" name="file1" id="file" multiple onchange="javascript:updateList()">
                                    </span></div>
									<div class="col-md-4" ></div>
                                    
                                </div>
								<div class="row">
								<div class="col-md-4" ></div>
								
								<div class="col-md-4" ><p id="fileList" style="margin-left:10px;"></p></div><div class="col-md-4" ></div></div>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>

                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
								
								
								<input type="hidden" name="candidate_id" id ="candidate_id" value="" />
								 <input type="hidden" name="medical_result" id ="medical_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>
				  

												
											
			
	
   <p></p>
			
			
												
														
            <input type="hidden" id="hid_del" value=""/>

            <div class="modal-body">

                <p id="selected_status" style="color:#080"></p>

            </div>
        <div class="modal-body">
		
			<span class ="error" id="err"></span>
		</div>
            <div class="modal-footer">
	
                <button class="btn btn-default btn-border" id="sub_btn" >submit</button>
<button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                

            </div>



  

</div>
</div>
</div
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
            url: "employee_gallery_edit.php?employee_id=" + emp_id,
            type: "post",
            data: fdata,
            success: function (data) {
                $('#SucM').html("Updated Successfully");
                // setTimeout('Redirect()', 2000);
            }
        });
    });
</script>

<script>

		
        $('#sub_btn').click(function () {
			$s=$('#medical_result').val();
		 var fdata = "";
		fdata = $('#form2').serialize();
			 //alert(fdata);
			var numf = 0;
            var formData = new FormData();
				
					  jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
          
            });
			if($s== '')
			{
			
				$('#err').html("Medical Status Is Required").fadeOut(2000);
			}
			else{
            $.ajax({
                url: "selected_candidate_medical_action.php?" + fdata  + '&numf=' + numf,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
                // alert(data);
				window.location = "final_candidate_list.php";
                   }
				
            });
			}
        });
</script>
<!--/ Page Specific Scripts -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>


