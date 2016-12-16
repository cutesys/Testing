<?php
include('file_parts/header.php');
$id = $_GET['uid'];

$sql = mysql_query("select * from sm_employee where employee_id=$id");

$val = mysql_fetch_array($sql);
$con_id = $val['employee_nationality'];

//$cont = mysql_query("select * from country where id = $con_id");
//$cont_fetch = mysql_fetch_array($cont);
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Profile Page</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i> Minovate</a>
                    </li>
                    <li>
                        <a href="#">Extra Pages</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile Page</a>
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
                            <h4 class="mb-0"><strong><?php echo $val['employee_firstname']; ?></strong> <?php echo $val['employee_lastname']; ?></h4>
                            <span class="text-muted"><?php echo $val['employee_designation']; ?></span>
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
                            <h1 class="custom-font"><strong>About</strong> Me</h1>
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

                            <p class="text-default lt"><?php echo $val['employee_remarks']; ?></p>

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
                        <!--                        <div class="tile-body">

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>

                                                    <hr/>

                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>

                                                </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                    <!-- tile -->
<!--                    <section class="tile tile-simple">

                         tile header
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>My</strong> Projects</h1>
                        </div>
                         /tile header

                         tile body
                        <div class="tile-body">

                            <ul class="list-unstyled">

                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Minimal
                                        </div>
                                        <div class="col-md-9">
                                            <div class="progress progress-striped not-rounded">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                                                    56%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Minoral
                                        </div>
                                        <div class="col-md-9">
                                            <div class="progress progress-striped not-rounded">
                                                <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    90%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            The Kamarel
                                        </div>
                                        <div class="col-md-9">
                                            <div class="progress progress-striped not-rounded">
                                                <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100" style="width: 36%">
                                                    36%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Themeforest
                                        </div>
                                        <div class="col-md-9">
                                            <div class="progress progress-striped not-rounded">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width: 8%">
                                                    8%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                            </ul>


                        </div>
                         /tile body

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

                                <div style="padding: 12px">


                                    <form method="post" action="employee_edit.php">


                                        <div class="wrap-reset">

                                            <form class="profile-settings">

                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Personal</strong> Settings</h4>
                                                        <p>Your personal account settings</p>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-4">
                                                        <label for="first-name">First Name</label>
                                                        <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $val['employee_firstname']; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-4">
                                                        <label for="last-name">Middle Name</label>
                                                        <input type="text" class="form-control" name="m_name" id="m_name" value="<?php echo $val['employee_middlename']; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-4">
                                                        <label for="last-name">Last Name</label>
                                                        <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $val['employee_lastname']; ?>">
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <label for="address1">Permanent Address</label>
                                                        <input type="text" class="form-control" name="p_address" id="p_address" value="<?php echo $val['employee_peraddress1']; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="address2">Temporary Address</label>
                                                        <input type="text" class="form-control" name="t_address" id="t_address" value="<?php echo $val['employee_resiaddress1']; ?>">
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-4">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" name="city"  id="city" value="<?php echo $val['employee_percity']; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label for="state">State/Provice</label>
                                                        <input type="text" class="form-control" name="state" id="state" value="<?php echo $val['employee_perstate']; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label for="zip">Zip Code</label>
                                                        <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $val['employee_perzip']; ?>">
                                                    </div>

                                                </div>







                                                <div class="row">

                                                    <div class="form-group col-sm-4">
                                                        <label for="city">Qatar Id</label>
                                                        <input type="text" class="form-control" name="q_id" id="q_id" value="<?php echo $val['employee_qatar']; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label for="state">Qatar ID Issued</label>


                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type="text" class="form-control" name="qid_issued" id="qid_issued" value="<?php echo $val['employee_qatar_start']; ?>">
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>


                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label for="zip">Qatar Id Expiry</label>

                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type="text" class="form-control" name="qid_expired" id="qid_expired" value="<?php echo $val['employee_qatar_end']; ?>">
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="row">


                                                    <div class="form-group col-sm-6">
                                                        <label for="state">Gender</label>
