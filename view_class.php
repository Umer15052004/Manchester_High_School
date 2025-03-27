<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>All Classes</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Capacity</th><th>Actions</th></tr>
                </thead>
                <tbody>
                <?php
                $result = $conn->query("SELECT * FROM classes");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['capacity']}</td>
                        <td>
                            <a href='update_class.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_class.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Delete this class?')\">Delete</a>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
            <a href="index_class.php" class="btn btn-link">← Back</a>
        </div>
    </div>
</div>
</body>
</html>
