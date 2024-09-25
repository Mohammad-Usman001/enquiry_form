<?php
include 'functions.php';
// echo "Functions.php file included successfully!";

$enquiry = fetchenquiry($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Enquiry List</h2>
        <style>
            .custom-align 
            {
            text-align: end;
            margin-bottom: 10px;
            }
            a.btn.btn-primary.btn-sm 
            {
                padding: 10px 25px;
                font-size: 18px;
            }
            </style>
        <div class="custom-align">
        <a  href="index.php" class="btn btn-primary btn-sm ">Add</a> 
        </div>
        
        <!-- Todo List Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>mobile no</th>
                    <th>Query</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $enquiry->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['query']; ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script>
        <?php
        session_start();
        if (isset($_SESSION['success'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Enquiry Updated',
                text: '<?php echo $_SESSION['success']; ?>',
                confirmButtonText: 'OK'
            });
            <?php unset($_SESSION['success']); // Clear the success message ?>
        <?php endif; ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
