<?php
include('connection.php');


if (isset($_REQUEST['numf'])) {
   $numf = $_REQUEST['numf'];
	 $medical_status=$_REQUEST['medical_status'];
	 $edit_id = $_REQUEST['edit_id'];
//echo $edit_id;
$candidate_id	= $_REQUEST['candidate_id'];
//echo $medical_status;
$selectcandidate_id = $db->selectQuery("SELECT `candidate_id`,`candidate_code` from sm_candidate where `candidate_id`='$candidate_id'");
if (count($selectcandidate_id>0)){
$candidate_id = $selectcandidate_id[0]['candidate_id'];
$candidate_code = $selectcandidate_id[0]['candidate_code'];
//$employee_company=$selectcandidate_id[0]['employee_company'];
$values['candidate_id'] = $candidate_id;
$values['candidate_code'] = $candidate_code;
$values['medical_status'] = $medical_status;
$extensions = array("png", "jpg", "pdf", "doc", "docx");
$data_ready = 1;
$sesVal = array();

}
	
$folder_name = "candidate_uploads/$candidate_code/";
$folder_name .="medical certificates/";


//print_r($_FILES['file']); die;

if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
	
$update = $db->executeQuery("DELETE FROM `sm_medical_visa_certificates` WHERE `candidate_id`='$edit_id'");
$update = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$edit_id'");
$values1['candidate_id'] = $edit_id;
	$values1['candidate_code'] = $candidate_code;
$values1['medical_status'] = $medical_status;
$update = $db->secure_update("sm_medical_visa_status", $values1," WHERE `candidate_id` = '$edit_id'" );
				if(!empty($update))
				{ echo "0";}
if ($data_ready == 1) {
    for ($i = 0; $i < $numf; $i++) {
        $file_new_name = "";
        $filename = "";
        $file = $_FILES['file-' . $i];
        $filename_org = $file['name'] . ", ";
        $filename = str_replace(' ', '', $file['name']);
        if ($filename != "") {
            $uniqid = uniqid();
            $filename = $filename;
            $file_new_name= $folder_name . $filename;
			//$file_new_name = $folder_name;
            move_uploaded_file($file['tmp_name'], $file_new_name);
			$value["medical_certificates"] = $file_new_name;
			
			//echo $value["medical_certificates"];
			$value['candidate_id'] = $candidate_id;
			$value['medical_status'] = $medical_status;
		
			$value1["file_path"] = $file_new_name;
			$value1["candidate_id"] = $candidate_id;
			$value1["file_name"] = "medical certificates";
		
		if(!empty($edit_id))
		{ 
		$val["medical_certificates"] = $file_new_name;
		$val['candidate_id'] = $candidate_id;
			$val['medical_status'] = $medical_status;
	$values1['candidate_id'] = $edit_id;
	$values1['candidate_code'] = $candidate_code;
$values1['medical_status'] = $medical_status;
	$value1["candidate_id"] = $edit_id;
	
	$insert = $db->secure_insert("sm_medical_visa_certificates", $val);
	$insert = $db->secure_insert("sm_candidate_files", $value1);
	//$insert = $db->secure_insert("sm_medical_visa_status", $values);
	// if (count($insert)) {
					// echo "<script>location.href='employee_list_RP.php'</script>";
				// }
				// else{
					// $success_msg = "Error in insertion";
				// }
				$update = $db->secure_update("sm_medical_visa_status", $values1," WHERE `candidate_id` = '$edit_id'" );
				if(!empty($update))
				{ echo "0";}
				
	}
	else{
		$value["candidate_id"] = $candidate_id;
		$value1["candidate_id"] = $candidate_id;
		//echo "hellooooo";
			// $checkUserID = $db->selectQuery("SELECT `medical_certificates` FROM sm_medical_visa_certificates WHERE `medical_certificates`='$file_new_name'AND `candidate_id`='$candidate_id'" );
			// if ($checkUserID) {
			// echo "already exists";
			// }
			// else{
				//$medical_visa_status = $db->selectQuery("SELECT `medical_status` FROM sm_medical_visa_status WHERE `medical_status`='Passed' AND `candidate_id`='$candidate_id'");
				//if($medical_visa_status)
				//{ echo "certificates already uploaded";}
			//else{
				$insert = $db->secure_insert("sm_medical_visa_certificates", $value);
				//}
				$medical_visa_status_id1 = $db->selectQuery("SELECT `medical_visa_status_id` FROM sm_medical_visa_status WHERE `candidate_id`='$candidate_id'");
				//$medical_visa_status_id1=$medical_visa_status_id1[0]['medical_visa_status_id'];
				if(count($medical_visa_status_id1)>0)
				{$update = $db->secure_update("sm_medical_visa_status", $values," WHERE `candidate_id` = '$candidate_id'" );}
				else{
					$insert = $db->secure_insert("sm_medical_visa_status", $values);
				}
				// if (count($insert)) {
					// echo "<script>location.href='employee_list_RP.php'</script>";
				// }
				// else{
					// $success_msg = "Error in insertion";
				// }
			//}
			$checkUserID1 = $db->selectQuery("SELECT `file_path` FROM sm_candidate_files WHERE `file_path`='$file_new_name'AND `candidate_id`='$candidate_id'" );
			if ($checkUserID1){
			echo "Certificate Already Exists";
			}
			else{
				$checkcertificate = $db->selectQuery("SELECT `file_path` FROM sm_candidate_files WHERE `file_path`='$file_new_name'AND `candidate_id`='$candidate_id'" );
				
				$insert = $db->secure_insert("sm_candidate_files", $value1);
				if (count($insert)) {
				//	echo "<script>location.href='employee_list_RP.php'</script>";
				}
				else{
					$success_msg = "Error in insertion";
				}
			}
		}
	}
		
	}	
}
}


?>