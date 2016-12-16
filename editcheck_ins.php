<?php

include('connection.php');
if (isset($_POST['vins'])) 
{
    $v_ins = $_POST['vins'];
	$v_checkins = $_POST['vcheck_ins'];
	$result = array();
	if($v_ins!=$v_checkins)
	{
		 $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_insurance_id='$v_ins'");
    if (count($check_id)) {
        $result = array("Status" => "Insurance No.  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }