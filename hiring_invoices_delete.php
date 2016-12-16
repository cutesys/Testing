<?php

include("connection.php");
if (isset($_POST['filename'])) {
	//echo "hai";
    $images_array = $_POST['filename'];
    foreach ($images_array as $image) {
        $file_id = $db->executeQuery("DELETE `sm_hiring_requirment_invoices` WHERE `provider_id`='$image'");
        if (!empty($file_id)) {
            echo "File Deleted";
        }
    }
}