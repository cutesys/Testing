<?php

session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
$folder_name = "emp_uploads/";
if ((isset($_REQUEST['fname']) && !empty($_REQUEST['fname']) ) && (isset($_REQUEST['cp_id']) && !empty($_REQUEST['cp_id']) )) {
    $cp_id = $_REQUEST['cp_id'];
    $fname = $_REQUEST['fname'];
    $folder_name .= $cp_id . "/" . str_replace(" ", "_", $fname) . "/" . $section . "/";
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
        $filename = str_replace(' ', '', $file['name']);
        if ($filename != "") {
            $uniqid = uniqid();
            $filename = $uniqid . $filename;
            $file_new_name = $folder_name . $filename;
            move_uploaded_file($file['tmp_name'], $file_new_name);
            if ($section == "Passport") {
                $_SESSION["Passport"][] = $file_new_name;
            } elseif ($section == "Visa") {
                $_SESSION["Visa"][] = $file_new_name;
            } elseif ($section == "Qatar") {
                $_SESSION["Qatar"][] = $file_new_name;
            } elseif ($section == "Health") {
                $_SESSION["Health"][] = $file_new_name;
            } elseif ($section == "Insurance") {
                $_SESSION["Insurance"][] = $file_new_name;
            } elseif ($section == "Resume") {
                $_SESSION["Resume"][] = $file_new_name;
            } elseif ($section == "License") {
                $_SESSION["License"][] = $file_new_name;
            } else {
                $_SESSION[$section][] = $file_new_name;
            }
            //unset($filename);
            unset($file_new_name);
            echo $filename_org;
        }
    }
}