<?php
session_start();
include_once "student_php/config.php";

if (!isset($_SESSION['unique_id'])) {
    header("location: student_dashboard.html");
}
$user_id = $_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $update_full_name = $_POST['update_full_name'];
    $update_name_with_initials = $_POST['update_name_with_initials'];
    $update_address = $_POST['update_address'];
    $update_faculty = $_POST['update_faculty'];
    $update_degree_program = $_POST['update_degree_program'];
    $update_reg_number = $_POST['update_reg_number'];
    $update_phone_number = $_POST['update_phone_number'];
    $update_birth_date = $_POST['update_birth_date'];



    // Insert data into studentprofile table
    $insert_sql = "INSERT INTO studentprofile (user_id, full_name, name_with_initials, address, faculty, degree_program, reg_number, phone_number, birth_date) VALUES ('$user_id', '$update_full_name', '$update_name_with_initials', '$update_address', '$update_faculty', '$update_degree_program', '$update_reg_number', '$update_phone_number', '$update_birth_date')";

    if (mysqli_query($conn, $insert_sql)) {
        // Data inserted successfully
        header("Location: student_dashboard2.php"); // Redirect to success page
    } else {
        // Error occurred while inserting data
        header("Location: error_page.php"); // Redirect to error page
    }
}
?>
