<?php
$success_msg="";
$page = "visa";
$tab = "visa_settings";
$sub = "visa_type_settings";
$sub1 = "visa_type_add";

include('file_parts/header.php');

?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">
            <h2>Add Visa Type<span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa </a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Visa Type</a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Visa Type</a>
                    </li>
                    
                </ul>

            </div>

        </div>
        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
               <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add Visa Type </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Visa Type: </label>
                                    <input type="text" name="visa[0][visa_type_name]" id="type_name" class="form-control" required="" >
                                   
                                </div>
                         
						
                                <div class="form-group col-md-6">
                                    <label for="username">No of valid days: </label>
                                    <input type="text" name="visa[0][visa_type_days]" data-parsley-trigger="change"
                                           data-parsley-type="digits" id="type_days" class="form-control" required="" >
                                    <span id="exist_status_0"  class="validate_span"></span>

                                </div>
                          </div>
						  <div class="experience_div"></div>
                            <input type="hidden" value="1" id="visa_increment">
						   <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="visa_add_btn" >Add Visa Type
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            
						   
						  <div class="col-md-8"></div>
						  <div class="col-md-1">
						   <ul class="pager wizard" style="margin-right:650px;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
                    </li>
                </ul>
				</div>
				</div>

                            </form> 
 </div>

                <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
                </div>
				 </div>
           
        </div>

    </div>
    <!-- /page content -->

</div>

</section>
<!--/ CONTENT -->

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

<script src="assets/js/vendor/parsley/parsley.min.js"></script>

<script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>

<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>



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

        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }

            },
            onNext: function (tab, navigation, index) {

                var form = $('form[name="step' + index + '"]');

                form.parsley().validate();

                if (!form.parsley().isValid()) {
                    return false;
                }

            },
            onTabClick: function (tab, navigation, index) {

                var form = $('form[name="step' + (index + 1) + '"]');
                form.parsley().validate();

                if (!form.parsley().isValid()) {
                    return false;
                }
            }
        });
    });
</script>

<script>
$('#submit_btn').click(function(){
    $('#exist_status_0').html('');
	
	var error_check=1;
    var type_name = jQuery('#type_name').val();
	var type_days = jQuery('#type_days').val();
	
    if(type_name==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(type_days==""){
		error_check=0;
		//$('#exist_status1').html("Please provide visa details");
      
    }
	if(!$.isNumeric($('#type_days').val())) 
	{
		error_check=0;
	}
		if(error_check==1) {
        $.ajax({
            url: 'visa_type_check1.php',
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (data) {
				 $('#exist_status').html(data.Status);
			var counts=data.length;
			for(i=0;i<counts;i++){
						if(data[i]=="0"){
							$('#exist_status_'+i).html("Alredy Exist");
						}
						else{
							$('#exist_status_'+i).html("");
							
							location.href='visa_type_list.php';
							
						}
					}
               
				
				
                var ch2 = data.data_val;
				
                if (ch2 == 0) {
				
                    $('#type_name').val('');
					$('#type_days').val('');
                }
                if (ch2 == 1) {
                    
                }

            }
        });
    }
	});
	</script>
	<script>
	 $('#visa_add_btn').click(function () {
		
        var visa_add = "visa_add";
        visa_increment = $('#visa_increment').val();
        added_exp = +visa_increment + 1;
        $('.experience_div').append(
                '<div class="row">'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Visa Type: </label>'
                + '<input type="text"  name="visa[' + visa_increment + '][visa_type_name]"  class="form-control"  id="type_name"  required="" > '
                + '</div>'
                + '<div class="form-group col-md-6">'
                + '<label for="username">No of valid days: </label>'
                + '<input type="text"  name="visa[' + visa_increment + '][visa_type_days]"  class="form-control" id="type_days"  required="" > '
				+ ' <span id="exist_status_' + visa_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				  );
                $('#visa_increment').val(added_exp);
    });
	</script>

   
 
<!--/ Page Specific Scripts -->

<script>
   /* $(document).ready(function () {
        var fdata = "";

        $('#next_btn').click(function () {
            fdata = $('#form1').serialize();
        });
        $('#submit_btn').click(function () {
            var formData = new FormData();
            jQuery.each(jQuery('#file')[0].files, function (i, file) {
                formData.append('file-' + i, file);
            });
            $.ajax({
                url: "ins_partner.php?" + fdata,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    //alert(data);
                    // alert("Partner Add Successfully");
                    $("#partner_succes").html(data);

                }
            });
        });
    });
    /**/
</script>
</body>
</html>
