<?php

include('connection.php');
if (isset($_POST['type_name']) && isset($_POST['edit_id'])) {
	
    $type_name = $_POST['type_name'];
	$type_days = $_POST['type_days'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_visa_type where visa_type_name='$type_name'  and visa_type_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "Visa type exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}