<?php
include("./connection.php");
$name = $_REQUEST['name'];
$qatarid = $_REQUEST['qatarid'];
$company = $_REQUEST['company'];
$address1 = $_REQUEST['address1'];
$address2 = $_REQUEST['address2'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$percentage = $_REQUEST['percentage'];
$custid = $_REQUEST['custid'];
$nationality = $_REQUEST['nationality'];
$file = $_FILES['file-0'];
$filename = $file['name'];
if ($filename != "") {
    $uniqid = uniqid();
    $filename = $uniqid . $filename;
    move_uploaded_file($file['tmp_name'], 'img/' . $filename);
}
$insert = mysql_query("update set  `partner` (`image`,`parid` ,`compname` ,`parname` ,`par` ,`address1` ,`address2` ,`country` ,`phone`,`email`,`custid`,`status`)VALUES"
        . "('$filename','$qatarid','$company','$name','$percentage','$address1','$address2','$nationality','$phone','$email','$custid','1')");

echo "Partner Updated Successfully";