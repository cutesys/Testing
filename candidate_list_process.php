<?php

include('connection.php');
if (isset($_POST['hiddn'])) {
    $hiddn = $_POST['hiddn'];
    $values = array();
    $values['candidate_status'] = 0;
    $delete_rej = $db->secure_update("sm_candidate", $values, "WHERE `candidate_id`='$hiddn'");
    unset($values);
    if (!empty($delete_rej)) {
        echo "Candidate deleted";
    }
}