<?php

include('connection.php');
if (isset($_POST['state_name']) && isset($_POST['edit_id'])) {
	
    $state_name = $_POST['state_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_recruit_state where state_name='$state_name' and state_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "State Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}