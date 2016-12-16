<?php

include('connection.php');
if (isset($_POST['agent_phone'])) {
    $agent_id = $_POST['agent_id'];
	$agent_company = $_POST['agent_name'];
	$agent_address = $_POST['agent_building'];
	$agent_zipcode = $_POST['agent_zip'];
	$agent_state = $_POST['agent_state'];
	$agent_place = $_POST['agent_area'];
    $agent_country = $_POST['agent_country'];
	$agent_phone = $_POST['agent_phone'];
	$agent_email = $_POST['agent_email'];
	//$ = $_POST[''];
	//$ = $_POST[''];
	
    $result = array();
   // $check_id = $db->selectQuery("select * from sm_recruitment_agents where agent_country='$agent_country' and agent_place='$agent_place' and agent_status='1'");
   //$check_id = $db->selectQuery("select * from sm_recruitment_agents where agent_id='$agent_id' agent_status='1'");

    /*if (count($check_id)) {
        $result = array("Status" => "Agent Exists..", "data_val" => "0");
        echo json_encode($result);
    } else {*/

        //$manufacturer_name = $_REQUEST['manufacturer_name'];
        //$values[""] = $;
		//$values[""] = $;
		
		$randomNumber = rand(99, 1000);
        $agent_password=$agent_id.'_'.$randomNumber;
		$values["agent_area_id"] = $agent_id;
		$values["agent_company"] = $agent_company;
		$values["agent_address"] = $agent_address;
		$values["agent_zipcode"] = $agent_zipcode;
		$values["agent_state"] = $agent_state;
		$values["agent_place"] = $agent_place;
		$values["agent_country"] = $agent_country;
		$values["agent_phone"] = $agent_phone;
	    $values["agent_email"] = $agent_email;
		$values["agent_username"] = $agent_email;
		$values["agent_password"] = $agent_password;
		$values["agent_status"] = '1';

        $insert = $db->secure_insert("sm_recruitment_agents", $values);
        $result = array("Status" => "Added Successfully..", "data_val" => "1");
        echo json_encode($result);
		
		
		 
                if (!empty($insert)) {
                    $client_mail = 'swetha@cutesys.com';
                    $headers = 'MIME-Version: 1.0' . "\r\n";

                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $tmp = $headers;

                    $headers .= 'From:' . $client_mail . "\r\nReply-To:swetha@cutesys.com";

                    $mail_content = "";

                    $subject1 = "Registration Details";

                    $mail_head = file_get_contents("mail/mail_head.php");

                    $mail_foot = file_get_contents("mail/mail_agent.php");

                    $mail_content = $mail_head . '

	 <tr>

                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">

    <tbody class="mcnTextBlockOuter">

        <tr>

            <td valign="top" class="mcnTextBlockInner">



                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnTextContentContainer">

                    <tbody><tr>



                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">



                            <h2>Login Details</h2>



<p>

User name:' . ' ' . $agent_email . '</p>
<p>

Password:' . ' ' . $agent_password . '</p>



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

                    $mail_to2 = mail($agent_email, $subject1, $mail_content, $headers);

                }

            }
    
