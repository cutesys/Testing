<?php
$page = "recruitment";
$tab = "agent";
$sub = "agent_add";
include("./file_parts/header.php")
?>
<!--/ CONTROLS Content -->
<style>
    .addt_text:focus{
        outline: none;
    }
    .addt_text {
        background-color:transparent;
        border: 0px solid;
        height:30px;
        width:260px;
    }
    .file_status{
        color:#428bca;
    }
</style>
<!-- ====================================================
          ================= CONTENT ===============================
          ===================================================== -->
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Add Agent <span>Add New Agent</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="#"><i class="fa fa-home"></i> SME</a> </li>
                    <li> <a href="#">Agent</a> </li>
                    <li> <a href="#">Add Agent</a> </li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span class="badge badge-default pull-right wizard-step">1</span></a></li>
					<li><a href="#tab2" data-toggle="tab">Finish <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
                          
                            <div class="row">
							 <div class="form-group col-md-4">
                                    <label for="username">Agent/Company Name: </label>
                                    <input type="text"  name="agent_name" id="agent_name" required class="form-control">
                                </div>
								
                                <div class="form-group col-md-4">
                                    <label for="phone">Country: </label>
                                    <select class="form-control mb-10" name="agent_country"  required id="agent_country">
                                        <option  value="">Select</option>
                                        <?php
                                        $select = $db->selectQuery("select * from sm_recruit_country where country_status='1'");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['country_name']; ?>"> <?php echo $select[$rt]['country_name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								<div class="form-group col-md-4">
                                    <label for="dnumber">Area: </label>
                                    <input type="text" name="agent_area" id="agent_area"  data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" required class="form-control" />
                                </div>
								
								</div>
								 <div class="row">
								 <div class="form-group col-md-4">
                                    <label for="dnumber">Agent ID: </label>
                                    <input type="text" name="agent_id" id="agent_id" readonly class="form-control" required />
                                </div>
								
								 <div class="form-group col-md-4">
                                    <label for="phone">State: </label>
                                    <select class="form-control mb-10" name="agent_state" id="agent_state">
                                        <option  value="">Select</option>
                                        
                                    </select>
                                </div> 
								 <div class="form-group col-md-4">
                                    <label for="dnumber">Building no: </label>
                                    <input type="text" name="agent_building" id="agent_building" class="form-control" />
                                </div>
								 </div>
								 <h1 class="text-success mt-0 mb-20" id="agent_status"></h4>
								 <div class="row">
								
								
                               
                            <div class="form-group col-md-4">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="agent_zip" id="agent_zip" class="form-control" data-parsley-trigger="change"
                                           data-parsley-type="digits" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">Email: </label>
                                    <input type="email"  name="agent_email" id="agent_email" class="form-control" required />
                                </div>
								 <div class="form-group col-md-4">
                                    <label for="companyname">Phone: </label>
                                    <input type="text"  name="agent_phone"  id="agent_phone"class="form-control" data-parsley-trigger="change"
                                           data-parsley-type="digits" required />
                                </div>
								</div>
								 
                            
                        </form>
                    </div>
                   <div class="tab-pane" id="tab2">
                        <p class="well">Please check and make sure the details given are correct!</p>
                        <form name="step7" role="form" novalidate>
                           
                        </form>
                    </div>
                    
                   
                    <ul class="pager wizard">
                       
                         <li class="previous">
                            <button class="btn btn-default">Previous</button>
                        </li>
                        <li class="next">
                            <button id="next_btn" class="btn btn-default">Next</button>
                        </li>
                        <li class="next finish" style="display:none;">
                            <button name="submit" id="submit_btn" type="button" class="btn btn-success">Finish</button>
                        </li>
                    </ul>
                    <div class="row">

                        <div class="col-md-9"></div>

                        <h4 class="text-success mt-0 mb-20" id="exist_status"></h4>
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
<!-- The basic File Upload plugin -->
<!--/ vendor javascripts -->
<!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
<script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
                                                // $('.date_pic').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});

                                                $('body').on('click', '.datepicker_recurring_start', function () {
                                                    $(this).datepicker({
                                                        changeMonth: true,
                                                        changeYear: true,
                                                        dateFormat: "dd/mm/yy"
                                                    }).focus();
                                                    $(this).removeClass('datepicker');
                                                });
</script>

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
$('#agent_country').change(function () {
        var country_name = $(this).val();
        $.ajax({
            url: "agent_state.php",
            type: "POST",
            data: {country_name: country_name},
            success: function (data) {
                $('#agent_state').html(data);
            }
        });
    });
$('#agent_area').on('blur', function (e) {
	    var country = jQuery('#agent_country').val();
		var country_sub = country.substring(0, 3);
		var area = jQuery('#agent_area').val();
		var area_sub = area.substring(0, 2);
		$.ajax({
            url: 'agent.php',
            type: 'POST',
            dataType: 'json',
            data: {country_sub: country_sub,area_sub:area_sub},
            success: function (data) {
                $('#agent_id').val(data.agent_id);
                var ch2 = data.data_val;
                if (ch2 == 0) {
                    $('#job_category_name').val('');
					 $('#com_status').html(data.Status);
                }
                if (ch2 == 1) {

                }

            }
        });
        
    });
	 $('#agent_id').on('blur', function (e) {
        var agent_id = jQuery('#agent_id').val();
        if (agent_id != "") {
            $('#agent_id_status').html('');
            $.ajax({
                url: 'agent_check.php', type: 'POST', dataType: 'json', data: {agent_id: agent_id}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#agent_id').val('');
                        $('#agent_status').html('Please wait...');
                        $('#agent_status').css("color", data.color);
                        $('#agent_status').html(data.Status);
                    }
                    /*if (ch == 1) {
                        $('#vehicle_id_status').css("color", data.color);
                        $('#vehicle_id_status').html(data.Status);
                    }*/
                }
            });
        }
    });
	$('#submit_btn').click(function(){
		
    $('#exist_status').html('');
    var agent_name = jQuery('#agent_name').val();
	var agent_country = jQuery('#agent_country').val();
	var agent_area = jQuery('#agent_area').val();
	var agent_id = jQuery('#agent_id').val();
	var agent_state = jQuery('#agent_state').val();
	var agent_building = jQuery('#agent_building').val();
	var agent_city = jQuery('#agent_city').val();
	var agent_zip = jQuery('#agent_zip').val();
	var agent_email = jQuery('#agent_email').val();
	var agent_phone = jQuery('#agent_phone').val();
	
   if(agent_name==""){
      
	    $('#exist_status').html("");
	   
    }
	else if(agent_country==""){
       
	    $('#exist_status').html("");
	   
    }
	else if(agent_area==""){
      
	    $('#exist_status').html("");
	   
    }
	else if(agent_id==""){
       
	    $('#exist_status').html("");
	   
    }
	else if(agent_email==""){
       
	    $('#exist_status').html("");
	   
    }
	else if(agent_phone==""){
      
	    $('#exist_status').html("");
	   
    }
	
    else {
        $.ajax({
            url: 'agent_check.php',
            type: 'POST',
            dataType: 'json',
            data: { agent_name: agent_name,agent_country: agent_country,agent_area: agent_area,agent_id: agent_id,agent_state: agent_state,agent_building: agent_building,agent_zip: agent_zip,agent_email: agent_email,agent_phone: agent_phone},
            success: function (data) {
                $('#exist_status').html(data.Status);
                var ch2 = data.data_val;
                if (ch2 == 0) {
                    $('#agent_id').val('');
                }
                if (ch2 == 1) {
                    location.href='agent_list.php'
                }

            }
        });
    }
});
</script>
</body>
</html>

