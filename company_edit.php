<?php
$page = "company";
$sub = $sub1 = $head = $head1 = $tab = "";
include('file_parts/header.php');
$com_id = $_GET['company_id'];
$success_msg = "";
$sponsor_id = $_SESSION['id'];
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
                $ed_company_pid = "";
                $logoImg = "";
                $resLogo = $db->selectQuery("SELECT * FROM `sm_company_files` WHERE `file_title`='companyLogo' AND `company_id`='$com_id' AND `file_status`='1'");

                if (count($resLogo)) {
                    $logoImg = $resLogo[0]['file_name'];
                } else {
                    $logoImg = "assets/images/camera.png";
                }
                $values = array();

                $resFet = $db->selectQuery("select * from sm_company where company_id='" . $_GET['company_id'] . "' ");


                if (count($resFet)) {
                    for ($rC = 0; $rC < count($resFet); $rC++) {
                        $ed_company_name = $resFet[$rC]['company_name'];
                        $ed_company_pid = $resFet[$rC]['company_pid'];
                        $ed_company_email = $resFet[$rC]['company_email'];
                        $ed_company_category = $resFet[$rC]['company_category'];
                        $values['company_id'] = $resFet[$rC]['company_id'];
                        $ed_company_phone = $resFet[$rC]['company_phone'];
                        $ed_company_fax = $resFet[$rC]['company_fax'];
                        $ed_company_owner = $resFet[$rC]['company_owner'];
                        $ed_company_about = $resFet[$rC]['company_about'];
                        $ed_company_address1 = $resFet[$rC]['company_address1'];
                        $ed_company_address2 = $resFet[$rC]['company_address2'];
                        $ed_company_area = $resFet[$rC]['company_area'];
                        $ed_company_city = $resFet[$rC]['company_city'];
                        $ed_company_country = $resFet[$rC]['company_country'];
                        $ed_company_postbox = $resFet[$rC]['company_postbox'];
                        $ed_company_fee = $resFet[$rC]['company_sponsor_fee'];

                        //  $cmpArray["data"][] = $values;
                    }
                }
                ?>
                <!--code for updation--->
                <?php
                if (isset($_POST['submit'])) {
                    $company_pid = $_POST['company_pid'];
                    $company_email = $_POST['company_email'];
                    $company_name = $_POST['company_name'];
                    $company_category = $_POST['company_category'];
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


                    $values1 = array();

                    $values1['company_pid'] = $company_pid;
                    $values1['company_email'] = $company_email;
                    $values1['company_name'] = htmlspecialchars_decode($company_name);
                    $values1['company_category'] = $company_category;
                    $values1['company_fax'] = $company_fax;
                    $values1['company_owner'] = $company_owner;
                    $values1['company_sponsor_fee'] = $company_sponsor_fee;
                    $values1['company_address1'] = $company_address1;
                    $values1['company_address2'] = $company_address2;
                    $values1['company_area'] = $company_area;
                    $values1['company_city'] = $company_city;
                    $values1['company_country'] = $company_country;
                    $values1['company_postbox'] = $company_postbox;
                    $values1['company_phone'] = $company_phone;
                    $values1['company_about'] = $company_about;

                    $contact = $_POST['contact'];
                    $contact_notif = $_POST['contact_not'];

                    foreach ($contact as $dkey1 => $value_contact) {
                        $cont_id = $value_contact['contact_id'];
                        $contact_data = array_merge($value_contact, array("company_id" => $com_id, "sponsor_id" => $sponsor_id));
                        $cn = $contact_notif[$dkey1];
                        $cn_imp = implode(",", $cn);
                        $contact_data['contact_notification'] = $cn_imp;

                        $update_con = $db->secure_update("sm_company_contacts", $contact_data, " WHERE contact_id='$cont_id' AND company_id='" . $_GET['company_id'] . "' ");
                        $values2 = array();
                    }

                    //$values2['contact_id'] = $contact_id;


                    $update = $db->secure_update($db->db_prefix . 'company', $values1, " WHERE   company_id='" . $_GET['company_id'] . "' ");
                    //$update1 = $db->secure_update($db->db_prefix . 'company_contacts', $values2, " WHERE contact_id='".$contact_id."' AND company_id='" . $_GET['company_id'] . "' ");


                    if (count($update)) {
                        $success_msg = "Values Updated!";
                        echo "<script>location.href='company_read.php?company_id=$com_id'</script>";
                    } else {
                        $success_msg = "Error in updation";
                    }
                }
                ?>
                <!-- code for updation ends -->


                <!-- col -->
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

                        </div>


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

                            <p class="text-default lt"><?php echo $ed_company_about ?></p>
                            <?php
                            if (empty($values['company'])) {
                                echo "";
                            } else {
                                echo $values['company'];
                            }
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
                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a
                                            href="company_read.php?company_id=<?php echo $_GET['company_id'] ?>">Profile</a>
                                    </li>
                                    <li role="presentation"><a style="color:#16a085;" href="#">Edit Profile</a></li>
                                    <li role="presentation"><a
                                            href="company_doc_edit.php?company_id=<?php echo $_GET['company_id'] ?>">Advanced</a>
                                    </li>
                                    <li role="presentation"><a href="company_gallery.php?company_id=<?php echo $_GET['company_id'] ?>">Documents</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                        <div class="tile-body">

                                            <form class="form-horizontal" name="" method="post"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>
                                                <h3 class="text-success mt-0 mb-20"><?php echo $success_msg; ?></h3>
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>About</strong> Company</h4>
                                                        <!--<p>Your personal account settings</p>-->

                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="first-name">Company ID</label>
                                                        <input type="text" class="form-control" id="company_id"
                                                               name="company_pid" value="<?php echo $ed_company_pid; ?>"
                                                               pattern="^[a-zA-Z\d\-\/\s]*$" required="">													<input type="hidden" name="vehicle_checkid" id="company_idcheck" value="<?php echo $ed_company_pid; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>

                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Company Name:</label>
                                                        <input type="text" class="form-control" id="company_name"
                                                               name="company_name"
                                                               value="<?php echo htmlspecialchars_decode($ed_company_name); ?>"
                                                               required="">												<input type="hidden" name="vehicle_checkid" id="company_namecheck" value="<?php echo $ed_company_name; ?>">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p  id="company_status"></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p  id="companyname_status"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-5">
                                                        <label for="first-name">Email</label>
                                                        <input type="email" class="form-control" id="first-name"
                                                               name="company_email"
                                                               value="<?php echo $ed_company_email; ?>">
                                                    </div>

                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address2">Category:</label>

                                                        <select class="form-control" name="company_category"
                                                                id="category" >
                                                            <option value="" selected="">Select</option>

                                                            <?php
                                                            $sql = $db->selectQuery("SELECT `category_name`,`cat_id` FROM `sm_category`");

                                                            if (count($sql)) {

                                                                for ($cun = 0; $cun < count($sql); $cun++) {
                                                                    ?>

                                                                    <option
                                                                        value="<?php echo $sql[$cun]['category_name']; ?>" <?php if ($ed_company_category == $sql[$cun]['category_name']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['category_name']; ?></option>

                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Owner:</label>
                                                        <input type="text" class="form-control" id="address1"
                                                               name="company_owner"
                                                               value="<?php echo $ed_company_owner; ?>"
                                                               data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/"
                                                               >
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Sponsorship Fee</label>
                                                        <input type="text" class="form-control"
                                                               name="company_sponsor_fee" id="address1"
                                                               value="<?php echo $ed_company_fee; ?>"
                                                               data-parsley-trigger="change"
                                                               data-parsley-type="digits" >
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Address Line 1</label>
                                                        <input type="text" class="form-control" id="address1"
                                                               name="company_address1"
                                                               value="<?php echo $ed_company_address1; ?>" >
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address2">Address Line 2</label>
                                                        <input type="text" class="form-control" id="address2"
                                                               name="company_address2"
                                                               value="<?php echo $ed_company_address2; ?>">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Area</label>
                                                        <input type="text" class="form-control" id="address1"
                                                               name="company_area"
                                                               value="<?php echo $ed_company_area; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address2">City</label>
                                                        <input type="text" class="form-control" id="address2"
                                                               name="company_city"
                                                               value="<?php echo $ed_company_city; ?>" >
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Country</label>
                                                        <select name="company_country" id="company_country" class="form-control">
                                                            <option selected="">Select Country</option>
                                                            <?php
                                                            $select_country = $db->selectQuery("SELECT `nicename` FROM `country`");
                                                            if (count($select_country)) {
                                                                for ($k = 0; $k < count($select_country); $k++) {
                                                                    ?>
                                                                    <option <?php if ($ed_company_country == $select_country[$k]['nicename']) { ?> selected=""<?php } ?>
                                                                                                                                                   value="<?php echo $select_country[$k]['nicename']; ?>"><?php echo $select_country[$k]['nicename']; ?></option>
                                                                                                                                                   <?php
                                                                                                                                               }
                                                                                                                                           }
                                                                                                                                           ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address2">Postbox</label>
                                                        <input type="text" class="form-control" id="address2"
                                                               name="company_postbox"
                                                               value="<?php echo $ed_company_postbox; ?>">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-sm-5">
                                                        <label for="address1">Phone No</label>
                                                        <input type="text" class="form-control" name="company_phone"
                                                               id="address1" value="<?php echo $ed_company_phone; ?>"
                                                               data-parsley-trigger="change"
                                                               data-parsley-type="digits" >
                                                    </div>
                                                    <div class="form-group col-sm-2"></div>
                                                    <div class="form-group col-sm-5">
                                                        <label for="address2">Fax:</label>
                                                        <input type="text" class="form-control" id="address2"
                                                               name="company_fax" value="<?php echo $ed_company_fax; ?>"
                                                               data-parsley-trigger="change"
                                                               data-parsley-type="digits">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <label for="message">About Company: </label>
                                                        <textarea class="form-control" rows="6" name="company_about"
                                                                  id="message"
                                                                  ><?php echo $ed_company_about; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 legend">
                                                        <h4><strong>Alert</strong> Settings</h4>
                                                    </div>
                                                    <div class="form-group col-md-2 legend"></div>
                                                    <div class="form-group col-md-3 legend">
                                                        <button class="btn btn-success" type="button"
                                                                id="contact_ad_btn" data-toggle="modal"
                                                                data-target="#new_contact" data-options="splash-ef-3">
                                                            Add New Contact <i class="fa fa-plus"></i></button>
                                                    </div>

                                                </div>
                                                <?php
                                                $contacts = $db->selectQuery("SELECT * FROM `sm_company_contacts` WHERE `company_id`='$com_id'");
                                                $cd = 0;
                                                if (count($contacts)) {

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
                                                            //echo $cat;
                                                            //$com = "<category>" . $cat . "</category>\n";
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
                                                            <div class="form-group col-sm-5">

                                                                <label for="address1">Name</label>

                                                                <input type="text" class="form-control"
                                                                       name="contact[<?php echo $cd; ?>][contact_name]"
                                                                       id="address1"
                                                                       value="<?php echo $contact_name; ?>"
                                                                       data-parsley-trigger="change"
                                                                       pattern="/^[a-zA-Z ]+$/" >

                                                            </div>
                                                            <input type="hidden" class="form-control"
                                                                   name="contact[<?php echo $cd; ?>][contact_id]"
                                                                   id="address4" value="<?php echo $contact_id; ?>">
                                                            <div class="form-group col-sm-2"></div>
                                                            <div class="form-group col-sm-5">
                                                                <label for="address2">Designation</label>
                                                                <select class="form-control mb-10" value=""
                                                                        name="contact[<?php echo $cd; ?>][contact_designation]"
                                                                        >
                                                                            <?php
                                                                            $select1 = $db->selectQuery("select * from sm_designation WHERE designation_status='1'");
                                                                            if (count($select1)) {
                                                                                for ($cs = 0; $cs < count($select1); $cs++) {
                                                                                    ?>
                                                                            <option
                                                                                value="<?php echo $select1[$cs]['designation_name']; ?>" <?php if (($select1[$cs]['designation_name']) == $contact_designation) { ?> selected=""<?php } ?>> <?php echo $select1[$cs]['designation_name']; ?> </option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-5">

                                                                <label for="address1">Email</label>

                                                                <input type="email" class="form-control"
                                                                       name="contact[<?php echo $cd; ?>][contact_email]"
                                                                       id="address1"
                                                                       value="<?php echo $contact_email; ?>"
                                                                       >

                                                            </div>
                                                            <div class="form-group col-sm-2"></div>
                                                            <div class="form-group col-sm-5">

                                                                <label for="address2">Phone</label>

                                                                <input type="text" class="form-control" id="address2"
                                                                       name="contact[<?php echo $cd; ?>][contact_phone]"
                                                                       value="<?php echo $contact_phone; ?>"
                                                                       data-parsley-trigger="change"
                                                                       data-parsley-type="digits" >

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
                                                                    <input type="checkbox" name="contact_not[<?php echo $cd; ?>][cr]"
                                                                           id="cr"
                                                                           value="Commercial Registration" <?php echo $comnot1; ?> ><i></i>
                                                                    Commercial Registration Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[<?php echo $cd; ?>][cc]"
                                                                           id="cc"
                                                                           value="Computer Card" <?php echo $comnot2; ?>><i></i>
                                                                    Computer Card Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[<?php echo $cd; ?>][ml]"
                                                                           id="ml"
                                                                           value="Municipal Baladiya" <?php echo $comnot3; ?>><i></i>
                                                                    Municipal/Baladiya Expiry
                                                                </label>
                                                                <label class="checkbox checkbox-custom-alt">
                                                                    <input type="checkbox" name="contact_not[<?php echo $cd; ?>][tc]"
                                                                           id="tc"
                                                                           value="Tax Card" <?php echo $comnot4; ?>><i></i>
                                                                    Tax Card Expiry
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <hr class="line-dashed line-full">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <div id="in_div">
                                                    <input type="hidden" id="c_incrmnt" value="<?php echo $cd; ?>"/>
                                                </div>
                                                <div id="contact_add">

                                                    &nbsp;

                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">&nbsp;</div>
                                                <?php $cid = $_GET['company_id']; ?>
                                                <input type="hidden" name="idd" value="<?php echo $cid; ?>">
                                                <input type="submit" name="submit"
                                                       class="btn btn-rounded btn-success btn-sm" value="Update">
                                                       <?php ?>

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


                <?php //	}           ?>


            </div>
            <!-- /row -->

        </div>
        <!-- /page content -->

    </div>

</section>
<!--/ CONTENT -->

</div>
<!--/ Application Content -->

<div class="modal splash fade" id="new_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">New Contact</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-md-6 mb-0">
                        <label for="name">Name: </label>
                        <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder=""/>
                        <span id="contact_span" class="validate_span"></span>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <label for="email">Designation: </label>
                        <select name="contact_designation" id="contact_designation" class="form-control">
                            <option selected="" value="">Select</option>
                            <?php
                            $select_desig = $db->selectQuery("SELECT `designation_name` FROM `sm_designation` WHERE `designation_status`='1'");
                            if (count($select_desig)) {
                                for ($desi = 0; $desi < count($select_desig); $desi++) {
                                    ?>
                                    <option
                                        value="<?php echo $select_desig[$desi]['designation_name'] ?>"><?php echo $select_desig[$desi]['designation_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-0">
                        <label for="email">Email: </label>
                        <input type="email" name="contact_email" id="contact_email" class="form-control">
                        <span id="email_span" class="validate_span"></span>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <label for="phone">Phone: </label>
                        <input type="text" name="contact_phone" id="contact_phone" class="form-control"
                               pattern="^[\d\+\-\.\(\)\/\s]*$">
                        <span id="phone_span" class="validate_span"></span>
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
                            <input type="checkbox" name="cr" id="cr" value="Commercial Registration"
                                   checked="checked"><i></i> Commercial Registration Expiry
                        </label>
                        <label class="checkbox checkbox-custom-alt">
                            <input type="checkbox" name="cc" id="cc" value="Computer Card" checked="checked"><i></i>
                            Computer Card Expiry
                        </label>
                        <label class="checkbox checkbox-custom-alt">
                            <input type="checkbox" name="ml" id="ml" value="Municipal Licence" checked="checked"><i></i>
                            Municipal Licence Expiry
                        </label>
                        <label class="checkbox checkbox-custom-alt">
                            <input type="checkbox" name="tc" id="tc" value="Tax Card" checked="checked"><i></i> Tax Card
                            Expiry
                        </label>
                    </div>
                </div>
            </div>
            <div id="con_status" style="color: green;"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default btn-border" id="myNoteBtn">Add</button>
            <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>


<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
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
<script src="assets/js/vendor/parsley/parsley.min.js"></script>
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
    function Redirect() {
        $("#new_contact").modal('hide');
    }
    $(window).load(function () {

    });
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $('#myNoteBtn').click(function () {
        var contact_designation = $('#contact_designation').val();
        var contact_name = $('#contact_name').val();
        var contact_email = $('#contact_email').val();
        var contact_phone = $('#contact_phone').val();
        var valid_error = 0;

        if (contact_name == "") {
            $('#contact_span').html('This value is required.');
            valid_error = 1;
        }
        if (contact_email == "") {
            $('#email_span').html('This value is required.');
            valid_error = 1;
        } else {
            var email_chk = isEmail(contact_email);
            if (email_chk == false) {
                $('#email_span').html('This value should be a valid email.');
                valid_error = 1;
            }
        }
        if (contact_phone == "") {
            $('#phone_span').html('This value is required.');
            valid_error = 1;
        }
        var notifs = new Array();
        if ($("#cr").is(':checked')) {
            notifs.push($('#cr').val());
        }
        if ($("#cc").is(':checked')) {
            notifs.push($('#cc').val());
        }
        if ($("#ml").is(':checked')) {
            notifs.push($('#ml').val());
        }
        if ($("#tc").is(':checked')) {
            notifs.push($('#tc').val());
        }
        if (valid_error == 0) {
            $.ajax({
                url: "company_additional_contact.php",
                type: "post",
                data: {
                    contact_designation: contact_designation,
                    contact_name: contact_name,
                    contact_email: contact_email,
                    contact_phone: contact_phone,
                    notifs: notifs,
                    company_id: '<?php echo $com_id; ?>'
                },
                success: function (data) {
                    $('#con_status').html(data);
                    setTimeout('Redirect()', 1000);
                }
            });
        }
    });
    function upload_files_without_doc(element) {
        var section = 'Company_Logo';
        var cp_id = '<?php echo $ed_company_pid ?>';
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
    $('#company_id').on('blur', function (e) {
        var compid = jQuery('#company_id').val();
        var compcheck_id = jQuery('#company_idcheck').val();
        if (compid == compcheck_id) {
            $('#company_status').html();
        }
        if (compid != compcheck_id && compid != "") {
            $('#company_status').html('Please wait...');
            $.ajax({url: 'editcheck_companyid.php', type: 'POST', dataType: 'json', data: {compid: compid, compcheck_id: compcheck_id}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#company_id').val('');
                        $('#company_status').html('Please wait...');
                        $('#company_status').css("color", data.color);
                        $('#company_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#company_status').css("color", data.color);
                        $('#company_status').html(data.Status);
                    }
                }});
        }
    });
    $('#company_name').on('blur', function (e) {
        var compname = jQuery('#company_name').val();
        var compcheck_name = jQuery('#company_namecheck').val();
        if (compname == compcheck_name) {
            $('#companyname_status').html();
        }
        if (compname != compcheck_name && compname != "") {
            $('#companyname_status').html('Please wait...');
            $.ajax({url: 'editcheck_companyname.php', type: 'POST', dataType: 'json', data: {compname: compname, compcheck_name: compcheck_name}, success: function (data) {
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#company_name').val('');
                        $('#companyname_status').html('Please wait...');
                        $('#companyname_status').css("color", data.color);
                        $('#companyname_status').html(data.Status);
                    }
                    if (ch == 1) {
                        $('#companyname_status').css("color", data.color);
                        $('#companyname_status').html(data.Status);
                    }
                }});
        }
    });

</script>
</body>
</html>
