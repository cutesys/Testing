<?php
$page = "employee";
$tab = "employee_travel";
$sub = "employee_other_travel";
$head = "";
$head1 = "";
$sub1 = "employee_other_travel";
$tab1 = "";
include("file_parts/header.php");
?>
<!--/ CONTROLS Content -->
<style>
    .addt_text:focus {
        outline: none;
    }

    .addt_text {
        background-color: transparent;
        border: 0px solid;
        height: 30px;
        width: 260px;
    }

    .file_status {
        color: #428bca;
    }
</style>
<!-- ====================================================
          ================= CONTENT ===============================
          ===================================================== -->
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Employee <span>Other Travel</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Employee</a></li>
                    <li><a href="#">Travel Details</a></li>
                </ul>
            </div>
        </div>
        <!-- page content -->
        <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Basic <span
                                class="badge badge-default pull-right wizard-step">1</span></a></li>
                    
                    
					 <li><a href="#tab2" data-toggle="tab">Ticket Details <span
                                class="badge badge-default pull-right wizard-step">2</span></a></li>
                    
					
                    <li><a href="#tab3" data-toggle="tab">Finish<span
                                class="badge badge-default pull-right wizard-step">3</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
						
						<?php if(isset($_GET['Form'])){?>
						<input type="hidden" name="form" value="1" />
						<?php } else { ?>
						<input type="hidden" name="form" value="" />
						<?php } ?>
						
						
						
						
							<div class="row">
								<div class="form-group col-md-4">
                                    <label for="username">Designation: </label>
                                    <select class="form-control" name="designation_id" id="designation_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `designation_name`,`designation_id` FROM `sm_designation`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['designation_id']; ?>"><?php echo $manuf[$ei]['designation_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
									
									 
                                
								</div>
								
								
						
								<div class="form-group col-md-4">
								<input value="<?php echo $employee_id; ?>" name="employee_id" type="hidden" />
                                    <label for="username">Employee name: </label>
                                    <select class="form-control" name="employee_id[]" id="employee_id" required="" >
												<option selected="" value=""> Select</option>
									</select>
                                </div>
								<div class="form-group col-md-4">
                                    <label for="companyname">Employee Code: </label>
                                    <input type="text" name="employee_employment_id" class="form-control" id="employee_employment_id" value="" readonly="">
                                <input type="hidden" name="travel_type_id" class="form-control" id="travel_type_id" value="2">
                                
								</div>
								
								</div>
                            <div class="row">
							 
                               
								 <div class="form-group col-md-4">
                                    <label for="companyname">Place of visit: </label>
                                    <input type="text" name="travel_place" id="travel_place" class="form-control"  >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Purpose of visit: </label>
                                    <input type="text" name="travel_purpose" id="travel_purpose" class="form-control"  >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Duration in days: </label>
                                    <input type="text" name="travel_duration" id="travel_duration" class="form-control" 
                                                       data-parsley-type="digits">
                                </div>
								
                               
                               
                            </div>
                                 <div class="row">
                             
                               <div class="form-group col-md-4">
                                    <label for="companyname">Cost: </label>
                                    <input type="text" name="travel_cost" id="travel_cost" class="form-control" 
                                                       data-parsley-type="digits" 
                                           >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Travel details: </label>
                                    <input type="text" name="travel_details" id="travel_details" class="form-control"
                                           >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Ticket: </label>
                                    
										   
										   <select class="form-control mb-10" name="ticket" id="ticket">
                                         <option selected="" value=""> Select</option>
                                        <option value="One way">One way</option>
                                        <option value="Two way">Two way</option>
                          
                                     </select>
                                </div>
								
								
								
								</div>
                          
                           
                            
                        </form>
                    </div>
					
					
					
					          <div class="tab-pane" id="tab2">
                        <form name="step2" role="form" id="step2">
                         <h4 class="custom-font"><strong>Ticket Details</strong></h4>
                            
                                   <div class="row">
                                 <div class="form-group col-md-4">
                                    <label for="username">From: </label>
                                    <input type="text" name="travel_from" id="travel_from" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                           >
                                </div>
                                 <div class="form-group col-md-4">
                                    <label for="username">To: </label>
                                    <input type="text" name="travel_to" id="travel_to" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                           >
                                </div>
								
								<!-- <div class="form-group col-md-4 mb-0">
                                    <label for="vehicle_purchase_date">Departure Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="departure_date" id="departure_date"
                                               class="form-control" required=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>-->
								
								<!-- <div class="form-group col-md-4">
                                    <label for="scstart">Departure: </label>
                                    <input type='text' name="departure_date" id="departure_date" class="form-control date_pick" onkeydown="return false"/>
                                </div>  -->
								
									<div class="form-group col-md-4 mb-0">
                                    <label for="scstart"> Departure Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="departure_date"
                                               id="departure_date" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                          
							   </div>
							    <div class="row">
								
								
                               <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Arrival Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="return_date"
                                               id="return_date" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                               <!-- <div class="form-group col-md-4 ">
                                    <label for="scstart">Return: </label>
                                    <input type='text' name="return_date" id="return_date" class="form-control date_pick" onkeydown="return false"/>

                                </div>  -->
								<div class="form-group col-md-4 mb-0">
                                    <label for="username">Airport: </label>
                                    <input type="text" name="airport" id="airport" class="form-control"
                                         required="">
                                </div>
							    <div class="form-group col-md-4 mb-0">
                                    <label for="username">Flight: </label>
                                    <input type="text" name="flight" id="flight" class="form-control"
                                         required="">
                                </div>
								
                            </div>
                            <div class="row">
							
							
							  	
							
                            
                            </div>
							
							<div class="row">
							       <div class="form-group col-md-4 mb-0">
                                    <label for="username">Flight Class: </label>
                                    <input type="text" name="flightclass" id="flightclass" class="form-control"
                                         required="">
                                </div>    
                            </div>
                        </form>
						  <form name="step3" role="form" id="step3">
                         <h4 class="custom-font"><strong>Ticket Details Return</strong></h4>
                            
                                   <div class="row">
                                 <div class="form-group col-md-4">
                                    <label for="username">From: </label>
                                    <input type="text" name="fromdown" id="fromdown" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                           >
                                </div>
                                 <div class="form-group col-md-4">
                                    <label for="username">To: </label>
                                    <input type="text" name="to_down" id="to_down" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                           >
                                </div>
								<!-- <div class="form-group col-md-4">
                                    <label for="scstart">Departure: </label>
                                    <input type='text' name="departure_date_down" id="departure_date_down" class="form-control date_pick" onkeydown="return false"/>
                                </div> -->
                            <div class="form-group col-md-4 mb-0">
                                    <label for="scstart"> Departure Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="departure_date_down"
                                               id="departure_date_down" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
							   </div>
							    <div class="row">
								
								   <div class="form-group col-md-4 mb-0">
                                    <label for="scstart"> Arrival Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="return_date_down"
                                               id="return_date_down" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
								
                             <!--   <div class="form-group col-md-4 ">
                                    <label for="scstart">Return: </label>
                                    <input type='text' name="return_date_down" id="return_date_down" class="form-control date_pick" onkeydown="return false"/>

                                </div>  -->
								<div class="form-group col-md-4 mb-0">
                                    <label for="username">Airport: </label>
                                    <input type="text" name="airport_down" id="airport_down" class="form-control"
                                         required="">
                                </div>
							    <div class="form-group col-md-4 mb-0">
                                    <label for="username">Flight: </label>
                                    <input type="text" name="flight_down" id="flight_down" class="form-control"
                                         required="">
                                </div>
								
                            </div>
                            <div class="row">
							
							
                            </div>
							
							<div class="row">
							       <div class="form-group col-md-4 mb-0">
                                    <label for="username">Flight Class: </label>
                                    <input type="text" name="flightclass_down" id="flightclass_down" class="form-control"
                                         required="">
                                </div>    
                            </div>
                        </form>
						
                    </div>
                    <div class="tab-pane" id="tab3">
                        <p class="well">Please check and make sure the details given are correct!</p>
                        <!--                        <form name="step7" role="form" novalidate>
                                                    <div class="checkbox">
                                                        <label class="checkbox checkbox-custom-alt">
                                                            <input type="checkbox" name="newsletter" id="newsletter" checked="">
                                                            <i></i> Receive notifications </label>
                                                    </div>
                                                </form>-->
                    </div>
                    <ul class="pager wizard">
                        <li class="previous">
                            <button class="btn btn-default">Previous</button>
                        </li>
                        <li class="next">
                            <button id="next_btn" class="btn btn-default">Next</button>
                        </li>
                        <li class="next finish" style="display:none;">
                            <button id="finish_btn" class="btn btn-success">Finish</button>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <span class="text-success mt-0 mb-20" id="SucM"></span>
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
                                                       $('body').on('click', '.date_pick', function () {
                                                           $(this).datepicker({
                                                               changeMonth: true,
                                                               changeYear: true,
                                                               dateFormat: "yy/mm/dd"
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

  
	
	 $('#finish_btn').click(function ()
	 
	 {
		 
		 var fdata=$('#step1,#step2').serialize();
		 var travel_eligibility     = $('#ticket').val();
		 if(travel_eligibility==="Two way"){
			 //fdata=fdata+$('#step3').serialize();
			  fdata=fdata+"&"+$('#step3').serialize();
		 }
		 
		  $.ajax({
             url: "employee_other_travel_action.php",
            type: "POST",
		  data: fdata,                 
		  success: function (data) {
			   //  alert(data);   
				 $('#Succ').html("Data Updated Successfully");
              window.location = "employee_other_travel_booked.php";
			   
             }
			 });
  });
	 // {
		 
		 
		 // var employee_id            =$('#employee_id').val();
		 // var employee_employment_id	= $('#employee_employment_id').val();
		 // var travel_type_id		    = $('#travel_type_id').val();
		 // var travel_place		    = $('#place_of_visit').val();
		 // var travel_purpose		    = $('#purpose_of_visit').val();
		 // var travel_duration		= $('#duration').val();
		 // var travel_details		    = $('#travel_details').val();
		 // var travel_cost		    = $('#cost').val();
		 
		 
		 // var travel_eligibility     = $('#ticket').val();
		 // var travel_from		    = $('#from').val();
		 // var travel_to		        = $('#to').val();
		 // var travel_departure_date	= $('#departure_date').val(); 
		 // var travel_return_date		= $('#return_date').val(); 
		 // var travel_airport		    = $('#airport').val();  
		 // var travel_flight		    = $('#flight').val(); 
		 // var travel_flight_class    = $('#flightclass').val(); 
		 
		  // $.ajax({
             // url: "employee_other_travel_action.php",
            // type: "POST",
             // data: {employee_id:employee_id,employee_employment_id:employee_employment_id,travel_type_id:travel_type_id,travel_place:travel_place,travel_purpose:travel_purpose,travel_duration:travel_duration,travel_details:travel_details,travel_cost:travel_cost,travel_eligibility:travel_eligibility,travel_from:travel_from,travel_to:travel_to,travel_departure_date:travel_departure_date,travel_return_date:travel_return_date,travel_airport:travel_airport,travel_flight:travel_flight,travel_flight_class:travel_flight_class},
                 
		  // success: function (data) {
			     // alert(employee_id);   
				 // $('#Succ').html("Data Updated Successfully");
               // // window.location = "employee_travel_booked.php";
			   
             // }
			 // });
  // });
</script>
<script>
  $('#ticket').change(function ()
    {
        var eligibility = $(this).val();
        if (eligibility == "Two way")
        {
            $('#step2').show('slow');
            $('#step3').show('slow');
        }
        
        if (eligibility == "One way")
        {
            $('#step2').show('slow');
            $('#step3').hide('slow');
        }
		
    });
</script>

	<script>
    $('#designation_id').change(function () {
        var designation = $(this).val();
		//var date_assign_from = $('#date_assign_from').val();
		//var date_assign_to = $('#date_assign_to').val();
        $.ajax({
            url: "employee_other_travel_ajax.php",
            type: "POST",
            data: {designation: designation},
            success: function (data) {
				//alert(data);
                $('#employee_id').html(data);
				//alert(employee_id);
            }
        });
    });
	</script>
	
	<script>
    $('#employee_id').change(function () {
        var employee_id = $(this).val();
        $.ajax({
            url: "employee_other_travel_ajax2.php",
            type: "POST",
            data: {employee_id: employee_id},
            success: function (data) {
                $('#employee_employment_id').val(data);
            }
        });
    });
	</script>

</body>
</html>

