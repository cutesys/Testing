<?php

include("connection.php");
if (isset($_POST['imgId'])) {
	//echo "hai";
    $images_array = $_POST['imgId'];
    foreach ($images_array as $image) {
        $file_id = $db->executeQuery("UPDATE `sm_candidate_medical_certificates` SET `status`='0' WHERE `medical_certificates_id`='$image'");
        if (!empty($file_id)) {
            echo "File Deleted";
        }
    }
}