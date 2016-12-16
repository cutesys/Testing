
<?php
include('connection.php');

	if(isset($_POST['work_site'])&&($_POST['site_location']))
	{
		$work_site 		= $_POST['work_site'];
		$site_location 	= $_POST['site_location'];
		$id 			= $_POST['worksite_id'];
			

		
		   // $values = array();
			if ($work_site != "" && $site_location != "")
			{
		
				   // $result = array();
					$check = $db->selectQuery("SELECT `id` FROM `sm_work_site` WHERE `work_site`='$work_site' AND `site_location`='$site_location' AND `id`!='$id'");
					if (count($check) > 0) {
						//echo "exist";
						$fail="1";
						header('location:worksite_edit.php?uid='.$id.'&msg='.$fail.'');
					  // continue;
					} else { 
						  
							$vals['work_site'] 		= $_POST['work_site'];
							$vals['site_location'] 	= $_POST['site_location'];
							$vals['id'] 			= $_POST['worksite_id']; 
					   
							$check1=$db->secure_update("sm_work_site", $vals, "WHERE `id`='$id' ");
							if(count($check1)>0)
							{
								$success="Updated Successfully";
								echo $success;
								echo " <script>location.href='worksite_list.php'</script>";
							}
							else
							{
								$success="Error in updation";
							}
							
							//header('location:worksite_list.php?uid='.$id.'&suc_id='.$success.'');
							//header('location:worksite_list.php');
						}
		
			}
	}
?>