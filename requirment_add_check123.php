<?php

include('connection.php');
//print_r($_POST); die;
if (isset($_POST['worksite']) && isset($_POST['resources'])) {
	//echo"hai";
    $value_array = array();
    $req = $_POST["req"];
	//print_r($_POST); die;
	//echo $_POST['date_from']; die;
	 $result=array();
  
		$value['requirement']=$_POST['requirment'];
		$value['worksite']=$_POST['worksite'];
		$value['resources']=$_POST['resources'];
		
		//$value['date_from'] = $_POST['date_from'];
		//$value['date_to']= $_POST['date_to'];
		
		
	 $originalDate1                = explode("/",$_POST['hir_date_from']);
           $hiring_requirment_date_from      = $originalDate1[2]."-".$originalDate1[1]."-".$originalDate1[0];
		
			$value['date_from']=$hiring_requirment_date_from ;
			
					 $originalDate2                = explode("/",$_POST['hir_date_to']);
           $hiring_requirment_date_to      = $originalDate2[2]."-".$originalDate2[1]."-".$originalDate2[0];
			
		$value['date_to']=$hiring_requirment_date_to;
		
		
		$hiring_requirment_id = $db->secure_insert("sm_hiring_requirment", $value);
		//echo $hiring_requirment_id;
		if(!empty($hiring_requirment_id)){ //echo "<pre>";print_r($req); die; 
			 foreach ($req as $key => $value_array) {
				$value_arrays['provider']=$value_array['provider'];
				$provider=$value_array['provider'];
				$value_arrays['job']=$value_array['job'];
				$job=$value_array['job'];
				 $value_arrays['category']=$value_array['category'];
				 $category=$value_array['category'];
				$value_arrays['resource_no']=$value_array['resource_no'];
				$resource_no=$value_array['resource_no'];
				 $date_from=$value_array['date_from'];
				 $date_to=$value_array['date_to'];
				 $value_arrays['hiring_requirment_id'] = $hiring_requirment_id;
				 //explode("/", $date_from);
				 
			
				 
				$join_date_from = explode("/", $date_from);
				$join_from = $join_date_from[2]."-".$join_date_from[1]."-".$join_date_from[0];
				$value_arrays['date_from'] = $join_from;
				
				$join_date_to = explode("/", $date_to);
				$join_to = $join_date_to[2]."-".$join_date_to[1]."-".$join_date_to[0];
				$value_arrays['date_to'] = $join_to;
			
				$check_id =$db->selectQuery("select * from `sm_hiring_requirment_add` WHERE `provider`='$provider' AND `job`='$job'AND `category`='$category' AND  `resource_no`='$resource_no' AND `date_from`='$join_from' AND  `date_to`='$join_to' AND `status`='1'");
				
				if(!empty($check_id))
				{ echo "0";die; 
			
					array_push($result,"0");
					
				}
				else{ // echo "not";  die;
				$insert=$db->secure_insert("sm_hiring_requirment_add", $value_arrays);
				if($insert>0)
				{
					//unset($value_array);
					unset($value_arrays);
					echo "added successfully";
					//header("location:hiring_requirment_list.php");
					//echo "<script> </script>";
				}
				//array_push($result, "1");
				//unset($value_array);
					 
				
				
			  
				}
				}
				// echo"Added Successfully";
		}
    
     }
?>
