<?php
$current_month=date('m');
$current_year=date('Y');
$employee_values=$db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_status`='1'");
if(count($employee_values)){
    for($ei=0;$ei<count($employee_values);$ei++) {
        $employee_id_x = $employee_values[$ei]['employee_id'];
        $employee_payroll=$db->selectQuery("SELECT * FROM `sm_payroll` WHERE `employee_id`='$employee_id_x' AND MONTH(payroll_date)='$current_month' AND YEAR(payroll_date)='$current_year'");
        if(empty($employee_payroll)){
            $values_payroll=array();
            $values_payroll['payroll_status']="Not Paid";
            $values_payroll['salary']=$employee_values[$ei]['employee_salary'];
            $values_payroll['employee_id']=$employee_id_x;
            $values_payroll['company_id']=$employee_values[$ei]['employee_company'];
            $values_payroll['payroll_date']=date('Y-m-d');
            $db->secure_insert("sm_payroll",$values_payroll);
        }
    }
}