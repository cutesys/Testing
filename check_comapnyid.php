<?php

include('connection.php');
if (isset($_POST['cmpid'])) {
    $basic_company_id = $_POST['cmpid'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_company where company_pid='$basic_company_id'");
    if (count($check_id)) {
        $result = array("Status" => "Company ID Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Company ID available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}