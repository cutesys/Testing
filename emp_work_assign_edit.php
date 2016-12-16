<?php
$success_msg="";
$page = "employee";
$tab = "work_assign";
$sub = "advance";
$sub1 = "advance_salary";

include('file_parts/header.php');

if (isset($_REQUEST["work_assign_id"]))
{
	$work_assign_id=$_REQUEST["work_assign_id"];

/*$sql2 = $db->selectQuery("SELECT CONCAT(sm_employee.employee_firstname, sm_employee.employee_middlename, 
sm_employee.employee_lastname)as fullname,sm_employee.employee_designation,
sm_work_site.work_site FROM sm_employee_work_assign LEFT JOIN sm_employee ON 
 sm_employee.employee_id = sm_employee_work_assign.employee_id LEFT JOIN sm_work_site ON  
 sm_work_site.id = sm_employee_work_assign.work_site_id WHERE job_position_id='".$edit_id."'");*/
 // $sql2 = $db->SelectQuery("SELECT work_site_id,job_position_id,
 // sm_work_assign_employee_id.employee_id FROM `sm_employee_work_assign`
 // INNER JOIN sm_work_assign_employee_id ON 
 // sm_employee_work_assign.id=sm_work_assign_employee_id. employee_work_assign_id WHERE employee_work_assign_id = '$work_assign_id'");
 
 $sql2 = $db->SelectQuery("SELECT * FROM `sm_employee_work_assign` WHERE id = '$work_assign_id'");
 //echo "dfdg";print_r($sql2); 
 
 if(count($sql2)>0)
 {
		$work_site_id		=$sql2[0]["work_site_id"];
		// $employee_id		=$sql2[0]["employee_id"];
		 $job_position_id	=$sql2[0]["job_position_id"];
		 //$issued_date_from	=$sql2[0]["issued_date_from"];
		 //$issued_date_to	=$sql2[0]["issued_date_to"];
	/*	$issued_date_from =new DateTime($sql2[0]["issued_date_from"]);
        $issued_date_from1 = $issued_date_from->format("d/m/Y");
		$issued_date_to =new DateTime($sql2[0]["issued_date_to"]);
        $issued_date_to1 = $issued_date_to->format("d/m/Y");*/
		
		
		$date_issued_from =new DateTime($sql2[0]["issued_date_from"]);
        $date_issued_from1 = $date_issued_from->format("d/m/Y");
		
		$date_issued_to =new DateTime($sql2[0]["issued_date_to"]);
        $date_issued_to1 = $date_issued_to->format("d/m/Y");
		
 }
}	
if($_SERVER['REQUEST_METHOD']=='POST'){
	
$work_site_id = $_REQUEST['work_site_id'];
$designation_id=$_REQUEST['designation_id'];
$employee_id=$_REQUEST['employee_id'];
//$date_assign_from=$_REQUEST['date_assign_from'];
//$date_assign_to=$_REQUEST['date_assign_to'];
$date_assign_from=explode("/",$_REQUEST['date_assign_from']);
$date_assign_from1=$date_assign_from[2]."-".$date_assign_from[1]."-".$date_assign_from[0];
$date_assign_to=explode("/",$_REQUEST['date_assign_to']);
$date_assign_to1=$date_assign_to[2]."-".$date_assign_to[1]."-".$date_assign_to[0];

	$values["work_site_id"] = $work_site_id;
	$values["job_position_id"]=$designation_id;
	$values["issued_date_from"] = $date_assign_from1;
	$values["issued_date_to"] = $date_assign_to1;
	$insert = $db->secure_update("sm_employee_work_assign", $values, "WHERE id='$work_assign_id'");
	$value['employee_work_assign_id'] = $insert;
	$deletes_exp = $db->executeQuery("DELETE FROM `sm_work_assign_employee_id` WHERE `employee_work_assign_id`='$work_assign_id'");
	$employee = array();
	
	foreach($employee_id as $employee)
	{
		$value['employee_id'] = $employee;
	$value['employee_work_assign_id']=$work_assign_id;
		$insert = $db->secure_insert("sm_work_assign_employee_id", $value);
	}
		
		//echo "hellooo";die;
	
	 
	

	if (!empty($insert)) 
	{
		echo  $success_msg = "Updated";
		 echo "<script>location.href='emp_title_list.php'</script>";
		} 
		else {
		$success_msg = "Error in updation";
    }	
}



