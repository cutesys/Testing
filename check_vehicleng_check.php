<?php

include('connection.php');
if (isset($_POST['v_engno'])) {
    $v_engno = $_POST['v_engno'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_engine_number='$v_engno'");
    if (count($check_id)) {
        $result = array("Status" => "Engine No. Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Engine No. available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}