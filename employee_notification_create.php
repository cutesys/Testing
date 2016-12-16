<?php
$cmpName = "";

$today = date('Y-m-d');

$yesterday = date('Y-m-d', strtotime("-1 days"));

$daylen = 60 * 60 * 24;

$cur_date = date("d-m-Y");
$notif_day_before="";
$select_day=$db->selectQuery("SELECT `notification_day` FROM `sm_notification_days` WHERE `notification_type`='Employee'");
if(count($select_day)){
    $notif_day_before=$select_day[0]['notification_day'];
}
$cmpMail="";
$empId="";

$empz = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_status`='1'");

if (count($empz) > 0) {

    $values = array();

    for ($em = 0; $em < count($empz); $em++) {

        $empId = $empz[$em]['employee_id'];

        $cmpId = $empz[$em]['employee_company'];

        $empEmail = $empz[$em]['employee_email'];

        $emp_name = $empz[$em]['employee_firstname'] . " " . $empz[$em]['employee_middlename'] . " " . $empz[$em]['employee_lastname'];

        $resCmpName = $db->selectQuery("SELECT `company_name`,`company_email` FROM `sm_company` WHERE `company_id`='$cmpId'");

        if (count($resCmpName) > 0) {

            $cmpName = $resCmpName[0]['company_name'];

            $cmpMail = $resCmpName[0]['company_email'];

        }

        $doc_n = $db->selectQuery("SELECT * FROM `sm_employee_documents` WHERE `employee_id`='$empId' AND `status`='1'");

        if (count($doc_n) > 0) {

            $values = array();

            for ($d = 0; $d < count($doc_n); $d++) {
                $values = array();
                $doc_title = $doc_n[$d]['document_title'];
                $doc_id = $doc_n[$d]['document_id'];
                $doc_start_date = $doc_n[$d]['document_start_date'];
                $doc_end_date = $doc_n[$d]['document_end_date'];
                $insert_doc_date = new DateTime($doc_end_date);
                $find_noti = (strtotime($doc_end_date) - strtotime($cur_date)) / $daylen;
                $num_days = round($find_noti);
                $explode_doc_end_date = explode("-", $doc_end_date);
                $ins_month_date=new DateTime($doc_end_date);
                $ins_month=$ins_month_date->format("M");
                $ins_date = $explode_doc_end_date[2] . "-" . $ins_month . "-" . $explode_doc_end_date[0];
                if ($num_days < $notif_day_before && $num_days >= 0) {
                    $values['notification_data'] = $doc_title . " " . "for" . " " . $emp_name . " of " . $cmpName . " will expire on " . $ins_date;
                    $values['notification_start_date'] = date("Y-m-d");
                    $values['document_title'] = $doc_title;
                    $values['document_end_date'] = $insert_doc_date->format("Y-m-d");
                    $values['document_id'] = $doc_id;
                    $values['employee_id'] = $empId;
                    $sel = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE `employee_id`='$empId' AND `document_id`='$doc_id'");
                    $selCount = count($sel);
                    if ($selCount == 0) {
                        try{
                        $in = $db->secure_insert("sm_notification_employee", $values);
                           if(empty($in)) {
                               throw new Exception("error");
                            }
                        }
                        catch(Exception $e){
                            echo "##################";
                        }
                        if (!empty($in)) {
                            $client_mail = 'althayeservices@gmail.com';
                            $headers = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $tmp = $headers;
                            $headers .= 'From:' . $client_mail . "\r\nReply-To:althayeservices@gmail.com";
                            $mail_content = "";
                            $subject1 = "Notification Alert!";
                            $mail_head = file_get_contents("mail/mail_head.php");
                            $mail_foot = file_get_contents("mail/mail_foot.php");
                            $mail_content = $mail_head . '
	  <td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">
                        <h1>Notification Alert</h1>
                         <p>   

' . $doc_title . ' ' . 'for' . ' ' . $emp_name . ' of ' . $cmpName . ' will expire on ' . $doc_end_date

                                . '
                                </p>
                        </td>
                    </tr>
	' . $mail_foot;

                            $mail_to_employee = mail($empEmail, $subject1, $mail_content, $headers);
                            $mail_to_company = mail($cmpMail, $subject1, $mail_content, $headers);
                        }

                    }
                    else{

                    }
                }
            }
        }
    }
}

?>