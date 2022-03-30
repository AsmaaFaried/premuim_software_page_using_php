<?php

session_start();

require_once("vendor/autoload.php");

$login_user = new Users;
$login_order = new Orders;
$login_token = new Tokens;

$login_error = "";

// if a logout button was pressed
if(isset($_POST["logout_request"])){
    //destroying session.
    unset($_SESSION["user_id"]);
    // if user have a cookie
    if(isset($_COOKIE["hashed_token"])){
        // Deleting cookie row from token table
        $login_token->delete_token($_COOKIE["hashed_token"]);
        // Destroying cookie.
        unset($_COOKIE["hashed_token"]);
        setcookie("hashed_token", "", time() - 3600);
    }
}

// if user have a cookie
if (isset($_COOKIE["hashed_token"])) {
    // Updating the cookie
    $login_user_id = $login_token->get_user_id_using_hashed_token($_COOKIE["hashed_token"]);
    $new_hashed_token = Utility::randomkey(127);
    $login_token->update_token($login_user_id, $new_hashed_token);
    setcookie("hashed_token", $new_hashed_token, time() + (10 * 365 * 24 * 60 * 60));

    // Sending the user to his download page using cookie to get id
    $token_user_id = $login_token->get_user_id_using_hashed_token($_COOKIE["hashed_token"]);
    $current_key = $login_order->get_key($token_user_id);
    $url = "download.php?key=$current_key";
    header("Location:$url");

// if user have a session
} else if (isset($_SESSION["user_id"])) {
    // Sending the user to his download page using session to get id
    $current_key = $login_order->get_key($_SESSION["user_id"]);
    $url = "download.php?key=$current_key";
    header("Location:$url");

} else {

    if (isset($_POST["login"])) {   //login is existing
        if (!empty($_POST["login"])) {  // login have a value
            $user_email = $_POST['email'];
            $hashed_password = sha1($_POST['password']);
            $valid_user = $login_user->is_valid_user($user_email, $hashed_password);
            if ($valid_user) {  // User is valid
                // Saving user id in session
                $user_id = $login_user->get_userId($_POST['email']);
                $_SESSION["user_id"] = $user_id;

                // Saving cookie in tokens If remember me is pressed
                if (!empty($_POST["remember-me"])) {
                    $hashed_token = sha1(Utility::randomkey(127));
                    $login_token->AddUserToken($user_id, $hashed_token);
                    setcookie("hashed_token", $hashed_token, time() + (10 * 365 * 24 * 60 * 60));
                }

                // Sending the user to his download page
                $download_order = new Orders;
                $current_key = $download_order->get_key($user_id);
                $url = "download.php?key=$current_key";
                header("Location:$url");
            } else {
                $login_error = "Username or password are incorrect, please try again.";
            }
        }
    }
}
require_once("views/login.html");
