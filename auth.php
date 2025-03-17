<?php
session_start();

if (!function_exists('checkLogin')) {
    function checkLogin() {
        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: https://ashishbhandari431.com.np/login.php');
            exit();
        }
    }
}
?>
