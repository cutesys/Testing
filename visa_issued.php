<?php
$page = "visa";
//$tab = "agent";
$sub = "visa_add";
include("file_parts/header.php");
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
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
</style>
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Visa processing </h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> SME</a></li>
                    
                    <li><a href="#">Visa processing</a></li>
                    <li>
                       <a href="#">Visa processing</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">

                <!-- col -->

                <!-- /col -->


                <!-- col -->
                <div class="col-md-12">

                    <!-- tile -->
                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div role="tabpanel">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-dark" role="tablist">
                                    <li role="presentation"><a style="color:#16a085;" href="#">Visa Issued Form</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="settingsTab">
                                        <div class="tile-body">
                                            <form class="form-horizontal" name="" method="post"
                                                  enctype="multipart/form-data" role="form" data-parsley-validate>
                                            
                                                <div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Applicant</strong> Details</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
												<div class=" col-md-4">
                                                         <label for="dnumber">Applicant Name: </label>
                                    <input type="text" name="visa_applicant" id="visa_applicant"  class="form-control" />
                                
                                                    </div>
                                                     <div class="col-md-4">
                                    <label for="phone">Visa type: </label>
                                    <select class="form-control mb-10" name="visa_type"   id="visa_type">
                                        <option  value="">Select</option>
                                        <?php
                                        $select = $db->selectQuery("select * from sm_recruit_country where country_status='1'");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['country_name']; ?>"> <?php echo $select[$rt]['country_name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                                    <div class="col-md-4">
                                    <label for="phone">Category: </label>
                                   <select class="form-control mb-10" name="visa_category" id="visa_category">
                                        <option  value="">Select</option>
                                        
                                    </select>
                                </div>

                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                    <label for="phone">Client Name(Sponsor name): </label>
                                    <select class="form-control mb-10" name="visa_client"   id="visa_client">
                                        <option  value="">Select</option>
                                        <?php
                                        $select = $db->selectQuery("select * from sm_recruit_country where country_status='1'");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['country_name']; ?>"> <?php echo $select[$rt]['country_name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								<div class=" col-md-6">
                                                         <label for="phone">Passport No: </label>
									 <input type="text" name="visa_passport" id="visa_passport" class="form-control" />
                                
                                                    </div>
                                                </div>
                                                <div class="row">

                                                   
                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Contact no: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
													 <div class=" col-md-6">
                                                         <label for="phone">Email: </label>
									 <input type="text" name="visa_passport" id="visa_passport" class="form-control" />
                                
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-md-6">
                                                        <label for="zip">Received Date: </label>
                                    <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="visa_received_date" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                                    </div>
                                                    <div class=" col-md-6">
                                                        
                                                         <label for="username">Advance amount: </label>
                                    <input type="email"  name="visa_amount" id="visa_amount" class="form-control"  />
                               
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class=" col-md-6">
                                                        <label for="address1">Country:</label>
                                                        <select name="candidate_state" class="form-control" required="">
                                                            <option selected="" value=""></option>
                                                            <option>Country 1</option>
                                                            <option>Country 2</option>
                                                        </select>
                                                    </div>
													<div class="col-md-6">
                                    <label for="phone">Status: </label>
                                   <select class="form-control mb-10" name="visa_status" id="visa_status">
                                        
										<option  selected value="Not Applied">Issued</option>
										
                                    </select>
                                </div>
                                                    <div class=" col-md-6">
                                                        <label for="address1">Address:</label>
                                                         <textarea name="visa_amount" id="visa_amount" class="form-control"></textarea>
                               
                                                    </div>
													
                                                </div>
												<div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Visa</strong> Details</h4>
                                                    </div>
                                                </div>
												 <div class="row">

                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Visa No: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Sponsor: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
													 
                                                </div>
												<div class="row">

                                                   
                                                   
													<div class=" col-md-6">
                                                         <label for="phone">Issued Date: </label>
									 <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="candidate_dob" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                                    </div>
													 <div class=" col-md-6">
                                                         <label for="phone">Expiry Date: </label>
									  <div class='input-group datepicker' data-format="L">
                                        <input type='text' name="candidate_dob" class="form-control"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="form-group col-md-12 legend">
                                                        <h4><strong>Fee</strong> Details</h4>
                                                    </div>
                                                </div>
												<div class="row">

                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Bank Fee: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Company Fee: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
													 
                                                </div>
												<div class="row">

                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Sponsor Fee: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Total Amount: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
													 
                                                </div>
												<div class="row">

                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Advance Paid: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
                                                    <div class=" col-md-6">
                                                       <label for="dnumber">Balance: </label>
                                    <input type="text" name="visa_contact" id="visa_contact" class="form-control" />
                               
                                                    </div>
													 
                                                </div>
												</div>
                                                
                                                <div class="row">&nbsp;</div>
                                                <div class="row">&nbsp;</div>

                                               
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
               

            </div>
            <!-- /row -->

        </div>
        <!-- /page content -->

    </div>

</section>
<!--/ CONTENT -->

</div>
<!--/ Application Content -->

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
$('#interview_job_position').change(function(){
    var this_val=$(this).val();
    if(this_val=="Fabricator"){
        $('#fabricator').show();
        $('#welder').hide();
    }
    else if(this_val=="Welder"){
        $('#welder').show();
        $('#fabricator').hide();
    }
});
</script>
</body>
</html>

