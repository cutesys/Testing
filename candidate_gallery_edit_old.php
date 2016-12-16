<?php

session_start();
include('connection.php');
$_REQUEST['uid'];
$sponsor_id = $_SESSION['id'];
$Passport_Documents = $Experience_Certificates = $Resume = $Candidate_Picture = '';
if (isset($_SESSION['Passport_Documents'])) {
    $Passport_Documents = implode(",", $_SESSION['Passport_Documents']);
}
if (isset($_SESSION['Experience_Certificates'])) {
    $Experience_Certificates = implode(",", $_SESSION["Experience_Certificates"]);
}
if (isset($_SESSION['Resume'])) {
    $Resume = implode(",", $_SESSION["Resume"]);
}
if (isset($_SESSION['ID_Card'])) {
    $ID_Card = implode(",", $_SESSION["ID_Card"]);
}
if (isset($_SESSION['Driving_License'])) {
    $Driving_License = implode(",", $_SESSION["Driving_License"]);
}
if (isset($_SESSION['Candidate_Picture'])) {
    $Candidate_Picture = ($_SESSION["Candidate_Picture"]);
}
if (isset($_SESSION['Candidate_Contract'])) {
    $Candidate_Contract = ($_SESSION["Candidate_Contract"]);
}
if (isset($_POST['depend_num'])) {
    $depend_num = $_POST['depend_num'];
}
if (isset($_REQUEST['employee_id'])) {
    $employee_id = $_REQUEST['employee_id'];
    if (isset($_POST["emp_docs"])) {
        $values2 = array();
        $values2['status'] = 0;
        $updoc = $db->secure_update("sm_employee_documents", $values2, "WHERE `employee_id`='$employee_id'");
        $emp_docs = array_values($_POST["emp_docs"]);
        foreach ($emp_docs as $key => $value_array) {
            $s_date = $value_array['document_start_date'];
            $explode_s_date = explode("/", $s_date);
            $value_array['document_start_date'] = $explode_s_date[2] . "-" . $explode_s_date[1] . "-" . $explode_s_date[0];
            $e_date = $value_array['document_end_date'];
            $explode_e_date = explode("/", $e_date);
            $value_array['document_end_date'] = $explode_e_date[2] . "-" . $explode_e_date[1] . "-" . $explode_e_date[0];
            $employee_documents = array_merge($value_array, array("employee_id" => $employee_id));
            $document_id = $db->secure_insert("sm_employee_documents", $employee_documents);
            if ($value_array["document_title"] == "Qatar ID") {
                $doc_e_date = $value_array['document_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `document_title`='Qatar ID' AND `employee_id`='$employee_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification_employee` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Qatar)) {
                    $qq1 = $db->executeQuery("UPDATE `sm_employee_files` SET `document_id`='$document_id' WHERE `file_class`='Qatar' AND `employee_id`='$employee_id'");
                    continue;
                } else {
                    $qat = $db->executeQuery("UPDATE `sm_employee_files` SET `file_status`='0' WHERE `file_class`='Qatar' AND `employee_id`='$employee_id'");
                    $data_value_array["file_name"] = $Qatar;
                    $className = "Qatar";
                    $data_value_array["employee_id"] = $employee_id;
                    $data_value_array["document_id"] = $document_id;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Qatar']);
                }
            } elseif ($value_array["document_title"] == "Health Card") {
                $doc_e_date = $value_array['document_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `document_title`='Health Card' AND `employee_id`='$employee_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification_employee` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Health)) {
                    $hh1 = $db->executeQuery("UPDATE `sm_employee_files` SET `document_id`='$document_id' WHERE `file_class`='Health' AND `employee_id`='$employee_id'");
                    continue;
                } else {
                    $heal = $db->executeQuery("UPDATE `sm_employee_files` SET `file_status`='0' WHERE `file_class`='Health' AND `employee_id`='$employee_id'");
                    $data_value_array["file_name"] = $Health;
                    $className = "Health";
                    $data_value_array["employee_id"] = $employee_id;
                    $data_value_array["document_id"] = $document_id;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Health']);
                }
            } elseif ($value_array["document_title"] == "Insurance") {
                $doc_e_date = $value_array['document_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `document_title`='Insurance' AND `employee_id`='$employee_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification_employee` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Insurance)) {
                    $ii1 = $db->executeQuery("UPDATE `sm_employee_files` SET `document_id`='$document_id' WHERE `file_class`='Insurance' AND `employee_id`='$employee_id'");
                    continue;
                } else {
                    $insu = $db->executeQuery("UPDATE `sm_employee_files` SET `file_status`='0' WHERE `file_class`='Insurance' AND `employee_id`='$employee_id'");
                    $data_value_array["file_name"] = $Insurance;
                    $className = "Insurance";
                    $data_value_array["employee_id"] = $employee_id;
                    $data_value_array["document_id"] = $document_id;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Insurance']);
                }
            } elseif ($value_array["document_title"] == "Passport") {
                $doc_e_date = $value_array['document_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `document_title`='Passport' AND `employee_id`='$employee_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification_employee` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Passport)) {
                    $pp1 = $db->executeQuery("UPDATE `sm_employee_files` SET `document_id`='$document_id' WHERE `file_class`='Passport' AND `employee_id`='$employee_id'");
                    continue;
                } else {
                    $pass = $db->executeQuery("UPDATE `sm_employee_files` SET `file_status`='0' WHERE `file_class`='Passport' AND `employee_id`='$employee_id'");
                    $data_value_array["file_name"] = $Passport;
                    $className = "Passport";
                    $data_value_array["employee_id"] = $employee_id;
                    $data_value_array["document_id"] = $document_id;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Passport']);
                }
            } elseif ($value_array["document_title"] == "Visa") {
                $doc_e_date = $value_array['document_end_date'];
                $select_notif = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `document_title`='Visa' AND `employee_id`='$employee_id'");
                if (count($select_notif) > 0) {
                    $end_date = $select_notif[0]['document_end_date'];
                    $notification_id = $select_notif[0]['notification_id'];
                    if ($doc_e_date != $end_date) {
                        $delete = $db->executeQuery("DELETE FROM `sm_notification_employee` WHERE `notification_id`='$notification_id'");
                    }
                }
                if (empty($Visa)) {
                    $vv1 = $db->executeQuery("UPDATE `sm_employee_files` SET `document_id`='$document_id' WHERE `file_class`='Visa' AND `employee_id`='$employee_id'");
                    continue;
                } else {
                    $pass = $db->executeQuery("UPDATE `sm_employee_files` SET `file_status`='0' WHERE `file_class`='Visa' AND `employee_id`='$employee_id'");
                    $data_value_array["file_name"] = $Visa;
                    $className = "Visa";
                    $data_value_array["employee_id"] = $employee_id;
                    $data_value_array["document_id"] = $document_id;
                    $data_value_array["file_class"] = $className;
                    $insert_file = $db->secure_insert("sm_employee_files", $data_value_array);
                    unset($data_value_array);
                    unset($_SESSION['Visa']);
                }
            } else {
                continue;
            }
        }
    }
    if (count($document_id)) {
        $success_msg = "Values Updated!";
    } else {
        $success_msg = "Error in updation";
    }
}