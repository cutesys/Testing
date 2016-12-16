<?php 
include('connection.php');
session_start();
?>
<style>

    .error{
        padding: 2.5% 5% 55% 47%;
    }
</style>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    
<!-- Mirrored from www.tattek.sk/minovate-noAngular/locked.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SME</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animate.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">




            <div class="page page-core page-locked">

                <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">S</span>PONSOR MASTER</h3></div>
                <div class="container w-420 p-15 bg-white mt-40">

                    <div class="bg-slategray lt wrap-reset mb-20 text-center">
                        <h2 class="text-light text-greensea m-0">Locked</h2>
                    </div>

                    <div class="media p-15">
                        <div class="pull-left thumb thumb-lg mr-20">
						<?php $username = $db->selectQuery("select firstname,lastname,username,image from sm_admin where id='".$_SESSION['id']."' and stat='Active' and status = '1'");
							
							?>
							<?php if (count($username)) {
    $image = $username[0]['image']; 
} else {
     $image = "profile-default.png";
} ?>
                            <img class="media-object img-circle" src="admin_uploads/<?php echo $image; ?>" alt="">
                        </div>
                        <div class="media-body">
							<?php $username = $db->selectQuery("select firstname,lastname,username from sm_admin where id='".$_SESSION['id']."' and stat='Active' and status = '1'");
							
							?>
                            <!--<form name="form" class="form-validation">-->
							<form name="form" class="form-validation" novalidate="" action="" method="post">
							<?php if(!empty($username)){ ?>
                                <h4 class="media-heading mb-0"><strong><?php echo $username[0]['firstname'].' '.$username[0]['lastname'];?></strong></h4>
							<?php } ?>
                                <div class="form-group mt-10">
									<input type="password" placeholder="Password" name="password" class="form-control underline-input" required="required">
                                </div>
                                <div class="form-group text-left">
                                   <!--<a href="index.html" class="btn btn-greensea b-0 br-2 mr-5 block">Login</a>-->
								   <input type="hidden" class="form-control underline-input" name="username" value="<?php echo $username[0]['username']; ?>" >
								   <button type="submit"  name="submit" value="Login" class="btn btn-greensea b-0 br-2 mr-5 block">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="bg-slategray lt wrap-reset mt-0 text-center">
                        <p class="m-0">
                            <a href="index.php">Not you?</a>
                        </p>
                    </div>

                </div>

            </div>



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





        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='../../www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

							<?php
                            if (isset($_POST['submit'])) {
                                $user = $_POST['username'];
                                $pass = $_POST['password'];

                                $sql = $db->selectQuery("select * from sm_admin where username='$user' and password='$pass'and stat='Active' and status = '1'");
                                //$res=mysql_query($sql);
                                //$fetch=mysql_fetch_array($res);
                                //$num=mysql_num_rows($res);

                                if (count($sql)) {
                                    $_SESSION['id'] = $sql[0]['id'];

                                    $a = $_SESSION['id'];
                                    echo("<script>location.href='dashboard.php'</script>");
                                } else {
										$err_msg = "Invalid Username or Password";
										}
                                    ?>
									
									

                                    <div class="error">
                                    <?php
                                    echo '<p style="color:red;z-index:333;padding:350px 0px 10px 0px">Invalid Username or Password</p>';
                                    ?>
                                    </div>
                                        <?php
                                        //echo "error";
                                        //  echo  '<span style="color:red;text-align:center;z-index:4;margin:5px 500px 0% 0px">Request has been sent. Please wait for my reply!</span>';
                                        //echo("<script>location.href='index.php'</script>");
                                    //}
                                }
                                ?>
								
    </body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/locked.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:34 GMT -->
</html>
