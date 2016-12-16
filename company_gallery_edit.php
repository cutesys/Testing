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
    $Municipal_Baladiya = implode(",", $_SESSION["Municipal_Baladiya"]);
}
if (isset($_SESSION['Tax_Card'])) {
    $Tax_Card = implode(",", $_SESSION["Tax_Card"]);
}
if (isset($_SESSION['Company_Logo'])) {
    $Company_Logo = implode(",", $_SESSION['Company_Logo']);
}
if (isset($_REQUEST['company_id'])) {
    $com_id = $_REQUEST['company_id'];
    if (isset($_POST["docs"])) {
        $values2 = array();
        $values2['doc_status'] = 0;
        $updoc = $db->secure_update("sm_company_docs", $values2, "WHERE `company_id`='$com_id'");
        $docs = $_POST["docs"];
        $counter = count($docs);
        foreach ($docs as $dkey => $value_array) {
            $s_date = $value_array['doc_start_date'];
            $explode_s_date = explode("/", $s_date);
            $value_array['doc_start_date'] = $explode_s_date[2] . '-' . $explode_s_date[1] . '-' . $explode_s_date[0];
            $e_date = $value_array['doc_end_date'];
            $explode_e_date = explode("/", $e_date);
            $value_array['doc_end_date'] = $explode_e_date[2] . '-' . $explode_e_date[1] . '-' . $explode_e_date[0];
            $comp_docs = array_merge($value_array, array("company_id" => $com_id, "sponsor_id" => $sponsor_id));
            $insert_docs = $db->secure_insert("sm_company_docs", $comp_docs);
            if ($value_array["doc_title"] == "Commercial Registration") {
                $doc_e_date = $value_array['doc_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `document_title`='Commercial Registration' AND `company_id`='$com_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Commercial_Registration)) {
                    $cr1 = $db->executeQuery("UPDATE `sm_company_files` SET `document_id`='$insert_docs' WHERE `file_title`='Commercial Registration' AND `company_id`='$com_id'");
                    continue;
                } else {
                    $cr = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_title`='Commercial Registration' AND `company_id`='$com_id'");
                    $data_value_array["file_name"] = $Commercial_Registration;
                    $data_value_array['file_title'] = 'Commercial Registration';
                    $className = "CR";
                    $data_value_array["company_id"] = $com_id;
                    $data_value_array["document_id"] = $insert_docs;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Commercial_Registration']);
                }
            } elseif ($value_array["doc_title"] == "Tax Card") {
                $doc_e_date = $value_array['doc_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `document_title`='Tax Card' AND `company_id`='$com_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Tax_Card)) {
                    $tc1 = $db->executeQuery("UPDATE `sm_company_files` SET `document_id`='$insert_docs' WHERE `file_title`='Tax Card' AND `company_id`='$com_id'");
                    continue;
                } else {
                    $tc = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_title`='Tax Card' AND `company_id`='$com_id'");
                    $data_value_array["file_name"] = $Tax_Card;
                    $data_value_array['file_title'] = "Tax Card";
                    $className = "TC";
                    $data_value_array["company_id"] = $com_id;
                    $data_value_array["document_id"] = $insert_docs;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Tax_Card']);
                }
            } elseif ($value_array["doc_title"] == "Computer Card") {
                $doc_e_date = $value_array['doc_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `document_title`='Computer Card' AND `company_id`='$com_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Computer_Card)) {
                    $cc1 = $db->executeQuery("UPDATE `sm_company_files` SET `document_id`='$insert_docs' WHERE `file_title`='Computer Card' AND `company_id`='$com_id'");
                    continue;
                } else {
                    $cc = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_title`='Computer Card' AND `company_id`='$com_id'");
                    $data_value_array["file_name"] = $Computer_Card;
                    $data_value_array['file_title'] = "Computer Card";
                    $className = "CC";
                    $data_value_array["company_id"] = $com_id;
                    $data_value_array["document_id"] = $insert_docs;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Computer_Card']);
                }
            } elseif ($value_array["doc_title"] == "Municipal Baladiya") {
                $doc_e_date = $value_array['doc_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `document_title`='Municipal Baladiya' AND `company_id`='$com_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Municipal_Baladiya)) {
                    $ml1 = $db->executeQuery("UPDATE `sm_company_files` SET `document_id`='$insert_docs' WHERE `file_title`='Municipal Baladiya' AND `company_id`='$com_id'");
                    continue;
                } else {
                    $ml = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_title`='Municipal Baladiya' AND `company_id`='$com_id'");
                    $data_value_array["file_name"] = $Municipal_Baladiya;
                    $data_value_array['file_title'] = "Municipal Baladiya";
                    $className = "ML";
                    $data_value_array["company_id"] = $com_id;
                    $data_value_array["document_id"] = $insert_docs;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Municipal_Baladiya']);
                }
            } else {
                $created_session = $value_array["doc_title"];
                $file_path = implode(",", $_SESSION[$created_session]);
                $doc_e_date = $value_array['doc_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `document_title`='$created_session' AND `company_id`='$com_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($file_path)) {
                    $ml1 = $db->executeQuery("UPDATE `sm_company_files` SET `document_id`='$insert_docs' WHERE `file_title`='$created_session' AND `company_id`='$com_id'");
                    continue;
                }
                if (!empty($file_path)) {
                    echo "in loop";
                    $ml = $db->executeQuery("UPDATE `sm_company_files` SET `file_status`='0' WHERE `file_title`='$created_session' AND `company_id`='$com_id'");
                    $data_value_array["file_name"] = implode(",", $_SESSION[$created_session]);
                    $data_value_array['file_title'] = $created_session;
                    $className = $created_session;
                    $data_value_array["company_id"] = $com_id;
                    $data_value_array["document_id"] = $insert_docs;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_company_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION[$created_session]);
                }
            }
        }
    }
}
