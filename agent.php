<?php
// Sample change
include('connection.php');
if (isset($_POST['area_sub'])) {
    $country_sub = $_POST['country_sub'];
	$area_sub = $_POST['area_sub'];
	//$result = array();
    $check_id = $db->selectQuery("select `agent_id` from sm_recruitment_agents  ORDER BY agent_id DESC LIMIT 1");
    if (count($check_id)>0)
		{
		 //$manufacturer_name = $_REQUEST['manufacturer_name'];
        $id=$check_id[0]["agent_id"];
		$id1=$id+1;
		$number=$generate_auto_id=str_pad($id1, 3, '0', STR_PAD_LEFT);
        }
	 else
		{
        $number=$generate_auto_id=str_pad(1, 3, '0', STR_PAD_LEFT);
        }
        $agent_id=$country_sub.$area_sub.$number;
		$result = array("agent_id" => $agent_id);
        echo json_encode($result);
}