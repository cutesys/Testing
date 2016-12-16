<?php
include("connection.php");
if (isset($_POST['employee_edit_ids'])) {

$employee_edit_id = $_REQUEST['employee_edit_ids'];
$values1['sponsor_fee_status'] = "Not Paid";
$values1['sponsor_fee_recieving_date'] = "";
$db->secure_update("sm_sponsor_fee_employee", $values1, "WHERE `sponsor_fee_id`='$employee_edit_id'");
}