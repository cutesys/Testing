<?php
$page = "partner";
$sub = "p_add";
include('file_parts/header.php');
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>Add Partner <span>Add New Partner</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="#">Add Partner</a>
                    </li>
                    <li>
                        <a href="#">Add Partner</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add New Partner <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                    <li><a href="#tab2" data-toggle="tab">Uploads <span class="badge badge-default pull-right wizard-step">2</span></a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Qatar ID: </label>
                                    <input type="text" name="qatarid" class="form-control"
                                           required>
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="phone">Select Company</label>


                                    <select class="form-control mb-10" name="company" required>
                                        <option  value="">Select Company</option>
                                         <?php
                                        $cmps = $db->selectQuery("SELECT `company_name`,`company_id` FROM `sm_company` WHERE `sponsor_id`='" . $_SESSION['id'] . "'");
                                        if (count($cmps) > 0) {
                                            for ($ei = 0; $ei < count($cmps); $ei++) {
                                                ?>
                                                <option value="<?php echo $cmps[$ei]['company_name']; ?>"><?php echo $cmps[$ei]['company_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
									
									




                                </div>


                            </div>

                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="address">Partner Name: </label>
                                    <input type="address" name="name" class="form-control" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/"
                                           required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Percentage: </label>
                                    <input type="phone" name="percentage" max="49" id="percentage" class="form-control" required>
                                </div>

                            </div>

                            <div class="row">



                                <div class="form-group col-md-6">
                                    <label for="phone">Address Line 1: </label>
                                    <textarea type="phone" name="address1" id="address1" class="form-control" minlength="6" required></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Address Line 2: </label>
                                    <textarea type="phone" name="address2" id="address2" class="form-control" minlength="6" required></textarea>
                                </div>
                            </div>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="phone">Nationality</label>


                                    <select class="form-control mb-10" name="nationality" id="nationality" required>
									<option  value="">Select Nationality</option>
                                        <?php
                                        $select = $db->selectQuery("select * from country ");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['name']; ?>"> <?php echo $select[$rt]['name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Partner Email address: </label>
                                    <input type="phone" name="email" id="email" class="form-control"
                                           minlength="6"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="custid" />

                                <div class="form-group col-md-6">
                                    <label for="phone">Partner Phone: </label>
                                    <input type="phone" name="phone" id="phone" class="form-control"
                                           data-parsley-trigger="change"
                                                       data-parsley-type="digits" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php
//                                    if (isset($_SESSION['id'])) {
//                                        $qry = "select * from cust where id='" . $_SESSION['id'] . "'";
//                                        $res = mysql_query($qry);
//                                        $fe = mysql_fetch_array($res);
//                                        echo'<input type="text" name="custid" id="product-price" class="gui-input" value="' . $fe['id'] . '"  style="display:none"  ">';
//                                    }
                                    ?>
                                </div>

                            </div>


                        </form>
                    </div>



                    <div class="tab-pane" id="tab2">
                        <!-- The file upload form used as target for the file upload widget -->
                        <form name="step2" id="form2" role="form" novalidate method="post" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value=""></noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <label class="col-sm-6 control-label">Partner Image</label>
                                    <span class="btn btn-success fileinput-button">

                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" name="file1" id="file" multiple onchange="javascript:updateList()">
                                    </span>
                                    <p id="fileList"></p>
                                </div>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>

                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                        </form>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

                </div>


                <ul class="pager wizard">
                    <li class="previous"><button class="btn btn-default">Previous</button></li>
                    <li class="next"><button class="btn btn-default" id="next_btn">Next</button></li>
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="submit">Finish</button>
                    </li>
                </ul>
                <div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-3">
				<h4 style="margin-left:30px;" class="text-success mt-0 mb-20" id="partner_succes"></h4>
                </div>
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
<script>
$(document).ready(function () {
    $("#form1").submit(function () {
        $(".btn btn-success").attr("disabled", true);
        return true;
    });
});
</script>
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
                                            updateList = function () {
                                                var input = document.getElementById('file');
                                                var output = document.getElementById('fileList');

                                                output.innerHTML = '<label class="col-sm-6 control-label">';
                                                for (var i = 0; i < input.files.length; ++i) {
                                                    output.innerHTML += '<p>' + input.files.item(i).name + '</p>';
                                                }
                                                output.innerHTML += '</label>';
                                            }
</script>
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
<!--/ Page Specific Scripts -->

<script>
    $(document).ready(function () {
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
