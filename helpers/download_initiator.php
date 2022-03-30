<?php
session_start();
require_once("../vendor/autoload.php");
$download_order = new Orders;

// Checking if user have reached limit and managed to access this file somehow
if ($download_order->get_count($_SESSION["user_id"]) <= 7) {
    $filename = '../Resources/XYZsoftware.zip';

    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false); 
    header('Content-Type: application/zip');
    
    header('Content-Disposition: attachment; filename="' . basename($filename) . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($filename));
    
    readfile($filename);
    
    exit;
}else{
    echo "<script> window.close(); </script>";
}
