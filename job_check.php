<?php

include('connection.php');
if (isset($_POST['job_name'])) {
    $fdata = $_POST['job_name'];
    foreach ($fdata as $job) {
        $values = array();
        if ($job != "") {
            $check = $db->selectQuery("SELECT * FROM `sm_job_positions` WHERE `job_name`='$job'");
            if (count($check) > 0) {
                continue;
            } else {
                $values["job_name"] = $job;
                $insert = $db->secure_insert("sm_job_positions", $values);
            }
        }
    }
}
if (isset($_POST['job'])) {
    $job_name = $_POST['job'];
    if ($job_name != "") {
        $check_name = $db->selectQuery("SELECT * FROM `sm_job_positions` WHERE `job_name`='$job_name'");
        if (count($check_name) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }
}