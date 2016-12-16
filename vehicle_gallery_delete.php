<?php
include("connection.php");
if (isset($_POST['imgId'])) {
    $message = "";
    $vehicle_id = $_POST['vehicle_id'];
    $images_array = $_POST['imgId'];
    foreach ($images_array as $image) {
        if ($image == "Pictures") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_images`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        } elseif ($image == "Plate") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_plate_number`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        } elseif ($image == "Registration") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_registration`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        } elseif ($image == "Pollution") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_pollution`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        } elseif ($image == "NOC") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_noc`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        } elseif ($image == "Qatar") {
            $file_id = $db->executeQuery("UPDATE `sm_vehicle_documents` SET `vehicle_document_owner_qatar_id`='' WHERE `vehicle_auto_id`='$vehicle_id'");
            if (!empty($file_id)) {
                $message = "deleted";
            }
        }
        if (!empty($message)) {
            echo "File Deleted";
        }
    }
}