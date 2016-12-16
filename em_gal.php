<?php
$page = "employee";
$sub = "e_list";
include('file_parts/header.php');
$id = $_GET['uid'];

$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");
if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_dob = $resEmp[0]['employee_dob'];
    $employee_remarks = $resEmp[0]['employee_remarks'];
    $employee_peraddress1 = $resEmp[0]['employee_peraddress1'];
    $employee_peraddress2 = $resEmp[0]['employee_peraddress2'];
    $employee_perdoor = $resEmp[0]['employee_perdoor'];
    $employee_percity = $resEmp[0]['employee_percity'];
    $employee_perstate = $resEmp[0]['employee_perstate'];
    $employee_perzip = $resEmp[0]['employee_perzip'];
    $employee_resiaddress1 = $resEmp[0]['employee_resiaddress1'];
    $employee_resiaddress2 = $resEmp[0]['employee_resiaddress2'];
    $employee_residoor = $resEmp[0]['employee_residoor'];
    $employee_resicity = $resEmp[0]['employee_resicity'];
    $employee_resistate = $resEmp[0]['employee_resistate'];
    $employee_zip = $resEmp[0]['employee_zip'];
    $employee_email = $resEmp[0]['employee_email'];
    $employee_phone = $resEmp[0]['employee_phone'];
    $employee_emcontact = $resEmp[0]['employee_emcontact'];
    $sponsor_id = $resEmp[0]['sponsor_id'];
}
//$cont = mysql_query("select * from country where id = $con_id");
//$cont_fetch = mysql_fetch_array($cont);
?>


<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Employee Profile<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="employee_list.php">Employee</a>
                    </li>
                    <li>
                        Employee Profile
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">






                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img class="img-circle" src="assets/images/arnold-avatar.jpg" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo $employee_firstname; ?></strong> <?php echo $employee_lastname; ?></h4>
                            <span class="text-muted"><?php echo $employee_designation; ?></span>
                            <!--                            <div class="mt-10">
                                                            <button class="btn btn-rounded-20 btn-sm btn-greensea">Follow</button>
                                                            <button class="btn btn-rounded-20 btn-sm btn-lightred">Message</button>
                                                        </div>-->

                        </div>
                        <!-- /tile widget -->

                        <!-- tile body -->
                        <!--                        <div class="tile-body text-center bg-blue p-0">

                                                    <ul class="list-inline tbox m-0">
                                                        <li class="tcol p-10">
                                                            <h2 class="m-0">695</h2>
                                                            <span class="text-transparent-white">Tweets</span>
                                                        </li>
                                                        <li class="tcol bg-blue dker p-10">
                                                            <h2 class="m-0">1 269</h2>
                                                            <span class="text-transparent-white">Followers</span>
                                                        </li>
                                                        <li class="tcol p-10">
                                                            <h2 class="m-0">369</h2>
                                                            <span class="text-transparent-white">Following</span>
                                                        </li>
                                                    </ul>

                                                </div>-->
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->


                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile header -->
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> <?php echo $employee_firstname; ?> <span></span> <?php echo $employee_lastname; ?> </h1>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body">

