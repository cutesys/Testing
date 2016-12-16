<?php
$page="payroll";
$sub="payroll_pending";
include("file_parts/header.php");
$y = date("Y");
$m = date('m');
$cmpArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname, ' ', sm_employee.employee_middlename, ' ', sm_employee.employee_lastname ) AS full_name, sm_employee.employee_id, sm_employee.employee_designation, sm_payroll.payroll_date, sm_payroll.payroll_id, sm_payroll.salary,sm_payroll.company_id,sm_payroll.payroll_received_date, sm_payroll.payroll_status
FROM sm_payroll
INNER JOIN sm_employee ON sm_payroll.employee_id = sm_employee.employee_id
WHERE sm_payroll.payroll_status = 'Not Paid'
AND sm_employee.employee_status='1'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $company_id = $resFet[$rC]['company_id'];
        $payroll_date=new DateTime($resFet[$rC]['payroll_date']);
        $month=$payroll_date->format("F");
        $year=$payroll_date->format("Y");
        $company_name = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$company_id'");
        $values['payroll_id'] = $resFet[$rC]['payroll_id'];
        $values['employee_name'] = $resFet[$rC]['full_name'];
        $values['employee_designation'] = $resFet[$rC]['employee_designation'];
        $values['employee_salary'] = $resFet[$rC]['salary'];
        $values['month'] = $month;
        $values['year'] = $year;
        $values['employee_id'] = $resFet[$rC]['employee_id'];
        if (count($company_name)) {
            $values['company_name'] = htmlspecialchars_decode($company_name[0]['company_name']);
        }
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
            <h2>Salary Pending List<span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Payroll</a>
                    </li>
                    <li>
                        <a href="#">Salary Pending List</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pagecontent">
            <div class="row">
                <!-- col -->
                <div class="col-md-12">
                    <section class="tile">
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Salary Pending</strong> List</h1>
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
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-custom" id="products-list">
                                    <thead>
                                    <tr>
                                        <th style="width:20px;">Employee ID</th>
                                        <th style="width:20px;">Name</th>
                                        <th style="width:20px;">Designation</th>
                                        <th style="width:20px;">Salary</th>
                                        <th style="width:20px;">Month</th>
                                        <th style="width:20px;">Year</th>
                                        <th style="width:20px;">Company</th>
                                        <th style="width:90px;" class="no-sort">Actions</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ CONTENT -->
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Payment?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Dispatch Date</label>
                        <input type="text" class="form-control" name="salary_date" id="salary_date" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Are you sure?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="update_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
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
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

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
            "ajax": 'assets/extras/sponsorFee.json',
            "order": [[1, "asc"]],
            "columns": [
                {"data": "employee_id"},
                {"data": "employee_name"},
                {"data": "employee_designation"},
                {"data": "employee_salary"},
                {"data": "month"},
                {"data": "year"},
                {"data": "company_name"},
                {
                    "type": "html",
                    "data": "payroll_id",
                    "render": function (data) {
                        return '<a onclick="delete_id(' + data + ')" class="btn btn-xs btn-red" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-check"></i>Pay</a>';
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
        //*initialize datatable
    });
    $('#salary_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>
<!--/ Page Specific Scripts -->
<script type="text/javascript">
    function delete_id(id)
    {
        $.session.set('delete_seesion', id);
        $('#hid_del').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_del').val();
        var salary_date=$('#salary_date').val();
        $.ajax({
            url: "payroll_actions_employee.php",
            type: "POST",
            data: {pay_id: pass_val,salary_date:salary_date},
            success: function (data) {
                window.location = "salary_pending.php";
            }
        });
    });
    $('#update_btn').click(function () {
        var pass_val = $('#hid_del').val();
        $.ajax({
            url: "payroll_actions_employee.php",
            type: "POST",
            data: {status_change: pass_val},
            success: function (data) {
                window.location = "salary_receipt.php";
            }
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
