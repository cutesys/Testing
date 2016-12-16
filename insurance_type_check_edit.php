<?php

include('connection.php');
if (isset($_POST['insurance_type']) && isset($_POST['edit_id'])) {

    $insurance_type = $_POST['insurance_type'];
    $edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_insurance where insurance_type='$insurance_type' and insurance_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Insurance Type Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}