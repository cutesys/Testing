<?php
$page = "recruitment";
$tab = "candidate";
$sub = "final_candidate_list1";
$head = "";
$head1 = "";
$sub1 = "final_candidate_list";
$tab1 = "";
include("./file_parts/header.php");
$cmpArray = array();
$resFet = $db->selectQuery("SELECT sm_candidate.candidate_id, CONCAT(sm_candidate.candidate_firstname,' ',
sm_candidate.candidate_middlename,' ',sm_candidate.candidate_lastname) as fullname, sm_candidate.candidate_email,
sm_candidate.candidate_phone, sm_candidate.candidate_code, sm_candidate_application.application_job_position FROM
sm_candidate INNER JOIN sm_candidate_application ON sm_candidate.candidate_id=sm_candidate_application.candidate_id 
LEFT JOIN sm_candidate_medical_status ON sm_candidate.candidate_id=sm_candidate_medical_status.candidate_id WHERE 
sm_candidate.candidate_id NOT IN (SELECT candidate_id FROM sm_candidate_medical_status) AND 
sm_candidate.candidate_status='1' AND `candidate_interview_status`='Selected'");

if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
		$selected_candidate_id=$resFet[$rC]['candidate_id'];
		//$check=$db->selectQuery("SELECT * FROM sm_candidate_medical_status WHERE `candidate_id`='$selected_candidate_id'");
		//if(count($check)<=0){
        $values['candidate_id'] = $resFet[$rC]['candidate_id'];
        $values['candidate_code'] = $resFet[$rC]['candidate_code'];
        $values['fullname'] = $resFet[$rC]['fullname'];
        $values['candidate_email'] = $resFet[$rC]['candidate_email'];
        $values['candidate_phone'] = $resFet[$rC]['candidate_phone'];
        $values['candidate_job'] = $resFet[$rC]['application_job_position'];
        $cmpArray["data"][] = $values;
		}
   //}
}
$fp = fopen('assets/extras/company.json', 'w');
fwrite($fp, json_encode($cmpArray));
fclose($fp);
?>
<section id="content">
    <div class="page page-shop-products">
        <div class="pageheader">
            <h2>Selected Candidate List <span></span></h2>

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Recruitment</a>
                    </li>
                    <li>
                        <a href="#">Candidate</a>
                    </li>
                    <li>
                        <a href="#">Medical Pending</a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- page content -->
   
        <div class="pagecontent">
            <!-- row -->

            <div class="row">
                <div class="col-md-12">

                    <section class="tile">



                        <!-- tile header -->

                        <div class="tile-header dvd dvd-btm">

                            <h1 class="custom-font"><strong>Medical</strong>Pending List</h1>

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

                                            <th style="width:90px;">Candidate ID</th>

                                            <th style="width:80px;">Candidate Name</th>

                                            <th style="width:80px;">Designation</th>

                                            <th style="width:80px;">E-mail</th>

                                            <th style="width:80px;" class="no-sort">Phone</th>
											
                                            <th style="width:80px;">Action</th>

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
        </div>
    </div>
