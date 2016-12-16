<?php

session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $emp=$db->executeQuery("UPDATE `sm_employee` SET `employee_status`='0' WHERE `employee_company`='$delete_seesion'");
    $sql = $db->executeQuery("update sm_company set company_status='0' where company_id ='$delete_seesion'");
}