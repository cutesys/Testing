<?php
$page = "dashboard";
$sub = "";
include("./file_parts/header.php");
$thisMonth = date("m");
$thisYear = date("Y");
?>
<section id="content">
    <div class="page page-dashboard">
        <div class="pageheader">
            <h2>Dashboard <span>Sponsor Master Essentials</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>SME</a>
                    </li>
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                </ul>
                <!---<div class="page-toolbar">
                    <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i
                            class="fa fa-angle-down"></i>
                    </a>
                </div>--->
            </div>
        </div>
        <!-- cards row -->
        <div class="row">
            <!-- col -->
            <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-greensea">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-building fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <?php
                                $countC = $db->selectQuery("SELECT COUNT(`company_id`) FROM `sm_company` WHERE sponsor_id='" . $_SESSION['id'] . "' AND company_status = '1'");
                                ?>
                                <p class="text-elg text-strong mb-0"><?php
                                    if (count($countC) > 0) {
                                        echo $countC[0]['COUNT(`company_id`)'];
                                    }
                                    ?>
                                </p>
                                <span>Companies</span>
                            </div>
                        </div>
                    </div>
                    <div class="back bg-greensea">
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="companylist.php"><i class="fa fa-building fa-2x"></i> Company</a>
                            </div>
                            <div class="col-xs-4">
                                <a class="" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i
                                        class="fa fa-users fa-2x"></i>Employee</a>
                                <!--<a  data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-chain-broken fa-2x"></i> Employee</a>-->
                            </div>
                            <div class="col-xs-4">
                                <a href="notification_company.php"><i class="glyphicon glyphicon-bell fa-2x"></i> Alerts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-lightred">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <div class="col-xs-8">
                                <?php
                                $countE = $db->selectQuery("SELECT COUNT(`employee_id`) FROM `sm_employee` WHERE sponsor_id='" . $_SESSION['id'] . "' AND employee_status = '1'");
                                ?>
                                <p class="text-elg text-strong mb-0"><?php
                                    if (count($countE) > 0) {
                                        echo $countE[0]['COUNT(`employee_id`)'];
                                    }
                                    ?>
                                </p>
                                <span>Employees</span>
                            </div>
                        </div>
                    </div>
                    <div class="back bg-lightred">                        <!-- row -->
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="employee_list.php"><i class="fa fa-users fa-2x"></i> Employee</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"><i
                                        class="fa fa-bars fa-2x"></i> List</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="notification_employee.php"><i class="glyphicon glyphicon-bell fa-2x"></i>
                                    Alerts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-blue">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-car fa-4x"></i>
                            </div>
                            <div class="col-xs-8">
                                <?php
                                $countP = $db->selectQuery("SELECT COUNT(`vehicle_auto_id`) FROM `sm_vehicle` WHERE `vehicle_status`='1' AND sponsor_id='" . $_SESSION['id'] . "'");
                                ?>
                                <p class="text-elg text-strong mb-0"><?php
                                    if (count($countP) > 0) {
                                        echo $countP[0]['COUNT(`vehicle_auto_id`)'];
                                    }
                                    ?>
                                </p>
                                <span>Vehicles</span>
                            </div>
                        </div>
                    </div>
                    <div class="back bg-blue">
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="vehicle_list.php"><i class="fa fa-user fa-2x"></i> Vehicles</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="" data-toggle="modal" data-target="#splash2" data-options="splash-ef-3"><i
                                        class="fa fa-bars fa-2x"></i> List</a>
                            </div>
                            <div class="col-xs-4">

                                <a href="notification_vehicle.php"><i class="glyphicon glyphicon-bell fa-2x"></i> Alerts</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-slategray">
                        <div class="row">
                            <div class="col-xs-4">
                                <i><img src="assets/images/qar.png" style="width:54px;"></i>
                            </div>
                            <div class="col-xs-8">
                                <?php
                                $spF = 0;
                                $countSF = $db->selectQuery("SELECT * FROM `sm_payroll` WHERE  MONTH(`payroll_date`) = '" . date('m') . "' AND NOT payroll_status='Cancelled'");
                                if (count($countSF)) {
                                    for ($spi = 0; $spi < count($countSF); $spi++) {
                                        $spF = $spF + $countSF[$spi]['salary'];
                                    }
                                }
                                ?>
                                <p class="text-elg text-strong mb-0"><?php echo $spF; ?></p>
                                <span>Salary</span>
                            </div>
                        </div>
                    </div>
                    <div class="back bg-slategray">
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="salary_list.php"><i class="fa fa-bars fa-2x"></i> List</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="salary" data-toggle="modal" data-target="#splash3" data-options="splash-ef-3"><i
                                        class="fa fa-money fa-2x"></i> Pay</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="salary_receipt.php"><i class="fa fa-ellipsis-h fa-2x"></i> Paid</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <section class="tile">
                    <div class="tile-header bg-greensea dvd dvd-btm">
                        <h1 class="custom-font"><strong>Statistics </strong>New Employees</h1>
                        <ul class="controls">
                            <li></li>
                            <li class="dropdown">
                                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <i class="fa fa-spinner fa-spin"></i>
                                </a>
                                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                    <li>
                                        <a role="button" tabindex="0" class="tile-toggle">
                                            <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                            <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-refresh">
                                            <i class="fa fa-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-fullscreen">
                                            <i class="fa fa-expand"></i> Fullscreen
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                                        class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                    <div class="tile-widget bg-greensea">
                        <div id="statistics-chart" style="height: 250px;"></div>
                    </div>
                    <div class="tile-body">
                        <div class="row">
                            <?php
                            include("actual_statistics.php");
                            ?>
                            <div class="col-md-4 col-sm-12">
                                <h4 class="underline custom-font"><strong>Employee</strong> Statistics</h4>
                                <?php include("company_statistics.php"); ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="tile" fullscreen="isFullscreen02">
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong>Notification </strong>Count</h1>
                        <ul class="controls">
                            <li class="dropdown">
                                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <i class="fa fa-spinner fa-spin"></i>
                                </a>
                                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                    <li>
                                        <a role="button" tabindex="0" class="tile-toggle">
                                            <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                            <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-refresh">
                                            <i class="fa fa-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0" class="tile-fullscreen">
                                            <i class="fa fa-expand"></i> Fullscreen
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                                        class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                    <div class="tile-widget">
                        <div id="browser-usage" style="height: 250px"></div>
                    </div>
                    <div class="tile-body p-0">
                        <div class="panel-group icon-plus" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default panel-transparent">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                           aria-expanded="true" aria-controls="collapseOne">
                                            <span><i class="fa fa-minus text-sm mr-5"></i> This Month</span>
                                            <span class="badge pull-right bg-lightred"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table class="table table-no-border m-0">
                                            <tbody>
                                                <?php
                                                $tc = 0;
                                                $thisMonthNotif = $db->selectQuery("SELECT DISTINCT sm_company_docs.doc_title, COUNT(sm_company_docs.doc_title) as title_count FROM sm_company
INNER JOIN sm_company_docs ON sm_company.company_id=sm_company_docs.company_id
WHERE company_status=1 AND sm_company_docs.doc_status=1
AND MONTH(doc_end_date)='$thisMonth' AND YEAR(doc_end_date)='$thisYear' GROUP BY sm_company_docs.doc_title");
                                                if (count($thisMonthNotif)) {
                                                    for ($nt = 0; $nt < count($thisMonthNotif); $nt++) {
                                                        $thisMonthCount = 0;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $tc = $nt + 1; ?></td>
                                                            <td><?php echo $notif_name = $thisMonthNotif[$nt]['doc_title']; ?></td>
                                                            <td><?php echo $thisMonthNotif[$nt]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $thisMonthEmNotif = $db->selectQuery("SELECT DISTINCT sm_employee_documents.document_title, COUNT(sm_employee_documents.document_title) as title_count FROM sm_employee_documents
INNER JOIN sm_employee ON sm_employee.employee_id=sm_employee_documents.employee_id
WHERE employee_status=1 AND sm_employee_documents.status=1
AND MONTH(document_end_date)='$thisMonth' AND YEAR(document_end_date)='$thisYear' GROUP BY sm_employee_documents.document_title");
                                                if (count($thisMonthEmNotif)) {
                                                    $tec = $tc;
                                                    for ($net = 0; $net < count($thisMonthEmNotif); $net++) {
                                                        $thisMonthEmCount = 0;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $tec = $tec + 1; ?></td>
                                                            <td><?php echo $notif_ename = $thisMonthEmNotif[$net]['document_title']; ?></td>

                                                            <td><?php echo $thisMonthEmNotif[$net]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-transparent">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span><i class="fa fa-minus text-sm mr-5"></i> Last Month</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table table-no-border m-0">
                                            <tbody>
                                                <?php
                                                $nl = "";
                                                $lastMonth = date('m', strtotime('first day of last month'));
                                                if ($lastMonth == 12) {
                                                    $checkthisYear = $thisYear - 1;
                                                } else {
                                                    $checkthisYear = $thisYear;
                                                }
                                                $lastMonthNotif = $db->selectQuery("SELECT DISTINCT sm_company_docs.doc_title, COUNT(sm_company_docs.doc_title) as title_count FROM sm_company
INNER JOIN sm_company_docs ON sm_company.company_id=sm_company_docs.company_id
WHERE company_status=1 AND sm_company_docs.doc_status=1
AND MONTH(doc_end_date)='$lastMonth' AND YEAR(doc_end_date)='$checkthisYear' GROUP BY sm_company_docs.doc_title");
                                                if (count($lastMonthNotif)) {
                                                    for ($nl = 0; $nl < count($lastMonthNotif); $nl++) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $lc = $nl + 1; ?></td>
                                                            <td><?php echo $notif_name1 = $lastMonthNotif[$nl]['doc_title']; ?></td>

                                                            <td><?php echo $lastMonthNotif[$nl]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $lastMonthEmNotif = $db->selectQuery("SELECT DISTINCT sm_employee_documents.document_title, COUNT(sm_employee_documents.document_title) as title_count FROM sm_employee_documents
INNER JOIN sm_employee ON sm_employee.employee_id=sm_employee_documents.employee_id
WHERE employee_status=1 AND sm_employee_documents.status=1
AND MONTH(document_end_date)='$lastMonth' AND YEAR(document_end_date)='$checkthisYear' GROUP BY sm_employee_documents.document_title");
                                                if (count($lastMonthEmNotif)) {
                                                    $lec = $nl;
                                                    for ($nel = 0; $nel < count($lastMonthEmNotif); $nel++) {
                                                        $lastMonthEmCount = 0;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $lec = $lec + 1; ?></td>
                                                            <td><?php echo $notif_ename1 = $lastMonthEmNotif[$nel]['document_title']; ?></td>

                                                            <td><?php echo $lastMonthEmNotif[$nel]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default panel-transparent">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span><i class="fa fa-minus text-sm mr-5"></i> This Year</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <table class="table table-no-border m-0">
                                            <tbody>
                                                <?php
                                                $yc = "";
                                                $thisYearNotif = $db->selectQuery("SELECT DISTINCT sm_company_docs.doc_title, COUNT(sm_company_docs.doc_title) as title_count FROM sm_company
INNER JOIN sm_company_docs ON sm_company.company_id=sm_company_docs.company_id
WHERE company_status=1 AND sm_company_docs.doc_status=1
AND YEAR(doc_end_date)='$thisYear' GROUP BY sm_company_docs.doc_title");
                                                if (count($thisYearNotif)) {
                                                    for ($ny = 0; $ny < count($thisYearNotif); $ny++) {
                                                        $thisYearCount = 0;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $yc = $ny + 1; ?></td>
                                                            <td><?php echo $notif_name2 = $thisYearNotif[$ny]['doc_title']; ?></td>

                                                            <td><?php echo $thisYearNotif[$ny]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $thisYearEmNotif = $db->selectQuery("SELECT DISTINCT sm_employee_documents.document_title, COUNT(sm_employee_documents.document_title) as title_count FROM sm_employee_documents
INNER JOIN sm_employee ON sm_employee.employee_id=sm_employee_documents.employee_id
WHERE employee_status=1 AND sm_employee_documents.status=1
AND YEAR(document_end_date)='$thisYear' GROUP BY sm_employee_documents.document_title");
                                                if (count($thisYearEmNotif)) {
                                                    $yec = $yc;
                                                    for ($ney = 0; $ney < count($thisYearEmNotif); $ney++) {
                                                        $thisYearEmCount = 0;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $yec = $yec + 1; ?></td>
                                                            <td><?php echo $notif_ename2 = $thisYearEmNotif[$ney]['document_title']; ?></td>
                                                            <td><?php echo $thisYearEmNotif[$ney]['title_count']; ?></td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
       <?php /* <div class="row">
            <div class="col-md-4">
                <?php // include("news_feed.php"); ?>
                <?php include("todo_section.php"); ?>
            </div>
            <div class="col-md-4">
                <?php
                //include("todo_progress.php");
                //include("user_activity.php");
               // include("mini_calendar.php");
                ?>


            </div>

            <div class="col-md-4">
                <section class="tile tile-simple" style="min-height: 190px; overflow: hidden;">
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong>Add</strong> Notes</h1>
                        <ul class="controls">
                            <li class="">
                                <a data-toggle="modal" data-target="#mynote_modal" data-options="splash-ef-3">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div id="flash_notes">
                        <div class="tile-body lined-paper">
                            <div id="notes-carousel" class="owl-carousel">
                                <?php
                                $mynote = $db->selectQuery("SELECT * FROM `sm_mynote` ORDER BY `mynote_id` DESC LIMIT 6");
                                if (count($mynote)) {
                                    for ($my = 0; $my < count($mynote); $my++) {
                                        ?>
                                        <div class="notediv">
                                            <h4 class="mt-5 mb-5"><?php echo $mynote[$my]['mynote_title']; ?></h4>
                                            <p class="text-muted mb-10"><?php echo $mynote[$my]['mynote_data']; ?></p>
                                            <input type="hidden" class="NoteId"
                                                   value="<?php echo $mynote[$my]['mynote_id']; ?>"/>
                                            <p class="deleteNote"><a data-toggle="modal" data-target="#mynote_delete"
                                                                     data-options="splash-ef-3" title="delete"><i
                                                        class="fa fa-trash"></i></a></p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                //include("mini_calendar.php");
                ?>
            </div>
        </div> */ ?>
        <div class="row">
        </div>
    </div>
</section>
</div>

<?php
/*include("statistics_graph.php");
include("sponsor_fee_employee.php");
include("payroll.php");
//include("company_sponsor_fee.php");
include("company_notification_create.php");
include("employee_notification_create.php");
include("vehicle_notification_create.php"); */
?>
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Please Select Company</h3>
            </div>
            <div class="modal-body">
                <select class="form-control" id="model_sel">

                    <?php
                    $modCom = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `company_status`=1");
                    if (count($modCom)) {
                        for ($md = 0; $md < count($modCom); $md++) {
                            ?>
                            <option
                                value="<?php echo $modCom[$md]['company_id']; ?>"><?php echo $modCom[$md]['company_name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn">Submit</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Please Select Designation</h3>
            </div>
            <div class="modal-body">
                <select class="form-control" id="model_sel1">
                    <?php
                    $desig = $db->selectQuery("SELECT * FROM `sm_designation` WHERE `designation_status`=1");
                    if (count($desig)) {
                        for ($de = 0; $de < count($desig); $de++) {
                            ?>
                            <option
                                value="<?php echo $desig[$de]['designation_name']; ?>"><?php echo $desig[$de]['designation_name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                </select>
                <!--                <p>This sure is a fine modal, isn't it?</p>
                <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>-->
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn1">Submit</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Please Select Company</h3>
            </div>
            <div class="modal-body">
                <select class="form-control" id="model_sel2">
                    <?php
                    $modCom2 = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `company_status`=1");
                    if (count($modCom2)) {
                        for ($md2 = 0; $md2 < count($modCom2); $md2++) {
                            ?>
                            <option
                                value="<?php echo $modCom2[$md2]['company_id']; ?>"><?php echo $modCom2[$md2]['company_name']; ?></option>
                                <?php
                            }
                        }
                        ?>                </select><!--
<p>This sure is a fine modal, isn't it?</p>
<p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>-->
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn2">Submit</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Pay Salary</h3>
            </div>
            <div class="modal-body">
                <label for="address2">Select Company:</label>
                <select class="form-control" name="company" id="model_sel4" required="">
                    <?php
                    $modCom2 = $db->selectQuery("SELECT * FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "' AND `company_status`='1'");
                    if (count($modCom2)) {
                        for ($md2 = 0; $md2 < count($modCom2); $md2++) {
                            ?>
                            <option
                                value="<?php echo $modCom2[$md2]['company_id']; ?>"><?php echo $modCom2[$md2]['company_name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="modal-body">

                <label for="vehicle_assigned_employee">Employee: </label>

                <select class="form-control" name="vehicle_assigned_employee" id="vehicle_assigned_employee" required="">

                    <option  value="" selected>Select</option>

                </select>

            </div>

            <div class="modal-body">

                <label for="address2">Select Year:</label>

                <select class="form-control" name="year" id="model_sel5">

                    <?php
                    for ($i = date("Y") - 5; $i <= date("Y"); $i++) {

                        $sel = ($i == date('Y')) ? 'selected' : '';

                        echo "<option value=" . $i . " " . $sel . ">" . $i . "</option>";  // here I have changed
                    }
                    ?>

                </select>

            </div>

            <div class="modal-body">

                <label for="address2">Select Month:</label>

                <select class="form-control" name="month" id="model_sel6">

                    <?php
                    $curmonth = date("F");

                    for ($i = 1; $i <= 12; $i++) {

                        $allmonth = date("F", mktime(0, 0, 0, $i, 1, date("Y")));
                        $num_month = date("m", mktime(0, 0, 0, $i, 1, date("Y")))
                        ?>

                        <option value="<?php echo $num_month; ?>"

                                <?php
                                if ($allmonth == $curmonth) {
                                    echo ' selected';
                                }
                                ?>>

                            <?php
                            echo $allmonth;
                        }
                        ?>

                    </option>

                </select>

            </div>

            <div class="modal-body">
                <label class="form-label">Dispatch Date</label>
                <input type="text" class="form-control" name="dispatch_date" id="dispatch_date" />

            </div>
            <div class="modal-body">
                <div id="employee_assigned_salary">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="sub_btn3">Pay</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash_emp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure To Remove This Record ?</h3>
            </div>
            <input type="hidden" id="emp_hid_del" value=""/>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="delete_emp_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash_todo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">New Entry</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Title:</label>
                        <input type="text" name="todo_data" id="todo_data" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date:</label>
                        <input type="text" name="todo_date" id="todo_date" class="form-control"/>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-md-6">
                        <label> Time:</label>
                        <input type="text" name="todo_date" id="todo_time" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Status:</label>
                        <select name="todo_status" id="todo_status" class="form-control">
                            <option>Select</option>
                            <option value="Under Process">Under Process</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Progress:</label>
                        <input type="text" name="todo_progress" id="todo_progress" class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-border" id="add_todoBtn">Add</button>
                    <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="todo_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Edit Entry</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label> Title:</label>
                        <input type="text" name="todo_etitle" id="todo_etitle" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date:</label>
                        <input type="text" name="todo_edate" id="todo_edate" class="form-control"/>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-md-6">
                        <label>Time:</label>
                        <input type="text" name="todo_etime" id="todo_etime" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Status:</label>
                        <select type="text" name="todo_estatus" id="todo_estatus" class="form-control">
                            <option>Select</option>
                            <option value="Under Process">Under Process</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Progress:</label>
                        <input type="text" name="todo_eprogress" id="todo_eprogress" class="form-control"/>
                    </div>
                </div>
                <input type="hidden" class="toId"/>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="toEditBtn">Update</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="mynote_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">New Note</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <label class="form-control">Title:</label>
                        <input type="text" name="mynote_title" id="mynote_title" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label class="form-control">Note:</label>
                        <textarea type="text" name="mynote_note" id="mynote_note" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="myNoteBtn">Add</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="mynote_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure to delete this note?</h3>
            </div>
            <input type="hidden" id="mynote_hid_del" value=""/>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="myNoteDelete">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="todo_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure to delete this task?</h3>
            </div>
            <input type="hidden" id="todo_hid_del" value=""/>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="todoTaskDelete">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!--/ Application Content -->
<!-- ============================================
============== Vendor JavaScripts ===============
============================================= -->
<script src="assets/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

<script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

<script src="assets/js/vendor/d3/d3.min.js"></script>
<script src="assets/js/vendor/d3/d3.layout.min.js"></script>

<script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/daterangepicker/daterangepicker.js"></script>

<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

<script src="assets/js/vendor/flot/jquery.flot.min.js"></script>
<script src="assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>

<script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

<script src="assets/js/vendor/raphael/raphael-min.js"></script>
<script src="assets/js/vendor/morris/morris.min.js"></script>

<script src="assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/vendor/summernote/summernote.min.js"></script>

<script src="assets/js/vendor/coolclock/coolclock.js"></script>
<script src="assets/js/vendor/coolclock/excanvas.js"></script>
<script src="assets/js/jquerysession.js"></script>
<!--/ vendor javascripts -->
<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->

<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {
    // Initialize Statistics chart
    var data = [{
    data: [
    [1,<?php echo $jan; ?>], [2,<?php echo $feb; ?>], [3,<?php echo $mar; ?>], [4,<?php echo $apr; ?>],
    [5,<?php echo $may; ?>], [6,<?php echo $jun; ?>], [7,<?php echo $jul; ?>], [8,<?php echo $aug; ?>],
    [9,<?php echo $sep; ?>], [10,<?php echo $oct; ?>], [11,<?php echo $nov; ?>], [12,<?php echo $dec; ?>]
    ],
            bars: {
            show: true,
                    barWidth: 0.6,
                    lineWidth: 0,
                    fillColor: {colors: [{opacity: 0.3}, {opacity: 0.8}]}
            }
    }];
    var options = {
    colors: ['#e05d6f', '#61c8b8'],
            series: {
            shadowSize: 0
            },
            legend: {
            backgroundOpacity: 0,
                    margin: - 7,
                    position: 'ne',
                    noColumns: 2
            },
            xaxis: {
            tickLength: 0,
                    font: {
                    color: '#fff'
                    },
                    position: 'bottom',
                    ticks: [
                    [1, 'JAN'], [2, 'FEB'], [3, 'MAR'], [4, 'APR'], [5, 'MAY'], [6, 'JUN'], [7, 'JUL'], [8, 'AUG'], [9, 'SEP'], [10, 'OCT'], [11, 'NOV'], [12, 'DEC']
                    ]
            },
            yaxis: {
            tickLength: 0,
                    font: {
                    color: '#fff'
                    }
            },
            grid: {
            borderWidth: {
            top: 0,
                    right: 0,
                    bottom: 1,
                    left: 1
            },
                    borderColor: 'rgba(255,255,255,.3)',
                    margin: 0,
                    minBorderMargin: 0,
                    labelMargin: 20,
                    hoverable: true,
                    clickable: true,
                    mouseActiveRadius: 6
            },
            tooltip: true,
            tooltipOpts: {
            content: '%s: %y',
                    defaultTheme: false,
                    shifts: {
                    x: 0,
                            y: 20
                    }
            }
    };
    var plot = $.plot($("#statistics-chart"), data, options);
    $(window).resize(function () {
    // redraw the graph in the correctly sized div
    plot.resize();
    plot.setupGrid();
    plot.draw();
    });
    // * Initialize Statistics chart

    //Initialize morris chart
    Morris.Donut({
    element: 'browser-usage',
            data: [
<?php
$thisMonth1 = date("m");
$tc1 = 0;
$thisMonthNotif1 = $db->selectQuery("SELECT DISTINCT `doc_title` FROM `sm_company_docs`");
if (count($thisMonthNotif1)) {
    $shuffle = array("#ff471a", "#ff0080", "#ff00ff", "#3333ff", "#1aff1a", "#ffb31a", "#00ffbf", "#85adad", "#00cccc", "#0000b3", " #666699", "#ff794d");
    for ($nt1 = 0; $nt1 < count($thisMonthNotif1); $nt1++) {
        $thisMonthCount1 = 0;
        $notif_name1 = $thisMonthNotif1[$nt1]['doc_title'];
        $thisMonNotif1 = $db->selectQuery("SELECT * FROM `sm_notification` WHERE MONTH(notification_start_date)='$thisMonth1' AND `document_title`='$notif_name1'");
        if (count($thisMonNotif1)) {
            for ($tmn1 = 0; $tmn1 < count($thisMonNotif1); $tmn1++) {
                $thisMonthCount1 = $thisMonthCount1 + 1;
            }
        }
        ?>

                    {
                    label: '<?php echo $notif_name1; ?>',
                            value: <?php echo $thisMonthCount1; ?>,
                            color: '<?php echo $shuffle[$nt1]; ?>'
                    },
        <?php
    }
}
$thisMonthEmNotif1 = $db->selectQuery("SELECT DISTINCT `document_title` FROM `sm_employee_documents`");
if (count($thisMonthEmNotif1)) {
    $tec = $tc;
    $shuffle = array("#00e6e6", "#66ff99", " #ffff1a", "#00cc66", "#ff33bb", "#0077b3", "#cc00cc", " #ff0000", "#006600", "#ff9999", "#aaff00", "#600080");
    for ($net1 = 0; $net1 < count($thisMonthEmNotif1); $net1++) {
        $thisMonthEmCount1 = 0;
        $notif_ename1 = $thisMonthEmNotif1[$net1]['document_title'];
        $thisMonEmNotif1 = $db->selectQuery("SELECT * FROM `sm_notification_employee` WHERE MONTH(notification_start_date)='$thisMonth1' AND `document_title`='$notif_ename1'");
        if (count($thisMonEmNotif1)) {
            for ($temn1 = 0; $temn1 < count($thisMonEmNotif1); $temn1++) {
                $thisMonthEmCount1 = $thisMonthEmCount1 + 1;
            }
        }
        ?>

                    {
                    label: '<?php echo $notif_ename1; ?>',
                            value: <?php echo $thisMonthEmCount1; ?>,
                            color: '<?php echo $shuffle[$net1]; ?>'
                    },
        <?php
    }
}
?> ],
            resize: true
    });
    //*Initialize morris chart


    // Initialize owl carousels
    $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
    autoPlay: 5000,
            stopOnHover: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            responsive: true
    });
    $('#appointments-carousel').owlCarousel({
    autoPlay: 5000,
            stopOnHover: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigation: true,
            navigationText: ['<i class=\'fa fa-chevron-left\'></i>', '<i class=\'fa fa-chevron-right\'></i>'],
            singleItem: true
    });
    //* Initialize owl carousels


    // Initialize rickshaw chart
    var graph;
    var seriesData = [[], []];
    var random = new Rickshaw.Fixtures.RandomData(50);
    for (var i = 0; i < 50; i++) {
    random.addData(seriesData);
    }

    graph = new Rickshaw.Graph({
    element: document.querySelector("#realtime-rickshaw"),
            renderer: 'area',
            height: 133,
            series: [{
            name: 'Series 1',
                    color: 'steelblue',
                    data: seriesData[0]
            }, {
            name: 'Series 2',
                    color: 'lightblue',
                    data: seriesData[1]
            }]
    });
    var hoverDetail = new Rickshaw.Graph.HoverDetail({
    graph: graph,
    });
    graph.render();
    setInterval(function () {
    random.removeData(seriesData);
    random.addData(seriesData);
    graph.update();
    }, 1000);
    //* Initialize rickshaw chart

    //Initialize mini calendar datepicker
    $('#mini-calendar').datetimepicker({
    inline: true
    });
    //*Initialize mini calendar datepicker


    //todo's
    $('.widget-todo .todo-list li .checkbox').on('change', function () {
    var todo = $(this).parents('li');
    if (todo.hasClass('completed')) {
    todo.removeClass('completed');
    } else {
    todo.addClass('completed');
    }
    });
    //* todo's


    //initialize datatable
    $('#project-progress').DataTable({
    "aoColumnDefs": [
    {'bSortable': false, 'aTargets': ["no-sort"]}
    ],
    });
    //*initialize datatable

    //load wysiwyg editor
    $('#summernote').summernote({
    toolbar: [
            //['style', ['style']], // no style button
            ['style', ['bold', 'italic', 'underline', 'clear']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
            //['insert', ['picture', 'link']], // no insert buttons
            //['table', ['table']], // no table button
            //['help', ['help']] //no help button
    ],
            height: 143   //set editable area's height
    });
    //*load wysiwyg editor
    });</script>
<!--/ Page Specific Scripts -->

<script>
    $('#model_sel4').change(function(){

    var comp_name = $(this).val();
    $.ajax({

    url:"vehicle_model.php",
            type:"POST",
            data:{comp_name:comp_name},
            success:function(data){

            $('#vehicle_assigned_employee').html(data);
            }

    });
    });
    $('#vehicle_assigned_employee').change(function(){

    var emp_id = $(this).val();
    var year = jQuery('#model_sel5').val();
    var month = jQuery('#model_sel6').val();
    $.ajax({

    url:"vehicle_model.php",
            type:"POST",
            data:{emp_id:emp_id, month:month, year:year},
            success:function(data){

            $('#employee_assigned_salary').html(data);
            }

    });
    });
    $('#todo_btn').click(function () {
    var todoData = $('#todo').val();
    $.ajax({
    url: "todoAjax.php",
            type: "POST",
            data: {todo: todoData, sponsor_id: '<?php echo $custid; ?>'},
            success: function (data) {
            //$("#todo_ul").prepend(data);
            location.reload();
            }

    });
    });
    $('#todoDel').click(function () {
    var todoClass = $('#todoClass').val();
    var todoId = $(this).closest("li").attr('id');
    $.ajax({
    url: "todoDelAjax.php",
            type: "POST",
            data: {todoClass: todoClass, todoId: todoId},
            success: function (data) {
            //todoId.hide();
            location.reload();
            }

    });
    });
    $('.todo_check').click(function () {
    var val = jQuery(this).is(':checked');
    var passId = $(this).closest('li').attr('id');
    //alert(passId);
    if (val == true) {
    $.ajax({
    url: "todoCheckAjax.php",
            type: "POST",
            data: {passId: passId},
            success: function () {

            }
    });
    }
    if (val == false) {
    $.ajax({
    url: "todoCheckAjax.php",
            type: "POST",
            data: {passId1: passId},
            success: function () {

            }
    });
    }
    });
    $('#check').click(function () {
    $('#vClass').removeClass('view');
    $('#vClass').addClass('completed');
    });
    $('#add_todoBtn').click(function () {
    var todo_data = $('#todo_data').val();
    var todo_date = $('#todo_date').val();
    var todo_time = $('#todo_time').val();
    var todo_status = $('#todo_status').val();
    var todo_progress = $('#todo_progress').val();
    $.ajax({
    url: "todoProAdd.php",
            type: "POST",
            data: {
            todo_data: todo_data,
                    todo_date: todo_date,
                    todo_time: todo_time,
                    todo_status: todo_status,
                    todo_progress: todo_progress
            },
            success: function () {
            location.reload();
            }
    });
    });
    $('#myNoteBtn').click(function () {
    var mynote_title = $('#mynote_title').val();
    var mynote_note = $('#mynote_note').val();
    $.ajax({
    url: "mynoteAjax.php",
            type: "POST",
            data: {mynote_title: mynote_title, mynote_note: mynote_note},
            success: function () {
            location.reload();
            }
    });
    });
    function note_delete_id(id) {
    $('#mynote_hid_del').val(id);
    }
    $('.deleteNote').click(function () {
    var delId = $(this).siblings('.NoteId').val();
    note_delete_id(delId);
    });
    $('#myNoteDelete').click(function () {
    var note_delete = $('#mynote_hid_del').val();
    $.ajax({
    url: "mynoteDelAjax.php",
            type: "POST",
            data: {delId: note_delete},
            success: function (data) {
            location.reload();
            }
    });
    });
    $('#todoDelete').click(function () {
    var note_delete = $('#mynote_hid_del').val();
    $.ajax({
    url: "todoDelAjax.php",
            type: "POST",
            data: {delId: note_delete},
            success: function (data) {
            location.reload();
            }
    });
    });
    $('.editToClass').click(function () {
    var toTitle = $(this).closest('.toParent').find('.toTitle').find('span').html();
    var toDate1 = $(this).closest('.toParent').find('.toDate').html();
    var toDate_split = toDate1.split("-");
    var toDate = toDate_split[2] + '-' + toDate_split[1] + '-' + toDate_split[0];
    var toTime = $(this).closest('.toParent').find('.toTime').html();
    var toProg = $(this).closest('.toParent').find('.toProg').html();
    var toStat = $(this).closest('.toParent').find('.toStat').html();
    var toId = $(this).closest('.toParent').find('.toId').html();
    var todo_etitle = $('#todo_edit').find('#todo_etitle').val(toTitle);
    var todo_edate = $('#todo_edit').find('#todo_edate').val(toDate);
    var todo_etime = $('#todo_edit').find('#todo_etime').val(toTime);
    var todo_eprogress = $('#todo_edit').find('#todo_eprogress').val(toProg);
    var todo_estatus = $('#todo_edit').find('#todo_estatus').val(toStat);
    var todo_id = $('#todo_edit').find('.toId').val(toId);
    });
    $('#toEditBtn').click(function () {
    var todo_etitle = $(this).closest('#todo_edit').find('#todo_etitle').val();
    var todo_edate = $(this).closest('#todo_edit').find('#todo_edate').val();
    var todo_etime = $(this).closest('#todo_edit').find('#todo_etime').val();
    var todo_eprogress = $(this).closest('#todo_edit').find('#todo_eprogress').val();
    var todo_estatus = $(this).closest('#todo_edit').find('#todo_estatus').val();
    var toId = $(this).closest('#todo_edit').find('.toId').val();
    $.ajax({
    url: "todoProEdit.php",
            type: "POST",
            data: {
            toId: toId,
                    todo_etitle: todo_etitle,
                    todo_edate: todo_edate,
                    todo_etime: todo_etime,
                    todo_edate: todo_edate,
                    todo_eprogress: todo_eprogress,
                    todo_estatus: todo_estatus
            },
            success: function () {
            location.reload();
            }
    });
    });</script>

<script>
    $('#sub_btn').click(function () {
    var model_sel = $('#model_sel').val();
    location.href = "company_emp.php?cid=" + model_sel;
    });</script>
<script>
    $('#sub_btn1').click(function () {
    var model_sel1 = $('#model_sel1').val();
    location.href = "emp_designation.php?uid=" + model_sel1;
    });</script>
<script>
    $('#sub_btn2').click(function () {
    var model_sel2 = $('#model_sel2').val();
    location.href = "vehicle_company.php?vid=" + model_sel2;
    });</script>
<script>
    $('#sub_btn3').click(function () {
    var model_sel4 = $('#model_sel4').val();
    var model_sel5 = $('#model_sel5').val();
    var model_sel6 = $('#model_sel6').val();
    var model_sel7 = $('#dispatch_date').val();
    var model_sel8 = $('#vehicle_assigned_employee').val();
    location.href = "quick_salpay.php?compid=" + model_sel4 + "&empid=" + model_sel8 + "&yearid=" + model_sel5 + "&monthid=" + model_sel6 + "&disid=" + model_sel7;
    });</script>
<script type="text/javascript">
    function delete_id(id) {
    $('#emp_hid_del').val(id);
    }
    $('#delete_emp_btn').click(function () {
    var pass_val = $('#emp_hid_del').val();
    $.ajax({
    url: "delete_emp.php",
            type: "POST",
            data: {pass_val: pass_val},
            success: function (data) {
            window.location = "dashboard.php";
            }
    });
    });</script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
    $('#todo_edate').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $('#todo_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $('#salary_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $('#dispatch_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $('#todo_estatus').change(function () {
    var estatus = $(this).val();
    if (estatus == "Completed") {
    $('#todo_eprogress').val('100');
    $('#todo_eprogress').attr("readonly", true);
    }
    else {
    $('#todo_eprogress').attr("readonly", false);
    }
    });
    $('.deleteToClass').click(function () {
    var todo_hid_del = $(this).siblings('.todo_delete_id').val();
    $('#todo_hid_del').val(todo_hid_del);
    });
    $('#todoTaskDelete').click(function () {
    var task_delete_id = $('#todo_hid_del').val();
    $.ajax({
    url: "todoProDelete.php",
            type: "POST",
            data: {task_delete_id:task_delete_id},
            success: function () {
            location.reload();
            }
    });
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

</html>
