<?php
$page = "company";

$sub = "";

include("file_parts/header.php");

$com_id = $_REQUEST['company_id'];
?>

<!-- ====================================================

================= CONTENT ===============================

===================================================== -->

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

                        <a href="#">About Company</a>

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
                $resLogo = $db->selectQuery("SELECT * FROM `sm_company_files` WHERE `file_title`='companyLogo' AND `company_id`='$com_id' AND `file_status`='1'");

                if (count($resLogo)) {
                    $logoImg = $resLogo[0]['file_name'];
                }
                $values = array();

                $resFet = $db->selectQuery("select * from sm_company where company_id='" . $_GET['company_id'] . "' ");

                if (count($resFet)) {

                    for ($rC = 0; $rC < count($resFet); $rC++) {

                        $view_company_name = $resFet[$rC]['company_name'];

                        $view_company_pid = $resFet[$rC]['company_pid'];

                        $view_company_category = $resFet[$rC]['company_category'];

                        $view_company_email = $resFet[$rC]['company_email'];

                        $view_company_id = $resFet[$rC]['company_id'];

                        $view_company_phone = $resFet[$rC]['company_phone'];

                        $view_company_fax = $resFet[$rC]['company_fax'];

                        $view_company_owner = $resFet[$rC]['company_owner'];

                        $view_company_about = $resFet[$rC]['company_about'];

                        $view_company_address1 = $resFet[$rC]['company_address1'];

                        $view_company_address2 = $resFet[$rC]['company_address2'];

                        $view_company_area = $resFet[$rC]['company_area'];

                        $view_company_city = $resFet[$rC]['company_city'];

                        $view_company_country = $resFet[$rC]['company_country'];

                        $view_company_postbox = $resFet[$rC]['company_postbox'];

                        $view_company_sponsorfee = $resFet[$rC]['company_sponsor_fee'];
                    }
                }
                ?>





                <!-- col -->

                <div class="col-md-4">



                    <!-- tile -->

                    <section class="tile tile-simple">



                        <!-- tile widget -->

                        <div class="tile-widget p-30 text-center">



                            <div class="thumb thumb-xl">

                                <img class="img-circle" src="<?php echo $logoImg; ?>" alt=""/>



                            </div>


                            <h4 class="mb-0"><?php echo htmlspecialchars_decode($view_company_name); ?></h4>

                        </div>

                        <!-- /tile widget -->



                        <!-- tile body -->

                        <div class="tile-body text-center bg-blue p-0">







                        </div>

                        <!-- /tile body -->



                    </section>

                    <!-- /tile -->





                    <!-- tile -->

                    <section class="tile tile-simple">



                        <!-- tile header -->

                        <div class="tile-header">

                            <h1 class="custom-font"><strong>About</strong> Company</h1>

                        </div>

                        <!-- /tile header -->



                        <!-- tile body -->

                        <div class="tile-body">







                            <p class="text-default lt"><?php echo $view_company_about ?></p>

                            <?php
