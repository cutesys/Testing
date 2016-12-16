<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');

$empArray = array();

$resFet=$db->selectQuery("SELECT DISTINCT CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) AS full_name, sm_employee.employee_designation, sm_employee.employee_employment_id,  sm_employee.employee_id, sm_employee.employee_email
FROM sm_employee
LEFT JOIN sm_medical_visa_status ON sm_employee.employee_id = sm_medical_visa_status.employee_id
WHERE sm_employee.employee_id NOT IN(SELECT employee_id FROM sm_medical_visa_status WHERE medical_status='passed') AND sm_employee.employee_status ='1' AND sm_employee.employee_visatype='Residential Visa'");


if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $values['employee_employment_id'] = $resFet[$rC]['employee_employment_id'];
        $values['full_name'] = $resFet[$rC]['full_name'];
        $values['employee_designation'] = $resFet[$rC]['employee_designation'];
        
        $values['employee_id'] = $resFet[$rC]['employee_id'];
        $values['employee_email'] = $resFet[$rC]['employee_email'];
        //$values['company_status'] = $resFet[$rC]['company_status'];
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
                        <a>Employee List-Under RP Visa</a>
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
                            <h1 class="custom-font"><strong>Employee  List</strong>-Under RP Visa</h1>
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
                                            <th style="width:10px;" >
                                                Sl.no
                                            </th>
                                            <th style="width:90px;">Employee ID</th>
                                            <th style="width:90px;">Name</th>
                                            <th style="width:90px;">Designation</th>
                                            <th style="width:90px;">Email</th>
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

<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">upload medical certificate </h3>
            </div>
			                    <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                        <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label">Medical Certificate</label>
                                    <span class="btn btn-success fileinput-button">

                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" name="files[]" id="file" multiple onchange="javascript:updateList()">
										 <input type="hidden" value="Medical_Certificates" name="profpic" class="dfile">
                                    </span>
                                    <p id="fileList"></p>
                                </div>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>

                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
								
								
								<input type="hidden" name="employee_id" id ="employee_id" value="" />
                        </form>
                    </div>
                    <!-- The table listing the FILES available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
					<span id ="succ" ></span>
                </div>
            
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn1">Yes</button>
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
                {
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "employee_employment_id",
                },
                {
                    "type": "html",
                    "data": "full_name",
                    "render": function (data, type, full, meta) {
                        return '<a href="employee_read.php?uid=' + full.employee_id + '" class=""><i class=""></i> ' + data + '</a>';
                    }},
                {"data": "employee_designation"},
                
                {"data": "employee_email"},
                /*{
                    "type": "html",
                    "data": "employee_id",
                    "render": function (data) {
                        return '<input type="button" value="Upload" id="nofile"  width="30px"class="btn btn-xs btn-default mr-5" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"/><a onclick="delete_id(' + data + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';
                    }}*/
					{
                    "": "html",
                    "data": "employee_id",
                    "render": function (data) {
                        return '<a onclick="upload_id(' + data + ')" class="btn btn-xs btn-default mr-5" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"> Upload</a><a onclick="delete_id(' + data + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';
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
</script>


<script>
    //$(document).ready(function () {
		
        $('#sub_btn1').click(function () {
			
			 //var fdata = $('#hid_del').val();
			 //alert(fdata);
			 
			 var fdata = "";

			//$('#next_btn').click(function () {
				fdata = $('#form2').serialize();
			//});
			alert(fdata);
			
			var numf = 0;
            var formData = new FormData();
					  
            jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
				
            });
					
            $.ajax({
                url: "visa_certificate_upload.php?" + fdata + '&numf=' + numf,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
					alert(data);
					
					window.location = "employee_list_RP.php";
                    
                    

                }
				
            });
        });
    //});
    /**/
</script>

<script>


    function upload_id(id)
    {
        $.session.set('upload_seesion', id);
        $('#hid_del').val($.session.get('upload_seesion'));
		 $('#candidate_id').val($.session.get('upload_seesion'));
		 $('#employee_id').val($.session.get('upload_seesion'));
		 
        //alert($.session.get('delete_seesion'));
    }
	function delete_id(id)
    {
        $.session.set('delete_seesion', id);
        $('#hid_del').val($.session.get('delete_seesion'));
		 $('#candidate_id').val($.session.get('delete_seesion'));
		 $('#employee_id').val($.session.get('delete_seesion'));
        //alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_del').val();
		$.ajax({
            url: "delete_emp_under_rpvisa.php",
            type:"POST",
            data: {pass_val: pass_val},
            success: function (data) {
				alert(data);
                window.location = "employee_list_RP.php";
            }
        });
    });
	
	
	
</script>

<script>
   /* function upload_files(element) {
        $(element).parent('span').siblings('.file_status').html("<img src='assets/images/buffering.gif' width='30' height='30' />");
        // var file_names = $(element).parent('span').siblings('label').html();
        var section = $(element).siblings('.dfile').val();
       // var cp_id = $('#company').val();
        var employee_id = $('#employee_id').val();
        if (employee_id == '') {
            window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
        }
        var numf = 0;
        var formData = new FormData();
        var file_ok = 0;
        jQuery.each(jQuery(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
            } else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
            }
        });
        if (file_ok == 1) {
            $.ajax({
                url: "visa_medical_cer_upload.php?numf=" + numf + '&employee_id=' + employee_id + '&section=' + section,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').html(data);
                }
            });
        }
    } */
</script>






<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

</html>
