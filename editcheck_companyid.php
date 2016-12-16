<?php

include('connection.php');
if (isset($_POST['compid'])) 
{
    $compid = $_POST['compid'];
	$compcheck_id = $_POST['compcheck_id'];
	$result = array();
	if($compid!=$compcheck_id)
	{
		 $check_id = $db->selectQuery("select * from sm_company where company_pid='$compid'");
    if (count($check_id)) {
        $result = array("Status" => "Company ID  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }