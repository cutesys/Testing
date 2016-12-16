<?php

session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
$folder_name = "candidate_uploads/";
if ((isset($_REQUEST['cp_id']) && !empty($_REQUEST['cp_id']))) {
    $cp_id = $_REQUEST['cp_id'];
    $folder_name .= $cp_id . "/" . str_replace(" ", "_", $section) . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
} else {
    exit;
}
$sesVal = array();

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
        if ($section == "Passport_Documents") {
            $_SESSION["Passport_Documents"][] = $file_new_name;
        }
        if ($section == "Experience_Certificates") {
            $_SESSION["Experience_Certificates"][] = $file_new_name;
        }
        if ($section == "Resume") {
            $_SESSION["Resume"][] = $file_new_name;
        }
        if ($section == "ID_Card") {
            $_SESSION["ID_Card"][] = $file_new_name;
        }
        if ($section == "Driving_License") {
            $_SESSION["Driving_License"][] = $file_new_name;
        }
        if ($section == "Candidate_Contract") {
            $_SESSION["Candidate_Contract"][] = $file_new_name;
        }
        if ($section == "Candidate_Picture") {
            $_SESSION["Candidate_Picture"] = "";
            $_SESSION["Candidate_Picture"][] = $file_new_name;
        }
        echo $filename_org;
        $fileNam = array_push($sesVal, $_SESSION, $uniqid);
        unset($filename);
        unset($file_new_name);
    }
}