<?php
include('connection.php');

if(isset($_POST['visa_no'])&&($_POST['visa_issued'])) {
	    $candidate_id = $_POST['candidate_id'];
		$visa_no = $_POST['visa_no'];
		$visa_issued = $_POST['visa_issued'];
		$visa_expiry = $_POST['visa_expiry'];
		$reason = $_POST['reason'];
       // $values = array();
       /* if ($work_site != "" && $site_location != "") {
	
           // $result = array();
            $check = $db->selectQuery("SELECT `id` FROM `sm_work_site` WHERE `work_site`='$work_site' AND `site_location`='$site_location'");
            if (count($check) > 0) {
				echo "work site already exist";
               // continue;
            }*/
			//else {
			
                $values["visa_no"] = $visa_no;
				$values["visa_issued"]=$visa_issued;
				$values["visa_expiry"]=$visa_expiry;
				$values["reason"]=$reason;
                $update = $db->secure_update("sm_candidate_visa_process", $values, "WHERE `candidate_id`='$candidate_id'");
				if($update){
					echo "added successfully";
				

				}
            }
        
    

