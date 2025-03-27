<?php
include('db_connect.php');

if (!isset($_GET['id'])) die("Missing parent ID.");
$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM parents WHERE id = $id");
if (!$result || $result->num_rows == 0) die("Parent not found.");
$parent = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE parents SET name=?, address=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("ssssi", $_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $id);
    if ($stmt->execute()) {
        echo "<script>alert('Parent updated.'); window.location.href='view_parents.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Parent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning"><h4>Edit Parent</h4></div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" value="<?= $parent['name'] ?>" required>
                <input type="text" name="address" class="form-control mb-3" value="<?= $parent['address'] ?>" required>
                <input type="email" name="email" class="form-control mb-3" value="<?= $parent['email'] ?>" required>
                <input type="text" name="phone" class="form-control mb-3" value="<?= $parent['phone'] ?>" required>
                <input type="submit" class="btn btn-success" value="Update">
            </form>
            <a href="view_parents.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>

