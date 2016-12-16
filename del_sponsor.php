<?php
include('connection.php');
 
	$id=$_GET['id'];
			
  $sql="DELETE FROM sponser where id ='$id'";
	
	mysql_query($sql);
    
  echo "<script>location.href='sponsor_list.php'</script>"; 
  ?>
	



