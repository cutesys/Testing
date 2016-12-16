<?php

include('connection.php');
if (isset($_POST['job_name']) && isset($_POST['edit_id'])) {
	
    $job_name = $_POST['job_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_job_positions where job_name='$job_name' and job_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Job Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}