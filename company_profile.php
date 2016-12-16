<?php
$page = "company";
$sub = "";
$success_msg = "";

include('file_parts/header.php');
?>
    <script>
			function image()
			{
			
				var image=document.getElementById('images_size');
				var img=image.files[0].size;
				var imgsize=Math.round(img/1024); 
        		 
        		if(imgsize > 250)
				{
					document.getElementById("imgerror").innerHTML ='File size should not exceed 250 kb';					
				}
				else
				{
				
					document.getElementById("imgerror").innerHTML ='';
				}
			
			}
	</script>
           
            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page page-profile">

                    <div class="pageheader">

                        <h2>Company Profile </h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="dashboard.php"><i class="fa fa-home"></i> Sponsor Master</a>
                                </li>
                                <li>
                                    <a href="#">Company</a>
                                </li>
								<li>
                                    <a href="companylist.php">Company List</a>
                                </li>
                                <li>
                                    <a href="#">Profile</a>
                                </li>
                            </ul>
                            
                        </div>

                    </div>

                    <!-- page content -->
                    <div class="pagecontent">


                        <!-- row -->
                        <div class="row">



<?php								
					//  $sql1="select * from sm_company where company_id='".$_GET['company_id']."' ";
		         // $qry=mysql_query($sql1);
		// $fe=mysql_fetch_array($qry);
					//{	
                
                
                
                $values = array();

$resFet = $db->selectQuery("select * from sm_company where company_id='".$_GET['company_id']."' ");

                             
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $values['company_name'] = $resFet[$rC]['company_name'];
        $values['company_pid'] = $resFet[$rC]['company_pid'];
        $values['company_email'] = $resFet[$rC]['company_email'];
        $values['company_id'] = $resFet[$rC]['company_id'];
        $values['company_phone'] = $resFet[$rC]['company_phone'];
        $values['company_fax'] = $resFet[$rC]['company_fax'];
        $values['company_owner'] = $resFet[$rC]['company_owner'];
        $values['company_about'] = $resFet[$rC]['company_about'];
        $values['company_address1'] = $resFet[$rC]['company_address1'];
        $values['company_address2'] = $resFet[$rC]['company_address2'];
        $values['company_door'] = $resFet[$rC]['company_door'];
        $values['company_city'] = $resFet[$rC]['company_city'];
        $values['company_region'] = $resFet[$rC]['company_region'];
        $values['company_postbox'] = $resFet[$rC]['company_postbox'];
        $values['company_sponsor_fee'] = $resFet[$rC]['company_sponsor_fee'];
      //  $cmpArray["data"][] = $values;
    }
}
                                
								
						
?>
<!--code for updation--->
<?php

if (isset($_POST['submit'])) {
    $company_pid = $_POST['company_pid'];
	$company_email = $_POST['company_email'];
	$company_name = $_POST['company_name'];
	$company_fax = $_POST['company_fax'];
	$company_owner = $_POST['company_owner'];
	$company_sponsor_fee = $_POST['company_sponsor_fee'];
	$company_address1 = $_POST['company_address1'];
	$company_address2 = $_POST['company_address2'];
	$company_door = $_POST['company_door'];
	$company_city = $_POST['company_city'];
	$company_region = $_POST['company_region'];
	$company_postbox = $_POST['company_postbox'];
	$company_phone = $_POST['company_phone'];
	$company_about = $_POST['company_about'];
    
    $values = array();
    $values['company_pid'] = $company_pid;
	$values['company_email'] = $company_email;
	$values['company_name'] = $company_name;
	$values['company_fax'] = $company_fax;
	$values['company_owner'] = $company_owner;
	$values['company_sponsor_fee'] = $company_sponsor_fee;
	$values['company_address1'] = $company_address1;
	$values['company_address2'] = $company_address2;
	$values['company_door'] = $company_door;
	$values['company_city'] = $company_city;
	$values['company_region'] = $company_region;
	$values['company_postbox'] = $company_postbox;
	$values['company_phone'] = $company_phone;
	$values['company_about'] = $company_about;
	
    
    $update = $db->secure_update($db->db_prefix . 'company', $values, " WHERE company_id='".$_GET['company_id']."' ");
    if (count($update)) {
        $success_msg = "Values Updated!";
		}
		else
		{
		$success_msg = "Error in updation";
		}
    
}

