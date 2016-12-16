<?php

include('connection.php');
if (isset($_POST['designation_name'])) {
    $fdata = $_POST['designation_name'];
    foreach ($fdata as $designation) {
        $values = array();
        if ($designation != "") {
            $result = array();
            $check = $db->selectQuery("SELECT * FROM `sm_designation` WHERE `designation_name`='$designation'");
            if (count($check) > 0) {
                continue;
            } else {
                $values["designation_name"] = $designation;
                $insert = $db->secure_insert("sm_designation", $values);
            }
        }
    }
}
if (isset($_POST['designation'])) {
    $designation_name = $_POST['designation'];
    if ($designation_name != "") {
        $check_name = $db->selectQuery("SELECT * FROM `sm_designation` WHERE `designation_name`='$designation_name'");
        if (count($check_name) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }
}