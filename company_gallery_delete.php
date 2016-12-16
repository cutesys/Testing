<?php

include("connection.php");
if (isset($_POST['imgId'])) {
    $images_array = $_POST['imgId'];
    foreach ($images_array as $image) {
        $file_id = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_id`='$image'");
        if (!empty($file_id)) {
            echo "File Deleted";
        }
    }
}