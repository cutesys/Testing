<?php
include("connection.php");
if (isset($_POST['selected_visa_type'])) {
   echo $visa_type = $_POST['selected_visa_type']; 
    $select_visa_type = $db->selectQuery("SELECT `visa_category`,`visa_category_id` FROM  `sm_visa_category` WHERE `visa_category_type`='$visa_type'");
    if (count($select_visa_type)) {
        ?>
        <option value="" selected="">Select</option>
        <?php
        for ($sj = 0; $sj < count($select_visa_type); $sj++) {
            ?>

            <option value="<?php echo $select_visa_type[$sj]['visa_category_id'] ?>"><?php echo $select_visa_type[$sj]['visa_category'] ?></option>
            <?php
        }
    }
}