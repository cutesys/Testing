<?php
$page = "employee";
$tab = "employee_leave";
$sub = "leave_up_list"; 

//$sub1 = "advance_request";
include("file_parts/header.php");
$daylen = 60 * 60 * 24;
$fullname="";
if(isset($_REQUEST["uid"]))
{
	$uid=$_REQUEST["uid"];
	
	//echo $uid;die;
$nameFet =$db->selectQuery("SELECT CONCAT( employee_firstname,  ' ', employee_middlename,  ' ', employee_lastname ) AS full_name FROM sm_employee WHERE employee_id='$uid'");
if (count($nameFet)) {
	//for ($rC = 0; $rC < count($nameFet); $rC++) {
		$fullname = htmlspecialchars_decode($nameFet[0]['full_name']);
	//}
		}
	
$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) AS full_name,sm_employee.employee_employment_id,sm_employee.employee_id,sm_employee_leave.reason,sm_employee_leave.leave_from,sm_employee_leave.leave_to,sm_employee_leave.leave_id  FROM sm_employee INNER JOIN sm_employee_leave ON sm_employee.employee_id= sm_employee_leave.employee_id WHERE sm_employee.employee_id=$uid AND sm_employee_leave.leave_type_id='2' AND sm_employee_leave.status='active'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
		$date_from = new DateTime($resFet[$rC]['leave_from']);
		$date_from1=$date_from->format("d/m/Y");
		$date_to = new DateTime($resFet[$rC]['leave_to']);
		$date_to1=$date_to->format("d/m/Y");
		$values['reason'] = $resFet[$rC]['reason'];
        $values['leave_id'] = $resFet[$rC]['leave_id'];
        $values['full_name'] = htmlspecialchars_decode($resFet[$rC]['full_name']);
       $from = $values['leave_from'] = $date_from1;
        $to = $values['leave_to'] = $date_to1;
		$values['employee_id'] = $resFet[$rC]['employee_id'];
	
		$find_noti = (strtotime($resFet[$rC]['leave_to']) - strtotime($resFet[$rC]['leave_from'])) / $daylen;
                $num_days = round($find_noti);
				$values['num_days'] = $num_days;
				if(($num_days)>0){
				$num_day =  $num_days +1;
				}
				else{
					$num_day=1;
				}
				$values['num_days'] = $num_day;
				
				//echo $num_days;die;        
				//$values['employee_id'] = $resFet[$rC]['leave_to'];
       // $values['employee_email'] = $resFet[$rC]['employee_email'];
        //$values['company_status'] = $resFet[$rC]['company_status'];
        $empArray["data"][] = $values;
    }
}
}
/* while ($row = mysql_fetch_assoc($resEmp)) {
  $empArray["data"][] = $row;
  } */
