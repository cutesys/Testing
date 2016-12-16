<?php
include("connection.php");
//print_r($_POST); die;
//echo $uid;


		$requirement                    =   $_POST['requirements'];
		$client             =   $_POST['client'];
		$email            =   $_POST['email'];
	    $id                       =   $_POST['id'];
		

		
		$values=array();
		
		        $values["requirement"] 	           = $requirement;
				$values["client"] 	   = $client;
				$values["email"]       = $email;
				
				  

				$update = $db->secure_update("sm_external_demands", $values, "WHERE id ='$id'" );
				
					       
    
        


if (isset($_POST['requirement'])) {
    $requirement = $_POST["requirement"];
	$db->executeQuery("DELETE FROM `sm_external_requirment` WHERE `id` ='$id'");
    foreach ($requirement as $key => $value_array) {
		//print_r($value_array['date_assign_from']); die;
        if (!empty($value_array['hiring_requirment_date_from'])) {
			
            $date_assign_from = explode("/", $value_array['hiring_requirment_date_from']);
            $date_assign_from1 = $date_assign_from[2] . "-" . $date_assign_from[1] . "-" . $date_assign_from[0];
        } else {
            $date_assign_from1 = "";
        }
        $value_array['hiring_requirment_date_from'] = $date_assign_from1;
        if (!empty($value_array['hiring_requirment_date_to'])) {
            $date_assign_to = explode("/", $value_array['hiring_requirment_date_to']);
            $date_assign_to1 = $date_assign_to[2] . "-" . $date_assign_to[1] . "-" . $date_assign_to[0];
        } else {
            $date_assign_to1 = "";
        }
        $value_array['hiring_requirment_date_to'] = $date_assign_to1;
        $requirement_vals = array_merge($value_array, array("id" => $id));
        $requirement_id = $db->secure_insert("sm_external_requirment", $requirement_vals);
        unset($value_array);
    }
}
//echo  "haiii".$requirement_id; 
if (!empty($requirement_id)) { //echo "add";

			$success_msg = "Values Updated!";

			echo "<script>location.href='external_requirement_list.php'</script>";

		} else { echo "up"; }
?>