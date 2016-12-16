<?php

session_start();
include("connection.php");

$Passport_Documents = $Experience_Certificates = $Resume = $Candidate_Picture = $ID_Card = $Driving_License = '' ;
if (isset($_SESSION['Passport_Documents'])) {
    $Passport_Documents = implode(",", $_SESSION['Passport_Documents']);
}
if (isset($_SESSION['Experience_Certificates'])) {
    $Experience_Certificates = implode(",", $_SESSION["Experience_Certificates"]);
}
if (isset($_SESSION['Resume'])) {
    $Resume = implode(",", $_SESSION["Resume"]);
}
if (isset($_SESSION['Candidate_Picture'])) {
    $Candidate_Picture = implode(",", $_SESSION["Candidate_Picture"]);
}
if (isset($_SESSION['ID_Card'])) {
    $ID_Card = implode(",", $_SESSION["ID_Card"]);
}
if (isset($_SESSION['Driving_License'])) {
    $Driving_License = implode(",", $_SESSION["Driving_License"]);
}

if(isset($_POST["emp_docs"])){
@$emp_docs = array_values($_POST["emp_docs"]);
        foreach ($emp_docs as $key => $value_array) {
			
            if ($value_array["document_title"] == "Candidate_Picture") {
                
                if (!empty($Candidate_Picture)) 
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Candidate_Picture'");
                    $data_value_array["file_name"] = "Candidate_Picture";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Candidate_Picture;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Candidate_Picture']);
					unset($data_value_array);
                } 
            } elseif ($value_array["document_title"] == "Resume") {
					
				if ($Resume) 
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Resume'");
                    $data_value_array["file_name"] = "Resume";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Resume;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Resume']);
					unset($data_value_array);
				}
            } elseif ($value_array["document_title"] == "Experience_Certificates") {
                
				if ($Experience_Certificates)
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Experience_Certificates'");
                    $data_value_array["file_name"] = "Experience_Certificates";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Experience_Certificates;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Experience_Certificates']);
					unset($data_value_array);
				}
            } elseif ($value_array["document_title"] == "Passport_Documents") {
                
				if ($Passport_Documents) 
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Passport_Documents'");
                    $data_value_array["file_name"] = "Passport_Documents";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Passport_Documents;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Passport_Documents']);
					unset($data_value_array);
				}
            }  elseif ($value_array["document_title"] == "ID_Card") {
                
				if ($ID_Card) 
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'ID_Card'");
                    $data_value_array["file_name"] = "ID_Card";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $ID_Card;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['ID_Card']);
					unset($data_value_array);
				}
            }  elseif ($value_array["document_title"] == "Driving_License") {
                
				if ($Driving_License) 
				{
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Driving_License'");
                    $data_value_array["file_name"] = "Driving_License";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Driving_License;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Driving_License']);
					unset($data_value_array);
				}
            }else {
                continue;
            }
        }
		}

