<?php

include("connection.php");
$values = array();
if (isset($_POST['passId'])) {
    $passId = $_POST['passId'];
    $values['todo_status'] = "completed";
    $val = $db->secure_update("sm_todo_list", $values, "WHERE `todo_id`='$passId'");
}
if (isset($_POST['passId1'])) {
    $passId = $_POST['passId1'];
    $values['todo_status'] = " ";
    $val = $db->secure_update("sm_todo_list", $values, "WHERE `todo_id`='$passId'");
}