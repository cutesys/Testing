<?php
$page = "";
$sub = "";
include('file_parts/header.php');
$alert="";
?>
<?php
$resEmp = $db->selectQuery("SELECT * FROM `sm_admin`");
if (count($resEmp)) {
    $firstname = $resEmp[0]['firstname'];
    $middlename = $resEmp[0]['middlename'];
    $lastname = $resEmp[0]['lastname'];
	 $username = $resEmp[0]['username'];
	 $password = $resEmp[0]['password'];
	 $image = $resEmp[0]['image'];
   
}

if (isset($_POST['submit'])) 
{
    
	 $oldpassword =$_POST['oldpassword'];
	  
	  

//     <!--insert in to partner-->

if($oldpassword==$password)
{
   
session_start();
$_SESSION["login"] = "ok";
echo("<script>location.href='change_password.php'</script>");
}
else
{
	$alert="Incorrect password";
}
}
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
                        <a href="#">Admin Profile</a>
                    </li>
                   
                    <li>
                        <a href="#">Edit password </a>
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

                            <div class="thumb thumb-xl">
                                <img class="img-circle" src="admin_uploads/<?php echo $image; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $firstname; ?></strong> <?php echo $lastname; ?></h4>
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
                                    <li role="presentation"><a href="admin_profile.php">Profile</a></li>
                                    <li role="presentation"><a style="color:#16a085;" href="password_reset.php">Settings</a></li>
                                    <!--<li role="presentation"><a href="employee_gallery.php?uid=<?php //echo $_GET['uid'] ?>">Documents</a></li>-->
                                </ul>

                                <div style="padding: 12px">

							<div class="tab-content">


                                  <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                   <div class="tile-body">
                                    <form class="form-horizontal"  name="form" method="post" enctype="multipart/form-data" role="form" data-parsley-validate action="">


                                        <div class="wrap-reset">

                                           

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Password</strong> Settings</h4>

                                                    </div>
                                                </div>

                                            
													<div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Enter current password to continue</label>

                                                        <input type="password" name="oldpassword" value="" class="form-control" id="Nationality" required="">
                                                    </div>
													 </div>
													
													<div class="form-group col-sm-6">
                                                        <label for="Nationality" style="color:red;"><?php echo $alert; ?></label>

                                                    </div>
                                                <!--Docs-->
                                               
                                                <input type="submit" class="btn btn-info" name="submit" value="Continue">
                                                </div>

                                            </form>
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


