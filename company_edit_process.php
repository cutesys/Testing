<?php
include('file_parts/header.php');
 $cid=$_POST['idd'];

echo $company_pid=$_POST['company_pid'];

$company_email=$_POST['company_email'];
$company_name=$_POST['company_name'];
$company_fax=$_POST['company_fax'];
$company_owner=$_POST['company_owner'];
$company_sponsor_fee=$_POST['company_sponsor_fee'];

$company_address1=$_POST['company_address1'];
 $company_address2=$_POST['company_address2'];
$company_door=$_POST['company_door'];
$company_city=$_POST['company_city'];
$company_region=$_POST['company_region'];
$company_postbox=$_POST['company_postbox'];
    
    
$company_phone=$_POST['company_phone'];
$company_about=$_POST['company_about'];

mysql_query("update sm_company set company_pid='$company_pid',company_name='$company_name',company_email='$company_email',company_phone='$company_phone',company_fax='$company_fax',company_owner='$company_owner',
company_about='$company_about',company_address1='$company_address1', company_address2='$company_address2', company_door='$company_door',company_city='$company_city',
  company_region='$company_region',company_postbox='$company_postbox',company_sponsor_fee='$company_sponsor_fee' where company_id=$cid");

header('location:companylist.php');

//mysql_query("update sm_company set company_pid='$company_pid',company_name='$company_name',company_email='$company_email',
//   company_phone='$company_phone',company_fax='$company_fax',company_owner='$company_owner'
//company_about='$company_about',company_address1='$company_address1',
//    company_address2='$company_address2',company_door='$company_door',company_city='$company_city',
//        company_region='$company_region',company_postbox='$company_postbox'
//	 
//where company_id=$cid");


?>