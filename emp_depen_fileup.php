<?php

session_start();
include("connection.php");
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
if (isset($_REQUEST['file_type'])) {
    $file_type = $_REQUEST['file_type'];
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
        $filename = $file['name'];
        if ($filename != "") {
            $uniqid = uniqid();
            $filename = $uniqid . $filename;
            $file_new_name = $folder_name . $filename;
            move_uploaded_file($file['tmp_name'], $file_new_name);
            $value_array['dependant_doc_main'] = $file_type;
            $value_array['dependant_doc_sub'] = $section . "_" . $i;
            $value_array['dependant_doc_path'] = $file_new_name;
            $dependent_table = $db->secure_insert("sm_dependant_temp", $value_array);
            echo $filename_org;
        }
    }
}