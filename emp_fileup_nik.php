<?php

session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}

//Folder prefix is fixed.
$folder_name = "emp_uploads/";

//Needs to check the empty condition, since it will affect the file_name that you create
if ((isset($_REQUEST['fname']) && !empty($_REQUEST['fname']) ) && (isset($_REQUEST['cp_id']) && !empty($_REQUEST['cp_id']) ) ) {
    $cp_id = $_REQUEST['cp_id'];
    $fname = $_REQUEST['fname'];

    $folder_name .=  $cp_id . "/" . str_replace(" ", "_", $fname) . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
}
else
{
    exit;
}
$sesVal = array();

for ($i = 0; $i < $numf; $i++) {
    $file = $_FILES['file-' . $i];
    $filename = $file['name'];
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        move_uploaded_file($file['tmp_name'], $folder_name . $filename);
        if ($section == "Passport") {
            $_SESSION["Passport"][] = $folder_name . $filename;
        }
        if ($section == "Visa") {
            $_SESSION["Visa"][] = $folder_name . $filename;
        }
        if ($section == "Qatar") {
            $_SESSION["Qatar"][] = $folder_name . $filename;
        }
        if ($section == "Health") {
            $_SESSION["Health"][] = $folder_name . $filename;
        }
        if ($section == "Insurance") {
            $_SESSION["Insurance"][] = $folder_name . $filename;
        }
        if ($section == "Resume") {
            $_SESSION["Resume"][] = $folder_name . $filename;
        }
        //print_r($_SESSION["Passport"]);
    }
}