<!--                                                            <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $val['employee_gender']; ?>">-->
                                                        </br>
                                                        <?php $gender = $val['employee_gender']; ?>

                                                        <label class="radio-inline"><input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? "checked" : ""; ?>/>Male</label>
                                                        <label class="radio-inline"><input type="radio" name="gender" value="female"<?php echo ($gender == 'female') ? "checked" : ""; ?>/>Fe-male</label>


                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="zip">DOB</label>

                                                        <div class='input-group datepicker' data-format="L">
                                                            <input type="text" class="form-control" name="dob"  id="dob" value="<?php echo $val['employee_dob']; ?>">
                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                        </div>

                                                    </div>

                                                </div>




                                                <?php
                                                //    $cid= $val['employee_company'];
                                                //  echo $cid;exit;
                                                // $company_name=  mysql_query("select * from sm_company where company_id=$cid");
                                                // $name =  mysql_fetch_array($company_name);
                                                ?>
                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Company</label>
                                                        <input type="text" class="form-control" name="company" id="company" value="<?php echo $val['employee_company'] ?>">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Designation</label>
                                                        <input type="text" class="form-control"  name="desig"  value="<?php echo $val['employee_designation']; ?>">
                                                    </div>




                                                </div>






                                                <div class="row">

                                                    <!--                                                                <div class="form-group col-sm-6">
                                                                                                                        <label for="email">E-mail</label>
                                                                                                                        <input type="email" class="form-control" id="email" value="johny.d@tattek.com" readonly>
                                                                                                                    </div>-->

                                                    <div class="form-group col-sm-6">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $val['employee_email']; ?>">
                                                    </div>


                                                    <div class="form-group col-sm-6">
                                                        <label for="Nationality">Nationality</label>
                                                        <?php //$category_name = $db->selectQuery("SELECT * FROM `" . $db->db_prefix . "library_category` where id=$cat_id");  ?>



                                                        <select name="country"class="form-control">
                                                            <option selected="selected" value="<?php //echo $cont_fetch['id'];         ?>"><?php //echo $cont_fetch['nicename'];         ?></option>
                                                            <?php
                                                            $sql = mysql_query("SELECT * FROM country");
                                                            while ($row = mysql_fetch_array($sql)) {
                                                                ?>
                                                                <option value="<?php echo $row['id']; ?>" <?php if ($con_id == $row['id']) { ?> selected=""<?php } ?>><?php echo $row['nicename']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>


    <!--                                                                    <input type="email" class="form-control" id="email" value="<?php echo $val['employee_nationality']; ?>">-->
                                                    </div>




                                                </div>




                                                <?php
//  $count1= mysql_query("SELECT COUNT(DISTINCT document_title) as num FROM sm_employee_documents");
//  $re= mysql_fetch_array($count1);
//   $docc=  mysql_query("select * from sm_employee_documents where employee_id=$id");
                                                $docc = $db->selectQuery("select * from sm_employee_documents where employee_id=$id and status=1");
// $doc_detailss=  mysql_fetch_array($docc);
                                                for ($i = 0; $i < count($docc); $i++) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="form-group col-sm-4">


                                                            <input type="text" name="emp_docs[<?php echo $i; ?>][document_title]" value="<?php echo $docc[$i]['document_title']; ?>"  class="form-control addt_text"
                                                                   style="background-color: #fff;border-color:#fff; cursor: default;margin-top:-14px;">

                                                            </label>



                                                            <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_data]" id="pass_id" value="<?php echo $docc[$i]['document_data']; ?>">
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="city">Issued Date</label>

                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_start_date]" id="pass_start" value="<?php echo $docc[$i]['document_start_date']; ?>">
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-4">
                                                            <label for="state">Expiry Date</label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_end_date]" id="pass_end" value="<?php echo $docc[$i]['document_end_date']; ?>">
                                                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                            </div>



                                                        </div>

                                                    </div>

                                                <?php } ?>



                                                <input type="hidden" name="idd" value="<?php echo $id; ?>">


                                                <input type="submit" class="btn btn-info" name="save" value="Save">

                                                </div>

                                            </form>
                                        </div>
                                        <!-- Nav tabs -->
                                        <!--                                <ul class="nav nav-tabs tabs-dark" role="tablist">-->
                                        <!--                                              <li role="presentation" class="active"><a href="#feedTab" aria-controls="feedTab" role="tab" data-toggle="tab">Feed</a></li>-->
                                        <!--                                    <li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Settings</a></li>-->
                                        <!--                                </ul>-->

                                        <!-- Tab panes -->
                                        <div class="tab-content">



                                            <div role="tabpanel" class="tab-pane" id="settingsTab">
                                                <form method="post" action="employee_edit.php">


                                                    <div class="wrap-reset">

                                                        <form class="profile-settings">

                                                            <div class="row">
                                                                <div class="form-group col-md-12 legend">
                                                                    <h4><strong>Personal</strong> Settings</h4>
                                                                    <p>Your personal account settings</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-sm-4">
                                                                    <label for="first-name">First Name</label>
                                                                    <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $val['employee_firstname']; ?>">
                                                                </div>


                                                                <div class="form-group col-sm-4">
                                                                    <label for="last-name">Middle Name</label>
                                                                    <input type="text" class="form-control" name="m_name" id="m_name" value="<?php echo $val['employee_middlename']; ?>">
                                                                </div>


                                                                <div class="form-group col-sm-4">
                                                                    <label for="last-name">Last Name</label>
                                                                    <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $val['employee_lastname']; ?>">
                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address1">Permanent Address</label>
                                                                    <input type="text" class="form-control" name="p_address" id="p_address" value="<?php echo $val['employee_peraddress1']; ?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="address2">Temporary Address</label>
                                                                    <input type="text" class="form-control" name="t_address" id="t_address" value="<?php echo $val['employee_resiaddress1']; ?>">
                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-sm-4">
                                                                    <label for="city">City</label>
                                                                    <input type="text" class="form-control" name="city"  id="city" value="<?php echo $val['employee_percity']; ?>">
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label for="state">State/Provice</label>
                                                                    <input type="text" class="form-control" name="state" id="state" value="<?php echo $val['employee_perstate']; ?>">
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label for="zip">Zip Code</label>
                                                                    <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $val['employee_perzip']; ?>">
                                                                </div>

                                                            </div>







                                                            <div class="row">

                                                                <div class="form-group col-sm-4">
                                                                    <label for="city">Qatar Id</label>
                                                                    <input type="text" class="form-control" name="q_id" id="q_id" value="<?php echo $val['employee_qatar']; ?>">
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label for="state">Qatar ID Issued</label>


                                                                    <div class='input-group datepicker' data-format="L">
                                                                        <input type="text" class="form-control" name="qid_issued" id="qid_issued" value="<?php echo $val['employee_qatar_start']; ?>">
                                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                    </div>


                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label for="zip">Qatar Id Expiry</label>

                                                                    <div class='input-group datepicker' data-format="L">
                                                                        <input type="text" class="form-control" name="qid_expired" id="qid_expired" value="<?php echo $val['employee_qatar_end']; ?>">
                                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="row">


                                                                <div class="form-group col-sm-6">
                                                                    <label for="state">Gender</label>
        <!--                                                            <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $val['employee_gender']; ?>">-->
                                                                    </br>
                                                                    <?php $gender = $val['employee_gender']; ?>

                                                                    <label class="radio-inline"><input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? "checked" : ""; ?>/>Male</label>
                                                                    <label class="radio-inline"><input type="radio" name="gender" value="female"<?php echo ($gender == 'female') ? "checked" : ""; ?>/>Fe-male</label>


                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="zip">DOB</label>

                                                                    <div class='input-group datepicker' data-format="L">
                                                                        <input type="text" class="form-control" name="dob"  id="dob" value="<?php echo $val['employee_dob']; ?>">
                                                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                    </div>

                                                                </div>

                                                            </div>




                                                            <?php
                                                            //    $cid= $val['employee_company'];
                                                            //  echo $cid;exit;
                                                            // $company_name=  mysql_query("select * from sm_company where company_id=$cid");
                                                            // $name =  mysql_fetch_array($company_name);
                                                            ?>
                                                            <div class="row">

                                                                <div class="form-group col-sm-6">
                                                                    <label for="city">Company</label>
                                                                    <input type="text" class="form-control" name="company" id="company" value="<?php echo $val['employee_company'] ?>">
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="city">Designation</label>
                                                                    <input type="text" class="form-control"  name="desig"  value="<?php echo $val['employee_designation']; ?>">
                                                                </div>




                                                            </div>






                                                            <div class="row">

                                                                <!--                                                                <div class="form-group col-sm-6">
                                                                                                                                    <label for="email">E-mail</label>
                                                                                                                                    <input type="email" class="form-control" id="email" value="johny.d@tattek.com" readonly>
                                                                                                                                </div>-->

                                                                <div class="form-group col-sm-6">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $val['employee_email']; ?>">
                                                                </div>


                                                                <div class="form-group col-sm-6">
                                                                    <label for="Nationality">Nationality</label>
                                                                    <?php //$category_name = $db->selectQuery("SELECT * FROM `" . $db->db_prefix . "library_category` where id=$cat_id");  ?>



                                                                    <select name="country"class="form-control">
                                                                        <option selected="selected" value="<?php //echo $cont_fetch['id'];         ?>"><?php //echo $cont_fetch['nicename'];         ?></option>
                                                                        <?php
                                                                        $sql = mysql_query("SELECT * FROM country");
                                                                        while ($row = mysql_fetch_array($sql)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nicename']; ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>


    <!--                                                                    <input type="email" class="form-control" id="email" value="<?php echo $val['employee_nationality']; ?>">-->
                                                                </div>




                                                            </div>




                                                            <?php
//  $count1= mysql_query("SELECT COUNT(DISTINCT document_title) as num FROM sm_employee_documents");
//  $re= mysql_fetch_array($count1);
//   $docc=  mysql_query("select * from sm_employee_documents where employee_id=$id");
                                                            $docc = $db->selectQuery("select * from sm_employee_documents where employee_id=$id and status=1");
// $doc_detailss=  mysql_fetch_array($docc);
                                                            for ($i = 0; $i < count($docc); $i++) {
                                                                ?>
                                                                <div class="row">
                                                                    <div class="form-group col-sm-4">


                                                                        <input type="text" name="emp_docs[<?php echo $i; ?>][document_title]" value="<?php echo $docc[$i]['document_title']; ?>"  class="form-control addt_text"
                                                                               style="background-color: #fff;border-color:#fff; cursor: default;margin-top:-14px;">

                                                                        </label>



                                                                        <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_data]" id="pass_id" value="<?php echo $docc[$i]['document_data']; ?>">
                                                                    </div>
                                                                    <div class="form-group col-sm-4">
                                                                        <label for="city">Issued Date</label>

                                                                        <div class='input-group datepicker' data-format="L">
                                                                            <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_start_date]" id="pass_start" value="<?php echo $docc[$i]['document_start_date']; ?>">
                                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-4">
                                                                        <label for="state">Expiry Date</label>
                                                                        <div class='input-group datepicker' data-format="L">
                                                                            <input type="text" class="form-control" name="emp_docs[<?php echo $i; ?>][document_end_date]" id="pass_end" value="<?php echo $docc[$i]['document_end_date']; ?>">
                                                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                                                        </div>



                                                                    </div>

                                                                </div>

                                                            <?php } ?>



                                                            <input type="hidden" name="idd" value="<?php echo $id; ?>">


                                                            <input type="submit" class="btn btn-info" name="save" value="Save">

                                                            </div>

                                                        </form>
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

