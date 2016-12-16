<?php

include('connection.php');
$evId = $_REQUEST['event_id'];
$db->executeQuery("delete from event where id='$evId'");
echo "ok";
