<?php
$page = "recruitment";
$tab = "process_visa";
$sub = "rejected_list";
include('file_parts/header.php');

$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_candidate.candidate_firstname,  ' ', sm_candidate.candidate_middlename,  ' ',
 sm_candidate.candidate_lastname ) AS candidate_name, sm_candidate_visa_process.candidate_id,sm_candidate_visa_process.visa_type,
sm_candidate_visa_process.reason,sm_visa_type.visa_type_name,sm_candidate.candidate_nationality,sm_candidate_application.application_job_position
FROM sm_candidate
LEFT JOIN sm_candidate_visa_process ON  sm_candidate.candidate_id=sm_candidate_visa_process.candidate_id LEFT JOIN sm_candidate_application ON  sm_candidate.candidate_id=sm_candidate_application.candidate_id
LEFT JOIN sm_visa_type ON sm_candidate_visa_process.visa_type=sm_visa_type.visa_type_id
WHERE  `visa_status`='Rejected'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        //$values['medical_status_id'] = $resFet[$rC]['medical_status_id'];
		
        
		$values['candidate_name'] = $resFet[$rC]['candidate_name'];
      $values['candidate_id'] = $resFet[$rC]['candidate_id'];
      $values['candidate_nationality'] = $resFet[$rC]['candidate_nationality'];
      $values['application_job_position'] = $resFet[$rC]['application_job_position'];
	  $values['visa_type'] = $resFet[$rC]['visa_type'];
	  $values['reason'] = $resFet[$rC]['reason'];
		$values['visa_type_name'] = $resFet[$rC]['visa_type_name'];
        $empArray["data"][] = $values;
		//$reason= $values['reason'];
    }
}
/* while ($row = mysql_fetch_assoc($resEmp)) {
  $empArray["data"][] = $row;
  } */
$fp = fopen('assets/extras/processvisa.json', 'w');
fwrite($fp, json_encode($empArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
pop{
	border:transparent;
	color:red;
}
</style>
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Visa Rejected Candidate List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
					
                    <li>
                        <a>process visa</a>
                    </li>
					
                    <li>
                        <a> Visa Rejected list</a>
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
                            <h1 class="custom-font"><strong>Rejected candidate list</strong></h1>
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
                                            <th style="width:10px;" >Sl.no</th>
                                            
											 <th style="width:90px;">Candidate ID</th>
											 <th style="width:90px;">Candidate Name</th>
											 <th style="width:90px;">Nationality</th>
											 <th style="width:90px;">Designation</th>
											 <th style="width:90px;">Visa Type</th>
										
                                            <th style="width:150px;" class="no-sort">Reason</th>
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
                <h3 class="modal-title custom-font" style="text-align:center;color:#fff;font-style:bold;font-size:20px;"> REASON</h3>
				 
					<div class="row">	
					<div class="col-md-6">
				<span  class="pop" id ="reason_box" class="form-control" ></span></div>
                     </div>
					 <div class="row">	
					 <div class="col-md-8"><br><br></div>
					 </div>
					 <div class="row">	
					 <div class="col-md-8"><br><br></div>
					 </div>
            </div>
			
			
			<input type="hidden" id="hid" value="hid"/>
					
					 <!-- <span id ="reason_box" class="form-control" value="" disabled></span>-->
                           
				
				
                
				

  
								
								<input type="hidden" name="candidate_id" id ="candidate_id" value="" />
								 <input type="hidden" name="medical_result" id ="medical_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>

								
								
								<input type="hidden" name="candidate_id" id ="candidate_id" value="" />
								 <input type="hidden" name="medical_result" id ="medical_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                
				            
 
					<input type="hidden" name="employee_id" id ="employee_id" value="" />
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn1">OK</button>
                
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

<!--/ custom javascripts -->




<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<script>
$('#todo_edate').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
$('#todo_edate1').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
</script>
<script>
    $(window).load(function () {

        //initialize datatable
      var t=  $('#products-list').DataTable({
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
            "ajax": 'assets/extras/processvisa.json',
            "order": [[1, "asc"]],
            "columns": [
                {"data": null,
                    "defaultContent": ''
                },
				{"data": "candidate_id"},
                {
                     "type": "html",
                     "data": "candidate_name",
                    // "render": function (data, type, full, meta) {
                        // return '<a href="employee_read.php?uid=' + full.candidate_id + '" class=""><i class=""></i> ' + data + '</a>';
                    // }
					 },
					 {"data": "candidate_nationality"},
					 {"data": "application_job_position"},
                {"data": "visa_type_name"},
				
               
                 {
					 "data": "candidate_id",
                     "type": "html",
                    
                    "render": function (data) {
                        return '<a onclick="update_id(' + data + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash" data-options="splash-2 splash-primary splash-ef-2"> View Reason</a>';
                    }}
            ],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ],
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "drawCallback": function (settings, json) {
                $(".formatDate").each(function (idx, elem) {
                    $(elem).text($.format.date($(elem).text(), "yyyy,mm,d"));
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
    });</script>
<!--/ Page Specific Scripts -->

<script type="text/javascript">
    
	  function update_id(id)
    {
        $.session.set('update_seesion', id);
		$('#hid').val($.session.get('update_seesion'));
		$.ajax({
			url:"reason_ajax.php",
			method:"POST",
			data:{reson_id:id},
			success:function(data){
				$('#reason_box').html(data);
			}
		});
        $('#update_id').val($.session.get('update_seesion'));
		$('#cid').val($.session.get('update_seesion'));
        // alert($.session.get('delete_seesion'));
    }
 
</script>






<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

</html>
