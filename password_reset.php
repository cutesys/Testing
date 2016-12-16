<?php
$page = "";
$sub = "";
$success_msg="";
include('file_parts/header.php');
?>
<?php
//$id = $_GET['uid'];
$resEmp = $db->selectQuery("SELECT * FROM `sm_admin`");
if (count($resEmp)) {
    $firstname = $resEmp[0]['firstname'];
    $middlename = $resEmp[0]['middlename'];
    $lastname = $resEmp[0]['lastname'];
	 $username = $resEmp[0]['username'];
	 $password = $resEmp[0]['password'];
    $company = $resEmp[0]['office'];
	$country = $resEmp[0]['country'];
    $email = $resEmp[0]['email'];
	$id = $resEmp[0]['id'];
	$address = $resEmp[0]['address'];
    $phone = $resEmp[0]['phone'];
    $qatar_id = $resEmp[0]['qatar_id'];
    //$sponsor_id = $resEmp[0]['sponsor_id'];
	$image = $resEmp[0]['image'];
}
$image = "";
//$resLogo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `file_title`='Profile_Picture' AND `employee_id`='$id'");

if (count($resEmp)) {
    $image = $resEmp[0]['image']; ;
} else {
     $image = "profile-default.png";
}




if (isset($_POST['update'])) 
{
	$image = "";
	if(empty($_FILES['image']['name']))
			{
			
				$qry=$db->selectQuery(" select * from sm_admin where id= '$id'");
				$image=$qry[0]['image'];
				
			
			
			}
			else
			{
				$image = $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'admin_uploads/'.$image);	
			}
			 $values1['image'] = $image;
	
	$query1 = $db->secure_update('sm_admin', $values1, " WHERE id = '$id'");

    if (count($query1)) {

        $success_msg = "Profile Picture Updated!";

		}

		else

		{

		$success_msg = "Error in updation";

		}
}
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Admin Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    
                    <li>
                        Admin Profile
                    </li>
					<li>
                        Settings
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
                                <img class="img-circle" id="emdp" src="admin_uploads/<?php echo $image; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $firstname; ?></strong> <?php echo $lastname; ?></h4>
                            <span class="text-muted"><?php //echo $employee_designation; ?></span>
							
                        </div>
                    </section>
                    <!--<section class="tile tile-simple">
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php// echo $firstname; ?> <span></span> <?php// echo $lastname; ?> </h1>
                        </div>
                        <div class="tile-body">
                            <p class="text-default lt"><?php// echo $employee_remarks; ?></p>
                        </div>
                    </section>--->
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
                                    <!--<li role="presentation"><a href="employee_gallery.php?uid=<?php echo $_GET['uid'] ?>">Documents</a></li>-->
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" action="employee_edit.php">
                                        <div class="wrap-reset">

                                            

                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>Change</strong> Password </h4>
                                                    </div>
													<div class="col-sm-5"> </div>
													<!---<div class="form-group col-md-1 legend">
													
                                                        <a onclick="print();" target="_blank"><h4><strong>Print</strong></h4></a>
                                                    </div>--->
                                                </div>
                                               
                                                 <form name="form1" action="" method="post">
                                               
													<div class="row">

                                                    <!--                                                        </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Username</label>
                                                        <input type="email" name="email" readonly class="form-control" id="email" value="<?php echo $username; ?>">
                                                    </div>
													</div>
													<div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Password</label>

                                                        <input type="password" name="Nationality" readonly class="form-control" id="Nationality" value="<?php echo $password; ?>">
                                                    </div>
													


                                                </div>
												 <div class="form-group text-left mt-20">
                                                 <a href="test_password.php" class="btn btn-greensea b-0 br-2 mr-5">Change</a>
                                                 </div>
												 </form>
												 <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>Change</strong> Profile Picture </h4>
                                                    </div>
													<div class="col-sm-5"> </div>
													<!---<div class="form-group col-md-1 legend">
													
                                                        <a onclick="print();" target="_blank"><h4><strong>Print</strong></h4></a>
                                                    </div>--->
                                                </div>
                                                <form name="form1" action="" method="post" enctype="multipart/form-data">
                                               
													<div class="row">

                                                  <div class="form-group col-sm-6">

                                                            <label for="address1">Choose Image:</label>

                                                            <input type="file" id="images_size" name="image" value="<?php echo $image; ?>" class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">

                                                            <span class="help-block" id="imgerror"></span>

                                                        </div>
														 
														 </div>
														 
														
												 <input type="submit" class="btn btn-greensea b-0 br-2 mr-5" name="update" value="Change">
                                               </form>
											   <div class="row">
														 <div class="form-group col-sm-6">
                                                        <label for="Nationality" style="color:green;font-size:20px;"><?php echo $success_msg; ?></label>

                                                    </div> </div>
                                                </div>

                                            
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
<script>
 $(window).load(function () {

                                        });
 function upload_files_without_doc(element)
                                        {
                                            var formData = new FormData();
                                            
                                            $.ajax({
                                                url: "admin_profedit.php?ad_id=" +<?php echo $id; ?>,
                                                type: "POST",
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                data: formData,
                                                success: function (data) {
                                                    $('#sucs').html(data);
                                                }
                                            });
                                        }

 </script>
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

