<?php 
$page = "recruitment";
$tab = "candidate";
$sub = "final_candidate_list1";
$head = "";
$head1 = "";
$sub1 = "final_candidate_medical_cleared";
$tab1 = "";
include('file_parts/header.php');
$success_msg = "";
error_reporting(0);
$id = $_GET['uid'];

$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_candidate_files` WHERE `file_name`='Candidate_Picture' AND `file_status`='1' AND `candidate_id`='$id'");
if (count($resLogo) && file_exists($resLogo[0]['file_path'])) {
    $dpImg = $resLogo[0]['file_path'];
} else {
    $dpImg = "assets/images/profile-default.png";
}

$resCandi = $db->selectQuery("SELECT * FROM `sm_candidate` WHERE `candidate_id`='$id'");
if (count($resCandi)) {

    $candidate_firstname = $resCandi[0]['candidate_firstname'];
    $candidate_middlename = $resCandi[0]['candidate_middlename'];
    $candidate_lastname = $resCandi[0]['candidate_lastname'];
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
                        <a href="javascript:void(0)"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Candidate</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Candidate Profile </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Edit Profile </a>
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
                                <img id="emdp" src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo @$candidate_firstname; ?></strong> <?php echo @$candidate_middlename.' '.@$candidate_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>
                          <!--  <div class="sam">
                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Profile Picture</span>
                                    <input type="file" name="files" class="" id="profile_pic" onchange="upload_files_without_doc(this)">
                                    <input type="hidden" value="Profile_Picture" name="Profile_Picture" class="dfile">
                                </span>
                                <p id="sucs" style="color:greenyellow; font-size: 20px;"></p>
                                <br>
                            </div> -->
                        </div>
                    </section>
                    <!-- /tile -->
                    <!-- tile -->
                    <?php /*<section class="tile tile-simple">
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
                    </section> */?>
                    <!-- /tile -->
                    <!-- tile -->
                   <!-- <section class="tile tile-simple">
                    </section> -->
                </div>
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="candidate_medical_profile.php?can_id=<?php echo $_GET['uid'] ?>">Profile</a>
                                    </li>
                                    <li role="presentation"><a href="#">Edit
                                            Profile</a></li>
                                    <!--<li role="presentation"><a href="#" style="color:#16a085;">Advanced</a></li>-->
                                    <li role="presentation"><a
                                            href="candidate_medical_gallery.php?can_id=<?php echo $_GET['uid'] ?>">Documents</a>
                                    </li>
                                </ul>
							<?php $docc_code = $db->selectQuery("SELECT `candidate_code` FROM `sm_candidate` WHERE `candidate_id`='$id'"); ?>
                                <div style="padding: 12px">
                                    <form method="post" id="editForm">
									<input type="hidden" name="candidate_id" id="candidate_id" value="<?php echo $id; ?>"/>
                                        <div class="wrap-reset">
										<input type="hidden" name="candidate_code" class="form-control" id="candidate_code" value="<?php echo $docc_code[0]['candidate_code']; ?>" readonly="">
											<!--Docs-->
                                            <?php
                                            $docc = $db->selectQuery("SELECT * FROM `sm_candidate_medical_certificates` WHERE `candidate_id`='$id'");
                                            if (count($docc)) {
                                                for ($i = 0; $i < count($docc); $i++) {
                                                    $document_start_date="";
                                                    $document_end_date="";
                                                    //$document_title = $docc[$i]['file_name'];
													$document_title = "Medical_Certificates";
                                                    //$doc_data = $docc[$i]['document_data'];
                                                    //$document_start_date1=$docc[$i]['document_start_date'];
                                                        //$document_start_date1 = explode("-",$docc[$i]['document_start_date']);
                                                       // $document_start_date = $document_start_date1[2]."/".$document_start_date1[1]."/". $document_start_date1[0];
                                                        //$document_end_date1=$docc[$i]['document_end_date'];
                                                        //$document_end_date1 = explode("-",$docc[$i]['document_end_date']);
                                                        //$document_end_date = $document_end_date1[2]."/".$document_end_date1[1]."/".$document_end_date1[0];
                                                   /* if ($document_title == "Candidate_Picture") {
                                                        $editid = "qatar_id";
                                                        $statid = "qatar_status";
                                                        $document_title_disply="Candidate Picture";
                                                    } elseif ($document_title == "Resume") {
                                                        $editid = "visa";
                                                        $statid = "visa_status";
                                                        $document_title_disply="Resume";
                                                    } elseif ($document_title == "Experience_Certificates") {
                                                        $editid = "passport";
                                                        $statid = "passport_status";
                                                        $document_title_disply="Experience Certificates";
                                                    } elseif ($document_title == "Passport_Documents") {
                                                        $editid = "health";
                                                        $statid = "health_status";
                                                        $document_title_disply="Passport Documents";
                                                    } elseif ($document_title == "ID_Card") {
                                                        $editid = "health";
                                                        $statid = "health_status";
                                                        $document_title_disply="ID_Card";
                                                    } elseif ($document_title == "Driving_License") {
                                                        $editid = "health";
                                                        $statid = "health_status";
                                                        $document_title_disply="Driving License";
                                                    }*/

														if ($document_title == "Medical_Certificates") {
                                                        $editid = "qatar_id";
                                                        $statid = "qatar_status";
                                                        $document_title_disply="Medical Certificates";
                                                    }


                                                    ?>
                                                    <?php /* <div class="row">
                                                        <div class="form-group col-sm-4">
                                                            <label><?php echo $document_title_disply; ?></label>
                                                            <input type="hidden"
                                                                   name="emp_docs[<?php echo $i; ?>][document_title]"
                                                                   value="<?php echo $document_title; ?>"
                                                                   class="form-control addt_text cmptitle_class"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <?php /*<input type="text"
                                                                   name="emp_docs[<?php echo $i; ?>][document_data]"
                                                                   value="<?php echo $doc_data; ?>"
                                                                   id="<?php echo $editid; ?>" class="form-control dc_data">
                                                            <span class="doc_status"></span>
                                                            <input type="hidden"
                                                                   value="<?php echo $doc_data; ?>"
                                                                   id="<?php echo $editid; ?>" class="form-control cmpid_class"> */?>
                                                       <?php /* </div>
                                                    </div>
                                                    <div class="row">

                                                        <p style="color:red;margin-left:20px;"
                                                           id="<?php echo $statid; ?>"></p>


                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <div class="sam">
                                                                <?php
                                                                //$explod_value = explode(' ', trim($document_title));
                                                                //$explod_document_title = $explod_value[0];
																$explod_document_title = "medical_certificates";

                                                                ?>
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i> <span><?php echo $document_title_disply; ?></span>
                                                                    <input type="file" name="files[]" class=""
                                                                           id="passport_add_files"
                                                                           onchange="upload_files(this)">
                                                                    <input type="hidden"
                                                                           value="<?php echo $explod_document_title; ?>"
                                                                           class="dfile">
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>


                                                            </div>
                                                        </div>
                                                    </div> */ ?>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <input type="hidden" name="emp_docs[0][document_title]"
                                                               value="Candidate_Picture" readonly=""
                                                               class="form-control addt_text"
                                                               style="background-color: #fff; cursor: default;">
                                                        <input type="hidden" name="emp_docs[0][document_data]" value=""
                                                               id="cr" class="form-control">
                                                    </div>
                                                </div>
                                           <!--     <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <div class="sam">
                                                            <span class="btn btn-success fileinput-button"> <i
                                                                    class="glyphicon glyphicon-plus"></i> <span>Candidate Picture</span>
                                                                <input type="file" name="files[]" class=""
                                                                       id="passport_add_files"
                                                                       onchange="upload_files(this)" >
                                                                <input type="hidden" value="Candidate_Picture" class="dfile">
                                                            </span>
                                                            <span class="file_status" style="color:#428bca;"
                                                                  name="File name here"></span>
                                                        </div>
                                                    </div>
                                                </div> -->
												
                                            <?php }
                                            ?>
                                            <input type="hidden" name="idd" value="<?php echo $id; ?>">
                                           <?php /* <input type="button" class="btn btn-info" id="save_btn" name="save"
                                                   value="Save">*/?>
                                            <div class="row">
                                                <div class="col-md-9"></div>
                                                <span class="text-success mt-0 mb-20" id="SucM"></span>
                                            </div>
                                        </div>

                                    </form>
									
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
								
								
								<input type="hidden" name="candidate_id" id ="candidate_id" value="<?php echo $id; ?>" />
								 <input type="hidden" name="medical_result" id ="medical_results" value="" />
                        </form>
						
                                </div>
								<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
								<div class="col-md-4">
								 <button class="btn btn-success " id="sub_btn" style="margin-left:64px">Save</button>
								 </div>
								</div>
								
								<div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="message"></h4>
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
updateList = function () {
	var input = document.getElementById('file');
	var output = document.getElementById('fileList');

	output.innerHTML = '<span>';
	for (var i = 0; i < input.files.length; ++i) {
		output.innerHTML += '<p>' + input.files.item(i).name + '</p>';
	}
	output.innerHTML += '</span>';
}



</script>

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
   /* function upload_files(element) {
        $(element).parent('span').siblings('.file_status').html("<img src='assets/images/buffering.gif' width='30' height='30'/>");
        var section = $(element).siblings('.dfile').val();
        var cp_id = "<?php echo $employee_company; ?>";
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
    } */ 
	/*function upload_files(element) {
        $(element).parent('span').siblings('.file_status').html("<img src='assets/images/buffering.gif' width='30' height='30' />");
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
                //$(element).parent('span').siblings('.file_status_img').hide();
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
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
                    /*$(element).parent('span').siblings('.file_status_img').hide();
                    $(element).parent('span').siblings('.file_status_warn').hide();
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').append(data); */
					/*$(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').html(data);
                }
            });
        }
    }*/
    /*function upload_files_without_doc(ele) {
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
    } */
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
	
   /* $('#save_btn').click(function () {
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        var uid =<?php echo $id; ?>;
        var fdata = $('#editForm').serialize();
        $.ajax({
            url: "candidate_gallery_edit_action.php?candidate_id=" + uid,
            type: "post",
            data: fdata,
            success: function (data) {
                $('#SucM').html("Updated Successfully");
                 //setTimeout('Redirect()', 2000);
				setTimeout('', 1000);
				window.location = 'candidate_gallery.php?can_id=<?php echo $id; ?>';
            }
        });
    }); */
	</script>
	
	<script>

		
        $('#sub_btn').click(function () {
			 
		 var fdata = "";
		fdata = $('#form2').serialize();
			 //alert(fdata);
			var numf = 0;
            var formData = new FormData();
				
					  jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
          
            });
			/*if($s== '')
			{
			
				$('#err').html("Medical Status Is Required").fadeOut(2000);
			} */
			//else{
            $.ajax({
                url: "selected_candidate_medical_action_edit.php?" + fdata  + '&numf=' + numf,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
					$("#message").html(data);
					// $success_msg = "Values Updated!";
               //  alert(data);
				//window.location = "final_candidate_list.php";
                   }
				
            });
			//}
        });
		
		
</script>
</script>
<!--/ Page Specific Scripts -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>


