<?php
session_start();
include_once "mentor_php/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['accept']) && isset($_POST['submission_id']) && isset($_POST['department_head_id'])) {
    $submission_id = $_POST['submission_id'];
    $department_head_id = $_POST['department_head_id'];

    // Update the "department_head_id" column and "status" in the "medical" table
    $updateQuery = "UPDATE medical SET department_head_id = $department_head_id, status = 'Accepted' WHERE id = $submission_id";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        // The update was successful
        // Redirect or display a success message as needed
        header("Location: medical_submissions.php");
        exit();
    } else {
        // There was an error
        echo "Error updating data: " . mysqli_error($conn);
    }
} else {
    // Invalid form submission
    echo "Invalid form submission.";
}
?>
