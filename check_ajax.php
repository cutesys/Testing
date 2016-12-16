<?php
include("connection.php");
if(isset($_POST['hire_val'])){
	$hire_val=$_POST['hire_val'];
	$des_val=$_POST['des_val'];
	$select_data = $db->selectQuery("SELECT `designation`,`hiring_requirment_date_from`,`hiring_requirment_date_to` ,`hiring_requirment_nof_person`FROM sm_external_requirment WHERE `hiring_requirment_id`='$hire_val'");
	//echo "<pre>";print_r ($select_data);
	
	if(count($select_data)>0){
	//echo $select_data[0]['hiring_requirment_date_from'];
	
		 $date_from = $select_data[0]['hiring_requirment_date_from'];
		$datefrom 		= explode('-',$date_from);
		$from  			= $datefrom[2].'-'.$datefrom[1].'-'.$datefrom[0];
		$date_to               = $select_data[0]['hiring_requirment_date_to'];
		$dateto 			= explode('-',$date_to);
		$to		= $dateto[2].'-'.$dateto[1].'-'.$dateto[0];
		$designation= $select_data[0]['designation'];
		$select = $db->selectQuery("SELECT `job_position`,`date_assign_from`,`date_assign_to` ,`no_of_employees`FROM sm_requirements WHERE `job_position`='$designation'  AND `date_assign_to`>='$date_from' AND `date_assign_from`<='$date_to'");

				$select_emp = $db->selectQuery("SELECT sm_designation.designation_name,sm_employee.employee_firstname FROM  sm_employee INNER JOIN sm_designation ON sm_employee.employee_designation= sm_designation.designation_name WHERE `designation_id`='$des_val'");
				//echo count($select_emp);
		
		if(count($select)>0){
			//$nos="";
		 $nos= $select[0]['no_of_employees'];
		//echo $nos;
		$employees=count($select_emp)-$nos;
		//echo $employees;
		}
		else{
			$employees=count($select_emp);
			//echo $employees;
		}
		
		//echo "<pre>";print_r ($select);
		
	
		//echo "<pre>";print_r ($select_emp);

			 
			 //echo $employees;
			 
			  //echo $employees;
		 
				 $result=array("employees"=> $employees);
				 echo json_encode($result);
        
		
		
    }
}

?>



