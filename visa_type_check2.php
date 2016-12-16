


<?php

include('connection.php');
if (isset($_POST['visa'])) {
	 $value_array = array();
    $visa = $_POST["visa"];
	 foreach ($visa as $key) {
		 $visa_type=$value_array['visa_type_name'];
		$visa_days=$value_array['visa_type_days'];
		 if ($visa != "") {
        $check_id =$db->selectQuery("select * from sm_visa_type where visa_type_name='$visa_type' and visa_type_days='$visa_days' and visa_type_status='1'");
       if (count($check_id) > 0) {
                continue;
            }
        else {
               
                $insert = $db->secure_insert("sm_visa_type", $value_array);
            }
            
            
        }
    }
}
if (isset($_POST['key'])) {
    $visa = $_POST["key"];
    if ($visa != "") {
        $check_name = $db->selectQuery("select * from sm_visa_type where visa_type_name='$visa_type' and visa_type_days='$visa_days' and visa_type_status='1'");
        if (count($check_name) > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }
}
?>