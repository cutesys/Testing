<?php
$success_msg="";
$page = "employee";
$tab = "work_plan";
$sub = "hiring_requirements";
$sub1 = "hiring_add";
include('file_parts/header.php');
$id = $_GET['id'];
$display_name = "";
$select_name = $db->selectQuery("SELECT `provider` FROM `sm_hiring_requirment_add` WHERE `id`='$id'");
if (count($select_name)) {
    $display_name = $select_name[0]['provider'];
}
?>
<style>
    .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
        height: 150px !important;
    }
</style>
<section id="content">
    <div class="page page-gallery">
        <div class="pageheader">
            <h2>Invoices <span> : <?php echo @$display_name; ?></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Hiring Requirement</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Provider</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Invoices</a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-dark" role="tablist">
                
                
                <li role="presentation"><a href="hiring_invoice_gallery.php?id=<?php echo $id; ?>" style="color:#16a085;">Documents</a></li>
            </ul>
			<ul class="mix-controls pull-left">
			 
				    
				
                <li class="select-all">
                    <label class="checkbox checkbox-custom checkbox-custom inline-block m-0">
                        <input type="checkbox"><i></i> Select all
                    </label>
                </li>
                <li class="mix-control disabled">
                    <a class="email_btn" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-envelope-o"></i> Email</a>
                </li>
                <li class="mix-control disabled">
                    <a  class="download_btn" id="dwnbtn"><i class="fa fa-download"></i> Download</a>
                </li>
				     <li class="mix-control disabled">
                    <a class="edit_btn" href="#?uid=<?php echo $id; ?>" data-toggle="modal" data-target="#splash2" data-options="splash-ef-3"><i class="fa fa-pencil"></i> Edit</a>
					
                </li>
                <li class="mix-control disabled">
                    <a class="delete_btn" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"><i class="fa fa-trash-o"></i> Delete</a>
                </li>
               
            </ul>
            <ul class="mix-filter ">
			
			   <!--<li class="filter" data-filter=".invoices" style="margin-left:480px;" >
                    Invoices
                </li>

                
             <li class="filter" data-filter=".Candidate_Picture">
                    Picture
                </li>
                <li class="filter" data-filter=".Passport_Documents">
                    Passport
                </li>
                 <li class="filter" data-filter=".ID_Card">
                    ID Card
                </li> 
                <!--<li class="filter" data-filter=".Visa">
                    Visa
                </li>
                <li class="filter" data-filter=".Resume">
                    Resume
                </li>
                <li class="filter" data-filter=".Experience_Certificates">
                    Experience
                </li>
               <li class="filter" data-filter=".Driving_License">
                    License
                </li>-->
				

            </ul>
           
            <!-- Tab panes -->
			
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="col4">
                    <!-- row -->
                    <div class="row mix-grid">
                        <div class="gallery" id="galDiv" data-lightbox="gallery">
                            <!-- col -->
                            
							  
							
							<?php
							$disp_image = "";
                            $file_type = "";
							 $invoices = $db->selectQuery("SELECT `invoices` FROM `sm_hiring_requirment_invoices` WHERE `provider_id`='$id'");
							if (!empty($invoices)) {
                                // print_r($invoices);
                                for ($mf = 0; $mf < count($invoices); $mf++) {
									$images_with_paths = $invoices[$mf]['invoices'];
									//print_r($images_with_paths);
									if(!empty($images_with_paths)){
                                    $explod_image = explode(",", $images_with_paths); //
                                    $image_clas = "invoices";
                                    $count_image = count($explod_image);
                                    foreach ($explod_image as $img) {
									 
									 $fileExtension = explode(".", $img);
                                        if ($fileExtension[1] == 'pdf' || $fileExtension[1] == 'PDF') {
                                            $disp_image = "assets/images/pdf_image.jpg";
                                            $file_type = "pdf";
                                        } if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc' || $fileExtension[1] == 'DOCX' || $fileExtension[1] == 'DOC') {
                                            $disp_image = "assets/images/docx_image.png";
                                            $file_type = "docx";
                                        } if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png' || $fileExtension[1] == 'PNG' || $fileExtension[1] == 'JPG') {
                                            if(file_exists($img) && $img!=''){
											$disp_image = $img;
											} else { $disp_image = "assets/images/Image-Not-Found.png"; }
                                            $file_type = "img";
                                        }
										
							?>
							
						  <div class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_clas; ?>">
                                            <div class="img-container">
                                               <!--<input type="hidden" id="image_id" value="<?php// echo $invoices[$mf]['id']; ?>" />-->
                                                <input type="hidden" id="filename" value="<?php echo $image_clas; ?>"/>
                                                <img class="img-responsive" alt="" src="<?php echo $disp_image; ?>" width="500" height="auto">
                                                <div class="img-details">
                                                    <h4 class="custom-font ng-binding"><?php echo $image_clas; ?></h4>
                                                    <div class="img-controls">
                                                        <a href="javascript:;" class="img-select">
                                                            <i class="fa fa-circle-o"></i>
                                                            <i class="fa fa-circle"></i>
                                                        </a>
                                                        <a href="javascript:;" class="img-link">
                                                            <i class="fa fa-link"></i>
                                                        </a>
                                                        <?php
                                                        if ($file_type == "img") {
                                                            ?>
                                                            <a class="img-preview" data-lightbox="gallery-item" href="<?php echo $img; ?>" title="<?php echo $image_clas; ?>">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        <?php } else {
                                                            ?>
                                                            <a class="img-preview" data-lightbox="" target="_blank" href="<?php echo $img; ?>" title="<?php echo $image_clas; ?>">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        <?php }
                                                        ?>
                                                        <a href="javascript:;" class="img-more">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
											
								<?php
										}
									}
								}
							}
							?>
                        </div>
