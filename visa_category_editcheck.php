<?php
include('connection.php');
if (isset($_POST['category_name']) && isset($_POST['edit_id'])&& isset($_POST['type_name'])) {
	
    $category_name = $_POST['category_name'];
	$category_type = $_POST['type_name'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_visa_category where visa_category='$category_name' and visa_category_type='$category_type' and visa_category_status='1' ");
    if (count($check_id)) {
        $result = array("Status" => "Category name exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    }
}