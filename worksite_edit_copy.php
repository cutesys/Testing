<?php
$page = "WPS";
$tab = "worksite";
$sub = "agent_list";

include('file_parts/header.php');
$id = $_GET['uid'];
$resAge = $db->selectQuery("SELECT * FROM `sm_work_site` WHERE `id`='$id'");
if (count($resAge)) {
	$work_site=$resAge[0]['work_site'];
	$site_location = $resAge[0]['site_location'];
	//$alert="Work Site And Location already exist!";
    
	  
}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>worksite Page</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="#">WPS</a>
                    </li>
                    <li>
                        <a href="#">worksite </a>
                    </li>
                    <li>
                        <a href="#">settings</a>
                    </li>
					 <li>
                        <a href="#">worksite list</a>
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

                            
                            <h4 class="mb-0"><strong><?php echo $work_site; ?></strong> <?php //echo $employee_lastname; ?></h4>
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
                                 
                                    <!--<li role="presentation"><a style="color:#16a085;" href="#">Edit Worksite</a></li>-->
                                    <li role="presentation"><a style="color:#16a085;" href="#">Edit Worksite</a></li> 
                                   
                                </ul>

                                <div style="padding: 12px">

							<div class="tab-content">


                                  <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                   <div class="tile-body">
                                   <form class="form-horizontal"  name="" method="post" enctype="multipart/form-data" role="form" data-parsley-validate action="worksite_edit_action.php">

                                        <div class="wrap-reset">


                                                

                                               
												<div class="row">
                                                    <div class="form-group col-sm-5">
                                                        <label for="first-name">worksite</label>
                                                        <input type="text" class="form-control" name="work_site" id="agent_name" value="<?php echo $work_site; ?>" required="">
                                                    </div>
													 <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="Nationality">site location</label>
                                                        <input type="text" name="site_location" class="form-control" id="agent_place"  value="<?php echo $site_location; ?>" required="">
                                                    </div>
                                                   
                                                </div>
												<?php if(isset($_GET['msg'])){ ?>
                                               
												<?php } ?>
											   
                                                <input type="hidden" name="worksite_id" value="<?php echo $id; ?>">
												 <div class="form-group col-sm-10"></div>
                                                <input type="submit" class="btn btn-info"  name="save" value="Save" >
												<div class="row">

                        <div class="col-md-9"></div>

                        <span class="text-success mt-0 mb-20" id="SucM"></span>

                    </div>
                                                </div>
                                            </form>
											 <div class="form-group col-sm-5"></div>
											 <?php if(isset($_GET['msg']))
											 {
												 $alert=$_GET['msg'];
												 if($alert==1)
												 {
													$message=" Worksite and location already exists..!";
												 }
												 else
												 {
													$message="";  
												 }
												 }
												 else
												 {
													$message=""; 
												 }
												 ?>
											<span class="text-success mt-0 mb-20" id="SucM" ><a style="color:red;"><?php echo $message;?></a></span>
                                        </div>
                                </div>

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
                                                            //$('#employee_com_id_span').css("color", data.color);
															$('#employee_com_id_span').css("color", red);
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




