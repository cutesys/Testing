<?php

include("connection.php");
if(isset($_POST['delId'])){
    $delId= $_POST['delId'];
    $db->executeQuery("DELETE FROM `sm_mynote` WHERE `mynote_id`='$delId'");
}