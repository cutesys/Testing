<?php

include('connection.php');
if (isset($_POST['ins'])) {
    $insurance_id = $_POST['ins'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$insurance_id' and document_title='Insurance'");
    if (count($check_id)) {
        $result = array("Status" => "Insurance  Exists..", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}