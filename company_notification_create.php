<?php
$today = date('Y-m-d');

$yesterday = date('Y-m-d', strtotime("-1 days"));

$daylen = 60 * 60 * 24;

$cur_date = date("d-m-Y");

$cmpArray = array();
$notif_day_before="";
$select_day=$db->selectQuery("SELECT `notification_day` FROM `sm_notification_days` WHERE `notification_type`='Company'");
if(count($select_day)){
    $notif_day_before=$select_day[0]['notification_day'];
}
$comps = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `company_status`='1'");

if (count($comps) > 0) {

    for ($co = 0; $co < count($comps); $co++) {

        $coId = $comps[$co]['company_id'];

        $coName = htmlspecialchars_decode($comps[$co]['company_name']);

        $coEmail = $comps[$co]['company_email'];

        $expDate = 0;

        $doc = $db->selectQuery("SELECT * FROM `sm_company_docs` WHERE `company_id`='$coId' AND `doc_status`='1'");

        if (count($doc) > 0) {

            for ($d = 0; $d < count($doc); $d++) {

                $doc_title = $doc[$d]['doc_title'];

                $doc_data = $doc[$d]['doc_data'];

                $doc_owner = $doc[$d]['doc_owner'];

                $doc_id = $doc[$d]['doc_id'];

                $doc_start_date = $doc[$d]['doc_start_date'];

                $doc_end_date = $doc[$d]['doc_end_date'];
                $insert_doc_end_date1=new DateTime($doc_end_date);
                $insert_doc_end_date = $insert_doc_end_date1->format('Y-m-d');

// die($insert_doc_end_date);

                $find_noti = (strtotime($doc_end_date) - strtotime($cur_date)) / $daylen;

                $explode_doc_end_date=explode("-",$doc_end_date);
                $ins_month_date=new DateTime($doc_end_date);
                $ins_month=$ins_month_date->format("M");
                $ins_date=$explode_doc_end_date[2]."-".$ins_month."-".$explode_doc_end_date[0];

                $num_days = round($find_noti);

                if ($num_days < $notif_day_before && $num_days >= 0) {

                    $values['notification_data'] = $doc_title . " " . "for" . " " . $coName . " will expire on " . $ins_date;

                    $values['notification_start_date'] = date("Y-m-d");

                    $values['company_id'] = $coId;

                    $values['document_id'] = $doc_id;

                    $values['document_title'] = $doc_title;

                    $values['document_start_date'] = $doc_start_date;

                    $values['document_end_date'] = $insert_doc_end_date;

                    $sel = $db->selectQuery("SELECT * FROM `sm_notification` WHERE `company_id`='$coId' AND `document_id`='$doc_id'");

                    $selCount = count($sel);

                    if ($selCount == 0) {

                        $in = $db->secure_insert("sm_notification", $values);

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
<tr>
                        
                        <td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">
                        <h1>Notification Alert</h1>
                         <p>    ' . $doc_title . ' ' . 'for' . ' ' . $coName . ' will expire on ' . $doc_end_date . '
                         </p>
                        </td>
                    </tr>

' . $mail_foot;

                            $mail_to1 = mail($coEmail, $subject1, $mail_content, $headers);

                            $select_contacts = $db->selectQuery("SELECT * FROM `sm_company_contacts` WHERE `company_id`='$coId'");

                            if (count($select_contacts)) {

                                for ($cns = 0; $cns < count($select_contacts); $cns++) {

                                    $mail_contact = $select_contacts[$cns]['contact_email'];

                                    $contact_notification1 = $select_contacts[$cns]['contact_notification'];

                                    $contact_notification = explode(",", $contact_notification1);

                                    foreach ($contact_notification as $cn) {

                                        if ($cn == $doc_title) {

                                            $mail_to2 = mail($mail_contact, $subject1, $mail_content, $headers);

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

}