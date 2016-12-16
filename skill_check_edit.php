<?php

include('connection.php');
if (isset($_POST['skill_name']) && isset($_POST['edit_id'])) {
	
   
	$skill_job = $_POST['skill_job'];
	$skill_name = $_POST['skill_name'];
	$skill_category = $_POST['skill_category'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_job_skill where skill_job='$skill_job' and skill_name='$skill_name' and skill_category='$skill_category' and skill_status='1' and skill_id!='$edit_id' ");
    if (count($check_id)) {
        $result = array("Status" => "Skill Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } 
	else
	{
		
	$skill_name = $_POST['skill_name'];
	$skill_job = $_POST['skill_job'];
	$skill_category = $_POST['skill_category'];
	$values["skill_name"] = $skill_name;
	$values["skill_job"] = $skill_job;
	$values["skill_category"] = $skill_category;
    $values["skill_status"] = '1';
	$query1 = $db->secure_update('sm_job_skill', $values, "  WHERE skill_id = '$edit_id'");
	if (count($query1)) 
	    {

        $result = array("Status1" => "Skill Updated", "data_val" => "1");
        echo json_encode($result);
		
		 //echo "<script>location.href='country_list.php'</script>";

		}

		


}
       
    }
