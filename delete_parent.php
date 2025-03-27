<?php
include('db_connect.php');
if (!isset($_GET['id'])) die("Missing parent ID.");
$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM parents WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: view_parents.php");
    exit();
} else {
    echo "Error deleting parent: " . $stmt->error;
}
?>
