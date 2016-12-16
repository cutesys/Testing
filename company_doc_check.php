<?php
include("connection.php");
if(isset($_POST['dc_data']) && isset($_POST['docu_title'])){
    $dc_data=$_POST['dc_data'];
    $docu_title=$_POST['docu_title'];
    $check=$db->selectQuery("SELECT `doc_id` FROM `sm_company_docs` WHERE `doc_title`='$docu_title' AND `doc_data`='$dc_data'");
    if(count($check)){
        $result = array("status" => "Value Exist!", "data_val" => "0","color" => "red");
        echo json_encode($result);
    }
    else{
        $result = array("status" => "", "data_val" => "1","color" => "green");
        echo json_encode($result);
    }
}
