<?php
include("connection.php");
if (isset($_POST['requirement_add']) && isset($_POST['req_val'])) {
    $req_val = $_POST['req_val'];
    ?>
    <h4 class="custom-font"><strong>Requirement <?php echo $req_val; ?></strong></h4>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="interview_job_position">Job Position: </label>
            <select class="form-control interview_job_position_more" name="requirement[<?php echo $req_val; ?>][interview_job_position]"
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
		<div class="interview_category_more_add">

            </div>
           <?php /* <label for="interview_category">Category: </label>
             <select class="form-control interview_category_more" name="requirement[<?php echo $req_val; ?>][interview_category]"
                    id="interview_category_more">
                <!--<option selected="" value=""> Select</option>-->
            </select> */ ?>
        </div>
        <div class="form-group col-md-12">
            <div class="skill_set">

            </div>
        </div> 
		
   </div> 
    <?php
} ?>