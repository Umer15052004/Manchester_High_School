<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Parents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>All Parents / Guardians</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM parents");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>
                                <a href='update_parent.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete_parent.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete this parent?')\">Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="index_parents.php" class="btn btn-link mt-3">← Back</a>
        </div>
    </div>
</div>
</body>
</html>
