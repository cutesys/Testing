<?php

include('connection.php');
if (isset($_POST['drv'])) {
    $drive_id = $_POST['drv'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$drive_id' and document_title='Driving Licence'");
    if (count($check_id)) {
        $result = array("Status" => "Driving License Exists..", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}

if (isset($_POST['visa'])) {
    $visa = $_POST['visa'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$visa' and document_title='Visa'");
    if (count($check_id)) {
        $result = array("Status" => "Visa  Exists..", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}
if (isset($_POST['passport'])) {
    $passport = $_POST['passport'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$passport' and document_title='Passport'");
    if (count($check_id)) {
        $result = array("Status" => "Passport  Exists..", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}
