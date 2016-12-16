<?php
session_start();
include('connection.php');

if (isset($_REQUEST['delete_id'])) {

    $delete_seesion = $_REQUEST['delete_id'];
	 $values1 = array();
	 $values1['vehicle_status'] ="1";

    //$sql = "update sm_company set company_status='1' where company_id ='$delete_seesion'";
	$query1 = $db->secure_update('sm_vehicle', $values1, " WHERE vehicle_auto_id = '$delete_seesion'");

    mysql_query($query1);

}