<?php

function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files) {
    $from = $senderName . " <" . $senderMail . ">";
    $headers = "From: $from";
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";

    if (count($files) > 0) {
        for ($i = 0; $i < count($files); $i++) {
            if (is_file($files[$i])) {
                $message .= "--{$mime_boundary}\n";
                $fp = @fopen($files[$i], "rb");
                $data = @fread($fp, filesize($files[$i]));
                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"" . basename($files[$i]) . "\"\n" .
                        "Content-Description: " . basename($files[$i]) . "\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"" . basename($files[$i]) . "\"; size=" . filesize($files[$i]) . ";\n" .
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
    }

    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $senderMail;
    $mail = @mail($to, $subject, $message, $headers, $returnpath);
    if ($mail) {
        echo "E-mail has been send";
        return TRUE;
    } else {
        return FALSE;
    }
}

if (isset($_POST['imgVal'])) {
    $message = "";
    include("connection.php");
    $mail_content = "";
    $employee_id = $_POST['employee_id'];
    $email = $_POST['send_email'];
    $email_subject = $_POST['gal_subject'];
    $gal_remarks = $_POST['gal_remarks'];
    $files = $_POST['imgVal'];
    $array_img = array();
    $client_mail = 'althayeservices@gmail.com';
    $select_emp_data = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$employee_id'");
    if (count($select_emp_data) > 0) {
        $emloyee_name = $select_emp_data[0]['employee_firstname'] . " " . $select_emp_data[0]['employee_middlename'] . " " . $select_emp_data[0]['employee_lastname'];
        $message = "<table>"
                . "<tr>"
                . "<td><b>Employee Name</b>: " . $emloyee_name . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td><b>Remarks</b>: " . $gal_remarks . "</td>"
                . "</tr>"
                . "</table>";
    }


    $explode_email = explode(",", $email);
    foreach ($explode_email as $email_id) {
        multi_attach_mail($email_id, $email_subject, $message, $client_mail, "", $files);
    }

    //mail function
}