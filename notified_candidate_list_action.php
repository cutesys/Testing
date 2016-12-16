<?php
include('connection.php');

	    $candidate_id = $_POST['candidate_id'];
		$candidate_code = $_POST['candidate_code'];
		
		$Date_of_travel1 = explode("-",$_POST['Date_of_travel']);
		$Date_of_travel=$Date_of_travel1[2]."-".$Date_of_travel1[1]."-".$Date_of_travel1[0];
		$arrival_time_format = explode(" ",$_POST['arrival_time']);
		//echo $arrival_time_format[0];
		 //$arrival_date_explod =explode("/",$arrival_time_format[0]);
		//echo $arrival_date = $arrival_date_explod[2]."-".$arrival_date_explod[1]."-".$arrival_date_explod[0];
		 //$arrival_time_format1 = $arrival_date_format[0];
		 //$arr=array($arrival_date,$arrival_time_format1);
		
		//$arrival_time = implode(" ",$arr);
		$arrival_time = $_POST['arrival_time'];
		$arrival_time_check = $_POST['arrival_time_check'];
		$departure_time_check = $_POST['departure_time_check'];
		$arrival_date1 = explode("-",$_POST['arrival_date']);
		$arrival_date = $arrival_date1[2]."-".$arrival_date1[1]."-".$arrival_date1[0];
		$departure_time = $_POST['departure_time'];
		$arrival_airport = $_POST['arrival_airport'];
		$flight_no = $_POST['flight_no'];
       
                $values["candidate_id"] = $candidate_id;
				$values["date_of_travel"] = $Date_of_travel;
				$values["arrival_date"] = $arrival_date;
				$values["Arrival_time"] = $arrival_time;
				$values["Departure_time"]=$departure_time;
				$values["arrival_airport"]=$arrival_airport;
				//$values["reason"]=$reason;
				$values["flight_no"]=$flight_no;
				$checkUserID = $db->selectQuery("SELECT `candidate_id` FROM sm_travelling_details WHERE `candidate_id`='$candidate_id'" );
			if ($checkUserID) {
			echo "Already confirmed";
			}
			else{
				if($departure_time_check>$arrival_time_check && $arrival_date==$Date_of_travel)
				{ echo "0";}
			else{
                $update = $db->secure_insert("sm_travelling_details", $values, "WHERE `candidate_id`='$candidate_id'");
				if($update){
					echo "1";
				}
				}
			}
			?>	
            
        
    

