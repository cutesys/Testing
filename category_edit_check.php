<?php

include('connection.php');
if (isset($_POST['job_category_name']) && isset($_POST['edit_id'])) {
	
    $job_category_name = $_POST['job_category_name'];
	$category_job = $_POST['job_position'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_job_category where job_category_name='$job_category_name' and job_position='$category_job' and job_category_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Job_category Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}