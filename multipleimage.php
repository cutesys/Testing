<!--<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>-->

<?php
if (isset($_POST['sub'])) {
    echo "Fffff";
    exit;
    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");

    var_dump($_FILES["filesn"]["name"]);
    exit;

    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        echo "Dfff";
        exit;
        $file_name = $_FILES["files"]["name"][$key];
        $file_tmp = $_FILES["files"]["tmp_name"][$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
            if (!file_exists("photo_gallery/" . $txtGalleryName . "/" . $file_name)) {
                move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "photo_gallery/" . $txtGalleryName . "/" . $file_name);
            } else {
                $filename = basename($file_name, $ext);
                $newFileName = $filename . time() . "." . $ext;
                move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "photo_gallery/" . $txtGalleryName . "/" . $newFileName);
            }
        } else {
            array_push($error, "$file_name, ");
        }
    }
}
?>