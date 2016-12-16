<?php
include('connection.php');
if (isset($_POST['qual'])) 
{
	$value_array = array();
$qual = $_POST['qual'];
$result = array();
foreach ($qual as $key => $value_array) 
{		     
   $qual_name=$value_array['qualification_name'];				
 			
   $check_id =$db->selectQuery("select * from sm_recruit_qualification WHERE `qualification_name`='$qual_name' AND `qualification_status`='1'");
   if(count($check_id)>0)		
   {	
   array_push($result,"0");					
   }	
   else{     		
   $db->secure_insert("sm_recruit_qualification", $value_array);	
   array_push($result, "1");			
   unset($value_array);			 
   }      
   }       
   echo json_encode($result);    
   }?>