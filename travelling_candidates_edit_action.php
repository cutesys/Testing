<?php
include("connection.php");

if(isset($_POST['candidate_id'])){
	//echo "hello";
	$candidate_id = $_POST['candidate_id'];
		$candidate_code = $_POST['candidate_code'];
		//echo $candidate_id;
		$Date_of_travel1 = explode("-",$_POST['Date_of_travel']);
		$Date_of_travel=$Date_of_travel1[2]."-".$Date_of_travel1[1]."-".$Date_of_travel1[0];
		$Date_of_arrival1=explode("-",$_POST['Date_of_travel']);
		$Date_of_arrival=$Date_of_arrival1[2]."-".$Date_of_arrival1[1]."-".$Date_of_arrival1[0];
		$arrival_time = $_POST['arrival_time'];
		$departure_time = $_POST['departure_time'];
		$arrival_airport = $_POST['arrival_airport'];
		$flight_no = $_POST['flight_no'];
       
                //$values["candidate_id"] = $candidate_id;
				$values["date_of_travel"] = $Date_of_travel;
				$values["arrival_date"] = $Date_of_arrival;
				$values["Arrival_time"] = $arrival_time;
				$values["Departure_time"]=$departure_time;
				$values["arrival_airport"]=$arrival_airport;
				//$values["reason"]=$reason;
				$values["flight_no"]=$flight_no;
				
                $update = $db->secure_update("sm_travelling_details", $values, "WHERE `candidate_id`='$candidate_id'");
				if($update){
					echo "Updated Successfully";
				}
			
}
?>