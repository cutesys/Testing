<?php

include('connection.php');
if (isset($_POST['model_name']) && isset($_POST['manufacturer_id']) && isset($_POST['edit_id'])) {
    $model_name = $_POST['model_name'];
	$manufacturer_id = $_POST['manufacturer_id'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle_model where model_name='$model_name' and manufacturer_id='$manufacturer_id' and model_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Model Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}