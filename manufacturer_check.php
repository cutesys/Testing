<?php

include('connection.php');
if (isset($_POST['manufacturer_name'])) {
    $manufacturer_name = $_POST['manufacturer_name'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle_manufacturer where manufacturer_name='$manufacturer_name'");
    if (count($check_id)) {
        $result = array("Status" => "Manufacturer Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["manufacturer_name"] = $manufacturer_name;
        $values["manufacturer_status"] = '1';

        $insert = $db->secure_insert("sm_vehicle_manufacturer", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}