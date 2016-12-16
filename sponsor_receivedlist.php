<?php

$page = "dashboard";


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

$resFet = $db->selectQuery("SELECT  `id`,`com_name`,`year`,`month`,`month_name`,`sponser_fee`,`status` FROM `sm_sponser` where `sponsor_id`='" . $_SESSION['id'] . "' AND `status`='paid' and `month`='$m'");

if (count($resFet)) {

    for ($rC = 0; $rC < count($resFet); $rC++) {

        $values['id'] = $resFet[$rC]['id'];

        $values['com_name'] = $resFet[$rC]['com_name'];

        $values['year'] = $resFet[$rC]['year'];

        $values['month'] = $resFet[$rC]['month'];

        $values['month_name'] = $resFet[$rC]['month_name'];

        $values['sponser_fee'] = $resFet[$rC]['sponser_fee'];

        $values['status'] = $resFet[$rC]['status'];

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



            <h2>Sponsorship Fee Received<span></span></h2>



            <div class="page-bar">



                <ul class="page-breadcrumb">

                    <li>

                        <a href="#"><i class="fa fa-home"></i> SME</a>

                    </li>
					<li>

                        <a href="#"><i class="fa fa-home"></i> Dashboard</a>

                    </li>

                    <li>

                        <a href="#">Sponsorship Fee Received</a>

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

                            <h1 class="custom-font"><strong>Sponsorship Fee </strong>Received</h1>

                            <ul class="controls">





                                <!--  <li class="dropdown">



                                  <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">

                                      <i class="glyphicon glyphicon-th-list"></i>

                                      <i class="fa fa-spinner fa-spin"></i>

                                  </a>



                                  <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">



                                      <li>

                                          <a role="button" tabindex="0" class="tile-refresh">

                                              <i class="glyphicon glyphicon-print"></i> Print

                                          </a>

                                      </li>

                                      <li>

                                          <a role="button" tabindex="0" class="tile-fullscreen">

                                              <i class="glyphicon glyphicon-file"></i> PDF

                                          </a>

                                      </li>

                                                                                          <li>

                                          <a role="button" tabindex="0" class="tile-fullscreen">

                                              <i class="glyphicon glyphicon-list-alt"></i> Excel

                                          </a>

                                      </li>

                                  </ul>



                              </li>-->



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

                                            <th style="width:50px;">Company</th>

                                            <th style="width:60px;">Year</th>

                                            <th style="width:30px;">Month</th>

                                            <th style="width:80px;">Sponsorship Fee</th>

                                            <th style="width:30px;">Status</th>

                                            <!--<th style="width:50px;">Action</th>-->

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

        var pass_val = $('#hid_del').val();

        $.ajax({

            url: "sponsor_fee_status.php",

            type: "POST",

            data: {change_val: pass_val},

            success: function (data) {

                window.location = "sponsor_reciept.php";

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

                {  "data": "com_name"
				},

                {

                    "data": "year"

                },

                {

                    "data": "month_name"

                },

                {

                    "data": "sponser_fee"

                },

                {

                    "type": "html",

                    "data": "status",

                    "render": function (data) {

                        return '<label class="near_label">' + data + '</label>';

                    }

                },

                

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

