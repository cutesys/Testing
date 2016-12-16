<?php

/*
  function resize($imageName, $imageWidth, $imageHeight) {
  $filename = '576d053b0a1c2e250.jpg';
  $width = $imageWidth;
  $height = $imageHeight;
  list($width_orig, $height_orig) = getimagesize($filename);
  $ratio_orig = $width_orig / $height_orig;
  if ($width / $height > $ratio_orig) {
  $width = $height * $ratio_orig;
  } else {
  $height = $width / $ratio_orig;
  }
  $image_p = imagecreatetruecolor($width, $height);
  $image = imagecreatefromjpeg($filename);
  return imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
  //return imagejpeg($image_p, null, 100);
  } */

/* class ImgResizer {

  function ImgResizer($originalFile = '$newName') {
  $this->originalFile = $originalFile;
  }

  function resize($newWidth, $targetFile) {
  if (empty($newWidth) || empty($targetFile)) {
  return false;
  }
  $src = imagecreatefromjpeg($this->originalFile);
  list($width, $height) = getimagesize($this->originalFile);
  $newHeight = ($height / $width) * $newWidth;
  $tmp = imagecreatetruecolor($newWidth, $newHeight);
  imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

  if (file_exists($targetFile)) {
  unlink($targetFile);
  }
  imagejpeg($tmp, $targetFile, 95);
  }

  } */

function resize($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image_create_func = 'imagecreatefromjpeg';
            $image_save_func = 'imagejpeg';
            $new_image_ext = 'jpg';
            break;

        case 'image/png':
            $image_create_func = 'imagecreatefrompng';
            $image_save_func = 'imagepng';
            $new_image_ext = 'png';
            break;

        case 'image/gif':
            $image_create_func = 'imagecreatefromgif';
            $image_save_func = 'imagegif';
            $new_image_ext = 'gif';
            break;

        default:
            throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
        unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile.$new_image_ext");
}

?>
