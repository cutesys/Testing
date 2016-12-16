<?php
$page = "archive";
$sub1 = "recruit_archive";
$sub = "inter";
include("file_parts/header.php");

$cmpArray = array();

$resFet = $db->selectQuery("SELECT sm_interview.interview_id, sm_interview.interview_auto_id,sm_interview.interview_name, CONCAT( sm_interview.interview_country, ',', sm_interview.interview_state, ',', sm_interview.interview_place ) AS place, sm_company.company_name FROM sm_interview INNER JOIN sm_company ON sm_interview.company_id=sm_company.company_id WHERE sm_interview.interview_status='Inactive'");



if (count($resFet)) {



    for ($rC = 0; $rC < count($resFet); $rC++) {

        $values['interview_id'] = $resFet[$rC]['interview_id'];

        $values['interview_auto_id'] = $resFet[$rC]['interview_auto_id'];

        $values['company_name'] = $resFet[$rC]['company_name'];

        $values['interview_name'] = $resFet[$rC]['interview_name'];

        $values['place'] = $resFet[$rC]['place'];

        $cmpArray["data"][] = $values;

    }

}

$fp = fopen('assets/extras/interview.json', 'w');

fwrite($fp, json_encode($cmpArray));

fclose($fp);

?>



<section id="content">







    <div class="page page-shop-products">







        <div class="pageheader">







            <h2>Interview Archive <span></span></h2>







            <div class="page-bar">







                <ul class="page-breadcrumb">



                    <li>



                        <a><i class="fa fa-home"></i> SME</a>



                    </li>



                    <li>



                        <a href="#">Archive</a>



                    </li>



                    <li>



                        <a href="#">Recruitment</a>



                    </li>

                    <li>

                        <a href="#">Interview Archive</a>

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



                            <h1 class="custom-font"><strong>Interview</strong> List</h1>



                            <ul class="controls">



                                <!--<li><a href="javascipt:;"><i class="fa fa-plus mr-5"></i> New Company</a></li>-->











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

                                            <th style="width:90px;">Interview ID</th>

                                            <th style="width:80px;">Interview Name</th>

                                            <th style="width:80px;">Company</th>

                                            <th style="width:80px;" class="no-sort">Place</th>

                                            <th style="width:80px;" class="no-sort">Action</th>

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







<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



    <div class="modal-dialog">



        <div class="modal-content">



            <div class="modal-header">



                <h3 class="modal-title custom-font">Sure To Restore This Record ?</h3>



            </div>



            <input type="hidden" id="hid_del" value=""/>



            <div class="modal-body">







                <p id="candi_status" style="color:#080"></p>



            </div>



            <div class="modal-footer">



                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>



                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>



            </div>



        </div>



    </div>



</div>

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

    function delete_id(id, emp_count)

    {

        $('#hid_del').val(id);

    }

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

            "ajax": 'assets/extras/interview.json',

            "order": [[1, "desc"]],

            "columns": [

                {"data": null},

                {"data": "interview_auto_id"},

                {"data": "interview_name"},

                {"data": "company_name"},

                {"data": "place"},

                {

                    "type": "html",

                    "data": "company_id",

                    "render": function (data, type, full, meta) {

                        return '<a onclick="delete_id(' + full.interview_id + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-plus"></i> Restore</a>';

                    }}



            ],

            "aoColumnDefs": [

                {'bSortable': true, 'aTargets': 0}



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

        }).draw(); //*initialize datatable



    });

    $('#sub_btn').click(function () {

        var interview_id = $('#hid_del').val();

        $.ajax({

            url: "interview_archive_action.php",

            type: "POST",

            data: {interview_id: interview_id},

            success: function (data) {

                $('#candi_status').html(data);

                location.href = "archive_interview.php";

            }

        });

    });

</script>

<!--/ Page Specific Scripts -->

</body>

</html>

