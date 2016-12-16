<?php

include('connection.php');
if (isset($_POST['veng'])) 
{
    $v_eng = $_POST['veng'];
	$v_checkeng = $_POST['vcheck_eng'];
	$result = array();
	if($v_eng!=$v_checkeng)
	{
		 $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_engine_number='$v_eng'");
    if (count($check_id)) {
        $result = array("Status" => "Engine No.  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }