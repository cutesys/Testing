<?php

include('connection.php');
if (isset($_POST['type_name'])) {
    $type_name = $_POST['type_name'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_visa_type where visa_type_name='$type_name' and visa_type_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "Visa Type Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["visa_type_name"] = $type_name;
        //$values["type_status"] = '1';

        $insert = $db->secure_insert("sm_visa_type", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}