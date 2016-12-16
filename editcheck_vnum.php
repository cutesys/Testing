<?php

include('connection.php');
if (isset($_POST['vnum'])) 
{
    $v_num = $_POST['vnum'];
	$v_checknum = $_POST['vcheck_num'];
	$result = array();
	if($v_num!=$v_checknum)
	{
		 $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_number='$v_num'");
    if (count($check_id)) {
        $result = array("Status" => "Vehicle No.  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }