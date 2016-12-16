<?php
$page = "report";
$sub = "report_shead";
$sub1 = "report_spon_receipt";
include('file_parts/header.php');
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
$cmpArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname, ' ', sm_employee.employee_middlename, ' ', sm_employee.employee_lastname ) AS full_name,sm_sponsor_fee_employee.sponsor_fee_date ,sm_sponsor_fee_employee.sponsor_fee_id,  sm_sponsor_fee_employee.sponsor_fee_amount, sm_sponsor_fee_employee.sponsor_fee_recieving_date, sm_sponsor_fee_employee.sponsor_fee_status
FROM sm_sponsor_fee_employee
INNER JOIN sm_employee ON sm_sponsor_fee_employee.employee_id = sm_employee.employee_id
WHERE sm_sponsor_fee_employee.sponsor_id = '1'
AND sm_sponsor_fee_employee.sponsor_fee_status = 'Paid'
AND MONTH( sm_sponsor_fee_employee.sponsor_fee_date ) ='$m'
AND YEAR( sm_sponsor_fee_employee.sponsor_fee_date ) ='$y'");
if (count($resFet)) {
    $number=1;
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $date_fee=new DateTime($resFet[$rC]['sponsor_fee_recieving_date']);
        $fee_receiving=$date_fee->format("d-m-Y");
        $fee_year=$date_fee->format("Y");
        $fee_month=$date_fee->format("F");
        $values['s_number'] =$number+$rC;
        $values['id'] = $resFet[$rC]['sponsor_fee_id'];
        $values['full_name'] = $resFet[$rC]['full_name'];
        $values['year'] = $fee_year;
        $values['month'] = $fee_month;
        $values['amount'] = $resFet[$rC]['sponsor_fee_amount'];
        $values['status'] = $resFet[$rC]['sponsor_fee_status'];
        $values['received_date']=$fee_receiving;
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

            <h2>Sponsorship Receipt<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Fee</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Receipt</a>
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
                    <section class="tile">
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Sponsorship Fee</strong> List</h1>
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

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-custom" id="products-list">
                                    <thead>
                                    <tr>
                                        <th style="width:5px;">Sl.no</th>
                                        <th style="width:90px;">Employee Name</th>
                                        <th style="width:80px;">Year</th>
                                        <th style="width:90px;">Month</th>
                                        <th style="width:90px;">Sponsorship Fee</th>
                                        <th style="width:90px;">Received Date</th>
                                        <th style="width:90px;">Status</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->
            </div>
        </div>
    </div>
</section>
<!--/ CONTENT -->
</div>
<!--/ Application Content -->
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Are you sure?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="form-group col-md-6 mb-0">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
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
<script src="assets/js/jquerysession.js"></script>
<!--/ vendor javascripts -->

<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

<!--/ custom javascripts -->
<script type="text/javascript">
    function delete_id(id)
    {
        $.session.set('change_seesion', id);
        $('#hid_del').val($.session.get('change_seesion'));
    }
    $('#sub_btn').click(function () {
        var employee_edit_ids = $('#hid_del').val();
        $.ajax({
            url: "sponsor_employee_status.php",
            type: "POST",
            data: {employee_edit_ids: employee_edit_ids},
            success: function (data) {
                window.location = "sponsor_employee_reciept.php";
            }
        });
    });
</script>
<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {
        //initialize datatable
        var t= $('#products-list').DataTable({
            "dom": 'Bf t<"row"<"col-md-4 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12"<"inline-controls text-center no-print"i>><"col-md-4 col-sm-12 no-print"p>>',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: 'Sponsor Fee Receipt'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Sponsor Fee Receipt'
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
            "ajax": 'assets/extras/sponsorFee.json',
            "order": [[0, "asc"]],
            "columns": [
                {"data": "s_number"},
                {"data": "full_name"},
                {"data": "year"},
                { "data": "month"},
                { "data": "received_date"},
                { "data": "amount"},
                {
                    "type": "html",
                    "data": "status",
                    "render": function (data) {
                        return '<label class="near_label">' + data + '</label>';
                    }
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
