<?php

include('connection.php');
if (isset($_POST['state_name'])) {
    $state_name = $_POST['state_name'];
	$state_country = $_POST['state_country'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_recruit_state where state_name='$state_name' and state_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "State Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["state_name"] = $state_name;
		$values["country_name"] = $state_country;
        $values["state_status"] = '1';

        $insert = $db->secure_insert("sm_recruit_state", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}