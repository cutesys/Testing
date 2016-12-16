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
    move_uploaded_file($file['tmp_name'], 'part_upload/' . $filename);
}
$values["image"] = $filename;
$values["parid"] = $qatarid;
$values['compname'] = $company;
$values['parname'] = $name;
$values['par'] = $percentage;
$values['address1'] = $address1;
$values['address2'] = $address2;
$values['country'] = $nationality;
$values['phone'] = $phone;
$values['email'] = $email;
$values['custid'] = $custid;
$values['status'] = "1";
$insert = $db->secure_insert("partner", $values);
//echo "Partner Added Successfully!!!";
//echo "<script>location.href=companylist.php;</script>";
if (count($insert)) {

       echo "<script>location.href='partner_list.php'</script>";

		}

		else

		{

		$success_msg = "Error in insertion";

		}
