<?php

include('connection.php');
if (isset($_POST['vreg'])) 
{
    $v_reg = $_POST['vreg'];
	$v_checkreg = $_POST['vcheck_reg'];
	$result = array();
	if($v_reg!=$v_checkreg)
	{
		 $check_id = $db->selectQuery("select * from sm_vehicle where vehicle_registration_number='$v_reg'");
    if (count($check_id)) {
        $result = array("Status" => "Registration No.  Exist", "data_val" => "0","color" => "red");
        echo json_encode($result);
    } else {
        $result = array("Status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
	}
    }