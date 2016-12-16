<?php 
include('file_parts/header.php');

    if (isset($_REQUEST['compid' ])) {
    
    $compid = $_REQUEST['compid'];
	$year = $_REQUEST['yearid'];
	$month = $_REQUEST['monthid'];
	}
	$vals['status'] = "paid";
    $db->secure_update("sm_sponser", $vals, "WHERE `com_pid`='$compid' and `year`='$year' and `month_name`='$month'");
	header('location:sponsor_receivedlist.php');

?>