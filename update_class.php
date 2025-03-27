<?php include('db_connect.php');

if (!isset($_GET['id'])) die("Missing class ID.");
$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM classes WHERE id = $id");
if (!$result || $result->num_rows == 0) die("Class not found.");
$class = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];

    $stmt = $conn->prepare("UPDATE classes SET name=?, capacity=? WHERE id=?");
    $stmt->bind_param("sii", $name, $capacity, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Class updated.'); window.location.href='view_class.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Class</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="text" name="name" class="form-control mb-3" value="<?= $class['name'] ?>" required>
                <input type="number" name="capacity" class="form-control mb-3" value="<?= $class['capacity'] ?>" required>
                <input type="submit" class="btn btn-success" value="Update Class">
            </form>
            <a href="view_class.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>
