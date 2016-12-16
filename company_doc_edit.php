<?php
$page = "company";
$sub = "";
include('file_parts/header.php');
$com_id = $_GET['company_id'];
$success_msg = "";
error_reporting(0);
?>
<script>
    function image() {
        var image = document.getElementById('images_size');
        var img = image.files[0].size;
        var imgsize = Math.round(img / 1024);

        if (imgsize > 250) {
            document.getElementById("imgerror").innerHTML = 'File size should not exceed 250 kb';
        } else {
            document.getElementById("imgerror").innerHTML = '';
        }

    }
</script>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
    .addt_text:focus {
        outline: none;
    }

    .addt_text {
        background-color: transparent;
        border: 0px solid;
        height: 30px;
        width: 260px;
    }
</style>
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Company Profile </h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Company</a>
                    </li>
                    <li>
                        <a href="#">Company List</a>
                    </li>
                    <li>
                        <a href="#">Profile</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">
            <!-- row -->
            <div class="row">
                <?php
                $logoImg = "";
                $resLogo = $db->selectQuery("SELECT * FROM `sm_company_files` WHERE `file_title`='companyLogo' AND `company_id`='$com_id'");

                if (count($resLogo)) {
                    $logoImg = $resLogo[0]['file_name'];
                }
                $values = array();
                $sponsor_id = "";
                $resFet = $db->selectQuery("select * from sm_company where company_id='" . $_GET['company_id'] . "' ");
                if (count($resFet)) {
                    for ($rC = 0; $rC < count($resFet); $rC++) {
                        $company_name = $resFet[$rC]['company_name'];
                        $company_pid = $resFet[$rC]['company_pid'];
                        $company_email = $resFet[$rC]['company_email'];
                        $company_category = $resFet[$rC]['company_category'];
                        $company_id = $resFet[$rC]['company_id'];
                        $company_phone = $resFet[$rC]['company_phone'];
                        $company_fax = $resFet[$rC]['company_fax'];
                        $company_owner = $resFet[$rC]['company_owner'];
                        $company_about = $resFet[$rC]['company_about'];
                        $company_address1 = $resFet[$rC]['company_address1'];
                        $company_address2 = $resFet[$rC]['company_address2'];
                        $company_door = $resFet[$rC]['company_door'];
                        $company_city = $resFet[$rC]['company_city'];
                        $company_region = $resFet[$rC]['company_region'];
                        $company_postbox = $resFet[$rC]['company_postbox'];
                        $company_sponsor_fee = $resFet[$rC]['company_sponsor_fee'];
                        $sponsor_id = $resFet[$rC]['sponsor_id'];
                    }
                }
                ?>
                <?php
                ?>
                <div class="col-md-4">
                    <!-- tile -->
                    <section class="tile tile-simple">
                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img class="img-circle" id="emdp" src="<?php echo $logoImg; ?>" alt="">
                            </div>
                            <h4 class="mb-0"><strong><?php echo htmlspecialchars_decode($ed_company_name); ?></strong>
                            </h4>
                            <div class="sam">
                                <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Profile Picture</span>
                                    <input type="file" name="files" class="" id="profile_pic"
                                           onchange="upload_files_without_doc(this)">
                                    <input type="hidden" value="companyLogo" name="companyLogo" class="dfile">
                                </span>
                                <p id="sucs" style="color:greenyellow; font-size: 20px;"></p>
                                <br>

                            </div>
                        </div>
                        <div class="tile-body text-center bg-blue p-0">
                        </div>
                    </section>
                    <section class="tile tile-simple">
                        <div class="tile-header">
                            <h1 class="custom-font"><strong>About</strong> Company</h1>
                        </div>
                        <div class="tile-body">

                            <p class="text-default lt"><?php echo $company_about ?></p>
                            <?php
                            if (empty($values['company'])) {
                                echo "";
                            } else {
                                echo $values['company'];
                            }
                            ?>

                        </div>
                    </section>
                </div>
                <!-- col -->
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a
                                            href="company_read.php?company_id=<?php echo $_GET['company_id'] ?>">Basic</a>
                                    </li>
                                    <li role="presentation"><a
                                            href="company_edit.php?company_id=<?php echo $_GET['company_id'] ?>">Edit
                                            Profile</a></li>
                                    <li role="presentation"><a style="color:#16a085;"
                                                               href="company_doc_edit.php?company_id=<?php echo $_GET['company_id'] ?>">Advanced</a>
                                    </li>
                                    <li role="presentation"><a
                                            href="company_gallery.php?company_id=<?php echo $_GET['company_id'] ?>">Documents</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="wrap-reset">
                                            <form id="step3" role="form" novalidate>
                                                <h3 class="text-success mt-0 mb-20"><?php echo $success_msg; ?></h3>
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Company</strong> Documents</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $cDocs = $db->selectQuery("SELECT * FROM `sm_company_docs` WHERE `company_id`='$com_id' AND `doc_status`='1'");
                                                if (count($cDocs)) {
                                                    for ($cd = 0; $cd < count($cDocs); $cd++) {
                                                        $cdoc_title = $cDocs[$cd]['doc_title'];
                                                        $cdoc_data = $cDocs[$cd]['doc_data'];
                                                        $cdoc_start1 = explode("-", $cDocs[$cd]['doc_start_date']);
                                                        $cdoc_start = $cdoc_start1[2] . "/" . $cdoc_start1[1] . "/" . $cdoc_start1[0];
                                                        $cdoc_end1 = explode("-", $cDocs[$cd]['doc_end_date']);
                                                        $cdoc_end = $cdoc_end1[2] . "/" . $cdoc_end1[1] . "/" . $cdoc_end1[0];
                                                        $cdoc_owner = $cDocs[$cd]['doc_owner'];
                                                        if ($cdoc_title != "Municipal Baladiya") {
                                                            $cdoc_title_display = $cdoc_title . " No";
                                                        } else {
                                                            $cdoc_title_display = $cdoc_title;
                                                        }
                                                        ?>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 mb-0">
                                                                <label><?php echo $cdoc_title_display; ?></label>
                                                                <input type="hidden"
                                                                       name="docs[<?php echo $cd; ?>][doc_title]"
                                                                       value="<?php echo $cdoc_title; ?>"
                                                                       class="form-control addt_text"
                                                                       style="background-color: #fff; cursor: default;">
                                                                <input type="text"
                                                                       name="docs[<?php echo $cd; ?>][doc_data]"
                                                                       value="<?php echo $cdoc_data; ?>"
                                                                       class="form-control dc_data">
                                                                <input type="hidden" class="cmpid_class"
                                                                       name="vehicle_checkid"
                                                                       value="<?php echo $cdoc_data; ?>">
                                                                <input type="hidden" class="cmptitle_class" name=""
                                                                       value="<?php echo $cdoc_title; ?>">
                                                                <span class="doc_status"></span>
                                                            </div>
                                                            <div class="form-group col-md-6 mb-0">
                                                                <label for="pr-name">Owner: </label>
                                                                <input type="text"
                                                                       name="docs[<?php echo $cd; ?>][doc_owner]"
                                                                       id="owner" value="<?php echo $cdoc_owner; ?>"
                                                                       class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <p></p>

                                                            </div>

                                                            <div class="col-md-6">

                                                                <p id=""></p>

                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 mb-0">
                                                                <label for="scstart">Registration Date: </label>
                                                                <div class='input-group datepicker' data-format="L">
                                                                    <input type='text' class="form-control"
                                                                           value="<?php echo $cdoc_start; ?>"
                                                                           name="docs[<?php echo $cd; ?>][doc_start_date]"
                                                                           id=""/>
                                                                    <span class="input-group-addon"> <span
                                                                            class="fa fa-calendar"></span> </span></div>
                                                            </div>
                                                            <div class="form-group col-md-6 mb-0">
                                                                <label for="prend">Renewal Date: </label>
                                                                <div class='input-group datepicker' data-format="L">
                                                                    <input type='text' class="form-control"
                                                                           value="<?php echo $cdoc_end; ?>"
                                                                           name="docs[<?php echo $cd; ?>][doc_end_date]"
                                                                           id=""/>
                                                                    <span class="input-group-addon"> <span
                                                                            class="fa fa-calendar"></span> </span></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">&nbsp;</div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class="sam">
                                                                    <?php
                                                                    $explode_cdoc_title = "";

                                                                    $explode_cdoc_title = str_replace(' ', '_', $cdoc_title);
                                                                    ?>
                                                                    <span class="btn btn-success fileinput-button"> <i
                                                                            class="glyphicon glyphicon-plus"></i> <span><?php echo $cdoc_title; ?></span>
                                                                        <input type="file" name="files[]" class="step5"
                                                                               id="CompanyLogo"
                                                                               onchange="upload_files(this)">
                                                                        <input type="hidden" class="in_class"
                                                                               value="<?php echo $explode_cdoc_title; ?>"/>
                                                                    </span>
                                                                    <span class="file_status" style="color:#428bca;"
                                                                          name="File name here"></span>
                                                                    <p></p>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="increment_value" value="100" />
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <input type="text" name="docs[0][doc_title]"
                                                                   value="Commercial Registration" readonly=""
                                                                   class="form-control addt_text"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <input type="text" name="docs[0][doc_data]" value="" id="cr"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="pr-name">Owner: </label>
                                                            <input type="text" name="docs[0][doc_owner]" id="owner"
                                                                   value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="scstart">Registration Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[0][doc_start_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="prend">Renewal Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[0][doc_end_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <div class="sam">
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i>
                                                                    <span>Commercial Registration</span>
                                                                    <input type="file" name="files[]" class="step5"
                                                                           id="CompanyLogo"
                                                                           onchange="upload_files(this)">
                                                                    <input type="hidden" class="in_class"
                                                                           value="Commercial_Registration"/>
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>
                                                                <p></p>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <span></span>
                                                        </div>
                                                        <hr class="line-dashed line-full">
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <input type="text" name="docs[1][doc_title]"
                                                                   value="Municipal/Baladiya" readonly=""
                                                                   class="form-control addt_text"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <input type="text" name="docs[1][doc_data]" value="" id="cr"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="pr-name">Owner: </label>
                                                            <input type="text" name="docs[1][doc_owner]" id="owner"
                                                                   value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="scstart">Registration Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[1][doc_start_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="prend">Renewal Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[1][doc_end_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <div class="sam">
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i>
                                                                    <span>Municipal License</span>
                                                                    <input type="file" name="files[]" class="step5"
                                                                           id="CompanyLogo"
                                                                           onchange="upload_files(this)">
                                                                    <input type="hidden" class="in_class"
                                                                           value="Municipal_Baladiya"/>
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>
                                                                <p></p>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <span></span>
                                                        </div>
                                                        <hr class="line-dashed line-full">
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <input type="text" name="docs[2][doc_title]"
                                                                   value="Computer Card" readonly=""
                                                                   class="form-control addt_text"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <input type="text" name="docs[2][doc_data]" value="" id="cr"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="pr-name">Owner: </label>
                                                            <input type="text" name="docs[2][doc_owner]" id="owner"
                                                                   value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="scstart">Registration Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[2][doc_start_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="prend">Renewal Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[2][doc_end_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <div class="sam">
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i>
                                                                    <span>Computer Card</span>
                                                                    <input type="file" name="files[]" class="step5"
                                                                           id="CompanyLogo"
                                                                           onchange="upload_files(this)">
                                                                    <input type="hidden" class="in_class"
                                                                           value="Computer_Card"/>
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>
                                                                <p></p>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <span></span>
                                                        </div>
                                                        <hr class="line-dashed line-full">
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <input type="text" name="docs[3][doc_title]"
                                                                   value="Tax Card" readonly=""
                                                                   class="form-control addt_text"
                                                                   style="background-color: #fff; cursor: default;">
                                                            <input type="text" name="docs[3][doc_data]" value="" id="cr"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="pr-name">Owner: </label>
                                                            <input type="text" name="docs[3][doc_owner]" id="owner"
                                                                   value="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="scstart">Registration Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[3][doc_start_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-0">
                                                            <label for="prend">Renewal Date: </label>
                                                            <div class='input-group datepicker' data-format="L">
                                                                <input type='text' class="form-control" value=""
                                                                       name="docs[3][doc_end_date]" id=""/>
                                                                <span class="input-group-addon"> <span
                                                                        class="fa fa-calendar"></span> </span></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <div class="sam">
                                                                <span class="btn btn-success fileinput-button"> <i
                                                                        class="glyphicon glyphicon-plus"></i>
                                                                    <span>Tax Card</span>
                                                                    <input type="file" name="files[]" class="step5"
                                                                           id="CompanyLogo"
                                                                           onchange="upload_files(this)">
                                                                    <input type="hidden" class="in_class"
                                                                           value="Tax_Card"/>
                                                                </span>
                                                                <span class="file_status" style="color:#428bca;"
                                                                      name="File name here"></span>
                                                                <p></p>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <span></span>
                                                        </div>
                                                        <hr class="line-dashed line-full">
                                                    </div>
                                                    <input type="hidden" id="increment_value" value="4" />
                                                    <?php
                                                }
                                                ?>
                                                <div class="new_documents_div"></div>
                                                <?php $cid = $_GET['company_id']; ?>


                                                <input type="hidden" name="idd" value="<?php echo $cid; ?>">


                                            </form>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <button class="btn btn-primary" id="new_doc"><i class="fa fa-plus"></i>Add Document</button>
                                                </div>
                                            </div>
                                            <button type="button" name="update" id="update_btn"
                                                    class="btn btn-rounded btn-success pull-right" value=""><i class="fa fa-upload"></i> Update Documents
                                            </button>
                                            <div class="row">
                                                <div class="col-md-9"></div>
                                                <span class="text-success" id="SucM"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->


                <?php //	}             ?>


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
<script>
                                                                               window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>');
</script>

<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

<script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!--/ vendor javascripts -->


<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
                                                                               // $('.date_pic').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});

                                                                               $('body').on('click', '.datepickerx', function () {
                                                                                   $(this).datepicker({
                                                                                       changeMonth: true,
                                                                                       changeYear: true,
                                                                                       dateFormat: "dd/mm/yy"
                                                                                   }).focus();
                                                                                   $(this).removeClass('datepicker');
                                                                               });</script>
<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {

    });
    function upload_files(element) {
        $(element).parent('span').siblings('p').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        var section = $(element).siblings('.in_class').val();
        var cp_id = '<?php echo $company_pid; ?>';
        var numf = 0;
        var file_ok = 0;
        var formData = new FormData();
        $.each($(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
            } else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
                $(this).closest('input').val();
            }
        });
        if (file_ok == 1) {
            $.ajax({
                url: "cmp_fileup.php?numf=" + numf + '&cp_id=' + cp_id + '&section=' + section,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').append(data);
                    $(element).parent('span').siblings('p').html("");
                }
            });
        }
    }
    function upload_files_without_doc(element) {
        var section = 'Company_Logo';
        var cp_id = '<?php echo $company_pid ?>';
        var numf = 0;
        var formData = new FormData();
        $.each($(element)[0].files, function (i, file) {
            formData.append('file-' + i, file);
            numf = numf + 1;
            $(this).closest('input').val();
        });
        $.ajax({
            url: "cmp_no_doc_fileEdit.php?numf=" + numf + '&cp_id=' + cp_id + '&section=' + section + '&company_id=' +<?php echo $com_id; ?>,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                $('#sucs').html(data);
            }
        });
    }
    function upload_new_files(element) {
        var section = $(element).siblings('.in_class').val();
        var cp_id = '<?php echo $company_pid; ?>';
        var numf = 0;
        var file_ok = 0;
        var formData = new FormData();
        $.each($(element)[0].files, function (i, file) {
            var fileSize = this.size;
            var sizeLimit = 2000000;
            if (fileSize > sizeLimit) {
                file_ok = 0;
                $(element).parent('span').siblings('.file_status').css("color", "red");
                $(element).parent('span').siblings('.file_status').html("File size must be less than 2MB");
            } else {
                file_ok = 1;
                formData.append('file-' + i, file);
                numf = numf + 1;
                $(this).closest('input').val();
            }
        });
        if (file_ok == 1) {
            $.ajax({
                url: "cmp_fileup.php?numf=" + numf + '&cp_id=' + cp_id + '&section=' + section,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $(element).parent('span').siblings('.file_status').css("color", "#428bca");
                    $(element).parent('span').siblings('.file_status').append(data);
                }
            });
        }
    }
    $(document).on('blur', '.new_doc_title', function () {
        var this_values = $(this).val();
        var document_name = this_values.split(' ').join('_');
        $(this).parent('div').parent('div').parent('.parent_div').append('<p></p><div class="sam">'
                + '           <span class="btn btn-success fileinput-button"> '
                + '         <i class="glyphicon glyphicon-plus"></i> <span>' + this_values + '</span>'
                + '           <input type="file" name="files[]" onchange="upload_files(this)" multiple>'
                + '        <input type="hidden" class="in_class" value="' + document_name + '"/>'
                + ' </span>'
                + ' <span class="file_status_warn" name="File name here"></span>'
                + ' <span class="file_status_img" name="File name here"></span>'
                + ' <span class="file_status" name="File name here"></span>'
                + ' <p id="file" name="File name here"></p>'
                + ' </div>');

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                jQuery('#emdp').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    jQuery('#profile_pic').change(function () {
        readURL(this);
    });

    $('#update_btn').click(function () {
        var com_id = '<?php echo $com_id; ?>';
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        $.ajax({
            url: "company_gallery_edit.php?company_id=" + com_id,
            type: "POST",
            data: $('#step3').serialize(),
            success: function (data) {
                $('#SucM').html("Updated Successfully");
                // $("#cmplog").html(data.logoname);
            }
        });
    });

    $('.dc_data').on('blur', function (e) {
        var docu_title = $(this).siblings('.cmptitle_class').val();
        var cmp_id = $(this).siblings('.cmpid_class').val();
        var dc_data = jQuery('.dc_data').val();
        var span_field = $(this).siblings('span');
        $(span_field).html(" ");
        if (cmp_id != dc_data && dc_data != "") {
            $(this).siblings('span').html("");
            $.ajax({
                url: "company_doc_check.php",
                type: "post",
                dataType: "json",
                data: {dc_data: dc_data, docu_title: docu_title},
                success: function (data) {
                    $(span_field).css("color", data.color);
                    $(span_field).html(data.status);
                }
            });
        }
    });
    $('#new_doc').click(function () {
        $.ajax({
            url: "company_edit_addition.php",
            type: "post",
            dataType: 'json',
            data: {doc: "doc", incrmnt: $('#increment_value').val()},
            success: function (data) {
                $('.new_documents_div').append(data.data_view);
                $('#increment_value').val(data.inVal);
            }

        });
    });
</script>
<!--/ Page Specific Scripts -->


</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>
