<?php
include('db_connect.php');
if (!isset($_GET['id'])) die("Missing teacher ID.");
$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM teachers WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: view_teachers.php");
    exit();
} else {
    echo "Error deleting teacher: " . $stmt->error;
}
?>
