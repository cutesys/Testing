<?php
session_start();
include('connection.php');
if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}
$custid = $_SESSION['id'];
//$_SESSION['LAST_ACTIVITY'] = time();
?>

<?php
/* if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 5 minutes ago
  //session_unset();     // unset $_SESSION variable for the run-time
  // session_destroy();   // destroy session data in storage
  header("location:locked.php");
  }

  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  if (!isset($_SESSION['CREATED'])) {
  $_SESSION['CREATED'] = time();
  } else if (time() - $_SESSION['CREATED'] > 1800) {
  // session started more than 5 minutes ago
  session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
  $_SESSION['CREATED'] = time();  // update creation time
  } */
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SME</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animate.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="assets/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="assets/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
        <link rel="stylesheet" href="assets/js/vendor/magnific-popup/magnific-popup.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/js/vendor/file-upload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="assets/js/vendor/file-upload/css/jquery.fileupload-ui.css">
        <style>
            @media print
            {
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
        </style>
        <!--/ stylesheets -->
        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->


    </head>
    <body id="minovate" class="appWrapper">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">
            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="dashboard.php">
                            <span><strong>SPONSOR MASTER</strong></span>
                        </a>
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->



                    <!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="sidebar-collapse divided-right">
                            <a role="button" tabindex="0" class="collapse-sidebar">
                                <i class="fa fa-outdent"></i>
                            </a>
                        </li>
                        <li class="dropdown divided-right settings">
                            <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu" >
                                <li>

                                    <ul class="color-schemes list-inline">
                                        <li class="title">Header Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank header-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black header-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea header-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan header-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred header-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light header-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Branding Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank branding-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black branding-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea branding-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan branding-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred branding-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light branding-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Sidebar Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank sidebar-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black sidebar-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea sidebar-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan sidebar-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred sidebar-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light sidebar-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Active Color:</li>
                                        <li><a role="button" tabindex="0" class="scheme-drank color-scheme" data-scheme="drank-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-black color-scheme" data-scheme="black-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-greensea color-scheme" data-scheme="greensea-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-cyan color-scheme" data-scheme="cyan-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-lightred color-scheme" data-scheme="lightred-scheme-color"></a></li>
                                        <li><a role="button" tabindex="0" class="scheme-light color-scheme" data-scheme="light-scheme-color"></a></li>
                                    </ul>

                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xs-8 control-label">Fixed header</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch lightred small">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-header" checked="">
                                                    <label class="onoffswitch-label" for="fixed-header">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xs-8 control-label">Fixed aside</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch lightred small">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-aside" checked="">
                                                    <label class="onoffswitch-label" for="fixed-aside">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Left-side navigation end -->




                    <!-- Search -->
                    <!--<div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div>-->
                    <!-- Search end -->
                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">

                        <li class="dropdown nav-profile">
                            <?php
                            $resEmp = $db->selectQuery("SELECT * FROM `sm_admin`");
                            if (count($resEmp)) {

                                $image = $resEmp[0]['image'];
                                $firstname = $resEmp[0]['firstname'];

                                $lastname = $resEmp[0]['lastname'];
                            }
                            $image = "";
//$resLogo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `file_title`='Profile_Picture' AND `employee_id`='$id'");

                            if (count($resEmp)) {
                                $image = $resEmp[0]['image'];
                            } else {
                                $image = "profile-default.png";
                            }
                            ?>

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="admin_uploads/<?php echo $image; ?>" alt="" class="img-circle size-30x30">
                                <span><?php echo $firstname; ?> <?php echo $lastname; ?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu animated littleFadeInRight" role="menu" style="margin-left:-47px">
                                <li>
                                    <a href="admin_profile.php" tabindex="0">

        <!---<span class="badge bg-greensea pull-right">86%</span>-->
                                        <i class="fa fa-user"></i>Profile
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="locked.php" tabindex="0">
                                        <i class="fa fa-lock"></i>Lock
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" tabindex="0">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Right-side navigation end -->
                </header>
            </section>
            <!--/ HEADER Content  -->
            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">
                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            <li <?php
                                            if ($page == "dashboard") {
                                                echo "class='active'";
                                            }
                                            ?>><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                                            <li <?php
                                            if ($page == "company") {
                                                echo "class='active open'";
                                            }
                                            ?>>
                                                <a role="button" tabindex="0"><i class="fa fa-building"></i> <span>Company</span></a>
                                                <ul>
                                                    <li <?php
                                                    if ($sub == "c_list") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="companylist.php" ><i class="fa fa-caret-right"></i> Company List</a></li>
                                                    <li <?php
                                                    if ($sub == "c_add") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="company_add.php" ><i class="fa fa-caret-right"></i> Add New Company</a></li>
													 <li <?php
                                                    if ($sub == "c_exlist") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="company_doc_exp_list.php" ><i class="fa fa-caret-right"></i>Document expiry list</a>
                                                    </li>
                                                    <li <?php
                                                    if ($sub == "cd_list") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="companyDocumentStatus.php"><i class="fa fa-caret-right"></i> Company Documents Status</a>
                                                    </li>
                                                    <li <?php
                                                    if ($sub == "c_setting") {
                                                        echo "class='active'";
                                                    }
                                                    ?>>
                                                        <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                                        <ul>

                                                            <li <?php
                                                            if ($tab == "bank") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Bank</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub1 == "bank_details_list") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="bank_details_list.php"><i class="fa fa-caret-right"></i>Bank List</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub1 == "bank_details_add") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="bank_details_add.php"><i class="fa fa-caret-right"></i>Add Bank Details </a></li>

                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>


                                            </li>



                                            <li <?php
                                            if ($page == "hr") {
                                                echo "class='active open'";
                                            }
                                            ?>>
                                                <a href="#"><i class="glyphicon glyphicon-user"></i> <span>Human Resource</span></a>
                                                <ul>




                                                    <li <?php
                                                    if ($page == "recruitment") {
                                                        echo "class='active open'";
                                                    }
                                                    ?>>
                                                        <a href="#"><i class="glyphicon glyphicon-search"></i> <span>Recruitment</span></a>
                                                        <ul>
                                                            <li <?php
                                                            if ($tab == "agent") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="#"><i class="fa fa-caret-right"></i>Agent</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub == "agent_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="agent_list.php"><i class="fa fa-caret-right"></i>Agent List</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "agent_add") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="agent_add.php"><i class="fa fa-caret-right"></i>Add Agent</a>
                                                                    </li>



                                                                </ul>

                                                            </li>
                                                            <li <?php
                                                            if ($tab == "interview") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="#"><i class="fa fa-caret-right"></i>Interview</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub == "interview_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="interview.php"><i class="fa fa-caret-right"></i>Interview</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "interview_add") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="interview_add.php"><i class="fa fa-caret-right"></i>Add Interview</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "interview_form") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?>>
                                                                        <a href="interview_form.php"><i class="fa fa-caret-right"></i>Interview Form</a>

                                                                    </li>


                                                                </ul>
                                                            </li>


                                                            <li <?php
                                                            if ($tab == "candidate") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="#"><i class="fa fa-caret-right"></i>Candidate</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub == "candidate_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="candidate.php"><i class="fa fa-caret-right"></i>Candidates List</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "candidate_add") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="candidate_add.php"><i class="fa fa-caret-right"></i>Add Candidate</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "candidates_selected") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="candidates_selected.php"><i class="fa fa-caret-right"></i>Selected Candidates</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "candidates_retest") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="candidates_retest.php"><i class="fa fa-caret-right"></i>Retest Candidates</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub == "candidates_rejected") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="candidates_rejected.php"><i class="fa fa-caret-right"></i>Rejected Candidates</a>
                                                                    </li>

                                                                </ul>
                                                            </li>


                                                            <li <?php
                                                            if ($sub == "final_candidate_list1") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="#"><i class="fa fa-caret-right"></i>Process Candidate</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub1 == "final_candidate_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="final_candidate_list.php"><i class="fa fa-caret-right"></i>Update Medical Status</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub1 == "final_candidate_medical_cleared") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="final_candidate_medical_cleared.php"><i class="fa fa-caret-right"></i>Medical Cleared</a>
                                                                    </li>


                                                                    <li <?php
                                                                    if ($sub1 == "final_candidate_medical_failed") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?> ><a href="final_candidate_medical_failed.php"><i class="fa fa-caret-right"></i>Medical Failed</a>
                                                                    </li>

                                                            </li>
                                                        </ul>






                                                    <li <?php
                                                    if ($tab == "process_visa") {
                                                        echo "class='active open'";
                                                    }
                                                    ?>>
                                                        <a href="#"><i class="fa fa-caret-right"></i>Process Visa</a>
                                                        <ul>
                                                            <li <?php
                                                            if ($sub == "process_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="processvisa_candidate_list.php"><i class="fa fa-caret-right"></i>Selected Candidate list</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "applied_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="visa_applied_list.php"><i class="fa fa-caret-right"></i>Visa Applied List</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "approved_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="visa_approved_list.php"><i class="fa fa-caret-right"></i>Visa Issued List</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "rejected_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="visa_rejected_list.php"><i class="fa fa-caret-right"></i>Visa Rejected List</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li <?php
                                                    if ($tab == "notification") {
                                                        echo "class='active open'";
                                                    }
                                                    ?>>
                                                        <a href="#"><i class="fa fa-caret-right"></i>Notification</a>
                                                        <ul>


                                                            <li <?php
                                                            if ($sub == "visa_expiry") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="visa_expiry_notification.php"><i class="fa fa-caret-right"></i>Visa Validity Expiry </a>
                                                            </li>


                                                            <li <?php
                                                            if ($sub == "medical_visa") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="medical_visa_notification.php"><i class="fa fa-caret-right"></i>Rp Visa Medical Notification</a>


                                                            </li>
                                                        </ul>


                                                    </li>


                                                    <li <?php
                                                            if ($tab == "CandidateTravel") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                        <a href="#"><i class="fa fa-caret-right"></i>Travel</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub == "notified_candidate_list") {
                                                        echo "class='active open'";
                                                    }
                                                            ?> ><a href="notified_candidate_list.php"><i class="fa fa-caret-right"></i>Notified Candidates</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "travelling_candidates_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="travelling_candidates_list.php"><i class="fa fa-caret-right"></i>Travelling Candidates</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "travelled_candidates_list") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="travelled_candidates_list.php"><i class="fa fa-caret-right"></i>Travelled Candidates List</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "reports") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Reports</a>
                                                                <ul>
                                                                    <li <?php
                                                            if ($sub1 == "Travelling_Candidates_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="report_travelling_candidates_list.php"><i class="fa fa-caret-right"></i>Travelling Candidate List</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub1 == "Travelled_Candidate_List") {
                                                                        echo "class='active'";
                                                                    }
                                                            ?> ><a href="report_travelled.php"><i class="fa fa-caret-right"></i>Travelled Candidate List</a>
                                                                    </li>


                                                                </ul>
                                                            </li>


                                                        </ul>
                                                    </li>
                                            </li>

                                            <li <?php
                                                                    if ($sub == "candidateToEmployee") {
                                                                        echo "class='active open'";
                                                                    }
                                                            ?> ><a href="candidateToEmployee.php"><i class="fa fa-caret-right"></i>Candidate To Employee</a>
                                            </li>

                                            <li <?php
                                            if ($tab == "recruit") {
                                                echo "class='active open'";
                                            }
                                                            ?>>
                                                <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                                <ul>
                                                    <li <?php
                                            if ($sub == "country") {
                                                echo "class='active open'";
                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Country</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "country_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="country_list.php"><i class="fa fa-caret-right"></i>Country List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "country_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="country_add.php"><i class="fa fa-caret-right"></i>Country Add</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <li <?php
                                                            if ($sub == "state") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>State</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "state_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="state_list.php"><i class="fa fa-caret-right"></i>State List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "state_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="state_add.php"><i class="fa fa-caret-right"></i>State Add</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <li <?php
                                                            if ($sub == "qual") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Qualification</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "qual_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="qual_list.php"><i class="fa fa-caret-right"></i>Qualification List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "qual_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="qual_add.php"><i class="fa fa-caret-right"></i>Qualification Add</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <li <?php
                                                            if ($sub == "job") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Job Position</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "job_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="job_list.php"><i class="fa fa-caret-right"></i>Job Position List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "job_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="job_add.php"><i class="fa fa-caret-right"></i>Job Position Add</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <li <?php
                                                            if ($sub == "categ") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Category</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "categ_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="category_list.php"><i class="fa fa-caret-right"></i>Category List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "categ_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="category_add.php"><i class="fa fa-caret-right"></i>Category Add</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>

                                                <ul>
                                                    <li <?php
                                                            if ($sub == "skill") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Skill</a>
                                                        <ul>
                                                            <li <?php
                                                    if ($sub1 == "skill_list") {
                                                        echo "class='active'";
                                                    }
                                                            ?> ><a href="skill_list.php"><i class="fa fa-caret-right"></i>Skill List</a></li>

                                                            <li <?php
                                                            if ($sub1 == "skill_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="skill_add.php"><i class="fa fa-caret-right"></i>Skill Add</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>



                                                <ul>

                                                    <li <?php
                                                            if ($sub == "visa_settings") {
                                                                echo "class='active'";
                                                            }
                                                            ?> ><a href="agent_list.php"><i class="fa fa-caret-right"></i>Visa</a>
                                                        <ul>


                                                            <li <?php
                                                    if ($sub1 == "visa_category_settings") {
                                                        echo "class='active'";
                                                    }
                                                            ?>>
                                                                <a href="worksite_add.php"><i class="fa fa-caret-right"></i>Visa Category</a>
                                                                <ul>
                                                                    <li <?php
                                                            if ($sub2 == "visa_category_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?>>
                                                                        <a href="visa_category_add.php"><i class="fa fa-caret-right"></i>Add Visa Category</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub2 == "visa_category_list") {
                                                                        echo "class='active'";
                                                                    }
                                                            ?>>
                                                                        <a href="visa_category_list.php"><i class="fa fa-caret-right"></i>Visa Category List</a>
                                                                    </li>


                                                                </ul>
                                                            </li>

                                                            <li <?php
                                                                    if ($sub1 == "visa_type_settings") {
                                                                        echo "class='active'";
                                                                    }
                                                            ?>>
                                                                <a href="worksite_list.php"><i class="fa fa-caret-right"></i>Visa Type</a>
                                                                <ul>
                                                                    <li <?php
                                                            if ($sub2 == "visa_type_add") {
                                                                echo "class='active'";
                                                            }
                                                            ?>>
                                                                        <a href="visa_type_add.php"><i class="fa fa-caret-right"></i>Add Visa Type</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub2 == "visa_type_list") {
                                                                        echo "class='active'";
                                                                    }
                                                            ?>>
                                                                        <a href="visa_type_list.php"><i class="fa fa-caret-right"></i>Visa Type List</a>
                                                                    </li>
                                                                </ul>
                                                            </li>





                                                        </ul>
                                                    </li>
                                                </ul>




                                                <ul>
                                                    <li <?php
                                                                    if ($sub == "notification_settings") {
                                                                        echo "class='active'";
                                                                    }
                                                            ?> ><a href="agent_list.php"><i class="fa fa-caret-right"></i>Notification</a>
                                                        <ul>




                                                            <li <?php
                                                    if ($sub1 == "visa_validity_add") {
                                                        echo "class='active open'";
                                                    }
                                                            ?> ><a href="sm_visa_validity_add.php"><i class="fa fa-caret-right"></i>Add Notification Period</a>
                                                            </li>



                                                            <li <?php
                                                            if ($sub1 == "visa_validity_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                                <a href="sm_visa_validity_list.php"><i class="fa fa-caret-right"></i>Notification List</a>


                                                            </li>


                                                        </ul>

                                                    </li>


                                                </ul>
                                        </ul>
                                        </li>
                                        </li>




                                        <li <?php
                                                            if ($page == "employee") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-users"></i> <span>Employee</span></a>
                                            <ul>
                                                <li <?php
                                        if ($sub == "employee_list") {
                                            echo "class='active open'";
                                        }
                                                            ?> ><a href="employee_list.php"><i class="fa fa-caret-right"></i>Employee list</a>
                                                </li>
                                                <li <?php
                                                if ($sub == "empl_add") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                            ?>><a href="employee_add.php"><i class="fa fa-caret-right"></i> Add New Employee</a></li>
                                                  <li <?php
                                                    if ($sub == "ed_list") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="employeeDocumentStatus.php"><i class="fa fa-caret-right"></i> Document Status</a>
                                                    </li>
                                                    <li <?php
                                                    if ($sub == "e_exlist") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="employee_doc_exp_list.php" ><i class="fa fa-caret-right"></i>Document expiry list</a>
                                                    </li>
													<li <?php
                                                    if ($tab == "management") {
                                                        echo "class='active open'";
                                                    }
                                                    ?>>
                                                        <a href="#"><i class="fa fa-caret-right"></i>Employee Management</a>
                                                        <ul>
                                                            <li <?php
                                                            if ($sub == "Add New Login list") {
                                                                echo "class='active open'";
                                                            }
                                                    ?> ><a href="employee_login_list.php"><i class="fa fa-caret-right"></i>Employee Login List</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "Add New Login") {
                                                                echo "class='active open'";
                                                            }
                                                    ?> ><a href="employee_login.php"><i class="fa fa-caret-right"></i> Add New Login</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "attnd_list") {
                                                                echo "class='active open'";
                                                            }
                                                    ?> ><a href="attendance_list.php"><i class="fa fa-caret-right"></i>Employee attendance list</a>
                                                            </li>
                                                            <li <?php
                                                            if ($sub == "attnd_rpt") {
                                                                echo "class='active open'";
                                                            }
                                                    ?> ><a href="attendance_report.php"><i class="fa fa-caret-right"></i>Employee attendance Report</a>
                                                            </li>
														
                                                            <li <?php
                                                            if ($sub == "empl_wrkrpt") {
                                                                echo "class='active open'";
                                                            }
                                                    ?> ><a href="employee_workreport.php"><i class="fa fa-caret-right"></i>Employee Work Report</a>
                                                            </li>
															<!-- ---  -->
															<li <?php
                                                            if ($sub == "emp_report") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Report</a>
                                                                <ul>
                                                                    <li <?php
                                                                    if ($sub1 == "attendance_list_report") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="attendance_list_report.php"><i class="fa fa-caret-right"></i>Employee Attendance List</a>
                                                                    </li>
                                                                    <li <?php
                                                                    if ($sub1 == "attendance_report_report") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="attendance_report_report.php"><i class="fa fa-caret-right"></i>Employee Attendance Report </a></li>

                                                                </ul>
                                                            </li>

                                                         <!--  --  -->
                                                        </ul>
                                                    </li>
													
                                                <li <?php
                                                if ($tab == "employee_leave") {
                                                    echo "class='active open'";
                                                }
                                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Leave Tracker</a>
                                                    <ul>


                                                        <li <?php
                                                if ($sub == "leave_update") {
                                                    echo "class='active open'";
                                                }
                                                            ?> ><a href="employeeLeave.php"><i class="fa fa-caret-right"></i> Leave Request</a>
                                                        </li>



                                                        <li <?php
                                                        if ($sub == "leave_up_list") {
                                                            echo "class='active open'";
                                                        }
                                                            ?>>
                                                            <a href="emp_leavelist.php"><i class="fa fa-caret-right"></i>Leave List</a>


                                                        </li>
                                                    </ul>


                                                </li>

                                                <li <?php
                                                        if ($tab == "employee_timesheet") {
                                                            echo "class='active open'";
                                                        }
                                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Time Tracker</a>
                                                    <ul>


                                                        <li <?php
                                                if ($sub == "employee_list_timesheet") {
                                                    echo "class='active open'";
                                                }
                                                            ?> ><a href="employee_list_timesheet.php"><i class="fa fa-caret-right"></i> Time Sheet</a>
                                                        </li>



                                                        <li <?php
                                                        if ($sub == "mange_holiday") {
                                                            echo "class='active open'";
                                                        }
                                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                                            <ul>
                                                                <li <?php
                                                            if ($sub1 == "holiday_settings") {
                                                                echo "class='active'";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>
                                                                    <a href="manage_holiday.php"><i class="fa fa-caret-right"></i>Manage Holiday </a>
                                                                </li>
                                                            </ul>


                                                        </li>
                                                    </ul>

                                                </li>


                                                <li <?php
                                                                if ($tab == "requirements") {
                                                                    echo "class='active open'";
                                                                }
                                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Requirements</a>
                                                    <ul>


                                                        <li <?php
                                                                if ($sub == "inhouse_requirements") {
                                                                    echo "class='active open'";
                                                                }
                                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Inhouse Requirement</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "inhouse_add") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="inhouse_requirement_add.php"><i class="fa fa-caret-right"></i>Add Inhouse Requirements</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "inhouse_list") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="inhouse_requirement_list.php"><i class="fa fa-caret-right"></i>Inhouse Requirements List</a>
                                                                </li>

                                                            </ul>
                                                        </li>



                                                        <li <?php
                                                                if ($sub == "external_requirements") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>External Requirement</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "external_add") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="external_requirement_add.php"><i class="fa fa-caret-right"></i> Add External Requirement</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "external_list") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="external_requirement_list.php"><i class="fa fa-caret-right"></i>External Requirement List</a>
                                                                </li>
																<li <?php
                                                                    if ($sub1 == "external_invoice_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                ?> ><a href="external_print_invoice_list.php"><i class="fa fa-caret-right"></i>External Requirement Invoice</a>
                                                        </li>

                                                                <li <?php
                                                                if ($sub1 == "hiring_requirment_list") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="hiring_requirment_list.php"><i class="fa fa-caret-right"></i>Hiring Requirment List</a>
                                                                </li>

                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
												
												  <li <?php
                                                        if ($tab == "work_assign") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                <li <?php
                                                                if ($sub == "e_add") {
                                                                    echo "class='active'";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><a href="#"><i class="fa fa-caret-right"></i>Employee Assignments</a>
                                                    <ul>
                                                        <li <?php
                                                if ($sub1 == "assign_add") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>>
                                                            <a href="emp_work_assign_add.php"><i class="fa fa-caret-right"></i>Add Assignments </a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "assign_list") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>>
                                                            <a href="emp_title_list.php"><i class="fa fa-caret-right"></i> Assignments list</a>
                                                        </li>
                                                    </ul>

                                                </li>
												</li>
                                                <li <?php
                                                        if ($tab == "employee_salary") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Payroll</a>
                                                    <ul>


                                                        <li <?php
                                                    if ($sub == "employee_salary_list") {
                                                        echo "class='active open'";
                                                    }
                                                    ?> ><a href="employee_salary_list.php"><i class="fa fa-caret-right"></i>Salary List</a>
                                                        </li>



                                                        <li <?php
                                                            if ($sub == "advance_add_add") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Advance Salary</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "advance_add") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="advance_add.php"><i class="fa fa-caret-right"></i>Advance Salary Request</a>
                                                                </li>
                                                                <li <?php
                                                            if ($sub1 == "advance_requested") {
                                                                echo "class='active open'";
                                                            }
                                                        ?> ><a href="advance_requested.php"><i class="fa fa-caret-right"></i>Advance Requested</a>
                                                                </li>


                                                                <li <?php
                                                                if ($sub1 == "advance_paid") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="advance_paid.php"><i class="fa fa-caret-right"></i>Advance Paid</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "advance_pending") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="advance_pending.php"><i class="fa fa-caret-right"></i>Advance Pending</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                                if ($sub == "salary_final") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="salary_hr_update.php"><i class="fa fa-caret-right"></i>Salary Update</a>
                                                        </li>


                                                        <li <?php
                                                        if ($sub == "reports") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Reports</a>
                                                            <ul>

                                                                <li <?php
                                                        if ($sub1 == "report_employee_salary_list") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="report_employee_salary_list.php"><i class="fa fa-caret-right"></i>Salary List</a>
                                                                </li>


                                                                <li <?php
                                                                if ($sub1 == "report_advance_paid") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="report_advance_paid.php"><i class="fa fa-caret-right"></i>Advance Paid</a>
                                                                </li>
                                                                <li <?php
                                                                    if ($sub1 == "report_advance_pending") {
                                                                        echo "class='active open'";
                                                                    }
                                                                ?> ><a href="report_advance_pending.php"><i class="fa fa-caret-right"></i>Advance Pending</a>
                                                                </li>



                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>

                                                <li <?php
                                                                if ($tab == "performance") {
                                                                    echo "class='active'";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><a href=""><i class="fa fa-caret-right"></i>Employee Performance</a>
                                                    <ul>
                                                        <li <?php
                                                if ($sub == "employee_perform") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="employee_perform.php"><i class="fa fa-caret-right"></i>Add Performance</a></li>

                                                    </ul>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub == "employee_appraisal") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="employee_appraisal.php"><i class="fa fa-caret-right"></i>Employee Appraisal</a></li>

                                                    </ul>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub == "reports_perform") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href=""><i class="fa fa-caret-right"></i>Reports</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub == "employee_perform_report") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_appraisal.php"><i class="fa fa-caret-right"></i>Employee Performance List</a></li>
                                                        </li>
                                                    </ul>
                                            </ul>
                                        </li>

                                        <li <?php
                                                                if ($tab == "employee_travel") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                            <a href="#"><i class="fa fa-caret-right"></i>Employee Travel</a>
                                            <ul>


                                                <li <?php
                                        if ($sub == "yearly_travel") {
                                            echo "class='active open'";
                                        }
                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Yearly Travel</a>
                                                    <ul>
                                                        <li <?php
                                        if ($sub1 == "employee_travel") {
                                            echo "class='active open'";
                                        }
                                        ?> ><a href="employee_travel.php"><i class="fa fa-caret-right"></i>Eligible Employee List</a>
                                                        </li>
                                                        <li <?php
                                                if ($sub1 == "employee_travel_booked") {
                                                    echo "class='active open'";
                                                }
                                        ?> ><a href="employee_travel_booked.php"><i class="fa fa-caret-right"></i>Confirmed Travel</a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "employee_travelled") {
                                                            echo "class='active open'";
                                                        }
                                        ?> ><a href="employee_travelled.php"><i class="fa fa-caret-right"></i>Travelled</a>
                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "employee_travel_cancel") {
                                                            echo "class='active open'";
                                                        }
                                        ?> ><a href="employee_travel_cancel.php"><i class="fa fa-caret-right"></i>Cancelled</a>

                                                        </li>
                                                    </ul>
                                                </li>
                                                <li <?php
                                                        if ($sub == "employee_other_travel") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Other Travel</a>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub1 == "employee_other_travel") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="employee_other_travel.php"><i class="fa fa-caret-right"></i>Travel Details</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "employee_other_travel_booked") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="employee_other_travel_booked.php"><i class="fa fa-caret-right"></i>Ticket Booked</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "employee_other_travelled") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="employee_other_travelled.php"><i class="fa fa-caret-right"></i>Travelled</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "employee_other_travel_cancelled") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="employee_other_travel_cancelled.php"><i class="fa fa-caret-right"></i>Cancelled</a>

                                                        </li>
                                                    </ul>
                                                </li>



                                                <li <?php
                                                            if ($sub == "reports") {
                                                                echo "class='active open'";
                                                            }
                                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Reports</a>
                                                    <ul>
                                                        <li <?php
                                                            if ($sub1 == "report_yearly_travel_booked") {
                                                                echo "class='active open'";
                                                            }
                                                        ?> ><a href="report_yearly_travel_booked.php"><i class="fa fa-caret-right"></i>Yearly Travel Booked</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "report_yearly_travelled") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="report_yearly_travelled.php"><i class="fa fa-caret-right"></i>Yearly Travelled</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "report_other_travel_booked") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="report_other_travel_booked.php"><i class="fa fa-caret-right"></i>Other Travel Booked</a>

                                                        </li>

                                                        <li <?php
                                                        if ($sub1 == "report_other_travelled") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="report_other_travelled.php"><i class="fa fa-caret-right"></i>Other Travelled</a>

                                                        </li>
                                                    </ul>
                                                </li>




                                            </ul>
                                        </li>

                                        <li <?php
                                                            if ($tab == "notification1") {
                                                                echo "class='active open'";
                                                            }
                                                        ?>>
                                            <a href="#"><i class="fa fa-caret-right"></i>Notification</a>
                                            <ul>
                                                <li <?php
                                                            if ($sub == "living_visa") {
                                                                echo "class='active open'";
                                                            }
                                                        ?>>
                                                    <a href="living_visa_notification.php"><i class="fa fa-caret-right"></i>Visa Expiry Notification</a>


                                                </li>
                                            </ul>
                                        </li>



                                        <!------  -->

                                        <!--  ---- -->









                                        </li>



                                        <li <?php
                                        if ($tab == "emp_settings") {
                                            echo "class='active open'";
                                        }
                                                        ?>>
                                            <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                            <ul>

                                                <li <?php
                                        if ($sub == "deduction") {
                                            echo "class='active open'";
                                        }
                                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Deduction</a>
                                                    <ul>
                                                        <li <?php
                                        if ($sub1 == "deduction_category_add") {
                                            echo "class='active open'";
                                        }
                                                        ?> ><a href="deduction_category_add.php"><i class="fa fa-caret-right"></i>Add Deduction Category</a>
                                                        </li>
                                                        <li <?php
                                                    if ($sub1 == "deduction_category_list") {
                                                        echo "class='active open'";
                                                    }
                                                    ?> ><a href="deduction_category_list.php"><i class="fa fa-caret-right"></i>Deduction Category List</a>
                                                        </li>

                                                    </ul>
                                                </li>

                                                <li <?php
                                                        if ($sub == "work_site") {
                                                            echo "class='active'";
                                                        }
                                                        ?> ><a href="agent_list.php"><i class="fa fa-caret-right"></i>Work Location</a>
                                                    <ul>

                                                        <li <?php
                                                            if ($sub1 == "worksite_list") {
                                                                echo "class='active'";
                                                            }
                                                        ?>>
                                                            <a href="worksite_list.php"><i class="fa fa-caret-right"></i>Work Location List</a>
                                                        </li>
                                                        <li <?php
                                                if ($sub1 == "worksite_add") {
                                                    echo "class='active'";
                                                }
                                                        ?>>
                                                            <a href="worksite_add.php"><i class="fa fa-caret-right"></i>Add Work Location</a>
                                                        </li>




                                                    </ul>
                                                </li>
                                               
                                            </ul>
                                        </li>
                                         <!--  -- -->
												
                                                <!-- -- -->

                                        </ul>
                                        </li>
                                        </ul>

                                        <li <?php
                                                        if ($page == "accounts") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-money"></i> <span>Accounts</span></a>
                                            <ul>
                                                <li <?php
                                                        if ($sub == "accounts_employee_list") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="accounts_employee_list.php"><i class="fa fa-caret-right"></i>Employee list</a>
                                                </li>
                                                <li <?php
                                            if ($sub == "accounts_leave_up_list") {
                                                echo "class='active open'";
                                            }
                                            ?>>
                                                    <a href="accounts_emp_leavelist.php"><i class="fa fa-caret-right"></i>Leave List</a>


                                                </li>
                                                <li <?php
                                            if ($tab == "accounts_employee_timesheet") {
                                                echo "class='active open'";
                                            }
                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Time Tracker</a>
                                                    <ul>


                                                        <li <?php
                                                if ($sub == "employee_list_timesheet") {
                                                    echo "class='active open'";
                                                }
                                            ?> ><a href="accounts_employee_list_timesheet.php"><i class="fa fa-caret-right"></i> Time Sheet</a>
                                                        </li>



                                                        <li <?php
                                                if ($sub == "mange_holiday") {
                                                    echo "class='active open'";
                                                }
                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "holiday_settings") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                            ?>>
                                                                    <a href="accounts_manage_holiday.php"><i class="fa fa-caret-right"></i>Manage Holiday </a>
                                                                </li>
                                                            </ul>


                                                        </li>
                                                    </ul>

                                                </li>
                                                <li <?php
                                                                if ($sub == "accounts_assign_list") {
                                                                    echo "class='active'";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>>
                                                    <a href="accounts_emp_title_list.php"><i class="fa fa-caret-right"></i>Employee Assignments list</a>
                                                </li>

                                                <li <?php
                                                                if ($sub == "accounts_employee_appraisal") {
                                                                    echo "class='active'";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><a href="accounts_employee_appraisal.php"><i class="fa fa-caret-right"></i>Employee Appraisal</a></li>

                                                <li <?php
                                                if ($tab == "accounts_employee_travel") {
                                                    echo "class='active open'";
                                                }
                                                                ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Employee Travel</a>
                                                    <ul>


                                                        <li <?php
                                                    if ($sub == "yearly_travel") {
                                                        echo "class='active open'";
                                                    }
                                                    ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Yearly Travel</a>
                                                            <ul>
                                                                <li <?php
                                                if ($sub1 == "employee_travel") {
                                                    echo "class='active open'";
                                                }
                                                    ?> ><a href="accounts_employee_travel.php"><i class="fa fa-caret-right"></i>Eligible Employee List</a>
                                                                </li>
                                                                <li <?php
                                                        if ($sub1 == "employee_travel_booked") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="accounts_employee_travel_booked.php"><i class="fa fa-caret-right"></i>Confirmed Travel</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "employee_travelled") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_employee_travelled.php"><i class="fa fa-caret-right"></i>Travelled</a>
                                                                </li>

                                                                <li <?php
                                                                if ($sub1 == "employee_travel_cancel") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_employee_travel_cancel.php"><i class="fa fa-caret-right"></i>Cancelled</a>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                                if ($sub == "employee_other_travel") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Other Travel</a>
                                                            <ul>
                                                                <li <?php
                                                                if ($sub1 == "employee_other_travels") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_employee_other_travel.php"><i class="fa fa-caret-right"></i>Travel Details</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "employee_other_travel_booked") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_employee_other_travel_booked.php"><i class="fa fa-caret-right"></i>Ticket Booked</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "employee_other_travelled") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_employee_other_travelled.php"><i class="fa fa-caret-right"></i>Travelled</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "employee_other_travel_cancelled") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_employee_other_travel_cancelled.php"><i class="fa fa-caret-right"></i>Cancelled</a>

                                                                </li>
                                                            </ul>
                                                        </li>



                                                        <li <?php
                                                                if ($sub == "reports") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Reports</a>
                                                            <ul>
                                                                <li <?php
                                                                    if ($sub1 == "report_yearly_travel_booked") {
                                                                        echo "class='active open'";
                                                                    }
                                                                ?> ><a href="accounts_report_yearly_travel_booked.php"><i class="fa fa-caret-right"></i>Yearly Travel Booked</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "report_yearly_travelled") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_report_yearly_travelled.php"><i class="fa fa-caret-right"></i>Yearly Travelled</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "report_other_travel_booked") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_report_other_travel_booked.php"><i class="fa fa-caret-right"></i>Other Travel Booked</a>

                                                                </li>

                                                                <li <?php
                                                            if ($sub1 == "report_other_travelled") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_report_other_travelled.php"><i class="fa fa-caret-right"></i>Other Travelled</a>

                                                                </li>
                                                            </ul>
                                                        </li>




                                                    </ul>
                                                </li>

                                                <li <?php
                                                            if ($tab == "employee_salary") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Payroll</a>
                                                    <ul>


                                                        <li <?php
                                                            if ($sub == "employee_salary_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_employee_salary_list.php"><i class="fa fa-caret-right"></i>Salary List</a>
                                                        </li>



                                                        <li <?php
                                                if ($sub == "advance_add_add") {
                                                    echo "class='active open'";
                                                }
                                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Advance Salary</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "advance_add") {
                                                            echo "class='active open'";
                                                        }
                                                            ?> ><a href="accounts_advance_add.php"><i class="fa fa-caret-right"></i>Advance Salary Request</a>
                                                                </li>
                                                                <li <?php
                                                        if ($sub1 == "advance_requested") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="accounts_advance_requested.php"><i class="fa fa-caret-right"></i>Advance Requested</a>
                                                                </li>


                                                                <li <?php
                                                                if ($sub1 == "advance_paid") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_advance_paid.php"><i class="fa fa-caret-right"></i>Advance Paid</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "advance_pending") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_advance_pending.php"><i class="fa fa-caret-right"></i>Advance Pending</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                                if ($sub == "salary_final") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="salary_update.php"><i class="fa fa-caret-right"></i>Salary Update</a>
                                                        </li>


                                                        <li <?php
                                                                    if ($sub == "reports") {
                                                                        echo "class='active open'";
                                                                    }
                                                                    ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Reports</a>
                                                            <ul>

                                                                <li <?php
                                                            if ($sub1 == "report_employee_salary_list") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="accounts_report_employee_salary_list.php"><i class="fa fa-caret-right"></i>Salary List</a>
                                                                </li>


                                                                <li <?php
                                                        if ($sub1 == "report_advance_paid") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="accounts_report_advance_paid.php"><i class="fa fa-caret-right"></i>Advance Paid</a>
                                                                </li>
                                                                <li <?php
                                                                if ($sub1 == "report_advance_pending") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="accounts_report_advance_pending.php"><i class="fa fa-caret-right"></i>Advance Pending</a>
                                                                </li>



                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li <?php
                                                                if ($sub == "accounts_external_requirements") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>External Requirement</a>
                                                    <ul>
                                                        <li <?php
                                                                    if ($sub1 == "accounts_external_add") {
                                                                        echo "class='active open'";
                                                                    }
                                                                ?> ><a href="accounts_external_requirement_add.php"><i class="fa fa-caret-right"></i> Add External Requirement</a>
                                                        </li>
                                                        <li <?php
                                                                    if ($sub1 == "accounts_external_list") {
                                                                        echo "class='active open'";
                                                                    }
                                                                ?> ><a href="accounts_external_requirement_list.php"><i class="fa fa-caret-right"></i>External Requirement List</a>
                                                        </li>
														

                                                        <li <?php
                                                if ($sub1 == "accounts_hiring_requirement_list") {
                                                    echo "class='active open'";
                                                }
                                                                ?> ><a href="accounts_hiring_requirement_list.php"><i class="fa fa-caret-right"></i>Hiring Requirment List</a>
                                                        </li>

                                                    </ul>
                                                </li>


                                                <li <?php
                                                            if ($tab == "accounts_emp_settings") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Settings</a>
                                                    <ul>

                                                        <li <?php
                                                            if ($sub == "deduction") {
                                                                echo "class='active open'";
                                                            }
                                                            ?>>
                                                            <a href="#"><i class="fa fa-caret-right"></i>Deduction</a>
                                                            <ul>
                                                                <li <?php
                                                if ($sub1 == "deduction_category_add") {
                                                    echo "class='active open'";
                                                }
                                                ?> ><a href="accounts_deduction_category_add.php"><i class="fa fa-caret-right"></i>Add Deduction Category</a>
                                                                </li>
                                                                <li <?php
                                                    if ($sub1 == "deduction_category_list") {
                                                        echo "class='active open'";
                                                    }
                                                ?> ><a href="accounts_deduction_category_list.php"><i class="fa fa-caret-right"></i>Deduction Category List</a>
                                                                </li>

                                                            </ul>
                                                        </li>



                                                    </ul>
                                                </li>
                                            </ul>


                                        </li>





                                        <!--  Vehicle -->
                                        <li <?php
                                                        if ($page == "vehicle") {
                                                            echo "class='active open'";
                                                        }
                                                ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-car"></i> <span>Vehicle</span></a>
                                            <ul>
                                                <li <?php
                                                        if ($sub == "vehicle_list") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                ?>>
                                                    <a href="vehicle_list.php"><i class="fa fa-caret-right"></i> Vehicle List</a>
                                                </li>
                                                <li <?php
                                        if ($sub == "vehicle_add") {
                                            echo "class='active'";
                                        } else {
                                            echo "";
                                        }
                                        ?>>
                                                    <a href="vehicle_add.php"><i class="fa fa-caret-right"></i>Add Vehicle</a>
                                                </li>

                                            </ul>
                                        </li>


                                        <li <?php
                                        if ($page == "partner") {
                                            echo "class='active open'";
                                        }
                                        ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-user"></i> <span>Partner</span></a>
                                            <ul>
                                                <li <?php
                                                    if ($sub == "p_list") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="partner_list.php"><i class="fa fa-caret-right"></i> Partner List</a></li>
                                                <li <?php
                                                    if ($sub == "p_add") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>><a href="partner_add.php"><i class="fa fa-caret-right"></i> Add New Partner</a></li>

                                            </ul>
                                        </li>
                                        <li <?php
                                                if ($page == "sponsor") {
                                                    echo "class='active open'";
                                                }
                                                ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-money"></i> <span>Sponsorship Fee</span></a>
                                            <ul>
                                                <!--    <li <?php
                                                /* if ($sub == "s_li") {
                                                  echo "class='active'";
                                                  } else {
                                                  echo "";
                                                  } */
                                                ?>>
                                                        <a href="sponsor_list.php"><i class="fa fa-caret-right"></i> Sponsorship Fee List Company</a>
                                                    </li> -->
                                                <li <?php
                                        if ($sub == "s_li") {
                                            echo "class='active'";
                                        } else {
                                            echo "";
                                        }
                                        ?>>
                                                    <a href="sponsor_fee_list.php"><i class="fa fa-caret-right"></i> Sponsorship Fee List</a>
                                                </li>
                                                <!--<li <?php
                                                /*  if ($sub == "s_reciv") {
                                                  echo "class='active'";
                                                  } else {
                                                  echo "";
                                                  } */
                                                ?>>
                                                    <a href="sponsor_receive.php"><i class="fa fa-caret-right"></i> Recieve Sponsorship Fee</a>
                                                </li>-->
                                                <li <?php
                                                if ($sub == "s_reciv") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>>
                                                    <a href="sponsor_employee_receive.php"><i class="fa fa-caret-right"></i> Recieve Sponsorship Fee</a>
                                                </li>
                                                <!--  <li <?php
                                                /*    if ($sub == "s_recip") {
                                                  echo "class='active'";
                                                  } else {
                                                  echo "";
                                                  } */
                                                ?>><a href="sponsor_reciept.php"><i class="fa fa-caret-right"></i> Reciepts</a>
                                                  </li>-->
                                                <li <?php
                                                if ($sub == "s_recip") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="sponsor_employee_reciept.php"><i class="fa fa-caret-right"></i> Reciepts</a>
                                                </li>
                                                <!-- <li <?php
                                                /*   if ($sub == "s_pen") {
                                                  echo "class='active'";
                                                  } else {
                                                  echo "";
                                                  } */
                                                ?>><a href="sponsor_pending.php"><i class="fa fa-caret-right"></i> Pending</a>
                                                </li>-->
                                                <li <?php
                                                if ($sub == "s_pen") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="sponsor_employee_pending.php"><i class="fa fa-caret-right"></i> Pending</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li <?php
                                                if ($page == "payroll") {
                                                    echo "class='active open'";
                                                }
                                                ?>>
                                            <a role="button" tabindex="0"><i class="fa fa-money"></i> <span>Payroll</span></a>
                                            <ul>
                                                <li <?php
                                                if ($sub == "pay_list") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>>
                                                    <a href="salary_list.php"><i class="fa fa-caret-right"></i> Salary List</a>
                                                </li>
                                                <li <?php
                                        if ($sub == "pay_dispatch") {
                                            echo "class='active'";
                                        } else {
                                            echo "";
                                        }
                                        ?>>
                                                    <a href="salary_dispatch.php"><i class="fa fa-caret-right"></i> Salary Dispatch</a>
                                                </li>
                                                <li <?php
                                                if ($sub == "pay_receipt") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="salary_receipt.php"><i class="fa fa-caret-right"></i> Reciepts</a>
                                                </li>
                                                <li <?php
                                                if ($sub == "payroll_pending") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="salary_pending.php"><i class="fa fa-caret-right"></i> Pending</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li <?php
                                                if ($page == "notification") {
                                                    echo "class='active open'";
                                                }
                                                ?>>
                                            <a role="button" tabindex="0"><i class="glyphicon glyphicon-bell"></i> <span>Notifications</span>

                                            </a>
                                            <ul>
                                                <li  <?php
                                                if ($sub == "not_co") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>><a href="notification_company.php" tabindex="0"><i class="fa fa-caret-right"></i>
                                                        Company<!--<span class="label label-success"><?php //echo $CRexdate + $CCNexp;                                                                                                       ?>New</span>-->
                                                    </a>

                                                    <ul>
                                                        <li <?php
                                                if ($sub1 == "not_coall") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                ?>>
                                                            <a href="notification_company.php"><i class="fa fa-caret-right"></i> All Notifications
                                                                        <!--<span class="label label-success"><?php //echo $CRexdate;                                                           ?>new</span>-->
                                                            </a>
                                                        </li>
                                                    <?php
                                                    $sideComp = $db->selectQuery("SELECT DISTINCT `doc_title` FROM `sm_company_docs`");
                                                    if (count($sideComp)) {
                                                        for ($scm = 0; $scm < count($sideComp); $scm++) {
                                                            $sideCDoc = $sideComp[$scm]['doc_title'];
                                                            ?>
                                                                <li <?php
                                                                if ($sub1 == "not_single") {
                                                                    echo "";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>>
                                                                    <a href="company_single_notification.php?doc=<?php echo $sideCDoc; ?>"><i class="fa fa-caret-right"></i> <?php echo $sideCDoc; ?>
                                                                        <!--<span class="label label-success"><?php //echo $CRexdate;                                                             ?>new</span>-->
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>

                                                </li>
                                                <li <?php
                                                        if ($sub == "not_em") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="notification_employee.php" tabindex="0"><i class="fa fa-caret-right"></i> Employee
                                                        <!--<span class="label label-success">New</span>-->
                                                    </a>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub1 == "not_emall") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?> >
                                                            <a href="notification_employee.php" ><i class="fa fa-caret-right"></i> All Notifications
                                                                        <!--<span class="label label-success"><?php //echo $CRexdate;                                                          ?>new</span>-->
                                                            </a>
                                                        </li>
                                                <?php
                                                    $sideEmp = $db->selectQuery("SELECT DISTINCT `document_title` FROM `sm_employee_documents`");
                                                    if (count($sideComp)) {
                                                        for ($scm = 0; $scm < count($sideEmp); $scm++) {
                                                            $sideEDoc = $sideEmp[$scm]['document_title'];
                                                            ?>
                                                                <li>
                                                                    <a href="employee_single_notification.php?doc=<?php echo $sideEDoc; ?>"><i class="fa fa-caret-right"></i> <?php echo $sideEDoc; ?>
                                                                        <!--<span class="label label-success"><?php //echo $CRexdate;                                                           ?>new</span>-->
                                                                    </a>
                                                                </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                    </ul>


                                                </li>
                                                <li <?php
                                                        if ($sub == "notification_vehicle") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="" tabindex="0"><i class="fa fa-caret-right"></i> Vehicle
                                                        <!--<span class="label label-success">New</span>-->
                                                    </a>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub1 == "notification_vehicle_all") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?> >
                                                            <a href="notification_vehicle.php" ><i class="fa fa-caret-right"></i> All Notifications
                                                                <!--<span class="label label-success"><?php //echo $CRexdate;                                                          ?>new</span>-->
                                                            </a>
                                                        </li>
                                                        <li <?php
                                                    if ($sub1 == "notification_vehicle_regis") {
                                                        echo "class='active'";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?> >
                                                            <a href="notification_vehicle_registration.php" ><i class="fa fa-caret-right"></i> Registration
                                                                <!--<span class="label label-success"><?php //echo $CRexdate;                                                          ?>new</span>-->
                                                            </a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "notification_vehicle_insu") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                    ?> >
                                                            <a href="notification_vehicle_insurance.php" ><i class="fa fa-caret-right"></i> Insurance
                                                                <!--<span class="label label-success"><?php //echo $CRexdate;                                                          ?>new</span>-->
                                                            </a>
                                                        </li>

                                                    </ul>


                                                </li>
                                            </ul>
                                        </li>
                                        <li <?php
                                                        if ($page == "report") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                            <a role="button" tabindex="0"><i class="glyphicon glyphicon-list"></i> <span>Reports</span></a>
                                            <ul>
                                                <li <?php
                                                            if ($sub == "r_co") {
                                                                echo "class='active'";
                                                            } else {
                                                                echo "";
                                                            }
                                                        ?>><a href="report_company.php"><i class="fa fa-caret-right"></i> Company List</a></li>
                                                <li <?php
                                                            if ($sub == "r_em") {
                                                                echo "class='active'";
                                                            } else {
                                                                echo "";
                                                            }
                                                        ?>><a href="report_employee.php"><i class="fa fa-caret-right"></i> Employee List</a></li>
                                                <li <?php
                                            if ($sub == "r_pa") {
                                                echo "class='active'";
                                            } else {
                                                echo "";
                                            }
                                                        ?>><a href="report_partner.php"><i class="fa fa-caret-right"></i> Partner List</a></li>

                                                <li <?php
                                                if ($sub == "report_shead") {
                                                    echo "class='active open'";
                                                }
                                                        ?>>
                                                    <a role="button" tabindex="0"><i class="fa fa-caret-right"></i>Sponsorship Fee</a>
                                                    <ul>
                                                        <li <?php
                                                if ($sub1 == "report_spfee") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                        ?>><a href="report_employee_fee.php"><i class="fa fa-caret-right"></i> Sponsorship Fee List</a>
                                                        </li>
                                                        <li <?php
                                                if ($sub1 == "report_spon_pending") {
                                                    echo "class='active'";
                                                } else {
                                                    echo "";
                                                }
                                                        ?>><a href="report_pending_sponsorfee.php"><i class="fa fa-caret-right"></i>Pending Sponsorship Fee List</a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "report_spon_receipt") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_sponsorfee_receipt.php"><i class="fa fa-caret-right"></i> Sponsorship Fee Receipt List</a>
                                                        </li>
                                                    </ul>

                                                <li <?php
                                                        if ($sub == "r_pay") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                    <a role="button" tabindex="0"><i class="fa fa-caret-right"></i>Payroll</a>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub1 == "report_payroll") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_payroll.php"><i class="fa fa-caret-right"></i>Salary List</a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "report_pending") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_pending_salary.php"><i class="fa fa-caret-right"></i>Pending Salary List</a>
                                                        </li>
                                                        <li <?php
                                                        if ($sub1 == "report_receipt") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_salary_receipt.php"><i class="fa fa-caret-right"></i> Salary Receipt List</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li <?php
                                                        if ($sub == "r_ve") {
                                                            echo "class='active'";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>><a href="report_vehicle.php"><i class="fa fa-caret-right"></i> Vehicle List</a></li>
                                            </ul>
                                        </li>


                                        <li <?php
                                                        if ($page == "archive") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                            <a role="button" tabindex="0"><i class="glyphicon glyphicon-trash"></i> <span>Archive</span></a>
                                            <ul>
                                                <li <?php
                                                if ($sub == "comp") {
                                                    echo "class='active'";
                                                }
                                                ?> ><a href="archive_company.php"><i class="fa fa-caret-right"></i> Company Archive</a></li>
                                                <li <?php
                                                    if ($sub == "emp") {
                                                        echo "class='active'";
                                                    }
                                                ?> ><a href="archive_employee.php"><i class="fa fa-caret-right"></i> Employee Archive</a></li>
                                                <li <?php
                                        if ($sub == "part") {
                                            echo "class='active'";
                                        }
                                        ?> ><a href="archive_partner.php"><i class="fa fa-caret-right"></i> Partner Archive</a></li>
                                                <li <?php
                                        if ($sub == "veh") {
                                            echo "class='active'";
                                        }
                                        ?> ><a href="vehicle_archive.php"><i class="fa fa-caret-right"></i> Vehicle Archive</a></li>

                                                <li <?php
                                                if ($sub1 == "recruit_archive") {
                                                    echo "class='active open'";
                                                }
                                                ?> ><a href="agent_archive.php"><i class="fa fa-caret-right"></i>Recruitment Archive</a>
                                                    <ul>
                                                        <li <?php
                                                if ($sub == "agent") {
                                                    echo "class='active'";
                                                }
                                                ?> ><a href="agent_archive.php"><i class="fa fa-caret-right"></i>Agent Archive</a></li>
                                                        <li <?php
                                                if ($sub == "inter") {
                                                    echo "class='active'";
                                                }
                                                ?> ><a href="archive_interview.php"><i class="fa fa-caret-right"></i>Interview Archive</a></li>
                                                        <li <?php
                                                if ($sub == "candi") {
                                                    echo "class='active'";
                                                }
                                                ?> ><a href="archive_candidate.php"><i class="fa fa-caret-right"></i>Candidate Archive</a></li>
                                                        <li <?php
                                                    if ($sub == "candi_sel") {
                                                        echo "class='active'";
                                                    }
                                                ?> ><a href="archive_selcandidate.php"><i class="fa fa-caret-right"></i>Selected Candidates</a></li>
                                                        <li <?php
                                                        if ($sub == "candi_test") {
                                                            echo "class='active'";
                                                        }
                                                ?> ><a href="archive_retest.php"><i class="fa fa-caret-right"></i>Retest Candidates</a></li>
                                                        <li <?php
                                                        if ($sub == "candi_rej") {
                                                            echo "class='active'";
                                                        }
                                                ?> ><a href="archive_reject.php"><i class="fa fa-caret-right"></i>Rejected Candidates</a></li>
                                                    </ul></li>


                                                <!-- <li
                                                        <?php
                                                            /*  if ($sub == "sponfee") {
                                                              echo "class='active'";
                                                              } */
                                                            ?> ><a href="archive_sponsorfee.php"><i class="fa fa-caret-right"></i> Sponsorship Archive</a>
                                                 </li>-->
                                                <li
                                                        <?php
                                                        if ($sub == "sponsor_fee") {
                                                            echo "class='active'";
                                                        }
                                                        ?> ><a href="archive_employee_sponsorfee.php"><i class="fa fa-caret-right"></i> Sponsorship Archive</a>
                                                </li>
                                                <!-- <li
<?php
/* if ($sub == "payroll_arc") {
  echo "class='active'";
  } */
?> ><a href="archive_employee_payroll.php"><i class="fa fa-caret-right"></i> Payroll Archive</a>
                                                 </li>-->
                                            </ul>
                                        </li>
                                        <li <?php
                                                if ($page == "settings") {
                                                    echo "class='active open'";
                                                }
                                                ?>>
                                            <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Settings</span></a>
                                            <ul>

                                                <li <?php
                                                if ($tab == "com") {
                                                    echo "class='active open'";
                                                }
                                                ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Company</a>
                                                    <ul>
                                                        <li <?php
                                                if ($sub == "designation") {
                                                    echo "class='active open'";
                                                }
                                                ?> ><a href="#"><i class="fa fa-caret-right"></i>Designation</a>
                                                            <ul>
                                                                <li <?php
                                        if ($sub1 == "designation_list") {
                                            echo "class='active'";
                                        }
                                                ?> ><a href="designation_list.php"><i class="fa fa-caret-right"></i>Designation List</a>
                                                                </li>
                                                                <li <?php
                                                    if ($sub1 == "designation_add") {
                                                        echo "class='active'";
                                                    }
                                                    ?> ><a href="designation_add.php"><i class="fa fa-caret-right"></i>Add Designation </a></li>

                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </li>
                                                <li <?php
                                                                if ($tab == "notif_settings") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Notifications</a>
                                                    <ul>
                                                        <li <?php
                                                                if ($sub == "company_noti") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="set_company_notification.php"><i class="fa fa-caret-right"></i>Company Notification</a>

                                                        </li>
                                                        <li <?php
                                                                if ($sub == "employee_noti") {
                                                                    echo "class='active open'";
                                                                }
                                                                ?> ><a href="set_employee_notification.php"><i class="fa fa-caret-right"></i>Employee Notification</a>

                                                        </li>
                                                        <li <?php
                                                if ($sub == "vehicle_noti") {
                                                    echo "class='active open'";
                                                }
                                                                ?> ><a href="set_vehicle_notification.php"><i class="fa fa-caret-right"></i>Employee Notification</a>

                                                        </li>
                                                    </ul>
                                                </li>

                                                <li <?php
                                                        if ($tab == "veh") {
                                                            echo "class='active open'";
                                                        }
                                                        ?>>
                                                    <a href="#"><i class="fa fa-caret-right"></i>Vehicle</a>
                                                    <ul>
                                                        <li <?php
                                                        if ($sub == "manufacturer") {
                                                            echo "class='active open'";
                                                        }
                                                        ?> ><a href="#"><i class="fa fa-caret-right"></i>Manufacturer</a>
                                                            <ul>
                                                                <li <?php
                                                        if ($sub1 == "manufacturer_list") {
                                                            echo "class='active'";
                                                        }
                                                        ?> ><a href="manufacturer_list.php"><i class="fa fa-caret-right"></i>Manufacturer List</a></li>

                                                                <li <?php
                                                    if ($sub1 == "manufacturer_add") {
                                                        echo "class='active'";
                                                    }
                                                    ?> ><a href="manufacturer_add.php"><i class="fa fa-caret-right"></i>Add Manufacturer</a></li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                            if ($sub == "model") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Model</a>
                                                            <ul>
                                                                <li <?php
                                                                    if ($sub1 == "model_list") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="model_list.php"><i class="fa fa-caret-right"></i>Model List</a></li>

                                                                <li <?php
                                                                    if ($sub1 == "model_add") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="model_add.php"><i class="fa fa-caret-right"></i>Model Add</a></li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                            if ($sub == "insurance_company") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Insurance Company</a>
                                                            <ul>
                                                                <li <?php
                                                                    if ($sub1 == "insurance_company_list") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="insurance_company_list.php"><i class="fa fa-caret-right"></i>Insurance Company List</a></li>

                                                                <li <?php
                                                                    if ($sub1 == "insurance_company_add") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="insurance_company_add.php"><i class="fa fa-caret-right"></i>Insurance Company Add</a></li>
                                                            </ul>
                                                        </li>
                                                        <li <?php
                                                            if ($sub == "insurance_type") {
                                                                echo "class='active open'";
                                                            }
                                                            ?> ><a href="#"><i class="fa fa-caret-right"></i>Insurance Type</a>
                                                            <ul>
                                                                <li <?php
                                                                    if ($sub1 == "insurance_list") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="insurance_list.php"><i class="fa fa-caret-right"></i>Insurance Type List</a></li>

                                                                <li <?php
                                                                    if ($sub1 == "insurance_type_add") {
                                                                        echo "class='active'";
                                                                    }
                                                                    ?> ><a href="insurance_type_add.php"><i class="fa fa-caret-right"></i>Insurance Type Add</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li <?php
                                                                if ($page == "calendar") {
                                                                    echo "class='active'";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><a href="calendar.php"><i class="fa fa-calendar-o"></i> <span>Calendar</span> </a></li>


                                        </ul>
                                        <!--/ NAVIGATION Content -->
                                    </div>
                                </div>
                            </div>
                            <div class="panel charts panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarCharts">
                                            Salary Summary <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarCharts" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="summary">
                                            <div class="media">
                                                <a class="pull-right" role="button" tabindex="0">
                                                    <!--<span class="sparklineChart"
                                                          values="5, 8, 3, 4, 6, 2, 1, 9, 7"
                                                          sparkType="bar"
                                                          sparkBarColor="#92424e"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                        Loading...</span>--->
                                                </a>
                                                <div class="media-body">
                                                    This Month Salary Dispatched
<?php
$feew = 0;
$thisMonthw = date('m');
$thisYearw = date("Y");
$spFeew = $db->selectQuery("SELECT * FROM `sm_payroll` WHERE MONTH(payroll_date)='$thisMonthw' AND YEAR(payroll_date)='$thisYearw' AND `payroll_status`='Paid'");
if (count($spFeew)) {

    for ($spa = 0; $spa < count($spFeew); $spa++) {
        $spaFeew = $spFeew[$spa]['salary'];
        $feew = $feew + $spaFeew;
    }
}
?>
                                                    <h4 class="media-heading"><?php echo $feew; ?></h4>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="pull-right" role="button" tabindex="0">
                                                    <!--<span class="sparklineChart"
                                                          values="2, 4, 5, 3, 8, 9, 7, 3, 5"
                                                          sparkType="bar"
                                                          sparkBarColor="#397193"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                        Loading...</span>-->
                                                </a>
                                                <div class="media-body">
                                                    This Month Salary Pending
                                                    <?php
                                                    $feew1 = 0;
                                                    $spFeew1 = $db->selectQuery("SELECT * FROM `sm_payroll` WHERE MONTH(payroll_date)='$thisMonthw' AND YEAR(payroll_date)='$thisYearw' AND `payroll_status`='Not Paid'");
                                                    if (count($spFeew1)) {

                                                        for ($spa = 0; $spa < count($spFeew1); $spa++) {
                                                            $spaFeew1 = $spFeew1[$spa]['salary'];
                                                            $feew1 = $feew1 + $spaFeew1;
                                                        }
                                                    }
                                                    ?>
                                                    <h4 class="media-heading"><?php echo $feew1; ?></h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel settings panel-default">
                                <!-- <div class="panel-heading" role="tab">
                                     <h4 class="panel-title">
                                         <a data-toggle="collapse" href="#sidebarControls">
                                             General Settings <i class="fa fa-angle-up"></i>
                                         </a>
                                     </h4>
                                 </div>
                                 <div id="sidebarControls" class="panel-collapse collapse in" role="tabpanel">
                                     <div class="panel-body">
                                         <div class="form-group">
                                             <div class="row">
                                                 <label class="col-xs-8 control-label">Switch ON</label>
                                                 <div class="col-xs-4 control-label">
                                                     <div class="onoffswitch greensea">
                                                         <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-on" checked="">
                                                         <label class="onoffswitch-label" for="switch-on">
                                                             <span class="onoffswitch-inner"></span>
                                                             <span class="onoffswitch-switch"></span>
                                                         </label>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <div class="row">
                                                 <label class="col-xs-8 control-label">Switch OFF</label>
                                                 <div class="col-xs-4 control-label">
                                                     <div class="onoffswitch greensea">
                                                         <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-off">
                                                         <label class="onoffswitch-label" for="switch-off">
                                                             <span class="onoffswitch-inner"></span>
                                                             <span class="onoffswitch-switch"></span>
                                                         </label>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>--->
                            </div>
                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->

                <!-- =================================================
                ================= RIGHTBAR Content ===================
                ================================================== -->

                <!--/ RIGHTBAR Content -->




            </div>
            <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->