<?php

session_start();
include("./connection.php");
if(isset($_POST['candi_id'])) 
{
	
	$candi_id = $_POST['candi_id'];
	$employee_code = $_POST['employee_code'];
    //$emp_join_date = $_POST['emp_join_date'];
	$join_date_array = explode("/",$_POST['emp_join_date']);
	$emp_join_date = $join_date_array[2]."-".$join_date_array[1]."-".$join_date_array[0];

	$resCandi = $db->selectQuery("SELECT * FROM `sm_candidate` WHERE `candidate_id`='$candi_id'");
	//echo "<pre>";print_r($resCandi); die;
	if (count($resCandi)) {
		
		//CandidateSalary
		$cand_salary = $db->selectQuery("SELECT `salary` From `sm_selected_candidates` WHERE `candidate_id` = '$candi_id'");
		if(count($cand_salary)>0){
		$candidate_salary = $cand_salary[0]['salary'];
		} else { $candidate_salary = "";}
		//CandidateCompanyId
		$comId = $db->selectQuery("SELECT sm_interview.company_id FROM `sm_candidate_application` LEFT JOIN sm_interview ON sm_candidate_application.interview_id = sm_interview.interview_id WHERE sm_candidate_application.candidate_id = '$candi_id'");
		if(count($comId)>0){
		$companyId = $comId[0]['company_id'];
		} else { $companyId ="";}
		

		$candidate_id = $resCandi[0]['candidate_id'];
		//$candidate_code = $resCandi[0]['candidate_code'];hr_C0077
		$candidate_code = "hr_C0077";
		$agent_code = $resCandi[0]['agent_code'];
		$candidate_added_by = $resCandi[0]['candidate_added_by'];
		$candidate_firstname = $resCandi[0]['candidate_firstname'];
		$candidate_middlename = $resCandi[0]['candidate_middlename'];
		$candidate_lastname = $resCandi[0]['candidate_lastname'];
		$candidate_gender = $resCandi[0]['candidate_gender'];
		$candidate_marital_status = $resCandi[0]['candidate_marital_status'];
		$candidate_dob = $resCandi[0]['candidate_dob'];
		$candidate_doorno = $resCandi[0]['candidate_doorno'];
		$candidate_nationality = $resCandi[0]['candidate_nationality'];
		$candidate_state = $resCandi[0]['candidate_state'];
		$candidate_city = $resCandi[0]['candidate_city'];
		$candidate_zipcode = $resCandi[0]['candidate_zipcode'];
		$candidate_email = $resCandi[0]['candidate_email'];
		$candidate_phone = $resCandi[0]['candidate_phone'];
		$candidate_status = $resCandi[0]['candidate_status'];
		$candidate_interview_status = $resCandi[0]['candidate_interview_status'];
		
		//InsertCandidate Details To EmployeeTable
		
		$values['employee_firstname'] = $candidate_firstname;
		$values['employee_middlename'] = $candidate_middlename;
		$values['employee_lastname'] = $candidate_lastname;
		$values['employee_employment_id'] = $employee_code;
		$values['employee_company'] = $companyId;
		$values['employee_visatype'] = "";//Pending
		$values['employee_fee'] = "";//SponserShip Fee
		$values['employee_salary'] = $candidate_salary;
		$values['employee_designation'] = "";
		$values['employee_nationality'] = $candidate_nationality;
		$values['employee_gender'] = $candidate_gender;
		$values['employee_dob'] = $candidate_dob;
		$values['employee_blood_group'] = "";
		$values['employee_medical_category'] = "Fit";
		$values['employee_telephone'] = $candidate_phone;
		$values['employee_remarks'] = "";
		$values['employee_peraddress1'] = "";
		$values['employee_peraddress2'] = "";
		$values['employee_perdoor'] = "";
		$values['employee_percity'] = "";
		$values['employee_perstate'] = "";
		$values['employee_perzip'] = "";
		$values['employee_resiaddress1'] = "";
		$values['employee_resiaddress2'] = "";
		$values['employee_residoor'] = $candidate_doorno;
		$values['employee_resicity'] = $candidate_city;
		$values['employee_resistate'] = $candidate_state;
		$values['employee_zip'] = $candidate_zipcode;
		$values['employee_email'] = $candidate_email;
		$values['employee_phone'] = $candidate_phone;
		$values['employee_emcontact'] = "";
		$values['employee_receive_newsletter'] = "yes";
		$values['employee_joining_date'] = $emp_join_date;
		$values['sponsor_id'] = $_SESSION['id'];	
		$values['candidate_toemployee'] = "yes";
		$value['candidate_toemployee'] = "Yes";
		$values['employee_status'] = 1;
		$candidateMailId = $db->selectQuery("SELECT `employee_id` From `sm_employee` WHERE `employee_email` = '$candidate_email'");
		//if(count($candidateMailId) < 0){
			$employee_id = $db->secure_insert("sm_employee", $values);
			if (!empty($employee_id)) { //echo "dff".$vale."hai".$val
			$candidate_update = $db->secure_update("sm_candidate", $value, "WHERE `candidate_id` = '$candi_id'");
			$Passport = $Visa = $Qatar = $Health = $Insurance = $Resume = $License = '';
			if(!empty($companyId) && !empty($employee_code))
			{
				$empFiles = $db->selectQuery("SELECT `file_path` FROM `sm_candidate_files` WHERE `candidate_id`='$candi_id' AND `file_status`='1'");
				$qatarId= $db->selectQuery("SELECT `documents_data` FROM `sm_candidate_documents` WHERE `documents_title`='Qatar ID' AND `documents_status`='1' AND `candidate_id`='$candi_id'");
				
				if(!empty($qatarId))
				{
					$QID=$qatarId[0]['documents_data'];
					//echo $QID; 
					//echo $companyId;
				}
				for ($ef = 0; $ef < count($empFiles); $ef++) 
				{
					$images_from_path = $empFiles[$ef]['file_path'];
					// Will copy foo/test.php to bar/test.php
					// overwritting it if necessary
					$empArray = explode("/",$empFiles[$ef]['file_path']);
					$fromSection = $empArray[2];
					if($fromSection == "Passport_Documents")
					{
						$section = "Passport";
						
					} else if($fromSection == "Resume")
					{
						$section = "Resume";
						
					} else if($fromSection == "Candidate_Picture")
					{
						$section = "Profile_Picture";
					}
					if(!empty($section)){
						$folder_name = "emp_uploads/";
						$folder_name .= $companyId . "/" . $QID . "/" . $section . "/";
						
							if (!file_exists($folder_name)) {
								mkdir($folder_name, 0777, true);
							}
						$image_to_path = $folder_name.'/'.$empArray[3];
						if(!empty($image_to_path) && file_exists($image_to_path)){
						copy($images_from_path, $image_to_path);
						} else { exit; }
						
						//FilesInserted
						$data_value_array["employee_id"] = $employee_id;
						$data_value_array["document_id"] = "";//$document_id;
						
						if($fromSection == "Passport_Documents")
						{
							$section = "Passport";
							
							$data_value_array["file_class"] = $section;
							$data_value_array["file_title"] = $section;
							$data_value_array["file_name"] = $image_to_path;	
							$insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
							
						} else if($fromSection == "Resume")
						{
							$section = "Resume";
							
							$data_value_array["file_class"] = $section;
							$data_value_array["file_title"] = $section;
							$data_value_array["file_name"] = $image_to_path;
							$insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
							
						} else if($fromSection == "Candidate_Picture")
						{
							$section = "Picture";
							
							$data_value_array["file_class"] = $section;
							$data_value_array["file_title"] = $section;
							$data_value_array["file_name"] = $image_to_path;
							$insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
						}
						
					} else { exit; }
				}
			} else { exit; }
				
					
				echo "Employee added successfully";
			}
		/*} else {
			echo "Employee Already Exist";
		}*/
	}

}

