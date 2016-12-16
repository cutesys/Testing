<?php

session_start();
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
$folder_name = "cmp_uploads/";
if ((isset($_REQUEST['cp_id']) && !empty($_REQUEST['cp_id']))) {
    $cp_id = $_REQUEST['cp_id'];
    //$fname = $_REQUEST['fname'];
    $folder_name .= $cp_id . "/" . str_replace(" ", "_", $section) . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
} else {
    exit;
}
$sesVal = array();
$lg = array();
for ($i = 0; $i < $numf; $i++) {
    $file_new_name = "";
    $filename = "";
    $file = $_FILES['file-' . $i];
    $filename = $file['name'];
    if ($filename != "") {
        $_SESSION["Company_Logo"] = "";
        $uniqid = uniqid();
        $filename_new = $uniqid . $filename;
        $file_new_name = $folder_name . $filename_new;
        move_uploaded_file($file['tmp_name'], $file_new_name);
        if ($section == "Company_Logo") {
            $_SESSION["Company_Logo"][] = $file_new_name;
        }
        array_push($lg, $filename);
        unset($filename);
        unset($file_new_name);
    }
}

$passArray = array("logoname" => $lg[0]);
echo json_encode($passArray);
