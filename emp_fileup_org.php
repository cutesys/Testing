<?php

session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
if (isset($_REQUEST['fname']) && isset($_REQUEST['cp_id'])) {
    $cp_id = $_REQUEST['cp_id'];
    $fname = $_REQUEST['fname'];
    $foldername = "emp_uploads/" . $cp_id . "/" . str_replace(" ", "_", $fname) . "/";
    if (!file_exists($foldername)) {
        mkdir($foldername, 0777, true);
    }
}
$sesVal = array();
for ($i = 0; $i < $numf; $i++) {
    $file = $_FILES['file-' . $i];
    $filename = $file['name'];
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        move_uploaded_file($file['tmp_name'], $foldername . $filename);
        if ($section == "Passport") {
            $_SESSION["Passport"][] = $foldername . $filename;
        }
        if ($section == "Visa") {
            $_SESSION["Visa"][] = $foldername . $filename;
        }
        if ($section == "Qatar") {
            $_SESSION["Qatar"][] = $foldername . $filename;
        }
        if ($section == "Health") {
            $_SESSION["Health"][] = $foldername . $filename;
        }
        if ($section == "Insurance") {
            $_SESSION["Insurance"][] = $foldername . $filename;
        }
        if ($section == "Resume") {
            $_SESSION["Resume"][] = $foldername . $filename;
        }
        //print_r($_SESSION["Passport"]);
    }
}