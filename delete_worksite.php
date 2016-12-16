<?php

include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $values=array();
    $values['status']="delete";
    $db->secure_update("sm_work_site",$values,"WHERE `id`='$delete_seesion'");
}