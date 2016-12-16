<?php
include("connection.php");
if (isset($_POST['job_position'])) {
    $job_position = $_POST['job_position'];
	$req_val = $_POST['req_val'];
    $select_category = $db->selectQuery("SELECT `job_category_name` FROM `sm_job_category` WHERE `job_position`='$job_position'");
    ?>
	<div class="form-group col-md-6"><label for="interview_category">Category: </label>
	<select class="form-control interview_category_more" name="requirement[<?php echo $req_val; ?>][interview_job_position]" id="interview_category">
	<?php if (count($select_category) > 0) { ?>
        <option selected="" value="">Select</option>
        <?php
        for ($cai = 0; $cai < count($select_category); $cai++) {
            ?>
            <option value="<?php echo $select_category[$cai]['job_category_name']; ?>"><?php echo $select_category[$cai]['job_category_name']; ?></option>
            <?php
        }
    } else {
        ?>
        <option selected="" value="">Select</option>
        <?php
    } ?>
	</select>
	<?php }
if (isset($_POST['job_cat']) && isset($_POST['job_psn'])) {
    $interview_cat = $interview_job = "";
    $interview_cat = $_POST['job_cat'];
    $interview_job = $_POST['job_psn'];
    $select_skill = $db->selectQuery("SELECT `skill_name` FROM `sm_job_skill` WHERE `skill_category`='$interview_cat' AND `skill_job`='$interview_job'");
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
}?>
