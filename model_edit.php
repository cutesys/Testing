<?php
$success_msg="";
$page = "settings";
$sub = "model";
$sub1 = "model_list";
include('file_parts/header.php');
?>

                <?php

                

                $res = $db->selectQuery("select * from sm_vehicle_model where model_id='" . $_GET['model_id'] . "' ");


                if (count($res)) {

                    $model_id = $res[0]['model_id'];
					$model_name = $res[0]['model_name'];
                    $manufacturer_id = $res[0]['manufacturer_id'];

				}

                    ?>
					
					
					
					<?php

if (isset($_POST['submit'])) {
	
	$model_name= $_POST['model_name'];
	$manufacturer_id= $_POST['manufacturer_id'];
	
	$values1['model_name'] = $model_name;
    $values1['manufacturer_id'] = $manufacturer_id;
	$query1 = $db->secure_update('sm_vehicle_model', $values1, "  WHERE model_id = '" . $_GET['model_id'] . "'");
	if (count($query1)) {

        $success_msg = "Values Updated!";
		
		 echo "<script>location.href='model_list.php'</script>";

		}

		else

		{

		$success_msg = "Error in updation";

		}


}?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-forms-wizard">

        <div class="pageheader">

            <h2>Edit Model<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Settings </a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Model List</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Edit Model</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Edit Model </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">

                            <div class="row">
							<div class="form-group col-md-4">
                                    <label for="phone">Manufacturer: </label>
                                    <select class="form-control" name="manufacturer_id" id="manufacturer_id" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `manufacturer_name`,`manufacturer_id` FROM `sm_vehicle_manufacturer` WHERE manufacturer_status =1");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['manufacturer_id']; ?>" <?php if(($manuf[$ei]['manufacturer_id'])==$manufacturer_id) { echo "selected"; }?>><?php echo $manuf[$ei]['manufacturer_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								
                                <div class="form-group col-md-6">
                                    <label for="username">Model Name: </label>
                                    <input type="text" name="model_name" id="model_name" value="<?php echo $model_name;?> "class="form-control" required>
                                </div>

                          	<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $model_id; ?>">
							
						   <div class="col-md-6">
                                    <p style="color:red;" id = "com_status"></p>
                                </div>
								
						  
						   <ul class="pager wizard" style="margin-right:17%;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="submit">Add</button>
                    </li>
                </ul>
				</div>
            </form> 
           </div>							

               
                <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-2">
				<h4  class="text-success mt-0 mb-20" id="partner_succes"><?php echo $success_msg; ?></h4>
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

$('#model_name').on('keyup', function (e) {
        var model_name = jQuery('#model_name').val();
		var edit_id = jQuery('#edit_id').val();
		var manufacturer_id = jQuery('#manufacturer_id').val();
        $('#com_status').html('Please wait...');
        $.ajax({
            url: 'model_check_edit.php',
            type: 'POST',
            dataType: 'json',
            data: {model_name: model_name,edit_id: edit_id,manufacturer_id:manufacturer_id},
            success: function (data) {
                var ch2 = data.data_val;
                if (ch2 == 0) {
                    $('#model_name').val('');
					$('#com_status').html(data.Status);
                }
                if (ch2 == 1) {

                }

            }
        });
    });
	</script>
<!--/ Page Specific Scripts -->


</body>
</html>
