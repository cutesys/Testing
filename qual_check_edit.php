<?php

include('connection.php');
if (isset($_POST['qualification_name']) && isset($_POST['edit_id'])) {
	
    $qualification_name = $_POST['qualification_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_recruit_qualification where qualification_name='$qualification_name' and qualification_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Qualification Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}