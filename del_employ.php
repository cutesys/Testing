<?php

include('connection.php');

$id = $_REQUEST['id'];

$sql = "update sm_employee set employee_status='0' where employee_id ='$id'";

mysql_query($sql);

echo "<script>location.href='employee_list.php'</script>";
?>








