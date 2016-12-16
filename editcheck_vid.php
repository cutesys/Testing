<?php

include('connection.php');
if (isset($_POST['vid'])) 
{
    $v_id = $_POST['vid'];
	$v_checkid = $_POST['vcheck_id'];
	$result = array();
	if($v_id!=$v_checkid)
	{
		 $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_id='$v_id'");
    if (count($check_id)) {
        $result = array("Status" => "Vehicle ID  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }