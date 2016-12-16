<?php

session_start();
include("connection.php");
$contact_designation = $_POST['contact_designation'];
$contact_name = $_POST['contact_name'];
$contact_email = $_POST['contact_email'];
$contact_phone = $_POST['contact_phone'];
$contact_notification = $_POST['notifs'];
$company_id = $_POST['company_id'];
$contact_data = array();
$contact_data['contact_name'] = $contact_name;
$contact_data['contact_email'] = $contact_email;
$contact_data['contact_phone'] = $contact_phone;
$contact_data['contact_designation'] = $contact_designation;
$contact_data['contact_notification'] = implode(',', $contact_notification);
$contact_data['company_id'] = $company_id;
$contact_data['sponsor_id'] = $_SESSION['id'];
$insert_docs = $db->secure_insert("sm_company_contacts", $contact_data);
if (!empty($insert_docs)) {
    echo "Contact Added";
}
unset($contact_data);
