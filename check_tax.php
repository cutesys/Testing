<?php
include('connection.php');

if (isset($_POST['tax'])) {

    $tax_id = $_POST['tax'];

    $result = array();

    $check_id = $db->selectQuery("select * from `sm_company_docs` where `doc_data`='$tax_id' and `doc_title`='Tax Card'");

    if (count($check_id)) {

        $result = array("Status" => "Tax Card ID Exists..", "data_val" => "0","color" => "red");

        echo json_encode($result);

    } else {

        $result = array("Status" => "Tax Card ID available!", "data_val" => "1", "color" => "green");

        echo json_encode($result);

    }

}