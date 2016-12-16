<?php

include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $values=array();
    $values['employee_status']="0";
    $db->secure_update("sm_employee",$values,"WHERE `employee_id`='$delete_seesion'");
}