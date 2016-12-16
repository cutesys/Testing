<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');
$id = $_GET['uid'];

//$sql = mysql_query("select * from sm_employee where employee_id=$id");
//$val = mysql_fetch_array($sql);
//$con_id = $val['employee_nationality'];

$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");
if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_dob = $resEmp[0]['employee_dob'];
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
}
//$cont = mysql_query("select * from country where id = $con_id");
//$cont_fetch = mysql_fetch_array($cont);
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Employee Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Employee</a>
                    </li>
                    <li>
                        Employee Documents
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
                                <img class="img-circle" src="assets/images/arnold-avatar.jpg" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $employee_firstname; ?></strong> <?php echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>
                            <!--                            <div class="mt-10">
                                                            <button class="btn btn-rounded-20 btn-sm btn-greensea">Follow</button>
                                                            <button class="btn btn-rounded-20 btn-sm btn-lightred">Message</button>
                                                        </div>-->

                        </div>
                        <!-- /tile widget -->

                        <!-- tile body -->
                        <!--                        <div class="tile-body text-center bg-blue p-0">

                                                    <ul class="list-inline tbox m-0">
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
                                                    </ul>

                                                </div>-->
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->


                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile header -->
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php echo $employee_firstname; ?> <span></span> <?php echo $employee_lastname; ?> </h1>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">

<!--                            <p>
                                <a href="#" class="myIcon icon-info icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="myIcon icon-primary icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="myIcon icon-lightred icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="myIcon icon-hotpink icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-dribbble"></i></a>
                            </p>-->

                            <p class="text-default lt"><?php echo $employee_remarks; ?></p>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile header -->
                        <!--                        <div class="tile-header">
                                                    <h1 class="custom-font"><strong>Friend</strong> List</h1>
                                                </div>-->
                        <!-- /tile header -->

                        <!-- tile body -->
                        <!--                        <div class="tile-body">

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>

                                                </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
