<?php
$page = "visa";
$tab = "visa_settings";
$sub = "visa_type_settings";
$sub1 = "visa_type_list";
include("./file_parts/header.php");
$coufArray = array();



$type_list = $db->selectQuery("SELECT sm_hiring_requirment.id,sm_hiring_requirment.worksite,sm_hiring_requirment.resources,sm_hiring_req_add.id,sm_hiring_req_add.provider,sm_hiring_req_add.job,sm_hiring_req_add.category,sm_hiring_req_add.resource_no,sm_hiring_req_add.date_from,sm_hiring_req_add.date_to FROM sm_hiring_requirment INNER JOIN sm_hiring_req_add ON sm_hiring_req_add.id = sm_hiring_requirment.id WHERE sm_hiring_req_add.status='1'");


if (count($type_list )) {
	
    for ($cou = 0; $cou < count($type_list ); $cou++) 
		
		
	{   
		
		$sl=$cou+1;
	   // $values['sl_id']=$sl;
        $values['id'] = $type_list[$cou]['id'];
        $values['worksite'] = $type_list[$cou]['worksite'];
		$values['resources'] = $type_list[$cou]['resources'];
		  $values['provider'] = $type_list[$cou]['provider'];
        $values['job'] = $type_list[$cou]['job'];
		$values['category'] = $type_list[$cou]['category'];
		  $values['resource_no'] = $type_list[$cou]['resource_no'];
        $values['date_from'] = $type_list[$cou]['date_from'];
		$values['date_to'] = $type_list[$cou]['date_to'];
		 $coufArray["data"][] = $values;
    }
}
$fp = fopen('assets/extras/hiringreq.json', 'w');
fwrite($fp, json_encode($coufArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2> Requirment List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
					<li>
                        <a href="javascript:void(0)"> Visa</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Settings</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Type</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Type List</a>
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
                            <h1 class="custom-font"><strong> </strong>Requirment Type List</h1>
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
							  <li>
						 <a href="visa_type_add.php" role="button" tabindex="0" class="tile-add" title="add visa type">
						 <i class="fa fa-plus"></i>
						 </a>
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
                                <table class="table table-striped table-hover table-custom" id="products-list">
                                    <thead>
                                        <tr>
                                            
                                            <th class="no-sort" style="width:10px;"></th>
                                            <th style="width:80px;" class="no-sort">Sl No.</th>
                                            <th style="width:160px;"> Worksite</th>
											<th style="width:160px;">Total Resources</th>
                                            <th style="width:150px;" class="no-sort">Provider</th>
											<th style="width:160px;"> Job Position</th>
											<th style="width:160px;">Job Category</th>
                                            <th style="width:150px;" class="no-sort">Resource No</th>
											<th style="width:160px;"> Date From</th>
											<th style="width:160px;">Date To</th>
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
<!--/ CONTENT -->


<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure To Remove This Record ?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">

<!--                <p>This sure is a fine modal, isn't it?</p>

 <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>-->
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
            "ajax": 'assets/extras/hiringreq.json',
            "order": [[1, "asc"]],
            "columns": [
               
                {
                    "data": "null",
                    "defaultContent": ''},
                {"data": "sl_id"},
                {"data": "worksite"},
				{"data": "resources"},
				{"data": "provider"},
				{"data": "job"},
				{"data": "category"},
				{"data": "resource_no"},
				{"data": "date_from"},
				{"data": "date_to"},
                
               
                {
                    "type": "html",
                    "data": "visa_type_id",
                    "render": function (data) {
                        return '<a href="visa_type_edit.php?type_id=' + data + '" class="btn btn-xs btn-default mr-5"><i class="fa fa-pencil"></i> Edit</a><a onclick="delete_id(' + data + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';
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

<!--/ Page Specific Scripts -->
<script type="text/javascript">
    function delete_id(type_id)
    {
        $.session.set('delete_seesion', type_id);
        $('#hid_del').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_del').val();
        $.ajax({
            url: "visa_type_delete.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
                window.location = "visa_type_list.php";
            }
        });
    });</script>
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