$fp = fopen('assets/extras/medicalleave.json', 'w');
fwrite($fp, json_encode($empArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

      <div class="pageheader">

            <h2>Medical Leave <span> : <?php echo $fullname; ?></span></h2> 

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
					
                    <li>
                        <a>Employee</a>
                    </li>
                    <li>
                        <a>Employee Profile</a>
                    </li>
					 <li>
                        <a>Leave Details</a>
                    </li>
					 <li>
                        <a>Medical Leave</a>
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
                            <h1 class="custom-font"><strong>Medical Leave List</strong></h1>
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

                        <div class="tile-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-custom" id="products-list">
                                    <thead>
                                    <tr>
                                        <th style="width:150px;">Sl.no</th>
                                        <th style="width:150px;">Leave From</th>
                                        <th style="width:150px;">Leave To</th>
										<th style="width:150px;">No.of Days</th>
										<th style="width:150px;">Reason</th>
										<th style="width:250px;">Action</th>
                                     
										
                                        <!--<th style="width:150px;" class="no-sort">Type Of Leaves</th>
                                    </tr>
                                    
                        <!-- /tile body -->
</thead>

                                </table>
                            </div>

                        </div>

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

<div class="modal splash fade" id="splashdel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Are You Sure To Delete?</h3>
            </div>
            <input type="text" id="hid_del1" value=""/>
            <div class="modal-body">

                
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>
				<!--<button class="btn btn-default btn-border" id="nosub_btn">Rejected</button>-->
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<div class="modal splash fade" id="uploadsplash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Upload Medical Certificate </h3>
            </div>
			                    <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                        <form name="step2" id="form2" role="form" style="center" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
							<div class="row">
							<div class="col-md-1"></div>
                                <div class="col-md-8">
								<br>
								<br>
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label " align="center">Medical Certificate</label>
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span >Add files...</span>
                                        <input type="file" name="files[]" id="file" multiple onchange="javascript:updateList()">
										 <input type="hidden" value="Medical_Certificates" name="profpic" class="dfile">
                                    </span></div><div class="col-md-4"></div>
									</div>
									<div class="row"><div class="col-md-4"></div>
									<div class="col-md-4"><p id="fileList" style="margin-left:25px;"></p></div>
									<div class="col-md-4"></div></div>
									<span class="error" id="error"></span>
                                    <p id="fileList"></p>
                                <span class="fileupload-process"></span>
                               
								<input type="hidden" name="employee_id" id ="employee_id" value="<?php echo $uid; ?>" />
								<input type="hidden" name="hid_del1" id ="hid_del1" value="<?php echo $values['leave_id'];?>" />
								<div id="succ"></div>
            
        </div>
                        </form>
						 <div id="succ1"></div>
						<div class="modal-footer">
                <button class="btn btn-default btn-border" id="yes_sub_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
                    </div>
					</div>
					</div>
					</div>
					</div>



<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title custom-font">Leave details</h3>

            </div>

           

            <div class="modal-body">

                  <div class="row">
				  <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <label>Leave Type:</label>
						<?php $LeaveTypes = $db->SelectQuery("SELECT * FROM `sm_employee_leave_type` WHERE `leave_type_status`= 'active'");?>
                        <select type="text" name="leave_type_id	" id="leave_type_id" class="form-control">
                            <option>Select</option>
							<?php
							if(count($LeaveTypes > 0)){							
							for($ly = 0; $ly < count($LeaveTypes); $ly++){ ?>
                            <option value="<?php echo $LeaveTypes[$ly]['leave_type_id']; ?>"><?php echo $LeaveTypes[$ly]['leave_type_name'];?></option>
							<?php } } else { echo "Data Not Found"; } ?>
                        </select>
						
                    </div>
					 <div class="col-md-2"></div>
                </div>
				 <div id="approved_div" >
				<div class="row">
				<div class="col-md-1"></div>
                    <div class="col-md-8">
                        <label>Leave From Date:</label>
                        <input type="text" name="leave_from" id="leave_from" class="form-control" <?php ?> />
                    </div>
                </div>
				<div class="row">
				<div class="col-md-1"></div>
                    <div class="col-md-8">
                        <label>Leave To Date:</label>
                        <input type="text" name="leave_to" id="leave_to" class="form-control"/>
                    </div>
                </div>
				<div class="col-md-1"></div>
                    <div class="col-md-8">
                        <!--<label>employee Id:</label>-->
                        
                    </div>
                </div>
				<div class="row">
					<div class="col-sm-4"></div>
					<span id="err" style="color:red;margin-left:13px;"></span> 
				</div>
				<div class="row">
					<div class="col-sm-4"></div>
					<span id="Succ" style="margin-left:13px;"></span> 
				</div>
				<div class="selected_result" style="">				
 <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                         <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
						
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
											        

                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label>Reason:</label><label id="id"></label>
                                    
                                   <input type="text"  name="reason" id ="reason" value="" class="form-control"/> 
								   
                                </div>
                                
                              <span class="error" id="error"></span>
								
								
				
								 <input type="hidden" name="medical_result" id ="leave_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>
            </div>
			</div>
			<input type="hidden"  id="employee_id" value=""/>
			<input type="hidden" id="hid_del"/>
            <div class="modal-footer">

                <button class="btn btn-default btn-border" id="sub_btn1">Submit</button>

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

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->
<!--/ custom javascripts -->




<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
$('#leave_from').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true,onSelect: function(date) {
		$("#leave_to").datepicker('option', 'minDate', date);} });
$('#leave_to').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>

