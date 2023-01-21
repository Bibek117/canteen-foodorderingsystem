<?php
session_start();
include('connection.php');

if (session_status() === PHP_SESSION_ACTIVE) {
    // unset and destroy session data
    session_unset();
    session_destroy();
} else {
    // log error or display message to user
    error_log('Error: session not started');
}

header('location:login.php');

?>