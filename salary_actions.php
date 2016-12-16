<?php
session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    //$db->executeQuery("update sm_employee set employee_sponsorfee_status='Cancel' where employee_id ='$delete_seesion'");
}
if (isset($_REQUEST['pass_val']) && isset($_REQUEST['emp_salary'])) {
    $employee_sal=$_POST['emp_salary'];
    $delete_seesion = $_REQUEST['pass_val'];
    $db->executeQuery("UPDATE `sm_employee` SET `employee_salary`='$employee_sal' WHERE `employee_id`='$delete_seesion'");
}