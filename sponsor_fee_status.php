<?php

include('file_parts/header.php');
if (isset($_REQUEST['pass_val'])) {
    $reci_seesion = $_REQUEST['pass_val'];
    $reciDate = $_REQUEST['dop'];
    $vals['status'] = "paid";
    $vals['recieving_date'] = $reciDate;
    $db->secure_update("sm_sponser", $vals, "WHERE `id`='$reci_seesion'");
}
if (isset($_REQUEST['change_val'])) {
    $change_val = $_REQUEST['change_val'];
    $vals1['status'] = "unpaid";
    $vals1['recieving_date'] = "";
    $db->secure_update("sm_sponser", $vals1, "WHERE `id`='$change_val'");
}
if(isset($_REQUEST['employee_receive'])){
$employee_receive_id=$_REQUEST['employee_receive'];
    $recei_date=new DateTime($_REQUEST['dop']);
    $date_of_pay=$recei_date->format("y-m-d");
    $values['sponsor_fee_recieving_date']=$date_of_pay;
    $values['sponsor_fee_status']="Paid";
    $db->secure_update("sm_sponsor_fee_employee",$values,"WHERE `sponsor_fee_id`='$employee_receive_id'");
}
if(isset($_REQUEST['archive_emp'])){
    $archive_emp=$_REQUEST['archive_emp'];
    $db->executeQuery("UPDATE `sm_employee` SET `employee_sponsorfee_status`='Allowed' WHERE `employee_id`='$archive_emp'");
}