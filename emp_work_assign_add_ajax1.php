<?php
include("connection.php");
if(isset($_POST['designation'])){
	//$date_assign_from=$_POST['date_assign_from'];
	//$date_assign_to=$_POST['date_assign_to'];
   $designation=$_POST['designation'];
   
   
   $des_names = $db->selectQuery("SELECT `designation_name` FROM `sm_designation` WHERE `designation_id` = '$designation'");
   
	if (count($des_names) > 0)
		{
			$des_name = $des_names[0]['designation_name']; 
		}
    $employee_name=$db->selectQuery("SELECT CONCAT(sm_employee.employee_firstname,sm_employee.employee_middlename,sm_employee.employee_lastname)as fullname,employee_id FROM `sm_employee` WHERE  `employee_designation`='$des_name' AND employee_status='1'");
    if(count($employee_name)){ ?>
		
                                    <select class="form-control" name="employee_id" id="employee_id" required="" multiple>
									<?php for($ds=0; $ds < count($employee_name); $ds++){ ?>
									<option value="<?php echo $employee_name[$ds]['employee_id'];?>"><?php echo $employee_name[$ds]['fullname'];?></option>
									<?php } ?>
									</select>

<?php } else { echo "No Data Available"; } } 
           ?>
        
    

