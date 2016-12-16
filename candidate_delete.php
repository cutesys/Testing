<?php

include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $values=array();
    $values['status']="delete";
    $db->secure_update("sm_candidate_medical_status",$values,"WHERE `medical_status_id`='$delete_seesion'");
}