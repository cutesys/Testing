<?php
$page = "vehicle";
$sub = "vehicle_gallery";
$sub1 = "";
include('file_parts/header.php');
$id = $_GET['vid'];
?>
<style>
    .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
        height: 150px !important;
    }
</style>
<section id="content">
    <div class="page page-gallery">
        <div class="pageheader">
            <h2>Documents <span></span></h2>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Sponsor Master</a>
                    </li>
                    <li>
                        <a href="#">Vehicle</a>
                    </li>
                    <li>
                        <a href="#">Vehicle List</a>
                    </li>
                    <li>
                        <a href="#">Vehicle Profile</a>
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
                <li role="presentation"><a href="vehicle_read.php?vid=<?php echo $id; ?>">Profile</a></li>
                <li role="presentation"><a href="vehicle_edit.php?vid=<?php echo $id ?>">Profile Edit</a></li>
                <li role="presentation" class="active"><a href="#"
                                                          aria-controls="messages" role="col2" data-toggle="tab">Documents</a>
                </li>
            </ul>
            <ul class="mix-filter pull-right">
                <li class="filter active" data-filter="all">
                    All
                </li>
                <li class="filter" data-filter=".Pictures">
                    Vehicle Pictures
                </li>
                <!--<li class="filter" data-filter=".Plate">
                    Plate Number
                </li>-->
                <li class="filter" data-filter=".Registration">
                    Registration/Istamara
                </li>
                <li class="filter" data-filter=".Insurance">
                    Insurance
                </li>
                <!--<li class="filter" data-filter=".Pollution">
                    Pollution Certificate
                </li>
                <li class="filter" data-filter=".NOC">
                    NOC
                </li>-->
                <li class="filter" data-filter=".Qatar">
                    Owner's Qatar ID
                </li>
            </ul>
            <ul class="mix-controls">
                <li class="select-all">
                    <label class="checkbox checkbox-custom checkbox-custom inline-block m-0">
                        <input type="checkbox"><i></i> Select all
                    </label>
                </li>
                <li class="mix-control disabled">
                    <a class="email_btn" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i
                            class="fa fa-envelope-o"></i> Email</a>
                </li>
                <li class="mix-control disabled">
                    <a class="download_btn" id="dwnbtn"><i class="fa fa-download"></i> Download</a>
                </li>
                <li class="mix-control disabled">
                    <a class="edit_btn" href="vehicle_document_edit.php?vid=<?php echo $id; ?>" id="edit_btn"><i
                            class="fa fa-pencil"></i> Edit</a>
                </li>
                <li class="mix-control disabled">
                    <a class="delete_btn" data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"><i
                            class="fa fa-trash-o"></i> Delete</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="col4">
                    <!-- row -->
                    <div class="row mix-grid">
                        <div class="gallery" id="galDiv" data-lightbox="gallery">
                            <!-- col -->
                            <?php
                            $disp_image = "";
                            $file_type = "";
                            $empFiles = $db->selectQuery("SELECT `vehicle_document_images`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles)) {
                                // print_r($empFiles);
                                for ($ef = 0; $ef < count($empFiles); $ef++) {
                                    $images_with_path = $empFiles[$ef]['vehicle_document_images'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Pictures";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if ($fileExtension[1] == 'pdf') {
                                                    $disp_image = "assets/images/pdf_image.jpg";
                                                    $file_type = "pdf";
                                                }
                                                if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                    $disp_image = "assets/images/docx_image.png";
                                                    $file_type = "docx";
                                                }
                                                if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                    $disp_image = $img;
                                                    $file_type = "img";
                                                }
                                                ?>
                                                <div
                                                    class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                    <div class="img-container">
                                                        <input type="hidden" id="image_id"
                                                               value="<?php echo $empFiles[$ef]['vehicle_document_id']; ?>"/>
                                                        <input type="hidden" id="filename"
                                                               value="<?php echo $image_class; ?>"/>
                                                        <img class="img-responsive" alt=""
                                                             src="<?php echo $disp_image; ?>"
                                                             width="500" height="auto">
                                                        <div class="img-details">
                                                            <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                            <div class="img-controls">
                                                                <a href="javascript:;" class="img-select">
                                                                    <i class="fa fa-circle-o"></i>
                                                                    <i class="fa fa-circle"></i>
                                                                </a>
                                                                <a href="javascript:;" class="img-link">
                                                                    <i class="fa fa-link"></i>
                                                                </a>
                                                                <?php
                                                                if ($file_type == "img") {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox="gallery-item"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox=""
                                                                       target="_blank"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php }
                                                                ?>
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
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image1 = "";
                            $file_type1 = "";
                            $empFiles1 = $db->selectQuery("SELECT `vehicle_document_owner_qatar_id`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles1)) {
                                // print_r($empFiles1);
                                for ($ef = 0; $ef < count($empFiles1); $ef++) {
                                    $images_with_path = $empFiles1[$ef]['vehicle_document_owner_qatar_id'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Qatar";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if ($fileExtension[1] == 'pdf') {
                                                    $disp_image1 = "assets/images/pdf_image.jpg";
                                                    $file_type1 = "pdf";
                                                }
                                                if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                    $disp_image1 = "assets/images/docx_image.png";
                                                    $file_type1 = "docx";
                                                }
                                                if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                    $disp_image1 = $img;
                                                    $file_type1 = "img";
                                                }
                                                ?>
                                                <div
                                                    class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                    <div class="img-container">
                                                        <input type="hidden" id="image_id"
                                                               value="<?php echo $empFiles1[$ef]['vehicle_document_id']; ?>"/>
                                                        <input type="hidden" id="filename"
                                                               value="<?php echo $image_class; ?>"/>
                                                        <img class="img-responsive" alt=""
                                                             src="<?php echo $disp_image1; ?>"
                                                             width="500" height="auto">
                                                        <div class="img-details">
                                                            <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                            <div class="img-controls">
                                                                <a href="javascript:;" class="img-select">
                                                                    <i class="fa fa-circle-o"></i>
                                                                    <i class="fa fa-circle"></i>
                                                                </a>
                                                                <a href="javascript:;" class="img-link">
                                                                    <i class="fa fa-link"></i>
                                                                </a>
                                                                <?php
                                                                if ($file_type1 == "img") {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox="gallery-item"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox=""
                                                                       target="_blank"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php }
                                                                ?>
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
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image2 = "";
                            $file_type2 = "";
                            $empFiles2 = $db->selectQuery("SELECT `vehicle_document_plate_number`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles2)) {
                                // print_r($empFiles2);
                                for ($ef = 0; $ef < count($empFiles2); $ef++) {
                                    $images_with_path = $empFiles2[$ef]['vehicle_document_plate_number'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Plate";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if ($fileExtension[1] == 'pdf') {
                                                    $disp_image2 = "assets/images/pdf_image.jpg";
                                                    $file_type2 = "pdf";
                                                }
                                                if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                    $disp_image2 = "assets/images/docx_image.png";
                                                    $file_type2 = "docx";
                                                }
                                                if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                    $disp_image2 = $img;
                                                    $file_type2 = "img";
                                                }
                                                ?>
                                                <div
                                                    class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                    <div class="img-container">
                                                        <input type="hidden" id="image_id"
                                                               value="<?php echo $empFiles2[$ef]['vehicle_document_id']; ?>"/>
                                                        <input type="hidden" id="filename"
                                                               value="<?php echo $image_class; ?>"/>
                                                        <img class="img-responsive" alt=""
                                                             src="<?php echo $disp_image2; ?>"
                                                             width="500" height="auto">
                                                        <div class="img-details">
                                                            <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                            <div class="img-controls">
                                                                <a href="javascript:;" class="img-select">
                                                                    <i class="fa fa-circle-o"></i>
                                                                    <i class="fa fa-circle"></i>
                                                                </a>
                                                                <a href="javascript:;" class="img-link">
                                                                    <i class="fa fa-link"></i>
                                                                </a>
                                                                <?php
                                                                if ($file_type2 == "img") {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox="gallery-item"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox=""
                                                                       target="_blank"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php }
                                                                ?>
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
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image3 = "";
                            $file_type3 = "";
                            $empFiles3 = $db->selectQuery("SELECT `vehicle_document_registration`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles3)) {
                                // print_r($empFiles3);
                                for ($ef = 0; $ef < count($empFiles3); $ef++) {
                                    $images_with_path = $empFiles3[$ef]['vehicle_document_registration'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Registration";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if ($fileExtension[1] == 'pdf') {
                                                    $disp_image3 = "assets/images/pdf_image.jpg";
                                                    $file_type3 = "pdf";
                                                }
                                                if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                    $disp_image3 = "assets/images/docx_image.png";
                                                    $file_type3 = "docx";
                                                }
                                                if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                    $disp_image3 = $img;
                                                    $file_type3 = "img";
                                                }
                                                ?>
                                                <div
                                                    class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                    <div class="img-container">
                                                        <input type="hidden" id="image_id"
                                                               value="<?php echo $empFiles3[$ef]['vehicle_document_id']; ?>"/>
                                                        <input type="hidden" id="filename"
                                                               value="<?php echo $image_class; ?>"/>
                                                        <img class="img-responsive" alt=""
                                                             src="<?php echo $disp_image3; ?>"
                                                             width="500" height="auto">
                                                        <div class="img-details">
                                                            <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                            <div class="img-controls">
                                                                <a href="javascript:;" class="img-select">
                                                                    <i class="fa fa-circle-o"></i>
                                                                    <i class="fa fa-circle"></i>
                                                                </a>
                                                                <a href="javascript:;" class="img-link">
                                                                    <i class="fa fa-link"></i>
                                                                </a>
                                                                <?php
                                                                if ($file_type3 == "img") {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox="gallery-item"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox=""
                                                                       target="_blank"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php }
                                                                ?>
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
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image4 = "";
                            $file_type4 = "";
                            $empFiles4 = $db->selectQuery("SELECT `vehicle_document_insurance`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles4)) {
                                // print_r($empFiles4);
                                for ($ef = 0; $ef < count($empFiles4); $ef++) {
                                    $images_with_path = $empFiles4[$ef]['vehicle_document_insurance'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Insurance";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if (count($fileExtension)) {
                                                    if ($fileExtension[1] == 'pdf') {
                                                        $disp_image4 = "assets/images/pdf_image.jpg";
                                                        $file_type4 = "pdf";
                                                    }
                                                    if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                        $disp_image4 = "assets/images/docx_image.png";
                                                        $file_type4 = "docx";
                                                    }
                                                    if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                        $disp_image4 = $img;
                                                        $file_type4 = "img";
                                                    }
                                                    ?>
                                                    <div
                                                        class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                        <div class="img-container">
                                                            <input type="hidden" id="image_id"
                                                                   value="<?php echo $empFiles4[$ef]['vehicle_document_id']; ?>"/>
                                                            <input type="hidden" id="filename"
                                                                   value="<?php echo $image_class; ?>"/>
                                                            <img class="img-responsive" alt=""
                                                                 src="<?php echo $disp_image4; ?>"
                                                                 width="500" height="auto">
                                                            <div class="img-details">
                                                                <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                                <div class="img-controls">
                                                                    <a href="javascript:;" class="img-select">
                                                                        <i class="fa fa-circle-o"></i>
                                                                        <i class="fa fa-circle"></i>
                                                                    </a>
                                                                    <a href="javascript:;" class="img-link">
                                                                        <i class="fa fa-link"></i>
                                                                    </a>
                                                                    <?php
                                                                    if ($file_type4 == "img") {
                                                                        ?>
                                                                        <a class="img-preview"
                                                                           data-lightbox="gallery-item"
                                                                           href="<?php echo $img; ?>"
                                                                           title="<?php echo $image_class; ?>">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    <?php } else {
                                                                        ?>
                                                                        <a class="img-preview" data-lightbox=""
                                                                           target="_blank"
                                                                           href="<?php echo $img; ?>"
                                                                           title="<?php echo $image_class; ?>">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    <?php }
                                                                    ?>
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
                                        }
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image5 = "";
                            $file_type5 = "";
                            $empFiles5 = $db->selectQuery("SELECT `vehicle_document_pollution`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles5)) {
                                // print_r($empFiles5);
                                for ($ef = 0; $ef < count($empFiles5); $ef++) {
                                    $images_with_path = $empFiles5[$ef]['vehicle_document_pollution'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "Pollution";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension = explode(".", $img);
                                                if ($fileExtension[1] == 'pdf') {
                                                    $disp_image5 = "assets/images/pdf_image.jpg";
                                                    $file_type5 = "pdf";
                                                }
                                                if ($fileExtension[1] == 'docx' || $fileExtension[1] == 'doc') {
                                                    $disp_image5 = "assets/images/docx_image.png";
                                                    $file_type5 = "docx";
                                                }
                                                if ($fileExtension[1] == 'jpg' || $fileExtension[1] == 'png') {
                                                    $disp_image5 = $img;
                                                    $file_type5 = "img";
                                                }
                                                ?>
                                                <div
                                                    class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                    <div class="img-container">
                                                        <input type="hidden" id="image_id"
                                                               value="<?php echo $empFiles5[$ef]['vehicle_document_id']; ?>"/>
                                                        <input type="hidden" id="filename"
                                                               value="<?php echo $image_class; ?>"/>
                                                        <img class="img-responsive" alt=""
                                                             src="<?php echo $disp_image5; ?>"
                                                             width="500" height="auto">
                                                        <div class="img-details">
                                                            <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                            <div class="img-controls">
                                                                <a href="javascript:;" class="img-select">
                                                                    <i class="fa fa-circle-o"></i>
                                                                    <i class="fa fa-circle"></i>
                                                                </a>
                                                                <a href="javascript:;" class="img-link">
                                                                    <i class="fa fa-link"></i>
                                                                </a>
                                                                <?php
                                                                if ($file_type5 == "img") {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox="gallery-item"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php } else {
                                                                    ?>
                                                                    <a class="img-preview" data-lightbox=""
                                                                       target="_blank"
                                                                       href="<?php echo $img; ?>"
                                                                       title="<?php echo $image_class; ?>">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                <?php }
                                                                ?>
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
                                    }
                                }
                            }
                            ?>
                            <?php
                            $disp_image6 = "";
                            $file_type6 = "";
                            $empFiles6 = $db->selectQuery("SELECT `vehicle_document_noc`,`vehicle_document_id` FROM `sm_vehicle_documents` WHERE `vehicle_auto_id`='$id' AND `vehicle_document_status`='1'");
                            if (count($empFiles6)) {
                                // print_r($empFiles6);
                                for ($ef = 0; $ef < count($empFiles6); $ef++) {
                                    $images_with_path = $empFiles6[$ef]['vehicle_document_noc'];
                                    if (!empty($images_with_path)) {
                                        $explod_image = explode(",", $images_with_path); //
                                        $image_class = "NOC";
                                        $count_image = count($explod_image);
                                        foreach ($explod_image as $img) {
                                            if (!empty($img)) {
                                                $fileExtension1 = explode(".", $img);
                                                if (count($fileExtension1) > 0) {
                                                    if ($fileExtension1[1] == 'pdf') {
                                                        $disp_image6 = "assets/images/pdf_image.jpg";
                                                        $file_type6 = "pdf";
                                                    } elseif ($fileExtension1[1] == 'docx' || $fileExtension1[1] == 'doc') {
                                                        $disp_image6 = "assets/images/docx_image.png";
                                                        $file_type6 = "docx";
                                                    } elseif ($fileExtension1[1] == 'jpg' || $fileExtension1[1] == 'png') {
                                                        $disp_image6 = $img;
                                                        $file_type6 = "img";
                                                    }
                                                    ?>
                                                    <div
                                                        class="col-md-3 col-sm-4 mb-20 mix mix_all parentImg <?php echo $image_class; ?>">
                                                        <div class="img-container">
                                                            <input type="hidden" id="image_id"
                                                                   value="<?php echo $empFiles6[$ef]['vehicle_document_id']; ?>"/>
                                                            <input type="hidden" id="filename"
                                                                   value="<?php echo $image_class; ?>"/>
                                                            <img class="img-responsive" alt=""
                                                                 src="<?php echo $disp_image6; ?>"
                                                                 width="500" height="auto">
                                                            <div class="img-details">
                                                                <h4 class="custom-font ng-binding"><?php echo $image_class; ?></h4>
                                                                <div class="img-controls">
                                                                    <a href="javascript:;" class="img-select">
                                                                        <i class="fa fa-circle-o"></i>
                                                                        <i class="fa fa-circle"></i>
                                                                    </a>
                                                                    <a href="javascript:;" class="img-link">
                                                                        <i class="fa fa-link"></i>
                                                                    </a>
                                                                    <?php
                                                                    if ($file_type6 == "img") {
                                                                        ?>
                                                                        <a class="img-preview"
                                                                           data-lightbox="gallery-item"
                                                                           href="<?php echo $img; ?>"
                                                                           title="<?php echo $image_class; ?>">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    <?php } else {
                                                                        ?>
                                                                        <a class="img-preview" data-lightbox=""
                                                                           target="_blank"
                                                                           href="<?php echo $img; ?>"
                                                                           title="<?php echo $image_class; ?>">
                                                                            <i class="fa fa-search"></i>
                                                                        </a>
                                                                    <?php }
                                                                    ?>
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
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>

                    </div>
                    <!-- /row -->

                </div>

                <div role="tabpanel" class="tab-pane" id="col3">

                    <!-- row -->
                    <div class="row mix-grid">

                        <div class="gallery" data-lightbox="gallery">
                            <!-- col -->
                            <!-- /col -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>

                <div role="tabpanel" class="tab-pane" id="col2">
                    <!-- row -->
                    <div class="row mix-grid">

                        <div class="gallery" data-lightbox="gallery">
                            <!-- col -->
                            <!-- /col -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
</section>
<!--/ CONTENT -->

</div>
<!--/ Application Content -->
<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="email_modal">
            <div class="modal-header">
                <h3 class="modal-title custom-font">E-mail</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <label>Email</label>
                        <input type="text" name="gal_email" id="gal_email" class="form-control" placeholder="E-mail"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label>Subject</label>
                        <input type="text" name="gal_subject" id="gal_subject" class="form-control"
                               placeholder="Subject"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label>Remarks</label>
                        <textarea name="gal_remarks" id="gal_remarks" class="form-control"
                                  placeholder="Remarks(if any)"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="success_email" style="color:green"></span>
                <button class="btn btn-default btn-border" id="email_btn">Send</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="email_modal">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure to delete this?</h3>
            </div>
            <div class="modal-body">
                <p style="color:green" id="del_message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="delete_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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

    });</script>
<!--/ Page Specific Scripts -->
<script>
    function Redirect() {
        window.location = "vehicle_document.php?vid=" +<?php echo $id; ?>;
    }

    $('#email_btn').click(function () {
        var send_email = $('#gal_email').val();
        var gal_subject = $('#gal_subject').val();
        var gal_remarks = $('#gal_remarks').val();
        var imgVal = new Array();
        $('.selected').each(function () {
            imgVal.push($(this).find('.img-preview').attr('href'));
        });
        //  alert(send_email);
        $.ajax({
            url: "vehicle_gallery_email.php",
            type: "POST",
            data: {
                imgVal: imgVal,
                send_email: send_email,
                gal_subject: gal_subject,
                vehicle_auto_id: '<?php echo $id ?>',
                gal_remarks: gal_remarks
            },
            success: function (data) {
                $('#success_email').html(data);
                setTimeout('Redirect()', 2000);
            }
        });
    });
    $('#edit_btn').click(function () {
        var imgVal = new Array();
        $('.selected').each(function () {
            imgVal.push($(this).find('img').attr('src'));
        });
        $.ajax({
            url: "employee_gallery_edit.php",
            type: "POST",
            data: {imgVal: imgVal},
            success: function () {
            }
        });
    });
    $('#delete_btn').click(function () {
        var imgId = [[], []];
        var vehicle_id =<?php echo $id ?>;
        $('.selected').each(function () {
            var type = $(this).find('#filename').val();
            //numeric[$(this).find('#image_id').val()] = type;
            imgId.push(type);
        });
        $.ajax({
            url: "vehicle_gallery_delete.php",
            type: "POST",
            data: {imgId: imgId, vehicle_id: vehicle_id},
            success: function (data) {
                $("#del_message").text(data);
                location.href = "vehicle_document.php?vid=" + <?php echo $id; ?>;
            }
        });
    });
    $('#dwnbtn').click(function () {
        var picData = new Array();
        $('.selected').each(function () {
            picData.push($(this).find('.img-preview').attr('href'));
        });
        $.ajax({
            url: "vehicle_gallery_download.php",
            type: "POST",
            data: {picData: picData},
            success: function (data) {
                location.href = "vehicle_download.php?name=" + data;
            }
        });
    });
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:37 GMT -->
</html>
