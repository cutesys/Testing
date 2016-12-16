<?php
$page = "company";
$sub = "c_add";
include("./file_parts/header.php");
unset($_SESSION['Tax_Card']);
unset($_SESSION['Computer_Card']);
unset($_SESSION['Municipal_Baladiya']);
unset($_SESSION['Commercial_Registration']);
?>
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

    .file_status {
        color: #428bca;
    }

</style>

<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>Add worksite <span>Add New worksite</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">

                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>

                    <li><a href="#">WPS</a></li>

                    <li><a href="#">Settings</a></li>
                   <li><a href="#">worksite</a></li>

                </ul>

            </div>

        </div>

        <!-- page content -->

        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">

                <ul class="nav nav-tabs nav-justified">

                    <li><a href="#tab1" data-toggle="tab">Basic <span
                                class="badge badge-default pull-right wizard-step">1</span></a></li>

                    

                    <li><a href="#tab6" data-toggle="tab">Save & Finish<span
                                class="badge badge-default pull-right wizard-step">2</span></a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="step1" role="form">

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label for="username">Worksite</label>

                                    <input type="text" name="work_site" id="work_site" class="form-control"
                                           pattern="^[a-zA-Z\d\-\/\s]*$" required="">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="companyname">Site Location: </label>
                                    <input type="text" name="site_location" id="site_location" class="form-control"
                                           required="">
                                </div>


                            </div>
                           


                        </form>

                    </div>



                    <div class="tab-pane" id="tab6">

                        <p class="well">Please check and make sure the details given are correct!</p>

                       
                    </div>

                    <ul class="pager wizard">

                        <li class="previous">

                            <button class="btn btn-default">Previous</button>

                        </li>


                        <li class="next">

                            <button class="btn btn-default">Next</button>

                        </li>

                        <li class="next finish" style="display:none;">

                             <button class="btn btn-success" type="button" id="finish_btn" >Finish</button>

                        </li>


                    </ul>

                    <div class="row">

                        <div class="col-md-9"></div>

                        <span class="text-success mt-0 mb-20" id="SucM"></span>

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

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">


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


    $('#finish_btn').click(function () { 

        var fdata = $('#step1').serialize();
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        $.ajax({
            url: "worksite_add_action.php",
            type: "post",
            data: fdata,
            success: function (data) {
				//alert(data);
                $('#SucM').html(data);
               setTimeout('Redirect()', 1000);
            }
			
        });
  
 });
 </script>
 <script>
    function Redirect() {
        window.location = "worksite_list.php";
    }
	 
</script>

</body>

</html>