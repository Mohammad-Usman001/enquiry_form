<?php
include 'functions.php';
session_start(); 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $query = $_POST['query'];

    if (addenquiry($conn, $name, $email, $mobile, $query)){
        $_SESSION['success'] = "Form submitted successfully!";  
        header('Location: index.php');  
        exit();
    } else {
        echo "Error: Could not submit the form.";
    }
}
?>


    function register_user($conn, $username, $password) {
    
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
    return $result;
}
