<?php

include("connection.php");
session_start();
if (isset($_REQUEST['vehicle_id'])) {
    $vehicle_id = $_REQUEST['vehicle_id'];
    $select_docs = $db->selectQuery("SELECT * FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$vehicle_id' AND `vehicle_document_status`='1'");
    if (count($select_docs)) {
        $Vehicle_Pic = $select_docs[0]['vehicle_document_images'];
        $Owner_Qat = $select_docs[0]['vehicle_document_owner_qatar_id'];
        $Insurance_Doc = $select_docs[0]['vehicle_document_insurance'];
        $Registration_Doc = $select_docs[0]['vehicle_document_registration'];
    }
    if (isset($_SESSION['Vehicle_Pictures'])) {
        $Vehicle_Pictures = implode(",", $_SESSION['Vehicle_Pictures']);
    } else {
        $Vehicle_Pictures = $Vehicle_Pic;
    }
    if (isset($_SESSION['Owner_Qatar'])) {
        $Owner_Qatar = implode(",", $_SESSION['Owner_Qatar']);
    } else {
        $Owner_Qatar = $Owner_Qat;
    }
    if (isset($_SESSION['Plate_Number'])) {
        $Plate_Number = implode(",", $_SESSION['Plate_Number']);
    } else {
        // $Plate_Number = $Plate_Num;
    }
    if (isset($_SESSION['Registration_Document'])) {
        $Registration_Document = implode(",", $_SESSION['Registration_Document']);
    } else {
        $Registration_Document = $Registration_Doc;
    }
    if (isset($_SESSION['Insurance_Documents'])) {
        $Insurance_Documents = implode(",", $_SESSION['Insurance_Documents']);
    } else {
        $Insurance_Documents = $Insurance_Doc;
    }
    if (isset($_SESSION['Pollution_Certificate'])) {
        $Pollution_Certificate = implode(",", $_SESSION['Pollution_Certificate']);
    }
    if (isset($_SESSION['NOC'])) {
        $NOC = implode(",", $_SESSION['NOC']);
    }

    $status_array = array();
    $status_array['vehicle_document_status'] = 0;
    $up_status = $db->secure_update("sm_vehicle_documents", $status_array, "WHERE `vehicle_auto_id`=$vehicle_id");
    $vehicle_doc = array();
    $vehicle_doc['vehicle_auto_id'] = $vehicle_id;
    if (!empty($Vehicle_Pictures)) {
        $vehicle_doc['vehicle_document_images'] = $Vehicle_Pictures;
    }
    if (!empty($Owner_Qatar)) {
        $vehicle_doc['vehicle_document_owner_qatar_id'] = $Owner_Qatar;
    }
    if (!empty($Plate_Number)) {
        $vehicle_doc['vehicle_document_plate_number'] = $Plate_Number;
    }
    if (!empty($Registration_Document)) {
        $vehicle_doc['vehicle_document_registration'] = $Registration_Document;
    }
    if (!empty($Insurance_Documents)) {
        $vehicle_doc['vehicle_document_insurance'] = $Insurance_Documents;
    }
    if (!empty($Pollution_Certificate)) {
        $vehicle_doc['vehicle_document_pollution'] = $Pollution_Certificate;
    }
    if (!empty($NOC)) {
        $vehicle_doc['vehicle_document_noc'] = $NOC;
    }
    if (count($vehicle_doc) > 0) {
        $docs = $db->secure_insert("sm_vehicle_documents", $vehicle_doc, "WHERE `vehicle_auto_id`=$vehicle_id");
        unset($_SESSION['Vehicle_Pictures']);
        unset($_SESSION['Owner_Qatar']);
        unset($_SESSION['Plate_Number']);
        unset($_SESSION['Registration_Document']);
        unset($_SESSION['Insurance_Documents']);
        unset($_SESSION['Pollution_Certificate']);
        unset($_SESSION['NOC']);
        if (!empty($docs)) {
            echo "Successfull";
        }
    }
}