?>
 <!-- code for updation ends -->
                
                



                            <!-- col -->
                            <div class="col-md-4">

                                <!-- tile -->
                                <section class="tile tile-simple">

                                    <!-- tile widget -->
                                    <div class="tile-widget p-30 text-center">
                        <?php  if(empty($values['file1']))
						{
							echo "No image";
							
						}
						else
						{
				        ?>
                                        <div class="thumb thumb-xl">
                                            <img class="img-circle" src="img/<?php echo $values['file1'] ?>" alt="">
											
                                        </div>
										<?php
			                            }
			                            ?>
                                        <h4 class="mb-0"><?php echo $values['company_name'] ?></h4>
                                        <!--<span class="text-muted">Project Manager</span>-->
                                       <!-- <div class="mt-10">
                                            <button class="btn btn-rounded-20 btn-sm btn-greensea">Follow</button>
                                            <button class="btn btn-rounded-20 btn-sm btn-lightred">Message</button>
                                        </div>-->

                                    </div>
                                    <!-- /tile widget -->

                                    <!-- tile body -->
                                    <div class="tile-body text-center bg-blue p-0">

                                       <!-- <ul class="list-inline tbox m-0">
                                            <li class="tcol p-10">
                                                <h2 class="m-0">695</h2>
                                                <span class="text-transparent-white">Tweets</span>
                                            </li>
                                            <li class="tcol bg-blue dker p-10">
                                                <h2 class="m-0">1 269</h2>
                                                <span class="text-transparent-white">Followers</span>
                                            </li>
                                            <li class="tcol p-10">
                                                <h2 class="m-0">369</h2>
                                                <span class="text-transparent-white">Following</span>
                                            </li>
                                        </ul>-->

                                    </div>
                                    <!-- /tile body -->

                                </section>
                                <!-- /tile -->


                                <!-- tile -->
                                <section class="tile tile-simple">

                                    <!-- tile header -->
                                    <div class="tile-header">
                                        <h1 class="custom-font"><strong>About</strong> Company</h1>
                                    </div>
                                    <!-- /tile header -->

                                    <!-- tile body -->
                                    <div class="tile-body">

                                        <!--<p>
                                            <a href="#" class="myIcon icon-info icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="myIcon icon-primary icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="myIcon icon-lightred icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-google-plus"></i></a>
                                            <a href="#" class="myIcon icon-hotpink icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-dribbble"></i></a>
                                        </p>-->

                                        <p class="text-default lt"><?php echo $values['company_about'] ?></p>
										<?php 
				                                                   if(empty($values['company']))
																	{
																	echo "";
				 	
																	}
																	else
																	{
																	echo $values['company']; 
				 
																	}	
				
																?>

                                    </div>
                                    <!-- /tile body -->

                                </section>
                                <!-- /tile -->

                                <!-- tile -->
                                <section class="tile tile-simple">
								

                                    <!-- tile header -->
                                   <!-- <div class="tile-header">
                                        <h1 class="custom-font"><strong>Friend</strong> List</h1>
                                    </div><!--
                                    <!-- /tile header -->
									<?php								
					  /*$sql2="select * from sm_company_contacts where company_id='".$_GET['company_id']."' ";
		          $qry2=mysql_query($sql2);
					while($fe2=mysql_fetch_array($qry2))	
					{	*/			
						
