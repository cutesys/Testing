<?php

$file_names = array('iMUST Operating Manual V1.3a.pdf', 'iMUST Product Information Sheet.pdf');
$file_names = explode(',', $_POST['filename']);
$fp = $_POST['picData'];
$uniqid = uniqid();
$archive_file_name = 'employee_files_' . $uniqid . '.zip';
$file_path = $fp;
zipFilesAndDownload($file_names, $archive_file_name, $file_path);

function zipFilesAndDownload(array $file_names, $archive_file_name, $file_path) {
    $zip = new ZipArchive();
    if ($zip->open($archive_file_name, ZipArchive::CREATE) != TRUE) {
        exit("cannot open <$archive_file_name>\n");
    }
    foreach ($file_names as $file_name_with_path) {
        $file_path_parts = explode("/", $file_name_with_path);
        $actual_file_name_only = $file_path_parts[count($file_path_parts) - 1];
        $zip->addFile($file_name_with_path, $actual_file_name_only);
    }
    $zip->close();
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=$archive_file_name");
    header("Content-length: " . filesize($archive_file_name));
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile("$archive_file_name");
    exit;
}
