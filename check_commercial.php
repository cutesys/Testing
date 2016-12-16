<?php

include('connection.php');
if (isset($_POST['cr1'])) {
    $company_reg = $_POST['cr1'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_company_docs where doc_data='$company_reg' and doc_title='Commercial Registration'");
    if (count($check_id)) {
        $result = array("Status" => "Commercial Reg ID Exists..", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "Commercial Reg ID available!", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}