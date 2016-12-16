<?php
include('connection.php');
session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}

if(isset($_REQUEST['id']) && isset($_REQUEST['invoice_result']))
{
		$id	= $_REQUEST['id'];
		echo $id;
		$invoice_result	= $_REQUEST['invoice_result'];
		$val['current_status'] = $invoice_result;
			if($invoice_result == "completed"){
				   
				// $file = $_FILES['file-0'];
				 //$filename = $file['name'];
				$extensions = array("png", "jpg", "pdf", "doc", "docx");
				$data_ready = 1;
				$sesVal = array();
				$folder_name = "Invoice/Hiring_Invoice/";

				if ($data_ready == 1) {
			for ($i = 0; $i < $numf; $i++) {
			$file_new_name = "";
			$filename = "";
			$file = $_FILES['file-' . $i];
			$filename_org = $file['name'] . ", ";
			$filename = str_replace(' ', '', $file['name']);
			if ($filename != "") {
				$uniqid = uniqid();
				$filename = $uniqid . $filename;
				
				  if(!file_exists($folder_name))
				  {
					  mkdir($folder_name,0777,true);
				  }
				   $file_new_name = "";
				   $file_new_name = $folder_name . $filename;
					 move_uploaded_file($file['tmp_name'], $folder_name."/" . $filename);
					
								 }
			


				 // $selectCandCode = $db->selectQuery("select `candidate_code` from `sm_candidate` where `candidate_id`='$candidate_id'");
				// $candidate_code = $selectCandCode[0]['candidate_code'];
			
				
				
				$values1 = array();
				$values1["invoices"] = $file_new_name;
				$values1["provider_id"] = $id;
				
				$deletes_exp = $db->executeQuery("DELETE FROM `sm_hiring_requirment_invoices` WHERE `provider_id`='$id'");
				
				$insert = $db->secure_insert("sm_hiring_requirment_invoices", $values1);
				
				
			if(!empty($insert)){
				echo "Invoices Inserted Successfully";
			}
					}
					
				}
			
				
			   }
			   
			   $update = $db->secure_update("sm_hiring_requirment_add", $val, "WHERE `id`='$id'");
}
?>