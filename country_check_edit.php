<?php

include('connection.php');
if (isset($_POST['country_name']) && isset($_POST['edit_id'])) {
	
    $country_name = $_POST['country_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_recruit_country where country_name='$country_name' and country_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Country Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}