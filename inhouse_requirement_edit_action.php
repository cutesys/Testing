<?php
include("connection.php");
//print_r($_POST); die;
//echo $uid;


		$title                    =   $_POST['title'];
		$work_site_id             =   $_POST['work_site_id'];
		$work_location            =   $_POST['work_location'];
	    $project_manager          =   $_POST['project_manager'];
		$contact                  =   $_POST['contact'];
		$id                       =   $_POST['id'];
		
		

		
		$values=array();
		
		        $values["title"] 	           = $title;
				$values["work_site_id"] 	   = $work_site_id;
				$values["work_location"]       = $work_location;
				$values["project_manager"] 	   = $project_manager;
		        $values["contact"] 	           = $contact;
				
				  

				$update = $db->secure_update("sm_inhouse_requirement", $values, "WHERE id ='$id'" );
				
					       
    
        


if (isset($_POST['requirement'])) {
    $requirement = $_POST["requirement"];
	$db->executeQuery("DELETE FROM `sm_requirements` WHERE `id` ='$id'");
    foreach ($requirement as $key => $value_array) {
		//print_r($value_array['date_assign_from']); die;
        if (!empty($value_array['date_assign_from'])) {
			
            $date_assign_from = explode("/", $value_array['date_assign_from']);
            $date_assign_from1 = $date_assign_from[2] . "-" . $date_assign_from[1] . "-" . $date_assign_from[0];
        } else {
            $date_assign_from1 = "";
        }
        $value_array['date_assign_from'] = $date_assign_from1;
        if (!empty($value_array['date_assign_to'])) {
            $date_assign_to = explode("/", $value_array['date_assign_to']);
            $date_assign_to1 = $date_assign_to[2] . "-" . $date_assign_to[1] . "-" . $date_assign_to[0];
        } else {
            $date_assign_to1 = "";
        }
        $value_array['date_assign_to'] = $date_assign_to1;
        $requirement_vals = array_merge($value_array, array("id" => $id));
        $requirement_id = $db->secure_insert("sm_requirements", $requirement_vals);
        unset($value_array);
    }
}

if (count($requirement_id)) {

			$success_msg = "Values Updated!";

			echo "<script>location.href='inhouse_requirement_list.php'</script>";

		}
?>