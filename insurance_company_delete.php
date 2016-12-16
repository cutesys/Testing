<?php
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
	$sql = $db->executeQuery("DELETE FROM `sm_insurance_company` WHERE `insurance_company_id` ='$delete_seesion'");

}