<?php
include('connection.php');

if(isset($_POST['visa_type'])&&($_POST['visa_category'])) 
{
	
		$visa_type               = $_POST['visa_type'];
		$visa_date               = $_POST['visa_date'];
		$visa_category           = $_POST['visa_category'];
		$candidate_id            = $_POST['candidate_id'];
	
           $candidatecode = $db->selectQuery("SELECT `candidate_code` FROM `sm_candidate` WHERE `candidate_id`='$candidate_id'");
			
			if(!empty($candidatecode)){
			    $candidate_code=$candidatecode[0]['candidate_code'];
				$check = $db->selectQuery("SELECT `visa_process_id` FROM `sm_candidate_visa_process` WHERE `candidate_id`='$candidate_id'");
            if (!empty($check)) {
				echo " Already Exist";
               // continue;
            } else { 
				
				$values["candidate_id"] = $candidate_id;
				$values["candidate_code"] = $candidate_code;
				$values["visa_type"] = $visa_type;
				$values["applied_visa_date"] = $visa_date;
			
				$values["visa_category"] = $visa_category;
				$values["visa_status"]="Applied";
				$update = $db->secure_insert("sm_candidate_visa_process", $values, "WHERE `candidate_id`='$candidate_id'");
				if($update){
					//echo " <script>location.href='processvisa_candidate_list.php'</script>";
				echo"success";

									} 
									else { 
									echo "Failed To Visa Apply! Please Try Again"; }
						}        
    
        }
}
