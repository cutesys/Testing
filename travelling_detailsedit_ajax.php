<?php
include("connection.php");
if(isset($_POST['edit_id'])){
	$edit_id = $_POST['edit_id'];
		$select_data = $db->selectQuery("SELECT `date_of_travel`,`arrival_date`,`Departure_time`,`Arrival_time`,`flight_no`,`arrival_airport` FROM sm_travelling_details WHERE  `candidate_id`='$edit_id'");
		if(count($select_data)>0){
		 
         $flight_no= $select_data[0]['flight_no'];
		 $arrival_airport= $select_data[0]['arrival_airport'];
         $date_of_travel1= explode("-",$select_data[0]['date_of_travel']);
		 $date_of_travel = $date_of_travel1[2]."-".$date_of_travel1[1]."-".$date_of_travel1[0];
		 $date_of_arrival1= explode("-",$select_data[0]['arrival_date']);
		 $date_of_arrival = $date_of_arrival1[2]."-".$date_of_arrival1[1]."-".$date_of_arrival1[0];
		 $Departure_time= $select_data[0]['Departure_time'];
		 $Arrival_time = $select_data[0]['Arrival_time'];
				 $result=array("flight_no"=> $flight_no,"arrival_airport"=> $arrival_airport,"date_of_arrival"=>$date_of_arrival,"date_of_travel"=>$date_of_travel,"Departure_time"=>$Departure_time,"Arrival_time"=>$Arrival_time);
				 echo json_encode($result);

	//}
}
			
}
?>