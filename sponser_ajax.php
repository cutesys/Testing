<?php

include("./connection.php");
if (isset($_POST['ids'])) {
    $sponsId = $_POST['ids'];
    $sql = mysql_query("update sponser set stat='Paid' where id ='$sponsId'");
    echo "ok";
}