</div>
                    </div>
                    <!-- /row -->

                </div>

                <div role="tabpanel" class="tab-pane" id="col3">

                    <!-- row -->
                    <div class="row mix-grid">

                        <div class="gallery" data-lightbox="gallery">
                            <!-- col -->
                            <!-- /col -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>

                <div role="tabpanel" class="tab-pane" id="col2">
                    <!-- row -->
                    <div class="row mix-grid">

                        <div class="gallery" data-lightbox="gallery">
                            <!-- col -->
                            <!-- /col -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
			
        </div>
</section>
<!--/ CONTENT -->

</div>
<!--/ Application Content -->
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="email_modal">
            <div class="modal-header">
                <h3 class="modal-title custom-font">E-mail</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <label>Email</label>
                        <input type="text" name="gal_email" id="gal_email" class="form-control" placeholder="E-mail"/>
						<div id="err_msg" style="color:#ff0000"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label>Subject</label>
                        <input type="text" name="gal_subject" id="gal_subject" class="form-control" placeholder="Subject"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label>Remarks</label>
                        <textarea name="gal_remarks" id="gal_remarks" class="form-control" placeholder="Remarks(if any)"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="success_email" style="color:green"></span>
                <button class="btn btn-default btn-border" id="email_btn">Send</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="email_modal">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure to delete this?</h3>
            </div>
            <div class="modal-body">
                <p style="color:green" id="del_message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="delete_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
		            <div class="modal-header">

                <h3 class="modal-title custom-font">Upload Invoices</h3>

            </div>
			</br>
			
        <div class="modal-body">
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
								
								<input type="hidden" name="provider_id" id ="provider_id" value="<?php echo @$id; ?>" />
								
								<input type="hidden" name="id" id ="id" value="" />
								 <!-- <input type="hidden" name="invoice_result" id ="invoice_results" value="" />-->
                        </form>
			
		</div>
            <div class="modal-footer">
	<input type="hidden" id="hid_del1" value=""/>
                <button class="btn btn-default btn-border" id="submit_btn" >submit</button>
<button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                

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

