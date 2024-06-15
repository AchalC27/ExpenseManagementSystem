<?php
require('config.php');
session_start();

// Check if the user is an admin
if (!isset($_SESSION['email']) || !isAdmin($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to the login page if not an admin
    exit();
}

// Function to check if a user is an admin
function isAdmin($email) {
    global $con;
    $query = "SELECT * FROM users WHERE email = '$email' AND role = 'admin'";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}

// Fetch data from the users table
$query = "SELECT users.firstname, users.lastname, users.email, SUM(expenses.expense) AS total_expense
          FROM users
          LEFT JOIN expenses ON users.user_id = expenses.user_id
          GROUP BY users.user_id";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<!-- HTML code for the admin dashboard -->
</html>