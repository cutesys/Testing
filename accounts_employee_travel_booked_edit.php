<?php
$success_msg = "";
$page = "accounts";
// $tab = "employee_travel";
// $sub = "yearly_travel";
// $head = "";
// $head1 = "";
// $sub1 = "employee_travel_booked";
// $tab1 = "";

include('file_parts/header.php');
if(isset($_REQUEST["employee_id"])){
				$employee_id=$_REQUEST['employee_id'];
                $resPartner = $db->selectQuery("select * from sm_employee_travel where employee_id='".$_GET['employee_id']."' ");
                if (count($resPartner)) {
                   // $employee_name = $resPartner[0]['id'];
                   $employee_code       = $resPartner[0]['employee_employment_id'];
                   $travel_leave 		= $resPartner[0]['travel_leave'];
                   $travel_eligibility  = $resPartner[0]['travel_eligibility'];
                   $travel_cost  = $resPartner[0]['travel_cost'];
				   
                   $travel_from 		= $resPartner[0]['travel_from'];
                   $travel_to 			= $resPartner[0]['travel_to'];
                  // $travel_departure_date = $resPartner[0]['travel_departure_date'];
				   //$travel_return_date 	  = $resPartner[0]['travel_return_date'];
                   $travel_airport 		= $resPartner[0]['travel_airport'];
                   $travel_flight 		= $resPartner[0]['travel_flight'];
				   $travel_flight_class = $resPartner[0]['travel_flight_class'];
				   $travel_from_db      = explode("-", $resPartner[0]['travel_departure_date']);
				   $travel_departure_date= $travel_from_db[2]."/".$travel_from_db[1]."/".$travel_from_db[0];
				   $travel_to_db      = explode("-", $resPartner[0]['travel_return_date']);
				   $travel_return_date = $travel_to_db[2]."/".$travel_to_db[1]."/".$travel_to_db[0];

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
				
if (isset($_POST['submit'])) { 
	//$employee_id=$_REQUEST['employee_id'];
	 
	    $employee_code             = $_POST['employee_employment_id'];
	    $travel_leave              = $_POST['travel_leave'];
		$travel_eligibility        = $_POST['travel_eligibility'];
		$travel_cost        = $_POST['travel_cost'];
		
		
		$travel_from               = $_POST['travel_from'];
		$travel_to                 = $_POST['travel_to'];
		$travel_departure_dates    = $_POST['travel_departure_date'];
		$travel_return_dates      = $_POST['travel_return_date'];
		//$travel_departure_date    = "2016-02-11";
		//$travel_return_date        = "2016-02-22";
		$travel_airport            = $_POST['travel_airport'];
		$travel_flight             = $_POST['travel_flight'];
		$travel_flight_class       = $_POST['travel_flight_class'];
		
		 $travel_from_date      = explode("/", $travel_departure_dates);
	     $travel_departure_date= $travel_from_date[2]."-".$travel_from_date[1]."-".$travel_from_date[0];
		 $travel_to_date      = explode("/", $travel_return_dates);
	     $travel_return_date= $travel_to_date[2]."-".$travel_to_date[1]."-".$travel_to_date[0];
				   
$travel_from_down               = $_POST['from_down'];
$travel_to_down                 = $_POST['to_down'];

      $travel_departure_date_downs    = $_POST['departure_date_down'];
		$travel_return_date_downs      = $_POST['return_date_down'];
		
        $travel_departure_date2      = explode("/", $travel_departure_date_downs);
	     $travel_departure_date_down= $travel_departure_date2[2]."-".$travel_departure_date2[1]."-".$travel_departure_date2[0];
		 $travel_return_date2      = explode("/", $travel_return_date_downs);
	     $travel_return_date_down= $travel_return_date2[2]."-".$travel_return_date2[1]."-".$travel_return_date2[0];
				   


$travel_airport_down            = $_POST['airport_down'];
$travel_flight_down             = $_POST['flight_down'];
$travel_flight_class_down       = $_POST['flightclass_down'];

	$values1 = array();
    $values1['employee_employment_id'] = $employee_code;
    $values1['travel_leave']           = $travel_leave;
    $values1['travel_eligibility']     = $travel_eligibility;
    $values1['travel_cost']     = $travel_cost;
	
    $values1['travel_from']            = $travel_from;
    $values1['travel_to']              = $travel_to;
    $values1['travel_departure_date']  = $travel_departure_date;
    $values1['travel_return_date']     = $travel_return_date;
	
	
    $values1['travel_airport']         = $travel_airport;
    $values1['travel_flight']          = $travel_flight;
    $values1['travel_flight_class']    = $travel_flight_class;
	
    $values1['travel_from_down']           = $travel_from_down;
    $values1['travel_to_down']             = $travel_to_down;
    $values1['travel_departure_date_down'] = $travel_departure_date_down;
    $values1['travel_return_date_down']    = $travel_return_date_down;
    $values1['travel_airport_down']        = $travel_airport_down;
    $values1['travel_flight_down']         = $travel_flight_down;
    $values1['travel_flight_class_down']   = $travel_flight_class_down;
	
	
		echo $insert = $db->secure_update("sm_employee_travel", $values1," WHERE `employee_id`= '".$_GET['employee_id']."'");
	if (!empty($insert)) 
	{
		echo "Updated";
		 echo "<script>window.location = 'employee_travel_booked_profile.php?employee_id=".$employee_id."'</script>";
		} 
		else {
	echo "<script>location.href='employee_travel_booked_edit.php?employee_id=".$employee_id."'</script>";
    }	
}

?>



<!-- ====================================================

================= CONTENT ===============================

===================================================== -->

<section id="content">
    <div class="page page-profile">
        <div class="pageheader">
            <h2>Edit Profile</h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Employee Travel</a>
                    </li>
                    <li>
                        <a href="partner_list.php">Travel</a>
                    </li>
                    <li>
                        <a href="#">Edit Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- page content -->

        <div class="pagecontent">
		
		
		
            <div class="row">
			
			
			<div class="col-md-4">



                        <!-- tile -->

                        <section class="tile tile-simple">



                            <!-- tile widget -->

                            <div class="tile-widget p-30 text-center">
                                    <div class="thumb thumb-xl">

                                        <img class="img-circle" src="<?php echo $dpImg; ?>" alt="">

                                    </div>
                                <h4 class="mb-0"><?php echo $employee_firstname; ?></h4>



                            </div>

                            <!-- /tile widget -->



                            <!-- tile body -->

                            <div class="tile-body text-center bg-blue p-0">






                            </div>

                            <!-- /tile body -->



                        </section>

                        <!-- /tile -->
                    </div>

                    <div class="col-md-8">
                        <section class="tile tile-simple">
                            <div class="tile-body p-0">
                                <div role="tabpanel">
                                    <ul class="nav nav-tabs tabs-dark" role="tablist">

                                        <li role="presentation"><a href="employee_travel_booked_profile.php?employee_id=<?php echo $_REQUEST['employee_id']?>" >Profile</a></li>
										<li role="presentation" ><a style="color:#16a085;" href="employee_travel_booked_edit.php?employee_id=<?php echo $_REQUEST['employee_id']?>">Edit</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                            <div class="wrap-reset">
                                               <form name="form4" role="form" id="form4"  method="post" enctype="multipart/form-data" action ="">

                                                    <div class="row">
                                                        <div class="form-group col-md-12 legend">
                                                            <h4><strong>Employee</strong>Travel</h4>
                                                        </div>
                                                    </div>

                                                    <div class="row">
			                    <div class="form-group col-md-6">
                                    <label for="phone">Employee Name</label>
                                        <?php
                                        $select = $db->selectQuery("select CONCAT( sm_employee.employee_firstname,  ' ', sm_employee.employee_middlename,  ' ', sm_employee.employee_lastname ) AS full_name from `sm_employee` WHERE `employee_id`='$employee_id'");
			                            // if (count($select)) {
										
			                               // }
									

                                        if (count($select)) {
											
                                            for ($rt = 0; $rt < count($select); $rt++) {
												 $employee_firstname = $select[0]['full_name'];
                                                ?>
												<input type="text" class="form-control" id="employee_firstname" name="employee_firstname" value="<?php echo $employee_firstname;?>" disabled>
                                                
                                                <?php
                                            }
                                        }
                                        ?>
                                   
                                </div>
                                                        <div class="form-group col-sm-6">

                                                            <label for="first-name">Employee Code</label>

															<input type="text" class="form-control" id="employee_employment_id" name="employee_employment_id" value="<?php echo $employee_code;?>" readonly>
                                                               
                                                            </select>




                                                        </div>


                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">No of Leaves:</label>
                                                            <input type="text" class="form-control" id="travel_leave" name="travel_leave" value="<?php echo $travel_leave; ?>" readonly>
                                                        </div>
                                                         

                                             												 
															
															 <div class="form-group col-md-6">
												<label for="phone">Eligible for: </label>
												<select class="form-control" name="travel_eligibility" id="travel_eligibility" >
													<option selected="" value=""> Select</option>
													<?php if ($travel_leave != '21') { ?>
													<option <?php if($travel_eligibility == "up and down"){ echo "selected"; }?> value="up and down">Up and Down</option>
												<?php
												}
												?>
												<?php if ($travel_leave != '42') { ?>
												<option <?php if($travel_eligibility == "up"){ echo "selected"; }?> value="up">Up</option>
													<option <?php if($travel_eligibility == "down"){ echo "selected"; }?> value="down">Down</option>
												<?php } ?>
												</select>
												</div>
															
                                                     <!--  <div class="form-group col-sm-6">
                                                            <label for="address2">Eligibility:</label>
                                                            <input type="text" class="form-control" id="travel_eligibility" name="travel_eligibility" value="<?php// echo $travel_eligibility; ?>">
                                                        </div>   -->

                                                    </div>
													
                                                    <div class="row">
													  <div class="form-group col-md-6">
                                    <label for="companyname">Cost: </label>
                                    <input type="text" name="travel_cost" id="travel_cost" value="<?php echo $travel_cost; ?>" class="form-control" 
                                                       data-parsley-type="digits" 
                                           >
                                </div>
								</div>
													
													<div id="up">
													<?php if(!empty($travel_from)){?>

                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">From</label>
                                                            <input type="text" class="form-control" id="travel_from" name="travel_from" value="<?php echo $travel_from; ?>">
                                                        </div>
														

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">To</label>
                                                            <input type="text" class="form-control" id="travel_to" name="travel_to" value="<?php echo $travel_to; ?>">
                                                        </div>

                                                    </div>
                                                    <div class="row">

													
													
													
								<!--<div class="form-group col-md-6">
                                 <label for="scstart">Departure: </label>
                                 <input type='text' name="departure_date" id="travel_departure_date" name="travel_departure_date" class="form-control"  value="<?php //echo $travel_departure_date; ?>">
                                </div>-->
								
							   <?php /* <div class="form-group col-sm-6">
                                <label for="address2">Departure Date:</label>
								 <div class='input-group datepicker' data-format="L">
                                <input type="text" class="form-control datepicker" id="travel_departure_date" name="travel_departure_date" value="<?php echo $travel_departure_date; ?>">
                                </div>
								</div> */ ?>
								
								<div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Departure Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="travel_departure_date"
                                               id="travel_departure_date" required="" onkeydown="return false" value="<?php echo $travel_departure_date; ?>"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
								
								<div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Arrival date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="travel_return_date"
                                               id="travel_return_date" required="" onkeydown="return false" value="<?php echo $travel_return_date; ?>" />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
						</div>
													
													
													<div class="row">

                                                        <div class="form-group col-sm-6">

                                                            <label for="first-name">Airport</label>


                                                           <input type="text" class="form-control" id="travel_airport" name="travel_airport" value="<?php echo $travel_airport; ?>">





                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">Flight:</label>
                                                            <input type="text" class="form-control" id="travel_flight" name="travel_flight" value="<?php echo $travel_flight; ?>">
                                                        </div>

                                                    </div>
													
                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">Flight Class:</label>
                                                            <input type="text" class="form-control" id="travel_flight_class" name="travel_flight_class" value="<?php echo $travel_flight_class; ?>" data-parsley-trigger="change" data-parsley-type="digits">
                                                        </div>
                                                      
                                                    </div>
													<?php }?>
													</div>
													<div id="down">
									<?php if(!empty($travel_from_down)){ ?>				
									 
										<h4 class="custom-font"><strong>Ticket Details Return</strong></h4>
                            
                                   <div class="row">
                               <!--  <div class="form-group col-md-4">
                                    <label for="username">From: </label>
                                    <input type="text" name="from_down" id="from_down" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                          value="<?php //echo $travel_from_down; ?>" >
                                </div>
								
								
                                 <div class="form-group col-md-4">
                                    <label for="username">From: </label>
                                    <input type="text" name="from_down" id="from_down" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                             value="<?php //echo $travel_from_down; ?>" >
                                </div>  -->
								 <div class="form-group col-sm-6">
                                                            <label for="address1">From:</label>
                                                            <input type="text" class="form-control" id="from_down" name="from_down" value="<?php echo $travel_from_down; ?>">
                                                        </div>
                                                       <div class="form-group col-sm-6">
                                                            <label for="address1">To:</label>
                                                            <input type="text" class="form-control" id="to_down" name="to_down" value="<?php echo $travel_to_down; ?>">
                                                        </div>
                                                        </div>

                          <!--       <div class="form-group col-md-4">
                                    <label for="username">To: </label>
                                    <input type="text" name="to_down" id="to_down" class="form-control"
                                           data-parsley-trigger="change"
                                           pattern="/^[a-zA-Z ]+$/" required=""
                                             value="<?php// echo $travel_to_down; ?>" >
                                </div> -->
								  <div class="row">
								<div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Departure Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="departure_date_down"
                                               id="departure_date_down" required="" onkeydown="return false"   value="<?php echo $travel_departure_date_down; ?>"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
								<!-- <div class="form-group col-md-4">
                                    <label for="scstart">Departure: </label>
                                    <input type='text' name="departure_date_down" id="departure_date_down" class="form-control date_pick" onkeydown="return false"/>
                                </div> -->
                          <div class="form-group col-md-6 mb-0">
                                    <label for="scstart"> Arrival Date:</label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="return_date_down"
                                               id="return_date_down" required="" onkeydown="return false"  value="<?php echo $travel_return_date_down; ?>"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
							   </div>
							  
								
                               <!-- <div class="form-group col-md-4 ">
                                    <label for="scstart">Return: </label>
                                    <input type='text' name="return_date_down" id="return_date_down" class="form-control date_pick" onkeydown="return false"/>

                                </div> -->
								<div class="row">
								<div class="form-group col-md-6 mb-0">
                                    <label for="username">Airport: </label>
                                    <input type="text" name="airport_down" id="airport_down" class="form-control"
                                         required="" value="<?php echo $travel_airport_down; ?>">
                                </div>
							    <div class="form-group col-md-6 mb-0">
                                    <label for="username">Flight: </label>
                                    <input type="text" name="flight_down" id="flight_down" class="form-control"
                                         required="" value="<?php echo $travel_flight_down; ?>">
                                </div>
								
                            </div>
                            
							
							
                            </div>
							
							<div class="row">
							       <div class="form-group col-md-6 mb-0">
                                    <label for="username">Flight Class: </label>
                                    <input type="text" name="flightclass_down" id="flightclass_down" class="form-control"
                                         required="" value="<?php echo $travel_flight_class_down; ?>">
                                </div>    
                            </div>
                       
									<?php } ?>
						 </div>
													<input type="submit" name="submit" id="sub_btn" class="btn btn-rounded btn-success btn-sm" value="Update">
                                                </form>
												
												
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



    </div>



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

<!--/ custom javascripts -->













<!-- ===============================================

============== Page Specific Scripts ===============

================================================ -->

<script>

                                                            $(window).load(function () {
																
															

                                                            });

</script>
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
<!--/ Page Specific Scripts -->

<script>
  $('#travel_eligibility').change(function ()
    {
        var eligibility = $(this).val();
		
        if (eligibility == "up and down")
        {alert(eligibility);
            $('#up').show();
            $('#down').show();
        } else {
			$('#up').show('slow');
			$('#down').hide('slow');
		}
    });
</script>













</body>



<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->

</html>

