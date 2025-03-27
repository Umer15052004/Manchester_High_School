<?php
include('db_connect.php');
if (!isset($_GET['id'])) die("Missing teacher ID.");
$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM teachers WHERE id = $id");
if (!$result || $result->num_rows == 0) die("Teacher not found.");
$teacher = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE teachers SET name=?, address=?, phone=?, salary=?, background_check=?, class_id=? WHERE id=?");
    $stmt->bind_param("sssiiii", $_POST['name'], $_POST['address'], $_POST['phone'], $_POST['salary'], $_POST['background_check'], $_POST['class_id'], $id);
    if ($stmt->execute()) {
        echo "<script>alert('Teacher updated.'); window.location.href='view_teachers.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-white"><h4>Edit Teacher</h4></div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" value="<?= $teacher['name'] ?>" required>
                <input type="text" name="address" class="form-control mb-3" value="<?= $teacher['address'] ?>" required>
                <input type="text" name="phone" class="form-control mb-3" value="<?= $teacher['phone'] ?>" required>
                <input type="number" name="salary" class="form-control mb-3" value="<?= $teacher['salary'] ?>" required>
                <select name="background_check" class="form-control mb-3" required>
                    <option value="1" <?= $teacher['background_check'] ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= !$teacher['background_check'] ? 'selected' : '' ?>>No</option>
                </select>
                <input type="number" name="class_id" class="form-control mb-3" value="<?= $teacher['class_id'] ?>">
                <input type="submit" class="btn btn-success" value="Update Teacher">
            </form>
        </div>
    </div>
</div>
</body>
</html>
