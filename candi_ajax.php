<?php

include("connection.php");

$Passport_Documents = $Experience_Certificates = $Resume = $Profile_Picture = '';
if (isset($_SESSION['Passport_Documents'])) {
    $Passport_Documents = implode(",", $_SESSION['Passport_Documents']);
}
if (isset($_SESSION['Experience_Certificates'])) {
    $Experience_Certificates = implode(",", $_SESSION["Experience_Certificates"]);
}
if (isset($_SESSION['Resume'])) {
    $Resume = implode(",", $_SESSION["Resume"]);
}
//$agent_code = $_POST['agent_code'];
$candidate_nationality = $_POST['candidate_nationality'];
$candidate_city = $_POST['candidate_city'];
//$candidate_interview = $_POST['candidate_interview'];
//$candidate_code = $_POST['candidate_code'];
$candidate_dob1 = new DateTime($_POST['candidate_dob']);
$candidate_dob = $candidate_dob1->format('Y-m-d');
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
//$values['candidate_code'] = $candidate_code;
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
$candidate_id = $db->secure_insert("sm_candidate", $values);
if (!empty($Profile_Picture)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = $Company_Logo;
    $clogoArray['file_path'] = 'Profile_Picture';
    $logo = $db->secure_insert("sm_candidate_files", $clogoArray);
    unset($_SESSION['Company_Logo']);
    unset($clogoArray);
}
if (!empty($Resume)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = "Resume";
    $clogoArray['file_path'] = $Resume;
    $logo = $db->secure_insert("sm_candidate_files", $clogoArray);
    unset($_SESSION['Resume']);
    unset($clogoArray);
}
if (!empty($Experience_Certificates)) {
    $clogoArray = array();
    $clogoArray['candidate_id'] = $candidate_id;
    $clogoArray['file_name'] = "Experience_Certificates";
    $clogoArray['file_path'] = $Experience_Certificates;
    $logo = $db->secure_insert("sm_candidate_files", $clogoArray);
    unset($_SESSION['Experience_Certificates']);
    unset($clogoArray);
}
if (!empty($candidate_id)) {
	$result = array($candidate_id);
		echo json_encode($result);
		//$candi_id = $_SESSION['candidate_id'];
		$_SESSION['candidate_id'] = $candidate_id;
        echo "Success";
}
if (isset($_POST['qualification'])) {
    $value_array = array();
    $qualification = $_POST["qualification"];
    foreach ($qualification as $key => $value_array) {
        $qualification_vals = array_merge($value_array, array("candidate_id" => $candidate_id));
        $qualification_id = $db->secure_insert("sm_candidate_qualifications", $qualification_vals);
        unset($value_array);
    }
}
//echo "<pre>"; print_r($_POST['application']); die;
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
        $application_id = $db->secure_insert("sm_candidate_application", $application_vals);
        unset($value_array1);
    }
}
if (isset($_POST['experience'])) {
    $value_array = array();
    $experience = $_POST["experience"];
    foreach ($experience as $key => $value_array) {
		if(!empty($value_array['experience_from'])){
        $from_date1 = explode("/", $value_array['experience_from']);
        $from_date = $from_date1[2] . "-" . $from_date1[1] . "-" . $from_date1[0];
        $value_array['experience_from'] = $from_date;
		}
		else
		{
			$value_array['experience_from'] = "";
		}
		if(!empty($value_array['experience_from'])){
        $to_date1 = explode("/", $value_array['experience_to']);
        $to_date = $to_date1[2] . "-" . $to_date1[1] . "-" . $to_date1[0];
        $value_array['experience_to'] = $to_date;
		}
		else
		{
			$value_array['experience_to'] = "";
		}
        $experience_vals = array_merge($value_array, array("candidate_id" => $candidate_id));
        $experience_id = $db->secure_insert("sm_candidate_experience", $experience_vals);
        unset($value_array);
    }
}
if (isset($_POST['documents'])) {
    $document_array = array();
    $documents = $_POST['documents'];
    foreach ($documents as $key => $document_array) {
        $document_vals = array_merge($document_array, array("candidate_id" => $candidate_id));
        $document_id = $db->secure_insert("sm_candidate_documents", $document_vals);
        //unset($document_array);
        if ($document_array["documents_title"] == "Passport") {
            if (empty($Passport_Documents)) {
                continue;
            }
            $data_value_array["file_name"] = $Passport_Documents;
            $data_value_array['file_title'] = 'Passport_Documents';
            unset($_SESSION['Passport_Documents']);
        } else {
            continue;
        }

        $data_value_array['candidate_id'] = $candidate_id;
        $data_value_array["documents_id"] = $document_id;
        $file_id = $db->secure_insert("sm_candidate_files", $data_value_array);
		
        unset($data_value_array);
    }
}

		
		//$_SESSION['candidate_id'] = $candidate_id;
?>