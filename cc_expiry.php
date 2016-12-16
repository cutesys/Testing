<?php include("./file_parts/header.php"); ?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Computer Card Expiry<span></span></h2>

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
                        <a href="#">Computer Card Expiry</a>
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
                        <h1 class="custom-font"><strong>Computer Card</strong> Expiry</h1>
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
                            $date2 = $row['CCNexp'];


                            $days = (strtotime($date2) - strtotime($date1)) / $daylen;
                            $days = round($days);

                            //printf("%d years, %d months, %d days\n", $years, $months, $days);
                            if ($days < 50 && $days > 0) {
                                ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong>The company <?php echo $row['compname']; ?> have <?php echo $days; ?> days remaining for Computer Card expiry ;

                                </div>
                                <p><button type="button" class="btn btn-danger">Send Mail</button></p>
                                <?php
                                $warning = 1;
                            } if (strtotime($date2) < strtolower($date1)) {
                                ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong>The Computer Card expiry date for the company <?php echo $row['compname']; ?> has been exceeded.

                                </div>
                                <p><button type="button" class="btn btn-danger">Send Mail</button></p>

                                <?php
                                $warning = 1;
                            }
                        }

                        if ($warning == 0) {
                            ?>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>No notifications</strong>

                            </div>
                            <p><button type="button" class="btn btn-danger">Send Mail</button></p>

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
        <script>
            $(window).load(function () {

                //initialize datatable
                $('#products-list').DataTable({
                    "dom": '<"row"<"col-md-8 col-sm-12"<"inline-controls"l>><"col-md-4 col-sm-12"<"pull-right"f>>>t<"row"<"col-md-4 col-sm-12"<"inline-controls"l>><"col-md-4 col-sm-12"<"inline-controls text-center"i>><"col-md-4 col-sm-12"p>>',
                    "language": {
                        "sLengthMenu": 'View _MENU_ records',
                        "sInfo": 'Found _TOTAL_ records',
                        "oPaginate": {
                            "sPage": "Page ",
                            "sPageOf": "of",
                            "sNext": '<i class="fa fa-angle-right"></i>',
                            "sPrevious": '<i class="fa fa-angle-left"></i>'
                        }
                    },
                    "pagingType": "input",
                    "ajax": 'assets/extras/products.json',
                    "order": [[1, "asc"]],
                    "columns": [
                        {
                            "data": "null",
                            "defaultContent": '<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type="checkbox" class="selectMe"><i></i></label>'
                        },
                        {"data": "id"},
                        {"data": "name"},
                        {"data": "category"},
                        {
                            "data": "price",
                            "type": "num-fmt",
                            "render": function (data) {
                                return '$' + parseFloat(data).toFixed(2);
                            }
                        },
                        {
                            "data": "date",
                        },
                        {
                            "type": "html",
                            "data": "status",
                            "render": function (data) {
                                if (data === 'published') {
                                    return '<span class="label bg-success">' + data + '</span>'
                                } else if (data === 'not published') {
                                    return '<span class="label bg-warning">' + data + '</span>'
                                } else if (data === 'deleted') {
                                    return '<span class="label bg-lightred">' + data + '</span>'
                                }
                            }
                        },
                        {
                            "data": null,
                            "defaultContent": '<a href="#" class="btn btn-xs btn-default mr-5"><i class="fa fa-search"></i> View</a><a href="javascript:;" class="btn btn-xs btn-lightred"><i class="fa fa-times"></i> Delete</a>'
                        }
                    ],
                    "aoColumnDefs": [
                        {'bSortable': false, 'aTargets': ["no-sort"]}
                    ],
                    "drawCallback": function (settings, json) {
                        $(".formatDate").each(function (idx, elem) {
                            $(elem).text($.format.date($(elem).text(), "MMM d, yyyy"));
                        });
                        $('#select-all').change(function () {
                            if ($(this).is(":checked")) {
                                $('#products-list tbody .selectMe').prop('checked', true);
                            } else {
                                $('#products-list tbody .selectMe').prop('checked', false);
                            }
                        });
                    }
                });
                //*initialize datatable
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

        </html>
