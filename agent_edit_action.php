<?php

include('connection.php');
if (isset($_POST['save'])) {
    $id = $_POST['idd'];
	$vals['agent_company'] = $_POST['agent_name'];
	//$vals['agent_area_id'] = $_POST['agent_area_id'];
	//$vals['agent_place'] = $_POST['agent_place'];
	//$vals['agent_country'] = $_POST['agent_country'];
	$vals['agent_address'] = $_POST['agent_address'];
	$vals['agent_state'] = $_POST['agent_state'];
	//$vals['agent_city'] = $_POST['agent_city'];
	$vals['agent_zipcode'] = $_POST['agent_zipcode'];
	$vals['agent_email'] = $_POST['agent_email'];
	$vals['agent_phone'] = $_POST['agent_phone'];
   
    $suc=$db->secure_update("sm_recruitment_agents", $vals, "WHERE `agent_id`='" . $_POST['idd'] . "' and `agent_status`=1");
    if(count($suc)>0)
	{
		$success="Updated Successfully";
	}
	else
	{
		$success="Error in updation";
	}
	
		

    header('location:agent_read.php?uid='.$id.'&suc_id='.$success.'');
}
?>