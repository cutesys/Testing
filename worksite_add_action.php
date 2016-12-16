<?php
include('connection.php');

if(isset($_POST['work_site'])&&($_POST['site_location'])) {
		$work_site = $_POST['work_site'];
		$site_location = $_POST['site_location'];
       // $values = array();
        if ($work_site != "" && $site_location != "") {
	
           // $result = array();
            $check = $db->selectQuery("SELECT `id` FROM `sm_work_site` WHERE `work_site`='$work_site' AND `site_location`='$site_location'");
            if (count($check) > 0) {
				echo "work site already exist";
               // continue;
            } else {
                $values["work_site"] = $work_site;
				$values["site_location"]=$site_location;
                $insert = $db->secure_insert("sm_work_site", $values);
				if($insert){
					echo "Work site added successfully";
				

				}
            }
        }
    
}
