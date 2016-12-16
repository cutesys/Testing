<?php
$page = "partner";
$sub = "p_list";
include('file_parts/header.php');
?>
<script>
    function image()
    {

        var image = document.getElementById('images_size');
        var img = image.files[0].size;
        var imgsize = Math.round(img / 1024);

        if (imgsize > 250)
        {
            document.getElementById("imgerror").innerHTML = 'File size should not exceed 250 kb';
        } else
        {

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

            <h2>Partner Profile </h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Partner</a>
                    </li>
                    <li>
                        <a href="partner_list.php">Partner List</a>
                    </li>
                    <li>
                        <a href="#">Partner Profile</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">



                <?php
                $address1 = "";
                $resPartner = $db->selectQuery("select * from partner where id='" . $_GET['id'] . "' ");
                //$sql1 = "select * from partner where id='" . $_GET['id'] . "' ";
                //$qry = mysql_query($sql1);
                if (count($resPartner)) {
                    $id = $resPartner[0]['id'];
                    $image = $resPartner[0]['image'];
                    $parid = $resPartner[0]['parid'];
                    $compname = $resPartner[0]['compname'];
                    $parname = $resPartner[0]['parname'];
                    $address1 = $resPartner[0]['address1'];
                    $address2 = $resPartner[0]['address2'];
                    $country = $resPartner[0]['country'];
                    $phone = $resPartner[0]['phone'];
                    $email = $resPartner[0]['email'];
                    $custid = $resPartner[0]['custid'];
                    $status = $resPartner[0]['status'];
                    $par = $resPartner[0]['par'];
                    $company = $resPartner[0]['company'];
                    ?>


                    <!-- col -->
                    <div class="col-md-4">

                        <!-- tile -->
                        <section class="tile tile-simple">

                            <!-- tile widget -->
                            <div class="tile-widget p-30 text-center">
                                <?php
                                if (empty($image)) {
                                    echo "No image";
                                } else {
                                    ?>
                                    <div class="thumb thumb-xl">
                                        <img class="img-circle" src="part_upload/<?php echo $image; ?>" alt="">

                                    </div>
                                    <?php
                                }
                                ?>
                                <h4 class="mb-0"><?php echo $parname; ?></h4>
                                <!--<span class="text-muted">Project Manager</span>-->
                                <!-- <div class="mt-10">
                                     <button class="btn btn-rounded-20 btn-sm btn-greensea">Follow</button>
                                     <button class="btn btn-rounded-20 btn-sm btn-lightred">Message</button>
                                 </div>-->

                            </div>
                            <!-- /tile widget -->

                            <!-- tile body -->
                            <div class="tile-body text-center bg-blue p-0">

                                <!-- <ul class="list-inline tbox m-0">
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
                                 </ul>-->

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
                                        <li role="presentation" ><a style="color:#16a085;" href="partner_profile.php?id=<?php echo $_GET['id']?>" >Profile</a></li>
										<li role="presentation"><a href="partner_edit.php?id=<?php echo $_GET['id']?>">Edit</a></li>
										<!--<li role="presentation"><a href="#settingsTab" aria-controls="settingsTab" role="tab" data-toggle="tab">Downloads</a></li>-->
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">


                                        <div role="tabpanel" class="tab-pane active" id="settingsTab">

                                            <div class="wrap-reset">

                                                <form name="form4" role="form" id="form4"  method="post" enctype="multipart/form-data">

                                                    <div class="row">
                                                        <div class="form-group col-md-12 legend">
                                                            <h4><strong>Partner</strong> Profile</h4>
                                                            <!--<p><a href="partner_edit.php?id=<?php //echo $_GET['id']?>">  <span style="padding: 0px 0px 0px 386px;    font-size: 18px;color: #428bca">Edit Profile</span></a>-->                                                                                                                                                </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="first-name">Qatar ID:</label>
                                                            <input type="text" class="form-control" id="first-name" name="parid" value="<?php echo $parid; ?>" disabled>
                                                        </div>
                                                        <div class="form-group col-sm-6">

                                                            <label for="first-name">Company Name</label>

															<input type="text" class="form-control" id="first-name" name="parid" value="<?php echo $compname; ?>" disabled>
                                                               
                                                            </select>




                                                        </div>


                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">Partner Name:</label>
                                                            <input type="text" class="form-control" id="address1" name="parname" value="<?php echo $parname; ?>" disabled>
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">Percentage:</label>
                                                            <input type="text" class="form-control" id="address2" name="par" value="<?php echo $par; ?>" disabled>
                                                        </div>

                                                    </div>


                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">Address Line 1</label>
                                                            <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $address1; ?>" disabled>
                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">Address Line 2</label>
                                                            <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $address2; ?>" disabled>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="form-group col-sm-6">

                                                            <label for="first-name">Country</label>


                                                           <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $country; ?>" disabled>





                                                        </div>

                                                        <div class="form-group col-sm-6">
                                                            <label for="address2">Employee Email address:</label>
                                                            <input type="text" class="form-control" id="address2" name="email" value="<?php echo $email; ?>" disabled>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="address1">Partner Phone:</label>
                                                            <input type="text" class="form-control" id="address1" name="phone" value="<?php echo $phone; ?>" data-parsley-trigger="change"                                                       data-parsley-type="digits" disabled>
                                                        </div>
                                                        <!--<div class="form-group col-sm-6">
                                                            <label for="address1">Partner Image:</label>
                                                            <input type="file" id="images_size" name="image" onchange="image();" value="<?php echo $image; ?>"class="filestyle" data-buttonText="Find file" data-iconName="fa fa-inbox">
                                                            <span class="help-block" id="imgerror"></span>
                                                        </div>-->



                                                    </div>


                                                    <!---<input type="submit" name="submit" class="btn btn-rounded btn-success btn-sm" value="Update">-->


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






                <?php } ?>




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
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
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







</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:39 GMT -->
</html>
