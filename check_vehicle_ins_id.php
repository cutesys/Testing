<?php

include('connection.php');
if (isset($_POST['ins_id'])) {
    $ins_id = $_POST['ins_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_insurance_id='$ins_id'");
    if (count($check_id)) {
        $result = array("Status" => "Insurance ID Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Insurance ID available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}