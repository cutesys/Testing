<?php
include("connection.php");
if (isset($_POST['requirement_add']) && isset($_POST['req_val'])) {
    $req_val = $_POST['req_val'];
    ?>
    <h4 class="custom-font"><strong>Requirement <?php echo $req_val; ?></strong></h4>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="interview_job_position">Job Position: </label>
            <select class="form-control interview_job_position1" name="requirement[<?php echo $req_val; ?>][interview_job_position]"
                    id="interview_job_position">
                <option selected="" value=""> Select</option>
                <?php
                $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");
                if (count($select_job) > 0) {
                    for ($ji = 0; $ji < count($select_job); $ji++) {
                        ?>
                        <option
                            value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>
                            <?php
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="interview_category">Category: </label>
            <select class="form-control interview_category1" name="requirement[<?php echo $req_val; ?>][interview_category]"
                    id="interview_category">
                <option selected="" value=""> Select</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <div class="skill_set">

            </div>
        </div>
    </div>
    <?php
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
