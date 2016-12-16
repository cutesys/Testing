<?php
//echo "<pre>";print_r($_POST); die;
include("connection.php");
//echo "<pre>"; print_r($_POST['requirement']); die;
//$interview_auto_id = $_POST['interview_auto_id'];
$interview_company = $_POST['interview_company'];
$interview_country = $_POST['interview_country'];
$interview_date_from1 = explode("/", $_POST['interview_date_from']);

$interview_date_from = $interview_date_from1[2] . "-" . $interview_date_from1[1] . "-" . $interview_date_from1[0];

$interview_date_to2 = explode("/", $_POST['interview_date_to']);

$interview_date_to = $interview_date_to2[2] . "-" . $interview_date_to2[1] . "-" . $interview_date_to2[0];
$interview_interviewer = $_POST['interview_interviewer'];
$interview_name = $_POST['interview_name'];
$interview_place = $_POST['interview_place'];
$interview_state = $_POST['interview_state'];
$interview_status = $_POST['interview_status'];
$interview_time_from = $_POST['interview_time_from'];
$interview_time_to = $_POST['interview_time_to'];
$interview_id = $_POST['interview_id'];

$values = array();

//$values['interview_auto_id'] = $generate_auto_id;
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
$update_interview = $db->secure_update("sm_interview", $values, "WHERE `interview_id`='$interview_id'");
if (!empty($interview_add)) {
    echo "Successful";
}
unset($values);
if (isset($_POST['qualification'])) {	
    $qualification = $_POST["qualification"];//	print_r($qualification); die;
	 $db->executeQuery("DELETE FROM `sm_interview_qualifications` WHERE `interview_id` ='$interview_id'");
    foreach ($qualification as $key => $value_array) {
        $qualification_vals = array_merge($value_array, array("interview_id" => $interview_id));
        //$qualification_id = $db->secure_update("sm_interview_qualifications", $qualification_vals, "WHERE `interview_id`='$interview_id'");
        $requirement_id = $db->secure_insert("sm_interview_qualifications", $qualification_vals);
		unset($value_array);
    }
}
/*if (isset($_POST['requirement'])) {
    $requirement = $_POST['requirement'];
	//echo "<pre>";print_r($requirement); die;
	//$skill_implode = implode('([',$requirement);
    foreach ($requirement as $req => $value_requir) {
        $requirement_values = array_merge($value_requir, array("interview_id" => $interview_id));
        $requirement_id = $db->secure_update("sm_interview_requirements", $requirement_values, "WHERE `interview_id`='".$interview_id."'");
		unset($value_requir);
    }
	if (count($requirement_id)) {

        $success_msg = "Values Updated!";

        echo "<script>location.href='interview.php'</script>";

    }
}*/

if (isset($_POST['requirement'])) {
    $requirement = $_POST['requirement'];	//print_r($requirement); die;
	
	//if (isset($_POST['interview_id'])) {
   // $interview_id = $_POST['interview_id'];
    //$values = array();
   // $values['interview_status'] = "Inactive";
    //$delete_interview = $db->secure_update("sm_interview_requirements", $values, "WHERE `interview_id`='$interview_id'");
   $db->executeQuery("DELETE FROM `sm_interview_requirements` WHERE `interview_id` ='$interview_id'");
   // unset($values);
    //if (!empty($delete_interview)) {
		//echo "<pre>"; print_r($requirement); die;
		$skill_array= array();
		$skills = '';
		foreach ($requirement as $req => $value_requir) {
			//print_r($value_requir['requirements_skills']); die;
			if(!empty($value_requir['requirements_skills'])){
				$skill_array = $value_requir['requirements_skills'];
				$skills = implode(',', $skill_array);	
			} 
			$array_full = array_merge($value_requir, array("requirements_skils" => $skills));
			unset($array_full['requirements_skills']);
			$requirement_values = array_merge($array_full, array("interview_id" => $interview_id)); 			//echo "<pre>";print_r($requirement_values); die;
			$requirement_id = $db->secure_insert("sm_interview_requirements", $requirement_values);
			unset($value_requir);
		}
	
		if (count($requirement_id)) {

			$success_msg = "Values Updated!"; 

			echo "<script>location.href='interview.php'</script>";

		}
    //}
	//}
	
   
} 
