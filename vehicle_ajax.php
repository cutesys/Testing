<?php
session_start();
$Vehicle_Pictures="";
$Owner_Qatar="";
$Plate_Number="";
$Registration_Document="";
if (isset($_SESSION['Vehicle_Pictures'])) {
    $Vehicle_Pictures = implode(",", $_SESSION['Vehicle_Pictures']);
}
if (isset($_SESSION['Owner_Qatar'])) {
    $Owner_Qatar = implode(",", $_SESSION['Owner_Qatar']);
}
if (isset($_SESSION['Plate_Number'])) {
    $Plate_Number = implode(",", $_SESSION['Plate_Number']);
}
if (isset($_SESSION['Registration_Document'])) {
    $Registration_Document = implode(",", $_SESSION['Registration_Document']);
}
if (isset($_SESSION['Insurance_Documents'])) {
    $Insurance_Documents = implode(",", $_SESSION['Insurance_Documents']);
}
if (isset($_SESSION['Pollution_Certificate'])) {
    $Pollution_Certificate = implode(",", $_SESSION['Pollution_Certificate']);
}
if (isset($_SESSION['NOC'])) {
    $NOC = implode(",", $_SESSION['NOC']);
}
include("connection.php");
$vehicle_chassis_number=$_POST['vehicle_chassis_number'];
$vehicle_company=$_POST['vehicle_company'];
$vehicle_engine_number=$_POST['vehicle_engine_number'];
$vehicle_id=$_POST['vehicle_id'];
$vehicle_insurance_amount=$_POST['vehicle_insurance_amount'];
$vehicle_insurance_company=$_POST['vehicle_insurance_company'];
$vehicle_insurance_date= $_POST['vehicle_insurance_date'];$explode_v_ins=explode('/',$vehicle_insurance_date);
$vehicle_insurance_expiry=$_POST['vehicle_insurance_expiry'];$explode_v_exp=explode('/',$vehicle_insurance_expiry);
$vehicle_insurance_id=$_POST['vehicle_insurance_id'];
$vehicle_insurance_type	=$_POST['vehicle_insurance_type'];
$vehicle_manufacturer=$_POST['vehicle_manufacturer'];
$vehicle_model	=$_POST['vehicle_model'];
$vehicle_number	=$_POST['vehicle_number'];
$vehicle_owner_qatar_id	=$_POST['vehicle_owner_qatar_id'];
$vehicle_purchase_date	=$_POST['vehicle_purchase_date'];$explode_v_pur=explode('/',$vehicle_purchase_date);
$vehicle_registration_date	=$_POST['vehicle_registration_date'];$explode_v_reg=explode('/',$vehicle_registration_date);
$vehicle_registration_expiry=$_POST['vehicle_registration_expiry'];$explode_v_regex=explode('/',$vehicle_registration_expiry);
$vehicle_registered_owner=$_POST['vehicle_registered_owner'];
$vehicle_registration_number=$_POST['vehicle_registration_number'];
$vehicle_assigned_employee=$_POST['vehicle_assigned_employee'];
$vehicle_assigned_company=$_POST['vehicle_assigned_company'];
$values=array();
$values['vehicle_id']=$vehicle_id;
$values['vehicle_number']=$vehicle_number;
$values['vehicle_manufacturer']=$vehicle_manufacturer;
$values['vehicle_model']=$vehicle_model;
$values['vehicle_purchase_date']=$explode_v_pur[2]."-".$explode_v_pur[1]."-".$explode_v_pur[0];
$values['vehicle_engine_number']=$vehicle_engine_number;
$values['vehicle_chassis_number']=$vehicle_chassis_number;
$values['vehicle_registration_number']=$vehicle_registration_number;
$values['vehicle_registration_date']=$explode_v_reg[2]."-".$explode_v_reg[1]."-".$explode_v_reg[0];
$values['vehicle_registration_expiry']=$explode_v_regex[2]."-".$explode_v_regex[1]."-".$explode_v_regex[0];
$values['vehicle_registered_owner']=$vehicle_registered_owner;
$values['vehicle_company']=$vehicle_company;
$values['vehicle_owner_qatar_id']=$vehicle_owner_qatar_id;
$values['vehicle_insurance_id']=$vehicle_insurance_id;
$values['vehicle_insurance_date']=$explode_v_ins[2]."-".$explode_v_ins[1]."-".$explode_v_ins[0];
$values['vehicle_insurance_expiry']=$explode_v_exp[2]."-".$explode_v_exp[1]."-".$explode_v_exp[0];
$values['vehicle_insurance_company']=$vehicle_insurance_company;
$values['vehicle_insurance_type']=$vehicle_insurance_type;
$values['vehicle_insurance_amount']=$vehicle_insurance_amount;
$values['vehicle_assigned_company']=$vehicle_assigned_company;
$values['vehicle_assigned_employee']=$vehicle_assigned_employee;
$values['sponsor_id']=$_SESSION['id'];
$vehicle_auto_id=$db->secure_insert("sm_vehicle",$values);
$vehicle_doc=array();
if(!empty($Vehicle_Pictures)){
    $vehicle_doc['vehicle_document_images']=$Vehicle_Pictures;
}
if(!empty($Owner_Qatar)){
    $vehicle_doc['vehicle_document_owner_qatar_id']=$Owner_Qatar;
}
if(!empty($Plate_Number)){
    $vehicle_doc['vehicle_document_plate_number']=$Plate_Number;
}
if(!empty($Registration_Document)){
    $vehicle_doc['vehicle_document_registration']=$Registration_Document;
}
if(!empty($Insurance_Documents)){
    $vehicle_doc['vehicle_document_insurance']=$Insurance_Documents;
}
if(!empty($Pollution_Certificate)){
    $vehicle_doc['vehicle_document_pollution']=$Pollution_Certificate;
}
if(!empty($NOC)){
    $vehicle_doc['vehicle_document_noc']=$NOC;
}
$vehicle_doc['vehicle_auto_id']=$vehicle_auto_id;
if(count($vehicle_doc)>0){
    $docs=$db->secure_insert("sm_vehicle_documents",$vehicle_doc);
    unset($_SESSION['Vehicle_Pictures']);
    unset($_SESSION['Owner_Qatar']);
    unset($_SESSION['Plate_Number']);
    unset($_SESSION['Registration_Document']);
    unset($_SESSION['Insurance_Documents']);
    unset($_SESSION['Pollution_Certificate']);
    unset($_SESSION['NOC']);
}
if(!empty($vehicle_auto_id)){
    echo "Successfull";
}

