<?php
$success_msg = "";
$page = "visa";
$tab = "visa_settings";
$sub = "visa_category_settings";
$sub1 = "visa_category_add";
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
        list-style-category: none;
    }
</style>
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">
            <h2>Add Visa Category<span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Category</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Visa Category</a>
                    </li>

                </ul>

            </div>

        </div>
        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add Visa Category </a></li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Visa Type: </label>
                                    <select class="form-control mb-10" name="visa[0][visa_category_type]" id="type_name" required="">
									<option selected="" value=""> Select</option>
                                        <?php
                                        $select = $db->selectQuery("select * from sm_visa_type where visa_type_status='1'");
                                        if (count($select)) {
                                            for ($rt = 0; $rt < count($select); $rt++) {
                                                ?>
                                                <option value="<?php echo $select[$rt]['visa_type_id']; ?>"> <?php echo $select[$rt]['visa_type_name']; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
									
                                </div>
                          
                         
                                <div class="form-group col-md-6">
                                    <label for="username">Visa Category: </label>
                                    <input type="text"  class="form-control mb-10" name="visa[0][visa_category]" id="category_name" class="form-control" required=""/>
                                    <span id="exist_status_0"  class="validate_span"></span>
                                </div>
                            </div>
                            <div class="experience_div"></div>
                            <input type="hidden" value="1" id="visa_increment">
						   <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="visa_add_btn" >Add Visa Category
                                        <i class="fa fa-plus"></i></button>
                                </div>
								 <div class="col-md-8"></div>
								  <div class="col-md-1">
                            <ul class="pager wizard" style="margin-right:650px;">
                                <li class="next finish" style="display:none;">
                                    <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
                                </li>
                            </ul>
							</div>
                        </form>
                    </div>
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
    $('#submit_btn').click(function () {
        $('#exist_status_0').html('');
		
        var category_name = jQuery('#category_name').val();
        var type_name = jQuery('#type_name').val();
        if (category_name == "") {
            
        } else {
            $.ajax({
                url: 'visa_category_check1.php',
                type: 'POST',
                dataType: 'json',
                 data: $('form').serialize(),
                success: function (data) {
var counts=data.length;
					for(i=0;i<counts;i++){
						if(data[i]=="0"){
							$('#exist_status_'+i).html("Alredy Exist");
						}
						else{
							$('#exist_status_'+i).html("");
							 location.href='visa_category_list.php';
						}
					}
                    var ch2 = data.data_val;
                    if (ch2 == 0) {
						
                        $('#category_name').val('');
                        $('#type_name').val('');
                    }
                    if (ch2 == 1) {
                       
                    }

                }
            });
        }
    });
</script>



<script>
	 $('#visa_add_btn').click(function () {
		
        var visa_add = "visa_add";
        visa_increment = $('#visa_increment').val();
        added_exp = +visa_increment + 1;
        $('.experience_div').append(
                '<div class="row">'
                + '<div class="form-group col-md-6">'
				+ ' <label for="phone">Visa Type: </label>'
                + '<select class="form-control " name="visa[' + visa_increment + '][visa_category_type]" id="type_name" required="" >'
                + '<option selected="" value=""> Select</option>'
<?php
$select_exp = $db->selectQuery("SELECT * FROM sm_visa_type where visa_type_status='1'");
if (count($select_exp)) {
    for ($ei = 0; $ei < count($select_exp); $ei++) {
        ?>
                +'  <option value="<?php echo $select_exp[$ei]["visa_type_id"]; ?>"><?php echo $select_exp[$ei]["visa_type_name"]; ?></option>'
        <?php
    }
}
?>
        + '</select>'
                + '</div>'
                + '<div class="form-group col-md-6">'
                + '<label for="username">Visa Category: </label>'
                + '<input type="text"  name="visa[' + visa_increment + '][visa_category]"  class="form-control"  id="category_name"  required=""> '
				 + ' <span id="exist_status_' + visa_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				
				  );
                $('#visa_increment').val(added_exp);
    });
	</script>

</body>
</html>
