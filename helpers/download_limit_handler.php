<?php
session_start();
require_once("../vendor/autoload.php");
$download_order = new Orders;

$old_count = $download_order->get_count($_SESSION["user_id"]);

if ($old_count <= 7) {
// Creating new link and increasing the counter for this user
    $order_date = date("d.F.Y, g:i a");
    $new_count = $old_count + 1;
    $new_key = Utility::randomkey(50);
    $user_id = $_SESSION["user_id"];
    $product_id = 1;

    // Inserting into the database
    $download_order->order_insert($order_date, $new_count, $new_key, $user_id, $product_id);

    // redirecting the user to the new link
    $new_url = "../download.php?key=$new_key";
    header("Location: $new_url");

}else{
    $old_key = $download_order->get_key($_SESSION["user_id"]);
    $old_url = "../download.php?key=$old_key";
    header("Location: $old_url");
}