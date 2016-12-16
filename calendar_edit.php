<?php
$page = "company";

$sub = "c_add";

include("./file_parts/header.php");
?>

<style>

    .addt_text:focus{

        outline: none;

    }

    .addt_text {

        background-color:transparent;

        border: 0px solid;

        height:30px;

        width:260px;

    }
    .file_status{
        color:#428bca;
    }

</style>

<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>Add Company <span>Add New Company</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">

                    <li> <a href="#"><i class="fa fa-home"></i> SME</a> </li>

                    <li> <a href="#">Company</a> </li>

                    <li> <a href="#">Add Company</a> </li>

                </ul>

            </div>

        </div>

        <!-- page content -->

        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">

                <ul class="nav nav-tabs nav-justified">

                    <li><a href="#tab1" data-toggle="tab">Basic <span class="badge badge-default pull-right wizard-step">1</span></a></li>

                    <li><a href="#tab2" data-toggle="tab">Address<span class="badge badge-default pull-right wizard-step">2</span></a></li>

                    <li><a href="#tab3" data-toggle="tab">Documents<span class="badge badge-default pull-right wizard-step">3</span></a></li>

                    <li><a href="#tab4" data-toggle="tab">Contacts<span class="badge badge-default pull-right wizard-step">4</span></a></li>

                    <li><a href="#tab5" data-toggle="tab">Uploads<span class="badge badge-default pull-right wizard-step">5</span></a></li>

                    <li><a href="#tab6" data-toggle="tab">EULA<span class="badge badge-default pull-right wizard-step">6</span></a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="step1" role="form">

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label for="username">Company ID: </label>

                                    <input type="text" name="basic_company_id" id="company_id" class="form-control" pattern="^[a-zA-Z\d\-\/\s]*$" required="">

                                </div>




                                <div class="form-group col-md-6">

                                    <label for="companyname">Company Name: </label>

                                    <input type="text" name="basic_company_name" id="company_name" class="form-control"  required="">

                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="color:red;" id = "company_status"></p>
                                </div>
                                <div class="col-md-6">
                                    <p style="color:red;" id = "companyname_status"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="phone">Category: </label>
                                    <!--<input type="text"    name="company" id="company" class="form-control"   />-->
                                    <select class="form-control" name="basic_company_category" id="category" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $cat = $db->selectQuery("SELECT `category_name`,`cat_id` FROM `sm_category`");
                                        if (count($cat) > 0) {
                                            for ($ei = 0; $ei < count($cat); $ei++) {
                                                ?>
                                                <option value="<?php echo $cat[$ei]['category_name']; ?>"><?php echo $cat[$ei]['category_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">

                                    <label for="phone">Owner: </label>

                                    <input type="text" name="basic_owner" id="owner" class="form-control" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" required="">

                                </div>

                                <div class="form-group col-md-4">

                                    <label for="phone">Sponsorship Fee (QAR): </label>

                                    <input type="text" name="basic_fee" id="spon_fee" class="form-control" data-parsley-trigger="change"
                                           data-parsley-type="digits"

                                    />

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-4">

                                    <label for="email">E-Mail: </label>

                                    <input type="email" name="basic_email" id="email" class="form-control" required="">

                                </div>

                                <div class="form-group col-md-4">

                                    <label for="phone">Phone: </label>

                                    <input type="phone" name="basic_phone" id="phone" class="form-control" data-parsley-trigger="change"
                                           data-parsley-type="digits" required=""/>

                                </div>

                                <div class="form-group col-md-4">

                                    <label for="fax">Fax: </label>

                                    <input type="text" name="basic_fax" id="fax" class="form-control" data-parsley-trigger="change"
                                           data-parsley-type="digits" >

                                </div>

                            </div>



                            <div class="form-group">

                                <label for="message">About Company: </label>

                                <textarea class="form-control" rows="5" name="basic_about_cmp" id="about_cmp" placeholder="Write something about company..." required=""></textarea>

                            </div>

                        </form>

                    </div>

                    <div class="tab-pane" id="tab2">

                        <form name="step2" id="step2" role="form">

                            <div class="form-group mt-10">

                                <label for="address2">Address Line 1: </label>

                                <input type="text" name="add_address1" id="address1" class="form-control" placeholder="Enter primary address" required=""/>

                            </div>

                            <div class="form-group mt-10">

                                <label for="address2">Address Line 2: </label>

                                <input type="text" name="add_address2" id="address2" class="form-control" placeholder="Enter secondary address">

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 mb-0">

                                    <label for="dnumber">Door no: </label>

                                    <input type="text" name="add_dnumber" id="dnumber" class="form-control" placeholder="Enter door number" required=""

                                    />

                                </div>

                                <div class="form-group col-md-6 mb-0">

                                    <label for="street">City </label>

                                    <input type="text" name="add_street" id="street" class="form-control" placeholder="Enter street address" required=""

                                    />

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">

                                    <label for="state">Region: </label>

                                    <input type="text" name="add_state" id="state" class="form-control" placeholder="Enter state" required=""

                                    >

                                </div>

                                <div class="form-group col-md-6">

                                    <label for="zip">Post Box: </label>

                                    <input type="text" name="add_zip" id="zip" class="form-control" placeholder="Enter zip" required="" />

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="tab-pane" id="tab3">

                        <form name="step3" id="step3" role="form" novalidate>

                            <h4 class="custom-font"><strong>Company Registration</strong></h4>

                            <div class="row">

                                <div class="form-group col-md-3 mb-0">

                                    <input type="text" name="docs[0][doc_title]" value="Commercial Registration"  class="form-control addt_text" style="background-color: #fff; cursor: default;">

                                    <input type="text" name="docs[0][doc_data]" id="cr" class="form-control" placeholder="Commercial Registration ID" data-parsley-trigger="change" data-parsley-type="alphanum" required="" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="pr-name">Owner: </label>

                                    <input type="text" name="docs[0][doc_owner]" id="owner" class="form-control" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" required="" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="scstart">Commencing Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[0][doc_start_date]" id="cr_start_date"  required="" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>



                                <div class="form-group col-md-3 mb-0">

                                    <label for="prend">End Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[0][doc_end_date]" id="cr_end_date" required="" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="color:red;" id = "com_status"></p>
                                </div>


                            </div>

                            <div class="row">

                                <div class="form-group col-md-3 mb-0">

                                    <input type="text" name="docs[1][doc_title]" value="Municipal License"  class="form-control addt_text" style="background-color: #fff; cursor: default;">

                                    <input type="text" name="docs[1][doc_data]" id="mun_id" data-parsley-trigger="change" data-parsley-type="alphanum" class="form-control" placeholder="Municipal License ID" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="pr-name">Owner: </label>

                                    <input type="text" name="docs[1][doc_owner]" id="owner" class="form-control" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="scstart">Commencing Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[1][doc_start_date]" id="cr_start_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>



                                <div class="form-group col-md-3 mb-0">

                                    <label for="prend">End Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[1][doc_end_date]" id="cr_end_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <p style="color:red;" id = "mun_status"></p>

                                </div>





                            </div>

                            <div class="row">

                                <div class="form-group col-md-3 mb-0">

                                    <input type="text" name="docs[2][doc_title]" value="Computer Card"  class="form-control addt_text" style="background-color: #fff; cursor: default;">

                                    <input type="text" name="docs[2][doc_data]" id="cc_id" data-parsley-trigger="change" data-parsley-type="alphanum" class="form-control" placeholder="Computer Card ID" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="pr-name">Owner: </label>

                                    <input type="text" name="docs[2][doc_owner]" id="owner" class="form-control"  data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="scstart">Commencing Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[2][doc_start_date]" id="cr_start_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>



                                <div class="form-group col-md-3 mb-0">

                                    <label for="prend">End Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[2][doc_end_date]" id="cr_end_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>

                                <div id="in_div">

                                    <input type="hidden" id="incrmnt" value="3"/>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <p style="color:red;" id = "cc_status"></p>

                                </div>





                            </div>

                            <div class="row">

                                <div class="form-group col-md-3 mb-0">

                                    <input type="text" name="docs[3][doc_title]" value="Tax Card"  class="form-control addt_text" style="background-color: #fff; cursor: default;">

                                    <input type="text" name="docs[3][doc_data]" data-parsley-trigger="change" data-parsley-type="alphanum" id="tax_id" class="form-control" placeholder="Tax Card ID">

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="pr-name">Owner: </label>

                                    <input type="text" name="docs[3][doc_owner]" id="owner" class="form-control" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" >

                                </div>

                                <div class="form-group col-md-3 mb-0">

                                    <label for="scstart">Commencing Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[3][doc_start_date]" id="cr_start_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>



                                <div class="form-group col-md-3 mb-0">

                                    <label for="prend">End Date: </label>

                                    <div class='input-group datepicker' data-format="L">

                                        <input type='text' class="form-control" name="docs[3][doc_end_date]" id="cr_end_date" />

                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span> </div>

                                </div>

                                <div id="in_div">

                                    <input type="hidden" id="incrmnt" value="3"/>

                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-6">

                                    <p style="color:red;" id = "tax_status"></p>

                                </div>





                            </div>

                            <div class="row">

                                &nbsp;

                            </div>

                            <div id="cmp_doc"></div>

                            <div class="row">

                                <div class="col-md-3">

                                    <button class="btn btn-success" id="doc_add" type="button">Add New <i class="fa fa-plus"></i></button>

                                </div>

                            </div>



                        </form>

                    </div>

                    <div class="tab-pane" id="tab4">

                        <form name="step4" id="step4" role="form" novalidate>

                            <div class="row">

                                <div class="form-group col-md-6 mb-0">

                                    <label for="email">Designation: </label>

                                    <select class="form-control" name="contact[0][contact_designation]" required="" >

                                        <?php
                                        $des = $db->selectQuery("SELECT `designation_name` FROM `" . $db->db_prefix . "designation` WHERE designation_status='1'");

                                        for ($i = 0; $i < count($des); $i++) {
                                            ?>

                                            <option value="<?php echo $des[$i]['designation_name']; ?>"><?php echo $des[$i]['designation_name']; ?></option>

                                        <?php } ?>

                                    </select>

                                </div>

                                <div class="form-group col-md-6 mb-0">

                                    <label for="name">Name: </label>

                                    <input type="text" name="contact[0][contact_name]" id="contact_name" class="form-control"  placeholder="" data-parsley-trigger="change" pattern="/^[a-zA-Z ]+$/" required=""/>

                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-6 mb-0">

                                    <label for="email">Email: </label>

                                    <input type="email" name="contact[0][contact_email]" id="contact_email" class="form-control" required=""

                                    >

                                </div>

                                <div class="form-group col-md-6 mb-0">

                                    <label for="phone">Phone: </label>

                                    <input type="text" name="contact[0][contact_phone]" id="contact_phone" class="form-control"

                                           data-parsley-trigger="change"
                                           data-parsley-type="digits" required="">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2">

                                    <label for="email">Get Notification: </label>

                                </div>

                            </div>

                            <div id="in_div">

                                <input type="hidden" id="c_incrmnt" value="1"/>

                            </div>

                            <div class="row">

                                <div class="col-sm-4">

                                    <label class="checkbox checkbox-custom-alt">

                                        <input type="checkbox" name="contact_not[0][cr]" value="Commercial Registration" checked="checked"><i></i> Commercial Registration Expiry

                                    </label>

                                    <label class="checkbox checkbox-custom-alt">

                                        <input type="checkbox" name="contact_not[0][cc]" value="Computer Card" checked="checked"><i></i> Computer Card Expiry

                                    </label>

                                    <label class="checkbox checkbox-custom-alt">

                                        <input type="checkbox" name="contact_not[0][ml]" value="Municipal Licence" checked="checked"><i></i> Municipal Licence Expiry

                                    </label>
                                    <label class="checkbox checkbox-custom-alt">

                                        <input type="checkbox" name="contact_not[0][tc]" value="Tax Card" checked="checked"><i></i> Tax Card Expiry
                                    </label>

                                </div>

                            </div>

                            <div class="row">

                                &nbsp;

                            </div>

                            <div id="contact_add">

                                &nbsp;

                            </div>

                            <div class="row">

                                <div class="col-md-3">

                                    <button class="btn btn-success" type="button" id="contact_ad_btn">Add New Contact <i class="fa fa-plus"></i></button>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="tab-pane" id="tab5">

                        <form name="step5" id="step5" role="form" novalidate>

                            <noscript>

                                <input type="hidden" name="redirect" value="">

                            </noscript>

                            <div class="row fileupload-buttonbar">

                                <div class="col-lg-12">

                                    <!-- The fileinput-button span is used to style the file input field as button -->


                                    <div class="sam">

                                        <label class="col-sm-6 control-label" for="CompanyLogo">Company Logo</label>

                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>

                                            <input type="file" name="files[]" class="step5" id="CompanyLogo" onchange="upload_files_without_doc(this)">

                                            <input type="hidden" class="in_class" value="Company_Logo"/>

                                        </span>

                                        <span id="cmplog" class="file_status" name="File name here"></span>
                                        <p></p>
                                    </div>

                                    <div class="sam">

                                        <label class="col-sm-6 control-label" for="CompanyRegistrationDetails">Commercial Registration Details</label>

                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>

                                            <input type="file" name="files[]" class="step5" id="CompanyRegistrationDetails" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" class="in_class" value="Commercial_Registration"/>
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p id="file" name="File name here"></p>


                                    </div>

                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Computer Card</label>

                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>

                                            <input type="file" name="files[]" class="step5" onchange="upload_files(this)" multiple>
                                            <input type="hidden" class="in_class" value="Computer_Card"/>
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p id="file" name="File name here"></p>


                                    </div>

                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Municipal License Documents</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                            <input type="file" name="files[]" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" class="in_class" value="Municipal_License"/>
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p id="file" name="File name here"></p>


                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Tax Card Documents</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
                                            <input type="file" name="files[]" onchange="upload_files(this)" multiple>
                                            <input type="hidden" class="in_class" value="Tax_Card"/>
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p id="file" name="File name here"></p>
                                        <br>
                                    </div>
                                    <div class="row">
                                        &nbsp;
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a  class="btn btn-success">New Upload <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <span class="fileupload-process"></span>

                                </div>

                                <div class="col-lg-5 fileupload-progress fade">

                                    <!-- The global progress bar -->

                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">

                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>

                                    </div>

                                    <!-- The extended global progress state -->

                                    <div class="progress-extended">&nbsp;</div>

                                </div>

                            </div>

                        </form>

                        <table role="presentation" class="table table-striped">

                            <tbody class="files">

                            </tbody>

                        </table>

                    </div>

                    <div class="tab-pane" id="tab6">

                        <p class="well">Please check and make sure the details given are correct!</p>

                        <form name="step6" id="step6" role="form" novalidate>

                            <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="agree" id="agree" checked="">

                                    <i></i> All agreements signed by <a href class="text-info">Company</a> </label>

                            </div>


                            <div class="checkbox">

                                <label class="checkbox checkbox-custom-alt">

                                    <input type="checkbox" name="newsletter" value="Yes" id="newsletter" checked="">

                                    <i></i> Receive newsletter </label>

                            </div>

                        </form>

                    </div>

                    <ul class="pager wizard">

                        <li class="previous">

                            <button class="btn btn-default">Previous</button>

                        </li>



                        <li class="next">

                            <button class="btn btn-default">Next</button>

                        </li>

                        <li class="next finish" style="display:none;">

                            <button class="btn btn-success" type="button" id="finish_btn">Finish</button>

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



<script type="text/javascript">


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


    $('#finish_btn').click(function () {

        var fdata = $('#step1,#step2,#step3,#step4').serialize();
        $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
        $.ajax({
            url: "company_ajax.php",
            type: "post",
            data: fdata,
            success: function (data) {

                $('#SucM').html(data);
                setTimeout('Redirect()', 2000);
            }

        });

    });

</script>
<script>
    function Redirect()
    {
        window.location = "companylist.php";
    }

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

</html>