<!--                    <section class="tile tile-simple">

                         tile header
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>My</strong> Projects</h1>
                        </div>
                         /tile header

                         tile body
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
                         /tile body

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
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="employee_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a></li>
                                    <li role="presentation"><a href="employee_edit.php?uid=<?php echo $_GET['uid'] ?>">Edit</a></li>
                                    <li role="presentation"><a style="color:#16a085;" href="employee_gallery.php">Downloads</a></li>
                                </ul>

                                <div style="padding: 12px">


                                    <form method="post" action="">


                                        <div class="wrap-reset">

                                            <form class="profile-settings">

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Documents </h4>


                                                    </div>
                                                </div>


                                                <ul class="mix-filter pull-right">
                                                    <li class="filter active" data-filter="all">
                                                        All
                                                    </li>
                                                    <li class="filter" data-filter=".cats">
                                                        Visa
                                                    </li>
                                                    <li class="filter" data-filter=".animals">
                                                        Passport
                                                    </li>
                                                    <li class="filter" data-filter=".cities">
                                                        Health Card
                                                    </li>
                                                    <li class="filter" data-filter=".cats, .animals">
                                                        Qatar
                                                    </li>
                                                </ul>
                                                <ul class="mix-controls">
                                                    <li class="select-all">
                                                        <label class="checkbox checkbox-custom checkbox-custom inline-block m-0">
                                                            <input type="checkbox"><i></i> Select all
                                                        </label>
                                                    </li>
                                                    <li class="mix-control disabled">
                                                        <a href="javascript:;"><i class="fa fa-envelope-o"></i> Email</a>
                                                    </li>
                                                    <li class="mix-control disabled">
                                                        <a  class="download_btn" id="dwnbtn"><i class="fa fa-download"></i> Download</a>
                                                    </li>
                                                    <li class="mix-control disabled">
                                                        <a href="javascript:;"><i class="fa fa-pencil"></i> Edit</a>
                                                    </li>
                                                    <li class="mix-control disabled">
                                                        <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="col4">
                                                        <!-- row -->
                                                        <div class="row mix-grid">
                                                            <div class="gallery" data-lightbox="gallery">
                                                                <!-- col -->
                                                                <?php
                                                                $empFiles = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `employee_id`='$id'");
                                                                if (count($empFiles)) {
                                                                    for ($ef = 0; $ef < count($empFiles); $ef++) {
                                                                        $image = $empFiles[$ef]['file_path'] . $empFiles[$ef]['file_name'];
                                                                        ?>
                                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats pics">
                                                                            <div class="img-container">
                                                                                <input type="hidden" id="filename" value="<?php echo $empFiles[$ef]['file_name']; ?>"/>
                                                                                <img class="img-responsive" alt="" src="<?php echo $image; ?>">
                                                                                <div class="img-details">
                                                                                    <h4 class="custom-font ng-binding"> </h4>
                                                                                    <div class="img-controls">
                                                                                        <a href="javascript:;" class="img-select">
                                                                                            <i class="fa fa-circle-o"></i>
                                                                                            <i class="fa fa-circle"></i>
                                                                                        </a>
                                                                                        <a href="javascript:;" class="img-link">
                                                                                            <i class="fa fa-link"></i>
                                                                                        </a>
                                                                                        <a class="img-preview" data-lightbox="gallery-item" href="<?php echo $empFiles[$ef]['file_path'] . $empFiles[$ef]['file_name']; ?>" title="Sed ut perspiciatis unde">
                                                                                            <i class="fa fa-search"></i>
                                                                                        </a>
                                                                                        <a href="javascript:;" class="img-more">
                                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <!-- /col -->



                                                            </div>

                                                        </div>
                                                        <!-- /row -->

                                                    </div>

                                                    <div role="tabpanel" class="tab-pane" id="col3">

                                                        <!-- row -->
                                                        <div class="row mix-grid">

                                                            <div class="gallery" data-lightbox="gallery">



                                                                <!-- col -->


                                                                <!-- /col -->



                                                            </div>

                                                        </div>
                                                        <!-- /row -->

                                                    </div>

                                                    <div role="tabpanel" class="tab-pane" id="col2">

                                                        <!-- row -->
                                                        <div class="row mix-grid">

                                                            <div class="gallery" data-lightbox="gallery">



                                                                <!-- col -->


                                                                <!-- /col -->



                                                            </div>

                                                        </div>
                                                        <!-- /row -->

                                                    </div>


                                                </div>

                                        </div>


                                    </form>
                                </div>
                                <!-- Nav tabs -->
                                <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                <!--                                </ul>-->

                                <!-- Tab panes -->


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
                            <script>
                                $(window).load(function () {

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

                            <script src="assets/js/main.js"></script>
                            <!--/ custom javascripts -->

                            <script>
                                $('#download_btn').click(function () {
                                    $(".selected").each(function () {
                                        var $href = $(this).parent().children('img').attr('src'),
                                                $hrefShort = $href.replace('http://example.com/plugins/content/gallery/gallery/thumbs/', 'images\\Pics/');

                                        var $iframe = $('<iframe />');
                                        $iframe.attr('src', "/plugins/content/jw_sigpro/jw_sigpro/includes/download.php?file=" + $hrefShort);

                                        $iframe.css('visibility', 'hidden');
                                        $iframe.css('height', '0');

                                        $iframe.appendTo(document.body);
                                    });
                                });
                            </script>




                            <!-- ===============================================
                            ============== Page Specific Scripts ===============
                            ================================================ -->
                            <script>
                                $(window).load(function () {

                                    $('.mix-grid').mixItUp();


                                    $('.mix-controls .select-all input').change(function () {
                                        if ($(this).is(":checked")) {
                                            $('.gallery').find('.mix').addClass('selected');
                                            enableGalleryTools(true);
                                        } else {
                                            $('.gallery').find('.mix').removeClass('selected');
                                            enableGalleryTools(false);
                                        }
                                    });

                                    $('.mix .img-select').click(function () {
                                        var mix = $(this).parents('.mix');
                                        if (mix.hasClass('selected')) {
                                            mix.removeClass('selected');
                                            enableGalleryTools(false);
                                        } else {
                                            mix.addClass('selected');
                                            enableGalleryTools(true);
                                        }
                                    });

                                    var enableGalleryTools = function (enable) {

                                        if (enable) {

                                            $('.mix-controls li.mix-control').removeClass('disabled');

                                        } else {

                                            var selected = false;

                                            $('.gallery .mix').each(function () {
                                                if ($(this).hasClass('selected')) {
                                                    selected = true;
                                                }
                                            });

                                            if (!selected) {
                                                $('.mix-controls li.mix-control').addClass('disabled');
                                            }
                                        }
                                    }

                                });
                            </script>

                            </body>

                            <!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
                            </html>


                            <script src="assets/jquery.min.js"></script>
                            <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
                            <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
                            <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
                            <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
                            <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
                            <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
                            <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
                            <script src="assets/js/vendor/parsley/parsley.min.js"></script>
                            <script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
                            <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
                            <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
                            <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
                            <script src="assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
                            <script src="assets/js/vendor/mixitup/jquery.mixitup.min.js"></script>
                            <!-- The basic File Upload plugin -->

