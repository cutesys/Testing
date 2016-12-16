<?php

include('connection.php');
if (isset($_POST['country_name'])) {
    $country_name = $_POST['country_name'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_recruit_country where country_name='$country_name'");
    if (count($check_id)) {
        $result = array("Status" => "Country Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["country_name"] = $country_name;
        $values["country_status"] = '1';

        $insert = $db->secure_insert("sm_recruit_country", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}