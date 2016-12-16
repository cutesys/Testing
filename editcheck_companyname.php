<?php

include('connection.php');
if (isset($_POST['compname'])) 
{
    $compname = $_POST['compname'];
	$compcheck_name = $_POST['compcheck_name'];
	$result = array();
	if($compname!=$compcheck_name)
	{
		 $check_id = $db->selectQuery("select * from sm_company where company_name='$compname'");
    if (count($check_id)) {
        $result = array("Status" => "Company ID  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }