<?php
include('connection.php');

if (isset($_POST['cc'])) {

    $cc_id = $_POST['cc'];

    $result = array();

    $check_id = $db->selectQuery("select * from `sm_company_docs` where `doc_data`='$cc_id' and `doc_title`='Computer Card'");

    if (count($check_id)) {

        $result = array("Status" => "Computer Card ID Exists..", "data_val" => "0","color" => "red");

        echo json_encode($result);

    } else {

        $result = array("Status" => "Computer Card ID available!", "data_val" => "1", "color" => "green");

        echo json_encode($result);

    }

}