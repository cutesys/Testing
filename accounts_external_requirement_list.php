<?php
$page = "accounts";
$sub == "accounts_external_requirements";
$sub1 == "accounts_external_list";

//$sub1 = "advance_request";

include("file_parts/header.php");
$hirArray = array();
$resFet = $db->selectQuery("SELECT sm_external_requirment.hiring_requirment_id,sm_external_demands.requirement ,sm_external_requirment.category,sm_external_demands.client,sm_external_requirment.hiring_requirment_date_to,sm_external_requirment.designation,sm_external_demands.id,sm_external_requirment.hiring_requirment_nof_person,sm_designation.designation_name,sm_external_requirment.status,sm_external_requirment.hiring_requirment_date_from FROM sm_external_requirment INNER JOIN sm_designation ON sm_external_requirment.designation = sm_designation.designation_id INNER JOIN sm_external_demands ON sm_external_demands.id=sm_external_requirment.id Where sm_external_requirment.hiring_requirment_active='1'");

if (count($resFet)) {

    for ($rC = 0; $rC < count($resFet); $rC++) {
       //$can=$resFet[$rC]['candidate_id'];
	   $values['id'] =($resFet[$rC]['id']);
	   $values['client'] =($resFet[$rC]['client']);
	   $values['requirement'] =($resFet[$rC]['requirement']);
	   $values['category'] =($resFet[$rC]['category']);
	   $values['designation'] =($resFet[$rC]['designation_name']);
	   
	   $yy = ($resFet[$rC]['hiring_requirment_id']);
	   $values['hiring_requirment_id'] =($resFet[$rC]['hiring_requirment_id']);
	   $values['status'] =($resFet[$rC]['status']);
	   
	   $s1=explode("-",$resFet[$rC]['hiring_requirment_date_to']);
		$s=$s1[2]."-".$s1[1]."-".$s1[0];
       // $values['hiring_requirment_date_to'] =($resFet[$rC]['hiring_requirment_date_to']);
		$values['hiring_requirment_date_to'] =$s;
        //$values['employee_name'] =  htmlspecialchars_decode($resFet[$rC]['employee_name']);
		 //$values['hiring_requirment_skills'] =($resFet[$rC]['hiring_requirment_skills']);
		 $values['hiring_requirment_nof_person'] =($resFet[$rC]['hiring_requirment_nof_person']);
		 $s2=explode("-",$resFet[$rC]['hiring_requirment_date_from']);
		$ss=$s2[2]."-".$s2[1]."-".$s2[0];
		 $values['hiring_requirment_date_from'] =$ss;
		 
		 $cau_type = $db->selectQuery("SELECT * FROM sm_external_requirment WHERE `status` != 'Pending' AND `hiring_requirment_id` = '$yy'");
		
		if(count($cau_type)>0){
			$values['casual']="1";
		}
		else{
			$values['casual']="0";
		}
		
		
        $hirArray["data"][] = $values;
		//print_r($values);no need
		//print_r($comArray["data"][0]);die;
		//echo($comArray["data"][0]);die;

	}
}
    


  
$fp = fopen('assets/extras/hiring_external.json', 'w');
fwrite($fp, json_encode($hirArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>External Requirements<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a>HR</a>
                    </li>
                    <li>
                        <a>Employee</a>
                    </li>
					 <li>
                        <a>Requirements</a>
                    </li>
					<li>
                        <a>External Requirements</a>
                    </li>
					<li>
                        <a>External Requirements List</a>
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
                            <h1 class="custom-font"><strong>External Requirements List</strong></h1>
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
                                        <th>Sl.no</th>
										 <th style="width:90px;">Client Name</th>
										 <th style="width:90px;">Requirements</th>
										  <th style="width:90px;">Designation</th>
                                        <th style="width:90px;">Category</th>
                                        <th>Number of Resources Required</th>
                                        <th>Requirement Date From</th>
										<th>Requirement Date To</th>
										 
                                        <th style="width:90px;">Changes</th>
                                      
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
			
                                    <!--<label for="no_emp">Client Name: </label>
                                    <input type="text" name="client" id="client" class="form-control" required>-->
                             
		
			 
								
                     
                                    <label for="prend">Requested Date From: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control req_date_from" name="req_date_from"
                                               id="req_date_from" required=""/>

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
									

                                    <label for="prend">Requested Date To: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="req_date_to"
                                               id="req_date_to" required=""/>

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    
									</div>
									<label for="no_emp">No.of Resources: </label>
                                    <input type="text" name="resources" id="resources" class="form-control" required>
									<label for="no_emp">Hourly Wage : </label>
                                    <input type="text" name="wage" id="wage" class="form-control" required>
									 <label>Available Employees:</label><label id="id"></label>
                                    
                                   <input type="text"  name="employees" id ="employees" readonly value="" class="form-control"/> 
									
                                    

						 
						  
                <!--<h3 class="modal-title custom-font">No Of Employees?</h3>-->
             <input type="hidden" id="hid_del2" value=""/>
            <input type="hidden" id="hid_del" value=""/>
			<input type="hidden"  name="reason" id ="botton1" value="" class="form-control"/>
			
			<input type="hidden" id="hir_id" value=""/>
            <div class="modal-body">

               </div> 
			   </div>
			   
			   <div id="Succ"></div>
           
           <div class="modal-footer">
		   <input type=submit id="check" value="check" class="btn btn-default btn-border" ></input>
		  <button class="btn btn-default btn-border" data-dismiss="modal" id="can_btn">Cancel</button>
           <!-- <button  class="btn btn-default btn-border" id="hiring_req">Hiring</button>-->
			<button  class="btn btn-default btn-border" id="submitted">Submit</button>
			 
			 <div class="good" style="display:none" >
			 <a href="hiring_requirment_add.php" class="btn btn-default btn-border" >Hiring</a>
			 </div>
                <!--<button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>-->
            </div>
			</div>
        </div>
    </div>


<div class="modal splash fade" id="splashdel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Are You Sure To Delete?</h3>
				

            </div>
            <input type="hidden" id="hid_del1" value=""/>
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
<div class="modal splash fade" id="hiring_req" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
            
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
<script src="assets/js/main.js"></script>
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
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
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
    $(window).load(function () {
		
		$('#hiring_req').hide('slow');
		$('#submitted').hide('slow');

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
            "ajax": 'assets/extras/hiring_external.json',
            "order": [[1, "asc"]],
            "columns": [
                {
                    "data": "null",
                    "defaultContent": ''
                },
				 {"data": "client"},
				 {"data": "requirement"},
				 {"data": "designation"},
                {"data": "category"},
                
                {"data": "hiring_requirment_nof_person"},
                {"data": "hiring_requirment_date_from"},
				{"data": "hiring_requirment_date_to"},
			
                {
                    "type": "html",
                    "data": "hiring_requirment_id",
                    "render": function (data,type,full,meta) {
						 var c="";
						if(full.casual==="0"){
                        c='<a onclick="update_id(' + data + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-check"></i>Process</a>';
						}
       else {
							c=full.status; 
							//{"data": "visa_status"};
							}	
						
						
						//return c+m;
						return c;
						}},
				//Process
				{
					"type": "html",
					"data": "hiring_requirment_id",
					"render": function (data,type,full,meta) {
                        return '<a onclick="delete_id(' + data + ')" class="btn btn-xs btn-red" data-toggle="modal" data-target="#splashdel" data-options="splash-ef-3">delete</a><a href="external_requirement_edit.php?edit_id=' + full.id + '" class="btn btn-xs btn-default mr-5"><i class="fa fa-pencil"></i>Edit</a>';
                }},
				
					
            ],
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ],
            "drawCallback": function (settings, json) {
                $(".formatDate").each(function (idx, elem) {
                    $(elem).text($.format.date($(elem).text(), "MMM dd, yyyy"));
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
		$.session.set('update_session',id);
        $('#hid_del').val($.session.get('update_session'));
        // alert($.session.get('delete_seesion'));
		$.ajax({
			url:"process_ajax.php",
			dataType:"json",
			method:"POST",
			data:{update_id:id},
			success:function(data){
				//alert("haii");
				//alert (data);
				//$('#client').val(data.client);
				$(".req_date_from").val(data.from);
				$('#req_date_to').val(data.to);
				$('#resources').val(data.resources);
				$('#hid_del2').val(data.designation);
				
			}
		});
    }
    function delete_id(id)
    {
		//alert(id);
		//$.session.set('delete_session',id);
        $('#hid_del1').val(id);
         
    }
    $('#sub_btn').click(function () {
        var pass_val= $('#hid_del1').val();
		//alert(pass_val);
        $.ajax({
            url: "external_requirement_delete.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
				
                window.location = "external_requirement_list.php";
            }
        });
    });
	
	
	$('#check').click(function () {
        var des_val= $('#hid_del2').val();
		var hire_val= $('#hid_del').val();
		vales = $('#hid_del').val();
		var resources= $('#resources').val();
        $.ajax({
            url: "check_ajax.php",
			dataType:"json",
            type: "POST",
            data: {hire_val : hire_val,des_val : des_val},
            success: function (data) {
			//alert (data.employees);
			


			//$('#employees').show('slow');
				$('#employees').val(data.employees);
				
				if(data.employees<resources){
					//alert (data.employees);
					$('#hiring_req').show('slow');
					$('#hir_id').val(vales);
					//alert(vales);
					//$('.good').append('<a href = "hiring_requirment_add.php?uid=' + vales + '" class="btn btn-default btn-border" >Hiring</a>');
					$('.good').show();
				}
				else{
					$('#submitted').show('slow');
				}
				
               
				
				
				
				
                //window.location = "hiring_requirements.php";
            }
        });
    });
	$('#can_btn').click(function () {
		$('#submitted').hide('slow');
		$('#hiring_req').hide('slow');
		$('#employees').val("");
		$('#wage').val("");
		//$('#req_date_from').val("");
		//$('#req_date_to').val(("");
		 
	 });
	 
	 $('#submitted').click(function () {
       var hire_id			= $('#hid_del').val();
		//var client 		= $('#client').val();
		var req_date_from 		= $('#req_date_from').val();
		var req_date_to 		= $('#req_date_to').val();
		var resources 			= $('#resources').val();
		var wage 			    = $('#wage').val();
		var employees 			= $('#employees').val();
		
		//var hiri_emp= (employees - resources);	
		//alert(hiri_emp);die;
		//if(client =='' || employees =='')
		if(employees =='')
		{
			$('#err').html("All Fields are Required*");
		} else {
        $.ajax({
            url: "external_action.php",
            type: "POST",
            data: {hire_id: hire_id,req_date_from:req_date_from,req_date_to:req_date_to,resources:resources,wage:wage,employees:employees,status:status},
            success: function (data) {
				
					  if (data == 0) {
                    $(Succ).html("Failed");
                    $(leave_to).val("");
					$(leave_from).val("");
					
					 //$("#splash").attr("disabled", true);
                } else if (data == 1){
                    $("#Succ").html("Added");
					//location.href = 'external_requirement_list.php';
                }
				else
				{
					 $(Succ).html("");
				}
				
				
                window.location = "external_requirement_list.php";
			   
            }
			});
		}
    });
	  $('#hiring_req').click(function () {
		 // alert("gggg");
       var hire_id		= $('#hid_del').val();
		//var client 		= $('#client').val();
		var req_date_from 		= $('#req_date_from').val();
		var req_date_to 		= $('#req_date_to').val();
		var resources 			= $('#resources').val();
		var wage 			    = $('#wage').val();
		var employees 			= $('#employees').val();
		var hir_id 			= $('#hir_id').val();
		//alert(hir_id);
		
		var hiri_emp = parseInt(resources) - parseInt(employees);	
		//alert(hiri_emp);
		if(employees ==''|| wage=='')
		{
			$('#err').html("All Fields are Required*");
		} else {
        $.ajax({
            url: "external_action.php",
            type: "POST",
            data: {hiri_emp:hiri_emp,hire_id: hire_id,req_date_from:req_date_from,req_date_to:req_date_to,resources:resources,wage:wage,employees:employees},
            success: function (data) {
				//alert (data);
					  if (data == '0') {
                    $(Succ).html("Failed");
                    $(leave_to).val("");
					$(leave_from).val("");
                } else if (data == '1'){
                    //$("#Succ").html("Passed");
					location.href = 'accounts_hiring_requirment_add.php?uid='+ hir_id;
                }
				else
				{
					 $(Succ).html("");
					  window.location = "external_requirement_list.php";
				}
				
				
               
			   
            }
			});
		}
    });
	 
	
</script>

</body>

</html>