<?php
$today = date('Y-m-d');

$yesterday = date('Y-m-d', strtotime("-1 days"));

$daylen = 60 * 60 * 24;

$cur_date = date("d-m-Y");
$notif_day_before="";
$select_day=$db->selectQuery("SELECT `notification_day` FROM `sm_notification_days` WHERE `notification_type`='Vehicle'");
if(count($select_day)){
    $notif_day_before=$select_day[0]['notification_day'];
}
$vehicle_company_name = "";
$cmpMail = "";

$res_vehi_notif = $db->selectQuery("SELECT * FROM `sm_vehicle` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");

if (count($res_vehi_notif)) {

    for ($vi = 0; $vi < count($res_vehi_notif); $vi++) {

        $vehicle_id = $res_vehi_notif[$vi]['vehicle_id'];

        $vehicle_auto_id = $res_vehi_notif[$vi]['vehicle_auto_id'];

        $vehicle_company_id = $res_vehi_notif[$vi]['vehicle_company'];

        $res_veh_comp = $db->selectQuery("SELECT `company_name`,`company_email` FROM `sm_company` WHERE `company_id`='$vehicle_company_id'");

        if (count($res_veh_comp)) {
            $vehicle_company_name = $res_veh_comp[0]['company_name'];
            $cmpMail = $res_veh_comp[0]['company_email'];
        }
        $vehicle_registration_expiry = $res_vehi_notif[$vi]['vehicle_registration_expiry'];
        $insert_doc_date = new DateTime($vehicle_registration_expiry);
        $find_noti = (strtotime($vehicle_registration_expiry) - strtotime($cur_date)) / $daylen;
        $explode_doc_end_date = explode("-", $vehicle_registration_expiry);
        $ins_month_date=new DateTime($vehicle_registration_expiry);
        $ins_month=$ins_month_date->format("M");
        $ins_date = $explode_doc_end_date[2] . "-" . $ins_month . "-" . $explode_doc_end_date[0];
        $num_days = round($find_noti);
        if ($num_days < $notif_day_before && $num_days >= 0) {

            $values_v['notification_data'] = "Registration" . " " . "of Vehicle ID" . " " . $vehicle_id . " of " . $vehicle_company_name . " will expire on " . $ins_date;

            $values_v['notification_start_date'] = date("Y-m-d");

            $values_v['notification_title'] = "Registration";

            $values_v['document_end_date'] = $insert_doc_date->format("Y-m-d");

            $values_v['vehicle_auto_id'] = $vehicle_auto_id;

            $values_v['sponsor_id'] = $_SESSION['id'];

            $sel = $db->selectQuery("SELECT * FROM `sm_vehicle_notification` WHERE `vehicle_auto_id`='$vehicle_auto_id' AND `notification_title`='Registration'");

            $selCount = count($sel);

            if ($selCount == 0) {

                $in = $db->secure_insert("sm_vehicle_notification", $values_v);

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

Registration  of Vehicle ID' . ' ' . $vehicle_id . ' of ' . $vehicle_company_name . ' will expire on ' . $vehicle_registration_expiry

                        . '
                         </p>
                        </td>
                    </tr>
	' . $mail_foot;

                    $mail_to1 = mail($cmpMail, $subject1, $mail_content, $headers);

                }

            }

            unset($values_v);

        }
        //insurance
        $vehicle_insurance_expiry = $res_vehi_notif[$vi]['vehicle_insurance_expiry'];
        $insert_doc_date1 = new DateTime($vehicle_insurance_expiry);
       // echo $vehicle_insurance_expiry; die();

        $find_noti1 = (strtotime($vehicle_insurance_expiry) - strtotime($cur_date)) / $daylen;
        $num_days1 = round($find_noti);
        $explode_doc_end_date1 = explode("-", $vehicle_insurance_expiry);
        $ins_month_date1=new DateTime($vehicle_insurance_expiry);
        $ins_month1=$ins_month_date1->format("M");
        $ins_date1 = $explode_doc_end_date1[0] . "-" . $ins_month1 . "-" . $explode_doc_end_date1[2];
        if ($num_days1 < $notif_day_before && $num_days1 >= 0) {
            $values_v1['notification_data'] = "Insurance" . " " . "of Vehicle ID" . " " . $vehicle_id . " of " . $vehicle_company_name . " will expire on " . $ins_date1;
            $values_v1['notification_start_date'] = date("Y-m-d");
            $values_v1['notification_title'] = "Insurance";
            $values_v1['document_end_date'] = $insert_doc_date->format("Y-m-d");
            $values_v1['vehicle_auto_id'] = $vehicle_auto_id;
            $values_v1['sponsor_id'] = $_SESSION['id'];
            $sel1 = $db->selectQuery("SELECT * FROM `sm_vehicle_notification` WHERE `vehicle_auto_id`='$vehicle_auto_id'AND `notification_title`='Insurance'");
            $selCount1 = count($sel1);
            if ($selCount1 == 0) {
                $in = $db->secure_insert("sm_vehicle_notification", $values_v1);
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

                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">

    <tbody class="mcnTextBlockOuter">

        <tr>

            <td valign="top" class="mcnTextBlockInner">



                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnTextContentContainer">

                    <tbody><tr>



                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">



                            <h1>Notification Alert</h1>



<p>

Insurance  of Vehicle ID' . ' ' . $vehicle_id . ' of ' . $vehicle_company_name . ' will expire on ' . $vehicle_registration_expiry

                        . '</p>



</td>

                    </tr>

                </tbody></table>



            </td>

        </tr>

    </tbody>

</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">

    <tbody class="mcnTextBlockOuter">

        <tr>

            <td valign="top" class="mcnTextBlockInner">



                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnTextContentContainer">

                    <tbody><tr>



                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">



                            <h1>&nbsp;</h1>



<p>&nbsp;</p>



                        </td>

                    </tr>

                </tbody></table>



            </td>

        </tr>

    </tbody>

</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">

    <tbody class="mcnButtonBlockOuter">

        

	' . $mail_foot;

                    $mail_to2 = mail($cmpMail, $subject1, $mail_content, $headers);

                }

            }

            unset($values_v);

        }

    }


}