<?php
include("connection.php");
if(isset($_REQUEST['manufacturer'])){
    $manufacturer=$_REQUEST['manufacturer'];
    $res_manufacturer=$db->selectQuery("SELECT * FROM `sm_vehicle_model` WHERE `manufacturer_id`='$manufacturer' and model_status='1'");
    if(count($res_manufacturer)){
        ?>
        <option  value="">Select</option>
        <?php
        for($mod=0;$mod<count($res_manufacturer);$mod++){
            ?>
            <option value="<?php echo $res_manufacturer[$mod]['model_id'] ?>"><?php echo $res_manufacturer[$mod]['model_name']; ?></option>
            <?php
        }
    }
}
if(isset($_REQUEST['comp_name'])){
    $comp_id=$_REQUEST['comp_name'];
    $res_employee=$db->selectQuery("SELECT CONCAT(employee_firstname,employee_middlename,employee_lastname) AS employee_name,employee_id FROM sm_employee WHERE employee_company='$comp_id'");
    if(count($res_employee)){
        ?>
        <option  value="">Select</option>
        <?php
        for($emp=0;$emp<count($res_employee);$emp++){
            ?>
            <option value="<?php echo $res_employee[$emp]['employee_id']; ?>"><?php echo $res_employee[$emp]['employee_name']; ?></option>
            <?php
        }
    }
    else{
        ?>
        <option  value="">No employee</option>
        <?php
    }
}