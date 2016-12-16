<?php

include('connection.php');
if (isset($_POST['category_name'])) {
    $category_name = $_POST['category_name'];
	$category_job = $_POST['category_job'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_job_category where job_category_name='$category_name' and job_position='$category_job' and job_category_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "Category Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["job_category_name"] = $category_name;
		$values["job_position"] = $category_job;
        $values["job_category_status"] = '1';

        $insert = $db->secure_insert("sm_job_category", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}