<?php
$success_msg="";
$page = "Event Edit";
$sub="";
include('file_parts/header.php');
$custid = $_SESSION['id'];
?>

                <?php

                $values = $db->selectQuery("select * from event where id='".$_GET['id']."' and custid='$custid'");


                if (count($values)) {
					
					$event_id = $values[0]['id'];
                    $name = $values[0]['name'];
					$email = $values[0]['email'];
					$date = $values[0]['date'];
					$title = $values[0]['title'];
					$description = $values[0]['description'];
					$time = $values[0]['time'];
					$company = $values[0]['company'];

				}

                    ?>
					
					
					
					<?php

if (isset($_POST['submit'])) {
	
	$name= $_POST['name'];
	$email= $_POST['email'];
	$date= $_POST['date'];
	$title= $_POST['title'];
	$description= $_POST['description'];
	$time= $_POST['time'];
	$company= $_POST['company'];
	
	$values1['name'] = $name;
    $values1['email'] = $email;
	$values1['date'] = $date;
	$values1['title'] = $title;
	$values1['description'] = $description;
	$values1['time'] = $time;
	$values1['company'] = $company;
	
	$query1 = $db->secure_update('event', $values1, "  WHERE id = '" . $event_id . "'");
	if (count($query1)) {

        $success_msg = "Values Updated!";
		
		 echo "<script>location.href='calendar.php'</script>";

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

            <h2>Edit Event<span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-home"></i> SME</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Settings </a>
                    </li>
					<li>
                        <a href="javascript:void(0)">Event List</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Edit Event</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
                <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Edit Event </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">

                            <div class="row">
							
								<div class="form-group col-md-6">
                                    <label for="username">Event Coordinator : </label>
                                    <input type="text" name="name" id="name" value="<?php echo $name;?> "class="form-control" required>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Contact Email : </label>
                                    <input type="email" name="email" id="email" value="<?php echo $email;?> "class="form-control" required>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Event Date: </label>
									 <div class='input-group datepicker' data-format="L">
                                    <input type="text" name="date" id="date" value="<?php echo $date;?> "class="form-control" required>
									<span class="input-group-addon"><span class="fa fa-calendar"></span> </span>
								</div>
								</div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Event Time : </label>
                                    <input type="text" name="time" id="time" value="<?php echo $time;?> "class="form-control" required>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="phone">Company : </label>
                                    <select class="form-control" name="company" id="company" required="">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $manuf = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE company_status =1");
                                        if (count($manuf) > 0) {
                                            for ($ei = 0; $ei < count($manuf); $ei++) {
                                                ?>
                                                <option value="<?php echo $manuf[$ei]['company_name']; ?>" <?php if(($manuf[$ei]['company_name'])==$company) { echo "selected"; }?>><?php echo $manuf[$ei]['company_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Event Title: </label>
                                    <input type="text" name="title" id="title" value="<?php echo $title;?> "class="form-control" required>
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="username">Description: </label>
									<textarea class="form-control" id="description" name="description" required><?php echo $description; ?></textarea>
							   </div>

                          	<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $event_id; ?>">
							
						   <div class="col-md-6">
                                    <p style="color:red;" id = "com_status"></p>
                           </div>
								
						  
						   <ul class="pager wizard" style="margin-right:17%;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="submit">Save</button>
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
/*
$('#model_name').on('blur', function (e) {
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
    });*/
	</script>
<!--/ Page Specific Scripts -->


</body>
</html>