<script>
    $(window).load(function () {

        //initialize datatable
        var t =$('#products-list').DataTable({
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
            "ajax": 'assets/extras/medicalleave.json',
            "order": [[1, "asc"]],
            "columns": [
                {
                    "data": "null",
                    "defaultContent": ''
                },
               
			   
               
                {"data": "leave_from"},
                {"data": "leave_to"},
				{"data": "num_days"},
				{"data": "reason"},
				//{"data": "employee_id"},
				
				{
					"type": "html",
					"data": "leave_id",
					
					//"data": "validity_period",
					"render": function (data) {
                        return '<a onclick="delete_id(' + data + ')" class="btn btn-xs btn-red " data-toggle="modal" data-target="#splashdel" data-options="splash-ef-3">Delete </a>&nbsp;&nbsp;<a onclick="edit_id(' + data + ')" class="btn btn-xs btn-blue"  data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class=""></i>Edit</a>&nbsp;&nbsp;<a href="emp_medical_doc_gallery.php?uid=<?php echo $_GET['uid'] ?>"  class="btn btn-xs btn-green mr-5"  data-options="splash-ef-3"style="">View</a>';
                }}
				
				
				
                
				
				
					
            ],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ],
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        //*initialize datatable
    });</script>
<script type="text/javascript">
   function delete_id(id)
    {
		$.session.set('delete_session',id);
        $('#hid_del1').val($.session.get('delete_session'));
		//alert(id);
      // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val= $('#hid_del1').val();
		
        $.ajax({
            url: "casual_delete.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
				//redirect();
				
                window.location = "medical_leavelist.php?uid="+<?php echo $uid ?>;
            }
        });
    });
	</script>
	
	<script>
	updateList = function () {
                                                var input = document.getElementById('file');
                                                var output = document.getElementById('fileList');

                                                output.innerHTML = '<label class="col-sm-6 control-label">';
                                                for (var i = 0; i < input.files.length; ++i) {
                                                    output.innerHTML += '<p>' + input.files.item(i).name + '</p>';
                                                }
                                                output.innerHTML += '</label>';
                                            }

      function edit_id(id)
    {
		
        $.session.set('edit_seesion', id);
		  
        $('#hid_del').val($.session.get('edit_seesion'));
		//$('#employee_id').val($.session.get('edit_seesion'));
		$.ajax({
			url:"casual_ajax.php",
			dataType:"json",
			method:"POST",
			data:{edit_id:id},
			success:function(data){
				 //alert (data);
				$('#reason').val(data.reason);
				$('#leave_from').val(data.leave_from);
				$('#leave_to').val(data.leave_to);
				$('#leave_type_id').val(data.leave_type_id);
			}
		});
	}
	
	
	
	
    $('#sub_btn1').click(function () {
		
		
		  var employee_id = $('#employee_id').val();
		//alert($('#hid_del').val());
		//alert($('#employee_id').val());
		var employee_id = <?php echo $uid ?>;
		//alert(employee_id);
		

		 //var pass_val= $('#employee_id').val();
        var leave_id 		= $('#hid_del').val();
		var reason 		        = $('#reason').val();
		var leave_type_id 		= $('#leave_type_id').val();
		var leave_from 			= $('#leave_from').val();
		var leave_to 			= $('#leave_to').val();
	  
		
		if(leave_type_id =='' || leave_from =='')
		{
			$('#err').html("All Fields are Required*");
		} else {
        $.ajax({
            url: "employee_leave_action.php",
            type: "POST",
            data: {leave_id:leave_id,leave_type_id:leave_type_id,leave_from:leave_from,reason:reason,leave_to:leave_to,employee_id: <?php echo $uid ?>},
            success: function (data) {
				//alert (data);
					  if (data == 0) {
                    $(Succ).html("Leave already exist");
                    $(leave_to).val("");
					$(leave_from).val("");
                } else if (data == 1){
                    $(Succ).html("Added");
					location.href = "medical_leavelist.php?uid="+<?php echo $uid ?>;
                }
				else
				{
					 $(Succ).html("");
				}
				
				//$('#Succ').html("");
                //window.location = "employeeLeave.php";
			   
            }
			});
		}
    });
	$('#leave_type_id').change(function () {
                var selected_val = $(this).val();
				$('#leave_results').val(selected_val);
                if (selected_val == "1" || selected_val == "2" ) {
                $('.selected_result').show();
				}
				else{
					 $('.selected_result').hide();
				}
                
                });
				</script>
				<script>
			
				
	 $('#yes_sub_btn').click(function () {
			$s=$('#file').val();
			 var fdata = $('#hid_del1').val();
			 var pass_val= $('#employee_id').val();
			 //alert(pass_val);
			 //alert(fdata);
			 
			 var fdata = "";

			//$('#next_btn').click(function () {
				fdata = $('#form2').serialize();
			//});
			
			
			var numf = 0;
            var formData = new FormData();
					  
            jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
				
            });
			$.ajax({
                url: "medical_leave_action.php?" + fdata + '&numf=' + numf + '&pass_val=' + pass_val,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
				
				 data: formData,pass_val,
                success: function (data) {
					//alert(data);
					$('#succ1').html(data);
					//alert(data);
					//window.location = "employee_list_RP.php";
                    }
				});
	 });
	

</script>

	
<!--/ Page Specific Scripts -->


</body>

</html>
