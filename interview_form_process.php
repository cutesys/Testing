<?php
include("connection.php");
if (isset($_POST['selected_interview'])) {
    $selected_interview = $_POST['selected_interview'];
    $select_jobs = $db->selectQuery("SELECT DISTINCT `requirements_job` FROM  `sm_interview_requirements` WHERE `interview_id`='$selected_interview'");
    if (count($select_jobs)) {
        ?>
        <option value="" selected="">Select</option>
        <?php
        for ($sj = 0; $sj < count($select_jobs); $sj++) {
            ?>

            <option value="<?php echo $select_jobs[$sj]['requirements_job'] ?>"><?php echo $select_jobs[$sj]['requirements_job'] ?></option>
            <?php
        }
    }
}
if (isset($_POST['select_job'])) {
	$select_intrw = $_POST['select_intrw'];
    $select_job = $_POST['select_job'];
    $select_candidates = $db->selectQuery("SELECT CONCAT(sm_candidate.candidate_firstname,' ',sm_candidate.candidate_middlename,' ',sm_candidate.candidate_lastname) as candidate_name,sm_candidate.candidate_id,sm_candidate_application.application_job_position FROM `sm_candidate` INNER JOIN sm_candidate_application ON sm_candidate.candidate_id=sm_candidate_application.candidate_id WHERE application_job_position='$select_job' AND 	interview_id='$select_intrw' AND candidate_interview_status!='Rejected' AND candidate_interview_status!='Selected'");
     ?>
    <option value="" selected="">Select</option>
	<?php if (count($select_candidates)) {
        ?>
        <?php
        for ($scan = 0; $scan < count($select_candidates); $scan++) {
            ?>
            <option value="<?php echo $select_candidates[$scan]['candidate_id'] ?>"><?php echo $select_candidates[$scan]['candidate_name'] ?></option>
            <?php
        } 
    } else { ?>
			<option value="">No Candidate Found</option>
            
	<?php 	}
}
if (isset($_POST['intr_job'])) {
    $intr_job = $_POST['intr_job'];
    $select_cat = $db->selectQuery("SELECT `job_category_name` FROM `sm_job_category` WHERE `job_position`='$intr_job'");
    if (count($select_cat)) {
        for ($jo = 0; $jo < count($select_cat); $jo++) {
            ?>
            <option value="<?php echo $select_cat[$jo]['job_category_name']; ?>"><?php echo $select_cat[$jo]['job_category_name']; ?></option>
            <?php
        }
    }
}
if (isset($_POST['job_cat']) && isset($_POST['job_psn'])) {
    $job_cat = $_POST['job_cat'];
    $job_psn = $_POST['job_psn'];
    $select_skill = $db->selectQuery("SELECT `skill_name` FROM `sm_job_skill` WHERE `skill_category`='$job_cat' AND `skill_job`='$job_psn'");
    if (count($select_skill) > 0) {
        for ($ski = 0; $ski < count($select_skill); $ski++) {
            ?>
            <label class="checkbox checkbox-custom-alt">
                <input type="checkbox" name="skill[<?php echo $ski ?>]" value="<?php echo $select_skill[$ski]['skill_name']; ?>" checked="checked"><i></i> <?php echo $select_skill[$ski]['skill_name']; ?>
            </label>
            <?php
        }
    } else {
        ?>
        <?php
    }
}