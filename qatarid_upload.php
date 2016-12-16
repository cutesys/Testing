<?php
include('connection.php');

$medical_status = $_POST['medical_status'];
$edit_id = $_REQUEST['edit_id'];
$qatar_id= $_POST['qatar_id'];
//echo $qatar_id;
$qatar_id_issued_date1= explode("-",$_POST['qatar_id_issued_date']);
$qatar_id_issued_date = $qatar_id_issued_date1[2]."-".$qatar_id_issued_date1[1]."-".$qatar_id_issued_date1[0];
$qatar_id_expiry_date1= explode("-",$_POST['qatar_id_expiry_date']);
$qatar_id_expiry_date = $qatar_id_expiry_date1[2]."-".$qatar_id_expiry_date1[1]."-".$qatar_id_expiry_date1[0];
$candidate_id = $_POST['candidate_id'];
$values = array();
//$update = $db->executeQuery("DELETE FROM `sm_candidate_documents` WHERE `documents_title`='QatarID' AND `candidate_id`='$edit_id'");

	$values1['documents_title'] = "QatarID";
	$values1['documents_data'] = $qatar_id;
	$values1['documents_start_date'] = $qatar_id_issued_date;
	$values1['documents_end_date'] = $qatar_id_expiry_date;
	$values1['candidate_id'] = $candidate_id;
	$checkQatarID = $db->selectQuery("SELECT `documents_id`, `documents_title` FROM sm_candidate_documents WHERE `documents_title`='QatarID' AND `candidate_id`='$candidate_id'" );
	if(!empty($edit_id))
		{
			$val['documents_title'] = "QatarID";
	$val['documents_data'] = $qatar_id;
	$val['documents_start_date'] = $qatar_id_issued_date;
	$val['documents_end_date'] = $qatar_id_expiry_date;
	$val['candidate_id'] = $edit_id;
				$medical_visa_qatar_id_status = $db->secure_update("sm_candidate_documents", $val, "WHERE `candidate_id`='$edit_id'" );
		}
	else{
			if (count($checkQatarID)>0) {
			echo $q="Qatar ID already exists for the candidate";
			}
			else{
				$checkQatar = $db->selectQuery("SELECT `documents_data` FROM sm_candidate_documents WHERE documents_data =  $qatar_id" );
				if($checkQatar){ echo "0";}
				else{
					$medical_visa_qatar_id_status = $db->secure_insert("sm_candidate_documents", $values1 );
				}
			} 
	}

?>