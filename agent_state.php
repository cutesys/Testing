<?php
include("connection.php");
if(isset($_REQUEST['country_name'])){
    $country_name=$_REQUEST['country_name'];
    $res_state=$db->selectQuery("SELECT * FROM `sm_recruit_state` WHERE `country_name`='$country_name' and state_status='1'");
    if(count($res_state)){
        ?>
        <option  value="">Select</option>
        <?php
        for($mod=0;$mod<count($res_state);$mod++){
            ?>
            <option value="<?php echo $res_state[$mod]['state_name'] ?>"><?php echo $res_state[$mod]['state_name']; ?></option>
            <?php
        }
    }
	else
	{
    ?>
		<option  value="">No State</option>
	<?php }
}
?>