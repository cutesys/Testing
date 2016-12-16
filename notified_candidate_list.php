<?php
$page = "recruitment";
$tab = "CandidateTravel";
$sub = "notified_candidate_list";
include('file_parts/header.php');

$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_candidate.candidate_firstname,  ' ', sm_candidate.candidate_middlename,  ' ',
 sm_candidate.candidate_lastname ) AS candidate_name, sm_candidate.candidate_status,sm_candidate.candidate_code,sm_candidate.candidate_nationality,  sm_candidate_visa_process.candidate_id,sm_candidate_visa_process.visa_type,sm_candidate_visa_process.visa_no,sm_candidate_visa_process.visa_expiry,
 sm_candidate_visa_process.applied_visa_date
FROM sm_candidate
LEFT JOIN sm_candidate_visa_process ON  sm_candidate.candidate_id=sm_candidate_visa_process.candidate_id
WHERE sm_candidate.candidate_id NOT IN (SELECT candidate_id FROM sm_travelling_details)

AND `notified_status`='Notified' AND sm_candidate.candidate_status='1'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        //$values['medical_status_id'] = $resFet[$rC]['medical_status_id'];
		
        
		$values['candidate_name'] = $resFet[$rC]['candidate_name'];
		$values['candidate_code'] = $resFet[$rC]['candidate_code'];
      $values['candidate_id'] = $resFet[$rC]['candidate_id'];
	  $visa_type_id = $resFet[$rC]['visa_type'];
	  $visa_type_select = $db->selectQuery("SELECT `visa_type_name` FROM sm_visa_type WHERE `visa_type_id`='$visa_type_id'");
		$values['visa_type'] = $visa_type_select[0]['visa_type_name'];
	  $values['applied_visa_date'] = $resFet[$rC]['applied_visa_date'];
	  $values['visa_no'] = $resFet[$rC]['visa_no'];
	  $visa_expiry = explode("-",$resFet[$rC]['visa_expiry']);
	  $values['visa_expiry'] = $visa_expiry[2]."-".$visa_expiry[1]."-".$visa_expiry[0];
	  //$values['candidate_name'] = $resFet[$rC]['candidate_name'];
		
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
      <h2>Candidate  Travel List<span></span></h2>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="#"><i class="fa fa-home"></i> SME</a> </li>
          <li> <a>Recruitment</a> </li>
          <li> <a>Candidate  Travel</a> </li>
          <li> <a>Notified Candidates list</a> </li>
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
              <h1 class="custom-font"><strong>Notified candidates list</strong></h1>
              <ul class="controls">
                <li class="dropdown"> <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown"> <i class="fa fa-cog"></i> <i class="fa fa-spinner fa-spin"></i> </a>
                  <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                    <li> <a role="button" tabindex="0" class="tile-toggle"> <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span> <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span> </a> </li>
                    <li> <a role="button" tabindex="0" class="tile-refresh"> <i class="fa fa-refresh"></i> Refresh </a> </li>
                    <li> <a role="button" tabindex="0" class="tile-fullscreen"> <i class="fa fa-expand"></i> Fullscreen </a> </li>
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
                      <th style="width:90px;">Candidate Name</th>
                      <th style="width:90px;">Candidate Code</th>
                      <th style="width:90px;">Visa Type</th>
                      <th style="width:90px;">Visa Number</th>
                      <th style="width:90px;">Visa Expiry</th>
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

<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
          <input type="text"  name="arrival_time" id ="arrival_time" value="" class="form-control" onkeydown="return false"/>
          <span class="input-group-addon"> <span class="fa fa-clock-o"></span></span> </div>
        <label>Arrival Airport:</label>
        <input type="text"  name="arrival_airport" id ="arrival_airport" value="" class="form-control" />
        <label>Flight No:</label>
        <input type="text"  name="flight_no" id ="flight_no" value="" class="form-control" />
        <input type="hidden" name="candidate_code" id ="candidate_code" value="" />
      </div>
      <div class="modal-body"> <span class="error" id="error" ></span> </div>
      
     <div id="succ" style="color:green" class="form-control"></div>
      <div class="modal-footer">
        <button class="btn btn-default btn-border" id="sub_btn">Submit</button>
        <button class="btn btn-default btn-border" id ="cancel" data-dismiss="modal">Cancel</button>
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
                {
                     "type": "html",
                     "data": "candidate_name",
                    "render": function (data, type, full, meta) {
                         return '<a href="candidates_profile.php?can_id=' + full.candidate_id + '" class=""><i class=""></i> ' + data + '</a>';
                     }
					 },
                {"data": "candidate_code"},
				{"data": "visa_type"},
				{"data": "visa_no"},
				{"data": "visa_expiry"},
				
               
                {
					"data": "candidate_id",
                    "type": "html",
                    
                    "render": function (data) {
                        return '<a onclick="update_id(' + data + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"> Confirm</a>';
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
	function convertTo24Hour(time) {
											time = time.toUpperCase();
											var hours = parseInt(time.substr(0, 2));
											if(time.indexOf('AM') != -1 && hours == 12) {
												time = time.replace('12', '0');
											}
											if(time.indexOf('PM')  != -1 && hours < 12) {
												time = time.replace(hours, (hours + 12));
											}
											return arr=time.replace(/(AM|PM)/, '');
											
							}
	  $('#sub_btn').click(function (e) { 
	  e.preventDefault();
	  
  		var candidate_id=$('#hid').val();
		var candidate_code=$('#candidate_code').val();
		var Date_of_travel=$('#travel_date').val();
		var arrival_date=$('#arrival_date').val();
		var arrival_time=$('#arrival_time').val();
							
		//var arrival_time_check = date("H:i", strtotime(arrival_time));
		var arrival_time_check= convertTo24Hour(arrival_time);
		//alert("arrival");alert(arrival_time_check);
		var departure_time=$('#departure_time').val();
		var departure_time_check= convertTo24Hour(departure_time);
		//alert("departure");alert(departure_time_check);
		//$departure_time_check = date("H:i", strtotime(departure_time));
		
		var arrival_airport=$('#arrival_airport').val();
		var flight_no=$('#flight_no').val();
       
		if(Date_of_travel=='' || arrival_date=='' || arrival_time==''|| departure_time==''|| arrival_airport==''|| flight_no=='' ){
			 $('#error').html("enter all fields").fadeOut(300);
		}
else{			  
        $.ajax({
			
            url: "notified_candidate_list_action.php",
            type: "POST",
            data: {candidate_id:candidate_id,Date_of_travel:Date_of_travel,arrival_time:arrival_time,departure_time:departure_time,arrival_airport:arrival_airport,flight_no:flight_no,candidate_code:candidate_code,arrival_date:arrival_date,departure_time_check:departure_time_check,arrival_time_check:arrival_time_check},
            success: function (data) {
				//alert(data);
				if(data==0){
				 $('#succ').html("Invalid").fadeOut(30000);
				}
				else if(data==1){
					$('#succ').html("Added Successfully").fadeOut(30000);
				 window.location="notified_candidate_list.php";
				}
                //$('#SucM').html(data);
               //setTimeout('Redirect()', 1000);
           
			}
        });
}
				
  
 });
 
 

				

</script> 
<script>
$('#cancel').click(function (e) {
	e.preventDefault();
	$('#succ').html("");
	window.location="notified_candidate_list.php";
 });
 
</script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body></html>