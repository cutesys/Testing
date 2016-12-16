<?php
$page = "employee";
$tab = "requirements";
$sub = "external_requirements";
$sub1 = "external_add";
$success_msg="";


include('file_parts/header.php');	
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>External Requirement Add</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">HR</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Employee</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Requirements</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">External Requirements</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">External Requirements Add</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add External Requirement</a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="step1" role="form" method="post">

                            <div class="row">
								
									<div class="form-group col-md-6">
                                    <label for="no_emp">Add Requirement: </label>
                                    <input type="text" name="requirements" id="requirements" class="form-control" required>
                                </div>
								
									<div class="form-group col-md-6">
                                    <label for="no_emp">Client Name: </label>
                                    <input type="text" name="client" id="client" class="form-control" required>
                                </div>
								<div class="form-group col-md-6">
                                    <label for="no_emp">Client Email: </label>
                                    <input type="text" name="email" id="email" class="form-control" required>
									<div id="email-error" style="color:#F00;"></div>
                            <div id="valid-email-error" style="color:#F00;"></div>
									
                                </div>
								<div class="form-group col-md-6">
                                    <label for="no_emp">Client Address: </label>
                                    <textarea name="address" id="address" class="form-control" ></textarea>
                                </div>
								<div class="form-group col-md-6">
                                    <label for="no_emp">Client Phone: </label>
                                    <input type="text" name="phone" id="phone" class="form-control" >
                                </div>
								
								</div>
								
							<div class="row">
							
							<input type="hidden" id="requirement_incr" value="1">
								<div class="form-group col-md-6">
                                    <label for="interview_job_position">Designation: </label>
                                    <select class="form-control" name="requirement[0][designation]" id="designation" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $job = $db->selectQuery("SELECT `designation_id`,`designation_name` FROM 
										`sm_designation` WHERE `designation_status`='1'");
                                        if (count($job) > 0) {
                                            for ($ei = 0; $ei < count($job); $ei++) {
                                                ?>
                                                <option value="<?php echo $job[$ei]['designation_id']; ?>"><?php echo $job[$ei]['designation_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								
							<div class="form-group col-md-6">
                                    <label for="interview_category">Category: </label>
                                    <input type="text" name="requirement[0][category]" id="category" class="form-control" >
                                </div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								
                                    <label for="username">No.of Resources: </label>
                                    <input type="text" name="requirement[0][hiring_requirment_nof_person]" id="resources" class="form-control" required>
                                </div>
								
								
								
								
								
							<!--<div class="form-group col-md-6">
                                    <label for="skills">Skills: </label>
                                    <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="skills" id="skills" checked="">
									

                                    <i></i> # </label>

                            </div>


                            <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="newsletter" value="Yes" id="newsletter" checked="">

                                    <i></i> # </label>

                            </div>

                                </div> -->
								
								<div class="row">
								
                        
						</div>
						
								
								<!--<div id="skills"></div>-->
						
								
						

                          <div class="form-group col-md-6">
								

                                    <label for="username">Requested Date From: </label>

                                   

                                        <input type='text' class="form-control" name="requirement[0][hiring_requirment_date_from]"
                                               id="req_date_from" required=""/>

                                       
                                  

                                </div>
				
                        
                        														<div class="form-group col-md-6">

                                    <label for="username">Requested Date To: </label>

                                    

                                        <input type='text' class="form-control" name="requirement[0][hiring_requirment_date_to]"
                                               id="req_date_to" required=""/>

                                       

						 </div>
						 </div>
						
                         
						   <div class="col-md-6">
                                    <p style="color:red;" id = "exist_status"></p>
                            </div>
							<div class="requirement_div"></div>

                            <input type="hidden" id="requirement_val_incr" value="3"/>
                           <div class="row">

                                <div class="col-md-3">

                                    <button class="btn btn-success" id="requirement_add" type="button">Add New <i

                                            class="fa fa-plus"></i></button>

                                </div>
								  <div class="col-md-3"></div>
 
                              <div class="col-md-3">
						<ul class="pager wizard" style="margin-right:17%;">
							<li class="next finish" style="display:none;">
							 <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
								<!--	<input type="submit" name="submit" value="add"> -->
							</li>
							
						</div>
						</div>
						
						
						 								 </form>


                            
 </div>							

               
               <!-- <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
                </div>
				 </div>-->
           
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

</script>
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




<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->


<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<script>
$('#req_date_from').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true,onSelect: function(date) {
		$("#req_date_to").datepicker('option', 'minDate', date);} });
$('#req_date_to').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>

<script>

$('body').on('click', '.date_pick', function () {
var dt=$('.date_pick').val();                                                        
														$(this).datepicker( { 
             //minDate: '0', 
            beforeShow : function()
            {
                jQuery( this ).datepicker('option','minDate', jQuery('.date_pickf').val() );
            } , 
            altFormat: "dd-mm-yy", 
            dateFormat: 'dd-mm-yy'

        }).focus();
                                                          $(this).removeClass('datepicker');
                                                      });
													  $('body').on('click', '.date_pickf', function () {
														  
                                                          $(this).datepicker( { 
            maxDate: '0', 
            beforeShow : function()
            {
                jQuery( this ).datepicker('option','maxDate', jQuery('.date_pick').val() );
            },
            altFormat: "dd-mm-yy", 
            dateFormat: 'dd-mm-yy'

        }).focus();
                                                          $(this).removeClass('datepicker');
                                                      });
			 function validate_email(email)
                {
                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    return reg.test(email);
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
	
        $('#requirement_add').click(function () {

            var requirement_add = "requirement_add";

            requirement_val_incr = $('#requirement_incr').val();

            added_val = + requirement_val_incr + 1;
			//alert(requirement_val_incr);
			


            $('.requirement_div').append ('<h4 class="custom-font">'

                    + '<strong> Requirement '  + added_val +  '</strong> </h4>'

                    + ' <div class="row">'

                    + '    <div class="form-group col-md-6">'

                    + '    <label for="interview_job_position">Designation: </label>'

                    + '  <select class="form-control interview_job_position_more' + added_val + '" name="requirement[' + added_val + '][designation]">'

                    + ' <option selected="" value=""> Select</option>'

<?php
$select_job = $db->secure_select("SELECT `designation_name`,`designation_id` FROM `sm_designation` WHERE `designation_status`='1'");
if (count($select_job) > 0) {
                    for ($ji = 0; $ji < count($select_job); $ji++) {
                         ?>

                    +'  <option value="<?php echo $select_job[$ji]['designation_id']; ?>"><?php echo $select_job[$ji]['designation_name']; ?></option>'

                                                    <?php

                                                }

                                            }

                                            ?>

                    + '</select>'

                    + ' </div>'

                    + '<div class="form-group col-md-6">'

					
					
					+ ' <label for="interview_category">Category: </label>'
					
                + '<input type="text"  name="requirement[' + added_val + '][category]"  class="form-control" required="" > '
					

                    + '</div>'

                    + '  </div>'
                      
					  +     ' <div class="row">'
				+     '<div class="form-group col-md-6">'
                +     '<label for="username">No.of Resources: </label>'
                +     '<input type="text" name="requirement[' + added_val + '][hiring_requirment_nof_person]" class="form-control" required="">'
                +     '</div>'
	            +	  '</div>'
					  
					   + ' <div class="row">'

                   + '<div class="form-group col-md-6">'
				  
                + '<label for="username">Requested Date From: </label>'
				
				
				+ '<input type="text" name="requirement[' + added_val + '][hiring_requirment_date_from]" class="form-control date_pickf" onkeydown="return false" />'
				
                + '</div>'
				
                + '<div class="form-group col-md-6 ">'
                + '<label for="username">Requested Date To: </label>'
				+ '<input type="text" name="requirement[' + added_val + '][hiring_requirment_date_to]" class="form-control date_pick to_date" onkeydown="return false" />'
                + '</div>'
                + '</div>'
				
				
				+     '</br>'
				);
            // $('#requirement_val_incr').val(added_val);
			 $('#requirement_incr').val(added_val);
			 
              });
			  
			  
		//	  $('.from_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true,onSelect: function(date) {
		//      $(".to_date").datepicker('option', 'minDate', date);
		//	  } });
        //      $('.to_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
			  </script>
			  
	
			  <script>
 $('#submit_btn').click(function () {
			
		var fdata = $('#step1').serialize();
		//alert(fdata);
		var requirements 		= $('#requirements').val();
		var client 		        = $('#client').val();
		var email 		        = $('#email').val();
		var designation 		= $('#designation').val();
		var resources 		    = $('#resources').val();
		var req_date_from 		    = $('#req_date_from').val();
		var req_date_to 		    = $('#req_date_to').val();
		//alert(req_date_to);
		 
		/*if(fdata =='')
		{
			$('#err').html("All Fields are Required*");
		} else {*/
		
		if(requirements =='' || client =='' || email =='' || designation =='' || resources =='' || req_date_from =='' || req_date_to =='')
		{
			$('#err').html("All Fields are Required*");
		} 
		else {  
		
		
		 if (email != '' && !validate_email(email))
                    {
                        $('#valid-email-error').css('display', 'block').append('</br>Please Enter a Valid E-mail');
                        log_error = 1;
                    }
					
			else{
		 
		  $.ajax({
             url: "external_add_action.php",
            type: "POST",
             
			data:fdata,	
			success: function (data) {
			//alert(data);
			  window.location = "external_requirement_list.php";
			   
             }
			 });
		}
		}
			 
			 
		
  });
			  
	
</script>

	
	
<!--/ Page Specific Scripts -->
</body>
</html>
