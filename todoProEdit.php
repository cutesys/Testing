<?php

include("connection.php");
$todo_date1 = explode("-",$_POST['todo_edate']);
$todo_date=$todo_date1[2]."-".$todo_date1[1]."-".$todo_date1[0];
$todo_time = $_POST['todo_etime'];
$todo_data = $_POST['todo_etitle'];
$todo_status = $_POST['todo_estatus'];
$todo_progress = $_POST['todo_eprogress'];
$todo_etime = $_POST['todo_etime'];
$toId = $_POST['toId'];
$values = array();
$values['todo_data'] = $todo_data;
$values['todo_date'] = $todo_date;
$values['todo_time'] = $todo_etime;
$values['todo_status'] = $todo_status;
$values['todo_progress'] = $todo_progress;
$upTodo = $db->secure_update("sm_time_todo", $values, "WHERE `todo_id`='$toId'");

