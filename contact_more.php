<?php
include('file_parts/header.php');
?>

            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page page-forms-common">

                    <div class="pageheader">

                        <h2>More Details</h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Sponsor Master</a>
                                </li>
                                <li>
                                    <a href="#">Company</a>
                                </li>
                                <li>
                                    <a href="#">Company List</a>
                                </li>
								 <li>
                                    <a href="#">Company Profile</a>
                                </li>
								<li>
                                    <a href="#">Contact Details</a>
                                </li>
                            </ul>
                            
                        </div>

                    </div>


                    <!-- row -->
                    <div class="row">

                        <!-- col -->
                        <div class="col-md-12">

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Contact </strong>Details</h1>
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->
								<?php								
					  $sql1="select * from sm_company_contacts where contact_id='".$_GET['contact_id']."' ";
		          $qry=mysql_query($sql1);
					while($fe=mysql_fetch_array($qry))	
					{	
                   $not=explode(',', $fe['contact_notification']);
                   foreach($not as $out) {
                  
                   }				
					
?>
								 <div class="tile-body">

                                    <form class="form-horizontal" role="form">
                                       
										 <div class="media-body">
                                        <p class="mb-0">
                                            <span class="text-muted">Email:</span>
                                            <a href="#" class="text-default"><?php echo $fe['contact_email']; ?></a>
										</p>
										<p>
                                            <span class="text-muted">Phone Number:</span>
                                            <a href="#" class="text-default"><?php echo $fe['contact_phone']; ?></a>
                                            
                                        </p>
                                        
                                    </div>
									<!-- <div class="tile-header">
                                        <h2 class="custom-font"><strong>Send</strong> Notification</h2>
                                    </div>
									<?php								
					  /*$sql2="select * from sm_company_docs where company_id='".$_GET['company_id']."' ";
		          $qry2=mysql_query($sql2);
					while($fe2=mysql_fetch_array($qry2))	
					{	
                    $title = $fe2['doc_title'];	*/			
						
?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <label class="checkbox checkbox-custom">
                                                    <input type="checkbox"  name="" <?php //if(strcmp($title,$out)==0){
                                                                //echo "checked";}//?>> 
																  <i></i>
                                                    <?php //echo $title; ?>
                                                </label>
                                            </div>
                                        </div>
										<?php// } ?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-rounded btn-primary btn-sm">Submit</button>
                                            </div>
                                        </div>--->
                                    </form>

                                </div>
                                <!-- /tile body -->
                              <?php } ?>
                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->

                          
                    </div>
                    <!-- /row -->




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

        <script src="assets/js/vendor/slider/bootstrap-slider.min.js"></script>

        <script src="assets/js/vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>

        <script src="assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>

        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>

        <script src="assets/js/vendor/summernote/summernote.min.js"></script>
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
            $(window).load(function(){
                $('#ex1').slider({
                    formatter: function(value) {
                        return 'Current value: ' + value;
                    }
                });
                $("#ex1").on("slide", function(slideEvt) {
                    $("#ex1SliderVal").text(slideEvt.value);
                });

                $("#ex2, #ex3, #ex4, #ex5").slider();

                //load wysiwyg editor
                $('#summernote').summernote({
                    height: 200   //set editable area's height
                });
                //*load wysiwyg editor
            });
        </script>
        <!--/ Page Specific Scripts -->







        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='../../www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/form-common.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:45:39 GMT -->
</html>
