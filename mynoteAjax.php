<?php

include("connection.php");
if(isset($_POST['mynote_note']) && isset($_POST['mynote_title'])) {
    $mynote_note = $_POST['mynote_note'];
    $mynote_title = $_POST['mynote_title'];
    $values = array();
    $values['mynote_title'] = $mynote_title;
    $values['mynote_data'] = $mynote_note;
    $inMyNote = $db->secure_insert("sm_mynote", $values);
}
