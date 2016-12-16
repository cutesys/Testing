<?php

include('connection.php');
if (isset($_POST['insurance_name'])) {
    $insurance_name = $_POST['insurance_name'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_insurance where insurance_type='$insurance_name'");
    if (count($check_id)) {
        $result = array("Status" => "Insurance Type Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["insurance_type"] = $insurance_name;
        $values["insurance_status"] = '1';

        $insert = $db->secure_insert("sm_insurance", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}