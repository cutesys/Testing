<?php

include('connection.php');
if (isset($_REQUEST['delete_id'])) {
    $delete_seesion = $_REQUEST['delete_id'];
    $values=array();
    $values['vehicle_status']=0;
    $db->secure_update("sm_vehicle",$values, "WHERE `vehicle_auto_id`='$delete_seesion'");
    unset($values);
}