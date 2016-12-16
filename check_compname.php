<?php

include('connection.php');
if (isset($_POST['cmpname'])) {
    $basic_company_name = $_POST['cmpname'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_company where company_name='$basic_company_name'");
    if (count($check_id)) {
        $result = array("Status" => "Company Name Exists..", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Company Name available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}