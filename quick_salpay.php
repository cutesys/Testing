<?php 
include('connection.php');
//unset($vals);
    if (isset($_REQUEST['compid' ])) {
   
    $compid = $_REQUEST['compid'];
	$empid = $_REQUEST['empid'];
	$year = $_REQUEST['yearid'];
	$month = $_REQUEST['monthid'];
	//$dispatch_date = $_REQUEST['disid'];
	$recei_date=new DateTime($_REQUEST['disid']);
    $dispatch_date=$recei_date->format("y-m-d");
	// echo"hai";
    $vals = array();
	$vals['payroll_status'] = "Paid";
	$vals['payroll_received_date'] = $dispatch_date;
    $update=$db->secure_update("sm_payroll", $vals, "WHERE `company_id`='$compid' and `employee_id`='$empid' and YEAR(`payroll_date`)='$year' and MONTH(`payroll_date`)='$month'");
	if(count($update))
	{
		header('location:salary_receipt.php');
	}
	unset($vals);
	//header('location:salary_dispatch.php');
}
?>