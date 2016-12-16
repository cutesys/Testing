<?php
include("connection.php");
if(isset($_REQUEST['category'])){
    $category=$_REQUEST['category'];
    $res_category=$db->selectQuery("SELECT * FROM `sm_job_category` WHERE `job_position`='$category'");
    if(count($res_category)){
        ?>
        <option  value="">Select</option>
        <?php
        for($mod=0;$mod<count($res_category);$mod++){
            ?>
            <option value="<?php echo $res_category[$mod]['job_category_name'] ?>"><?php echo $res_category[$mod]['job_category_name']; ?></option>
            <?php
        }
    }
}
