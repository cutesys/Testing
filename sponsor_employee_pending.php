<?php
$page = "sponsor_page";
$sub = "spon_em";
$sub1 = "sp_emp_pen_list";
include('file_parts/header.php');
//include 'connection.php';
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
$cmpArray = array();

$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname, ' ', sm_employee.employee_middlename, ' ', sm_employee.employee_lastname ) AS full_name,sm_sponsor_fee_employee.sponsor_fee_date ,sm_sponsor_fee_employee.sponsor_fee_id,  sm_sponsor_fee_employee.sponsor_fee_amount, sm_sponsor_fee_employee.employee_salary, sm_sponsor_fee_employee.sponsor_fee_status
FROM sm_sponsor_fee_employee
INNER JOIN sm_employee ON sm_sponsor_fee_employee.employee_id = sm_employee.employee_id
WHERE sm_sponsor_fee_employee.sponsor_id = '1'
AND sm_sponsor_fee_employee.sponsor_fee_status = 'Not Paid'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $date_fee = new DateTime($resFet[$rC]['sponsor_fee_date']);
        $fee_year = $date_fee->format("Y");
        $fee_month = $date_fee->format("F");
        $values['sponsor_fee_id'] = $resFet[$rC]['sponsor_fee_id'];
        $values['full_name'] = $resFet[$rC]['full_name'];
        $values['year'] = $fee_year;
        $values['month'] = $fee_month;
        $values['amount'] = $resFet[$rC]['sponsor_fee_amount'];
        $values['status'] = $resFet[$rC]['sponsor_fee_status'];
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
                        <a href="index.html"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Fee</a>
                    </li>
                    <li>
                        <a href="tables-bootstrap.html">Sponsorship Fee List</a>
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
                                            <th style="width:90px;">Status</th>
                                            <th style="width:150px;" class="no-sort">Actions</th>
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
            <!-- /row -->




        </div>
        <!-- /page content -->

    </div>

</section>
</div>
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Receive Sponsorship Fee ?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Receiving Date</label>
                        <input type="text" class="form-control" name="dop" id="dop" />
                        <input type="hidden" id="hid_reci" value=""/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Receive</button>
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
<!--/ custom javascripts -->




<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {

        //initialize datatable
        var t = $('#products-list').DataTable({
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
            "ajax": 'assets/extras/sponsorFee.json',
            "order": [[1, "asc"]],
            "columns": [
                {"data": null},
                {"data": "full_name"},
                {"data": "year"},
                {"data": "month"},
                {"data": "amount"},
                {
                    "type": "html",
                    "data": "status",
                    "render": function (data) {
                        return '<label class="near_label">' + data + '</label>';
                    }
                },
                {
                    "type": "html",
                    "data": "sponsor_fee_id",
                    "render": function (data) {
                        return '<a onclick="delete_id(' + data + ')" class="btn btn-xs btn-default mr-5 recei_act' + data + '" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-money"></i> Receive</a>';

                    }}
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
        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
        //*initialize datatable
    });


</script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
    $('#dop').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>
<!--/ Page Specific Scripts -->

<script type="text/javascript">

    function delete_id(id)
    {
        $.session.set('recieve_seesion', id);
        $('#hid_reci').val($.session.get('recieve_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_reci').val();
        var dop = $('#dop').val();
        $.ajax({
            url: "sponsor_fee_status.php",
            type: "POST",
            data: {employee_receive: pass_val, dop: dop},
            success: function (data) {
                window.location = "sponsor_employee_receive.php";
            }
        });
    });
</script>
</body>

</html>
