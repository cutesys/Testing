<?php
include('connection.php');

if (isset($_POST['mun'])) {

    $mun_id = $_POST['mun'];

    $result = array();

    $check_id = $db->selectQuery("select * from `sm_company_docs` where `doc_data`='$mun_id' and `doc_title`='Municipal License'");

    if (count($check_id)) {

        $result = array("Status" => "Municipal License ID Exists..", "data_val" => "0","color" => "red");

        echo json_encode($result);

    } else {

        $result = array("Status" => "Municipal License ID available!", "data_val" => "1", "color" => "green");

        echo json_encode($result);

    }

}