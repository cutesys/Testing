<?php

$search = $_GET['id'];
session_start();
ob_start();
include('connection.php');
// include the php-excel class
require ('class-excel-xml.inc.php');


if (!empty($_POST['check_list'])) {

    foreach ($_POST['check_list'] as $selected) {
        $custid = $_SESSION['id'];
        if ($search == '') {

            $sql = "SELECT * FROM `emp` where custid ='$custid' and status = '1' ";
        } else {

            /* $sql = "SELECT * FROM `emp` where custid= '$custid' and status = '1' and empid  like '%$search%' or designation like '%$search%' or company like '%$search%' or  issueddate  like '%$search%' or email like '%$search%'"; */
            $sql = "SELECT * FROM `emp` where custid= '$custid' and status = '1' and empid  like '%$search%'";
            // $sql="SELECT * FROM emp WHERE id=$selected AND custid='" . $_SESSION['id'] . "' AND status='1'";
        }
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res)) {
            $dot = ".";
            $hyphonnqwe = "-";

            $myheaderarray = array();
            $myheaderarray [] = array('Name', 'Designation', 'Company', 'Qatar Id', 'Start Date', 'Email');

            $myarray[] = array($row['firstname'] . '  ' . $row['lastname'], $row['designation'], $row['company'], $row['empid'], $row['issueddate'], $row['email']);
        }
    }
} elseif (empty($_POST['check_list']) || empty($_POST['checkall'])) {
    $custid = $_SESSION['id'];
    if ($search == '') {

        $sql = "SELECT * FROM `emp` where custid ='$custid'and status ='1' ";
    } else {

        /* $sql = "SELECT * FROM `emp` where custid= '$custid' and status ='1' and empid  like '%$search%' or designation like '%$search%' or company like '%$search%' or  issueddate  like '%$search%' or email like '%$search%'"; */
        $sql = "SELECT * FROM `emp` where custid= '$custid' and status ='1' and empid  like '%$search%'";
    }
    $res = mysql_query($sql);
    while ($row = mysql_fetch_array($res)) {

        $myheaderarray = array();
        $myheaderarray [] = array('Name', 'Designation', 'Company', 'QatarId', 'Start Date', 'Email');

        $myarray[] = array($row['firstname'] . '  ' . $row['lastname'], $row['designation'], $row['company'], $row['empid'], $row['issueddate'], $row['email']);
    }
}
//style
// generate excel file
$xls = new Excel_XML;
//$xls->getActiveSheet()
$xls->addArray($myheaderarray);
//foreach ($myarray as $k => $v)
//          {
//            $this->addRow ($v);
//                //endforeach;
//          }
$xls->addArray($myarray);

$xls->generateXML("employee_lists");
?>