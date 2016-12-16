<?php
ob_start();
session_start();
include('connection.php');
//echo '<pre>'.print_r($_SESSION,True).'</pre>';
?> 
  <?php

			  if(isset($_POST['submit']))
			   {
					$b=$_POST['username'];
					$d=$_POST['password'];
					
					$sql="select * from cust where username='$b' and password='$d'and stat='Active' and status = '1'";
					$res=mysql_query($sql);
					$fetch=mysql_fetch_array($res);
					$num=mysql_num_rows($res);
				
					if($num == 1)
					{
						$_SESSION['id']=$fetch['id'];
						
						$a=$_SESSION['id'];
						echo(header('location:dashboard.php'));
	
					}
					else
					{
						echo("<script>location.href='login.php'</script>");
					}
					
			   }

				?>
              