<?php

include('connection.php');
if (isset($_POST['cmpname']) && isset($_POST['edit_id'])) {
    $basic_company_name = $_POST['cmpname'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_company where company_name='$basic_company_name' and company_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Company Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        //$result = array("Status" => "Company Name available!", "data_val" => "1");
		$result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}