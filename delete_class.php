<?php
include('db_connect.php');
if (!isset($_GET['id'])) die("Missing ID");
$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: view_class.php");
    exit();
} else {
    echo "Error deleting class: " . $stmt->error;
}
?>
