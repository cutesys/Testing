<?php

session_start();
include("./connection.php");
$event_coordinator = $_POST['event_coordinator'];
$company = $_POST['company'];
$event_title = $_POST['event_title'];
$description = $_POST['description'];
$event_time = $_POST['event_time'];
$event_date = $_POST['event_date'];
$contact_email = $_POST['contact_email'];
$cust = $_SESSION['id'];

$calendar['name'] = $event_coordinator;
$calendar['date'] = $event_date;
$calendar['company'] = $company;
$calendar['email'] = $contact_email;
$calendar['title'] = $event_title;
$calendar['time'] = $event_time;
$calendar['description'] = $description;
$calendar['custid'] = $cust;
$ins = $db->secure_insert("event", $calendar);
