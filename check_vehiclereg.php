<?php

include('connection.php');
if (isset($_POST['vreg'])) {
    $v_reg = $_POST['vreg'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_registration_number='$v_reg'");
    if (count($check_id)) {
        $result = array("Status" => "Vehicle Registration No. Exists", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Vehicle Registration No. available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}