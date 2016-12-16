<?php



session_start();

include('connection.php');

if (isset($_REQUEST['pass_val'])) {

    $delete_seesion = $_REQUEST['pass_val'];

    //$sql = "update sm_vehicle_manufacturer set manufacturer_status='0' where manufacturer_id ='$delete_seesion'";
	
    //mysql_query($sql);
	
	//$sql = $db->executeQuery("update sm_hiring_req_add set status='0' where id ='$delete_seesion'");
	$values=array();
    $values['status']="0";
    $db->secure_update("sm_hiring_requirment_add",$values,"WHERE `id`='$delete_seesion'");

}