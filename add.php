<?php
include 'functions.php';
session_start(); // Start session to store success message

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $query = $_POST['query'];

    if (addenquiry($conn, $name, $email, $mobile, $query)){
        $_SESSION['success'] = "Form submitted successfully!";  // Set session success message
        header('Location: index.php');  // Redirect back to the form page after successful submission
        exit();
    } else {
        echo "Error: Could not submit the form.";
    }
}
?>
// if (!empty($username) && !empty($password)) {
    //     $message = register_user($conn, $username, $password);
    //     echo $message;
    // } else {
    //     echo "Please fill in all fields.";
    // }


    function register_user($conn, $username, $password) {
    // global $conn; // Use the $conn from db.php
    
    // Hash the password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $password_hashed);
    
    if ($stmt->execute()) {
        $result = "Registration successful!";
    } else {
        $result = "Error: " . $stmt->error;
    }
    
    // $stmt->close();
    
    return $result;
}