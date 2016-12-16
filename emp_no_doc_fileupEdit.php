<?php

session_start();
include('connection.php');
if (isset($_REQUEST['numf'])) {
    $numf = $_REQUEST['numf'];
}
if (isset($_REQUEST['section'])) {
    $section = $_REQUEST['section'];
}
if (isset($_REQUEST['emp_id'])) {
    $emp_id = $_REQUEST['emp_id'];
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
    if ($filename != "") {
        $uniqid = uniqid();
        $filename = $uniqid . $filename;
        $file_new_name = $folder_name . $filename;
        move_uploaded_file($file['tmp_name'], $file_new_name);
        $values2 = array();
        $values2['file_name'] = $file_new_name;
        $values2['file_status'] = 1;
        $check_logo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `employee_id`='$emp_id' AND `file_title`='Profile_Picture'");
        if (count($check_logo)) {
            $updoc = $db->secure_update("sm_employee_files", $values2, "WHERE `employee_id`='$emp_id' AND `file_title`='Profile_Picture'");
            if (count($updoc)) {
                echo "Successfull!";
            }
        } else {
            $values2['employee_id'] = $emp_id;
            $values2['file_title'] = 'Profile_Picture';
            $insert_logo = $db->secure_insert("sm_employee_files", $values2);
            if (count($insert_logo)) {
                echo "Successfull!";
            }
        }
    }
}

