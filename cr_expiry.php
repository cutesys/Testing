<?php
include("./file_parts/header.php");
?>
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>CR Expiry<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Notification</a>
                    </li>
                    <li>
                        <a href="#">Company</a>
                    </li>
                    <li>
                        <a href="tables-bootstrap.html">CR Expiry</a>
                    </li>
                </ul>

            </div>

        </div>


        <div class="row">
            <!-- col -->
            <div class="col-md-12">

                <!-- tile -->
                <section class="tile">

                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong>CR</strong> Expiry</h1>
                        <ul class="controls">
                            <li class="dropdown">

                                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <i class="fa fa-spinner fa-spin"></i>
                                </a>

                                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                    <li>
                                        <a role="button" tabindex="0" class="tile-toggle">
                                            <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                            <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-refresh">
                                            <i class="fa fa-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-fullscreen">
                                            <i class="fa fa-expand"></i> Fullscreen
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <?php
                        $count = 1;
                        $sql = "select * from  add_company where custid='" . $_SESSION['id'] . "' AND status=1";
                        $fe = mysql_query($sql);
                        $warning = 0;
                        ?>
                        <?php
                        while ($row = mysql_fetch_array($fe)) {
                            $daylen = 60 * 60 * 24;
                            $date1 = date("d-m-Y");
                            $date2 = $row['CRexdate'];
                            $days = (strtotime($date2) - strtotime($date1)) / $daylen;
                            $days = round($days);
                            //printf("%d years, %d months, %d days\n", $years, $months, $days);
                            if ($days < 50 && $days > 0) {
                                ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong>The company <?php echo $row['compname']; ?> have <?php echo $days; ?> days remaining for CR expiry

                                </div>
                                <p><button type="button" class="btn btn-danger">Send Mail</button></p>

                                <?php
                                $warning = 1;
                            }
                            if (strtotime($date2) < strtolower($date1)) {
                                ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong>The CR expiry date for the company <?php echo $row['compname']; ?> has been exceeded.

                                </div>
                                <p><button type="button" class="btn btn-danger">Send Mail</button></p>

                                <?php
                                $warning = 1;
                            }
                        } if ($warning == 0) {
                            ?>

                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>No Notifications</strong>

                            </div>



                            <?php
                        }
                        ?>
                    </div>
                    <!-- /tile body -->

                </section>
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

        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="assets/js/vendor/datatables/extensions/Pagination/input.js"></script>

        <script src="assets/js/vendor/date-format/jquery-dateFormat.min.js"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->




        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->


        </body>

        </html>
