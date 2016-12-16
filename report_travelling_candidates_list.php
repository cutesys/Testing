<?php
$page = "recruitment";
$tab = "recruitment_report";
$sub = "req_travelling_report";
//$sub1 = "req_travelling_report";
include('file_parts/header.php');
echo "haiiiii";
$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_candidate.candidate_firstname,  ' ', sm_candidate.candidate_middlename,  ' ',
 sm_candidate.candidate_lastname ) AS candidate_name, sm_candidate.candidate_code,sm_candidate.candidate_id,sm_travelling_details.date_of_travel,sm_travelling_details.Arrival_time,
 sm_travelling_details.candidate_id,sm_travelling_details.travelling_status
FROM sm_candidate
LEFT JOIN sm_travelling_details ON sm_candidate.candidate_id=sm_travelling_details.candidate_id
WHERE  `travelling_status`!='travelled'");


if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        //$values['medical_status_id'] = $resFet[$rC]['medical_status_id'];
		
		$values['sl_no'] = $rC+1;
        
		$values['candidate_name'] = $resFet[$rC]['candidate_name'];
		$values['candidate_code'] = $resFet[$rC]['candidate_code'];
		$values['candidate_id'] = $resFet[$rC]['candidate_id'];
		
		$travelling_status= ucfirst(strtolower($resFet[$rC]['travelling_status']));
		$values['travelling_status']=$travelling_status;
		$date_of_travel = explode("-",$resFet[$rC]['date_of_travel']);
		$values['date_of_travel'] = $date_of_travel[2]."-".$date_of_travel[1]."-".$date_of_travel[0];
		$values['Arrival_time'] = $resFet[$rC]['Arrival_time'];
		
        $empArray["data"][] = $values;
    }
}
/* while ($row = mysql_fetch_assoc($resEmp)) {
  $empArray["data"][] = $row;
  } */
$fp = fopen('assets/extras/travelling_cand.json', 'w');
fwrite($fp, json_encode($empArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Candidate  Travel List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
					<li>
                        <a>Recruitment</a>
                    </li>
					<li>
                        <a>Candidate Travel</a>
                    </li>
                  
                    
					
                    <li>
                        <a>Travelling Candidate list</a>
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
                            <h1 class="custom-font"><strong>Travelling Candidate List</strong> </h1>
                            <ul class="controls">
                                <!--<li><a href="addcomp.php"><i class="fa fa-plus mr-5"></i> New Company</a></li>-->

                                <
                                <li class="dropdown">

                                    <a role="button" tabindex="0" class="dropdown-toggle settings"
                                       data-toggle="dropdown">
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
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                                            class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">

                           <div class="table-responsive">
                                <table class="table table-striped table-hover table-custom" id="products-list">
                                    <thead>
                                        <tr>
											
                                            <th style="width:20px;" >Sl.no</th>
                                            <th style="width:130px;">Candidate ID</th>
											 <th style="width:130px;">Candidate Name</th>
											 
											 <th style="width:130px;">Date Of Travel</th>
											 <th style="width:130px;">Arrival Time</th>
											 <th style="width:130px;">Travelling status</th>
                                            
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
                                                  $('#products-list').DataTable({
                                                        "dom": 'Bf t<"row"<"col-md-4 col-sm-12"<"inline-controls no-print"l>><"col-md-4 col-sm-12"<"inline-controls text-center no-print"i>><"col-md-4 col-sm-12 no-print"p>>',
                                                        "buttons": [
                                                            {
                                                                extend: 'excelHtml5',
                                                                title: 'Employee List'
                                                            },
                                                            {
                                                                extend: 'pdfHtml5',
                                                                title: 'Employee List'
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
                                                        "ajax": 'assets/extras/travelling_cand.json',
                                                        "order": [[0, "asc"]],
                                                        "columns": [
															
                                                            {"data": "sl_no"},
                                                            
                                                            {"data": "candidate_code"},
															{"data": "candidate_name"},
                                                            {"data": "date_of_travel"},
                                                            {"data": "Arrival_time"},
                                                            {"data": "travelling_status"}
															//,
//                {
//                    "type": "html",
//                    "data": "employee_id",
//                    "render": function (data) {
//                        return '<a href="employee_single.php?uid=' + data + '" class="btn btn-xs btn-default mr-5"><i class="fa fa-pencil"></i> Edit</a><a href="del_employ.php?uid=' + data + '" class="btn btn-xs btn-lightred"><i class="fa fa-times"></i> Delete</a>';
//                    }}
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
                                                            $('.inline-controls').has("#products-list_length").children('label').addClass("no-print");
                                                        }
                                                    });
                                                    
                                                    //*initialize datatable
                                                });
</script>
<!--/ Page Specific Scripts -->

<script>

</script>

<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.js"></script>
<script type="text/javascript" src="assets/js/jquery.techbytarun.excelexportjs.min.js"></script>

<script>
    function printDiv(divName) {
        var headstr = "<!doctype html><head><title>Employee List</title></head><body>";
        var footstr = "</body></html>";
        var printContents = document.getElementById(divName).innerHTML;
        //ar originalContents = document.body.innerHTML;
        document.body.innerHTML = headstr + printContents + footstr;
        window.print();
        location.href = "report_employee.php";
        //document.body.innerHTML = originalContents;
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
