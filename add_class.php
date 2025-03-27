<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Add New Class</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" placeholder="Class Name (e.g. Year One)" required>
                <input type="number" name="capacity" class="form-control mb-3" placeholder="Capacity" required>
                <input type="submit" name="submit" class="btn btn-primary" value="Add Class">
            </form>
            <a href="index_class.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];

    $stmt = $conn->prepare("INSERT INTO classes (name, capacity) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $capacity);
    if ($stmt->execute()) {
        echo "<script>alert('Class added successfully!'); window.location.href='view_class.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>
