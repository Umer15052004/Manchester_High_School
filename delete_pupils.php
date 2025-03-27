<?php
include('db_connect.php');
if (!isset($_GET['id'])) die("Missing parent ID.");
$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM pupils WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: view_pupils.php");
    exit();
} else {
    echo "Error deleting pupil: " . $stmt->error;
}
?>
