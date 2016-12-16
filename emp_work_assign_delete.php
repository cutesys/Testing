<?php

include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    //$values=array();
   // $values['employee_status']="delete";
    $db->executeQuery("DELETE FROM `sm_work_assign_employee_id` WHERE `employee_id`='$delete_seesion'");
	
}