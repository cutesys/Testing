<?php

include('connection.php');
if (isset($_POST['manufacturer_name']) && isset($_POST['edit_id'])) {
	
    $manufacturer_name = $_POST['manufacturer_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle_manufacturer where manufacturer_name='$manufacturer_name' and manufacturer_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Manufacturer Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}