/*
$sponsor_id = $_SESSION['id'];
$Passport = $Visa = $Qatar = $Health = $Insurance = $Resume = '';
if (isset($_SESSION['Passport'])) {
    $Passport1 = $_SESSION['Passport'];
    $Passport = implode(",", $Passport1);
}
if (isset($_SESSION['Visa'])) {
    $Visa1 = $_SESSION["Visa"];
    $Visa = implode(",", $Visa1);
}
if (isset($_SESSION['Qatar'])) {
    $Qatar = implode(",", $_SESSION["Qatar"]);
}
if (isset($_SESSION['Health'])) {
    $Health1 = $_SESSION["Health"];
    $Health = implode(",", $Health1);
}
if (isset($_SESSION['Insurance'])) {
    $Insurance1 = $_SESSION["Insurance"];
    $Insurance = implode(",", $Insurance1);
}
if (isset($_SESSION['Resume'])) {
    $Resume = implode(",", $_SESSION["Resume"]);
}
if (isset($_POST['depend_num'])) {
    $depend_num = $_POST['depend_num'];
}
if (isset($_SESSION['Profile_Picture'])) {
    $Profile_Picture = implode(",", $_SESSION['Profile_Picture']);
} */


/*
$visa_end = "";
$visa_num = "";
$visa_start = "";
$pass_end = "";
$pass_num = "";
$pass_start = "";
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address21 = $_POST['address21'];
$address22 = $_POST['address22'];
$city = $_POST['city'];
$city2 = $_POST['city2'];
$company = $_POST['company'];
$dnumber = $_POST['dnumber'];
$dnumber2 = $_POST['dnumber2'];
$dob = $_POST['dob'];
$doj1 = $_POST['doj'];
$em_contact = $_POST['em_contact'];
$email = $_POST['email'];
$employee_com_id = $_POST['employee_com_id'];
$employee_designation = $_POST['employee_designation'];
$employee_salary = $_POST['employee_salary'];
$employee_fee = $_POST['employee_fee'];
$first_name = $_POST['first_name'];
$gender = $_POST['gender'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$nationality = $_POST['nationality'];
$phone = $_POST['phone'];
$remarks = $_POST['remarks'];
$state = $_POST['state'];
$state2 = $_POST['state2'];
$visa_type = $_POST['visa_type'];
$zip = $_POST['zip'];
$zip2 = $_POST['zip2'];
$values = array();
$values['employee_firstname'] = $first_name;
$values['employee_middlename'] = $middle_name;
$values['employee_lastname'] = $last_name;
$values['employee_employment_id'] = $employee_com_id;
$values['employee_company'] = $company;
$values['employee_visatype'] = $visa_type;
$values['employee_fee'] = $employee_fee;
$values['employee_salary'] = $employee_salary;
$values['employee_designation'] = $employee_designation;
$values['employee_nationality'] = $nationality;
$values['employee_gender'] = $gender;
$values['employee_dob'] = $dob;
$values['employee_remarks'] = $remarks;
$values['employee_peraddress1'] = $address1;
$values['employee_peraddress2'] = $address2;
$values['employee_perdoor'] = $dnumber;
$values['employee_percity'] = $city;
$values['employee_perstate'] = $state;
$values['employee_perzip'] = $zip;
$values['employee_resiaddress1'] = $address21;
$values['employee_resiaddress2'] = $address22;
$values['employee_residoor'] = $dnumber2;
$values['employee_resicity'] = $city2;
$values['employee_resistate'] = $state2;
$values['employee_zip'] = $zip2;
$values['employee_email'] = $email;
$values['employee_phone'] = $phone;
$values['employee_emcontact'] = $em_contact;
$values['employee_receive_newsletter'] = "yes";
$explode_doj = explode('/', $doj1);

$values['employee_joining_date'] = $explode_doj[2] . "-" . $explode_doj[1] . "-" . $explode_doj[0];
$values['sponsor_id'] = $sponsor_id;
$employee_id = $db->secure_insert("sm_employee", $values);
if (!empty($employee_id)) {
    echo "Employee added successfully";
}
if (!empty($Profile_Picture)) {
    $clogoArray = array();
    $clogoArray['employee_id'] = $employee_id;
    $clogoArray['file_name'] = $Profile_Picture;
    $clogoArray['file_title'] = 'Profile_Picture';
    $dp = $db->secure_insert("sm_employee_files", $clogoArray);
    unset($_SESSION['Profile_Picture']);
}
if (!empty($Resume)) {
    $resumeArray = array();
    $resumeArray['employee_id'] = $employee_id;
    $resumeArray['file_name'] = $Resume;
    $resumeArray['file_title'] = 'Resume';
    $resumeArray["file_class"] = 'Resume';
    $dp = $db->secure_insert("sm_employee_files", $resumeArray);
    unset($_SESSION['Resume']);
}
if (isset($_POST["depen"])) {
    $depen = $_POST["depen"];
    $counter = count($depen);
    foreach ($depen as $dkey => $keyval) {
        $dep_new = array_merge($keyval, array("employee_id" => $employee_id));
        $insert_depend = $db->secure_insert("sm_dependant", $dep_new);
        $values1 = array();
    }
}
if (isset($_POST["emp_docs"])) {
    $emp_docs = array_values($_POST["emp_docs"]);
    foreach ($emp_docs as $key => $value_array) {
        $value_array["document_title"] = preg_replace('/\bNo\b/', '', $value_array["document_title"]);
        $className = "";
        $s_date = $value_array['document_start_date'];
        $explode_s_date = explode("/", $s_date);
        $value_array['document_start_date'] = $explode_s_date[2] . "-" . $explode_s_date[1] . "-" . $explode_s_date[0];
        $e_date = $value_array['document_end_date'];
        $explode_e_date = explode("/", $e_date);
        $value_array['document_end_date'] = $explode_e_date[2] . "-" . $explode_e_date[1] . "-" . $explode_e_date[0];
        $employee_documents = array_merge($value_array, array("employee_id" => $employee_id));
        $document_id = $db->secure_insert("sm_employee_documents", $employee_documents);
        $data_value_array = array();
        if ($value_array["document_title"] == "Qatar ID") {
            if (empty($Qatar)) {
                continue;
            }
            $data_value_array["file_name"] = $Qatar;
            $className = "Qatar";
            unset($_SESSION['Qatar']);
        } elseif ($value_array["document_title"] == "Health Card ") {
            if (empty($Health)) {
                continue;
            }
            $data_value_array["file_name"] = $Health;
            $className = "Health";
            unset($_SESSION['Health']);
        } elseif ($value_array["document_title"] == "Insurance ") {
            if (empty($Insurance)) {
                continue;
            }
            $data_value_array["file_name"] = $Insurance;
            $className = "Insurance";
            unset($_SESSION['Insurance']);
        } elseif ($value_array["document_title"] == "Passport ") {
            if (empty($Passport)) {
                continue;
            }
            $data_value_array["file_name"] = $Passport;
            $className = "Passport";
            unset($_SESSION['Passport']);
        } elseif ($value_array["document_title"] == "Visa ") {
            if (empty($Visa)) {
                continue;
            }
            $data_value_array["file_name"] = $Visa;
            $className = "Visa";
            unset($_SESSION['Visa']);
        } else {
            continue;
        }

        $data_value_array["employee_id"] = $employee_id;
        $data_value_array["document_id"] = $document_id;
        $data_value_array["file_class"] = $className;
        $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
        unset($data_value_array);
    }
}
unset($_SESSION['Qatar']);
unset($_SESSION['Health']);
unset($_SESSION['Insurance']);
unset($_SESSION['Passport']);
unset($_SESSION['Visa']);
unset($_SESSION['Resume']);
unset($_SESSION['Profile_Picture']);
*/