<?php
$page = "recruitment";
$tab = "agent";
$sub = "agent_list";
include('file_parts/header.php');
$success = "";
$id = $_GET['uid'];
$resAge = $db->selectQuery("SELECT * FROM `sm_recruitment_agents` WHERE `agent_id`='$id'");
if (count($resAge)) {
	$idd=$resAge[0]['agent_id'];
	$agent_area = $resAge[0]['agent_area_id'];
    $agent_name = $resAge[0]['agent_company'];
	$agent_address = $resAge[0]['agent_address'];
	$agent_zipcode = $resAge[0]['agent_zipcode'];
	$agent_state = $resAge[0]['agent_state'];
	$agent_place = $resAge[0]['agent_place'];
	$agent_country = $resAge[0]['agent_country'];
	$agent_phone = $resAge[0]['agent_phone'];
	$agent_username = $resAge[0]['agent_username'];
	$agent_password = $resAge[0]['agent_password'];
	//$ = $resAge[0][''];
	  
}


if (isset($_POST['save'])) {
	
	$agent_user=$vals['agent_username'] = $_POST['agent_username'];
	$vals['agent_password'] = $_POST['agent_password'];
	$resAge = $db->selectQuery("SELECT * FROM `sm_recruitment_agents` WHERE `agent_username`='$agent_user' and agent_id!='$id'");
// if (count($resAge)>0) 
// {
	// $success="Username Exists";
// }
    // else
// {
   
    $suc=$db->secure_update("sm_recruitment_agents", $vals, "WHERE `agent_id`='$id' and `agent_status`=1");
    if(count($suc)>0)
	{
		$success="Updated Successfully";
		echo '<script>location.href="agent_read.php?uid=' .$id . '"</script>';
	}
	else
	{
		$success="Error in updation";
	}
	
}
//}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Profile Page</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="#">Agent</a>
                    </li>
                    <li>
                        <a href="#">Agent Profile </a>
                    </li>
                    <li>
                        <a href="#">Settings </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">            <!-- row -->
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
                    <!-- /tile -->


                    <!-- tile -->
                   
                    <!-- /tile -->

                    <!-- tile -->
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
                                    <li role="presentation"><a href="agent_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a></li>
                                    <li role="presentation"><a href="agent_edit.php?uid=<?php echo $_GET['uid'] ?>">Edit Profile</a></li>
                                    <li role="presentation"><a style="color:#16a085;" href="#">Settings</a></li>
                                   
                                </ul>

                                <div style="padding: 12px">

							<div class="tab-content">


                                  <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                   <div class="tile-body">
								   
                                    <form class="form-horizontal"  name="" method="post" enctype="multipart/form-data" role="form" data-parsley-validate action="">


                                        <div class="wrap-reset">

                                            <form class="profile-settings">
											
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Change</strong> Password</h4>

                                                    </div>
													<div class="col-sm-5"> </div>
                                                </div>

                                               
													<div class="row">
                                                    <div class="form-group col-sm-5">
                                                        <label for="first-name">Username</label>
                                                        <input type="text" class="form-control" readonly name="agent_username" id="agent_username" value="<?php echo $agent_username; ?>">
                                                    </div>
													</div>
													<div class="row">
                                                    <div class="form-group col-sm-5">
                                                        <label for="last-name">Password</label>
                                                        <input type="text" class="form-control" name="agent_password" id="agent_password" value="<?php echo $agent_password; ?>">
                                                    </div>
                                                   
                                                </div>
                                               
                                                <!--Docs-->
                                                <input type="hidden" name="idd" value="<?php echo $idd; ?>">
                                                <input type="submit" class="btn btn-info" name="save" value="Save">
                                                </div>
                                            </form>
											
                                        </div>
                                     </div>
								<h4 class="text-success mt-0 mb-20" id=""><?php echo $success; ?></h4>
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













<script src="assets/jquery.min.js"></script><script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script><script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script><script src="assets/js/vendor/jRespond/jRespond.min.js"></script><script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script><script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script><script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script><script src="assets/js/vendor/screenfull/screenfull.min.js"></script><script src="assets/js/vendor/parsley/parsley.min.js"></script><script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script><script src="assets/js/vendor/daterangepicker/moment.min.js"></script><script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script><script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script><script src="assets/js/vendor/parsley/parsley.min.js"></script><!-- The basic File Upload plugin -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->






<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
                                        $(window).load(function () {
                                            $('#employee_employment_id').on('blur', function (e) {
                                                var employee_com_id=jQuery('#employee_employment_id').val();
                                                $('#employee_com_id_span').html("");
                                                if(employee_com_id==""){
                                                    $('#employee_com_id_span').html("This value is required");
                                                }
                                                else{
                                                    $.ajax({
                                                        url: 'check_qatar.php',
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        data: {employee_employment_id: employee_com_id},
                                                        success: function (data) {
                                                            $('#employee_com_id_span').html(data.Status);
                                                            $('#employee_com_id_span').css("color", data.color);
                                                            var ch = data.data_val;
                                                            if (ch == 0) {
                                                                $('#employee_employment_id').val('');
                                                            }
                                                            if (ch == 1) {

                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        });

</script>
<!--/ Page Specific Scripts -->





<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
                function () {
                    (b[l].q = b[l].q || []).push(arguments)
                });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '../../www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>




