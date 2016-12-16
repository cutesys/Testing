<?php
include("connection.php");
if (isset($_POST['task_delete_id'])) {
    $task_delete_id = $_POST['task_delete_id'];
    $values = array();
    $values['todo_active_status']=0;
    $db->secure_update("sm_time_todo",$values,"WHERE `todo_id`='$task_delete_id'");
    unset($values);
}