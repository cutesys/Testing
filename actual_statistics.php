<div class="col-md-8 col-sm-12">
    <h4 class="underline custom-font mb-20"><strong>Actual</strong> Statistics</h4>
    <div class="row">
        <?php
        $today_date = date('Y-m-d');
        $calc_divide = 0;
        $percent = 0;
        $this_month_count = 0;
        $feeALL = 0;
        $fee = 0;
        $spaFee = 0;
        $diff = 0;
        $divd = 0;
        $spFeeAll = $db->selectQuery("SELECT * FROM `sm_sponsor_fee_employee` WHERE MONTH(sponsor_fee_date)='$thisMonth' AND YEAR(sponsor_fee_date)='$thisYear'");
        if (count($spFeeAll)) {
            $fee = 0;
            for ($spa = 0; $spa < count($spFeeAll); $spa++) {
                $spaFee = $spFeeAll[$spa]['sponsor_fee_amount'];
                $feeALL = $feeALL + $spaFee;
            }
        }
        $fee1 = 0;
        $spFee = $db->selectQuery("SELECT * FROM `sm_sponsor_fee_employee` WHERE MONTH(sponsor_fee_date)='$thisMonth' AND YEAR(sponsor_fee_date)='$thisYear' AND `sponsor_fee_status`='Paid'");
        if (count($spFee)) {
            for ($spa = 0; $spa < count($spFee); $spa++) {
                $spaFee = $spFee[$spa]['sponsor_fee_amount'];
                $fee1 = $fee1 + $spaFee;
            }
        }
        if ($feeALL != 0) {
            $divd = $fee1 / $feeALL;
            $percent = $divd * 100;
        }
        ?>
        <div class="col-lg-4 text-center">
            <div class="easypiechart"
                 data-percent="<?php echo ceil($percent); ?>"
                 data-size="140"
                 data-bar-color="#418bca"
                 data-scale-color="false"
                 data-line-cap="round"
                 data-line-width="4"
                 style="width: 140px; height: 140px;">
                <i><img src="assets/images/qar.png" style="width:67px; padding-top:38px;"></i>
            </div>
            <p class="text-uppercase text-elg mt-20 mb-0">
                <strong class="text-blue"><?php echo $fee1; ?></strong></p>
            <p><small class="text-lg text-light text-default lt">Sponsorship Fee</small></p>
            <p class="text-light"><i class="fa fa-caret-up text-success"></i> <?php echo ceil($percent); ?>% this month</p>
        </div>
        <?php
        $calc_cr = 0;
        $this_month_cr = 0;
        $renewNum = 0;
        $all_count = 0;
        $evRenew = $db->selectQuery("SELECT sm_employee_documents.document_id FROM sm_employee "
                . "INNER JOIN sm_employee_documents ON sm_employee.employee_id=sm_employee_documents.employee_id "
                . "WHERE employee_status=1 AND sm_employee_documents.status=1 "
                . "AND document_title='Visa' AND MONTH(document_end_date)='$thisMonth' "
                . "AND YEAR(document_end_date)='$thisYear' AND document_end_date <='$today_date'");
        if (count($evRenew)) {

            $renewNum = count($evRenew);
        }
        if (count($evRenew)) {
            $renewNum = count($evRenew);
        }
        $all_visa = $db->selectQuery("SELECT sm_employee_documents.document_id FROM sm_employee "
                . "INNER JOIN sm_employee_documents ON sm_employee.employee_id=sm_employee_documents.employee_id "
                . "WHERE employee_status=1 AND sm_employee_documents.status=1 "
                . "AND document_title='Visa' AND MONTH(document_end_date)='$thisMonth' "
                . "AND YEAR(document_end_date)='$thisYear'");
        if (count($all_visa)) {
            $all_count = count($all_visa);
        }
        if ($renewNum != 0 && $all_count != 0) {
            $calc_divide = ($renewNum / $all_count) * 100;
            $this_month_count = ceil($calc_divide);
        }
        ?>
        <div class="col-lg-4 text-center">
            <div class="easypiechart"
                 data-percent="<?php echo $this_month_count; ?>"
                 data-size="140"
                 data-bar-color="#e05d6f"
                 data-scale-color="false"
                 data-line-cap="round"
                 data-line-width="4"
                 style="width: 140px; height: 140px;">
                <i class="fa fa-users fa-4x text-lightred" style="line-height: 140px;"></i>
                <p class="text-uppercase text-elg mt-20 mb-0"><strong class="text-lightred"><?php echo $renewNum; ?></strong></p>
                <p><small class="text-lg text-light text-default lt">Visa Renewal</small></p>
                <p class="text-light"><i class="fa fa-caret-down text-warning"></i> <?php echo $this_month_count; ?>% this month</p>
            </div>
        </div>
        <?php
        $compCRnum = 0;
        $compCount = 0;
        $cmpCR = $db->selectQuery("SELECT sm_company_docs.doc_id FROM sm_company "
                . "INNER JOIN sm_company_docs ON sm_company.company_id=sm_company_docs.company_id "
                . "WHERE company_status=1 AND sm_company_docs.doc_status=1 "
                . "AND doc_title='Commercial Registration' AND MONTH(doc_end_date)='$thisMonth' "
                . "AND YEAR(doc_end_date)='$thisYear' AND doc_end_date <='$today_date'");
        if (count($cmpCR)) {
            $compCRnum = count($cmpCR);
        }
        $all_comp = $db->selectQuery("SELECT sm_company_docs.doc_id FROM sm_company "
                . "INNER JOIN sm_company_docs ON sm_company.company_id=sm_company_docs.company_id "
                . "WHERE company_status=1 AND sm_company_docs.doc_status=1 "
                . "AND doc_title='Commercial Registration' AND MONTH(doc_end_date)='$thisMonth' "
                . "AND YEAR(doc_end_date)='$thisYear'");
        if (count($all_comp)) {
            $comp_cr = count($all_comp);
        }
        if ($compCRnum != 0 && $comp_cr != 0) {
            $calc_cr = ($compCRnum / $comp_cr ) * 100;
            $this_month_cr = ceil($calc_cr);
        }
        ?>
        <div class="col-lg-4 text-center">
            <div class="easypiechart"
                 data-percent="<?php echo $this_month_cr; ?>"
                 data-size="140"
                 data-bar-color="#16a085"
                 data-scale-color="false"
                 data-line-cap="round"
                 data-line-width="4"
                 style="width: 140px; height: 140px;">
                <i class="fa fa-building fa-4x text-greensea" style="line-height: 140px;"></i>
                <p class="text-uppercase text-elg mt-20 mb-0"><strong class="text-greensea"><?php echo $compCRnum; ?></strong> </p>
                <p> <small class="text-lg text-light text-default lt">CR Renewal</small></p>
                <p class="text-light"><i class="fa fa-caret-down text-danger"></i> <?php echo $this_month_cr; ?>% this month</p>
            </div>
        </div>
    </div>
</div>