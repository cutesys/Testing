<?php

include('connection.php');
if (isset($_POST['category_name'])) {
    $type_name = $_POST['type_name'];
	$category_name = $_POST['category_name'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_visa_category where visa_category='$category_name' and visa_category_type='$type_name' and visa_category_status='1'");
    if (count($check_id)) {
        $result = array("Status" => "Visa category exists..", "data_val" => "0");
        echo json_encode($result);
    } else {

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $values["visa_category_type"] = $type_name;
		$values["visa_category"] = $category_name;
        //$values["sponsor_status"] = '1';

        $insert = $db->secure_insert("sm_visa_category", $values);
        $result = array("Status" => "Successful", "data_val" => "1");
        echo json_encode($result);
    }
}