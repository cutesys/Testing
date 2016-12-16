<?php
$compEm = $db->selectQuery("SELECT company_id, company_name, count( employee_id ) AS numb_of_emps
FROM sm_company comp
INNER JOIN sm_employee emp ON company_id = employee_company WHERE employee_status=1
GROUP BY company_id ORDER BY count( employee_id ) DESC
LIMIT 5");
//print_r($compEm);
for ($fg = 0; $fg < count($compEm); $fg++) {
    ?>
    <div class="progress-list">
        <div class="details">
            <div class="title"><?php echo htmlspecialchars_decode($compEm[$fg]['company_name']); ?></div>
            <div class="description">Number of employees</div>
        </div>
        <div class="status pull-right">
            <span><?php echo $compEm[$fg]['numb_of_emps']; ?></span>
        </div>
        <div class="clearfix"></div>
        <div class="progress-xs not-rounded progress">
            <div class="progress-bar progress-bar-dutch" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40%</span>
            </div>
        </div>
    </div>
    <?php
}
?>