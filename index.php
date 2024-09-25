<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Enquiry Form</h2>
        <form action="add.php" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">

                    <!-- Name Field -->
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>

                </div>
                <div class="col-md-6">
                    <!-- Email Field -->
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="mb-3">
                <!-- Mobile Number Field -->
                <label for="mobile" class="form-label">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>

            </div>

            <div class="mb-3">
                <!-- Query Field -->
                <label for="query" class="form-label">Your Query:</label>
                <textarea id="query" name="query" rows="5" class="form-control" placeholder="Write your query" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <!-- Submit Button -->
                <button type="submit" name="submit" class="btn btn-primary">Submit Enquiry</button>
                <a href="enquiry_list.php" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    <!-- SweetAlert success popup -->
    <script>
        <?php
        session_start();
        if (isset($_SESSION['success'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Enquiry Submitted',
                text: '<?php echo $_SESSION['success']; ?>',
                confirmButtonText: 'OK'
            });
            <?php unset($_SESSION['success']); // Clear the success message 
            ?>
        <?php endif; ?>
    </script>

    <!-- Bootstrap JS and validation script -->

</body>

</html>