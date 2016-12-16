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
    $filename = str_replace(' ', '', $file['name']);
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        $file_new_name = $folder_name . $filename;
        move_uploaded_file($file['tmp_name'], $file_new_name);
        if ($section == "Commercial_Registration") {
            $_SESSION["Commercial_Registration"][] = $file_new_name;
        } elseif ($section == "Computer_Card") {
            $_SESSION["Computer_Card"][] = $file_new_name;
        } elseif ($section == "Municipal_Baladiya") {
            $_SESSION["Municipal_Baladiya"][] = $file_new_name;
        } elseif ($section == "Tax_Card") {
            $_SESSION["Tax_Card"][] = $file_new_name;
        } else {
            $_SESSION[$section][] = $file_new_name;
        }
        echo $filename_org;

        $fileNam = array_push($sesVal, $_SESSION, $uniqid);
        unset($filename);
        unset($file_new_name);
    }
}