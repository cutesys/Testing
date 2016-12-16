<?php

session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $sql =  $db->executeQuery("update sm_company set company_status='1' where company_id ='$delete_seesion'");
    mysql_query($sql);
}