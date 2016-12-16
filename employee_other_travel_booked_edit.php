<?php
$success_msg = "";
$page = "employee";
$tab = "employee_travel";
$sub = "employee_other_travel";
$head = "";
$head1 = "";
$sub1 = "employee_other_travel_booked";
$tab1 = "";
include('file_parts/header.php');
if(isset($_REQUEST["employee_id"])){
	$employee_id=$_REQUEST['employee_id'];
                $resPartner = $db->selectQuery("select * from sm_employee_travel where employee_id='$employee_id' ");
			
                if (count($resPartner)) {
                   // $employee_name = $resPartner[0]['id'];
                   $employee_code        = $resPartner[0]['employee_employment_id'];
                   $travel_place         = $resPartner[0]['travel_place'];
                   $travel_purpose       = $resPartner[0]['travel_purpose'];
                   $travel_duration      = $resPartner[0]['travel_duration'];
                   $travel_cost          = $resPartner[0]['travel_cost'];
                   $travel_details       = $resPartner[0]['travel_details'];
                   $travel_eligibility   = $resPartner[0]['travel_eligibility'];
				   $travel_from          = $resPartner[0]['travel_from'];
                   $travel_to            = $resPartner[0]['travel_to'];
				   
				   
                  $departure_date       = $resPartner[0]['travel_departure_date'];
				   $return_date          = $resPartner[0]['travel_return_date'];
				   
	              $travel_airport       = $resPartner[0]['travel_airport'];
                   $travel_flight        = $resPartner[0]['travel_flight'];
				   $travel_flight_class  = $resPartner[0]['travel_flight_class'];
				   
				   $travel_from_db      = explode("-", $resPartner[0]['travel_departure_date']);
				  $departure_date= $travel_from_db[2]."/".$travel_from_db[1]."/".$travel_from_db[0];
				  
				   $travel_to_db      = explode("-", $resPartner[0]['travel_return_date']);
				    $return_date = $travel_to_db[2]."/".$travel_to_db[1]."/".$travel_to_db[0];
                   // $par = $resPartner[0]['par'];
                   // $company = $resPartner[0]['company'];
				   
				   
				     $travel_from_down 		      = $resPartner[0]['travel_from_down'];
				       $travel_to_down 		          = $resPartner[0]['travel_to_down'];
				     //  $travel_departure_date_down 	  = $resPartner[0]['travel_departure_date_down'];
				      // $travel_return_date_down 	  = $resPartner[0]['travel_return_date_down'];
					   
					$travel_departure_date2      = explode("-", $resPartner[0]['travel_departure_date_down']);
				   $travel_departure_date_down= $travel_departure_date2[2]."/".$travel_departure_date2[1]."/".$travel_departure_date2[0];
				   $travel_return_date2      = explode("-", $resPartner[0]['travel_return_date_down']);
				   $travel_return_date_down = $travel_return_date2[2]."/".$travel_return_date2[1]."/".$travel_return_date2[0];

				       $travel_airport_down 	      = $resPartner[0]['travel_airport_down'];
				       $travel_flight_down 	          = $resPartner[0]['travel_flight_down'];
				       $travel_flight_class_down 	  = $resPartner[0]['travel_flight_class_down'];
					
				   
				   
				   
				   			$select = $db->selectQuery("select CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) AS full_name from `sm_employee` WHERE `employee_id`='$employee_id'");
			                            
                                        if (count($select)) {
											$employee_firstname = $select[0]['full_name'];
										}
										
										
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `file_title`='Profile_Picture' AND `file_status`='1' AND `employee_id`='$employee_id'");
if (count($resLogo) && file_exists($resLogo[0]['file_name'])) {
    $dpImg = $resLogo[0]['file_name'];
} else {
    $dpImg = "assets/images/profile-default.png";
}
				}
}


				
if (isset($_POST['submit'])) { echo "haisucc";
	//$employee_id=$_REQUEST['employee_id'];
	
					
	 
	               $employee_code        = $_POST['employee_employment_id'];
	               $travel_place         = $_POST['travel_place'];
                   $travel_purpose       = $_POST['travel_purpose'];
                   $travel_duration      = $_POST['travel_duration'];
                   $travel_cost          = $_POST['travel_cost'];
                   $travel_details       = $_POST['travel_details'];
		           $travel_eligibility   = $_POST['ticket'];
				   $travel_from          = $_POST['travel_from'];
				   $travel_to            = $_POST['travel_to'];
				   $travel_departure_date= $_POST['departure_date'];
				   $travel_return_date  = $_POST['return_date'];
				   $travel_airport       = $_POST['airport'];
				   $travel_flight        = $_POST['flight'];
				   $travel_flight_class  = $_POST['flightclass'];
				   
				    $travel_from_date      = explode("/", $travel_departure_date);
	     $travel_departure_date= $travel_from_date[2]."-".$travel_from_date[1]."-".$travel_from_date[0];
		 $travel_to_date      = explode("/", $travel_return_date);
	     $travel_return_date= $travel_to_date[2]."-".$travel_to_date[1]."-".$travel_to_date[0];
		 
		 
		 $values1 							= array();
    $values1['employee_employment_id']  = $employee_code;
    $values1['travel_place'] 			= $travel_place;
    $values1['travel_purpose'] 			= $travel_purpose;
    $values1['travel_duration']		    = $travel_duration;
    $values1['travel_cost']			    = $travel_cost;
    $values1['travel_details'] 			= $travel_details;

    $values1['travel_eligibility'] 		= $travel_eligibility;
    $values1['travel_from'] 			= $travel_from;
    $values1['travel_to']			    = $travel_to;
    $values1['travel_departure_date'] 	= $travel_departure_date;
    $values1['travel_return_date'] 		= $travel_return_date;
    $values1['travel_airport'] 			= $travel_airport;
    $values1['travel_flight'] 			= $travel_flight;
    $values1['travel_flight_class']     = $travel_flight_class;
	
	//$deletes_exp = $db->executeQuery("DELETE FROM `sm_employee_travel` WHERE `employee_id`= '".$_GET['employee_id']."'");
	
	if($travel_eligibility == "One way"){
		$insert = $db->secure_update("sm_employee_travel", $values1," WHERE `employee_id`= '".$_GET['employee_id']."'");
		} else {
		
		$travel_from_down               = $_POST['from_down'];
		$travel_to_down                 = $_POST['to_down'];

		$travel_departure_date_downs    = $_POST['departure_date_down'];
		$travel_return_date_downs      = $_POST['return_date_down'];
		
		if(!empty($travel_departure_date_downs)){
        $travel_departure_date2      = explode("/", $travel_departure_date_downs);
	     $travel_departure_date_down= $travel_departure_date2[2]."-".$travel_departure_date2[1]."-".$travel_departure_date2[0];
		} else { $travel_departure_date_down =""; } 
		
		if(!empty($travel_return_date_downs)){
		 $travel_return_date2      = explode("/", $travel_return_date_downs);
	     $travel_return_date_down= $travel_return_date2[2]."-".$travel_return_date2[1]."-".$travel_return_date2[0];
		 } else { $travel_return_date_downs =""; }
		 
		$travel_airport_down            = $_POST['airport_down'];
		$travel_flight_down             = $_POST['flight_down'];
		$travel_flight_class_down       = $_POST['flightclass_down'];
		
		$values1['travel_from_down']           = $travel_from_down;
		$values1['travel_to_down']             = $travel_to_down;
		$values1['travel_departure_date_down'] = $travel_departure_date_down;
		$values1['travel_return_date_down']    = $travel_return_date_down;
		$values1['travel_airport_down']        = $travel_airport_down;
		$values1['travel_flight_down']         = $travel_flight_down;
		$values1['travel_flight_class_down']   = $travel_flight_class_down;
		
		$insert = $db->secure_update("sm_employee_travel", $values1," WHERE `employee_id`= '".$_GET['employee_id']."'");
		
		}
		
		if (!empty($insert)) 
		{
			echo "Updated";
			echo "<script>window.location = 'employee_other_travel_booked_profile.php?employee_id=".$employee_id."'</script>";
		} 
		else {
	echo "<script>location.href='employee_other_travel_booked_edit.php?employee_id=".$employee_id."'</script>";
    }
		

		
/*	if($travel_eligibility=='Two way'){
		echo "hello";
		$values= array();
			$value['travel_from_down']="";
			 $value['travel_to_down']             = "";
    $value['travel_departure_date_down'] = "";
    $value['travel_return_date_down']    = "";
    $value['travel_airport_down']        = "";
    $value['travel_flight_down']         = "";
    $value['travel_flight_class_down']   = "";
			
    $values['employee_employment_id']  = $employee_code;
    $values['travel_place'] 			= $travel_place;
    $values['travel_purpose'] 			= $travel_purpose;
    $values['travel_duration']		    = $travel_duration;
    $values['travel_cost']			    = $travel_cost;
    $values['travel_details'] 			= $travel_details;

    $values['travel_eligibility'] 		= $travel_eligibility;
    $values['travel_from'] 			= $travel_from;
    $values['travel_to']			    = $travel_to;
    $values['travel_departure_date'] 	= $travel_departure_date;
    $values['travel_return_date'] 		= $travel_return_date;
    $values['travel_airport'] 			= $travel_airport;
    $values['travel_flight'] 			= $travel_flight;
    $values['travel_flight_class']     = $travel_flight_class;
			$s=$db->secure_update("sm_employee_travel",$value," WHERE `employee_id`= '".$_GET['employee_id']."'");
			$insert1 = $db->secure_update(" ", $values," WHERE `employee_id`= '".$_GET['employee_id']."'");
		}
		else{ echo "hai";
		$insert = $db->secure_update("sm_employee_travel", $values1," WHERE `employee_id`= '".$_GET['employee_id']."'");}
		
	if (!empty($insert)) 
	{
		echo "Updated";
		 echo "<script>window.location = 'employee_other_travel_booked_profile.php?employee_id=".$employee_id."'</script>";
		} 
		else {
	echo "<script>location.href='employee_other_travel_booked_edit.php?employee_id=".$employee_id."'</script>";
    }	*/
}				
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Profile </h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Employee</a>
                    </li>
                    <li>
                        <a href="partner_list.php">Employee Travel</a>
                    </li>
                    <li>
                        <a href="#">Profile </a>
                    </li>
                </ul>

            </div>

        </div>
        <div class="pagecontent">
            <div class="row">
                <?php //echo "<pre>";print_r($resPartner); ?>


                    <!-- col -->
                   	
			<div class="col-md-4">



                        <!-- tile -->

                        <section class="tile tile-simple">



                            <!-- tile widget -->

                            <div class="tile-widget p-30 text-center">
                                    <div class="thumb thumb-xl">

                                        <img class="img-circle" src="<?php echo $dpImg; ?>" alt="">

                                    </div>
                                <h4 class="mb-0"><?php echo $employee_firstname; ?></h4>

                                <!--<span class="text-muted">Project Manager</span>-->

                                <!-- <div class="mt-10">

                                     <button class="btn btn-rounded-20 btn-sm btn-greensea">Follow</button>

                                     <button class="btn btn-rounded-20 btn-sm btn-lightred">Message</button>

                                 </div>-->



                            </div>

                            <!-- /tile widget -->



                            <!-- tile body -->

                            <div class="tile-body text-center bg-blue p-0">



                                <!-- <ul class="list-inline tbox m-0">

                                     <li class="tcol p-10">

                                         <h2 class="m-0">695</h2>

                                         <span class="text-transparent-white">Tweets</span>

                                     </li>

                                     <li class="tcol bg-blue dker p-10">

                                         <h2 class="m-0">1 269</h2>

                                         <span class="text-transparent-white">Followers</span>

                                     </li>

                                     <li class="tcol p-10">

                                         <h2 class="m-0">369</h2>

                                         <span class="text-transparent-white">Following</span>

                                     </li>

                                 </ul>-->



                            </div>

                            <!-- /tile body -->



                        </section>

                        <!-- /tile -->
                    </div>
                    <div class="col-md-8">

                        <!-- tile -->
                        <section class="tile tile-simple">

                            <!-- tile body -->
                            <div class="tile-body p-0">

                                <div role="tabpanel">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tabs-dark" role="tablist">
                                        <li role="presentation" ><a style="color:#16a085;" href="employee_other_travel_booked_profile.php?employee_id=<?php echo $_GET['employee_id']?>" >Profile</a></li>
										<li role="presentation"><a href="employee_other_travel_booked_edit.php?employee_id=<?php echo $_GET['employee_id']?>">Edit</a></li>
										<!--<li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Downloads</a></li>-->
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">


                                        <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                            <div class="wrap-reset">

                                                <form name="form4" role="form" id="form4"  method="post" enctype="multipart/form-data">

                                                    <div class="row">
                                                        <div class="form-group col-md-12 legend">
                                                            <h4><strong>Employee</strong> Profile</h4>
                                                            <!--<p><a href="partner_edit.php?id=<?php //echo $_GET['id']?>">  <span style="padding: 0px 0px 0px 386px;    font-size: 18px;color: #428bca">Edit Profile</span></a>-->                                                                                                                                                </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
													<div class="form-group col-md-4">
                                    <label for="phone">Employee Designation</label>
                                        <?php
                                        $emp_designation = $db->selectQuery("select `employee_designation` FROM `sm_employee` WHERE `employee_id`='$employee_id'");
			                             if (count($emp_designation)) {
											 $emp_desig = $emp_designation[0]['employee_designation'];
										
			                               }?>
									<input type="text" class="form-control" id="first-name" name="parid" value="<?php echo @$emp_desig; ?>" disabled>
                                                
                                   
                                </div>
													
														
			                    <div class="form-group col-md-4">
                                    <label for="phone">Employee Name</label>
                                        <?php
                                        $select = $db->selectQuery("select CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) AS full_name from `sm_employee` WHERE `employee_id`='$employee_id'");
			                            // if (count($select)) {
										
			                               // }
									

                                        if (count($select)) {
											
                                            for ($rt = 0; $rt < count($select); $rt++) {
												 $employee_firstname = $select[0]['full_name'];
                                                ?>
												<input type="text" class="form-control" id="employee_firstname" name="employee_firstname" value="<?php echo $employee_firstname; ?>" disabled>
                                                
                                                <?php
                                            }
                                        }
                                        ?>
                                   
                                </div>
                                                        <div class="form-group col-sm-4">

                                                            <label for="first-name">Employee Code</label>

															<input type="text" class="form-control" id="employee_employment_id" name="employee_employment_id" value="<?php echo $employee_code; ?>" readonly>
                                                               
                                                            </select>

                                                        </div>
                                                    </div>

                                                   <div class="row">
							 
                               
								 <div class="form-group col-md-4">
                                    <label for="companyname">Place of visit: </label>
                                    <input type="text" name="travel_place" id="travel_place" class="form-control" value="<?php echo $travel_place; ?>"  >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Purpose of visit: </label>
                                    <input type="text" name="travel_purpose" id="travel_purpose" class="form-control" value="<?php echo $travel_purpose; ?>"   >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Duration in days: </label>
                                    <input type="text" name="travel_duration" id="travel_duration" class="form-control" value="<?php echo $travel_duration; ?>"  >
                                </div>
                               
                               
                            </div>
							 <div class="row">
                             
                               <div class="form-group col-md-4">
                                    <label for="companyname">Cost: </label>
                                    <input type="text" name="travel_cost" id="travel_cost" class="form-control" value="<?php echo $travel_cost; ?>" 
                                           >
                                </div>
								
								<div class="form-group col-md-4">
                                    <label for="companyname">Travel details: </label>
                                    <input type="text" name="travel_details" id="travel_details" class="form-control" value="<?php echo $travel_details; ?>" 
                                           >
                                </div>
								
								
								 <div class="form-group col-md-4">
                                    <label for="phone">Ticket: </label>
                                    <select class="form-control" name="ticket" id="ticket" value="<?php echo $travel_eligibility; ?>"   
                                        <option selected="" value=""> Select </option>
                                        <option <?php if($travel_eligibility == "One way"){ echo "selected"; }?> value="One way">One way</option>
                                        <option <?php if($travel_eligibility == "Two way"){ echo "selected"; }?> value="Two way">Two way</option>
                                       
                                    </select>
                                </div>
								
							
								</div>
								<div id="up">
                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">From</label>
                                                            <input type="text" class="form-control" id="travel_from" name="travel_from" value="<?php echo $travel_from; ?>" >
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">To</label>
                                                            <input type="text" class="form-control" id="travel_to" name="travel_to" value="<?php echo $travel_to; ?>" >
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                  <!--<div class="form-group col-sm-6">
                                                      <label for="first-name">Departure date</label>
                                                           <input type="text" class="form-control" id="departure_date" name="departure_date" value="<?php //echo $departure_date; ?>" required="" onkeydown="return false">
                                                              </div>  -->
															  
									<div class="form-group col-md-6 mb-0">
                                    <label for="first-name">Departure date</label>
                                    <div class='input-group datepicker' data-format="L">
                                    <input type="text" class="form-control" id="departure_date" name="departure_date" value="<?php echo $departure_date; ?>" required="" onkeydown="return false">
                                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                    </div>

									<div class="form-group col-md-6 mb-0">
                                    <label for="address2">Arrival date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                 <input type="text" class="form-control" id="return_date" name="return_date" value="<?php echo $return_date; ?>" required="" onkeydown="return false"/>

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                                    </div>
													
													
													<div class="row">

                                                        <div class="form-group col-sm-6">

                                                            <label for="first-name">Airport</label>


                                                           <input type="text" class="form-control" id="airport" name="airport" value="<?php echo $travel_airport; ?>" >

                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">Flight:</label>
                                                            <input type="text" class="form-control" id="flight" name="flight" value="<?php echo $travel_flight; ?>" >
                                                        </div>

                                                    </div>
													
                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">Flight Class:</label>
                                                            <input type="text" class="form-control" id="flightclass" name="flightclass" value="<?php echo $travel_flight_class; ?>" data-parsley-trigger="change" data-parsley-type="digits">
                                                        </div>
                                                      
                                                    </div>
						    </div>
													
														 <div id="down">
				<?php ?>
										<h4 class="custom-font"><strong>Ticket Details Return</strong></h4>
                            
                                   <div class="row">
                            
								 <div class="form-group col-sm-6">
                                                            <label for="address1">From:</label>
                                                            <input type="text" class="form-control" id="from_down" name="from_down" value="<?php echo $travel_from_down; ?>">
                                                        </div>
                                                       <div class="form-group col-sm-6">
                                                            <label for="address1">To:</label>
                                                            <input type="text" class="form-control" id="to_down" name="to_down" value="<?php echo $travel_to_down; ?>"  >
                                                        </div>
														</div>

								  <div class="row">
								<div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Departure Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="departure_date_down"
                                               id="departure_date_down" onkeydown="return false"   value="<?php echo $travel_departure_date_down; ?>"  >
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
							
                          <div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Arrival Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="return_date_down"
                                               id="return_date_down" onkeydown="return false"  value="<?php echo $travel_return_date_down; ?>" >
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
							   </div>
					
								 <div class="row">
								<div class="form-group col-md-6 mb-0">
                                    <label for="username">Airport: </label>
                                    <input type="text" name="airport_down" id="airport_down" class="form-control"
                                          value="<?php echo $travel_airport_down; ?>" >
                                </div>
							    <div class="form-group col-md-6 mb-0">
                                    <label for="username">Flight: </label>
                                    <input type="text" name="flight_down" id="flight_down" class="form-control"
                                          value="<?php echo $travel_flight_down; ?>" >
                                </div>
								
                            </div>
                           
							
							
                          
							
							<div class="row">
							       <div class="form-group col-md-6 mb-0">
                                    <label for="username">Flight Class: </label>
                                    <input type="text" name="flightclass_down" id="flightclass_down" class="form-control"
                                          value="<?php echo $travel_flight_class_down; ?>" >
                                </div>    
                            </div><?php ?>
							  </div>
													<input type="submit" name="submit" id="sub_btn" class="btn btn-rounded btn-success btn-sm" value="Update">
                                            </form>
												</div>
       </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
         




            </div>
            <!-- /row -->

        </div>
        <!-- /page content -->


</section>
<!--/ CONTENT -->

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

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!--/ vendor javascripts -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<script>
$(window).load(function () {
	
	<?php if($travel_eligibility == "Two way"){?>
	$('#down').show('slow');
	$('#up').show('slow');
	<?php } else {?>
	$('#down').hide();
	<?php } ?> 

                           });
</script>
<script>
  $('#ticket').change(function ()
    {
		
        var eligibility = $(this).val();
        if (eligibility == "Two way")
        {
            $('#up').show('slow');
            $('#down').show('slow');
        } else {
			$('#up').show('slow');
			$('#down').hide('slow');
		}
		
    });
</script>

</body>
</html>
