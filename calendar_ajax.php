<?php
session_start();
$custid=$_SESSION['id'];
include("connection.php");
$res_events = $db->selectQuery("select * from event where custid='$custid'");
$jarray = array();
if (count($res_events)) {
    for ($e = 0; $e < count($res_events); $e++) {				$input = $res_events[$e]['date'];		$a = explode('/',$input);		$format_change = $a[1].'/'.$a[0].'/'.$a[2];
        $event_array[] = array(
            'id' => $res_events[$e]['id'],
            'title' => $res_events[$e]['title'],
            'description'=>$res_events[$e]['description'],
            'start' => $format_change,
            'end' => $format_change,
            'coordinator'=>$res_events[$e]['name'],
            'email'=>$res_events[$e]['email'],
            'company'=>$res_events[$e]['company'],
            'allDay' => false);
    }

    echo json_encode($event_array);
}