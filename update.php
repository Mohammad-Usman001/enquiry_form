<?php
include 'functions.php';

session_start();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $query = $_POST['query'];
    $id = $_POST['id'];  // Get the id from the form

    // Pass the id to the updateenquiry function
    if (updateenquiry($conn, $name, $email, $mobile, $query, $id)) {
        $_SESSION['success'] = "Form updated successfully!"; 
        header("Location: enquiry_list.php");
        exit();  // Important to stop further script execution after redirection
    } else {
        echo "Error updating the record.";
    }
}