?>

                                    <!-- tile body -->
                                   <!-- <div class="tile-body">

                                        <div class="media ">
                                            <div class="pull-left thumb">
                                                <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                            </div>
                                            <div class="pull-right mt-5">
                                                <a href="contact_more.php?contact_id=<?php //echo $fe2['contact_id']; ?>&company_id=<?php// echo $fe2['company_id']; ?>"
 												title="Edit" type="button" class="btn btn-lightred mb-10" style="width:100px;">More info</a>
                                                <!--<button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>-->
                                                <!--<button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>-->
                                           <!-- </div>
											
                                            <div class="media-body">
                                                <p class="media-heading mb-0 mt-10"><?php// echo $fe2['contact_name'];?></p>
                                                <small class="text-lightred"><?php //echo $fe2['contact_designation'];?></small>
                                            </div>
                                        </div>

                                        <hr/>

                                       
                                      

                                    </div>-->
                                    <!-- /tile body -->
									 <?php	//} ?>

                                </section>
                                <!-- /tile -->

                                <!-- tile -->
                               <!--- <section class="tile tile-simple">

                                   
                                    <div class="tile-header">
                                        <h1 class="custom-font"><strong>My</strong> Projects</h1>
                                    </div>
                                   
                                    <div class="tile-body">

                                        <ul class="list-unstyled">

                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Minimal
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="progress progress-striped not-rounded">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                                                                56%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Minoral
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="progress progress-striped not-rounded">
                                                            <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                                90%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        The Kamarel
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="progress progress-striped not-rounded">
                                                            <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100" style="width: 36%">
                                                                36%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Themeforest
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="progress progress-striped not-rounded">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width: 8%">
                                                                8%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                        </ul>


                                    </div>
                                   

                                </section>-->
                                <!-- /tile -->


                            </div>
                            <!-- /col -->






                            <!-- col -->
                            <div class="col-md-8">

                                <!-- tile -->
                                <section class="tile tile-simple">

                                    <!-- tile body -->
                                    <div class="tile-body p-0">

                                        <div role="tabpanel">

                                            <!-- Nav tabs -->
<!--                                            <ul class="nav nav-tabs tabs-dark" role="tablist">
                                                <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>
                                            </ul>-->

                                            <!-- Tab panes -->
                                            <div class="tab-content">


                                                <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                                    <div class="wrap-reset">

                                                        <form class="profile-settings" action="" name="" method="post" enctype="multipart/form-data">
                                                        <h3 class="text-success mt-0 mb-20"><?php echo $success_msg; ?></h3>
                                                            <div class="row">
                                                                <div class="form-group col-md-12 legend">
                                                                    <h4><strong>About</strong> Company</h4>
                                                                    <!--<p>Your personal account settings</p>-->
																	
                                                                </div>
																
																
                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="first-name">Company ID</label>
                                                                    <input type="text" class="form-control" id="first-name" name="company_pid" value="<?php echo $values['company_pid']; ?>">
                                                                </div>
																 <div class="form-group col-sm-6">
                                                                    <label for="first-name">Email</label>
                                                                    <input type="text" class="form-control" id="first-name" name="company_email" value="<?php echo $values['company_email'];?>">
                                                                </div>
																
																
                                                               </div>
                                                               
															<div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address1">Company Name:</label>
                                                                    <input type="text" class="form-control" id="address1" name="company_name" value="<?php echo $values['company_name'];?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address2">Fax:</label>
                                                                    <input type="text" class="form-control" id="address2" name="company_fax" value="<?php echo $values['company_fax'];?>">
                                                                </div>

                                                            </div>
															<div class="row">
															<div class="form-group col-sm-6">
                                                                    <label for="address1">Owner:</label>
                                                                    <input type="text" class="form-control" id="address1" name="company_owner" value="<?php echo $values['company_owner'];?>">
                                                                </div>

                                                                 <div class="form-group col-sm-6">
                                                                    <label for="address1">Sponsorship Fee</label>
                                                                    <input type="text" class="form-control" name="company_sponsor_fee" id="address1" value="<?php echo $values['company_sponsor_fee'];?>">
                                                                </div>

                                                                 

                                                            </div>
                                                           

                                                            <div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address1">Address Line 1</label>
                                                                    <input type="text" class="form-control" id="address1" name="company_address1" value="<?php echo $values['company_address1'];?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address2">Address Line 2</label>
                                                                    <input type="text" class="form-control" id="address2" name="company_address2" value="<?php echo $values['company_address2'];?>">
                                                                </div>

                                                            </div>
															<div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address1">Door No</label>
                                                                    <input type="text" class="form-control" id="address1" name="company_door" value="<?php echo $values['company_door'];?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address2">City</label>
                                                                    <input type="text" class="form-control" id="address2" name="company_city" value="<?php echo $values['company_city'];?>">
                                                                </div>

                                                            </div>
															<div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address1">Region</label>
                                                                    <input type="text" class="form-control" id="address1" name="company_region" value="<?php echo $values['company_region'];?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address2">Postbox</label>
                                                                    <input type="text" class="form-control" id="address2" name="company_postbox" value="<?php echo $values['company_postbox'];?>">
                                                                </div>

                                                            </div>
															<div class="row">
															
																<div class="form-group col-sm-6">
                                                                    <label for="address1">Phone No</label>
                                                                    <input type="text" class="form-control" name="company_phone" id="address1" value="<?php echo $values['company_phone'];?>">
                                                                </div>
															 <div class="form-group col-sm-6">
                                            <label for="message">About Company: </label>
                                            <textarea class="form-control" rows="6" name="company_about" id="message"><?php echo $values['company_about'];?></textarea>
                                        </div>
										</div>
															<?php								
