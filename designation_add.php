<?php
$success_msg = "";
$page = "settings";
$tab = "com";
$sub = "designation";
$sub1 = "designation_add";
include('file_parts/header.php');
?>

<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<style>
    .validate_span {
        color: #ff7b76 !important;
        font-size: 12px;
        line-height: 0.9em;
        list-style-type: none;
    }
</style>
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>Add Designation<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Settings </a>
                    </li>
                    <li>
                        <a href="#">Company</a>
                    </li>
                    <li>
                        <a href="#">Add Designation</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add New Designation </a></li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="step1" role="form" method="post">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[0]" placeholder="Designation Name 1" class=" designation_name form-control" required="">
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[1]" placeholder="Designation Name 2" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp;</label>
                                    <input type="text" name="designation_name[2]" placeholder="Designation Name 3" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[3]" placeholder="Designation Name 4" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[4]" placeholder="Designation Name 5" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp;</label>
                                    <input type="text" name="designation_name[5]" placeholder="Designation Name 6" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[6]" placeholder="Designation Name 7" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[7]" placeholder="Designation Name 8" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp;</label>
                                    <input type="text" name="designation_name[8]" placeholder="Designation Name 9" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[9]" placeholder="Designation Name 10" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp; </label>
                                    <input type="text" name="designation_name[10]" placeholder="Designation Name 11" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">&nbsp;</label>
                                    <input type="text" name="designation_name[11]" placeholder="Designation Name 12" class=" designation_name form-control" >
                                    <span id="com_status" class="validate_span"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p style="color:red;" id = ""></p>
                            </div>

                            <ul class="pager wizard" style="margin-right:650px;">
                                <!--<li class="previous"><button class="btn btn-default">Previous</button></li>
                                <li class="next"><button class="btn btn-default" id="next_btn">Next</button></li>-->
                                <li class="next finish" style="display:none;">
                                    <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
                                </li>
                            </ul>

                        </form>
                    </div>


                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
                        </div>
                    </div>

                </div>

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

<script src="assets/js/vendor/parsley/parsley.min.js"></script>

<script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
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

        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }

            },
            onNext: function (tab, navigation, index) {

                var form = $('form[name="step' + index + '"]');

                form.parsley().validate();

                if (!form.parsley().isValid()) {
                    return false;
                }

            },
            onTabClick: function (tab, navigation, index) {

                var form = $('form[name="step' + (index + 1) + '"]');
                form.parsley().validate();

                if (!form.parsley().isValid()) {
                    return false;
                }

            }

        });

    });
</script>
<script>
    $('.designation_name').blur(function () {
        var designation_name = $(this).val();
        var this_span = $(this).siblings('span');
        var this_textbox = $(this);
        $.ajax({
            url: 'designation_check.php',
            type: 'POST',
            data: {designation: designation_name},
            success: function (data) {
                if (data == 0) {
                    $(this_span).html("Designation Already Exist");
                    $(this_textbox).val("");
                } else {
                    $(this_span).html("");
                }
            }
        });
    });
    $("#submit_btn").click(function () {
        $('#com_status').html('');
        var fdata = $('#step1').serialize();
        $.ajax({
            url: 'designation_check.php',
            type: 'POST',
            data: fdata,
            success: function () {
                location.href = 'designation_list.php';
            }
        });
    });
</script>
<script>

</script>
<!--/ Page Specific Scripts -->

<script>

</script>
</body>
</html>