<!--                            <p>
                                <a href="#" class="myIcon icon-info icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="myIcon icon-primary icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="myIcon icon-lightred icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="myIcon icon-hotpink icon-ef-3 icon-ef-3b icon-color"><i class="fa fa-dribbble"></i></a>
                            </p>-->

                            <p class="text-default lt"><?php echo $employee_remarks; ?></p>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile header -->
                        <!--                        <div class="tile-header">
                                                    <h1 class="custom-font"><strong>Friend</strong> List</h1>
                                                </div>-->
                        <!-- /tile header -->

                        <!-- tile body -->
                        <!--
                                                    </div>

                                                    <hr/>



                                                </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
                    <!--
                                        </section>-->
                    <!-- /tile -->


                </div>
                <!-- /col -->






                <!-- col -->
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a style="color:#16a085;" href="employee_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a></li>
                                    <li role="presentation"><a href="employee_edit.php?uid=<?php echo $_GET['uid'] ?>">Edit</a></li>
                                    <li role="presentation"><a href="em_gal.php?uid=<?php echo $_GET['uid'] ?>">Downloads</a></li>
                                </ul>
                                <div style="padding: 12px">

                                </div>
                                <!-- Nav tabs -->
                                <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                <!--                                </ul>-->

                                <!-- Tab panes -->
                                <div class="tab-content">



                                    <div role="tabpanel" class="tab-pane" id="settingsTab">

                                        <ul class="mix-controls">
                                            <li class="select-all">
                                                <label class="checkbox checkbox-custom checkbox-custom inline-block m-0">
                                                    <input type="checkbox"><i></i> Select all
                                                </label>
                                            </li>
                                            <li class="mix-control disabled">
                                                <a href="javascript:;"><i class="fa fa-envelope-o"></i> Email</a>
                                            </li>
                                            <li class="mix-control disabled">
                                                <a  class="download_btn"><i class="fa fa-download"></i> Download</a>
                                            </li>
                                            <li class="mix-control disabled">
                                                <a href="javascript:;"><i class="fa fa-pencil"></i> Edit</a>
                                            </li>
                                            <li class="mix-control disabled">
                                                <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="col4">
                                                <!-- row -->
                                                <div class="row mix-grid">
                                                    <div class="gallery" data-lightbox="gallery">
                                                        <!-- col -->
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" alt="" src="http://lorempixel.com/800/600/cats/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Sed ut perspiciatis unde</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/1" title="Sed ut perspiciatis unde">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/2" alt="" src="http://lorempixel.com/800/600/cats/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Quis autem vel eum iure</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/2" title="Quis autem vel eum iure">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/3" alt="" src="http://lorempixel.com/800/600/cats/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/3" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/4" alt="" src="http://lorempixel.com/800/600/cats/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/4" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/5" alt="" src="http://lorempixel.com/800/600/cats/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Et harum quidem rerum</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/5" title="Et harum quidem rerum">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/6" alt="" src="http://lorempixel.com/800/600/animals/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nemo enim ipsam voluptatem</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/6" title="Nemo enim ipsam voluptatem">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/7" alt="" src="http://lorempixel.com/800/600/animals/7">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">At vero eos et accusamus</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/7" title="At vero eos et accusamus">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/8" alt="" src="http://lorempixel.com/800/600/animals/8">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Itaque earum rerum hic tenetur</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/8" title="Itaque earum rerum hic tenetur">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/9" alt="" src="http://lorempixel.com/800/600/animals/9">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Ut enim ad minima veniam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/9" title="Ut enim ad minima veniam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/10" alt="" src="http://lorempixel.com/800/600/animals/10">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/10" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/1" alt="" src="http://lorempixel.com/800/600/city/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/1" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/2" alt="" src="http://lorempixel.com/800/600/city/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/2" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/3" alt="" src="http://lorempixel.com/800/600/city/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/3" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/4" alt="" src="http://lorempixel.com/800/600/city/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/4" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/5" alt="" src="http://lorempixel.com/800/600/city/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/5" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-4 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/6" alt="" src="http://lorempixel.com/800/600/city/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/6" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /col -->



                                                    </div>

                                                </div>
                                                <!-- /row -->

                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="col3">

                                                <!-- row -->
                                                <div class="row mix-grid">

                                                    <div class="gallery" data-lightbox="gallery">



                                                        <!-- col -->
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" alt="" src="http://lorempixel.com/800/600/cats/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Sed ut perspiciatis unde</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/1" title="Sed ut perspiciatis unde">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/2" alt="" src="http://lorempixel.com/800/600/cats/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Quis autem vel eum iure</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/2" title="Quis autem vel eum iure">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/3" alt="" src="http://lorempixel.com/800/600/cats/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/3" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/4" alt="" src="http://lorempixel.com/800/600/cats/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/4" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/5" alt="" src="http://lorempixel.com/800/600/cats/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Et harum quidem rerum</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/5" title="Et harum quidem rerum">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/6" alt="" src="http://lorempixel.com/800/600/animals/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nemo enim ipsam voluptatem</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/6" title="Nemo enim ipsam voluptatem">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/7" alt="" src="http://lorempixel.com/800/600/animals/7">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">At vero eos et accusamus</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/7" title="At vero eos et accusamus">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/8" alt="" src="http://lorempixel.com/800/600/animals/8">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Itaque earum rerum hic tenetur</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/8" title="Itaque earum rerum hic tenetur">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/9" alt="" src="http://lorempixel.com/800/600/animals/9">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Ut enim ad minima veniam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/9" title="Ut enim ad minima veniam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/10" alt="" src="http://lorempixel.com/800/600/animals/10">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/10" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/1" alt="" src="http://lorempixel.com/800/600/city/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/1" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/2" alt="" src="http://lorempixel.com/800/600/city/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/2" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/3" alt="" src="http://lorempixel.com/800/600/city/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/3" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/4" alt="" src="http://lorempixel.com/800/600/city/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/4" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/5" alt="" src="http://lorempixel.com/800/600/city/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/5" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/6" alt="" src="http://lorempixel.com/800/600/city/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/6" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /col -->



                                                    </div>

                                                </div>
                                                <!-- /row -->

                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="col2">

                                                <!-- row -->
                                                <div class="row mix-grid">

                                                    <div class="gallery" data-lightbox="gallery">



                                                        <!-- col -->
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" alt="" src="http://lorempixel.com/800/600/cats/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Sed ut perspiciatis unde</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/1" title="Sed ut perspiciatis unde">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/2" alt="" src="http://lorempixel.com/800/600/cats/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Quis autem vel eum iure</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/2" title="Quis autem vel eum iure">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/3" alt="" src="http://lorempixel.com/800/600/cats/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/3" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/4" alt="" src="http://lorempixel.com/800/600/cats/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/4" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cats">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/cats/5" alt="" src="http://lorempixel.com/800/600/cats/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Et harum quidem rerum</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/cats/5" title="Et harum quidem rerum">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/6" alt="" src="http://lorempixel.com/800/600/animals/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nemo enim ipsam voluptatem</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/6" title="Nemo enim ipsam voluptatem">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/7" alt="" src="http://lorempixel.com/800/600/animals/7">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">At vero eos et accusamus</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/7" title="At vero eos et accusamus">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/8" alt="" src="http://lorempixel.com/800/600/animals/8">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Itaque earum rerum hic tenetur</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/8" title="Itaque earum rerum hic tenetur">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/9" alt="" src="http://lorempixel.com/800/600/animals/9">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Ut enim ad minima veniam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/9" title="Ut enim ad minima veniam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all animals">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/animals/10" alt="" src="http://lorempixel.com/800/600/animals/10">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Temporibus autem quibusdam</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/animals/10" title="Temporibus autem quibusdam">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/1" alt="" src="http://lorempixel.com/800/600/city/1">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/1" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/2" alt="" src="http://lorempixel.com/800/600/city/2">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/2" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/3" alt="" src="http://lorempixel.com/800/600/city/3">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/3" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/4" alt="" src="http://lorempixel.com/800/600/city/4">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/4" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/5" alt="" src="http://lorempixel.com/800/600/city/5">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Neque porro quisquam est</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/5" title="Neque porro quisquam est">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-20 mix mix_all cities">
                                                            <div class="img-container">
                                                                <img class="img-responsive" ng-src="http://lorempixel.com/800/600/city/6" alt="" src="http://lorempixel.com/800/600/city/6">
                                                                <div class="img-details">
                                                                    <h4 class="custom-font ng-binding">Nam libero tempore</h4>
                                                                    <div class="img-controls">
                                                                        <a href="javascript:;" class="img-select">
                                                                            <i class="fa fa-circle-o"></i>
                                                                            <i class="fa fa-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-link">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                        <a class="img-preview" data-lightbox="gallery-item" href="http://lorempixel.com/800/600/city/6" title="Nam libero tempore">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="img-more">
                                                                            <i class="fa fa-ellipsis-v"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /col -->



                                                    </div>

                                                </div>
                                                <!-- /row -->

                                            </div>


                                        </div>


                                    </div>

                                </div>
                                <!-- /tile body -->

                                </section>
                                <!-- /tile -->




                            </div>
                            <!-- /col -->











                        </div>
                        <!-- /row -->



                </div>
                <!-- /page content -->

            </div>

            </section>
            <!--/ CONTENT -->







        </div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="assets/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
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

            });
        </script>
        <!--/ Page Specific Scripts -->





        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function (b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                        function () {
                            (b[l].q = b[l].q || []).push(arguments)
                        });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = '../../www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');
        </script>

        </body>

        <!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
        </html>


        <script src="assets/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/parsley/parsley.min.js"></script>
        <script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
        <!-- The basic File Upload plugin -->

