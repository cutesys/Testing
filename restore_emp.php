<?php

session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $sql = $db->executeQuery("update sm_employee set employee_status='1' where employee_id ='$delete_seesion'");

}