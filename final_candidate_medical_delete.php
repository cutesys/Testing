<?php
include('connection.php');
if (isset($_POST['sele_can']))
	{
		$candidate_id = $_POST['sele_can'];
		
		$selectMedicalStatus=$db->selectQuery("SELECT `medical_status_id` FROM sm_candidate_medical_status WHERE `candidate_id` = '$candidate_id'");
		if($selectMedicalStatus)
		{
			$medicalStatusId = $selectMedicalStatus[0]['medical_status_id'];
			if(!empty($medicalStatusId)){
			$value = $db->executeQuery("DELETE FROM `sm_candidate_medical_status` WHERE `medical_status_id` = '$medicalStatusId'");
			if(!empty($value)){
				$values = $db->executeQuery("DELETE FROM `sm_candidate_medical_certificates` WHERE `medical_status_id` = '$medicalStatusId'");
				if(!empty($values)){
					echo "Data Deleted Successfully";
				} else { echo "Unable to delete Medical visa Certificates! Please try Again";}
			} else { echo "Unable to delete Medical visa Status! Please try Again"; }
			} 
		}
    }
	
	
	
	