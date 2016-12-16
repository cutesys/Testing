<?php

include('connection.php');

if (isset($_POST['visa'])) {
    $value_array = array();
    $visa = $_POST["visa"];
$result=array();	 
    foreach ($visa as $key => $value_array) {
		$visa_cat=$value_array['visa_category'];
		$visa_type=$value_array['visa_category_type'];
		
        $check_id =$db->selectQuery("select * from sm_visa_category where visa_category='$visa_cat' and visa_category_type='$visa_type' and visa_category_status='1'");
		

		if(count($check_id)>0)
		{   
			
			array_push($result,"0");			
			
			
		}
		else
		{
         $db->secure_insert("sm_visa_category", $value_array);
		
			
		array_push($result, "1");
        unset($value_array);
		}		
		}
		echo json_encode($result); 
    }

?>
