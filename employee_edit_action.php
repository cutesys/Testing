<?php

include('file_parts/header.php');
if (isset($_POST['save'])) {
    $id = $_POST['idd'];
    $today = date("m/d/Y");
    $doj1 = $_POST['doj'];
    $explode_doj = explode('/', $doj1);
    $id = $_POST['idd'];
    $vals['employee_firstname'] = $_POST['f_name'];
    $vals['employee_middlename'] = $_POST['m_name'];
    $vals['employee_lastname'] = $_POST['l_name'];
    $vals['employee_employment_id'] = $_POST['employee_employment_id'];
    $vals['employee_peraddress1'] = $_POST['employee_peraddress1'];
    $vals['employee_peraddress2'] = $_POST['employee_peraddress2'];
    $vals['employee_percity'] = $_POST['employee_percity'];
    $vals['employee_perdoor'] = $_POST['employee_perdoor'];
    $vals['employee_perstate'] = $_POST['employee_perstate'];
    $vals['employee_perzip'] = $_POST['employee_perzip'];
    $vals['employee_blood_group'] = $_POST['blood_group'];
    $vals['employee_medical_category'] = $_POST['medical_category'];
    $vals['employee_telephone'] = $_POST['employee_telephone'];
    $vals['employee_resiaddress1'] = $_POST['employee_resiaddress1'];
    $vals['employee_resiaddress2'] = $_POST['employee_resiaddress2'];
    $vals['employee_resicity'] = $_POST['employee_resicity'];
    $vals['employee_residoor'] = $_POST['employee_residoor'];
    $vals['employee_resistate'] = $_POST['employee_resistate'];
    $vals['employee_zip'] = $_POST['employee_zip'];
    $vals['employee_gender'] = $_POST['gender'];
    $vals['employee_dob'] = $_POST['dob'];
    $vals['employee_company'] = $_POST['company'];
    $vals['employee_email'] = $_POST['email'];
    $vals['employee_nationality'] = $_POST['country'];
    $vals['employee_designation'] = $_POST['desig'];
    $vals['employee_salary'] = $_POST['employee_salary'];
    $vals['employee_phone'] = $_POST['employee_phone'];
    $vals['employee_emcontact'] = $_POST['employee_contact'];
    $vals['employee_fee'] = $_POST['employee_fee'];
    $vals['employee_joining_date'] = $explode_doj[2] . "-" . $explode_doj[1] . "-" . $explode_doj[0];
    $vals['employee_remarks'] = $_POST['employee_remarks'];
    $db->secure_update("sm_employee", $vals, "WHERE `employee_id`='" . $_POST['idd'] . "' and `employee_status`=1");


    header('location:employee_list.php?uid=' . $id);
}
?>