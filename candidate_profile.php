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
}
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_candidate_files` WHERE `file_name`='Candidate_Picture' AND `file_status`='1' AND `candidate_id`='$can_id'");
/*if (count($resLogo) && file_exists($resLogo[0]['file_path'])) {
    $dpImg = $resLogo[0]['file_path'];
} else {
    $dpImg = "assets/images/profile-default.png";
} */ 
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

            <h2>Candidate Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Recruitment</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Candidate</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Candidate Profile</a>
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
                                <img  src="<?php echo $dpImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $candidate_firstname; ?></strong> <?php echo $candidate_lastname; ?></h4>
                            <span class="text-muted"><?php // echo $candidate_designation;             ?></span>
                        </div>
                    </section>
<!--                    <section class="tile tile-simple">
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php // echo $candidate_firstname;             ?> <span></span> <?php //echo $candidate_lastname;             ?> </h1>
                        </div>
                        <div class="tile-body">
                            <p class="text-default lt"><?php // echo $candidate_remarks;             ?></p>
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
                                    <li role="presentation"><a style="color:#16a085;" href="#">Profile</a></li>
                                    <li role="presentation"><a href="candidate_edit.php?can_id=<?php echo $can_id; ?>">Edit Profile</a></li>
                                    <li role="presentation"><a href="candidate_gallery.php?can_id=<?php echo $can_id; ?>">Documents</a></li>
                                </ul>
                                <div style="padding: 12px">
                                    <form method="post">
                                        <div class="wrap-reset">

                                            <form class="profile-settings">

                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>About</strong> Candidate </h4>
                                                    </div>
                                                    <div class="col-sm-5"> </div>
                                                    <div class="form-group col-md-1 legend">

                                                        <a onclick="print();" target="_blank"><h4><strong>Print</strong></h4></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="first-name">First Name</label>
                                                        <input type="text" class="form-control" name="f_name" id="f_name" readonly value="<?php echo $candidate_firstname; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="last-name">Middle Name</label>
                                                        <input type="text" class="form-control" name="m_name" id="m_name" readonly value="<?php echo $candidate_middlename; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="last-name">Last Name</label>
                                                        <input type="text" class="form-control" name="l_name" id="l_name" readonly value="<?php echo $candidate_lastname; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Candidate ID</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_code; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Marital Status</label>
                                                        <input type="text" name="doj" readonly class="form-control" id="Nationality" value="<?php echo $candidate_marital_status; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Gender</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_gender; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Date of Birth</label>
                                                        <?php
                                                        $candidate_dob1 = explode("-", $candidate_dob);
                                                        $candidate_dob = $candidate_dob1[2] . "/" . $candidate_dob1[1] . "/" . $candidate_dob1[0];
                                                        ?>
                                                        <input type="text" name="doj" readonly class="form-control" id="Nationality" value="<?php echo $candidate_dob; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Nationality</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_nationality; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Address</label>
                                                        <input type="text" name="doj" readonly class="form-control" id="Nationality" value="<?php echo $candidate_doorno; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">City</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_city; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Region/State</label>
                                                        <input type="text" name="doj" readonly class="form-control" id="Nationality" value="<?php echo $candidate_state; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Zip code</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_zipcode; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">E-mail</label>
                                                        <input type="text" name="doj" readonly class="form-control" id="Nationality" value="<?php echo $candidate_email; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Phone</label>
                                                        <input type="text" name="eid" readonly class="form-control" id="eid" value="<?php echo $candidate_phone; ?>">
                                                    </div>
                                                </div>
                                                <div class='form-group col-md-12 legend'>
                                                    <h4><strong>Qualifications</strong>Details</h4>
                                                </div>
                                                <?php
                                                $qualif = $db->selectQuery("SELECT * FROM `sm_candidate_qualifications` WHERE `candidate_id`='$can_id'");
                                                if (count($qualif)) {
                                                    for ($qi = 0; $qi < count($qualif); $qi++) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="city">Qualification <?php echo $nq = $qi + 1; ?></label>
                                                                <input type="text" class="form-control" readonly name="company" id="company" value="<?php echo $qualif[$qi]['qualification_name']; ?>">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="city">Status</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $qualif[$qi]['qualification_status']; ?>">
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div class='form-group col-md-12 legend'>
                                                    <h4><strong>Applied</strong> For</h4>
                                                </div>
                                                <?php
                                                $appli = $db->selectQuery("SELECT * FROM `sm_candidate_application` WHERE `candidate_id`='$can_id'");
                                                if (count($appli)) {
                                                    for ($qi = 0; $qi < count($appli); $qi++) {
                                                        ?>
														
                                                        <div class="row">
														<?php $select_interview = $db->selectQuery("SELECT `interview_name` FROM `sm_interview` WHERE `interview_id`='".$appli[$qi]['interview_id']."'");
															  if (count($select_interview)) {  ?>
															<div class="form-group col-sm-6">
                                                                <label for="city">Interview</label>
                                                                <input type="text" class="form-control" readonly name="interview" id="interview" value="<?php echo @$select_interview[0]['interview_name']; ?>">
                                                            </div>
															  <?php } ?>
															
                                                            <div class="form-group col-sm-6">
                                                                <label for="city">Job Position</label>
                                                                <input type="text" class="form-control" readonly name="company" id="company" value="<?php echo $appli[$qi]['application_job_position']; ?>">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="city">Job Category</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $appli[$qi]['application_job_category']; ?>">
                                                            </div>
                                                        </div>
														<?php if(!empty($appli[$qi]['application_skills'])){ ?>
                                                        <div class="row">
                                                            <div class="form-group col-sm-10">
                                                                <label for="city">Skills</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $appli[$qi]['application_skills']; ?>">
                                                            </div>
															</div>
														<?php } ?>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                
                                                <div class='form-group col-md-12 legend'>
                                                    <h4><strong>Experience</strong> info</h4>
                                                </div>
                                                <?php
                                                $experience = $db->selectQuery("SELECT * FROM `sm_candidate_experience` WHERE `candidate_id`='$can_id'");
                                                if (count($experience)) {
                                                    for ($qi = 0; $qi < count($experience); $qi++) {
														if(!empty($experience[$qi]['experience_company']) && !empty($experience[$qi]['experience_designation'])){
                                                        ?>
                                                        <div class="row">
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Company</label>
                                                                <input type="text" class="form-control" readonly name="company" id="company" value="<?php echo $experience[$qi]['experience_company']; ?>">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Designation</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $experience[$qi]['experience_designation']; ?>">
                                                            </div>
                                                        </div>
														<div class="row">
                                                                <?php
                                                                $datetime1 = new DateTime($experience[$qi]['experience_from']);
																$datetime2 = new DateTime($experience[$qi]['experience_to']);
																?>
																<div class="form-group col-sm-4">
                                                                <label for="city">From</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $datetime1->format("d/m/Y"); ?>">
																</div>
																
																<div class="form-group col-sm-4">
                                                                <label for="city">To</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $datetime2->format("d/m/Y"); ?>">
																</div>
                                                       </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-10">
                                                                <label for="city"></label>
                                                                <?php
                                                                $datetime1 = new DateTime($experience[$qi]['experience_from']);
                                                                $datetime2 = new DateTime($experience[$qi]['experience_to']);
                                                                $interval = $datetime1->diff($datetime2);
                                                                $exper = $interval->format('%y years %m months and %d days')
                                                                ?>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $exper; ?>">
                                                            </div>
														</div>
                                                            <?php
															}
														}
                                                    }
                                                    ?>
                                                
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
                                                                <input type="text" class="form-control" readonly name="company" id="company" value="<?php echo $docum[$doc]['documents_data']; ?>">
                                                            </div>
													<?php  if($docum[$doc]['documents_title']!='ID Card') { ?>		
                                                            <div class="form-group col-sm-4">
                                                                <label for="city">Commencing Date</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $docum[$doc]['documents_start_date']; ?>">
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="city">End Date</label>
                                                                <input type="text" class="form-control"  name="desig" readonly value="<?php echo $docum[$doc]['documents_end_date']; ?>">
                                                            </div>
													<?php } ?>

                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                        </div>

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
<script type="text/javascript" src="assets/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

<script type="text/javascript" src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/jRespond/jRespond.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/screenfull/screenfull.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript" src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
<!--/ vendor javascripts -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script type="text/javascript" src="assets/js/main.js"></script>
<!--/ custom javascripts -->






<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->

<!--/ Page Specific Scripts -->
<?php /* 
<script>
function printxxxx()
{
	alert("sdsfdsf");
	window.open('printemp_profile.php?uid=' +<?php echo $id; ?>, '_blank');
} 
</script> */ 
?>

<script type = "text/javascript">
function print()
{
	window.open('print_candidate_profile.php?uid='+<?php echo $can_id;?>,'_blank');
}

</script>


</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>