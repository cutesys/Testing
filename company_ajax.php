<?php

include("./connection.php");
session_start();
$sponsor_id = $_SESSION['id'];
$Commercial_Registration = $Visa = $Qatar = $Health = $Insurance = $Resume = '';
if (isset($_SESSION['Commercial_Registration'])) {
    $Commercial_Registration = implode(",", $_SESSION['Commercial_Registration']);
}
if (isset($_SESSION['Computer_Card'])) {
    $Computer_Card = implode(",", $_SESSION["Computer_Card"]);
}
if (isset($_SESSION['Municipal_Baladiya'])) {
    $Municipal_License = implode(",", $_SESSION["Municipal_Baladiya"]);
}
if (isset($_SESSION['Tax_Card'])) {
    $Tax_Card = implode(",", $_SESSION["Tax_Card"]);
}
if (isset($_SESSION['Company_Logo'])) {
    $Company_Logo = implode(",", $_SESSION['Company_Logo']);
}

$add_address1 = $_POST['add_address1'];
$add_address2 = $_POST['add_address2'];
$area = $_POST['area'];
$cmp_country = $_POST['cmp_country'];
$add_street = $_POST['add_street'];
$add_zip = $_POST['add_zip'];
$basic_about_cmp = $_POST['basic_about_cmp'];
$basic_company_id = $_POST['basic_company_id'];
$basic_company_name = $_POST['basic_company_name'];
$basic_company_category = $_POST['basic_company_category'];
$basic_email = $_POST['basic_email'];
$basic_fax = $_POST['basic_fax'];
$basic_fee = $_POST['basic_fee'];
$basic_owner = $_POST['basic_owner'];
$basic_phone = $_POST['basic_phone'];
$values = array();
$values["company_pid"] = $basic_company_id;
$values['company_name'] = $basic_company_name;
$values['company_category'] = $basic_company_category;
$values['company_email'] = $basic_email;
$values['company_phone'] = $basic_phone;
$values['company_fax'] = $basic_fax;
$values['company_owner'] = $basic_owner;
$values['company_about'] = $basic_about_cmp;
$values['company_address1'] = $add_address1;
$values['company_address2'] = $add_address2;
$values['company_area'] = $area;
$values['company_city'] = $add_street;
$values['company_country'] = $cmp_country;
$values['company_postbox'] = $add_zip;
$values['company_sponsor_fee'] = $basic_fee;
$values['sponsor_id'] = $sponsor_id;
$values['company_receive_newsletter'] = "";

$company_id = $db->secure_insert("sm_company", $values);
if (!empty($company_id)) {
    echo "Added Successfully!";
}

if (!empty($Company_Logo)) {
    $clogoArray = array();
    $clogoArray['company_id'] = $company_id;
    $clogoArray['file_name'] = $Company_Logo;
    $clogoArray['file_title'] = 'companyLogo';
    $clogoArray['file_class'] = 'Logo';

    $logo = $db->secure_insert("sm_company_files", $clogoArray);

    unset($_SESSION['Company_Logo']);
}
if (isset($_POST["docs"])) {
    $docs = $_POST["docs"];
    foreach ($docs as $key => $value_array) {
        // $value_array["doc_title"] = preg_replace('/\bNo\b/', '', $value_array["doc_title"]);

        $s_date = $value_array['doc_start_date'];
        $explode_s_date = explode("/", $s_date);
        $value_array['doc_start_date'] = $explode_s_date[2] . '-' . $explode_s_date[1] . '-' . $explode_s_date[0];
        $e_date = $value_array['doc_end_date'];
        $explode_e_date = explode("/", $e_date);
        $value_array['doc_end_date'] = $explode_e_date[2] . '-' . $explode_e_date[1] . '-' . $explode_e_date[0];
        $company_documents = array_merge($value_array, array("company_id" => $company_id, "sponsor_id" => $sponsor_id));
        $document_id = $db->secure_insert("sm_company_docs", $company_documents);
        $data_value_array = array();
        if ($value_array["doc_title"] == "Commercial Registration") {
            if (empty($Commercial_Registration)) {
                continue;
            }
            $data_value_array["file_name"] = $Commercial_Registration;
            $data_value_array['file_title'] = 'Commercial Registration';
            $className = "CR";
            unset($_SESSION['Commercial_Registration']);
        } elseif ($value_array["doc_title"] == "Municipal Baladiya") {
            if (empty($Municipal_License)) {
                continue;
            }
            $data_value_array["file_name"] = $Municipal_License;
            $data_value_array['file_title'] = "Municipal Baladiya";
            $className = "ML";
            unset($_SESSION['Municipal_Baladiya']);
        } elseif ($value_array["doc_title"] == "Computer Card") {
            if (empty($Computer_Card)) {
                continue;
            }
            $data_value_array["file_name"] = $Computer_Card;
            $data_value_array['file_title'] = "Computer Card";
            $className = "CC";
            unset($_SESSION['Computer_Card']);
        } elseif ($value_array["doc_title"] == "Tax Card") {
            if (empty($Tax_Card)) {
                continue;
            }
            $data_value_array["file_name"] = $Tax_Card;
            $data_value_array['file_title'] = "Tax Card";
            $className = "TC";
            unset($_SESSION['Tax_Card']);
        } else {
            $created_session = str_replace(' ', '_', $value_array["doc_title"]);
            if (!empty($_SESSION[$created_session])) {
                $data_value_array["file_name"] = implode(",", $_SESSION[$created_session]);
                $data_value_array['file_title'] = $value_array["doc_title"];
                $className = $created_session;
                unset($_SESSION[$created_session]);
            }
        }
        $data_value_array["company_id"] = $company_id;
        $data_value_array["document_id"] = $document_id;
        $data_value_array["file_class"] = $className;
        $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
        unset($data_value_array);
        $values1 = array();
    }
}
if (isset($_POST["contact"])) {
    $contact = $_POST["contact"];
    $contact_notif = $_POST['contact_not'];
    foreach ($contact as $dkey1 => $value_contact) {
        $contact_data = array_merge($value_contact, array("company_id" => $company_id, "sponsor_id" => $sponsor_id));
        $cn = $contact_notif[$dkey1];
        $cn_imp = implode(",", $cn);
        $contact_data['contact_notification'] = $cn_imp;
        $insert_docs = $db->secure_insert("sm_company_contacts", $contact_data);
        $values2 = array();
    }
}