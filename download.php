<?php
session_start();
require_once("vendor/autoload.php");

$download_order = new Orders;
$download_user = new Users;
$download_token = new Tokens;

$project_folder_name = basename(__DIR__);

if(isset($_SESSION["user_id"]) || isset($_COOKIE["hashed_token"])){
    // User variables
        // User id from token or session
            // From cookie instead and save his id in the session
            if (isset($_COOKIE["hashed_token"])) {
                // Updating the cookie
                $download_user_id = $download_token->get_user_id_using_hashed_token($_COOKIE["hashed_token"]);
                $new_hashed_token = sha1(Utility::randomkey(127));
                $download_token->update_token($download_user_id, $new_hashed_token);
                setcookie("hashed_token", $new_hashed_token, time() + (10 * 365 * 24 * 60 * 60));

                // Setting user id variable
                $current_user_id = $download_user_id;
                // Setting user id in session
                $_SESSION["user_id"] = $current_user_id;
                
            // From session if it exists.
            } else if (isset($_SESSION["user_id"])) {
                $current_user_id = $_SESSION["user_id"];
            }
        $current_user_email = $download_user->get_email_using_userId($current_user_id);
        $current_key = $_GET['key'];

    // Checking if user and get key are valid
    if (isset($_GET['key']) && $download_order->is_valid_key($current_user_id, $current_key)) {
        // Checking if user have reached his maximum downloads number
        if ($download_order->get_count($current_user_id) <= 7) {
            $download_limit_error = "";
        } else {
            $download_limit_error = 'you have reached your maximum downloads limit from that account, please try a different account.';
        };
        
        require_once("views/download.html");
    } else {
        require_once("views/error.html");
    }
}else{
    require_once("views/error.html");
}
