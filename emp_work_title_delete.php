<?php

include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $values=array();
    $values['employee_status']="delete";
    $db->secure_update("sm_employee_work_assign",$values,"WHERE `id`='$delete_seesion'");
}