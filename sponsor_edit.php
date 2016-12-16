<?php
$page = "sponsor";
$sub = "s_li";
include('file_parts/header.php');
$cmp_pid = $_GET['id'];
?>
<?php
$m = date('m');
$dateObj = DateTime::createFromFormat('!m', $m);
$monthName = $dateObj->format('F');
$y = date("Y");
$resFet = $db->selectQuery("SELECT company_pid,`company_name`, `company_sponsor_fee` FROM `sm_company` where company_id='$cmp_pid' ");
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-shop-products">

        <div class="pageheader">

            <h2>Sponsorship Fee Edit</h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="sponsor_list.php">Sponsorship Fee List</a>
                    </li>
                    <li>
                        <a href="#">Sponsorship Fee Edit</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-12">
                    <!--                    <div class="alert alert-danger">
                                            <strong>Note!</strong> This table have only demo purpose. Data are not loaded from database but from dummy json.
                                        </div>-->
                    <!-- tile -->
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>Sponsorship Fee</strong> Edit</h1>
                            <ul class="controls">


                                <!--  <li class="dropdown">

                                  <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                      <i class="glyphicon glyphicon-th-list"></i>
                                      <i class="fa fa-spinner fa-spin"></i>
                                  </a>

                                  <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                      <li>
                                          <a role="button" tabindex="0" class="tile-refresh">
                                              <i class="glyphicon glyphicon-print"></i> Print
                                          </a>
                                      </li>
                                      <li>
                                          <a role="button" tabindex="0" class="tile-fullscreen">
                                              <i class="glyphicon glyphicon-file"></i> PDF
                                          </a>
                                      </li>
                                                                                          <li>
                                          <a role="button" tabindex="0" class="tile-fullscreen">
                                              <i class="glyphicon glyphicon-list-alt"></i> Excel
                                          </a>
                                      </li>
                                  </ul>

                              </li>-->

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
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body" align="center">

                            <div class="table-responsive">
                                <form method="post" action="sponsor_fee_update.php">
                                    <table class="table">
                                        <thead>
    <!--                                        <tr>
                                                <th style="width:40px;" class="no-sort">
                                                    <label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">
                                                        <input type="checkbox" id="select-all"><i></i>
                                                    </label>
                                                </th>

                                                <th style="width:90px;">Company</th>
                                                <th style="width:80px;">Year</th>
                                                <th style="width:90px;">Month</th>
                                                <th style="width:90px;">Sponsorship Fee</th>

                                                <th style="width:150px;" class="no-sort">Actions</th>
                                            </tr>-->

                                            <tr>
                                                <td align="right">Company :  </td><td style="color:#16a085"><?php echo $resFet[0]['company_name']; ?></td>
                                            </tr>


<!--                                         <tr>
    <td align="right">Month:</td><td style="color:#16a085"><?php //echo $resFet[0]['month_name'];        ?></td>
</tr>-->

                                            <tr>
                                                <td align="right">Sponsorship Fee: </td><td style="color:#16a085"><input type="text" name="fee" value="<?php echo $resFet[0]['company_sponsor_fee']; ?>" ></td>
                                        <input type="hidden" name="c_pid" value="<?php echo $cmp_pid; ?>">
                                        </tr>

<!--                                         <tr>
    <td align="right">Status: </td><td style="color:#16a085"><?php echo $resFet[0]['status']; ?></td>

 <tr>-->
                                        <td></td>       <td style="padding: 20px 63px;"><input type="submit" class="btn btn-info" value="Save"></td>
                                        </tr>

                                        </thead>

                                    </table></form>
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

<script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
<script src="assets/js/vendor/datatables/extensions/Pagination/input.js"></script>
<script src="assets/js/vendor/date-format/jquery-dateFormat.min.js"></script>
<!--/ vendor javascripts -->

<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->

<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
</body>
</html>
