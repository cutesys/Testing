<?php

include('file_parts/header.php');
$sp_fee = $_POST['fee'];
$com_pid = $_POST['c_pid'];
$val['company_sponsor_fee'] = $sp_fee;
$db->secure_update("sm_company", $val, "WHERE `company_id`='$com_pid'");
//mysql_query("update sm_company set company_sponsor_fee='$sp_fee' where company_id='$com_pid'");
header('location:sponsor_list.php');
?>