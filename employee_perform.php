<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');

$empArray = array();
$resFet = $db->selectQuery("SELECT CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) 
AS employee_name,employee_employment_id,employee_id,employee_designation FROM sm_employee 
 WHERE  `employee_status`='1'");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
       
        $values['employee_employment_id'] = $resFet[$rC]['employee_employment_id'];
		$values['employee_name'] = $resFet[$rC]['employee_name'];
       // $values['date'] = $resFet[$rC]['date'];
	   $values['employee_id'] =$resFet[$rC]['employee_id'];
	  $values['employee_designation'] =$resFet[$rC]['employee_designation'];
        $empArray["data"][] = $values;
    }
}
/* while ($row = mysql_fetch_assoc($resEmp)) {
  $empArray["data"][] = $row;
  } */
$fp = fopen('assets/extras/employee.json', 'w');
fwrite($fp, json_encode($empArray));
fclose($fp);
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Employee List<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a>Employee</a>
                    </li>
                    <li>
                        <a>Employee List-All Companies</a>
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
                            <h1 class="custom-font"><strong>Employee  List</strong>-All Companies</h1>
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
											    <th style="width:90px;">Employee Code</th>
											<th style="width:90px;">Name</th>
										    <th style="width:90px;">Employee Designation</th>
                                           
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

<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Employee Performance</h3>
            </div>
            <input type="hidden" name="employee_id" id="employee_id" value=""/>
			<input type="hidden" name="employee_employment_id" id="employee_employment_id" value=""/>

					
					<div class="modal-body">
					 
               
                    
                        <label for="selected_visa_type">Select Employee Performance: </label>

							<select class="form-control mb-10" name="type_name" id="type_name" required="">
                                        <?php
                                        $select = $db->selectQuery("select * from sm_rating ");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['id']; ?>"> <?php echo $select[$rt]['rating']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                   
					
                </div>
				<div class="modal-body">
			 
                    
                        <label>Date:</label>
                        <input type="text" name="todo_edate" id="todo_edate" class="form-control"/>
                    </div>
					
				 <span class="error" id="error" style="margin-left:40px; color:red;"></span>
				<div id="SucM" style="margin-left:40px; color:green;"></div>
				
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn3" style="color:blue;">Save</button>
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
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<!--/ custom javascripts -->




<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
$('#todo_edate').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
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
            "ajax": 'assets/extras/employee.json',
            "order": [[1, "asc"]],
            "columns": [
                  {"data": null,
                    "defaultContent": ''
                },
				
                {
                     "type": "html",
                     "data": "employee_employment_id",
                    
					 },
				 {
                    "type": "html",
                    "data": "employee_name",
                    "render": function (data, type, full, meta) {
                        return '<a href="employee_perform_list.php?employee_id=' + full.employee_id + '" class=""><i class=""></i> ' + data + '</a>';
                    }},
					 {"data": "employee_designation"},
               
                {
					"data": "employee_id",
					
                    "type": "html",
                    
                    "render": function (data, type, full, meta) {
                        return '<a onclick="employee_id(' + full.employee_id + ')" class="btn btn-xs btn-blue" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"> Add</a>';
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
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );

        } ).draw();
        //*initialize datatable
    });</script>
<!--/ Page Specific Scripts -->

<script type="text/javascript">
function employee_id(id)
    {
        $.session.set('delete_seesion', id);
        $('#employee_id').val($.session.get('delete_seesion'));
		
		$('#cid').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    function delete_id(id)
    {
        $.session.set('delete_seesion', id);
        $('#hid_del').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_del').val();
        $.ajax({
            url: "delete_emp.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
                window.location = "employee_list.php";
            }
        });
    });
	  $('#sub_btn3').click(function () { 

        
		
	var employee_perform=$('type_name').val;
		var date=$('#todo_edate').val();
		var employee_id=$('#employee_id').val();
		
      //  alert(candidate_id);
	  if(employee_perform==''||date=='')
								{
									$('#error').html("enter all fields").fadeOut(2000);
								}
									else{
        $.ajax({
            url: "employee_perform_action.php",
            type: "POST",
            data: {employee_id:employee_id,employee_perform:employee_perform,date:date},
            success: function (data) {
				//alert(data);
				$('#SucM').html(data).fadeout(1000);

                //
               setTimeout('Redirect()', 2000);
            }
			
        });
		
									}
									
  
 });
</script>






<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

</html>
