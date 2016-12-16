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
$sesVal = array();
for ($i = 0; $i < $numf; $i++) {
    $file_new_name = "";
    $filename = "";
    $file = $_FILES['file-' . $i];
    $filename = $file['name'];
    $filename_org = $file['name'] . ", ";
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        $file_new_name = $folder_name . $filename;
        move_uploaded_file($file['tmp_name'], $file_new_name);
        if ($section == "Resume") {
            $_SESSION["Resume"][] = $file_new_name;
        }
        if ($section == "Profile_Picture") {
            unset($_SESSION["Profile_Picture"]);
            $_SESSION["Profile_Picture"][] = $file_new_name;
        }
        unset($filename);
        unset($file_new_name);
        echo $filename_org;
    }
}