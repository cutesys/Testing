<?php
include('connection.php');


if(isset($_POST['employee_perform'])&&($_POST['date'])) 
{

		$employee_perform   = $_POST['employee_perform'];
		$perform_date              = $_POST['date'];
		$employee_id        = $_POST['employee_id'];
	$ex_date1= explode("-",$perform_date);
			$year1 = $ex_date1[0];
			
			$day1 = $ex_date1[1];
           //$code = $db->selectQuery("SELECT `employee_employment_id` FROM `sm_employee` WHERE `employee_id`='$employee_id'");
			
			
			
				$check = $db->selectQuery("SELECT `employee_id`,`date` FROM `sm_employee_performance` WHERE `employee_id`='$employee_id'");
				//$select = $db->selectQuery("SELECT `employee_id` FROM `sm_employee_performance` WHERE `employee_id`='$employee_id'");
		//if(!empty($select)){
			
if(!empty($check)){
				
				$date = $check[0]['date'];
				$ex_date = explode("-",$date);
				$year2 = $ex_date[0];
				$day2 = $ex_date[1];
			if(($year1==$year2)&&($day1==$day2))
             {
				echo " already exist";
              
                  }
			 else {
							$values["rating"] = $employee_perform;
							$values["date"] = $perform_date;
							$values["employee_id"] = $employee_id;
				
				
				$update = $db->secure_insert("sm_employee_performance", $values);
				echo "success";
							  }
}
	else{
		                    $values["rating"] = $employee_perform;
							$values["date"] = $perform_date;
							$values["employee_id"] = $employee_id;
				
	
				$update1 = $db->secure_insert("sm_employee_performance", $values);
				if($update1){
					
				echo"success1";

						} 
						else { 
						echo "Failed To Visa Apply! Please Try Again"; }
		}        

        
}
