<?php
session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
	$sql = $db->executeQuery("update partner set status='1' where id ='$delete_seesion'");
    mysql_query($sql);
}