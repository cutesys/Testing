<?php
include("connection.php");
//echo "<pre>";print_r($_POST); die;
if (isset($_POST['email'])) {
	
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$client = $_REQUEST['client'];	
$requirements = $_REQUEST['requirements'];

$values["client_address"] = $address;
$values["client_phone"] = $phone;
$values["email"] = $email;
$values["client"]=$client;
$values["requirement"]=$requirements;
$insert = $db->secure_insert("sm_external_demands", $values);
if (count($insert)) {
		}
  else
		{
		echo "Error in insertion";
		} 
} 
//echo "Haii<pre>";print_r($_REQUEST); die;
//print_r($_REQUEST['requirement']);die;
if (isset($_REQUEST['requirement'])) {
	
    $value_array = $requirement_vals=array();
    $requirement = $_POST["requirement"];
	//print_r($requirement);
    foreach ($requirement as $key => $value_array) {
        if (!empty($value_array['hiring_requirment_date_from'])) {
            $date_assign_from = explode("/", $value_array['hiring_requirment_date_from']);
            $date_assign_from1 = $date_assign_from[2] . "-" . $date_assign_from[1] . "-" . $date_assign_from[0];
        } else {
            $date_assign_from1 = "";
        }
        $value_array['hiring_requirment_date_from'] = $date_assign_from1;
        if (!empty($value_array['hiring_requirment_date_to'])) {
            $date_assign_to = explode("/", $value_array['hiring_requirment_date_to']);
            $date_assign_to1 = $date_assign_to[2] . "-" . $date_assign_to[1] . "-" . $date_assign_to[0];
        } else {
            $date_assign_to1 = "";
        }
        $value_array['hiring_requirment_date_to'] = $date_assign_to1;
        $requirement_vals = array_merge($value_array, array("id" => $insert));
        $requirement_id = $db->secure_insert("sm_external_requirment", $requirement_vals);
        unset($value_array);
		unset($requirement_vals);
    }
}
?>