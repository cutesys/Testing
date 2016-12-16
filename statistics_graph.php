<?php
//sponsor fee statistics graph
$curYear = date("Y");
$emp_sql = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND YEAR(employee_joining_date)='$curYear' AND `employee_status`='1'");
$jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;
if (count($emp_sql) > 0) {
    for ($zk = 0; $zk < count($emp_sql); $zk++) {
        $emp_date = new DateTime($emp_sql[$zk]['employee_joining_date']);
        $empdate = $emp_date->format("m");
        $day_num = "";
        $day = $emp_date->format("m");
        $output = substr($day, 0, 1);
        if ($output == 0) {
            $day_num = substr($day, 1);
        } else {
            $day_num = $day;
        }
        if ($day_num == 1) {
            $jan = $jan + 1;
        } elseif ($day_num == 2) {
            $feb = $feb + 1;
        } elseif ($day_num == 3) {
            $mar = $mar + 1;
        } elseif ($day_num == 4) {
            $apr = $apr + 1;
        } elseif ($day_num == 5) {
            $may = $may + 1;
        } elseif ($day_num == 6) {
            $jun = $jun + 1;
        } elseif ($day_num == 7) {
            $jul = $jul + 1;
        } elseif ($day_num == 8) {
            $aug = $aug + 1;
        } elseif ($day_num == 9) {
            $sep = $sep + 1;
        } elseif ($day_num == 10) {
            $oct = $oct + 1;
        } elseif ($day_num == 11) {
            $nov = $nov + 1;
        } elseif ($day_num == 12) {
            $dec = $dec + 1;
        }
    }
}
?>