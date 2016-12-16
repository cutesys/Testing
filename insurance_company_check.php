<?php

include('connection.php');
if (isset($_POST['insurance_company_name'])) {
    $insurance_company_name = $_POST['insurance_company_name'];
	$result = array();
	
    $check_id = $db->selectQuery("select * from sm_insurance_company where insurance_company_name='$insurance_company_name'");
   
	if (count($check_id)) {
        $result = array("Status" => "Insurance Company Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}