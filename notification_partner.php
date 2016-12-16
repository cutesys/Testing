<?php
$page = "notification";
$sub = "n_pa";
include ("./file_parts/header.php");
//header("Location:comingsoon.php");
?>
<section id="content">

    <div class="page page-timeline">

        <div class="pageheader">

            <h2>Company <span>Notifications</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Notifications</a>
                    </li>
                    <li>
                        <a href="#">Employee</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-12">

                    <!-- tile -->
                    <section class="tile tile-simple no-bg">
                        <!-- tile body -->
                        <div class="tile-body streamline timeline p-0">
                            <ul>
                                <li class="heading">
                                    <a href="javascript:;" class="btn btn-greensea b-0"> Today  </a>
                                </li>
                                <?php
                                $cmpName = "";
                                $daylen = 60 * 60 * 24;
                                $cur_date = date("d-m-Y");
                                $empz = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");
                                if (count($empz) > 0) {
                                    for ($em = 0; $em < count($empz); $em++) {
                                        $empId = $empz[$em]['employee_id'];
                                        $cmpId = $empz[$em]['employee_company'];
                                        $resCmpName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$cmpId'");
                                        if (count($resCmpName) > 0) {
                                            $cmpName = $resCmpName[0]['company_name'];
                                        }
                                    }
                                }
                                $comps = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `company_status`='1'");
                                if (count($comps) > 0) {
                                    for ($co = 0; $co < count($comps); $co++) {
                                        $coId = $comps[$co]['company_id'];
                                        $coName = $comps[$co]['company_name'];
                                        $expDate = 0;
                                        $doc = $db->selectQuery("SELECT * FROM `sm_company_docs` WHERE `company_id`='$coId'");
                                        if (count($doc) > 0) {
                                            for ($d = 0; $d < count($doc); $d++) {
                                                $doc_title = $doc[$d]['doc_title'];
                                                $doc_data = $doc[$d]['doc_data'];
                                                $doc_owner = $doc[$d]['doc_owner'];
                                                $doc_start_date = $doc[$d]['doc_start_date'];
                                                $doc_end_date = $doc[$d]['doc_end_date'];
                                                $find_noti = (strtotime($doc_end_date) - strtotime($cur_date)) / $daylen;
                                                $num_days = round($find_noti);
                                                if ($num_days < 30 && $num_days >= 0) {
                                                    ?>

                                                    <li class="timeline-post">
                                                        <aside>
                                                            <div class="thumb wh30 bg-blue">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </aside>
                                                        <div class="post-container">
                                                            <div class="panel panel-default b-0">
                                                                <h3 class="custom-font text-blue"></h3>
                                                                <span class="text-muted time"><i class="fa fa-clock-o"></i> <?php echo $num_days ?> days</span>
                                                                <p class="text-blue"><?php echo $doc_title; ?> for <?php echo $coName; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                            </ul>

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

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/timeline.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:38 GMT -->
</html>
