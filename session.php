<?php
// Disable output buffering and error display at the very top
ob_start();
ini_set('display_errors', 0);
error_reporting(0);

// Include config first
require_once("config.php");

// Start session with strict settings
session_start();

// Redirect if not logged in
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Initialize user variables with default values
$userid = "";
$firstname = "";
$lastname = "";
$username = "";
$useremail = "";
$userprofile = "Uploads/default_profile.png";

// Sanitize email input
$sess_email = mysqli_real_escape_string($con, $_SESSION["email"]);

// Prepare and execute query
$sql = "SELECT user_id, firstname, lastname, email, profile_path FROM users WHERE email = '$sess_email'";
$result = $con->query($sql);

// Fetch user data
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $userid = $row["user_id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username = $row["firstname"] . " " . $row["lastname"];
    $useremail = $row["email"];
    $userprofile = !empty($row["profile_path"]) 
        ? "uploads/" . $row["profile_path"] 
        : "Uploads/default_profile.png";
}

// Clear any accidental output
ob_end_clean();
?>