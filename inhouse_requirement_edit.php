<?php
$page = "employee";
$tab = "requirements";
$sub = "inhouse_requirements";
$sub1 = "inhouse_list";
$head = "";
$head1 = "";

//$tab1 = "";
include('file_parts/header.php');
if (isset($_REQUEST['uid'])) {
    $uid = $_REQUEST['uid'];
}
$resCandi = $db->selectQuery("SELECT sm_inhouse_requirement.title,sm_inhouse_requirement.project_manager,sm_inhouse_requirement.contact,sm_work_site.id,sm_work_site.site_location FROM sm_inhouse_requirement INNER JOIN sm_work_site ON sm_inhouse_requirement.work_site_id=sm_work_site.id WHERE sm_inhouse_requirement.id='$uid'");
if (count($resCandi)) {

    $title = $resCandi[0]['title'];
    $work_site_id = $resCandi[0]['id'];
    $work_location = $resCandi[0]['site_location'];
    $project_manager = $resCandi[0]['project_manager'];
    $contact = $resCandi[0]['contact'];
}


?>


<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
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
</style>

<section id="content">

    <div class="page page-profile">

         <div class="pageheader">

            <h2>Inhouse Requirement<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">

                    <li>

                        <a href="#"><i class="fa fa-home"></i> Sponsor Master</a>

                    </li>

                    <li>

                        <a href="#"> Inhouse Requirement</a>

                    </li>

                    <li>

                        <a href="#">Inhouse Requirement edit</a>

                    </li>

                    
                </ul>



            </div>

        </div>


        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">
                        <!-- tile body -->
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="inhouse_requirement_view.php?uid=<?php echo $uid; ?>" >Inhouse requirement</a></li>
                                    <li role="presentation"><a href="inhouse_requirement_edit.php?uid=<?php echo $uid; ?>" style="color:#16a085;">Edit </a></li>
                                    
                                </ul>
                                 <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="tile-body">
                                   <form class="form-horizontal" name="" method="post" action="inhouse_requirement_edit_action.php"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>
									<div style="padding: 12px">
                                        <div class="wrap-reset">

                                           
                                            <div class="row">
											<div class="col-sm-12">

                                                        <label for="first-name">Title</label>

                                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">

                                                    </div>
													</div>
													<div class="row">
                                                <div class="col-md-6">
                                    <label for="phone">Work site: </label>
                                    <select class="form-control" name="work_site_id" id="work_site_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `work_site`,`id` FROM `sm_work_site`");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['id']; ?>"<?php if($manuf[$ei]['id']==@$work_site_id){ echo "selected";}?>><?php echo $manuf[$ei]['work_site']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								
								<div class="col-sm-6">

                                                        <label for="first-name">Work location</label>

                                                        <input type="text" class="form-control" id="work_location"  name="work_location" value="<?php echo @$work_location; ?>">

                                                    </div>
													</div>
													<div class="row">
                                                    <div class="col-sm-6">

                                                        <label for="first-name">Project Manager</label>

                                                        <input type="text" class="form-control" id="project_manager"  name="project_manager" value="<?php echo @$project_manager; ?>">

                                                    </div>
													 <div class="col-sm-6">

                                                        <label for="first-name">Contact</label>

                                                        <input type="text" class="form-control" id="contact"  name="contact" value="<?php echo @$contact; ?>">

                                                    </div>
                                            </div>
											
                                           
                                            
											
                                           
                                            
                                            
											
                                            

                                            <div class='form-group col-md-12 legend'>
                                               
                                            </div>
                                            <?php
                                            $requirement = $db->selectQuery("SELECT sm_designation.designation_name,sm_requirements.job_position,sm_requirements.category,sm_requirements.date_assign_from,sm_requirements.date_assign_to,sm_requirements.no_of_employees FROM sm_designation INNER JOIN sm_requirements ON sm_designation.designation_id=sm_requirements.job_position WHERE sm_requirements.id='$uid'");
											
                                            if (count($requirement)) {
                                                for ($qi = 0; $qi < count($requirement); $qi++) {
                                                    ?>
													 <h4><strong> Requirement </strong> <?php echo $qi+1; ?></h4>
                                                    <div class="row">
													<div class="col-sm-6">
                                                            <label for="city">Job position</label>
                                                            <select class="form-control mb-10" id="job_position" name="requirement[<?php echo $qi; ?>][job_position]">
                                                                <option selected="" value=""> Select</option>

                                                                <?php
                                                                $select_exp = $db->selectQuery("SELECT * FROM `sm_designation`");
                                                                if (count($select_exp)) {
                                                                    for ($ei = 0; $ei < count($select_exp); $ei++) {
                                                                        ?>
                                                                        <option value="<?php echo $select_exp[$ei]['designation_id']; ?>" <?php
                                                                        if ($requirement[$qi]['job_position'] == $select_exp[$ei]['designation_id']) {
                                                                            echo 'selected="selected"';
                                                                        }
                                                                        ?>><?php echo $select_exp[$ei]['designation_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="city">category</label>
                                                            <input type="text" class="form-control"  name="requirement[<?php echo $qi; ?>][category]" id="category" value="<?php echo $requirement[$qi]['category']; ?>">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <?php
                                                        $date_assign_from = new DateTime($requirement[$qi]['date_assign_from']);
                                                        $date_assign_to = new DateTime($requirement[$qi]['date_assign_to']);
                                                        ?>
                                                        <div class="col-md-6 ">
                                                            <label for="scstart">Date assign from: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' value="<?php echo $date_assign_from->format("d/m/Y"); ?>" name="requirement[<?php echo $qi; ?>][date_assign_from]" class="form-control" onkeydown="return false"/>
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <label for="scstart">Date assign to: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' name="requirement[<?php echo $qi; ?>][date_assign_to]" value="<?php echo $date_assign_to->format("d/m/Y"); ?>" class="form-control" onkeydown="return false"/>
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>
														<div class="col-sm-6">
                                                            <label for="city">No of employees</label>
                                                            <input type="text" class="form-control"  name="requirement[<?php echo $qi; ?>][no_of_employees]" id="no_of_employees" value="<?php echo $requirement[$qi]['no_of_employees']; ?>">
                                                        </div>
                                                    </div>
													<input type="hidden" id="requirement_incr" value="<?php echo count($requirement);?>">

                                                    <?php
                                                }
                                            }
                                            ?>
											
											
                                        </div>
										
										<div class="requirement_div"></div>
										<input type="hidden" value="<?php echo count($requirement);?>" id="requirement_val_incr">
										
										<div class="col-md-3">

                                    <button class="btn btn-success" id="requirement_add" type="button">Add New <i

                                            class="fa fa-plus"></i></button>
											

                                </div>
										
										
											
											
											<input type="hidden" value="<?php echo $uid;?>" name="id" id="uid">
											<input type="submit" class="btn btn-info pull-right" name="save" id="save" value="Save">
                                            <!-- <button class="btn" value="save" id="save"></button> -->         
											
										
													 <div class="row">

                                

                            </div>
                                       


                                       

                                   
                                </div>
                                 </form>
								 
								
								 </div>
								 </div>
								 </div>
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

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
                                                       $('body').on('click', '.date_pick', function () {
                                                           $(this).datepicker({
                                                               changeMonth: true,
                                                               changeYear: true,
                                                               dateFormat: "dd/mm/yy"
                                                           }).focus();
                                                           $(this).removeClass('datepicker');
                                                       });
</script>

<script>


    $('#work_site_id').change(function () {

            var work_site_id = $(this).val();

            $.ajax({

                url: "inhouse_requirement_edit_ajax.php",

                type: "POST",

                data: {work_site_id: work_site_id},

                success: function (data) {

                    $('#work_location').val(data);

                }

            });

        });
	
	 $('#requirement_add').click(function () {

            var requirement_add = "requirement_add";

            requirement_val_incr = $('#requirement_incr').val();
			//alert(requirement_val_incr);

            added_val = +requirement_val_incr + 1;
			
			


            $('.requirement_div').append('<h4 class="custom-font">'

                    + '<strong>Requirement ' + added_val + '</strong></h4>'

                    + ' <div class="row">'

                    + '    <div class="col-md-6">'

                    + '    <label for="interview_job_position">Job Position: </label>'

                    + '  <select class="form-control interview_job_position_more' + added_val + '" name="requirement[' + added_val + '][job_position]">'

                    + ' <option selected="" value=""> Select</option>'

<?php
$select_job = $db->secure_select("SELECT `designation_name`,`designation_id` FROM `sm_designation` WHERE `designation_status`='1'");
if (count($select_job) > 0) {
                    for ($ji = 0; $ji < count($select_job); $ji++) {
                         ?>

                    +'  <option value="<?php echo $select_job[$ji]['designation_id']; ?>"><?php echo $select_job[$ji]['designation_name']; ?></option>'

                                                    <?php

                                                }

                                            }

                                            ?>

                    + '</select>'

                    + ' </div>'

                    + '<div class="col-md-6">'

					
					
					+ ' <label for="interview_category">Category: </label>'
					
                + '<input type="text"  name="requirement[' + added_val + '][category]"  class="form-control" required="" > '
					

                    + '</div>'

                    + '  </div>'
                      
					  
					  
					   + ' <div class="row">'

                   + '<div class="col-md-6">'
                + '<label for="username">Date assign from: </label>'
				+ '<div class="input-group datepicker" data-format="L">'
				+ '<input type="text" name="requirement[' + added_val + '][date_assign_from]" class="form-control date_pick" onkeydown="return false" />'
				+ '<span class="input-group-addon"> <span class="fa fa-calendar"></span>' 
				+ '</div>'
                + '</div>'
				
                + '<div class="col-md-6 ">'
                + '<label for="username">Date assign to: </label>'
				+ '<div class="input-group datepicker" data-format="L">'
				+ '<input type="text" name="requirement[' + added_val + '][date_assign_to]" class="form-control date_pick" onkeydown="return false" />'
				 + '<span class="input-group-addon"> <span class="fa fa-calendar"></span>'
				
				+ '</div>'
                + '</div>'
                + '</div>'
				
				+     ' <div class="row">'
				+     '<div class="col-md-6">'
                +     '<label for="username">No of employees required: </label>'
                +     '<input type="text" name="requirement[' + added_val + '][no_of_employees]" class="form-control" required="">'
                +     '</div>'
	            +	  '</div>'
				+     '</br>'
				);
            // $('#requirement_val_incr').val(added_val);
			 $('#requirement_incr').val(added_val);
			 
              });
			  
	
	

	
</script>
 



<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<!--/ Page Specific Scripts -->


</body>


</html>