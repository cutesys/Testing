<?php
session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $employee_fee=$_POST['emp_salary'];
    $delete_seesion = $_REQUEST['pass_val'];
    $db->executeQuery("UPDATE `sm_employee` SET `employee_fee`='$employee_fee' WHERE `employee_id`='$delete_seesion'");
}