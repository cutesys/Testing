<?php

$page = "report";
$sub = "r_pay";
$sub1 = "report_receipt";
include("file_parts/header.php");
?>
<?php

$y = date("Y");

$m = date('m');

$cmpArray = array();

$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname, ' ', sm_employee.employee_middlename, ' ', sm_employee.employee_lastname ) AS full_name, sm_employee.employee_id, sm_employee.employee_designation, sm_payroll.payroll_date, sm_payroll.payroll_id, sm_payroll.salary,sm_payroll.company_id,sm_payroll.payroll_received_date, sm_payroll.payroll_status

FROM sm_payroll

INNER JOIN sm_employee ON sm_payroll.employee_id = sm_employee.employee_id

WHERE sm_payroll.payroll_status = 'Paid'

AND sm_employee.employee_status='1'");

if (count($resFet)) {
    $number=1;

    for ($rC = 0; $rC < count($resFet); $rC++) {

        $company_id = $resFet[$rC]['company_id'];

        $company_name = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$company_id'");
$values['s_number']=$number+$rC;
        $values['payroll_id'] = $resFet[$rC]['payroll_id'];

        $values['employee_name'] = $resFet[$rC]['full_name'];

        $values['employee_designation'] = $resFet[$rC]['employee_designation'];

        $values['employee_salary'] = $resFet[$rC]['salary'];
	    $date = explode("-",$resFet[$rC]['payroll_received_date']);
        $employee_doj=$date[2]."/".$date[1]."/".$date[0];
		$values['payroll_received_date']=$employee_doj;

        $values['employee_id'] = $resFet[$rC]['employee_id'];

        if (count($company_name)) {

            $values['company_name'] = $company_name[0]['company_name'];

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

            <h2>Salary Receipt<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">

                    <li>

                        <a href="#"><i class="fa fa-home"></i> SME</a>

                    </li>

                    <li>

                        <a href="#">Payroll</a>

                    </li>

                    <li>

                        <a href="#">Salary Receipt</a>

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

                            <h1 class="custom-font"><strong>Salary</strong> Receipt</h1>

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
                                        <th style="width:5px;">Sl.no</th>

                                        <th style="width:20px;">Employee ID</th>

                                        <th style="width:20px;">Name</th>

                                        <th style="width:20px;">Designation</th>

                                        <th style="width:20px;">Salary</th>

                                        <th style="width:20px;">Company</th>

                                        <th style="width:20px;">Received Date</th>

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

        $('#products-list').DataTable({

            "dom": 'Bf t<"row"<"col-md-4 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12"<"inline-controls text-center no-print"i>><"col-md-4 col-sm-12 no-print"p>>',

            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: 'Salary Receipt'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Salary Receipt'
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
        {"data":"s_number"},

                {"data": "employee_id"},

                {"data": "employee_name"},

                {"data": "employee_designation"},

                {"data": "employee_salary"},

                {"data": "company_name"},

                {"data": "payroll_received_date"}

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

