<?php

include("connection.php");
$todo_date1 = explode("-",$_POST['todo_date']);
$todo_date=$todo_date1[2]."-".$todo_date1[1]."-".$todo_date1[0];
$todo_time = $_POST['todo_time'];
$todo_data = $_POST['todo_data'];
$todo_status = $_POST['todo_status'];
$todo_progress = $_POST['todo_progress'];
$values = array();
$values['todo_data'] = $todo_data;
$values['todo_date'] = $todo_date;
$values['todo_time'] = $todo_time;
$values['todo_status'] = $todo_status;
$values['todo_progress'] = $todo_progress;
$inTodo = $db->secure_insert("sm_time_todo", $values);
