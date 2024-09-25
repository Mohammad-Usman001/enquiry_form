<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $enquiry = getenquiry($conn, $id);
}

if (!$enquiry) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Enquiry Form</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $enquiry['id']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $enquiry['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $enquiry['email']; ?>" required>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" value="<?php echo $enquiry['mobile']; ?>" required>

            <label for="query">Your Query:</label>
            <textarea id="query" name="query" rows="5" placeholder="Write your query" required><?php echo $enquiry['query']; ?></textarea>

            <button type="submit" name="update">Submit Enquiry</button>
        </form>
    </div>


</body>

</html>
