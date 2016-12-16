<?php
$page = "employee";
$sub = "e_add";
include("./file_parts/header.php")
?>
<!--/ CONTROLS Content -->
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
<!-- ====================================================
          ================= CONTENT ===============================
          ===================================================== -->
<section id="content">
    <div class="page page-forms-wizard">
        <div class="pageheader">
            <h2>Add Employee <span>Add New Employee</span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="#"><i class="fa fa-home"></i> SME</a> </li>
                    <li> <a href="#">Employee</a> </li>
                    <li> <a href="#">Add Employee</a> </li>
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
                    <li><a href="#tab4" data-toggle="tab">Uploads<span class="badge badge-default pull-right wizard-step">4</span></a></li>
                    <li><a href="#tab5" data-toggle="tab">EULA<span class="badge badge-default pull-right wizard-step">5</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        <form name="step1" role="form" id="step1">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username">First Name: </label>
                                    <input type="text"  name="first_name" id="fname" class="form-control" data-parsley-trigger="change" data-parsley-type="alphanum" required=""
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Middle Name: </label>
                                    <input type="text"  name="middle_name" id="middle_name" class="form-control"
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="companyname">Last Name: </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" data-parsley-trigger="change" data-parsley-type="alphanum" required=""
                                           >
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="phone">Company: </label>
                                    <!--<input type="text"    name="company" id="company" class="form-control"   />-->
                                    <select class="form-control" name="company" id="company" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $cmps = $db->selectQuery("SELECT `company_name`,`company_id` FROM `sm_company` WHERE company_status='1' AND `sponsor_id`='" . $_SESSION['id'] . "'");
                                        if (count($cmps) > 0) {
                                            for ($ei = 0; $ei < count($cmps); $ei++) {
                                                ?>
                                                <option value="<?php echo $cmps[$ei]['company_id']; ?>"><?php echo $cmps[$ei]['company_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Nationality: </label>
                                    <select class="form-control mb-10" name="nationality" id="nationality" required="">
                                        <option  value="">Select</option>
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
                                <div class="form-group col-md-4">
                                    <label for="phone">Designation: </label>
                                    <select class="form-control mb-10" name="employee_designation" id="designation" required="">
                                        <option  value="">Select</option>
                                        <?php
                                        $select = $db->selectQuery("SELECT * FROM sm_designation WHERE `designation_status`='1'");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['designation_name']; ?>"> <?php echo $select[$rt]['designation_name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Salary(QAR): </label>
                                    <input type="text"  name="employee_salary" id="fname" class="form-control" data-parsley-trigger="change" pattern="^[\d\+\-\.\(\)\/\s]*$"required=""
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="companyname">Sponsorship Fee(QAR): </label>
                                    <input type="text"  name="employee_fee" id="middle_name" class="form-control" data-parsley-trigger="change" pattern="^[\d\+\-\.\(\)\/\s]*$"required=""
                                           >
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fax">Gender: </label>
                                    <select class="form-control" name="gender" required="">
                                        <option selected="" value=""> Select</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="scstart">Date of Birth: </label>
                                    <div class='input-group datepicker' data-format="L" required="">
                                        <input type='text' name="dob" class="form-control"    />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Remarks: </label>
                                <textarea class="form-control" rows="5" name="remarks" id="remarks" placeholder="Remarks"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="step2" role="form" id="step2">
                            <h4 class="custom-font"><strong>Permanent Address</strong></h4>
                            <div class="form-group mt-10">
                                <label for="address1">Address Line 1: </label>
                                <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter primary address"  required="" />
                            </div>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 2: </label>
                                <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter secondary address" >
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="dnumber">Door no: </label>
                                    <input type="text" name="dnumber" id="dnumber" class="form-control" placeholder="Enter door number" required=""
                                           />
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="city">City </label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter street address" required=""
                                           />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="state">Region/State: </label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter state" required=""
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Enter zip"   required="" />
                                </div>
                            </div>
                            <h4 class="custom-font"><strong>Residential Address</strong></h4>
                            <label class="checkbox checkbox-custom checkbox-custom-sm" id="same_lbl">
                                <input type="checkbox" id="same_chk"><i></i> Same as above
                            </label>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 1: </label>
                                <input type="text" name="address21" id="address12" class="form-control" placeholder="Enter primary address" required=""  />
                            </div>
                            <div class="form-group mt-10">
                                <label for="address2">Address Line 2: </label>
                                <input type="text" name="address22" id="address22" class="form-control" placeholder="Enter secondary address">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="dnumber">Door no: </label>
                                    <input type="text" name="dnumber2" id="dnumber2" class="form-control" placeholder="Enter door number" required=""
                                           />
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="city2">City </label>
                                    <input type="text" name="city2" id="city2" class="form-control" placeholder="Enter street address" required=""
                                           />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="state">Region/State: </label>
                                    <input type="text" name="state2" id="state2" class="form-control" placeholder="Enter state" required=""
                                           >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Post Box/Zipcode: </label>
                                    <input type="text" name="zip2" id="zip2" class="form-control" placeholder="Enter zip"   required="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email">E-mail: </label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required=""
                                           >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip">Phone: </label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" data-parsley-trigger="change" pattern="^[\d\+\-\.\(\)\/\s]*$"required="" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip">Emergency Contact: </label>
                                    <input type="text" name="em_contact" id="em_contact" class="form-control" placeholder="Emergency Contact Number"  data-parsley-trigger="change" pattern="^[\d\+\-\.\(\)\/\s]*$"required=""  />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <form name="step3" role="form" id="step3" novalidate>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[5][document_title]" readonly="" value="Qatar ID"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                    <input type="text" name="emp_docs[5][document_data]" id="qatar_id" class="form-control" required="" placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">Commencing Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="emp_docs[5][document_start_date]" class="form-control" required="" />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="scstart">End Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="emp_docs[5][document_end_date]" class="form-control" required=""  />
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="" id="qatar_status"></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <label for="visa_type">Visa Type</label>
                                    <select class="form-control"    id="visa_type" name="visa_type" required="">
                                        <option selected="" value="">Select</option>
                                        <option value="Work Visa">Work Visa</option>
                                        <option value="Residential Visa">Residential Visa</option>
                                    </select>
                                </div>

                                <div id="depnd" style="display: none">
                                    <div class="form-group col-md-3 mb-0">
                                        <label for="depend_num">Number of Dependance</label>
                                        <input type="button" name="depend_num" id="add_dependent" class="form-control" placeholder="+"/>
                                    </div>
                                </div>

                                </br></br>

                            </div>

                            <div id="visa_data" style="display: none">

                                <div class="row">
                                    <div class="form-group col-md-4 mb-0">
                                        <input type="text" name="emp_docs[3][document_title]" readonly="" value="Visa"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                        <input type="text" name="emp_docs[3][document_data]" id="visa" class="form-control"  placeholder=""/>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <label for="insurance_start">Commencing Date: </label>
                                        <div class='input-group datepicker' data-format="L">
                                            <input type="text" name="emp_docs[3][document_start_date]" id="visa_start" class="form-control"    placeholder=""/>
                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <label for="insurance_end">End date: </label>
                                        <div class='input-group datepicker' data-format="L">
                                            <input type="text" name="emp_docs[3][document_end_date]" id="visa_end" class="form-control"    placeholder=""/>
                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="" id="visa_status"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 mb-0">
                                        <input type="text" name="emp_docs[4][document_title]" readonly="" value="Passport"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                        <input type="text" name="emp_docs[4][document_data]" id="passport" class="form-control"    placeholder=""/>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <label for="insurance_start">Commencing Date: </label>
                                        <div class='input-group datepicker' data-format="L">
                                            <input type="text" name="emp_docs[4][document_start_date]" id="passport_start" class="form-control"    placeholder=""/>
                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 mb-0">
                                        <label for="insurance_end">End date: </label>
                                        <div class='input-group datepicker' data-format="L">
                                            <input type="text" name="emp_docs[4][document_end_date]" id="passport_end" class="form-control"    placeholder=""/>
                                            <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="" id="passport_status"></p>
                                    </div>

                                </div>
                            </div>
                            <div id="visa_data_child" style="display: none">

                            </div>

                            </br></br>

                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <!--<label for="health">: </label>-->
                                    <input type="text" name="emp_docs[0][document_title]" readonly="" value="Health Card"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                    <input type="text" name="emp_docs[0][document_data]" id="health" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="health_start">Commencing Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[0][document_start_date]" id="health_start" class="form-control" placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="health_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[0][document_end_date]" id="health_end" class="form-control" placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="" id="health_status"></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[1][document_title]" readonly="" value="Insurance"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                    <input type="text" name="emp_docs[1][document_data]" id="insurance" class="form-control" placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="insurance_start">Commencing Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[1][document_start_date]" id="insurance_start" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="insurance_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[1][document_end_date]" id="insurance_end" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="" id="insurance_status"></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-0">
                                    <input type="text" name="emp_docs[2][document_title]" readonly="" value="Driving Licence"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">
                                    <input type="text" name="emp_docs[2][document_data]" id="licence" class="form-control"    placeholder=""/>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="licence_start">Commencing Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[2][document_start_date]" id="licence_start" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label for="licence_end">End date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type="text" name="emp_docs[2][document_end_date]" id="licence_end" class="form-control"    placeholder=""/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="" id="driving_status"></p>
                                </div>

                            </div>
                            <div id="depnd_visa"></div>
                            <div class="row">
                                &nbsp;
                            </div>
                        </form>
                    </div>




                    <div class="tab-pane" id="tab4">

                        <form name="step4" id="step4" role="form" novalidate>

                            <noscript>

                            <input type="hidden" name="redirect" value="">

                            </noscript>

                            <div class="row fileupload-buttonbar">

                                <div class="col-lg-12">

                                    <!-- The fileinput-button span is used to style the file input field as button -->

                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Profile Picture</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files" class="" id="profile_pic" onchange="upload_files_without_doc(this)"  multiple>
                                            <input type="hidden" value="Profile_Picture" name="profpic" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>

                                    </div>
                                    <div class="sam">
                                        <label class="col-sm-6 control-label">Passport</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="passport_add_files" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" value="Passport" name="pass" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>

                                    </div>

                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Visa</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="visa_add_files" onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Visa" name="viza" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>


                                    </div>

                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Qatar ID</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="quatar_add_files" onchange="upload_files(this)"  multiple>
                                            <input type="hidden" value="Qatar" name="qatar" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>


                                    </div>

                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Health Card</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="health_card_add_files" onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Health" name="health" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>


                                    </div>
                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Insurance</label>
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="insurance_add_files" onchange="upload_files(this)" multiple>
                                            <input type="hidden" value="Insurance" name="insurance" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  ></p>


                                    </div>
                                    <div class="sam">

                                        <label class="col-sm-6 control-label">Resume</label>
                                        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i>
                                            <span class="">Add files...</span>
                                            <input type="file" name="files[]" class="" id="resume_add_files" onchange="upload_files_without_doc(this)" multiple>
                                            <input type="hidden" value="Resume" name="resume" class="dfile">
                                        </span>
                                        <span class="file_status" name="File name here"></span>
                                        <p  name="File name here"></p>


                                    </div>
                                    <div class="row">

                                        &nbsp;

                                    </div>

                                    <div id="depnd_data"></div>
                                    <div class="row">
                                        &nbsp;
                                    </div>

                                    <!--<button type="button" id="upload_file" class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Start upload</span> </button>

                                    <button type="reset" class="btn btn-warning cancel"> <i class="glyphicon glyphicon-ban-circle"></i> <span>Cancel upload</span> </button>---->

                                    <!-- The global file processing state -->

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
                    <div class="tab-pane" id="tab5">
                        <p class="well">Please check and make sure the details given are correct!</p>
                        <form name="step6" role="form" novalidate>
                            <div class="checkbox">
                                <label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="agree" id="agree" checked="">
                                    <i></i> All agreements signed by <a href class="text-info">Employee</a> </label>
                            </div>
                            <div class="checkbox">
                                <label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="newsletter" id="newsletter" checked="">
                                    <i></i> Receive newsletter </label>
                            </div>
                        </form>
                    </div>
                    <ul class="pager wizard">
                        <li class="previous">
                            <button class="btn btn-default">Previous</button>
                        </li>
                        <li class="next">
                            <button id="next_btn" class="btn btn-default">Next</button>
                        </li>
                        <li class="next finish" style="display:none;">
                            <button id="finish_btn" class="btn btn-success">Finish</button>
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
<!-- The basic File Upload plugin -->
<!--/ vendor javascripts -->
<!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
<script src="assets/js/main.js"></script>


<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script>
                                                // $('.date_pic').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});

                                                $('body').on('click', '.datepicker_recurring_start', function () {
                                                    //alert("ok");
                                                    $(this).datepicker({
                                                        changeMonth: true,
                                                        changeYear: true,
                                                        dateFormat: "dd/mm/yy"
                                                    }).focus();
                                                    $(this).removeClass('datepicker');
                                                });

//                                                 $('body').on('focus', ".datepic", function () {
//                                                    $(this).datepicker();
//                                                });
//</script>

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
    $('#qatar_id').on('blur', function (e) {
        var qaid = jQuery('#qatar_id').val();
        if (qaid != "") {
            $('#qatar_status').html('Please wait...');
            $.ajax({
                url: 'check_qatar.php',
                type: 'POST',
                dataType: 'json',
                data: {qaid: qaid},
                success: function (data) {
                    $('#qatar_status').html(data.Status);
                    $('#qatar_status').css("color", data.color);
                    var ch = data.data_val;
                    if (ch == 0) {
                        $('#qatar_id').val('');
                    }
                    if (ch == 1) {

                    }
                }
            });
        }
    });
    $('#health').on('blur', function (e) {
        if (heaid != "") {
            var heaid = jQuery('#health').val();
            $('#health_status').html('Please wait...');
            $.ajax({
                url: 'check_health.php',
                type: 'POST',
                dataType: 'json',
                data: {heaid: heaid},
                success: function (data) {
                    $('#health_status').html(data.Status);
                    $('#health_status').css("color", data.color);
                    var ch1 = data.data_val;
                    if (ch1 == 0) {
                        $('#health').val('');
                    }
                    if (ch1 == 1) {

                    }

                }
            });
        }
    });
    $('#insurance').on('blur', function (e) {
        var ins = jQuery('#insurance').val();
        if (ins != "") {
            $('#insurance_status').html('Please wait...');
            $.ajax({
                url: 'check_insurance.php',
                type: 'POST',
                dataType: 'json',
                data: {ins: ins},
                success: function (data) {
                    $('#insurance_status').html(data.Status);
                    $('#insurance_status').css("color", data.color);
                    var ch2 = data.data_val;
                    if (ch2 == 0) {
                        $('#insurance').val('');
                    }
                    if (ch2 == 1) {

                    }

                }
            });
        }
    });
    $('#licence').on('blur', function (e) {
        var drv = jQuery('#licence').val();
        if (drv != "") {
            $('#driving_status').html('Please wait...');
            $.ajax({
                url: 'check_driving.php',
                type: 'POST',
                dataType: 'json',
                data: {drv: drv},
                success: function (data) {
                    $('#driving_status').css("color", data.color);
                    $('#driving_status').html(data.Status);
                    var ch3 = data.data_val;
                    if (ch3 == 0) {
                        $('#licence').val('');
                    }
                    if (ch3 == 1) {

                    }

                }
            });
        }
    });
    $('#visa').on('blur', function (e) {
        var visa = jQuery('#visa').val();
        if (visa != "") {
            $('#visa_status').html('Please wait...');
            $.ajax({
                url: 'check_driving.php',
                type: 'POST',
                dataType: 'json',
                data: {visa: visa},
                success: function (data) {
                    $('#visa_status').css("color", data.color);
                    $('#visa_status').html(data.Status);
                    var ch3 = data.data_val;
                    if (ch3 == 0) {
                        $('#visa').val('');
                    }
                }
            });
        }
    });
    $('#passport').on('blur', function (e) {
        var passport = jQuery('#passport').val();
        if (passport != "") {
            $('#passport_status').html('Please wait...');
            $.ajax({
                url: 'check_driving.php',
                type: 'POST',
                dataType: 'json',
                data: {passport: passport},
                success: function (data) {
                    $('#passport_status').css("color", data.color);
                    $('#passport_status').html(data.Status);
                    var ch3 = data.data_val;
                    if (ch3 == 0) {
                        $('#passport').val('');
                    }
                }
            });
        }
    });
    jQuery("#same_lbl").click(function () {
        var val = jQuery(this).find('#same_chk').is(':checked');
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();
        var dnumber = $("#dnumber").val();
        var city = $('#city').val();
        var state = $("#state").val();
        var zip = $("#zip").val();
        if (val == true) {
            $("#address12").val(address1);
            $("#address22").val(address2);
            $("#dnumber2").val(dnumber);
            $("#city2").val(city);
            $("#state2").val(state);
            $("#zip2").val(zip);
        } else {
            $("#address12").val("");
            $("#address22").val("");
            $("#dnumber2").val("");
            $("#city2").val("");
            $("#state2").val("");
            $("#zip2").val("");
        }
    });
    var depend_num = 0;
    $('#visa_type').change(function ()
    {
    var visa_type = $(this).val();
            if (visa_type == "Work Visa")
    {
    $('#visa_data').show('slow');
            $('#depnd').hide('slow');
    }
    if (visa_type == "Residential Visa")
    {
    $("#depnd").show('slow');
            $('#visa_data').show('slow');
            $("#depnd").html('<div class="form-group col-md-3 mb-0"><label for="depend_num">Number of Dependance</label><input type="text" name="depend_num" id="depend_num" class="form-control"    placeholder=""/></div>')
            $("#depend_num").on('keyup', function () {
    var depend_num = $(this).val();
            var m = 0;
            $('#depnd_visa').append('<div class="row">'
            + '<div class="form-group col-md-4 mb-0">'
            + ' <h4><strong>Dependance Details:</strong></h4>'
            + '</div>'
            + '</div>');
            for (i = 0; i < depend_num; i++) {
    m = m + 1;
            $('#depnd_visa').append('<div class="row">'
            + '<div class="form-group col-md-3 mb-0">'
            + '<label for="depen_name' + i + '">Dependance ' + m
            + ' Name: </label>'
            + '<input type="text" name="depen[' + i + '][dependant_name]" id="depen_name' + i + '" class="form-control" placeholder=""/>'
            + '</div>'
            + '<div class="form-group col-md-3 mb-0">'
            + '<input type="text" name="depen[' + i + '][depen_doc_title]" readonly="" value="Visa ID"  class="form-control addt_text" style="background-color: #fff; color:black; cursor: default;">'
            + '<input type="text" name="depen[' + i + '][dependant_visa]" id="depen_visa' + i + '" class="form-control" placeholder=""/>'
            + '</div>'
            + '<div class="form-group col-md-3 mb-0">'
            + '<label for="depen_start' + i + '">Commencing Date: </label>'
            + ' <div class="input-group " data-format="L">'
            + '<input type="text" name="depen[' + i + '][dependant_visa_start]" id="depen_start' + i + '" class="form-control datepicker_recurring_start" placeholder=""/>'
            + '</div>'
            + '</div>'
            + '<div class="form-group col-md-3 mb-0">'
            + '<label for="depen_end' + i + '">End date: </label>'
            + '<div class="input-group " data-format="L">'
            + '<input type="text" name="depen[' + i + '][dependant_visa_end]" id="depen_end' + i + '" class="form-control datepicker_recurring_start" placeholder=""/>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="row">'
            + '<div class="form-group col-md-4 mb-0">'
            + '<label for="depen_pass' + i + '">Passport Number: </label>'
            + '<input type="text" name="depen[' + i + '][dependant_pass]" id="depen_pass' + i + '" class="form-control" placeholder=""/>'
            + '</div>'
            + '<div class="form-group col-md-4 mb-0">'
            + '<label for="depen_pass_start' + i + '">Commencing Date: </label>'
            + '<div class="input-group " data-format="L">'
            + '<input type="text" name="depen[' + i + '][dependant_pass_start]" id="depen_pass_start' + i + '" class="form-control datepicker_recurring_start" placeholder=""/>'
            + '</div>'
            + '</div>'
            + '<div class="form-group col-md-4 mb-0">'
            + '<label for="depen_pass_end' + i + '">End date: </label>'
            + '<div class="input-group " data-format="L">'
            + '<input type="text" name="depen[' + i + '][dependant_pass_end]" id="depen_pass_end' + i + '" class="form-control datepicker_recurring_start" placeholder=""/>'
            + '</div>'
            + '</div>'
            + '</div>'
            + ' <hr class="line-dashed line-full">');
            $.ajax({
            url: "upload_ajax.php",
                    type: "post",
                    data: {depend_num: depend_num},
                    success: function (data) {
                    $('#depnd_data').html(data);
                    }
            });
    });
    }
    });
            $('#add_dependent').on('click', function () {



    });
            $("#depend_num").on('keyup', function () {
    var depend_num = $(this).val();
            $.ajax({
            url: "work_visa.php",
                    type: "post",
                    data: {type: "resid", depend_num: depend_num},
                    success: function (data) {
                    $('#visa_data').html(data);
                    }
            });
            $.ajax({
            url: "upload_ajax.php",
                    type: "post",
                    data: {depend_num: depend_num},
                    success: function (data) {
                    $('#depnd_data').html(data);
                    }
            });
    });
            $('#finish_btn').click(function () {
    var fdata = $('#step1,#step2,#step3').serialize();
            $('#SucM').html('<img src="assets/images/buffering.gif" width="30" height="30" />');
            $.ajax({
            url: "employee_ajax.php",
                    type: "post",
                    data: fdata,
                    success: function (data) {
                    $('#SucM').html(data);
                            setTimeout('Redirect()', 2000);
                    }
            });
    });</script>
<script>
            function Redirect()
            {
            window.location = "employee_list.php";
            }
</script>
<script>

    function upload_files(element)
    {
    var file_names = $(element).parent('span').siblings('label').html();
            var section = $(element).siblings('.dfile').val();
            var cp_id = $('#company').val();
            var fname = $('#qatar_id').val();
            if (cp_id == '' || fname == '')
    {
    window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
    }
    var numf = 0;
            var formData = new FormData();
            jQuery.each(jQuery(element)[0].files, function (i, file) {
            formData.append('file-' + i, file);
                    numf = numf + 1;
            });
            $.ajax({
            url: "emp_fileup.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                    $(element).parent('span').siblings('.file_status').html(file_names + " selected");
                    }
            });
    }
    function upload_files_without_doc(ele) {
    var file_names = $(ele).parent('span').siblings('label').html();
            var section = $(ele).siblings('.dfile').val();
            var cp_id = $('#company').val();
            var fname = $('#qatar_id').val();
            if (cp_id == '' || fname == '')
    {
    window.alert('Please Select your Company and Quatar Id to Proceed');
            return;
    }
    var numf = 0;
            var formData = new FormData();
            jQuery.each(jQuery(ele)[0].files, function (i, file) {
            formData.append('file-' + i, file);
                    numf = numf + 1;
            });
            $.ajax({
            url: "emp_no_doc_fileup.php?numf=" + numf + '&fname=' + fname + '&cp_id=' + cp_id + '&section=' + section,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                    $(ele).parent('span').siblings('.file_status').html(file_names + " selected");
                    }
            });
    }

</script>
</body>
</html>

