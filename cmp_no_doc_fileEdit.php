<?php
session_start();
include('connection.php');
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['company_id'])) {
    $company_id = $_REQUEST['company_id'];
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
    $filename = $file['name'];
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        $file_new_name = $folder_name . $filename;
        move_uploaded_file($file['tmp_name'], $file_new_name);
        $values2 = array();
        $check_logo = $db->selectQuery("SELECT * FROM `sm_company_files` WHERE `company_id`='$company_id' AND `file_title`='companyLogo'");
        if (count($check_logo)) {
            $values2['file_name'] = $file_new_name;
            $values2['file_status'] = 1;
            $updoc = $db->secure_update("sm_company_files", $values2, "WHERE `company_id`='$company_id' AND `file_title`='companyLogo'");
            if (count($updoc)) {
                echo "Successfull!";
            }
        } else {
            $values2['company_id'] = $company_id;
            $values2['file_title'] = "companyLogo";
            $values2['file_name'] = $file_new_name;
            $insert_logo = $db->secure_insert("sm_company_files", $values2);
            if (count($insert_logo)) {
                echo "Successfull!";
            }
        }
    }
}
