<?php

session_start();
include('connection.php');
if (isset($_REQUEST['pass_val'])) {
    $delete_seesion = $_REQUEST['pass_val'];
    $sql = "update sm_company set company_sponsor_fee_status='Cancel' where company_id ='$delete_seesion'";
    mysql_query($sql);
}