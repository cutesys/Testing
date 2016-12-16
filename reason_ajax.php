<?php
include("connection.php");
if(isset($_POST['reson_id'])){
	$reson_id=$_POST['reson_id'];
	$select_reason=$db->selectQuery("SELECT `reason` FROM sm_candidate_visa_process WHERE `candidate_id`='$reson_id'");
	if(count($select_reason)>0){
	echo $select_reason[0]['reason'];
	}
}
?>



