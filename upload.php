<?php

session_start();
$_SESSION["Candidate_Picture"] = "";
$folder_name = "../candidate_uploads/";
if ((isset($_SESSION['candidate_code']))) {
    $candidate_folder = $_SESSION['candidate_code'];
    $folder_name .= $candidate_folder . "/" . "Candidate_Picture" . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
    $file_name = '/webcam' . md5(time()) . rand(383, 1000) . '.jpg';
    $file_new_name = $folder_name . $file_name;
    move_uploaded_file($_FILES['webcam']['tmp_name'], $file_new_name);
    $_SESSION["Candidate_Picture"] = "candidate_uploads/" . $candidate_folder . "/" . "Candidate_Picture" . $file_name;
} else {
    exit;
}
