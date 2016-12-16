<?php



session_start();

include('connection.php');

if (isset($_REQUEST['pass_val'])) {

    $delete_seesion = $_REQUEST['pass_val'];
	
	$sql = $db->executeQuery("update sm_vehicle_model set model_status='0' where model_id ='$delete_seesion'");

}