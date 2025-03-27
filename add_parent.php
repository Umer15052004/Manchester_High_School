<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Add Parent</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white"><h4>Add Parent</h4></div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
                <input type="text" name="address" class="form-control mb-3" placeholder="Address" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>
                <input type="submit" name="submit" class="btn btn-primary" value="Add Parent">
            </form>
            <a href="index_parents.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO parents (name, address, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone']);
    
    if ($stmt->execute()) {
        echo "<script>alert('Parent added successfully'); window.location.href='view_parents.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>

