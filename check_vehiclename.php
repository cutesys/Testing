<?php

include('connection.php');
if (isset($_POST['vno'])) {
    $v_no = $_POST['vno'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_number='$v_no'");
    if (count($check_id)) {
        $result = array("Status" => "Vehicle Number Exists", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Vehicle Number available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}