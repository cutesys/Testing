<?php
$success_msg = "";
$page = "visa";
$tab = "visa_settings";
$sub = "visa_category_settings";
$sub1 = "visa_category_list";
include('file_parts/header.php');
?>
<?php
$res = $db->selectQuery("select * from sm_visa_category where visa_category_id='" . $_GET['category_id'] . "' ");


if (count($res)) {

    $visa_category_id = $res[0]['visa_category_id'];
    $visa_category_name = $res[0]['visa_category'];
    $visa_category_type = $res[0]['visa_category_type'];
}
?>



<?php
if (isset($_POST['submit'])) {

    $visa_category = $_POST['category_name'];
    $visa_category_type = $_POST['type_name'];
    $values1['visa_category'] = $visa_category;
    $values1['visa_category_type'] = $visa_category_type;
	
    $query1 = $db->secure_update('sm_visa_category', $values1, "  WHERE visa_category_id = '" . $_GET['category_id'] . "'");
    if (count($query1)) {

        $success_msg = "Values Updated!";

        //echo "<script>location.href='country_list.php'</script>";
    } else {

        $success_msg = "Error in updation";
    }
	
}
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

            <h2> Visa Category Edit<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"> Visa</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Settings</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Category</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Category Edit</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Visa Category Edit</a></li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="Nationality">Visa Type</label>
                                    <select name="type_name" id="type_name" class="form-control">
                                        <?php
                                        $sql = $db->selectQuery("SELECT * FROM sm_visa_type where  visa_type_status='1'");
                                        if (count($sql)) {
                                            for ($cun = 0; $cun < count($sql); $cun++) {
                                                ?>
                                                <option value="<?php echo $sql[$cun]['visa_type_id']; ?>" <?php if ($visa_category_type == $sql[$cun]['visa_type_id']) { ?> selected=""<?php } ?>><?php echo $sql[$cun]['visa_type_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Visa Category: </label>
                                    <input category="text" name="category_name" id="category_name" value="<?php echo $visa_category_name; ?>" class="form-control" required>
                                    <span id="exist_status" class="validate_span"></span>

                                </div>
                            </div>
                            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $visa_category_id; ?>" />
                            <div class="col-md-6">
                                <p style="color:red;" id ="com_status"></p>
                            </div>

                            <ul class="pager wizard" style="margin-right:650px;">
                                <li class="next finish" style="display:none;">
                                    <button class="btn btn-success" name="submit" id="submit_btn" type="">Update</button>
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

    $('#category_name').on('blur', function (e) {
        var type_name = jQuery('#type_name').val();
        var category_name = jQuery('#category_name').val();
        var edit_id = jQuery('#edit_id').val();
        $('#com_status').html('');
        $.ajax({
            url: 'visa_category_editcheck.php',
            type: 'POST',
            dataType: 'json',
            data: {category_name: category_name, type_name: type_name, edit_id: edit_id},
            success: function (data) {
				
                $('#com_status').html(data.Status);
                var ch2 = data.data_val;
                if (ch2 == 0) {
                    $('#category_name').val('');
                    $('#com_status').html(data.Status);
                }
                if (ch2 == 1) {

                }

            }
        });
    });

</script>
<!--/ Page Specific Scripts -->

<script>
    /* $(document).ready(function () {
     var fdata = "";

     $('#next_btn').click(function () {
     fdata = $('#form1').serialize();
     });
     $('#submit_btn').click(function () {
     var formData = new FormData();
     jQuery.each(jQuery('#file')[0].files, function (i, file) {
     formData.append('file-' + i, file);
     });
     $.ajax({
     url: "ins_partner.php?" + fdata,
     type: "POST",
     cache: false,
     contentType: false,
     processData: false,
     data: formData,
     success: function (data) {
     //alert(data);
     // alert("Partner Add Successfully");
     $("#partner_succes").html(data);

     }
     });
     });
     });
     /**/
</script>
</body>
</html>
