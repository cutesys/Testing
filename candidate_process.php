<?php
include("connection.php");
if (isset($_POST['job_position'])) {
    $job_position = $_POST['job_position'];
    $select_category = $db->selectQuery("SELECT `job_category_name` FROM `sm_job_category` WHERE `job_position`='$job_position'");
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
}
if (isset($_POST['agent_code'])) {
    $agent_code = $_POST['agent_code'];
    if ($agent_code == "other") {
        $can_code = "hr";
    } else {

        $can_code = $agent_code;
    }
    $select_candidate_id = $db->selectQuery("SELECT `candidate_id` FROM `sm_candidate` ORDER BY `candidate_id` DESC LIMIT 1");
    $cand_id = "";
    if (count($select_candidate_id)) {
        $cand_id_selected = $select_candidate_id[0]['candidate_id'] + 1;
        $cand_id = str_pad($cand_id_selected, 4, '0', STR_PAD_LEFT);
    } else {
        $cand_id = "0001";
    }
    echo $code_gen = $can_code . "_C" . $cand_id;
}