//if (empty($values['company'])) {
//
//    echo "";
//} else {
//
//    echo $values['company'];
//}
                            ?>



                        </div>

                        <!-- /tile body -->



                    </section>

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



                                <!-- Nav tabs -->

                                <ul class="nav nav-tabs tabs-dark" role="tablist">

                                    <li role="presentation"><a style="color:#16a085;" href="company_read.php?company_id=<?php echo $_GET['company_id'] ?>">Profile</a></li>

                                    <li role="presentation"><a href="company_edit.php?company_id=<?php echo $_GET['company_id'] ?>">Edit Profile</a></li>

                                    <li role="presentation"><a href="company_gallery.php?company_id=<?php echo $_GET['company_id']; ?>">Documents</a></li>

                                </ul>



                                <!-- Tab panes -->

                                <div class="tab-content">





                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">



                                        <div class="wrap-reset">



                                            <form class="profile-settings" action="" method="post" enctype="multipart/form-data">



                                                <div class="row">

                                                    <div class="form-group col-md-6 legend">

                                                        <h4><strong>About</strong> Company</h4>



                                                    </div>
                                                    <div class="col-sm-5"> </div>
                                                    <div class="form-group col-md-1 legend">

                                                        <a onclick="print();" target="_blank" style="cursor:pointer;text-decoration:none;"><h4><strong>Print</strong></h4></a>
                                                    </div>

                                                </div>



                                                <div class="row">



                                                    <div class="form-group col-sm-6">

                                                        <label for="first-name">Company ID</label>

                                                        <input type="text" class="form-control" id="first-name" name="company_pid" readonly value="<?php echo $view_company_pid; ?>">

                                                    </div>

                                                    <div class="form-group col-sm-6">

                                                        <label for="first-name">Email</label>

                                                        <input type="text" class="form-control" id="first-name" readonly name="company_email" value="<?php echo $view_company_email; ?>">

                                                    </div>





                                                </div>

                                                <div class="row">



                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Company Name:</label>

                                                        <input type="text" readonly class="form-control" id="address1" name="company_name" value="<?php echo htmlspecialchars_decode($view_company_name); ?>">

                                                    </div>





                                                    <div class="form-group col-sm-6">

                                                        <label for="address2">Category:</label>

                                                        <input type="text" readonly class="form-control" id="address2" name="company_category" value="<?php echo $view_company_category; ?>">

                                                    </div>



                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Owner:</label>

                                                        <input type="text" readonly class="form-control" id="address1" name="company_owner" value="<?php echo $view_company_owner; ?>">

                                                    </div>



                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Sponsorship Fee</label>

                                                        <input type="text" readonly  class="form-control" name="company_sponsor_fee" id="address1" value="<?php echo $view_company_sponsorfee; ?>">

                                                    </div>

                                                </div>

                                                <div class="row">



                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Address Line 1</label>

                                                        <input type="text" readonly class="form-control" id="address1" name="company_address1" value="<?php echo $view_company_address1; ?>">

                                                    </div>



                                                    <div class="form-group col-sm-6">

                                                        <label for="address2">Address Line 2</label>

                                                        <input type="text" readonly class="form-control" id="address2" name="company_address2" value="<?php echo $view_company_address2; ?>">

                                                    </div>



                                                </div>

                                                <div class="row">



                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Area</label>

                                                        <input type="text" readonly class="form-control" id="address1" name="company_area" value="<?php echo $view_company_area; ?>">

                                                    </div>



                                                    <div class="form-group col-sm-6">

                                                        <label for="address2">City</label>

                                                        <input type="text" readonly class="form-control" id="address2" name="company_city" value="<?php echo $view_company_city; ?>">

                                                    </div>



                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Country</label>

                                                        <input type="text" readonly class="form-control" id="address1" name="company_country" value="<?php echo $view_company_country; ?>">

                                                    </div>



                                                    <div class="form-group col-sm-6">

                                                        <label for="address2">Postbox</label>

                                                        <input type="text" readonly class="form-control" id="address2" name="company_postbox" value="<?php echo $view_company_postbox; ?>">

                                                    </div>



                                                </div>

                                                <div class="row">



                                                    <div class="form-group col-sm-6">

                                                        <label for="address1">Phone No</label>

                                                        <input type="text" readonly class="form-control" name="company_phone" id="address1" value="<?php echo $view_company_phone; ?>">

                                                    </div>

                                                    <div class="form-group col-sm-6">

                                                        <label for="address2">Fax:</label>

                                                        <input type="text" readonly class="form-control" id="address2" name="company_fax" value="<?php echo $view_company_fax; ?>">

                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-12">

                                                        <label for="message">About Company: </label>

                                                        <textarea class="form-control" rows="6" readonly   name="company_about" id="message"><?php echo $view_company_about; ?></textarea>

                                                    </div>

                                                </div>


                                                <?php
                                                $contacts = $db->selectQuery("SELECT * FROM `sm_company_contacts` WHERE `company_id`='$com_id'");
                                                if (count($contacts) > 0) {
                                                    echo '<div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Alert</strong> Settings</h4>

                                                    </div>

                                                </div>';


                                                    for ($cd = 0; $cd < count($contacts); $cd++) {
                                                        $comnot1 = "";
                                                        $comnot2 = "";
                                                        $comnot3 = "";
                                                        $comnot4 = "";


                                                        $contact_designation = $contacts[$cd]['contact_designation'];

                                                        $contact_name = $contacts[$cd]['contact_name'];

                                                        $contact_email = $contacts[$cd]['contact_email'];

                                                        $contact_phone = $contacts[$cd]['contact_phone'];
                                                        $contact_id = $contacts[$cd]['contact_id'];
                                                        $cats = explode(",", $contacts[$cd]['contact_notification']);
                                                        foreach ($cats as $cat) {
                                                            $cat = trim($cat);

                                                            if ($cat == "Commercial Registration") {
                                                                $comnot1 = 'checked="checked"';
                                                            } elseif ($cat == "Computer Card") {
                                                                $comnot2 = 'checked="checked"';
                                                            } elseif ($cat == "Municipal Baladiya") {
                                                                $comnot3 = 'checked="checked"';
                                                            } elseif ($cat == "Tax Card") {
                                                                $comnot4 = 'checked="checked"';
                                                            }
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="form-group col-sm-6">

                                                                <label for="address1">Name</label>

                                                                <input type="text" readonly class="form-control" name="company_phone" id="address1" value="<?php echo $contact_name; ?>">

                                                            </div>

                                                            <div class="form-group col-sm-6">

                                                                <label for="address2">Designation</label>

                                                                <input type="text" readonly class="form-control" id="address2" name="company_fax" value="<?php echo $contact_designation; ?>">

                                                            </div>
                                                        </div>
                                                        <div class="row">



                                                            <div class="form-group col-sm-6">

                                                                <label for="address1">Email</label>

                                                                <input type="text" readonly class="form-control" name="company_phone" id="address1" value="<?php echo $contact_email; ?>">

                                                            </div>

                                                            <div class="form-group col-sm-6">

                                                                <label for="address2">Phone</label>

                                                                <input type="text" readonly class="form-control" id="address2" name="company_fax" value="<?php echo $contact_phone; ?>">

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="email">Get Notification: </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[0][cr]" id="cr"  readonly disabled="disabled" value="Commercial Registration" <?php echo $comnot1; ?> ><i></i> Commercial Registration Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[0][cc]" id="cc" readonly disabled="disabled" value="Computer Card" <?php echo $comnot2; ?>><i></i> Computer Card Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[0][ml]" id="ml" readonly disabled="disabled" value="Municipal Baladiya" <?php echo $comnot3; ?>><i></i>  Municipal/Baladiya Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[0][tc]" id="tc" readonly disabled="disabled" value="Tax Card" <?php echo $comnot4; ?>><i></i>  Tax Card Expiry
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <hr class="line-dashed line-full">



                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                $cDocs = $db->selectQuery("SELECT * FROM `sm_company_docs` WHERE `company_id`='$com_id' AND `doc_status`='1'");
                                                if (count($cDocs) > 0) {
                                                    echo '<div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h4><strong>Company</strong> Documents</h4>
                                                    </div>

                                                </div>';
                                                }

                                                if (count($cDocs)) {
                                                    for ($cd = 0; $cd < count($cDocs); $cd++) {
                                                        $cdoc_title = $cDocs[$cd]['doc_title'];
                                                        $cdoc_data = $cDocs[$cd]['doc_data'];
                                                        $cdoc_start1 = explode("-", $cDocs[$cd]['doc_start_date']);

                                                        $cdoc_start = $cdoc_start1[2] . "/" . $cdoc_start1[1] . "/" . $cdoc_start1[0];
                                                        $cdoc_end1 = explode("-", $cDocs[$cd]['doc_end_date']);
                                                        $cdoc_end = $cdoc_end1[2] . "/" . $cdoc_end1[1] . "/" . $cdoc_end1[0];
                                                        $cdoc_owner = $cDocs[$cd]['doc_owner'];
                                                        ?>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 mb-0">

                                                                <label  class=""><strong><?php echo $cdoc_title; ?></strong></label>

                                                                <input type="text" readonly="" id="cr" value="<?php echo $cdoc_data; ?>" class="form-control" >

                                                            </div>

                                                            <div class="form-group col-md-6 mb-0">

                                                                <label for="pr-name">Owner: </label>

                                                                <input type="text" disabled="" value="<?php echo $cdoc_owner; ?>" id="owner" class="form-control" >

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="form-group col-md-6 mb-0">

                                                                <label for="scstart">Registration Date: </label>

                                                                <input type="text" class="form-control" value="<?php echo $cdoc_start; ?>" disabled="" />

                                                            </div>

                                                            <div class="form-group col-md-6 mb-0">

                                                                <label for="prend">Renewal Date: </label>



                                                                <input type='text' class="form-control" value="<?php echo $cdoc_end; ?>" disabled=""  />



                                                            </div>

                                                        </div>
                                                        <hr class="line-dashed line-full">



                                                        <?php
                                                    }
                                                }
                                                ?>



                                            </form>



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





            </div>

            <!-- /row -->



        </div>

        <!-- /page content -->



    </div>



</section>

<!--/ CONTENT -->



</div>

<!--/ Application Content -->





<?php
if (isset($_POST['submit'])) {



    $company_pid = $_POST['company_pid'];

    $company_email = $_POST['company_email'];

    $company_name = $_POST['company_name'];

    $company_fax = $_POST['company_fax'];

    $company_owner = $_POST['company_owner'];

    $company_sponsor_fee = $_POST['company_sponsor_fee'];

    $company_address1 = $_POST['company_address1'];

    $company_address2 = $_POST['company_address2'];

    $company_area = $_POST['company_area'];

    $company_city = $_POST['company_city'];

    $company_country = $_POST['company_country'];

    $company_postbox = $_POST['company_postbox'];

    $company_phone = $_POST['company_phone'];

    $company_about = $_POST['company_about'];

    $sql = "update sm_company_docs set doc_status='0' where company_id='" . $_GET['company_id'] . "'";

    $sql1 = "update sm_company set company_pid='$company_pid',company_email='$company_email',company_name='$company_name',company_fax='$company_fax',company_owner='$company_owner',company_sponsor_fee='$company_sponsor_fee',company_address1='$company_address1',company_address2='$company_address2',company_area='$company_area',company_city='$company_city',company_country='$company_country',company_postbox='$company_postbox',company_phone='$company_phone',company_about='$company_about' where company_id='" . $_GET['company_id'] . "'";



    $num1 = 0;

    $num2 = NOW();



    for ($k = 0; $k < count($_POST['docs']); $k++) {



        $sql2 = 'INSERT INTO sm_company_docs (doc_status,doc_upload_date,doc_title,doc_data,doc_start_date,doc_end_date) VALUES ('
                . "'" . mysql_real_escape_string($num1) . "', "
                . "'" . mysql_real_escape_string($num2) . "', "
                . "'" . mysql_real_escape_string($_POST['doc_title'][$k]) . "', "
                . "'" . mysql_real_escape_string($_POST['doc_data'][$k]) . "', "
                . "'" . mysql_real_escape_string($_POST['doc_start_date'][$k]) . "', "
                . "'" . mysql_real_escape_string($_POST['doc_end_date'][$k]) . "'"
                . ')';
    }
}
?>























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

<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>

<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!--/ vendor javascripts -->









<!-- ============================================

============== Custom JavaScripts ===============

============================================= -->

<script src="assets/js/main.js"></script>

<!--/ custom javascripts -->








<script>

                                                            function print()
                                                            {

                                                                window.open('printcomp_profile.php?com_id=' +<?php echo $com_id; ?>, '_blank');


                                                            }

</script>




<!-- ===============================================

============== Page Specific Scripts ===============

================================================ -->

<script>

    $(window).load(function () {



    });

</script>

<!--/ Page Specific Scripts -->















</body>



<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->

</html>

