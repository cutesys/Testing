<?php

if (isset($_POST['picData'])) {
    $files_array = $_POST['picData'];
    $files_count = count($files_array);
    if ($files_count == 1) {
        foreach ($files_array as $file) {
            echo $file;
        }
    }
    else{
        $uniqid = uniqid();
        $zipname = 'vehicle_docs' . $uniqid . '.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($files_array as $file) {
            $zip->addFile($file);
        }
        $zip->close();
        echo $zipname;
    }
}