</section>
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
		            <div class="modal-header">

                <h3 class="modal-title custom-font">Update Medical Status </h3>

            </div>
			</br>
			        <div class="row"><div class="col-sm-1"></div>

                                                    <label class="col-sm-3 control-label" for="inputEmail3">Medical Status:</label>

                                                    <div class="col-sm-6" style="margin-left:10px;">

                                                        <select class="form-control" name="medical_result"

                                                                id="medical_result">

                                                            <option  value=""> Select </option>

                                                            <option value="Fit" > Fit </option>

                                                            <option  value="Unfit"  > Unfit </option>

                                                           
                                                        </select>

                                                    </div>

                                                </div>
			
							    <p>
							</p>					
						<div class="selected_result" style="display: none">				
 <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                         <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="file" name="redirect" value=""></noscript>
						
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="row">
											       <div class="col-md-1"></div> 
                                    <div class="col-md-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label">Medical Certificates:</label>
                                    <span class="btn btn-success fileinput-button" >

                                        <i class="glyphicon glyphicon-plus"></i>
										   
                                        <span >Add files...</span>
                                        <input type="file" name="file1" id="file" multiple onchange="javascript:updateList()">
                                    </span></div>
									<div class="col-md-4" ></div>
                                    
                                </div>
								<div class="row">
								<div class="col-md-4" ></div>
								
								<div class="col-md-4" ><p id="fileList" style="margin-left:10px;"></p></div><div class="col-md-4" ></div></div>
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
								
								
								<input type="hidden" name="candidate_id" id ="candidate_id" value="" />
								 <input type="hidden" name="medical_result" id ="medical_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>
				  

												
											
			
	
   <p></p>
			
			
												
														
            <input type="hidden" id="hid_del" value=""/>

            <div class="modal-body">

                <p id="selected_status" style="color:#080"></p>

            </div>
        <div class="modal-body">
		
			<span class ="error" id="err"></span>
		</div>
            <div class="modal-footer">
	
                <button class="btn btn-default btn-border" id="sub_btn" >submit</button>
<button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                

            </div>



  

</div>
</div>
</div>
<!--</form> -->
<!--/ Application Content -->
<!-- ============================================
============== Vendor JavaScripts ===============
============================================= -->
<script src="assets/jquery.min.js"></script>
 
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
============== Page Specific Scripts 
================================================ -->\
<script>
updateList = function () {
	var input = document.getElementById('file');
	var output = document.getElementById('fileList');

	output.innerHTML = '<span>';
	for (var i = 0; i < input.files.length; ++i) {
		output.innerHTML += '<p>' + input.files.item(i).name + '</p>';
	}
	output.innerHTML += '</span>';
}



</script>
<script>
    function delete_id(id) {
        $('#hid_del').val(id);
		$('#candidate_id').val(id);
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
            "ajax": 'assets/extras/company.json',
            "order": [[1, "desc"]],
            "columns": [
                {"data": null},
                {"data": "candidate_code"},
                {
                    "type": "html",
                    "data": "fullname",
                    "render": function (data, type, full, meta) {

                        return '<a href="candidate_medical_profile.php?can_id=' + full.candidate_id + '" class=""><i class=""></i> ' + data + '</a>';

                    }},
                {"data": "candidate_job"},
                {"data": "candidate_email"},
                {"data": "candidate_phone"},
                {
                    "type": "html",
                    "data": "company_id",
                    "render": function (data, type, full, meta) {
                        //return '<a onclick="delete_id(' + full.candidate_id + ')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i>Medical status</a>';
						 return '<a onclick="delete_id(' + full.candidate_id + ')" class="btn btn-xs btn-green" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-plus"></i>Medical Status</a>';

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

        }).draw();        //*initialize datatable

    });
			
	
	
		 $('#medical_result').change(function () {
                var selected_val = $(this).val();
				$('#medical_results').val(selected_val);
                if (selected_val == "Fit") {
                $('.selected_result').show();

                } else if (selected_val == "Unfit") {

                  $('.selected_result').hide();
                  } 
                });
	
	        
														

</script>

<script>

		
        $('#sub_btn').click(function () {
			$s=$('#medical_result').val();
		 var fdata = "";
		fdata = $('#form2').serialize();
			 //alert(fdata);
			var numf = 0;
            var formData = new FormData();
				
					  jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
          
            });
			if($s== '')
			{
			
				$('#err').html("Medical Status Is Required").fadeOut(2000);
			}
			else{
            $.ajax({
                url: "selected_candidate_medical_action.php?" + fdata  + '&numf=' + numf,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
                // alert(data);
				window.location = "final_candidate_list.php";
                   }
				
            });
			}
        });
</script>
<!--/ Page Specific Scripts -->
</body>

</html>
