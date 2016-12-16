<?php
$page = "report";
$sub = "r_pa";
include("./file_parts/header.php");

$resFet = $db->selectQuery("SELECT  `id`, `image`, `parid`, `compname`, `parname`, `phone`, `email` FROM `partner` where `custid`='" . $_SESSION['id'] . "' AND `status`='1'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $values['id'] = $resFet[$rC]['id'];
        $values['image'] = $resFet[$rC]['image'];
        $values['parid'] = $resFet[$rC]['parid'];
        $values['compname'] = $resFet[$rC]['compname'];
        $values['parname'] = $resFet[$rC]['parname'];
        $values['phone'] = $resFet[$rC]['phone'];
        $values['email'] = $resFet[$rC]['email'];
        //$values['company_status'] = $resFet[$rC]['company_status'];
        $partArray["data"][] = $values;
    }
}
$fp = fopen('assets/extras/partner.json', 'w');
fwrite($fp, json_encode($partArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Partner List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Reports</a>
                    </li>
                    <li>
                        <a href="report_partner.php">Partner List</a>
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

                    <!--
                                        <div class="alert alert-danger">
                                            <strong>Note!</strong> This table have only demo purpose. Data are not loaded from database but from dummy json.
                                        </div>-->


                    <!-- tile -->
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Partner</strong> List</h1>
                            <ul class="controls">
                                <!--<li><a href="javascipt:;"><i class="fa fa-plus mr-5"></i> New Partner</a></li>-->

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
                                </li>
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">

                            <div class="table-responsive">
                                <div id="printableArea">
                                    <div class="divHeader"><strong style="font-size: 30px">Partner List</strong></div>

                                    <table class="table table-striped table-hover table-custom" id="products-list">
                                        <thead>
                                            <tr>

                                                <th style="width:5px;">Sl.no</th>
                                                <th style="width:80px;">Qatar ID</th>

                                                <th style="width:300px;">Company Name</th>
                                                <th style="width:300px;">Name</th>
                                                <th style="width:90px;">Email</th>
                                                <th>Phone No</th>

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
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

<script>
                                                $(window).load(function () {

                                                    //initialize datatable
                                               var t=  $('#products-list').DataTable({
                                                        "dom": 'Bf t<"row"<"col-md-4 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12"<"inline-controls text-center no-print"i>><"col-md-4 col-sm-12 no-print"p>>',
                                                        "buttons": [
                                                            {
                                                                extend: 'excelHtml5',
                                                                title: 'Partner List'
                                                            },
                                                            {
                                                                extend: 'pdfHtml5',
                                                                title: 'Partner List'
                                                            }
                                                            ,"print"
                                                        ],
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
                                                        "ajax": 'assets/extras/partner.json',
                                                        "order": [[1, "asc"]],
                                                        "columns": [
                                                            {"data": null},
                                                            {"data": "parid"},
                                                            {"data": "compname"},
                                                            {"data": "parname"},
                                                            {"data": "email"},
                                                            {"data": "phone"}
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
                                                    t.on( 'order.dt search.dt', function () {
                                                        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                                            cell.innerHTML = i+1;
                                                        } );
                                                    } ).draw();
                                                    //*initialize datatable
                                                });
</script>
<!--/ Page Specific Scripts -->
<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.js"></script>
<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.min.js"></script>

<script>
                                                function printDiv(divName) {
                                                    var headstr = "<html><head><title>Partner List</title></head><body>";
                                                    var footstr = "</body></html>";
                                                    var printContents = document.getElementById(divName).innerHTML;
                                                    //var originalContents = document.body.innerHTML;
                                                    document.body.innerHTML = headstr + printContents + footstr;
                                                    window.print();
                                                    //document.body.innerHTML = originalContents;
                                                    location.href = "report_partner.php";
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
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>

</html>
