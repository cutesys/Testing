<?php

if ($data_ready) {
    $client_mail = 'althayeservices@gmail.com';
    $subject = "Notification Alert";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $tmp = $headers;
    $headers .= 'From:' . $client_mail . "\r\nReply-To:althayeservices@gmail.com";
    $mail_to = mail($client_mail, $subject, $message_mail, $headers);
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
Home study for u is an online tutoring
service that provides world-class education
solutions to students across the globe.
We help students through online tutoring
sessions that are geared toward the needs of the individual.
</p>

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
        <tr>
            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-top-left-radius: 3px;border-top-right-radius: 3px;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;background-color: #2BAADF;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
                                <a class="mcnButton " title="Visit Now" href="http://client.sponsormaster.com.au" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Visit Now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table></td>
                            </tr>
	' . $mail_foot;
    $mail_to1 = mail($c, $subject1, $mail_content, $headers);


    echo("
<script>location.href='thankstu.php'</script>
");
}