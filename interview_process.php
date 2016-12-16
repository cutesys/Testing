<?php
include("connection.php");
if (isset($_POST['interview_country'])) {
    $interview_country = $_POST['interview_country'];
    $select_state = $db->selectQuery("SELECT `state_name` FROM `sm_recruit_state` WHERE `country_name`='$interview_country'");
    if (count($select_state) > 0) {
        ?>
        <option selected="" value="">Select</option>
        <?php
        for ($si = 0; $si < count($select_state); $si++) {
            ?>
            <option value="<?php echo $select_state[$si]['state_name']; ?>"><?php echo $select_state[$si]['state_name']; ?></option>
            <?php
        }
    } else {
        ?>
        <option selected="" value="">Select</option>
        <?php
    }
}
if (isset($_POST['interview_job_position'])) {
    $interview_job_position = $_POST['interview_job_position'];
    $select_category = $db->selectQuery("SELECT `job_category_name` FROM `sm_job_category` WHERE `job_position`='$interview_job_position'");
    if (count($select_category) > 0) {
        ?>
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
    }
}
if (isset($_POST['interview_cat']) && isset($_POST['interview_job'])) {
    $interview_cat = $_POST['interview_cat'];
    $interview_job = $_POST['interview_job'];
    $select_skill = $db->selectQuery("SELECT `skill_name` FROM `sm_job_skill` WHERE `skill_category`='$interview_cat' AND `skill_job`='$interview_job'");
    if (count($select_skill) > 0) {
        for ($ski = 0; $ski < count($select_skill); $ski++) {
            ?>
            <label class="checkbox checkbox-custom-alt">
                <input type="checkbox" name="requirements_skills[<?php echo $ski ?>]" value="<?php echo $select_skill[$ski]['skill_name']; ?>" checked="checked"><i></i> <?php echo $select_skill[$ski]['skill_name']; ?>
            </label>
            <?php
        }
    } else {
        ?>

        <?php
    }
}
// For Interview Add
if (isset($_POST['interview_cat_add']) && isset($_POST['interview_job_add'])) {
    $interview_cat = $_POST['interview_cat_add'];
    $interview_job = $_POST['interview_job_add'];
	$req_value = $_POST['req_value'];
    $select_skill = $db->selectQuery("SELECT `skill_name` FROM `sm_job_skill` WHERE `skill_category`='$interview_cat' AND `skill_job`='$interview_job'");
    if (count($select_skill) > 0) {
        for ($ski = 0; $ski < count($select_skill); $ski++) {
            ?>
            <label class="checkbox checkbox-custom-alt">
                <input type="checkbox" name="requirement[<?php echo $req_value; ?>][requirements_skills][]" value="<?php echo $select_skill[$ski]['skill_name']; ?>" checked="checked"><i></i> <?php echo $select_skill[$ski]['skill_name']; ?>
            </label>
            <?php
        }
    } else {
        ?>

        <?php
    }
}

if (isset($_POST['qualification_add']) && isset($_POST['qual_val'])) {
    $qual_val = $_POST['qual_val'];
    ?>
    <div class="row">
		<div class="form-group col-md-6">
                                    <label for="interview_qualification">Qualification: </label>
                                    <select class="form-control" name="qualification[<?php echo $qual_val; ?>][qualifications_name]">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                        if (count($selectQual)) {
                                            for ($qi = 0; $qi < count($selectQual); $qi++) {
                                                ?>
                                                <option
                                                    value="<?php echo $selectQual[$qi]['qualification_name']; ?>"><?php echo $selectQual[$qi]['qualification_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
        <div class="form-group col-md-6">
            <label for="interview_qualification_status">Status: </label>
            <select class="form-control" name="qualification[<?php echo $qual_val; ?>][qualifications_status]"
                    id="interview_qualification_status">
                <option selected="" value=""> Select</option>
                <option value="Passed"> Passed</option>
                <option value="Failed"> Failed</option>
            </select>
        </div>
    </div>
    <?php
}
?>