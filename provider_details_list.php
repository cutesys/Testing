<?php
$success_msg="";
$page = "employee";
$tab = "requirements";
$sub = "external_requirements";
$sub1 = "hiring_requirment_list";
include("./file_parts/header.php");
$coufArray = array();
$fullname="";
if(isset($_REQUEST["id"])){
	$id=$_REQUEST["id"];
	$nameFet =$db->selectQuery("SELECT `worksite` FROM sm_hiring_requirment WHERE `id`='$id'");
	if (count($nameFet)) {
	//for ($rC = 0; $rC < count($nameFet); $rC++) {
		$fullname = htmlspecialchars_decode($nameFet[0]['worksite']);
	//}
		}
$type_list = $db->selectQuery("SELECT * FROM sm_hiring_requirment_add WHERE hiring_requirment_id='$id' AND `status` = '1' ");



if (count($type_list )) {
	
    for ($cou = 0; $cou < count($type_list); $cou++)	
	{   
		$sl=$cou+1;
	   $values['sl_id']=$sl;
        $values['id'] = $type_list[$cou]['id'];
		  $values['provider'] = $type_list[$cou]['provider'];
        $values['job'] = $type_list[$cou]['job'];
		$values['category'] = $type_list[$cou]['category'];
		  $values['resource_no'] = $type_list[$cou]['resource_no'];
		  
		  
		   $originalDate1                = explode("-",$type_list[$cou]['date_from']);
        $date_from      = $originalDate1[2]."-".$originalDate1[1]."-".$originalDate1[0];
			$values['date_from']= $date_from;
		$originalDate2                = explode("-",$type_list[$cou]['date_to']);
           $date_to      = $originalDate2[2]."-".$originalDate2[1]."-".$originalDate2[0];
		 $values['date_to']= $date_to ;
		  
		  
       // $values['date_from'] = $type_list[$cou]['date_from'];
		//$values['date_to'] = $type_list[$cou]['date_to'];
		$values['current_status'] = $type_list[$cou]['current_status'];
		$coufArray["data"][] = $values;
    }
	
}
}
$fp = fopen('assets/extras/hiringreq.json', 'w');
fwrite($fp, json_encode($coufArray));
fclose($fp);
?>
<style>
.custom {
    width: 105px !important;
}
</style>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2> Requirement Providers List <span> : <?php echo $fullname; ?></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
					<li>
                        <a href="javascript:void(0)"> Hiring Requirement</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Provider List</a>
                    </li>
                  

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
                            <h1 class="custom-font"><strong> </strong>Requirement Provider List</h1>
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
						<!-- <a href="#" role="button" tabindex="0" class="tile-add" title="add visa type">
						 <i class="fa fa-plus"></i>
						 </a>-->
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
                                           <th style="width:150px;" class="no-sort">Provider</th>
											<th style="width:160px;"> Job Position</th>
											<th style="width:160px;">Job Category</th>
                                            <th style="width:150px;" class="no-sort">Resource No</th>
											<th style="width:160px;"> Date From</th>
											<th style="width:160px;">Date To</th>
											<th style="width:160px;">Status</th>
                                            <th style="width:370px;" class="no-sort">Actions</th>
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

                <h3 class="modal-title custom-font">Update Status && Upload Invoices</h3>

            </div>
			</br>
			        <div class="row"><div class="col-sm-1"></div>

                                                    <label class="col-sm-3 control-label" for="inputEmail3">Update Status:</label>

                                                    <div class="col-sm-6" style="margin-left:10px;">

                                                        <select class="form-control" name="invoice_result"

                                                                id="invoice_result">
																<option  value=""> Select </option>

                                                            <option  value="completed"> Completed </option>

                                                            <option value="Cancelled" >Cancelled</option>

                                                           

                                                           
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
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
						
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="row">
											       <div class="col-md-1"></div> 
                                    <div class="col-md-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label">Invoices:</label>
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
								
								
								<input type="hidden" name="id" id ="id" value="" />
								 <input type="hidden" name="invoice_result" id ="invoice_results" value="" />
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
				            </div>
				  

												
											
			
	
   <p></p>
			
			
												
														
            

            <div class="modal-body">

                <p id="selected_status" style="color:#080"></p>

            </div>
        <div class="modal-body">
		
			<span class ="error" id="err"></span>
		</div>
            <div class="modal-footer">
	<input type="hidden" id="hid_del1" value=""/>
                <button class="btn btn-default btn-border" id="submit_btn" >submit</button>
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
               
				{"data": "provider"},
				{"data": "job"},
				{"data": "category"},
				{"data": "resource_no"},
				{"data": "date_from"},
				{"data": "date_to"},
				{"data": "current_status"},
                
               
                {
                    "type": "html",
                    "data": "id",
                    "render": function (data) {
                        return '<a onclick="upl_id(' + data + ')" class="btn btn-xs  btn-green" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3">Upload</a>&nbsp;<a href="hiring_invoice_gallery.php?id=' + data + '" class="btn btn-xs  btn-default mr-5"> View</a><a onclick="delete_id(' + data + ')" class="btn btn-xs  btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';
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
        //*initialize datatable
    });
	
	
		 $('#invoice_result').change(function () {
                var selected_val = $(this).val();
				//alert(selected_val);
				$('#invoice_results').val(selected_val);
                if (selected_val == "completed") {
                $('.selected_result').show();

                } else if (selected_val == "Unfit") {

                  $('.selected_result').hide();
                  } 
                });
</script>

<!--/ Page Specific Scripts -->
<script type="text/javascript">
    function delete_id(type_id)
    {
		//alert(type_id);
        $.session.set('delete_seesion', type_id);
        $('#hid_del').val($.session.get('delete_seesion'));
        // alert($.session.get('delete_seesion'));
    }
    $('#sub_btn').click(function () {
        var pass_val = $('#hid_del').val();
        $.ajax({
            url: "provider_details_delete.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
				$('#inv').html("Invoices Inserted Successfully").fadeOut(2000);
                window.location = "provider_details_list.php?id=<?php echo $id ?>";
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



<script>
    function upl_id(id)
    {
		//alert(id);
        $.session.set('upl_seesion', id);
        $('#hid_del1').val($.session.get('upl_seesion'));
        // alert($.session.get('delete_seesion'));
    }
		
        $('#submit_btn').click(function () {
			var status=$('#invoice_results').val();
			//alert(status);
			var id=$('#hid_del1').val();
		 var fdata = "";
		fdata = $('#form2').serialize();
			 //alert(fdata);
			var numf = 0;
            var formData = new FormData();
				
					  jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
          
            });
			if(status== '')
			{
			
				$('#err').html(" Status Is Required").fadeOut(2000);
			}
			else{
            $.ajax({
                url: "hiring_invoices_upload_action.php?" + fdata  + '&numf=' + numf + '&id=' + id,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
                // alert(data);
				window.location = "provider_details_list.php?id=<?php echo $id ?>";
                   }
				
            });
			}
        });
</script>
</body>

</html>
