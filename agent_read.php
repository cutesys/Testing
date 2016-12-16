<?php
$suc_id="";
$page = "recruitment";
$tab = "agent";
$sub = "agent_list";
include('file_parts/header.php');
$id = $_GET['uid'];
if (isset($_REQUEST['suc_id']))
{
	$suc_id=$_REQUEST['suc_id'];
	
}

$resAge = $db->selectQuery("SELECT * FROM `sm_recruitment_agents` WHERE `agent_id`='$id'");
if (count($resAge)) {
	$agent_area = $resAge[0]['agent_area_id'];
    $agent_name = $resAge[0]['agent_company'];
	$agent_address = $resAge[0]['agent_address'];
	$agent_zipcode = $resAge[0]['agent_zipcode'];
	$agent_state = $resAge[0]['agent_state'];
	$agent_place = $resAge[0]['agent_place'];
	$agent_country = $resAge[0]['agent_country'];
	$agent_phone = $resAge[0]['agent_phone'];
	$agent_email = $resAge[0]['agent_email'];
	$agent_password = $resAge[0]['agent_password'];
	//$ = $resAge[0][''];
	  
}

?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Agent Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="agent_list.php">Agent</a>
                    </li>
                    <li>
                        Agent Profile
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            
                            <h4 class="mb-0"><strong><?php echo $agent_name; ?></strong> <?php //echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php //echo $employee_designation; ?></span>
                        </div>
                    </section>
                   
                    <section class="tile tile-simple">
                    </section>
                </div>

                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">
                        <!-- tile body -->
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a style="color:#16a085;" href="#">Profile</a></li>
                                    <li role="presentation"><a href="agent_edit.php?uid=<?php echo $_GET['uid'] ?>">Edit Profile</a></li>
									<li role="presentation"><a href="agent_password.php?uid=<?php echo $_GET['uid'] ?>">Settings</a></li>
                                    
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" action="employee_edit.php">
                                        <div class="wrap-reset">

                                            <form class="profile-settings">
											

                                                 

                                                    <h4 class="text-success mt-0 mb-20" id=""><?php echo $suc_id; ?></h4>
                                                     

                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>About</strong> Agent </h4>
                                                    </div>
													<div class="col-sm-5"> </div>
													
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="first-name">Agent Name</label>
                                                        <input type="text" class="form-control" name="f_name" id="f_name" readonly value="<?php echo $agent_name; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="last-name">Agent ID</label>
                                                        <input type="text" class="form-control" name="m_name" id="m_name" readonly value="<?php echo $agent_area; ?>">
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Agent Place</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $agent_place; ?>">
                                                    </div>
													 <div class="form-group col-sm-6">
                                                        <label for="Nationality">Agent Country</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $agent_country; ?>">
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="address1">Building No:</label>
														
                                                        <input type="text" class="form-control" name="p_address" readonly id="p_address" value="<?php echo $agent_address; ?>">
														 </div>
														 <div class="form-group col-sm-6">
														<label for="address1">State</label>
														<input type="text" class="form-control" name="" readonly id="p_address" value="<?php echo $agent_state; ?>">
														 </div>
														 </div>
														 <div class="row">
                                                   
														 <div class="form-group col-sm-6">
														<label for="address1">Post Box/Zipcode:</label>
                                                        <input type="text" class="form-control" name="" readonly id="p_address" value="<?php echo $agent_zipcode; ?>">
														</div>
														<div class="form-group col-sm-6">
														<label for="address1">Email:</label>
                                                        <input type="text" class="form-control" name="" readonly id="p_address" value="<?php echo $agent_email; ?>">
														</div>
														 </div>
														 <div class="row">
                                                    
														 <div class="form-group col-sm-6">
														<label for="address1">Phone:</label>
                                                        <input type="text" class="form-control" name="" readonly id="p_address" value="<?php echo $agent_phone; ?>">
                                                    
                                                    </div>
													</div>

                                                    
                                                </div>
                                                

<!--                                                <input type="submit" class="btn btn-info" name="save" value="Save">-->

                                                </div>

                                            </form>
                                        </div>
                                        <!-- Nav tabs -->
                                        <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                        <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                        <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                        <!--                                </ul>-->

                                        <!-- Tab panes -->
                                </div>
                                <!-- /tile body -->

                                </section>
                                <!-- /tile -->




                            </div>
                            <!-- /col -->











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

<script src="assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="assets/js/vendor/mixitup/jquery.mixitup.min.js"></script>
<!--/ vendor javascripts -->
<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->
        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        
        <!--/ Page Specific Scripts -->
<script>

 function print()
   {
  	
	window.open('printemp_profile.php?uid='+<?php echo $id;?>,'_blank');


   }

 </script>
        </body>

        <!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
        </html>


     