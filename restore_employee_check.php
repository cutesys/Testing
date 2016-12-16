<?php

include('connection.php');
if (isset($_POST['check_id'])) {
    $check_id = $_POST['check_id'];
    $check_emp = $db->selectQuery("SELECT `employee_company` FROM `sm_employee` WHERE `employee_id`='$check_id'");
    if (count($check_emp)) {
        $cmp_id_ck = $check_emp[0]['employee_company'];
        $check_cmp = $db->selectQuery("SELECT `company_status`,`company_name` FROM `sm_company` WHERE `company_id`='$cmp_id_ck'");
        if (count($check_cmp)) {
            $company_name = $check_cmp[0]['company_name'];
            $cmp_stats = $check_cmp[0]['company_status'];
            $result = array("status" => $cmp_stats, "company_name" => $company_name);
            echo json_encode($result);
        }
    }
}