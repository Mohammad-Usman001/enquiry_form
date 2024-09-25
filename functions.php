<?php
include 'database.php';

function fetchenquiry($conn){
    $sql = "SELECT * FROM enquiryform";
    return $conn->query($sql);
}

function addenquiry($conn, $name, $email, $mobile, $query){
    $stmt = $conn->prepare("INSERT INTO enquiryform(name, email, mobile, query) VALUES(?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $mobile, $query);
    return $stmt->execute();
}

function deleteenquiry($conn, $id){
    $stmt = $conn->prepare("DELETE FROM enquiryform WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getenquiry($conn, $id){
    $stmt=$conn->prepare("SELECT * FROM enquiryform where id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateenquiry($conn, $name, $email, $mobile, $query, $id) {
    $stmt = $conn->prepare("UPDATE enquiryform SET name = ?, email = ?, mobile = ?, query = ? WHERE id = ?");
    // Bind the parameters to the statement (ssssi stands for string, string, string, string, integer)
    $stmt->bind_param('ssssi', $name, $email, $mobile, $query, $id);
    
    // Execute the statement and return the result
    return $stmt->execute();
}

?>
