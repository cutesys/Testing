<?php
include('connection.php');

	    $candidate_id 			= $_POST['candidate_id'];
		$visa_no 				= $_POST['visa_no'];
		$visa_issued 			= $_POST['visa_issued'];
		$visa_expiry 			= $_POST['visa_expiry'];
		$reason 				= $_POST['reason'];
		$visa_status 			= $_POST['visa_status'];
       
			if($visa_status == "Approved")
			{
				//echo "app"; die;
                $values["visa_no"] = $visa_no;
				$values["visa_issued"]=$visa_issued;
				$values["visa_expiry"]=$visa_expiry;

				//$values["reason"]=$reason;
				$values["visa_status"]=$visa_status;
                $update = $db->secure_update("sm_candidate_visa_process", $values, "WHERE `candidate_id`='$candidate_id'");
				if($update){
					echo "added successfully";
				}

				} else if($visa_status == "Rejected")
		{
		
			$values1["reason"] = $reason;
			$values1["visa_status"]=$visa_status;
			$update1 = $db->secure_update("sm_candidate_visa_process", $values1, "WHERE `candidate_id`='$candidate_id'");
			echo "success";
		}
    

