<?php

include('connection.php');
if (isset($_POST['skill_name'])) {
    $skill_name = $_POST['skill_name'];
	$skill_job = $_POST['skill_job'];
	$skill_category = $_POST['skill_category'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_job_skill where skill_name='$skill_name' and skill_category='$skill_category' and skill_job='$skill_job'and skill_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "Skill Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["skill_name"] = $skill_name;
		$values["skill_job"] = $skill_job;
		$values["skill_category"] = $skill_category;
        $values["skill_status"] = '1';

        $insert = $db->secure_insert("sm_job_skill", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}