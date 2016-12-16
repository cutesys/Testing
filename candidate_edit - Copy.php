<?php
$page = "recruitment";
$tab = "candidate";
$sub = "candidate_list";
$head = "";
$head1 = "";
$sub1 = "";
$tab1 = "";
include('file_parts/header.php');
$can_id = $_GET['can_id'];
$resCandi = $db->selectQuery("SELECT * FROM `sm_candidate` WHERE `candidate_id`='$can_id'");
if (count($resCandi)) {

    $candidate_code = $resCandi[0]['candidate_code'];
    $agent_code = $resCandi[0]['agent_code'];
    $candidate_added_by = $resCandi[0]['candidate_added_by'];
    $candidate_firstname = $resCandi[0]['candidate_firstname'];
    $candidate_middlename = $resCandi[0]['candidate_middlename'];
    $candidate_lastname = $resCandi[0]['candidate_lastname'];
    $candidate_gender = $resCandi[0]['candidate_gender'];
    $candidate_marital_status = $resCandi[0]['candidate_marital_status'];
    $candidate_dob = $resCandi[0]['candidate_dob'];
    $candidate_doorno = $resCandi[0]['candidate_doorno'];
    $candidate_nationality = $resCandi[0]['candidate_nationality'];
    $candidate_state = $resCandi[0]['candidate_state'];
    $candidate_city = $resCandi[0]['candidate_city'];
    $candidate_zipcode = $resCandi[0]['candidate_zipcode'];
    $candidate_email = $resCandi[0]['candidate_email'];
    $candidate_phone = $resCandi[0]['candidate_phone'];
    $candidate_status = $resCandi[0]['candidate_status'];
    $candidate_interview_status = $resCandi[0]['candidate_interview_status'];

    $candidate_dob1 = explode("-", $candidate_dob);
    $candidate_dob = $candidate_dob1[2] . "/" . $candidate_dob1[1] . "/" . $candidate_dob1[0];
}
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_candidate_files` WHERE `file_name`='Candidate_Picture' AND `file_status`='1' AND `candidate_id`='$can_id'");

	$display_name = ""; 
	$select_name = $db->selectQuery("SELECT `candidate_added_by` FROM `sm_candidate` WHERE `candidate_id`='$can_id'");
	if(!empty($select_name))
	{
		$display_name = $select_name[0]['candidate_added_by'];
	}
if (count($resLogo)){	
	if($display_name == 'agent')
	{
		$dpImgs = str_replace("../","",$resLogo[0]['file_path']);
	} else {
		$dpImgs = $resLogo[0]['file_path'];
	}
if (file_exists($dpImgs)) {
    $dpImg = $dpImgs;
} else {
	$dpImg = "assets/images/profile-default.png";
}
} else {
    $dpImg = "assets/images/profile-default.png";
}


?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Candidate Profile <span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Recruitment</a>
                    </li>
                    <li>
                        <a href="#">Candidate</a>
                    </li>
                    <li>
                        <a href="#">Candidate Profile</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img src="<?php echo $dpImg; ?>" alt="Profile Picture">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $candidate_firstname; ?> </strong> <?php echo $candidate_lastname; ?></h4>
                            <span class="text-muted"><?php // echo $candidate_designation;                                           ?></span>
                        </div>
                    </section>
<!--                    <section class="tile tile-simple">
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php // echo $candidate_firstname;                                           ?> <span></span> <?php //echo $candidate_lastname;                                           ?> </h1>
                        </div>
                        <div class="tile-body">
                            <p class="text-default lt"><?php // echo $candidate_remarks;                                           ?></p>
                        </div>
                    </section>-->
                    <section class="tile tile-simple">
                    </section>
                </div>

                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">
                        <!-- tile body -->
                        <div class="tile-body p-0">
                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a href="candidate_profile.php?can_id=<?php echo $can_id; ?>" >Profile</a></li>
                                    <li role="presentation"><a href="candidate_edit.php?can_id=<?php echo $can_id; ?>" style="color:#16a085;">Edit Profile</a></li>
                                    <li role="presentation"><a href="candidate_gallery.php?can_id=<?php echo $can_id; ?>">Documents</a></li>
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post" action="candidate_edit_action.php">
                                        <div class="wrap-reset">

                                            <div class="row">
                                                <div class="form-group col-md-6 legend">
                                                    <h4><strong>About</strong> Candidate </h4>
                                                </div>
                                                <div class="col-sm-5"> </div>
                                                <div class="form-group col-md-1 legend">

                                                        <!--<a onclick="print();" target="_blank"><h4><strong>Print</strong></h4></a>-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="first-name">First Name</label>
                                                    <input type="text" class="form-control" name="candidate_firstname" id="f_name"  value="<?php echo $candidate_firstname; ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="last-name">Middle Name</label>
                                                    <input type="text" class="form-control" name="candidate_middlename" id="m_name" value="<?php echo $candidate_middlename; ?>">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="last-name">Last Name</label>
                                                    <input type="text" class="form-control" name="candidate_lastname" id="l_name"  value="<?php echo $candidate_lastname; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Candidate ID</label>
                                                    <input type="text" name="candidate_code" readonly="" class="form-control" id="eid" value="<?php echo $candidate_code; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Marital Status</label>
                                                    <select class="form-control mb-10" name="candidate_marital_status">
                                                        <option selected="" value=""> Select</option>
                                                        <option value="Married" <?php
                                                        if ($candidate_marital_status == "Married") {
                                                            echo 'selected=""';
                                                        }
                                                        ?> >Married</option>
                                                        <option value="Not Married" <?php
                                                        if ($candidate_marital_status == "Single") {
                                                            echo 'selected=""';
                                                        }
                                                        ?>>Single</option>
                                                        <option value="Divorced" <?php
                                                        if ($candidate_marital_status == "Divorced") {
                                                            echo 'selected=""';
                                                        }
                                                        ?>>Divorced</option>
                                                    </select>                                                     </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Gender</label>
                                                    <select class="form-control" name="candidate_gender">
                                                        <option selected="" value=""> Select</option>
														<option value="Male" <?php
                                                        if ($candidate_gender == "Male") {
                                                            echo "selected=''";
                                                        }
                                                        ?>>Male</option>
                                                        <option value="Female" <?php
                                                        if ($candidate_gender == "Female") {
                                                            echo "selected=''";
                                                        }
                                                        ?>>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="scstart">Date of Birth: </label>
                                                    <div class='input-group datepicker' data-format="L">
                                                        <input type='text' name="candidate_dob" class="form-control" value="<?php echo $candidate_dob; ?>" onkeydown="return false"/>
                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                    </div>
                                                </div>
                                            </div>
											<?php $select = $db->selectQuery("select * from country "); ?>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Nationality</label>
                                                    <select class="form-control mb-10" name="candidate_nationality">
                                                        <option value="">Select</option>
                                                        <?php

                                                            $select = $db->selectQuery("select * from country ");

                                                            if (count($select)) {

                                                                for ($rt = 0; $rt < count($select); $rt++) {

                                                                    ?>

                                                                    <option

                                                                        value="<?php echo $select[$rt]['name']; ?>" <?php

                                                                        if ($select[$rt]['name'] == $candidate_nationality) {

                                                                            echo 'selected=""';

                                                                        }

                                                                        ?>> <?php echo $select[$rt]['name']; ?> </option>

                                                                        <?php

                                                                    }

                                                                }

                                                                ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Address</label>
                                                    <input type="text" name="candidate_doorno" class="form-control" id="Nationality" value="<?php echo $candidate_doorno; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">City</label>
                                                    <input type="text" name="candidate_city" class="form-control" id="eid" value="<?php echo $candidate_city; ?>">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Region/State</label>
                                                    <input type="text" name="candidate_state" class="form-control" id="Nationality" value="<?php echo $candidate_state; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Zip code</label>
                                                    <input type="text" name="candidate_zipcode" class="form-control" id="eid" value="<?php echo $candidate_zipcode; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">E-mail</label>
                                                    <input type="text" name="candidate_email" class="form-control" id="Nationality" value="<?php echo $candidate_email; ?>" onblur="validateEmail(this);">
													<span id="emailval" style="color:#FF0000"></span>
												</div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="Nationality">Phone</label>
                                                    <input type="text" name="candidate_phone" class="form-control" id="eid" value="<?php echo $candidate_phone; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                </div>
                                            </div>
                                            <div class='form-group col-md-12 legend'>
                                                <h4><strong>Qualifications</strong> Details</h4>
                                            </div>
                                            <?php
                                            $qualif = $db->selectQuery("SELECT * FROM `sm_candidate_qualifications` WHERE `candidate_id`='$can_id'");
											 
                                            if (count($qualif)) {
                                                for ($ql = 0; $ql < count($qualif); $ql++) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">Qualification  <?php echo $nq = $ql + 1; ?></label>
                                                            <select class="form-control" name="qualification[<?php echo $ql; ?>][qualification_name]">
                                                                <option selected="" value=""> Select</option>
                                                                <?php
                                                                $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                                                if (count($selectQual)) {
                                                                    for ($qi = 0; $qi < count($selectQual); $qi++) {
                                                                        ?>
                                                                        <option
                                                                            value="<?php echo $selectQual[$ql]['qualification_name']; ?>" <?php
                                                                            if ($qualif[$ql]['qualification_name'] == $selectQual[$qi]['qualification_name']) {
                                                                                echo 'selected=""';
                                                                            }
                                                                            ?>><?php echo $qualif[$ql]['qualification_name']; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">Status</label>
                                                            <select class="form-control mb-10" name="qualification[<?php echo $ql; ?>][qualification_status]">
                                                                <option selected="" value=""> Select</option>
                                                                <option value="Passed" <?php
                                                                if ($qualif[$ql]['qualification_status'] == "Passed") {
                                                                    echo "selected=''";
                                                                }
                                                                ?>>Passed</option>
																<option value="Failed" <?php
                                                                if ($qualif[$ql]['qualification_status'] == "Failed") {
                                                                    echo "selected=''";
                                                                }
                                                                ?>>Failed</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
											
											<div class="qualification_div"></div>
							
											<input type="hidden" value="<?php echo count($qualif); ?>" id="qualification_increment"/>
											<div class="row">
												<div class="col-md-3">
													<button class="btn btn-success" type="button" id="qualification_add_btn">Other Qualifications <i class="fa fa-plus"></i></button>
												</div>
											</div>
											
                                            <div class='form-group col-md-12 legend'>
                                                <h4><strong>Applied</strong> For</h4>
                                            </div>
                                            <?php
                                            $appli = $db->selectQuery("SELECT * FROM `sm_candidate_application` WHERE `candidate_id`='$can_id'");
                                            if (count($appli)) {
                                                for ($qi = 0; $qi < count($appli); $qi++) {
                                                    ?>
                                                    <div class="row">
													<div class="form-group col-md-6">
														<label for="selected_interview">Select Interview: </label>
														<select class="form-control" name="application[1][interview_id]" id="selected_interview">
															<option selected="" value=""> Select</option>

                                                            <?php

                                                            $select_interview = $db->selectQuery("SELECT `interview_id`,`interview_name` FROM `sm_interview` WHERE `interview_status`='Active' AND `interview_name` != ''");

                                                            if (count($select_interview)) {

                                                                for ($intr = 0; $intr < count($select_interview); $intr++) {

                                                                    ?>

                                                                    <option value="<?php echo $select_interview[$intr]['interview_id']; ?>" <?php
                                                                            if ($select_interview[$intr]['interview_id'] == $appli[$qi]['interview_id']) {
                                                                                echo "selected";
                                                                            }
                                                                            ?>><?php echo $select_interview[$intr]['interview_name']; ?></option>

                                                                    <?php

                                                                }

                                                            }

                                                            ?>
														</select>
														</div>
                                                        <div class="form-group col-md-6">
                                                            <label for="interview_job_position">Job Position: </label>
                                                            <select class="form-control job_position"
                                                                    name="application[<?php echo $qi; ?>][application_job_position]"
                                                                    id="job_position">
                                                                <option selected="" value=""> Select</option>
                                                                <?php
                                                                /*$select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                                                                if (count($select_job) > 0) {
                                                                    for ($ji = 0; $ji < count($select_job); $ji++) {
                                                                        ?>
                                                                        <option
                                                                            value="<?php echo $select_job[$ji]['job_name']; ?>" <?php
                                                                            if ($select_job[$ji]['job_name'] == $appli[$qi]['application_job_position']) {
                                                                                echo "selected=''";
                                                                            }
                                                                            ?>><?php echo $select_job[$ji]['job_name']; ?></option>
                                                                            <?php
                                                                        }
                                                                    } */?>
																	<option selected="" value="<?php echo $appli[$qi]['application_job_position']; ?>"><?php echo $appli[$qi]['application_job_position']; ?></option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">Category: </label>
                                                            <select class="form-control category"
                                                                    name="application[<?php echo $qi; ?>][application_job_category]" id="job_category">
                                                                <option  value="<?php echo $appli[$qi]['application_job_category']; ?>"><?php echo $appli[$qi]['application_job_category']; ?></option>
                                                            </select>
                                                        </div>
														
														<?php @$skills = explode(",",$appli[$qi]['application_skills']); ?>
														<div class="form-group col-md-12">
                                                            <div class="skill_set">
															<label class="checkbox checkbox-custom-alt">
															
															<?php 
															if(!empty($skills)){
															//foreach($skills as $sk) { 
															for ($ski = 0; $ski < count($skills); $ski++) {?>
															<?php /* <input type="checkbox" name="skill[<?php echo $qi ?>]" value="<?php echo $sk; ?>" checked="checked"><i></i> <?php echo $sk; ?></br> */?>
															<input type="checkbox" name="skill[<?php echo $ski ?>]" value="<?php echo $skills[$ski]; ?>" checked="checked"><i></i> <?php echo $skills[$ski]; ?></br>
            
															<?php } } ?>
															
															</label>
                                                            </div>
                                                        </div>
														
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <div class='form-group col-md-12 legend'>
                                                <h4><strong>Experience</strong> Info</h4>
                                            </div>
                                            <?php
                                            $experience = $db->selectQuery("SELECT * FROM `sm_candidate_experience` WHERE `candidate_id`='$can_id'");
											
                                            if (count($experience)) {
                                                for ($qi = 0; $qi < count($experience); $qi++) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">Company</label>
                                                            <input type="text" class="form-control"  name="experience[<?php echo $qi; ?>][experience_company]" id="company" value="<?php echo $experience[$qi]['experience_company']; ?>">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">Designation</label>
                                                            <select class="form-control mb-10" name="experience[<?php echo $qi; ?>][experience_designation]">
                                                                <option selected="" value=""> Select</option>

                                                                <?php
                                                                $select_exp = $db->selectQuery("SELECT * FROM `sm_job_positions`");
                                                                if (count($select_exp)) {
                                                                    for ($ei = 0; $ei < count($select_exp); $ei++) {
                                                                        ?>
                                                                        <option value="<?php echo $select_exp[$ei]['job_name']; ?>" <?php
                                                                        if ($experience[$qi]['experience_designation'] == $select_exp[$ei]['job_name']) {
                                                                            echo 'selected="selected"';
                                                                        }
                                                                        ?>><?php echo $select_exp[$ei]['job_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                <option value="Other" <?php
                                                                if ($experience[$qi]['experience_designation'] == "Other") {
                                                                    echo 'selected="selected"';
                                                                }
                                                                ?>> Other</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <?php
                                                        $datetime1 = new DateTime($experience[$qi]['experience_from']);
                                                        $datetime2 = new DateTime($experience[$qi]['experience_to']);
                                                        ?>
                                                        <div class="form-group col-md-6 ">
                                                            <label for="scstart">From: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' value="<?php echo $datetime1->format("d/m/Y"); ?>" name="experience[<?php echo $qi; ?>][experience_from]" class="form-control" onkeydown="return false"/>
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                            <label for="scstart">To: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' name="experience[<?php echo $qi; ?>][experience_to]" value="<?php echo $datetime2->format("d/m/Y"); ?>" class="form-control" onkeydown="return false"/>
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
										
										
										<div class="experience_div"></div>
										<input type="hidden" value="<?php echo count($experience);?>" id="experience_increment">
										<div class="row">
											<div class="col-md-3">
												<button class="btn btn-success" type="button" id="experience_add_btn">Add Experience
													<i class="fa fa-plus"></i></button>
											</div>
										</div>
													
                                        <div class='form-group col-md-12 legend'>
                                            <h4><strong>Document</strong> details </h4>
                                        </div>
                                        <?php
                                        $docum = $db->selectQuery("SELECT * FROM `sm_candidate_documents` WHERE `candidate_id`='$can_id'");
                                        if (count($docum)) {
                                            for ($doc = 0; $doc < count($docum); $doc++) {
                                                ?>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="city"><?php echo $docum[$doc]['documents_title']; ?></label>
                                                        <input type="hidden" name="documents[<?php echo $doc; ?>][documents_title]" value="<?php echo $docum[$doc]['documents_title']; ?>">
                                                        <input type="text" class="form-control"  name="documents[<?php echo $doc; ?>][documents_data]" id="company" value="<?php echo $docum[$doc]['documents_data']; ?>">
                                                    </div>
													<?php  if($docum[$doc]['documents_title']!='ID Card') { ?>
                                                    <div class="form-group col-md-4 ">
                                                        <label for="scstart">Commencing Date: </label>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' value="<?php echo $docum[$doc]['documents_start_date']; ?>" name="documents[<?php echo $doc; ?>][documents_start_date]" class="form-control" onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 ">
                                                        <label for="scstart">Renewal Date: </label>
                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type='text' value="<?php echo $docum[$doc]['documents_end_date']; ?>" name="documents[<?php echo $doc; ?>][documents_end_date]" class="form-control" onkeydown="return false"/>
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>
													<?php } ?>
										
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>


                                        <input type="hidden" name="candidate_id" value="<?php echo $can_id; ?>">
                                        <input type="submit" class="btn btn-info" name="save" value="Save">

                                    </form>
                                </div>
                                <!-- Nav tabs -->
                                <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                <!--                                </ul>-->

                                <!-- Tab panes -->
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
$('#selected_interview').change(function () {
	var selected_interview = $(this).val();
	$.ajax({
	url: "interview_form_process.php",
	type: "POST",
	data: {selected_interview: selected_interview},
	success: function (data) {
		//alert(data);
	$('.job_position').html(data);
}
});
});

    $('.job_position').change(function () {
        var job_position = $(this).val();
        $.ajax({
            url: "candidate_process.php",
            type: "POST",
            data: {job_position: job_position},
            success: function (data) {
                $('#job_category').html(data);
            }
        });
    });
	
	 $('#qualification_add_btn').click(function () {
        var qualification_add = "qualification_add";
        qualification_val_incr = $('#qualification_increment').val();
        added_qual = +qualification_val_incr + 1;
        $.ajax({
            url: "candidate_qualification_increment.php",
            type: "POST",
            data: {qualification_add: qualification_add, qual_val: qualification_val_incr},
            success: function (data) {
                $('.qualification_div').append(data);
                $('#qualification_increment').val(added_qual);
            }
        });
    });
	$('#experience_add_btn').click(function () {
        var experience_add = "experience_add";
        experience_increment = $('#experience_increment').val();
        added_exp = +experience_increment + 1;
        $('.experience_div').append(
                '<div class="row">'
                + '<div class="form-group col-md-6">'
                + '<label for="fax">Company: </label>'
                + '<input type="text"  name="experience[' + experience_increment + '][experience_company]"  class="form-control" > '
                + '</div>'
                + '<div class="form-group col-md-6">'
                + '<label for="phone">Designation: </label>'
                + '<select class="form-control mb-10" name="experience[' + experience_increment + '][experience_designation]"  >'
                + '<option selected="" value=""> Select</option>'
<?php
$select_exp = $db->selectQuery("SELECT * FROM `sm_job_positions`");
if (count($select_exp)) {
    for ($ei = 0; $ei < count($select_exp); $ei++) {
        ?>
                +'  <option value="<?php echo $select_exp[$ei]["job_name"]; ?>"><?php echo $select_exp[$ei]["job_name"]; ?></option>'
        <?php
    }
}
?>
        + '</select>'
                + '</div>'
                + '</div>'
                + '<div class="row">'
                + '<div class="form-group col-md-6">'
                + '<label for="scstart">From: </label>'
               // + '<input type="text" name="experience[' + experience_increment + '][experience_from]" class="form-control date_pick"/>'
				+ '<div class="input-group datepicker" data-format="L">'
                //+ '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick"/>'
				+ '<input type="text" name="experience[' + experience_increment + '][experience_from]" class="form-control date_pick" onkeydown="return false"/>'
				+ '<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>'
				+ '</div>'
                + '</div>'
                + '<div class="form-group col-md-6 ">'
                + '<label for="scstart">To: </label>'
				+ '<div class="input-group datepicker" data-format="L">'
                //+ '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick"/>'
				+ '<input type="text" name="experience[' + experience_increment + '][experience_to]" class="form-control date_pick" onkeydown="return false"/>'
				+ '<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>'
				+ '</div>'
                + '</div>'
        + '</div>'
                );
                $('#experience_increment').val(added_exp);
    });
	
	function validateEmail(emailField){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

	if (reg.test(emailField.value) == false) 
	{
		//alert('Invalid Email Address');
		$('#emailval').html('Invalid Email Address').fadeOut(3000);
		return false;
	}

	return true;

}
$('#job_category').change(function () {
        var job_cat = $(this).val();
        var job_psn = $('.job_position').val();
        $.ajax({
            url: "candidate_process.php",
            type: "POST",
            data: {job_cat: job_cat, job_psn: job_psn},
            success: function (data) {
                $('.skill_set').html(data);
            }
        });
    });	
	
</script>
 <?php /* <div class="form-group col-md-6 ">
<label for="scstart">To: </label>
<div class='input-group datepicker' data-format="L">
<input type='text' name="experience[<?php echo $qi; ?>][experience_to]" value="<?php echo $datetime2->format("d/m/Y"); ?>" class="form-control"/>
<span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
</div>
</div> */?>



<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<!--/ Page Specific Scripts -->


</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>