<?php
$page = "sponsor_page";
$sub = "spon_em";
$sub1 = "sp_recpt_list";
include('file_parts/header.php');
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
//$resFet = "SELECT  `com_name`, `year`, `month`,month_name, `sponser_fee`,`status`,`id` FROM `sm_sponser` where `sponsor_id`='" . $_SESSION['id'] . "' AND `status`='paid' and month=$m and year=$y";
//$resSpon = mysql_query($resFet);
//$num_ro = mysql_num_rows($resSpon);
//$spnArray = array();
//while ($row = mysql_fetch_assoc($resSpon)) {
//    $spnArray["data"][] = $row;
//}
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
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $date_fee = new DateTime($resFet[$rC]['sponsor_fee_recieving_date']);
        $fee_receiving = $date_fee->format("d-m-Y");
        $fee_year = $date_fee->format("Y");
        $fee_month = $date_fee->format("F");
        $values['id'] = $resFet[$rC]['sponsor_fee_id'];
        $values['full_name'] = $resFet[$rC]['full_name'];
        $values['year'] = $fee_year;
        $values['month'] = $fee_month;
        $values['amount'] = $resFet[$rC]['sponsor_fee_amount'];
        $values['status'] = $resFet[$rC]['sponsor_fee_status'];
        $values['received_date'] = $fee_receiving;
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
                                            <th style="width:90px;">Employee Name</th>
                                            <th style="width:80px;">Year</th>
                                            <th style="width:90px;">Month</th>
                                            <th style="width:90px;">Sponsorship Fee</th>
                                            <th style="width:90px;">Received Date</th>
                                            <th style="width:90px;">Status</th>
                                            <th style="width:50px;">Action</th>
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
                <h3 class="modal-title custom-font">Change status to unpaid?</h3>
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
                {"data": "full_name"},
                {"data": "year"},
                {"data": "month"},
                {"data": "amount"},
                {"data": "received_date"},
                {
                    "type": "html",
                    "data": "status",
                    "render": function (data) {
                        return '<label class="near_label">' + data + '</label>';
                    }
                },
                {
                    "type": "html",
                    "data": "id",
                    "render": function (data) {
                        // return '<a href="company_profile.php?id=' + data + '" class="btn btn-xs btn-default mr-5"><i class="fa fa-pencil"></i> Edit</a><a href="del_company.php?id=' + data + '" class="btn btn-xs btn-lightred"><i class="fa fa-times"></i> Delete</a>';
                        return '<a onclick="delete_id(' + data + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-check"></i>Edit Status</a>';

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
</script>
</body>

</html>
