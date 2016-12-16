<?php
$page = "recruitment";
$tab = "interview_process";
$sub="CandidateTravel";
$sub1 = "travelling_candidates_list";
include('file_parts/header.php');
//echo "haiiiii";
$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_candidate.candidate_firstname,  ' ', sm_candidate.candidate_middlename,  ' ',
 sm_candidate.candidate_lastname ) AS candidate_name, sm_candidate.candidate_code,sm_candidate.candidate_status,sm_candidate.candidate_id,sm_travelling_details.date_of_travel,sm_travelling_details.Arrival_time,
 sm_travelling_details.candidate_id,sm_travelling_details.travelling_status
FROM sm_candidate
LEFT JOIN sm_travelling_details ON sm_candidate.candidate_id=sm_travelling_details.candidate_id
WHERE  `travelling_status`!='travelled' AND sm_candidate.candidate_status='1'");


if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        //$values['medical_status_id'] = $resFet[$rC]['medical_status_id'];
		
        
		$values['candidate_name'] = $resFet[$rC]['candidate_name'];
		$values['candidate_code'] = $resFet[$rC]['candidate_code'];
		$values['candidate_id'] = $resFet[$rC]['candidate_id'];
		$values['date_of_travel']="";
		$values['Arrival_time']="";
		$travelling_status= ucfirst(strtolower($resFet[$rC]['travelling_status']));
		$values['travelling_status']='';
		if($travelling_status=='Travelling')
		{
		$values['travelling_status']='Ready to travel';}
		else{
		$values['travelling_status']=$travelling_status;	
		}
		$date_of_travel = explode("-",$resFet[$rC]['date_of_travel']);
		$values['date_of_travel'] = $date_of_travel[2]."-".$date_of_travel[1]."-".$date_of_travel[0];
		$values['Arrival_time'] = $resFet[$rC]['Arrival_time'];
		
        $empArray["data"][] = $values;
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
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Travelling Candidate list<span></span></h2>

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
                        <a>Travelling Candidate List</a>
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
                            <h1 class="custom-font"><strong>Travelling Candidates List</strong></h1>
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
                                            <th style="width:50px;">Candidate ID</th>
											 <th style="width:120px;">Candidate Name</th>
											 
											 <th style="width:90px;">Date Of Travel</th>
											 <th style="width:90px;">Arrival Time</th>
											 <th style="width:110px;">Travelling Status</th>
                                            <th style="width:300px;" class="no-sort">Actions</th>
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
<div class="modal splash fade" id="splash2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure To Remove This Record ?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="del_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font"> Travelling Status</h3>
            </div>
			<input type="hidden" id="hid" value=""/>
			<div class="modal-body">
				<label>Travelling Status:</label>
					    <select type="text" name="travelling_status" id="travelling_status" class="form-control">
						<option>Select</option>
						<option value="Travelled">Travelled</option>
						<option value="Not travelled">Not Travelled</option>
						</select>
				<input type="hidden" name="candidate_code" id ="candidate_code" value="" />
 </div>
  <div class="selected_result" style="display: none">				
 <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                         <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
						
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            
                               <div class="modal-body">
                               
								<label>Entry Date:</label>
                                    
                                   <input type="text" name="entry_date" id ="entry_date" value="" class="form-control"/>
								</div>
								<div class="modal-body">
								<span class="error" id="error" style="margin-left:19px;color:red"></span>
								</div>
								<input type="hidden" name="candidate_id" id ="candidate_id" value="" />
								 <input type="hidden" name="visa_stamp" id ="visa_stamp" value="" />
                        </form>
                    
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>
 
 
					<input type="hidden" name="employee_id" id ="employee_id" value="" />
					<div id="suc" style="color:green" ></div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn1">Submit</button>
                <button class="btn btn-default btn-border" id="cancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font"> Travelling Details</h3>
            </div>
			<input type="hidden" id="hid" value=""/>
			<div class="modal-body">
					    <label>Date of Travel:</label>
						<input type="text"  name="travel_date" id ="travel_date" value="" class="form-control" />
						<label>Departure Time:</label>
						<div class='input-group datepicker' data-format="LT">
						<input type="text"  name="departure_time" id ="departure_time" value="" class="form-control" />
						<span class="input-group-addon"> <span class="fa fa-clock-o"></span></span> </div>
						<label>Date of Arrival:</label>
        <input type="text"  name="arrival_date" id ="arrival_date" value="" class="form-control" />
                        <label>Arrival Time:</label>
						<div class='input-group datepicker' data-format="LT">
						<input type="text"  name="arrival_time" id ="arrival_time" value="" class="form-control" onkeydown="return false"/><span class="input-group-addon"> <span class="fa fa-clock-o"></span></span> </div>
						
						<label>Arrival Airport:</label>
						<input type="text"  name="arrival_airport" id ="arrival_airport" value="" class="form-control" />
						<label>Flight No:</label>
						<input type="text"  name="flight_no" id ="flight_no" value="" class="form-control" />
                
				<input type="hidden" name="candidate_code" id ="candidate_code" value="" />
 </div>
 
 <span  id="error" style="margin-left:19px;color:red" ></span>
					
					<span id ="succ" style="margin-left:19px;color:green" ></span>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Submit</button>
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
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/date-format/jquery-dateFormat.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/jquerysession.js"></script>
<!--/ vendor javascripts -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->




