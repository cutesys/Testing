<?php
include("connection.php");

if (isset($_POST['worksite']) && isset($_POST['resources'])) {
	//echo"hai";
    $value_array = array();
    $req = $_POST["req"];
	//print_r($_POST); die;
	//echo $_POST['date_from']; die;
	 $result=array();
	$edit_id = $_POST['edit_id'];
			$value['requirement']=$_POST['requirement'];
		$value['worksite']=$_POST['worksite'];
		$value['resources']=$_POST['resources'];
		
		//$value['date_from'] = $_POST['exp_date_from'];
		
		
		//$value['date_to']= $_POST['exp_date_to'];
		
		
		/*$originalDate1                = explode("-",$_POST['date_from']);
           $hiring_requirment_date_from      = $originalDate1[2]."-".$originalDate1[1]."-".$originalDate1[0];
		
			$value['date_from']=$hiring_requirment_date_from ;
			
					 $originalDate2                = explode("-",$_POST['date_to']);
           $hiring_requirment_date_to      = $originalDate2[2]."-".$originalDate2[1]."-".$originalDate2[0];
			
		$value['date_to']=$hiring_requirment_date_to; */
		
		
		//$hiring_requirment_id = $db->secure_insert("sm_hiring_requirment", $value);
		//echo $hiring_requirment_id;
		if(!empty($edit_id)){ //echo "<pre>";print_r($req); die; 
		
			//echo "<pre>";print_r($req); die;
			 foreach ($req as $key => $value_array) {
				 
				 $originalDate1  = explode("/",$value_array['date_from']);
				$db_date_from= $originalDate1[2]."-".$originalDate1[1]."-".$originalDate1[0];
				$originalDate2  = explode("/",$value_array['date_to']);
				$db_date_to= $originalDate2[2]."-".$originalDate2[1]."-".$originalDate2[0];
				 $cid=$value_array['cid'];
				$value_arrays['provider']=$value_array['provider'];
				$value_arrays['job']=$value_array['job'];
				 $value_arrays['category']=$value_array['category'];
				$value_arrays['resource_no']=$value_array['resource_no'];
				//$date_from=$value_array['date_from'];
			    //$date_to=$value_array['date_to'];
				//echo $value_arrays['date_from']=$value_array['date_from']; echo "<br>";
				//echo $value_arrays['date_to']=$value_array['date_to'];
			$value_arrays['date_from']=$db_date_from; 
			 $value_arrays['date_to']=$db_date_to;
			
			
				
				 
				$query1 = $db->secure_update('sm_hiring_requirment_add', $value_arrays, "  WHERE  id = '$cid' ");
				
				}
				
				echo "<script>window.location = 'accounts_hiring_requirment_list.php'</script>";
				// echo"Added Successfully";
		}
		//echo json_encode($result);
		}






//print_r($_POST); die;
//echo $uid;
/*

		$provider                    =   $_POST['provider'];
		$job             =   $_POST['job'];
		$category            =   $_POST['category'];
	    $resource_no          =   $_POST['resource_no'];
		$date_from            =   $_POST['date_from'];
	    $date_to          =   $_POST['date_to'];
		$values=array();
		$values["worksite"] 	           = $worksite;
				$values["resources"] 	   = $resources;
				$values["From"]       = $From;
				$values["To"] 	   = $To;
		$update = $db->secure_update("sm_hiring_requirment", $values, "WHERE id ='$type_id'" );
				
					       
    
        


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

		}*/
?>