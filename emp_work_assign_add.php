<?php
$success_msg="";
$page = "employee";
$tab = "salary_list";
$sub = "e_add";
//$sub1 = "advance_salary";

include('file_parts/header.php');

//if (isset($_POST['submit']))
	
if($_SERVER['REQUEST_METHOD']=='POST')
	{ 
//echo "sdfdgf"; die;
$title=$_REQUEST['title'];	
$work_site_id = $_REQUEST['work_site_id'];
$designation_id=$_REQUEST['designation_id'];
$employee_id=$_REQUEST['employee_id'];
//$date_assign_from=$_REQUEST['date_assign_from'];
//$date_assign_to=$_REQUEST['date_assign_to'];
$date_assign_from=explode("/",$_REQUEST['date_assign_from']);
$date_assign_from1=$date_assign_from[2]."-".$date_assign_from[1]."-".$date_assign_from[0];
$date_assign_to=explode("/",$_REQUEST['date_assign_to']);
$date_assign_to1=$date_assign_to[2]."-".$date_assign_to[1]."-".$date_assign_to[0];

    $values["title"]=$title;
    $values["job_position_id"]=$designation_id;
	$values["work_site_id"] = $work_site_id;
	$values["issued_date_from"] = $date_assign_from1;
	$values["issued_date_to"] = $date_assign_to1;
	$insert = $db->secure_insert("sm_employee_work_assign", $values);
	
	$value['employee_work_assign_id'] = $insert; 
	$employee = array();	
	foreach($employee_id as $employee)
	{
		$value['employee_id'] = $employee;
		$insert = $db->secure_insert("sm_work_assign_employee_id", $value);
		
	}
	 
	

	if (!empty($insert)) 
	{
		echo  $success_msg = "success";
		 echo "<script>location.href='emp_title_list.php'</script>";
		} else {
		$success_msg = "Error in insertion";
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
                                    <label for="username">Title: </label>
                                    <input type="text"  name="title" id="title" class="form-control" data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required="">
                                </div>
								

                            
								<div class="form-group col-md-6">
                                    <label for="phone">Work site: </label>
                                    <select class="form-control" name="work_site_id" id="work_site_id" required=""><span id="exist_status" class="validate_span"></span>
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `work_site`,`id` FROM `sm_work_site`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['id']; ?>"><?php echo $manuf[$ei]['work_site']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								</div>
								
								<div class="row">
                    <div class="form-group col-md-6">
                        <label>Date Assign From:</label>
						<div class='input-group datepicker' data-format="L">
                        <input type="text" name="date_assign_from" id="date_assign_from" class="form-control" required=""/>
						<span class="input-group-addon"> <span class="fa fa-calendar"></span> 
                    </div>
					</div>
                
				
			
                    <div class="form-group col-md-6">
                        <label>Date Assign To:</label>
						<div class='input-group datepicker' data-format="L">
                        <input type="text" name="date_assign_to" id="date_assign_to" class="form-control" required=""/>
						<span class="input-group-addon"> <span class="fa fa-calendar"></span> 
                    </div>
					</div>
                </div>
								
								<div class="row">
								<div class="form-group col-md-6">
                                    <label for="username">Designation: </label>
                                    <select class="form-control" name="designation_id" id="designation_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `designation_name`,`designation_id` FROM `sm_designation`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['designation_id']; ?>"><?php echo $manuf[$ei]['designation_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
									
									 
                                
								</div>
							
								
									<div class="form-group col-md-6">
                                    <label for="username">Employee name: </label>
                                    <select class="form-control" name="employee_id[]" id="employee_id"  multiple required="">
									
									
									</select>
                                </div>
								</div>
								
                        <!-- <input type="text" name="qatar_idd" id ="qatar_idd" class="form-control" value="" />-->
						
						
						
                        
						
						
                         
						   <div class="col-md-6">
                                    <p style="color:red;" id = "exist_status"></p>
                            </div>
						  
						
						 

                            
							
							<ul class="pager wizard" style="margin-right:17%;">
								<li class="next finish" >
								 <button class="btn btn-success" name="submit" id="submit_btn" type="submit">Add</button>
									<!--	<input type="submit" name="submit" value="add"> -->
								</li>
							</ul>
							
 						</form> 

               
                <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
                </div>
				 </div>
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
<!--
<script src="assets/js/vendor/datepickerpopup/jquery-ui.js"></script>
<script rel="stylesheet" src="assets/js/vendor/datepickerpopup/jquery-ui.css"></script>  --->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->







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
		var date_assign_from = $('#date_assign_from').val();
		var date_assign_to = $('#date_assign_to').val();
        $.ajax({
            url: "emp_work_assign_add_ajax.php",
            type: "POST",
            data: {designation: designation,date_assign_from:date_assign_from,date_assign_to:date_assign_to},
            success: function (data) {
				//alert(data);
                $('#employee_id').html(data);
            }
        });
    });
	</script>
</body>
</html>
