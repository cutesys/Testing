<?php

include('connection.php');
if (isset($_POST['qaid'])) {
    $qatar_id = $_POST['qaid'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$qatar_id' and document_title='Qatar ID'");
    if (count($check_id)) {
        $result = array("Status" => "Qatar ID Exists", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}
if(isset($_POST['employee_employment_id'])){
    $employee_employment_id = $_POST['employee_employment_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee where employee_employment_id='$employee_employment_id'");
    if (count($check_id)) {
        $result = array("Status" => "Employee ID Exists", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}