<?php
include('connection.php');

	    $candidate_id = $_POST['candidate_id'];
		$entry = $_POST['entry_date'];
		//$candidate_code = $_POST['candidate_code'];
		echo $candidate_id;
		$travelling_status = $_POST['travelling_status'];
		echo $travelling_status;
		if(!empty($entry)){
		$entry_date1=explode("-",$_POST['entry_date']);
        $entry_date=$entry_date1[2]."-".$entry_date1[1]."-".$entry_date1[0];
                $values["travelling_status"] = $travelling_status;
				$values["entry_date"] = $entry_date;
				
                $update = $db->secure_update("sm_travelling_details", $values,"WHERE `candidate_id`='$candidate_id'");
				if($update){
					echo "Added Successfully";
				}
				}
				else
				{
					$value["travelling_status"] = $travelling_status;
					$updates = $db->secure_update("sm_travelling_details", $value,"WHERE `candidate_id`='$candidate_id'");
					if($updates){
					echo "Added Successfull";
				}
				}

				
            
        
    

