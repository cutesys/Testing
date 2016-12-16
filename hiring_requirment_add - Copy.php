<?php
$success_msg="";
$page = "visa";
$tab = "visa_settings";
$sub = "visa_type_settings";
$sub1 = "visa_type_add";

include('file_parts/header.php');

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
            <h2>Add Requirment<span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Hiring Requirment </a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Add Requirment</a>
                    </li>
				
                    
                </ul>

            </div>

        </div>
        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
               <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add Requirment </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">
							
							  <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Worksite: </label>
                                    <input type="text" name="worksite" id="worksite" class="form-control" required="" >
                                   
                                </div>
                         
						
                                <div class="form-group col-md-6">
                                    <label for="username">Resources: </label>
                                    <input type="text" name="resources" data-parsley-trigger="change"
                                           data-parsley-type="digits" id="resources" class="form-control" data-parsley-type="digits" required="" >
                                    <span id="exist_status_0"  class="validate_span"></span>

                                </div>
                          </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Provider name: </label>
                                    <input type="text" name="req[0][provider]" id="provider" class="form-control" required="" >
                                   
                                </div>
                         
						
                                <div class="form-group col-md-6">
                                    <label for="username">Job Positions: </label>
                                    <select  name="req[0][job]" data-parsley-trigger="change"
                                           id="job" class="form-control" required="" >
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
								
								</div>
								  <div class="row">
								<div class="form-group col-md-6">
                                    <label for="username">Job Category: </label>
                                    <input type="text" name="req[0][category]" id="category" class="form-control" required="" >
                                   
                                </div>
								<div class="form-group col-md-6">
                                    <label for="username">No:of Resources: </label>
                                    <input type="text" name="req[0][resource_no]" id="resource_no"  data-parsley-type="digits"class="form-control" required="" >
                                   
                                </div>
                          </div>
						  <div class="row">
				        <div class="col-md-6">

                                                            <label for="username">Date From: </label>

                                                            <input type='text' name="req[0][date_from]"

                                                                   class="form-control date_pick"/>

                                                        </div>
			
				<div class="col-md-6">

                                                            <label for="username">Date To: </label>

                                                            <input type='text' name="req[0][date_to]"

                                                                   class="form-control date_pick"/>

                                                        </div>
			</div>
						  <div class="experience_div"></div>
                            <input type="hidden" value="1" id="req_increment">
						   <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="req_add_btn" >Add New
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            
						   
						  <div class="col-md-8"></div>
						  <div class="col-md-1">
						   <ul class="pager wizard" style="margin-right:650px;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
                    </li>
                </ul>
				</div>
				</div>

                            </form> 
 </div>

                <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
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




<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">


<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
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
$('#submit_btn').click(function(){
    $('#exist_status_0').html('');
	
	var error_check=1;
	 var worksite = jQuery('#worksite').val();
	var resources = jQuery('#resources').val();
    var provider = jQuery('#provider').val();
	var job = jQuery('#job').val();
	 var category = jQuery('#category').val();
	var resource_no = jQuery('#resource_no').val();
	 var date_from = jQuery('#date_from').val();
	var date_to = jQuery('#date_to').val();
	
	
    if(worksite==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(resources==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	 if(provider==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(job==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	 if(category==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(resource_no==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	 if(date_from==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(date_to==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(!$.isNumeric($('#resources').val())) 
	{
		error_check=0;
	}
		if(error_check==1) {
        $.ajax({
            url: 'requirment_add_check.php',
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (data) {
				 $('#exist_status').html(data.Status);
			var counts=data.length;
			for(i=0;i<counts;i++){
						if(data[i]=="0"){
							$('#exist_status_'+i).html("Alredy Exist");
						}
						else{
							$('#exist_status_'+i).html("");
							
							location.href='visa_type_list.php';
							
						}
					}
               
				
				
                var ch2 = data.data_val;
				
                if (ch2 == 0) {
				
                   
					$('#worksite').val('');
					$('#resources').val('');
				   $('#provider').val('');
					$('#job').val('');
					 $('#category').val('');
					$('#resource_no').val('');
					 $('#date_from').val('');
					$('#date_to').val('');
								}
                if (ch2 == 1) {
                    
                }

            }
        });
    }
	});
	</script>
	</script>

	<script>
	 $('#req_add_btn').click(function () {
		
        var req_add = "req_add";
        req_increment = $('#req_increment').val();
        added_exp = +req_increment + 1;
        $('.experience_div').append(
		         '<div class="row">'
				
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Provider name: </label>'
                + '<input type="text" name="req[' + req_increment + '][provider]" id="provider" class="form-control" required="" >'
                                    
                + '</div>'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Job Positions: </label>'
				+' <select  name="req[' + req_increment + '][job]"  id="job" class="form-control" required="" >'
                                           
				+' <option selected="" value=""> Select</option>'
											 <?php

                                        $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");

                                        if (count($select_job) > 0) {

                                            for ($ji = 0; $ji < count($select_job); $ji++) {

                                                ?>

                  +'<option   value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>'

                                                    

                                                    <?php

                                                }

                                            }

                                            ?>

                 +'</select>'
                
				//+ ' <span id="exist_status_' + req_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				 +   '<div class="row">'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Job Category: </label>'
                + '<input type="text" name="req[' + req_increment + '][category]" id="category" class="form-control" required="" >'
                + '</div>'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">No:of Resources: </label>'
                + '<input type="text"  name="req[' + req_increment + '][resource_no]"  class="form-control"  data-parsley-type="digits" id="resource_no" data-parsley-trigger="change" required="" > '
			    + '</div>'
				 + '</div>'
				  +   '<div class="row">'
            
                + '<div class="col-md-6">'
                + '<label for="username">Date From: </label>'
               // + '<input type="text" name="experience[' + experience_increment + '][experience_from]" class="form-control date_pick"/>'
				+ '<div class="input-group datepicker" data-format="L">'
                //+ '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick"/>'
				+ '<input type="text" name="req[' + req_increment + '][date_from]" class="form-control date_pick" onkeydown="return false" />'
				+ '<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>'
				+ '</div>'
                + '</div>'
                 + '<div class="col-md-6 ">'
                + '<label for="username">To: </label>'
				+ '<div class="input-group datepicker" data-format="L">'
                //+ '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick"/>'
				+ '<input type="text" name="req[' + req_increment + '][date_to]" class="form-control date_pick" onkeydown="return false" />'
				+ '<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>'
				+ '</div>'
                + '</div>'
				  + '</div>'
				  );
                $('#req_increment').val(added_exp);
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
