<?php
include('db_connect.php');

// Make sure ID is passed
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No pupil ID provided in the URL.");
}

$id = intval($_GET['id']); // sanitize

// Fetch existing pupil info
$result = $conn->query("SELECT * FROM pupils WHERE id = $id");
if (!$result || $result->num_rows == 0) {
    die("Pupil not found.");
}

$pupil = $result->fetch_assoc();

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $medical_info = $_POST['medical_info'];
    $class_id = $_POST['class_id'];

    $stmt = $conn->prepare("UPDATE pupils SET name = ?, address = ?, medical_info = ?, class_id = ? WHERE id = ?");
    $stmt->bind_param("sssii", $name, $address, $medical_info, $class_id, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Pupil updated successfully.'); window.location.href='view_pupils.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pupil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Pupil</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" value="<?= htmlspecialchars($pupil['name']) ?>" required>
                <input type="text" name="address" class="form-control mb-3" value="<?= htmlspecialchars($pupil['address']) ?>" required>
                <textarea name="medical_info" class="form-control mb-3"><?= htmlspecialchars($pupil['medical_info']) ?></textarea>
                <input type="number" name="class_id" class="form-control mb-3" value="<?= $pupil['class_id'] ?>" required>
                <input type="submit" name="update" class="btn btn-success" value="Update">
            </form>
            <a href="view_pupils.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

