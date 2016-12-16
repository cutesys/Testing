<?php
$current_month=date('m');
$current_year=date('Y');
$employee_values=$db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_status`='1'");
if(count($employee_values)){
    for($ei=0;$ei<count($employee_values);$ei++) {
        $employee_id_x = $employee_values[$ei]['employee_id'];
        $employee_sponsor=$db->selectQuery("SELECT * FROM `sm_sponsor_fee_employee` WHERE `employee_id`='$employee_id_x' AND MONTH(sponsor_fee_date)='$current_month' AND YEAR(sponsor_fee_date)='$current_year'");
        if(empty($employee_sponsor)){
            $values_sponsor=array();
            $values_sponsor['sponsor_fee_amount']=$employee_values[$ei]['employee_fee'];
            $values_sponsor['sponsor_fee_status']="Not Paid";
            $values_sponsor['employee_salary']=$employee_values[$ei]['employee_salary'];
            $values_sponsor['employee_id']=$employee_id_x;
            $values_sponsor['company_id']=$employee_values[$ei]['employee_company'];
            $values_sponsor['sponsor_id']=$_SESSION['id'];
            $values_sponsor['sponsor_fee_date']=date('Y-m-d');
            $db->secure_insert("sm_sponsor_fee_employee",$values_sponsor);
        }
    }
}