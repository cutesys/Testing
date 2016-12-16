<?php
$sql = $db->selectQuery("SELECT company_id,company_pid,company_name,company_sponsor_fee FROM sm_company WHERE company_status=1");
$m = date('m');
$y = date("Y");
$d = date("d");
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$values = array();
for ($i = 0; $i < count($sql); $i++) {
    $chk = $sql[$i]['company_pid'];
    $values['com_pid'] = $sql[$i]['company_id'];
    $values['com_name'] = $sql[$i]['company_name'];
    $values['sponser_fee'] = $sql[$i]['company_sponsor_fee'];
    $values['year'] = $y;
    $values['month'] = $m;
    $values['date'] = $d;
    $values['sponsor_id'] = $_SESSION['id'];
    $chks = $values['com_pid'];
    $values['month_name'] = $monthName;
    $values['status'] = 'unpaid';
    $selt = $db->selectQuery("select com_pid,year,month from sm_sponser where com_pid='$chks' and year=$y and month=$m");
    if ($selt) {
        echo "";
    } else {
        $insert = $db->secure_insert("sm_sponser", $values);
    }
}
?>
