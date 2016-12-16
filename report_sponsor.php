<?php
$page = "report";
$sub = "r_sp";
include('file_parts/header.php');
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
$cmpArray = array();
//$resFet = $db->selectQuery("SELECT  com_pid,`com_name`, `year`, `month`,month_name, `sponser_fee`,`status`,`id` FROM `sm_sponser` where `sponsor_id`='" . $_SESSION['id'] . "'");

$resFet = $db->selectQuery("SELECT  `company_name`, `company_sponsor_fee`,`company_pid`,`company_id` FROM `sm_company` where `sponsor_id`='" . $_SESSION['id'] . "' and company_status=1 and company_sponsor_fee_status='Allowed'");

if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $values['company_name'] = $resFet[$rC]['company_name'];
        $values['company_sponsor_fee'] = $resFet[$rC]['company_sponsor_fee'];
        $values['company_pid'] = $resFet[$rC]['company_pid'];
        $values['company_id'] = $resFet[$rC]['company_id'];
        //$values['month_name'] = $resFet[$rC]['month_name'];
        //$values['sponser_fee'] = $resFet[$rC]['sponser_fee'];
//        $values['status'] = $resFet[$rC]['status'];
        $cmpArray["data"][] = $values;
    }
}
$fp = fopen('assets/extras/sponsorFee.json', 'w');
fwrite($fp, json_encode($cmpArray));
fclose($fp);
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Sponsorship Fee List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Fee</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Fee List</a>
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
                    <!--                    <div class="alert alert-danger">
                                            <strong>Note!</strong> This table have only demo purpose. Data are not loaded from database but from dummy json.
                                        </div>-->
                    <!-- tile -->
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Sponsorship Fee</strong> List</h1>
                            <ul class="controls">


                                <li class="dropdown">

                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                        <i class="glyphicon glyphicon-th-list"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>

                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                        <li>
                                            <a role="button" tabindex="0" class="" onclick="printDiv('printableArea');" id="print">
                                                <i class="glyphicon glyphicon-print"></i> Print
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="" id="create_pdf">
                                                <i class="glyphicon glyphicon-file"></i> PDF
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-fullscreen" id="btnExport">
                                                <i class="glyphicon glyphicon-list-alt"></i> Excel
                                            </a>
                                        </li>
                                    </ul>

                                </li>

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

                            <div class="table-responsive">
                                <div id="printableArea">
                                    <div class="divHeader"><strong style="font-size: 30px">Sponsor Fee List</strong></div>

                                    <table class="table table-striped table-hover table-custom" id="products-list">
                                        <thead>
                                            <tr>
                                                <th style="width:90px;">Company</th>
    <!--                                            <th style="width:80px;">Year</th>
                                                <th style="width:90px;">Month</th>-->
                                                <th style="width:90px;">Sponsorship Fee</th>
                                            </tr>
                                        </thead>

                                    </table>
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

<style type="text/css">
    @media screen {
        div.divHeader {
            display: none;
        }
    }
    @media print {
        div.divHeader {
            position: fixed;
            bottom: 0;
        }
    }
</style>












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
                                                        "dom": '<"row"<"col-md-8 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12 no-print"<"pull-right"f>>>t<"row"<"col-md-4 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12"<"inline-controls text-center no-print"i>><"col-md-4 col-sm-12 no-print"p>>',
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
                                                        "ajax": 'assets/extras/sponsorFee.json',
                                                        "order": [[1, "asc"]],
                                                        "columns": [
//                {
//                    "data": "null",
//                    "defaultContent": '<label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0"><input type="checkbox" class="selectMe"><i></i></label>'
//                },
                                                            {"data": "company_name"},
//                {
//                    "data": "year"
//                },
//                {
//                    "data": "month_name"
//                },
                                                            {
                                                                "data": "company_sponsor_fee"
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


<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.js"></script>
<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.min.js"></script>
<script>
                                                function printDiv(divName) {
                                                    var headstr = "<html><head><title>Sponsorship Fee List</title></head><body>";
                                                    var footstr = "</body></html>";
                                                    var printContents = document.getElementById(divName).innerHTML;
                                                    //var originalContents = document.body.innerHTML;
                                                    document.body.innerHTML = headstr + printContents + footstr;
                                                    window.print();
                                                    //document.body.innerHTML = originalContents;
                                                    location.href = "report_sponsor.php";
                                                }
                                                $("#btnExport").click(function () {
                                                    $("#products-list").excelexportjs({
                                                        containerid: "products-list"
                                                        , datatype: 'table'
                                                    });
                                                });
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
    }
    (window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>

</html>
