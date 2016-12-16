<?php



session_start();

include('connection.php');

if (isset($_REQUEST['pass_val'])) {

    $delete_seesion = $_REQUEST['pass_val'];
$db->executeQuery("DELETE FROM `sm_designation` WHERE `designation_id` ='$delete_seesion'");

}