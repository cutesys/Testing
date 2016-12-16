<?php



session_start();

include('connection.php');

if (isset($_REQUEST['pass_val'])) {

    $delete_seesion = $_REQUEST['pass_val'];

    //$sql = "update sm_vehicle_manufacturer set manufacturer_status='0' where manufacturer_id ='$delete_seesion'";
	
    //mysql_query($sql);
	
	$sql = $db->executeQuery("update sm_recruit_qualification set qualification_status='0' where qualification_id ='$delete_seesion'");

}