<?php

include('connection.php');
if (isset($_POST['heaid'])) {
    $health_id = $_POST['heaid'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_employee_documents where document_data='$health_id' and document_title='Health Card'");
    if (count($check_id)) {
        $result = array("Status" => "Health Card  Exists..", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}