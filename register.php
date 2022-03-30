<?php
session_start();
require_once("vendor/autoload.php");

$register_validation_errors_arr = [];
$register_user = new Users;
$register_order = new Orders;
$register_token = new Tokens;

// if user have a cookie
if (isset($_COOKIE["hashed_token"])) {
    // Update the cookie
    $register_user_id = $register_token->get_user_id_using_hashed_token($_COOKIE["hashed_token"]);
    $new_hashed_token = sha1(Utility::randomkey(127));
    $register_token->update_token($register_user_id, $new_hashed_token);
    setcookie("hashed_token", $new_hashed_token, time() + (10 * 365 * 24 * 60 * 60));

    // Sending the user to his download page using cookie to get id
    $current_key = $register_order->get_key($register_user_id);
    $url = "download.php?key=$current_key";
    header("Location:$url");
    
// if user have a session
} else if (isset($_SESSION["user_id"])) {
    // Sending the user to his download page using session to get id
    $current_key = $register_order->get_key($_SESSION["user_id"]);
    $url = "download.php?key=$current_key";
    header("Location:$url");
} else {
    if (isset($_POST["submit"])) {
        $validated = true;

        if (
            empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])
            || empty($_POST["cardName"]) || empty($_POST["cardNumber"])
            || empty($_POST["cvv"]) || empty($_POST["passwordConfirm"])
            ||  empty($_POST["expirationDate"])
        ) {
            array_push($register_validation_errors_arr, "All input must be filled.");
            $validated = false;
        } else {

            if ((strlen(trim($_POST["username"])) > _max_username_length_)) {
                array_push($register_validation_errors_arr, "Name is not valid!");
                $validated = false;
            }

            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                array_push($register_validation_errors_arr, "Email is not valid!");
                $validated = false;
            }

            if (!(trim(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])))) {
                array_push($register_validation_errors_arr, "Password must be Minimum eight characters,
            at least one uppercase letter, one lowercase letter and one number.");
                $validated = false;
            }

            if ($_POST["password"] != $_POST["passwordConfirm"]) {
                array_push($register_validation_errors_arr, "Password are not matching dude!");
                $validated = false;
            }

            if (!(trim(preg_match("/^[0-9]{16}$/", $_POST["cardNumber"])))) {
                array_push($register_validation_errors_arr, "You have a weird card number!");
                $validated = false;
            }


            if (!(trim(preg_match("/^[0-9]{3}$/", $_POST["cvv"])))) {
                array_push($register_validation_errors_arr, "CVV in not valid!");
                $validated = false;
            }


            if (!preg_match("/^(0[1-9]|1[0-2])[\/]2[2-9]{1}$/", $_POST["expirationDate"])) {
                array_push($register_validation_errors_arr, "The expire date format is not correct!");
                $validated = false;
            }
        }

        // Checking if user is already registered in the database.
        $email_registered = $register_user->is_registered($_POST["email"]); // True if email is already registered.
        if ($email_registered) {
            array_push($register_validation_errors_arr, "Email is already registered with another account, please try with different Email.");
            $validated = false;
        }

        if ($validated) {
            // Adding the user to the users table
            $register_user->register_insert($_POST["username"], $_POST["email"], $_POST["password"]);

            // Creating the first download key for the user.
            $order_date = date("d.F.Y, g:i a");
            $download_count = 1;
            $download_key = Utility::randomkey(50);
            $user_id = $register_user->get_userId($_POST["email"]);
            $product_id = 1;
            $register_order->order_insert($order_date, $download_count, $download_key, $user_id, $product_id);
            $_SESSION["register_successful"] = true;
            header('Location: login.php');
        }
    }


    $api=new Database;
    $api->get_user_date();
    require_once("views/register.html");
}