?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2> Employee <span>Assignment</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Worksite</a>
                    </li>
					<li>
                        <a href="javascript:void(0)"> Job Position</a>
                    </li>
					<li>
                        <a href="javascript:void(0)"> Assign Employee</a>
                    </li>
                    <li>
                     <!--   <a href="javascript:void(0)">Add Model</a>-->
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab"> Add Employee </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                       <form name="step1" id="form1" role="form" method="post">

                            <div class="row">
								<div class="form-group col-md-6">
                                    <label for="phone">Work site: </label>
                                    <select class="form-control" name="work_site_id" id="work_site_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `work_site`,`id` FROM `sm_work_site`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['id']; ?>"<?php if($manuf[$ei]['id']==@$work_site_id){ echo "selected";}?>><?php echo $manuf[$ei]['work_site']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Job position: </label>
                                    <select class="form-control" name="designation_id" id="designation_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `designation_name`,`designation_id` FROM `sm_designation`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['designation_id']; ?>"<?php if($manuf[$ei]['designation_id']==@$job_position_id){ echo "selected";}?>><?php echo $manuf[$ei]['designation_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
								</div>
								
								
								
									<div class="form-group col-md-6">
                                    <label for="username">Employee name: <?php //echo $employee_id;?></label>
                                    
									
   <?php
   $des_names = $db->selectQuery("SELECT `designation_name` FROM `sm_designation` WHERE `designation_id` = '$job_position_id'");
    
    if(count($des_names>0)){
		$des_name = $des_names[0]['designation_name'];
	 
		                      $employee_name=$db->selectQuery("SELECT 
							  CONCAT(sm_employee.employee_firstname,
							  sm_employee.employee_middlename,sm_employee.employee_lastname)as
							  fullname,sm_employee.employee_id FROM
							  `sm_employee` LEFT JOIN sm_work_assign_employee_id ON sm_employee.employee_id = sm_work_assign_employee_id.employee_id WHERE  sm_work_assign_employee_id.employee_work_assign_id = '$work_assign_id'");
							  
							  $workAssignedEmpId=$db->selectQuery("SELECT `employee_id` FROM `sm_work_assign_employee_id` WHERE `employee_work_assign_id` = '$work_assign_id'");
							  
							  //echo "<pre>";print_r($workAssignedEmpId);
							  $val= array();
							  for($em=0; $em < count($workAssignedEmpId); $em++){
							  $val[] = $workAssignedEmpId[$em]['employee_id'];
							  }
							  
							  $des_names = $db->selectQuery("SELECT CONCAT(`employee_firstname`,
							  `employee_middlename`,`employee_lastname`)as
							  fullname,`employee_id` FROM `sm_employee` WHERE `employee_designation` = '$des_name'");
							  ?>
							  <select class="form-control" name="employee_id[]" id="employee_id" required="" multiple>
							  
							  <?php 
									 for($ds=0; $ds < count($des_names); $ds++){	
									 ?>
									<option value="<?php echo $des_names[$ds]['employee_id'];?>"<?php if(in_array($des_names[$ds]['employee_id'],$val)){ echo "selected";}?>><?php echo $des_names[$ds]['fullname'];?></option>
									 <?php }
	                           	
							   ?>
									</select>
									
	<?php } ?>
									
                                </div>
								
								 <div class="row">
								<div class="form-group col-md-6">

                                    <label for="prend">Assign Date From: </label>
                                   <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="date_assign_from" value="<?php echo $date_issued_from1; ?>"
                                               id="date_assign_from" required=""/>
<span class="input-group-addon"> <span class="fa fa-calendar"></span> 
                                </div>
								</div>
								</div>
                        
                        														<div class="form-group col-md-6">

                                    <label for="prend">Assign Date To: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="date_assign_to" value="<?php echo $date_issued_to1; ?>"
                                               id="date_assign_to" required=""/>
<span class="input-group-addon"> <span class="fa fa-calendar"></span> 
                                        <!--<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>-->
                                    </div>

						 </div>
						 </div>
								<!--<div id="employees"></div>-->
                        
						
						
                        
						
						
                         
						   <div class="col-md-6">
                                    <p style="color:red;" id = "exist_status"></p>
                            </div>
						  
						
						 </div>

                            
							
							<ul class="pager wizard" style="margin-right:17%;">
								<li class="next finish" >
								 <button class="btn btn-success" name="submit" id="submit_btn" type="submit">Update</button>
									<!--	<input type="submit" name="submit" value="add"> -->
								</li>
							</ul>
 </div>							</form> 

               
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
<!--/ custom javascripts -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">






<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<!--<script>
$('#date_assign_from').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true,onSelect: function(date) {
		$("#date_assign_to").datepicker('option', 'minDate', date);} });
$('#date_assign_to').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>-->

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
    $('#designation_id').change(function () {
        var designation = $(this).val();
        $.ajax({
            url: "emp_work_assign_add_ajax.php",
            type: "POST",
            data: {designation: designation},
            success: function (data) {
				//alert(data);
                $('#employee_id').html(data);
            }
        });
    });
	
	   /* $('#submit_btn').click(function () {  
			var designation_id = $("#designation_id").val();
			var work_site_id = $("#work_site_id").val();
			var employee_id = $("#employee_id").val(); 
			$('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
			$.ajax({
				url: "emp_work_assign_add.php",
				type: "post",
				data: {designation_id:designation_id,work_site_id:work_site_id,employee_id:employee_id},
				success: function (data) {
					alert(data);
					/*$('#SucM').html('Candidate added successfully');
					if(data == 'from_interview'){
					setTimeout('', 1000);
					window.location = "interview_form.php";
					} else {
					setTimeout('', 1000);
					window.location = "candidate.php";
					} */
					//setTimeout('Redirect()', 1000);
				//}
			//});
		//});  
	</script>
	
<!--/ Page Specific Scripts -->
</body>
</html>
