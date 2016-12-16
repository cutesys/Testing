<?php
include("connection.php");
if(isset($_REQUEST['edit_id']) && isset($_REQUEST['emp_salary'])){
    $emp_salary['employee_salary']=$_REQUEST['emp_salary'];
    $db->secure_update("sm_employee",$emp_salary,"WHERE `employee_id`='".$_REQUEST['edit_id']."'");
    unset($emp_salary);
}
if(isset($_REQUEST['pay_id'])&& isset($_REQUEST['salary_date'])){
    $recei_date=new DateTime($_REQUEST['salary_date']);
    $date_of_pay=$recei_date->format("y-m-d");
    $emp_salary['payroll_received_date']=$date_of_pay;
    $emp_salary['payroll_status']="Paid";
    $db->secure_update("sm_payroll",$emp_salary,"WHERE `payroll_id`='".$_REQUEST['pay_id']."'");
    unset($emp_salary);
}
if(isset($_REQUEST['cancel_id']) && isset($_REQUEST['up_salary'])){
    $payroll_values['salary']=$_REQUEST['up_salary'];
    $db->secure_update("sm_payroll",$payroll_values,"WHERE `payroll_id`='".$_REQUEST['cancel_id']."'");
    unset($payroll_values);
}
if(isset($_REQUEST['status_change'])){
    $db->executeQuery("UPDATE `sm_payroll` SET `payroll_status`='Not Paid' WHERE `payroll_id`='".$_REQUEST['status_change']."'");
}
if(isset($_REQUEST['payroll_archive'])){
    $payroll_values['payroll_status']='Not Paid';
    $payroll_values['payroll_received_date']="";
    $db->secure_update("sm_payroll",$payroll_values,"WHERE `payroll_id`='".$_REQUEST['payroll_archive']."'");
    unset($payroll_values);
}