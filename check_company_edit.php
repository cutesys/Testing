<?php

include('connection.php');
if (isset($_POST['value'])) {
	$doc_id ="";
    $value = $_POST['value'];
	/*$manufacturer_id = $_POST['manufacturer_id'];
	$edit_id = $_POST['edit_id'];
    $result = array();
    $check_id = $db->selectQuery("select * from sm_vehicle_model where model_name='$model_name' and manufacturer_id='$manufacturer_id' and model_id!='$edit_id'");
    if (count($check_id)) {
        $result = array("Status" => "Model Name Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1");
        echo json_encode($result);
    } */
	
	switch($value){
    case "check_commercial":
        $company_reg = $_POST['cr1'];
		$doc_id = $_POST['doc_id'];
		$result = array();
		$check_id = $db->selectQuery("select * from sm_company_docs where doc_data='$company_reg' and doc_title='Commercial Registration' and doc_id!='$doc_id'");
		if (count($check_id)) {
			$result = array("status_fail" => "Commercial Reg ID Exists..", "data_val" => "0");
			echo json_encode($result);
		} else {
			$result = array("status_succ" => "Commercial Reg ID available!", "data_val" => "1");
			echo json_encode($result);
		}
        break;
    case "Tue":
        echo "Today is Tuesday. Buy some food.";
        break;
    case "Wed":
        echo "Today is Wednesday. Visit a doctor.";
        break;
    case "Thu":
        echo "Today is Thursday. Repair your car.";
        break;
    case "Fri":
        echo "Today is Friday. Party tonight.";
        break;
    case "Sat":
        echo "Today is Saturday. Its movie time.";
        break;
    case "Sun":
        echo "Today is Sunday. Do some rest.";
        break;
    default:
        echo "No information available for that day.";
        break;
}
}