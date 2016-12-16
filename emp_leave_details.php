<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');
$id = $_GET['uid'];
$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");

if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_employment_id=$resEmp[0]['employee_employment_id'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
	$employee_fee = $resEmp[0]['employee_fee'];
	$employee_salary = $resEmp[0]['employee_salary'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_dob = $resEmp[0]['employee_dob'];
    //$employee_dob=$expl_employee_dob1[0]."/".$expl_employee_dob1[1]."/".$expl_employee_dob1[0];
    $employee_doj1 = explode("-",$resEmp[0]['employee_joining_date']);
    $employee_doj=$employee_doj1[2]."/".$employee_doj1[1]."/".$employee_doj1[0];
    $employee_remarks = $resEmp[0]['employee_remarks'];
    $employee_peraddress1 = $resEmp[0]['employee_peraddress1'];
    $employee_peraddress2 = $resEmp[0]['employee_peraddress2'];
    $employee_perdoor = $resEmp[0]['employee_perdoor'];
    $employee_percity = $resEmp[0]['employee_percity'];
    $employee_perstate = $resEmp[0]['employee_perstate'];
    $employee_perzip = $resEmp[0]['employee_perzip'];
    $employee_resiaddress1 = $resEmp[0]['employee_resiaddress1'];
    $employee_resiaddress2 = $resEmp[0]['employee_resiaddress2'];
    $employee_residoor = $resEmp[0]['employee_residoor'];
    $employee_resicity = $resEmp[0]['employee_resicity'];
    $employee_resistate = $resEmp[0]['employee_resistate'];
    $employee_zip = $resEmp[0]['employee_zip'];
    $employee_email = $resEmp[0]['employee_email'];
    $employee_phone = $resEmp[0]['employee_phone'];
    $employee_emcontact = $resEmp[0]['employee_emcontact'];
    $sponsor_id = $resEmp[0]['sponsor_id'];
	    
		$star = $db->selectQuery("SELECT sm_employee_performance.employee_id,sm_employee_performance.rating1,sm_rating.value,sm_rating.id FROM sm_employee_performance INNER JOIN sm_rating ON sm_employee_performance.rating1=sm_rating.id  WHERE sm_employee_performance.status='active' AND sm_employee_performance.employee_id='$id'");
			if (count($star)>0){
				$sum_rating=$average=0;
				for ($i = 0; $i < count($star); $i++){	
				 $rating_value  = $star[0]['value'];	
				 $sum_rating = $sum_rating+$rating_value;
				 $average=($sum_rating/count($star));
				 if(count($star)>0){
				 $averages = (round($average));
			} 
			} 
			}else {
				$averages ="";
			}
						

}
			
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `file_title`='Profile_Picture' AND `file_status`='1' AND `employee_id`='$id'");
if (count($resLogo)) {
    $dpImg = $resLogo[0]['file_name'];
} else {
    $dpImg = "assets/images/profile-default.png";
}
?>
<style>
.custom {
    width: 105px !important;
}
</style>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Employee Leave Details<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> SME </a>
                    </li>
                    <li>
                        <a href="employee_list.php">Employee</a>
                    </li>
                    <li>
                       <a href=""> Employee Profile</a>
                    </li>
					 <li>
                        <a href=""> Employee Leave</a>
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

                            <div class="thumb thumb-xl">
                                <img class="img-circle" src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $employee_firstname; ?></strong> <?php echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>
                        </div>
                    </section>
                    <section class="tile tile-simple">
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php echo $employee_firstname; ?> <span></span> <?php echo $employee_lastname; ?> </h1></br>
							<div id="raty2" class="text-lg inline-block"></div><br/>
                        </div>
                        <div class="tile-body">
                            <p class="text-default lt"><?php echo $employee_remarks; ?></p>
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
                                    <li role="presentation"><a href="employee_edit.php?uid=<?php echo $_GET['uid'] ?>">Edit Profile</a></li>
                                    <li role="presentation"><a href="employee_gallery.php?uid=<?php echo $_GET['uid'] ?>">Documents</a></li>
									<li role="presentation"><a href="employee_gallery.php?uid=<?php echo $_GET['uid'] ?>">Leave Details</a></li>
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" action="employee_edit.php">
                                        <div class="wrap-reset">

                                            <form class="profile-settings">

                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>Leave</strong> Details </h4>
														
                                                    </div>
													<div class="col-sm-5"> </div>
													
                                                </div>
												  <div class="row">
												  <div class="col-sm-3"> </div>
												 <button type="button" class="btn btn-primary custom  mb-10" type="button" ><a style="color:#fff;text-align:center;" href="emp_casual_leave.php?uid=<?php echo $_GET['uid'] ?>">Casual  Leave </a></button>
												 </div>
												 <div class="row"> <div class="col-sm-3"> </div></div>
												  <div class="row">
												  <div class="col-sm-3"> </div>
												 <button type="button" class="btn btn-primary custom   mb-10" type="button"><a style="color:#fff ;text-align:center;" href="emp_medical_leave.php?uid=<?php echo $_GET['uid'] ?>">Medical Leave</a></button>
												 </div>
													 <div class="row"> <div class="col-sm-3"> </div></div>
												  <div class="row">
												  <div class="col-sm-3"> </div>
												 <button type="button" class="btn btn-primary custom  mb-10" type="button"><a style="color:#fff ;text-align:center;" href="emp_annual_leave.php?uid=<?php echo $_GET['uid'] ?>">Annual Leave</a></button>
												  </div>
                                               
                                               <div class="row">
												  <div class="col-sm-3"> <br><br><br></div>
												 
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

 <script src="assets/js/vendor/raty-fa/jquery.raty-fa.js"></script>
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
    $('#raty2').raty({
                    score: <?php echo $averages ?>,
                    starOff: 'fa fa-star-o text-orange',
                    starOn: 'fa fa-star text-orange',
                    //target : '#hint2',
                    targetType : 'number',
                    targetKeep : true
                });

 </script>
        </body>

        <!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
        </html>


     