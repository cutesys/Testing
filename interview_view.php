<?php
$page = "recruitment";
$tab = "interview";
$sub = "interview_list";
$head = "";
$head1 = "";
$sub1 = "";
$tab1 = "";
include("file_parts/header.php");
if (isset($_REQUEST['inter_id'])) {
    $inter_id = $_REQUEST['inter_id'];
}
$select_interview = $db->selectQuery("SELECT * FROM `sm_interview` WHERE `interview_id`='$inter_id'");
if (count($select_interview)) {
    $interview_auto_id = $select_interview[0]['interview_auto_id'];
    $interview_name = $select_interview[0]['interview_name'];
    $company_id = $select_interview[0]['company_id'];
    $interview_interviewer = $select_interview[0]['interview_interviewer'];
    $interview_date_from1 = explode("-", $select_interview[0]['interview_date_from']);
    $interview_date_from = $interview_date_from1[2] . "/" . $interview_date_from1[1] . "/" . $interview_date_from1[0];
    $interview_date_to1 = explode("-", $select_interview[0]['interview_date_to']);
    $interview_date_to = $interview_date_to1[2] . "/" . $interview_date_to1[1] . "/" . $interview_date_to1[0];
    $interview_country = $select_interview[0]['interview_country'];
    $interview_time_from = $select_interview[0]['interview_time_from'];
    $interview_time_to = $select_interview[0]['interview_time_to'];
    $interview_state = $select_interview[0]['interview_state'];
    $interview_place = $select_interview[0]['interview_place'];
}
?>
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

            <h2>Interview</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    <li><a href="#">Recruitment</a></li>
                    <li><a href="#">Schedule Interview</a></li>
                    <li>
                        <a href="#">Interviews</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a style="color:#16a085;" href="#">Interview</a></li>
                                    <li role="presentation"><a href="interview_edit.php?inter_id=<?php echo $inter_id; ?>">Edit Interview</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="tile-body">
                                            <form class="form-horizontal" name="" method="post"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Interview</strong> Details</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-sm-4">
                                                        <label for="first-name">Interview ID</label>
                                                        <input type="text" class="form-control" readonly="" name="interview_place" id="f_name"  value="<?php echo $interview_auto_id; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="last-name">Interview Name</label>
                                                        <input type="text" class="form-control" readonly="" name="candidate_middlename" id="m_name" value="<?php echo $interview_name; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="last-name">Company</label>
                                                        <?php
                                                        $select_comp = $db->selectQuery("SELECT * FROM `sm_company` WHERE `company_id`='$company_id'");
                                                        if (count($select_comp)) {
                                                            ?>
                                                            <input type="text" class="form-control" readonly="" name="candidate_lastname" id="l_name"  value="<?php echo $select_comp[0]['company_name']; ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Interviewer</label>
                                                        <input type="text" name="" readonly=""  class="form-control" id="eid" value="<?php echo $interview_interviewer; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Date From</label>
                                                        <input type="text" name="" readonly=""  class="form-control" id="eid" value="<?php echo $interview_date_from; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Date To</label>
                                                        <input type="text" name="" readonly="" class="form-control" id="eid" value="<?php echo $interview_date_to; ?>">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Time From</label>
                                                        <input type="text" name="" readonly=""  class="form-control" id="eid" value="<?php echo $interview_time_from; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Time To</label>
                                                        <input type="text" name="" readonly="" class="form-control" id="eid" value="<?php echo $interview_time_to; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Country</label>
                                                        <input type="text" name="" readonly="" class="form-control" id="eid" value="<?php echo $interview_country; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">State</label>
                                                        <input type="text" name="" readonly=""  class="form-control" id="eid" value="<?php echo $interview_state; ?>">
                                                    </div>
                                                    <div class=" col-sm-4">
                                                        <label for="Nationality">Place</label>
                                                        <input type="text" name="" readonly="" class="form-control" id="eid" value="<?php echo $interview_place; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Hiring</strong> Requirements</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $requir = $db->selectQuery("SELECT * FROM `sm_interview_requirements` WHERE `interview_id`='$inter_id'");
                                                if (count($requir)) {
                                                    for ($qi = 0; $qi < count($requir); $qi++) {
                                                        ?>
                                                        <h4 class="custom-font"><strong>Requirement <?php echo $nq = $qi + 1; ?></strong></h4>
                                                        <div class="row">
                                                            <div class=" col-sm-6">
                                                                <label>Job Position</label>
                                                                <input type="text" class="form-control"  readonly="" value="<?php echo $requir[$qi]['requirements_job']; ?>">
                                                            </div>
															
															<?php if(!empty($requir[$qi]['requirements_category'])){ ?>
                                                            <div class=" col-sm-6">
                                                                <label>Category</label>
                                                                <input type="text" class="form-control"  readonly=""  value="<?php echo $requir[$qi]['requirements_category']; ?>">
                                                            </div>
															<?php } ?>

                                                        </div>
														
														<?php if(!empty($requir[$qi]['requirements_skils'])){ ?>
                                                        <div class="row">
                                                            <div class=" col-sm-12">
                                                                <label>Skills</label>
                                                                <input type="text" class="form-control"  readonly="" value="<?php echo $requir[$qi]['requirements_skils']; ?>">
                                                            </div>
                                                        </div>
														<?php } ?>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div class="row">&nbsp;</div>


                                                <div class="row">
                                                    <div class=" form-group col-md-12 legend">
                                                        <h4><strong>Qualification</strong> Details</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $qualif = $db->selectQuery("SELECT * FROM `sm_interview_qualifications` WHERE `interview_id`='$inter_id'");
                                                if (count($qualif)) {
                                                    for ($qi = 0; $qi < count($qualif); $qi++) {
                                                        ?>
                                                        <div class="row">
                                                            <div class=" col-sm-6">
                                                                <label for="city">Qualification</label>
                                                                <input type="text" class="form-control"  readonly="" value="<?php echo $qualif[$qi]['qualifications_name']; ?>">
                                                            </div>
                                                            <div class=" col-sm-6">
                                                                <label for="city">Status</label>
                                                                <input type="text" class="form-control" readonly=""  value="<?php echo $qualif[$qi]['qualifications_status']; ?>">
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>


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

</div>


<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
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
<script src="assets/js/vendor/parsley/parsley.min.js"></script>
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
    $('#selected_interview').change(function () {
        var selected_interview = $(this).val();
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {selected_interview: selected_interview},
            success: function (data) {
                $('#select_job').html(data);
            }
        });
    });
    $('#select_job').change(function () {
        var select_job = $(this).val();
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {select_job: select_job},
            success: function (data) {
                $('#select_candidate').html(data);
            }
        });
    });
    $('#select_candidate').change(function () {
        var select_candidate = $(this).val();
        location.href = "interview_form.php?can_id=" + select_candidate;

    });
    $('#job_position').change(function () {
        var this_val = $(this).val();
        if (this_val == "Fabricator") {
            $('#fabricator').show();
            $('#welder').hide();
        } else if (this_val == "Welder") {
            $('#welder').show();
            $('#fabricator').hide();
        }
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {intr_job: this_val},
            success: function (data) {
                $('#interview_category').html();
            }
        });
    });

    $('#interview_category').change(function () {
        var job_cat = $(this).val();
        var job_psn = $('#interview_job_position').val();
        $.ajax({
            url: "interview_form_process.php",
            type: "POST",
            data: {job_cat: job_cat, job_psn: job_psn},
            success: function (data) {
                $('.skill_set').html(data);
            }
        });
    });
</script>
</body>
</html>

