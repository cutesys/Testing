<?php



include("connection.php");

if (isset($_POST['interview_id'])) {

    $interview_id = $_POST['interview_id'];

    $values = array();

    $values['interview_status'] = "Active";

    $delete_interview = $db->secure_update("sm_interview", $values, "WHERE `interview_id`='$interview_id'");

    unset($values);

    if (!empty($delete_interview)) {

        echo "Record restored";

    }

}