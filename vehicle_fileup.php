<?php
session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
$folder_name = "vehicle_documents/";
if ((isset($_REQUEST['vehicle_id']) && !empty($_REQUEST['vehicle_id']))) {
    $vehicle_id = $_REQUEST['vehicle_id'];
    $folder_name .= $vehicle_id . "/" . str_replace(" ","_",$section) . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
} else {
    exit;
}
$extensions = array("png", "jpg", "pdf", "doc", "docx");
$data_ready = 1;
$sesVal = array();

if ($data_ready == 1) {
    for ($i = 0; $i < $numf; $i++) {
        $file_new_name = "";
        $filename = "";
        $file = $_FILES['file-' . $i];
        $filename_org = $file['name'] . ", ";
        $filename = $file['name'];
        if ($filename != "") {
            $uniqid = uniqid();
            $filename = $uniqid . $filename;
            $file_new_name = $folder_name . $filename;
            move_uploaded_file($file['tmp_name'], $file_new_name);
            if ($section == "Vehicle Pictures") {
                $_SESSION["Vehicle_Pictures"][] = $file_new_name;
            }
            if ($section == "Owner Qatar") {
                $_SESSION["Owner_Qatar"][] = $file_new_name;
            }
            if ($section == "Plate Number") {
                $_SESSION["Plate_Number"][] = $file_new_name;
            }
            if ($section == "Registration Document") {
                $_SESSION["Registration_Document"][] = $file_new_name;
            }
            if ($section == "Insurance") {
                $_SESSION["Insurance_Documents"][] = $file_new_name;
            }
            if ($section == "Pollution") {
                $_SESSION["Pollution_Certificate"][] = $file_new_name;
            }
            if ($section == "NOC") {
                $_SESSION["NOC"][] = $file_new_name;
            }
            //unset($filename);
            //unset($file_new_name);
            echo $filename_org;
        }
    }
}