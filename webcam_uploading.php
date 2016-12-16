<?php
session_start();
include 'connection.php';
//$name = date('YmdHis');
//$newname="images/".$name.".jpg";
$_SESSION['cand_id'];
$_SESSION['candidate_code'];
//$_SESSION['candidate_code'] = 'IndMu003_C0028';
$_SESSION["Candidate_Picture"] = "";
$folder_name = "candidate_uploads/";
if ((isset($_SESSION['candidate_code']))) {
    $candidate_folder = $_SESSION['candidate_code']; 
    $folder_name .= $candidate_folder . "/" . "Candidate_Picture" . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
    //$file_name = '/webcam' . md5(time()) . rand(383, 1000) . '.jpg';
	$file_name = md5(time()) . rand(383, 1000) . '.jpg';
    $file_new_name = $folder_name . $file_name;
	//move_uploaded_file($_FILES['webcam']['tmp_name'], $file_new_name);
   // $_SESSION["Candidate_Picture"] = "candidate_uploads/" . $candidate_folder . "/" . "Candidate_Picture" . $file_name;
	$_SESSION["Candidate_Picture"] = $file_new_name;
	//echo $_SESSION["Candidate_Picture"]; die;
	
$file = file_put_contents($_SESSION["Candidate_Picture"], file_get_contents('php://input') );
if (!$file) {
	print "ERROR: Failed to write data to $file_name, check permissions\n";
	exit();
}
else
{
    // $sql="Insert into sm_candidate_files(file_name,file_path,file_status,documents_id,candidate_id) values('Candidate_Picture','".$_SESSION["Candidate_Picture"]."','1','0','17')";
    // $result=mysqli_query($con,$sql)
            // or die("Error in query");
    // $value=mysqli_insert_id($con);
    // $_SESSION["myvalue"]=$value;
	
	$display_name = ""; 
	$select_name = $db->selectQuery("SELECT `candidate_added_by` FROM `sm_candidate` WHERE `candidate_id`='".$_SESSION['cand_id']."'");
	if(!empty($select_name))
	{
		$display_name = $select_name[0]['candidate_added_by'];
	}
	
	if($display_name == 'agent')
	{
		$Candidate_filepath = '../'.$_SESSION["Candidate_Picture"];
	} else {
		$Candidate_filepath = $_SESSION["Candidate_Picture"];
	}
		
	
	$value['file_name'] = 'Candidate_Picture';
	//$value['file_path'] = $_SESSION["Candidate_Picture"];
	$value['file_path'] = $Candidate_filepath;
	$value['file_status'] = '1';
	$value['documents_id'] = '0';
	$value['candidate_id'] = $_SESSION['cand_id'];
	$db->executeQuery("DELETE FROM `sm_candidate_files` WHERE `candidate_id` = '".$_SESSION['cand_id']."' AND `file_name` = '".$value['file_name']."'");
	$company_id = $db->secure_insert("sm_candidate_files", $value);
}
}
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $Candidate_filepath;
print "$url\n";

?>
