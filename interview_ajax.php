<?php
//echo "<pre>";print_r($_POST); die;
include("connection.php");
$interview_auto_id = $_POST['interview_auto_id'];
$interview_company = $_POST['interview_company'];
$interview_country = $_POST['interview_country'];
$interview_date_from1 = explode("/", $_POST['interview_date_from']);
if(!empty($interview_date_from1)){
$interview_date_from = @$interview_date_from1[2] . "-" . @$interview_date_from1[1] . "-" . @$interview_date_from1[0];
} 
$interview_date_to2 = explode("/", $_POST['interview_date_to']);
if(!empty($interview_date_to2)){
$interview_date_to = @$interview_date_to2[2] . "-" . @$interview_date_to2[1] . "-" . @$interview_date_to2[0];
}
$interview_interviewer = $_POST['interview_interviewer'];
$interview_name = $_POST['interview_name'];
$interview_place = $_POST['interview_place'];
$interview_state = $_POST['interview_state'];
$interview_status = $_POST['interview_status'];
$interview_time_from = $_POST['interview_time_from'];
$interview_time_to = $_POST['interview_time_to'];

$values = array();
$auto_id_select1 = $db->secure_select("SELECT `interview_id`,`interview_auto_id` FROM `sm_interview` ORDER BY `interview_id` DESC LIMIT 1", "WHERE `interview_auto_id`='$interview_auto_id'");
if (count($auto_id_select1) > 0) {
    $selected_interview_id = $auto_id_select1[0]['interview_id'];
    $incremented_id = $selected_interview_id + 1;
    $generate_auto_id = str_pad($incremented_id, 5, '0', STR_PAD_LEFT);
} else {
    $generate_auto_id = $interview_auto_id;
}
$values['interview_auto_id'] = $generate_auto_id;
$values['company_id'] = $interview_company;
$values['interview_country'] = $interview_country;
$values['interview_date_from'] = $interview_date_from;
$values['interview_date_to'] = $interview_date_to;
$values['interview_interviewer'] = $interview_interviewer;
$values['interview_name'] = $interview_name;
$values['interview_place'] = $interview_place;
$values['interview_state'] = $interview_state;
$values['interview_status'] = $interview_status;
$values['interview_time_from'] = $interview_time_from;
$values['interview_time_to'] = $interview_time_to;
$interview_id = $db->secure_insert("sm_interview", $values);
if (!empty($interview_id)) {
    echo "Successful";
}
unset($values);
if (isset($_POST['qualification'])) {
    $qualification = $_POST["qualification"];
    foreach ($qualification as $key => $value_array) {
        $qualification_vals = array_merge($value_array, array("interview_id" => $interview_id));
        $qualification_id = $db->secure_insert("sm_interview_qualifications", $qualification_vals);
        unset($value_array);
    }
}

if (isset($_POST['requirement'])) {
		$requirement = $_POST['requirement'];
		//$requirements_skills= array();
		$skill_array= array();
		foreach ($requirement as $req => $value_requir) {
			//print_r($value_requir['requirements_skills']); die;
			if(!empty($value_requir['requirements_skills'])){
				$skill_array = $value_requir['requirements_skills'];
				$skills = implode(',', $skill_array);	
			} else {
				$skills = "";
			}
			$array_full = array_merge($value_requir, array("requirements_skils" => $skills));
			unset($array_full['requirements_skills']);
			$requirement_values = array_merge($array_full, array("interview_id" => $interview_id));  
			$requirement_id = $db->secure_insert("sm_interview_requirements", $requirement_values);
			unset($value_requir);
		}
}