<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<script>
//$('#entry_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
$('#arrival_time').timepicker({
    'minTime': '2:00pm',
    'maxTime': '11:30pm',
    'showDuration': true
});
//arrival_time
//departure_time
</script>
<script>
 $(function() {
      //$("#req_date").datepicker({dateFormat: 'dd-mm-yy'});
      $("#entry_date").datepicker({maxDate: 0,dateFormat: 'dd-mm-yy'});
        });

</script>
<script>
$('#travel_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true,onSelect: function(date) {
$("#arrival_date").datepicker('option', 'minDate', date);} });
$('#arrival_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
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
				//{"data": "candidate_code"},
				{"data": "candidate_code"},
                {
                     "type": "html",
                     "data": "candidate_name",
                    "render": function (data, type, full, meta) {
                      return '<a href="candidates_profile.php?can_id=' + full.candidate_id + '" class=""><i class=""></i> ' + data + '</a>';
                    }
					 },
                
				{"data": "date_of_travel",
				"defaultContent": '',},
				{"data": "Arrival_time",
				"defaultContent": '',},
				{"data": "travelling_status",
				"defaultContent": '',},
				{
					"data": "candidate_id",
                    "type": "html",
                    
                    "render": function (data) {
                        return '<a onclick="update_id(' + data + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"> Update status</a> <a onclick="edit_id(' + data + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"> Edit Travelling Details</a> <a onclick="delete_id(' + data + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash2" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';
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
    $('#selected_visa_type').change(function () {
        var selected_visa_type = $(this).val();
		//alert(selected_visa_type);
        $.ajax({
            url: "visa_type_select.php",
            type: "POST",
            data: {selected_visa_type: selected_visa_type},
            success: function (data) {
                //alert(data);
                $('.visa_category').html(data);
            }
        });
    });
	function update_id(id)
    {
        $.session.set('update_seesion', id);
		$('#hid').val($.session.get('update_seesion'));
		$('#candidate_code').val($.session.get('update_seesion'));
        $('#update_id').val($.session.get('update_seesion'));
		
		
		$('#cid').val($.session.get('update_seesion'));
        // alert($.session.get('delete_seesion'));
    }
	  $('#sub_btn1').click(function () { 
  		var candidate_id=$('#hid').val();
		var candidate_code=$('#candidate_code').val();
		var travelling_status=$('#travelling_status').val();
		var entry_date=$('#entry_date').val();
		 
		if(travelling_status=='Travelled'){
		if(entry_date=='')
		{
			$('#error').html("Must Enter Entry Date");
		}
		else {
        $.ajax({
            url: "travelling_candidates_list_action.php",
            type: "POST",
            data: {candidate_id:candidate_id,travelling_status:travelling_status,candidate_code:candidate_code,entry_date:entry_date},
            success: function (data) {
				//alert(data);
				window.location="travelled_candidates_list.php";
                //$('#SucM').html(data);
               //setTimeout('Redirect()', 1000);
            }
			
        });}
	  }
		else {
        $.ajax({
            url: "travelling_candidates_list_action.php",
            type: "POST",
            data: {candidate_id:candidate_id,travelling_status:travelling_status,candidate_code:candidate_code,entry_date:entry_date},
            success: function (data) {
				//alert(data);
				window.location="travelled_candidates_list.php";
                //$('#SucM').html(data);
               //setTimeout('Redirect()', 1000);
            }
			
        });}
  
 });
 $('#sub_btn').click(function () { 
  		var candidate_id=$('#hid').val();
		var candidate_code=$('#candidate_code').val();
		var Date_of_travel=$('#travel_date').val();
		var Date_of_arrival=$('#arrival_date').val();
		var arrival_time=$('#arrival_time').val();
		var departure_time=$('#departure_time').val();
		var arrival_airport=$('#arrival_airport').val();
		var flight_no=$('#flight_no').val();
       
		if(Date_of_travel==''||Date_of_arrival==''||arrival_time==''||departure_time==''||arrival_airport==''||flight_no==''){
			$('#error').html("enter all fields").fadeOut(300);
		}
		else{
        $.ajax({
            url: "travelling_candidates_edit_action.php",
            type: "POST",
            data: {candidate_id:candidate_id,Date_of_travel:Date_of_travel,Date_of_arrival:Date_of_arrival,arrival_time:arrival_time,departure_time:departure_time,arrival_airport:arrival_airport,flight_no:flight_no,candidate_code:candidate_code},
            success: function (data) {
				//alert(data);
				$('#succ').html(data).fadeOut(30000);
				window.location="travelling_candidates_list.php";
                //$('#SucM').html(data);
               //setTimeout('Redirect()', 1000);
            }
			
        });
		}
  
 });
 $('#travelling_status').change(function () {
                var selected_val = $(this).val();
				$('#visa_stamp').val(selected_val);
				
                if (selected_val == "Travelled") {
                $('.selected_result').show();
				}
				else{
					 $('.selected_result').hide();
				}
                
                });
				
				

</script>
<script type="text/javascript">
    function delete_id(id)
    {
        $.session.set('delete_seesion', id);
		//alert(id);
        $('#hid_del').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#del_btn').click(function () {
        var pass_val = $('#hid_del').val();
		
        $.ajax({
            url: "delete_travelling_candidate.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
				
                window.location = "travelling_candidates_list.php";
            }
        });
    });
</script>

<script>
function edit_id(id)
    {
		
        $.session.set('edit_seesion', id);
		//alert(id);
        $('#hid').val($.session.get('edit_seesion'));
		$('#candidate_id').val($.session.get('edit_seesion'));
		//$('#candidate_id').val($.session.get('edit_seesion'));
		//alert(id);
        $.ajax({
			url:"travelling_detailsedit_ajax.php",
			dataType:"json",
			method:"POST",
			data:{edit_id:id},
			success:function(data){
				//alert (data);
				$('#flight_no').val(data.flight_no);
				$('#arrival_airport').val(data.arrival_airport);
				$('#travel_date').val(data.date_of_travel);
				$('#departure_time').val(data.Departure_time);
				$('#arrival_time').val(data.Arrival_time);
$('#arrival_date').val(data.date_of_arrival);				
			}
		});
	}
	
	$('#cancel').click(function () {
        
		$('#suc').html("");
		window.location="travelling_candidates_list.php"
    });
</script>



<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

</html>

				
				
               
        