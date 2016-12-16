<?php
$page = "employee";
$sub = "e_list";
$head = "";
include('file_parts/header.php');
$id = $_GET['uid'];
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->
<section id="content">

    <div class="page page-gallery">

        <div class="pageheader">

            <h2>Employee Documents <span></span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Employee</a>
                    </li>
                    <li>
                        <a href="#">Employee List</a>
                    </li>
                    <li>
                        <a href="#">Employee Profile</a>
                    </li>
                    <li>
                        <a href="#">Documents</a>
                    </li>
                </ul>

            </div>

        </div>

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-dark" role="tablist">
                <li role="presentation"><a href="employee_read.php?uid=<?php echo $_GET['uid'] ?>">Profile</a></li>
                <li role="presentation"><a href="employee_edit.php?uid=<?php echo $_GET['uid'] ?>">Profile Edit</a></li>
                <li role="presentation" class="active"><a href="employee_gallery.php?uid=<?php echo $_GET['uid'] ?>" aria-controls="messages" role="col2" data-toggle="tab">Documents</a></li>
            </ul>

            <ul class="mix-filter pull-right">
                <li class="filter active" data-filter="all">
                    All
                </li>
                <li class="filter" data-filter=".cats">
                    Passport
                </li>
                <li class="filter" data-filter=".animals">
                    Health Card
                </li>
                <li class="filter" data-filter=".cities">
                    Visa
                </li>
                <li class="filter" data-filter=".cats, .animals">
                    Insurance
                </li>
            </ul>

            <ul class="mix-controls">
                <li class="select-all">
                    <label class="checkbox checkbox-custom checkbox-custom inline-block m-0">
                        <input type="checkbox"><i></i> Select all
                    </label>
                </li>
                <li class="mix-control disabled">
                    <a href="javascript:;"><i class="fa fa-envelope-o"></i> Email</a>
                </li>
                <li class="mix-control disabled">
                    <a href="javascript:;"><i class="fa fa-download"></i> Download</a>
                </li>
                <li class="mix-control disabled">
                    <a href="javascript:;"><i class="fa fa-pencil"></i> Edit</a>
                </li>
                <li class="mix-control disabled">
                    <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="col4">

                    <!-- row -->
                    <div class="row mix-grid">

                        <div class="gallery" data-lightbox="gallery">



                            <!-- col -->
                            <?php
                            $empFiles = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `employee_id`='$id'");
                            if (count($empFiles)) {
                                for ($ef = 0; $ef < count($empFiles); $ef++) {
                                    $image = $empFiles[$ef]['file_path'] . $empFiles[$ef]['file_name'];
                                    ?>
                                    <div class="col-md-3 col-sm-4 mb-20 mix mix_all cats pics">
                                        <div class="img-container">
                                            <input type="hidden" id="filename" value="<?php echo $empFiles[$ef]['file_name']; ?>"/>
                                            <img class="img-responsive" alt="" src="<?php echo $image; ?>">
                                            <div class="img-details">
                                                <h4 class="custom-font ng-binding"> </h4>
                                                <div class="img-controls">
                                                    <a href="javascript:;" class="img-select">
                                                        <i class="fa fa-circle-o"></i>
                                                        <i class="fa fa-circle"></i>
                                                    </a>
                                                    <a href="javascript:;" class="img-link">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                    <a class="img-preview" data-lightbox="gallery-item" href="<?php echo $empFiles[$ef]['file_path'] . $empFiles[$ef]['file_name']; ?>" title="Sed ut perspiciatis unde">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <a href="javascript:;" class="img-more">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <!-- /col -->



                        </div>

                    </div>
                    <!-- /row -->

                </div>





            </div>

        </div>
        <!-- /row -->

    </div>

</div>

</div>

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

<script src="assets/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="assets/js/vendor/mixitup/jquery.mixitup.min.js"></script>
<!--/ vendor javascripts -->




<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->






<script>
    $('#download_btn').click(function () {
        $(".selected").each(function () {
            var $href = $(this).parent().children('img').attr('src'),
                    $hrefShort = $href.replace('http://example.com/plugins/content/gallery/gallery/thumbs/', 'images\\Pics/');

            var $iframe = $('<iframe />');
            $iframe.attr('src', "/plugins/content/jw_sigpro/jw_sigpro/includes/download.php?file=" + $hrefShort);

            $iframe.css('visibility', 'hidden');
            $iframe.css('height', '0');

            $iframe.appendTo(document.body);
        });
    });
</script>
<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {

        $('.mix-grid').mixItUp();


        $('.mix-controls .select-all input').change(function () {
            if ($(this).is(":checked")) {
                $('.gallery').find('.mix').addClass('selected');
                enableGalleryTools(true);
            } else {
                $('.gallery').find('.mix').removeClass('selected');
                enableGalleryTools(false);
            }
        });

        $('.mix .img-select').click(function () {
            var mix = $(this).parents('.mix');
            if (mix.hasClass('selected')) {
                mix.removeClass('selected');
                enableGalleryTools(false);
            } else {
                mix.addClass('selected');
                enableGalleryTools(true);
            }
        });

        var enableGalleryTools = function (enable) {

            if (enable) {

                $('.mix-controls li.mix-control').removeClass('disabled');

            } else {

                var selected = false;

                $('.gallery .mix').each(function () {
                    if ($(this).hasClass('selected')) {
                        selected = true;
                    }
                });

                if (!selected) {
                    $('.mix-controls li.mix-control').addClass('disabled');
                }
            }
        }

    });
</script>
<!--/ Page Specific Scripts -->

<script>
    $('#dwnbtn').click(function () {
        var picData = $('.selected').find('img').attr('src');
        var filename = $('.selected').find('input').val();
        alert(picData);
        $.ajax({
            url: "download_ajax.php",
            type: "POST",
            data: {picData: picData, filename: filename},
            success: function () {

            }
        });
    });
</script>



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

<!-- Mirrored from www.tattek.sk/minovate-noAngular/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:37 GMT -->
</html>
