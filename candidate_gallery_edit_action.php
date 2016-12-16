<?php

session_start();
include('connection.php');
//echo "<pre>";print_r($_SESSION); die;
//echo "<pre>";print_r($_POST["emp_docs"]); die;
$candidate_id = $_REQUEST['candidate_id'];
$Passport_Documents = $Experience_Certificates = $Resume = $Candidate_Picture = $ID_Card = $Driving_License = '' ;
if (isset($_SESSION['Passport_Documents'])) {
    $Passport_Documents = implode(",", $_SESSION['Passport_Documents']);
}else { 
	$Passport_Documents="";  
}
if (isset($_SESSION['Experience_Certificates'])) {
    $Experience_Certificates = implode(",", $_SESSION["Experience_Certificates"]);
}else { 
	$Experience_Certificates="";  
}
if (isset($_SESSION['Resume'])) {
    $Resume = implode(",", $_SESSION["Resume"]);
}else { 
	$Resume="";  
}
if (isset($_SESSION['Candidate_Picture'])) {
    $Candidate_Picture = implode(",", $_SESSION["Candidate_Picture"]);
}else { 
	$Candidate_Picture="";  
}
if (isset($_SESSION['ID_Card'])) {
    $ID_Card = implode(",", $_SESSION["ID_Card"]);
}else { 
	$ID_Card="";  
}
if (isset($_SESSION['Driving_License'])) {
    $Driving_License = implode(",", $_SESSION["Driving_License"]);
}else { 
	$Driving_License="";  
}

if (isset($_REQUEST['candidate_id'])) {
	$display_name = ""; 
	$select_name = $db->selectQuery("SELECT `candidate_added_by` FROM `sm_candidate` WHERE `candidate_id`='".$_REQUEST['candidate_id']."'");
	if(!empty($select_name))
	{
		$display_name = $select_name[0]['candidate_added_by'];
	}
	
    if (isset($_POST["emp_docs"])) 
	{
        $emp_docs = array_values($_POST["emp_docs"]);
        foreach ($emp_docs as $key => $value_array) {
			
            if ($value_array["document_title"] == "Candidate_Picture") {
                
                if ($Candidate_Picture) 
				{
					if($display_name == 'agent')
					{
						$Candidate_Pictures = '../'.$Candidate_Picture;
					} else {
						$Candidate_Pictures = $Candidate_Picture;
					}
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Candidate_Picture'");
                    $data_value_array["file_name"] = "Candidate_Picture";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Candidate_Pictures;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Candidate_Picture']);
					unset($data_value_array);
                } 
            } elseif ($value_array["document_title"] == "Resume") {
					
				if ($Resume) 
				{
					if($display_name == 'agent')
					{
						$Resumes = '../'.$Resume;
					} else {
						$Resumes = $Resume;
					}
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Resume'");
                    $data_value_array["file_name"] = "Resume";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Resumes;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Resume']);
					unset($data_value_array);
				}
            } elseif ($value_array["document_title"] == "Experience_Certificates") {
                
				if ($Experience_Certificates)
				{
					if($display_name == 'agent')
					{
						$Experience_Certificatess = '../'.$Experience_Certificates;
					} else {
						$Experience_Certificatess = $Experience_Certificates;
					}
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Experience_Certificates'");
                    $data_value_array["file_name"] = "Experience_Certificates";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Experience_Certificatess;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Experience_Certificates']);
					unset($data_value_array);
				}
            } elseif ($value_array["document_title"] == "Passport_Documents") {
                
				if ($Passport_Documents) 
				{
					if($display_name == 'agent')
					{
						$Passport_Documentss = '../'.$Passport_Documents;
					} else {
						$Passport_Documentss = $Passport_Documents;
					}
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Passport_Documents'");
                    $data_value_array["file_name"] = "Passport_Documents";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Passport_Documentss;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Passport_Documents']);
					unset($data_value_array);
				}
            }  elseif ($value_array["document_title"] == "ID_Card") {
                
				if ($ID_Card) 
				{
					if($display_name == 'agent')
					{
						$ID_Cards = '../'.$ID_Card;
					} else {
						$ID_Cards = $ID_Card;
					}
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'ID_Card'");
                    $data_value_array["file_name"] = "ID_Card";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $ID_Cards;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['ID_Card']);
					unset($data_value_array);
				}
            }  elseif ($value_array["document_title"] == "Driving_License") {
                
				if ($Driving_License) 
				{
					if($display_name == 'agent')
					{
						$Driving_Licenses = '../'.$Driving_License;
					} else {
						$Driving_Licenses = $Driving_License;
					}
					
					$deletes_exp = $db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id`='$candidate_id' AND `file_name` = 'Driving_License'");
                    $data_value_array["file_name"] = "Driving_License";
                    $data_value_array["candidate_id"] = $candidate_id;
                    $data_value_array['file_path'] = $Driving_Licenses;
					$logo = $db->secure_insert("sm_candidate_files", $data_value_array);
					unset($_SESSION['Driving_License']);
					unset($data_value_array);
				}
            }else {
                continue;
            }
        }
    }
    if (count($emp_docs)) {
        $success_msg = "Values Updated!";
    } else {
        $success_msg = "Error in updation";
    }
}