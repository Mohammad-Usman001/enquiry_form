<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteenquiry($conn, $id)) {
        header("Location: enquiry_list.php");
    } else {
        echo "Error deleting form";
    }
}

?>