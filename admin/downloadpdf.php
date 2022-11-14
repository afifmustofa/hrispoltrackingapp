<?php
//Susunan Struktur File :> $File = 'File/501-862-1-SM.Pdf';
$file = $_GET['url'];

if (file_exists($file)) {
    header('content-description: file transfer');
    header('content-type: application/octet-stream');
    header('content-disposition: attachment; filename="'.basename($file).'"');
    header('expires: 0');
    header('cache-control: must-revalidate');
    header('pragma: public');
    header('content-length: ' . filesize($file));
    readfile($file);
    exit;
}
?>