<?php
session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $db->executeQuery("update sm_employee set employee_sponsorfee_status='Cancel' where employee_id ='$delete_seesion'");
}