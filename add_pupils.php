<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pupil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Add New Pupil</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
                <input type="text" name="address" class="form-control mb-3" placeholder="Address" required>
                <textarea name="medical_info" class="form-control mb-3" placeholder="Medical Info"></textarea>
                <input type="number" name="class_id" class="form-control mb-3" placeholder="Class ID" required>
                <input type="submit" name="submit" class="btn btn-primary" value="Add Pupil">
            </form>
            <a href="index_pupils.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $medical = $_POST['medical_info'];
    $class_id = $_POST['class_id'];

    // Prepared statement
    $stmt = $conn->prepare("INSERT INTO pupils (name, address, medical_info, class_id) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error); // Show SQL error
    }

    $stmt->bind_param("sssi", $name, $address, $medical, $class_id);

    if ($stmt->execute()) {
        echo "<script>alert('Pupil added successfully!'); window.location.href='view_pupils.php';</script>";
    } else {
        echo "<script>alert('Error adding pupil: " . $stmt->error . "');</script>";
    }
}
?>

