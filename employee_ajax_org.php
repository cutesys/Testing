<?php

session_start();
$sponsor_id = $_SESSION['id'];
if (isset($_SESSION['Passport'])) {
    $Passport1 = $_SESSION['Passport'];
    $Passport = implode(",", $Passport1);
    //print_r($Passport);
}
if (isset($_SESSION['Visa'])) {
    $Visa1 = $_SESSION["Visa"];
    $Visa = implode(",", $Visa1);
}

if (isset($_SESSION['Qatar'])) {
    $Qatar1 = $_SESSION["Qatar"];
    $Qatar = implode(",", $Qatar1);
}
if (isset($_SESSION['Health'])) {
    $Health1 = $_SESSION["Health"];
    $Health = implode(",", $Health1);
}
if (isset($_SESSION['Insurance'])) {
    $Insurance1 = $_SESSION["Insurance"];
    $Insurance = implode(",", $Insurance1);
}
if (isset($_SESSION['Resume'])) {
    $Resume1 = $_SESSION["Resume"];
    $Resume = implode(",", $Resume1);
}
if (isset($_POST['depend_num'])) {
    $depend_num = $_POST['depend_num'];
}
include("./connection.php");
$visa_end = "";
$visa_num = "";
$visa_start = "";
$pass_end = "";
$pass_num = "";
$pass_start = "";
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address21 = $_POST['address21'];
$address22 = $_POST['address22'];
$city = $_POST['city'];
$city2 = $_POST['city2'];
$company = $_POST['company'];
$dnumber = $_POST['dnumber'];
$dnumber2 = $_POST['dnumber2'];
$dob = $_POST['dob'];
$em_contact = $_POST['em_contact'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$gender = $_POST['gender'];
$middle_name = $_POST['middle_name'];
$nationality = $_POST['nationality'];
$phone = $_POST['phone'];
$remarks = $_POST['remarks'];
$state = $_POST['state'];
$state2 = $_POST['state2'];
$visa_type = $_POST['visa_type'];
$zip = $_POST['zip'];
$zip2 = $_POST['zip2'];

$values = array();
$values['employee_firstname'] = $first_name;
$values['employee_middlename'] = $middle_name;
$values['employee_lastname'] = $middle_name;
$values['employee_company'] = $company;
$values['employee_designation'] = "des";
$values['employee_nationality'] = $nationality;
$values['employee_gender'] = $gender;
$values['employee_dob'] = $dob;
$values['employee_remarks'] = $remarks;
$values['employee_peraddress1'] = $address1;
$values['employee_peraddress2'] = $address2;
$values['employee_perdoor'] = $dnumber;
$values['employee_percity'] = $city;
$values['employee_perstate'] = $state;
$values['employee_perzip'] = $zip;
$values['employee_resiaddress1'] = $address21;
$values['employee_resiaddress2'] = $address22;
$values['employee_residoor'] = $dnumber2;
$values['employee_resicity'] = $city2;
$values['employee_resistate'] = $state2;
$values['employee_zip'] = $zip2;
$values['employee_email'] = $email;
$values['employee_phone'] = $phone;
$values['employee_emcontact'] = $em_contact;
$values['employee_receive_newsletter'] = "yes";
$values['sponsor_id'] = $sponsor_id;

$insert1 = $db->secure_insert("sm_employee", $values);
if (isset($_POST["depen"])) {
    $depen = $_POST["depen"];
    $counter = count($depen);
    foreach ($depen as $dkey => $keyval) {
        $values1[$dkey] = $keyval;
        for ($k = 0; $k < $counter; $k++) {
            $vals = $values1[$k];
            $new = array_merge($vals, array("employee_id" => $insert1));
            $insert_depend = $db->secure_insert("sm_dependant", $new);
        }
        $values1 = array();
    }
}
if (isset($_POST["emp_docs"])) {
    $emp_docs = $_POST["emp_docs"];
    print_r($emp_docs);
    $counterz = count($emp_docs);
    foreach ($emp_docs as $dkeyz => $keyvalz) {
        $values1z[$dkeyz] = $keyvalz;
        for ($n = 0; $n < $counterz; $n++) {
            $valsz = $values1z[$n];
            $newz = array_merge($valsz, array("employee_id" => $insert1));
            $insert_docz = $db->secure_insert("sm_employee_documents", $newz);
            if ($values1z["document_title"] = "Passport") {
                $valuesx = array();
                $valuesx["file_name"] = $Passport;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            if ($values1z["document_title"] = "Visa") {
                $valuesx = array();
                $valuesx["file_name"] = $Visa;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            if ($values1z["document_title"] = "Health Card") {
                $valuesx = array();
                $valuesx["file_name"] = $Health;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            if ($values1z["document_title"] = "Qatar ID") {
                $valuesx = array();
                $valuesx["file_name"] = $Qatar;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            if ($values1z["document_title"] = "Insurance") {
                $valuesx = array();
                $valuesx["file_name"] = $Insurance;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            if ($values1z["document_title"] = "Resume") {
                $valuesx = array();
                $valuesx["file_name"] = $Resume;
                $valuesx["employee_id"] = $insert1;
                $valuesx["document_id"] = $insert_docz;
            }
            $insert_file = $db->secure_insert("sm_employee_files", $valuesx);
        }
        $values1z = array();
    }
}
