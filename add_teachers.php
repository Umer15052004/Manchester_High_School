<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white"><h4>Add New Teacher</h4></div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
                <input type="text" name="address" class="form-control mb-3" placeholder="Address" required>
                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>
                <input type="number" name="salary" class="form-control mb-3" placeholder="Salary" required>
                <select name="background_check" class="form-control mb-3" required>
                    <option value="">Background Check Passed?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <input type="number" name="class_id" class="form-control mb-3" placeholder="Class ID">
                <input type="submit" name="submit" class="btn btn-primary" value="Add Teacher">
            </form>
            <a href="index_teachers.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO teachers (name, address, phone, salary, background_check, class_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiii", $_POST['name'], $_POST['address'], $_POST['phone'], $_POST['salary'], $_POST['background_check'], $_POST['class_id']);
    if ($stmt->execute()) {
        echo "<script>alert('Teacher added successfully'); window.location.href='view_teachers.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>