//$agent_code = $_POST['agent_code'];
$candidate_id = $_POST['candidate_id'];
$candidate_nationality = $_POST['candidate_nationality'];
$candidate_city = $_POST['candidate_city'];
$candidate_code = $_POST['candidate_code'];
//$candidate_dob1 = new DateTime($_POST['candidate_dob']);
//$candidate_dob = $candidate_dob1->format('Y-m-d');
if(!empty($_POST['candidate_dob'])){
$explode_dob=explode('/',$_POST['candidate_dob']);
$candidate_dob = $explode_dob[2]."-".$explode_dob[1]."-".$explode_dob[0];
} else {
$candidate_dob = "";	
}
$candidate_email = $_POST['candidate_email'];
$candidate_firstname = $_POST['candidate_firstname'];
$candidate_gender = $_POST['candidate_gender'];
$candidate_lastname = $_POST['candidate_lastname'];
$candidate_marital_status = $_POST['candidate_marital_status'];
$candidate_middlename = $_POST['candidate_middlename'];
$candidate_doorno = $_POST['candidate_doorno'];
$candidate_phone = $_POST['candidate_phone'];
$candidate_state = $_POST['candidate_state'];
$candidate_zipcode = $_POST['candidate_zipcode'];
$values = array();
//$values['agent_code'] = $agent_code;
$values['candidate_nationality'] = $candidate_nationality;
$values['candidate_city'] = $candidate_city;
$values['candidate_code'] = $candidate_code;
$values['candidate_dob'] = $candidate_dob;
$values['candidate_email'] = $candidate_email;
$values['candidate_firstname'] = $candidate_firstname;
$values['candidate_gender'] = $candidate_gender;
$values['candidate_lastname'] = $candidate_lastname;
$values['candidate_marital_status'] = $candidate_marital_status;
$values['candidate_middlename'] = $candidate_middlename;
$values['candidate_doorno'] = $candidate_doorno;
$values['candidate_phone'] = $candidate_phone;
$values['candidate_state'] = $candidate_state;
$values['candidate_zipcode'] = $candidate_zipcode;
$candidate_update = $db->secure_update("sm_candidate", $values, "WHERE `candidate_id`='$candidate_id'");
/*if (!empty($Candidate_Picture)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = 'Candidate_Picture';
    $clogoArray['file_path'] = $Candidate_Picture;
    $logo = $db->secure_update("sm_candidate_files", $clogoArray, "WHERE `candidate_id`='$candidate_id'");
    unset($_SESSION[' Candidate_Picture']);
    unset($clogoArray);
}
if (!empty($Resume)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = "Resume";
    $clogoArray['file_path'] = $Resume;
    $logo = $db->secure_update("sm_candidate_files", $clogoArray, "WHERE `candidate_id`='$candidate_id'");
    unset($_SESSION['Resume']);
    unset($clogoArray);
}
if (!empty($Experience_Certificates)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = "Experience_Certificates";
    $clogoArray['file_path'] = $Experience_Certificates;
    $logo = $db->secure_epdate("sm_candidate_files", $clogoArray, "WHERE `candidate_id`='$candidate_id'");
    unset($_SESSION['Experience_Certificates']);
    unset($clogoArray);
}
if (!empty($candidate_id)) {
   // echo "Success";
} */ 
if (isset($_POST['qualification'])) {
    $value_array = array();
    $qualification = $_POST["qualification"];
	$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_qualifications` WHERE `candidate_id`='$candidate_id'");
    foreach ($qualification as $key => $value_array) {
        $qualification_vals = array_merge($value_array, array("candidate_id" => $candidate_id));
        //$qualification_id = $db->secure_update("sm_candidate_qualifications", $qualification_vals, "WHERE `candidate_id`='$candidate_id'");
		$experience_id = $db->secure_insert("sm_candidate_qualifications", $qualification_vals);
        unset($value_array);
    }
}
//print_r($_POST['skill']); die;
if (isset($_POST['application'])) {
    $value_array1 = array();
    $skill_implode = "";
    $application = $_POST["application"];
    if (isset($_POST['skill'])) {
        $skill = $_POST['skill'];
        $skill_implode = implode(",", $skill);
    }
    foreach ($application as $key => $value_array1) {
        $application_vals = array_merge($value_array1, array("candidate_id" => $candidate_id, "application_skills" => $skill_implode));
        $application_id = $db->secure_update("sm_candidate_application", $application_vals, "WHERE `candidate_id`='$candidate_id'");
        unset($value_array1);
    }
}
//print_r($_POST['experience']); die;
//echo "<pre>";print_r($_POST['experience']); die;
if (isset($_POST['experience'])) {
    $value_arrays = array();
    $experiences = $_POST["experience"];
	$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_experience` WHERE `candidate_id`='$candidate_id'");
    foreach ($experiences as $key => $value_arrays) {
        if (!empty($value_arrays['experience_from'])) {
            $from_date1 = explode("/", $value_arrays['experience_from']);
            $from_date = $from_date1[2] . "-" . $from_date1[1] . "-" . $from_date1[0];
        } else {
            $from_date = "";
        }
        $value_arrays['experience_from'] = $from_date;
        if (!empty($value_arrays['experience_to'])) {
            $to_date1 = explode("/", $value_arrays['experience_to']);
            $to_date = $to_date1[2] . "-" . $to_date1[1] . "-" . $to_date1[0];
        } else {
            $to_date = "";
        }
        $value_arrays['experience_to'] = $to_date;
        $experience_vals = array_merge($value_arrays, array("candidate_id" => $candidate_id));
        //$experience_id = $db->secure_update("sm_candidate_experience", $experience_vals, "WHERE `candidate_id`='$candidate_id'");
		$experience_id = $db->secure_insert("sm_candidate_experience", $experience_vals);
		//echo "<pre>";print_r($value_arrays);
        unset($value_arrays);
    }
	
} 
if (isset($_POST['documents'])) {
	//echo "<pre>";print_r($_POST['documents']); die;
    $document_array = array();
    $documents = $_POST['documents'];
	$deletes_all = $db->executeQuery("DELETE FROM `sm_candidate_documents` WHERE `candidate_id`='$candidate_id'");
	foreach ($documents as $key => $document_array) {
        $document_vals = array_merge($document_array, array("candidate_id" => $candidate_id));
        $document_id = $db->secure_insert("sm_candidate_documents", $document_vals);
        $data_value_array = array();
        if ($document_array["documents_title"] == "Passport") {
            if (empty($Passport_Documents)) {
                continue;
            }
            $data_value_array["file_path"] = $Passport_Documents;
            $data_value_array['file_name'] = 'Passport_Documents';
            unset($_SESSION['Passport_Documents']);
        } else {
            continue;
        }

        $data_value_array['candidate_id'] = $candidate_id;
        $data_value_array["documents_id"] = $document_id;
        $file_id = $db->secure_insert("sm_candidate_files", $data_value_array);
        unset($data_value_array);
        unset($document_array);
    }
	/*foreach ($documents as $key => $document_array) {
        $document_vals = array_merge($document_array, array("candidate_id" => $candidate_id));
        // $document_id = $db->secure_update("sm_candidate_documents", $document_vals, "WHERE `candidate_id`='$candidate_id'");
		$experience_id = $db->secure_insert("sm_candidate_documents", $document_vals);
        $data_value_array = array();
        if ($document_array["documents_title"] == "Passport") {
			//$deletes_pass = $db->executeQuery("DELETE FROM `sm_candidate_documents` WHERE `candidate_id`='$candidate_id' AND `documents_title`='Passport'");
            //$document_id = $db->secure_update("sm_candidate_documents", $document_vals, "WHERE `candidate_id`='$candidate_id' AND `documents_title`='Passport'");
            $experience_id = $db->secure_insert("sm_candidate_documents", $document_vals);
			if (empty($Passport_Documents)) {
                continue;
            }
            $data_value_array["file_path"] = $Passport_Documents;
            $data_value_array['file_name'] = 'Passport_Documents';
            unset($_SESSION['Passport_Documents']);
        } elseif ($document_array["documents_title"] == "Driving License") {
			$deletes_driving = $db->executeQuery("DELETE FROM `sm_candidate_documents` WHERE `candidate_id`='$candidate_id' AND `documents_title`='Driving License'");
            $document_id = $db->secure_update("sm_candidate_documents", $document_vals, "WHERE `candidate_id`='$candidate_id' AND `documents_title`='Driving License'");
            if (empty($Passport_Documents)) {
                continue;
            }
        } elseif ($document_array["documents_title"] == "ID Card") {
			$deletes_idcard = $db->executeQuery("DELETE FROM `sm_candidate_documents` WHERE `candidate_id`='$candidate_id' AND `documents_title`='ID Card'");
            $document_id = $db->secure_update("sm_candidate_documents", $document_vals, "WHERE `candidate_id`='$candidate_id' AND `documents_title`='ID Card'");
        } else {
            continue;
        }

        $data_value_array['candidate_id'] = $candidate_id;
        $data_value_array["documents_id"] = $document_id;
        $file_id = $db->secure_update("sm_candidate_files", $data_value_array, "WHERE `candidate_id`='$candidate_id'");
        unset($data_value_array);
        unset($document_array);
    }*/
} 
echo '<script>location.href="candidate_profile.php?can_id=' . $candidate_id . '"</script>';
?>