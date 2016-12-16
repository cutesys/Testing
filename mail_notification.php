<?php
include("connection.php");
echo "success";
if(isset($_POST['candidate_id'])){
	$candidate_id=$_POST['candidate_id'];
	$visaDetails = $db->selectQuery("SELECT CONCAT( sm_candidate.candidate_firstname,  ' ', sm_candidate.candidate_middlename,  ' ',
		sm_candidate.candidate_lastname ) AS candidate_name, sm_candidate_visa_process.candidate_id,sm_candidate_visa_process.visa_type,
		sm_candidate_visa_process.visa_no,sm_candidate_visa_process.visa_issued,sm_candidate_visa_process.visa_expiry,sm_candidate.candidate_email
		FROM sm_candidate
		LEFT JOIN sm_candidate_visa_process ON  sm_candidate.candidate_id=sm_candidate_visa_process.candidate_id
		WHERE  `visa_status`='Approved'");
//print_r ($visaDetails);die;

if (!empty($visaDetails)) {
					$mail_to = $visaDetails[0]['candidate_email'];
                    $from_mail = 'support@cutesys.com';
                    $headers = 'MIME-Version: 1.0' . "\r\n";

                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $tmp = $headers;

                    $headers .= 'From:' . $from_mail . "\r\nReply-To:support@cutesys.com";

                    $mail_content = "";

                    $subject1 = "Registration Details";

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



                            <h2>Visa Approval Mail</h2>


<p>hai' .$visaDetails[0]['candidate_name'] . ',</p>
<p> This is your confirmation mail for joining Technosteel </p>
<p>your visa has approved, Your visa Details are </p>
<p>Visa No : '.$visaDetails[0]['visa_no'] .'</p>
<p>Visa Issued Date: '.$visaDetails[0]['visa_issued']. '</p>
<p>Visa Expiry Date: '.$visaDetails[0]['visa_expiry']. '</p>
<p> if you will not present within 90 days from issued date,this opportunity will be disclosed</p>
<p>if you wish to come here please send the following details</p>
<p>Flight No:-</p>
<p>Date of Travel</P>
<p>Departure Time</p>
<p>Arrival Time</p>
<p>Thank you,</P>


</td>

                    </tr>

                </tbody></table>



            </td>

        </tr>

    </tbody>

</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">

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

                    $mail_to2 = mail($mail_to, $subject1, $mail_content, $headers);

}
}
?> 
