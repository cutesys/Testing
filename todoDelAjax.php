<?php

include("connection.php");
//$todoClass = $_POST['todoClass'];
$todoId = $_POST['todoId'];
$db->executeQuery("DELETE FROM `sm_todo_list` WHERE `todo_id`='$todoId'");