//					  $sql3="select * from sm_company_docs where company_id='".$_GET['company_id']."' ";
//					  $i=0;
//		          $qry3=mysql_query($sql3);
//					while($fe3=mysql_fetch_array($qry3))	
//					{				
//						
//?>

<!--                                                            <div class="row">
															
															

                                                                <div class="form-group col-sm-4">
                                                                    <label for="city"></label>
																	<input type="text" name="docs[]" value="//<?php //echo $fe3['doc_title']; ?>"  class="form-control addt_text" style="background-color: #fff;border-color:#fff; cursor: default;margin-top:-28px;">
                                                                    <input type="text" class="form-control" name="docs[]" id="city" value="//<?php // echo $fe3['doc_data']; ?>">
                                                                </div>
																
																 <div class="form-group col-sm-4">
                                                                    <label for="state">Start Date</label>
																	 <div class='input-group datepicker w-260 mt-10' data-format="L">
																	 
                                                                    <input type="text" class="form-control"  name="docs[]" value="//<?php // echo $fe3['doc_start_date']; ?>">
															<span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>	
											 </div>	
											  <div class="form-group col-sm-4">
                                                                    <label for="state">End Date</label>
																	 <div class='input-group datepicker w-260 mt-10' data-format="L">
                                                                    <input type="text" class="form-control"  name="docs[]" value="//<?php // echo $fe3['doc_end_date']; ?>">
															<span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>	
											 </div>	

                                                                </div>-->
																
																 <?php //$i++;} ?>
                                                              
																	
																 <?php								
					  /*$sql4="select * from sm_company_files where company_id='".$_GET['company_id']."' ";
		          $qry4=mysql_query($sql4);
					while($fe4=mysql_fetch_array($qry4))	
					{				
						
?>
																<!--<div class="row">
																 <div class="form-group col-sm-6">
                                                                    <label for="address1"><?php// echo $fe4['file_title']; ?></label>
                                                                     <input type="file" id="images_size" name="file_name" onchange="image();" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
                                                                   <span class="help-block" id="imgerror"></span>
                                                                </div>
                                                            </div>-->
															 <?php	}*/ ?>
															<!--<input type="submit" name="submit" class="btn btn-rounded btn-success btn-sm" value="Update">-->

							<?php $cid= $_GET['company_id']; ?>
                                                            <input type="hidden" name="idd" value="<?php echo $cid;?>">
                                                            <input type="submit" name="submit" class="btn btn-rounded btn-success btn-sm" value="Update">	
															    
															
                                                        </form>
														
														
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /tile body -->

                                </section>
                                <!-- /tile -->

                            </div>
                            <!-- /col -->






					<?php//	} ?> 
					
					



                        </div>
                        <!-- /row -->

                    </div>
                    <!-- /page content -->

                </div>
                
            </section>
            <!--/ CONTENT -->

        </div>
        <!--/ Application Content -->









        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="assets/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
		<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
		<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){

            });
        </script>
        <!--/ Page Specific Scripts -->





       

    </body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>