<script src="assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="assets/js/vendor/mixitup/jquery.mixitup.min.js"></script>
<!--/ vendor javascripts -->
<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>

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
<!--/ custom javascripts -->
<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {
        $('.mix-grid').mixItUp();
        $('.mix-controls .select-all input').change(function () {
            if ($(this).is(":checked")) {
                $('.gallery').find('.mix').addClass('selected');
                enableGalleryTools(true);
            } else {
                $('.gallery').find('.mix').removeClass('selected');
                enableGalleryTools(false);
            }
        });
        $('.mix .img-select').click(function () {
            var mix = $(this).parents('.mix');
            if (mix.hasClass('selected')) {
                mix.removeClass('selected');
                enableGalleryTools(false);
            } else {
                mix.addClass('selected');
                enableGalleryTools(true);
            }
        });
        var enableGalleryTools = function (enable) {

            if (enable) {

                $('.mix-controls li.mix-control').removeClass('disabled');
            } else {

                var selected = false;
                $('.gallery .mix').each(function () {
                    if ($(this).hasClass('selected')) {
                        selected = true;
                    }
                });
                if (!selected) {
                    $('.mix-controls li.mix-control').addClass('disabled');
                }
            }
        }
    });
</script>
<!--/ Page Specific Scripts -->
<script>
    function Redirect()
    {
        window.location = "#?id=" +<?php echo $id; ?>;
    }

    $('#email_btn').click(function () {
        var send_email = $('#gal_email').val();
        var gal_subject = $('#gal_subject').val();
        var gal_remarks = $('#gal_remarks').val();
        var imgVal = new Array();
        $('.selected').each(function () {
            imgVal.push($(this).find('.img-preview').attr('href'));
        });
		if(send_email == null || send_email == ''){
				
				$("#err_msg").html("Email is Required").fadeIn(3000);
		} else {
        $.ajax({
            url: "candidate_gallery_email.php",
            type: "POST",
            data: {imgVal: imgVal, send_email: send_email, gal_subject: gal_subject, candidate_id: '<?php echo $id ?>', gal_remarks: gal_remarks},
            success: function (data) {
                $('#success_email').html(data);
                setTimeout('Redirect()', 2000);
            }
        });
		}
    });
    $('#edit_btn').click(function () {
        var imgVal = new Array();
        $('.selected').each(function () {
            imgVal.push($(this).find('img').attr('src'));
        });
        $.ajax({
            url: "candidate_medical_doc_edit.php",
            type: "POST",
            data: {imgVal: imgVal},
            success: function () {

            }
        });
    });
    $('#delete_btn').click(function () {
        var imgId = new Array();
        $('.selected').each(function () {
            imgId.push($(this).find('#filename').val());
			//alert(imgId);
        });
        $.ajax({
            url: "hiring_invoice_delete.php",
            type: "POST",
            data: {imgId: imgId},
            success: function (data) {
			
               //$("#del_message").text(data);
				$("#del_message").html("Documents Deleted Successfully");
                setTimeout('Redirect()', 1000);
            }
        });
    });
    $('#dwnbtn').click(function () {
        var picData = new Array();
        $('.selected').each(function () {
            picData.push($(this).find('.img-preview').attr('href'));
        });
        $.ajax({
            url: "candidate_gallery_download.php",
            type: "POST",
            data: {picData: picData},
            success: function (data) {
                location.href = "download_zip.php?name=" + data;
            }
        });
    });
</script>

<script type='text/javascript'>
$(document).ready(function () {
     $('#gal_email').keyup(function() {
              var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

              if (re.test($(this).val())) {

                   // $(this).css("background-color", "green");
				   

              } else {
				   $("#err_msg").html("Invalid Email Address").fadeOut(3000);
				   return false;
              }
        });
});
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
			
			var id=$('#hid_del1').val();
			var provider_id=$('#provider_id').val();
			//alert(id);
		 var fdata = "";
		fdata = $('#form2').serialize();
			 //alert(fdata);
			var numf = 0;
            var formData = new FormData();
				
					  jQuery.each(jQuery('#file')[0].files, function (i, file) {
            formData.append('file-' + i, file);
			numf = numf + 1;
           // alert(numf);
            });
			/*if(status== '')
			{
			
				$('#err').html(" Status Is Required").fadeOut(2000);
			}
			else{*/
            $.ajax({
                //url: "hiring_invoices_edit_action.php?id=" + id,
			url: "hiring_invoices_edit_action.php?" + fdata  + '&numf=' + numf + '&id=' + provider_id,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
				 data: formData,
                success: function (data) {
                // alert(data);
				window.location = "hiring_invoice_gallery.php?id=<?php echo $id ?>";
                   }
				
            });
			//}
        });
</script>
</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:37 GMT -->
</html>
